<div class="about-banner-area-bg rts-section-gap bg_iamge"@if(!empty($config['image'])) style="background-image: url('{{ asset($config['image']) }}')"@endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content-about-area">
                    <h1 class="title">{{ $config['title'] ?? __('frontend.widget_about_hero_default_title') }}</h1>
                    @if(!empty($config['subtitle']))
                        <p class="disc">
                            {{ $config['subtitle'] }}
                        </p>
                    @endif
                    @if(!empty($config['btn_text']))
                        <a href="{{ $config['btn_link'] ?? '#' }}" class="rts-btn btn-primary">{{ $config['btn_text'] }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
