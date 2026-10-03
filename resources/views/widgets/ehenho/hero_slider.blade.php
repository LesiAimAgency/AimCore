@php
    $carouselId = 'ehenhoCarousel_' . ($widget->id ?? 'hero');
    $slides = $slides ?? [];
@endphp

<div class="carousel slide" data-ride="carousel" id="{{ $carouselId }}" data-interval="{{ $interval ?? 5000 }}">
  <!-- Indicators -->
  @if(count($slides) > 1)
  <ol class="carousel-indicators">
    @foreach($slides as $index => $slide)
      <li data-target="#{{ $carouselId }}" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  @endif

  <div class="carousel-inner" role="listbox">
    @foreach($slides as $index => $slide)
      @php
        $bgImg = !empty($slide['image']) ? $slide['image'] : asset('themes/ehenho/images/tim-ban-bon-phuong.jpg');
        if (!str_starts_with($bgImg, 'http') && !str_starts_with($bgImg, '/')) {
            $bgImg = asset($bgImg);
        }
        $title = $slide['title'] ?? 'eHenho.com - Hẹn hò Online';
        $subtitle = $slide['subtitle'] ?? '';
        $btnText = $slide['button_text'] ?? 'TẠO HỒ SƠ CỦA BẠN!';
        $btnLink = !empty($slide['button_link']) ? $slide['button_link'] : route('ehenho.register');
      @endphp
      <div class="item {{ $index === 0 ? 'active' : '' }}">
        <div class="img-n" style="background-image: url('{{ $bgImg }}')"></div>
        <div class="container">
          <div class="carousel-caption">
            @if(!empty($title))
              <h1 style="text-shadow: 2px -2px 0 rgba(255,255,255,.4);">
                {{ $title }}
              </h1>
            @endif
            @if(!empty($subtitle))
              <p style="text-shadow: 1px -1px 0.1 rgba(0,0,0,.8);">
                {!! nl2br(e($subtitle)) !!}
              </p>
            @endif
            @if(!empty($btnText))
              <p>
                <a class="btn btn-danger btn-dg-cus btn-lg" href="{{ $btnLink }}" role="button">
                  <i aria-hidden="true" class="fa fa-arrow-right"></i> {{ $btnText }}
                </a>
              </p>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if(count($slides) > 1)
  <a class="left carousel-control" data-slide="prev" href="#{{ $carouselId }}" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" data-slide="next" href="#{{ $carouselId }}" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
