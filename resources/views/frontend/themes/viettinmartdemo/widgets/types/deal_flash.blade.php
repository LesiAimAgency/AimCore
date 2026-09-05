@php
    $uniqueId  = 'deal-' . uniqid();
    $endDate   = $config['end_date'] ?? now()->addDays(7)->format('m/d/Y H:i:s');
    $title     = $config['title'] ?? __('frontend.widget_deal_default_title');
@endphp

<div class="rts-grocery-feature-area rts-section-gapBottom" {!! $sectionStyles ?? '' !!}>
    <div class="container">

        {{-- Header --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <div class="title-left-area" style="display: flex; align-items: center; gap: 20px;">
                        <h2 class="title-left" style="margin-bottom: 0;">{{ $title }}</h2>
                        <div class="countdown" style="margin-bottom: 0;">
                            <div class="countDown">{{ $endDate }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="product-with-discount">
                    <div class="row g-5">

                        {{-- Cột trái: banner --}}
                        <div class="col-xl-4 col-lg-12">
                            @forelse($config['promo_cards'] ?? [] as $banner)
                                <a href="{{ $banner['link'] ?? '#' }}"
                                   class="single-discount-with-bg {{ $banner['bg_class'] ?? '' }}"
                                   @if(!empty($banner['image'])) style="background-image:url('{{ media_url($banner['image']) }}')" @endif>
                                    
                                </a>
                            @empty
                                <a href="{{ locale_route('shop.index') }}" class="single-discount-with-bg">
                                    <div class="inner-content">
                                        <h4 class="title">{{ __('frontend.widget_deal_special_offer') }}</h4>
                                        <div class="price-area"><span>{{ __('frontend.widget_deal_discount_up_to') }}</span><h4 class="title">50%</h4></div>
                                    </div>
                                </a>
                                <a href="{{ locale_route('shop.index') }}" class="single-discount-with-bg bg-2">
                                    <div class="inner-content">
                                        <h4 class="title">{{ __('frontend.widget_deal_flash_sale_today') }}</h4>
                                        <div class="price-area"><span>{{ __('frontend.widget_deal_starting_from') }}</span><h4 class="title">99.000₫</h4></div>
                                    </div>
                                </a>
                            @endforelse
                        </div>

                        {{-- Cột phải: Swiper sản phẩm --}}
                        <div class="col-xl-8 col-lg-12">
                            @if($products->isNotEmpty())
                            <div class="deal-products-swiper-wrapper" style="position: relative;">
                                <div class="swiper swiper-data" data-swiper='{
                                    "spaceBetween":16,
                                    "slidesPerView":2,
                                    "loop": true,
                                    "speed": 700,
                                    "navigation":{
                                        "nextEl":".{{ $uniqueId }}-next",
                                        "prevEl":".{{ $uniqueId }}-prev"
                                    },
                                    "breakpoints":{
                                    "0":{"slidesPerView":1,"spaceBetween": 12},
                                    "768":{"slidesPerView":2,"spaceBetween": 16},
                                    "1200":{"slidesPerView":2,"spaceBetween": 16}
                                    }
                                }'>
                                    <div class="swiper-wrapper">
                                        {{-- Group products by 2 for the 2-row effect --}}
                                        @foreach($products->chunk(2) as $chunk)
                                        <div class="swiper-slide">
                                            <div class="flash-sale-column-wrapper">
                                                @foreach($chunk as $product)
                                                @php $dp = $product->flash_discount_percent ?? $product->discount_percent; @endphp
                                                <div class="single-shopping-card-one discount-offer" x-data="{ qty: 1 }">
                                                    <a href="{{ locale_route('shop.show', $product->slug) }}" class="thumbnail-preview">
                                                        <div class="badge">
                                                            @if($dp > 0)
                                                                <span>-{{ $dp }}% <br> {{ __('frontend.badge_off') }}</span>
                                                            @endif
                                                            <i class="fa-solid fa-bookmark"></i>
                                                        </div>
                                                        <img src="{{ $product->thumbnail_url ?: asset('theme/images/grocery/01.jpg') }}" alt="{{ $product->name }}">
                                                    </a>
                                                    <div class="body-content">
                                                        <a href="{{ locale_route('shop.show', $product->slug) }}">
                                                            <h4 class="title">{{ $product->name }}</h4>
                                                        </a>
                                                        <span class="availability" style="text-align: left;">{{ $product->unit ?? __('frontend.product_unit_default') }}</span>
                                                        <div class="price-area">
                                                            <span class="current">{{ $product->formatted_price }}</span>
                                                            @if($product->old_price > $product->effective_price)
                                                                <div class="previous">{{ number_format($product->old_price, 0, ',', '.') }}đ</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-prev {{ $uniqueId }}-prev"><i class="fa-regular fa-chevron-left"></i></div>
                                <div class="swiper-next {{ $uniqueId }}-next"><i class="fa-regular fa-chevron-right"></i></div>
                            </div>
                            @else
                            <div class="text-center py-5"><p>{{ __('frontend.no_promotions_available') }}</p></div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@once
<style>
.deal-products-grid {
    position: relative;
}
/* Flash Sale Horizontal Card */
.single-shopping-card-one.discount-offer {
    display: flex !important;
    flex-direction: row !important;
    align-items: stretch !important; /* Stretch to match image height */
    background: #fff;
    border: 1px solid #f1f5f9;
    border-radius: 12px;
    overflow: hidden;
    height: 180px !important; 
    min-height: auto !important;
    box-shadow: none !important;
    margin-bottom: 20px; /* Space between rows */
}
.single-shopping-card-one.discount-offer .thumbnail-preview {
    width: 170px !important;
    min-width: 170px;
    height: 180px !important;
    flex-shrink: 0;
    margin: 0 !important;
}
.single-shopping-card-one.discount-offer .thumbnail-preview img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}
.single-shopping-card-one.discount-offer .body-content {
    padding: 20px 25px !important;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center !important;
    height: 180px !important;
    min-height: auto !important;
}
.single-shopping-card-one.discount-offer .body-content .title {
    font-size: 17px !important;
    margin-bottom: 8px !important;
    height: auto !important;
    max-height: 48px;
    line-height: 1.4;
    font-weight: 700 !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.single-shopping-card-one.discount-offer .price-area {
    margin-bottom: 0 !important;
    margin-top: 12px !important;
    min-height: auto !important;
}
.single-shopping-card-one.discount-offer .price-area .current {
    font-size: 19px !important;
}
.single-shopping-card-one.discount-offer .price-area .previous {
    font-size: 13px !important;
}

/* Fix for Swiper Stacked Layout - PERFECT FIT */
.deal-products-swiper-wrapper {
    height: 100%;
}
.deal-products-swiper-wrapper .swiper {
    height: 100% !important;
}
.deal-products-swiper-wrapper .swiper-slide {
    height: 100% !important;
}
.flash-sale-column-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    gap: 20px;
}
.single-shopping-card-one.discount-offer {
    margin-bottom: 0 !important;
    flex: 1; /* Stretch cards to fill height */
    height: auto !important;
}
.single-shopping-card-one.discount-offer .thumbnail-preview {
    width: 170px !important;
    min-width: 170px;
    height: 100% !important;
    flex-shrink: 0;
    margin: 0 !important;
}
.single-shopping-card-one.discount-offer .body-content {
    padding: 15px 25px !important;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center !important;
    height: 100% !important;
}
.single-shopping-card-one.discount-offer .cart-counter-action {
    display: none !important;
}

/* Swiper Navigation inside slider */
.deal-products-swiper-wrapper .swiper-prev,
.deal-products-swiper-wrapper .swiper-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 45px;
    height: 45px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}
.deal-products-swiper-wrapper .swiper-prev {
    left: -22px;
}
.deal-products-swiper-wrapper .swiper-next {
    right: -22px;
}
.deal-products-swiper-wrapper .swiper-prev:hover,
.deal-products-swiper-wrapper .swiper-next:hover {
    background: var(--color-primary);
    color: #fff;
    border-color: var(--color-primary);
}

@media (max-width: 576px) {
    .deal-products-swiper-wrapper .swiper-prev { left: 0; }
    .deal-products-swiper-wrapper .swiper-next { right: 0; }
}

@media (max-width: 576px) {
    .single-shopping-card-one.discount-offer {
        flex-direction: column !important;
    }
    .single-shopping-card-one.discount-offer .thumbnail-preview {
        width: 100% !important;
        height: auto !important;
        aspect-ratio: 1/1;
    }
    .single-shopping-card-one.discount-offer .body-content {
        height: auto !important;
    }
}
</style>
@endonce




