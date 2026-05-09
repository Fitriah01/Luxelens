<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Admin | LUXELENS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        /* === GLOBAL FIX === */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --gold: #BFA15A;
            --gold-light: #E1C564;
            --dark-bg: #0d0d0d;
            --card-bg: rgba(20, 20, 20, 0.95);
            --border: rgba(191, 161, 90, 0.2);
            --text-primary: #F5F5F5;
            --text-secondary: #B0B0B0;
            --text-muted: #888;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 40px;
        }

        /* --- Header --- */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 60px;
            padding-bottom: 30px;
            border-bottom: 1px solid var(--border);
        }

        .exit-btn {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 6px;
            border: 1px solid transparent;
        }

        .exit-btn:hover {
            color: var(--gold);
            border-color: var(--gold);
        }

        h1 {
            font-family: 'Inter', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin: 0;
            color: var(--gold);
            text-transform: uppercase;
        }

        /* --- Stats Cards --- */
        .stats-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .card:hover {
            border-color: var(--gold);
            box-shadow: 0 12px 40px rgba(191, 161, 90, 0.15);
            transform: translateY(-2px);
        }

        .income-title {
            color: var(--text-secondary);
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .income-value {
            font-family: 'Inter', sans-serif;
            color: var(--gold);
            font-size: 48px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -1px;
        }

        /* Interactive Buttons */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: black;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 11px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .filter-box {
            background: #151515;
            padding: 10px 18px;
            border-radius: 10px;
            border: 1px solid #252525;
            cursor: pointer;
            font-size: 11px;
            color: var(--gold);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* --- Table Styling --- */
        .table-card {
            padding: 0;
            overflow: hidden;
            border-radius: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
        }

        th {
            background: rgba(255, 255, 255, 0.02);
            padding: 20px;
            color: #555;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            vertical-align: middle;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.01);
        }

        .client-name {
            display: block;
            font-weight: 700;
            font-size: 15px;
            color: #fff;
            margin-bottom: 4px;
        }

        .client-info {
            display: block;
            font-size: 11px;
            color: #555;
        }

        /* --- Badges --- */
        .badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid transparent;
        }

        .badge-lunas {
            background: rgba(39, 174, 96, 0.1);
            color: #2ecc71;
            border-color: rgba(46, 204, 113, 0.2);
        }

        .badge-pending {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
            border-color: rgba(243, 156, 18, 0.2);
        }

        /* --- Action Buttons --- */
        .btn-action {
            min-width: 38px;
            height: 38px;
            padding: 0 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
            border: 1px solid #222;
            background: #1a1a1a;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-action:hover {
            background: var(--gold);
            color: #000;
            border-color: var(--gold);
        }

        .btn-wa {
            background: #25d366 !important;
            border: none !important;
            color: white !important;
        }

        /* --- Gallery --- */
        .gallery-upload-form {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .gallery-upload-form input[type="file"] {
            flex: 1 1 260px;
            min-width: 0;
            background: #000 !important;
            border: 1px solid #222 !important;
            padding: 12px !important;
            border-radius: 10px !important;
            color: #fff !important;
            font-size: 12px;
        }

        .gallery-upload-form select {
            flex: 0 0 160px;
            background: #000 !important;
            border: 1px solid #222 !important;
            padding: 12px !important;
            border-radius: 10px !important;
            color: #fff !important;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
            align-content: start;
        }

        .gallery-category-layout {
            display: grid;
            grid-template-columns: minmax(260px, 320px) minmax(0, 1fr);
            gap: 22px;
            align-items: start;
        }

        .gallery-scroll-panel {
            max-height: 500px;
            overflow-y: auto;
            overscroll-behavior: contain;
            background: linear-gradient(180deg, rgba(255, 255, 255, .02), rgba(255, 255, 255, .01));
            border: 1px solid rgba(255, 255, 255, .05);
            border-radius: 16px;
            scrollbar-width: thin;
            scrollbar-color: rgba(191, 161, 90, .34) rgba(255, 255, 255, .03);
        }

        .gallery-scroll-panel::-webkit-scrollbar {
            width: 8px;
        }

        .gallery-scroll-panel::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, .03);
            border-radius: 999px;
        }

        .gallery-scroll-panel::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(191, 161, 90, .45), rgba(191, 161, 90, .22));
            border-radius: 999px;
            border: 1px solid rgba(13, 13, 13, .65);
        }

        .gallery-scroll-panel::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(191, 161, 90, .6), rgba(191, 161, 90, .3));
        }

        .gallery-sticky-header {
            position: sticky;
            top: 0;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            padding: 16px 16px 14px;
            margin-bottom: 2px;
            background: linear-gradient(180deg, rgba(12, 12, 12, .96), rgba(12, 12, 12, .88));
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, .05);
        }

        .gallery-scroll-body {
            padding: 0 16px 16px;
        }

        .gallery-empty-state {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 180px;
            border: 1px dashed rgba(255, 255, 255, .08);
            border-radius: 14px;
            background: rgba(255, 255, 255, .015);
            color: #555;
            font-size: 12px;
            text-align: center;
            padding: 24px;
            line-height: 1.8;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 1/1;
            background: #111;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
            display: block;
        }

        .gallery-item:hover img {
            transform: scale(1.1) rotate(2deg);
            filter: brightness(0.4);
        }

        .gallery-item-actions {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: stretch;
            padding: 10px;
            gap: 6px;
            opacity: 0;
            transition: 0.3s;
        }

        .gallery-item:hover .gallery-item-actions {
            opacity: 1;
        }

        .btn-delete {
            background: rgba(255, 68, 68, 0.85);
            backdrop-filter: blur(5px);
            border: none;
            color: white;
            padding: 7px;
            border-radius: 8px;
            font-size: 9px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
        }

        .gallery-item-update-form {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .gallery-item-update-form input[type="file"] {
            background: rgba(0, 0, 0, 0.7) !important;
            border: 1px solid #444 !important;
            border-radius: 6px !important;
            padding: 5px !important;
            color: #fff !important;
            font-size: 10px;
            width: 100%;
        }

        .gallery-item-update-form .btn-update {
            background: rgba(191, 161, 90, 0.85);
            border: none;
            color: #000;
            font-size: 9px;
            font-weight: 800;
            padding: 6px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        @media (max-width: 1180px) {
            .gallery-category-layout {
                grid-template-columns: 1fr;
            }
        }

        /* --- Charts --- */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .chart-box {
            height: 250px;
            position: relative;
        }

        input,
        select {
            background: #0a0a0a !important;
            border: 1px solid #1a1a1a !important;
            color: white !important;
            border-radius: 14px !important;
            transition: 0.3s !important;
        }

        input:focus,
        select:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.05);
        }

        /* --- Select Custom --- */
        .custom-select {
            background: none;
            color: var(--gold);
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11px;
            cursor: pointer;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #050505;
        }

        ::-webkit-scrollbar-thumb {
            background: #222;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }
    </style>
</head>

<body>

    <div id="luxelens-admin-wrapper" wire:key="admin-wrapper">

        <div class="container">

            <div class="header-section">

                <a href="/" class="exit-btn">← EXIT SYSTEM</a>

                <h1>STUDIO CONTROL</h1>

                <div style="display: flex; gap: 15px; align-items: center;">

                    <div id="reportrange" class="filter-box">

                        <span>📅 FILTER BY DATE</span>

                    </div>

                    <a href="{{ route('laporan.cetak', ['filter' => 'semua']) }}" class="btn-gold">GENERATE REPORT</a>

                </div>

            </div>



            <div class="stats-container">

                <div class="card">

                    <div class="income-title">Total Confirmed Revenue</div>

                    <h2 class="income-value">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h2>

                </div>

                <div class="card" style="display: flex; flex-direction: column; justify-content: center;">

                    <div class="income-title">Quick Export</div>

                    <div style="display: flex; gap: 12px; margin-top: 5px;">

                        <a href="{{ route('laporan.cetak', ['filter' => 'hari']) }}" class="btn-action"
                            style="width: auto; padding: 0 20px;">TODAY</a>

                        <a href="{{ route('laporan.cetak', ['filter' => 'minggu']) }}" class="btn-action"
                            style="width: auto; padding: 0 20px;">WEEKLY</a>

                    </div>

                </div>

            </div>



            <div class="charts-grid">

                <div class="card">

                    <div class="income-title" style="margin-bottom: 25px;">Revenue Analytics</div>

                    <div class="chart-box"><canvas id="revenueChart"></canvas></div>

                </div>

                <div class="card">

                    <div class="income-title" style="margin-bottom: 25px;">Order Distribution</div>

                    <div class="chart-box"><canvas id="categoryChart"></canvas></div>

                </div>

            </div>



            <div
                style="margin: 40px 0 20px; display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;">
                <div>
                    <h2 style="font-family: 'Playfair Display', serif; color: white; font-size: 22px; margin:0;">Booking
                        Management</h2>
                    <p style="color: #aaa; font-size: 13px; margin: 6px 0 0;">Kelola booking, tim fotografer, dan
                        portofolio
                        langsung dari dashboard.</p>
                </div>
                <button type="button" onclick="openPhotographerModal()" class="btn-gold" style="padding: 10px 20px;">
                    + ADD PHOTOGRAPHER
                </button>
            </div>



            <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 24px;">
                <a href="#booking-management" class="btn-action"
                    style="border-color: var(--gold); color: var(--gold);">Booking Management</a>
                <a href="#photographer-schedule" class="btn-action"
                    style="border-color: var(--gold); color: var(--gold);">Jadwal Tim</a>
                <a href="#testimonial-moderation" class="btn-action"
                    style="border-color: var(--gold); color: var(--gold);">Ulasan Pelanggan</a>
            </div>

            <div id="booking-management" class="card table-card">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Client Details</th>

                            <th>Service</th>

                            <th>Schedule</th>

                            <th>Photographer</th>

                            <th>Price</th>

                            <th>Status</th>

                            <th style="text-align: center;">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php $allPhotogs = $photographers; @endphp

                        @foreach ($bookings as $b)
                            <tr wire:key="booking-row-{{ $b->id }}">

                                <td style="color: #444; font-weight: 600;">#{{ $b->id }}</td>

                                <td>

                                    <span class="client-name">{{ $b->nama_customer }}</span>

                                    <span class="client-info">{{ $b->nomor_telepon }}</span>

                                </td>

                                <td><span
                                        style="letter-spacing: 1px; font-weight: 500; font-size: 11px;">{{ strtoupper($b->kategori) }}</span>

                                </td>

                                <td style="font-size: 12px;">{{ date('d M Y', strtotime($b->tanggal_pemotretan)) }}</td>

                                <td>

                                    <form action="{{ route('admin.update.photographer', $b->id) }}" method="POST">

                                        @csrf

                                        <select name="photographer_name" onchange="this.form.submit()"
                                            class="custom-select">

                                            <option value="">-- Assign --</option>

                                            @foreach ($allPhotogs as $p)
                                                @php $pName = $p->name . " (" . $p->team_name . ")"; @endphp

                                                <option value="{{ $pName }}"
                                                    {{ $b->photographer_name == $pName ? 'selected' : '' }}>

                                                    {{ $pName }}

                                                </option>
                                            @endforeach

                                        </select>

                                    </form>

                                </td>

                                <td style="color: var(--gold); font-weight: 600;">Rp

                                    {{ number_format($b->harga, 0, ',', '.') }}</td>

                                <td>

                                    @if ($b->status == 'Lunas')
                                        <span class="badge badge-lunas">Completed</span>
                                    @else
                                        <span class="badge badge-pending">{{ $b->status }}</span>
                                    @endif



                                    @if ($b->proof_payment)
                                        <a href="{{ asset('storage/proofs/' . $b->proof_payment) }}" target="_blank"
                                            style="display: block; color: #3498db; font-size: 9px; margin-top: 5px; text-decoration: none; font-weight: bold;">

                                            👁️ VIEW PROOF

                                        </a>
                                    @endif

                                </td>

                                <td style="text-align: center;">

                                    <div style="display: flex; gap: 8px; justify-content: center;">

                                        <a href="/admin/download-pdf/{{ $b->id }}" class="btn-action"
                                            title="Download PDF">PDF</a>



                                        @if ($b->nomor_telepon)
                                            @php

                                                $phone = preg_replace('/[^0-9]/', '', $b->nomor_telepon);

                                                if (str_starts_with($phone, '0')) {
                                                    $phone = '62' . substr($phone, 1);
                                                }

                                                $waUrl =
                                                    "https://wa.me/{$phone}?text=" .
                                                    urlencode(
                                                        "Halo {$b->nama_customer}, pembayaran Anda telah kami terima...",
                                                    );

                                            @endphp

                                            <a href="{{ $waUrl }}" target="_blank"
                                                class="btn-action btn-wa">WA</a>
                                        @endif



                                        @if ($b->status != 'Cancelled')
                                            @if ($b->proof_payment && $b->status !== 'Lunas')
                                                <button type="button"
                                                    onclick="openPaymentModal({{ $b->id }}, {{ $b->harga }}, {{ $b->amount_paid ?? 0 }}, '{{ $b->payment_status ?? 'pending' }}', '{{ $b->nomor_telepon ?? '' }}', '{{ $b->link_results ?? '' }}')"
                                                    class="btn-action"
                                                    style="color: var(--gold); border-color: var(--gold);">
                                                    VALIDASI
                                                </button>
                                                <button type="button" onclick="openRejectModal({{ $b->id }})"
                                                    class="btn-action" style="background:#922; color:#fff;">
                                                    TOLAK
                                                </button>
                                            @elseif ($b->status !== 'Lunas')
                                                <button type="button" class="btn-action" disabled
                                                    style="opacity:.6; cursor:not-allowed;">
                                                    MENUNGGU DOKUMEN
                                                </button>
                                                <button type="button" onclick="openRejectModal({{ $b->id }})"
                                                    class="btn-action" style="background:#922; color:#fff;">
                                                    TOLAK
                                                </button>
                                            @else
                                                <span class="badge badge-lunas">Verified</span>
                                            @endif
                                        @endif

                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                {{-- PAGINATION --}}
                @if ($bookings->hasPages())
                    <div style="margin-top:32px; padding-top:24px; border-top:1px solid rgba(255,255,255,.05);">

                        {{-- Info row --}}
                        <div
                            style="text-align:center; margin-bottom:16px; font-size:11px; color:#555; letter-spacing:.1em;">
                            Halaman
                            <strong style="color:#E1C564;">{{ $bookings->currentPage() }}</strong>
                            dari
                            <strong style="color:#fff;">{{ $bookings->lastPage() }}</strong>
                            &nbsp;·&nbsp;
                            Total
                            <strong style="color:#fff;">{{ $bookings->total() }}</strong>
                            booking
                        </div>

                        {{-- Pagination controls — centered --}}
                        <div
                            style="display:flex; justify-content:center; align-items:center; gap:6px; flex-wrap:wrap;">

                            {{-- First --}}
                            @if ($bookings->currentPage() > 1)
                                <a href="{{ $bookings->url(1) }}" title="Halaman pertama"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); color:#888; font-size:13px; text-decoration:none; transition:all .2s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                    onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#888';this.style.borderColor='rgba(255,255,255,.08)';">«</a>
                            @else
                                <span
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.02); border:1px solid rgba(255,255,255,.04); color:#2a2a2a; font-size:13px; cursor:not-allowed;">«</span>
                            @endif

                            {{-- Prev --}}
                            @if ($bookings->onFirstPage())
                                <span
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.02); border:1px solid rgba(255,255,255,.04); color:#2a2a2a; font-size:15px; cursor:not-allowed;">‹</span>
                            @else
                                <a href="{{ $bookings->previousPageUrl() }}" title="Sebelumnya"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); color:#aaa; font-size:15px; text-decoration:none; transition:all .2s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                    onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">‹</a>
                            @endif

                            {{-- Page numbers --}}
                            @foreach ($bookings->getUrlRange(max(1, $bookings->currentPage() - 2), min($bookings->lastPage(), $bookings->currentPage() + 2)) as $page => $url)
                                @if ($page == $bookings->currentPage())
                                    <span
                                        style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:#E1C564; border:1px solid #E1C564; color:#050505; font-size:12px; font-weight:800; box-shadow:0 0 16px rgba(225,197,100,.3);">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); color:#aaa; font-size:12px; text-decoration:none; transition:all .2s;"
                                        onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                        onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if ($bookings->hasMorePages())
                                <a href="{{ $bookings->nextPageUrl() }}" title="Berikutnya"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); color:#aaa; font-size:15px; text-decoration:none; transition:all .2s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                    onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">›</a>
                            @else
                                <span
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.02); border:1px solid rgba(255,255,255,.04); color:#2a2a2a; font-size:15px; cursor:not-allowed;">›</span>
                            @endif

                            {{-- Last --}}
                            @if ($bookings->currentPage() < $bookings->lastPage())
                                <a href="{{ $bookings->url($bookings->lastPage()) }}" title="Halaman terakhir"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.08); color:#888; font-size:13px; text-decoration:none; transition:all .2s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                    onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#888';this.style.borderColor='rgba(255,255,255,.08)';">»</a>
                            @else
                                <span
                                    style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.02); border:1px solid rgba(255,255,255,.04); color:#2a2a2a; font-size:13px; cursor:not-allowed;">»</span>
                            @endif

                        </div>

                        {{-- Show per page info below --}}
                        <div
                            style="text-align:center; margin-top:14px; font-size:10px; color:#333; letter-spacing:.15em; text-transform:uppercase;">
                            Menampilkan {{ $bookings->firstItem() }}–{{ $bookings->lastItem() }} dari
                            {{ $bookings->total() }} data
                        </div>

                    </div>
                @endif

            </div>



            <div id="photographer-schedule" class="card" style="margin-top: 40px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                    <div>
                        <div class="income-title" style="margin-bottom: 8px;">Jadwal Tim Fotografer</div>
                        <p style="color: #aaa; font-size: 12px; margin:0;">Atur hari kerja setiap fotografer dan lihat
                            jadwal tim secara ringkas.</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modalFotografer').style.display='flex'"
                        class="btn-gold" style="padding: 10px 20px;">+ TAMBAH PHOTOGRAPHER BARU</button>
                </div>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Team</th>
                                <th>Specialization</th>
                                <th>Work Days</th>
                                <th>Nomor</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($photographers as $photographer)
                                <tr>
                                    <td style="color: #444; font-weight: 600;">{{ $photographer->id }}</td>
                                    <td>
                                        <span class="client-name">{{ $photographer->name }}</span>
                                    </td>
                                    <td style="font-size: 12px; color: #ccc;">{{ $photographer->team_name }}</td>
                                    <td style="font-size: 12px; color: #ccc;">{{ $photographer->specialization }}</td>
                                    <td>
                                        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                            @if (in_array($day, $photographer->work_days ?? []))
                                                <span class="badge badge-lunas"
                                                    style="margin-right:6px; font-size: 9px;">{{ strtoupper(substr($day, 0, 3)) }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="font-size: 12px; color: #ccc;">{{ $photographer->phone }}</td>
                                    <td style="text-align: center;">
                                        <form action="{{ route('admin.photographers.destroy', $photographer->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action"
                                                style="background:#2c2c2c; border-color:#333;">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="testimonial-moderation" class="card" style="margin-top: 40px;">
                <div class="income-title" style="margin-bottom: 20px;">Ulasan Pelanggan</div>
                <p style="color: #aaa; font-size: 12px; margin-bottom: 18px;">Moderasi ulasan masuk, setujui yang valid
                    atau hapus yang tidak sesuai.</p>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th>Message</th>
                                <th>Admin Reply</th>
                                <th>Status</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adminTestimonials as $testimonial)
                                <tr>
                                    <td style="color: #444; font-weight: 600;">#{{ $testimonial->id }}</td>
                                    <td>
                                        <span class="client-name">{{ $testimonial->nama_customer }}</span>
                                        <span
                                            class="client-info">{{ $testimonial->created_at->format('d M Y') }}</span>
                                    </td>
                                    <td>
                                        @for ($i = 0; $i < $testimonial->bintang; $i++)
                                            <span style="color: var(--gold);">★</span>
                                        @endfor
                                    </td>
                                    <td style="font-size: 12px; color: #ccc;">
                                        {{ \Illuminate\Support\Str::limit($testimonial->pesan, 90) }}</td>
                                    <td style="font-size: 12px; color: #999;">
                                        @if ($testimonial->admin_reply)
                                            {{ \Illuminate\Support\Str::limit($testimonial->admin_reply, 80) }}
                                        @else
                                            <span style="color:#777;">Belum dibalas</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $testimonial->status === 'approved' ? 'badge-lunas' : 'badge-pending' }}">
                                            {{ strtoupper($testimonial->status) }}
                                        </span>
                                        @if (!empty($testimonial->admin_reply))
                                            <span class="badge badge-lunas"
                                                style="background:#237cfe; color:#fff; margin-left: 6px;">REPLIED</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <form
                                            action="{{ route('admin.testimonials.updateStatus', $testimonial->id) }}"
                                            method="POST" style="display:inline-block; margin-right: 8px;">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn-action"
                                                style="background: var(--gold); color: #000;">APPROVE</button>
                                        </form>
                                        <button type="button" class="btn-action reply-button"
                                            data-id="{{ $testimonial->id }}"
                                            data-action="{{ route('admin.testimonials.reply', $testimonial->id) }}"
                                            data-reply="{{ e($testimonial->admin_reply ?? '') }}"
                                            style="background:#237cfe; color:#fff; margin-right:8px;">REPLY</button>
                                        <form action="{{ route('admin.testimonials.delete', $testimonial->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action"
                                                style="background:#922; color:#fff;">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- PAGINATION ULASAN --}}
                    @if ($adminTestimonials->hasPages())
                        <div style="margin-top:28px; padding-top:20px; border-top:1px solid rgba(255,255,255,.05);">

                            <div
                                style="text-align:center; margin-bottom:14px; font-size:11px; color:#555; letter-spacing:.1em;">
                                Halaman <strong
                                    style="color:#E1C564;">{{ $adminTestimonials->currentPage() }}</strong>
                                dari <strong style="color:#fff;">{{ $adminTestimonials->lastPage() }}</strong>
                                &nbsp;·&nbsp; Total <strong
                                    style="color:#fff;">{{ $adminTestimonials->total() }}</strong>
                                ulasan
                            </div>

                            <div
                                style="display:flex; justify-content:center; align-items:center; gap:6px; flex-wrap:wrap;">

                                {{-- First --}}
                                @if ($adminTestimonials->currentPage() > 1)
                                    <a href="{{ $adminTestimonials->url(1) }}"
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);color:#888;font-size:12px;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                        onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#888';this.style.borderColor='rgba(255,255,255,.08)';">«</a>
                                @else
                                    <span
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.04);color:#222;font-size:12px;cursor:not-allowed;">«</span>
                                @endif

                                {{-- Prev --}}
                                @if ($adminTestimonials->onFirstPage())
                                    <span
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.04);color:#222;font-size:14px;cursor:not-allowed;">‹</span>
                                @else
                                    <a href="{{ $adminTestimonials->previousPageUrl() }}"
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:14px;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                        onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">‹</a>
                                @endif

                                {{-- Page numbers --}}
                                @foreach ($adminTestimonials->getUrlRange(max(1, $adminTestimonials->currentPage() - 2), min($adminTestimonials->lastPage(), $adminTestimonials->currentPage() + 2)) as $page => $url)
                                    @if ($page == $adminTestimonials->currentPage())
                                        <span
                                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:#E1C564;border:1px solid #E1C564;color:#050505;font-size:11px;font-weight:800;box-shadow:0 0 14px rgba(225,197,100,.3);">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:11px;text-decoration:none;transition:all .2s;"
                                            onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                            onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next --}}
                                @if ($adminTestimonials->hasMorePages())
                                    <a href="{{ $adminTestimonials->nextPageUrl() }}"
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);color:#aaa;font-size:14px;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                        onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#aaa';this.style.borderColor='rgba(255,255,255,.08)';">›</a>
                                @else
                                    <span
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.04);color:#222;font-size:14px;cursor:not-allowed;">›</span>
                                @endif

                                {{-- Last --}}
                                @if ($adminTestimonials->currentPage() < $adminTestimonials->lastPage())
                                    <a href="{{ $adminTestimonials->url($adminTestimonials->lastPage()) }}"
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);color:#888;font-size:12px;text-decoration:none;transition:all .2s;"
                                        onmouseover="this.style.background='rgba(225,197,100,.14)';this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)';"
                                        onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#888';this.style.borderColor='rgba(255,255,255,.08)';">»</a>
                                @else
                                    <span
                                        style="display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.04);color:#222;font-size:12px;cursor:not-allowed;">»</span>
                                @endif

                            </div>

                            <div
                                style="text-align:center;margin-top:12px;font-size:10px;color:#333;letter-spacing:.15em;text-transform:uppercase;">
                                Menampilkan {{ $adminTestimonials->firstItem() }}–{{ $adminTestimonials->lastItem() }}
                                dari {{ $adminTestimonials->total() }} data
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="card" style="margin-top: 40px;">

                <div
                    style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
                    <div class="income-title" style="margin-bottom:0;">Gallery & Portfolio Update</div>
                    {{-- Category counts badge --}}
                    <div style="display:flex;gap:8px;flex-wrap:wrap;">
                        @php
                            $galleryCounts = $galleries->groupBy('kategori')->map->count();
                        @endphp
                        @foreach (['wedding' => 'Wedding', 'wisuda' => 'Graduation', 'prewed' => 'Pre-Wedding', 'family' => 'Family'] as $slug => $label)
                            <span
                                style="font-size:9px;font-weight:700;letter-spacing:.1em;padding:3px 10px;border-radius:20px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#555;">
                                {{ $label }}: <span
                                    style="color:#E1C564;">{{ $galleryCounts[$slug] ?? 0 }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>

                @php
                    $uploadCategories = [
                        [
                            'value' => 'wedding',
                            'label' => 'Wedding',
                            'title' => 'Upload Foto Wedding',
                            'desc' => 'Tambahkan dokumentasi akad, resepsi, dan momen utama pernikahan.',
                        ],
                        [
                            'value' => 'wisuda',
                            'label' => 'Graduation',
                            'title' => 'Upload Foto Graduation',
                            'desc' => 'Kelola hasil sesi wisuda, toga, dan perayaan kelulusan.',
                        ],
                        [
                            'value' => 'prewed',
                            'label' => 'Pre-Wedding',
                            'title' => 'Upload Foto Pre-Wedding',
                            'desc' => 'Masukkan hasil prewed outdoor, studio, maupun cinematic session.',
                        ],
                        [
                            'value' => 'family',
                            'label' => 'Family',
                            'title' => 'Upload Foto Family',
                            'desc' => 'Simpan foto family session, maternity, dan portrait keluarga.',
                        ],
                    ];

                    $galleriesByCategory = $galleries->groupBy('kategori');
                @endphp

                <div style="display:grid;grid-template-columns:1fr;gap:24px;margin-top:18px;">
                    @foreach ($uploadCategories as $category)
                        @php
                            $categoryPhotos = $galleriesByCategory->get($category['value'], collect());
                        @endphp
                        <section
                            style="padding:22px;background:linear-gradient(180deg,rgba(255,255,255,.02),rgba(255,255,255,.01));border:1px solid rgba(191,161,90,.12);border-radius:18px;">
                            <div class="gallery-category-layout">
                                <form action="/admin/upload-gallery" method="POST" enctype="multipart/form-data"
                                    style="display:flex;flex-direction:column;gap:14px;padding:20px;background:#080808;border:1px solid rgba(255,255,255,.04);border-radius:16px;min-height:100%;">

                                    @csrf

                                    <input type="hidden" name="kategori" value="{{ $category['value'] }}">

                                    <div
                                        style="display:flex;justify-content:space-between;gap:12px;align-items:flex-start;">
                                        <div>
                                            <div
                                                style="font-size:10px;letter-spacing:.16em;text-transform:uppercase;color:var(--gold);margin-bottom:8px;">
                                                {{ $category['label'] }}</div>
                                            <div style="font-size:18px;font-weight:700;color:#fff;margin-bottom:8px;">
                                                {{ $category['title'] }}</div>
                                            <p style="margin:0;color:#888;font-size:12px;line-height:1.6;">
                                                {{ $category['desc'] }}</p>
                                        </div>
                                        <span
                                            style="padding:5px 10px;border-radius:999px;background:rgba(191,161,90,.08);border:1px solid rgba(191,161,90,.22);color:var(--gold);font-size:9px;font-weight:800;letter-spacing:.1em;white-space:nowrap;">{{ $categoryPhotos->count() }}
                                            FOTO</span>
                                    </div>

                                    <div
                                        style="margin-top:auto;padding:14px;background:#080808;border:1px solid rgba(255,255,255,.04);border-radius:12px;">
                                        <input type="file" name="foto" required accept="image/*"
                                            style="width:100%;margin-bottom:12px;">
                                        <button type="submit" class="btn-gold" style="width:100%;">UPLOAD
                                            PHOTO</button>
                                    </div>

                                </form>

                                <div>
                                    <div
                                        style="display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:14px;flex-wrap:wrap;">
                                        <div style="font-size:14px;font-weight:700;color:#fff;">Galeri
                                            {{ $category['label'] }}</div>
                                        <div
                                            style="font-size:10px;color:#555;letter-spacing:.12em;text-transform:uppercase;">
                                            Aset foto kategori {{ $category['label'] }}</div>
                                    </div>

                                    @if ($categoryPhotos->isNotEmpty())
                                        <div
                                            style="display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:14px;">
                                            @foreach ($categoryPhotos as $foto)
                                                <div class="gallery-item">

                                                    <img src="{{ $foto->image_url }}" alt="{{ $foto->kategori }}">

                                                    <div
                                                        style="position:absolute;top:8px;left:8px;font-size:7px;font-weight:900;letter-spacing:.15em;text-transform:uppercase;padding:3px 9px;border-radius:20px;background:rgba(0,0,0,.65);backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,.1);color:#E1C564;">
                                                        {{ $foto->kategori === 'wisuda' ? 'Graduation' : ($foto->kategori === 'prewed' ? 'Pre-Wedding' : ucfirst($foto->kategori)) }}
                                                    </div>

                                                    <div class="gallery-item-actions">
                                                        <form action="/admin/delete-gallery/{{ $foto->id }}"
                                                            method="POST">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn-delete">REMOVE</button>
                                                        </form>

                                                        <form action="{{ route('admin.update.gallery', $foto->id) }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="gallery-item-update-form">
                                                            @csrf
                                                            <input type="file" name="foto" accept="image/*"
                                                                required>
                                                            <button type="submit" class="btn-update">UPDATE</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div
                                            style="display:flex;align-items:center;justify-content:center;min-height:180px;border:1px dashed rgba(255,255,255,.08);border-radius:14px;background:rgba(255,255,255,.015);color:#555;font-size:12px;text-align:center;padding:24px;line-height:1.8;">
                                            Belum ada foto untuk kategori {{ $category['label'] }}.<br>Upload foto
                                            pertama melalui form di sebelah kiri.
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="gallery-scroll-panel">
                                <div class="gallery-sticky-header">

                                </div>

                            </div>



                            <div class="gallery-scroll-body">
                                @if ($categoryPhotos->isNotEmpty())
                                    <div class="gallery-grid"
                                        style="margin-top:0;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:14px;">
                                        @foreach ($categoryPhotos as $foto)
                                            <div class="gallery-item">

                                                <img src="{{ $foto->image_url }}" alt="{{ $foto->kategori }}">

                                                <div
                                                    style="position:absolute;top:8px;left:8px;font-size:7px;font-weight:900;letter-spacing:.15em;text-transform:uppercase;padding:3px 9px;border-radius:20px;background:rgba(0,0,0,.65);backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,.1);color:#E1C564;">
                                                    {{ $foto->kategori === 'wisuda' ? 'Graduation' : ($foto->kategori === 'prewed' ? 'Pre-Wedding' : ucfirst($foto->kategori)) }}
                                                </div>

                                                <div class="gallery-item-actions">
                                                    <form action="/admin/delete-gallery/{{ $foto->id }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn-delete">REMOVE</button>
                                                    </form>

                                                    <form action="{{ route('admin.update.gallery', $foto->id) }}"
                                                        method="POST" enctype="multipart/form-data"
                                                        class="gallery-item-update-form">
                                                        @csrf
                                                        <input type="file" name="foto" accept="image/*"
                                                            required>
                                                        <button type="submit" class="btn-update">UPDATE</button>
                                                    </form>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="gallery-empty-state">
                                        Belum ada foto untuk kategori {{ $category['label'] }}.<br>Upload foto
                                        pertama melalui form di sebelah kiri.
                                    </div>
                                @endif
                            </div>
                </div>
                <button type="submit" id="photographerSubmitBtn" class="btn-gold" style="width:100%">+ ADD NEW
                    STAFF</button>
                <button type="button" id="photographerCancelEditBtn" class="btn-action"
                    style="width:100%; margin-top:10px; display:none; background:#333; color:#fff;">CANCEL
                    EDIT</button>

                </form>

                <div style="max-height: 200px; overflow-y: auto;">

                    @foreach ($photographers as $p)
                        <div
                            style="display: flex; justify-content: space-between; padding: 12px; background: #000; border-radius: 12px; margin-bottom: 8px; border: 1px solid #222;">

                            <div>

                                <div style="font-size:13px; color:white;">{{ $p->name }}</div>

                                <div style="font-size:10px; color:var(--gold);">{{ $p->team_name }}</div>

                            </div>

                            <button type="button" onclick="editPhotographer(this)" data-id="{{ $p->id }}"
                                data-name="{{ $p->name }}" data-team="{{ $p->team_name }}"
                                data-specialization="{{ $p->specialization }}" data-phone="{{ $p->phone }}"
                                data-work-days="{{ implode(',', $p->work_days ?? []) }}"
                                style="background:none; border:none; color:#D4AF37; font-size:10px; cursor:pointer; margin-right: 8px;">EDIT</button>
                            <form action="{{ route('admin.photographers.destroy', $p->id) }}" method="POST">

                                @csrf @method('DELETE')

                                <button
                                    style="background:none; border:none; color:#ff4444; font-size:10px; cursor:pointer;">DELETE</button>

                            </form>

                        </div>
                    @endforeach

                </div>

                <button type="button" onclick="closePhotographerModal()"
                    style="width:100%; background:none; border:none; color:#555; margin-top:20px; cursor:pointer;">CLOSE</button>

            </div>

        </div>



        <div id="confirmModal"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.9); backdrop-filter: blur(10px); justify-content: center; align-items: center;">

            <div
                style="background:var(--card-bg); padding:40px; border:1px solid #333; width:380px; border-radius:24px; text-align:center;">

                <h3 style="font-family:'Playfair Display', serif; color:var(--gold); margin-bottom:5px;">Update Booking

                </h3>

                <p style="font-size: 11px; color: #666; margin-bottom: 25px;">Update status and results link</p>

                <form id="confirmForm" method="POST">

                    @csrf

                    <input type="hidden" name="status" id="statusInput">

                    <input type="url" name="link_results" id="confirmLinkResultsInput"
                        placeholder="Google Drive Link"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 20px;">

                    <button type="button" onclick="submitStatus('DP 30%')"
                        style="width:100%; background:none; border:1px solid #333; color:#fff; padding:12px; border-radius:10px; margin-bottom:10px; cursor:pointer;">Pay

                        DP (30%)</button>

                    <button type="button" onclick="submitStatus('Lunas')" class="btn-gold"
                        style="width:100%; padding:12px;">Mark as Completed</button>

                    <button type="button" onclick="closeModal()"
                        style="background:none; border:none; color:#555; margin-top:20px; cursor:pointer;">CANCEL</button>

                </form>
            </div>
        </div>

        <div id="paymentModal"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.9); backdrop-filter: blur(10px); justify-content: center; align-items: center;">

            <div
                style="background:var(--card-bg); padding:30px; border:1px solid #333; width:420px; border-radius:24px; text-align:center;">
                <h3 style="font-family:'Playfair Display', serif; color:var(--gold); margin-bottom:10px;">Validasi
                    Pembayaran</h3>
                <p style="font-size: 12px; color: #666; margin-bottom: 18px;">Masukkan nominal dan status pembayaran
                    untuk
                    mengonfirmasi pembayaran pelanggan.</p>
                <form id="paymentForm" method="POST">
                    @csrf
                    <input type="hidden" name="booking_id" id="paymentBookingId">
                    <input type="number" name="amount_paid" id="amountPaidInput" placeholder="Jumlah Pembayaran"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;"
                        required>
                    <select name="payment_status" id="paymentStatusInput"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;"
                        required>
                        <option value="pending">Pending</option>
                        <option value="down_payment">Down Payment</option>
                        <option value="full_payment">Full Payment</option>
                    </select>
                    <textarea name="admin_feedback" id="paymentFeedbackInput" rows="3"
                        placeholder="Catatan / feedback untuk user (opsional)"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;"></textarea>
                    <input type="url" name="link_results" id="linkResultsInput"
                        placeholder="Link Google Drive Hasil Foto (opsional)"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;">
                    <button type="submit" class="btn-gold" style="width:100%; padding:12px;">Simpan
                        Validasi</button>
                    <button type="button" onclick="closePaymentModal()"
                        style="width:100%; background:none; border:none; color:#555; margin-top:12px; cursor:pointer;">BATAL</button>
                </form>
            </div>
        </div>

        <div id="rejectModal"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.9); backdrop-filter: blur(10px); justify-content: center; align-items: center;">

            <div
                style="background:var(--card-bg); padding:30px; border:1px solid #333; width:420px; border-radius:24px; text-align:center;">
                <h3 style="font-family:'Playfair Display', serif; color:var(--gold); margin-bottom:10px;">Tolak Booking
                </h3>
                <p style="font-size: 12px; color: #666; margin-bottom: 18px;">Tuliskan alasan penolakan agar user dapat
                    diberitahu.</p>
                <form id="rejectForm" method="POST">
                    @csrf
                    <textarea name="rejection_note" id="rejectionNoteInput" rows="4" placeholder="Alasan penolakan"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;"
                        required></textarea>
                    <button type="submit" class="btn-action"
                        style="width:100%; padding:12px; background:#922; color:#fff;">Tolak Booking</button>
                    <button type="button" onclick="closeRejectModal()"
                        style="width:100%; background:none; border:none; color:#555; margin-top:12px; cursor:pointer;">BATAL</button>
                </form>
            </div>
        </div>

        <div id="replyModal"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.9); backdrop-filter: blur(10px); justify-content: center; align-items: center;">

            <div
                style="background:var(--card-bg); padding:30px; border:1px solid #333; width:420px; border-radius:24px; text-align:center;">
                <h3 style="font-family:'Playfair Display', serif; color:var(--gold); margin-bottom:10px;">Balas Ulasan
                </h3>
                <p style="font-size: 12px; color: #666; margin-bottom: 18px;">Tulis jawaban singkat untuk pelanggan dan
                    simpan balasan.</p>
                <form id="replyForm" method="POST" action="{{ route('admin.testimonials.reply', ['id' => 0]) }}">
                    @csrf
                    <input type="hidden" name="testimonial_id" id="replyTestimonialId">
                    <textarea name="admin_reply" id="adminReplyInput" rows="4" placeholder="Balasan untuk user"
                        style="width: 90%; padding: 12px; background: #000; border: 1px solid #222; border-radius: 10px; color: #fff; margin-bottom: 15px;"
                        required></textarea>
                    <button type="submit" class="btn-gold" style="width:100%; padding:12px;">Simpan Balasan</button>
                    <button type="button" onclick="closeReplyModal()"
                        style="width:100%; background:none; border:none; color:#555; margin-top:12px; cursor:pointer;">BATAL</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



        <script>
            // Modal Logic

            function openConfirmModal(id, currentLink) {

                document.getElementById('confirmForm').action = '/admin/confirm/' + id;

                document.getElementById('confirmLinkResultsInput').value = (currentLink && currentLink !== 'null') ?
                    currentLink : '';

                document.getElementById('confirmModal').style.display = 'flex';

            }



            function closeModal() {

                document.getElementById('confirmModal').style.display = 'none';

            }



            function submitStatus(s) {

                document.getElementById('statusInput').value = s;

                document.getElementById('confirmForm').submit();

            }

            function openPaymentModal(id, totalPrice, amountPaid, paymentStatus, phone, linkResults) {
                console.log('🚀 DEBUG: Opening payment modal for Booking ID:', id);
                const form = document.getElementById('paymentForm');
                form.action = '/admin/bookings/' + id + '/verify-payment';
                document.getElementById('amountPaidInput').value = amountPaid || totalPrice;
                document.getElementById('paymentStatusInput').value = paymentStatus || 'pending';
                document.getElementById('paymentFeedbackInput').value = '';
                document.getElementById('linkResultsInput').value = linkResults || '';
                document.getElementById('paymentModal').style.display = 'flex';
                console.log('✅ Form action set to:', form.action);
            }

            document.getElementById('paymentForm').addEventListener('submit', function(e) {
                console.log('🚀 DEBUG: Payment form submitting...');
            });

            function closePaymentModal() {
                document.getElementById('paymentModal').style.display = 'none';
            }

            function openRejectModal(id) {
                const form = document.getElementById('rejectForm');
                form.action = '/admin/bookings/' + id + '/reject';
                document.getElementById('rejectionNoteInput').value = '';
                document.getElementById('rejectModal').style.display = 'flex';
            }

            function closeRejectModal() {
                document.getElementById('rejectModal').style.display = 'none';
            }

            function openPhotographerModal() {
                resetPhotographerForm();
                document.getElementById('modalFotografer').style.display = 'flex';
            }

            function closePhotographerModal() {
                document.getElementById('modalFotografer').style.display = 'none';
            }

            function openReplyModal(id, action, currentReply) {
                console.log('🚀 DEBUG: Opening reply modal for Testimonial ID:', id);
                const form = document.getElementById('replyForm');
                form.action = action;
                document.getElementById('replyTestimonialId').value = id;
                document.getElementById('adminReplyInput').value = currentReply || '';
                document.getElementById('replyModal').style.display = 'flex';
                console.log('✅ Reply form action set to:', form.action);
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.reply-button').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const action = this.dataset.action;
                        const reply = this.dataset.reply || '';
                        openReplyModal(id, action, reply);
                    });
                });

                const replyForm = document.getElementById('replyForm');
                if (replyForm) {
                    replyForm.addEventListener('submit', function() {
                        console.log('🚀 DEBUG: Reply form submitting...');
                    });
                }
            });

            function closeReplyModal() {
                document.getElementById('replyModal').style.display = 'none';
            }

            function editPhotographer(button) {
                const id = button.dataset.id;
                const name = button.dataset.name;
                const team = button.dataset.team;
                const specialization = button.dataset.specialization;
                const phone = button.dataset.phone;
                const workDays = button.dataset.workDays ? button.dataset.workDays.split(',') : [];

                const form = document.getElementById('photographerForm');
                form.action = '/admin/photographers/' + id;
                document.getElementById('photographer_method').value = 'POST';
                document.getElementById('photographer_id').value = id;
                document.getElementById('photographer_name').value = name;
                document.getElementById('photographer_team_name').value = team;
                document.getElementById('photographer_specialization').value = specialization;
                document.getElementById('photographer_phone').value = phone;
                document.getElementById('photographerSubmitBtn').textContent = 'UPDATE STAFF';
                document.getElementById('photographerCancelEditBtn').style.display = 'block';

                document.querySelectorAll('#photographerWorkDays input[type=checkbox]').forEach(ch => {
                    ch.checked = workDays.includes(ch.value);
                });

                document.getElementById('modalFotografer').style.display = 'flex';
            }

            function resetPhotographerForm() {
                const form = document.getElementById('photographerForm');
                form.action = '{{ route('admin.photographers.store') }}';
                document.getElementById('photographer_method').value = 'POST';
                document.getElementById('photographer_id').value = '';
                document.getElementById('photographer_name').value = '';
                document.getElementById('photographer_team_name').value = '';
                document.getElementById('photographer_specialization').value = '';
                document.getElementById('photographer_phone').value = '';
                document.getElementById('photographerSubmitBtn').textContent = '+ ADD NEW STAFF';
                document.getElementById('photographerCancelEditBtn').style.display = 'none';
                document.querySelectorAll('#photographerWorkDays input[type=checkbox]').forEach(ch => ch.checked = false);
            }

            document.getElementById('photographerCancelEditBtn')?.addEventListener('click', function() {
                resetPhotographerForm();
            });


            // Charts & Date Range (Sesuai Logic Lama)

            $(function() {

                function cb(start, end) {

                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                }

                $('#reportrange').daterangepicker({

                    ranges: {

                        'Today': [moment(), moment()],

                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],

                        'This Month': [moment().startOf('month'), moment().endOf('month')]

                    }

                }, cb);

                cb(moment().subtract(29, 'days'), moment());

            });



            // Chart.js - Line & Doughnut

            document.addEventListener("DOMContentLoaded", function() {

                const revCtx = document.getElementById('revenueChart').getContext('2d');

                new Chart(revCtx, {

                    type: 'line',

                    data: {

                        labels: {!! json_encode($grafikBulanan->keys()) !!},

                        datasets: [{

                            label: 'Revenue',

                            data: {!! json_encode($grafikBulanan->values()) !!},

                            borderColor: '#D4AF37',

                            tension: 0.4,

                            fill: true,

                            backgroundColor: 'rgba(212, 175, 55, 0.1)'

                        }]

                    },

                    options: {

                        maintainAspectRatio: false,

                        plugins: {

                            legend: {

                                display: false

                            }

                        }

                    }

                });



                new Chart(document.getElementById('categoryChart'), {

                    type: 'doughnut',

                    data: {

                        labels: {!! json_encode($grafikKategori->keys()) !!},

                        datasets: [{

                            data: {!! json_encode($grafikKategori->values()) !!},
                            backgroundColor: ['#D4AF37', '#8E44AD', '#2980B9', '#27AE60'],
                            borderWidth: 0
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                        cutout: '70%'
                    }
                });
            });
        </script>

        {{-- Preserve scroll position across page reloads / pagination --}}
        <script>
            (function() {
                var KEY = 'adminDashScrollY';

                // Restore scroll as early as possible
                var saved = sessionStorage.getItem(KEY);
                if (saved !== null) {
                    window.scrollTo(0, parseInt(saved, 10));
                    sessionStorage.removeItem(KEY);
                }

                // Save scroll before any link / form navigation
                document.addEventListener('click', function(e) {
                    var el = e.target.closest('a, button[type="submit"]');
                    if (el) sessionStorage.setItem(KEY, window.scrollY);
                });

                // Also catch form submits directly
                document.addEventListener('submit', function() {
                    sessionStorage.setItem(KEY, window.scrollY);
                });

                // Save on browser back/forward / refresh (beforeunload)
                window.addEventListener('beforeunload', function() {
                    sessionStorage.setItem(KEY, window.scrollY);
                });
            })();
        </script>

    </div>
</body>

</html>
