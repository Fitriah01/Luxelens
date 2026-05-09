        .portfolio-shell {
        width: min(100%, 1240px);
        margin-inline: auto;
        padding-inline: clamp(24px, 4vw, 52px);
        }

        .portfolio-hero {
        min-height: 56vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 148px 24px 92px;
        position: relative;
        }

        .portfolio-hero::after {
        content: '';
        position: absolute;
        inset: auto 50% 18px;
        width: min(560px, 72vw);
        height: 1px;
        transform: translateX(-50%);
        background: linear-gradient(90deg, transparent, rgba(191, 161, 90, .5), transparent);
        opacity: .75;
        }

        .portfolio-eyebrow {
        font-size: 10px;
        letter-spacing: .42em;
        text-transform: uppercase;
        color: rgba(191, 161, 90, .78);
        margin-bottom: 18px;
        }

        .portfolio-title {
        max-width: 860px;
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 7vw, 5.8rem);
        font-weight: 700;
        line-height: .98;
        letter-spacing: -.03em;
        color: #fff;
        text-wrap: balance;
        }

        .portfolio-title em {
        font-style: italic;
        color: var(--gold);
        }

        .portfolio-subtitle {
        max-width: 640px;
        margin: 22px auto 0;
        font-size: 13px;
        line-height: 1.8;
        color: #6c6c6c;
        letter-spacing: .05em;
        }

        .portfolio-section-head {
        max-width: 1040px;
        margin: 0 auto 34px;
        text-align: center;
        }

        .portfolio-section-kicker {
        margin: 0 0 10px;
        font-size: 10px;
        letter-spacing: .38em;
        text-transform: uppercase;
        color: rgba(191, 161, 90, .78);
        }

        .portfolio-section-title {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.9rem, 4vw, 3.1rem);
        line-height: 1.08;
        letter-spacing: -.025em;
        color: #fff;
        }

        .portfolio-section-title em {
        color: var(--gold);
        font-style: italic;
        }

        .portfolio-section-copy {
        max-width: 620px;
        margin: 14px auto 0;
        font-size: 12px;
        line-height: 1.8;
        letter-spacing: .04em;
        color: #666;
        }

        .portfolio-video-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        align-items: start;
        justify-content: center;
        max-width: 1120px;
        margin: 0 auto;
        }

        .portfolio-video-card,
        .portfolio-video-card:first-child,
        .portfolio-video-card:not(:first-child) {
        grid-column: auto !important;
        grid-row: auto !important;
        aspect-ratio: 16 / 9 !important;
        min-width: 0;
        }

        .portfolio-video-card {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        background: #0b0b0b;
        border: 1px solid rgba(191, 161, 90, .12);
        box-shadow: 0 18px 40px rgba(0, 0, 0, .24);
        transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease;
        }

        .portfolio-video-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, .02), transparent 30%, rgba(5, 5, 5, .28));
        pointer-events: none;
        z-index: 1;
        }

        .portfolio-video-card:hover,
        .portfolio-video-card.playing {
        transform: translateY(-4px);
        border-color: rgba(191, 161, 90, .34);
        box-shadow: 0 0 0 1px rgba(191, 161, 90, .08), 0 24px 56px rgba(0, 0, 0, .32), 0 0 28px rgba(191, 161, 90, .08);
        }

        .portfolio-video-card video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        opacity: .84;
        transition: transform .45s ease, opacity .35s ease, filter .35s ease;
        }

        .portfolio-video-card:hover video,
        .portfolio-video-card.playing video {
        opacity: 1;
        transform: scale(1.025);
        filter: saturate(1.02);
        }

        .portfolio-video-overlay {
        position: absolute;
        inset: 0;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(5, 5, 5, .08), rgba(5, 5, 5, .24));
        opacity: 1;
        transition: background .3s ease;
        }

        .portfolio-video-card:hover .portfolio-video-overlay {
        background: linear-gradient(180deg, rgba(5, 5, 5, .05), rgba(5, 5, 5, .18));
        }

        .portfolio-play-button {
        width: 72px;
        height: 72px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(5, 5, 5, .52);
        border: 1px solid rgba(191, 161, 90, .42);
        backdrop-filter: blur(10px);
        box-shadow: 0 0 0 1px rgba(255, 255, 255, .03), 0 0 26px rgba(191, 161, 90, .14);
        transform: scale(1);
        transition: transform .28s ease, background .28s ease, border-color .28s ease;
        }

        .portfolio-video-card:hover .portfolio-play-button {
        transform: scale(1.06);
        background: rgba(191, 161, 90, .16);
        border-color: rgba(191, 161, 90, .6);
        }

        .portfolio-video-card.playing .portfolio-video-overlay {
        opacity: 0;
        }

        .portfolio-video-label {
        position: absolute;
        left: 18px;
        right: 18px;
        bottom: 16px;
        z-index: 3;
        font-size: 10px;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .78);
        pointer-events: none;
        text-shadow: 0 4px 16px rgba(0, 0, 0, .5);
        }

        .portfolio-video-lightbox {
        position: fixed;
        inset: 0;
        z-index: 1200;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 28px;
        background: rgba(0, 0, 0, .92);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        }

        .portfolio-video-lightbox.open {
        display: flex;
        }

        .portfolio-video-stage {
        position: relative;
        width: min(1100px, 92vw);
        }

        .portfolio-video-frame {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid rgba(191, 161, 90, .22);
        background: #050505;
        box-shadow: 0 28px 80px rgba(0, 0, 0, .56), 0 0 40px rgba(191, 161, 90, .08);
        }

        .portfolio-video-player {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: contain;
        background: #000;
        accent-color: var(--gold);
        color-scheme: dark;
        opacity: 1;
        transition: opacity .32s ease;
        }

        .portfolio-video-player.is-switching {
        opacity: .3;
        }

        .portfolio-video-player::-webkit-media-controls-panel {
        background: linear-gradient(180deg, rgba(0, 0, 0, .24), rgba(0, 0, 0, .72));
        }

        .portfolio-video-player::-webkit-media-controls-play-button,
        .portfolio-video-player::-webkit-media-controls-mute-button,
        .portfolio-video-player::-webkit-media-controls-fullscreen-button,
        .portfolio-video-player::-webkit-media-controls-timeline,
        .portfolio-video-player::-webkit-media-controls-current-time-display,
        .portfolio-video-player::-webkit-media-controls-time-remaining-display {
        filter: sepia(1) saturate(1.6) hue-rotate(355deg) brightness(.98);
        }

        .portfolio-video-cinematic-overlay {
        position: absolute;
        inset: 0;
        z-index: 2;
        pointer-events: none;
        opacity: 1;
        transition: opacity .45s ease;
        background:
        linear-gradient(180deg, rgba(0, 0, 0, .58) 0%, rgba(0, 0, 0, .18) 22%, transparent 42%),
        linear-gradient(0deg, rgba(0, 0, 0, .38) 0%, rgba(0, 0, 0, .08) 18%, transparent 34%);
        }

        .portfolio-video-cinematic-overlay.is-hidden {
        opacity: 0;
        }

        .portfolio-video-title-wrap {
        position: absolute;
        top: 24px;
        left: 24px;
        right: 120px;
        max-width: min(520px, 70%);
        }

        .portfolio-video-kicker {
        display: inline-block;
        margin-bottom: 8px;
        font-size: 9px;
        letter-spacing: .34em;
        text-transform: uppercase;
        color: rgba(191, 161, 90, .82);
        }

        .portfolio-video-title {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.3rem, 2vw, 2.15rem);
        font-weight: 400;
        letter-spacing: .01em;
        line-height: 1.15;
        color: rgba(255, 255, 255, .96);
        text-shadow: 0 10px 32px rgba(0, 0, 0, .45);
        }

        .portfolio-video-actions {
        position: absolute;
        right: 18px;
        bottom: 18px;
        z-index: 3;
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .portfolio-video-fullscreen {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 44px;
        height: 44px;
        padding: 0 14px;
        border-radius: 999px;
        border: 1px solid rgba(191, 161, 90, .24);
        background: rgba(8, 8, 8, .7);
        color: rgba(255, 255, 255, .88);
        cursor: pointer;
        pointer-events: auto;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition: transform .22s ease, border-color .22s ease, background .22s ease, color .22s ease;
        }

        .portfolio-video-fullscreen:hover {
        transform: translateY(-1px);
        border-color: rgba(191, 161, 90, .42);
        background: rgba(191, 161, 90, .14);
        color: var(--gold);
        }

        .portfolio-video-fullscreen-label {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        white-space: nowrap;
        }

        .portfolio-video-modal-close,
        .portfolio-video-modal-nav {
        position: absolute;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, .12);
        background: rgba(8, 8, 8, .7);
        color: #fff;
        cursor: pointer;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        transition: transform .22s ease, border-color .22s ease, background .22s ease, color .22s ease;
        }

        .portfolio-video-modal-close:hover,
        .portfolio-video-modal-nav:hover {
        transform: translateY(-1px);
        border-color: rgba(191, 161, 90, .34);
        background: rgba(191, 161, 90, .12);
        color: var(--gold);
        }

        .portfolio-video-modal-close {
        top: -18px;
        right: -18px;
        width: 48px;
        height: 48px;
        z-index: 3;
        }

        .portfolio-video-modal-nav {
        top: 50%;
        transform: translateY(-50%);
        width: 54px;
        height: 54px;
        z-index: 3;
        }

        .portfolio-video-modal-nav:hover {
        transform: translateY(-50%) scale(1.02);
        }

        .portfolio-video-modal-prev {
        left: -72px;
        }

        .portfolio-video-modal-next {
        right: -72px;
        }

        .portfolio-video-caption {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-top: 16px;
        color: rgba(255, 255, 255, .72);
        font-size: 11px;
        letter-spacing: .16em;
        text-transform: uppercase;
        }

        .portfolio-video-caption strong {
        color: #fff;
        font-weight: 600;
        letter-spacing: .12em;
        }

        .portfolio-video-counter {
        color: rgba(191, 161, 90, .9);
        white-space: nowrap;
        }

        @media (max-width: 1100px) {
        .portfolio-video-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .portfolio-video-modal-prev {
        left: 12px;
        }

        .portfolio-video-modal-next {
        right: 12px;
        }
        }

        @media (max-width: 720px) {
        .portfolio-shell {
        padding-inline: 20px;
        }

        .portfolio-hero {
        padding: 132px 20px 80px;
        }

        .portfolio-video-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        }

        .portfolio-play-button {
        width: 64px;
        height: 64px;
        }

        .portfolio-video-lightbox {
        padding: 18px;
        }

        .portfolio-video-title-wrap {
        top: 18px;
        left: 18px;
        right: 92px;
        max-width: calc(100% - 110px);
        }

        .portfolio-video-actions {
        right: 12px;
        bottom: 12px;
        }

        .portfolio-video-fullscreen {
        height: 40px;
        padding: 0 12px;
        }

        .portfolio-video-fullscreen-label {
        display: none;
        }

        .portfolio-video-modal-close {
        top: 12px;
        right: 12px;
        width: 42px;
        height: 42px;
        }

        .portfolio-video-modal-nav {
        width: 44px;
        height: 44px;
        }

        .portfolio-video-caption {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        }
        }
<?php /**PATH D:\laragon\www\ProjectSIM\resources\views/partials/portfolio-shared-styles.blade.php ENDPATH**/ ?>