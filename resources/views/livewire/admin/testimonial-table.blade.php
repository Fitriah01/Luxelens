<div id="luxelens-testimonial-table" wire:key="{{ $componentRootKey }}">
    {{-- Flash msg --}}
    @if (session('testi_msg'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            style="margin-bottom:20px;padding:12px 18px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.2);border-radius:10px;font-size:12px;color:#2ecc71;">
            {{ session('testi_msg') }}
        </div>
    @endif

    {{-- Filter --}}
    <div style="display:flex;gap:12px;margin-bottom:24px;">
        <div style="position:relative;flex:1;max-width:360px;">
            <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);opacity:.35;" width="13"
                height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input wire:model.live.debounce.400ms="search" type="text" placeholder="Cari nama / isi ulasan…"
                style="width:100%;padding:10px 14px 10px 38px;font-size:12px;">
        </div>
        <div wire:loading.flex style="display:none;align-items:center;gap:8px;">
            <div
                style="width:14px;height:14px;border:2px solid #222;border-top-color:#E1C564;border-radius:50%;animation:spin .7s linear infinite;">
            </div>
            <span style="font-size:11px;color:#555;">Memuat…</span>
        </div>
    </div>

    {{-- Table --}}
    <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;font-size:12px;">
            <thead>
                <tr style="border-bottom:1px solid rgba(255,255,255,.06);">
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        ID</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        PELANGGAN</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        RATING</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        KOMENTAR</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        BALASAN STUDIO</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        STATUS</th>
                    <th
                        style="padding:10px 12px;text-align:center;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $t)
                    <tr wire:key="testimonial-row-{{ $t->id }}"
                        style="border-bottom:1px solid rgba(255,255,255,.03);transition:background .2s;"
                        onmouseover="this.style.background='rgba(255,255,255,.02)'"
                        onmouseout="this.style.background='transparent'">

                        <td style="padding:14px 12px;color:#333;font-weight:700;">#{{ $t->id }}</td>

                        <td style="padding:14px 12px;">
                            <div style="font-size:13px;font-weight:600;color:#fff;">{{ $t->nama_customer }}</div>
                            <div style="font-size:10px;color:#444;margin-top:2px;">{{ $t->created_at->format('d M Y') }}
                            </div>
                        </td>

                        <td style="padding:14px 12px;">
                            <div style="display:flex;gap:2px;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span
                                        style="font-size:12px;color:{{ $i <= $t->bintang ? '#E1C564' : '#222' }};">★</span>
                                @endfor
                            </div>
                        </td>

                        <td style="padding:14px 12px;max-width:220px;">
                            <span style="font-size:12px;color:#aaa;line-height:1.5;display:block;">
                                {{ \Illuminate\Support\Str::limit($t->pesan, 90) }}
                            </span>
                        </td>

                        <td style="padding:14px 12px;max-width:200px;">
                            @if ($t->admin_reply)
                                <span style="font-size:11px;color:#555;font-style:italic;line-height:1.4;">
                                    {{ \Illuminate\Support\Str::limit($t->admin_reply, 80) }}
                                </span>
                            @else
                                <span style="font-size:10px;color:#2a2a2a;">—</span>
                            @endif
                        </td>

                        <td style="padding:14px 12px;">
                            @if ($t->status === 'approved')
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(46,204,113,.1);color:#2ecc71;border:1px solid rgba(46,204,113,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">APPROVED</span>
                            @else
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(243,156,18,.1);color:#f39c12;border:1px solid rgba(243,156,18,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">PENDING</span>
                            @endif
                        </td>

                        <td style="padding:14px 12px;">
                            <div style="display:flex;gap:5px;justify-content:center;flex-wrap:wrap;">
                                @if ($t->status !== 'approved')
                                    <button wire:click="approve({{ $t->id }})"
                                        style="padding:5px 10px;border-radius:8px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.25);color:#2ecc71;font-size:9px;font-weight:700;cursor:pointer;transition:all .2s;"
                                        onmouseover="this.style.background='rgba(46,204,113,.25)'"
                                        onmouseout="this.style.background='rgba(46,204,113,.1)'">SETUJU</button>
                                @endif

                                <button wire:click="openReply({{ $t->id }})"
                                    style="padding:5px 10px;border-radius:8px;background:rgba(225,197,100,.1);border:1px solid rgba(225,197,100,.25);color:#E1C564;font-size:9px;font-weight:700;cursor:pointer;transition:all .2s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.25)'"
                                    onmouseout="this.style.background='rgba(225,197,100,.1)'">
                                    {{ $t->admin_reply ? 'EDIT BALASAN' : 'BALAS' }}
                                </button>

                                <button wire:click="deleteItem({{ $t->id }})" wire:confirm="Hapus ulasan ini?"
                                    style="padding:5px 10px;border-radius:8px;background:rgba(255,68,68,.08);border:1px solid rgba(255,68,68,.2);color:#ff4444;font-size:9px;font-weight:700;cursor:pointer;transition:all .2s;"
                                    onmouseover="this.style.background='rgba(255,68,68,.2)'"
                                    onmouseout="this.style.background='rgba(255,68,68,.08)'">HAPUS</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:60px;text-align:center;color:#333;font-size:13px;">
                            Tidak ada ulasan ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Custom Pagination --}}
    @if ($testimonials->hasPages())
        <div style="margin-top:28px;padding-top:20px;border-top:1px solid rgba(255,255,255,.05);">
            <div style="text-align:center;margin-bottom:14px;font-size:11px;color:#444;letter-spacing:.08em;">
                Halaman <strong style="color:#E1C564;">{{ $testimonials->currentPage() }}</strong>
                dari <strong style="color:#fff;">{{ $testimonials->lastPage() }}</strong>
                · Total <strong style="color:#fff;">{{ $testimonials->total() }}</strong> ulasan
            </div>
            <div style="display:flex;justify-content:center;align-items:center;gap:5px;flex-wrap:wrap;">
                @if ($testimonials->onFirstPage())
                    <span
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#0a0a0a;border:1px solid #111;color:#222;font-size:13px;cursor:not-allowed;">‹</span>
                @else
                    <button wire:click="previousPage"
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:13px;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                        onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';">‹</button>
                @endif
                @foreach (range(max(1, $testimonials->currentPage() - 2), min($testimonials->lastPage(), $testimonials->currentPage() + 2)) as $page)
                    @if ($page === $testimonials->currentPage())
                        <span
                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#E1C564;border:1px solid #E1C564;color:#050505;font-size:11px;font-weight:800;box-shadow:0 0 14px rgba(225,197,100,.25);">{{ $page }}</span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:11px;cursor:pointer;transition:all .2s;"
                            onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                            onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';">{{ $page }}</button>
                    @endif
                @endforeach
                @if ($testimonials->hasMorePages())
                    <button wire:click="nextPage"
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:13px;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                        onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';">›</button>
                @else
                    <span
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#0a0a0a;border:1px solid #111;color:#222;font-size:13px;cursor:not-allowed;">›</span>
                @endif
            </div>
        </div>
    @endif

    {{-- Reply Modal (Livewire) --}}
    @if ($showReplyModal)
        <div x-data x-init="$el.style.display = 'flex'"
            style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.88);backdrop-filter:blur(12px);justify-content:center;align-items:center;">
            <div
                style="background:#0f0f0f;border:1px solid rgba(225,197,100,.2);border-radius:20px;padding:36px;width:460px;max-width:95vw;">
                <h3 style="font-family:'Playfair Display',serif;color:#E1C564;margin:0 0 6px;font-size:20px;">Balas
                    Ulasan</h3>
                <p style="font-size:11px;color:#555;margin:0 0 24px;">Tulis balasan singkat dari LuxeLens Studio untuk
                    pelanggan.</p>
                <textarea wire:model="replyText" rows="4" placeholder="Tulis balasan di sini…"
                    style="width:100%;padding:12px 14px;margin-bottom:20px;font-size:13px;resize:vertical;border-radius:10px;"></textarea>
                <button wire:click="saveReply"
                    style="width:100%;padding:13px;background:#E1C564;border:none;color:#050505;font-size:11px;font-weight:800;letter-spacing:.15em;cursor:pointer;border-radius:10px;">SIMPAN
                    BALASAN</button>
                <button wire:click="$set('showReplyModal', false)"
                    style="width:100%;padding:10px;margin-top:8px;background:none;border:none;color:#444;font-size:11px;cursor:pointer;">BATAL</button>
            </div>
        </div>
    @endif
</div>
