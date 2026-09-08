@php
    $slides = $slides ?? ($config['slides'] ?? []);
    $featuredCategories = $featuredCategories ?? collect();
    $showServices = $config['show_services'] ?? true;

    $getBannerImg = function($customVal, $settingKey, $defaultPath) {
        $val = !empty(trim((string)$customVal)) ? trim((string)$customVal) : (setting($settingKey) ?: $defaultPath);
        if (empty($val)) return '';
        if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://') || str_starts_with($val, '/')) {
            return $val;
        }
        return asset($val);
    };

    $rb1Image = $getBannerImg($config['rb1_image'] ?? null, 'wk_hero_rb1_image', '/storage/media/project-wkcomputer/1788832998_banner1-1-min.png.webp');
    $rb2Image = $getBannerImg($config['rb2_image'] ?? null, 'wk_hero_rb2_image', '/storage/media/project-wkcomputer/1788832999_banner2.png.webp');
    $b1Image  = $getBannerImg($config['b1_image'] ?? null, 'wk_hero_b1_image', '/storage/media/project-wkcomputer/1788832996_baner-1.jpg.webp');
    $b2Image  = $getBannerImg($config['b2_image'] ?? null, 'wk_hero_b2_image', '/storage/media/project-wkcomputer/1788832997_Baner-2.jpg.webp');
    $b3Image  = $getBannerImg($config['b3_image'] ?? null, 'wk_hero_b3_image', '/storage/media/project-wkcomputer/1788832997_baner-3.jpg.webp');
    $b4Image  = $getBannerImg($config['b4_image'] ?? null, 'wk_hero_b4_image', '/storage/media/project-wkcomputer/1788832998_baner-4.jpg.webp');

    $rb1Link = !empty(trim((string)($config['rb1_link'] ?? ''))) ? $config['rb1_link'] : setting('wk_hero_rb1_link', route('shop.index'));
    $rb2Link = !empty(trim((string)($config['rb2_link'] ?? ''))) ? $config['rb2_link'] : setting('wk_hero_rb2_link', route('shop.index'));
    $b1Link = !empty(trim((string)($config['b1_link'] ?? ''))) ? $config['b1_link'] : setting('wk_hero_b1_link', route('build_pc.index'));
    $b2Link = !empty(trim((string)($config['b2_link'] ?? ''))) ? $config['b2_link'] : setting('wk_hero_b2_link', route('shop.index'));
    $b3Link = !empty(trim((string)($config['b3_link'] ?? ''))) ? $config['b3_link'] : setting('wk_hero_b3_link', route('shop.index'));
    $b4Link = !empty(trim((string)($config['b4_link'] ?? ''))) ? $config['b4_link'] : setting('wk_hero_b4_link', route('shop.index'));
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
            
            .wk-hero-banner-item { border-radius: 8px; overflow: hidden; position: relative; display: block; transition: transform 0.25s ease, box-shadow 0.25s ease; }
            .wk-hero-banner-item:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.3); }
            .wk-hero-banner-item a { display: block; width: 100%; height: 100%; }
            .wk-hero-banner-item img { width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 8px; }

            /* Professional Interactive Hero Slider */
            .wk-hero-slider-container {
                position: relative;
                overflow: hidden;
                border-radius: 8px;
                user-select: none;
                -webkit-user-select: none;
                touch-action: pan-y;
            }
            .wk-slider-track {
                display: flex;
                width: 100%;
                height: 100%;
                transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
                will-change: transform;
            }
            .wk-slide-item {
                flex: 0 0 100%;
                width: 100%;
                height: 100%;
                position: relative;
                overflow: hidden;
            }
            .wk-slide-item a {
                display: block;
                width: 100%;
                height: 100%;
            }
            .wk-slide-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }
            .wk-slider-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 38px;
                height: 38px;
                border-radius: 50%;
                background: rgba(18, 18, 18, 0.6);
                backdrop-filter: blur(4px);
                -webkit-backdrop-filter: blur(4px);
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.25);
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 25;
                opacity: 0;
                transition: all 0.25s ease;
                outline: none;
                font-size: 13px;
            }
            .wk-hero-slider-container:hover .wk-slider-nav {
                opacity: 1;
            }
            .wk-slider-prev { left: 12px; }
            .wk-slider-next { right: 12px; }
            .wk-slider-nav:hover {
                background: #00d2ff;
                color: #000;
                border-color: #00d2ff;
                transform: translateY(-50%) scale(1.1);
                box-shadow: 0 0 14px rgba(0, 210, 255, 0.8);
            }
            .wk-slider-dots {
                position: absolute;
                bottom: 12px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 8px;
                z-index: 25;
                align-items: center;
                background: rgba(0, 0, 0, 0.45);
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                padding: 5px 12px;
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.15);
            }
            .wk-slider-dot {
                width: 8px;
                height: 8px;
                border-radius: 4px;
                background: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
                display: inline-block;
            }
            .wk-slider-dot.active {
                width: 24px;
                background: #00d2ff;
                box-shadow: 0 0 8px rgba(0, 210, 255, 0.8);
            }
            .wk-slider-dot:hover:not(.active) {
                background: rgba(255, 255, 255, 0.9);
            }
            
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
                    <div class="wk-hero-slider-container" 
                         data-autoplay="{{ $config['autoplay_delay'] ?? 4500 }}"
                         style="flex:1; border-radius:8px; overflow:hidden; position:relative;">
                        @if(setting('wk_hero_title') && setting('wk_hero_title') !== 'SHOW ĐIỂM<br>GIẢM SÂU')
                        <div class="wk-hero-custom-title-banner" style="position:absolute;top:10px;left:10px;z-index:15;background:rgba(0,0,0,0.7);color:#fff;padding:6px 14px;border-radius:4px;font-weight:700;">
                            {!! setting('wk_hero_title') !!}
                        </div>
                        @endif
                        <div class="wk-slider-track">
                            @foreach($slides as $idx => $s)
                            <div class="wk-slide-item" data-slide-index="{{ $idx }}">
                                <a href="{{ $s['btn_link'] ?? '/wkcomputer/cua-hang' }}" title="{{ $s['title'] ?? 'Slide '.($idx + 1) }}">
                                    <img src="{{ $s['image'] }}" alt="{{ $s['title'] ?? 'Slide '.($idx + 1) }}" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @if(count($slides) > 1)
                        <button type="button" class="wk-slider-nav wk-slider-prev" aria-label="Slide trước">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button type="button" class="wk-slider-nav wk-slider-next" aria-label="Slide tiếp theo">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="wk-slider-dots">
                            @foreach($slides as $idx => $s)
                            <span class="wk-slider-dot {{ $idx === 0 ? 'active' : '' }}" data-slide="{{ $idx }}" title="Slide {{ $idx + 1 }}"></span>
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
                        <div class="wk-hero-banner-item" style="flex:1;">
                            <a href="{{ $rb1Link }}" style="text-decoration:none;display:block;height:100%;">
                                <img src="{{ $rb1Image }}" alt="{{ setting('wk_hero_rb1_tag', 'Ưu đãi học sinh sinh viên') }}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
                            </a>
                        </div>
                        <div class="wk-hero-banner-item" style="flex:1;">
                            <a href="{{ $rb2Link }}" style="text-decoration:none;display:block;height:100%;">
                                <img src="{{ $rb2Image }}" alt="{{ setting('wk_hero_rb2_tag', 'Khuyến mãi tháng này') }}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Bottom: 4 small banners --}}
                <div class="wk-hero-bottom-row" style="display:flex; gap:12px; height: 180px;">
                    <div class="wk-hero-banner-item" style="flex:1;">
                        <a href="{{ $b1Link }}" style="text-decoration:none;display:block;height:100%;">
                            <img src="{{ $b1Image }}" alt="{{ setting('wk_hero_b1_title', 'Build PC') }}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
                        </a>
                    </div>
                    <div class="wk-hero-banner-item" style="flex:1;">
                        <a href="{{ $b2Link }}" style="text-decoration:none;display:block;height:100%;">
                            <img src="{{ $b2Image }}" alt="Laptop Gaming" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
                        </a>
                    </div>
                    <div class="wk-hero-banner-item" style="flex:1;">
                        <a href="{{ $b3Link }}" style="text-decoration:none;display:block;height:100%;">
                            <img src="{{ $b3Image }}" alt="iPhone & Phụ Kiện" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
                        </a>
                    </div>
                    <div class="wk-hero-banner-item" style="flex:1;">
                        <a href="{{ $b4Link }}" style="text-decoration:none;display:block;height:100%;">
                            <img src="{{ $b4Image }}" alt="Màn Hình Máy Tính" style="width:100%;height:100%;object-fit:cover;border-radius:8px;display:block;">
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

<script>
(function() {
    function initWkHeroSliders() {
        var sliders = document.querySelectorAll('.wk-hero-slider-container');
        sliders.forEach(function(slider) {
            if (slider.dataset.sliderInit === 'true') {
                return;
            }
            slider.dataset.sliderInit = 'true';

            var track = slider.querySelector('.wk-slider-track');
            var slides = slider.querySelectorAll('.wk-slide-item');
            var dots = slider.querySelectorAll('.wk-slider-dot');
            var prevBtn = slider.querySelector('.wk-slider-prev');
            var nextBtn = slider.querySelector('.wk-slider-next');
            var total = slides.length;
            if (total <= 1 || !track) {
                return;
            }

            var currentIndex = 0;
            var timer = null;
            var delay = parseInt(slider.dataset.autoplay, 10) || 4500;

            function goTo(index) {
                if (index < 0) {
                    index = total - 1;
                }
                if (index >= total) {
                    index = 0;
                }
                currentIndex = index;
                track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';
                dots.forEach(function(d, i) {
                    if (i === currentIndex) {
                        d.classList.add('active');
                    } else {
                        d.classList.remove('active');
                    }
                });
            }

            function next() {
                goTo(currentIndex + 1);
            }

            function prev() {
                goTo(currentIndex - 1);
            }

            function startTimer() {
                stopTimer();
                timer = setInterval(next, delay);
            }

            function stopTimer() {
                if (timer) {
                    clearInterval(timer);
                    timer = null;
                }
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    next();
                    startTimer();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    prev();
                    startTimer();
                });
            }

            dots.forEach(function(dot) {
                dot.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var targetIdx = parseInt(this.getAttribute('data-slide'), 10);
                    if (!isNaN(targetIdx)) {
                        goTo(targetIdx);
                        startTimer();
                    }
                });
            });

            slider.addEventListener('mouseenter', stopTimer);
            slider.addEventListener('mouseleave', startTimer);

            // Touch / mobile swipe support
            var startX = 0;
            var isDragging = false;

            slider.addEventListener('touchstart', function(e) {
                stopTimer();
                if (e.touches && e.touches.length > 0) {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                }
            }, { passive: true });

            slider.addEventListener('touchend', function(e) {
                if (!isDragging) {
                    return;
                }
                isDragging = false;
                if (e.changedTouches && e.changedTouches.length > 0) {
                    var diff = e.changedTouches[0].clientX - startX;
                    if (diff > 40) {
                        prev();
                    } else if (diff < -40) {
                        next();
                    }
                }
                startTimer();
            }, { passive: true });

            startTimer();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWkHeroSliders);
    } else {
        initWkHeroSliders();
    }
    window.initWkSliders = initWkHeroSliders;
    setTimeout(initWkHeroSliders, 120);
})();
</script>
