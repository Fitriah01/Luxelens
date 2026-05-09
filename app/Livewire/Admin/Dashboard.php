<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Photographer;
use App\Models\Testimonial;

class Dashboard extends Component
{
    public string $activeTab = 'overview';
    public string $dashboardWrapperKey = 'admin-wrapper';
    public string $bookingTableKey = 'booking-table';
    public string $testimonialTableKey = 'testimonial-table';

    // Photographer modal state
    public bool   $showPhotographerModal = false;
    public string $p_name               = '';
    public string $p_team               = '';
    public string $p_specialization     = '';
    public string $p_phone              = '';
    public array  $p_work_days          = [];
    public ?int   $p_edit_id            = null;

    public function mount(): void
    {
        $tab = request()->query('tab', 'overview');
        $allowedTabs = ['overview', 'bookings', 'team', 'reviews', 'gallery'];

        $this->activeTab = in_array($tab, $allowedTabs, true) ? $tab : 'overview';
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    /* ── Photographer CRUD ── */

    public function openAddPhotographer(): void
    {
        $this->resetPhotographerForm();
        $this->showPhotographerModal = true;
    }

    public function editPhotographer(int $id): void
    {
        $p = Photographer::findOrFail($id);
        $this->p_edit_id        = $id;
        $this->p_name           = $p->name;
        $this->p_team           = $p->team_name;
        $this->p_specialization = $p->specialization ?? '';
        $this->p_phone          = $p->phone ?? '';
        $this->p_work_days      = $p->work_days ?? [];
        $this->showPhotographerModal = true;
    }

    public function savePhotographer(): void
    {
        $this->validate([
            'p_name' => 'required|string|max:100',
            'p_team' => 'required|string|max:100',
        ]);

        $data = [
            'name'           => $this->p_name,
            'team_name'      => $this->p_team,
            'specialization' => $this->p_specialization,
            'phone'          => $this->p_phone,
            'work_days'      => $this->p_work_days,
        ];

        if ($this->p_edit_id) {
            Photographer::find($this->p_edit_id)?->update($data);
        } else {
            Photographer::create($data);
        }

        $this->showPhotographerModal = false;
        $this->resetPhotographerForm();
        session()->flash('photographer_msg', 'Data fotografer berhasil disimpan.');
    }

    public function deletePhotographer(int $id): void
    {
        Photographer::find($id)?->delete();
        session()->flash('photographer_msg', 'Fotografer dihapus.');
    }

    private function resetPhotographerForm(): void
    {
        $this->p_edit_id        = null;
        $this->p_name           = '';
        $this->p_team           = '';
        $this->p_specialization = '';
        $this->p_phone          = '';
        $this->p_work_days      = [];
    }

    private function fullyPaidBookingsQuery()
    {
        return Booking::query()->where(function ($query) {
            $query->where('payment_status', 'full_payment')
                ->orWhereIn('status', ['Lunas', 'Editing', 'Selesai']);
        });
    }

    public function render()
    {
        $totalIncome   = $this->fullyPaidBookingsQuery()->sum('harga');
        $totalBookings = Booking::count();
        $pendingCount  = Booking::whereNotIn('status', ['Editing', 'Selesai', 'Cancelled', 'Rejected'])->count();
        $reviewCount   = Testimonial::count();

        $grafikBulanan = $this->fullyPaidBookingsQuery()
            ->selectRaw('MONTHNAME(created_at) as bulan, SUM(harga) as total, MONTH(created_at) as bulan_angka')
            ->groupBy('bulan', 'bulan_angka')
            ->orderBy('bulan_angka')
            ->pluck('total', 'bulan');

        $grafikKategori = Booking::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        $photographers = Photographer::all();
        $galleries     = Gallery::latest()->get();

        return view('livewire.admin.dashboard', compact(
            'totalIncome',
            'totalBookings',
            'pendingCount',
            'reviewCount',
            'grafikBulanan',
            'grafikKategori',
            'photographers',
            'galleries'
        ));
    }
}
