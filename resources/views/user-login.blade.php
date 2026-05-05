<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Access - LUXELENS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* ── Reset ─────────────────────────────────────────── */
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
            --panel: #070707;
            --border: rgba(225, 197, 100, 0.18);
            --text: #F5F0E8;
            --muted: #7A6A52;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text);
            display: flex;
        }

        /* ── Left — cinematic panel ─────────────────────────── */
        .panel-photo {
            display: none;
            position: relative;
            overflow: hidden;
            flex: 0 0 58%;
        }

        @media (min-width: 1024px) {
            .panel-photo {
                display: block;
            }
        }

        .panel-photo img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.08);
            animation: slowZoom 18s ease-in-out infinite alternate;
        }

        @keyframes slowZoom {
            from {
                transform: scale(1.08);
            }

            to {
                transform: scale(1.15);
            }
        }

        .panel-photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(5, 5, 5, 0.72) 0%, rgba(5, 5, 5, 0.08) 100%);
        }

        .panel-photo-text {
            position: absolute;
            bottom: 72px;
            left: 64px;
            z-index: 2;
            animation: fadeUp .9s .2s ease both;
        }

        .panel-photo-text h2 {
            font-family: 'Playfair Display', serif;
            font-size: 4.2rem;
            font-weight: 900;
            color: #fff;
            line-height: 1.08;
            margin-bottom: 10px;
        }

        .panel-photo-text h2 em {
            font-style: italic;
            font-weight: 400;
            color: var(--gold);
        }

        .panel-photo-text p {
            font-size: 9px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .3);
            margin-top: 18px;
        }

        /* decorative dots column */
        .panel-dots {
            position: absolute;
            top: 50%;
            right: 32px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 6px;
            opacity: .22;
        }

        .panel-dots span {
            display: block;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--gold);
        }

        /* ── Right — form panel ─────────────────────────────── */
        .panel-form {
            flex: 1;
            min-width: 0;
            background: var(--panel);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
            position: relative;
            overflow: hidden;
        }

        /* subtle corner glow */
        .panel-form::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(225, 197, 100, 0.055), transparent 65%);
            top: -150px;
            right: -150px;
            pointer-events: none;
        }

        /* brand chip */
        .brand {
            position: absolute;
            top: 36px;
            right: 44px;
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -.5px;
            text-decoration: none;
            color: var(--gold);
            line-height: 1;
        }

        .brand span {
            color: #fff;
        }

        /* footer tagline */
        .form-footer {
            position: absolute;
            bottom: 28px;
            font-size: 8px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .08);
            text-align: center;
            width: 100%;
        }

        /* ── Form container ─────────────────────────────────── */
        .form-wrap {
            width: 100%;
            max-width: 360px;
            position: relative;
            z-index: 1;
            animation: fadeUp .7s .25s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Heading ─────────────────────────────────────────── */
        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: -.5px;
            line-height: 1.1;
            margin-bottom: 6px;
        }

        .form-sub {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 40px;
        }

        /* ── Flash ───────────────────────────────────────────── */
        .flash {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 22px;
            border: 1px solid;
            animation: fadeUp .35s ease both;
        }

        .flash.error {
            background: rgba(224, 96, 96, .08);
            color: #E06060;
            border-color: rgba(224, 96, 96, .3);
        }

        .flash svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* ── Input group ─────────────────────────────────────── */
        .igroup {
            margin-bottom: 26px;
            position: relative;
        }

        .igroup label {
            display: block;
            font-size: 9px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 10px;
            opacity: .6;
            transition: opacity .25s;
        }

        .igroup:focus-within label {
            opacity: 1;
        }

        .igroup input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(225, 197, 100, 0.2);
            border-radius: 0;
            padding: 12px 2px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color .3s, padding-left .3s;
        }

        .igroup input::placeholder {
            color: rgba(255, 255, 255, .1);
        }

        .igroup input:focus {
            border-bottom-color: var(--gold);
            padding-left: 10px;
        }

        /* password toggle */
        .pw-wrap {
            position: relative;
        }

        .pw-wrap input {
            padding-right: 36px;
        }

        .pw-toggle {
            position: absolute;
            right: 2px;
            bottom: 12px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
            padding: 0;
            line-height: 0;
            transition: color .2s;
        }

        .pw-toggle:hover {
            color: var(--gold);
        }

        .pw-toggle svg {
            width: 16px;
            height: 16px;
        }

        /* ── Submit button ───────────────────────────────────── */
        .btn-submit {
            width: 100%;
            padding: 17px;
            margin-top: 16px;
            border: none;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dk) 100%);
            color: #0a0800;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 0;
            box-shadow: 0 6px 28px rgba(225, 197, 100, .22);
            transition: all .35s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .08);
            opacity: 0;
            transition: opacity .25s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 38px rgba(225, 197, 100, .38);
            background: #fff;
        }

        .btn-submit:hover::after {
            opacity: 1;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit .spinner {
            display: none;
            width: 14px;
            height: 14px;
            border: 2px solid rgba(0, 0, 0, .2);
            border-top-color: #0a0800;
            border-radius: 50%;
            animation: spin .7s linear infinite;
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

        /* ── Register link ───────────────────────────────────── */
        .form-register {
            margin-top: 36px;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, .05);
            text-align: center;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .25);
        }

        .form-register a {
            color: var(--gold);
            font-weight: 700;
            margin-left: 8px;
            text-decoration: underline;
            text-underline-offset: 6px;
            transition: color .2s;
        }

        .form-register a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    {{-- ── Left: Cinematic Photo ── --}}
    <div class="panel-photo">
        <img src="{{ asset('images/foto1.jpeg') }}" alt="Cinematic Photography">
        <div class="panel-photo-overlay"></div>
        <div class="panel-photo-text">
            <h2>Capturing<br><em>the essence.</em></h2>
            <p>LUXELENS STUDIO &bull; Est. 2019</p>
        </div>
        <div class="panel-dots">
            @for ($i = 0; $i < 9; $i++)
                <span></span>
            @endfor
        </div>
    </div>

    {{-- ── Right: Form ── --}}
    <div class="panel-form">

        <a href="/" class="brand">PROJECT<span>SIM</span>.</a>

        <div class="form-wrap">

            <h1 class="form-title">Welcome Back</h1>
            <p class="form-sub">Access your gallery &amp; session</p>

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

            @if ($errors->any())
                <div class="flash error">
                    <svg viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" id="login-form" novalidate>
                @csrf

                <div class="igroup">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        placeholder="your@email.com" autocomplete="email">
                </div>

                <div class="igroup">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            autocomplete="current-password">
                        <button type="button" class="pw-toggle" id="pw-toggle" aria-label="Toggle password visibility">
                            <svg id="eye-show" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg id="eye-hide" style="display:none;" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.064 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="btn-submit">
                    <span class="btn-text">Login To Reserve</span>
                    <div class="spinner"></div>
                </button>
            </form>

            <div class="form-register">
                New to LUXELENS?
                <a href="{{ route('register') }}">Create Account</a>
            </div>
        </div>

        <p class="form-footer">Melukis Dengan Cahaya &bull; LUXELENS STUDIO</p>
    </div>

    <script>
        const pwToggle = document.getElementById('pw-toggle');
        const pwInput = document.getElementById('password');
        const eyeShow = document.getElementById('eye-show');
        const eyeHide = document.getElementById('eye-hide');

        pwToggle.addEventListener('click', function() {
            const isText = pwInput.type === 'text';
            pwInput.type = isText ? 'password' : 'text';
            eyeShow.style.display = isText ? 'block' : 'none';
            eyeHide.style.display = isText ? 'none' : 'block';
        });

        document.getElementById('login-form').addEventListener('submit', function() {
            document.getElementById('btn-submit').classList.add('loading');
        });
    </script>

</body>

</html>
