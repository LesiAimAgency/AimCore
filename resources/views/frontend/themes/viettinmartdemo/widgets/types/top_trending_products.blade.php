@php
    $uniqueId = 'swiper-trending-' . uniqid();
    $slidesPerView = (int)($config['columns'] ?? 4);
@endphp

<!-- Top Trending Products Area start -->
<div class="top-tranding-product rts-section-gap" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left mb--10">{{ $config['title'] ?? __('frontend.widget_top_trending') }}</h2>
                    <div class="next-prev-swiper-wrapper">
                        <div class="swiper-button-prev {{ $uniqueId }}-prev"><i class="fa-regular fa-chevron-left"></i></div>
                        <div class="swiper-button-next {{ $uniqueId }}-next"><i class="fa-regular fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container product-card">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-area-main-wrapper-one">
                    <div class="swiper swiper-data" data-swiper='{
                        "spaceBetween":16,
                        "slidesPerView":{{ $slidesPerView }},
                        "loop": true,
                        "speed": 700,
                        "navigation":{
                            "nextEl":".{{ $uniqueId }}-next",
                            "prevEl":".{{ $uniqueId }}-prev"
                        },
                        "breakpoints":{
                        "0":{"slidesPerView":1,"spaceBetween": 12},
                        "480":{"slidesPerView":2,"spaceBetween":12},
                        "640":{"slidesPerView":2,"spaceBetween":16},
                        "840":{"slidesPerView":3,"spaceBetween":16},
                        "1140":{"slidesPerView":{{ min(3, $slidesPerView) }},"spaceBetween":16},
                        "1540":{"slidesPerView":{{ min(4, $slidesPerView) }},"spaceBetween":16},
                        "1840":{"slidesPerView":{{ $slidesPerView }},"spaceBetween":16}
                        }
                    }'>
                        <div class="swiper-wrapper">
                            @foreach($products as $product)
                            <div class="swiper-slide">
                                <x-product-card :product="$product" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Trending Products Area end -->
