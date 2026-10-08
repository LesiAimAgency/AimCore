@php
    $layout = $config['layout'] ?? 'slider';
    $isSwiper = ($layout === 'slider');
    $uniqueId = 'swiper-' . substr(md5(json_encode($config) . ($config['title'] ?? '')), 0, 8);
    $colsDesktop = (int)($config['columns'] ?? 5);
    $colsTablet = (int)($config['columns_tablet'] ?? 3);
    $colsMobile = (int)($config['columns_mobile'] ?? 2);
    $showNav = (bool)($config['show_nav'] ?? 1);
    $autoplay = (bool)($config['autoplay'] ?? 0);
    $autoplayDelay = (int)($config['autoplay_delay'] ?? 4000);
    $loop = (bool)($config['loop'] ?? 1);
    $showViewAll = (bool)($config['show_view_all'] ?? 0);
    $viewAllText = $config['view_all_text'] ?? 'Xem tất cả';
    $viewAllLink = $config['view_all_link'] ?? '/shop';
@endphp
<div id="{{ $uniqueId }}-wrapper" class="{{ $config['wrap_class'] ?? 'rts-grocery-feature-area rts-section-gapBottom' }}" {!! $sectionStyles !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between align-items-center mb-4">
                    <div>
                        <h2 class="title-left mb-1">{{ $config['title'] ?? __('frontend.widget_deal_default_title') }}</h2>
                        @if(!empty($config['subtitle']))
                            <p class="text-muted small mb-0">{{ $config['subtitle'] }}</p>
                        @endif
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        @if($showViewAll)
                            <a href="{{ $viewAllLink }}" class="rts-btn btn-sm btn-light border d-inline-flex align-items-center gap-1.5 text-xs font-semibold py-1.5 px-3 rounded-pill text-dark hover:text-primary">
                                <span>{{ $viewAllText }}</span>
                                <i class="fa-regular fa-arrow-right text-[10px]"></i>
                            </a>
                        @endif
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($isSwiper)
                <div class="category-area-main-wrapper-one">
                    <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                        "spaceBetween":16,
                        "slidesPerView":{{ $colsDesktop }},
                        "loop": {{ $loop ? "true" : "false" }},
                        "speed": 700,
                        @if($autoplay)
                        "autoplay":{"delay":{{ $autoplayDelay }}},
                        @endif
                        "navigation":{
                            "nextEl":".{{ $uniqueId }}-next",
                            "prevEl":".{{ $uniqueId }}-prev"
                        },
                        "breakpoints":{
                            "0":{"slidesPerView":{{ $colsMobile }},"spaceBetween": 12},
                            "576":{"slidesPerView":{{ $colsMobile }},"spaceBetween":12},
                            "768":{"slidesPerView":{{ $colsTablet }},"spaceBetween":16},
                            "992":{"slidesPerView":{{ min(4, $colsDesktop) }},"spaceBetween":16},
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
                                Chưa có sản phẩm nào trong danh mục này.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                @else
                {{-- Grid Layout --}}
                <div class="row row-cols-{{ $colsMobile }} row-cols-md-{{ $colsTablet }} row-cols-lg-{{ $colsDesktop }} g-3 g-md-4">
                    @forelse($products as $product)
                    <div class="col">
                        <x-product-card :product="$product" />
                    </div>
                    @empty
                    <div class="col-12 w-100 py-5 text-center text-muted">
                        Chưa có sản phẩm nào trong danh mục này.
                    </div>
                    @endforelse
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
