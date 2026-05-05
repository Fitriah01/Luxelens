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
            --gold: #E1C564;
            --dark-bg: #050505;
            --soft-white: #F5F5F5;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--soft-white);
            font-family: 'Inter', sans-serif;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        .luxury-text-gradient {
            background: linear-gradient(to right, #E1C564 0%, #FFF8E1 50%, #E1C564 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-luxury {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: 700;
            color: black;
            background-color: var(--gold);
            border-radius: 999px;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-luxury:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 38px rgba(225, 197, 100, 0.2);
        }

        .step-card {
            min-width: 84px;
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

    <div class="w-full max-w-4xl bg-[#090909] border border-[#D4AF37]/20 rounded-4xl shadow-2xl overflow-hidden">
        <div
            class="relative overflow-hidden bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.14),transparent_35%)] p-10">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <span
                    class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-[10px] uppercase tracking-[0.35em] text-white/80">Track
                    Session</span>
                <span class="text-[10px] uppercase tracking-[0.35em] text-[#D4AF37]">Session date
                    {{ date('d M Y', strtotime($booking->tanggal_pemotretan)) }}</span>
            </div>

            <div class="mb-8">
                <h1 class="playfair text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
                    {{ ucfirst($booking->kategori) }} <span class="text-[#D4AF37]">•</span>
                    {{ $booking->photographer_name ?? 'Team Assignment' }}</h1>
                <p class="mt-3 text-sm text-white/60">Booking code <span
                        class="text-[#D4AF37] font-semibold">{{ $booking->booking_code }}</span></p>
            </div>

            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between gap-4">
                    @foreach ([['label' => 'Pending', 'step' => 1], ['label' => 'Verified', 'step' => 2], ['label' => 'Editing', 'step' => 3], ['label' => 'Done', 'step' => 4]] as $stepData)
                        @php $active = $currentStep >= $stepData['step']; @endphp
                        <div class="step-card text-center">
                            <div
                                class="mx-auto flex h-14 w-14 items-center justify-center rounded-full text-lg font-black {{ $active ? 'bg-[#D4AF37] text-black shadow-[0_0_40px_rgba(212,175,55,0.2)]' : 'bg-white/10 text-white/60' }}">
                                {{ $stepData['step'] }}
                            </div>
                            <div
                                class="mt-3 text-[10px] uppercase tracking-[0.35em] font-semibold {{ $active ? 'text-[#D4AF37]' : 'text-white/40' }}">
                                {{ $stepData['label'] }}</div>
                        </div>
                        @if (!$loop->last)
                            <div
                                class="flex-1 h-0.5 {{ $currentStep > $stepData['step'] ? 'bg-[#D4AF37]' : 'bg-white/10' }} mt-7">
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="text-center pt-6 border-t border-white/10">
                    <p class="text-[10px] uppercase tracking-[0.35em] text-white/50 mb-2">Current stage</p>
                    <p class="text-3xl md:text-4xl font-black text-white">{{ strtoupper($currentStatusLabel) }}</p>
                    <p class="mt-2 text-sm text-white/60">Terakhir diperbarui:
                        {{ $booking->updated_at->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="p-8 border-t border-white/10 bg-[#050505]">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.35em] text-white/50">Nama</p>
                    <p class="text-lg text-white font-semibold">{{ $booking->nama_customer }}</p>
                </div>
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.35em] text-white/50">Kategori</p>
                    <p class="text-lg text-white font-semibold">{{ $booking->kategori }}</p>
                </div>
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.35em] text-white/50">Tanggal sesi</p>
                    <p class="text-lg text-white font-semibold">
                        {{ date('d M Y', strtotime($booking->tanggal_pemotretan)) }}</p>
                </div>
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.35em] text-white/50">Status pembayaran</p>
                    <p class="text-lg text-white font-semibold">{{ strtoupper($displayPaymentStatus ?? 'PENDING') }}
                    </p>
                </div>
            </div>

            @if ($booking->link_results)
                <div class="mt-8 rounded-3xl border border-[#D4AF37]/20 bg-[#111]/80 p-6 text-center">
                    <p class="text-sm text-white/70 uppercase tracking-[0.25em] mb-4">Link Hasil Foto</p>
                    <a href="{{ $booking->link_results }}" target="_blank" class="btn-luxury">Download dari Google
                        Drive</a>
                </div>
            @endif

            <div class="mt-8 text-center">
                <a href="/" class="btn-luxury">Kembali ke Home</a>
            </div>
        </div>
    </div>
</body>

</html>
