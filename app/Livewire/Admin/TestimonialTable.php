<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Testimonial;

class TestimonialTable extends Component
{
    use WithPagination;

    public string $componentRootKey = 'testimonial-table-root';
    public string $search        = '';
    public bool   $showReplyModal = false;
    public ?int   $replyId       = null;
    public string $replyText     = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function approve(int $id): void
    {
        Testimonial::find($id)?->update(['status' => 'approved']);
        session()->flash('testi_msg', 'Ulasan disetujui.');
    }

    public function deleteItem(int $id): void
    {
        Testimonial::find($id)?->delete();
        session()->flash('testi_msg', 'Ulasan dihapus.');
    }

    public function openReply(int $id): void
    {
        $t = Testimonial::find($id);
        $this->replyId    = $id;
        $this->replyText  = $t?->admin_reply ?? '';
        $this->showReplyModal = true;
    }

    public function saveReply(): void
    {
        $this->validate(['replyText' => 'required|string|max:1000']);
        Testimonial::find($this->replyId)?->update(['admin_reply' => $this->replyText]);
        $this->showReplyModal = false;
        $this->replyId   = null;
        $this->replyText = '';
        session()->flash('testi_msg', 'Balasan disimpan.');
    }

    public function render()
    {
        $testimonials = Testimonial::when(
            $this->search,
            fn($q) =>
            $q->where('nama_customer', 'like', '%' . $this->search . '%')
                ->orWhere('pesan', 'like', '%' . $this->search . '%')
        )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.testimonial-table', compact('testimonials'));
    }
}
