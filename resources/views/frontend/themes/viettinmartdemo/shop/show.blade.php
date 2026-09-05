@extends('layouts.app')

@section('title', ($product->meta_title ?: $product->name) . ' - ' . setting('site_name', 'VietTin Mart'))
@section('meta_description', $product->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($product->description), 160))
@section('meta_keywords', $product->meta_keywords)
@section('canonical', locale_route('shop.show', ['slug' => $product->slug]))
@section('og_type', 'product')
@section('og_image', $product->thumbnail_url ?: asset(setting('site_og_image')))



@section('content')
    <style>
        @keyframes pulse-red {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(220, 38, 38, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(220, 38, 38, 0); }
        }
        .flash-badge-detail {
            animation: pulse-red 2s infinite;
        }

        /* Flash Sale Banner Styles */
        .vtm-flash-banner {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #ff4d4d;
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(220,38,38,0.1);
            background: #fff;
            display: block;
        }
        .vtm-flash-wrapper {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .vtm-flash-branding {
            background: linear-gradient(135deg, #ff4d4d 0%, #d63031 100%);
            color: #fff;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 120px;
            text-align: center;
            flex: 0 0 120px;
        }
        .vtm-flash-branding i {
            font-size: 24px;
            margin-bottom: 5px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        .vtm-flash-branding span {
            font-weight: 800;
            font-size: 14px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            line-height: 1.2;
        }
        .vtm-flash-content {
            flex: 1;
            padding: 15px;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            justify-content: center;
            border-bottom: 1px dashed #eee;
        }
        .vtm-flash-timer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }
        .vtm-timer-display {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .vtm-timer-block {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .vtm-timer-num {
            background: #2d3436;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            line-height: 1;
        }
        .vtm-timer-label {
            font-size: 9px;
            font-weight: 700;
            color: #636e72;
            margin-top: 4px;
            text-transform: uppercase;
        }
        .vtm-timer-sep {
            font-weight: 900;
            color: #2d3436;
            font-size: 20px;
            margin-top: -16px;
        }
        .vtm-seconds-block .vtm-timer-num {
            background: #d63031;
        }
        .vtm-seconds-block .vtm-timer-label {
            color: #d63031;
        }
        .vtm-stock-fire {
            font-size: 12px;
            color: #d63031;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
            background: #fff2f2;
            padding: 4px 12px;
            border-radius: 20px;
        }
        .vtm-progress-area {
            width: 100%;
        }
        .vtm-progress-text {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight: 600;
            color: #2d3436;
        }
        .vtm-progress-bar-bg {
            height: 10px;
            background: #dfe6e9;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }
        .vtm-progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #ff7675, #d63031);
            border-radius: 5px;
            transition: width 0.5s ease;
        }
        .vtm-price-row {
            background: #fff5f5;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .vtm-price-main {
            display: flex;
            flex-direction: column;
        }
        .vtm-price-label {
            font-size: 11px;
            color: #636e72;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: -2px;
        }
        .vtm-price-val {
            font-size: 32px;
            font-weight: 900;
            color: #d63031;
            letter-spacing: -1px;
            line-height: 1.1;
        }
        .vtm-price-old-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .vtm-price-old {
            font-size: 16px;
            color: #b2bec3;
            text-decoration: line-through;
        }
        .vtm-discount-tag {
            background: #fdcb6e;
            color: #2d3436;
            font-size: 12px;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 4px;
        }
        .vtm-save-amount {
            margin-left: auto;
            font-size: 13px;
            color: #d63031;
            font-weight: 700;
            background: #fff;
            padding: 5px;
            border: 1px solid #fab1a0;
            border-radius: 8px;
        }

        /* Hide nice-select in SweetAlert */
        .swal2-container .nice-select,
        .swal-no-nice-select .nice-select {
            display: none !important;
        }

        /* Variant Selection Styles */
        .variant-option input[type="radio"] {
            display: none;
        }
        
        .variant-option input[type="radio"]:checked + .variant-label {
            border-color: #e74c3c !important;
            background: #fff5f5 !important;
            color: #e74c3c !important;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.2);
        }
        
        .variant-label:hover:not(.out-of-stock) {
            border-color: #e74c3c;
            background: #fff8f8;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .variant-label.out-of-stock {
            opacity: 0.6;
            text-decoration: line-through;
        }
        
        .selected-variant-info {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    <div class="rts-chop-details-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="shopdetails-style-1-wrapper">
                <div class="row g-5">

                    <!-- Left: Main Content (Images, Info, Tabs) -->
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <!-- Top: Product Images & Info -->
                        <div class="product-details-popup-wrapper in-shopdetails mb-5">
                            <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
                                <div class="product-details-popup">
                                    <div class="details-product-area">
                                        <div class="row g-4">
                                            <!-- Columns for image and content -->
                                            <div class="col-lg-5 col-md-12">
                                                <div class="product-thumb-area">
                                                    <div class="cursor"></div>
                                                    @php
                                                        $numberClasses = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
                                                        $allImages = is_array($product->images_urls) ? $product->images_urls : [];
                                                        if ($product->thumbnail_url && !in_array($product->thumbnail_url, $allImages)) {
                                                            array_unshift($allImages, $product->thumbnail_url);
                                                        }
                                                        if (empty($allImages)) {
                                                            $allImages[] = asset('theme/images/grocery/01.jpg');
                                                        }

                                                        $flashItem = app(\App\Services\FlashSaleService::class)->getActiveItemForProduct($product);
                                                        $flashCampaign = $flashItem ? $flashItem->campaign : null;
                                                        $flashPrice = $product->flash_price;
                                                        $isFlashSale = $flashItem && $flashCampaign && $flashPrice !== null;
                                                    @endphp

                                                    @foreach($allImages as $index => $imgUrl)
                                                        @php $class = $numberClasses[$index] ?? 'more'; @endphp
                                                        <div class="thumb-wrapper {{ $class }} filterd-items {{ $index > 0 ? 'hide' : 'figure' }}" style="width: 100%; height: 450px; max-height: 450px; overflow: hidden; border-radius: 8px; background-color: #f8f9fa; {{ $index === 0 ? 'position: relative;' : 'position: absolute; top: 0; left: 0;' }}">
                                                            <div class="product-thumb img-placeholder"
                                                                style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; position: relative;">
                                                                @if($isFlashSale)
                                                                    <div class="flash-badge-detail" style="position: absolute; top: 15px; left: 15px; z-index: 20; background: #DC2626; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 800; font-size: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 5px;">
                                                                        <i class="fa-solid fa-bolt"></i> FLASH SALE
                                                                    </div>
                                                                @endif
                                                                <img src="{{ $imgUrl }}" alt="{{ $product->name }}" 
                                                                     loading="eager" fetchpriority="high" decoding="sync"
                                                                     style="max-width: 100% !important; max-height: 100% !important; width: auto !important; height: auto !important; object-fit: contain !important; position: relative !important; z-index: 1 !important; opacity: 1 !important; display: block !important;">
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="product-thumb-filter-group mt-3">
                                                        @foreach($allImages as $index => $imgUrl)
                                                            @php $class = $numberClasses[$index] ?? 'more'; @endphp
                                                            <div class="thumb-filter filter-btn {{ $index === 0 ? 'active' : '' }} img-placeholder" data-show=".{{ $class }}" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 2px solid #e2e8f0; border-radius: 8px; cursor: pointer;">
                                                                <img src="{{ $imgUrl }}" alt="product-thumb-filter" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" decoding="async" style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 col-md-12">
                                                <div class="contents" x-data="{ 
                                                    qty: 1,
                                                    adding: false,
                                                    async addToCart() {
                                                        this.adding = true;
                                                        try {
                                                            await cart.add({{ $product->id }}, null, this.qty);
                                                            // SweetAlert được xử lý trong update.js
                                                        } catch (error) {
                                                            console.error('Add to cart error:', error);
                                                            if (typeof Swal !== 'undefined') {
                                                                Swal.fire({
                                                                    title: '{{ __("Lỗi") }}',
                                                                    text: '{{ __("Không thể thêm sản phẩm vào giỏ hàng") }}',
                                                                    icon: 'error',
                                                                    timer: 3000,
                                                                    showConfirmButton: false,
                                                                    toast: true,
                                                                    position: 'top-end'
                                                                });
                                                            }
                                                        } finally {
                                                            this.adding = false;
                                                        }
                                                    }
                                                }">
                                                    <div class="product-status">
                                                        <span class="product-catagory">{{ $product->categories->first()->name ?? __('product_category') }}</span>
                                                        <div class="rating-stars-group">
                                                            @php 
                                                                $avgRating = $product->approvedReviews->avg('rating') ?? 5;
                                                                $reviewCount = $product->approvedReviews->count();
                                                            @endphp
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <div class="rating-star"><i class="{{ $i <= $avgRating ? 'fas' : 'far' }} fa-star"></i></div>
                                                            @endfor
                                                            <span>{{ $reviewCount }} {{ __('product_reviews') }}</span>
                                                        </div>
                                                    </div>
                                                    <h1 class="product-title">{{ $product->name }}</h1>
                                                    @if($product->short_description)
                                                        <p class="mt--10 mb--15" style="font-size: 14px; color: #6E777D; line-height: 1.6;">
                                                            {!! \Illuminate\Support\Str::limit(strip_tags($product->short_description), 120) !!}
                                                        </p>
                                                    @elseif($product->description)
                                                        <p class="mt--10 mb--15" style="font-size: 14px; color: #6E777D; line-height: 1.6;">
                                                            {!! \Illuminate\Support\Str::limit(strip_tags($product->description), 120) !!}
                                                        </p>
                                                    @endif                                                    {{-- FLASH SALE BANNER --}}
                                                    @if($isFlashSale)
                                                    @php
                                                        $savedAmount = (float)$product->price - $flashPrice;
                                                        $hasLimit = (bool)$flashItem->sale_limit;
                                                        $remaining = $hasLimit ? ($flashItem->remaining ?? 0) : null;
                                                        $total     = $hasLimit ? $flashItem->sale_limit : null;
                                                        $soldPct   = ($hasLimit && $total > 0) ? min(100, round(($flashItem->sold_count / $total) * 100)) : 0;
                                                    @endphp
                                                    <section class="vtm-flash-banner" 
                                                         x-data="flashSaleCountdown('{{ $flashCampaign->ends_at->toIso8601String() }}')"
                                                         x-init="init()">
                                                        
                                                        <div class="vtm-flash-wrapper">
                                                            {{-- Trái: Branding --}}
                                                            <div class="vtm-flash-branding">
                                                                <i class="fa-solid fa-bolt"></i>
                                                                <span>{{ __('Flash Sale') }}</span>
                                                            </div>

                                                            {{-- Phải: Countdown & Stock --}}
                                                            <div class="vtm-flash-content">
                                                                <div class="vtm-flash-timer-row">
                                                                    <div class="vtm-timer-display" x-show="!expired">
                                                                        <template x-if="parseInt(days) > 0">
                                                                            <div style="display:flex; align-items:center; gap:8px;">
                                                                                <div class="vtm-timer-block">
                                                                                    <span class="vtm-timer-num" x-text="days">00</span>
                                                                                    <span class="vtm-timer-label">{{ __('time_days') }}</span>
                                                                                </div>
                                                                                <span class="vtm-timer-sep">:</span>
                                                                            </div>
                                                                        </template>
                                                                        <div class="vtm-timer-block">
                                                                            <span class="vtm-timer-num" x-text="hours">00</span>
                                                                            <span class="vtm-timer-label">{{ __('time_hours') }}</span>
                                                                        </div>
                                                                        <span class="vtm-timer-sep">:</span>
                                                                        <div class="vtm-timer-block">
                                                                            <span class="vtm-timer-num" x-text="minutes">00</span>
                                                                            <span class="vtm-timer-label">{{ __('time_minutes') }}</span>
                                                                        </div>
                                                                        <span class="vtm-timer-sep">:</span>
                                                                        <div class="vtm-timer-block vtm-seconds-block">
                                                                            <span class="vtm-timer-num" x-text="seconds">00</span>
                                                                            <span class="vtm-timer-label">{{ __('time_seconds') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div x-show="expired" style="color: #d63031; font-weight: 800; font-size: 14px;">{{ __('flash_sale_expired') }}</div>
                                                                    
                                                                    @if($hasLimit)
                                                                    <div class="vtm-stock-fire">
                                                                        <i class="fa-solid fa-fire"></i> {{ __('flash_sale_hot_stock') }}
                                                                    </div>
                                                                    @endif
                                                                </div>

                                                                @if($hasLimit)
                                                                <div class="vtm-progress-area">
                                                                    <div class="vtm-progress-text">
                                                                        <span>{{ __('flash_sale_remaining') }}: <span style="color: #d63031;">{{ $remaining }}</span>/{{ $total }}</span>
                                                                        <span>{{ $soldPct }}%</span>
                                                                    </div>
                                                                    <div class="vtm-progress-bar-bg">
                                                                        <div class="vtm-progress-bar-fill" style="width: {{ $soldPct }}%;"></div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        {{-- Bottom: Giá --}}
                                                        <div class="vtm-price-row">
                                                            <div class="vtm-price-main">
                                                                <span class="vtm-price-label">{{ __('flash_sale_price') }}</span>
                                                                <span class="vtm-price-val">{{ number_format($flashPrice, 0, ',', '.') }}đ</span>
                                                            </div>
                                                            <div class="vtm-price-old-group">
                                                                <span class="vtm-price-old">{{ number_format((float)$product->price, 0, ',', '.') }}đ</span>
                                                                <span class="vtm-discount-tag">-{{ $product->flash_discount_percent }}%</span>
                                                            </div>
                                                            <div class="vtm-save-amount">
                                                                {{ __('flash_sale_save') }} {{ number_format($savedAmount, 0, ',', '.') }}₫
                                                            </div>
                                                        </div>
                                                    </section>
                                                    @else
                                                    {{-- Giá thường cho sản phẩm đơn giản --}}
                                                    <div class="product-price-section mb--20">
                                                        <span class="product-price mb--15 d-block"
                                                            style="color: var(--color-danger, #DC2626); font-weight: 700; font-size: 26px;">
                                                            {{ $product->formatted_price }}
                                                            @if($product->old_price && $product->old_price > $product->effective_price)
                                                                <span class="old-price ml--15" style="text-decoration: line-through; color: #999; font-weight: 400; font-size: 0.65em;">
                                                                    {{ number_format($product->old_price, 0, ',', '.') }}đ
                                                                </span>
                                                            @endif
                                                        </span>
                                                        @if($product->discount_percent)
                                                            <div class="discount-badge" style="display: inline-block; background: #ff4757; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; margin-bottom: 10px;">
                                                                {{ __('product_discount') }} {{ $product->discount_percent }}%
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @endif



                                                    {{-- Product Actions Component --}}
                                                    <x-product.detail-actions 
                                                        :product="$product" 
                                                        :showQuantity="true" 
                                                        :showBuyNow="false" />

                                                    <div class="product-uniques mt--20 pt--15" style="border-top: 1px solid #f1f5f9;">
                                                        <div class="d-flex flex-column gap-2" style="font-size: 14px;">
                                                            <div class="d-flex align-items-center">
                                                                <span style="min-width: 110px; color: #64748b; font-weight: 500;">{{ __('product_sku') }}:</span> 
                                                                <span class="badge" style="background: #f8fafc; color: #334155; border: 1px solid #e2e8f0; font-size: 12.5px; font-weight: 600; padding: 3px 8px; border-radius: 4px; font-family: monospace;">{{ $product->sku ?? __('updating') }}</span>
                                                            </div>
                                                            @if($product->categories->isNotEmpty())
                                                                <div class="d-flex align-items-center">
                                                                    <span style="min-width: 110px; color: #64748b; font-weight: 500;">{{ __('product_category') }}:</span>
                                                                    <span style="font-weight: 500;">
                                                                        @foreach($product->categories as $cat)
                                                                            <a href="{{ locale_route('shop.category', ['slug' => $cat->slug]) }}" style="color: var(--color-primary, #28a745); text-decoration: none; font-weight: 500;">{{ $cat->name }}</a>{{ !$loop->last ? ', ' : '' }}
                                                                        @endforeach
                                                                    </span>
                                                                </div>
                                                            @endif
                                                            <div class="d-flex align-items-center">
                                                                <span style="min-width: 110px; color: #64748b; font-weight: 500;">{{ __('product_stock_status_label') }}:</span>
                                                                @if($product->stock > 0)
                                                                    <span class="badge d-inline-flex align-items-center gap-1" style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px;">
                                                                        <span style="width: 7px; height: 7px; border-radius: 50%; background: #22c55e; display: inline-block;"></span>
                                                                        {{ __('product_stock_available', ['count' => $product->stock]) }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge d-inline-flex align-items-center gap-1" style="background: #fee2e2; color: #b91c1c; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px;">
                                                                        <span style="width: 7px; height: 7px; border-radius: 50%; background: #ef4444; display: inline-block;"></span>
                                                                        {{ __('product_out_of_stock') }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($product->activeCombos && $product->activeCombos->isNotEmpty())
                                                        <div class="product-combo-section mt--20 mb--20" 
                                                             x-data="{
                                                                mainPrice: {{ (float)$product->price }},
                                                                selectedKeys: [],
                                                                totalPrice: {{ (float)$product->price }},
                                                                adding: false,
                                                                priceData: {
                                                                    @foreach($product->activeCombos as $combo)
                                                                        @foreach(($combo->activeVariants->isNotEmpty() ? $combo->activeVariants : [ (object)['id' => 0, 'price' => $combo->price] ]) as $item)
                                                                            '{{ $combo->id }}_{{ $item->id }}': { pid: {{ $combo->id }}, vid: {{ $item->id }}, price: {{ (float)($combo->pivot->discount_type === 'percent' ? $item->price * (1 - $combo->pivot->discount_value / 100) : max(0, $item->price - $combo->pivot->discount_value)) }} },
                                                                        @endforeach
                                                                    @endforeach
                                                                },
                                                                init() { 
                                                                    this.$watch('selectedKeys', () => this.updateTotal());
                                                                    window.addEventListener('vtm:variant-selected', (e) => {
                                                                        const vId = e.detail?.variantId;
                                                                        this.mainPrice = (vId && window.vtmMainVariantPrices && window.vtmMainVariantPrices[vId]) ? window.vtmMainVariantPrices[vId] : window.vtmMainBasePrice;
                                                                        this.updateTotal();
                                                                    });
                                                                    this.updateTotal();
                                                                },
                                                                updateTotal() {
                                                                    let t = parseFloat(this.mainPrice);
                                                                    this.selectedKeys.forEach(k => { if(this.priceData[k]) t += parseFloat(this.priceData[k].price); });
                                                                    this.totalPrice = t;
                                                                },
                                                                formatPrice(v) { return new Intl.NumberFormat('vi-VN').format(Math.round(v)) + '₫'; },
                                                                async addCombosToCart() {
                                                                    this.adding = true;
                                                                    try {
                                                                        const mq = parseInt(document.querySelector('.quantity-edit .input')?.value) || 1;
                                                                        await cart.add({{ $product->id }}, null, mq);
                                                                        for(const k of this.selectedKeys) {
                                                                            const i = this.priceData[k];
                                                                            await cart.add(i.pid, null, 1);
                                                                        }
                                                                        window.location.href = '{{ locale_route('cart.page') }}';
                                                                    } finally { this.adding = false; }
                                                                }
                                                             }">
                                                            <h6 class="title mb--15" style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #444; letter-spacing: 0.8px; border-bottom: 1px solid #efefef; padding-bottom: 8px;">{{ __('product_combo_title') }}</h6>
                                                            
                                                            <div class="combo-list d-flex flex-column gap-2 mt-1">
                                                                @foreach($product->activeCombos as $combo)
                                                                    @foreach(($combo->activeVariants->isNotEmpty() ? $combo->activeVariants : [ (object)['id' => 0, 'price' => $combo->price, 'label' => null, 'sku' => null] ]) as $item)
                                                                        @php 
                                                                            $uk = $combo->id . '_' . $item->id;
                                                                            $pP = $item->price;
                                                                            $dP = $combo->pivot->discount_type === 'percent' ? $pP * (1 - $combo->pivot->discount_value / 100) : max(0, $pP - $combo->pivot->discount_value);
                                                                        @endphp
                                                                        <div class="single-combo-row d-flex align-items-center gap-3 p-2 rounded-2" style="background: #fbfbfb; border: 1px solid #f0f0f0;">
                                                                            <input type="checkbox" value="{{ $uk }}" id="fk-{{ $uk }}" x-model="selectedKeys" style="width: 17px; height: 17px; cursor: pointer;">
                                                                            <img src="{{ $combo->thumbnail_url ?: asset('theme/images/no-image.png') }}" style="width: 45px; height: 45px; object-fit: cover; border-radius: 5px;">
                                                                            <div class="flex-grow-1">
                                                                                <label for="fk-{{ $uk }}" class="m-0" style="cursor: pointer; display: block;">
                                                                                    <div style="font-size: 13px; font-weight: 600; color: #333;">
                                                                                        {{ $combo->name }} @if($item->id > 0)<span class="text-secondary" style="font-size: 11px;">({{ $item->label ?: $item->sku }})</span>@endif
                                                                                    </div>
                                                                                    <div class="d-flex align-items-center gap-2 mt-1">
                                                                                        <span class="text-decoration-line-through text-muted" style="font-size: 11px;">{{ number_format($pP, 0, ',', '.') }}₫</span>
                                                                                        <span style="font-size: 13px; font-weight: 700; color: #d32f2f;">{{ number_format($dP, 0, ',', '.') }}₫</span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>

                                                            <div class="combo-footer d-flex align-items-center justify-content-between mt--20 pt--15" style="border-top: 1px dashed #f0f0f0;">
                                                                <div class="total-price-area">
                                                                    <div class="mb-1" style="font-size: 11px; color: #999;">{{ __('product_combo_selected') }}: <span class="fw-bold" x-text="selectedKeys.length + 1">1</span> {{ __('pagination_products') }}</div>
                                                                    <span style="font-size: 12px; color: #333; font-weight: 600;">{{ __('product_combo_total') }}: </span>
                                                                    <span class="total-val" style="font-size: 16px; font-weight: 800; color: #d32f2f; margin-left: 5px;" x-text="formatPrice(totalPrice)">0 đ</span>
                                                                </div>
                                                                <button type="button" 
                                                                        class="btn btn-primary d-flex align-items-center gap-2" 
                                                                        style="background: #e74c3c; border: none; border-radius: 4px; font-size: 12px; font-weight: 700; padding: 10px 20px !important; transition: all 0.2s;"
                                                                        :class="adding ? 'opacity-70' : ''"
                                                                        :disabled="adding"
                                                                        @click="addCombosToCart()">
                                                                    <i class="fa-solid fa-cart-shopping" style="font-size: 11px;" x-show="!adding"></i>
                                                                    <i class="fa-solid fa-spinner fa-spin" style="font-size: 11px;" x-show="adding" x-cloak></i>
                                                                    <span>{{ __('product_combo_buy_all') }} <span x-text="selectedKeys.length + 1">1</span> {{ __('pagination_products') }}</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            window.vtmMainVariantPrices = {
                                                                @foreach($product->variants ?? [] as $v)
                                                                    {{ $v->id }}: {{ (float)$v->price }},
                                                                @endforeach
                                                            };
                                                            window.vtmMainBasePrice = {{ (float)$product->price }};
                                                        </script>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom: Description Tabs -->
                        <div class="product-discription-tab-shop">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">{{ __('product_details') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">{{ __('product_additional_info') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tabt" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-panes" type="button" role="tab"
                                        aria-controls="profile-tab-panes" aria-selected="false">{{ __('product_reviews_tab') }} ({{ $reviewCount }})</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <div class="disc">
                                            {!! $product->description !!}
                                        </div>
                                        @if($product->content)
                                            <div class="mt--40">
                                                <h4 class="title mb--20">{{ __('product_detailed_info') }}</h4>
                                                {!! $product->content !!}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        @if($product->additional_info)
                                            <div class="additional-info-content mb--30">
                                                {!! $product->additional_info !!}
                                            </div>
                                        @endif

                                        @if($product->productAttributes && $product->productAttributes->isNotEmpty())
                                            <h4 class="title mb--20">{{ __('product_specifications') }}</h4>
                                            <div class="table-responsive table-shop-details-pd">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($product->productAttributes as $pa)
                                                            <tr>
                                                                <td style="width: 30%; font-weight: 600;">{{ $pa->attribute->name }}</td>
                                                                <td>{{ $pa->attributeValue->value }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif

                                        @if(!$product->additional_info && (!$product->productAttributes || $product->productAttributes->isEmpty()))
                                            <p class="disc">{{ __('updating') }}...</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-panes" role="tabpanel"
                                    aria-labelledby="profile-tabt" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        @if(setting('review_enabled', true))
                                        <div class="product-details-review-product-style" x-data="{ showReviewForm: false, rating: 0, hoverRating: 0 }" style="gap: 0;">
                                            @php
                                                $approvedReviews = $product->approvedReviews;
                                                $reviewCount = $approvedReviews->count();
                                                $avgRating = $reviewCount > 0 ? round($approvedReviews->avg('rating'), 1) : 5.0;

                                                $ratingStats = [];
                                                for ($i = 5; $i >= 1; $i--) {
                                                    $count = $approvedReviews->where('rating', $i)->count();
                                                    $percent = $reviewCount > 0 ? round(($count / $reviewCount) * 100) : 0;
                                                    $ratingStats[$i] = $percent;
                                                }
                                            @endphp

                                            <div class="review-summary-block w-100" style="background: #fdfdfd; padding: 30px; border-radius: 8px; border: 1px solid #f1f1f1; margin-bottom: 30px;">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-6 col-md-12 pe-lg-4" style="border-right: 1px solid #f1f1f1;">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <h2 class="m-0 me-3" style="font-size: 52px; font-weight: 700; color: #333;">{{ number_format($avgRating, 1) }}</h2>
                                                            <div>
                                                                <div class="stars mb-1" style="color: #FFB800; font-size: 20px;">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <i class="{{ $i <= round($avgRating) ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                                                                    @endfor
                                                                    <span style="color: #666; font-size: 14px; margin-left: 10px; font-weight: normal;">{{ $reviewCount }} {{ __('review_count_text') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="review-charts-details">
                                                            @for ($star = 5; $star >= 1; $star--)
                                                                @php
                                                                    $count = $approvedReviews->where('rating', $star)->count();
                                                                @endphp
                                                                <div class="single-review d-flex align-items-center mb-2">
                                                                    <div class="stars" style="color: #FFB800; font-size: 13px; width: 85px;">
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <i class="{{ $i <= $star ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                                                                        @endfor
                                                                    </div>
                                                                    <div class="single-progress-area-incard flex-grow-1 mx-3" style="margin: 0; padding: 0;">
                                                                        <div class="progress" style="height: 8px; background: #e9ecef; border-radius: 10px; overflow: hidden; box-shadow: none;">
                                                                            <div class="progress-bar" role="progressbar"
                                                                                style="width: {{ $ratingStats[$star] }}%; background-color: #f15922;" aria-valuenow="{{ $ratingStats[$star] }}" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <span class="pac" style="font-size: 14px; font-weight: 600; min-width: 60px; color: #333; text-align: left;">{{ $ratingStats[$star] }}% <span style="color: #888; font-weight: 400;">|</span> {{ $count }}</span>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12 mt-4 mt-lg-0 ps-lg-4">
                                                        <div id="review-form-section" class="submit-review-area" style="background-color: #efefef; padding: 20px; border-radius: 8px;">
                                                            <form action="{{ locale_route('review.submit') }}" method="POST" enctype="multipart/form-data" 
                                                                  @submit.prevent="submitReview($event)">
                                                                @csrf
                                                                
                                                                {{-- Anti-spam measures --}}
                                                                {!! honeypot_fields() !!}
                                                                {!! form_timestamp() !!}
                                                                
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <input type="hidden" name="rating" x-model="rating">

                                                                <div class="text-center mb-3">
                                                                    <div class="stars d-flex justify-content-center gap-1" style="font-size: 28px;" @mouseleave="hoverRating = 0">
                                                                        @for($i = 1; $i <= 5; $i++)
                                                                            <i class="fa-star" 
                                                                               :class="(hoverRating >= {{ $i }} || (hoverRating == 0 && rating >= {{ $i }})) ? 'fa-solid' : 'fa-regular'" 
                                                                               :style="(hoverRating >= {{ $i }} || (hoverRating == 0 && rating >= {{ $i }})) ? 'color: #FFB800; transform: scale(1.15);' : 'color: #dcdcdc; transform: scale(1);'"
                                                                               @click="rating = {{ $i }}" 
                                                                               @mouseenter="hoverRating = {{ $i }}"
                                                                               style="cursor: pointer; margin: 0 4px; transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);"></i>
                                                                        @endfor
                                                                    </div>
                                                                </div>

                                                                <div class="row g-2 mb-2 d-flex align-items-center">
                                                                    <div class="col-md-6 ">
                                                                        <input type="text" name="customer_name" class="form-control" placeholder="{{ __('review_form_name_placeholder') }}" required style="border: 1px solid #e0e0e0; border-radius: 4px; padding: 10px; font-size: 14px; width: 100%;">
                                                                    </div>
                                                                    <div class="col-md-6 ">
                                                                        <input type="email" name="customer_email" class="form-control" placeholder="{{ __('review_form_email_placeholder') }}" required style="border: 1px solid #e0e0e0; border-radius: 4px; padding: 10px; font-size: 14px; width: 100%;">
                                                                    </div>
                                                                </div>

                                                                <div class="mb-2 mt-2">
                                                                    <textarea name="comment" class="form-control" minlength="10" rows="3" placeholder="{{ __('review_form_comment_placeholder') }}" required style="border: 1px solid #e0e0e0; border-radius: 4px; padding: 10px; font-size: 14px; width: 100%; resize: vertical;"></textarea>
                                                                </div>

                                                                <div class="d-flex flex-column align-items-start mt-2">
                                                                    {{-- Simple Captcha --}}
                                                                    @if(setting('captcha_enabled', true))
                                                                        <div class="w-100 mb-3">
                                                                            <x-simple-captcha />
                                                                        </div>
                                                                    @endif
                                                                    
                                                                    <button type="submit" class="btn w-100" style="background-color: #0b5a96; color: white; padding: 12px; font-weight: bold; font-size: 15px; border-radius: 4px; border: none; text-transform: uppercase;">{{ __('review_form_submit') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-reviews-list mt-5 w-100" x-data="{ activeStar: 'all' }">
                                                <div class="review-filter d-flex align-items-center mb-4 pb-4" style="border-bottom: 1px solid #eee;">
                                                    <span class="me-3" style="color: #555; font-size: 14px;">Lọc theo:</span>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <a href="javascript:void(0)" 
                                                           class="btn btn-sm px-3 py-1" 
                                                           @click="activeStar = 'all'"
                                                           :style="activeStar === 'all' ? 'background: #0b5a96; color: white; border-radius: 20px; font-weight: 500;' : 'background: #eef5fa; color: #0b5a96; border-radius: 20px; font-weight: 500;'">Tất cả</a>
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <a href="javascript:void(0)" 
                                                               class="btn btn-sm px-3 py-1 shadow-none" 
                                                               @click="activeStar = {{ $i }}"
                                                               :style="activeStar === {{ $i }} ? 'background: #0b5a96; color: white; border-radius: 20px;' : 'background: #f4f4f4; color: #666; border-radius: 20px; border: none;'">
                                                                {{$i}} <i class="fa-solid fa-star" :style="activeStar === {{ $i }} ? 'color: #FFB800; font-size: 10px;' : 'color: #ccc; font-size: 10px;'"></i>
                                                            </a>
                                                        @endfor
                                                    </div>
                                                </div>

                                                <div class="reviews-list-area">
                                                    @forelse($approvedReviews as $review)
                                                        <div class="single-review-item mb-4 pb-4" 
                                                             style="border-bottom: 1px solid #eee;" 
                                                             x-show="activeStar === 'all' || activeStar == {{ $review->rating }}"
                                                             x-transition:enter="transition ease-out duration-300"
                                                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                                                             x-transition:enter-end="opacity-100 transform translate-y-0"
                                                             x-data="{ liked: false, count: {{ rand(0, 10) }} }">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    @php
                                                                        $nameParts = explode(' ', trim($review->customer_name ?? 'Khách Hàng'));
                                                                        $firstChar = mb_substr($nameParts[0], 0, 1, 'UTF-8');
                                                                        $lastChar = count($nameParts) > 1 ? mb_substr(end($nameParts), 0, 1, 'UTF-8') : '';
                                                                        $initials = mb_strtoupper($firstChar . $lastChar, 'UTF-8');

                                                                        $title = __("review_form_title");
                                                                        if ($review->rating == 5)
                                                                            $title = __("review_rating_excellent");
                                                                        elseif ($review->rating == 4)
                                                                            $title = __("review_rating_good");
                                                                        elseif ($review->rating == 3)
                                                                            $title = __("review_rating_average");
                                                                        elseif ($review->rating == 2)
                                                                            $title = __("review_rating_poor");
                                                                        elseif ($review->rating == 1)
                                                                            $title = __("review_rating_terrible");
                                                                    @endphp
                                                                    <div class="avatar-circle me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: #0b5a96; color: white; border-radius: 50%; font-weight: bold; font-size: 16px;">
                                                                        {{ $initials }}
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="m-0" style="font-weight: 700; color: #0b5a96; font-size: 15px;">{{ $review->customer_name }}</h6>
                                                                        <div class="verified-purchase text-success mt-1" style="font-size: 12px; font-weight: 500;">
                                                                            <i class="fa-solid fa-circle-check"></i> Đã Mua Hàng Tại VIETTINMART
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="stars d-flex gap-1" style="color: #FFB800; font-size: 12px;">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <i class="{{ $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>

                                                            <div class="review-content-box ms-5 p-3" style="background: #f8f9fa; border-radius: 8px;">
                                                                <h6 style="font-size: 14px; font-weight: 700; margin-bottom: 8px;">{{ $title }}</h6>
                                                                <p style="font-size: 14px; color: #444; margin-bottom: 15px;">{{ $review->comment }}</p>
                                                                <span style="font-size: 12px; color: #999;"><i class="fa-regular fa-clock me-1"></i> {{ $review->created_at ? $review->created_at->diffForHumans() : 'Vài ngày trước' }}</span>
                                                            </div>

                                                            <div class="review-actions ms-5 mt-3 d-flex align-items-center">
                                                                <button class="btn btn-sm px-2 py-0 me-3 d-flex align-items-center" 
                                                                        :style="liked ? 'background: #0b5a96; color: white; border: 1px solid #0b5a96;' : 'background: transparent; color: #0b5a96; border: 1px solid #0b5a96;'"
                                                                        @click="liked = !liked; liked ? count++ : count--"
                                                                        style="border-radius: 4px; font-size: 11px; font-weight: 500; height: 24px; transition: all 0.2s;">
                                                                    <i :class="liked ? 'fa-solid' : 'fa-regular'" class="fa-thumbs-up me-1"></i> Like <span class="ms-1" x-text="count"></span>
                                                                </button>
                                                               
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p class="text-center text-muted py-4">{{ __('review_no_reviews') }}</p>
                                                    @endforelse

                                                    @if($reviewCount > 10)
                                                        <div class="d-flex justify-content-center mt-5 mb-4">
                                                            <div class="pagination-mock d-flex gap-2">
                                                                 <button class="btn btn-sm btn-light" disabled style="border: 1px solid #ddd; background: #fafafa;"><i class="fa-solid fa-angles-left" style="color: #999;"></i></button>
                                                                 <button class="btn btn-sm btn-light" disabled style="border: 1px solid #ddd; background: #fafafa; color: #999; font-weight: 500;">Prev</button>
                                                                 <button class="btn btn-sm" style="background: #0b5a96; color: white; border: 1px solid #0b5a96; font-weight: bold; width: 32px;">1</button>
                                                                 <button class="btn btn-sm btn-light" style="border: 1px solid #ddd; background: #fafafa; color: #555; width: 32px;">2</button>
                                                                 <button class="btn btn-sm btn-light" style="border: 1px solid #ddd; background: #fafafa; color: #555; width: 32px;">3</button>
                                                                 <button class="btn btn-sm btn-light" style="border: 1px solid #ddd; background: #fafafa; color: #555; font-weight: 500;">Next</button>
                                                                 <button class="btn btn-sm btn-light" style="border: 1px solid #ddd; background: #fafafa;"><i class="fa-solid fa-angles-right" style="color: #666;"></i></button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="text-center py-5">
                                            <i class="fa-solid fa-star-half-stroke" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
                                            <h5 style="color: #666; margin-bottom: 10px;">{{ __('review_disabled_title') }}</h5>
                                            <p style="color: #999; font-size: 14px;">{{ __('review_disabled_message') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Sidebar (Offers, Payment) -->
                    <div class="col-xl-3 col-lg-4 col-md-12 rts-sticky-column-item">
                        <div class="theiaStickySidebar sticky-top" style="top: 120px; z-index: 10;">
                            <div class="shop-sight-sticky-sidevbar mb--20">
                                <h6 class="title">{{ __('sidebar_offers_title') }}</h6>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="{{ asset('theme/images/shop/01.svg') }}" alt="icon" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" width="24" height="24">
                                    </div>
                                    <div class="details">
                                        <p>{{ __('offer_bank_transfer') }}</p>
                                    </div>
                                </div>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="{{ asset('theme/images/shop/02.svg') }}" alt="icon" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" width="24" height="24">
                                    </div>
                                    <div class="details">
                                        <p>{{ __('offer_installment') }}</p>
                                    </div>
                                </div>
                                <div class="single-offer-area">
                                    <div class="icon">
                                        <img src="{{ asset('theme/images/shop/03.svg') }}" alt="icon" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" width="24" height="24">
                                    </div>
                                    <div class="details">
                                        <p>{{ __('offer_free_shipping') }}</p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
// Review form submission with SweetAlert
function submitReview(event) {
    const form = event.target;
    const ratingInput = form.querySelector('input[name="rating"]');
    const rating = parseInt(ratingInput.value);
    
    if (rating < 1) {
        Swal.fire({
            title: '{{ __("validation_required") }}!',
            text: '{{ __("review_rating_required") }}',
            icon: 'warning',
            confirmButtonText: '{{ __("action_close") }}'
        });
        return;
    }
    
    const btn = form.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;
    
    // Show loading state
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>{{ __('Đang xử lý') }}...';
    btn.disabled = true;
    
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: '{{ __("review_thank_you") }}!',
                text: data.message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
            
            // Reset form and Alpine.js data
            form.reset();
            // Reset Alpine.js rating data
            if (window.Alpine && form._x_dataStack) {
                const alpineData = form._x_dataStack[0];
                if (alpineData) {
                    alpineData.rating = 0;
                    alpineData.hoverRating = 0;
                }
            }
        } else {
            let errorMessage = '{{ __("error_review_submit") }}';
            if (data.errors) {
                errorMessage = Object.values(data.errors).flat().join('\n');
            } else if (data.message) {
                errorMessage = data.message;
            }
            
            Swal.fire({
                title: '{{ __("message_error") }}!',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: '{{ __("action_retry") }}'
            });
        }
    })
    .catch(error => {
        console.error('Review submission error:', error);
        Swal.fire({
            title: '{{ __("message_error") }}!',
            text: '{{ __("error_server") }}',
            icon: 'error',
            confirmButtonText: '{{ __("action_close") }}'
        });
    })
    .finally(() => {
        // Reset button state
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
}

// Ensure functions are available globally before DOM content loads
window.flashSaleCountdown = function(endTimeStr) {
    return {
        days: '00', hours: '00', minutes: '00', seconds: '00',
        expired: false,
        _timer: null,
        init() {
            this.tick();
            this._timer = setInterval(() => this.tick(), 1000);
        },
        tick() {
            const diff = Math.max(0, Math.floor((new Date(endTimeStr) - Date.now()) / 1000));
            if (diff <= 0) { this.expired = true; clearInterval(this._timer); return; }
            this.days    = String(Math.floor(diff / 86400)).padStart(2, '0');
            this.hours   = String(Math.floor((diff % 86400) / 3600)).padStart(2, '0');
            this.minutes = String(Math.floor((diff % 3600) / 60)).padStart(2, '0');
            this.seconds = String(diff % 60).padStart(2, '0');
        }
    };
};

// Ensure zoom function is available immediately
if (typeof window.zoom === 'undefined') {
    window.zoom = function(e) {
        // Fallback zoom function until main.js loads
        if (typeof qvAction !== 'undefined' && qvAction.zoom) {
            qvAction.zoom(e);
        } else {
            // Simple zoom fallback
            var zoomer = e.currentTarget;
            var offsetX = e.offsetX || e.touches[0].pageX;
            var offsetY = e.offsetY || e.touches[0].pageY;
            var x = offsetX / zoomer.offsetWidth * 100;
            var y = offsetY / zoomer.offsetHeight * 100;
            zoomer.style.backgroundPosition = x + '% ' + y + '%';
        }
    };
}

// Ensure cart object is available and properly handles errors
document.addEventListener('DOMContentLoaded', function() {
    // Wait for cart object to be available
    var checkCart = setInterval(function() {
        if (typeof window.cart !== 'undefined' && window.cart.add) {
            clearInterval(checkCart);
            
            // Override cart.add to handle errors better
            var originalAdd = window.cart.add;
            window.cart.add = function(productId, variantIdOrBtn, quantity, mainProductId) {
                try {
                    return originalAdd.call(this, productId, variantIdOrBtn, quantity, mainProductId);
                } catch (error) {
                    console.error('Cart add error:', error);
                    
                    // Show user-friendly error message
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            title: '{{ __("message_error") }}!',
                            text: '{{ __("error_cart_add_retry") }}',
                            icon: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        alert('{{ __("error_cart_add_retry") }}');
                    }
                    
                    // Re-enable any disabled buttons
                    var buttons = document.querySelectorAll('button[disabled], a[disabled]');
                    buttons.forEach(function(btn) {
                        btn.disabled = false;
                        if (btn.innerHTML.includes('{{ __('action_processing') }}')) {
                            btn.innerHTML = btn.innerHTML.replace('{{ __('action_processing') }}', '{{ __('product_add_to_cart') }}');
                        }
                    });
                    
                    return Promise.reject(error);
                }
            };
        }
    }, 100);
    
    // Clear the interval after 10 seconds to prevent infinite checking
    setTimeout(function() {
        clearInterval(checkCart);
    }, 10000);
});

// Additional variant price data for main product variants
@if($product->has_variants && $product->activeVariants && $product->activeVariants->isNotEmpty())
window.vtmMainVariantPrices = {
    @foreach($product->activeVariants as $variant)
    {{ $variant->id }}: {{ (float)$variant->effective_price }},
    @endforeach
};
@endif
window.vtmMainBasePrice = {{ (float)$product->price }};

// Gallery filter with SLIDE animation
$(document).ready(function() {
    console.log('Gallery filter init with slide effect');
    
    let currentIndex = 0;
    const $thumbWrappers = $('.thumb-wrapper');
    const $filterBtns = $('.filter-btn');
    
    // Re-bind filter button clicks
    $filterBtns.off('click').on('click', function(e) {
        e.preventDefault();
        
        const $btn = $(this);
        const show = $btn.data('show');
        const newIndex = $filterBtns.index($btn);
        
        console.log('Filter clicked:', show, 'Index:', newIndex);
        
        // Determine slide direction
        const slideDirection = newIndex > currentIndex ? 'right' : 'left';
        
        // Get current and next elements
        const $current = $thumbWrappers.filter('.figure');
        const $next = $(show);
        
        if ($current[0] === $next[0]) {
            console.log('Same image, skipping animation');
            return;
        }
        
        // Prepare next image position
        if (slideDirection === 'right') {
            $next.removeClass('slide-from-left').addClass('slide-from-right');
        } else {
            $next.removeClass('slide-from-right').addClass('slide-from-left');
        }
        
        // Start animation
        setTimeout(function() {
            // Hide current
            $current.removeClass('figure').addClass('hide');
            
            // Show next
            $next.removeClass('hide slide-from-right slide-from-left').addClass('figure');
            
            // Update active state
            $btn.addClass('active').siblings().removeClass('active');
            
            // Update current index
            currentIndex = newIndex;
            
            console.log('Slide animation:', slideDirection, 'New index:', currentIndex);
        }, 10);
    });
    
    console.log('Filter buttons found:', $filterBtns.length);
    console.log('Thumb wrappers found:', $thumbWrappers.length);
});
</script>
@endpush


