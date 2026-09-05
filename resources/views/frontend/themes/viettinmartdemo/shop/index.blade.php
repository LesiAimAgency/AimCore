@extends('layouts.app')

@section('title', setting('shop_meta_title', 'Cửa hàng - ' . setting('site_name')))
@section('meta_description', setting('shop_meta_description'))
@section('meta_keywords', setting('shop_meta_keywords'))

@push('styles')
    <style>
        /* ===== SIDEBAR ===== */
        .sidebar-filter-main .single-filter-box {
            margin-bottom: 24px;
        }

        .sidebar-filter-main .single-filter-box .title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 2px solid #f0f0f0;
            color: #222;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* Override update.css .single-category for sidebar only */
        .sidebar-filter-main .category-wrapper .single-category {
            margin-bottom: 4px;
            display: flex !important;
            align-items: center;
            position: relative;
            padding: 6px 10px;
            border-radius: 8px;
            transition: background .15s;
            border: none !important;
            cursor: pointer;
        }

        .sidebar-filter-main .category-wrapper .single-category:hover {
            background: #f5f5f5 !important;
        }

        /* Checked state cho checkbox/radio trong sidebar filter */
        .sidebar-filter-main .category-wrapper .single-category input:checked ~ label::before {
            background: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
        }
        .sidebar-filter-main .category-wrapper .single-category input:checked ~ label {
            color: var(--color-primary);
            font-weight: 600;
        }

        /* ===== FILTER BADGES ===== */
        .filter-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
            /* ← prevent text wrapping */
            background: #fff0f0;
            color: var(--color-primary);
            border: 1px solid rgba(212, 0, 0, .25);
            border-radius: 100px;
            padding: 3px 10px 3px 12px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.4;
            flex-shrink: 0;
        }

        .filter-status-badge button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            color: inherit;
            font-size: 15px;
            line-height: 1;
            display: flex;
            align-items: center;
            opacity: .7;
            transition: opacity .15s;
        }

        .filter-status-badge button:hover {
            opacity: 1;
        }

        /* ===== TOP TOOLBAR ===== */
        .shop-top-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 10px 18px;
            margin-bottom: 20px;
            flex-wrap: nowrap;
        }

        .shop-top-toolbar .result-count {
            font-size: 13px;
            color: #777;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .shop-top-toolbar .result-count strong {
            color: #333;
        }

        .shop-toolbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            justify-content: flex-end;
            min-width: 0;
        }

        .shop-active-filters {
            display: flex;
            flex-wrap: nowrap;
            /* keep badges in 1 row */
            gap: 5px;
            overflow-x: auto;
            /* horizontal scroll if too many */
            max-width: 100%;
            scrollbar-width: none;
        }

        .shop-active-filters::-webkit-scrollbar {
            display: none;
        }

        /* Sort select clean style */
        .shop-sort-select {
            flex-shrink: 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            background: #fff;
            cursor: pointer;
            outline: none;
            appearance: auto;
            min-width: 170px;
            display: flex;
            align-items: center;
        }

        .shop-sort-select:focus {
            border-color: var(--color-primary);
        }

        /* ===== BUTTONS ===== */
        .btn-reset-filter {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 8px;
            padding: 9px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            color: #555;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-reset-filter:hover {
            background: #fff0f0;
            color: var(--color-primary);
            border-color: var(--color-primary);
        }

        /* ===== LOADING OVERLAY ===== */
        .shop-loading-overlay {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .75);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: 8px;
        }

        .shop-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid #eee;
            border-top-color: var(--color-primary);
            border-radius: 50%;
            animation: shopSpin .7s linear infinite;
        }

        @keyframes shopSpin {
            to {
                transform: rotate(360deg);
            }
        }

        #product-grid-wrapper {
            position: relative;
            min-height: 200px;
        }

        /* ===== APPENDING / ALL LOADED ===== */
        #scroll-sentinel {
            height: 40px;
        }

        .appending-indicator {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 14px;
            display: none;
        }

        .appending-indicator.visible {
            display: block;
        }

        .appending-indicator .mini-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-top-color: var(--color-primary);
            border-radius: 50%;
            animation: shopSpin .7s linear infinite;
            vertical-align: middle;
            margin-right: 8px;
        }


        /* ===== ALL LOADED MSG ===== */
        .all-loaded-msg {
            text-align: center;
            padding: 24px;
            color: #aaa;
            font-size: 14px;
            border-top: 1px dashed #eee;
            margin-top: 20px;
        }
    </style>
@endpush

@section('content')

    {{-- Breadcrumb --}}
    <div class="rts-navigation-area-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="{{ locale_route('home') }}">{{ Lang('home') }}</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="{{ locale_route('shop.index') }}">{{ Lang('shop') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-seperator">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

    @php
        $initCategories = json_encode($activeFilters['categories'] ?? []);
        $initSort = $activeFilters['sort'] ?? 'default';
        $initInStock = ($activeFilters['in_stock'] ?? false) ? 'true' : 'false';
        $initOnSale = ($activeFilters['on_sale'] ?? false) ? 'true' : 'false';
        $initMinPrice = $activeFilters['min_price'] ?? '';
        $initMaxPrice = $activeFilters['max_price'] ?? '';
        $initPreset = $activeFilters['price_preset'] ?? '';
        $initLastPage = $products->lastPage();
        $initTotal = $products->total();
        $initFrom = $products->firstItem() ?? 0;
        $initTo = $products->lastItem() ?? 0;
        $initHasMore = $products->hasMorePages() ? 'true' : 'false';
        $shopUrl = locale_route('shop.index');
        $filterType = $priceFilterType ?? 'presets';
        $presets = $pricePresets ?? [];
        $shopLayout = get_theme_layout('product_category');
        $contentCols = ($shopLayout === 'full-width') ? 'col-12' : 'col-xl-9 col-lg-12';
        $contentOrder = ($shopLayout === 'sidebar-right') ? 'order-xl-1' : 'order-xl-2';
        $sidebarSpacing = ($shopLayout === 'sidebar-right') ? 'pl--70 pl_lg--10 pl_sm--10 pl_md--5' : 'pr--70 pr_lg--10 pr_sm--10 pr_md--5';
        $sidebarOrder = ($shopLayout === 'sidebar-right') ? 'order-xl-2' : 'order-xl-1';
    @endphp

    {{-- Main Shop Area --}}
    <div class="shop-grid-sidebar-area rts-section-gap" x-data="shopFilter()" x-init="init()">

        <div class="container">
            <div class="row g-0">

                @if($shopLayout !== 'full-width')
                {{-- ===== SIDEBAR ===== --}}
                <div class="col-xl-3 col-lg-12 {{ $sidebarSpacing }} rts-sticky-column-item {{ $sidebarOrder }}">
                    <div class="sidebar-filter-main theiaStickySidebar">

                        {{-- Categories --}}
                        <div class="single-filter-box">
                            <h5 class="title">{{ __('filter_by_category') }}</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    @foreach($categories as $cat)
                                        <div class="single-category">
                                            <input type="checkbox" id="cat-{{ $cat->id }}" value="{{ $cat->slug }}"
                                                x-bind:checked="categories.includes('{{ $cat->slug }}')"
                                                @change="toggleCategory('{{ $cat->slug }}')">
                                            <label for="cat-{{ $cat->id }}">{{ $cat->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Trạng thái --}}
                        <div class="single-filter-box">
                            <h5 class="title">{{ Lang('status') }}</h5>
                            <div class="filterbox-body">
                                <div class="category-wrapper">
                                    <div class="single-category">
                                        <input type="checkbox" id="in_stock" x-model="inStock" @change="filterChange()">
                                        <label for="in_stock">{{ __('product_in_stock') }}</label>
                                    </div>
                                    <div class="single-category">
                                        <input type="checkbox" id="on_sale" x-model="onSale" @change="filterChange()">
                                        <label for="on_sale">{{ Lang('on_sale') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Khoảng giá --}}
                        <div class="single-filter-box">
                            <h5 class="title">{{ __('price_range') }}</h5>
                            <div class="filterbox-body">

                                @if(in_array($filterType, ['presets', 'both']) && !empty($presets))
                                    <div class="category-wrapper mb-3">
                                        <div class="single-category">
                                            <input type="radio" name="price_preset" id="preset-all" value=""
                                                x-model="pricePreset" @change="setPreset('', '', '')">
                                            <label for="preset-all">{{ __('all_price_ranges') }}</label>
                                        </div>
                                        @foreach($presets as $i => $preset)
                                            @php $pKey = $preset['min'] . '_' . $preset['max']; @endphp
                                            <div class="single-category">
                                                <input type="radio" name="price_preset" id="preset-{{ $i }}" value="{{ $pKey }}"
                                                    x-model="pricePreset"
                                                    @change="setPreset('{{ $pKey }}', '{{ $preset['min'] }}', '{{ $preset['max'] }}')">
                                                <label for="preset-{{ $i }}">{{ translate_price_preset($preset['label']) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if(in_array($filterType, ['slider', 'both']))
                                    <div class="price-input-area">
                                        <div class="half-input-wrapper">
                                            <div class="single">
                                                <label>{{ __('price_from') }}</label>
                                                <input type="number" x-model="minPrice" placeholder="0" min="0"
                                                    @change="filterChange()">
                                            </div>
                                            <div class="single">
                                                <label>{{ __('price_to') }}</label>
                                                <input type="number" x-model="maxPrice" placeholder="{{ __('no_limit') }}" min="0"
                                                    @change="filterChange()">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        {{-- Reset --}}
                        <button type="button" class="btn-reset-filter" @click="resetFilters()">
                            <i class="fa-solid fa-rotate-left me-2"></i> {{ __('clear_filters') }}
                        </button>

                    </div>
                </div>
                @endif

                {{-- ===== MAIN CONTENT ===== --}}
                <div class="{{ $contentCols }} {{ $contentOrder }}">

                    {{-- Top toolbar --}}
                    <div class="shop-top-toolbar">
                        {{-- Left: result count --}}
                        <span class="result-count" x-html="statusText"></span>

                        {{-- Right: badges + sort --}}
                        <div class="shop-toolbar-right">

                            {{-- Active filter badges --}}
                            <div class="shop-active-filters">
                                <template x-for="slug in categories" :key="slug">
                                    <span class="filter-status-badge">
                                        <span x-text="getCatName(slug)"></span>
                                        <button @click="toggleCategory(slug)" title="Xóa">×</button>
                                    </span>
                                </template>
                                <span class="filter-status-badge" x-show="inStock">
                                    {{ __('product_in_stock') }}
                                    <button @click="inStock=false; filterChange()" title="{{ __('action_close') }}">×</button>
                                </span>
                                <span class="filter-status-badge" x-show="onSale">
                                    {{ Lang('on_sale') }}
                                    <button @click="onSale=false; filterChange()" title="{{ Lang('delete') }}">×</button>
                                </span>
                                <span class="filter-status-badge" x-show="minPrice || maxPrice">
                                    <span x-text="priceRangeLabel"></span>
                                    <button @click="minPrice=''; maxPrice=''; pricePreset=''; filterChange()"
                                        title="{{ Lang('delete') }}">×</button>
                                </span>
                            </div>

                            {{-- Sort --}}
                            <select id="shop-sort-select" class="shop-sort-select" x-model="sort" @change="filterChange()">
                                <option value="default">{{ __('sort_default') }}</option>
                                <option value="newest">{{ __('sort_newest') }}</option>
                                <option value="price_asc">{{ __('sort_price_asc') }}</option>
                                <option value="price_desc">{{ __('sort_price_desc') }}</option>
                            </select>
                        </div>
                    </div>

                    {{-- Product Grid --}}
                    <div id="product-grid-wrapper">
                        {{-- Loading overlay --}}
                        <div class="shop-loading-overlay" x-show="loading" x-transition>
                            <div class="shop-spinner"></div>
                        </div>

                        <div class="row g-4" id="product-grid">
                            {{-- Server-side rendered (first load) --}}
                            @forelse($products as $product)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <x-product-card :product="$product" />
                                </div>
                            @empty
                                <div class="col-12">
                                    <x-ui.empty-state 
                                        icon="fa-box-open"
                                        :title="__('message_no_products_found')"
                                        :description="__('search_try_different_filters')"
                                        size="md" />
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Appending indicator --}}
                    <div class="appending-indicator" :class="{ visible: appending }">
                        <span class="mini-spinner"></span> {{ __('action_loading_more') }}
                    </div>

                    {{-- All loaded message --}}
                    <div class="all-loaded-msg" x-show="!hasMore && total > 0 && page > 1">
                        <i class="fa-regular fa-circle-check me-2"></i>
                        {{ __('pagination_showing_all') }} <strong x-text="total"></strong> {{ __('pagination_products') }}
                    </div>

                    {{-- Infinite scroll sentinel --}}
                    <div id="scroll-sentinel"></div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        (function () {
            // Category map for badge labels
            const categoryMap = {
                @foreach($categories as $cat)
                    '{{ $cat->slug }}': '{{ addslashes($cat->name) }}',
                @endforeach
                                    };

        // Initial state from server
        const SHOP_URL = '{{ $shopUrl }}';
        const INIT = {
            categories: {!! $initCategories !!},
            sort: '{{ $initSort }}',
            inStock:     {{ $initInStock }},
            onSale:      {{ $initOnSale }},
            minPrice: '{{ $initMinPrice }}',
            maxPrice: '{{ $initMaxPrice }}',
            pricePreset: '{{ $initPreset }}',
            lastPage:    {{ $initLastPage }},
            total:       {{ $initTotal }},
            from:        {{ $initFrom }},
            to:          {{ $initTo }},
            hasMore:     {{ $initHasMore }},
        };

        document.addEventListener('alpine:init', () => {
            Alpine.data('shopFilter', () => ({
                // Filter state
                categories: INIT.categories,
                sort: INIT.sort,
                inStock: INIT.inStock,
                onSale: INIT.onSale,
                minPrice: INIT.minPrice,
                maxPrice: INIT.maxPrice,
                pricePreset: INIT.pricePreset,

                // Pagination state
                page: 1,
                lastPage: INIT.lastPage,
                total: INIT.total,
                from: INIT.from,
                to: INIT.to,
                hasMore: INIT.hasMore,

                // UI state
                loading: false,
                appending: false,
                _debounce: null,

                // Computed
                get statusText() {
                    if (this.loading) return '{{ __('frontend.action_loading') }}';
                    if (this.total === 0) return '{{ __('frontend.message_no_products_found') }}';
                    if (this.from && this.to) {
                        return `{{ __('frontend.pagination_showing') }} ${this.from}–${this.to} {{ __('frontend.pagination_of') }} ${this.total} {{ __('frontend.pagination_products') }}`;
                    }
                    return `${this.total} {{ __('frontend.pagination_products') }}`;
                },
                get priceRangeLabel() {
                    const fromLabel = '{{ __('price_from') }}';
                    const toLabel   = '{{ __('price_to') }}';
                    const currency  = '{{ setting('currency_symbol', '₫') }}';
                    const locale    = '{{ app()->getLocale() }}' === 'vi' ? 'vi-VN' : 'en-US';
                    const parts = [];
                    if (this.minPrice) parts.push(fromLabel + ' ' + Number(this.minPrice).toLocaleString(locale) + currency);
                    if (this.maxPrice) parts.push(toLabel + ' ' + Number(this.maxPrice).toLocaleString(locale) + currency);
                    return parts.join(' ');
                },

                getCatName(slug) {
                    return categoryMap[slug] || slug;
                },

                init() {
                    this.$nextTick(() => this.setupInfiniteScroll());
                },

                buildParams(page = 1) {
                    const p = new URLSearchParams();
                    this.categories.forEach(c => p.append('categories[]', c));
                    p.set('sort', this.sort);
                    if (this.inStock) p.set('in_stock', '1');
                    if (this.onSale) p.set('on_sale', '1');
                    if (this.minPrice) p.set('min_price', this.minPrice);
                    if (this.maxPrice) p.set('max_price', this.maxPrice);
                    if (this.pricePreset) p.set('price_preset', this.pricePreset);
                    p.set('page', page);
                    return p;
                },

                async fetchProducts(page = 1, append = false) {
                    if (append) { this.appending = true; }
                    else { this.loading = true; }

                    const params = this.buildParams(page);

                    try {
                        const res = await fetch(`${SHOP_URL}?${params.toString()}`, {
                            headers: { 'X-Requested-With': 'XMLHttpRequest' }
                        });
                        if (!res.ok) throw new Error('Network error');
                        const data = await res.json();

                        const grid = document.getElementById('product-grid');

                        if (append) {
                            // Thêm card mới vào cuối
                            const tmp = document.createElement('div');
                            tmp.innerHTML = data.html;
                            while (tmp.firstChild) {
                                grid.appendChild(tmp.firstChild);
                            }
                        } else {
                            // Thay toàn bộ grid
                            grid.innerHTML = data.html;
                            // Scroll ngược lên vùng product
                            const wrapper = document.getElementById('product-grid-wrapper');
                            if (wrapper) {
                                window.scrollTo({ top: wrapper.getBoundingClientRect().top + window.scrollY - 120, behavior: 'smooth' });
                            }
                        }

                        // Cập nhật state
                        this.page = data.meta.current_page;
                        this.lastPage = data.meta.last_page;
                        this.total = data.meta.total;
                        this.from = data.meta.from || 0;
                        this.to = data.meta.to || 0;
                        this.hasMore = data.meta.has_more;

                        // Cập nhật URL thanh địa chỉ (không reload)
                        history.replaceState(null, '', `${SHOP_URL}?${params.toString()}`);

                        // Khởi tạo Alpine cho các card mới (qty counter, v.v.)
                        if (window.Alpine) {
                            grid.querySelectorAll('[x-data]').forEach(el => {
                                if (!el._x_dataStack) Alpine.initTree(el);
                            });
                        }

                    } catch (e) {
                        console.error('Shop AJAX error:', e);
                    } finally {
                        this.loading = false;
                        this.appending = false;
                    }
                },

                filterChange() {
                    this.page = 1;
                    clearTimeout(this._debounce);
                    this._debounce = setTimeout(() => this.fetchProducts(1, false), 300);
                },

                toggleCategory(slug) {
                    const idx = this.categories.indexOf(slug);
                    if (idx > -1) this.categories.splice(idx, 1);
                    else this.categories.push(slug);
                    this.filterChange();
                },

                setPreset(key, min, max) {
                    this.pricePreset = key;
                    this.minPrice = min;
                    this.maxPrice = max;
                    this.filterChange();
                },

                resetFilters() {
                    this.categories = [];
                    this.sort = 'default';
                    this.inStock = false;
                    this.onSale = false;
                    this.minPrice = '';
                    this.maxPrice = '';
                    this.pricePreset = '';
                    // Reset radio buttons manually
                    document.querySelectorAll('input[name="price_preset"]').forEach(r => {
                        r.checked = r.value === '';
                    });
                    this.fetchProducts(1, false);
                },

                setupInfiniteScroll() {
                    const sentinel = document.getElementById('scroll-sentinel');
                    if (!sentinel || typeof IntersectionObserver === 'undefined') return;

                    const observer = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting && this.hasMore && !this.loading && !this.appending) {
                            this.fetchProducts(this.page + 1, true);
                        }
                    }, { rootMargin: '200px', threshold: 0 });

                    observer.observe(sentinel);
                },
            }));
        });
                                }) ();
    </script>

    <script>
        /**
         * Nice-select ↔ Alpine.js bridge for the sort select.
         *
         * nice-select ẩn native <select> và tạo div riêng. Khi user click option
         * trong div, nice-select gọi $('select').val(...).trigger('change') —
         * nhưng đây là jQuery event, Alpine.js KHÔNG nghe jQuery event.
         *
         * Fix: lắng nghe jQuery 'change' trên select và dispatch lại native event
         * để Alpine x-model nhận được.
         */
        $(document).ready(function () {
            // Đợi một tick để nice-select đã init xong
            setTimeout(function () {
                var $sortSelect = $('#shop-sort-select');
                if (!$sortSelect.length) return;

                // Destroy existing nice-select nếu có
                if ($sortSelect.next('.nice-select').length) {
                    $sortSelect.next('.nice-select').remove();
                    $sortSelect.show();
                }

                // Khởi tạo lại nice-select với text đã dịch
                $sortSelect.niceSelect();

                $sortSelect.on('change', function () {
                    // Dispatch native 'change' event — Alpine.js lắng nghe event này
                    this.dispatchEvent(new Event('change', { bubbles: true }));
                });
            }, 100);
        });
    </script>
@endpush


