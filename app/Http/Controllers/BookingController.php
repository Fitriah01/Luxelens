<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Photographer;
use App\Models\Testimonial;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    private function resolveBookingStatusFromPayment(Booking $booking, string $paymentStatus): string
    {
        return match ($paymentStatus) {
            'full_payment' => 'Lunas',
            'down_payment' => 'Confirmed',
            default => $booking->proof_payment ? 'Pending Verification' : 'Pending',
        };
    }

    private function syncFullPaymentFields(Booking $booking): void
    {
        $booking->update([
            'payment_status' => 'full_payment',
            'amount_paid' => $booking->harga,
        ]);
    }

    public function index(Request $request)
    {
        // --- DATA UMUM (GALLERY & TESTIMONI) ---
        $galleries = Gallery::latest()->get();
        $testimonials = Testimonial::latest()->get(); // Ambil testimoni terbaru

        // --- LOGIKA UNTUK ADMIN DASHBOARD ---
        if ($request->is('admin*')) {
            $query = Booking::query();

            // Fitur Pencarian (Berdasarkan Nama Client atau ID)
            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('nama_customer', 'like', '%' . $request->search . '%')
                        ->orWhere('id', 'like', '%' . $request->search . '%');
                });
            }

            // Filter Kategori
            if ($request->filled('category')) {
                $query->where('kategori', $request->category);
            }

            // Filter Bulan (Berdasarkan kolom created_at atau tanggal pemotretan)
            if ($request->filled('month')) {
                $query->whereMonth('created_at', $request->month);
            }

            $bookings = $query->latest()->paginate(10)->withQueryString();

            // Ambil data fotografer dari tabel photographers untuk konsistensi jadwal
            $allPhotogs = Photographer::all();

            $grafikBulanan = Booking::where('status', 'Lunas')
                ->selectRaw('MONTHNAME(created_at) as bulan, SUM(harga) as total, MONTH(created_at) as bulan_angka')
                ->groupBy('bulan', 'bulan_angka')
                ->orderBy('bulan_angka', 'ASC')
                ->pluck('total', 'bulan');

            $grafikKategori = Booking::selectRaw('kategori, COUNT(*) as total')
                ->groupBy('kategori')
                ->pluck('total', 'kategori');

            $totalIncome = Booking::where('status', 'Lunas')->sum('harga');
            $photographers = Photographer::all();
            $adminTestimonials = Testimonial::latest()->paginate(5, ['*'], 'tpage')->withQueryString();

            return view('admin-spa');
        }

        // --- LOGIKA UNTUK USER BERANDA (CLIENT AREA) ---
        $booking = null;

        if (Auth::check()) {
            $booking = \App\Models\Booking::where('user_id', Auth::id())
                ->latest()
                ->first();

            if ($booking && is_null($booking->photographer_name)) {
                $hari = date('l', strtotime($booking->tanggal_pemotretan));
                if ($hari == 'Saturday' || $hari == 'Sunday') {
                    $booking->photographer_name = "Citra (Team C)";
                } else {
                    $booking->photographer_name = "Andi (Team A)";
                }
                $booking->save();
            }
        }

        $packages = \App\Models\Package::orderByDesc('is_popular')->get();

        return view('beranda', compact('testimonials', 'galleries', 'booking', 'packages'));
    }

    /**
     * Menyimpan data booking dari form depan
     */
    /**
     * Menyimpan data booking dari form depan dengan penugasan fotografer otomatis
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_customer'      => 'required',
            'tanggal_pemotretan' => 'required|date',
            'kategori'           => 'required',
            'email'              => 'required|email',
            'photographer_name'  => 'nullable|string|max:255',
            'booking_type'       => 'nullable|in:paket,event',
            'event_details'      => 'nullable|string|max:2000',
            'estimasi_durasi'    => 'nullable|string|max:100',
        ]);

        $userId = \Illuminate\Support\Facades\Auth::id();

        // 1. LOGIKA HARGA
        $bookingType = $request->input('booking_type', 'paket');
        $harga = 0;
        $kat = strtolower(trim($request->kategori));

        if ($bookingType === 'event') {
            // Event/Custom: harga ditentukan admin setelah review
            $harga = 0;
        } elseif ($kat == 'wedding') {
            $harga = 5000000;
        } elseif ($kat == 'prewed') {
            $harga = 2500000;
        } elseif ($kat == 'wisuda') {
            $harga = 1500000;
        } else {
            $harga = 300000;
        }

        // 2. LOGIKA OTOMATIS PENUGASAN FOTOGRAFER BERDASARKAN HARI
        $tanggal = $request->tanggal_pemotretan;
        $selectedPhotographer = $request->input('photographer_name');

        $photographer = Photographer::all()
            ->firstWhere(fn($item) => $item->availableOnDate($tanggal) && ($selectedPhotographer ? $item->name . ' (' . $item->team_name . ')' === $selectedPhotographer : true));

        if (! $photographer && $selectedPhotographer) {
            $photographer = Photographer::all()
                ->firstWhere(fn($item) => $item->name . ' (' . $item->team_name . ')' === $selectedPhotographer);
        }

        $fotografer = $photographer
            ? $photographer->name . ' (' . $photographer->team_name . ')'
            : 'Staff On-Call Studio';

        // Prevent duplicate active booking (1 active per user)
        if (
            Auth::check() && Booking::where('user_id', Auth::id())
            ->whereNotIn('status', ['Lunas', 'Rejected', 'Selesai', 'Editing'])
            ->exists()
        ) {
            return back()->with('error', 'Anda masih memiliki sesi yang sedang berlangsung. Silakan selesaikan booking sebelumnya terlebih dahulu.');
        }

        // 3. SIMPAN KE DATABASE
        $initialStatus = $bookingType === 'event' ? 'Waiting for Quote' : 'Pending';
        $booking = Booking::create([
            'user_id'            => $userId,
            'booking_code'       => 'PSIM-' . strtoupper(\Illuminate\Support\Str::random(6)),
            'nama_customer'      => $request->nama_customer,
            'email'              => $request->email,
            'nomor_telepon'      => $request->nomor_telepon,
            'kategori'           => $request->kategori,
            'booking_type'       => $bookingType,
            'event_details'      => $request->event_details,
            'estimasi_durasi'    => $request->estimasi_durasi,
            'tanggal_pemotretan' => $request->tanggal_pemotretan,
            'status'             => $initialStatus,
            'paket'              => $bookingType === 'event' ? null : 'Standard',
            'harga'              => $harga,
            'photographer_name'  => $fotografer,
        ]);

        // Return view sukses
        return view('booking-success', compact('booking'));
    }

    /**
     * Konfirmasi Pembayaran
     */
    public function confirmPayment(int $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Lunas',
            'payment_status' => 'full_payment',
            'amount_paid' => $booking->harga,
        ]);

        return redirect()->back()->with('success', 'Pembayaran ' . $booking->nama_customer . ' Berhasil Dikonfirmasi!');
    }

    /**
     * Update Status (Reject/Cancel)
     */
    public function updateStatus(int $id, string $status)
    {
        $booking = Booking::findOrFail($id);

        // Mapping status agar lebih rapi di database
        $newStatus = ($status == 'cancelled' || $status == 'Rejected') ? 'Rejected' : $status;

        $payload = ['status' => $newStatus];

        if ($newStatus === 'Lunas') {
            $payload['payment_status'] = 'full_payment';
            $payload['amount_paid'] = $booking->harga;
        }

        if ($newStatus === 'Rejected') {
            $payload['payment_status'] = 'rejected';
        }

        $booking->update($payload);

        return redirect()->back()->with('success', 'Status Booking Berhasil diubah menjadi ' . $newStatus);
    }

    /**
     * Mark booking as Done (Selesai) with optional link_results
     */
    public function markDone(Request $request, int $id)
    {
        $request->validate([
            'link_results' => 'nullable|url|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = 'Selesai';
        if ($request->filled('link_results')) {
            $booking->link_results = $request->link_results;
        }
        $booking->save();

        return redirect()->back()->with('success', 'Booking #' . $booking->booking_code . ' ditandai Selesai.');
    }

    /**
     * Download Invoice PDF
     */
    public function downloadPDF(int $id)
    {
        $booking = Booking::findOrFail($id);
        $pdf = Pdf::loadView('pdf-invoice', compact('booking'));

        return $pdf->download('Invoice-' . $booking->nama_customer . '.pdf');
    }

    /**
     * Halaman Gallery & Portfolio
     */
    public function showGallery()
    {
        $photos = Gallery::latest()->get();
        return view('gallery', compact('photos'));
    }

    public function categoryPage(string $category)
    {
        $photos = Gallery::where('kategori', 'like', '%' . $category . '%')->latest()->get();
        return view('portfolio-detail', compact('photos', 'category'));
    }

    /**
     * CRUD Gallery
     */
    public function uploadGallery(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('portfolio', $namaFile, 'public');

            Gallery::create([
                'filename' => $namaFile,
                'kategori' => $request->kategori,
                'judul'    => $request->judul ?? 'Ethereal Moment'
            ]);

            return redirect()->back()->with('success', 'Foto berhasil diupload ke Gallery!');
        }

        return redirect()->back()->with('error', 'Gagal upload foto.');
    }

    public function deleteGallery(int $id)
    {
        $foto = Gallery::findOrFail($id);
        $storedPath = 'portfolio/' . $foto->filename;

        if (Storage::disk('public')->exists($storedPath)) {
            Storage::disk('public')->delete($storedPath);
        }

        $foto->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus!');
    }

    public function updateGallery(Request $request, int $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'nullable|string',
        ]);

        $foto = Gallery::findOrFail($id);
        $storedPath = 'portfolio/' . $foto->filename;

        if ($request->hasFile('foto')) {
            if (Storage::disk('public')->exists($storedPath)) {
                Storage::disk('public')->delete($storedPath);
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('portfolio', $namaFile, 'public');

            $foto->update([
                'filename' => $namaFile,
                'kategori' => $request->kategori ?? $foto->kategori,
            ]);

            return redirect()->back()->with('success', 'Foto gallery berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui foto gallery.');
    }

    /**
     * Cek Ketersediaan Tanggal (untuk JavaScript Fetch)
     */
    public function checkDate(Request $request)
    {
        $exists = Booking::where('tanggal_pemotretan', $request->date)->exists();

        // Kirim jawaban balik ke JavaScript dalam format JSON
        return response()->json([
            'booked' => $exists
        ]);
    }

    public function availablePhotographers(Request $request)
    {
        $date = $request->query('date');
        $available = [];

        try {
            if ($date) {
                $available = Photographer::all()
                    ->filter(fn($photographer) => $photographer->availableOnDate($date))
                    ->map(fn($photographer) => [
                        'id' => $photographer->id,
                        'name' => $photographer->name,
                        'team_name' => $photographer->team_name,
                        'specialization' => $photographer->specialization,
                        'label' => $photographer->name . ' (' . $photographer->team_name . ')',
                        'work_days' => $photographer->work_days,
                    ])
                    ->values();
            }
        } catch (\Exception $e) {
            $available = [];
        }

        return response()->json(['photographers' => $available]);
    }

    public function indexTestimonials()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials', compact('testimonials'));
    }

    public function updateTestimonialStatus(Request $request, int $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        $testimonial->update(['status' => $request->status]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Status ulasan berhasil diperbarui.']);
        }

        return back()->with('success', 'Status ulasan berhasil diperbarui.');
    }

    public function replyTestimonial(Request $request, int $id)
    {
        try {
            Log::info('🔧 DEBUG replyTestimonial called for ID: ' . $id, ['reply_preview' => substr($request->admin_reply ?? '', 0, 50)]);

            $testimonial = Testimonial::findOrFail($id);

            $request->validate([
                'admin_reply' => 'required|string|max:1000',
            ]);

            $testimonial->update(['admin_reply' => $request->admin_reply]);

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Balasan ulasan berhasil disimpan.']);
            }

            Log::info('✅ replyTestimonial SUCCESS ID: ' . $id);
            return back()->with('success', '✅ Balasan Ulasan #' . $id . ' BERHASIL!');
        } catch (\Exception $e) {
            Log::error('❌ replyTestimonial ERROR ID:' . $id . ': ' . $e->getMessage());
            return back()->with('error', '❌ GAGAL Reply Ulasan #' . $id . ': ' . $e->getMessage());
        }
    }

    public function deleteTestimonial(int $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Ulasan berhasil dihapus.']);
        }

        return back()->with('success', 'Ulasan berhasil dihapus.');
    }

    public function showBeranda() // Sesuaikan nama fungsinya dengan yang kamu punya
    {
        $testimonials = Testimonial::latest()->get();
        return view('beranda', compact('testimonials'));
    }
    public function laporanIndex(Request $request)
    {
        $query = Booking::query();
        $title = 'Laporan Semua';

        if ($request->filter == 'hari') {
            $query->whereDate('created_at', Carbon::today());
            $title = 'Laporan Harian';
        } elseif ($request->filter == 'minggu') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $title = 'Laporan Mingguan';
        } elseif ($request->filter == 'bulan') {
            $query->whereMonth('created_at', Carbon::now()->month);
            $title = 'Laporan Bulanan';
        } elseif ($request->filter == 'tahun') {
            $query->whereYear('created_at', Carbon::now()->year);
            $title = 'Laporan Tahunan';
        }

        $bookings = $query->get();
        $totalPendapatan = $query->where('status', 'Lunas')->sum('harga');

        return view('admin.laporan', compact('bookings', 'totalPendapatan', 'title'));
    }

    public function cetakLaporan(Request $request)
    {
        $query = Booking::query();

        // Filter yang sama untuk PDF
        if ($request->filter == 'hari') {
            $query->whereDate('created_at', Carbon::today());
            $label = "Hari Ini";
        } elseif ($request->filter == 'minggu') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $label = "Minggu Ini";
        } elseif ($request->filter == 'bulan') {
            $query->whereMonth('created_at', Carbon::now()->month);
            $label = "Bulan Ini";
        } elseif ($request->filter == 'tahun') {
            $query->whereYear('created_at', Carbon::now()->year);
            $label = "Tahun Ini";
        } else {
            $label = "Semua Data";
        }

        $bookings = $query->get();
        $total = $query->where('status', 'Lunas')->sum('harga');

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf-laporan', compact('bookings', 'total', 'label'));
        return $pdf->download('Laporan-Booking-' . $label . '.pdf');
    }
    public function confirm(Request $request, int $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'status' => 'nullable|string|in:Pending,Lunas,Rejected',
            'link_results' => 'nullable|url|max:255',
        ]);

        if ($request->filled('status')) {
            $booking->status = $request->status;
        }

        if ($request->filled('link_results')) {
            $booking->link_results = $request->link_results;
        }

        $booking->save();

        if ($booking->status === 'Lunas') {
            $this->syncFullPaymentFields($booking);

            Mail::raw(
                "Halo {$booking->nama_customer},\n\nPembayaran Anda telah kami konfirmasi. Terima kasih telah menggunakan layanan kami.\n\nKode booking: {$booking->booking_code}",
                function ($message) use ($booking) {
                    $message->to($booking->email)
                        ->subject('Pembayaran Booking Dikonfirmasi');
                }
            );
        }

        return redirect()->back()->with('success', 'Data booking berhasil diperbarui!');
    }

    public function track(Request $request)
    {
        $booking = Booking::where('booking_code', $request->code)->first();

        if (!$booking) {
            return back()->with('error', 'Kode booking tidak ditemukan.');
        }

        return view('track-result', compact('booking'));
    }
    public function updatePhotographer(Request $request, int $id)
    {
        $booking = \App\Models\Booking::findOrFail($id);
        $booking->update([
            'photographer_name' => $request->photographer_name
        ]);

        return back()->with('success', 'Fotografer berhasil diupdate!');
    }
    public function storePhotographer(Request $request)
    {
        \App\Models\Photographer::create([
            'name' => $request->name,
            'team_name' => $request->team_name,
            'phone' => $request->phone
        ]);

        return back()->with('success', 'Fotografer baru berhasil ditambahkan!');
    }
    public function deletePhotographer(int $id)
    {
        try {
            $photographer = \App\Models\Photographer::findOrFail($id);
            $photographer->delete();
            return back()->with('success', 'Fotografer berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus fotografer!');
        }
    }

    public function uploadProof(Request $request, int $id)
    {
        try {
            $request->validate([
                'proof_file' => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);

            $booking = \App\Models\Booking::findOrFail($id);

            if ($request->hasFile('proof_file')) {
                // Simpan file ke storage/app/public/proofs
                $filename = 'proof_' . time() . '.' . $request->proof_file->extension();
                $request->proof_file->storeAs('proofs', $filename, 'public');

                // Update database
                $booking->update([
                    'proof_payment' => $filename,
                    'status' => 'Pending Verification' // Status berubah agar admin tahu
                ]);

                // Redirect ke halaman booking success dengan pesan sukses
                return redirect()->route('home')->with('success', 'Bukti transfer berhasil dikirim! Admin akan memverifikasi pesanan Anda.');
            }

            return back()->with('error', 'Gagal mengunggah file.');
        } catch (\Exception $e) {
            Log::error('Upload Proof Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function verifyPayment(Request $request, int $id)
    {
        try {
            Log::info('🔧 DEBUG verifyPayment called for ID: ' . $id, ['data' => $request->all()]);

            $request->validate([
                'amount_paid' => 'required|numeric|min:0',
                'payment_status' => 'required|in:pending,down_payment,full_payment',
                'admin_feedback' => 'nullable|string|max:1000',
                'link_results' => 'nullable|url|max:255',
            ]);

            $booking = Booking::findOrFail($id);
            $paymentStatus = $request->payment_status;
            $amountPaid = (float) $request->amount_paid;
            $resolvedStatus = $this->resolveBookingStatusFromPayment($booking, $paymentStatus);

            if ($paymentStatus === 'full_payment') {
                $amountPaid = max($amountPaid, (float) $booking->harga);
            }

            $booking->update([
                'amount_paid' => $amountPaid,
                'payment_status' => $paymentStatus,
                'status' => $resolvedStatus,
                'link_results' => $request->filled('link_results') ? $request->link_results : $booking->link_results,
            ]);

            if ($request->filled('admin_feedback') && $booking->email) {
                Mail::raw(
                    "Halo {$booking->nama_customer},\n\nPembayaran Anda telah kami verifikasi.\n\nPesan dari admin: {$request->admin_feedback}\n\nTerima kasih.\n\nKode booking: {$booking->booking_code}",
                    function ($message) use ($booking) {
                        $message->to($booking->email)
                            ->subject('Pembayaran Anda Telah Diverifikasi');
                    }
                );
            }

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Pembayaran berhasil diverifikasi!']);
            }

            Log::info('✅ verifyPayment SUCCESS ID: ' . $id);
            return back()->with('success', '✅ Validasi Pembayaran Booking #' . $id . ' BERHASIL!');
        } catch (\Exception $e) {
            Log::error('❌ verifyPayment ERROR ID:' . $id . ': ' . $e->getMessage());
            return back()->with('error', '❌ GAGAL Validasi Booking #' . $id . ': ' . $e->getMessage());
        }
    }

    /**
     * Tolak booking dengan alasan
     */
    public function rejectBooking(Request $request, int $id)
    {
        $request->validate([
            'rejection_note' => 'required|string|max:500',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Rejected',
            'payment_status' => 'rejected',
            'rejection_note' => $request->rejection_note
        ]);

        if ($request->filled('rejection_note') && $booking->email) {
            Mail::raw(
                "Halo {$booking->nama_customer},\n\nBooking Anda telah ditolak.\n\nAlasan: {$request->rejection_note}\n\nSilakan hubungi admin jika perlu klarifikasi.\n\nKode booking: {$booking->booking_code}",
                function ($message) use ($booking) {
                    $message->to($booking->email)
                        ->subject('Booking Anda Ditolak');
                }
            );
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Booking ditolak dengan alasan: ' . $request->rejection_note]);
        }

        return back()->with('success', 'Booking ditolak dengan alasan: ' . $request->rejection_note);
    }

    /**
     * Update payment amount untuk booking
     */
    public function updatePaymentAmount(Request $request, int $id)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
        ]);

        $booking = Booking::findOrFail($id);
        $harga_total = $booking->harga;

        if ($request->amount_paid >= $harga_total) {
            $payment_status = 'full_payment';
            $status = 'Lunas';
        } elseif ($request->amount_paid > 0) {
            $payment_status = 'down_payment';
            $status = 'Confirmed';
        } else {
            $payment_status = 'pending';
            $status = $booking->proof_payment ? 'Pending Verification' : 'Pending';
        }

        $booking->update([
            'amount_paid' => $request->amount_paid,
            'payment_status' => $payment_status,
            'status' => $status
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Jumlah pembayaran berhasil diperbarui!']);
        }

        return back()->with('success', 'Jumlah pembayaran berhasil diperbarui!');
    }
}
