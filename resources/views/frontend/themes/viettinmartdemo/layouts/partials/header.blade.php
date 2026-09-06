<!-- rts header area start -->
<div class="rts-header-one-area-one">
    @if(setting('topbar_show', '0') == '1')
        <div class="header-top-area" style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bwtween-area-header-top">
                            @php
                                $locale = app()->getLocale();
                                // Nếu có setting riêng cho locale này thì dùng, không thì để null → xuống Lang()
                                // Chỉ dùng setting('topbar_welcome') (không có suffix) khi locale là 'vi'
                                $topbarWelcome = setting('topbar_welcome_' . $locale)
                                    ?: ($locale === 'vi' ? setting('topbar_welcome') : null);
                                $topbarRightText = setting('topbar_right_text_' . $locale)
                                    ?: ($locale === 'vi' ? setting('topbar_right_text') : null);
                            @endphp
                            <div class="discount-area">
                                <p class="disc" style="color: inherit;">
                                    {{ $topbarWelcome ?: Lang('topbar_welcome_default') }}
                                </p>
                                @if(!$topbarWelcome)
                                    <div class="countdown">
                                        <div class="countDown">10/05/2026 10:20:00</div>
                                    </div>
                                @endif
                            </div>
                            <div class="contact-number-area">
                                <p style="color: inherit;">
                                    @if($topbarRightText)
                                        {{ $topbarRightText }}
                                    @else
                                        {{ Lang('need_help') }}
                                        <a href="tel:{{ str_replace(' ', '', setting('contact_phone', '+258 3268 21485')) }}"
                                            style="color: inherit;">{{ setting('contact_phone', '+258 3268 21485') }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="header-mid-one-wrapper" style="background: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-mid-wrapper-between">
                        <div class="nav-sm-left">
                            <ul class="nav-h_top">
                                @php $topbarMenu = \App\Models\Widget::getMenu('topbar'); @endphp
                                @if(count($topbarMenu) > 0)
                                    @foreach($topbarMenu as $item)
                                        <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] }}</a></li>
                                    @endforeach
                                @else
                                    <li><a href="{{ locale_route('shop.index') }}">{{ Lang('nav_about_us') }}</a></li>
                                    <li><a
                                            href="{{ locale_route('profile') }}">{{ Auth::check() ? Auth::user()->name : Lang('nav_my_account') }}</a>
                                    </li>
                                    <li><a href="{{ locale_route('wishlist') }}">{{ Lang('nav_wishlist') }}</a></li>
                                @endif
                            </ul>
                            <p class="para">
                                @php
                                    $locale = $locale ?? app()->getLocale();
                                    $welcomeText = setting('topbar_welcome_text_' . $locale)
                                        ?: ($locale === 'vi' ? setting('topbar_welcome_text') : null);
                                @endphp
                                {{ $welcomeText ?: Lang('topbar_welcome_text_default') }}
                            </p>
                        </div>
                        <div class="nav-sm-left">
                            <ul class="nav-h_top language">
                                @php
                                    $rawLangs = setting('languages', []);
                                    if (is_string($rawLangs)) {
                                        $rawLangs = json_decode($rawLangs, true) ?: [];
                                    }
                                    $currentLang = collect($rawLangs)->firstWhere('code', app()->getLocale());
                                    $currFlagUrl = is_array($currentLang) ? ($currentLang['flag_url'] ?? null) : ($currentLang->flag_url ?? null);
                                    $currFlagEmoji = is_array($currentLang) ? ($currentLang['flag_emoji'] ?? null) : ($currentLang->flag_emoji ?? null);
                                    $currName = is_array($currentLang) ? ($currentLang['native_name'] ?? $currentLang['name'] ?? null) : ($currentLang->native_name ?? $currentLang->name ?? null);
                                @endphp
                                <li class="category-hover-header language-hover relative group">
                                    <a href="#">
                                        @if($currFlagUrl)
                                            <img src="{{ $currFlagUrl }}" alt="{{ $currName }}"
                                                style="width:18px;height:12px;object-fit:cover;border-radius:2px;vertical-align:middle;margin-right:4px;">
                                        @elseif($currFlagEmoji)
                                            {{ $currFlagEmoji }}
                                        @endif
                                        {{ $currName ?? strtoupper(app()->getLocale()) }}
                                    </a>
                                    <ul class="category-sub-menu">
                                        @foreach(collect($rawLangs) as $lang)
                                            @php
                                                $lCode = is_array($lang) ? ($lang['code'] ?? '') : ($lang->code ?? '');
                                                $lFlagUrl = is_array($lang) ? ($lang['flag_url'] ?? null) : ($lang->flag_url ?? null);
                                                $lFlagEmoji = is_array($lang) ? ($lang['flag_emoji'] ?? null) : ($lang->flag_emoji ?? null);
                                                $lName = is_array($lang) ? ($lang['native_name'] ?? $lang['name'] ?? strtoupper($lCode)) : ($lang->native_name ?? $lang->name ?? strtoupper($lCode));
                                            @endphp
                                            @if($lCode && $lCode !== app()->getLocale())
                                                <li>
                                                    <a href="{{ function_exists('change_locale_url') ? change_locale_url($lCode) : url('?lang='.$lCode) }}" class="menu-item">
                                                        @if($lFlagUrl)
                                                            <img src="{{ $lFlagUrl }}" alt="{{ $lName }}"
                                                                style="width:18px;height:12px;object-fit:cover;border-radius:2px;vertical-align:middle;margin-right:4px;">
                                                        @elseif($lFlagEmoji)
                                                            <span>{{ $lFlagEmoji }}</span>
                                                        @endif
                                                        <span>{{ $lName }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>

                                @php $topbarRightMenu = \App\Models\Widget::getMenu('topbar_right'); @endphp
                                @if(count($topbarRightMenu) > 0)
                                    @foreach($topbarRightMenu as $item)
                                        <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] }}</a></li>
                                    @endforeach
                                @else
                                    <li><a href="{{ locale_route('order.track') }}">{{ Lang('nav_track_order') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper">
                            <a href="{{ locale_route('home') }}" class="logo-area">
                                <x-theme-image name="logo" :default="setting('site_logo')" :alt="setting('site_name', 'VietTinMart')" class="logo"
                                    style="max-height: {{ setting('logo_height', '45') }}px; width: auto;"
                                    loading="eager" fetchpriority="high" />
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <x-theme-icon name="category" :default="setting('icon_category_bar')"
                                        class="parent" />
                                    <span>{{ Lang('nav_categories') }}</span>
                                    <ul class="category-sub-menu" id="category-active-four-desktop"
                                        style="max-height: 450px; overflow-y: auto;">
                                        @foreach(\App\Models\ProjectProductCategory::where('is_active', true)->whereNull('parent_id')->orderBy('sort_order')->limit(-1)->get() as $cat)
                                            <li>
                                                <a href="{{ locale_route('shop.category', ['slug' => $cat->slug]) }}" class="menu-item">
                                                    <x-theme-icon :name="$cat->icon ?: 'placeholder'"
                                                        default="theme/images/icons/01.svg" />
                                                    <span>{{ $cat->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // ===== 1. CATEGORY MENU HOVER (Danh mục button) =====
                                        const catBtn = document.querySelector('.category-btn.category-hover-header');
                                        const catMenu = document.getElementById('category-active-four-desktop');

                                        if (catBtn && catMenu) {
                                            let categoryTimeout;
                                            
                                            catBtn.addEventListener('mouseenter', function() {
                                                clearTimeout(categoryTimeout);
                                                catMenu.style.cssText = 'display: block !important; visibility: visible !important; opacity: 1 !important; max-height: 450px !important; overflow-y: auto !important;';
                                            });
                                            
                                            catBtn.addEventListener('mouseleave', function() {
                                                categoryTimeout = setTimeout(() => {
                                                    catMenu.style.cssText = 'display: none !important; visibility: hidden !important; opacity: 0 !important;';
                                                }, 200);
                                            });

                                            catBtn.addEventListener('click', function(e) {
                                                if (window.innerWidth <= 991) {
                                                    e.preventDefault();
                                                    e.stopPropagation();
                                                    // Kiểm tra visibility hoặc computed style vì cssText dùng !important
                                                    const isVisible = window.getComputedStyle(catMenu).display !== 'none';
                                                    if (isVisible) {
                                                        catMenu.style.cssText = 'display: none !important; visibility: hidden !important; opacity: 0 !important; z-index: -1 !important;';
                                                    } else {
                                                        catMenu.style.cssText = 'display: block !important; visibility: visible !important; opacity: 1 !important; max-height: 450px !important; overflow-y: auto !important; z-index: 10002 !important;';
                                                    }
                                                }
                                            });
                                            
                                            catMenu.addEventListener('mouseenter', function() {
                                                clearTimeout(categoryTimeout);
                                            });
                                            
                                            catMenu.addEventListener('mouseleave', function() {
                                                catMenu.style.cssText = 'display: none !important; visibility: hidden !important; opacity: 0 !important;';
                                            });
                                            
                                            console.log('✅ Category menu initialized');
                                        }

                                        // ===== 2. CART DROPDOWN HOVER (Smooth hover with delay) =====
                                        const cartBtn = document.querySelector('.btn-border-only.cart.category-hover-header');
                                        const cartDropdown = cartBtn ? cartBtn.querySelector('.cart-dropdown-container') : null;

                                        console.log('🛒 Cart Debug:', {
                                            cartBtn: cartBtn,
                                            cartDropdown: cartDropdown,
                                            cartBtnExists: !!cartBtn,
                                            cartDropdownExists: !!cartDropdown
                                        });

                                        if (cartBtn && cartDropdown) {
                                            let cartHoverTimeout;
                                            let isCartHovered = false;
                                            let isDropdownHovered = false;

                                            // Show dropdown khi hover vào button
                                            cartBtn.addEventListener('mouseenter', function() {
                                                console.log('🛒 Mouse entered cart button - SHOWING');
                                                clearTimeout(cartHoverTimeout);
                                                isCartHovered = true;
                                                // Dùng setProperty với 'important' priority
                                                cartDropdown.style.setProperty('display', 'block', 'important');
                                                cartDropdown.style.setProperty('visibility', 'visible', 'important');
                                                cartDropdown.style.setProperty('opacity', '1', 'important');
                                                cartDropdown.style.setProperty('transform', 'translateY(0)', 'important');
                                                cartDropdown.style.setProperty('pointer-events', 'all', 'important');
                                                console.log('🛒 Dropdown styles applied:', cartDropdown.style.display);
                                            });

                                            // Delay hide khi rời button
                                            cartBtn.addEventListener('mouseleave', function(e) {
                                                console.log('🛒 Mouse left cart button - HIDING');
                                                isCartHovered = false;
                                                // Chỉ hide nếu không hover vào dropdown
                                                cartHoverTimeout = setTimeout(() => {
                                                    if (!isDropdownHovered) {
                                                        cartDropdown.style.setProperty('opacity', '0', 'important');
                                                        cartDropdown.style.setProperty('transform', 'translateY(-10px)', 'important');
                                                        cartDropdown.style.setProperty('pointer-events', 'none', 'important');
                                                        setTimeout(() => {
                                                            if (!isDropdownHovered && !isCartHovered) {
                                                                cartDropdown.style.setProperty('display', 'none', 'important');
                                                                cartDropdown.style.setProperty('visibility', 'hidden', 'important');
                                                            }
                                                        }, 200);
                                                    }
                                                }, 100);
                                            });

                                            // Keep visible khi hover vào dropdown
                                            cartDropdown.addEventListener('mouseenter', function() {
                                                console.log('🛒 Mouse entered dropdown');
                                                clearTimeout(cartHoverTimeout);
                                                isDropdownHovered = true;
                                            });

                                            // Hide khi rời dropdown
                                            cartDropdown.addEventListener('mouseleave', function() {
                                                console.log('🛒 Mouse left dropdown - HIDING');
                                                isDropdownHovered = false;
                                                cartHoverTimeout = setTimeout(() => {
                                                    if (!isCartHovered) {
                                                        cartDropdown.style.setProperty('opacity', '0', 'important');
                                                        cartDropdown.style.setProperty('transform', 'translateY(-10px)', 'important');
                                                        cartDropdown.style.setProperty('pointer-events', 'none', 'important');
                                                        setTimeout(() => {
                                                            if (!isDropdownHovered && !isCartHovered) {
                                                                cartDropdown.style.setProperty('display', 'none', 'important');
                                                                cartDropdown.style.setProperty('visibility', 'hidden', 'important');
                                                            }
                                                        }, 200);
                                                    }
                                                }, 100);
                                            });

                                            console.log('✅ Cart dropdown hover initialized');
                                        } else {
                                            console.error('❌ Cart dropdown NOT initialized:', {
                                                cartBtn: cartBtn,
                                                cartDropdown: cartDropdown
                                            });
                                        }

                                        // Mobile search button functionality
                                        const mobileSearchBtn = document.getElementById('searchs');
                                        const searchForm = document.getElementById('header-search-form');
                                        const searchInput = document.getElementById('header-search-input');
                                        
                                        if (mobileSearchBtn && searchForm && searchInput) {
                                            let isSearchVisible = false;
                                            
                                            mobileSearchBtn.addEventListener('click', function(e) {
                                                e.preventDefault();
                                                e.stopPropagation();
                                                
                                                if (window.innerWidth <= 768) {
                                                    // Mobile: toggle search form visibility
                                                    if (!isSearchVisible) {
                                                        // Show search form
                                                        searchForm.style.position = 'fixed';
                                                        searchForm.style.top = '70px';
                                                        searchForm.style.left = '10px';
                                                        searchForm.style.right = '10px';
                                                        searchForm.style.zIndex = '999999';
                                                        searchForm.style.background = 'white';
                                                        searchForm.style.padding = '15px';
                                                        searchForm.style.borderRadius = '8px';
                                                        searchForm.style.boxShadow = '0 10px 30px rgba(0,0,0,0.15)';
                                                        searchForm.style.border = '1px solid #e5e7eb';
                                                        searchForm.style.display = 'block';
                                                        
                                                        // Focus on input
                                                        setTimeout(() => {
                                                            searchInput.focus();
                                                        }, 100);
                                                        
                                                        isSearchVisible = true;
                                                        console.log('Mobile search form shown');
                                                    } else {
                                                        // Hide search form
                                                        searchForm.style.position = 'relative';
                                                        searchForm.style.top = 'auto';
                                                        searchForm.style.left = 'auto';
                                                        searchForm.style.right = 'auto';
                                                        searchForm.style.zIndex = 'auto';
                                                        searchForm.style.background = 'transparent';
                                                        searchForm.style.padding = '0';
                                                        searchForm.style.borderRadius = '0';
                                                        searchForm.style.boxShadow = 'none';
                                                        searchForm.style.border = 'none';
                                                        
                                                        isSearchVisible = false;
                                                        console.log('Mobile search form hidden');
                                                    }
                                                } else {
                                                    // Desktop: focus on search input
                                                    searchInput.focus();
                                                    console.log('Desktop search input focused');
                                                }
                                            });
                                            
                                            // Close mobile search when clicking outside
                                            document.addEventListener('click', function(e) {
                                                if (isSearchVisible && !searchForm.contains(e.target) && !mobileSearchBtn.contains(e.target)) {
                                                    // Reset search form styles
                                                    searchForm.style.position = 'relative';
                                                    searchForm.style.top = 'auto';
                                                    searchForm.style.left = 'auto';
                                                    searchForm.style.right = 'auto';
                                                    searchForm.style.zIndex = 'auto';
                                                    searchForm.style.background = 'transparent';
                                                    searchForm.style.padding = '0';
                                                    searchForm.style.borderRadius = '0';
                                                    searchForm.style.boxShadow = 'none';
                                                    searchForm.style.border = 'none';
                                                    
                                                    isSearchVisible = false;
                                                }
                                            });
                                            
                                            // Handle window resize
                                            window.addEventListener('resize', function() {
                                                if (window.innerWidth > 768 && isSearchVisible) {
                                                    // Reset to desktop mode
                                                    searchForm.style.position = 'relative';
                                                    searchForm.style.top = 'auto';
                                                    searchForm.style.left = 'auto';
                                                    searchForm.style.right = 'auto';
                                                    searchForm.style.zIndex = 'auto';
                                                    searchForm.style.background = 'transparent';
                                                    searchForm.style.padding = '0';
                                                    searchForm.style.borderRadius = '0';
                                                    searchForm.style.boxShadow = 'none';
                                                    searchForm.style.border = 'none';
                                                    
                                                    isSearchVisible = false;
                                                }
                                            });
                                        }
                                    });
                                </script>
                                <form action="{{ locale_route('shop.index') }}" class="search-header"
                                    id="header-search-form" style="position: relative;">
                                    <input name="q" type="text" id="header-search-input"
                                        placeholder="{{ Lang('search_placeholder') }}"
                                        required autocomplete="off">
                                    <button type="submit" class="rts-btn btn-primary radious-sm with-icon">
                                        <span class="btn-text">{{ Lang('search_btn') }}</span>
                                        <span class="arrow-icon"><i class="fa-light fa-magnifying-glass"></i></span>
                                        <span class="arrow-icon"><i class="fa-light fa-magnifying-glass"></i></span>
                                    </button>
                                    <div id="search-results-dropdown" class="search-results-dropdown"
                                        style="display:none;position:absolute;top:100%;left:0;right:0;background:#fff;border-radius:0 0 10px 10px;box-shadow:0 10px 30px rgba(0,0,0,.1);z-index:1000;max-height:500px;overflow-y:auto;border:1px solid #eee;margin-top:5px;">
                                    </div>
                                </form>
                            </div>
                            <div class="main-wrapper-action-2 d-flex">
                                <div class="accont-wishlist-cart-area-header">
                                    <a href="{{ locale_route('profile') }}" class="btn-border-only account">
                                        <x-theme-icon name="user" :default="setting('icon_user')" />
                                        <span>{{ Auth::check() ? Auth::user()->name : Lang('nav_account') }}</span>
                                    </a>
                                    <a href="{{ locale_route('wishlist') }}" class="btn-border-only wishlist">
                                        <x-theme-icon name="wishlist" :default="setting('icon_wishlist')" />
                                        <span class="text">{{ Lang('nav_wishlist') }}</span>
                                        <span class="number">{{ count(session()->get('wishlist', [])) }}</span>
                                    </a>
                                    <div class="btn-border-only cart category-hover-header">
                                        <x-theme-icon name="cart" :default="setting('icon_cart')" />
                                        <span class="text">{{ Lang('nav_cart') }}</span>
                                        <span class="number">{{ count(session()->get('cart', [])) }}</span>
                                        <div class="cart-dropdown-container">
                                            @include('layouts.partials.cart-dropdown')
                                        </div>
                                        <a href="{{ locale_route('cart.page') }}" class="over_link"></a>
                                    </div>
                                </div>
                                <div class="actions-area">
                                    
                                    <div class="menu-btn" id="menu-btn">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect width="20" height="2" fill="#1F1F25"></rect>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rts-header-nav-area-one header--sticky">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="nav-and-btn-wrapper">
                        <div class="nav-area">
                            <nav>
                                <ul class="parent-nav" id="main-navigation">
                                    {{-- Thêm menu Danh mục sản phẩm --}}
                                    
                                    
                                    @foreach(\App\Models\Widget::getMenu('header-menu') as $item)
                                        @php
                                            $hasChildren = !empty($item['children']);
                                        @endphp
                                        @if($hasChildren)
                                            <li class="has-dropdown">
                                                <a class="nav-link" href="{{ $item['url'] ?? '#' }}" target="{{ $item['target'] ?? '_self' }}">
                                                    @if(!empty($item['icon'])) <i class="{{ $item['icon'] }}"></i> @endif
                                                    @if(!empty($item['image'])) <img src="{{ media_url($item['image']) }}" style="width: 20px; height: 20px; object-fit: contain; margin-right: 5px; vertical-align: middle; border-radius: 2px;"> @endif
                                                    {{ $item['label'] }}
                                                    @if(!empty($item['badge']))
                                                        <span class="badge" style="font-size: 10px; padding: 2px 6px; border-radius: 10px; margin-left: 4px; color: #fff; background-color: {{ $item['badge_color'] ?: '#ef4444' }};">{{ $item['badge'] }}</span>
                                                    @endif
                                                </a>
                                                <ul class="submenu">
                                                    @foreach($item['children'] as $child)
                                                        <li><a href="{{ $child['url'] ?? '#' }}" target="{{ $child['target'] ?? '_self' }}">
                                                            @if(!empty($child['icon'])) <i class="{{ $child['icon'] }}"></i> @endif
                                                            @if(!empty($child['image'])) <img src="{{ media_url($child['image']) }}" style="width: 18px; height: 18px; object-fit: contain; margin-right: 5px; vertical-align: middle; border-radius: 2px;"> @endif
                                                            {{ $child['label'] }}
                                                            @if(!empty($child['badge']))
                                                                <span class="badge" style="font-size: 9px; padding: 1px 5px; border-radius: 10px; margin-left: 4px; color: #fff; background-color: {{ $child['badge_color'] ?: '#ef4444' }};">{{ $child['badge'] }}</span>
                                                            @endif
                                                        </a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="parent"><a class="nav-link"
                                                    href="{{ $item['url'] ?? '#' }}" target="{{ $item['target'] ?? '_self' }}">
                                                        @if(!empty($item['icon'])) <i class="{{ $item['icon'] }}"></i> @endif
                                                        @if(!empty($item['image'])) <img src="{{ media_url($item['image']) }}" style="width: 20px; height: 20px; object-fit: contain; margin-right: 5px; vertical-align: middle; border-radius: 2px;"> @endif
                                                        {{ $item['label'] }}
                                                        @if(!empty($item['badge']))
                                                            <span class="badge" style="font-size: 10px; padding: 2px 6px; border-radius: 10px; margin-left: 4px; color: #fff; background-color: {{ $item['badge_color'] ?: '#ef4444' }};">{{ $item['badge'] }}</span>
                                                        @endif
                                                    </a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="right-btn-area">
                            <a href="{{ locale_route('shop.index', ['filter' => 'trending']) }}"
                                class="btn-narrow">{{ Lang('header_btn_trending') }}</a>
                            <a href="{{ setting('header_btn_sale_url', locale_route('shop.index', ['filter' => 'sale'])) }}"
                               class="rts-btn btn-primary">
                                {{ Lang('header_btn_sale') }}
                                <span>{{ Lang('header_btn_sale_badge') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="side-bar" class="side-bar header-two">
    <button class="close-icon-menu"><i class="far fa-times"></i></button>
    <form action="{{ locale_route('shop.index') }}" class="search-input-area-menu mt--30" style="position: relative;">
        <input name="q" type="text" placeholder="{{ Lang('search_placeholder') }}" required 
               autocomplete="off" id="search-input">
        <button><i class="fa-light fa-magnifying-glass"></i></button>
        <div id="menu-search-results-dropdown" class="search-results-dropdown" 
             style="display:none;position:absolute;top:100%;left:0;right:0;background:#fff;border-radius:0 0 10px 10px;box-shadow:0 10px 30px rgba(0,0,0,.1);z-index:1000;max-height:400px;overflow-y:auto;border:1px solid #eee;margin-top:5px;"></div>
    </form>
    <div class="mobile-menu-nav-area tab-nav-btn mt--20">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab">{{ Lang('menu_tab_menu') }}</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab">{{ Lang('menu_tab_categories') }}</button>
            </div>
        </nav>

        <div class="mobile-language-switcher mt--20" style="padding: 0 20px;">
            <div class="dropdown">
                @php
                    $rawLangs = setting('languages', []);
                    if (is_string($rawLangs)) {
                        $rawLangs = json_decode($rawLangs, true) ?: [];
                    }
                    $currentLang = collect($rawLangs)->firstWhere('code', app()->getLocale());
                    $currFlagUrl = is_array($currentLang) ? ($currentLang['flag_url'] ?? null) : ($currentLang->flag_url ?? null);
                    $currName = is_array($currentLang) ? ($currentLang['native_name'] ?? $currentLang['name'] ?? null) : ($currentLang->native_name ?? $currentLang->name ?? null);
                @endphp
                <button
                    class="btn btn-outline-secondary dropdown-toggle w-100 d-flex align-items-center justify-content-between"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="border: 1px solid #eee; border-radius: 8px; padding: 10px 15px; background: #f9f9f9;">
                    <div class="d-flex align-items-center">
                        @if($currFlagUrl)
                            <img src="{{ $currFlagUrl }}" style="width:20px; margin-right:8px;">
                        @endif
                        <span>{{ $currName ?? strtoupper(app()->getLocale()) }}</span>
                    </div>
                </button>
                <ul class="dropdown-menu w-100">
                    @foreach(collect($rawLangs) as $lang)
                        @php
                            $lCode = is_array($lang) ? ($lang['code'] ?? '') : ($lang->code ?? '');
                            $lFlagUrl = is_array($lang) ? ($lang['flag_url'] ?? null) : ($lang->flag_url ?? null);
                            $lName = is_array($lang) ? ($lang['native_name'] ?? $lang['name'] ?? strtoupper($lCode)) : ($lang->native_name ?? $lang->name ?? strtoupper($lCode));
                        @endphp
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ function_exists('change_locale_url') ? change_locale_url($lCode) : url('?lang='.$lCode) }}">
                                @if($lFlagUrl)
                                    <img src="{{ $lFlagUrl }}" style="width:20px; margin-right:8px;">
                                @endif
                                {{ $lName }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel">
                <div class="mobile-menu-main">
                    <nav class="nav-main mainmenu-nav mt--30">
                        <ul class="mainmenu metismenu" id="mobile-menu-active">
                            @foreach(\App\Models\Widget::getMenu('header-menu') as $item)
                                @if(!empty($item['children']))
                                    <li class="has-droupdown">
                                        <a href="{{ $item['url'] ?? '#' }}" class="main" target="{{ $item['target'] ?? '_self' }}">
                                            @if(!empty($item['icon'])) <i class="{{ $item['icon'] }}" style="margin-right: 8px;"></i> @endif
                                            @if(!empty($item['image'])) <img src="{{ media_url($item['image']) }}" style="width: 24px; height: 24px; object-fit: contain; margin-right: 8px; vertical-align: middle;"> @endif
                                            {{ $item['label'] }}
                                            @if(!empty($item['badge']))
                                                <span class="badge" style="font-size: 10px; padding: 2px 6px; border-radius: 10px; margin-left: 6px; color: #fff; background-color: {{ $item['badge_color'] ?: '#ef4444' }};">{{ $item['badge'] }}</span>
                                            @endif
                                        </a>
                                        <ul class="submenu mm-collapse">
                                            @foreach($item['children'] as $child)
                                                <li><a class="mobile-menu-link"
                                                        href="{{ $child['url'] ?? '#' }}" target="{{ $child['target'] ?? '_self' }}">
                                                        @if(!empty($child['icon'])) <i class="{{ $child['icon'] }}" style="margin-right: 8px;"></i> @endif
                                                        @if(!empty($child['image'])) <img src="{{ media_url($child['image']) }}" style="width: 20px; height: 20px; object-fit: contain; margin-right: 8px; vertical-align: middle;"> @endif
                                                        {{ $child['label'] }}
                                                        @if(!empty($child['badge']))
                                                            <span class="badge" style="font-size: 9px; padding: 1px 5px; border-radius: 10px; margin-left: 4px; color: #fff; background-color: {{ $child['badge_color'] ?: '#ef4444' }};">{{ $child['badge'] }}</span>
                                                        @endif
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $item['url'] ?? '#' }}" class="main" target="{{ $item['target'] ?? '_self' }}">
                                        @if(!empty($item['icon'])) <i class="{{ $item['icon'] }}" style="margin-right: 8px;"></i> @endif
                                        @if(!empty($item['image'])) <img src="{{ media_url($item['image']) }}" style="width: 24px; height: 24px; object-fit: contain; margin-right: 8px; vertical-align: middle;"> @endif
                                        {{ $item['label'] }}
                                        @if(!empty($item['badge']))
                                            <span class="badge" style="font-size: 10px; padding: 2px 6px; border-radius: 10px; margin-left: 6px; color: #fff; background-color: {{ $item['badge_color'] ?: '#ef4444' }};">{{ $item['badge'] }}</span>
                                        @endif
                                    </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel">
                <div class="category-btn category-hover-header mobile-menu-category-wrapper mt--30">
                    <ul class="category-sub-menu metismenu" id="category-active-four-mobile"
                        style="max-height: 400px; overflow-y: auto;">
                        @foreach(\App\Models\ProjectProductCategory::where('is_active', true)->whereNull('parent_id')->orderBy('sort_order')->get() as $cat)
                            <li>
                                <a href="{{ locale_route('shop.category', ['slug' => $cat->slug]) }}" class="menu-item">
                                    @if($cat->icon)
                                        <img src="{{ $cat->icon_url }}" alt="{{ $cat->name }}">
                                    @else
                                        <img src="{{ asset('theme/images/icons/01.svg') }}" alt="{{ $cat->name }}">
                                    @endif
                                    <span>{{ $cat->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="button-area-main-wrapper-menuy-sidebar mt--50">
        <div class="contact-area">
            <div class="phone"><i class="fa-light fa-headset"></i><a
                    href="tel:{{ setting('contact_phone', '+258 3268 21485') }}">{{ setting('contact_phone', '+258 3268 21485') }}</a>
            </div>
            <div class="phone"><i class="fa-light fa-envelope"></i><a
                    href="mailto:{{ setting('contact_email', 'info@ekomart.com') }}">{{
                    setting('contact_email', 'info@ekomart.com') }}</a></div>
        </div>
        <div class="social-sidebar-area mt--20" style="padding: 0 20px;">
            <ul class="social-one-wrapper" style="display:flex;gap:15px;list-style:none;padding:0;margin:0;">
                @if(setting('social_links.facebook'))
                    <li><a href="{{ setting('social_links.facebook') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-brands fa-facebook-f"></i></a></li>
                @endif
                @if(setting('social_links.twitter'))
                    <li><a href="{{ setting('social_links.twitter') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-brands fa-twitter"></i></a></li>
                @endif
                @if(setting('social_links.youtube'))
                    <li><a href="{{ setting('social_links.youtube') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-brands fa-youtube"></i></a></li>
                @endif
                @if(setting('social_links.instagram'))
                    <li><a href="{{ setting('social_links.instagram') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-brands fa-instagram"></i></a></li>
                @endif
                @if(setting('social_links.tiktok'))
                    <li><a href="{{ setting('social_links.tiktok') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-brands fa-tiktok"></i></a></li>
                @endif
                @if(setting('social_links.zalo'))
                    <li><a href="{{ setting('social_links.zalo') }}" target="_blank" rel="noopener"
                            style="color:var(--color-primary);"><i class="fa-solid fa-comment-dots"></i></a></li>
                @endif
            </ul>
        </div>
        <div class="buton-area-bottom">
            @auth
                <a href="{{ locale_route('profile') }}" class="rts-btn btn-primary">{{ Lang('nav_account') }}</a>
            @else
                <a href="{{ locale_route('login') }}" class="rts-btn btn-primary">{{ Lang('btn_login') }}</a>
                <a href="{{ locale_route('register') }}" class="rts-btn btn-primary">{{ Lang('btn_register') }}</a>
            @endauth
        </div>
    </div>
</div>

<script>
(function () {
    // ── Search Suggestions ──────────────────────────────────────────────────
    var searchInput    = document.getElementById('header-search-input');
    var searchDropdown = document.getElementById('search-results-dropdown');
    var searchForm     = document.getElementById('header-search-form');

    if (!searchInput || !searchDropdown) return;

    var debounceTimer = null;
    var currentQuery  = '';

    searchInput.addEventListener('input', function () {
        var q = this.value.trim();
        clearTimeout(debounceTimer);

        if (q.length < 2) {
            hideDropdown();
            return;
        }

        debounceTimer = setTimeout(function () {
            fetchSuggestions(q);
        }, 250);
    });

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') hideDropdown();
    });

    document.addEventListener('click', function (e) {
        if (!searchForm.contains(e.target)) hideDropdown();
    });

    function fetchSuggestions(q) {
        currentQuery = q;
        fetch('{{ locale_route('shop.suggest') }}?q=' + encodeURIComponent(q), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            if (q !== currentQuery) return; // stale response
            renderDropdown(data, q);
        })
        .catch(function () { hideDropdown(); });
    }

    function renderDropdown(items, q) {
        if (!items || items.length === 0) {
            hideDropdown();
            return;
        }

        var html = '';
        items.forEach(function (name) {
            var highlighted = highlightMatch(escHtml(name), q);
            var url = '{{ locale_route('shop.index') }}?q=' + encodeURIComponent(name);
            html += '<a href="' + url + '" class="search-suggestion-item" style="display:flex;align-items:center;gap:10px;padding:10px 16px;text-decoration:none;color:#1e293b;border-bottom:1px solid #f1f5f9;transition:background .1s;">'
                  + '<i class="fa-light fa-magnifying-glass" style="color:#94a3b8;font-size:13px;flex-shrink:0;"></i>'
                  + '<span style="font-size:13.5px;font-weight:500;">' + highlighted + '</span>'
                  + '</a>';
        });

        // View all results link
        html += '<a href="{{ locale_route('shop.index') }}?q=' + encodeURIComponent(q) + '" style="display:flex;align-items:center;justify-content:center;gap:6px;padding:10px 16px;font-size:12.5px;font-weight:600;color:#2563eb;text-decoration:none;background:#f8fafc;">'
              + '<i class="fa-light fa-arrow-right" style="font-size:11px;"></i> Xem tất cả kết quả cho "<strong>' + escHtml(q) + '</strong>"'
              + '</a>';

        searchDropdown.innerHTML = html;
        searchDropdown.style.display = 'block';

        // Hover effect
        searchDropdown.querySelectorAll('.search-suggestion-item').forEach(function (el) {
            el.addEventListener('mouseenter', function () { this.style.background = '#f1f5f9'; });
            el.addEventListener('mouseleave', function () { this.style.background = ''; });
        });
    }

    function hideDropdown() {
        searchDropdown.style.display = 'none';
        searchDropdown.innerHTML = '';
    }

    function highlightMatch(text, q) {
        var escaped = q.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        return text.replace(new RegExp('(' + escaped + ')', 'gi'),
            '<strong style="color:#2563eb;">$1</strong>');
    }

    function escHtml(s) {
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
})();
</script>







