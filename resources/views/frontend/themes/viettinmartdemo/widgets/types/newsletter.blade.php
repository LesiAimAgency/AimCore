<div class="rts-newsletter-area rts-section-gapBottom" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter-one-wrapper">
                    <div class="newsletter-inner-content">
                        <h2 class="title">{{ $config['title'] ?? __('frontend.newsletter_title') }}</h2>
                        <p class="disc">{{ $config['subtitle'] ?? __('frontend.newsletter_subtitle') }}</p>
                    </div>
                    <form action="#" class="newsletter-form">
                        <div class="input-wrapper">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" placeholder="{{ $config['placeholder'] ?? __('frontend.newsletter_placeholder') }}" required>
                        </div>
                        <button type="submit" class="rts-btn btn-primary radious-sm">{{ $config['btn_text'] ?? __('frontend.newsletter_subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
