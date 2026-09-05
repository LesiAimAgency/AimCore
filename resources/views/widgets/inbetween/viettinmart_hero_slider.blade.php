<div class="rts-banner-area-one mb--30" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-area-main-wrapper-one">
                    <div class="swiper mySwiper-category-1 swiper-data"
                        data-swiper='{
                            "spaceBetween":0,
                            "slidesPerView":1,
                            "loop": true,
                            "speed": 1200,
                            "autoplay":{
                                "delay":"{{ $config['autoplay_delay'] ?? 4000 }}"
                            },
                            "navigation":{
                                "nextEl":".swiper-button-next",
                                "prevEl":".swiper-button-prev"
                            },
                            "breakpoints":{
                            "0":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                            "320":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                            "480":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                            "640":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                            "840":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                            "1140":{
                                "slidesPerView":1,
                                "spaceBetween":0}
                            }
                        }'>
                        <div class="swiper-wrapper">
                            @foreach($slides ?? [] as $slide)
                            @php
                                $bgClass = $loop->index % 2 == 1 ? 'two' : '';
                                $rawImg = $slide['image'] ?? null;
                                $imgUrl = !empty($rawImg) ? media_url($rawImg) : null;
                                $hasText = !empty($slide['title']) || !empty($slide['pre_title']) || !empty($slide['description']);
                            @endphp
                            <div class="swiper-slide">
                                @if(!$hasText && $imgUrl)
                                    {{-- Pure Image Banner Graphic (displays full image in crisp 100% natural proportions) --}}
                                    <div class="category-area-main-wrapper-one position-relative overflow-hidden" style="border-radius: 6px;">
                                        @if(!empty($slide['btn_link']))
                                            <a href="{{ $slide['btn_link'] }}" class="d-block w-100">
                                                <img src="{{ $imgUrl }}" alt="{{ $slide['title'] ?? 'Banner' }}" class="w-100 d-block" style="height: auto; max-height: 520px; object-fit: cover; border-radius: 6px;">
                                            </a>
                                        @else
                                            <img src="{{ $imgUrl }}" alt="{{ $slide['title'] ?? 'Banner' }}" class="w-100 d-block" style="height: auto; max-height: 520px; object-fit: cover; border-radius: 6px;">
                                        @endif
                                    </div>
                                @else
                                    {{-- Text Overlay Banner Mode --}}
                                    <div class="banner-bg-image bg_image {{ $slide['bg_class'] ?? 'bg_one-banner' }} {{ $bgClass }} ptb--120 ptb_md--80 ptb_sm--60"
                                         @if($imgUrl) style="background-image: url('{{ $imgUrl }}'); background-size: cover; background-position: center center; min-height: 480px;" @endif>
                                        <div class="banner-one-inner-content">
                                            @if(!empty($slide['pre_title']))
                                                <span class="pre">{{ $slide['pre_title'] }}</span>
                                            @endif
                                            @if(!empty($slide['title']))
                                            <h1 class="title">
                                                {!! nl2br(e($slide['title'])) !!}
                                            </h1>
                                            @endif
                                            @if(!empty($slide['description']))
                                                <p class="disc">{!! nl2br(e($slide['description'])) !!}</p>
                                            @endif
                                            @if(!empty($slide['btn_text']))
                                            <a href="{{ $slide['btn_link'] ?? '#' }}" class="rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text">
                                                    {{ $slide['btn_text'] }}
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <button class="swiper-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                        <button class="swiper-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
