@php
    $slides = [];
    $interval = 5000;

    // 1. Try reading from active Widget in DB
    $project = request()->attributes->get('project');
    $tenantId = $project?->tenant_id ?? session('current_tenant_id') ?? $project?->id;

    $widget = \App\Models\Widget::withoutGlobalScope('tenant')
        ->where(function ($q) use ($project, $tenantId) {
            if ($project?->id) {
                $q->where('project_id', $project->id);
            }
            if ($tenantId) {
                $q->orWhere('tenant_id', $tenantId);
            }
        })
        ->where(function ($q) {
            $q->where('type', 'ehenho_hero_slider')
                ->orWhere('type', 'SliderWidget');
        })
        ->where('is_active', true)
        ->first();

    if ($widget && ! empty($widget->settings)) {
        $wSettings = $widget->settings;
        if (! empty($wSettings['slides']) && is_array($wSettings['slides'])) {
            $slides = $wSettings['slides'];
        }
        if (! empty($wSettings['interval'])) {
            $interval = (int) $wSettings['interval'];
        }
    }

    // 2. Fallback to settings store
    if (empty($slides)) {
        $settingSlides = setting('ehenho_slider_data');
        if (is_string($settingSlides) && ! empty($settingSlides)) {
            $slides = json_decode($settingSlides, true) ?: [];
        } elseif (is_array($settingSlides)) {
            $slides = $settingSlides;
        }
        $interval = (int) (setting('ehenho_slider_interval') ?: 5000);
    }

    // 3. Fallback to default slides
    if (empty($slides)) {
        $slides = \App\Widgets\Ehenho\EhenhoHeroSliderWidget::getDefaultSlides();
    }
@endphp

<div class="carousel slide" data-ride="carousel" id="myCarousel" data-interval="{{ $interval }}">
  <!-- Indicators -->
  @if(count($slides) > 1)
  <ol class="carousel-indicators">
    @foreach($slides as $index => $slide)
      <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
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
        $title = $slide['title'] ?? 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương';
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
  <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" data-slide="next" href="#myCarousel" role="button">
    <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
