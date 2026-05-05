<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pesan' => 'required|string|max:500',
            'bintang' => 'required|integer|min:1|max:5'
        ]);

        // Simpan data
        Testimonial::create([
            'user_id' => Auth::id(),
            'nama_customer' => Auth::user()->name,
            'pesan' => $request->pesan,
            'bintang' => $request->bintang,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Cerita Anda berhasil dibagikan!');
    }
}
