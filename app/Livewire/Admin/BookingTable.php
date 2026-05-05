<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Booking;
use App\Models\Photographer;

class BookingTable extends Component
{
    use WithPagination;

    public string $componentRootKey = 'booking-table-root';
    public string $search   = '';
    public string $category = '';
    public string $month    = '';

    private function resetFiltersPagination(): void
    {
        $this->resetPage();
    }

    public function updatingSearch(): void
    {
        $this->resetFiltersPagination();
    }

    public function updatingCategory(): void
    {
        $this->resetFiltersPagination();
    }

    public function updatingMonth(): void
    {
        $this->resetFiltersPagination();
    }

    public function render()
    {
        $bookings = Booking::query()
            ->when(
                $this->search,
                fn($q) =>
                $q->where('nama_customer', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%')
            )
            ->when($this->category, fn($q) => $q->where('kategori', $this->category))
            ->when($this->month,    fn($q) => $q->whereMonth('tanggal_pemotretan', $this->month))
            ->latest()
            ->paginate(10);

        $photographers = Photographer::all();

        return view('livewire.admin.booking-table', compact('bookings', 'photographers'));
    }
}
