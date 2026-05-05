<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($category) }} | LUXELENS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --gold: #BFA15A;
            --gold-light: #D4B87A;
            --bg: #050505;
        }

        body {
            background: var(--bg);
            color: #fff;
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .pf-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 48px;
            background: linear-gradient(to bottom, rgba(5, 5, 5, .92) 0%, transparent 100%);
        }

        .pf-nav-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 900;
            letter-spacing: -.02em;
            color: var(--gold);
            text-decoration: none;
        }

        .pf-nav-back {
            font-size: 11px;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: #888;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color .25s;
        }

        .pf-nav-back:hover {
            color: #fff;
        }

        /* ── HERO ── */
        .pf-hero {
            min-height: 52vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 120px 24px 64px;
            text-align: center;
            position: relative;
        }

        .pf-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 80% 60% at 50% 100%, rgba(191, 161, 90, .07) 0%, transparent 70%);
            pointer-events: none;
        }

        .pf-eyebrow {
            font-size: 10px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
            opacity: .75;
        }

        .pf-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 700;
            line-height: 1;
            letter-spacing: -.02em;
            color: #fff;
            margin: 0 0 28px;
        }

        .pf-hero-title em {
            font-style: italic;
            color: var(--gold);
        }

        .pf-divider {
            width: 48px;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gold), transparent);
            margin: 0 auto;
        }

        /* ── SECTION LABEL ── */
        .pf-section-label {
            font-size: 9px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: var(--gold);
            text-align: center;
            margin-bottom: 40px;
            opacity: .7;
        }

        /* ── VIDEO GRID ── */
        .pf-video-section {
            padding: 80px 48px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pf-video-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .pf-video-grid .pf-video-item:first-child {
            grid-column: span 2;
        }

        .pf-video-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            background: #0d0d0d;
            aspect-ratio: 16/9;
            cursor: pointer;
        }

        .pf-video-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: .7;
            transition: opacity .4s;
        }

        .pf-video-item:hover video {
            opacity: .95;
        }

        .pf-video-item.playing video {
            opacity: 1;
        }

        .pf-play-btn {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity .3s;
            pointer-events: none;
        }

        .pf-video-item.playing .pf-play-btn {
            opacity: 0;
        }

        .pf-play-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(5, 5, 5, .6);
            border: 1.5px solid rgba(191, 161, 90, .55);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform .25s, background .25s;
        }

        .pf-video-item:hover .pf-play-circle {
            transform: scale(1.1);
            background: rgba(191, 161, 90, .16);
        }

        .pf-play-circle svg {
            margin-left: 4px;
        }

        .pf-vid-click {
            position: absolute;
            inset: 0;
            z-index: 2;
        }

        /* ── MASONRY GALLERY ── */
        .pf-gallery-section {
            padding: 20px 48px 120px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .pf-masonry {
            columns: 3;
            column-gap: 12px;
        }

        .pf-masonry-item {
            break-inside: avoid;
            margin-bottom: 12px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            background: #0d0d0d;
        }

        .pf-masonry-item img {
            width: 100%;
            display: block;
            object-fit: cover;
            transition: transform .55s cubic-bezier(.25, .46, .45, .94), opacity .4s;
            opacity: .82;
        }

        .pf-masonry-item:hover img {
            transform: scale(1.045);
            opacity: 1;
        }

        .pf-item-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(5, 5, 5, .45) 0%, transparent 50%);
            opacity: 0;
            transition: opacity .35s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pf-masonry-item:hover .pf-item-overlay {
            opacity: 1;
        }

        .pf-overlay-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pf-empty {
            text-align: center;
            padding: 80px 24px;
            color: #333;
            font-style: italic;
        }

        /* ── CTA ── */
        .pf-cta {
            text-align: center;
            padding: 20px 24px 120px;
        }

        .pf-cta-label {
            font-size: 10px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: #444;
            margin-bottom: 22px;
        }

        .pf-btn-book {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 18px 52px;
            border: 1px solid var(--gold);
            color: var(--gold);
            text-decoration: none;
            font-size: 11px;
            letter-spacing: .25em;
            text-transform: uppercase;
            font-weight: 500;
            border-radius: 3px;
            transition: background .3s, color .3s;
        }

        .pf-btn-book:hover {
            background: var(--gold);
            color: #050505;
        }

        /* ── LIGHTBOX ── */
        #pf-lightbox {
            position: fixed;
            inset: 0;
            z-index: 999;
            background: rgba(5, 5, 5, .96);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        #pf-lightbox.open {
            display: flex;
        }

        #pf-lb-img {
            max-width: 90vw;
            max-height: 88vh;
            object-fit: contain;
            border-radius: 6px;
            box-shadow: 0 40px 120px rgba(0, 0, 0, .8);
            transition: opacity .2s;
        }

        .pf-lb-close {
            position: fixed;
            top: 24px;
            right: 28px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .12);
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
            z-index: 1000;
        }

        .pf-lb-close:hover {
            background: rgba(255, 255, 255, .14);
        }

        .pf-lb-nav {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            color: #fff;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
            z-index: 1000;
        }

        .pf-lb-nav:hover {
            background: rgba(255, 255, 255, .14);
        }

        #pf-lb-prev {
            left: 20px;
        }

        #pf-lb-next {
            right: 20px;
        }

        .pf-lb-counter {
            position: fixed;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            letter-spacing: .3em;
            color: #555;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .pf-nav {
                padding: 20px 24px;
            }

            .pf-video-section,
            .pf-gallery-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .pf-video-grid {
                grid-template-columns: 1fr;
            }

            .pf-video-grid .pf-video-item:first-child {
                grid-column: span 1;
            }

            .pf-masonry {
                columns: 2;
            }
        }

        @media (max-width: 560px) {
            .pf-masonry {
                columns: 1;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="pf-nav">
        <a href="/" class="pf-nav-logo">PROJECT<span style="color:#fff">SIM</span><span
                style="color:var(--gold)">.</span></a>
        <a href="/gallery" class="pf-nav-back">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Back to Gallery
        </a>
    </nav>

    {{-- HERO --}}
    <section class="pf-hero">
        <p class="pf-eyebrow">LuxeLens Photography</p>
        <h1 class="pf-hero-title">The <em>{{ ucfirst($category) }}</em> Stories</h1>
        <div class="pf-divider"></div>
    </section>

    {{-- VIDEO SHOWCASE --}}
    @php
        /*
         * Tambahkan file video ke folder: public/videos/
         * Format penamaan: {kategori}1.mp4, {kategori}2.mp4, {kategori}3.mp4
         * Contoh: wedding1.mp4, wedding2.mp4, wedding3.mp4
         *         wisuda1.mp4,  wisuda2.mp4,  wisuda3.mp4
         *         prewed1.mp4,  prewed2.mp4,  prewed3.mp4
         *         family1.mp4,  family2.mp4,  family3.mp4
         *
         * Jika file belum ada, akan fallback ke video.mp4
         */
        $categoryVideos = [
            'wedding' => ['wedding1.mp4', 'wedding2.mp4', 'wedding3.mp4'],
            'wisuda' => ['wisuda1.mp4', 'wisuda2.mp4', 'wisuda3.mp4'],
            'prewed' => ['prewed1.mp4', 'prewed2.mp4', 'prewed3.mp4'],
            'family' => ['family1.mp4', 'family2.mp4', 'family3.mp4'],
        ];

        $currentVideos = $categoryVideos[$category] ?? ['video.mp4', 'video.mp4', 'video.mp4'];
    @endphp

    <section class="pf-video-section">
        <p class="pf-section-label">Film Highlights</p>
        <div class="pf-video-grid">

            @foreach ($currentVideos as $vi => $videoFile)
                @php
                    $videoId = 'pf-vid-' . ($vi + 1);
                    $videoPath = public_path('videos/' . $videoFile);
                    $videoSrc = file_exists($videoPath) ? asset('videos/' . $videoFile) : asset('videos/video.mp4');
                @endphp
                <div class="pf-video-item" id="{{ $videoId }}">
                    <video src="{{ $videoSrc }}" preload="metadata" playsinline loop></video>
                    <div class="pf-vid-click" onclick="pfToggleVideo('{{ $videoId }}')"></div>
                    <div class="pf-play-btn">
                        <div class="pf-play-circle">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#BFA15A">
                                <path d="M8 5.14v14l11-7-11-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- PHOTO GALLERY --}}
    <section class="pf-gallery-section">
        <p class="pf-section-label">Photo Collection</p>

        @if ($photos->count())
            <div class="pf-masonry">
                @foreach ($photos as $foto)
                    <div class="pf-masonry-item" onclick="pfOpenLb({{ $loop->index }})">
                        <img src="{{ asset('storage/portfolio/' . $foto->filename) }}"
                            alt="{{ ucfirst($category) }} {{ $loop->iteration }}" loading="lazy">
                        <div class="pf-item-overlay">
                            <div class="pf-overlay-icon">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="white"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="pf-empty">Belum ada foto untuk kategori <em>{{ $category }}</em>.</p>
        @endif
    </section>

    {{-- CTA --}}
    <section class="pf-cta">
        <p class="pf-cta-label">Ready to create your story?</p>
        <a href="/booking?category={{ $category }}" class="pf-btn-book">
            Book {{ strtoupper($category) }} Session
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </section>

    {{-- LIGHTBOX --}}
    <div id="pf-lightbox">
        <button class="pf-lb-close" onclick="pfCloseLb()">✕</button>
        <button class="pf-lb-nav" id="pf-lb-prev" onclick="pfLbNav(-1)">‹</button>
        <img id="pf-lb-img" src="" alt="">
        <button class="pf-lb-nav" id="pf-lb-next" onclick="pfLbNav(1)">›</button>
        <div class="pf-lb-counter" id="pf-lb-counter"></div>
    </div>

    <script>
        /* ── VIDEO ── */
        function pfToggleVideo(id) {
            const wrap = document.getElementById(id);
            const vid = wrap.querySelector('video');
            if (vid.paused) {
                document.querySelectorAll('.pf-video-item video').forEach(v => {
                    if (v !== vid) {
                        v.pause();
                        v.closest('.pf-video-item').classList.remove('playing');
                    }
                });
                vid.play();
                wrap.classList.add('playing');
            } else {
                vid.pause();
                wrap.classList.remove('playing');
            }
        }

        /* ── LIGHTBOX ── */
        const pfPhotos = [
            @foreach ($photos as $foto)
                "{{ asset('storage/portfolio/' . $foto->filename) }}",
            @endforeach
        ];

        let pfCurrent = 0;

        function pfOpenLb(idx) {
            pfCurrent = idx;
            document.getElementById('pf-lb-img').src = pfPhotos[idx];
            document.getElementById('pf-lightbox').classList.add('open');
            pfCounter();
            document.body.style.overflow = 'hidden';
        }

        function pfCloseLb() {
            document.getElementById('pf-lightbox').classList.remove('open');
            document.body.style.overflow = '';
        }

        function pfLbNav(dir) {
            pfCurrent = (pfCurrent + dir + pfPhotos.length) % pfPhotos.length;
            const img = document.getElementById('pf-lb-img');
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = pfPhotos[pfCurrent];
                img.style.opacity = '1';
                pfCounter();
            }, 180);
        }

        function pfCounter() {
            document.getElementById('pf-lb-counter').textContent =
                String(pfCurrent + 1).padStart(2, '0') + ' / ' + String(pfPhotos.length).padStart(2, '0');
        }

        document.getElementById('pf-lightbox').addEventListener('click', e => {
            if (e.target.id === 'pf-lightbox') pfCloseLb();
        });

        document.addEventListener('keydown', e => {
            if (!document.getElementById('pf-lightbox').classList.contains('open')) return;
            if (e.key === 'Escape') pfCloseLb();
            if (e.key === 'ArrowLeft') pfLbNav(-1);
            if (e.key === 'ArrowRight') pfLbNav(1);
        });
    </script>

</body>

</html>
