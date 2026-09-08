<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'WKcomputer'))</title>
    <meta name="description" content="@yield('description', 'WKcomputer - Hệ thống bán lẻ máy tính, laptop, linh kiện, thiết bị công nghệ chính hãng, uy tín.')">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#e11d48">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', config('app.name'))">
    <meta property="og:description" content="@yield('description', 'WKcomputer - Công nghệ chính hãng')">
    <meta property="og:type" content="website">

    <!-- Fonts: Inter & Roboto (Flawless Vietnamese Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Frontend CSS -->
    <link rel="stylesheet" href="{{ asset('themes/wkcomputerdemo/css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/wkcomputerdemo/css/components.css') }}">

    @stack('head')
</head>
<body>

{{-- ===================================================
     TOP BAR (Desktop only)
====================================================== --}}
<div class="wk-topbar d-none d-lg-flex">
    <div class="wk-container" style="display:flex;align-items:center;justify-content:space-between;width:100%;position:relative;">
        
        {{-- Left: Dropdown pills --}}
        <div style="display:flex;align-items:center;gap:12px;">
            
            {{-- Showroom Dropdown --}}
            <div class="wk-topbar-dropdown-wrapper">
                <button class="wk-showroom-pill" type="button">
                    <i class="fas fa-map-marker-alt"></i> {{ setting('wk_showroom_btn_text', 'Hệ thống showroom') }}
                </button>
                <div class="wk-topbar-dropdown-menu">
                    <div class="wk-showroom-grid">
                        @php
                            $showroomsSetting = setting('showrooms');
                            if (is_string($showroomsSetting)) {
                                $decodedSr = json_decode($showroomsSetting, true);
                                $showrooms = is_array($decodedSr) ? $decodedSr : null;
                            } elseif (is_array($showroomsSetting)) {
                                $showrooms = $showroomsSetting;
                            } else {
                                $showrooms = null;
                            }
                            if (empty($showrooms)) {
                                $showrooms = [
                                    ['title' => 'Hồ Chí Minh', 'address' => '348/42 Hoàng Văn Thụ, P.Tân Sơn Nhất, TP Hồ Chí Minh'],
                                    ['title' => 'Bình Thuận', 'address' => '19 Võ Liêm Sơn, P.Phú Thủy, Tỉnh Lâm Đồng (Phan Thiết cũ)'],
                                ];
                            }
                        @endphp
                        @foreach($showrooms as $idx => $sr)
                            <div class="wk-showroom-item">
                                <div class="wk-dropdown-title-bar">
                                    <span class="wk-dropdown-title-num">{{ sprintf('%02d', $idx + 1) }}</span>
                                    <span class="wk-dropdown-title-text">{{ is_array($sr) ? ($sr['title'] ?? ($sr['name'] ?? 'Showroom')) : 'Showroom' }}</span>
                                </div>
                                <p>{{ is_array($sr) ? ($sr['address'] ?? '') : $sr }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Online Sales Dropdown --}}
            <div class="wk-topbar-dropdown-wrapper">
                <button class="wk-sales-pill" type="button">
                    <i class="fas fa-phone-alt"></i> {{ setting('wk_sales_btn_text', 'Bán hàng trực tuyến') }}
                </button>
                <div class="wk-topbar-dropdown-menu">
                    <div class="wk-sales-grid">
                        {{-- Col 1 --}}
                        <div class="wk-sales-col">
                            <div class="wk-dropdown-title-bar">
                                <span class="wk-dropdown-title-num">01</span>
                                <span class="wk-dropdown-title-text">{{ setting('wk_sales_col1_title', 'PHÒNG KINH DOANH') }}</span>
                            </div>
                            <ul class="wk-zalo-list">
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kd1', '0901239665') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kd1', '0901239665') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kd1_label', 'Kinh doanh 1') }}</span>
                                </li>
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kd2', '0768877858') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kd2', '0768877858') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kd2_label', 'Kinh doanh 2') }}</span>
                                </li>
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kd3', '0907018743') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kd3', '0907018743') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kd3_label', 'Kinh doanh 3') }}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- Col 2 --}}
                        <div class="wk-sales-col">
                            <div class="wk-dropdown-title-bar">
                                <span class="wk-dropdown-title-num">02</span>
                                <span class="wk-dropdown-title-text">{{ setting('wk_sales_col2_title', 'KẾ TOÁN') }}</span>
                            </div>
                            <ul class="wk-zalo-list">
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kt', '0906326545') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kt', '0906326545') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kt_label', 'Msr. Thanh') }}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- Col 3 --}}
                        <div class="wk-sales-col">
                            <div class="wk-dropdown-title-bar">
                                <span class="wk-dropdown-title-num">03</span>
                                <span class="wk-dropdown-title-text">{{ setting('wk_sales_col3_title', 'HỖ TRỢ KỸ THUẬT, BẢO HÀNH') }}</span>
                            </div>
                            <ul class="wk-zalo-list">
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kt1', '0907018743') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kt1', '0907018743') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kt1_label', 'Hỗ trợ kỹ thuật (giờ hành chính)') }}</span>
                                </li>
                                <li>
                                    <a href="https://zalo.me/{{ setting('wk_zalo_kt2', '0906326545') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-comment" style="color:#0084ff;"></i> Zalo {{ setting('wk_zalo_kt2', '0906326545') }}
                                    </a>
                                    <span>- {{ setting('wk_zalo_kt2_label', 'Tiếp nhận bảo hành') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Right: Text links --}}
        <div style="display:flex;align-items:center;gap:16px;">
            <a href="#" class="top-link"><i class="fas fa-user-tie"></i> Khách hàng doanh nghiệp</a>
            <a href="{{ route('contact.index') }}" class="top-link"><i class="fas fa-building"></i> Hệ thống Showroom</a>
            <a href="tel:{{ preg_replace('/[^0-9]/', '', setting('contact_phone', '0901239665')) }}" class="top-link"><i class="fas fa-headset"></i> CSKH: {{ setting('contact_phone', '0901.239.665') }}</a>
            <a href="{{ route('build_pc.index') }}" class="top-link"><i class="fas fa-wrench"></i> Xây dựng cấu hình</a>
        </div>
    </div>
</div>

{{-- ===================================================
     DESKTOP HEADER
====================================================== --}}
<header class="wk-header d-none d-lg-flex" id="wk-main-header">
    <div class="wk-container" style="display:flex;align-items:center;gap:16px;width:100%;height:100%;">

        {{-- Logo --}}
        <a href="{{ url('/wkcomputer') }}" class="wk-logo" style="display:flex; align-items:center;">
            <img src="https://WKcomputer.vn/wp-content/uploads/2025/10/1-removebg-preview-1-min.png.webp" alt="WKcomputer" style="height:48px; width:auto; max-width:200px; object-fit:contain;">
        </a>

        {{-- Search --}}
        <div class="wk-search-wrap" style="flex:1;max-width:640px;">
            <form action="{{ route('shop.index') }}" method="GET">
                <div class="wk-search-bar">
                    <select name="category" class="wk-search-cat-select">
                        <option value="">Tất cả danh mục</option>
                        <option value="laptop" {{ request('category') == 'laptop' ? 'selected' : '' }}>Laptop</option>
                        <option value="pc" {{ request('category') == 'pc' ? 'selected' : '' }}>PC Lắp ráp</option>
                        <option value="linh-kien" {{ request('category') == 'linh-kien' ? 'selected' : '' }}>Linh kiện</option>
                        <option value="man-hinh" {{ request('category') == 'man-hinh' ? 'selected' : '' }}>Màn hình</option>
                        <option value="phu-kien" {{ request('category') == 'phu-kien' ? 'selected' : '' }}>Phụ kiện</option>
                    </select>
                    <input class="wk-search-input"
                           type="text"
                           name="q"
                           value="{{ request('q') }}"
                           placeholder="Tìm kiếm laptop, PC, linh kiện, phụ kiện..."
                           autocomplete="off"
                           id="wk-desktop-search">
                    <button class="wk-search-btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="wk-search-suggestions" id="wk-search-suggest"></div>
            </form>
        </div>

        {{-- Header Actions --}}
        <div class="wk-header-actions">
            {{-- Account --}}
            @auth
            <div style="position:relative;" x-data="{ open: false }">
                <a href="{{ route('profile') }}" class="wk-hdr-btn">
                    <i class="fas fa-user-circle"></i>
                    <span>{{ Str::limit(auth()->user()->name, 10) }}</span>
                </a>
            </div>
            @else
            <a href="{{ route('login') }}" class="wk-hdr-btn">
                <i class="fas fa-user-circle"></i>
                <span>Đăng nhập</span>
            </a>
            @endauth

            {{-- Cart --}}
            <a href="{{ route('cart.page') }}" class="wk-hdr-btn" style="position:relative;">
                <i class="fas fa-shopping-cart"></i>
                <span>Giỏ hàng</span>
                <span class="wk-cart-badge wk-cart-count" style="display:none;">0</span>
            </a>

            {{-- Hotline --}}
            <a href="tel:1900xxxx" class="wk-hdr-btn">
                <i class="fas fa-headset"></i>
                <span>Tư vấn</span>
            </a>
        </div>
    </div>
</header>

{{-- ===================================================
     NAVBAR + MEGA MENU (Desktop)
====================================================== --}}
<nav class="wk-navbar d-none d-lg-flex" id="wk-navbar">
    <div class="wk-container" style="display:flex;align-items:stretch;width:100%;height:100%;">

        {{-- Category Trigger --}}
        <button class="wk-cat-trigger" type="button">
            <i class="fas fa-bars"></i>
            <span>Danh mục sản phẩm</span>
            <i class="fas fa-chevron-down arrow"></i>
        </button>

        {{-- Quick Nav Links --}}
        <ul class="wk-nav-links">
            <li><a href="{{ url('/wkcomputer') }}" class="{{ request()->is('wkcomputer') || request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a></li>
            <li><a href="{{ route('shop.index') }}" class="{{ request()->routeIs('shop.*') ? 'active' : '' }}">Cửa hàng</a></li>
            <li><a href="{{ route('shop.index') }}?is_featured=1">Laptop</a></li>
            <li><a href="{{ route('shop.index') }}?on_sale=1" style="color:var(--wk-primary);">
                <span class="wk-nav-badge">HOT</span> Khuyến mãi
            </a></li>
            <li><a href="{{ route('build_pc.index') }}">Build PC</a></li>
            <li><a href="{{ route('blog.index') }}">Tin tức</a></li>
            <li><a href="{{ route('contact.index') }}">Liên hệ</a></li>
        </ul>
    </div>

    {{-- MEGA MENU PANEL --}}
    <div class="wk-cat-panel" id="wk-cat-panel">
        {{-- Left: Category list --}}
        <div class="wk-cat-sidebar">
            @php
                $categorySlugs = [
                    'cpu-bo-vi-xu-ly' => ['icon' => 'fas fa-microchip', 'name' => 'CPU - Bộ Vi Xử Lý'],
                    'vga-card-man-hinh' => ['icon' => 'fas fa-tv', 'name' => 'VGA - Card Màn Hình'],
                    'mainboard-bo-mach-chu' => ['icon' => 'fas fa-memory', 'name' => 'Mainboard - Bo mạch chủ'],
                    'ram-bo-nho-trong' => ['icon' => 'fas fa-memory', 'name' => 'Ram - Bộ Nhớ Trong'],
                    'o-cung-ssd' => ['icon' => 'fas fa-hdd', 'name' => 'Ổ cứng SSD'],
                    'o-cung-hdd' => ['icon' => 'fas fa-hdd', 'name' => 'Ổ cứng HDD'],
                    'tan-nhiet-pc-cooling' => ['icon' => 'fas fa-fan', 'name' => 'Tản Nhiệt PC, Cooling'],
                    'psu-nguon-may-tinh' => ['icon' => 'fas fa-plug', 'name' => 'PSU - Nguồn máy tính'],
                    'case-vo-may-tinh' => ['icon' => 'fas fa-columns', 'name' => 'Case - Vỏ máy tính'],
                    'phim-chuot-ghe-game-gear' => ['icon' => 'fas fa-gamepad', 'name' => 'Phím Chuột, Ghế Game, Gear'],
                    'man-hinh-may-tinh' => ['icon' => 'fas fa-desktop', 'name' => 'Màn hình máy tính'],
                    'pc-gaming-streaming' => ['icon' => 'fas fa-server', 'name' => 'PC Gaming, Streaming'],
                    'thiet-bi-luu-tru-usb-the' => ['icon' => 'fas fa-sd-card', 'name' => 'Thiết Bị Lưu Trữ, USB, Thẻ'],
                    'thiet-bi-mang-phan-mem' => ['icon' => 'fas fa-wifi', 'name' => 'Thiết Bị Mạng, Phần Mềm'],
                ];

                $dbCategories = \App\Models\Wkcomputer\WkCategory::active()
                    ->whereIn('slug', array_keys($categorySlugs))
                    ->with(['children' => function($q) {
                        $q->active()->orderBy('sort_order');
                    }])
                    ->get()
                    ->keyBy('slug');

                $menuCategories = [];
                foreach ($categorySlugs as $slug => $meta) {
                    if (isset($dbCategories[$slug])) {
                        $cat = $dbCategories[$slug];
                        $menuCategories[] = [
                            'id' => $cat->id,
                            'name' => $cat->name,
                            'slug' => $slug,
                            'icon' => $meta['icon'],
                            'children' => $cat->children
                        ];
                    } else {
                        $menuCategories[] = [
                            'id' => 'fallback-' . $slug,
                            'name' => $meta['name'],
                            'slug' => $slug,
                            'icon' => $meta['icon'],
                            'children' => collect()
                        ];
                    }
                }
            @endphp

            @foreach($menuCategories as $i => $cat)
            <div class="wk-cat-sidebar-item {{ $i === 0 ? 'active' : '' }}" data-cat="cat-{{ $cat['id'] }}">
                <i class="{{ $cat['icon'] }}" style="color:var(--wk-primary);width:16px;text-align:center;"></i>
                <span style="flex:1;margin-left:8px;">{{ $cat['name'] }}</span>
                <i class="fas fa-chevron-right" style="margin-left:auto;font-size:9px;opacity:.3;"></i>
            </div>
            @endforeach
        </div>

        {{-- Right: Sub-categories --}}
        @foreach($menuCategories as $i => $cat)
        <div class="wk-cat-content {{ $i === 0 ? 'active' : '' }}" data-cat="cat-{{ $cat['id'] }}" style="padding:20px 24px;">
            <h4 style="font-size:14px;font-weight:700;color:var(--wk-primary);margin:0 0 16px;padding-bottom:10px;border-bottom:1px solid #f1f5f9;">
                <i class="fas fa-star" style="margin-right:6px;"></i> {{ $cat['name'] }}
            </h4>
            
            @if($cat['children']->isNotEmpty())
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;">
                    @foreach($cat['children'] as $child)
                    <a href="{{ route('shop.index') }}?categories[]={{ $child->slug }}" style="display:flex;align-items:center;gap:8px;padding:8px 12px;border:1px solid #f1f5f9;border-radius:6px;text-decoration:none;color:#334155;font-weight:500;font-size:13px;transition:all .2s;" onmouseover="this.style.borderColor='var(--wk-primary)';this.style.color='var(--wk-primary)'" onmouseout="this.style.borderColor='#f1f5f9';this.style.color='#334155'">
                        <i class="fas fa-angle-right" style="font-size:10px;opacity:.5;"></i>
                        {{ $child->name }}
                    </a>
                    @endforeach
                </div>
            @else
                <div style="color:#64748b;font-size:13px;font-style:italic;margin-bottom:16px;">
                    Xem tất cả sản phẩm thuộc danh mục {{ $cat['name'] }}
                </div>
                <div>
                    <a href="{{ route('shop.index') }}?categories[]={{ $cat['slug'] }}" class="wk-btn wk-btn-primary" style="display:inline-block;padding:8px 20px;font-size:13px;border-radius:6px;text-decoration:none;background:var(--wk-primary);color:#fff;font-weight:600;transition:all .2s;" onmouseover="this.style.background='var(--wk-primary-dark)'" onmouseout="this.style.background='var(--wk-primary)'">
                        Xem ngay →
                    </a>
                </div>
            @endif
        </div>
        @endforeach
    </div>
</nav>

{{-- ===================================================
     MOBILE HEADER
====================================================== --}}
<header class="wk-mobile-header d-lg-none">
    <div class="wk-mobile-header-inner">
        <div class="wk-mobile-header-top">
            <a href="{{ url('/wkcomputer') }}" class="wk-logo" style="text-decoration:none; display:flex; align-items:center;">
                <img src="https://WKcomputer.vn/wp-content/uploads/2025/10/1-removebg-preview-1-min.png.webp" alt="WKcomputer" style="height:36px; width:auto; max-width:150px; object-fit:contain;">
            </a>
            <div class="wk-mobile-header-icons">
                <a href="#" class="chat-icon"><i class="fab fa-facebook-messenger"></i></a>
                <a href="#" class="chat-icon text-zalo">Zalo</a>
            </div>
        </div>
        <div class="wk-mobile-header-search">
            <div style="position:relative;" id="wk-mobile-search-trigger">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Bạn muốn mua gì hôm nay..." readonly>
            </div>
        </div>
    </div>
    <div class="wk-mobile-header-curve"></div>
</header>

{{-- Mobile Search Modal --}}
<div class="wk-mobile-search-modal" id="wk-mobile-search-modal">
    <div class="wk-mobile-search-header">
        <button class="wk-mobile-search-back" id="wk-mobile-search-back" type="button"><i class="fas fa-chevron-left"></i></button>
        <form action="{{ route('shop.index') }}" method="GET" style="flex:1;position:relative;">
            <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;"></i>
            <input type="text" name="q" placeholder="Bạn muốn mua gì hôm nay..." id="wk-mobile-search-input-real" autocomplete="off">
        </form>
    </div>
    <div class="wk-mobile-search-body">
        <div id="wk-mobile-search-default">
            <div class="wk-mobile-search-title">TỪ KHÓA PHỔ BIẾN</div>
            <div class="wk-mobile-search-keywords">
                <button type="button" class="wk-keyword-btn" data-keyword="chuột không dây"><i class="fas fa-search"></i> chuột không dây</button>
                <button type="button" class="wk-keyword-btn" data-keyword="atk"><i class="fas fa-search"></i> atk</button>
                <button type="button" class="wk-keyword-btn" data-keyword="hp"><i class="fas fa-search"></i> hp</button>
                <button type="button" class="wk-keyword-btn" data-keyword="chuột máy tính"><i class="fas fa-search"></i> chuột máy tính</button>
                <button type="button" class="wk-keyword-btn" data-keyword="tai nghe"><i class="fas fa-search"></i> tai nghe</button>
                <button type="button" class="wk-keyword-btn" data-keyword="thẻ nhớ"><i class="fas fa-search"></i> thẻ nhớ</button>
                <button type="button" class="wk-keyword-btn" data-keyword="chuột"><i class="fas fa-search"></i> chuột</button>
                <button type="button" class="wk-keyword-btn" data-keyword="màn hình"><i class="fas fa-search"></i> màn hình</button>
                <button type="button" class="wk-keyword-btn" data-keyword="bàn phím"><i class="fas fa-search"></i> bàn phím</button>
                <button type="button" class="wk-keyword-btn" data-keyword="ssd"><i class="fas fa-search"></i> ssd</button>
            </div>
        </div>
        <div id="wk-mobile-search-results" style="display:none;"></div>
    </div>
</div>

{{-- ===================================================
     MOBILE OFFCANVAS MENU
====================================================== --}}


{{-- ===================================================
     MAIN CONTENT
====================================================== --}}
<main id="wk-main-content">
    @yield('content')
</main>

{{-- ===================================================
     FOOTER
====================================================== --}}
<footer class="wk-footer">
    {{-- Top Bar --}}
    <div class="wk-footer-top">
        <div class="wk-container">
            <div class="wk-footer-hotline">
                <div class="wk-footer-hotline-item">
                    <i class="fas fa-headset"></i>
                    <div>
                        <h5>Hotline tư vấn mua hàng</h5>
                        <p>1900 xxxx (Miễn phí)</p>
                    </div>
                </div>
                <div class="wk-footer-hotline-item">
                    <i class="fas fa-tools"></i>
                    <div>
                        <h5>Hotline bảo hành, sửa chữa</h5>
                        <p>1900 yyyy</p>
                    </div>
                </div>
                <div class="wk-footer-hotline-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h5>Email hỗ trợ</h5>
                        <p>support@WKcomputer.vn</p>
                    </div>
                </div>
                <div class="wk-footer-hotline-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h5>Giờ làm việc</h5>
                        <p>08:00 - 21:00 (T2 - T7)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main --}}
    <div class="wk-footer-main">
        <div class="wk-container">
            <div class="wk-footer-grid">
                {{-- Col 1: About --}}
                <div class="wk-footer-col">
                    <h4>WKcomputer</h4>
                    <p style="font-size:13px;color:#9ca3af;line-height:1.6;margin-bottom:16px;">
                        Hệ thống bán lẻ thiết bị công nghệ chính hãng hàng đầu Việt Nam. Chuyên cung cấp laptop, máy tính, linh kiện và phụ kiện công nghệ với chất lượng đảm bảo và dịch vụ chuyên nghiệp.
                    </p>
                    <div style="font-size:13px;display:flex;flex-direction:column;gap:8px;color:#9ca3af;margin-bottom:16px;">
                        <div><i class="fas fa-map-marker-alt" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>123 Đường Công Nghệ, Quận IT, TP.HCM</div>
                        <div><i class="fas fa-phone-alt" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>1900 xxxx</div>
                        <div><i class="fas fa-envelope" style="color:var(--wk-primary);margin-right:8px;width:14px;"></i>support@WKcomputer.vn</div>
                    </div>
                    <div class="wk-footer-socials">
                        <a href="#" class="wk-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="wk-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="wk-social-btn" title="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="wk-social-btn" title="Zalo"><i class="fas fa-comment"></i></a>
                    </div>
                </div>

                {{-- Col 2: Chính sách --}}
                <div class="wk-footer-col">
                    <h4>Chính Sách</h4>
                    <ul class="wk-footer-links">
                        <li><a href="{{ route('shop.show', 'chinh-sach-thanh-toan') }}"><i class="fas fa-angle-right"></i>Chính sách thanh toán</a></li>
                        <li><a href="{{ route('shop.show', 'chinh-sach-van-chuyen') }}"><i class="fas fa-angle-right"></i>Chính sách vận chuyển</a></li>
                        <li><a href="{{ route('shop.show', 'chinh-sach-bao-mat-thong-tin') }}"><i class="fas fa-angle-right"></i>Chính sách bảo mật</a></li>
                        <li><a href="{{ route('shop.show', 'chinh-sach-kiem-hang') }}"><i class="fas fa-angle-right"></i>Chính sách kiểm hàng</a></li>
                        <li><a href="{{ route('shop.show', 'quy-dinh-va-chinh-sach') }}"><i class="fas fa-angle-right"></i>Quy định & Chính sách</a></li>
                        <li><a href="{{ route('shop.show', 'thong-tin-ve-gia-san-pham') }}"><i class="fas fa-angle-right"></i>Thông tin về giá</a></li>
                    </ul>
                </div>

                {{-- Col 3: Hỗ trợ --}}
                <div class="wk-footer-col">
                    <h4>Hỗ Trợ</h4>
                    <ul class="wk-footer-links">
                        <li><a href="{{ route('shop.show', 'gioi-thieu-cong-ty') }}"><i class="fas fa-angle-right"></i>Giới thiệu công ty</a></li>
                        <li><a href="{{ route('order.track') }}"><i class="fas fa-angle-right"></i>Tra cứu đơn hàng</a></li>
                        <li><a href="{{ route('contact.index') }}"><i class="fas fa-angle-right"></i>Gửi yêu cầu hỗ trợ</a></li>
                        <li><a href="{{ route('blog.index') }}"><i class="fas fa-angle-right"></i>Tin tức công nghệ</a></li>
                        @auth
                        <li><a href="{{ route('profile') }}"><i class="fas fa-angle-right"></i>Đơn hàng của tôi</a></li>
                        @else
                        <li><a href="{{ route('login') }}"><i class="fas fa-angle-right"></i>Đăng nhập</a></li>
                        @endauth
                    </ul>
                </div>

                {{-- Col 4: Newsletter --}}
                <div class="wk-footer-col">
                    <h4>Đăng Ký Nhận Ưu Đãi</h4>
                    <p style="font-size:12px;color:#9ca3af;margin-bottom:12px;line-height:1.5;">Nhận ngay voucher 200k và thông tin khuyến mãi độc quyền!</p>
                    <div class="wk-footer-newsletter">
                        <form action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Nhập email của bạn..." required>
                            <button type="submit" class="wk-btn wk-btn-primary wk-btn-block" style="font-size:12px;padding:10px;">
                                <i class="fas fa-paper-plane"></i> Đăng ký
                            </button>
                        </form>
                    </div>

                    <div style="margin-top:20px;">
                        <h5 style="font-size:12px;color:#e5e7eb;margin-bottom:10px;font-weight:700;">ĐÃ THÔNG BÁO BỞI</h5>
                        <div style="display:flex;flex-wrap:wrap;gap:6px;">
                            <span style="background:rgba(255,255,255,.1);color:#9ca3af;font-size:10px;padding:4px 8px;border-radius:4px;">Bộ Công Thương</span>
                            <span style="background:rgba(255,255,255,.1);color:#9ca3af;font-size:10px;padding:4px 8px;border-radius:4px;">VNPT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom --}}
    <div class="wk-container">
        <div class="wk-footer-bottom">
            <div style="color:#6b7280;font-size:12px;">
                &copy; {{ date('Y') }} WKcomputer. All rights reserved.
                <span style="margin:0 6px;">|</span>
                Thiết kế bởi WKTeam
            </div>
            <div style="display:flex;align-items:center;gap:12px;">
                <span style="font-size:11px;color:#6b7280;">Phương thức thanh toán:</span>
                <div style="display:flex;gap:6px;align-items:center;">
                    @foreach(['VISA', 'Mastercard', 'MOMO', 'ZaloPay', 'COD'] as $pm)
                    <span style="background:rgba(255,255,255,.1);color:#9ca3af;font-size:10px;padding:3px 7px;border-radius:4px;border:1px solid rgba(255,255,255,.1);">{{ $pm }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- ===================================================
     MOBILE BOTTOM NAVIGATION
====================================================== --}}
<nav class="wk-bottom-nav d-lg-none">
    <div class="wk-bottom-nav-inner">
        <a href="{{ url('/wkcomputer') }}" class="wk-bottom-nav-item {{ request()->is('wkcomputer') || request()->routeIs('home') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
        </a>
        <button type="button" class="wk-bottom-nav-item btn-sheet-toggle" data-sheet="sheet-categories" style="background:none;border:none;padding:0;">
            <i class="fas fa-th-large"></i>
            <span>Danh mục</span>
        </button>
        <button type="button" class="wk-bottom-nav-item btn-sheet-toggle" data-sheet="sheet-cart" style="background:none;border:none;padding:0;position:relative;">
            <i class="fas fa-shopping-cart"></i>
            <span>Giỏ hàng</span>
            <span class="wk-cart-badge wk-cart-count" style="display:none;position:absolute;top:-4px;right:18px;background:var(--wk-primary);color:#fff;font-size:9px;width:14px;height:14px;border-radius:50%;align-items:center;justify-content:center;">0</span>
        </button>
        <button type="button" class="wk-bottom-nav-item btn-sheet-toggle" data-sheet="sheet-account" style="background:none;border:none;padding:0;">
            <i class="fas fa-user-circle"></i>
            <span>Tài khoản</span>
        </button>
    </div>
</nav>

{{-- Bottom Sheets --}}
<div class="wk-bottom-sheet" id="sheet-categories">
    <div class="wk-bottom-sheet-header">
        Danh mục sản phẩm
        <button type="button" class="wk-bottom-sheet-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="wk-bottom-sheet-content" style="display:flex;background:#fff;padding:0;">
        @php
            $mobileCategories = \App\Models\Wkcomputer\WkCategory::active()
                ->roots()
                ->with(['children' => function($q) {
                    $q->active()->orderBy('sort_order');
                }])
                ->orderBy('sort_order')
                ->get();

            $categoryIcons = [
                'man-hinh-may-tinh' => 'fas fa-tv',
                'linh-kien-may-tinh' => 'fas fa-microchip',
                'pc-gaming-streaming' => 'fas fa-desktop',
                'phim-chuot-ghe-game-gear' => 'fas fa-gamepad',
                'pc-van-phong-aio-mini-pc' => 'fas fa-building',
                'loa-tai-nghe-mic-webcam' => 'fas fa-headphones',
                'tan-nhiet-pc-cooling' => 'fas fa-fan',
                'thiet-bi-luu-tru-usb-the' => 'fas fa-hdd',
                'thiet-bi-mang-phan-mem' => 'fas fa-wifi',
                'may-choi-game-tay-game' => 'fas fa-gamepad',
                'laptop' => 'fas fa-laptop',
                'san-pham-apple' => 'fab fa-apple',
            ];
        @endphp

        {{-- Left sidebar --}}
        <div style="width:100px;background:#f8fafc;border-right:1px solid #f1f5f9;overflow-y:auto;flex-shrink:0;">
            @foreach($mobileCategories as $index => $cat)
                @php
                    $icon = $categoryIcons[$cat->slug] ?? 'fas fa-th-large';
                @endphp
                <div class="mobile-cat-tab {{ $index === 0 ? 'active' : '' }}" data-target="mcat-{{ $cat->id }}">
                    <i class="{{ $icon }}" style="font-size:24px;color:#1e293b;margin-bottom:8px;"></i>
                    <div style="font-size:11px;text-align:center;">{{ $cat->name }}</div>
                </div>
            @endforeach
        </div>

        {{-- Right content --}}
        <div style="flex:1;overflow-y:auto;padding:16px;">
            @foreach($mobileCategories as $index => $cat)
                <div id="mcat-{{ $cat->id }}" class="mobile-cat-pane {{ $index === 0 ? 'active' : '' }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                        <strong style="font-size:14px;text-transform:uppercase;">{{ $cat->name }}</strong>
                        <a href="{{ route('shop.index') }}?categories[]={{ $cat->slug }}" style="color:var(--wk-primary);">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    
                    @if($cat->children->isNotEmpty())
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                            @foreach($cat->children as $child)
                                <a href="{{ route('shop.index') }}?categories[]={{ $child->slug }}" class="mobile-filter-btn">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div style="color:#64748b;font-size:13px;font-style:italic;margin-bottom:16px;">
                            Xem tất cả sản phẩm thuộc danh mục {{ $cat->name }}
                        </div>
                        <div>
                            <a href="{{ route('shop.index') }}?categories[]={{ $cat->slug }}" class="mobile-filter-btn" style="display:inline-block;padding:8px 16px;background:var(--wk-primary);color:#fff;border-radius:4px;border:none;">
                                Xem ngay →
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="wk-bottom-sheet" id="sheet-cart">
    <div class="wk-bottom-sheet-header">
        Giỏ hàng
        <button type="button" class="wk-bottom-sheet-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="wk-bottom-sheet-content">
        <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:80px 20px;">
            <div style="width:120px;height:120px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
                <i class="fas fa-search" style="font-size:48px;color:#cbd5e1;"></i>
            </div>
            <p style="color:#64748b;font-size:14px;margin-bottom:24px;">Không có sản phẩm nào trong giỏ hàng</p>
            <a href="{{ route('cart.page') }}" class="wk-btn" style="background:var(--wk-primary);color:#fff;border-radius:8px;padding:10px 24px;font-weight:600;">
                Tới trang giỏ hàng
            </a>
        </div>
    </div>
</div>


<div class="wk-bottom-sheet" id="sheet-account">
    <div class="wk-bottom-sheet-header">
        Tài khoản
        <button type="button" class="wk-bottom-sheet-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="wk-bottom-sheet-content">
        <div class="wk-account-header">
            @auth
            <div style="font-weight:700;font-size:16px;">{{ auth()->user()->name }}</div>
            <div style="font-size:12px;opacity:.8;">{{ auth()->user()->email }}</div>
            @else
            <a href="{{ route('login') }}" style="display:inline-block;background:#fff;color:var(--wk-secondary);padding:10px 32px;border-radius:8px;font-weight:600;text-decoration:none;">Đăng ký / Đăng nhập</a>
            @endauth
        </div>
        <div class="wk-account-menu">
            <a href="{{ route('profile') }}" class="wk-account-menu-item"><i class="fas fa-clipboard-list"></i> Quản lý đơn hàng <i class="fas fa-chevron-right"></i></a>
            <a href="{{ route('wishlist') }}" class="wk-account-menu-item"><i class="fas fa-heart"></i> Sản phẩm yêu thích <i class="fas fa-chevron-right"></i></a>
            <a href="{{ route('profile') }}" class="wk-account-menu-item"><i class="fas fa-map-marker-alt"></i> Sổ địa chỉ <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="wk-account-menu-item"><i class="fas fa-shield-alt"></i> Chính sách và điều khoản <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="wk-account-menu-item"><i class="fas fa-store"></i> Hệ thống Showroom <i class="fas fa-chevron-right"></i></a>
            <a href="#" class="wk-account-menu-item"><i class="fas fa-cogs"></i> Xây dựng cấu hình <i class="fas fa-chevron-right"></i></a>
            <a href="tel:18006865" class="wk-account-menu-item"><i class="fas fa-headset"></i> Chăm sóc khách hàng <strong style="color:var(--wk-secondary);margin-left:4px;">1800 6865</strong></a>
            <a href="tel:18006867" class="wk-account-menu-item"><i class="fas fa-phone-alt"></i> Gọi mua hàng <strong style="color:var(--wk-secondary);margin-left:4px;">1800 6867</strong></a>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sheetToggles = document.querySelectorAll('.btn-sheet-toggle');
    const sheets = document.querySelectorAll('.wk-bottom-sheet');
    const sheetCloses = document.querySelectorAll('.wk-bottom-sheet-close');
    const navItems = document.querySelectorAll('.wk-bottom-nav-item');

    function closeAllSheets() {
        sheets.forEach(s => s.classList.remove('open'));
        navItems.forEach(n => n.classList.remove('active'));
    }

    sheetToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-sheet');
            const targetSheet = document.getElementById(targetId);
            
            if (targetSheet.classList.contains('open')) {
                targetSheet.classList.remove('open');
                this.classList.remove('active');
            } else {
                closeAllSheets();
                targetSheet.classList.add('open');
                this.classList.add('active');
            }
        });
    });

    sheetCloses.forEach(btn => {
        btn.addEventListener('click', function() {
            closeAllSheets();
        });
    });

    // Mobile Category Tabs
    const catTabs = document.querySelectorAll('.mobile-cat-tab');
    const catPanes = document.querySelectorAll('.mobile-cat-pane');
    catTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            catTabs.forEach(t => t.classList.remove('active'));
            catPanes.forEach(p => {
                p.classList.remove('active');
                p.style.display = 'none';
            });
            
            this.classList.add('active');
            const pane = document.getElementById(target);
            if(pane) {
                pane.classList.add('active');
                pane.style.display = 'block';
            }
        });
    });
});
</script>
<script>
window.wkEndpoints = {
    baseUrl: "{{ url('wkcomputer') }}",
    projectCode: "wkcomputer",
    cartAdd: "{{ route('cart.add') }}",
    cartCount: "{{ route('cart.count') }}",
    cartTotal: "{{ route('cart.total') }}",
    cartDropdown: "{{ route('cart.dropdown') }}",
    cartUpdate: "{{ route('cart.update') }}",
    cartRemove: "{{ route('cart.remove') }}",
    cartPage: "{{ route('cart.page') }}",
    checkout: "{{ route('checkout.index') }}",
    searchSuggest: "{{ route('shop.suggest') }}",
    csrfToken: "{{ csrf_token() }}"
};
</script>
<script src="{{ asset('themes/wkcomputerdemo/js/frontend.js') }}"></script>
@stack('scripts')
</body>
</html>
