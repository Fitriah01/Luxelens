<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun · LUXELENS STUDIO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: #050505;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        /* Ambient glows */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }

        body::before {
            width: 600px;
            height: 600px;
            top: -200px;
            left: -200px;
            background: radial-gradient(circle, rgba(225, 197, 100, .045) 0%, transparent 65%);
        }

        body::after {
            width: 500px;
            height: 500px;
            bottom: -200px;
            right: -150px;
            background: radial-gradient(circle, rgba(124, 124, 255, .03) 0%, transparent 65%);
        }

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

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        @keyframes goldLine {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        /* Card */
        .card {
            background: rgba(255, 255, 255, .028);
            backdrop-filter: blur(28px) saturate(140%);
            -webkit-backdrop-filter: blur(28px) saturate(140%);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 24px;
            width: 100%;
            max-width: 440px;
            padding: 44px 40px 36px;
            position: relative;
            animation: fadeUp .6s cubic-bezier(.4, 0, .2, 1) forwards;
            box-shadow: 0 32px 80px rgba(0, 0, 0, .6), 0 0 0 1px rgba(225, 197, 100, .04);
        }

        /* Top gold stripe */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(225, 197, 100, .6), transparent);
            border-radius: 24px 24px 0 0;
        }

        /* Logo + Brand */
        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #E1C564, #BFA15A);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 18px rgba(225, 197, 100, .28);
            flex-shrink: 0;
        }

        .brand-icon span {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: #050505;
        }

        .brand-text .name {
            font-size: 12px;
            font-weight: 800;
            color: #fff;
            letter-spacing: .07em;
        }

        .brand-text .sub {
            font-size: 9px;
            color: #444;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        /* Heading */
        .heading {
            margin-bottom: 28px;
        }

        .heading .label {
            font-size: 10px;
            color: #444;
            letter-spacing: .2em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .heading h1 span {
            background: linear-gradient(135deg, #E1C564 30%, #BFA15A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Floating-label field */
        .field {
            position: relative;
            margin-bottom: 18px;
        }

        .field input {
            width: 100%;
            padding: 16px 16px 6px;
            background: rgba(255, 255, 255, .035);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 12px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color .25s, background .25s, box-shadow .25s;
            /* leave room for toggle btn */
        }

        .field input.has-toggle {
            padding-right: 46px;
        }

        .field input::placeholder {
            color: transparent;
        }

        .field label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #555;
            pointer-events: none;
            transition: all .2s;
            letter-spacing: .02em;
        }

        /* float up when focused or has value */
        .field input:focus~label,
        .field input:not(:placeholder-shown)~label {
            top: 8px;
            transform: none;
            font-size: 9px;
            color: #E1C564;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .field input:focus {
            border-color: rgba(225, 197, 100, .4);
            background: rgba(225, 197, 100, .04);
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .07);
        }

        /* Password toggle */
        .toggle-pw {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #444;
            padding: 4px;
            display: flex;
            align-items: center;
            transition: color .2s;
            width: auto;
            margin: 0;
        }

        .toggle-pw:hover {
            color: #E1C564;
            background: none;
        }

        /* Password strength bar */
        .strength-wrap {
            margin-top: 8px;
            display: none;
        }

        .strength-wrap.visible {
            display: block;
        }

        .strength-bars {
            display: flex;
            gap: 4px;
            margin-bottom: 5px;
        }

        .strength-bars span {
            flex: 1;
            height: 3px;
            border-radius: 3px;
            background: rgba(255, 255, 255, .07);
            transition: background .3s;
        }

        .strength-text {
            font-size: 10px;
            color: #555;
            text-align: right;
        }

        /* Error box */
        .error-box {
            background: rgba(255, 68, 68, .08);
            border: 1px solid rgba(255, 68, 68, .22);
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 20px;
        }

        .error-box strong {
            display: block;
            font-size: 11px;
            color: #ff6b6b;
            margin-bottom: 6px;
            letter-spacing: .04em;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .error-box li {
            font-size: 11px;
            color: #cc4444;
            line-height: 1.7;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 14px;
            margin-top: 6px;
            background: linear-gradient(135deg, #E1C564, #BFA15A);
            border: none;
            border-radius: 12px;
            color: #050505;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
            cursor: pointer;
            transition: opacity .2s, transform .2s, box-shadow .2s;
            box-shadow: 0 6px 24px rgba(225, 197, 100, .22);
        }

        .btn-submit:hover {
            opacity: .9;
            transform: translateY(-1px);
            box-shadow: 0 10px 32px rgba(225, 197, 100, .32);
        }

        .btn-submit:active {
            transform: translateY(0);
            opacity: 1;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 22px;
            font-size: 12px;
            color: #444;
        }

        .footer a {
            color: #E1C564;
            text-decoration: none;
            font-weight: 600;
            transition: opacity .2s;
        }

        .footer a:hover {
            opacity: .75;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
        }

        .divider hr {
            flex: 1;
            border: none;
            border-top: 1px solid rgba(255, 255, 255, .06);
        }

        .divider span {
            font-size: 10px;
            color: #333;
            letter-spacing: .1em;
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <div class="card">

        {{-- Brand --}}
        <div class="brand">
            <div class="brand-icon"><span>P</span></div>
            <div class="brand-text">
                <div class="name">LUXELENS</div>
                <div class="sub">Studio Photography</div>
            </div>
        </div>

        {{-- Heading --}}
        <div class="heading">
            <div class="label">Bergabung sekarang</div>
            <h1>Buat <span>Akun Baru</span></h1>
        </div>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="error-box">
                <strong>⚠ Ada yang perlu diperbaiki:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('register.submit') }}" method="POST" id="reg-form">
            @csrf

            {{-- Nama --}}
            <div class="field">
                <input type="text" name="name" id="inp-name" placeholder=" " value="{{ old('name') }}"
                    autocomplete="name" required>
                <label for="inp-name">Nama Lengkap</label>
            </div>

            {{-- Email --}}
            <div class="field">
                <input type="email" name="email" id="inp-email" placeholder=" " value="{{ old('email') }}"
                    autocomplete="email" required>
                <label for="inp-email">Alamat Email</label>
            </div>

            {{-- Password --}}
            <div class="field">
                <input type="password" name="password" id="inp-pw" placeholder=" " class="has-toggle"
                    autocomplete="new-password" required oninput="checkStrength(this.value)">
                <label for="inp-pw">Password</label>
                <button type="button" class="toggle-pw" onclick="togglePw('inp-pw', this)" tabindex="-1">
                    <svg id="eye-pw" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
                {{-- Strength --}}
                <div class="strength-wrap" id="strength-wrap">
                    <div class="strength-bars">
                        <span id="s1"></span><span id="s2"></span><span id="s3"></span><span
                            id="s4"></span>
                    </div>
                    <div class="strength-text" id="strength-text"></div>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="field">
                <input type="password" name="password_confirmation" id="inp-pwc" placeholder=" " class="has-toggle"
                    autocomplete="new-password" required>
                <label for="inp-pwc">Konfirmasi Password</label>
                <button type="button" class="toggle-pw" onclick="togglePw('inp-pwc', this)" tabindex="-1">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>

            <button type="submit" class="btn-submit">
                Buat Akun →
            </button>
        </form>

        <div class="divider">
            <hr><span>Sudah punya akun?</span>
            <hr>
        </div>

        <div class="footer">
            <a href="{{ route('login') }}">Masuk ke akun Anda</a>
        </div>

    </div>

    <script>
        /* Toggle password visibility */
        function togglePw(id, btn) {
            const inp = document.getElementById(id);
            const showing = inp.type === 'text';
            inp.type = showing ? 'password' : 'text';
            btn.querySelector('svg').innerHTML = showing ?
                '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>' :
                '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';
            btn.style.color = showing ? '#444' : '#E1C564';
        }

        /* Password strength */
        function checkStrength(val) {
            const wrap = document.getElementById('strength-wrap');
            const text = document.getElementById('strength-text');
            const bars = [document.getElementById('s1'), document.getElementById('s2'), document.getElementById('s3'),
                document.getElementById('s4')
            ];

            if (!val) {
                wrap.classList.remove('visible');
                return;
            }
            wrap.classList.add('visible');

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colors = ['#ff4444', '#f39c12', '#7c7cff', '#2ecc71'];
            const labels = ['Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];

            bars.forEach((b, i) => {
                b.style.background = i < score ? colors[score - 1] : 'rgba(255,255,255,.07)';
            });
            text.textContent = labels[score - 1] ?? '';
            text.style.color = colors[score - 1] ?? '#555';
        }
    </script>

</body>

</html>
