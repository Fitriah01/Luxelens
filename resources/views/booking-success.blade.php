<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Received | LUXELENS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* ── Reset & Variables ─────────────────────────────── */
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
            --card: rgba(18, 14, 8, 0.88);
            --card2: rgba(255, 255, 255, 0.03);
            --border: rgba(225, 197, 100, 0.18);
            --border2: rgba(255, 255, 255, 0.07);
            --text: #F5F0E8;
            --muted: #7A6A52;
            --green: #5DBF8A;
            --red: #E06060;
            --radius: 16px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px 72px;
            background-image:
                linear-gradient(to bottom, rgba(5, 5, 5, 0.78) 0%, rgba(5, 5, 5, 0.96) 100%),
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
            filter: blur(130px);
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(225, 197, 100, 0.07), transparent 70%);
            top: -140px;
            left: -140px;
        }

        body::after {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(191, 161, 90, 0.05), transparent 70%);
            bottom: -110px;
            right: -110px;
        }

        /* ── Wrapper ───────────────────────────────────────── */
        .bk-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 540px;
        }

        /* ── Animations ────────────────────────────────────── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scalePop {
            0% {
                opacity: 0;
                transform: scale(.82);
            }

            70% {
                transform: scale(1.04);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes checkDraw {
            from {
                stroke-dashoffset: 48;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        @keyframes pulseRing {
            0% {
                transform: scale(1);
                opacity: .6;
            }

            100% {
                transform: scale(1.55);
                opacity: 0;
            }
        }

        /* ── Success badge ─────────────────────────────────── */
        .success-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 28px;
            animation: fadeUp .5s ease both;
        }

        .badge-ring-wrap {
            position: relative;
            width: 72px;
            height: 72px;
            margin-bottom: 16px;
        }

        .badge-ring-wrap::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            animation: pulseRing 2s ease-out infinite;
        }

        .badge-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(225, 197, 100, .12);
            border: 2px solid var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scalePop .6s ease both;
        }

        .badge-circle svg {
            width: 34px;
            height: 34px;
            stroke: var(--gold);
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: checkDraw .5s .4s ease forwards;
        }

        .success-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            background: linear-gradient(135deg, var(--gold) 30%, #fff 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 6px;
            text-align: center;
        }

        .success-sub {
            font-size: 13px;
            color: var(--muted);
            text-align: center;
            line-height: 1.6;
        }

        .success-sub strong {
            color: var(--text);
            font-weight: 600;
        }

        /* ── Main card ─────────────────────────────────────── */
        .bk-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 36px;
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            box-shadow: 0 32px 80px rgba(0, 0, 0, .55), 0 0 0 1px rgba(225, 197, 100, .05) inset;
            animation: fadeUp .5s .1s ease both;
        }

        /* ── Section rows ──────────────────────────────────── */
        .bk-row {
            background: var(--card2);
            border: 1px solid var(--border2);
            border-radius: 14px;
            padding: 18px 20px;
            margin-bottom: 14px;
        }

        .bk-row-label {
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
            font-weight: 600;
        }

        /* ── Booking code ──────────────────────────────────── */
        .code-row {
            border: 1px dashed rgba(225, 197, 100, .4);
            background: rgba(225, 197, 100, .05);
            text-align: center;
        }

        .code-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            letter-spacing: 5px;
            color: var(--gold);
            margin: 4px 0 12px;
            line-height: 1;
        }

        .btn-copy {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 16px;
            background: rgba(225, 197, 100, .12);
            border: 1px solid rgba(225, 197, 100, .35);
            border-radius: 50px;
            color: var(--gold);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: all .2s;
        }

        .btn-copy:hover {
            background: rgba(225, 197, 100, .22);
        }

        .btn-copy svg {
            width: 12px;
            height: 12px;
        }

        .copy-feedback {
            display: inline-block;
            margin-left: 10px;
            font-size: 11px;
            color: var(--green);
            opacity: 0;
            transition: opacity .3s;
        }

        .copy-feedback.show {
            opacity: 1;
        }

        /* ── DP amount ─────────────────────────────────────── */
        .dp-row {
            border-left: 3px solid var(--gold);
        }

        .dp-amount {
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--gold);
            letter-spacing: 1px;
            line-height: 1;
            margin-top: 4px;
        }

        .dp-note {
            font-size: 11px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* ── QRIS ──────────────────────────────────────────── */
        .qris-wrap {
            text-align: center;
            margin: 18px 0;
        }

        .qris-label {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .qris-frame {
            display: inline-block;
            padding: 10px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 8px 40px rgba(225, 197, 100, .18);
        }

        .qris-frame img {
            display: block;
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* ── Upload section ────────────────────────────────── */
        .upload-row {
            border: 1px dashed rgba(225, 197, 100, .3);
            background: rgba(225, 197, 100, .03);
        }

        .upload-row-title {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 14px;
            text-align: center;
        }

        .file-drop {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid var(--border2);
            border-radius: 10px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: border-color .2s;
        }

        .file-drop:hover {
            border-color: rgba(225, 197, 100, .4);
        }

        .file-drop-inner {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
            min-width: 0;
        }

        .file-drop-inner svg {
            width: 16px;
            height: 16px;
            color: var(--muted);
            flex-shrink: 0;
        }

        .file-name {
            font-size: 12px;
            color: var(--muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-browse {
            font-size: 11px;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: .5px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        input[type="file"] {
            display: none;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dk) 100%);
            color: #0a0800;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 6px 24px rgba(225, 197, 100, .25);
            transition: all .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(225, 197, 100, .35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit svg {
            width: 15px;
            height: 15px;
        }

        .btn-submit .spinner {
            display: none;
            width: 15px;
            height: 15px;
            border: 2px solid rgba(0, 0, 0, .2);
            border-top-color: #0a0800;
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }

        .btn-submit.loading .btn-text,
        .btn-submit.loading svg {
            display: none;
        }

        .btn-submit.loading .spinner {
            display: block;
        }

        /* ── Proof sent state ──────────────────────────────── */
        .proof-sent {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: rgba(93, 191, 138, .07);
            border: 1px solid rgba(93, 191, 138, .3);
            border-radius: 10px;
        }

        .proof-sent svg {
            width: 18px;
            height: 18px;
            color: var(--green);
            flex-shrink: 0;
        }

        .proof-sent-text p:first-child {
            font-size: 13px;
            font-weight: 600;
            color: var(--green);
        }

        .proof-sent-text p:last-child {
            font-size: 11px;
            color: var(--muted);
            margin-top: 2px;
        }

        /* ── Flash ─────────────────────────────────────────── */
        .flash {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 14px;
            border: 1px solid;
            animation: fadeUp .35s ease both;
        }

        .flash.success {
            background: rgba(93, 191, 138, .08);
            color: var(--green);
            border-color: rgba(93, 191, 138, .3);
        }

        .flash svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        /* ── Back button ───────────────────────────────────── */
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            margin-top: 12px;
            padding: 13px;
            border: 1px solid var(--border2);
            border-radius: 10px;
            background: transparent;
            color: var(--muted);
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-back:hover {
            border-color: var(--border);
            color: var(--text);
        }

        .btn-back svg {
            width: 13px;
            height: 13px;
        }

        /* ── Responsive ────────────────────────────────────── */
        @media (max-width: 480px) {
            .bk-card {
                padding: 24px 18px;
            }

            .code-value {
                font-size: 1.6rem;
                letter-spacing: 3px;
            }

            .dp-amount {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>
    <div class="bk-wrap">

        {{-- Success badge + greeting --}}
        <div class="success-badge">
            <div class="badge-ring-wrap">
                <div class="badge-circle">
                    <svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
            </div>
            <h1 class="success-title">Reservasi Diterima!</h1>
            <p class="success-sub">Halo <strong>{{ $booking->nama_customer }}</strong>, terima kasih telah mempercayai
                LUXELENS.</p>
        </div>

        <div class="bk-card">

            {{-- Flash upload success --}}
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

            {{-- Booking code --}}
            <div class="bk-row code-row">
                <p class="bk-row-label">Simpan Kode Booking Anda</p>
                <div class="code-value">{{ $booking->booking_code }}</div>
                <button class="btn-copy" onclick="copyCode()" id="copy-btn">
                    <svg viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path
                            d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                    </svg>
                    Salin Kode
                </button>
                <span class="copy-feedback" id="copy-feedback">✓ Tersalin</span>
            </div>

            {{-- DP Amount --}}
            <div class="bk-row dp-row">
                <p class="bk-row-label">Minimal DP (30%)</p>
                <div class="dp-amount">Rp {{ number_format($booking->harga * 0.3, 0, ',', '.') }}
                    <span
                        style="font-size:13px;font-weight:500;color:rgba(225,197,100,.6);font-family:'Inter',sans-serif;">(DP)</span>
                </div>
                <p class="dp-note">
                    dari total
                    <strong style="color:rgba(255,255,255,.65);">Rp
                        {{ number_format($booking->harga, 0, ',', '.') }}</strong>
                    <span style="color:rgba(225,197,100,.45);">(Total Booking)</span>
                </p>
            </div>

            {{-- QRIS --}}
            <div class="qris-wrap">
                <p class="qris-label">Scan QRIS untuk Pembayaran</p>
                <div class="qris-frame">
                    <img src="{{ asset('images/qris-pembayaran.jpg') }}" alt="QRIS Pembayaran">
                </div>
            </div>

            {{-- Upload proof --}}
            <div class="bk-row upload-row">
                <p class="upload-row-title">Upload Bukti Transfer</p>

                @if ($booking->proof_payment)
                    <div class="proof-sent">
                        <svg viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="proof-sent-text">
                            <p>Bukti transfer telah terkirim.</p>
                            <p>Admin akan memverifikasi pesanan Anda segera.</p>
                        </div>
                    </div>
                @else
                    <form action="{{ route('user.upload.proof', ['id' => $booking->id]) }}" method="POST"
                        enctype="multipart/form-data" id="upload-form">
                        @csrf
                        <input type="file" name="proof_file" id="proof_file" accept="image/*" required>
                        <div class="file-drop" onclick="document.getElementById('proof_file').click()">
                            <div class="file-drop-inner">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="file-name" id="file-name-label">Tidak ada file yang dipilih</span>
                            </div>
                            <span class="file-browse">Pilih File</span>
                        </div>
                        <button type="submit" class="btn-submit" id="btn-upload">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="btn-text">Kirim Bukti Sekarang</span>
                            <div class="spinner"></div>
                        </button>
                    </form>
                @endif
            </div>

            {{-- Back to home --}}
            <a href="/" class="btn-back">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        function copyCode() {
            const code = "{{ $booking->booking_code }}";
            navigator.clipboard.writeText(code).then(function() {
                const fb = document.getElementById('copy-feedback');
                fb.classList.add('show');
                setTimeout(() => fb.classList.remove('show'), 2200);
            });
        }

        const fileInput = document.getElementById('proof_file');
        const fileLabel = document.getElementById('file-name-label');
        const uploadForm = document.getElementById('upload-form');
        const btnUpload = document.getElementById('btn-upload');

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                fileLabel.textContent = this.files[0] ? this.files[0].name : 'Tidak ada file yang dipilih';
            });
        }
        if (uploadForm) {
            uploadForm.addEventListener('submit', function() {
                btnUpload.classList.add('loading');
            });
        }
    </script>
</body>

</html>
