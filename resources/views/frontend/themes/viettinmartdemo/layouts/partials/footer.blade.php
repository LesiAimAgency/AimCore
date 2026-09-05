<!-- rts footer one area start -->
<div class="rts-footer-area pt--80 bg_light-1">
    <div class="container">
        <div class="footer-main-content-wrapper pb--70 pb_sm--30">
            <div class="row g-4  w-100">
                {{-- Render dynamic footer columns from Admin widgets area 'footer' --}}
                @widgetArea('footer')

                    </div>{{-- /.row --}}
        </div>{{-- /.footer-main-content-wrapper --}}

        {{-- Footer Bottom --}}
        <div class="social-and-payment-area-wrapper">
            <div class="social-one-wrapper">
                <span>{{ __('footer.follow_us') }}</span>
                <ul>
                    @if(setting('facebook_url'))   <li><a href="{{ setting('facebook_url') }}"   target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>   @endif
                    @if(setting('twitter_url'))    <li><a href="{{ setting('twitter_url') }}"    target="_blank" rel="noopener"><i class="fa-brands fa-twitter"></i></a></li>       @endif
                    @if(setting('youtube_url'))    <li><a href="{{ setting('youtube_url') }}"    target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a></li>       @endif
                    @if(setting('instagram_url'))  <li><a href="{{ setting('instagram_url') }}"  target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li>     @endif
                    @if(setting('linkedin_url'))   <li><a href="{{ setting('linkedin_url') }}"   target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i></a></li>      @endif
                    @if(setting('tiktok_url'))     <li><a href="{{ setting('tiktok_url') }}"     target="_blank" rel="noopener"><i class="fa-brands fa-tiktok"></i></a></li>        @endif
                </ul>
            </div>
            <div class="copyright-area-footer-one">
                <p>{{ setting('copyright_text', '© ' . date('Y') . ' ' . setting('site_name', 'VietTinMart') . '. All rights reserved.') }}</p>
            </div>
        </div>

    </div>{{-- /.container --}}
</div>{{-- /.rts-footer-area --}}

{{-- Add CSS for footer styling --}}
<style>
/* ── Footer: Company Info ─────────────────────────────────────── */
.wized-header.mb--20 {
    margin-bottom: 20px;
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 10px;
    font-size: 14px;
    color: #74787C;
    line-height: 1.5;
}

.contact-info-item i {
    color: var(--color-primary);
    width: 16px;
    flex-shrink: 0;
    margin-top: 3px;
}

.contact-info-item a {
    color: #74787C;
    text-decoration: none;
}

.contact-info-item a:hover {
    color: var(--color-primary);
}

/* ── Footer: Newsletter form — fix button and captcha layout ─── */
.single-footer-wized .footersubscribe-form {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.single-footer-wized .footersubscribe-form .newsletter-input-group {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.single-footer-wized .footersubscribe-form .newsletter-input-group input[type="email"] {
    height: 48px;
    width: 100%;
    padding-left: 15px;
    padding-right: 110px; /* space for button */
    border-radius: 4px;
    border: 1px solid #e2e8f0;
    background: #fff;
    font-size: 14px;
}

.single-footer-wized .footersubscribe-form .newsletter-input-group button.rts-btn {
    position: absolute;
    right: 0;
    top: 0;
    height: 48px;
    padding: 0 16px;
    border-radius: 0 4px 4px 0;
    white-space: nowrap;
    font-size: 14px;
}

.single-footer-wized .footersubscribe-form .newsletter-captcha-box {
    width: 100%;
    overflow: hidden;
}

/* ── Footer: Payment Methods ──────────────────────────────────── */
.footer-payment-label {
    font-size: 13px;
    font-weight: 600;
    color: #74787C;
    margin-bottom: 10px;
}

.payment-icons {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    align-items: center;
}

.payment-icons img {
    height: 28px;
    width: auto;
    border-radius: 4px;
    border: 1px solid #e8e8e8;
    padding: 4px 6px;
    background: #fff;
    object-fit: contain;
}

/* ── Footer: Copyright ────────────────────────────────────────── */
.copyright-area-footer-one p {
    margin: 0;
    color: #74787C;
    font-size: 14px;
}

/* ── Responsive ───────────────────────────────────────────────── */
@media (max-width: 991px) {
    .single-footer-wized {
        margin-bottom: 40px;
    }
}

@media (max-width: 575px) {
    .single-footer-wized .footersubscribe-form input[type="email"] {
        padding-right: 100px;
    }
    .single-footer-wized .footersubscribe-form button.rts-btn {
        padding: 0 12px;
        font-size: 13px;
    }
}
</style>


<!-- Quick View Modal Container -->
<div id="quick-view-modal-container"></div> 
<!-- Compare Modal Container -->
<div id="compare-modal-container" style="display: none;">
    @include('shop.partials.compare_modal')
</div>
<!-- Theme Overlay -->
<div id="anywhere-home" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; pointer-events: none; visibility: hidden; opacity: 0;"></div>

{{-- Reset overlay on page load --}}
<script>
// Immediate reset - don't wait for DOM ready
(function() {
    // Force hide any potential overlay elements immediately
    const elementsToHide = [
        '#anywhere-home',
        '#rts__preloader', 
        '.preloader',
        '.search-input-area.show',
        '.product-details-popup-wrapper.popup'
    ];
    
    elementsToHide.forEach(selector => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(el => {
            if (el) {
                el.classList.remove('bgshow', 'show', 'popup');
                el.style.display = 'none';
                el.style.visibility = 'hidden';
                el.style.opacity = '0';
                el.style.pointerEvents = 'none';
                el.style.zIndex = '-1';
            }
        });
    });
    
    // Reset body
    if (document.body) {
        document.body.style.overflow = '';
    }
    
    // Additional safety - remove any fixed positioned elements with high z-index that might be stuck
    setTimeout(() => {
        const allElements = document.querySelectorAll('*');
        allElements.forEach(el => {
            const styles = window.getComputedStyle(el);
            const zIndex = parseInt(styles.zIndex);
            const position = styles.position;
            
            // If element has high z-index, is fixed/absolute, and covers most of screen
            if (zIndex > 998 && (position === 'fixed' || position === 'absolute')) {
                const rect = el.getBoundingClientRect();
                const coversScreen = rect.width > window.innerWidth * 0.8 && rect.height > window.innerHeight * 0.8;
                
                if (coversScreen && !el.id.includes('modal') && !el.classList.contains('swal2-container')) {
                    // This might be a stuck overlay
                    el.style.display = 'none';
                    el.style.visibility = 'hidden';
                    el.style.opacity = '0';
                    el.style.pointerEvents = 'none';
                }
            }
        });
    }, 100);
})();

document.addEventListener('DOMContentLoaded', function() {
    // Reset overlay state on page load
    const overlay = document.getElementById('anywhere-home');
    if (overlay) {
        overlay.classList.remove('bgshow');
        overlay.style.display = 'none';
        overlay.style.visibility = 'hidden';
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
    }
    
    // Force hide preloader
    const preloader = document.getElementById('rts__preloader');
    if (preloader) {
        preloader.style.display = 'none';
        preloader.style.visibility = 'hidden';
        preloader.style.opacity = '0';
        preloader.style.pointerEvents = 'none';
        preloader.classList.add('loaded');
    }
    
    // Reset body overflow
    document.body.style.overflow = '';
    
    // Reset any modal containers
    const modalContainer = document.getElementById('quick-view-modal-container');
    if (modalContainer) {
        modalContainer.innerHTML = '';
        modalContainer.style.display = 'none';
    }
    
    // Reset search overlay
    const searchArea = document.querySelector('.search-input-area');
    if (searchArea) {
        searchArea.classList.remove('show');
    }
    
    // Reset any popup wrappers
    const popupWrappers = document.querySelectorAll('.product-details-popup-wrapper');
    popupWrappers.forEach(wrapper => {
        wrapper.classList.remove('popup');
        wrapper.style.display = 'none';
    });
    
    // Reset sidebar
    const sideBar = document.getElementById('side-bar');
    if (sideBar) {
        sideBar.classList.remove('show');
    }
});

// Additional safety check - reset overlay every 5 seconds if it's stuck
setInterval(function() {
    const overlay = document.getElementById('anywhere-home');
    const sideBar = document.getElementById('side-bar');
    const modalContainer = document.getElementById('quick-view-modal-container');
    const preloader = document.getElementById('rts__preloader');
    
    // Hide preloader if it's still visible after 3 seconds
    if (preloader && preloader.style.display !== 'none') {
        preloader.style.display = 'none';
        preloader.style.opacity = '0';
        preloader.style.visibility = 'hidden';
        preloader.style.pointerEvents = 'none';
    }
    
    // If overlay is visible but no modal or sidebar is active, hide it
    if (overlay && overlay.classList.contains('bgshow')) {
        const hasActiveModal = modalContainer && modalContainer.innerHTML.trim() !== '';
        const hasActiveSidebar = sideBar && sideBar.classList.contains('show');
        
        if (!hasActiveModal && !hasActiveSidebar) {
            overlay.classList.remove('bgshow');
            overlay.style.display = 'none';
            overlay.style.visibility = 'hidden';
            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
            document.body.style.overflow = '';
        }
    }
}, 5000);
</script>

<style>
/* Ensure overlay doesn't interfere when not needed */
#anywhere-home:not(.bgshow) {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    pointer-events: none !important;
}

#anywhere-home.bgshow {
    display: block !important;
    visibility: visible !important;
    opacity: 0.7 !important;
    pointer-events: auto !important;
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    z-index: 999 !important;
    background: #0e1013 !important;
}

/* Ensure preloader doesn't get stuck */
#rts__preloader {
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

#rts__preloader.loaded,
#rts__preloader[style*="display: none"] {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    pointer-events: none !important;
}

.product-details-popup-wrapper.in-shopdetails{
    display: inline !important;
}

/* Ensure search overlay doesn't get stuck */
.search-input-area:not(.show) {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    pointer-events: none !important;
}

/* Global safety rule - prevent any stuck overlays */
body > div[style*="position: fixed"][style*="z-index"]:not(#quick-view-modal-container):not(.swal2-container):not(.vtm-float-buttons):not(#ghost-notif) {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    pointer-events: none !important;
}

/* Ensure body is never locked */
body {
    overflow: visible !important;
}

/* Reset any transform that might hide content */
.container, .row, .col-lg-12, main {
    transform: none !important;
}
</style>

{{-- ── Floating Contact Buttons ─────────────────────────────────────── --}}
@if(setting('btn_zalo_enabled') || setting('btn_messenger_enabled') || setting('btn_phone_enabled'))
<div class="vtm-float-buttons" style="position:fixed;bottom:80px;right:20px;z-index:9999;display:flex;flex-direction:column;gap:10px;align-items:flex-end;">
    @if(setting('btn_phone_enabled') && setting('btn_phone_number'))
    <a href="tel:{{ setting('btn_phone_number') }}" class="vtm-float-btn vtm-float-phone"
       title="Gọi điện: {{ setting('btn_phone_number') }}"
       style="width:48px;height:48px;border-radius:50%;background:#629D23;color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.2);text-decoration:none;animation:vtm-pulse 2s infinite;">
        <i class="fa-solid fa-phone" style="font-size:18px;"></i>
    </a>
    @endif

    @if(setting('btn_zalo_enabled') && setting('btn_zalo_number'))
    <a href="https://zalo.me/{{ setting('btn_zalo_number') }}" target="_blank" rel="noopener"
       class="vtm-float-btn vtm-float-zalo"
       title="Chat Zalo"
       style="width:48px;height:48px;border-radius:50%;background:#0068FF;color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.2);text-decoration:none;">
        <img src="{{ asset('theme/images/icons/zalo-icon.png') }}" alt="Zalo"
             onerror="this.style.display='none';this.nextElementSibling.style.display='block';"
             style="width:28px;height:28px;object-fit:contain;">
        <span style="display:none;font-size:11px;font-weight:700;">Zalo</span>
    </a>
    @endif

    @if(setting('btn_messenger_enabled') && setting('btn_messenger_page_id'))
    <a href="https://m.me/{{ setting('btn_messenger_page_id') }}" target="_blank" rel="noopener"
       class="vtm-float-btn vtm-float-messenger"
       title="Chat Messenger"
       style="width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,#0099FF,#A033FF);color:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.2);text-decoration:none;">
        <i class="fa-brands fa-facebook-messenger" style="font-size:22px;"></i>
    </a>
    @endif
</div>
<style>
@keyframes vtm-pulse {
    0%,100%{box-shadow:0 4px 12px rgba(98,157,35,.4);}
    50%{box-shadow:0 4px 20px rgba(98,157,35,.8);}
}
</style>
@endif

{{-- ── Ghost Notification (Fake Order Popup) ───────────────────────── --}}
@if(setting('ghost_notif_enabled'))
@php
    $gnNames     = array_filter(array_map('trim', explode("\n", setting('ghost_notif_names', ''))));
    $gnLocations = array_filter(array_map('trim', explode("\n", setting('ghost_notif_locations', ''))));
    $gnInterval  = (int) setting('ghost_notif_interval', 30);
    $gnDuration  = (int) setting('ghost_notif_duration', 5);
@endphp
@if(!empty($gnNames) && !empty($gnLocations))
<div id="ghost-notif" style="display:none;position:fixed;bottom:20px;left:20px;z-index:9998;background:#fff;border-radius:12px;box-shadow:0 8px 32px rgba(0,0,0,.12);padding:16px 20px;max-width:320px;border-left:4px solid var(--color-primary);animation:vtm-slideIn .5s cubic-bezier(0.4, 0, 0.2, 1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.2);">
    <div style="display:flex;align-items:center;gap:12px;">
        <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg, var(--color-primary-light), var(--color-primary-alpha-20));display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 4px 12px rgba(98, 157, 35, 0.2);">
            <i class="fa-solid fa-bag-shopping" style="color:var(--color-primary);font-size:16px;"></i>
        </div>
        <div style="flex:1;min-width:0;">
            <p id="ghost-notif-text" style="margin:0;font-size:14px;font-weight:600;color:#1a1a1a;line-height:1.3;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></p>
            <span style="font-size:12px;color:#666;font-weight:500;display:flex;align-items:center;gap:4px;margin-top:2px;">
                <i class="fa-solid fa-circle-check" style="color:var(--color-success);font-size:10px;"></i>
                vừa đặt hàng thành công
            </span>
        </div>
        <button onclick="document.getElementById('ghost-notif').style.display='none'" style="width:5%; border:none;background:rgba(0,0,0,0.05);color:#999;cursor:pointer;padding:6px;margin-left:8px;font-size:14px;line-height:1;border-radius:50%;width:28px;height:28px;display:flex;align-items:center;justify-content:center;transition:all 0.2s ease;" onmouseover="this.style.background='rgba(0,0,0,0.1)'" onmouseout="this.style.background='rgba(0,0,0,0.05)'">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>
<style>
@keyframes vtm-slideIn {
    from {
        transform: translateX(-110%) scale(0.9);
        opacity: 0;
    }
    to {
        transform: translateX(0) scale(1);
        opacity: 1;
    }
}

@keyframes vtm-slideOut {
    from {
        transform: translateX(0) scale(1);
        opacity: 1;
    }
    to {
        transform: translateX(-110%) scale(0.9);
        opacity: 0;
    }
}

#ghost-notif {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

#ghost-notif:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0,0,0,.15);
}
</style>
<script>
(function(){
    const names     = @json(array_values($gnNames));
    const locations = @json(array_values($gnLocations));
    const interval  = {{ $gnInterval }} * 1000;
    const duration  = {{ $gnDuration }} * 1000;
    const el        = document.getElementById('ghost-notif');
    const textEl    = document.getElementById('ghost-notif-text');

    function showNotif() {
        const name = names[Math.floor(Math.random() * names.length)];
        const loc  = locations[Math.floor(Math.random() * locations.length)];
        textEl.textContent = name + ' (' + loc + ')';
        
        // Show with animation
        el.style.display = 'block';
        el.style.animation = 'vtm-slideIn .5s cubic-bezier(0.4, 0, 0.2, 1)';
        
        // Hide with animation after duration
        setTimeout(() => {
            el.style.animation = 'vtm-slideOut .4s cubic-bezier(0.4, 0, 0.2, 1)';
            setTimeout(() => {
                el.style.display = 'none';
            }, 400);
        }, duration);
    }

    // Enhanced close button with animation
    const closeBtn = el.querySelector('button');
    closeBtn.onclick = function() {
        el.style.animation = 'vtm-slideOut .3s cubic-bezier(0.4, 0, 0.2, 1)';
        setTimeout(() => {
            el.style.display = 'none';
        }, 300);
    };

    // First show after 5s, then repeat
    setTimeout(function loop() {
        showNotif();
        setTimeout(loop, interval);
    }, 5000);
})();
</script>
@endif
@endif