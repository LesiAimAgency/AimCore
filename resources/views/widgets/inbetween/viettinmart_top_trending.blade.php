@php
    $layout = $config['layout'] ?? 'slider';
    $isSwiper = ($layout === 'slider');
    $uniqueId = 'swiper-trending-' . ($widget->id ?? $widget->settings['id'] ?? uniqid());
    $colsDesktop = (int)($config['columns'] ?? 4);
    $colsTablet = (int)($config['columns_tablet'] ?? 3);
    $colsMobile = (int)($config['columns_mobile'] ?? 2);
    $showNav = (bool)($config['show_nav'] ?? 1);
@endphp

<!-- Top Trending Products Area start -->
<div class="top-tranding-product rts-section-gap" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between align-items-center mb-4">
                    <h2 class="title-left mb-0">{{ $config['title'] ?? __('frontend.widget_top_trending') }}</h2>
                    @if($isSwiper && $showNav)
                    <div class="next-prev-swiper-wrapper mb-0">
                        <div class="swiper-button-prev {{ $uniqueId }}-prev"><i class="fa-regular fa-chevron-left"></i></div>
                        <div class="swiper-button-next {{ $uniqueId }}-next"><i class="fa-regular fa-chevron-right"></i></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container product-card">
        <div class="row">
            <div class="col-lg-12">
                @if($isSwiper)
                <div class="category-area-main-wrapper-one">
                    <div class="swiper swiper-data" data-swiper='{
                        "spaceBetween":16,
                        "slidesPerView":{{ $colsDesktop }},
                        "loop": true,
                        "speed": 700,
                        "navigation":{
                            "nextEl":".{{ $uniqueId }}-next",
                            "prevEl":".{{ $uniqueId }}-prev"
                        },
                        "breakpoints":{
                            "0":{"slidesPerView":{{ $colsMobile }},"spaceBetween": 12},
                            "576":{"slidesPerView":{{ $colsMobile }},"spaceBetween":12},
                            "768":{"slidesPerView":{{ $colsTablet }},"spaceBetween":16},
                            "992":{"slidesPerView":{{ min(3, $colsDesktop) }},"spaceBetween":16},
                            "1200":{"slidesPerView":{{ $colsDesktop }},"spaceBetween":16}
                        }
                    }'>
                        <div class="swiper-wrapper">
                            @forelse($products as $product)
                            <div class="swiper-slide">
                                <x-product-card :product="$product" />
                            </div>
                            @empty
                            <div class="col-12 py-5 text-center text-muted">
                                Chưa có sản phẩm nào.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                @else
                <div class="row row-cols-{{ $colsMobile }} row-cols-md-{{ $colsTablet }} row-cols-lg-{{ $colsDesktop }} g-3 g-md-4">
                    @forelse($products as $product)
                    <div class="col">
                        <x-product-card :product="$product" />
                    </div>
                    @empty
                    <div class="col-12 w-100 py-5 text-center text-muted">
                        Chưa có sản phẩm nào.
                    </div>
                    @endforelse
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Top Trending Products Area end -->