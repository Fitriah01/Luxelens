<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan Login Admin
    public function showLogin()
    {
        return view('admin-login');
    }

    // Proses Login Admin
    // Proses Login Admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login using ADMIN guard (separate table admins)
        if (Auth::guard('admin')->attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin) {
            if (!Hash::check($credentials['password'], $admin->password) && $admin->password === $credentials['password']) {
                $admin->password = Hash::make($credentials['password']);
                $admin->save();
            }

            if (Hash::check($credentials['password'], $admin->password)) {
                Auth::guard('admin')->login($admin);
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    // Tambahkan Fungsi Logout Admin (supaya tidak bentrok dengan user)
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Tampilkan Login User
    public function showUserLogin()
    {
        return view('user-login');
    }

    // Proses Login User
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek booking supaya tahu harus ke Home atau Form
            $hasBooking = Booking::where('user_id', Auth::id())->exists();
            return $hasBooking ? redirect('/') : redirect('/booking/custom');
        }

        return back()->with('error', 'Gagal login, periksa email dan password kamu!');
    }

    // Tampilkan Register (PENTING: Jangan sampai Typo)
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Register (Kunci data masuk ke Database)
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $messages = [
            'name.required' => 'Nama lengkap wajib diisi, ya!',
            'email.required' => 'Email jangan dikosongin, dong.',
            'email.email' => 'Format emailnya salah tuh.',
            'email.unique' => 'Email ini sudah dipakai orang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter, biar aman!',
            'password.confirmed' => 'Konfirmasi passwordnya nggak cocok, cek lagi deh.',
        ];

        $request->validate($rules, $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/booking/custom')->with('success', 'Akun berhasil dibuat!');
    }
}
