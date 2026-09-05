@php
    $desktopEnabled = (bool) setting('contact_buttons_desktop_enabled', setting('desktop_enabled', true));
    $mobileEnabled = (bool) setting('contact_buttons_mobile_enabled', setting('mobile_enabled', true));
    $rawButtons = setting('contact_buttons', []);
    
    if (is_string($rawButtons)) {
        $rawButtons = json_decode($rawButtons, true) ?: [];
    }

    $activeButtons = [];
    if (!empty($rawButtons)) {
        foreach ($rawButtons as $b) {
            if (!empty($b['enabled']) && !empty($b['value'])) {
                $activeButtons[] = $b;
            }
        }
    }

    // Fallback to legacy scalar settings if contact_buttons array is empty
    if (empty($activeButtons)) {
        if (setting('btn_phone_enabled', true) && ($phone = setting('btn_phone_number', setting('contact_phone', '0906910022')))) {
            $activeButtons[] = [
                'type' => 'phone',
                'label' => 'Gọi điện',
                'value' => $phone,
                'color' => '#10b981',
            ];
        }
        if (setting('btn_zalo_enabled', true) && ($zalo = setting('btn_zalo_number', setting('contact_zalo', '0906910022')))) {
            $activeButtons[] = [
                'type' => 'zalo',
                'label' => 'Chat Zalo',
                'value' => $zalo,
                'color' => '#0068ff',
            ];
        }
        if (setting('btn_messenger_enabled', true) && ($msg = setting('btn_messenger_url', setting('contact_messenger', 'viettinmart')))) {
            $activeButtons[] = [
                'type' => 'messenger',
                'label' => 'Messenger',
                'value' => $msg,
                'color' => '#0084ff',
            ];
        }
    }

    if ((!$desktopEnabled && !$mobileEnabled) || empty($activeButtons)) {
        return;
    }

    $desktopPos = setting('contact_buttons_desktop_position', setting('desktop_position', 'bottom-right'));
    $mobilePos = setting('contact_buttons_mobile_position', setting('mobile_position', 'bottom-right'));
    $desktopMarginV = (int) setting('contact_buttons_desktop_margin_v', 30);
    $desktopMarginH = (int) setting('contact_buttons_desktop_margin_h', 30);
    $mobileMarginV = (int) setting('contact_buttons_mobile_margin_v', 20);
    $mobileMarginH = (int) setting('contact_buttons_mobile_margin_h', 20);
    $btnStyle = setting('contact_buttons_style', 'circle');
@endphp

<!-- Floating Contact Buttons Component -->
<div id="vtm-floating-contact-buttons" class="vtm-contact-buttons vtm-style-{{ $btnStyle }}">
    @foreach($activeButtons as $btn)
        @php
            $type = $btn['type'] ?? 'phone';
            $val = trim($btn['value'] ?? '');
            $label = $btn['label'] ?? ucfirst($type);
            $color = $btn['color'] ?? '#10b981';
            
            $href = '#';
            $target = '_self';
            if ($type === 'phone') {
                $cleanPhone = preg_replace('/[^0-9+]/', '', $val);
                $href = "tel:{$cleanPhone}";
            } elseif ($type === 'zalo') {
                $cleanPhone = preg_replace('/[^0-9]/', '', $val);
                $href = "https://zalo.me/{$cleanPhone}";
                $target = '_blank';
            } elseif ($type === 'messenger') {
                $cleanMsg = str_starts_with($val, 'http') ? $val : "https://m.me/{$val}";
                $href = $cleanMsg;
                $target = '_blank';
            } elseif ($type === 'sms') {
                $cleanPhone = preg_replace('/[^0-9+]/', '', $val);
                $href = "sms:{$cleanPhone}";
            }
        @endphp

        <a href="{{ $href }}" target="{{ $target }}" rel="noopener noreferrer" 
           class="vtm-contact-btn vtm-btn-{{ $type }}" 
           style="--btn-color: {{ $color }};"
           aria-label="{{ $label }}" title="{{ $label }}">
            <div class="vtm-btn-icon">
                @if($type === 'phone')
                    <i class="fa-solid fa-phone-volume"></i>
                @elseif($type === 'zalo')
                    <span class="vtm-zalo-text">Zalo</span>
                @elseif($type === 'messenger')
                    <i class="fa-brands fa-facebook-messenger"></i>
                @elseif($type === 'sms')
                    <i class="fa-solid fa-comment-sms"></i>
                @else
                    <i class="fa-solid fa-headset"></i>
                @endif
            </div>
            <span class="vtm-btn-tooltip">{{ $label }}</span>
        </a>
    @endforeach
</div>

<style>
.vtm-contact-buttons {
    position: fixed;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* Positions for Desktop */
@media (min-width: 768px) {
    .vtm-contact-buttons {
        display: {{ $desktopEnabled ? 'flex' : 'none' }};
        @if($desktopPos === 'top-left')
            top: {{ $desktopMarginV }}px;
            left: {{ $desktopMarginH }}px;
        @elseif($desktopPos === 'top-right')
            top: {{ $desktopMarginV }}px;
            right: {{ $desktopMarginH }}px;
        @elseif($desktopPos === 'bottom-left')
            bottom: {{ $desktopMarginV }}px;
            left: {{ $desktopMarginH }}px;
        @else
            bottom: {{ $desktopMarginV }}px;
            right: {{ $desktopMarginH }}px;
        @endif
    }
}

/* Positions for Mobile */
@media (max-width: 767.98px) {
    .vtm-contact-buttons {
        display: {{ $mobileEnabled ? 'flex' : 'none' }};
        @if($mobilePos === 'top-left')
            top: {{ $mobileMarginV }}px;
            left: {{ $mobileMarginH }}px;
        @elseif($mobilePos === 'top-right')
            top: {{ $mobileMarginV }}px;
            right: {{ $mobileMarginH }}px;
        @elseif($mobilePos === 'bottom-left')
            bottom: {{ $mobileMarginV }}px;
            left: {{ $mobileMarginH }}px;
        @else
            bottom: {{ $mobileMarginV }}px;
            right: {{ $mobileMarginH }}px;
        @endif
    }
}

.vtm-contact-btn {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background-color: var(--btn-color, #10b981);
    color: #ffffff !important;
    text-decoration: none !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.22);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
}

.vtm-style-circle .vtm-contact-btn {
    border-radius: 50%;
}
.vtm-style-rounded .vtm-contact-btn {
    border-radius: 12px;
}
.vtm-style-square .vtm-contact-btn {
    border-radius: 4px;
}
.vtm-style-shadow .vtm-contact-btn {
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.vtm-contact-btn:hover {
    transform: scale(1.12);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.vtm-btn-icon {
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.vtm-zalo-text {
    font-size: 13px;
    font-weight: 800;
    letter-spacing: -0.5px;
    font-family: inherit;
}

/* Tooltip on hover */
.vtm-btn-tooltip {
    position: absolute;
    right: 58px;
    background: rgba(30, 41, 59, 0.92);
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 6px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transform: translateX(10px);
    transition: all 0.2s ease;
}

.vtm-contact-buttons[style*="left"] .vtm-btn-tooltip {
    right: auto;
    left: 58px;
    transform: translateX(-10px);
}

.vtm-contact-btn:hover .vtm-btn-tooltip {
    opacity: 1;
    transform: translateX(0);
}

/* Subtle ring pulse animation for phone */
@keyframes vtmPulseRing {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 12px rgba(16, 185, 129, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}

.vtm-btn-phone {
    animation: vtmPulseRing 2.2s infinite cubic-bezier(0.45, 0, 0.55, 1);
}
</style>
