<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | LUXELENS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600&display=swap"
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
            --gold-dim: rgba(191, 161, 90, .15);
            --bg: #050505;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg);
            color: #fff;
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .gl-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 200;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 52px;
            background: rgba(5, 5, 5, .88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            transition: padding .3s;
        }

        .gl-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -.01em;
            color: var(--gold);
            text-decoration: none;
        }

        .gl-nav-links {
            display: flex;
            gap: 36px;
        }

        .gl-nav-links a {
            font-size: 10px;
            letter-spacing: .25em;
            text-transform: uppercase;
            color: #666;
            text-decoration: none;
            transition: color .25s;
        }

        .gl-nav-links a:hover,
        .gl-nav-links a.active {
            color: #fff;
        }

        /* ── HERO ── */
        .gl-hero {
            min-height: 55vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 140px 24px 80px;
            position: relative;
        }

        .gl-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 55% at 50% 80%, rgba(191, 161, 90, .06) 0%, transparent 70%);
            pointer-events: none;
        }

        .gl-hero-eyebrow {
            font-size: 9px;
            letter-spacing: .45em;
            text-transform: uppercase;
            color: var(--gold);
            opacity: .7;
            margin-bottom: 22px;
        }

        .gl-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3.2rem, 9vw, 7.5rem);
            font-weight: 700;
            line-height: .95;
            letter-spacing: -.03em;
            margin: 0 0 30px;
            color: #fff;
        }

        .gl-hero-title em {
            font-style: italic;
            color: var(--gold);
        }

        .gl-hero-sub {
            font-size: 13px;
            color: #555;
            letter-spacing: .06em;
            max-width: 420px;
            line-height: 1.7;
        }

        /* ── SECTION DIVIDER ── */
        .gl-section-divider {
            display: flex;
            align-items: center;
            gap: 24px;
            padding: 0 52px;
            margin-bottom: 56px;
        }

        .gl-section-divider-line {
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, .06);
        }

        .gl-section-tag {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 9px;
            letter-spacing: .4em;
            text-transform: uppercase;
            color: var(--gold);
            white-space: nowrap;
        }

        .gl-section-tag-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--gold);
            opacity: .6;
        }

        /* ── VIDEO SECTION ── */
        .gl-video-wrap {
            padding: 0 52px 100px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .gl-video-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: auto auto;
            gap: 12px;
        }

        .gl-vid-item {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            background: #0d0d0d;
            cursor: pointer;
        }

        .gl-vid-item:first-child {
            grid-row: span 2;
            aspect-ratio: 4/5;
        }

        .gl-vid-item:not(:first-child) {
            aspect-ratio: 16/9;
        }

        .gl-vid-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: .65;
            transition: opacity .45s;
        }

        .gl-vid-item:hover video,
        .gl-vid-item.playing video {
            opacity: 1;
        }

        .gl-vid-click {
            position: absolute;
            inset: 0;
            z-index: 3;
        }

        .gl-play-btn {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            pointer-events: none;
            transition: opacity .3s;
        }

        .gl-vid-item.playing .gl-play-btn {
            opacity: 0;
        }

        .gl-play-ring {
            position: relative;
            width: 68px;
            height: 68px;
        }

        .gl-play-ring-outer {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 1px solid rgba(191, 161, 90, .4);
            animation: ripple 2.4s ease-out infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: .5;
            }

            100% {
                transform: scale(1.6);
                opacity: 0;
            }
        }

        .gl-play-ring-inner {
            position: absolute;
            inset: 8px;
            border-radius: 50%;
            background: rgba(5, 5, 5, .65);
            border: 1px solid rgba(191, 161, 90, .5);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .25s, transform .25s;
        }

        .gl-vid-item:hover .gl-play-ring-inner {
            background: rgba(191, 161, 90, .18);
            transform: scale(1.08);
        }

        .gl-play-ring-inner svg {
            margin-left: 3px;
        }

        /* Label badge on each video */
        .gl-vid-label {
            position: absolute;
            bottom: 18px;
            left: 20px;
            font-size: 9px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .55);
            z-index: 4;
            pointer-events: none;
        }

        /* ── PHOTO SECTION ── */
        .gl-photo-wrap {
            padding: 0 52px 120px;
            max-width: 1500px;
            margin: 0 auto;
        }

        /* Filter tabs */
        .gl-filter-row {
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 48px;
            flex-wrap: wrap;
        }

        .gl-filter-btn {
            background: none;
            border: 1px solid transparent;
            color: #555;
            cursor: pointer;
            font-size: 10px;
            font-family: 'Inter', sans-serif;
            letter-spacing: .22em;
            padding: 10px 22px;
            text-transform: uppercase;
            border-radius: 100px;
            transition: all .25s;
            white-space: nowrap;
        }

        .gl-filter-btn:hover {
            color: #fff;
            border-color: rgba(255, 255, 255, .1);
        }

        .gl-filter-btn.active {
            color: #050505;
            background: var(--gold);
            border-color: var(--gold);
        }

        /* Masonry grid */
        .gl-masonry {
            columns: 4;
            column-gap: 12px;
        }

        .gl-photo-item {
            break-inside: avoid;
            margin-bottom: 12px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: #0d0d0d;
            cursor: pointer;
            transition: opacity .35s, transform .35s;
        }

        .gl-photo-item.gl-hidden {
            display: none;
        }

        .gl-photo-item img {
            width: 100%;
            display: block;
            object-fit: cover;
            opacity: .8;
            transition: transform .55s cubic-bezier(.25, .46, .45, .94), opacity .4s;
        }

        .gl-photo-item:hover img {
            transform: scale(1.05);
            opacity: 1;
        }

        .gl-photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(5, 5, 5, .72) 0%, transparent 55%);
            opacity: 0;
            transition: opacity .35s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px 18px;
        }

        .gl-photo-item:hover .gl-photo-overlay {
            opacity: 1;
        }

        .gl-photo-cat {
            font-size: 8px;
            letter-spacing: .3em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 4px;
        }

        .gl-photo-title {
            font-family: 'Playfair Display', serif;
            font-size: .95rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        /* Category card tiles (when "All" selected, show category tiles) */
        .gl-cat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .gl-cat-card {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            aspect-ratio: 3/4;
            background: #0d0d0d;
            text-decoration: none;
            display: block;
            cursor: pointer;
        }

        .gl-cat-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .55;
            transition: opacity .5s, transform .6s cubic-bezier(.25, .46, .45, .94);
        }

        .gl-cat-card:hover img {
            opacity: .8;
            transform: scale(1.06);
        }

        .gl-cat-card-body {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 32px 24px;
            background: linear-gradient(to top, rgba(5, 5, 5, .75) 0%, transparent 55%);
        }

        .gl-cat-card-label {
            font-size: 8px;
            letter-spacing: .45em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .gl-cat-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
            line-height: 1.1;
        }

        .gl-cat-card-arrow {
            margin-top: 14px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .15);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .25s, transform .25s;
        }

        .gl-cat-card:hover .gl-cat-card-arrow {
            background: var(--gold);
            transform: translateY(-3px);
        }

        /* Empty state */
        .gl-empty {
            text-align: center;
            padding: 80px 24px;
            color: #333;
            font-style: italic;
        }

        /* Lightbox */
        #gl-lightbox {
            position: fixed;
            inset: 0;
            z-index: 999;
            background: rgba(5, 5, 5, .97);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        #gl-lightbox.open {
            display: flex;
        }

        #gl-lb-img {
            max-width: 90vw;
            max-height: 88vh;
            object-fit: contain;
            border-radius: 6px;
            box-shadow: 0 40px 120px rgba(0, 0, 0, .9);
            transition: opacity .2s;
        }

        .gl-lb-close {
            position: fixed;
            top: 24px;
            right: 28px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
        }

        .gl-lb-close:hover {
            background: rgba(255, 255, 255, .14);
        }

        .gl-lb-nav {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            color: #fff;
            font-size: 1.4rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
        }

        .gl-lb-nav:hover {
            background: rgba(255, 255, 255, .14);
        }

        #gl-lb-prev {
            left: 20px;
        }

        #gl-lb-next {
            right: 20px;
        }

        .gl-lb-counter {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            letter-spacing: .3em;
            color: #555;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1100px) {
            .gl-cat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gl-masonry {
                columns: 3;
            }
        }

        @media (max-width: 800px) {
            .gl-nav {
                padding: 18px 24px;
            }

            .gl-video-wrap,
            .gl-photo-wrap {
                padding-left: 20px;
                padding-right: 20px;
            }

            .gl-section-divider {
                padding: 0 20px;
            }

            .gl-video-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .gl-vid-item:first-child {
                grid-row: span 1;
                aspect-ratio: 16/9;
            }

            .gl-masonry {
                columns: 2;
            }

            .gl-cat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 520px) {
            .gl-masonry {
                columns: 1;
            }

            .gl-nav-links {
                display: none;
            }
        }

        @include('partials.portfolio-shared-styles')
    </style>
</head>

<body>

    {{-- ── NAVBAR ── --}}
    <header class="gl-nav">
        <a href="/" class="gl-logo">PROJECT<span style="color:#fff">SIM</span><span
                style="color:var(--gold)">.</span></a>
        <nav class="gl-nav-links">
            <a href="/">Home</a>
            <a href="/gallery" class="active">Gallery</a>
            <a href="/booking">Booking</a>
        </nav>
    </header>

    {{-- ── HERO ── --}}
    <section class="gl-hero portfolio-hero">
        <p class="gl-hero-eyebrow portfolio-eyebrow">Visual Portfolio</p>
        <h1 class="gl-hero-title portfolio-title">Our <em>Creative</em><br>Work</h1>
        <p class="gl-hero-sub portfolio-subtitle">Setiap frame adalah cerita. Jelajahi koleksi film dan foto kami dengan
            tata letak yang lebih bersih, sinematik, dan konsisten di setiap kategori.</p>
    </section>

    {{-- ════════════════════════════════ --}}
    {{--  SECTION 01 · FILM & VIDEO       --}}
    {{-- ════════════════════════════════ --}}
    <div class="gl-section-divider">
        <div class="gl-section-divider-line"></div>
        <div class="gl-section-tag">
            <span class="gl-section-tag-dot"></span>
            01 &nbsp;·&nbsp; Film &amp; Video
            <span class="gl-section-tag-dot"></span>
        </div>
        <div class="gl-section-divider-line"></div>
    </div>

    <div class="gl-video-wrap portfolio-shell">
        <div class="portfolio-section-head">
            <p class="portfolio-section-kicker">Signature Motion</p>
            <h2 class="portfolio-section-title">Curated <em>Portfolio Films</em></h2>
            <p class="portfolio-section-copy">Seluruh video kini ditampilkan dalam grid universal yang simetris agar
                tiap kategori terasa konsisten dan lebih premium.</p>
        </div>

        <div class="gl-video-grid portfolio-video-grid">

            @php
                $galleryVideos = [
                    ['id' => 'glvid-1', 'label' => 'Cinematic Reel', 'src' => asset('videos/video.mp4')],
                    ['id' => 'glvid-2', 'label' => 'Wedding Film', 'src' => asset('videos/video.mp4')],
                    ['id' => 'glvid-3', 'label' => 'Prewed Story', 'src' => asset('videos/video.mp4')],
                ];
            @endphp

            {{-- Feature video (tall left) --}}
            <div class="gl-vid-item portfolio-video-card" id="glvid-1" data-video-index="0">
                <video src="{{ $galleryVideos[0]['src'] }}" preload="metadata" playsinline loop muted></video>
                <div class="gl-vid-click" onclick="glOpenVideoLb(0)"></div>
                <div class="gl-play-btn portfolio-video-overlay">
                    <div class="portfolio-play-button">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="#BFA15A">
                            <path d="M8 5.14v14l11-7-11-7z" />
                        </svg>
                    </div>
                </div>
                <span class="gl-vid-label portfolio-video-label">{{ $galleryVideos[0]['label'] }}</span>
            </div>

            {{-- Two stacked videos right --}}
            <div class="gl-vid-item portfolio-video-card" id="glvid-2" data-video-index="1">
                <video src="{{ $galleryVideos[1]['src'] }}" preload="metadata" playsinline loop muted></video>
                <div class="gl-vid-click" onclick="glOpenVideoLb(1)"></div>
                <div class="gl-play-btn portfolio-video-overlay">
                    <div class="portfolio-play-button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#BFA15A">
                            <path d="M8 5.14v14l11-7-11-7z" />
                        </svg>
                    </div>
                </div>
                <span class="gl-vid-label portfolio-video-label">{{ $galleryVideos[1]['label'] }}</span>
            </div>

            <div class="gl-vid-item portfolio-video-card" id="glvid-3" data-video-index="2">
                <video src="{{ $galleryVideos[2]['src'] }}" preload="metadata" playsinline loop muted></video>
                <div class="gl-vid-click" onclick="glOpenVideoLb(2)"></div>
                <div class="gl-play-btn portfolio-video-overlay">
                    <div class="portfolio-play-button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#BFA15A">
                            <path d="M8 5.14v14l11-7-11-7z" />
                        </svg>
                    </div>
                </div>
                <span class="gl-vid-label portfolio-video-label">{{ $galleryVideos[2]['label'] }}</span>
            </div>

        </div>
    </div>

    {{-- ════════════════════════════════ --}}
    {{--  SECTION 02 · PHOTOGRAPHY        --}}
    {{-- ════════════════════════════════ --}}
    <div class="gl-section-divider">
        <div class="gl-section-divider-line"></div>
        <div class="gl-section-tag">
            <span class="gl-section-tag-dot"></span>
            02 &nbsp;·&nbsp; Photography
            <span class="gl-section-tag-dot"></span>
        </div>
        <div class="gl-section-divider-line"></div>
    </div>

    <div class="gl-photo-wrap portfolio-shell">
        <div class="portfolio-section-head">
            <p class="portfolio-section-kicker">Photography Archive</p>
            <h2 class="portfolio-section-title">Luxury <em>Story Collections</em></h2>
            <p class="portfolio-section-copy">Wedding, Graduation, Pre-Wedding, dan Family kini berada dalam satu bahasa
                visual yang lebih rapi dan berkelas.</p>
        </div>

        {{-- Filter Tabs --}}
        <div class="gl-filter-row">
            <button class="gl-filter-btn active" onclick="glFilter('all', this)">All Categories</button>
            <button class="gl-filter-btn" onclick="glFilter('wedding', this)">Wedding</button>
            <button class="gl-filter-btn" onclick="glFilter('wisuda', this)">Graduation</button>
            <button class="gl-filter-btn" onclick="glFilter('prewed', this)">Pre-Wedding</button>
            <button class="gl-filter-btn" onclick="glFilter('family', this)">Family</button>
        </div>

        {{-- "All" view: Category tiles linking to portfolio-detail --}}
        <div class="gl-cat-grid" id="gl-cat-view">
            @php
                $categories = [
                    'wedding' => 'Wedding',
                    'prewed' => 'Pre-Wedding',
                    'wisuda' => 'Graduation',
                    'family' => 'Family',
                ];
                $catCover = [];
                foreach ($photos as $p) {
                    if (!isset($catCover[$p->kategori])) {
                        $catCover[$p->kategori] = $p->image_url;
                    }
                }
            @endphp

            @foreach ($categories as $catKey => $catLabel)
                <a href="/portfolio/{{ $catKey }}" class="gl-cat-card">
                    @if (isset($catCover[$catKey]))
                        <img src="{{ $catCover[$catKey] }}" alt="{{ $catLabel }}">
                    @else
                        <div style="width:100%;height:100%;background:#111;"></div>
                    @endif
                    <div class="gl-cat-card-body">
                        <span class="gl-cat-card-label">Collection</span>
                        <span class="gl-cat-card-title">{{ $catLabel }}</span>
                        <div class="gl-cat-card-arrow">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="white"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Per-category masonry view (shown when filter is not "all") --}}
        <div class="gl-masonry" id="gl-masonry-view" style="display:none;">
            @foreach ($photos as $p)
                <div class="gl-photo-item" data-category="{{ $p->kategori }}"
                    onclick="glOpenLb('{{ $p->image_url }}', {{ $loop->index }})">
                    <img src="{{ $p->image_url }}" alt="{{ $p->kategori }}" loading="lazy">
                    <div class="gl-photo-overlay">
                        <div class="gl-photo-cat">{{ $p->kategori }}</div>
                        <div class="gl-photo-title">{{ $p->judul ?? 'Ethereal Moment' }}</div>
                    </div>
                </div>
            @endforeach

            @if ($photos->isEmpty())
                <p class="gl-empty">Belum ada foto tersedia.</p>
            @endif
        </div>

    </div>

    {{-- ── LIGHTBOX ── --}}
    <div id="gl-lightbox">
        <button class="gl-lb-close" onclick="glCloseLb()">✕</button>
        <button class="gl-lb-nav" id="gl-lb-prev" onclick="glLbNav(-1)">‹</button>
        <img id="gl-lb-img" src="" alt="">
        <button class="gl-lb-nav" id="gl-lb-next" onclick="glLbNav(1)">›</button>
        <div class="gl-lb-counter" id="gl-lb-counter"></div>
    </div>

    <div id="gl-video-lightbox" class="portfolio-video-lightbox">
        <div class="portfolio-video-stage">
            <button class="portfolio-video-modal-close" type="button" onclick="glCloseVideoLb()"
                aria-label="Close video viewer">✕</button>
            <button class="portfolio-video-modal-nav portfolio-video-modal-prev" type="button"
                onclick="glVideoNav(-1)" aria-label="Previous video">‹</button>
            <div class="portfolio-video-frame">
                <div id="gl-video-overlay" class="portfolio-video-cinematic-overlay">
                    <div class="portfolio-video-title-wrap">
                        <span class="portfolio-video-kicker">LuxeLens Cinema</span>
                        <h3 id="gl-video-title" class="portfolio-video-title">Portfolio Film</h3>
                    </div>
                    <div class="portfolio-video-actions">
                        <button id="gl-video-fullscreen" class="portfolio-video-fullscreen" type="button"
                            aria-label="Toggle native fullscreen" onclick="glToggleVideoFullscreen()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M8 3H5a2 2 0 0 0-2 2v3" />
                                <path d="M16 3h3a2 2 0 0 1 2 2v3" />
                                <path d="M8 21H5a2 2 0 0 1-2-2v-3" />
                                <path d="M16 21h3a2 2 0 0 0 2-2v-3" />
                            </svg>
                            <span class="portfolio-video-fullscreen-label">Fullscreen</span>
                        </button>
                    </div>
                </div>
                <video id="gl-video-player" class="portfolio-video-player" controls playsinline
                    preload="auto"></video>
            </div>
            <button class="portfolio-video-modal-nav portfolio-video-modal-next" type="button"
                onclick="glVideoNav(1)" aria-label="Next video">›</button>
            <div class="portfolio-video-caption">
                <strong id="gl-video-caption">Portfolio Film</strong>
                <span class="portfolio-video-counter" id="gl-video-counter">01 / 03</span>
            </div>
        </div>
    </div>

    <script>
        /* ── VIDEO LIGHTBOX ── */
        const glVideoItems = @json($galleryVideos);
        const glVideoLightbox = document.getElementById('gl-video-lightbox');
        const glVideoPlayer = document.getElementById('gl-video-player');
        const glVideoCaption = document.getElementById('gl-video-caption');
        const glVideoCounter = document.getElementById('gl-video-counter');
        const glVideoTitle = document.getElementById('gl-video-title');
        const glVideoOverlay = document.getElementById('gl-video-overlay');
        const glVideoFrame = glVideoPlayer?.closest('.portfolio-video-frame');
        let glVideoCurrent = 0;
        let glVideoOverlayTimer = null;

        function glShowVideoOverlay(autoHide = true) {
            if (!glVideoOverlay) return;
            glVideoOverlay.classList.remove('is-hidden');
            if (glVideoOverlayTimer) clearTimeout(glVideoOverlayTimer);
            if (autoHide) {
                glVideoOverlayTimer = setTimeout(() => {
                    glVideoOverlay.classList.add('is-hidden');
                }, 3000);
            }
        }

        function glGetFullscreenElement() {
            return document.fullscreenElement || document.webkitFullscreenElement || document.msFullscreenElement;
        }

        function glRequestFullscreen(element) {
            if (element.requestFullscreen) return element.requestFullscreen();
            if (element.webkitRequestFullscreen) return element.webkitRequestFullscreen();
            if (element.msRequestFullscreen) return element.msRequestFullscreen();
        }

        function glExitFullscreen() {
            if (document.exitFullscreen) return document.exitFullscreen();
            if (document.webkitExitFullscreen) return document.webkitExitFullscreen();
            if (document.msExitFullscreen) return document.msExitFullscreen();
        }

        function glToggleVideoFullscreen() {
            if (!glVideoFrame) return;
            if (glGetFullscreenElement()) {
                glExitFullscreen();
                return;
            }
            glRequestFullscreen(glVideoFrame);
        }

        function glSyncVideoCardState() {
            document.querySelectorAll('.portfolio-video-card').forEach((card, index) => {
                card.classList.toggle('playing', index === glVideoCurrent && glVideoLightbox.classList.contains(
                    'open'));
            });
        }

        function glRenderVideoLb() {
            const current = glVideoItems[glVideoCurrent];
            if (!current) return;

            glVideoPlayer.classList.add('is-switching');
            glVideoPlayer.src = current.src;
            glVideoPlayer.load();
            glVideoPlayer.currentTime = 0;
            const playAttempt = glVideoPlayer.play();
            if (playAttempt && typeof playAttempt.catch === 'function') {
                playAttempt.catch(() => {
                    glVideoPlayer.muted = true;
                    glVideoPlayer.play().catch(() => {});
                });
            }

            glVideoCaption.textContent = current.label;
            glVideoTitle.textContent = current.label;
            glVideoCounter.textContent = String(glVideoCurrent + 1).padStart(2, '0') + ' / ' + String(glVideoItems.length)
                .padStart(2, '0');
            glSyncVideoCardState();
            glShowVideoOverlay(true);
        }

        function glOpenVideoLb(index) {
            glVideoCurrent = index;
            glVideoLightbox.classList.add('open');
            document.body.style.overflow = 'hidden';
            glRenderVideoLb();
        }

        function glCloseVideoLb() {
            if (glVideoOverlayTimer) clearTimeout(glVideoOverlayTimer);
            glVideoPlayer.pause();
            glVideoPlayer.removeAttribute('src');
            glVideoPlayer.load();
            glVideoLightbox.classList.remove('open');
            document.body.style.overflow = '';
            document.querySelectorAll('.portfolio-video-card').forEach(card => card.classList.remove('playing'));
        }

        function glVideoNav(dir) {
            glVideoCurrent = (glVideoCurrent + dir + glVideoItems.length) % glVideoItems.length;
            glRenderVideoLb();
        }

        glVideoLightbox?.addEventListener('click', event => {
            if (event.target === glVideoLightbox) glCloseVideoLb();
        });

        glVideoPlayer?.addEventListener('playing', () => {
            glVideoPlayer.classList.remove('is-switching');
            glShowVideoOverlay(true);
        });
        glVideoPlayer?.addEventListener('pause', () => glShowVideoOverlay(false));
        glVideoPlayer?.addEventListener('mousemove', () => glShowVideoOverlay(!glVideoPlayer.paused));
        glVideoPlayer?.addEventListener('click', () => glShowVideoOverlay(!glVideoPlayer.paused));
        glVideoPlayer?.addEventListener('dblclick', () => glToggleVideoFullscreen());
        glVideoFrame?.addEventListener('mousemove', () => glShowVideoOverlay(!glVideoPlayer.paused));

        ['fullscreenchange', 'webkitfullscreenchange', 'msfullscreenchange'].forEach(eventName => {
            document.addEventListener(eventName, () => glShowVideoOverlay(!glVideoPlayer.paused));
        });

        /* ── FILTER ── */
        let glCurrentFilter = 'all';

        function glFilter(cat, btn) {
            glCurrentFilter = cat;

            document.querySelectorAll('.gl-filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const catView = document.getElementById('gl-cat-view');
            const masonryView = document.getElementById('gl-masonry-view');

            if (cat === 'all') {
                catView.style.display = 'grid';
                masonryView.style.display = 'none';
                return;
            }

            catView.style.display = 'none';
            masonryView.style.display = 'block';

            document.querySelectorAll('.gl-photo-item').forEach(item => {
                item.classList.toggle('gl-hidden', item.dataset.category !== cat);
            });

            // Rebuild lightbox index for visible photos
            rebuildLbIndex();
        }

        /* ── LIGHTBOX ── */
        let glPhotos = [];
        let glVisPhotos = [];
        let glCurrent = 0;

        // All photos source list
        const glAllPhotos = [
            @foreach ($photos as $p)
                {
                    src: "{{ $p->image_url }}",
                    cat: "{{ $p->kategori }}"
                },
            @endforeach
        ];

        function rebuildLbIndex() {
            glVisPhotos = glAllPhotos.filter(p => glCurrentFilter === 'all' || p.cat === glCurrentFilter);
        }

        rebuildLbIndex();

        function glOpenLb(src, rawIdx) {
            rebuildLbIndex();
            glCurrent = glVisPhotos.findIndex(p => p.src === src);
            if (glCurrent < 0) glCurrent = 0;
            document.getElementById('gl-lb-img').src = glVisPhotos[glCurrent].src;
            document.getElementById('gl-lightbox').classList.add('open');
            glLbCounter();
            document.body.style.overflow = 'hidden';
        }

        function glCloseLb() {
            document.getElementById('gl-lightbox').classList.remove('open');
            document.body.style.overflow = '';
        }

        function glLbNav(dir) {
            rebuildLbIndex();
            glCurrent = (glCurrent + dir + glVisPhotos.length) % glVisPhotos.length;
            const img = document.getElementById('gl-lb-img');
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = glVisPhotos[glCurrent].src;
                img.style.opacity = '1';
                glLbCounter();
            }, 180);
        }

        function glLbCounter() {
            document.getElementById('gl-lb-counter').textContent =
                String(glCurrent + 1).padStart(2, '0') + ' / ' + String(glVisPhotos.length).padStart(2, '0');
        }

        document.getElementById('gl-lightbox').addEventListener('click', e => {
            if (e.target.id === 'gl-lightbox') glCloseLb();
        });

        document.addEventListener('keydown', e => {
            if (glVideoLightbox.classList.contains('open')) {
                if (e.key === 'Escape') glCloseVideoLb();
                if (e.key === 'ArrowLeft') glVideoNav(-1);
                if (e.key === 'ArrowRight') glVideoNav(1);
                return;
            }

            if (!document.getElementById('gl-lightbox').classList.contains('open')) return;
            if (e.key === 'Escape') glCloseLb();
            if (e.key === 'ArrowLeft') glLbNav(-1);
            if (e.key === 'ArrowRight') glLbNav(1);
        });
    </script>

</body>

</html>

<style>
    body {
        background: #050505;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    /* Header & Nav */
    header {
        padding: 30px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        width: 100%;
        box-sizing: border-box;
        z-index: 100;
        background: rgba(5, 5, 5, 0.8);
        backdrop-filter: blur(10px);
    }

    .logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        letter-spacing: 5px;
        color: #fff;
        text-decoration: none;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        margin-left: 30px;
        font-size: 12px;
        letter-spacing: 2px;
        opacity: 0.6;
        transition: 0.3s;
    }

    nav a:hover {
        opacity: 1;
        color: gold;
    }

    /* Gallery Section */
    .gallery-section {
        padding: 150px 50px 50px;
        text-align: center;
    }

    .gallery-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .gallery-subtitle {
        color: #666;
        font-size: 14px;
        margin-bottom: 50px;
    }

    /* Filter Buttons */
    .filter-container {
        margin-bottom: 40px;
    }

    .filter-btn {
        background: none;
        border: none;
        color: #555;
        cursor: pointer;
        font-size: 12px;
        letter-spacing: 2px;
        padding: 10px 20px;
        transition: 0.3s;
        text-transform: uppercase;
    }

    .filter-btn.active {
        color: gold;
        border-bottom: 1px solid gold;
    }

    .filter-btn:hover {
        color: #fff;
    }

    /* Grid Layout */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        height: 450px;
        background: #0a0a0a;
        transition: 0.5s;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
        opacity: 0.8;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
        opacity: 1;
    }

    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 40px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
        text-align: left;
        opacity: 0;
        transition: 0.5s;
    }

    .gallery-item:hover .overlay {
        opacity: 1;
    }

    .overlay h3 {
        font-family: 'Playfair Display', serif;
        margin: 0;
        font-size: 1.5rem;
        color: gold;
    }

    .overlay p {
        font-size: 10px;
        letter-spacing: 3px;
        color: #ccc;
        margin-top: 5px;
        text-transform: uppercase;
    }

    /* Animasi Filter */
    .hidden {
        display: none;
    }
</style>
</head>

<body>

    <header>
        <a href="/" class="logo">LUXELENS</a>
        <nav>
            <a href="/">HOME</a>
            <a href="/gallery">GALLERY</a>
            <a href="/admin/dashboard">ADMIN</a>
        </nav>
    </header>

    <section class="gallery-section">
        <h1 class="gallery-title">The Gallery</h1>
        <p class="gallery-subtitle">Pilih kategori untuk menjelajahi cerita kami.</p>

        <div class="filter-container">
            <button class="filter-btn active" onclick="filterGallery('all')">All</button>
            <button class="filter-btn" onclick="filterGallery('wedding')">Wedding</button>
            <button class="filter-btn" onclick="filterGallery('wisuda')">Graduation</button>
            <button class="filter-btn" onclick="filterGallery('prewed')">Pre-Wedding</button>
            <button class="filter-btn" onclick="filterGallery('family')">Family</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            @foreach ($photos as $p)
                <div class="gallery-item" data-category="{{ $p->kategori }}">
                    <img src="{{ $p->image_url }}" alt="Gallery LUXELENS">
                    <div class="overlay">
                        <p>{{ $p->kategori }}</p>
                        <h3>{{ $p->judul ?? 'Ethereal Moments' }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function filterGallery(category) {
            // Update tombol aktif
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Filter foto
            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }
    </script>

</body>

</html>
