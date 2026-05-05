<div id="luxelens-booking-table" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = ''.e($componentRootKey).''; ?>wire:key="<?php echo e($componentRootKey); ?>" x-data="{
    payModal: false,
    payId: null,
    payTotal: 0,
    payPaid: 0,
    payStatus: 'pending',
    payLink: '',
    rejectModal: false,
    rejectId: null,
    selesaiModal: false,
    selesaiId: null,
    selesaiLink: '',
    openPay(id, total, paid, status, link) {
        this.payId = id;
        this.payTotal = total;
        this.payPaid = paid || total;
        this.payStatus = status || 'pending';
        this.payLink = link || '';
        this.payModal = true;
    },
    openReject(id) {
        this.rejectId = id;
        this.rejectModal = true;
    },
    openSelesai(id, link) {
        this.selesaiId = id;
        this.selesaiLink = link || '';
        this.selesaiModal = true;
    }
}">

    
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:24px;align-items:center;">
        <div style="position:relative;flex:1;min-width:220px;">
            <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);opacity:.35;" width="14"
                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input wire:model.live.debounce.400ms="search" type="text" placeholder="Cari nama / ID booking…"
                style="width:100%;padding:10px 14px 10px 38px;font-size:12px;">
        </div>

        <select wire:model.live="category" style="padding:10px 14px;font-size:12px;min-width:150px;">
            <option value="">Semua Kategori</option>
            <option value="wedding">Wedding</option>
            <option value="wisuda">Graduation</option>
            <option value="prewed">Pre-Wedding</option>
            <option value="family">Family</option>
            <option value="portrait">Portrait</option>
        </select>

        <select wire:model.live="month" style="padding:10px 14px;font-size:12px;min-width:140px;">
            <option value="">Semua Bulan</option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option value="<?php echo e($m); ?>"><?php echo e(\Carbon\Carbon::create()->month($m)->format('F')); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>

        <a href="<?php echo e(route('laporan.cetak', ['filter' => 'semua'])); ?>"
            style="padding:10px 20px;background:rgba(225,197,100,.1);border:1px solid rgba(225,197,100,.3);color:#E1C564;font-size:11px;font-weight:700;letter-spacing:.12em;text-decoration:none;border-radius:10px;white-space:nowrap;transition:all .2s;"
            onmouseover="this.style.background='rgba(225,197,100,.2)'"
            onmouseout="this.style.background='rgba(225,197,100,.1)'">
            ↓ EXPORT
        </a>
    </div>

    
    <div wire:loading.flex style="display:none;justify-content:center;padding:40px;gap:12px;align-items:center;">
        <div
            style="width:18px;height:18px;border:2px solid #222;border-top-color:#E1C564;border-radius:50%;animation:spin .7s linear infinite;">
        </div>
        <span style="font-size:12px;color:#555;">Memuat data…</span>
    </div>
    <style>
        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }
    </style>

    
    <div wire:loading.remove style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;font-size:12px;">
            <thead>
                <tr style="border-bottom:1px solid rgba(255,255,255,.06);">
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        ID</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        CLIENT</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        SERVICE</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        SCHEDULE</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        PHOTOGRAPHER</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        PRICE</th>
                    <th
                        style="padding:10px 12px;text-align:left;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        STATUS</th>
                    <th
                        style="padding:10px 12px;text-align:center;font-size:10px;letter-spacing:.12em;color:#444;font-weight:600;">
                        ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'booking-row-'.e($b->id).''; ?>wire:key="booking-row-<?php echo e($b->id); ?>"
                        style="border-bottom:1px solid rgba(255,255,255,.03);transition:background .2s;"
                        onmouseover="this.style.background='rgba(255,255,255,.02)'"
                        onmouseout="this.style.background='transparent'">

                        <td style="padding:14px 12px;color:#333;font-weight:700;">#<?php echo e($b->id); ?></td>

                        <td style="padding:14px 12px;">
                            <div style="font-size:13px;font-weight:600;color:#fff;"><?php echo e($b->nama_customer); ?></div>
                            <div style="font-size:10px;color:#444;margin-top:2px;"><?php echo e($b->nomor_telepon); ?></div>
                        </td>

                        <td style="padding:14px 12px;">
                            <span
                                style="font-size:10px;letter-spacing:.1em;font-weight:600;color:#aaa;text-transform:uppercase;"><?php echo e($b->kategori); ?></span>
                        </td>

                        <td style="padding:14px 12px;font-size:11px;color:#666;">
                            <?php echo e(date('d M Y', strtotime($b->tanggal_pemotretan))); ?>

                        </td>

                        <td style="padding:14px 12px;">
                            <form action="<?php echo e(route('admin.update.photographer', $b->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <select name="photographer_name" onchange="this.form.submit()"
                                    style="padding:6px 10px;font-size:11px;border-radius:8px;background:#0f0f0f;border:1px solid #1a1a1a;color:#aaa;max-width:160px;">
                                    <option value="">— Assign —</option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $photographers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <?php $pn = $p->name.' ('.$p->team_name.')'; ?>
                                        <option value="<?php echo e($pn); ?>"
                                            <?php echo e($b->photographer_name === $pn ? 'selected' : ''); ?>><?php echo e($pn); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </form>
                        </td>

                        <td style="padding:14px 12px;color:#E1C564;font-weight:700;font-size:13px;">
                            Rp <?php echo e(number_format($b->harga, 0, ',', '.')); ?>

                        </td>

                        <td style="padding:14px 12px;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->status === 'Selesai'): ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(46,204,113,.1);color:#2ecc71;border:1px solid rgba(46,204,113,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">✓
                                    SELESAI</span>
                            <?php elseif($b->status === 'Lunas'): ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(46,204,113,.1);color:#2ecc71;border:1px solid rgba(46,204,113,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">VERIFIED</span>
                            <?php elseif($b->status === 'Editing'): ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(52,152,219,.1);color:#3498db;border:1px solid rgba(52,152,219,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">EDITING</span>
                            <?php elseif($b->status === 'Cancelled' || $b->status === 'Rejected'): ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(255,68,68,.1);color:#ff4444;border:1px solid rgba(255,68,68,.2);font-size:9px;font-weight:800;letter-spacing:.1em;">REJECTED</span>
                            <?php elseif($b->status === 'Waiting for Quote'): ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(124,124,255,.1);color:#7c7cff;border:1px solid rgba(124,124,255,.25);font-size:9px;font-weight:800;letter-spacing:.1em;">⏳
                                    QUOTE</span>
                            <?php else: ?>
                                <span
                                    style="padding:4px 10px;border-radius:20px;background:rgba(243,156,18,.1);color:#f39c12;border:1px solid rgba(243,156,18,.2);font-size:9px;font-weight:800;letter-spacing:.1em;"><?php echo e(strtoupper($b->status)); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->proof_payment): ?>
                                <a href="<?php echo e(asset('storage/proofs/' . $b->proof_payment)); ?>" target="_blank"
                                    style="display:block;margin-top:4px;font-size:9px;color:#3498db;text-decoration:none;">👁
                                    VIEW PROOF</a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->booking_type === 'event' && $b->event_details): ?>
                                <div style="margin-top:5px;font-size:8px;color:#555;max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"
                                    title="<?php echo e($b->event_details); ?>">
                                    📋 <?php echo e(Str::limit($b->event_details, 30)); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>

                        <td style="padding:14px 12px;">
                            <div style="display:flex;gap:6px;justify-content:center;flex-wrap:wrap;">
                                <a href="/admin/download-pdf/<?php echo e($b->id); ?>"
                                    style="padding:5px 10px;border-radius:8px;background:#111;border:1px solid #222;color:#aaa;font-size:10px;font-weight:700;text-decoration:none;transition:all .2s;"
                                    onmouseover="this.style.borderColor='#E1C564';this.style.color='#E1C564';"
                                    onmouseout="this.style.borderColor='#222';this.style.color='#aaa';">PDF</a>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->nomor_telepon): ?>
                                    <?php
                                        $phone = preg_replace('/[^0-9]/', '', $b->nomor_telepon);
                                        if (str_starts_with($phone, '0')) {
                                            $phone = '62' . substr($phone, 1);
                                        }
                                        $waUrl =
                                            "https://wa.me/{$phone}?text=" .
                                            urlencode("Halo {$b->nama_customer}, pembayaran Anda telah kami terima.");
                                    ?>
                                    <a href="<?php echo e($waUrl); ?>" target="_blank"
                                        style="padding:5px 10px;border-radius:8px;background:#128C7E;border:1px solid #128C7E;color:#fff;font-size:10px;font-weight:700;text-decoration:none;">WA</a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->status !== 'Cancelled'): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->status !== 'Lunas'): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($b->proof_payment): ?>
                                            <button type="button"
                                                @click="openPay(<?php echo e($b->id); ?>, <?php echo e($b->harga); ?>, <?php echo e($b->amount_paid ?? $b->harga); ?>, '<?php echo e($b->payment_status ?? 'pending'); ?>', '<?php echo e($b->link_results ?? ''); ?>')"
                                                style="padding:5px 10px;border-radius:8px;background:rgba(225,197,100,.12);border:1px solid rgba(225,197,100,.3);color:#E1C564;font-size:10px;font-weight:700;cursor:pointer;transition:all .2s;"
                                                onmouseover="this.style.background='rgba(225,197,100,.25)'"
                                                onmouseout="this.style.background='rgba(225,197,100,.12)'">VALIDASI</button>
                                        <?php else: ?>
                                            <span
                                                style="padding:5px 10px;border-radius:8px;background:#0a0a0a;border:1px solid #1a1a1a;color:#333;font-size:10px;font-weight:700;">MENUNGGU</span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <button type="button" @click="openReject(<?php echo e($b->id); ?>)"
                                            style="padding:5px 10px;border-radius:8px;background:rgba(255,68,68,.1);border:1px solid rgba(255,68,68,.2);color:#ff4444;font-size:10px;font-weight:700;cursor:pointer;transition:all .2s;"
                                            onmouseover="this.style.background='rgba(255,68,68,.25)'"
                                            onmouseout="this.style.background='rgba(255,68,68,.1)'">TOLAK</button>
                                    <?php elseif($b->status === 'Lunas'): ?>
                                        <a href="/admin/update-status/<?php echo e($b->id); ?>/Editing"
                                            style="padding:5px 10px;border-radius:8px;background:rgba(52,152,219,.12);border:1px solid rgba(52,152,219,.3);color:#3498db;font-size:10px;font-weight:700;text-decoration:none;transition:all .2s;"
                                            onmouseover="this.style.background='rgba(52,152,219,.25)'"
                                            onmouseout="this.style.background='rgba(52,152,219,.12)'"
                                            onclick="return confirm('Tandai sesi ini sebagai Editing?')">EDITING</a>
                                    <?php elseif($b->status === 'Editing'): ?>
                                        <button type="button"
                                            @click="openSelesai(<?php echo e($b->id); ?>, '<?php echo e($b->link_results ?? ''); ?>')"
                                            style="padding:5px 10px;border-radius:8px;background:rgba(46,204,113,.12);border:1px solid rgba(46,204,113,.3);color:#2ecc71;font-size:10px;font-weight:700;cursor:pointer;transition:all .2s;"
                                            onmouseover="this.style.background='rgba(46,204,113,.25)'"
                                            onmouseout="this.style.background='rgba(46,204,113,.12)'">SELESAI</button>
                                    <?php elseif($b->status === 'Selesai'): ?>
                                        <span
                                            style="padding:5px 10px;border-radius:8px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.2);color:#2ecc71;font-size:10px;font-weight:700;">✓
                                            SELESAI</span>
                                    <?php else: ?>
                                        <span
                                            style="padding:5px 10px;border-radius:8px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.2);color:#2ecc71;font-size:10px;font-weight:700;">VERIFIED</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="8" style="padding:60px;text-align:center;color:#333;font-size:13px;">
                            Tidak ada data booking ditemukan.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->hasPages()): ?>
        <div style="margin-top:28px;padding-top:20px;border-top:1px solid rgba(255,255,255,.05);">
            <div style="text-align:center;margin-bottom:14px;font-size:11px;color:#444;letter-spacing:.08em;">
                Halaman <strong style="color:#E1C564;"><?php echo e($bookings->currentPage()); ?></strong>
                dari <strong style="color:#fff;"><?php echo e($bookings->lastPage()); ?></strong>
                · Total <strong style="color:#fff;"><?php echo e($bookings->total()); ?></strong> booking
            </div>
            <div style="display:flex;justify-content:center;align-items:center;gap:5px;flex-wrap:wrap;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->onFirstPage()): ?>
                    <span
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#0a0a0a;border:1px solid #111;color:#222;font-size:13px;cursor:not-allowed;">‹</span>
                <?php else: ?>
                    <button wire:click="previousPage"
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:13px;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                        onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';">‹</button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = range(max(1, $bookings->currentPage() - 2), min($bookings->lastPage(), $bookings->currentPage() + 2)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page === $bookings->currentPage()): ?>
                        <span
                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#E1C564;border:1px solid #E1C564;color:#050505;font-size:11px;font-weight:800;box-shadow:0 0 14px rgba(225,197,100,.25);"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <button wire:click="gotoPage(<?php echo e($page); ?>)"
                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:11px;cursor:pointer;transition:all .2s;"
                            onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                            onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';"><?php echo e($page); ?></button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->hasMorePages()): ?>
                    <button wire:click="nextPage"
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:13px;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.background='rgba(225,197,100,.12)';this.style.color='#E1C564';"
                        onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#aaa';">›</button>
                <?php else: ?>
                    <span
                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#0a0a0a;border:1px solid #111;color:#222;font-size:13px;cursor:not-allowed;">›</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div
                style="text-align:center;margin-top:10px;font-size:10px;color:#2a2a2a;letter-spacing:.12em;text-transform:uppercase;">
                Menampilkan <?php echo e($bookings->firstItem()); ?>–<?php echo e($bookings->lastItem()); ?> dari <?php echo e($bookings->total()); ?>

                data
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <style>
        /* Pay Modal Core */
        .pm-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, .72);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .pm-card {
            position: relative;
            width: 500px;
            max-width: 96vw;
            max-height: 92vh;
            overflow-y: auto;
            background: rgba(8, 8, 8, .94);
            border: 1px solid rgba(225, 197, 100, .28);
            border-radius: 24px;
            padding: 36px 38px 32px;
            box-shadow:
                0 0 0 1px rgba(225, 197, 100, .06),
                0 0 60px rgba(225, 197, 100, .10),
                0 32px 80px rgba(0, 0, 0, .8);
            scrollbar-width: none;
        }

        .pm-card::-webkit-scrollbar {
            display: none;
        }

        /* Gold top-line accent */
        .pm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(225, 197, 100, .6), transparent);
            border-radius: 50%;
        }

        /* Header */
        .pm-icon-wrap {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: rgba(225, 197, 100, .10);
            border: 1px solid rgba(225, 197, 100, .22);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Amount input */
        .pm-amount-wrap {
            position: relative;
            margin-bottom: 28px;
        }

        .pm-amount-prefix {
            position: absolute;
            left: 0;
            bottom: 13px;
            font-size: 13px;
            color: rgba(225, 197, 100, .55);
            font-weight: 600;
            letter-spacing: .04em;
            pointer-events: none;
        }

        .pm-amount-input {
            width: 100%;
            background: none;
            border: none;
            border-bottom: 1.5px solid rgba(255, 255, 255, .10);
            outline: none;
            color: #fff;
            font-family: 'Courier New', Courier, monospace;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: .04em;
            padding: 8px 0 12px 38px;
            transition: border-color .25s;
            box-sizing: border-box;
        }

        .pm-amount-input:focus {
            border-bottom-color: rgba(225, 197, 100, .75);
        }

        .pm-amount-input::placeholder {
            color: rgba(255, 255, 255, .12);
            font-size: 22px;
        }

        /* Section label */
        .pm-label {
            display: block;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(225, 197, 100, .55);
            margin-bottom: 12px;
        }

        /* Selectable payment cards */
        .pm-pay-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 26px;
        }

        .pm-pay-card {
            position: relative;
            padding: 14px 10px 12px;
            border-radius: 14px;
            border: 1.5px solid rgba(255, 255, 255, .08);
            background: rgba(255, 255, 255, .03);
            cursor: pointer;
            transition: all .22s ease;
            text-align: center;
            user-select: none;
        }

        .pm-pay-card:hover {
            border-color: rgba(225, 197, 100, .35);
            background: rgba(225, 197, 100, .06);
        }

        .pm-pay-card.active {
            border-color: rgba(225, 197, 100, .7);
            background: rgba(225, 197, 100, .12);
            box-shadow: 0 0 18px rgba(225, 197, 100, .12);
        }

        .pm-pay-card-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, .2);
            margin: 0 auto 8px;
            transition: all .2s;
        }

        .pm-pay-card.active .pm-pay-card-dot {
            background: #E1C564;
            border-color: #E1C564;
            box-shadow: 0 0 8px rgba(225, 197, 100, .5);
        }

        .pm-pay-card-title {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .35);
            transition: color .2s;
            line-height: 1.4;
        }

        .pm-pay-card.active .pm-pay-card-title {
            color: #E1C564;
        }

        .pm-pay-card-sub {
            font-size: 8px;
            color: rgba(255, 255, 255, .18);
            margin-top: 3px;
            transition: color .2s;
        }

        .pm-pay-card.active .pm-pay-card-sub {
            color: rgba(225, 197, 100, .55);
        }

        /* Checkmark badge */
        .pm-pay-card .pm-check {
            position: absolute;
            top: 7px;
            right: 7px;
            opacity: 0;
            transition: opacity .2s;
        }

        .pm-pay-card.active .pm-check {
            opacity: 1;
        }

        /* Text inputs */
        .pm-field {
            width: 100%;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 12px;
            padding: 12px 16px;
            color: #fff;
            font-size: 12px;
            outline: none;
            transition: border-color .22s, box-shadow .22s;
            box-sizing: border-box;
            resize: vertical;
        }

        .pm-field::placeholder {
            color: rgba(255, 255, 255, .2);
        }

        .pm-field:focus {
            border-color: rgba(225, 197, 100, .45);
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .07);
        }

        /* Divider */
        .pm-divider {
            height: 1px;
            background: rgba(255, 255, 255, .05);
            margin: 24px 0;
        }

        /* Buttons */
        .pm-btn-save {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #D4AF37 0%, #E1C564 45%, #BFA15A 100%);
            border: none;
            border-radius: 12px;
            color: #050505;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: .2em;
            cursor: pointer;
            transition: all .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 24px rgba(225, 197, 100, .25);
        }

        .pm-btn-save:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 32px rgba(225, 197, 100, .38);
        }

        .pm-btn-save:active {
            transform: translateY(0);
        }

        .pm-btn-cancel {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: none;
            border: 1px solid rgba(225, 197, 100, .18);
            border-radius: 12px;
            color: rgba(225, 197, 100, .55);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .18em;
            cursor: pointer;
            transition: all .22s;
        }

        .pm-btn-cancel:hover {
            border-color: rgba(225, 197, 100, .45);
            color: #E1C564;
            background: rgba(225, 197, 100, .04);
        }

        /* Zoom-in entry */
        @keyframes pmZoomIn {
            from {
                opacity: 0;
                transform: scale(.94) translateY(12px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .pm-card-anim {
            animation: pmZoomIn .28s cubic-bezier(.34, 1.4, .64, 1) both;
        }

        /* Spinner */
        @keyframes pmSpin {
            to {
                transform: rotate(360deg);
            }
        }

        .pm-spinner {
            width: 14px;
            height: 14px;
            border: 2px solid rgba(5, 5, 5, .25);
            border-top-color: #050505;
            border-radius: 50%;
            animation: pmSpin .6s linear infinite;
            display: none;
        }
    </style>

    <div x-show="payModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="pm-overlay"
        style="display:none;" :style="payModal ? '' : 'display:none !important'"
        @keydown.escape.window="payModal = false">

        <div class="pm-card pm-card-anim" x-show="payModal" x-transition:enter="transition ease-out duration-280"
            x-transition:enter-start="opacity-0 scale-95 translate-y-3"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0" @click.stop>

            
            <div style="display:flex;align-items:center;gap:14px;margin-bottom:6px;">
                <div class="pm-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                        stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="3" ry="3" />
                        <line x1="1" y1="10" x2="23" y2="10" />
                    </svg>
                </div>
                <div>
                    <h3
                        style="font-family:'Playfair Display',serif;color:#E1C564;margin:0;font-size:19px;font-weight:700;line-height:1.2;">
                        Validasi Pembayaran</h3>
                    <p style="margin:3px 0 0;font-size:10px;color:#444;letter-spacing:.04em;">Konfirmasi & atur status
                        sesi foto klien</p>
                </div>
                
                <button type="button" @click="payModal = false"
                    style="margin-left:auto;width:30px;height:30px;border-radius:8px;border:1px solid rgba(255,255,255,.07);background:rgba(255,255,255,.04);color:#555;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s;flex-shrink:0;"
                    onmouseover="this.style.borderColor='rgba(255,68,68,.35)';this.style.color='#ff4444'"
                    onmouseout="this.style.borderColor='rgba(255,255,255,.07)';this.style.color='#555'">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>

            
            <div style="margin:18px 0 24px;">
                <span
                    style="display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:20px;background:rgba(225,197,100,.08);border:1px solid rgba(225,197,100,.18);font-size:10px;font-weight:700;color:rgba(225,197,100,.75);letter-spacing:.1em;">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M20 7H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        <circle cx="12" cy="12" r="2" />
                    </svg>
                    BOOKING ID #<span x-text="payId"></span>
                </span>
            </div>

            <form :action="'/admin/bookings/' + payId + '/verify-payment'" method="POST" id="pmForm"
                onsubmit="
                    document.getElementById('pmSaveText').style.display='none';
                    document.querySelector('.pm-spinner').style.display='block';
                    document.getElementById('pmSaveBtn').style.opacity='.7';
                    document.getElementById('pmSaveBtn').style.pointerEvents='none';
                ">
                <?php echo csrf_field(); ?>

                
                <input type="hidden" name="payment_status" id="pmHiddenStatus" :value="payStatus">

                
                <label class="pm-label">Jumlah Dibayar</label>
                <div class="pm-amount-wrap">
                    <span class="pm-amount-prefix">Rp</span>
                    <input type="number" name="amount_paid" :value="payPaid" placeholder="0"
                        class="pm-amount-input" required oninput="this.value = this.value.replace(/[^0-9]/g,'')">
                </div>

                
                <label class="pm-label">Status Pembayaran</label>
                <div class="pm-pay-cards" x-data="{ chosen: payStatus }">

                    
                    <div class="pm-pay-card" :class="chosen === 'pending' ? 'active' : ''"
                        @click="chosen = 'pending'; document.getElementById('pmHiddenStatus').value = 'pending'">
                        <div class="pm-check">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                                stroke-width="3">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <div class="pm-pay-card-dot"></div>
                        <div class="pm-pay-card-title">Pending</div>
                        <div class="pm-pay-card-sub">Belum lunas</div>
                    </div>

                    
                    <div class="pm-pay-card" :class="chosen === 'down_payment' ? 'active' : ''"
                        @click="chosen = 'down_payment'; document.getElementById('pmHiddenStatus').value = 'down_payment'">
                        <div class="pm-check">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                                stroke-width="3">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <div class="pm-pay-card-dot"></div>
                        <div class="pm-pay-card-title">Down<br>Payment</div>
                        <div class="pm-pay-card-sub">Cicilan DP</div>
                    </div>

                    
                    <div class="pm-pay-card" :class="chosen === 'full_payment' ? 'active' : ''"
                        @click="chosen = 'full_payment'; document.getElementById('pmHiddenStatus').value = 'full_payment'">
                        <div class="pm-check">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                                stroke-width="3">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <div class="pm-pay-card-dot"></div>
                        <div class="pm-pay-card-title">Full<br>Payment</div>
                        <div class="pm-pay-card-sub">Lunas total</div>
                    </div>
                </div>

                <div class="pm-divider"></div>

                
                <label class="pm-label" style="margin-bottom:8px;">Catatan untuk Klien
                    <span
                        style="font-size:8px;opacity:.5;font-weight:400;letter-spacing:0;text-transform:none;">(opsional)</span>
                </label>
                <textarea name="admin_feedback" rows="3" placeholder="Tambahkan pesan atau instruksi untuk klien…"
                    class="pm-field" style="margin-bottom:14px;"></textarea>

                
                <label class="pm-label" style="margin-bottom:8px;">Link Hasil Foto
                    <span
                        style="font-size:8px;opacity:.5;font-weight:400;letter-spacing:0;text-transform:none;">(opsional)</span>
                </label>
                <div style="position:relative;margin-bottom:26px;">
                    <span
                        style="position:absolute;left:14px;top:50%;transform:translateY(-50%);pointer-events:none;opacity:.35;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                            stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                        </svg>
                    </span>
                    <input type="url" name="link_results" :value="payLink"
                        placeholder="https://drive.google.com/…" class="pm-field" style="padding-left:36px;">
                </div>

                
                <button type="submit" id="pmSaveBtn" class="pm-btn-save">
                    <div class="pm-spinner" id="pmSpinnerEl"></div>
                    <span id="pmSaveText" style="display:flex;align-items:center;gap:7px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        SIMPAN VALIDASI
                    </span>
                </button>
                <button type="button" @click="payModal = false" class="pm-btn-cancel">BATAL</button>
            </form>

        </div>
    </div>

    
    <div x-show="selesaiModal" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.88);backdrop-filter:blur(12px);justify-content:center;align-items:center;"
        :style="selesaiModal ? 'display:flex' : 'display:none'">
        <div
            style="background:#0f0f0f;border:1px solid rgba(46,204,113,.2);border-radius:20px;padding:36px;width:440px;max-width:95vw;">
            <h3 style="font-family:'Playfair Display',serif;color:#2ecc71;margin:0 0 6px;font-size:20px;">Tandai
                Selesai</h3>
            <p style="font-size:11px;color:#555;margin:0 0 24px;">Masukkan link hasil foto untuk klien (opsional), lalu
                konfirmasi sesi selesai.</p>
            <form :action="'/admin/bookings/' + selesaiId + '/mark-done'" method="POST">
                <?php echo csrf_field(); ?>
                <label
                    style="font-size:10px;letter-spacing:.12em;color:#555;text-transform:uppercase;display:block;margin-bottom:6px;">Link
                    Google Drive / Hasil Foto</label>
                <input type="url" name="link_results" :value="selesaiLink"
                    placeholder="https://drive.google.com/..."
                    style="width:100%;padding:11px 14px;margin-bottom:20px;font-size:13px;background:#0a0a0a;border:1px solid #1e1e1e;color:#fff;border-radius:10px;outline:none;"
                    onfocus="this.style.borderColor='rgba(46,204,113,.4)'" onblur="this.style.borderColor='#1e1e1e'">
                <button type="submit"
                    style="width:100%;padding:13px;background:rgba(46,204,113,.15);border:1px solid rgba(46,204,113,.4);color:#2ecc71;font-size:11px;font-weight:800;letter-spacing:.15em;cursor:pointer;border-radius:10px;transition:all .2s;"
                    onmouseover="this.style.background='rgba(46,204,113,.28)'"
                    onmouseout="this.style.background='rgba(46,204,113,.15)'">✓ KONFIRMASI SELESAI</button>
                <button type="button" @click="selesaiModal = false"
                    style="width:100%;padding:10px;margin-top:8px;background:none;border:none;color:#444;font-size:11px;cursor:pointer;">BATAL</button>
            </form>
        </div>
    </div>

    
    <div x-show="rejectModal" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.88);backdrop-filter:blur(12px);justify-content:center;align-items:center;"
        :style="rejectModal ? 'display:flex' : 'display:none'">
        <div
            style="background:#0f0f0f;border:1px solid rgba(255,68,68,.2);border-radius:20px;padding:36px;width:420px;max-width:95vw;">
            <h3 style="font-family:'Playfair Display',serif;color:#ff4444;margin:0 0 6px;font-size:20px;">Tolak Booking
            </h3>
            <p style="font-size:11px;color:#555;margin:0 0 24px;">Tuliskan alasan penolakan untuk diberitahukan kepada
                pelanggan.</p>
            <form :action="'/admin/bookings/' + rejectId + '/reject'" method="POST">
                <?php echo csrf_field(); ?>
                <textarea name="rejection_note" rows="4" placeholder="Alasan penolakan…"
                    style="width:100%;padding:11px 14px;margin-bottom:20px;font-size:13px;resize:vertical;" required></textarea>
                <button type="submit"
                    style="width:100%;padding:13px;background:rgba(255,68,68,.15);border:1px solid rgba(255,68,68,.4);color:#ff4444;font-size:11px;font-weight:800;letter-spacing:.15em;cursor:pointer;border-radius:10px;">TOLAK
                    BOOKING</button>
                <button type="button" @click="rejectModal = false"
                    style="width:100%;padding:10px;margin-top:8px;background:none;border:none;color:#444;font-size:11px;cursor:pointer;">BATAL</button>
            </form>
        </div>
    </div>

</div>
<?php /**PATH D:\laragon\www\ProjectSIM\resources\views/livewire/admin/booking-table.blade.php ENDPATH**/ ?>