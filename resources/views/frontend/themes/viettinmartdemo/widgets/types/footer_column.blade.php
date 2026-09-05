@php
    $type = $config['type'] ?? 'menu';
    $title = $config['title'] ?? __('frontend.widget_footer_title');

    // Resolve menu slug (prefer custom over dropdown)
    $menuSlug = !empty($config['custom_menu_slug'])
        ? $config['custom_menu_slug']
        : $config['menu_slug'] ?? 'footer-info';
@endphp

<div class="{{ $config['col_class'] ?? 'single-footer-wized' }}">
    <h3 class="{{ $config['title_class'] ?? 'footer-title animated fadeIn' }}">{{ $title }}</h3>

    @if ($type === 'contact')
        @php
            $phone1 = $config['phone'] ?? setting('contact_phone');
            $phone2 = $config['phone_2'] ?? setting('contact_phone_2');
            $email1 = $config['email'] ?? (setting('contact_email_display') ?: setting('contact_email'));
            $email2 = $config['email_2'] ?? setting('contact_email_2');
        @endphp

        <div class="company-info" style="font-size:13px;line-height:1.7;color:#74787C;margin-bottom:15px;">
            <p style="margin:0">{{ setting('company_legal_name', 'CÔNG TY TNHH VIỆT TÍN MART') }}</p>
            @if (setting('company_license'))
                <p style="margin-bottom:5px;">{{ setting('company_license') }}</p>
            @endif
            @if (setting('company_notice'))
                <p style="margin-bottom:0;color:#ff6b6b;font-style:italic;">{{ setting('company_notice') }}</p>
            @endif
        </div>

        @if ($phone1 || $phone2)
            <div class="call-area">
                <div class="{{ $config['icon_class'] ?? 'icon' }}"><i class="fa-solid fa-phone-rotary"></i></div>
                <div class="{{ $config['info_class'] ?? 'info' }}">
                    <span>{{ $config['phone_label'] ?? setting('footer_phone_label', 'Số Điện Thoại') }}</span>
                    @if ($phone1)
                        <a href="tel:{{ str_replace(' ', '', $phone1) }}" class="number">{{ $phone1 }}</a>
                    @endif
                    @if ($phone2)
                        <a href="tel:{{ str_replace(' ', '', $phone2) }}" class="number"
                            style="display: block; margin-top: 2px;">{{ $phone2 }}</a>
                    @endif
                </div>
            </div>
        @endif

        @if ($email1 || $email2)
            <div class="call-area" style="margin-top:16px;">
                <div class="{{ $config['icon_class'] ?? 'icon' }}"><i class="fa-solid fa-envelope"></i></div>
                <div class="{{ $config['info_class'] ?? 'info' }}">
                    <span>Email</span>
                    @if ($email1)
                        <a href="mailto:{{ $email1 }}" class="number"
                            style="font-size:14px;">{{ $email1 }}</a>
                    @endif
                    @if ($email2)
                        <a href="mailto:{{ $email2 }}" class="number"
                            style="font-size:14px; display: block; margin-top: 2px;">{{ $email2 }}</a>
                    @endif
                </div>
            </div>
        @endif

        @if (setting('contact_address'))
            <div class="call-area" style="margin-top:16px;">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="info">
                    <span>{{ setting('footer_address_label', 'Địa chỉ Công ty') }}</span>
                    @if (setting('contact_map_url'))
                        <a href="{{ setting('contact_map_url') }}" target="_blank"
                            style="font-size:13px;line-height:1.4;color:#74787C;">
                            {{ setting('contact_address') }}
                        </a>
                    @else
                        <span
                            style="font-size:13px;line-height:1.4;color:#74787C;">{{ setting('contact_address') }}</span>
                    @endif
                </div>
            </div>
        @endif

        @if (!empty($config['hours']) || setting('contact_hours'))
            <div class="opening-hour" style="margin-top:16px;">
                @if (!empty($config['hours']))
                    @foreach (explode("\n", $config['hours']) as $line)
                        @php
                            $parts = explode(':', $line, 2);
                            $day = $parts[0] ?? '';
                            $time = $parts[1] ?? '';
                        @endphp
                        <div class="single">
                            <p>{{ $day }}: <span>{{ trim($time) }}</span></p>
                        </div>
                    @endforeach
                @else
                    <div class="single">{{ setting('footer_hours_label', 'Giờ làm việc') }}:
                        <span>{{ setting('contact_hours') }}</span>
                    </div>
                @endif
            </div>
        @endif
    @elseif($type === 'menu')
        <div class="{{ $config['nav_class'] ?? 'footer-nav' }}">
            <ul>
                @foreach (\App\Models\Widget::getMenu($menuSlug) as $item)
                    <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? 'Link' }}</a></li>
                @endforeach
                @if (!empty($config['show_sitemap']))
                    <li><a href="{{ locale_route('sitemap_html') }}">{{ __('footer_sitemap') }}</a></li>
                @endif
            </ul>
        </div>
    @elseif($type === 'newsletter')
        <p class="disc-news-letter">{!! $config['newsletter_desc'] ?? __('frontend.footer_newsletter_desc') !!}</p>
        <form class="footersubscribe-form newsletter-form" action="{{ locale_route('newsletter.subscribe') }}"
            method="POST">
            @csrf

            {{-- Anti-spam measures --}}
            {!! honeypot_fields() !!}
            {!! form_timestamp() !!}

            <div class="newsletter-input-group">
                <input name="email" type="email"
                    placeholder="{{ $config['placeholder'] ?? __('frontend.footer_email_placeholder') }}" required>
                <button class="{{ $config['btn_class'] ?? 'rts-btn btn-primary' }}" type="submit">
                    <span class="btn-text">{{ $config['btn_text'] ?? __('frontend.footer_subscribe') }}</span>
                    <span class="btn-loading d-none">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                    </span>
                </button>
            </div>

            {{-- Simple math captcha --}}
            @if (setting('captcha_enabled', true))
                <div class="newsletter-captcha-box" style="margin-top: 8px;">
                    <x-simple-captcha />
                </div>
            @endif
        </form>
        @if (!empty($config['newsletter_note']))
            <p class="dsic">{{ $config['newsletter_note'] }}</p>
        @endif

        {{-- Payment Methods (Shared for parity) --}}
        @if (setting('payment_methods_images'))
            <div class="payment-methods mt--20">
                <h6 class="footer-payment-label">{{ __('footer.payment_methods') }}</h6>
                <div class="payment-icons">
                    @foreach (explode(',', setting('payment_methods_images')) as $paymentImage)
                        <img src="{{ trim($paymentImage) }}" alt="Payment Method">
                    @endforeach
                </div>
            </div>
        @endif
    @elseif($type === 'html')
        <div class="custom-html-content">
            {!! $config['html_content'] ?? '' !!}
        </div>
    @endif
</div>


