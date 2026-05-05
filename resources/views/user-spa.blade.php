<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Dashboard · LUXELENS STUDIO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Livewire v4: styles injected automatically --}}
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            background: #050505;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #080808;
        }

        ::-webkit-scrollbar-thumb {
            background: #1a1a1a;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #E1C564;
        }

        /* ── Entrance animations ── */
        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulseGold {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(225, 197, 100, .45);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(225, 197, 100, 0);
            }
        }

        .u-in {
            opacity: 0;
            animation: fadeSlideUp .5s cubic-bezier(.4, 0, .2, 1) forwards;
        }

        .u-in:nth-child(1) {
            animation-delay: .05s;
        }

        .u-in:nth-child(2) {
            animation-delay: .12s;
        }

        .u-in:nth-child(3) {
            animation-delay: .19s;
        }

        .u-in:nth-child(4) {
            animation-delay: .26s;
        }

        .u-in:nth-child(5) {
            animation-delay: .33s;
        }

        .u-in:nth-child(6) {
            animation-delay: .40s;
        }

        /* ── Glass cards ── */
        .u-card {
            background: rgba(255, 255, 255, .027);
            backdrop-filter: blur(24px) saturate(140%);
            -webkit-backdrop-filter: blur(24px) saturate(140%);
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 20px;
            transition: border-color .3s, box-shadow .3s;
        }

        .u-card:hover {
            border-color: rgba(225, 197, 100, .15);
            box-shadow: 0 8px 40px rgba(0, 0, 0, .4), 0 0 0 1px rgba(225, 197, 100, .05);
        }

        .u-card-gold {
            background: rgba(225, 197, 100, .04);
            border: 1px solid rgba(225, 197, 100, .18);
            border-radius: 20px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }

        /* ── Floating Action Button ── */
        .u-fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: linear-gradient(135deg, #E1C564, #BFA15A);
            color: #050505;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 30px rgba(225, 197, 100, .32);
            animation: pulseGold 3s ease infinite;
            transition: transform .2s, box-shadow .2s;
            z-index: 200;
            text-decoration: none;
        }

        .u-fab:hover {
            transform: scale(1.12);
            box-shadow: 0 12px 44px rgba(225, 197, 100, .5);
        }

        .u-fab-label {
            position: fixed;
            bottom: 41px;
            right: 94px;
            background: rgba(6, 6, 6, .92);
            border: 1px solid rgba(225, 197, 100, .18);
            color: #E1C564;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .14em;
            padding: 6px 13px;
            border-radius: 8px;
            pointer-events: none;
            opacity: 0;
            transform: translateX(8px);
            transition: all .2s;
            white-space: nowrap;
            z-index: 199;
            font-family: 'Inter', sans-serif;
        }

        .u-fab:hover+.u-fab-label {
            opacity: 1;
            transform: translateX(0);
        }

        input,
        select,
        textarea {
            background: #0d0d0d !important;
            border: 1px solid rgba(255, 255, 255, .08) !important;
            color: #fff !important;
            border-radius: 10px !important;
            outline: none !important;
            font-family: 'Inter', sans-serif !important;
            transition: border-color .2s !important;
            padding: 10px 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: rgba(225, 197, 100, .4) !important;
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .06) !important;
        }

        input::placeholder {
            color: #333 !important;
        }

        /* Loading bar */
        @keyframes goldSweep {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        [wire\:loading] {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #E1C564 50%, transparent 100%);
            background-size: 200% 100%;
            animation: goldSweep 1.4s ease infinite;
            z-index: 9999;
        }
    </style>
</head>

<body>
    <div wire:loading style=""></div>
    @livewire('user-dashboard')
    @livewireScripts
</body>

</html>
