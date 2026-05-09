<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Session - LUXELENS</title>
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700,900|inter:100,300,400,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --gold: #c9aa74;
            --gold-strong: #b79156;
            --gold-bright: #ead8b0;
            --gold-soft: rgba(201, 170, 116, 0.14);
            --dark-bg: #050505;
            --panel-bg: rgba(12, 12, 12, 0.78);
            --panel-border: rgba(201, 170, 116, 0.14);
            --soft-white: #F5F5F5;
        }

        body {
            background:
                radial-gradient(circle at center, rgba(201, 170, 116, 0.14), transparent 24%),
                radial-gradient(circle at top, rgba(201, 170, 116, 0.08), transparent 30%),
                radial-gradient(circle at bottom right, rgba(201, 170, 116, 0.05), transparent 28%),
                linear-gradient(180deg, #040404 0%, #050505 50%, #020202 100%);
            color: var(--soft-white);
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.01em;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        .page-shell {
            position: relative;
            width: 100%;
            max-width: 56rem;
            margin-inline: auto;
            padding-inline: clamp(0.25rem, 1vw, 0.75rem);
        }

        .page-shell::before {
            content: '';
            position: absolute;
            inset: -36px;
            background: radial-gradient(circle, rgba(201, 170, 116, 0.08), transparent 58%);
            filter: blur(56px);
            opacity: 0.8;
            pointer-events: none;
        }

        .track-frame {
            position: relative;
            overflow: hidden;
            width: 100%;
            border-radius: 2rem;
            border: 1px solid rgba(201, 170, 116, 0.16);
            background: linear-gradient(180deg, rgba(10, 10, 10, 0.97), rgba(5, 5, 5, 0.99));
            box-shadow: 0 32px 96px rgba(0, 0, 0, 0.48);
            backdrop-filter: blur(18px);
        }

        .track-frame::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.035), transparent 24%, transparent 76%, rgba(201, 170, 116, 0.04));
            pointer-events: none;
        }

        .hero-panel {
            position: relative;
            overflow: hidden;
            padding: 3.2rem 3.2rem 2.6rem;
            background:
                radial-gradient(circle at top, rgba(201, 170, 116, 0.15), transparent 34%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        }

        .glass-chip,
        .glass-card,
        .stage-pill,
        .result-card {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .glass-chip {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        .hero-title {
            max-width: 34rem;
            text-wrap: balance;
            margin-inline: auto;
        }

        .hero-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 2.75rem;
        }

        .hero-copy {
            text-align: center;
            margin-bottom: 2.6rem;
        }

        .hero-code {
            margin-top: 0.9rem;
            font-size: 0.86rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .gold-text {
            color: var(--gold);
        }

        .stepper-shell {
            position: relative;
            padding: 1.85rem 1.6rem 1.55rem;
            border: 1px solid rgba(255, 255, 255, 0.055);
            border-radius: 1.75rem;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03), inset 0 0 0 1px rgba(201, 170, 116, 0.03);
        }

        .stepper-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 0;
        }

        .step-card {
            position: relative;
            z-index: 1;
            min-width: 86px;
            text-align: center;
        }

        .step-dot {
            position: relative;
            overflow: hidden;
            margin-inline: auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .step-dot::before {
            content: '';
            position: absolute;
            inset: 6px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .step-dot-active {
            box-shadow: 0 0 0 1px rgba(201, 170, 116, 0.12), 0 0 22px rgba(201, 170, 116, 0.16), 0 0 42px rgba(201, 170, 116, 0.08);
            animation: stepPulse 2.6s ease-in-out infinite;
        }

        .step-dot-active::before {
            opacity: 1;
        }

        .step-label {
            margin-top: 0.8rem;
            font-size: 0.58rem;
            line-height: 1.2;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .progress-track {
            position: relative;
            flex: 1;
            height: 6px;
            margin-top: 1.48rem;
            margin-inline: 0.55rem;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.07);
        }

        .progress-track::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(201, 170, 116, 0.1), rgba(201, 170, 116, 0.03));
        }

        .progress-fill {
            position: relative;
            height: 100%;
            border-radius: inherit;
            overflow: hidden;
            background: linear-gradient(90deg, rgba(183, 145, 86, 0.82), rgba(234, 216, 176, 0.98), rgba(201, 170, 116, 0.8));
            box-shadow: 0 0 18px rgba(201, 170, 116, 0.18);
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 2.8s linear infinite;
        }

        .stage-pill {
            display: inline-flex;
            flex-direction: column;
            gap: 0.35rem;
            min-width: min(100%, 24rem);
            padding: 1.35rem 1.7rem;
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.075);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.045), rgba(255, 255, 255, 0.015));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03), inset 0 0 0 1px rgba(201, 170, 116, 0.03);
        }

        .info-grid {
            display: grid;
            gap: 1.15rem;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .glass-card {
            position: relative;
            overflow: hidden;
            min-height: 132px;
            padding: 1.4rem 1.45rem;
            border-radius: 1.5rem;
            border: 1px solid rgba(201, 170, 116, 0.11);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.045), rgba(255, 255, 255, 0.012));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.025), inset 0 0 22px rgba(201, 170, 116, 0.025);
        }

        .glass-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(201, 170, 116, 0.05), transparent 35%, transparent 65%, rgba(255, 255, 255, 0.035));
            pointer-events: none;
        }

        .meta-label {
            font-size: 0.66rem;
            text-transform: uppercase;
            letter-spacing: 0.38em;
            color: rgba(255, 255, 255, 0.42);
            margin-bottom: 0.75rem;
        }

        .meta-value {
            font-size: 1.08rem;
            line-height: 1.55;
            color: white;
            font-weight: 600;
        }

        .result-card {
            position: relative;
            overflow: hidden;
            border-radius: 1.75rem;
            border: 1px solid rgba(201, 170, 116, 0.16);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.035), rgba(255, 255, 255, 0.015));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03), inset 0 0 24px rgba(201, 170, 116, 0.03);
        }

        .result-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top, rgba(201, 170, 116, 0.1), transparent 45%);
            pointer-events: none;
        }

        .luxury-text-gradient {
            background: linear-gradient(to right, #c29d66 0%, #ead8b0 50%, #c29d66 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-luxury {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            min-width: 18rem;
            padding: 15px 30px;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 0.28em;
            font-weight: 700;
            color: black;
            background: linear-gradient(135deg, #e4cea0 0%, #c9aa74 48%, #a77f48 100%);
            border-radius: 999px;
            transition: transform 0.28s ease, box-shadow 0.28s ease, filter 0.28s ease;
            text-decoration: none;
            box-shadow: 0 14px 34px rgba(201, 170, 116, 0.16);
        }

        .btn-luxury::before {
            content: '';
            position: absolute;
            inset: 1px;
            border-radius: inherit;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.28), rgba(255, 255, 255, 0.02));
            opacity: 0.35;
            pointer-events: none;
        }

        .btn-luxury:hover {
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 18px 42px rgba(201, 170, 116, 0.24);
            filter: brightness(1.03);
        }

        .btn-luxury:active {
            transform: translateY(-1px);
        }

        .btn-luxury-outline {
            color: var(--soft-white);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
            border: 1px solid rgba(255, 255, 255, 0.09);
            box-shadow: none;
        }

        .btn-luxury-outline:hover {
            box-shadow: 0 16px 34px rgba(255, 255, 255, 0.08);
        }

        .content-panel {
            padding: 2.4rem 2.6rem 2.75rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, #050505 0%, #040404 100%);
        }

        .section-gap-lg {
            margin-top: 2.2rem;
        }

        .section-gap-xl {
            margin-top: 2.8rem;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        @keyframes stepPulse {

            0%,
            100% {
                box-shadow: 0 0 0 1px rgba(201, 170, 116, 0.12), 0 0 22px rgba(201, 170, 116, 0.16), 0 0 42px rgba(201, 170, 116, 0.08);
            }

            50% {
                box-shadow: 0 0 0 1px rgba(201, 170, 116, 0.18), 0 0 28px rgba(201, 170, 116, 0.2), 0 0 56px rgba(201, 170, 116, 0.11);
            }
        }

        @media (max-width: 768px) {
            .hero-panel {
                padding: 2rem 1.35rem 1.9rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .hero-meta {
                justify-content: center;
                text-align: center;
                margin-bottom: 2rem;
            }

            .hero-copy {
                margin-bottom: 2rem;
            }

            .stepper-row {
                gap: 0.15rem;
            }

            .progress-track {
                min-width: 1.25rem;
                margin-inline: 0.3rem;
            }

            .meta-value {
                font-size: 1rem;
            }

            .content-panel {
                padding: 1.7rem 1.35rem 2rem;
            }

            .btn-luxury {
                min-width: min(100%, 18rem);
                width: 100%;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-12">
    @php
        $displayPaymentStatus = $booking->payment_status;
        $displayAmountPaid = $booking->amount_paid ?? 0;

        if (
            in_array($booking->status, ['Lunas', 'Editing', 'Selesai'], true) &&
            (($displayPaymentStatus === null || $displayPaymentStatus === 'pending') && (float) $displayAmountPaid <= 0)
        ) {
            $displayPaymentStatus = 'full_payment';
            $displayAmountPaid = $booking->harga;
        }

        $hasLink = !empty($booking->link_results);
        $isFullPaid = $displayPaymentStatus === 'full_payment';
        $isEditing = $booking->status === 'Editing';
        $isSelesai = $booking->status === 'Selesai';
        $isLunas = $booking->status === 'Lunas';
        $currentStep = 1;
        if ($isLunas || $isEditing || $isSelesai || $isFullPaid) {
            $currentStep = 2;
        }
        if ($isEditing || ($isFullPaid && !$hasLink)) {
            $currentStep = 3;
        }
        if ($isSelesai || $hasLink) {
            $currentStep = 4;
        }
        $currentStatusLabel =
            $isSelesai || $hasLink
                ? 'Done'
                : ($currentStep === 3
                    ? 'Editing'
                    : ($currentStep === 2
                        ? 'Verified'
                        : 'Pending'));
    @endphp

    <div class="page-shell">
        <div class="track-frame">
            <div class="hero-panel">
                <div class="hero-meta">
                    <span class="glass-chip px-4 py-2 text-[10px] uppercase tracking-[0.35em] text-white/80">Track
                        Session</span>
                    <span class="text-[10px] uppercase tracking-[0.35em] gold-text">Session date
                        {{ date('d M Y', strtotime($booking->tanggal_pemotretan)) }}</span>
                </div>

                <div class="hero-copy">
                    <h1
                        class="hero-title playfair text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
                        {{ ucfirst($booking->kategori) }} <span class="gold-text">•</span>
                        {{ $booking->photographer_name ?? 'Team Assignment' }}</h1>
                    <p class="hero-code">Booking code <span
                            class="gold-text font-semibold">{{ $booking->booking_code }}</span></p>
                </div>

                <div class="flex flex-col gap-5">
                    <div class="stepper-shell">
                        <div class="stepper-row">
                            @foreach ([['label' => 'Pending', 'step' => 1], ['label' => 'Verified', 'step' => 2], ['label' => 'Editing', 'step' => 3], ['label' => 'Done', 'step' => 4]] as $stepData)
                                @php $active = $currentStep >= $stepData['step']; @endphp
                                <div class="step-card">
                                    <div class="step-dot flex h-14 w-14 items-center justify-center rounded-full text-lg font-black {{ $active ? 'step-dot-active text-black' : 'bg-white/10 text-white/60' }}"
                                        style="background:{{ $active ? 'linear-gradient(135deg, #e4cea0 0%, #c9aa74 55%, #a77f48 100%)' : 'rgba(255,255,255,0.08)' }};">
                                        {{ $stepData['step'] }}
                                    </div>
                                    <div class="step-label {{ $active ? 'gold-text' : 'text-white/40' }}">
                                        {{ $stepData['label'] }}</div>
                                </div>
                                @if (!$loop->last)
                                    <div class="progress-track">
                                        <div
                                            class="progress-fill {{ $currentStep > $stepData['step'] ? 'w-full' : 'w-0' }}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center pt-4">
                        <div class="stage-pill mx-auto">
                            <p class="text-[10px] uppercase tracking-[0.35em] text-white/50">Current stage</p>
                            <p class="luxury-text-gradient text-3xl md:text-4xl font-black">
                                {{ strtoupper($currentStatusLabel) }}</p>
                            <p class="text-sm text-white/60">Terakhir diperbarui:
                                {{ $booking->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-panel">
                <div class="info-grid">
                    <div class="glass-card">
                        <p class="meta-label">Nama</p>
                        <p class="meta-value">{{ $booking->nama_customer }}</p>
                    </div>
                    <div class="glass-card">
                        <p class="meta-label">Kategori</p>
                        <p class="meta-value">{{ $booking->kategori }}</p>
                    </div>
                    <div class="glass-card">
                        <p class="meta-label">Tanggal sesi</p>
                        <p class="meta-value">{{ date('d M Y', strtotime($booking->tanggal_pemotretan)) }}</p>
                    </div>
                    <div class="glass-card">
                        <p class="meta-label">Status pembayaran</p>
                        <p class="meta-value">{{ strtoupper($displayPaymentStatus ?? 'PENDING') }}</p>
                    </div>
                </div>

                @if ($booking->link_results)
                    <div class="result-card section-gap-lg p-6 text-center md:p-8">
                        <p class="text-sm text-white/70 uppercase tracking-[0.25em] mb-4">Link Hasil Foto</p>
                        <a href="{{ $booking->link_results }}" target="_blank" class="btn-luxury">Download dari Google
                            Drive</a>
                    </div>
                @endif

                <div class="section-gap-xl text-center">
                    <a href="/" class="btn-luxury btn-luxury-outline">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
