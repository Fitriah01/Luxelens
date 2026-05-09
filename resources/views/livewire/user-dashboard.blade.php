<div style="min-height:100vh;background:#050505;padding:0;">
    {{-- AMBIENT BG GLOW --}}
    <div
        style="position:fixed;top:-200px;left:-200px;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(225,197,100,.03) 0%,transparent 65%);pointer-events:none;z-index:0;">
    </div>
    <div
        style="position:fixed;bottom:-200px;right:-200px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(124,124,255,.025) 0%,transparent 65%);pointer-events:none;z-index:0;">
    </div>

    {{-- NAV --}}
    <nav
        style="position:sticky;top:0;z-index:100;background:rgba(5,5,5,.95);backdrop-filter:blur(24px) saturate(160%);border-bottom:1px solid rgba(255,255,255,.05);padding:12px 32px;display:flex;justify-content:space-between;align-items:center;">
        <div style="display:flex;align-items:center;gap:12px;">
            <div
                style="width:34px;height:34px;background:linear-gradient(135deg,#E1C564,#BFA15A);border-radius:10px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 16px rgba(225,197,100,.25);">
                <span style="font-size:15px;font-weight:900;color:#050505;font-family:'Playfair Display',serif;">P</span>
            </div>
            <div>
                <div style="font-size:12px;font-weight:800;color:#fff;letter-spacing:.06em;">LUXELENS</div>
                <div style="font-size:9px;color:#444;letter-spacing:.2em;text-transform:uppercase;">Studio Client Portal
                </div>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:8px;">
            <div
                style="display:flex;align-items:center;gap:9px;padding:6px 12px;border-radius:24px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);">
                <div
                    style="width:26px;height:26px;border-radius:50%;background:linear-gradient(135deg,#E1C564,#BFA15A);display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900;color:#050505;flex-shrink:0;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <span
                    style="font-size:11px;color:#999;max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $user->name }}</span>
            </div>
            <a href="/track"
                style="padding:7px 13px;border-radius:9px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);color:#666;font-size:10px;font-weight:700;letter-spacing:.08em;text-decoration:none;transition:all .2s;"
                onmouseover="this.style.color='#ccc';this.style.borderColor='rgba(255,255,255,.15)'"
                onmouseout="this.style.color='#666';this.style.borderColor='rgba(255,255,255,.07)'">TRACK</a>
            <a href="/"
                style="padding:7px 13px;border-radius:9px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.07);color:#666;font-size:10px;font-weight:700;letter-spacing:.08em;text-decoration:none;transition:all .2s;"
                onmouseover="this.style.color='#ccc';this.style.borderColor='rgba(255,255,255,.15)'"
                onmouseout="this.style.color='#666';this.style.borderColor='rgba(255,255,255,.07)'">← BERANDA</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('ud-logout').submit();"
                style="padding:7px 13px;border-radius:9px;border:1px solid rgba(255,68,68,.15);color:#555;font-size:10px;font-weight:700;letter-spacing:.08em;text-decoration:none;transition:all .2s;"
                onmouseover="this.style.color='#ff5555';this.style.borderColor='rgba(255,68,68,.4)'"
                onmouseout="this.style.color='#555';this.style.borderColor='rgba(255,68,68,.15)'">LOGOUT</a>
            <form id="ud-logout" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <div style="max-width:1320px;margin:0 auto;padding:40px 32px;position:relative;z-index:1;">

        {{-- WELCOME CARD --}}
        @php
            $hour = now()->hour;
            $greeting =
                $hour < 12
                    ? 'Selamat Pagi'
                    : ($hour < 17
                        ? 'Selamat Siang'
                        : ($hour < 20
                            ? 'Selamat Sore'
                            : 'Selamat Malam'));
            $greetIcon = $hour < 12 ? '🌅' : ($hour < 17 ? '☀️' : ($hour < 20 ? '🌆' : '🌙'));
            $firstName = explode(' ', $user->name)[0];
        @endphp
        <div class="u-card u-in"
            style="padding:32px 36px;margin-bottom:28px;position:relative;overflow:hidden;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px;">
            <div
                style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,rgba(225,197,100,.5),transparent);">
            </div>
            <div
                style="position:absolute;top:-60px;right:-60px;width:260px;height:260px;border-radius:50%;background:radial-gradient(circle,rgba(225,197,100,.05) 0%,transparent 68%);pointer-events:none;">
            </div>
            <div>
                <div
                    style="font-size:11px;color:#444;letter-spacing:.2em;text-transform:uppercase;margin-bottom:10px;display:flex;align-items:center;gap:6px;">
                    <span>{{ $greetIcon }}</span><span>{{ $greeting }}</span>
                </div>
                <h1
                    style="margin:0 0 8px;font-family:'Playfair Display',serif;font-size:32px;font-weight:700;color:#fff;letter-spacing:.01em;line-height:1.2;">
                    Halo, Kak <span
                        style="background:linear-gradient(135deg,#E1C564,#BFA15A);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ $firstName }}!</span>
                </h1>
                <p style="margin:0;font-size:12px;color:#444;letter-spacing:.04em;">Selamat datang kembali di <span
                        style="color:#888;">LUXELENS STUDIO</span> &nbsp;·&nbsp;
                    {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
            </div>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="/track"
                    style="display:flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);color:#777;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .25s;"
                    onmouseover="this.style.background='rgba(255,255,255,.08)';this.style.color='#ccc'"
                    onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.color='#777'">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    TRACK BOOKING
                </a>
                <a href="/testimonial"
                    style="display:flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;background:rgba(225,197,100,.07);border:1px solid rgba(225,197,100,.2);color:#E1C564;font-size:10px;font-weight:700;letter-spacing:.1em;text-decoration:none;transition:all .25s;"
                    onmouseover="this.style.background='rgba(225,197,100,.14)'"
                    onmouseout="this.style.background='rgba(225,197,100,.07)'">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg>
                    BERI ULASAN
                </a>
            </div>
        </div>

        {{-- 3 MAIN WIDGETS --}}
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-bottom:28px;">

            {{-- Widget 1: Sesi Mendatang --}}
            @if ($upcoming)
                <div class="u-card u-card-gold u-in" style="padding:24px;position:relative;overflow:hidden;"
                    x-data="{
                        total: {{ $countdownSeconds ?? 0 }},
                        d: 0,
                        h: 0,
                        m: 0,
                        s: 0,
                        init() {
                            const tick = () => {
                                if (this.total <= 0) {
                                    this.d = 0;
                                    this.h = 0;
                                    this.m = 0;
                                    this.s = 0;
                                    return;
                                }
                                this.d = Math.floor(this.total / 86400);
                                this.h = Math.floor((this.total % 86400) / 3600);
                                this.m = Math.floor((this.total % 3600) / 60);
                                this.s = this.total % 60;
                                this.total--;
                            };
                            tick();
                            setInterval(tick, 1000);
                        }
                    }">
                    <div
                        style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;border-radius:50%;background:radial-gradient(circle,rgba(225,197,100,.08) 0%,transparent 70%);">
                    </div>
                    <div
                        style="font-size:9px;color:#554;letter-spacing:.18em;text-transform:uppercase;margin-bottom:12px;display:flex;align-items:center;gap:6px;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span style="color:#666;">Sesi Mendatang</span>
                    </div>
                    <div style="font-size:14px;font-weight:700;color:#fff;margin-bottom:4px;">
                        {{ \Carbon\Carbon::parse($upcoming->tanggal_pemotretan)->isoFormat('D MMM Y') }}</div>
                    <div style="font-size:10px;color:#555;margin-bottom:16px;">{{ ucfirst($upcoming->kategori) }} ·
                        {{ $upcoming->paket ?? 'Standard' }}</div>
                    <div style="display:flex;gap:8px;">
                        @foreach ([['d', 'H'], ['h', 'J'], ['m', 'M'], ['s', 'D']] as [$k, $l])
                            <div
                                style="flex:1;background:rgba(0,0,0,.5);border:1px solid rgba(225,197,100,.12);border-radius:10px;padding:8px 4px;text-align:center;">
                                <div style="font-size:20px;font-weight:900;color:#E1C564;font-variant-numeric:tabular-nums;line-height:1;"
                                    x-text="String({{ $k }}).padStart(2,'0')">00</div>
                                <div style="font-size:8px;color:#444;margin-top:3px;letter-spacing:.1em;">
                                    {{ $l }}</div>
                            </div>
                        @endforeach
                    </div>
                    @if ($upcoming->photographer_name)
                        <div
                            style="margin-top:14px;padding:10px 12px;background:rgba(0,0,0,.3);border-radius:10px;display:flex;align-items:center;gap:8px;">
                            <div
                                style="width:24px;height:24px;border-radius:50%;background:rgba(225,197,100,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                                    stroke-width="2">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M6 20v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </div>
                            <span style="font-size:11px;color:#888;">{{ $upcoming->photographer_name }}</span>
                        </div>
                    @endif
                </div>
            @else
                <div class="u-card u-in"
                    style="padding:24px;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;min-height:180px;">
                    <div
                        style="width:48px;height:48px;border-radius:14px;background:rgba(225,197,100,.07);border:1px solid rgba(225,197,100,.15);display:flex;align-items:center;justify-content:center;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                            stroke-width="1.5">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:13px;font-weight:600;color:#666;margin-bottom:4px;">Belum ada sesi
                            mendatang</div>
                        <div style="font-size:10px;color:#333;">Jadwalkan sesi foto Anda</div>
                    </div>
                    <a href="/booking/wedding"
                        style="font-size:9px;color:#E1C564;text-decoration:none;letter-spacing:.12em;font-weight:700;padding:7px 16px;border:1px solid rgba(225,197,100,.2);border-radius:8px;transition:all .2s;"
                        onmouseover="this.style.background='rgba(225,197,100,.08)'"
                        onmouseout="this.style.background='transparent'">PESAN SEKARANG</a>
                </div>
            @endif

            {{-- Widget 2: Total Booking --}}
            <div class="u-card u-in" style="padding:24px;position:relative;overflow:hidden;">
                <div
                    style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;border-radius:50%;background:radial-gradient(circle,rgba(124,124,255,.06) 0%,transparent 70%);">
                </div>
                <div
                    style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:16px;display:flex;align-items:center;gap:6px;">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#7c7cff"
                        stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <span>Total Booking</span>
                </div>
                <div
                    style="font-size:46px;font-weight:900;color:#fff;line-height:1;margin-bottom:10px;letter-spacing:-.03em;">
                    {{ $bookings->count() }}</div>
                <div style="display:flex;flex-direction:column;gap:6px;">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:6px;height:6px;border-radius:50%;background:#2ecc71;flex-shrink:0;"></div>
                        <span
                            style="font-size:10px;color:#888;">{{ $bookings->whereIn('status', ['Editing', 'Selesai', 'Lunas'])->count() }}
                            Selesai</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <div style="width:6px;height:6px;border-radius:50%;background:#f39c12;flex-shrink:0;"></div>
                        <span
                            style="font-size:10px;color:#888;">{{ $bookings->whereIn('status', ['Pending', 'Confirmed'])->count() }}
                            Menunggu</span>
                    </div>
                </div>
                <div
                    style="margin-top:14px;height:2px;border-radius:2px;background:linear-gradient(90deg,#7c7cff,rgba(124,124,255,.1));">
                </div>
                @if ($totalSpent > 0)
                    <div style="margin-top:10px;font-size:10px;color:#444;">Total: <span
                            style="color:#E1C564;font-weight:700;">Rp
                            {{ number_format($totalSpent, 0, ',', '.') }}</span></div>
                @endif
            </div>

            {{-- Widget 3: Ulasan Saya --}}
            <div class="u-card u-in" style="padding:24px;position:relative;overflow:hidden;">
                <div
                    style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;border-radius:50%;background:radial-gradient(circle,rgba(46,204,113,.04) 0%,transparent 70%);">
                </div>
                <div
                    style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:16px;display:flex;align-items:center;gap:6px;">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#2ecc71"
                        stroke-width="2">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg>
                    <span>Ulasan Saya</span>
                </div>
                @if ($myReview)
                    <div style="display:flex;gap:3px;margin-bottom:10px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg width="16" height="16" viewBox="0 0 24 24"
                                fill="{{ $i <= ($myReview->rating ?? 5) ? '#E1C564' : 'none' }}" stroke="#E1C564"
                                stroke-width="1.5">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        @endfor
                    </div>
                    <p style="margin:0 0 12px;font-size:11px;color:#888;line-height:1.6;font-style:italic;">
                        "{{ Str::limit($myReview->pesan, 90) }}"</p>
                    @php
                        $sColor = $myReview->status === 'approved' ? '#2ecc71' : '#f39c12';
                        $sBg = $myReview->status === 'approved' ? 'rgba(46,204,113,.1)' : 'rgba(243,156,18,.1)';
                    @endphp
                    <div style="display:flex;align-items:center;gap:8px;">
                        <span
                            style="padding:3px 10px;border-radius:20px;background:{{ $sBg }};color:{{ $sColor }};font-size:9px;font-weight:700;letter-spacing:.1em;">{{ strtoupper($myReview->status ?? 'PENDING') }}</span>
                        <span style="font-size:9px;color:#333;">{{ $myReview->created_at->diffForHumans() }}</span>
                    </div>
                @else
                    <div style="text-align:center;padding:20px 0;">
                        <div style="font-size:24px;margin-bottom:8px;">⭐</div>
                        <div style="font-size:11px;color:#444;margin-bottom:14px;">Belum ada ulasan ditulis</div>
                        <a href="/testimonial"
                            style="font-size:9px;color:#E1C564;text-decoration:none;font-weight:700;letter-spacing:.12em;padding:7px 16px;border:1px solid rgba(225,197,100,.2);border-radius:8px;transition:all .2s;"
                            onmouseover="this.style.background='rgba(225,197,100,.08)'"
                            onmouseout="this.style.background='transparent'">TULIS ULASAN</a>
                    </div>
                @endif
            </div>

        </div>{{-- /3 widgets --}}

        {{-- MAIN GRID --}}
        <div style="display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start;">

            {{-- LEFT COLUMN --}}
            <div style="display:flex;flex-direction:column;gap:24px;">

                {{-- 5-STEP BOOKING TIMELINE --}}
                @if ($latest)
                    @php
                        $tlSteps = [
                            [
                                'icon' => '📋',
                                'label' => 'Booking Diterima',
                                'sub' => 'Pemesanan masuk & menunggu konfirmasi admin',
                            ],
                            [
                                'icon' => '✅',
                                'label' => 'Booking Dikonfirmasi',
                                'sub' => 'Admin telah mengkonfirmasi booking Anda',
                            ],
                            [
                                'icon' => '💳',
                                'label' => 'Pembayaran Terverifikasi',
                                'sub' => 'Bukti transfer diterima & diverifikasi studio',
                            ],
                            [
                                'icon' => '📸',
                                'label' => 'Sesi Pemotretan',
                                'sub' => 'Hari pemotretan berlangsung bersama fotografer',
                            ],
                            [
                                'icon' => '✨',
                                'label' => 'Foto Siap Diunduh',
                                'sub' => 'Hasil editing selesai & link unduhan tersedia',
                            ],
                        ];
                        $tlCurrent =
                            [
                                'Pending' => 0,
                                'Pending Verification' => 1,
                                'Confirmed' => 1,
                                'Lunas' => 2,
                                'Editing' => 3,
                                'Selesai' => 4,
                                'Completed' => 4,
                            ][$latest->status] ?? 0;
                        if (in_array($latest->status, ['Editing', 'Lunas'], true) && $latest->link_results) {
                            $tlCurrent = 4;
                        } elseif (in_array($latest->status, ['Completed', 'Selesai'])) {
                            $tlCurrent = 4;
                        }
                    @endphp
                    <div class="u-card u-in" style="padding:28px 32px;">
                        <div
                            style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;flex-wrap:wrap;gap:10px;">
                            <div>
                                <div
                                    style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:4px;">
                                    Timeline Pemotretan</div>
                                <div style="font-size:15px;font-weight:700;color:#fff;">
                                    {{ ucfirst($latest->kategori) }}
                                    @if ($latest->booking_code)
                                        <span style="color:#2a2a2a;font-weight:400;font-size:12px;"> ·
                                            #{{ $latest->booking_code }}</span>
                                    @endif
                                </div>
                            </div>
                            @php $bc2=['Pending'=>['#f39c12','rgba(243,156,18,.1)'],'Confirmed'=>['#7c7cff','rgba(124,124,255,.1)'],'Lunas'=>['#E1C564','rgba(225,197,100,.1)'],'Cancelled'=>['#ff4444','rgba(255,68,68,.08)']][$latest->status] ?? ['#666','rgba(255,255,255,.06)']; @endphp
                            <span
                                style="padding:5px 14px;border-radius:20px;background:{{ $bc2[1] }};border:1px solid {{ $bc2[0] }}55;color:{{ $bc2[0] }};font-size:9px;font-weight:800;letter-spacing:.1em;">{{ strtoupper($latest->status) }}</span>
                        </div>
                        <div style="display:flex;flex-direction:column;">
                            @foreach ($tlSteps as $ti => $ts)
                                @php
                                    $tDone = $ti <= $tlCurrent;
                                    $tActive = $ti === $tlCurrent;
                                    $tLast = $ti === count($tlSteps) - 1;
                                @endphp
                                <div style="display:flex;gap:18px;">
                                    <div style="display:flex;flex-direction:column;align-items:center;flex-shrink:0;">
                                        <div
                                            style="width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:14px;transition:all .4s;
                                    background:{{ $tActive ? 'linear-gradient(135deg,#E1C564,#BFA15A)' : ($tDone ? 'rgba(225,197,100,.15)' : 'rgba(255,255,255,.04)') }};
                                    border:2px solid {{ $tDone ? 'rgba(225,197,100,.35)' : 'rgba(255,255,255,.06)' }};
                                    box-shadow:{{ $tActive ? '0 0 22px rgba(225,197,100,.35)' : 'none' }};">
                                            @if ($tDone && !$tActive)
                                                <svg width="15" height="15" viewBox="0 0 24 24"
                                                    fill="none" stroke="#E1C564" stroke-width="2.5">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                            @else
                                                <span
                                                    style="{{ $tActive ? '' : 'opacity:.3;filter:grayscale(1);' }}">{{ $ts['icon'] }}</span>
                                            @endif
                                        </div>
                                        @if (!$tLast)
                                            <div
                                                style="width:2px;height:26px;margin:4px 0;background:{{ $tDone && !$tActive ? 'rgba(225,197,100,.25)' : 'rgba(255,255,255,.05)' }};border-radius:2px;">
                                            </div>
                                        @endif
                                    </div>
                                    <div style="padding:8px 0 {{ $tLast ? '0' : '18px' }};">
                                        <div
                                            style="font-size:13px;font-weight:{{ $tActive ? '700' : '500' }};color:{{ $tDone ? '#fff' : '#2a2a2a' }};margin-bottom:4px;display:flex;align-items:center;gap:8px;">
                                            {{ $ts['label'] }}
                                            @if ($tActive)
                                                <span
                                                    style="padding:2px 8px;background:rgba(225,197,100,.1);border:1px solid rgba(225,197,100,.2);border-radius:10px;font-size:8px;color:#E1C564;font-weight:700;letter-spacing:.1em;">SEKARANG</span>
                                            @endif
                                        </div>
                                        <div style="font-size:10px;color:#333;line-height:1.5;">{{ $ts['sub'] }}
                                        </div>
                                        @if ($tActive && $ti === 4 && $latest->link_results)
                                            <a href="{{ $latest->link_results }}" target="_blank"
                                                style="display:inline-flex;align-items:center;gap:6px;margin-top:10px;padding:8px 16px;border-radius:9px;background:rgba(225,197,100,.1);border:1px solid rgba(225,197,100,.25);color:#E1C564;font-size:10px;font-weight:700;text-decoration:none;letter-spacing:.08em;transition:all .2s;"
                                                onmouseover="this.style.background='rgba(225,197,100,.2)'"
                                                onmouseout="this.style.background='rgba(225,197,100,.1)'">
                                                <svg width="12" height="12" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                    <polyline points="7 10 12 15 17 10" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="3" />
                                                </svg>
                                                UNDUH FOTO
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- BOOKING HISTORY --}}
                <div class="u-card u-in" style="padding:28px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;">
                        <div>
                            <div
                                style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:4px;">
                                Riwayat Booking</div>
                            <div style="font-size:13px;font-weight:700;color:#fff;">Semua Pesanan
                                ({{ $bookings->count() }})</div>
                        </div>
                        <a href="/track"
                            style="font-size:9px;color:#555;text-decoration:none;letter-spacing:.12em;font-weight:700;padding:6px 12px;border:1px solid rgba(255,255,255,.07);border-radius:8px;transition:all .2s;"
                            onmouseover="this.style.color='#E1C564';this.style.borderColor='rgba(225,197,100,.3)'"
                            onmouseout="this.style.color='#555';this.style.borderColor='rgba(255,255,255,.07)'">TRACK
                            →</a>
                    </div>
                    @forelse($bookings->take(6) as $b)
                        @php
                            $sc2 = [
                                'Pending' => ['#f39c12', 'rgba(243,156,18,.1)'],
                                'Confirmed' => ['#7c7cff', 'rgba(124,124,255,.1)'],
                                'Lunas' => ['#E1C564', 'rgba(225,197,100,.1)'],
                                'Cancelled' => ['#ff4444', 'rgba(255,68,68,.08)'],
                            ][$b->status] ?? ['#666', 'rgba(255,255,255,.06)'];
                            $cc2 =
                                [
                                    'wedding' => '#E1C564',
                                    'wisuda' => '#7c7cff',
                                    'prewed' => '#2ecc71',
                                    'family' => '#f39c12',
                                    'portrait' => '#e74c3c',
                                ][$b->kategori] ?? '#888';
                        @endphp
                        <div style="display:flex;align-items:center;gap:14px;padding:11px 8px;border-radius:12px;transition:background .2s;"
                            onmouseover="this.style.background='rgba(255,255,255,.03)'"
                            onmouseout="this.style.background='transparent'">
                            <div
                                style="width:42px;height:42px;border-radius:14px;background:{{ $cc2 }}18;border:1px solid {{ $cc2 }}30;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:800;color:{{ $cc2 }};">
                                {{ strtoupper(substr($b->kategori, 0, 2)) }}</div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:12px;font-weight:600;color:#fff;">{{ ucfirst($b->kategori) }}
                                    @if ($b->paket)
                                        <span style="color:#333;font-weight:400;"> · {{ $b->paket }}</span>
                                    @endif
                                </div>
                                <div style="font-size:10px;color:#444;margin-top:2px;">
                                    {{ \Carbon\Carbon::parse($b->tanggal_pemotretan)->isoFormat('D MMM Y') }}
                                    @if ($b->booking_code)
                                        &nbsp;·&nbsp; #{{ $b->booking_code }}
                                    @endif
                                </div>
                            </div>
                            <div style="text-align:right;flex-shrink:0;">
                                <div style="font-size:12px;font-weight:700;color:#fff;">Rp
                                    {{ number_format($b->harga, 0, ',', '.') }}</div>
                                <span
                                    style="display:inline-block;margin-top:4px;padding:2px 9px;border-radius:12px;background:{{ $sc2[1] }};color:{{ $sc2[0] }};font-size:8px;font-weight:800;letter-spacing:.08em;">{{ strtoupper($b->status) }}</span>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <div style="height:1px;background:rgba(255,255,255,.04);margin:0 4px;"></div>
                        @endif
                    @empty
                        <div style="padding:40px;text-align:center;color:#333;font-size:12px;">Belum ada riwayat
                            booking.</div>
                    @endforelse
                    @if ($bookings->count() > 6)
                        <div style="text-align:center;padding-top:14px;">
                            <span
                                style="font-size:10px;color:#333;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);padding:6px 16px;border-radius:20px;">+
                                {{ $bookings->count() - 6 }} booking lainnya</span>
                        </div>
                    @endif
                </div>

            </div>{{-- /left column --}}

            {{-- RIGHT COLUMN --}}
            <div style="display:flex;flex-direction:column;gap:20px;">

                {{-- UPLOAD BUKTI PEMBAYARAN --}}
                @if ($upcoming && $upcoming->status === 'Confirmed' && !$upcoming->proof_payment)
                    <div class="u-in"
                        style="background:rgba(243,156,18,.06);backdrop-filter:blur(20px);border:1px solid rgba(243,156,18,.22);border-radius:20px;padding:24px;">
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px;">
                            <div
                                style="width:28px;height:28px;border-radius:8px;background:rgba(243,156,18,.15);display:flex;align-items:center;justify-content:center;">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                    stroke="#f39c12" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </div>
                            <div style="font-size:10px;font-weight:800;color:#f39c12;letter-spacing:.1em;">ACTION
                                REQUIRED</div>
                        </div>
                        <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:5px;">Upload Bukti
                            Pembayaran</div>
                        <div style="font-size:10px;color:#666;margin-bottom:16px;line-height:1.6;">Booking
                            dikonfirmasi. Segera upload bukti transfer untuk melanjutkan proses.</div>
                        <form action="{{ route('user.upload.proof', $upcoming->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="proof" accept="image/*" required
                                style="font-size:11px;margin-bottom:10px;width:100%;">
                            <button type="submit"
                                style="width:100%;padding:11px;background:linear-gradient(135deg,#f39c12,#e67e22);border:none;color:#000;font-size:10px;font-weight:800;letter-spacing:.14em;cursor:pointer;border-radius:10px;"
                                onmouseover="this.style.opacity='.9'" onmouseout="this.style.opacity='1'">↑ UPLOAD
                                BUKTI</button>
                        </form>
                    </div>
                @endif

                {{-- LAYANAN section: moved to full-width section below main grid --}}
                <style>
                    /* ── Tab Bar ───────────────────────────── */
                    .svc-tabs {
                        display: flex;
                        gap: 8px;
                        padding: 5px;
                        background: rgba(255, 255, 255, .03);
                        border: 1px solid rgba(255, 255, 255, .06);
                        border-radius: 14px;
                        margin-bottom: 20px;
                    }

                    .svc-tab {
                        flex: 1;
                        padding: 9px 10px;
                        border-radius: 10px;
                        border: none;
                        background: transparent;
                        cursor: pointer;
                        font-size: 9px;
                        font-weight: 800;
                        letter-spacing: .15em;
                        text-transform: uppercase;
                        color: #444;
                        transition: all .22s;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 6px;
                    }

                    .svc-tab.active {
                        background: linear-gradient(135deg, rgba(225, 197, 100, .18), rgba(225, 197, 100, .08));
                        border: 1px solid rgba(225, 197, 100, .32);
                        color: #E1C564;
                        box-shadow: 0 0 16px rgba(225, 197, 100, .10);
                    }

                    /* ── Package cards ─────────────────────── */
                    .pkg-card {
                        position: relative;
                        border-radius: 18px;
                        padding: 20px 18px 18px;
                        border: 1px solid rgba(255, 255, 255, .07);
                        background: rgba(255, 255, 255, .03);
                        transition: border-color .28s, box-shadow .28s, transform .28s;
                        overflow: hidden;
                        margin-bottom: 10px;
                        cursor: default;
                    }

                    .pkg-card:hover {
                        border-color: rgba(225, 197, 100, .35);
                        box-shadow: 0 0 0 1px rgba(225, 197, 100, .08), 0 10px 40px rgba(225, 197, 100, .10);
                        transform: translateY(-2px);
                    }

                    .pkg-card.pkg-popular {
                        border-color: rgba(225, 197, 100, .30);
                        background: rgba(225, 197, 100, .05);
                    }

                    .pkg-card::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 10%;
                        right: 10%;
                        height: 1px;
                        background: linear-gradient(90deg, transparent, rgba(225, 197, 100, .45), transparent);
                        opacity: 0;
                        transition: opacity .28s;
                    }

                    .pkg-card.pkg-popular::before,
                    .pkg-card:hover::before {
                        opacity: 1;
                    }

                    .pkg-popular-badge {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        padding: 3px 9px;
                        border-radius: 20px;
                        background: linear-gradient(135deg, #D4AF37, #E1C564);
                        color: #050505;
                        font-size: 7px;
                        font-weight: 900;
                        letter-spacing: .15em;
                    }

                    .pkg-price {
                        font-family: 'Playfair Display', serif;
                        font-size: 20px;
                        font-weight: 700;
                        background: linear-gradient(135deg, #E1C564, #BFA15A);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        line-height: 1;
                        margin: 6px 0 2px;
                    }

                    .pkg-dp-hint {
                        font-size: 9px;
                        color: #555;
                        margin-bottom: 12px;
                        letter-spacing: .03em;
                    }

                    .pkg-dp-hint .dp-val {
                        color: rgba(225, 197, 100, .70);
                    }

                    .pkg-facility {
                        display: flex;
                        align-items: center;
                        gap: 7px;
                        font-size: 10px;
                        color: #666;
                        margin-bottom: 4px;
                    }

                    .pkg-chk {
                        width: 13px;
                        height: 13px;
                        border-radius: 50%;
                        background: rgba(225, 197, 100, .10);
                        border: 1px solid rgba(225, 197, 100, .28);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-shrink: 0;
                    }

                    /* ── Event cards ───────────────────────── */
                    .evt-card {
                        position: relative;
                        border-radius: 16px;
                        padding: 18px 16px;
                        border: 1px solid rgba(255, 255, 255, .06);
                        background: rgba(255, 255, 255, .025);
                        transition: border-color .28s, box-shadow .28s, transform .28s;
                        overflow: hidden;
                        margin-bottom: 10px;
                        cursor: default;
                    }

                    .evt-card:hover {
                        transform: translateY(-2px);
                    }

                    /* ── Shared CTA btn ─────────────────────── */
                    .pkg-btn {
                        width: 100%;
                        margin-top: 14px;
                        padding: 10px;
                        border-radius: 10px;
                        font-size: 9px;
                        font-weight: 900;
                        letter-spacing: .18em;
                        cursor: pointer;
                        transition: all .22s;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 6px;
                        text-decoration: none;
                    }

                    .pkg-btn-gold {
                        background: linear-gradient(135deg, #D4AF37, #E1C564);
                        border: none;
                        color: #050505;
                        box-shadow: 0 4px 18px rgba(225, 197, 100, .18);
                    }

                    .pkg-btn-gold:hover {
                        box-shadow: 0 6px 28px rgba(225, 197, 100, .35);
                        transform: translateY(-1px);
                    }

                    .pkg-btn-outline {
                        background: rgba(255, 255, 255, .03);
                        border: 1px solid rgba(255, 255, 255, .12);
                        color: #666;
                    }

                    .pkg-btn-outline:hover {
                        border-color: rgba(225, 197, 100, .35);
                        color: #E1C564;
                    }

                    .pkg-btn-disabled {
                        background: rgba(255, 255, 255, .03);
                        border: 1px solid rgba(255, 255, 255, .06);
                        color: #2a2a2a;
                        cursor: not-allowed;
                    }

                    /* ── Divider ─────────────────────────────── */
                    .pkg-divider {
                        height: 1px;
                        background: rgba(255, 255, 255, .05);
                        margin: 11px 0;
                    }
                </style>

                <div class="u-card u-in" style="padding:22px 20px 20px;" x-data="{ tab: 'paket' }">

                    {{-- Header --}}
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                        <div>
                            <div
                                style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:3px;">
                                Pilih Jenis Sesi</div>
                            <div style="font-size:12px;color:#666;">Paket tetap atau event custom sesuai kebutuhan
                            </div>
                        </div>
                        <div
                            style="width:30px;height:30px;border-radius:9px;background:rgba(225,197,100,.07);border:1px solid rgba(225,197,100,.16);display:flex;align-items:center;justify-content:center;">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#E1C564"
                                stroke-width="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M6 20v-2a6 6 0 0 1 12 0v2" />
                            </svg>
                        </div>
                    </div>

                    {{-- Tab Nav --}}
                    <div class="svc-tabs">
                        <button class="svc-tab" :class="tab === 'paket' ? 'active' : ''" @click="tab = 'paket'">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.2">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <line x1="8" y1="21" x2="16" y2="21" />
                                <line x1="12" y1="17" x2="12" y2="21" />
                            </svg>
                            Paket Hemat
                        </button>
                        <button class="svc-tab" :class="tab === 'event' ? 'active' : ''" @click="tab = 'event'">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Event & Custom
                        </button>
                    </div>

                    {{-- Active booking banner (shown in both tabs) --}}
                    @if ($hasActiveBooking)
                        <div
                            style="display:flex;align-items:flex-start;gap:10px;padding:11px 13px;border-radius:12px;background:rgba(243,156,18,.05);border:1px solid rgba(243,156,18,.18);margin-bottom:14px;">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#f39c12"
                                stroke-width="2.5" style="flex-shrink:0;margin-top:1px;">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            <div>
                                <span style="font-size:10px;font-weight:700;color:#f39c12;">Sesi Aktif
                                    Terdeteksi</span>
                                <span style="font-size:10px;color:#555;"> — Selesaikan sesi aktif Anda terlebih
                                    dahulu.</span>
                            </div>
                        </div>
                    @endif

                    {{-- ═══ TAB: PAKET HEMAT ═══ --}}
                    <div x-show="tab === 'paket'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        @forelse ($packages as $pkg)
                            @php
                                $dp = number_format($pkg->harga * 0.3, 0, ',', '.');
                                $total = number_format($pkg->harga, 0, ',', '.');
                            @endphp
                            <div class="pkg-card {{ $pkg->is_popular ? 'pkg-popular' : '' }}">
                                @if ($pkg->is_popular)
                                    <div class="pkg-popular-badge">✦ TERPOPULER</div>
                                @endif
                                <div
                                    style="font-size:9px;color:#555;letter-spacing:.12em;text-transform:uppercase;margin-bottom:3px;">
                                    {{ strtoupper($pkg->kategori ?? 'Studio') }}</div>
                                <div style="font-size:14px;font-weight:700;color:#fff;">{{ $pkg->nama_paket }}</div>
                                @if ($pkg->deskripsi)
                                    <div style="font-size:10px;color:#555;line-height:1.5;margin:4px 0 8px;">
                                        {{ $pkg->deskripsi }}</div>
                                @endif
                                <div class="pkg-price">Rp {{ $total }}</div>
                                <div class="pkg-dp-hint">
                                    DP <span class="dp-val">Rp {{ $dp }}</span> (30%) &nbsp;·&nbsp; Total
                                    <span class="dp-val">Rp {{ $total }}</span>
                                </div>
                                <div class="pkg-divider"></div>
                                @if ($pkg->fasilitas)
                                    @foreach ($pkg->fasilitas as $fas)
                                        <div class="pkg-facility">
                                            <div class="pkg-chk">
                                                <svg width="7" height="7" viewBox="0 0 24 24"
                                                    fill="none" stroke="#E1C564" stroke-width="3.5">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                            </div>
                                            <span>{{ $fas }}</span>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($hasActiveBooking)
                                    <div class="pkg-btn pkg-btn-disabled">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <rect x="3" y="11" width="18" height="11" rx="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                        SESI AKTIF
                                    </div>
                                @else
                                    <a href="/booking/{{ $pkg->slug }}" class="pkg-btn pkg-btn-gold">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        PESAN PAKET
                                    </a>
                                @endif
                            </div>
                        @empty
                            <div style="padding:28px;text-align:center;color:#333;font-size:11px;">Paket belum
                                tersedia.</div>
                        @endforelse
                    </div>

                    {{-- ═══ TAB: EVENT & CUSTOM ═══ --}}
                    <div x-show="tab === 'event'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" style="display:none;">

                        {{-- Info callout --}}
                        <div
                            style="display:flex;gap:10px;padding:11px 13px;border-radius:12px;background:rgba(124,124,255,.05);border:1px solid rgba(124,124,255,.15);margin-bottom:14px;">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#7c7cff"
                                stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            <div style="font-size:10px;color:#666;line-height:1.6;">
                                Harga <strong style="color:#9a9aff;">bersifat fleksibel</strong> — admin akan
                                menghubungi Anda setelah meninjau detail acara. Status booking: <strong
                                    style="color:#9a9aff;">Waiting for Quote</strong>.
                            </div>
                        </div>

                        @foreach ($eventCategories as $evt)
                            @php $ec = $evt['color']; @endphp
                            <div class="evt-card" style="border-color:{{ $ec }}18;"
                                onmouseover="this.style.borderColor='{{ $ec }}40';this.style.boxShadow='0 8px 32px {{ $ec }}12'"
                                onmouseout="this.style.borderColor='{{ $ec }}18';this.style.boxShadow='none'">

                                {{-- Icon + title --}}
                                <div style="display:flex;align-items:flex-start;gap:12px;margin-bottom:10px;">
                                    <div
                                        style="width:36px;height:36px;border-radius:11px;background:{{ $ec }}18;border:1px solid {{ $ec }}30;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        @if ($evt['icon'] === 'camera')
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="{{ $ec }}" stroke-width="2">
                                                <path
                                                    d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                                                <circle cx="12" cy="13" r="4" />
                                            </svg>
                                        @elseif($evt['icon'] === 'briefcase')
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="{{ $ec }}" stroke-width="2">
                                                <rect x="2" y="7" width="20" height="14" rx="2" />
                                                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                            </svg>
                                        @else
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="{{ $ec }}" stroke-width="2">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div style="flex:1;">
                                        <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:3px;">
                                            {{ $evt['nama'] }}</div>
                                        <div style="font-size:10px;color:#555;line-height:1.5;">{{ $evt['desc'] }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Price hint --}}
                                <div
                                    style="display:inline-flex;align-items:center;gap:6px;padding:4px 11px;border-radius:20px;background:{{ $ec }}12;border:1px solid {{ $ec }}25;margin-bottom:11px;">
                                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none"
                                        stroke="{{ $ec }}" stroke-width="2.5">
                                        <line x1="12" y1="1" x2="12" y2="23" />
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                    </svg>
                                    <span
                                        style="font-size:9px;font-weight:700;color:{{ $ec }};letter-spacing:.06em;">{{ $evt['harga_hint'] }}</span>
                                </div>

                                {{-- Divider --}}
                                <div class="pkg-divider"></div>

                                {{-- Facilities --}}
                                @foreach ($evt['fasilitas'] as $ef)
                                    <div class="pkg-facility">
                                        <div
                                            style="width:13px;height:13px;border-radius:50%;background:{{ $ec }}15;border:1px solid {{ $ec }}30;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <svg width="7" height="7" viewBox="0 0 24 24" fill="none"
                                                stroke="{{ $ec }}" stroke-width="3.5">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </div>
                                        <span>{{ $ef }}</span>
                                    </div>
                                @endforeach

                                {{-- Payment note for event --}}
                                <div
                                    style="margin-top:10px;padding:8px 11px;border-radius:9px;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.05);">
                                    <span style="font-size:9px;color:#444;font-style:italic;">
                                        💡 Menunggu Review Admin — harga ditentukan setelah konfirmasi
                                    </span>
                                </div>

                                {{-- CTA --}}
                                @if ($hasActiveBooking)
                                    <div class="pkg-btn pkg-btn-disabled">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <rect x="3" y="11" width="18" height="11" rx="2" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                        SESI AKTIF
                                    </div>
                                @else
                                    <a href="/booking/{{ $evt['slug'] }}" class="pkg-btn pkg-btn-outline">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                            <polyline points="22,6 12,13 2,6" />
                                        </svg>
                                        AJUKAN PENAWARAN
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>{{-- /x-data tabs --}}

                {{-- HASIL FOTO --}}
                @if ($completed->isNotEmpty())
                    <div class="u-card u-in" style="padding:22px;">
                        <div
                            style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;margin-bottom:14px;">
                            Hasil Foto Anda</div>
                        @foreach ($completed as $cb)
                            @if ($cb->link_results)
                                <a href="{{ $cb->link_results }}" target="_blank"
                                    style="display:flex;align-items:center;gap:12px;padding:11px 12px;margin-bottom:6px;border-radius:12px;background:rgba(225,197,100,.05);border:1px solid rgba(225,197,100,.12);text-decoration:none;transition:all .25s;"
                                    onmouseover="this.style.background='rgba(225,197,100,.1)';this.style.borderColor='rgba(225,197,100,.28)'"
                                    onmouseout="this.style.background='rgba(225,197,100,.05)';this.style.borderColor='rgba(225,197,100,.12)'">
                                    <div
                                        style="width:32px;height:32px;border-radius:10px;background:rgba(225,197,100,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                            stroke="#E1C564" stroke-width="2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" y1="15" x2="12" y2="3" />
                                        </svg>
                                    </div>
                                    <div style="flex:1;min-width:0;">
                                        <div style="font-size:11px;color:#E1C564;font-weight:600;">
                                            {{ ucfirst($cb->kategori) }}</div>
                                        <div style="font-size:9px;color:#555;margin-top:1px;">
                                            {{ \Carbon\Carbon::parse($cb->tanggal_pemotretan)->isoFormat('D MMM Y') }}
                                        </div>
                                    </div>
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                        stroke="#555" stroke-width="2">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                        <polyline points="15 3 21 3 21 9" />
                                        <line x1="10" y1="14" x2="21" y2="3" />
                                    </svg>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif

                {{-- MINI GALLERY --}}
                @if ($galleries->isNotEmpty())
                    <div class="u-card u-in" style="padding:22px;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
                            <div>
                                <div style="font-size:9px;color:#444;letter-spacing:.18em;text-transform:uppercase;">
                                    Studio Portfolio</div>
                                @if ($topCategory)
                                    <div style="font-size:9px;color:#555;margin-top:2px;">Kategori: <span
                                            style="color:#E1C564;">{{ ucfirst($topCategory) }}</span></div>
                                @endif
                            </div>
                            <a href="/portfolio/{{ $topCategory ?? 'all' }}"
                                style="font-size:9px;color:#555;text-decoration:none;letter-spacing:.1em;font-weight:700;transition:color .2s;"
                                onmouseover="this.style.color='#E1C564'" onmouseout="this.style.color='#555'">LIHAT
                                →</a>
                        </div>
                        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:5px;">
                            @foreach ($galleries as $g)
                                <div style="aspect-ratio:1;border-radius:8px;overflow:hidden;transition:box-shadow .3s;"
                                    onmouseover="this.querySelector('img').style.transform='scale(1.12)';this.style.boxShadow='0 0 12px rgba(225,197,100,.15)'"
                                    onmouseout="this.querySelector('img').style.transform='scale(1)';this.style.boxShadow='none'">
                                    <img src="{{ $g->image_url }}" alt="{{ $g->kategori }}"
                                        style="width:100%;height:100%;object-fit:cover;display:block;transition:transform .45s ease;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>{{-- /right column --}}
        </div>{{-- /main-grid --}}

        {{-- ═══════════════════════════════════════════════════════════════
             PILIH PAKET — Full Width Section (beranda-style)
        ═══════════════════════════════════════════════════════════════ --}}
        <div
            style="margin-top:48px;padding:44px 40px 36px;background:linear-gradient(160deg,#0d0d0d 0%,#080808 100%);border:1px solid rgba(255,255,255,.06);border-radius:24px;position:relative;overflow:hidden;">

            {{-- decorative blur blobs --}}
            <div
                style="position:absolute;top:-60px;right:-60px;width:260px;height:260px;border-radius:50%;background:radial-gradient(circle,rgba(225,197,100,.04) 0%,transparent 70%);pointer-events:none;">
            </div>
            <div
                style="position:absolute;bottom:-80px;left:-40px;width:220px;height:220px;border-radius:50%;background:radial-gradient(circle,rgba(225,197,100,.03) 0%,transparent 70%);pointer-events:none;">
            </div>

            {{-- Header --}}
            <div style="margin-bottom:32px;">
                <div
                    style="font-size:9px;color:rgba(225,197,100,.45);letter-spacing:.45em;text-transform:uppercase;margin-bottom:10px;font-weight:700;">
                    Studio Kami</div>
                <div style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:16px;">
                    <div>
                        <h2
                            style="margin:0 0 6px;font-family:'Playfair Display',serif;font-size:clamp(26px,4vw,42px);font-weight:700;color:#fff;line-height:1.1;letter-spacing:-.02em;">
                            Pilih <span
                                style="background:linear-gradient(135deg,#E1C564 0%,#BFA15A 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Paket</span>
                            Terbaik Anda
                        </h2>
                        <p style="margin:0;font-size:12px;color:#3a3a3a;line-height:1.5;">Harga transparan, fasilitas
                            lengkap. DP 30% untuk konfirmasi jadwal.</p>
                    </div>
                    @if ($hasActiveBooking)
                        <div
                            style="display:flex;align-items:center;gap:8px;padding:9px 16px;border-radius:40px;background:rgba(243,156,18,.05);border:1px solid rgba(243,156,18,.18);flex-shrink:0;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#f39c12"
                                stroke-width="2.5">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            <span style="font-size:10px;color:#f39c12;font-weight:700;letter-spacing:.04em;">Sesi aktif
                                — selesaikan booking sebelumnya dahulu</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Package cards grid --}}
            <div
                style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px;margin-bottom:28px;">
                @forelse ($packages as $pkg)
                    @php
                        $dp = number_format($pkg->harga * 0.3, 0, ',', '.');
                        $total = number_format($pkg->harga, 0, ',', '.');
                    @endphp
                    <div class="pkg-card {{ $pkg->is_popular ? 'pkg-popular' : '' }}" style="margin-bottom:0;">
                        @if ($pkg->is_popular)
                            <div class="pkg-popular-badge">✦ TERPOPULER</div>
                        @endif
                        <div
                            style="font-size:9px;color:#3a3a3a;letter-spacing:.18em;text-transform:uppercase;margin-bottom:4px;font-weight:700;">
                            {{ strtoupper($pkg->kategori ?? 'Studio') }}
                        </div>
                        <div
                            style="font-size:18px;font-weight:700;color:#fff;margin-bottom:4px;letter-spacing:-.01em;">
                            {{ $pkg->nama_paket }}</div>
                        @if ($pkg->deskripsi)
                            <div style="font-size:11px;color:#3a3a3a;line-height:1.55;margin:0 0 12px;">
                                {{ $pkg->deskripsi }}</div>
                        @endif
                        <div class="pkg-price">Rp {{ $total }}</div>
                        <div class="pkg-dp-hint">
                            DP <span class="dp-val">Rp {{ $dp }}</span> (30%) &nbsp;·&nbsp; Total <span
                                class="dp-val">Rp {{ $total }}</span>
                        </div>
                        <div class="pkg-divider"></div>
                        @if ($pkg->fasilitas)
                            @foreach ($pkg->fasilitas as $fas)
                                <div class="pkg-facility">
                                    <div class="pkg-chk">
                                        <svg width="7" height="7" viewBox="0 0 24 24" fill="none"
                                            stroke="#E1C564" stroke-width="3.5">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </div>
                                    <span>{{ $fas }}</span>
                                </div>
                            @endforeach
                        @endif
                        @if ($hasActiveBooking)
                            <div class="pkg-btn pkg-btn-disabled" style="margin-top:20px;">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5">
                                    <rect x="3" y="11" width="18" height="11" rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                                SESI AKTIF
                            </div>
                        @else
                            <a href="/booking/{{ $pkg->slug }}" class="pkg-btn pkg-btn-gold"
                                style="margin-top:20px;">
                                › PESAN SEKARANG
                            </a>
                        @endif
                    </div>
                @empty
                    <div style="padding:40px;text-align:center;color:#333;font-size:11px;grid-column:1/-1;">Paket belum
                        tersedia.</div>
                @endforelse
            </div>

            {{-- Event / Custom footer hint --}}
            <div
                style="display:flex;align-items:center;gap:10px;padding:14px 18px;border-radius:12px;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.05);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="rgba(225,197,100,.4)"
                    stroke-width="2" style="flex-shrink:0;">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span style="font-size:11px;color:#3a3a3a;line-height:1.5;">
                    Butuh sesi <strong style="color:rgba(225,197,100,.6);">Event atau Custom</strong>?
                    Harga fleksibel —
                    @foreach ($eventCategories as $ei => $evt)
                        <a href="/booking/{{ $evt['slug'] }}"
                            style="color:rgba(225,197,100,.7);text-decoration:none;font-weight:600;transition:color .2s;"
                            onmouseover="this.style.color='#E1C564'"
                            onmouseout="this.style.color='rgba(225,197,100,.7)'">{{ $evt['nama'] }}</a>
                        @if (!$loop->last)
                            <span style="color:#222;"> · </span>
                        @endif
                    @endforeach
                </span>
            </div>

        </div>{{-- /paket section --}}

    </div>{{-- /container --}}

    {{-- FAB --}}
    <a href="/booking/{{ $topCategory ?? 'wedding' }}" class="u-fab" title="Pesan Sesi Baru">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2.5" stroke-linecap="round">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
    </a>
    <div class="u-fab-label">PESAN SESI BARU</div>

</div>
