@php
    $widgetId = $widget->id ?? $widget->settings['id'] ?? uniqid();
    $commonUniqueId = 'swiper-tabs-' . $widgetId;
@endphp

<!-- Weekly Best Selling Groceries -->
<div class="weekly-best-selling-area rts-section-gap {{ ($config['bg_light'] ?? true) ? 'bg_light-1' : '' }}" {!! $sectionStyles !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left">{{ $config['title'] ?? __('frontend.widget_weekly_best_selling') }}</h2>
                    <div class="next-prev-tabs-wrapper" style="display: flex; align-items: center; gap: 20px;">
                        @if(!empty($config['tabs']))
                        <ul class="nav nav-tabs best-selling-grocery" id="tab-{{ $widgetId }}" role="tablist">
                            @foreach($config['tabs'] as $i => $tab)
                            <li class="nav-item">
                                <button class="nav-link {{ $i == 0 ? 'active' : '' }}" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#tab-content-{{ $widgetId }}-{{ $i }}">{{ $tab['label'] }}</button>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="tab-content-{{ $widgetId }}">
            @foreach($tabProducts as $i => $products)
            @php
                $tabUniqueId = $commonUniqueId . '-' . $i;
                $slidesPerView = (int)($config['columns'] ?? 5);
            @endphp
            <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}" id="tab-content-{{ $widgetId }}-{{ $i }}">
                <div class="category-area-main-wrapper-one" style="position: relative;">
                    <div class="swiper swiper-data" data-swiper='{
                        "spaceBetween":16,
                        "slidesPerView":{{ $slidesPerView }},
                        "loop": true,
                        "speed": 700,
                        "observer": true,
                        "observeParents": true,
                        "navigation":{
                            "nextEl":".{{ $tabUniqueId }}-next",
                            "prevEl":".{{ $tabUniqueId }}-prev"
                        },
                        "breakpoints":{
                        "0":{"slidesPerView":1,"spaceBetween": 12},
                        "480":{"slidesPerView":2,"spaceBetween":12},
                        "640":{"slidesPerView":2,"spaceBetween":16},
                        "840":{"slidesPerView":3,"spaceBetween":16},
                        "1140":{"slidesPerView":{{ min(4, $slidesPerView) }},"spaceBetween":16},
                        "1540":{"slidesPerView":{{ min(5, $slidesPerView) }},"spaceBetween":16},
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
                    <div class="swiper-prev {{ $tabUniqueId }}-prev"><i class="fa-regular fa-chevron-left"></i></div>
                    <div class="swiper-next {{ $tabUniqueId }}-next"><i class="fa-regular fa-chevron-right"></i></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@once
<style>
.category-area-main-wrapper-one .swiper-prev,
.category-area-main-wrapper-one .swiper-next {
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
.category-area-main-wrapper-one .swiper-prev {
    left: 0;
}
.category-area-main-wrapper-one .swiper-next {
    right: 0;
}
.category-area-main-wrapper-one .swiper-prev:hover,
.category-area-main-wrapper-one .swiper-next:hover {
    background: var(--color-primary);
    color: #fff;
    border-color: var(--color-primary);
}

@media (max-width: 576px) {
    .category-area-main-wrapper-one .swiper-prev { left: 0; }
    .category-area-main-wrapper-one .swiper-next { right: 0; }
}
</style>
@endonce
