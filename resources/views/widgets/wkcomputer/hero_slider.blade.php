@php
    $slides = $slides ?? ($config['slides'] ?? []);
    $featuredCategories = $featuredCategories ?? collect();
    $showServices = $config['show_services'] ?? true;
@endphp

{{-- HERO SECTION: 3-column layout --}}
<section style="background:#222;padding:16px 0;">
    <div class="wk-container">
        <style>
            .wk-hero-dark-override { display: grid; grid-template-columns: 240px 1fr; gap: 16px; }
            .wk-cat-dark { border: none !important; background: transparent !important; margin: 0; padding: 0; display:flex; flex-direction:column; }
            .wk-cat-dark-item { 
                color: #e0e0e0 !important; font-size: 13px; padding: 11px 12px; 
                border-bottom: none !important; display:flex; align-items:center; text-decoration:none;
            }
            .wk-cat-dark-item:hover { color: #fff !important; background: rgba(255,255,255,0.08) !important; border-radius: 4px; }
            .wk-cat-dark-item i:first-child { width: 24px; color: #aaa !important; font-size: 14px; text-align:center; }
            .wk-cat-dark-item:hover i:first-child { color: #fff !important; }
            .wk-cat-dark-item span { margin-left: 8px; flex: 1; font-weight: 500; }
            .wk-cat-dark-item .arrow { opacity: 0.3; font-size: 10px; }
            
            .banner-dash-border { border: 2px dashed #80d8ff; border-radius: 8px; padding: 2px; }
            .banner-dash-inner { border-radius: 6px; overflow: hidden; position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; transition: transform 0.3s; }
            .banner-dash-inner:hover { transform: scale(1.02); }
            
            @media (max-width: 1200px) {
                .wk-hero-dark-override { grid-template-columns: 1fr; }
                .wk-hero-cats { display: none !important; }
            }
            @media (max-width: 991px) {
                .wk-hero-top-row { flex-direction: column; height: auto !important; }
                .wk-hero-right-banners { width: 100% !important; flex-direction: row !important; height: 160px; }
            }
            @media (max-width: 767px) {
                .wk-hero-right-banners { flex-direction: column !important; height: auto; }
                .wk-hero-right-banners > div { height: 160px; }
                .wk-hero-bottom-row { flex-wrap: wrap; height: auto !important; }
                .wk-hero-bottom-row > div { flex: 1 1 calc(50% - 12px); height: 160px; }
            }
        </style>
        <div class="wk-hero wk-hero-dark-override">
            
            {{-- LEFT: Category List --}}
            <div class="wk-hero-cats d-none d-xl-flex wk-cat-dark">
                @php
                    $catIcons = [
                        'cpu' => 'fas fa-microchip',
                        'vga' => 'fas fa-tv',
                        'mainboard' => 'fas fa-memory',
                        'ram' => 'fas fa-memory',
                        'o-cung' => 'fas fa-hdd',
                        'ssd' => 'fas fa-hdd',
                        'hdd' => 'fas fa-hdd',
                        'tan-nhiet' => 'fas fa-fan',
                        'cooling' => 'fas fa-fan',
                        'psu' => 'fas fa-plug',
                        'nguon' => 'fas fa-plug',
                        'case' => 'fas fa-columns',
                        'gear' => 'fas fa-gamepad',
                        'phim-chuot' => 'fas fa-gamepad',
                        'man-hinh' => 'fas fa-desktop',
                        'pc' => 'fas fa-server',
                        'luu-tru' => 'fas fa-sd-card',
                        'mang' => 'fas fa-wifi',
                    ];
                @endphp
                @if(isset($featuredCategories) && $featuredCategories->isNotEmpty())
                    @foreach($featuredCategories as $cat)
                        @php
                            $catIcon = 'fas fa-microchip';
                            foreach ($catIcons as $prefix => $icon) {
                                if (str_contains(strtolower($cat->slug ?? ''), $prefix)) {
                                    $catIcon = $icon;
                                    break;
                                }
                            }
                        @endphp
                        <a href="{{ route('shop.index') }}?categories[]={{ $cat->slug }}" class="wk-cat-dark-item">
                            <i class="{{ $catIcon }}"></i>
                            <span>{{ $cat->name }}</span>
                            <i class="fas fa-chevron-right arrow"></i>
                        </a>
                    @endforeach
                @else
                    @foreach([
                        ['fas fa-microchip', 'CPU - Bộ Vi Xử Lý', 'cpu-bo-vi-xu-ly'],
                        ['fas fa-tv', 'VGA - Card Màn Hinh', 'vga-card-man-hinh'],
                        ['fas fa-memory', 'Mainboard - Bo mạch chủ', 'mainboard-bo-mach-chu'],
                        ['fas fa-memory', 'Ram - Bộ Nhớ Trong', 'ram-bo-nho-trong'],
                        ['fas fa-hdd', 'Ổ cứng SSD', 'o-cung-ssd'],
                        ['fas fa-hdd', 'Ổ cứng HDD', 'o-cung-hdd'],
                        ['fas fa-fan', 'Tản Nhiệt PC, Cooling', 'tan-nhiet-pc-cooling'],
                        ['fas fa-plug', 'PSU - Nguồn máy tính', 'psu-nguon-may-tinh'],
                        ['fas fa-columns', 'Case - Vỏ máy tính', 'case-vo-may-tinh'],
                        ['fas fa-gamepad', 'Phím Chuột, Ghế Game, Gear', 'phim-chuot-ghe-game-gear'],
                        ['fas fa-desktop', 'Màn hình máy tính', 'man-hinh-may-tinh'],
                        ['fas fa-server', 'PC Gaming, Streaming', 'pc-gaming-streaming'],
                        ['fas fa-sd-card', 'Thiết Bị Lưu Trữ, USB, Thẻ', 'thiet-bi-luu-tru-usb-the'],
                        ['fas fa-wifi', 'Thiết Bị Mạng, Phần Mềm', 'thiet-bi-mang-phan-mem'],
                    ] as $cat)
                    <a href="{{ route('shop.index') }}?categories[]={{ $cat[2] }}" class="wk-cat-dark-item">
                        <i class="{{ $cat[0] }}"></i>
                        <span>{{ $cat[1] }}</span>
                        <i class="fas fa-chevron-right arrow"></i>
                    </a>
                    @endforeach
                @endif
            </div>

            {{-- RIGHT: Main Content --}}
            <div style="display:flex; flex-direction:column; gap:12px; min-width: 0;">
                {{-- Top: Slider + Side banners --}}
                <div class="wk-hero-top-row" style="display:flex; gap:12px; height: 340px;">
                    {{-- Slider --}}
                    @if(!empty($slides) && count($slides) > 0 && !empty($slides[0]['image']) && (empty($config['use_promo_box']) || $config['use_promo_box'] != 1))
                    <div class="wk-hero-slider-container" style="flex:1; border-radius:8px; overflow:hidden; position:relative;">
                        @if(setting('wk_hero_title') && setting('wk_hero_title') !== 'SHOW ĐIỂM<br>GIẢM SÂU')
                        <div class="wk-hero-custom-title-banner" style="position:absolute;top:10px;left:10px;z-index:15;background:rgba(0,0,0,0.7);color:#fff;padding:6px 14px;border-radius:4px;font-weight:700;">
                            {!! setting('wk_hero_title') !!}
                        </div>
                        @endif
                        <div class="wk-slider-track" style="width:100%;height:100%;position:relative;">
                            @foreach($slides as $idx => $s)
                            <div class="wk-slide-item {{ $idx === 0 ? 'active' : '' }}" style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:{{ $idx === 0 ? '1' : '0' }};transition:opacity 0.6s ease;display:flex;align-items:center;justify-content:center;">
                                <a href="{{ $s['btn_link'] ?? '/wkcomputer/cua-hang' }}" style="display:block;width:100%;height:100%;">
                                    <img src="{{ $s['image'] }}" alt="{{ $s['title'] ?? 'Slide' }}" style="width:100%;height:100%;object-fit:cover;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @if(count($slides) > 1)
                        <div style="position:absolute;bottom:12px;left:50%;transform:translateX(-50%);display:flex;gap:8px;z-index:10;">
                            @foreach($slides as $idx => $s)
                            <span class="wk-dot {{ $idx === 0 ? 'active' : '' }}" style="width:10px;height:10px;border-radius:50%;background:{{ $idx === 0 ? '#00d2ff' : 'rgba(255,255,255,0.6)' }};border:1px solid #fff;display:inline-block;cursor:pointer;"></span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @else
                    {{-- Default Promo Hero Box --}}
                    <div style="flex:1; border-radius:8px; overflow:hidden; position:relative; background: linear-gradient(135deg, #00d2ff 0%, #007bff 100%); display:flex; flex-direction:column; align-items:center; justify-content:center; color:#fff; padding:20px;">
                        <div style="background:#fff; color:#0056b3; font-weight:900; padding:4px 20px; border-radius:20px; font-size:16px; margin-bottom:12px; transform: rotate(-5deg); border: 2px solid #ff9800;">{{ $config['badge'] ?? setting('wk_hero_badge', 'Hi 2K8!') }}</div>
                        <h2 style="font-size: clamp(32px, 8vw, 52px); font-weight: 900; margin: 0; text-shadow: 2px 2px 0px #0056b3, -2px -2px 0px #0056b3, 2px -2px 0px #0056b3, -2px 2px 0px #0056b3, 4px 4px 8px rgba(0,0,0,0.4); color: #fff; text-align: center; line-height: 1.1; font-style: italic;">{!! $config['hero_title'] ?? setting('wk_hero_title', 'SHOW ĐIỂM<br>GIẢM SÂU') !!}</h2>
                        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-top:24px; width:100%; justify-content:center;">
                            <div style="background:#fff; color:#e65100; padding:12px 6px; border-radius:8px; text-align:center; font-weight:800; border-bottom:4px solid #ffb300; flex:1; min-width:100px; max-width:130px; border-top: 2px solid #ffb300;">
                                <div style="font-size:10px; color:#666;">{{ setting('wk_hero_v1_label', 'VOUCHER ĐẾN') }}</div>
                                <div style="font-size:16px;">{{ setting('wk_hero_v1_val', '5 TRIỆU') }}</div>
                            </div>
                            <div style="background:#fff; color:#e65100; padding:12px 6px; border-radius:8px; text-align:center; font-weight:800; border-bottom:4px solid #ffb300; flex:1; min-width:100px; max-width:130px; border-top: 2px solid #ffb300;">
                                <div style="font-size:10px; color:#666;">{{ setting('wk_hero_v2_label', 'QUÀ TẶNG') }}</div>
                                <div style="font-size:16px;">{{ setting('wk_hero_v2_val', 'AIRPODS 4') }}</div>
                            </div>
                            <div style="background:#fff; color:#e65100; padding:12px 6px; border-radius:8px; text-align:center; font-weight:800; border-bottom:4px solid #ffb300; flex:1; min-width:100px; max-width:130px; border-top: 2px solid #ffb300;">
                                <div style="font-size:10px; color:#666;">{{ setting('wk_hero_v3_label', 'TRẢ GÓP') }}</div>
                                <div style="font-size:16px;">{{ setting('wk_hero_v3_val', '0%') }}</div>
                            </div>
                        </div>
                        <div style="margin-top:16px; background:#0056b3; border: 1px solid #80d8ff; padding:6px 24px; border-radius:20px; font-size:12px; font-weight:700; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">{!! setting('wk_hero_date_text', '<i class="far fa-calendar-alt"></i> ÁP DỤNG TỪ 01.07.2026') !!}</div>
                    </div>
                    @endif
                    
                    {{-- Right Banners --}}
                    <div class="wk-hero-right-banners" style="width:260px; display:flex; flex-direction:column; gap:12px;">
                        <div class="banner-dash-border" style="flex:1;">
                            <a href="{{ setting('wk_hero_rb1_link', route('shop.index')) }}" style="text-decoration:none;display:block;height:100%;">
                                <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #ff9800, #ff5722); color:#fff; padding:16px;">
                                    <div style="background:#fff; color:#e65100; font-size:13px; font-weight:800; padding:6px 16px; border-radius:20px; margin-bottom:12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">{{ setting('wk_hero_rb1_tag', 'ƯU ĐÃI HỌC SINH - SINH VIÊN') }}</div>
                                    <h3 style="font-size:32px; font-weight:900; margin:0; line-height:1.1; text-shadow:2px 2px 0px rgba(0,0,0,0.2);">{!! setting('wk_hero_rb1_text', 'GIẢM ĐẾN<br><span style="font-size:46px; color:#fff; text-shadow: 3px 3px 0px #be123c, -1px -1px 0 #be123c, 1px -1px 0 #be123c, -1px 1px 0 #be123c, 1px 1px 0 #be123c;">1 TRIỆU</span>') !!}</h3>
                                </div>
                            </a>
                        </div>
                        <div class="banner-dash-border" style="flex:1;">
                            <a href="{{ setting('wk_hero_rb2_link', route('shop.index')) }}" style="text-decoration:none;display:block;height:100%;">
                                <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #ffb300, #ff9800); color:#fff; padding:16px;">
                                    <div style="background:#fff; color:#e65100; font-size:13px; font-weight:800; padding:6px 16px; border-radius:20px; margin-bottom:12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">{{ setting('wk_hero_rb2_tag', 'KHUYẾN MÃI THÁNG NÀY') }}</div>
                                    <h3 style="font-size:32px; font-weight:900; margin:0; line-height:1.1; text-shadow:2px 2px 0px rgba(0,0,0,0.2);">{!! setting('wk_hero_rb2_text', 'GIẢM ĐẾN<br><span style="font-size:56px; color:#fff; text-shadow: 3px 3px 0px #be123c, -1px -1px 0 #be123c, 1px -1px 0 #be123c, -1px 1px 0 #be123c, 1px 1px 0 #be123c;">50%</span>') !!}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Bottom: 4 small banners --}}
                <div class="wk-hero-bottom-row" style="display:flex; gap:12px; height: 180px;">
                    <div class="banner-dash-border" style="flex:1;">
                        <a href="{{ setting('wk_hero_b1_link', route('build_pc.index')) }}" style="text-decoration:none;display:block;height:100%;">
                            <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #475569, #1e293b); color:#fff; padding:16px; align-items:flex-start; text-align:left;">
                                <h4 style="font-size:24px; font-weight:900; margin:0 0 12px 0; text-shadow:1px 1px 0 rgba(0,0,0,0.3); color:#fff; line-height:1.2;">{{ setting('wk_hero_b1_title', 'BUILD PC') }}</h4>
                                <div style="background:linear-gradient(90deg, #ff9800, #ff5722); color:#fff; padding:6px 10px; border-radius:4px; font-size:12px; font-weight:800; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">{!! setting('wk_hero_b1_sub', 'GIẢM THÊM TỚI<br><span style="font-size:18px;">2 TRIỆU</span>') !!}</div>
                                <i class="fas fa-desktop" style="font-size:80px; position:absolute; right:-10px; bottom:-10px; opacity:0.15; transform:rotate(-10deg);"></i>
                            </div>
                        </a>
                    </div>
                    <div class="banner-dash-border" style="flex:1;">
                        <a href="{{ setting('wk_hero_b2_link', route('shop.index')) }}" style="text-decoration:none;display:block;height:100%;">
                            <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #881337, #4c0519); color:#fff; padding:16px; align-items:flex-start; text-align:left;">
                                <h4 style="font-size:20px; font-weight:900; margin:0 0 12px 0; text-shadow:1px 1px 0 rgba(0,0,0,0.3); color:#ffeb3b; line-height:1.2;">{!! setting('wk_hero_b2_title', 'LAPTOP GAMING<br>RTX 4050') !!}</h4>
                                <div style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.4); color:#fff; padding:6px 10px; border-radius:4px; font-size:12px; font-weight:800;">{!! setting('wk_hero_b2_sub', 'CHỈ TỪ<br><span style="font-size:16px;">24.990 TRIỆU</span>') !!}</div>
                                <i class="fas fa-laptop" style="font-size:80px; position:absolute; right:-10px; bottom:-10px; opacity:0.15; transform:rotate(-10deg);"></i>
                            </div>
                        </a>
                    </div>
                    <div class="banner-dash-border" style="flex:1;">
                        <a href="{{ setting('wk_hero_b3_link', route('shop.index')) }}" style="text-decoration:none;display:block;height:100%;">
                            <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #ff9800, #e65100); color:#fff; padding:16px; align-items:flex-start; text-align:left;">
                                <h4 style="font-size:20px; font-weight:900; margin:0 0 12px 0; text-shadow:1px 1px 0 rgba(0,0,0,0.3); color:#fff; line-height:1.2;">{!! setting('wk_hero_b3_title', 'IPHONE 17<br>PRO MAX') !!}</h4>
                                <div style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.4); color:#fff; padding:6px 10px; border-radius:4px; font-size:12px; font-weight:800;">{!! setting('wk_hero_b3_sub', 'CHỈ TỪ<br><span style="font-size:16px;">35.990 TRIỆU</span>') !!}</div>
                                <i class="fas fa-mobile-alt" style="font-size:80px; position:absolute; right:-10px; bottom:-10px; opacity:0.15; transform:rotate(10deg);"></i>
                            </div>
                        </a>
                    </div>
                    <div class="banner-dash-border" style="flex:1;">
                        <a href="{{ setting('wk_hero_b4_link', route('shop.index')) }}" style="text-decoration:none;display:block;height:100%;">
                            <div class="banner-dash-inner" style="height:100%; background:linear-gradient(135deg, #ffe4e6, #fecdd3); color:#881337; padding:16px; align-items:flex-start; text-align:left;">
                                <h4 style="font-size:22px; font-weight:900; margin:0 0 12px 0; color:#e11d48; line-height:1.2; text-shadow: 1px 1px 0px rgba(255,255,255,0.5);">{!! setting('wk_hero_b4_title', 'MÀN HÌNH<br>OLED') !!}</h4>
                                <div style="background:linear-gradient(90deg, #ff9800, #ff5722); color:#fff; padding:6px 10px; border-radius:4px; font-size:12px; font-weight:800; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">{!! setting('wk_hero_b4_sub', 'GIÁ CHỈ TỪ<br><span style="font-size:18px;">12 TRIỆU</span>') !!}</div>
                                <i class="fas fa-tv" style="font-size:80px; position:absolute; right:-10px; bottom:-10px; opacity:0.15; transform:rotate(-10deg);"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($showServices)
{{-- SERVICE STRIP --}}
<section style="padding:16px 0;">
    <div class="wk-container">
        <div class="wk-services">
            <div class="wk-service-item">
                <div class="wk-service-icon"><i class="fas fa-truck-fast"></i></div>
                <div class="wk-service-text">
                    <h5>Giao hàng nhanh</h5>
                    <p>Miễn phí đơn từ 1 triệu</p>
                </div>
            </div>
            <div class="wk-service-item">
                <div class="wk-service-icon" style="background:#e8f5e9;color:#2e7d32;"><i class="fas fa-credit-card"></i></div>
                <div class="wk-service-text">
                    <h5>Trả góp 0%</h5>
                    <p>Duyệt qua app trong 5 phút</p>
                </div>
            </div>
            <div class="wk-service-item">
                <div class="wk-service-icon" style="background:#ffe4e6;color:#e11d48;"><i class="fas fa-shield-halved"></i></div>
                <div class="wk-service-text">
                    <h5>Bảo hành chính hãng</h5>
                    <p>Lên đến 36 tháng tận nơi</p>
                </div>
            </div>
            <div class="wk-service-item">
                <div class="wk-service-icon" style="background:#fff3e0;color:#e65100;"><i class="fas fa-arrows-rotate"></i></div>
                <div class="wk-service-text">
                    <h5>Đổi trả dễ dàng</h5>
                    <p>1 đổi 1 trong 30 ngày</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
