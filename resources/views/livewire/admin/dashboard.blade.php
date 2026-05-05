<div id="luxelens-admin-wrapper" wire:key="{{ $dashboardWrapperKey }}" style="display:flex;height:100vh;overflow:hidden;"
    x-data="{ open: true }">

    {{-- ══════════════ SIDEBAR ══════════════ --}}
    <aside
        style="width:240px;flex-shrink:0;height:100vh;display:flex;flex-direction:column;
        background:rgba(8,8,8,.97);border-right:1px solid rgba(225,197,100,.07);
        backdrop-filter:blur(20px);transition:width .3s;overflow:hidden;position:relative;z-index:100;"
        :style="open ? 'width:240px' : 'width:64px'">

        {{-- Logo --}}
        <div style="padding:24px 20px 20px;border-bottom:1px solid rgba(255,255,255,.04);">
            <div x-show="open" style="display:flex;align-items:center;gap:10px;">
                <div
                    style="width:32px;height:32px;background:#E1C564;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <span
                        style="font-size:14px;font-weight:900;color:#050505;font-family:'Playfair Display',serif;">P</span>
                </div>
                <div>
                    <div style="font-size:13px;font-weight:800;color:#fff;letter-spacing:.05em;">LUXELENS</div>
                    <div style="font-size:9px;color:#444;letter-spacing:.2em;text-transform:uppercase;">Studio Control
                    </div>
                </div>
            </div>
            <div x-show="!open" style="display:flex;justify-content:center;">
                <div
                    style="width:32px;height:32px;background:#E1C564;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <span
                        style="font-size:14px;font-weight:900;color:#050505;font-family:'Playfair Display',serif;">P</span>
                </div>
            </div>
        </div>

        {{-- Toggle btn --}}
        <button @click="open = !open"
            style="position:absolute;top:26px;right:-12px;width:24px;height:24px;border-radius:50%;background:#0f0f0f;border:1px solid rgba(255,255,255,.08);color:#666;font-size:10px;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:10;transition:all .2s;"
            onmouseover="this.style.borderColor='rgba(225,197,100,.4)';this.style.color='#E1C564';"
            onmouseout="this.style.borderColor='rgba(255,255,255,.08)';this.style.color='#666';">
            <span x-text="open ? '‹' : '›'" style="font-size:12px;"></span>
        </button>

        {{-- Navigation --}}
        <nav style="flex:1;padding:16px 0;overflow-y:auto;">
            @php
                $navItems = [
                    [
                        'id' => 'overview',
                        'label' => 'Dashboard',
                        'icon' =>
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
                    ],
                    [
                        'id' => 'bookings',
                        'label' => 'Booking Management',
                        'icon' =>
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
                    ],
                    [
                        'id' => 'team',
                        'label' => 'Team Schedule',
                        'icon' =>
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                    ],
                    [
                        'id' => 'reviews',
                        'label' => 'Customer Reviews',
                        'icon' =>
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
                    ],
                    [
                        'id' => 'gallery',
                        'label' => 'Gallery Upload',
                        'icon' =>
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>',
                    ],
                ];
            @endphp

            @foreach ($navItems as $item)
                <a href="{{ route('admin.dashboard', ['tab' => $item['id']]) }}"
                    class="nav-btn {{ $activeTab === $item['id'] ? 'nav-btn-active' : '' }}"
                    style="width:calc(100% - 20px);margin:2px 10px;display:flex;align-items:center;gap:12px;padding:11px 14px;
                border-radius:10px;background:{{ $activeTab === $item['id'] ? 'rgba(225,197,100,.1)' : 'transparent' }};
                border:1px solid {{ $activeTab === $item['id'] ? 'rgba(225,197,100,.22)' : 'transparent' }};
                color:{{ $activeTab === $item['id'] ? '#E1C564' : '#444' }};cursor:pointer;text-align:left;text-decoration:none;
                white-space:nowrap;overflow:hidden;"
                    onmouseover="if('{{ $activeTab }}' !== '{{ $item['id'] }}') { this.style.background='rgba(255,255,255,.04)'; this.style.color='#888'; this.style.borderColor='rgba(255,255,255,.06)'; }"
                    onmouseout="if('{{ $activeTab }}' !== '{{ $item['id'] }}') { this.style.background='transparent'; this.style.color='#444'; this.style.borderColor='transparent'; }">
                    <span style="flex-shrink:0;">{!! $item['icon'] !!}</span>
                    <span x-show="open"
                        style="font-size:12px;font-weight:{{ $activeTab === $item['id'] ? '700' : '500' }};letter-spacing:.04em;transition:opacity .2s;">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        {{-- Footer --}}
        <div style="padding:16px 20px;border-top:1px solid rgba(255,255,255,.04);">
            <a href="{{ route('laporan.cetak', ['filter' => 'semua']) }}"
                style="display:flex;align-items:center;gap:10px;padding:10px;text-decoration:none;color:#444;transition:color .2s;white-space:nowrap;overflow:hidden;"
                onmouseover="this.style.color='#E1C564'" onmouseout="this.style.color='#444'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9" />
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <rect x="6" y="14" width="12" height="8" />
                </svg>
                <span x-show="open" style="font-size:11px;letter-spacing:.06em;text-transform:uppercase;">Export
                    Report</span>
            </a>
            <a href="{{ route('admin.logout') }}"
                style="display:flex;align-items:center;gap:10px;padding:10px;text-decoration:none;color:#333;transition:color .2s;white-space:nowrap;overflow:hidden;"
                onmouseover="this.style.color='#ff4444'" onmouseout="this.style.color='#333'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                <span x-show="open" style="font-size:11px;letter-spacing:.06em;text-transform:uppercase;">Logout</span>
            </a>
        </div>
    </aside>

    {{-- ══════════════ MAIN CONTENT ══════════════ --}}
    <main style="flex:1;height:100vh;overflow-y:auto;background:#050505;min-width:0;">

        {{-- Global loading bar --}}
        <div wire:loading class="loading-bar" style="position:fixed;top:0;left:0;right:0;height:2px;z-index:9998;">
        </div>

        {{-- Top bar --}}
        <div x-data="{ clock: '', date: '' }" x-init="const fmt = () => {
            const d = new Date();
            clock = d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            date = d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
        };
        fmt();
        setInterval(fmt, 1000);"
            style="position:sticky;top:0;z-index:50;background:rgba(5,5,5,.92);backdrop-filter:blur(20px) saturate(140%);border-bottom:1px solid rgba(255,255,255,.05);padding:14px 32px;display:flex;justify-content:space-between;align-items:center;">

            {{-- Left: title + date --}}
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:2px;">
                    <span
                        style="width:6px;height:6px;border-radius:50%;background:#E1C564;display:inline-block;box-shadow:0 0 8px rgba(225,197,100,.8);"></span>
                    <h1
                        style="margin:0;font-family:'Playfair Display',serif;font-size:19px;color:#fff;font-weight:700;letter-spacing:.04em;">
                        @if ($activeTab === 'overview')
                            Dashboard Overview
                        @elseif($activeTab === 'bookings')
                            Booking Management
                        @elseif($activeTab === 'team')
                            Team Schedule
                        @elseif($activeTab === 'reviews')
                            Customer Reviews
                        @else
                            Gallery & Portfolio
                        @endif
                    </h1>
                </div>
                <p style="margin:0;font-size:10px;color:#333;letter-spacing:.06em;padding-left:16px;" x-text="date">
                </p>
            </div>

            {{-- Right: clock + export buttons + exit --}}
            <div style="display:flex;gap:10px;align-items:center;">
                {{-- Live clock --}}
                <div style="padding:8px 14px;border-radius:10px;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);font-size:12px;font-weight:700;color:#555;letter-spacing:.08em;font-variant-numeric:tabular-nums;"
                    x-text="clock"></div>

                {{-- Pending indicator --}}
                @if ($pendingCount > 0)
                    <div style="position:relative;">
                        <a href="{{ route('admin.dashboard', ['tab' => 'bookings']) }}"
                            style="display:flex;align-items:center;gap:6px;padding:8px 14px;border-radius:10px;background:rgba(243,156,18,.08);border:1px solid rgba(243,156,18,.2);color:#f39c12;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .2s;"
                            onmouseover="this.style.background='rgba(243,156,18,.15)'"
                            onmouseout="this.style.background='rgba(243,156,18,.08)'">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            {{ $pendingCount }} PENDING
                        </a>
                    </div>
                @endif

                <a href="{{ route('laporan.cetak', ['filter' => 'hari']) }}"
                    style="padding:8px 14px;border-radius:10px;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);color:#555;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .2s;"
                    onmouseover="this.style.borderColor='rgba(225,197,100,.3)';this.style.color='#E1C564';"
                    onmouseout="this.style.borderColor='rgba(255,255,255,.06)';this.style.color='#555';">TODAY</a>

                <a href="{{ route('laporan.cetak', ['filter' => 'minggu']) }}"
                    style="padding:8px 14px;border-radius:10px;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);color:#555;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .2s;"
                    onmouseover="this.style.borderColor='rgba(225,197,100,.3)';this.style.color='#E1C564';"
                    onmouseout="this.style.borderColor='rgba(255,255,255,.06)';this.style.color='#555';">WEEKLY</a>

                <a href="/"
                    style="padding:8px 14px;border-radius:10px;background:transparent;border:1px solid rgba(255,68,68,.18);color:#cc4444;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .2s;"
                    onmouseover="this.style.borderColor='rgba(255,68,68,.45)';this.style.background='rgba(255,68,68,.07)';this.style.color='#ff5555';"
                    onmouseout="this.style.borderColor='rgba(255,68,68,.18)';this.style.background='transparent';this.style.color='#cc4444';">←
                    EXIT</a>
            </div>
        </div>

        {{-- Content area --}}
        <div class="tab-content" style="padding:32px;">

            {{-- ══ OVERVIEW TAB ══ --}}
            @if ($activeTab === 'overview')

                {{-- Stat Cards --}}
                <div
                    style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-bottom:32px;">
                    @php
                        $cards = [
                            [
                                'label' => 'Total Revenue',
                                'value' => 'Rp ' . number_format($totalIncome, 0, ',', '.'),
                                'sub' => 'Confirmed payments',
                                'color' => '#E1C564',
                                'icon' =>
                                    '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
                            ],
                            [
                                'label' => 'Total Bookings',
                                'value' => $totalBookings,
                                'sub' => 'All time',
                                'color' => '#7c7cff',
                                'icon' =>
                                    '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
                            ],
                            [
                                'label' => 'Pending Orders',
                                'value' => $pendingCount,
                                'sub' => 'Awaiting action',
                                'color' => '#f39c12',
                                'icon' =>
                                    '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
                            ],
                            [
                                'label' => 'Customer Reviews',
                                'value' => $reviewCount,
                                'sub' => 'Total testimonials',
                                'color' => '#2ecc71',
                                'icon' =>
                                    '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
                            ],
                        ];
                    @endphp
                    @foreach ($cards as $c)
                        <div class="stat-card animate-in">
                            {{-- Colored top stripe --}}
                            <div
                                style="position:absolute;top:0;left:16px;right:16px;height:1px;background:linear-gradient(90deg,transparent,{{ $c['color'] }}66,transparent);">
                            </div>

                            {{-- Icon + label row --}}
                            <div
                                style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:22px;">
                                <div
                                    style="width:46px;height:46px;border-radius:14px;display:flex;align-items:center;justify-content:center;background:{{ $c['color'] }}1a;border:1px solid {{ $c['color'] }}33;color:{{ $c['color'] }};flex-shrink:0;">
                                    {!! $c['icon'] !!}
                                </div>
                                <span
                                    style="font-size:9px;color:#333;letter-spacing:.16em;text-transform:uppercase;text-align:right;line-height:1.5;max-width:80px;">{{ $c['label'] }}</span>
                            </div>

                            {{-- Value (animated by JS counter) --}}
                            <div class="counter-value"
                                style="font-size:27px;font-weight:900;color:#fff;margin-bottom:8px;letter-spacing:-.02em;line-height:1;">
                                {{ $c['value'] }}
                            </div>

                            {{-- Sub label --}}
                            <div style="display:flex;align-items:center;gap:6px;">
                                <span
                                    style="width:6px;height:6px;border-radius:50%;background:{{ $c['color'] }};opacity:.4;"></span>
                                <span style="font-size:10px;color:#333;">{{ $c['sub'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Charts --}}
                <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-bottom:32px;">
                    <div class="glass-card animate-in" style="padding:28px;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
                            <div>
                                <div
                                    style="font-size:10px;color:#444;letter-spacing:.14em;text-transform:uppercase;margin-bottom:4px;">
                                    Revenue Analytics</div>
                                <div style="font-size:20px;font-weight:800;color:#E1C564;">Rp
                                    {{ number_format($totalIncome, 0, ',', '.') }}</div>
                            </div>
                            <span
                                style="padding:5px 12px;border-radius:20px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.2);color:#2ecc71;font-size:9px;font-weight:700;letter-spacing:.1em;">CONFIRMED</span>
                        </div>
                        <div style="height:220px;" wire:ignore>
                            <canvas id="spaRevenueChart" data-labels='@json($grafikBulanan->keys())'
                                data-values='@json($grafikBulanan->values())'></canvas>
                        </div>
                    </div>
                    <div class="glass-card animate-in" style="padding:28px;">
                        <div
                            style="font-size:10px;color:#444;letter-spacing:.14em;text-transform:uppercase;margin-bottom:6px;">
                            Order Distribution</div>
                        <div style="font-size:12px;color:#666;margin-bottom:20px;">By category</div>
                        <div style="height:220px;" wire:ignore>
                            <canvas id="spaCategoryChart" data-labels='@json($grafikKategori->keys())'
                                data-values='@json($grafikKategori->values())'></canvas>
                        </div>
                    </div>
                </div>

                {{-- Quick actions --}}
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <a href="{{ route('admin.dashboard', ['tab' => 'bookings']) }}"
                        class="quick-action quick-action-primary">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        KELOLA BOOKING
                    </a>
                    <a href="{{ route('admin.dashboard', ['tab' => 'reviews']) }}"
                        class="quick-action quick-action-muted">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        MODERASI ULASAN
                    </a>
                    <a href="{{ route('admin.dashboard', ['tab' => 'team']) }}"
                        class="quick-action quick-action-muted">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        TIM FOTOGRAFER
                    </a>
                    <a href="{{ route('laporan.cetak', ['filter' => 'semua']) }}"
                        class="quick-action quick-action-muted">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect x="6" y="14" width="12" height="8" />
                        </svg>
                        CETAK LAPORAN
                    </a>
                </div>

            @endif

            {{-- ══ BOOKINGS TAB ══ --}}
            @if ($activeTab === 'bookings')
                <div
                    style="background:#0a0a0a;border:1px solid rgba(255,255,255,.05);border-radius:16px;padding:28px;">
                    @livewire('admin.booking-table', [], key($bookingTableKey))
                </div>
            @endif

            {{-- ══ TEAM TAB ══ --}}
            @if ($activeTab === 'team')
                <div
                    style="background:#0a0a0a;border:1px solid rgba(255,255,255,.05);border-radius:16px;padding:28px;">

                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
                        <div>
                            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Jadwal Tim
                                Fotografer</div>
                            <div style="font-size:11px;color:#444;">Kelola anggota tim dan jadwal kerja mereka.</div>
                        </div>
                        <button wire:click="openAddPhotographer"
                            style="padding:10px 20px;background:#E1C564;border:none;color:#050505;font-size:11px;font-weight:800;letter-spacing:.1em;cursor:pointer;border-radius:10px;transition:opacity .2s;"
                            onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">+ ADD
                            PHOTOGRAPHER</button>
                    </div>

                    @if (session('photographer_msg'))
                        <div
                            style="margin-bottom:20px;padding:12px 18px;background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.2);border-radius:10px;font-size:12px;color:#2ecc71;">
                            {{ session('photographer_msg') }}
                        </div>
                    @endif

                    <div style="overflow-x:auto;">
                        <table style="width:100%;border-collapse:collapse;font-size:12px;">
                            <thead>
                                <tr style="border-bottom:1px solid rgba(255,255,255,.06);">
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        #</th>
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        NAMA</th>
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        TIM</th>
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        SPESIALISASI</th>
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        HARI KERJA</th>
                                    <th
                                        style="padding:10px 14px;text-align:left;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        KONTAK</th>
                                    <th
                                        style="padding:10px 14px;text-align:center;font-size:10px;color:#444;font-weight:600;letter-spacing:.12em;">
                                        AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($photographers as $idx => $p)
                                    <tr style="border-bottom:1px solid rgba(255,255,255,.03);">
                                        <td style="padding:14px;color:#333;font-weight:700;">{{ $idx + 1 }}</td>
                                        <td style="padding:14px;font-weight:600;color:#fff;">{{ $p->name }}</td>
                                        <td style="padding:14px;color:#E1C564;font-size:11px;">{{ $p->team_name }}
                                        </td>
                                        <td style="padding:14px;color:#666;font-size:11px;">
                                            {{ $p->specialization ?? '—' }}</td>
                                        <td style="padding:14px;">
                                            <div style="display:flex;gap:4px;flex-wrap:wrap;">
                                                @foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'] as $day)
                                                    @php
                                                        $full = [
                                                            'mon' => 'monday',
                                                            'tue' => 'tuesday',
                                                            'wed' => 'wednesday',
                                                            'thu' => 'thursday',
                                                            'fri' => 'friday',
                                                            'sat' => 'saturday',
                                                            'sun' => 'sunday',
                                                        ][$day];
                                                        $active = in_array($full, $p->work_days ?? []);
                                                    @endphp
                                                    <span
                                                        style="padding:3px 6px;border-radius:4px;font-size:9px;font-weight:700;text-transform:uppercase;background:{{ $active ? 'rgba(225,197,100,.15)' : 'rgba(255,255,255,.03)' }};color:{{ $active ? '#E1C564' : '#333' }};border:1px solid {{ $active ? 'rgba(225,197,100,.3)' : 'transparent' }};">{{ strtoupper($day) }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td style="padding:14px;color:#555;font-size:11px;">{{ $p->phone ?? '—' }}
                                        </td>
                                        <td style="padding:14px;text-align:center;">
                                            <div style="display:flex;gap:6px;justify-content:center;">
                                                <button wire:click="editPhotographer({{ $p->id }})"
                                                    style="padding:5px 12px;border-radius:8px;background:rgba(225,197,100,.08);border:1px solid rgba(225,197,100,.2);color:#E1C564;font-size:10px;font-weight:700;cursor:pointer;transition:all .2s;"
                                                    onmouseover="this.style.background='rgba(225,197,100,.2)'"
                                                    onmouseout="this.style.background='rgba(225,197,100,.08)'">EDIT</button>
                                                <button wire:click="deletePhotographer({{ $p->id }})"
                                                    wire:confirm="Hapus fotografer ini?"
                                                    style="padding:5px 12px;border-radius:8px;background:rgba(255,68,68,.08);border:1px solid rgba(255,68,68,.2);color:#ff4444;font-size:10px;font-weight:700;cursor:pointer;transition:all .2s;"
                                                    onmouseover="this.style.background='rgba(255,68,68,.2)'"
                                                    onmouseout="this.style.background='rgba(255,68,68,.08)'">DEL</button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="padding:60px;text-align:center;color:#333;">Belum
                                            ada fotografer.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- ══ REVIEWS TAB ══ --}}
            @if ($activeTab === 'reviews')
                <div
                    style="background:#0a0a0a;border:1px solid rgba(255,255,255,.05);border-radius:16px;padding:28px;">
                    <div style="margin-bottom:20px;">
                        <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Moderasi Ulasan
                            Pelanggan</div>
                        <div style="font-size:11px;color:#444;">Setujui, balas, atau hapus ulasan yang masuk.</div>
                    </div>
                    @livewire('admin.testimonial-table', [], key($testimonialTableKey))
                </div>
            @endif

            {{-- ══ GALLERY TAB ══ --}}
            @if ($activeTab === 'gallery')
                <div
                    style="background:#0a0a0a;border:1px solid rgba(255,255,255,.05);border-radius:16px;padding:28px;">
                    <div style="margin-bottom:24px;">
                        <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;">Gallery & Portfolio
                        </div>
                        <div style="font-size:11px;color:#444;">Upload dan kelola foto portofolio studio.</div>
                    </div>

                    <form action="/admin/upload-gallery" method="POST" enctype="multipart/form-data"
                        style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;margin-bottom:32px;padding:20px;background:#080808;border:1px solid rgba(255,255,255,.04);border-radius:12px;">
                        @csrf
                        <input type="file" name="foto" required accept="image/*"
                            style="flex:1 1 260px;min-width:0;padding:10px 14px;font-size:12px;">
                        <select name="kategori" required style="padding:10px 14px;font-size:12px;min-width:160px;">
                            <option value="wedding">Wedding</option>
                            <option value="wisuda">Graduation</option>
                            <option value="prewed">Pre-Wedding</option>
                            <option value="family">Family</option>
                        </select>
                        <button type="submit"
                            style="padding:10px 24px;background:#E1C564;border:none;color:#050505;font-size:11px;font-weight:800;letter-spacing:.1em;cursor:pointer;border-radius:10px;white-space:nowrap;transition:opacity .2s;"
                            onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">UPLOAD
                            PHOTO</button>
                    </form>

                    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:16px;">
                        @foreach ($galleries as $foto)
                            <div style="position:relative;border-radius:12px;overflow:hidden;aspect-ratio:1;background:#111;group"
                                onmouseover="this.querySelector('.gal-overlay').style.opacity='1';this.querySelector('img').style.transform='scale(1.08) rotate(1deg)';this.querySelector('img').style.filter='brightness(.4)';"
                                onmouseout="this.querySelector('.gal-overlay').style.opacity='0';this.querySelector('img').style.transform='scale(1)';this.querySelector('img').style.filter='brightness(1)';">
                                <img src="{{ asset('storage/portfolio/' . $foto->filename) }}"
                                    alt="{{ $foto->kategori }}"
                                    style="width:100%;height:100%;object-fit:cover;display:block;transition:transform .5s,filter .5s;">
                                <div class="gal-overlay"
                                    style="position:absolute;inset:0;display:flex;flex-direction:column;justify-content:flex-end;align-items:stretch;padding:10px;gap:6px;opacity:0;transition:opacity .3s;">
                                    <form action="/admin/delete-gallery/{{ $foto->id }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            style="width:100%;padding:7px;background:rgba(255,68,68,.85);backdrop-filter:blur(5px);border:none;color:#fff;font-size:9px;font-weight:800;cursor:pointer;border-radius:8px;letter-spacing:.1em;">REMOVE</button>
                                    </form>
                                    <form action="{{ route('admin.update.gallery', $foto->id) }}" method="POST"
                                        enctype="multipart/form-data"
                                        style="display:flex;flex-direction:column;gap:4px;">
                                        @csrf
                                        <input type="file" name="foto" accept="image/*" required
                                            style="font-size:10px;padding:4px;border-radius:6px !important;">
                                        <button type="submit"
                                            style="width:100%;padding:6px;background:rgba(191,161,90,.9);backdrop-filter:blur(5px);border:none;color:#000;font-size:9px;font-weight:800;cursor:pointer;border-radius:6px;letter-spacing:.1em;">UPDATE</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>{{-- /padding --}}
    </main>{{-- /main --}}

    {{-- ══ PHOTOGRAPHER MODAL (Livewire) ══ --}}
    @if ($showPhotographerModal)
        <div x-data x-init="$el.style.display = 'flex'"
            style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.9);backdrop-filter:blur(16px);justify-content:center;align-items:center;">
            <div
                style="background:#0f0f0f;border:1px solid rgba(225,197,100,.2);border-radius:20px;padding:36px;width:460px;max-width:95vw;max-height:90vh;overflow-y:auto;">
                <h3 style="font-family:'Playfair Display',serif;color:#E1C564;margin:0 0 6px;font-size:20px;">
                    {{ $p_edit_id ? 'Edit Fotografer' : 'Tambah Fotografer' }}
                </h3>
                <p style="font-size:11px;color:#555;margin:0 0 24px;">Isi data anggota tim fotografer studio.</p>

                <div style="display:flex;flex-direction:column;gap:12px;">
                    <input wire:model="p_name" type="text" placeholder="Nama Lengkap *"
                        style="padding:11px 14px;font-size:13px;" required>
                    <input wire:model="p_team" type="text" placeholder="Nama Tim *"
                        style="padding:11px 14px;font-size:13px;" required>
                    <input wire:model="p_specialization" type="text" placeholder="Spesialisasi"
                        style="padding:11px 14px;font-size:13px;">
                    <input wire:model="p_phone" type="text" placeholder="No. HP / WA"
                        style="padding:11px 14px;font-size:13px;">

                    <div>
                        <div
                            style="font-size:10px;color:#444;letter-spacing:.12em;text-transform:uppercase;margin-bottom:12px;">
                            Hari Kerja</div>
                        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;">
                            @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                <label
                                    style="display:flex;align-items:center;gap:6px;font-size:12px;color:#666;cursor:pointer;padding:8px 10px;border-radius:8px;border:1px solid rgba(255,255,255,.06);transition:all .2s;"
                                    onmouseover="this.style.borderColor='rgba(225,197,100,.2)'"
                                    onmouseout="this.style.borderColor='rgba(255,255,255,.06)'">
                                    <input type="checkbox" wire:model="p_work_days" value="{{ $day }}"
                                        style="width:14px;height:14px;accent-color:#E1C564;border-radius:4px !important;border:none !important;background:transparent !important;">
                                    <span>{{ \Carbon\Carbon::parse('next ' . $day)->format('D') }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    @error('p_name')
                        <span style="font-size:11px;color:#ff4444;">{{ $message }}</span>
                    @enderror
                    @error('p_team')
                        <span style="font-size:11px;color:#ff4444;">{{ $message }}</span>
                    @enderror

                    <button wire:click="savePhotographer"
                        style="width:100%;padding:13px;background:#E1C564;border:none;color:#050505;font-size:11px;font-weight:800;letter-spacing:.15em;cursor:pointer;border-radius:10px;margin-top:8px;">
                        {{ $p_edit_id ? 'SIMPAN PERUBAHAN' : 'TAMBAH FOTOGRAFER' }}
                    </button>
                    <button wire:click="$set('showPhotographerModal', false)"
                        style="width:100%;padding:10px;background:none;border:none;color:#444;font-size:11px;cursor:pointer;">BATAL</button>
                </div>
            </div>
        </div>
    @endif

</div>{{-- /spa-wrapper --}}
