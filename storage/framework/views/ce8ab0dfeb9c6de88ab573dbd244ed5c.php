<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXELENS - Stories Through Lens</title>
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700,900|inter:100,300,400,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* LUXURY CUSTOM CSS BY LUXELENS */
        :root {
            --gold: #E1C564;
            --dark-bg: #050505;
            /* Deep Black */
            --soft-white: #F5F5F5;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--soft-white);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        /* --- Typography Extra +++ --- */
        .luxury-text-gradient {
            background: linear-gradient(to right, #E1C564 0%, #FFF8E1 50%, #E1C564 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h1.hero-title {
            /* PERBAIKAN TOTAL: Menyesuaikan ukuran font agar presisi & tidak kepotong */
            font-size: clamp(2.5rem, 8vw, 6.5rem);
            line-height: 1.1;
            letter-spacing: -0.06em;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            /* Sedikit shadow agar terbaca di video */
        }

        /* --- Animations & Effects --- */
        .reveal {
            animation: reveal 1.5s cubic-bezier(0.19, 1, 0.22, 1) forwards;
            opacity: 0;
        }

        @keyframes reveal {
            from {
                transform: translateY(40px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-luxury {
            position: relative;
            display: inline-block;
            padding: 16px 36px;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 3px;
            font-weight: 600;
            color: black;
            background-color: var(--gold);
            border-radius: 2px;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        .btn-luxury:hover {
            color: white;
            box-shadow: 0 0 30px rgba(225, 197, 100, 0.4);
            transform: translateY(-3px);
        }

        .btn-luxury::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }

        .btn-luxury:hover::after {
            left: 100%;
        }

        /* --- Full Screen Cinematic Hero (PERBAIKAN) --- */
        .hero-full-container {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #000;
        }

        .hero-video-full {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            /* PERBAIKAN: Video dibuat agak gelap (65%) agar teks putih extra terbaca */
            filter: brightness(0.65) contrast(1.05);
        }

        /* Gradient Overlay agar teks menyatu dengan video */
        .hero-gradient-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(5, 5, 5, 1) 0%, transparent 60%);
            z-index: 1;
        }

        /* --- Category Gallery (PERBAIKAN Presisi agar tidak 'bolong') --- */
        .gallery-grid {
            display: grid;
            /* Memaksa 4 kolom presisi di desktop agar tidak bolong di tengah */
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 500px;
            /* Menambah tinggi agar lebih megah */
            gap: 20px;
            /* Menambah jarak sedikit untuk estetika */
        }

        /* Mengatasi responsivitas manual karena grid-cols-4 memaksa */
        @media (max-width: 1024px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
            transition: all 0.6s cubic-bezier(0.2, 1, 0.3, 1);
            height: 100%;
            /* Memastikan item mengisi baris */
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            /* PERBAIKAN: Gradient hitam pekat di bawah agar teks di gallery terbaca */
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, transparent 60%);
            transition: opacity 0.5s;
        }

        .gallery-item .item-text {
            position: absolute;
            bottom: 35px;
            left: 35px;
            z-index: 10;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s 0.1s ease;
        }

        .gallery-item:hover .item-text {
            transform: translateY(0);
            opacity: 1;
        }

        /* --- Modern Navbar --- */
        header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            transition: all 0.4s ease;
        }

        header.scrolled {
            background: rgba(5, 5, 5, 0.95);
            backdrop-filter: blur(20px);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        /* --- WA Float Luxury --- */
        .wa-float-luxury {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 60px;
            height: 60px;
            background: #25d366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 40px rgba(37, 211, 102, 0.3);
            z-index: 1000;
            transition: all 0.4s ease;
        }

        .wa-float-luxury:hover {
            transform: scale(1.1) rotate(5deg);
        }

        /* --- Scrollbar --- */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #050505;
        }

        ::-webkit-scrollbar-thumb {
            background: #E1C564;
            border-radius: 10px;
        }

        /* ==========================================
           USER DASHBOARD PANEL — LUXURY REDESIGN
           ========================================== */
        .top-status-banner {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 88px;
            padding: 0 20px 0;
            z-index: 9998;
        }

        .top-status-card {
            width: min(1200px, 100%);
            background: linear-gradient(135deg, rgba(8, 8, 8, 0.97) 0%, rgba(14, 12, 7, 0.97) 100%);
            border: 1px solid rgba(225, 197, 100, 0.18);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(225, 197, 100, 0.08);
            backdrop-filter: blur(28px);
            border-radius: 24px;
            overflow: hidden;
        }

        /* Top accent stripe */
        .top-status-card::before {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #E1C564, #BFA15A, transparent);
        }

        .status-card-inner {
            padding: 32px 36px 36px;
        }

        /* --- Header row --- */
        .status-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .status-header-left {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .status-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: #BFA15A;
        }

        .status-eyebrow::before {
            content: '';
            display: inline-block;
            width: 18px;
            height: 1px;
            background: #BFA15A;
        }

        .status-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 2.5vw, 2.2rem);
            font-weight: 700;
            color: #F5F5F5;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin: 0;
        }

        .status-subtitle {
            font-size: 12px;
            color: #777;
            letter-spacing: 0.1em;
            margin: 0;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 999px;
            background: rgba(225, 197, 100, 0.1);
            border: 1px solid rgba(225, 197, 100, 0.25);
            color: #E1C564;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .status-pill-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #E1C564;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(0.7);
            }
        }

        /* --- Divider --- */
        .status-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(225, 197, 100, 0.12), transparent);
            margin: 20px 0;
        }

        /* --- Main grid --- */
        .status-main-grid {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 28px;
            align-items: start;
        }

        /* --- Countdown --- */
        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
        }

        .countdown-pill {
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            padding: 18px 8px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 4px;
            transition: border-color 0.3s;
        }

        .countdown-pill:hover {
            border-color: rgba(225, 197, 100, 0.2);
        }

        .countdown-pill span {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: 0.03em;
            font-variant-numeric: tabular-nums;
        }

        .countdown-pill small {
            color: #666;
            font-size: 9px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        /* --- Payment info grid --- */
        .payment-status-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .payment-info-box {
            background: rgba(255, 255, 255, 0.025);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 16px 20px;
        }

        .payment-label {
            font-size: 9px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 6px;
        }

        .payment-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: #E1C564;
            letter-spacing: 0.02em;
        }

        .payment-subtext {
            font-size: 11px;
            color: #666;
            margin-top: 4px;
        }

        /* --- Rejection Alert --- */
        .rejection-alert {
            background: rgba(180, 50, 50, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.2);
            border-radius: 14px;
            padding: 18px 22px;
            margin-top: 16px;
        }

        .rejection-alert-title {
            font-size: 11px;
            font-weight: 700;
            color: #FF6B6B;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 6px;
        }

        .rejection-alert-text {
            font-size: 13px;
            color: #ccc;
            line-height: 1.5;
        }

        /* --- Upload Proof CTA --- */
        .upload-proof-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid rgba(225, 197, 100, 0.25);
            color: #E1C564;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-decoration: none;
            text-transform: uppercase;
            transition: all 0.3s;
            background: rgba(225, 197, 100, 0.05);
        }

        .upload-proof-cta:hover {
            background: rgba(225, 197, 100, 0.12);
            border-color: rgba(225, 197, 100, 0.5);
        }

        @media (max-width: 900px) {
            .status-card-inner {
                padding: 22px 20px 24px;
            }

            .status-main-grid {
                grid-template-columns: 1fr;
            }

            .countdown-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 8px;
            }

            .payment-status-section {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 540px) {
            .countdown-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .payment-status-section {
                grid-template-columns: 1fr;
            }
        }

        .nav-link {
            color: inherit;
            transition: color 0.25s ease, transform 0.25s ease;
        }

        .nav-link:hover {
            color: #E1C564;
            transform: translateY(-1px);
        }

        .track-link {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .track-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 2px;
            background: rgba(225, 197, 100, 0.55);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s ease;
        }

        .track-link:hover::after {
            transform: scaleX(1);
        }

        .mobile-nav-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.06);
            color: #fff;
            cursor: pointer;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .mobile-nav-toggle:hover {
            background: rgba(225, 197, 100, 0.16);
            transform: translateY(-1px);
        }

        .mobile-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(5, 5, 5, 0.96);
            backdrop-filter: blur(18px);
            padding: 120px 24px 24px;
            display: none;
            flex-direction: column;
            gap: 28px;
            z-index: 9999;
            overflow-y: auto;
        }

        .mobile-nav.open {
            display: flex;
        }

        .mobile-nav a,
        .mobile-nav button {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            text-decoration: none;
            text-align: left;
            background: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .mobile-nav-close {
            position: absolute;
            top: 22px;
            right: 22px;
            width: 42px;
            height: 42px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            font-size: 1.3rem;
            cursor: pointer;
        }

        .track-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.88);
            z-index: 9998;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .track-modal.open {
            display: flex;
        }

        .track-card {
            width: min(520px, 100%);
            background: #0d0d0d;
            border: 1px solid rgba(225, 197, 100, 0.18);
            border-radius: 28px;
            padding: 42px 34px;
            text-align: center;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.33);
            position: relative;
        }

        .track-card p {
            color: #bdbdbd;
            letter-spacing: 0.24em;
            font-size: 0.75rem;
            text-transform: uppercase;
            margin-bottom: 28px;
        }

        .input-field {
            width: 100%;
            padding: 18px 16px;
            border-radius: 16px;
            background: #101010;
            border: 1px solid #222;
            color: #f9f9f9;
            outline: none;
            letter-spacing: 4px;
            font-family: monospace;
            text-align: center;
            text-transform: uppercase;
        }

        .button-primary {
            width: 100%;
            padding: 18px;
            margin-top: 12px;
            border: none;
            border-radius: 16px;
            background: #E1C564;
            color: #050505;
            font-weight: 800;
            letter-spacing: 0.18em;
            cursor: pointer;
            transition: transform 0.25s ease, filter 0.25s ease;
        }

        .button-primary:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
        }

        .error-message {
            margin-top: 22px;
            color: #ff7b7b;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            border: none;
            color: #fff;
            font-size: 1.3rem;
            cursor: pointer;
        }

        @media (max-width: 900px) {
            .countdown-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .top-status-banner {
                margin-top: 80px;
            }

            .countdown-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* ── ACTION SECTION (Book + Track) ── */
        .action-section {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: -64px auto 0;
            padding: 0 24px 80px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .action-card {
            background: rgba(10, 10, 10, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 24px;
            padding: 44px 40px;
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            transition: border-color .35s, transform .35s;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(225, 197, 100, .04) 0%, transparent 60%);
            pointer-events: none;
        }

        .action-card:hover {
            border-color: rgba(225, 197, 100, .28);
            transform: translateY(-4px);
        }

        .action-card-eyebrow {
            font-size: 9px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: #E1C564;
            opacity: .7;
            margin-bottom: 14px;
        }

        .action-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -.02em;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .action-card-title em {
            font-style: italic;
            color: #E1C564;
        }

        .action-card-desc {
            font-size: 12px;
            color: #555;
            line-height: 1.7;
            letter-spacing: .03em;
            margin-bottom: 32px;
        }

        .action-card-divider {
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, .05);
            margin-bottom: 28px;
        }

        /* Book card CTA */
        .btn-book-action {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 32px;
            background: #E1C564;
            color: #050505;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .25em;
            text-transform: uppercase;
            border-radius: 100px;
            text-decoration: none;
            transition: background .3s, transform .3s, box-shadow .3s;
        }

        .btn-book-action:hover {
            background: #d4b87a;
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(225, 197, 100, .3);
        }

        /* Track card input */
        .track-input-row {
            display: flex;
            gap: 10px;
        }

        .track-code-input {
            flex: 1;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 14px;
            padding: 14px 18px;
            color: #fff;
            font-size: 12px;
            letter-spacing: .25em;
            font-family: monospace;
            text-transform: uppercase;
            outline: none;
            transition: border-color .25s;
        }

        .track-code-input::placeholder {
            color: #333;
        }

        .track-code-input:focus {
            border-color: rgba(225, 197, 100, .4);
        }

        .btn-track-action {
            padding: 14px 22px;
            border: none;
            border-radius: 14px;
            background: rgba(225, 197, 100, .12);
            border: 1px solid rgba(225, 197, 100, .25);
            color: #E1C564;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .2em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background .25s, transform .25s;
            white-space: nowrap;
        }

        .btn-track-action:hover {
            background: rgba(225, 197, 100, .22);
            transform: translateY(-2px);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(225, 197, 100, .08);
            border: 1px solid rgba(225, 197, 100, .18);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
        }

        @media (max-width: 860px) {
            .action-section {
                grid-template-columns: 1fr;
                margin-top: -32px;
            }
        }
    </style>
</head>

<body>
    <header id="navbar"
        class="fixed top-0 w-full z-50 px-6 md:px-16 py-8 flex justify-between items-center transition-all duration-300"
        style="z-index: 9999;">
        <a href="/" class="playfair text-3xl font-black tracking-tighter text-[#E1C564]">
            LUXE<span class="text-white">LENS</span><span class="text-[#E1C564]">.</span>
        </a>

        <div class="flex items-center gap-4">
            <button class="mobile-nav-toggle md:hidden" onclick="toggleMobileNav()" aria-label="Open menu">
                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 1.5H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M0 8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M0 14.5H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>

            <nav class="hidden md:flex gap-12 text-[10px] uppercase tracking-[0.4em] font-light items-center">
                <a href="#services" class="nav-link hover:text-[#E1C564] transition">Portofolio</a>
                <a href="#about" class="nav-link hover:text-[#E1C564] transition">Cerita</a>
                <a href="#" onclick="showTrackModal(); return false;"
                    class="track-link text-[#E1C564] px-5 py-2.5 border border-[#E1C564]/20 rounded-sm hover:bg-[#E1C564] hover:text-black transition duration-500">Track
                    Session</a>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::check()): ?>
                    <div class="flex items-center gap-5 ml-6 border-l border-white/5 pl-8">
                        <span class="text-white/60">HI, <?php echo e(strtoupper(Auth::user()->name)); ?></span>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-[9px] text-red-500/80 hover:text-red-500">LOGOUT</button>
                        </form>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"
                        class="bg-white text-black px-8 py-3 rounded-sm font-bold text-[11px] hover:bg-[#E1C564] transition duration-500">Login</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </nav>
        </div>
    </header>

    <div id="mobileNav" class="mobile-nav">
        <button class="mobile-nav-close" onclick="toggleMobileNav()" aria-label="Close menu">×</button>
        <a href="#services" onclick="toggleMobileNav()">Portofolio</a>
        <a href="#about" onclick="toggleMobileNav()">Cerita</a>
        <button class="track-link" onclick="toggleMobileNav(); showTrackModal(); return false;">Track Session</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::check()): ?>
            <div class="mt-6 border-t border-white/10 pt-6">
                <p class="text-gray-400 text-xs uppercase tracking-[0.3em] mb-4">Hi,
                    <?php echo e(strtoupper(Auth::user()->name)); ?></p>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="nav-link">Logout</button>
                </form>
            </div>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <section class="hero-full-container reveal">
        <video autoplay muted loop playsinline class="hero-video-full">
            <source src="<?php echo e(asset('videos/video.mp4')); ?>" type="video/mp4">
        </video>
        <div class="hero-gradient-overlay"></div>

        <div class="relative z-10 text-center px-6 max-w-6xl mx-auto">
            <span
                class="inline-block px-5 py-2 border border-white/10 rounded-full text-[9px] uppercase tracking-[0.6em] mb-10 backdrop-blur-md">
                Est. 2019 • Authentic Stories • Through Lens
            </span>
            <h1 class="hero-title playfair font-black text-white tracking-tighterLEADING-TIGHT mb-12">
                We capture<br>your <span class="italic font-light luxury-text-gradient">essence</span>
            </h1>
            <p class="text-gray-300 max-w-xl mx-auto text-sm leading-loose tracking-wide mb-16 opacity-80">
                Bukan sekadar foto, tapi perasaan yang abadi. LUXELENS mengabadikan setiap momen otentik, tawa, dan
                air mata kebahagiaan Anda menjadi sebuah karya seni visual sinematik.
            </p>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 opacity-30 animate-bounce">
            <div class="w-px h-16 bg-white"></div>
        </div>
    </section>

    
    
    
    <div class="action-section">

        
        <div class="action-card">
            <div class="action-icon">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#E1C564"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
            </div>
            <div class="action-card-eyebrow">Reserve a Session</div>
            <h2 class="action-card-title">Book Your <em>Story</em></h2>
            <p class="action-card-desc">Pilih tanggal, kategori, dan fotografer terbaik kami. Jadikan momen berharga
                Anda abadi bersama LUXELENS.</p>
            <div class="action-card-divider"></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <a href="/booking" class="btn-book-action">
                    Reserve Now
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn-book-action">
                    Login untuk Booking
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="action-card">
            <div class="action-icon">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#E1C564"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <div class="action-card-eyebrow">Session Tracker</div>
            <h2 class="action-card-title">Track Your <em>Session</em></h2>
            <p class="action-card-desc">Masukkan kode booking Anda untuk melihat status, jadwal, dan update terbaru
                dari sesi foto Anda.</p>
            <div class="action-card-divider"></div>
            <form action="<?php echo e(route('booking.track')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="track-input-row">
                    <input type="text" name="code" placeholder="PSIM-XXXX-XXXX" required
                        class="track-code-input">
                    <button type="submit" class="btn-track-action">VERIFY</button>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                    <p style="margin-top:12px; font-size:11px; color:#ff7b7b; letter-spacing:.05em;">
                        <?php echo e(session('error')); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </form>
        </div>

    </div>

    
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::check() && isset($booking)): ?>
        <div class="top-status-banner" style="margin-top:0; padding-bottom:40px;">
            <div class="top-status-card">
                <div class="status-card-inner">

                    <div class="status-header">
                        <div class="status-header-left">
                            <span class="status-eyebrow">Booking Sesi</span>
                            <h2 class="status-title"><?php echo e(ucfirst($booking->kategori)); ?> &bull;
                                <?php echo e($booking->photographer_name ?? 'Assigning Soon...'); ?></h2>
                            <p class="status-subtitle"><?php echo e(date('d F Y', strtotime($booking->tanggal_pemotretan))); ?>

                            </p>
                        </div>
                        <div>
                            <span class="status-pill">
                                <span class="status-pill-dot"></span>
                                Next Shoot
                            </span>
                        </div>
                    </div>

                    <div class="status-divider"></div>

                    <div class="status-main-grid">
                        <div style="display:flex; flex-direction:column; gap:20px;">

                            <div class="countdown-grid">
                                <div class="countdown-pill"><span id="days">00</span><small>Hari</small></div>
                                <div class="countdown-pill"><span id="hours">00</span><small>Jam</small></div>
                                <div class="countdown-pill"><span id="minutes">00</span><small>Menit</small></div>
                                <div class="countdown-pill"><span id="seconds">00</span><small>Detik</small></div>
                            </div>

                            <?php
                                $displayPaymentStatus = $booking->payment_status;
                                $displayAmountPaid = $booking->amount_paid ?? 0;

                                if (
                                    in_array($booking->status, ['Lunas', 'Editing', 'Selesai'], true) &&
                                    (($displayPaymentStatus === null || $displayPaymentStatus === 'pending') &&
                                        (float) $displayAmountPaid <= 0)
                                ) {
                                    $displayPaymentStatus = 'full_payment';
                                    $displayAmountPaid = $booking->harga;
                                }
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($displayPaymentStatus || $displayAmountPaid): ?>
                                <div class="payment-status-section">
                                    <div class="payment-info-box">
                                        <div class="payment-label">Status Pembayaran</div>
                                        <div class="payment-value">
                                            <?php echo e(strtoupper($displayPaymentStatus ?? 'PENDING')); ?></div>
                                        <div class="payment-subtext">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($displayPaymentStatus === 'full_payment'): ?>
                                                ✓ Pembayaran Lengkap
                                            <?php elseif($displayPaymentStatus === 'down_payment'): ?>
                                                ⚠ DP Diterima
                                            <?php else: ?>
                                                ⏳ Menunggu Pembayaran
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="payment-info-box">
                                        <div class="payment-label">Jumlah Diterima</div>
                                        <div class="payment-value">Rp
                                            <?php echo e(number_format($displayAmountPaid ?? 0, 0, ',', '.')); ?></div>
                                        <div class="payment-subtext">dari Rp
                                            <?php echo e(number_format($booking->harga, 0, ',', '.')); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->status === 'Rejected' && $booking->rejection_note): ?>
                                <div class="rejection-alert">
                                    <div class="rejection-alert-title">⚠ Booking Ditolak</div>
                                    <div class="rejection-alert-text"><?php echo e($booking->rejection_note); ?></div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                        <div style="display:flex; flex-direction:column; gap:12px; min-width:200px;">
                            <div
                                style="background:rgba(255,255,255,0.025); border:1px solid rgba(255,255,255,0.05); border-radius:14px; padding:18px 20px;">
                                <div
                                    style="font-size:9px; letter-spacing:.25em; text-transform:uppercase; color:#555; margin-bottom:8px;">
                                    Booking ID</div>
                                <div style="font-size:1rem; font-weight:700; color:#fff;">#<?php echo e($booking->id); ?></div>
                            </div>
                            <div
                                style="background:rgba(255,255,255,0.025); border:1px solid rgba(255,255,255,0.05); border-radius:14px; padding:18px 20px;">
                                <div
                                    style="font-size:9px; letter-spacing:.25em; text-transform:uppercase; color:#555; margin-bottom:8px;">
                                    Harga</div>
                                <div style="font-size:1rem; font-weight:700; color:#E1C564;">Rp
                                    <?php echo e(number_format($booking->harga, 0, ',', '.')); ?></div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->link_results): ?>
                                <a href="<?php echo e($booking->link_results); ?>" target="_blank" class="upload-proof-cta">
                                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                                    </svg>
                                    Lihat Hasil Foto
                                </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$booking->proof_payment): ?>
                                <form action="<?php echo e(route('user.upload.proof', $booking->id)); ?>" method="POST"
                                    enctype="multipart/form-data"
                                    style="display:flex; flex-direction:column; gap:8px;">
                                    <?php echo csrf_field(); ?>
                                    <div
                                        style="font-size:9px; letter-spacing:.25em; text-transform:uppercase; color:#555; margin-bottom:2px;">
                                        Upload Bukti</div>
                                    <input type="file" name="proof_file" accept="image/*"
                                        style="background:rgba(0,0,0,0.5); border:1px solid #222; border-radius:8px; padding:7px; color:#aaa; font-size:11px; width:100%;">
                                    <button type="submit" class="upload-proof-cta"
                                        style="justify-content:center;">KIRIM BUKTI</button>
                                </form>
                            <?php else: ?>
                                <div
                                    style="background:rgba(39,174,96,0.07); border:1px solid rgba(46,204,113,0.18); border-radius:14px; padding:14px 18px;">
                                    <div
                                        style="font-size:9px; color:#2ecc71; letter-spacing:.2em; text-transform:uppercase; font-weight:700;">
                                        ✓ Bukti Dikirim</div>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const targetDate =
                    "<?php echo e(\Carbon\Carbon::parse($booking->tanggal_pemotretan)->format('Y-m-d')); ?>T00:00:00";
                const eventDate = new Date(targetDate).getTime();
                const countdown = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = eventDate - now;
                    if (distance < 0) {
                        clearInterval(countdown);
                        ['days', 'hours', 'minutes', 'seconds'].forEach(id => {
                            const el = document.getElementById(id);
                            if (el) el.innerText = '00';
                        });
                        return;
                    }
                    document.getElementById("days").innerText = Math.floor(distance / 86400000).toString()
                        .padStart(2, '0');
                    document.getElementById("hours").innerText = Math.floor((distance % 86400000) / 3600000)
                        .toString().padStart(2, '0');
                    document.getElementById("minutes").innerText = Math.floor((distance % 3600000) / 60000)
                        .toString().padStart(2, '0');
                    document.getElementById("seconds").innerText = Math.floor((distance % 60000) / 1000)
                        .toString().padStart(2, '0');
                }, 1000);
            });
        </script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <section class="py-40 px-10 md:px-20 max-w-[1500px] mx-auto reveal" id="services">
        <div class="grid grid-cols-1 md:grid-cols-2 justify-between items-end mb-24 gap-12">
            <div class="max-w-2xl">
                <h6 class="text-[#E1C564] text-[10px] uppercase tracking-[0.5em] mb-6">Cerita Dalam Gambar</h6>
                <h2 class="playfair text-5xl md:text-7xl mb-8 tracking-tighter leading-tight">Momen <span
                        class="text-luxury">Terbaik</span> Anda</h2>
                <p class="text-gray-500 text-sm leading-relaxed tracking-wide">
                    Dari bisikan intim di pelaminan hingga momen bangga kelulusan. Kami menenun tapestri digital dari
                    babak paling berharga dalam hidup Anda. Pilih kategori untuk memulai perjalanan.
                </p>
            </div>
            <div class="text-[9px] uppercase tracking-[0.6em] text-[#E1C564] font-bold text-right"
                style="animation-delay: 0.2s;">
                [ Daftar Galeri ]
            </div>
        </div>

        <div class="gallery-grid" style="animation-delay: 0.4s;">
            <?php
                /* PERBAIKAN TOTAL: Memastikan persis 4 kategori, dan menghapus col-span agar mengisi 4 kolom presisi di desktop */
                $categories = [
                    ['slug' => 'wedding', 'title' => 'Wedding', 'sub' => 'Eternal Love', 'img' => 'wedding.jpeg'],
                    ['slug' => 'wisuda', 'title' => 'Graduation', 'sub' => 'Achievement', 'img' => 'graduation.jpeg'],
                    ['slug' => 'prewed', 'title' => 'Pre-Wedding', 'sub' => 'The Beginning', 'img' => 'prewed.jpeg'],
                    ['slug' => 'family', 'title' => 'Family', 'sub' => 'Heritage of Joy', 'img' => 'family.jpeg'],
                ];
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="/portfolio/<?php echo e($cat['slug']); ?>" class="gallery-item group">
                    <img src="<?php echo e(asset('images/' . $cat['img'])); ?>" alt="<?php echo e($cat['title']); ?>">
                    <div class="item-text">
                        <p class="text-[9px] uppercase tracking-[0.4em] text-[#E1C564] mb-3"><?php echo e($cat['sub']); ?></p>
                        <h3 class="playfair text-3xl text-white font-bold tracking-tight"><?php echo e($cat['title']); ?></h3>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </section>

    
    <style>
        .bpkg-section {
            padding: 80px 40px 88px;
            max-width: 1500px;
            margin: 0 auto;
        }

        @media (max-width:640px) {
            .bpkg-section {
                padding: 56px 20px 64px;
            }
        }

        /* Grid stretches all cards to same height */
        .bpkg-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            align-items: stretch;
        }

        @media (max-width:900px) {
            .bpkg-grid {
                grid-template-columns: 1fr;
            }
        }

        .bpkg-card {
            position: relative;
            border-radius: 20px;
            /* Fixed top padding so badge never overlaps content */
            padding: 42px 26px 26px;
            border: 1px solid rgba(255, 255, 255, .07);
            background: linear-gradient(160deg, #0e0e0e 0%, #090909 100%);
            display: flex;
            flex-direction: column;
            transition: border-color .3s, box-shadow .3s, transform .3s;
            overflow: hidden;
        }

        .bpkg-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(225, 197, 100, .06) 0%, transparent 60%);
            opacity: 0;
            transition: opacity .3s;
        }

        .bpkg-card:hover {
            border-color: rgba(225, 197, 100, .3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, .6), 0 0 0 1px rgba(225, 197, 100, .06);
            transform: translateY(-4px);
        }

        .bpkg-card:hover::before {
            opacity: 1;
        }

        .bpkg-popular {
            border-color: rgba(225, 197, 100, .22);
            background: linear-gradient(160deg, #111009 0%, #0c0b08 100%);
        }

        .bpkg-popular-badge {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(90deg, #E1C564, #BFA15A);
            color: #050505;
            font-size: 8px;
            font-weight: 900;
            letter-spacing: .2em;
            text-transform: uppercase;
            padding: 5px 22px;
            border-radius: 0 0 14px 14px;
            white-space: nowrap;
        }

        /* Invisible spacer so non-popular cards align content at same vertical position */
        .bpkg-badge-spacer {
            display: block;
            height: 0;
            /* popular badge height is ~22px, card padding-top is 42px so content starts at same y */
        }

        .bpkg-kategori {
            font-size: 9px;
            color: #3a3a3a;
            letter-spacing: .18em;
            text-transform: uppercase;
            font-weight: 700;
            min-height: 14px;
            /* keeps row height consistent */
        }

        .bpkg-name {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            margin-top: 5px;
            min-height: 52px;
            /* 2 lines — keeps price vertically aligned */
            display: flex;
            align-items: flex-start;
        }

        .bpkg-desc {
            font-size: 11px;
            color: #3a3a3a;
            line-height: 1.55;
            margin-top: 5px;
            min-height: 36px;
            /* 2 lines — keeps price row aligned */
        }

        .bpkg-price {
            font-size: 30px;
            font-weight: 900;
            color: #E1C564;
            letter-spacing: -.02em;
            line-height: 1;
            margin: 14px 0 4px;
            font-family: 'Playfair Display', serif;
        }

        .bpkg-dp {
            font-size: 10px;
            color: #3a3a3a;
            margin-bottom: 16px;
        }

        .bpkg-dp span {
            color: #666;
        }

        .bpkg-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .06), transparent);
            margin: 14px 0;
        }

        .bpkg-fac {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 11.5px;
            color: #555;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .bpkg-chk {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: rgba(225, 197, 100, .1);
            border: 1px solid rgba(225, 197, 100, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Push button to bottom of card regardless of facility count */
        .bpkg-fac-list {
            flex: 1;
        }

        .bpkg-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px;
            margin-top: 22px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .2em;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            transition: all .28s;
            border: none;
            font-family: inherit;
        }

        .bpkg-btn-gold {
            background: linear-gradient(135deg, #E1C564, #BFA15A);
            color: #050505;
        }

        .bpkg-btn-gold:hover {
            box-shadow: 0 8px 32px rgba(225, 197, 100, .35);
            transform: translateY(-1px);
        }

        .bpkg-btn-outline {
            background: transparent;
            color: #E1C564;
            border: 1px solid rgba(225, 197, 100, .3);
        }

        .bpkg-btn-outline:hover {
            background: rgba(225, 197, 100, .07);
            border-color: rgba(225, 197, 100, .6);
        }

        /* Already-booked modal */
        #ab-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, .75);
            backdrop-filter: blur(6px);
            align-items: center;
            justify-content: center;
        }

        #ab-modal.open {
            display: flex;
        }

        #ab-modal-box {
            background: linear-gradient(160deg, #111 0%, #0c0c0c 100%);
            border: 1px solid rgba(225, 197, 100, .22);
            border-radius: 22px;
            padding: 40px 36px 32px;
            max-width: 420px;
            width: 90%;
            text-align: center;
            box-shadow: 0 32px 80px rgba(0, 0, 0, .8), 0 0 0 1px rgba(225, 197, 100, .06);
            animation: ab-pop .28s cubic-bezier(.34, 1.56, .64, 1);
        }

        @keyframes ab-pop {
            from {
                opacity: 0;
                transform: scale(.88) translateY(16px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    </style>

    
    <div id="ab-modal" onclick="if(event.target===this)closeAbModal()">
        <div id="ab-modal-box">
            <div
                style="width:52px;height:52px;border-radius:50%;background:rgba(225,197,100,.1);border:1px solid rgba(225,197,100,.25);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                    stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
            </div>
            <div
                style="font-size:9px;color:rgba(225,197,100,.5);letter-spacing:.3em;text-transform:uppercase;margin-bottom:8px;">
                Notifikasi</div>
            <h3
                style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:#fff;margin:0 0 10px;">
                Anda Sudah Booking</h3>
            <p style="font-size:12px;color:#555;line-height:1.7;margin-bottom:28px;">Anda masih memiliki sesi aktif.
                Selesaikan atau tunggu konfirmasi booking sebelumnya sebelum memesan paket baru.</p>
            <div style="display:flex;gap:10px;justify-content:center;">
                <a href="#booking-status" onclick="closeAbModal()"
                    style="flex:1;display:flex;align-items:center;justify-content:center;padding:12px 20px;border-radius:50px;background:linear-gradient(135deg,#E1C564,#BFA15A);color:#050505;font-size:9px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;text-decoration:none;gap:6px;">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Lihat Booking
                </a>
                <button onclick="closeAbModal()"
                    style="flex:1;padding:12px 20px;border-radius:50px;background:transparent;border:1px solid rgba(255,255,255,.08);color:#555;font-size:9px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;cursor:pointer;font-family:inherit;transition:border-color .2s;"
                    onmouseover="this.style.borderColor='rgba(255,255,255,.2)'"
                    onmouseout="this.style.borderColor='rgba(255,255,255,.08)'">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    <script>
        function closeAbModal() {
            document.getElementById('ab-modal').classList.remove('open');
        }

        function openAbModal() {
            document.getElementById('ab-modal').classList.add('open');
        }
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeAbModal();
        });
    </script>

    <section class="bpkg-section reveal" id="paket">
        <div class="grid grid-cols-1 md:grid-cols-2 items-end mb-16 gap-8">
            <div>
                <h6 class="text-[#E1C564] text-[10px] uppercase tracking-[0.5em] mb-4">Studio Kami</h6>
                <h2 class="playfair text-5xl md:text-6xl tracking-tighter leading-tight">
                    Pilih <span class="text-luxury">Paket</span> Terbaik Anda
                </h2>
                <p class="text-gray-500 text-sm mt-4 leading-relaxed">Harga transparan, fasilitas lengkap. DP 30% untuk
                    konfirmasi jadwal.</p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <div class="text-right">
                    <a href="#paket"
                        class="inline-flex items-center gap-2 text-[9px] uppercase tracking-[.4em] text-[#E1C564] font-bold border border-[#E1C564]/20 rounded-full px-6 py-3 hover:bg-[#E1C564]/08 transition">
                        ◎ LIHAT PAKET KAMI
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php
            $hasActiveBeranda =
                isset($booking) && $booking && !in_array($booking->status, ['Lunas', 'Rejected', 'Selesai', 'Editing']);
        ?>

        <div class="bpkg-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php
                    $dp = number_format($pkg->harga * 0.3, 0, ',', '.');
                    $total = number_format($pkg->harga, 0, ',', '.');
                ?>
                <div class="bpkg-card <?php echo e($pkg->is_popular ? 'bpkg-popular' : ''); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pkg->is_popular): ?>
                        <div class="bpkg-popular-badge">✦ TERPOPULER</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="bpkg-kategori"><?php echo e(strtoupper($pkg->kategori ?? 'Studio')); ?></div>
                    <div class="bpkg-name"><?php echo e($pkg->nama_paket); ?></div>
                    <div class="bpkg-desc"><?php echo e($pkg->deskripsi ?? ''); ?></div>
                    <div class="bpkg-price">Rp <?php echo e($total); ?></div>
                    <div class="bpkg-dp">DP <span>Rp <?php echo e($dp); ?></span> (30%) &nbsp;·&nbsp; Total <span>Rp
                            <?php echo e($total); ?></span></div>
                    <div class="bpkg-divider"></div>
                    <div class="bpkg-fac-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pkg->fasilitas): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $pkg->fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="bpkg-fac">
                                    <div class="bpkg-chk">
                                        <svg width="7" height="7" viewBox="0 0 24 24" fill="none"
                                            stroke="#E1C564" stroke-width="3.5">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </div>
                                    <?php echo e($fas); ?>

                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasActiveBeranda): ?>
                            <button class="bpkg-btn bpkg-btn-gold" onclick="openAbModal()">
                                › PESAN SEKARANG
                            </button>
                        <?php else: ?>
                            <a href="/booking/<?php echo e($pkg->slug); ?>" class="bpkg-btn bpkg-btn-gold">
                                › PESAN SEKARANG
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        <a href="/login" class="bpkg-btn bpkg-btn-outline">
                            LOGIN UNTUK MEMESAN
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div
            style="margin-top:32px;display:flex;align-items:center;gap:10px;padding:14px 20px;border-radius:12px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.05);">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="rgba(225,197,100,.35)"
                stroke-width="2" style="flex-shrink:0;">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <span style="font-size:11px;color:#3a3a3a;">
                Butuh sesi <strong style="color:rgba(225,197,100,.6);">Event atau Custom</strong>? Harga fleksibel —
                ajukan penawaran setelah login ke dashboard.
            </span>
        </div>
    </section>

    <section id="about" class="py-40 bg-[#080808] border-t border-white/5 reveal">
        <div class="max-w-7xl mx-auto px-10 md:px-20 flex flex-col md:flex-row items-center gap-24">
            <div class="w-full md:w-1/2 relative group">
                <div
                    class="absolute -top-12 -left-12 w-48 h-48 border-l border-t border-[#E1C564]/10 transition-all duration-700 group-hover:-top-8 group-hover:-left-8">
                </div>
                <img src="<?php echo e(asset('images/foto1.jpeg')); ?>" alt="About"
                    class="w-full h-[700px] object-cover grayscale hover:grayscale-0 transition-all duration-1000 shadow-[0_35px_100px_rgba(0,0,0,0.8)]">
                <div
                    class="absolute bottom-8 -right-8 bg-[#E1C564] p-10 text-black hidden md:block group-hover:rotate-3 transition duration-500 shadow-2xl">
                    <p class="playfair text-4xl font-black">5+</p>
                    <p class="text-[9px] uppercase font-bold tracking-widest mt-1">TAHUN MEMOTRET CERITA</p>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <h6 class="text-[#E1C564] text-[10px] uppercase tracking-[0.5em] mb-6">Filosofi Lensa Kami</h6>
                <h2 class="playfair text-5xl md:text-6xl leading-none mb-10 tracking-tight">
                    Art is what you like, <br>
                    <span class="luxury-textitalic font-light">Emotion is what you feel.</span>
                </h2>
                <p class="text-gray-400 leading-loose text-sm mb-12 tracking-wide opacity-80">
                    Sejak 2019, LUXELENS percaya bahwa setiap jepretan adalah janji untuk menjaga memori tetap hidup.
                    Kami bukan sekadar mencari pose yang sempurna, tapi kami mencari jiwa di balik lensa. Kami menangkap
                    tawa, pelukan, dan detail kecil yang sering terlewatkan.
                </p>
                <div class="grid grid-cols-2 gap-10 pt-10 border-t border-white/10">
                    <div>
                        <p class="text-white font-bold mb-3 tracking-wider">Murni Otentik</p>
                        <p class="text-gray-600 text-xs leading-relaxed">Menjaga momen tetap jujur dan apa adanya tanpa
                            paksaan.</p>
                    </div>
                    <div>
                        <p class="text-white font-bold mb-3 tracking-wider">Vibe Sinematik</p>
                        <p class="text-gray-600 text-xs leading-relaxed">Sentuhan warna dan sudut pandang layar lebar
                            profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <style>
        /* ---- card ---- */
        .testi-card {
            position: relative;
            background: linear-gradient(160deg, #0f0f0f 0%, #080808 100%);
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 12px;
            padding: 30px 26px 24px;
            display: flex;
            flex-direction: column;
            transition: border-color .35s, transform .35s, box-shadow .35s;
            overflow: hidden;
        }

        .testi-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(225, 197, 100, .35), transparent);
            opacity: 0;
            transition: opacity .35s;
        }

        .testi-card:hover {
            border-color: rgba(225, 197, 100, .22);
            transform: translateY(-5px);
            box-shadow: 0 24px 64px rgba(0, 0, 0, .55), 0 0 0 1px rgba(225, 197, 100, .07);
        }

        .testi-card:hover::after {
            opacity: 1;
        }

        /* large decorative quote */
        .testi-quote {
            font-family: Georgia, serif;
            font-size: 80px;
            line-height: .8;
            color: #E1C564;
            opacity: .06;
            position: absolute;
            bottom: 14px;
            right: 20px;
            pointer-events: none;
            transition: opacity .35s;
            user-select: none;
        }

        .testi-card:hover .testi-quote {
            opacity: .13;
        }

        /* stars */
        .testi-star {
            color: #222;
            font-size: 11px;
            transition: color .2s;
        }

        .testi-star.lit {
            color: #E1C564;
        }

        /* avatar ring */
        .testi-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #111;
            border: 1px solid rgba(225, 197, 100, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 13px;
            font-weight: 800;
            color: #E1C564;
            text-transform: uppercase;
            letter-spacing: 0;
        }

        /* studio reply */
        .studio-reply {
            margin-top: 16px;
            padding: 9px 13px;
            background: rgba(255, 255, 255, .02);
            border: 1px solid rgba(225, 197, 100, .1);
            border-radius: 6px;
        }

        .studio-reply-label {
            font-size: 7.5px;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: rgba(225, 197, 100, .38);
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .studio-reply-label::before {
            content: '';
            display: inline-block;
            width: 14px;
            height: 1px;
            background: rgba(225, 197, 100, .3);
        }

        .studio-reply-text {
            font-size: 11.5px;
            color: #484848;
            font-style: italic;
            line-height: 1.55;
        }

        /* write form */
        .testi-write-card {
            background: #0b0b0b;
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 12px;
            padding: 40px 48px;
            max-width: 820px;
            margin: 0 auto 56px;
        }

        @media (max-width:640px) {
            .testi-write-card {
                padding: 24px 20px;
            }
        }

        .testi-textarea {
            width: 100%;
            background: rgba(0, 0, 0, .4);
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 6px;
            padding: 15px 16px;
            font-size: 13px;
            color: #fff;
            outline: none;
            resize: vertical;
            transition: border-color .3s, box-shadow .3s;
            font-family: inherit;
        }

        .testi-textarea:focus {
            border-color: rgba(225, 197, 100, .5);
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .06);
        }

        .testi-textarea::placeholder {
            color: #252525;
        }

        /* interactive star picker */
        .star-picker {
            display: flex;
            gap: 5px;
            cursor: pointer;
        }

        .star-picker span {
            font-size: 22px;
            color: #252525;
            transition: color .15s, transform .15s;
            user-select: none;
        }

        .star-picker span:hover,
        .star-picker span.active {
            color: #E1C564;
            transform: scale(1.25);
        }

        /* show-more btn */
        .testi-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 38px;
            background: transparent;
            border: 1px solid rgba(225, 197, 100, .25);
            border-radius: 40px;
            color: #E1C564;
            font-size: 10px;
            letter-spacing: .35em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background .3s, border-color .3s, box-shadow .3s;
            font-family: inherit;
        }

        .testi-more-btn:hover {
            background: rgba(225, 197, 100, .07);
            border-color: rgba(225, 197, 100, .5);
            box-shadow: 0 0 24px rgba(225, 197, 100, .08);
        }

        .testi-more-btn svg {
            transition: transform .35s;
        }

        .testi-more-btn.expanded svg {
            transform: rotate(180deg);
        }
    </style>

    <section class="py-28 px-6 md:px-10 bg-black reveal" id="testimonials">

        
        <div class="text-center mb-16">
            <p class="text-[8.5px] uppercase tracking-[0.55em] text-[#E1C564]/50 mb-4">What People Say</p>
            <h2 class="playfair text-5xl md:text-6xl mb-4 leading-none">Suara <span
                    class="luxury-text-gradient italic">Kebahagiaan</span></h2>
            <div class="w-12 h-px bg-[#E1C564] mx-auto opacity-30 mt-5"></div>
        </div>

        
        <div class="testi-write-card">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::check()): ?>
                <p class="text-[8.5px] uppercase tracking-[0.45em] text-[#E1C564]/60 text-center mb-7">Tuliskan
                    Pengalaman Anda</p>
                <form action="<?php echo e(route('testimonial.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <textarea name="pesan" rows="3" placeholder="Bagikan cerita sesi foto kamu bersama kami..." required
                        class="testi-textarea mb-5"></textarea>
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-5">
                        <div class="flex flex-col gap-2">
                            <span class="text-[8px] uppercase tracking-[0.3em] text-gray-700">Rating</span>
                            <div class="star-picker" id="starPicker">
                                <span data-v="1">★</span><span data-v="2">★</span><span
                                    data-v="3">★</span><span data-v="4">★</span><span data-v="5">★</span>
                            </div>
                            <input type="hidden" name="bintang" id="bintangInput" value="5">
                        </div>
                        <button type="submit" class="btn-luxury">KIRIM CERITA</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-[10px] text-gray-600 tracking-widest mb-5 uppercase">Silakan login untuk
                        meninggalkan testimoni</p>
                    <a href="/login"
                        class="text-[#E1C564] text-[11px] font-bold tracking-[0.4em] hover:text-white transition">[
                        LOGIN UNTUK MENULIS ]</a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 max-w-6xl mx-auto" id="testiGrid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="testi-card <?php echo e($index >= 3 ? 'testi-hidden' : ''); ?>"
                    style="<?php echo e($index >= 3 ? 'display:none;' : ''); ?>">

                    
                    <div class="flex items-center gap-3 mb-5">
                        <div class="testi-avatar"><?php echo e(substr($t->nama_customer, 0, 1)); ?></div>
                        <div class="min-w-0">
                            <strong
                                class="text-white block text-[10px] tracking-[0.2em] uppercase truncate leading-tight"><?php echo e($t->nama_customer); ?></strong>
                            <div class="flex gap-0.5 mt-1.5">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <span class="testi-star <?php echo e($i <= $t->bintang ? 'lit' : ''); ?>">★</span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div
                        style="height:1px;background:linear-gradient(90deg,rgba(225,197,100,.18),transparent);margin-bottom:16px;">
                    </div>

                    
                    <p class="text-gray-300 text-[13px] leading-relaxed flex-1 mb-3 pr-8">
                        <?php echo e($t->pesan); ?>

                    </p>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($t->admin_reply)): ?>
                        <div class="studio-reply mt-auto">
                            <div class="studio-reply-label">LuxeLens Studio</div>
                            <span class="studio-reply-text"><?php echo e($t->admin_reply); ?></span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <span class="testi-quote">"</span>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonials->count() > 3): ?>
            <div class="text-center mt-12">
                <button onclick="toggleTestimonials()" id="testiBtn" class="testi-more-btn">
                    <span id="testiBtnText">Lihat Semua Penilaian</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round" id="testiBtnIcon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    <span style="opacity:.35;font-size:9px;letter-spacing:.15em;">(<?php echo e($testimonials->count() - 3); ?>

                        lainnya)</span>
                </button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </section>

    <script>
        // Interactive star picker
        (function() {
            var picker = document.getElementById('starPicker');
            var input = document.getElementById('bintangInput');
            if (!picker) return;
            var stars = picker.querySelectorAll('span');

            function setStars(val) {
                stars.forEach(function(s) {
                    s.classList.toggle('active', parseInt(s.dataset.v) <= val);
                });
                input.value = val;
            }
            setStars(5); // default
            stars.forEach(function(s) {
                s.addEventListener('click', function() {
                    setStars(parseInt(s.dataset.v));
                });
                s.addEventListener('mouseenter', function() {
                    stars.forEach(function(x) {
                        x.style.color = parseInt(x.dataset.v) <= parseInt(s.dataset.v) ?
                            '#E1C564' : '#2a2a2a';
                    });
                });
            });
            picker.addEventListener('mouseleave', function() {
                var cur = parseInt(input.value);
                stars.forEach(function(x) {
                    x.style.color = parseInt(x.dataset.v) <= cur ? '#E1C564' : '#2a2a2a';
                });
            });
        })();

        // Show more / collapse testimonials
        var testiExpanded = false;

        function toggleTestimonials() {
            testiExpanded = !testiExpanded;
            var hidden = document.querySelectorAll('.testi-hidden');
            var btnText = document.getElementById('testiBtnText');
            var btnIcon = document.getElementById('testiBtnIcon');
            var count = hidden.length;

            hidden.forEach(function(el, i) {
                if (testiExpanded) {
                    el.style.display = '';
                    // stagger fade-in
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(16px)';
                    setTimeout(function() {
                        el.style.transition = 'opacity .4s ease, transform .4s ease';
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, i * 60);
                } else {
                    el.style.display = 'none';
                    el.style.opacity = '';
                    el.style.transform = '';
                    el.style.transition = '';
                }
            });

            if (testiExpanded) {
                btnText.textContent = 'Sembunyikan';
                btnIcon.style.transform = 'rotate(180deg)';
                document.querySelector('#testiBtn span:last-child').style.opacity = '0';
            } else {
                btnText.textContent = 'Lihat Semua Penilaian';
                btnIcon.style.transform = 'rotate(0deg)';
                document.querySelector('#testiBtn span:last-child').style.opacity = '.4';
                // scroll back up to section
                document.getElementById('testimonials').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    </script>
    <p class="playfair text-3xl text-[#E1C564] mb-10 font-black tracking-tighter">LUXELENS.</p>
    <div class="flex justify-center gap-10 mb-16 opacity-30 text-[10px] tracking-[0.4em] uppercase">
        <a href="#" class="hover:opacity-100 hover:text-[#E1C564] transition">INSTAGRAM</a>
        <a href="#" class="hover:opacity-100 hover:text-[#E1C564] transition">TIKTOK</a>
        <a href="#" class="hover:opacity-100 hover:text-[#E1C564] transition">PINTEREST</a>
    </div>
    <p class="text-[9px] text-gray-700 tracking-[0.6em] uppercase">&copy; <?php echo e(date('Y')); ?> LUXELENS STUDIO.
        MELUKIS DENGAN CAHAYA.</p>
    </footer>

    <a href="https://wa.me/6281234567890?text=Halo%20LUXELENS..." class="wa-float-luxury" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
            viewBox="0 0 16 16">
            <path
                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.601 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
        </svg>
    </a>

    <div id="trackModal" class="track-modal" onclick="closeTrackModal()">
        <div class="track-card" onclick="event.stopPropagation();">
            <button type="button" class="close-modal" onclick="closeTrackModal()" aria-label="Close">×</button>
            <p class="playfair text-[#E1C564] text-3xl mb-12 font-bold tracking-wide">TRACK YOUR SHOOT</p>
            <form action="<?php echo e(route('booking.track')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="code" placeholder="PSIM-XXXX-XXXX" required class="input-field">
                <button type="submit" class="button-primary">VERIFY ORDER</button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                    <p class="error-message">
                        <?php echo e(session('error')); ?>

                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <p class="text-gray-400 text-[10px] uppercase tracking-[0.2em] mt-8 cursor-pointer"
                    onclick="closeTrackModal()">[ Close ]</p>
            </form>
        </div>
    </div>

    <script>
        // Navbar scroll effect
        window.onscroll = function() {
            const nav = document.getElementById('navbar');
            if (window.pageYOffset > 100) nav.classList.add('scrolled');
            else nav.classList.remove('scrolled');
        };

        // Scroll reveal animation basic logic
        const revealElements = document.querySelectorAll('.reveal');
        window.addEventListener('scroll', () => {
            const windowHeight = window.innerHeight;
            revealElements.forEach(el => {
                const elTop = el.getBoundingClientRect().top;
                if (elTop < windowHeight * 0.8) el.style.opacity = 1;
            });
        });
        // Initial check on load
        revealElements.forEach(el => {
            if (el.getBoundingClientRect().top < window.innerHeight) el.style.opacity = 1;
        });

        function toggleMobileNav() {
            const menu = document.getElementById('mobileNav');
            const open = menu.classList.toggle('open');
            document.body.style.overflow = open ? 'hidden' : '';
        }

        function showTrackModal() {
            document.getElementById('trackModal').style.display = 'flex';
        }

        function closeTrackModal() {
            document.getElementById('trackModal').style.display = 'none';
        }

        <?php if(session('error')): ?>
            showTrackModal();
        <?php endif; ?>
    </script>
</body>

</html>
<?php /**PATH D:\laragon\www\ProjectSIM\resources\views/beranda.blade.php ENDPATH**/ ?>