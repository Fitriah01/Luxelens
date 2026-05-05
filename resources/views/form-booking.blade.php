<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Session | LUXELENS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        /* ── Reset & Base ───────────────────────────────────── */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #E1C564;
            --gold-dk: #BFA15A;
            --dark: #050505;
            --card: rgba(18, 14, 8, 0.82);
            --border: rgba(225, 197, 100, 0.18);
            --input-bg: rgba(255, 255, 255, 0.04);
            --text: #F5F0E8;
            --muted: #7A6A52;
            --red: #E06060;
            --green: #5DBF8A;
            --radius: 16px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 40px 16px 60px;
            background-image:
                linear-gradient(to bottom, rgba(5, 5, 5, 0.72) 0%, rgba(5, 5, 5, 0.92) 100%),
                url('{{ asset('images/foto1.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* ambient glows */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(225, 197, 100, 0.07), transparent 70%);
            top: -160px;
            left: -160px;
        }

        body::after {
            width: 440px;
            height: 440px;
            background: radial-gradient(circle, rgba(191, 161, 90, 0.06), transparent 70%);
            bottom: -120px;
            right: -120px;
        }

        /* ── Layout wrapper ─────────────────────────────────── */
        .bk-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 620px;
            animation: fadeUp .55s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Flash Banners ──────────────────────────────────── */
        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            border: 1px solid;
            animation: fadeUp .4s ease both;
        }

        .flash.success {
            background: rgba(93, 191, 138, .10);
            color: var(--green);
            border-color: rgba(93, 191, 138, .35);
        }

        .flash.error {
            background: rgba(224, 96, 96, .10);
            color: var(--red);
            border-color: rgba(224, 96, 96, .35);
        }

        .flash svg {
            flex-shrink: 0;
            width: 17px;
            height: 17px;
        }

        /* ── Card ───────────────────────────────────────────── */
        .bk-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 44px 44px 36px;
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            box-shadow: 0 32px 80px rgba(0, 0, 0, .55), 0 0 0 1px rgba(225, 197, 100, .06) inset;
        }

        /* ── Brand header ───────────────────────────────────── */
        .bk-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .bk-brand-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--gold);
            box-shadow: 0 0 8px var(--gold);
        }

        .bk-brand-text {
            font-size: 10px;
            letter-spacing: 3.5px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600;
        }

        .bk-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.6rem;
            text-align: center;
            background: linear-gradient(135deg, var(--gold) 30%, #fff 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.15;
            margin-bottom: 6px;
        }

        .bk-sub {
            text-align: center;
            font-size: 11px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 36px;
        }

        /* ── Divider ────────────────────────────────────────── */
        .bk-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
            color: var(--muted);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .bk-divider::before,
        .bk-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── Floating-label fields ──────────────────────────── */
        .field {
            position: relative;
            margin-bottom: 22px;
        }

        .field label {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            font-size: 13px;
            color: var(--muted);
            pointer-events: none;
            transition: all .22s ease;
            background: transparent;
            padding: 0 4px;
        }

        .field input {
            width: 100%;
            padding: 16px 14px 8px;
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color .22s, box-shadow .22s;
        }

        .field input:focus,
        .field input:not(:placeholder-shown) {
            border-color: rgba(225, 197, 100, .5);
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .08);
        }

        .field input:focus+label,
        .field input:not(:placeholder-shown)+label {
            top: 6px;
            transform: none;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold);
        }

        .field input[type="date"] {
            padding: 14px 14px 14px;
        }

        .field input[type="date"]+label {
            top: -8px;
            transform: none;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold);
            background: var(--dark);
            padding: 0 6px;
        }

        .field input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1) brightness(0.6) sepia(1) saturate(3) hue-rotate(0deg);
            cursor: pointer;
            opacity: 0.7;
        }

        /* ── Category icon cards ────────────────────────────── */
        .cat-label {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 12px;
            font-weight: 500;
        }

        .cat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 24px;
        }

        .cat-item {
            position: relative;
            cursor: pointer;
        }

        .cat-item input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .cat-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 14px 8px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            background: var(--input-bg);
            cursor: pointer;
            transition: all .22s ease;
            user-select: none;
        }

        .cat-tile .cat-name {
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 500;
            transition: color .22s;
            text-align: center;
        }

        .cat-tile:hover {
            border-color: rgba(225, 197, 100, .35);
            background: rgba(225, 197, 100, .05);
        }

        .cat-tile:hover .cat-name {
            color: var(--gold);
        }

        .cat-item input:checked+.cat-tile {
            border-color: var(--gold);
            background: rgba(225, 197, 100, .1);
            box-shadow: 0 0 0 2px rgba(225, 197, 100, .25);
        }

        .cat-item input:checked+.cat-tile .cat-name {
            color: var(--gold);
        }

        /* ── Photographer strip ─────────────────────────────── */
        .photo-strip {
            display: none;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
            margin-bottom: 22px;
            animation: fadeUp .3s ease both;
        }

        .photo-strip.visible {
            display: flex;
        }

        .photo-chip {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 7px 14px;
            border: 1px solid rgba(225, 197, 100, .25);
            border-radius: 50px;
            background: rgba(225, 197, 100, .06);
            font-size: 12px;
            color: var(--gold);
            cursor: pointer;
            transition: all .2s;
            font-weight: 500;
        }

        .photo-chip:hover,
        .photo-chip.selected {
            background: rgba(225, 197, 100, .18);
            border-color: var(--gold);
        }

        .photo-chip .chip-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
        }

        .photo-strip-label {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .photo-strip-wrap {
            margin-bottom: 22px;
        }

        /* ── Availability notice ────────────────────────────── */
        .avail-notice {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            margin-top: 8px;
            border: 1px solid;
        }

        .avail-notice.full {
            background: rgba(224, 96, 96, .08);
            color: var(--red);
            border-color: rgba(224, 96, 96, .3);
        }

        .avail-notice.ok {
            background: rgba(93, 191, 138, .07);
            color: var(--green);
            border-color: rgba(93, 191, 138, .3);
        }

        .avail-notice.show {
            display: flex;
        }

        /* ── Submit button ──────────────────────────────────── */
        .btn-submit {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 8px;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dk) 100%);
            color: #0a0800;
            box-shadow: 0 6px 28px rgba(225, 197, 100, .28);
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, .1), transparent);
            opacity: 0;
            transition: opacity .25s;
        }

        .btn-submit:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 36px rgba(225, 197, 100, .38);
        }

        .btn-submit:hover::after {
            opacity: 1;
        }

        .btn-submit:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn-submit:disabled {
            background: #1e1e1e;
            color: #444;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }

        /* loading spinner inside button */
        .btn-submit .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(0, 0, 0, .25);
            border-top-color: #0a0800;
            border-radius: 50%;
            animation: spin .7s linear infinite;
            margin: 0 auto;
        }

        .btn-submit.loading .btn-text {
            display: none;
        }

        .btn-submit.loading .spinner {
            display: block;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ── Back link ──────────────────────────────────────── */
        .bk-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 22px;
            color: var(--muted);
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 1px;
            transition: color .2s;
        }

        .bk-back:hover {
            color: var(--gold);
        }

        .bk-back svg {
            width: 14px;
            height: 14px;
            transition: transform .2s;
        }

        .bk-back:hover svg {
            transform: translateX(-3px);
        }

        /* ── Error validation list ──────────────────────────── */
        .val-errors {
            background: rgba(224, 96, 96, .08);
            border: 1px solid rgba(224, 96, 96, .3);
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 22px;
        }

        .val-errors ul {
            padding-left: 16px;
        }

        .val-errors li {
            font-size: 12px;
            color: var(--red);
            margin-bottom: 4px;
        }

        /* ── Responsive ─────────────────────────────────────── */
        @media (max-width: 520px) {
            .bk-card {
                padding: 30px 20px 28px;
            }

            .bk-title {
                font-size: 2rem;
            }

            .cat-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 7px;
            }

            .cat-tile {
                padding: 11px 4px;
            }
        }
    </style>
</head>

<body>
    <div class="bk-wrap">

        {{-- Flash success --}}
        @if (session('success'))
            <div class="flash success">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Flash error --}}
        @if (session('error'))
            <div class="flash error">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="val-errors">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bk-card">
            {{-- Brand chip --}}
            <div class="bk-brand">
                <div class="bk-brand-dot"></div>
                <span class="bk-brand-text">LUXELENS STUDIO</span>
                <div class="bk-brand-dot"></div>
            </div>

            <h1 class="bk-title">Reservation</h1>
            <p class="bk-sub">Secure Your Cinematic Moment</p>

            <form action="/proses-booking" method="POST" id="bk-form" novalidate>
                @csrf

                {{-- Nama --}}
                <div class="bk-divider">Personal Info</div>

                <div class="field">
                    <input type="text" name="nama_customer" id="nama_customer" placeholder=" " required
                        value="{{ old('nama_customer') }}">
                    <label for="nama_customer">Nama Lengkap</label>
                </div>

                <div class="field">
                    <input type="email" name="email" id="email" placeholder=" " required
                        value="{{ old('email') }}">
                    <label for="email">Email Aktif</label>
                </div>

                <div class="field">
                    <input type="tel" name="nomor_telepon" id="nomor_telepon" placeholder=" " required
                        value="{{ old('nomor_telepon') }}">
                    <label for="nomor_telepon">Nomor WhatsApp</label>
                </div>

                {{-- Category --}}
                <div class="bk-divider">Session Type</div>

                <p class="cat-label">Pilih Kategori</p>
                <div class="cat-grid">
                    @php
                        $cats = [
                            ['value' => 'wedding', 'label' => 'Wedding'],
                            ['value' => 'wisuda', 'label' => 'Graduation'],
                            ['value' => 'prewed', 'label' => 'Pre-Wedding'],
                            ['value' => 'family', 'label' => 'Family'],
                        ];
                    @endphp
                    @foreach ($cats as $cat)
                        <label class="cat-item">
                            <input type="radio" name="kategori" value="{{ $cat['value'] }}"
                                {{ ($tema ?? old('kategori')) == $cat['value'] ? 'checked' : '' }} required>
                            <div class="cat-tile">
                                <span class="cat-name">{{ $cat['label'] }}</span>
                            </div>
                        </label>
                    @endforeach
                </div>

                {{-- Date + Photographer --}}
                <div class="bk-divider">Schedule</div>

                <div class="field" style="margin-bottom:10px;">
                    <input type="date" name="tanggal_pemotretan" id="tanggal_input" required
                        value="{{ old('tanggal_pemotretan') }}">
                    <label for="tanggal_input">Tanggal Pemotretan</label>
                </div>

                <div class="avail-notice full" id="notice_full">
                    <svg viewBox="0 0 20 20" fill="currentColor" style="width:15px;height:15px;flex-shrink:0;">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tanggal sudah penuh — pilih jadwal lain.
                </div>
                <div class="avail-notice ok" id="notice_ok">
                    <svg viewBox="0 0 20 20" fill="currentColor" style="width:15px;height:15px;flex-shrink:0;">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Tanggal tersedia — silakan lanjut.
                </div>

                {{-- Photographer selection --}}
                <div class="photo-strip-wrap" id="photo_strip_wrap" style="display:none;">
                    <p class="photo-strip-label">Fotografer Tersedia</p>
                    <div class="photo-strip visible" id="photo_strip"></div>
                    <input type="hidden" name="photographer_name" id="photographer_hidden">
                </div>

                {{-- Hidden booking_type field --}}
                <input type="hidden" name="booking_type" id="booking_type_hidden"
                    value="{{ in_array($tema ?? '', ['event-dokumentasi', 'company-profile', 'birthday-party']) ? 'event' : 'paket' }}">

                {{-- Extra fields for Event / Custom categories --}}
                @if (in_array($tema ?? '', ['event-dokumentasi', 'company-profile', 'birthday-party']))
                    <div class="bk-divider">Detail Acara</div>

                    {{-- Event info callout --}}
                    <div
                        style="display:flex;gap:10px;padding:12px 14px;border-radius:12px;background:rgba(124,124,255,.06);border:1px solid rgba(124,124,255,.18);margin-bottom:18px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7c7cff"
                            stroke-width="2" style="flex-shrink:0;margin-top:2px;">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span style="font-size:11px;color:#888;line-height:1.6;">
                            Booking event akan memiliki status <strong style="color:#9a9aff;">Waiting for
                                Quote</strong>.
                            Admin akan menentukan harga setelah meninjau detail acara Anda.
                        </span>
                    </div>

                    <div class="field" style="margin-bottom:14px;">
                        <textarea name="event_details" id="event_details" placeholder=" " rows="4"
                            style="width:100%;background:var(--input-bg);border:1px solid var(--border);border-radius:var(--radius);color:var(--text);font-family:'Inter',sans-serif;font-size:13px;padding:16px 14px;resize:vertical;outline:none;transition:border-color .22s;"
                            onfocus="this.style.borderColor='var(--gold)';this.style.boxShadow='0 0 0 3px rgba(225,197,100,.08)'"
                            onblur="this.style.borderColor='var(--border)';this.style.boxShadow='none'">{{ old('event_details') }}</textarea>
                        <label for="event_details"
                            style="position:absolute;left:14px;top:16px;font-size:13px;color:var(--muted);pointer-events:none;transition:all .22s;background:transparent;">Deskripsi
                            / Detail Acara</label>
                    </div>

                    <div class="field">
                        <input type="text" name="estimasi_durasi" id="estimasi_durasi" placeholder=" "
                            value="{{ old('estimasi_durasi') }}" style="font-family:'Courier New',monospace;">
                        <label for="estimasi_durasi">Estimasi Durasi (contoh: 3 Jam, Full Day)</label>
                    </div>
                @endif

                {{-- Submit --}}
                <button type="submit" class="btn-submit" id="btn_submit">
                    <span
                        class="btn-text">{{ in_array($tema ?? '', ['event-dokumentasi', 'company-profile', 'birthday-party']) ? 'Ajukan Penawaran' : 'Confirm Booking' }}</span>
                    <div class="spinner"></div>
                </button>
            </form>

            <a href="{{ url()->previous() == url()->current() ? '/' : url()->previous() }}" class="bk-back">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <script>
        (function() {
            const inputTanggal = document.getElementById('tanggal_input');
            const noticeFull = document.getElementById('notice_full');
            const noticeOk = document.getElementById('notice_ok');
            const btnSubmit = document.getElementById('btn_submit');
            const photoWrap = document.getElementById('photo_strip_wrap');
            const photoStrip = document.getElementById('photo_strip');
            const photoHidden = document.getElementById('photographer_hidden');
            const form = document.getElementById('bk-form');

            /* set min date to today */
            const today = new Date().toISOString().split('T')[0];
            inputTanggal.min = today;

            function hideNotices() {
                noticeFull.classList.remove('show');
                noticeOk.classList.remove('show');
            }

            function clearPhotographers() {
                photoWrap.style.display = 'none';
                photoStrip.innerHTML = '';
                photoHidden.value = '';
            }

            function renderPhotographers(photographers) {
                photoStrip.innerHTML = '';
                if (!photographers.length) {
                    clearPhotographers();
                    return;
                }
                photographers.forEach(p => {
                    const chip = document.createElement('div');
                    chip.className = 'photo-chip';
                    chip.innerHTML = `<span class="chip-dot"></span>${p.label}`;
                    chip.addEventListener('click', function() {
                        document.querySelectorAll('.photo-chip').forEach(c => c.classList.remove(
                            'selected'));
                        chip.classList.add('selected');
                        photoHidden.value = p.label;
                    });
                    photoStrip.appendChild(chip);
                });
                photoWrap.style.display = 'block';
            }

            async function checkDate(date) {
                if (!date) return;
                hideNotices();
                clearPhotographers();
                btnSubmit.disabled = true;

                try {
                    const [availRes, photosRes] = await Promise.all([
                        fetch(`/check-availability?date=${date}`),
                        fetch(`/available-photographers?date=${date}`)
                    ]);
                    const avail = await availRes.json();
                    const photos = await photosRes.json();

                    if (avail.booked) {
                        noticeFull.classList.add('show');
                        btnSubmit.disabled = true;
                    } else {
                        noticeOk.classList.add('show');
                        btnSubmit.disabled = false;
                        renderPhotographers(photos.photographers || []);
                    }
                } catch (e) {
                    /* silent fail — allow submit */
                    btnSubmit.disabled = false;
                }
            }

            inputTanggal.addEventListener('change', function() {
                checkDate(this.value);
            });

            /* pre-check if date already filled (e.g. old input on error) */
            if (inputTanggal.value) {
                checkDate(inputTanggal.value);
            }

            /* Loading state on submit */
            form.addEventListener('submit', function() {
                btnSubmit.classList.add('loading');
            });
        })();
    </script>

</body>

</html>
