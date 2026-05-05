<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Studio Control · LUXELENS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
            height: 100%;
            overflow: hidden;
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

        input,
        select,
        textarea {
            background: #0a0a0a !important;
            border: 1px solid #1e1e1e !important;
            color: #fff !important;
            border-radius: 10px !important;
            transition: border-color .25s !important;
            font-family: 'Inter', sans-serif !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none !important;
            border-color: rgba(225, 197, 100, .45) !important;
            box-shadow: 0 0 0 3px rgba(225, 197, 100, .06) !important;
        }

        input::placeholder {
            color: #333 !important;
        }

        /* ─── Glassmorphism cards ─── */
        .glass-card {
            background: rgba(255, 255, 255, 0.025);
            backdrop-filter: blur(24px) saturate(120%);
            -webkit-backdrop-filter: blur(24px) saturate(120%);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 20px;
        }

        /* ─── Stat card ─── */
        .stat-card {
            background: rgba(255, 255, 255, 0.028);
            backdrop-filter: blur(24px) saturate(120%);
            -webkit-backdrop-filter: blur(24px) saturate(120%);
            border: 1px solid rgba(225, 197, 100, 0.10);
            border-radius: 20px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: transform .35s cubic-bezier(.4, 0, .2, 1), box-shadow .35s, border-color .35s;
            cursor: default;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(225, 197, 100, .5), transparent);
            opacity: 0;
            transition: opacity .35s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(225, 197, 100, .28);
            box-shadow: 0 4px 40px rgba(225, 197, 100, .08), 0 20px 48px rgba(0, 0, 0, .45);
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        /* ─── Entrance animation ─── */
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

        .animate-in {
            opacity: 0;
            animation: fadeSlideUp .55s cubic-bezier(.4, 0, .2, 1) forwards;
        }

        .animate-in:nth-child(1) {
            animation-delay: .04s;
        }

        .animate-in:nth-child(2) {
            animation-delay: .10s;
        }

        .animate-in:nth-child(3) {
            animation-delay: .16s;
        }

        .animate-in:nth-child(4) {
            animation-delay: .22s;
        }

        .animate-in:nth-child(5) {
            animation-delay: .28s;
        }

        .animate-in:nth-child(6) {
            animation-delay: .34s;
        }

        /* ─── Number counter ─── */
        .counter-value {
            font-variant-numeric: tabular-nums;
            font-feature-settings: 'tnum';
        }

        /* ─── Gold glow utilities ─── */
        .glow-gold {
            box-shadow: 0 0 28px rgba(225, 197, 100, .14), 0 0 6px rgba(225, 197, 100, .06);
        }

        .glow-gold-sm {
            box-shadow: 0 0 14px rgba(225, 197, 100, .18);
        }

        /* ─── Notification pulse badge ─── */
        .notif-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            background: linear-gradient(135deg, #E1C564, #BFA15A);
            color: #000;
            font-size: 9px;
            font-weight: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            animation: badgePulse 2.5s ease infinite;
            border: 1px solid #050505;
        }

        @keyframes badgePulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(225, 197, 100, .5);
            }

            50% {
                box-shadow: 0 0 0 6px rgba(225, 197, 100, 0);
            }
        }

        /* ─── Gold shimmer loading bar ─── */
        @keyframes goldSweep {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .loading-bar {
            background: linear-gradient(90deg, transparent 0%, #E1C564 50%, transparent 100%);
            background-size: 200% 100%;
            animation: goldSweep 1.4s ease infinite;
        }

        /* ─── Quick action card ─── */
        .quick-action {
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .1em;
            cursor: pointer;
            border: none;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
            font-family: 'Inter', sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .quick-action-primary {
            background: rgba(225, 197, 100, .1);
            border: 1px solid rgba(225, 197, 100, .25);
            color: #E1C564;
        }

        .quick-action-primary:hover {
            background: rgba(225, 197, 100, .18);
            box-shadow: 0 0 24px rgba(225, 197, 100, .12);
            transform: translateY(-1px);
        }

        .quick-action-muted {
            background: rgba(255, 255, 255, .03);
            border: 1px solid rgba(255, 255, 255, .08);
            color: #777;
        }

        .quick-action-muted:hover {
            background: rgba(255, 255, 255, .07);
            color: #ccc;
            transform: translateY(-1px);
        }

        /* ─── Sidebar nav button ─── */
        .nav-btn {
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
        }

        .nav-btn-active {
            background: rgba(225, 197, 100, .1) !important;
            border: 1px solid rgba(225, 197, 100, .22) !important;
            color: #E1C564 !important;
            box-shadow: 0 0 18px rgba(225, 197, 100, .07);
        }

        /* ─── Section fade-in on tab switch ─── */
        @keyframes tabFadeIn {
            from {
                opacity: 0;
                transform: translateX(8px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .tab-content {
            animation: tabFadeIn .3s ease;
        }

        /* ─── Shared SPA table ─── */
        /* Shared SPA table */
        .spa-table {
            width: 100%;
            border-collapse: collapse;
        }

        .spa-table th {
            padding: 10px 14px;
            font-size: 10px;
            color: #444;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .spa-table td {
            padding: 12px 14px;
            font-size: 12px;
            color: #aaa;
            border-bottom: 1px solid rgba(255, 255, 255, .03);
        }

        .spa-table tr:last-child td {
            border-bottom: none;
        }

        .spa-table tbody tr:hover td {
            background: rgba(255, 255, 255, .015);
        }

        /* Shared buttons */
        .spa-btn {
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            letter-spacing: .08em;
            transition: all .2s;
            font-family: 'Inter', sans-serif;
        }

        .spa-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        /* Shared pagination */
        .spa-pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .04);
            flex-wrap: wrap;
            gap: 10px;
        }

        .spa-pagination .page-info {
            font-size: 11px;
            color: #444;
        }

        .spa-pagination .page-btns {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .spa-pagination .page-btn {
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, .07);
            background: rgba(255, 255, 255, .03);
            color: #555;
            transition: all .2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .spa-pagination .page-btn:hover:not(.active):not(.disabled) {
            border-color: rgba(225, 197, 100, .3);
            color: #E1C564;
            background: rgba(225, 197, 100, .06);
        }

        .spa-pagination .page-btn.active {
            background: rgba(225, 197, 100, .12);
            border-color: rgba(225, 197, 100, .4);
            color: #E1C564;
        }

        .spa-pagination .page-btn.disabled {
            opacity: .3;
            cursor: default;
            pointer-events: none;
        }

        /* Loading shimmer */
        @keyframes shimmer {
            0% {
                transform: translateX(-100%)
            }

            100% {
                transform: translateX(200%)
            }
        }
    </style>
</head>

<body>
    <div id="luxelens-admin-spa-root">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.dashboard');

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2178729766-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script>
        document.addEventListener('livewire:init', function() {
            console.log('Livewire Ready');
        });

        (function() {
            let revenueChart = null;
            let categoryChart = null;
            let initTimer = null;

            function parseJsonAttr(element, attr) {
                try {
                    return JSON.parse(element.getAttribute(attr) || '[]');
                } catch (error) {
                    return [];
                }
            }

            function destroyIfDetached(instance, canvas) {
                if (instance && (!canvas || instance.canvas !== canvas)) {
                    instance.destroy();
                    return null;
                }

                return instance;
            }

            function initAdminCharts() {
                if (!window.Chart) {
                    return;
                }

                const revenueCanvas = document.getElementById('spaRevenueChart');
                const categoryCanvas = document.getElementById('spaCategoryChart');

                revenueChart = destroyIfDetached(revenueChart, revenueCanvas);
                categoryChart = destroyIfDetached(categoryChart, categoryCanvas);

                if (revenueCanvas && !revenueChart) {
                    const revenueLabels = parseJsonAttr(revenueCanvas, 'data-labels');
                    const revenueValues = parseJsonAttr(revenueCanvas, 'data-values');
                    const revenueContext = revenueCanvas.getContext('2d');
                    const gradient = revenueContext.createLinearGradient(0, 0, 0, 240);

                    gradient.addColorStop(0, 'rgba(225,197,100,.32)');
                    gradient.addColorStop(0.55, 'rgba(225,197,100,.07)');
                    gradient.addColorStop(1, 'rgba(225,197,100,0)');

                    revenueChart = new Chart(revenueCanvas, {
                        type: 'line',
                        data: {
                            labels: revenueLabels,
                            datasets: [{
                                label: 'Revenue',
                                data: revenueValues,
                                borderColor: '#E1C564',
                                backgroundColor: gradient,
                                tension: 0.45,
                                fill: true,
                                pointRadius: 5,
                                pointHoverRadius: 8,
                                pointBackgroundColor: '#E1C564',
                                pointBorderColor: '#050505',
                                pointBorderWidth: 2,
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: '#E1C564',
                                borderWidth: 2,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                mode: 'index',
                                intersect: false
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(6,6,6,.96)',
                                    titleColor: '#555',
                                    bodyColor: '#E1C564',
                                    borderColor: 'rgba(225,197,100,.22)',
                                    borderWidth: 1,
                                    padding: 14,
                                    cornerRadius: 12,
                                    displayColors: false,
                                    callbacks: {
                                        title: function(ctx) {
                                            return ctx[0].label;
                                        },
                                        label: function(ctx) {
                                            return '  Rp ' + Intl.NumberFormat('id-ID').format(ctx.raw);
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        color: 'rgba(255,255,255,.03)',
                                        drawBorder: false
                                    },
                                    ticks: {
                                        color: '#444',
                                        font: {
                                            size: 10
                                        }
                                    },
                                    border: {
                                        color: 'rgba(255,255,255,.05)'
                                    }
                                },
                                y: {
                                    grid: {
                                        color: 'rgba(255,255,255,.03)',
                                        drawBorder: false
                                    },
                                    ticks: {
                                        color: '#444',
                                        font: {
                                            size: 10
                                        },
                                        callback: function(value) {
                                            return 'Rp ' + Intl.NumberFormat('id').format(value);
                                        }
                                    },
                                    border: {
                                        color: 'rgba(255,255,255,.05)'
                                    }
                                }
                            }
                        }
                    });
                }

                if (categoryCanvas && !categoryChart) {
                    const categoryLabels = parseJsonAttr(categoryCanvas, 'data-labels');
                    const categoryValues = parseJsonAttr(categoryCanvas, 'data-values');

                    categoryChart = new Chart(categoryCanvas, {
                        type: 'doughnut',
                        data: {
                            labels: categoryLabels,
                            datasets: [{
                                data: categoryValues,
                                backgroundColor: [
                                    'rgba(225,197,100,.85)',
                                    'rgba(124,124,255,.85)',
                                    'rgba(46,204,113,.85)',
                                    'rgba(243,156,18,.85)',
                                    'rgba(231,76,60,.85)'
                                ],
                                borderWidth: 2,
                                borderColor: '#050505',
                                hoverOffset: 10,
                                hoverBorderWidth: 0,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            cutout: '72%',
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: '#555',
                                        font: {
                                            size: 10
                                        },
                                        padding: 16,
                                        boxWidth: 8,
                                        usePointStyle: true,
                                        pointStyleWidth: 8,
                                    }
                                },
                                tooltip: {
                                    backgroundColor: 'rgba(6,6,6,.96)',
                                    titleColor: '#555',
                                    bodyColor: '#fff',
                                    borderColor: 'rgba(255,255,255,.1)',
                                    borderWidth: 1,
                                    padding: 14,
                                    cornerRadius: 12,
                                    displayColors: false,
                                }
                            }
                        }
                    });
                }
            }

            function scheduleAdminChartsInit() {
                clearTimeout(initTimer);
                initTimer = setTimeout(initAdminCharts, 50);
            }

            document.addEventListener('DOMContentLoaded', scheduleAdminChartsInit);
            document.addEventListener('livewire:init', scheduleAdminChartsInit);

            const root = document.getElementById('luxelens-admin-spa-root');
            if (root) {
                new MutationObserver(scheduleAdminChartsInit).observe(root, {
                    childList: true,
                    subtree: true,
                });
            }
        })();
    </script>
</body>

</html>
<?php /**PATH D:\laragon\www\ProjectSIM\resources\views/admin-spa.blade.php ENDPATH**/ ?>