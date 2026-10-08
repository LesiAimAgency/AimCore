<!DOCTYPE html>
<html lang="en" style="background-color: #131313;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>in • between - Your Local Team Before You're Ready To Hire One</title>
    <meta name="description" content="We help Asian SMEs, founders and entrepreneurs enter and grow in Vietnam.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/svn-gilroy">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @php
      $themeJsTime = file_exists(public_path('themes/inbetween_v2/js/inbetween.js')) ? filemtime(public_path('themes/inbetween_v2/js/inbetween.js')) : time();
      $themeCssTime = file_exists(public_path('themes/inbetween_v2/css/update.css')) ? filemtime(public_path('themes/inbetween_v2/css/update.css')) : time();
    @endphp
    <script type="module" crossorigin src="{{ asset('themes/inbetween_v2/js/main.js') }}?v={{ $themeJsTime }}"></script>
    <script type="module" crossorigin src="{{ asset('themes/inbetween_v2/js/Observer.js') }}?v={{ $themeJsTime }}"></script>
    <script type="module" crossorigin src="{{ asset('themes/inbetween_v2/js/inbetween.js') }}?v={{ $themeJsTime }}"></script>
    <link rel="stylesheet" crossorigin href="{{ asset('themes/inbetween_v2/css/style.css') }}?v={{ $themeCssTime }}">
    <link rel="stylesheet" crossorigin href="{{ asset('themes/inbetween_v2/css/update.css') }}?v={{ $themeCssTime }}">
    @stack('styles')
  </head>
  <body class="bg-[#131313] text-[#131313] font-sans antialiased overflow-hidden selection:bg-[#EC460B] selection:text-white">
    @yield('content')

    <div class="mobile-nav-overlay theme-inbetween-overlay" id="mobile-nav-overlay" aria-hidden="true"></div>
    <nav class="mobile-nav-drawer theme-inbetween-drawer" id="mobile-nav-drawer" aria-label="Inbetween Navigation Menu" role="dialog" aria-modal="true">
      <div class="flex items-center justify-start pb-8">
        <button class="inline-flex items-center gap-3 text-xs uppercase font-bold text-neutral-800 hover:text-[#EC460B] transition-colors cursor-pointer py-1 group focus:outline-none" id="close-drawer-btn" type="button" aria-label="Đóng menu"><span class="w-6 h-[1.5px] bg-neutral-800 group-hover:w-8 group-hover:bg-[#EC460B] transition-all"></span><span class="tracking-wider">Close</span></button>
      </div>
      <div class="flex-1 flex flex-col justify-start gap-8 font-sans">
        <ul class="space-y-5 pt-2">
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-intro" data-nav-link>HOME</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-hero" data-nav-link>ABOUT</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-what-we-do" data-nav-link>WHAT WE DO</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-where-we-focus" data-nav-link>WHERE WE FOCUS</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-founder" data-nav-link>FOUNDER</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-our-clients" data-nav-link>OUR CLIENTS</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-business" data-nav-link>BEYOND BUSINESS</a></li>
          <li><a class="nav-drawer-link block text-[22px] sm:text-[24px] font-medium text-[#131313] hover:text-[#EC460B] uppercase tracking-tight hover:translate-x-1.5 transition-all" href="#inbetween-footer" data-nav-link>CONTACT</a></li>
        </ul>
        <div class="pt-3 flex items-center justify-between gap-4">
          <a class="btn-drawer-outline btn-drawer-inbetween inline-flex items-center gap-3 px-6 py-2.5 rounded-full border border-[#131313] text-[#131313] hover:bg-[#EC460B] hover:border-[#EC460B] hover:text-white transition-all text-xs font-bold uppercase tracking-wider cursor-pointer" href="#contact-modal" data-contact-modal-toggle><span>LET'S CONNECT</span><span>&rarr;</span></a>
          <div class="flex items-center gap-1.5 text-xs font-semibold tracking-wider uppercase inbetween-drawer-lang">
            <span class="inbetween-lang-btn inbetween-lang-en active cursor-pointer text-[#131313] hover:text-[#EC460B] transition-colors" data-lang="en">EN</span>
            <span class="text-neutral-400">|</span>
            <span class="inbetween-lang-btn inbetween-lang-zh cursor-pointer text-neutral-400 hover:text-[#EC460B] transition-colors" data-lang="zh">汉语</span>
          </div>
        </div>
      </div>
      <div class="pt-8 mt-auto border-t border-neutral-200/80 space-y-3.5 font-sans inbetween-drawer-footer">
        <div class="text-[11px] sm:text-xs font-semibold uppercase tracking-widest text-neutral-400 contact-label">CONTACT INFORMATION</div>
        <div class="space-y-2.5 text-xs sm:text-sm text-neutral-700 contact-list">
          <div class="flex items-center gap-3 contact-item"><i class="fa-regular fa-envelope text-neutral-800 text-sm shrink-0"></i><a class="hover:text-[#EC460B] transition-colors" href="mailto:contact@inbetween.vn">contact@inbetween.vn</a></div>
          <div class="flex items-center gap-3 contact-item"><i class="fa-solid fa-phone text-neutral-800 text-xs shrink-0"></i><a class="hover:text-[#EC460B] transition-colors" href="tel:+84900000000">+84 90 xxx xxxx</a></div>
          <div class="flex items-start gap-3 contact-item"><i class="fa-solid fa-location-dot text-neutral-800 text-xs shrink-0 mt-0.5"></i><span>Ho Chi Minh City, Vietnam</span></div>
        </div>
      </div>
    </nav>
    <div class="contact-modal-overlay theme-inbetween" id="contact-modal-overlay" role="dialog" aria-modal="true" aria-label="in • between Contact Dialog">
      <div class="contact-modal-box">
        <button class="contact-modal-close-btn" id="close-contact-modal-btn" type="button" aria-label="Close contact dialog"><span class="close-line"></span><span>Close</span></button>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
          <div class="lg:col-span-5 flex flex-col justify-between h-full min-h-[460px]">
            <div class="space-y-5">
              <div class="flex items-center gap-3"><img class="h-8 sm:h-9 w-auto object-contain" src="{{ asset('themes/inbetween_v2/images/Logo.svg') }}" alt="in • between Logo"></div>
              <div class="space-y-2 pt-2">
                <h2 class="text-[24px] sm:text-[28px] lg:text-[34px] font-semibold text-[#131313] leading-[1.2] tracking-normal uppercase font-sans"><span class="block">LET'S <span class="text-[#EC460B]">CONNECT</span></span><span class="block">WITH IN <span class="text-[#EC460B]">•</span> BETWEEN</span></h2>
                <p class="text-[14px] text-[#3E3939] font-light leading-relaxed font-sans">We help Asian SMEs, founders and entrepreneurs enter and grow in Vietnam. Leave your information and our team will get back to you promptly.</p>
              </div>
            </div>
            <div class="mt-auto pt-6 flex justify-start items-end">
              <div class="relative w-[190px] sm:w-[210px] md:w-[220px] aspect-[297/165] rounded-[8px] overflow-hidden border border-neutral-300/80 shadow-xs bg-neutral-200" id="modal-image-slider"><img class="modal-slide-img active absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out" src="{{ asset('themes/inbetween_v2/images/founder-airu-portrait.png') }}" alt="in • between - Founder AiRu" loading="lazy"><img class="modal-slide-img absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 ease-in-out" src="{{ asset('themes/inbetween_v2/images/client-asian-smes.png') }}" alt="in • between - Asian SMEs" loading="lazy"><img class="modal-slide-img absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 ease-in-out" src="{{ asset('themes/inbetween_v2/images/client-founders.png') }}" alt="in • between - Founders &amp; Entrepreneurs" loading="lazy"><img class="modal-slide-img absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 ease-in-out" src="{{ asset('themes/inbetween_v2/images/client-regional-teams.png') }}" alt="in • between - Regional Teams" loading="lazy">
              </div>
            </div>
          </div>
          <div class="lg:col-span-7 space-y-5">
            <form class="space-y-4" id="modal-contact-form" novalidate>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-neutral-800 uppercase mb-1.5">FULL NAME
                  </label>
                  <input class="contact-input" type="text" name="fullname" required placeholder="">
                </div>
                <div>
                  <label class="block text-xs font-bold text-neutral-800 uppercase mb-1.5">PHONE NUMBER *
                  </label>
                  <input class="contact-input" type="tel" name="phone" required placeholder="">
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-neutral-800 uppercase mb-1.5">EMAIL
                  </label>
                  <input class="contact-input" type="email" name="email" placeholder="">
                </div>
                <div>
                  <label class="block text-xs font-bold text-neutral-800 uppercase mb-1.5">SERVICE NEEDED
                  </label>
                  <div class="contact-custom-dropdown relative">
                    <input type="hidden" name="service" value="sales-bd" id="modal-service-input">
                    <button class="dropdown-trigger" type="button" aria-haspopup="listbox" aria-expanded="false"><span class="dropdown-selected">Sales & BD</span><span class="dropdown-arrow-wrapper"><span class="dropdown-separator"></span><span class="dropdown-chevron-icon"><i class="fa-solid fa-chevron-down text-xs"></i></span></span></button>
                    <ul class="dropdown-menu" role="listbox">
                      <li class="dropdown-item selected" role="option" data-value="sales-bd"><span>Sales & BD</span></li>
                      <li class="dropdown-item" role="option" data-value="market-validation"><span>Market Validation</span></li>
                      <li class="dropdown-item" role="option" data-value="market-entry"><span>Market Entry Execution</span></li>
                      <li class="dropdown-item" role="option" data-value="local-support"><span>Local Business Support</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div>
                <label class="block text-xs font-bold text-neutral-800 uppercase mb-1.5">MESSAGE / INQUIRY
                </label>
                <textarea class="contact-textarea" name="message" placeholder="" style="resize: none; height: 110px; min-height: 110px; max-height: 110px;"></textarea>
              </div>
              <div class="w-full h-[1px] bg-neutral-300/80 my-2"></div>
              <div class="space-y-3 pt-1 text-[13px] text-neutral-700">
                <label class="flex items-center gap-3 cursor-pointer select-none">
                  <input class="contact-checkbox" type="checkbox" name="privacy_consent" required checked><span>I have read and agree to the Data & Privacy Policy of in • between</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer select-none">
                  <input class="contact-checkbox" type="checkbox" name="newsletter"><span>Send me regular business updates and market insights</span>
                </label>
              </div>
              <div class="pt-2 flex items-center justify-between flex-wrap gap-4">
                <button class="contact-submit-btn" type="submit"><span class="submit-arrow-box"><span class="arrow-primary">&rarr;</span><span class="arrow-secondary">&rarr;</span></span><span class="submit-btn-text">LET'S CONNECT</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="toast-notification" id="global-toast-notification"></div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('modal-contact-form');
        if (form && !form.__ajaxAttached) {
          form.__ajaxAttached = true;
          form.addEventListener('submit', function (e) {
            var formData = new FormData(form);
            fetch('{{ route("web.inbetween_v2.contact") }}', {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
              },
              body: formData
            }).then(function (res) {
              return res.json();
            }).then(function (data) {
              console.log('Inbetween V2 contact stored:', data);
            }).catch(function (err) {
              console.warn('Inbetween V2 contact submit warning:', err);
            });
          }, true);
        }
      });
    </script>
    @stack('scripts')
  </body>
</html>
