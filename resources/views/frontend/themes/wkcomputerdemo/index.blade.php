@extends('layouts.app')

@section('title', 'WKcomputer - Máy Tính, Laptop, Linh Kiện Chính Hãng')
@section('description', 'WKcomputer - Hệ thống bán lẻ laptop, PC, linh kiện, gaming gear và phụ kiện công nghệ chính hãng. Bảo hành dài hạn, giao hàng toàn quốc.')

@section('content')

@php
    // Helper: merge collections, prefer specific over general
    $displayBestSellers = $bestSellers->isNotEmpty() ? $bestSellers : $newArrivals;
    $displayFeatured = $featuredProducts->isNotEmpty() ? $featuredProducts : $newArrivals;
@endphp

{{-- ===================================================
     HERO SECTION: 3-column layout
====================================================== --}}
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
                    <div style="flex:1; border-radius:8px; overflow:hidden; position:relative; background: linear-gradient(135deg, #00d2ff 0%, #007bff 100%); display:flex; flex-direction:column; align-items:center; justify-content:center; color:#fff; padding:20px;">
                        <div style="background:#fff; color:#0056b3; font-weight:900; padding:4px 20px; border-radius:20px; font-size:16px; margin-bottom:12px; transform: rotate(-5deg); border: 2px solid #ff9800;">{{ setting('wk_hero_badge', 'Hi 2K8!') }}</div>
                        <h2 style="font-size: clamp(32px, 8vw, 52px); font-weight: 900; margin: 0; text-shadow: 2px 2px 0px #0056b3, -2px -2px 0px #0056b3, 2px -2px 0px #0056b3, -2px 2px 0px #0056b3, 4px 4px 8px rgba(0,0,0,0.4); color: #fff; text-align: center; line-height: 1.1; font-style: italic;">{!! setting('wk_hero_title', 'SHOW ĐIỂM<br>GIẢM SÂU') !!}</h2>
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

                        {{-- Controls & Dots --}}
                        <button style="position:absolute;left:10px;top:50%;transform:translateY(-50%);width:40px;height:40px;border-radius:50%;background:rgba(0,0,0,0.4);color:#fff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button style="position:absolute;right:10px;top:50%;transform:translateY(-50%);width:40px;height:40px;border-radius:50%;background:rgba(0,0,0,0.4);color:#fff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div style="position:absolute;bottom:12px;left:50%;transform:translateX(-50%);display:flex;gap:8px;">
                            <span style="width:12px;height:12px;border-radius:50%;background:#00d2ff;border:2px solid #fff;"></span>
                            <span style="width:12px;height:12px;border-radius:50%;background:rgba(255,255,255,0.6);"></span>
                            <span style="width:12px;height:12px;border-radius:50%;background:rgba(255,255,255,0.6);"></span>
                            <span style="width:12px;height:12px;border-radius:50%;background:rgba(255,255,255,0.6);"></span>
                        </div>
                    </div>
                    
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

{{-- ===================================================
     SERVICE STRIP
====================================================== --}}
<section style="padding:0 0 16px;">
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

{{-- ===================================================
     FLASH SALE (if active)
====================================================== --}}
@if($flashSale && $flashSale->items->isNotEmpty())
<section style="padding:0 0 20px;">
    <div class="wk-container">
        <div class="wk-flash-section">
            <div class="wk-flash-header">
                <div class="wk-flash-badge">
                    <i class="fas fa-bolt"></i> FLASH SALE
                </div>
                <div class="wk-countdown" data-end="{{ $flashSale->end_date->timestamp * 1000 }}">
                    <div class="wk-countdown-unit"><span data-cd="h">00</span><small class="wk-countdown-label">GIỜ</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="m">00</span><small class="wk-countdown-label">PHÚT</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="s">00</span><small class="wk-countdown-label">GIÂY</small></div>
                </div>
                <span style="color:rgba(255,255,255,.5);font-size:13px;margin-left:auto;">{{ $flashSale->name }}</span>
                <a href="{{ route('shop.index') }}?on_sale=1" style="color:#ffcdd2;font-size:12px;font-weight:600;white-space:nowrap;">Xem tất cả <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="wk-products-grid" style="grid-template-columns:repeat(5,1fr);gap:12px;">
                @foreach($flashSale->items->take(5) as $item)
                    @if($item->product && $item->product->status === 'active')
                    <x-shop.product-card :product="$item->product" />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@elseif($saleProducts->isNotEmpty())
{{-- Fallback flash sale section with sale products --}}
<section style="padding:0 0 20px;">
    <div class="wk-container">
        <div class="wk-flash-section">
            <div class="wk-flash-header">
                <div class="wk-flash-badge"><i class="fas fa-bolt"></i> DEAL HOT</div>
                <div class="wk-countdown" data-end="{{ now()->endOfDay()->timestamp * 1000 }}">
                    <div class="wk-countdown-unit"><span data-cd="h">00</span><small class="wk-countdown-label">GIỜ</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="m">00</span><small class="wk-countdown-label">PHÚT</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="s">00</span><small class="wk-countdown-label">GIÂY</small></div>
                </div>
                <a href="{{ route('shop.index') }}?on_sale=1" style="color:#ffcdd2;font-size:12px;font-weight:600;margin-left:auto;white-space:nowrap;">Xem tất cả <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="wk-products-grid" style="gap:12px;">
                @foreach($saleProducts->take(5) as $product)
                <x-shop.product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     FEATURED CATEGORIES
====================================================== --}}
@if($featuredCategories->isNotEmpty())
<section class="wk-section">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-th-large"></i> Danh Mục Nổi Bật</h2>
            <a href="{{ route('shop.index') }}" class="wk-view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="wk-cat-grid" style="grid-template-columns:repeat(4,1fr);">
            @foreach($featuredCategories as $cat)
            @php
                $catImage = $cat->image ?? $cat->icon ?? null;
                $catIcons = ['laptop'=>'fas fa-laptop','pc'=>'fas fa-desktop','linh-kien'=>'fas fa-microchip','man-hinh'=>'fas fa-tv','gaming'=>'fas fa-gamepad','phu-kien'=>'fas fa-headphones','mang'=>'fas fa-wifi','in'=>'fas fa-print'];
            @endphp
            <a href="{{ url($cat->slug) }}" class="wk-cat-grid-item">
                @if($catImage && !str_contains($catImage, ' '))
                <img class="wk-cat-grid-icon" src="{{ $catImage }}" alt="{{ $cat->name }}" onerror="this.style.display='none';this.nextElementSibling.style.display='block';">
                <i class="fas fa-laptop cat-emoji" style="font-size:36px;color:var(--wk-primary);margin-bottom:10px;display:none;"></i>
                @else
                <i class="fas fa-microchip cat-emoji" style="font-size:36px;color:var(--wk-primary);margin-bottom:10px;"></i>
                @endif
                <span class="wk-cat-grid-name">{{ $cat->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@else
{{-- Fallback static categories --}}
<section class="wk-section">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-th-large"></i> Danh Mục Nổi Bật</h2>
        </div>
        <div class="wk-cat-grid" style="grid-template-columns:repeat(4,1fr);">
            @foreach([
                ['fas fa-laptop','Laptop','laptop'],
                ['fas fa-desktop','PC Đồng Bộ','pc'],
                ['fas fa-microchip','Linh Kiện PC','linh-kien-pc'],
                ['fas fa-tv','Màn Hình','man-hinh'],
                ['fas fa-gamepad','Gaming Gear','gaming-gear'],
                ['fas fa-print','Thiết Bị VP','thiet-bi-van-phong'],
                ['fas fa-wifi','Thiết Bị Mạng','thiet-bi-mang'],
                ['fas fa-headphones','Phụ Kiện','phu-kien'],
                ['fas fa-home','Gia Dụng TM','gia-dung-thong-minh'],
            ] as $cat)
            <a href="{{ route('shop.index') }}?categories[]={{ $cat[2] }}" class="wk-cat-grid-item">
                <i class="{{ $cat[0] }}" style="font-size:36px;color:var(--wk-primary);margin-bottom:10px;"></i>
                <span class="wk-cat-grid-name">{{ $cat[1] }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     BEST SELLERS / SẢN PHẨM BÁN CHẠY
====================================================== --}}
@if($displayBestSellers->isNotEmpty())
<section class="wk-section" style="background:#fff;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-fire"></i> Sản Phẩm Bán Chạy</h2>
            <a href="{{ route('shop.index') }}" class="wk-view-all">Xem thêm <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="wk-products-grid">
            @foreach($displayBestSellers->take(10) as $product)
            <x-shop.product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     FEATURED PRODUCTS (Laptop / PC nổi bật)
====================================================== --}}
@if($displayFeatured->isNotEmpty() && $displayFeatured !== $displayBestSellers)
<section class="wk-section">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-star"></i> Laptop & PC Nổi Bật</h2>
            <a href="{{ route('shop.index') }}?is_featured=1" class="wk-view-all">Xem thêm <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="wk-products-grid">
            @foreach($displayFeatured->take(10) as $product)
            <x-shop.product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     MID BANNER
====================================================== --}}
<section style="padding:0 0 20px;">
    <div class="wk-container">
        <div style="border-radius:16px;overflow:hidden;display:grid;grid-template-columns:1fr 1fr;gap:12px;">
            <a href="{{ route('shop.index') }}?categories[]=laptop-gaming" style="background:linear-gradient(135deg,#881337,#e11d48);border-radius:12px;padding:28px 24px;display:flex;align-items:center;gap:20px;text-decoration:none;transition:transform .2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fas fa-laptop" style="font-size:60px;color:rgba(255,255,255,.3);"></i>
                <div>
                    <span style="display:block;color:rgba(255,255,255,.8);font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Siêu Sale Tháng 7</span>
                    <h3 style="color:#fff;font-size:20px;font-weight:800;margin:0 0 8px;line-height:1.2;">Laptop Gaming<br>Giảm đến 30%</h3>
                    <span style="color:#fda4af;font-size:12px;">Xem ngay →</span>
                </div>
            </a>
            <a href="{{ route('shop.index') }}?categories[]=linh-kien-pc" style="background:linear-gradient(135deg,#be123c,#e11d48);border-radius:12px;padding:28px 24px;display:flex;align-items:center;gap:20px;text-decoration:none;transition:transform .2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fas fa-microchip" style="font-size:60px;color:rgba(255,255,255,.3);"></i>
                <div>
                    <span style="display:block;color:rgba(255,255,255,.8);font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Linh Kiện Chính Hãng</span>
                    <h3 style="color:#fff;font-size:20px;font-weight:800;margin:0 0 8px;line-height:1.2;">CPU, VGA, RAM, SSD<br>Giá tốt nhất thị trường</h3>
                    <span style="color:#ffe4e6;font-size:12px;">Xem ngay →</span>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ===================================================
     NEW ARRIVALS
====================================================== --}}
@if($newArrivals->isNotEmpty())
<section class="wk-section" style="background:#fff;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-sparkles"></i> Hàng Mới Về</h2>
            <a href="{{ route('shop.index') }}" class="wk-view-all">Xem thêm <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="wk-products-grid">
            @foreach($newArrivals->take(10) as $product)
            <x-shop.product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     TRUST BADGES
====================================================== --}}
<section style="padding:20px 0;">
    <div class="wk-container">
        <div style="background:#fff;border-radius:16px;border:1px solid #f1f5f9;padding:28px;display:grid;grid-template-columns:repeat(4,1fr);gap:20px;text-align:center;">
            @foreach([
                ['fas fa-certificate', '#e11d48', '100% Chính Hãng', 'Cam kết hàng authentic, có tem chính hãng đầy đủ'],
                ['fas fa-shield-halved', '#e11d48', 'Bảo Hành Tận Nơi', 'Hỗ trợ kỹ thuật và bảo hành tại nhà trên toàn quốc'],
                ['fas fa-truck', '#2e7d32', 'Giao Hàng Nhanh', 'Giao trong 2h nội thành, toàn quốc trong 24-48h'],
                ['fas fa-headset', '#e65100', 'Hỗ Trợ 24/7', 'Tư vấn chọn mua và hỗ trợ kỹ thuật suốt ngày đêm'],
            ] as $trust)
            <div>
                <div style="width:56px;height:56px;border-radius:50%;background:{{ $trust[1] }}15;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                    <i class="{{ $trust[0] }}" style="color:{{ $trust[1] }};font-size:22px;"></i>
                </div>
                <h4 style="font-size:14px;font-weight:700;color:#1e293b;margin:0 0 6px;">{{ $trust[1] === '#d32f2f' ? '' : '' }}{{ $trust[2] }}</h4>
                <p style="font-size:12px;color:#94a3b8;margin:0;line-height:1.5;">{{ $trust[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================================================
     LATEST POSTS / TIN TỨC CÔNG NGHỆ
====================================================== --}}
@if($latestPosts->isNotEmpty())
<section class="wk-section" style="background:#fff;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-newspaper"></i> Tin Tức Công Nghệ</h2>
            <a href="{{ route('blog.index') }}" class="wk-view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
        </div>

        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;">
            @foreach($latestPosts as $post)
            @php
                $postImg = $post->image ?? $post->featured_image ?? null;
                if ($postImg && !str_starts_with($postImg, 'http') && !str_starts_with($postImg, '/')) $postImg = '/storage/' . $postImg;
            @endphp
            <a href="{{ url($post->slug) }}" style="text-decoration:none;color:inherit;">
                <article style="background:#fff;border-radius:12px;border:1px solid #f1f5f9;overflow:hidden;height:100%;transition:box-shadow .2s,transform .2s;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,.1)';this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                    <div style="height:160px;overflow:hidden;background:#f8fafc;">
                        @if($postImg)
                        <img src="{{ $postImg }}" alt="{{ $post->name ?? $post->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform .4s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f1f5f9,#e2e8f0);">
                            <i class="fas fa-newspaper" style="font-size:40px;color:#94a3b8;"></i>
                        </div>
                        @endif
                    </div>
                    <div style="padding:14px;">
                        <div style="font-size:10px;color:#e11d48;font-weight:700;text-transform:uppercase;margin-bottom:6px;">
                            {{ $post->published_at?->format('d/m/Y') ?? 'Công Nghệ' }}
                        </div>
                        <h3 style="font-size:13px;font-weight:700;color:#1e293b;margin:0;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                            {{ $post->name ?? $post->title }}
                        </h3>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     PERSONALIZED RECOMMENDATION: Dành cho bạn / Tiếp tục khám phá
====================================================== --}}
@if(isset($personalizedProducts) && $personalizedProducts->isNotEmpty())
<section class="wk-section" id="rec-personalized" style="background:#f0f2f5;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-magic"></i> Dành Cho Bạn</h2>
            <a href="{{ route('shop.index') }}" class="wk-view-all">Xem thêm <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="wk-products-grid" data-recommendation-type="personalized" data-source="homepage">
            @foreach($personalizedProducts as $index => $product)
            <div data-product-id="{{ $product->id }}"
                 data-position="{{ $index + 1 }}"
                 data-recommendation-type="personalized"
                 data-source="homepage"
                 class="rec-product-wrapper">
                <x-shop.product-card :product="$product" />
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===================================================
     RECENTLY VIEWED: Sản phẩm vừa xem
====================================================== --}}
@if(isset($recentlyViewedProducts) && $recentlyViewedProducts->isNotEmpty())
<section class="wk-section" id="rec-recently-viewed-home" style="background:#fff;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title"><i class="fas fa-history"></i> Sản phẩm vừa xem</h2>
        </div>
        <div class="wk-products-grid" data-recommendation-type="recently_viewed" data-source="homepage">
            @foreach($recentlyViewedProducts as $index => $product)
            <div data-product-id="{{ $product->id }}"
                 data-position="{{ $index + 1 }}"
                 data-recommendation-type="recently_viewed"
                 data-source="homepage"
                 class="rec-product-wrapper">
                <x-shop.product-card :product="$product" />
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
// Recommendation tracking for homepage
(function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    document.querySelectorAll('.rec-product-wrapper').forEach(function(wrapper) {
        wrapper.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (!link) return;
            const productId = parseInt(wrapper.dataset.productId);
            const recType = wrapper.dataset.recommendationType;
            const source = wrapper.dataset.source;
            if (productId && recType) {
                try {
                    navigator.sendBeacon('/api/recommendations/track',
                        new Blob([JSON.stringify({
                            product_id: productId,
                            recommendation_type: recType,
                            source: source,
                            position: parseInt(wrapper.dataset.position),
                            _token: csrfToken
                        })], {type: 'application/json'})
                    );
                } catch(e) {}
            }
        });
    });
})();
</script>
@endpush

@endsection

