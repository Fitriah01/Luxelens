<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestimonialController;
use App\Models\Booking;
use Illuminate\Http\Request;

// ==============================
//           USER SIDE
// ==============================
Route::get('/', [BookingController::class, 'index'])->name('home');
Route::get('/portfolio/{category}', [BookingController::class, 'categoryPage']);
Route::get('/check-availability', [BookingController::class, 'checkDate']);

// Halaman Booking (Hanya User Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/booking/{kategori}', function ($kategori) {
        return view('form-booking', ['tema' => $kategori]);
    });
    Route::post('/proses-booking', [BookingController::class, 'store']);
    Route::get('/proses-booking', function () {
        return redirect('/')->with('error', 'Akses tidak valid. Silakan gunakan form booking.');
    });
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');

    // Dashboard user dialihkan ke beranda
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('user.dashboard');
});

// Tracking & Proof (Public/User)
Route::get('/track', function () {
    return view('track-page');
});
Route::post('/track', [BookingController::class, 'track'])->name('booking.track');
Route::post('/upload-proof/{id}', [BookingController::class, 'uploadProof'])->name('user.upload.proof');
Route::get('/available-photographers', [BookingController::class, 'availablePhotographers'])->name('available.photographers');

// ==============================
//      AUTH USER (PELANGGAN)
// ==============================
Route::get('/login', [AuthController::class, 'showUserLogin'])->name('login');
Route::post('/login', [AuthController::class, 'userLogin'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'userLogout'])->name('logout');

// ==============================
//      AUTH ADMIN (STAFF)
// ==============================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

// ==============================
//          ADMIN SIDE (PROTECTED)
// ==============================
// Middleware auth:admin memastikan hanya admin yang sudah login yang bisa masuk
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [BookingController::class, 'index'])->name('admin.dashboard');

    // Gallery & Status
    Route::post('/upload-gallery', [BookingController::class, 'uploadGallery']);
    Route::post('/update-gallery/{id}', [BookingController::class, 'updateGallery'])->name('admin.update.gallery');
    Route::delete('/delete-gallery/{id}', [BookingController::class, 'deleteGallery']);
    Route::get('/update-status/{id}/{status}', [BookingController::class, 'updateStatus']);
    Route::post('/bookings/{id}/mark-done', [BookingController::class, 'markDone'])->name('admin.bookings.markDone');

    // Laporan
    Route::get('/laporan', [BookingController::class, 'laporanIndex'])->name('laporan.index');
    Route::get('/laporan/cetak', [BookingController::class, 'cetakLaporan'])->name('laporan.cetak');
    Route::get('/download-pdf/{id}', [BookingController::class, 'downloadPDF']);

    // Booking Management
    Route::post('/confirm/{id}', [BookingController::class, 'confirm'])->name('admin.confirm');
    Route::post('/bookings/{id}/reject', [BookingController::class, 'rejectBooking'])->name('admin.reject.booking');
    Route::post('/bookings/{id}/verify-payment', [BookingController::class, 'verifyPayment'])->name('admin.verify.payment');
    Route::post('/bookings/{id}/payment-amount', [BookingController::class, 'updatePaymentAmount'])->name('admin.update.payment.amount');
    Route::post('/bookings/{id}/photographer', [BookingController::class, 'updatePhotographer'])->name('admin.update.photographer');

    // Photographer Management
    Route::post('/photographers', [PhotographerController::class, 'store'])->name('admin.photographers.store');
    Route::post('/photographers/{photographer}', [PhotographerController::class, 'update'])->name('admin.photographers.update');
    Route::delete('/photographers/{photographer}', [PhotographerController::class, 'destroy'])->name('admin.photographers.destroy');

    // Testimonial Management
    Route::post('/testimonials/{id}/status', [BookingController::class, 'updateTestimonialStatus'])->name('admin.testimonials.updateStatus');
    Route::post('/testimonials/{id}/reply', [BookingController::class, 'replyTestimonial'])->name('admin.testimonials.reply');
    Route::delete('/testimonials/{id}', [BookingController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
});

// ROUTE DARURAT (Hapus jika sudah di production)
Route::get('/buat-admin-darurat', function () {
    $admin = \App\Models\Admin::updateOrCreate(
        ['username' => 'admin'], // Ini kolom yang dicari logic login kamu
        ['password' => Hash::make('admin01')]
    );
    return "Data berhasil masuk ke tabel ADMINS. User: admin, Pass: admin01";
});
