@php
    $layout = $config['layout'] ?? 'grid';
    $uniqueId = 'ws-' . uniqid();
    $columns = (int)($config['columns'] ?? 5);

    // Dynamic Styling
    $sectionClass = $config['section_class'] ?? 'rts-product-area rts-section-gapBottom';
    $containerClass = $config['container_class'] ?? 'container';
    $rowClass = $config['row_class'] ?? 'row g-4';
    $titleClass = $config['title_class'] ?? 'title';
    $btnClass = $config['btn_class'] ?? 'rts-btn btn-primary';

    // Shared Column Logic
    $gridColClass = $config['col_class'] ?? match((string)$columns) {
        '2' => 'col-lg-6 col-md-6',
        '3' => 'col-lg-4 col-md-6',
        '4' => 'col-lg-3 col-md-6',
        '6' => 'col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6',
        default => 'col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6'
    };
@endphp

<div id="{{ $uniqueId }}-wrapper" class="{{ $sectionClass }}" {!! $sectionStyles ?? '' !!}>
    <div class="{{ $containerClass }}">
        @if($layout === 'tabs')
            <x-section-header :title="$config['title'] ?? __('widget_weekly_best_selling')" :uniqueId="$uniqueId" :titleClass="$titleClass">
                @if(!empty($config['tabs']))
                <ul class="nav nav-tabs best-selling-grocery" id="tabs-{{ uniqid() }}" role="tablist">
                    @foreach($config['tabs'] as $i => $tab)
                    <li class="nav-item">
                        <button class="nav-link {{ $i == 0 ? 'active' : '' }}" 
                                data-bs-toggle="tab" 
                                data-bs-target="#tab-{{ uniqid() }}-{{ $i }}">{{ $tab['label'] }}</button>
                    </li>
                    @endforeach
                </ul>
                @endif
            </x-section-header>

            <div class="tab-content " id="tabs-content-{{ uniqid() }}">
                @foreach($tabProducts as $i => $products)
                <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}" id="tab-{{ uniqid() }}-{{ $i }}">
                    <div class="category-area-main-wrapper-one" style="position: relative;">
                        <div class="swiper swiper-data" data-swiper='{
                            "spaceBetween":16,
                            "slidesPerView":{{ $columns }},
                            "loop": true,
                            "speed": 700,
                            "observer": true,
                            "observeParents": true,
                            "navigation":{
                                "nextEl":".{{ $uniqueId }}-{{ $i }}-next",
                                "prevEl":".{{ $uniqueId }}-{{ $i }}-prev"
                            },
                            "breakpoints":{
                            "0":{"slidesPerView":1,"spaceBetween": 12},
                            "480":{"slidesPerView":2,"spaceBetween":12},
                            "640":{"slidesPerView":2,"spaceBetween":16},
                            "840":{"slidesPerView":3,"spaceBetween":16},
                            "1140":{"slidesPerView":{{ min(4, $columns) }},"spaceBetween":16},
                            "1540":{"slidesPerView":{{ min(5, $columns) }},"spaceBetween":16},
                            "1840":{"slidesPerView":{{ $columns }},"spaceBetween":16}
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
                        {{-- Tab-specific navigation --}}
                        <div class="swiper-button-prev {{ $uniqueId }}-{{ $i }}-prev" style="left: -20px; width: 40px; height: 40px; background: #fff; border-radius: 50%; box-shadow: 0 2px 10px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; z-index: 10;"><i class="fa-regular fa-chevron-left"></i></div>
                        <div class="swiper-button-next {{ $uniqueId }}-{{ $i }}-next" style="right: -20px; width: 40px; height: 40px; background: #fff; border-radius: 50%; box-shadow: 0 2px 10px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; z-index: 10;"><i class="fa-regular fa-chevron-right"></i></div>
                    </div>
                </div>
                @endforeach
            </div>

        @elseif($layout === 'slider')
            <x-section-header :title="$config['title']" :uniqueId="$uniqueId" :isSlider="true" :titleClass="$titleClass" />
            <div class="{{ $rowClass }} mt--20">
                <div class="col-lg-12">
                    <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                        "spaceBetween":16,
                        "slidesPerView":{{ $columns }},
                        "loop": true,
                        "speed": 700,
                        "navigation":{
                            "nextEl":".slider-{{ $uniqueId }}-next",
                            "prevEl":".slider-{{ $uniqueId }}-prev"
                        },
                        "breakpoints":{
                        "0":{"slidesPerView":1,"spaceBetween": 12},
                        "480":{"slidesPerView":2,"spaceBetween":12},
                        "640":{"slidesPerView":2,"spaceBetween":16},
                        "840":{"slidesPerView":3,"spaceBetween":16},
                        "1140":{"slidesPerView":{{ min(5, $columns) }},"spaceBetween":16},
                        "1540":{"slidesPerView":{{ $columns }},"spaceBetween":16}
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

        @elseif($layout === 'countdown')
            <x-section-header :title="$config['title']" :titleClass="$titleClass">
                <div class="countdown">
                    <div class="countDown">{{ $config['end_date'] ?? '12/31/2026 23:59:59' }}</div>
                </div>
            </x-section-header>
            <div class="{{ $rowClass }} mt--20">
                <div class="col-xl-4 col-lg-12">
                    @foreach($config['promo_cards'] ?? [] as $banner)
                        <a href="{{ $banner['link'] ?? '#' }}" class="single-discount-with-bg {{ $banner['bg_class'] ?? '' }} mb--20"
                           @if(!empty($banner['image'])) style="background-image: url('{{ media_url($banner['image']) }}')" @endif>
                            <div class="inner-content">
                                <h4 class="{{ $titleClass }}">{!! nl2br(e($banner['title'])) !!}</h4>
                                <div class="price-area">
                    <span>{{ __('frontend.widget_product_only') }}</span>
                                    <h4 class="title">{{ $banner['price'] ?? '' }}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="row g-4">
                        @foreach($products as $product)
                            <div class="col-lg-6 col-md-12">
                                <x-product-card-horizontal :product="$product" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @else
            <x-section-header :title="$config['title']" :titleClass="$titleClass">
                @if(!empty($config['btn_link']))
                    <a href="{{ $config['btn_link'] }}" class="{{ $btnClass }}">{{ $config['btn_text'] ?? __('frontend.widget_product_view_all') }}</a>
                @endif
            </x-section-header>
            <div class="{{ $rowClass }} mt--20">
                @foreach($products as $product)
                <div class="{{ $gridColClass }} col-sm-6 col-12">
                    <x-product-card :product="$product" />
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

