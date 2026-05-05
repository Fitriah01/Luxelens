<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        // All bookings for this user, latest first
        $bookings = Booking::where('user_id', $user->id)
            ->latest()
            ->get();

        // Latest booking (for timeline)
        $latest = $bookings->first();

        // Next upcoming session
        $upcoming = Booking::where('user_id', $user->id)
            ->whereNotIn('status', ['Cancelled'])
            ->where('tanggal_pemotretan', '>=', now()->startOfDay())
            ->orderBy('tanggal_pemotretan', 'asc')
            ->first();

        // Countdown seconds to upcoming session
        $countdownSeconds = null;
        if ($upcoming) {
            $target = \Carbon\Carbon::parse($upcoming->tanggal_pemotretan)->startOfDay();
            $countdownSeconds = max(0, (int) now()->diffInSeconds($target, false));
        }

        // Completed bookings with results link
        $completed = Booking::where('user_id', $user->id)
            ->where('status', 'Lunas')
            ->whereNotNull('link_results')
            ->latest()
            ->take(6)
            ->get();

        // User's last testimonial/review
        $myReview = Testimonial::where('nama_customer', $user->name)
            ->latest()
            ->first();

        // Total spent (confirmed payments)
        $totalSpent = Booking::where('user_id', $user->id)
            ->where('status', 'Lunas')
            ->sum('harga');

        // Gallery filtered by user's most common booking category
        $topCategory = $bookings->groupBy('kategori')->sortByDesc->count()->keys()->first();
        $galleries = Gallery::when($topCategory, fn($q) => $q->where('kategori', $topCategory))
            ->latest()
            ->take(8)
            ->get();

        // If no category-specific gallery, fall back to all
        if ($galleries->isEmpty()) {
            $galleries = Gallery::latest()->take(8)->get();
        }

        // All service packages
        $packages = Package::all();

        // Event / Custom session categories (static, no fixed price)
        $eventCategories = [
            [
                'slug'       => 'event-dokumentasi',
                'nama'       => 'Event Documentation',
                'desc'       => 'Liputan profesional untuk seminar, konser, atau acara perusahaan Anda.',
                'harga_hint' => 'Mulai dari Rp 1.500.000',
                'icon'       => 'camera',
                'color'      => '#7c7cff',
                'fasilitas'  => ['Liputan Full Event', 'Multi-Angle Coverage', 'Soft Copy Hi-Res', 'Turnaround 3 Hari'],
            ],
            [
                'slug'       => 'company-profile',
                'nama'       => 'Company Profile',
                'desc'       => 'Foto profesional untuk branding, website, dan materi marketing bisnis Anda.',
                'harga_hint' => 'Hubungi Admin untuk Penawaran',
                'icon'       => 'briefcase',
                'color'      => '#2ecc71',
                'fasilitas'  => ['Konsep & Art Direction', 'Studio / Lokasi Fleksibel', 'Editing Premium', 'Commercial License'],
            ],
            [
                'slug'       => 'birthday-party',
                'nama'       => 'Birthday & Celebration',
                'desc'       => 'Abadikan momen ulang tahun dan perayaan spesial bersama orang tersayang.',
                'harga_hint' => 'Mulai dari Rp 800.000',
                'icon'       => 'star',
                'color'      => '#f39c12',
                'fasilitas'  => ['1-2 Jam Sesi', '20 Foto Edited', 'Dekorasi Backdrop', 'Soft Copy Hi-Res'],
            ],
        ];

        // Whether user has an active (non-completed) booking
        $hasActiveBooking = Booking::where('user_id', $user->id)
            ->whereNotIn('status', ['Lunas', 'Rejected', 'Selesai', 'Editing'])
            ->exists();

        return view('livewire.user-dashboard', compact(
            'user',
            'bookings',
            'latest',
            'upcoming',
            'countdownSeconds',
            'completed',
            'myReview',
            'totalSpent',
            'galleries',
            'topCategory',
            'packages',
            'hasActiveBooking',
            'eventCategories'
        ));
    }
}
