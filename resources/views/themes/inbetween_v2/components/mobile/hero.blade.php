@php
  $rawLogoWhite = is_array($settings['logo_white'] ?? null) ? ($settings['logo_white']['url'] ?? $settings['logo_white'][0] ?? '') : ($settings['logo_white'] ?? '');
  $logoWhite = !empty($rawLogoWhite) ? (str_starts_with($rawLogoWhite, 'http') || str_starts_with($rawLogoWhite, '/') ? $rawLogoWhite : asset($rawLogoWhite)) : asset('themes/inbetween_v2/images/Logo-white.svg');
  $langEn = $settings['lang_en_label'] ?? 'EN';
  $langZh = $settings['lang_zh_label'] ?? '汉语';

  $rawHeadline = $settings['headline_text'] ?? "YOUR LOCAL TEAM BEFORE\nYOU'RE READY TO HIRE ONE.";
  $headlineParts = array_values(array_filter(array_map('trim', explode("\n", str_replace(["\r\n", "\r"], "\n", $rawHeadline)))));
  if (count($headlineParts) >= 2) {
    $line1 = $headlineParts[0];
    $line2 = $headlineParts[1];
  } else {
    $single = $headlineParts[0] ?? $rawHeadline;
    if (str_contains($single, "BEFORE")) {
      $split = explode("BEFORE", $single, 2);
      $line1 = trim($split[0]) . ' BEFORE';
      $line2 = trim($split[1]);
    } else {
      $line1 = $single;
      $line2 = '';
    }
  }

  $rawServices = $settings['services'] ?? 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support';
  if (is_string($rawServices)) {
    $serviceList = array_values(array_filter(array_map('trim', explode(',', $rawServices))));
  } elseif (is_array($rawServices)) {
    $serviceList = [];
    foreach ($rawServices as $s) {
      $val = is_array($s) ? ($s['title'] ?? reset($s)) : (string)$s;
      if (trim((string)$val) !== '') {
        $serviceList[] = trim((string)$val);
      }
    }
  } else {
    $serviceList = ['Sales & BD', 'Market Validation', 'Market Entry Execution', 'Local Business Support'];
  }
  if (empty($serviceList)) {
    $serviceList = ['Sales & BD', 'Market Validation', 'Market Entry Execution', 'Local Business Support'];
  }
  $initialService = $serviceList[0] ?? 'Sales & BD';

  $heroDesc = $settings['description'] ?? 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.';
  $ctaText = $settings['cta_text'] ?? 'Talk to us';
  $ctaLink = (!empty($settings['cta_link']) && $settings['cta_link'] !== '#inbetween-founder') ? $settings['cta_link'] : '#mobile-contact';

  // Hero Background Settings (Video / Image / None)
  $bgType = $settings['bg_type'] ?? 'video';
  if (!in_array($bgType, ['video', 'image', 'none'])) {
    $bgType = 'video';
  }

  // Video resolution: mobile specific first, then universal/desktop, then fallback default
  $rawBgVideoMobile = is_array($settings['bg_video_mobile'] ?? null) 
    ? ($settings['bg_video_mobile']['url'] ?? $settings['bg_video_mobile'][0] ?? '') 
    : ($settings['bg_video_mobile'] ?? '');
  $rawBgVideo = is_array($settings['bg_video'] ?? null) 
    ? ($settings['bg_video']['url'] ?? $settings['bg_video'][0] ?? '') 
    : ($settings['bg_video'] ?? '');
  $chosenVideo = !empty($rawBgVideoMobile) ? $rawBgVideoMobile : (!empty($rawBgVideo) ? $rawBgVideo : 'themes/inbetween_v2/videos/section_video.mp4');
  $bgVideo = (str_starts_with($chosenVideo, 'http') || str_starts_with($chosenVideo, '/')) ? $chosenVideo : asset($chosenVideo);

  // Image resolution: mobile specific first, then universal/desktop, then fallback default
  $rawBgImageMobile = is_array($settings['bg_image_mobile'] ?? null) 
    ? ($settings['bg_image_mobile']['url'] ?? $settings['bg_image_mobile'][0] ?? '') 
    : ($settings['bg_image_mobile'] ?? '');
  $rawBgImage = is_array($settings['bg_image'] ?? null) 
    ? ($settings['bg_image']['url'] ?? $settings['bg_image'][0] ?? '') 
    : ($settings['bg_image'] ?? '');
  $chosenImage = !empty($rawBgImageMobile) ? $rawBgImageMobile : (!empty($rawBgImage) ? $rawBgImage : 'themes/inbetween_v2/images/hero-hands-glow.png');
  $bgImage = (str_starts_with($chosenImage, 'http') || str_starts_with($chosenImage, '/')) ? $chosenImage : asset($chosenImage);
@endphp

<style>
  #mobile-hero {
    background-color: #F6F4F4 !important;
  }
  #mobile-hero .mobile-hero-card,
  #mobile-hero .mobile-hero-card h1,
  #mobile-hero .mobile-hero-card h1 span,
  #mobile-hero .mobile-hero-card p,
  #mobile-hero .mobile-hero-card p strong,
  #mobile-hero .mobile-hero-card .mobile-hero-word-current,
  #mobile-hero .mobile-hero-card .mobile-hero-word-animating {
    color: #F6F2EF !important;
  }
  #mobile-hero .mobile-hero-radial-overlay {
    background: radial-gradient(circle at center, transparent 40%, rgba(15, 4, 0, 0.65) 100%) !important;
  }
</style>

<!-- Mobile Hero Section - Rebuilt from HERO.svg design with Rotating Text Viewport Wrapper -->
<section id="mobile-hero" 
         data-section="inbetween-hero" 
         class="relative w-full bg-[#F6F4F4] text-[#131313] px-3 sm:px-4 py-6 sm:py-10 select-text flex justify-center items-center" 
         style="background-color: #F6F4F4; background-color: rgb(246 244 244 / var(--tw-bg-opacity, 1));" 
         aria-label="Hero Section - Mobile">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-hero" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  <!-- 416x497 Rounded Hero Card -->
  <div class="mobile-hero-card relative w-full max-w-[416px] min-h-[497px] rounded-[24px] overflow-hidden  flex flex-col justify-between border border-neutral-800/80 bg-[#131313]" style="aspect-ratio: 416 / 497;">
    
    <!-- Glowing Hands Radiant Background Layer (Video / Image / None) -->
    <div class="absolute inset-0 z-0 pointer-events-none" id="hero-bg-layer" style="pointer-events: none !important; display: block; opacity: 1;">
      @if($bgType === 'video' && !empty($bgVideo))
        <video
            class="w-full h-full object-cover object-center pointer-events-none"
            autoplay
            muted
            playsinline
            webkit-playsinline
            preload="auto"
            aria-hidden="true"
            @if(!empty($bgImage)) poster="{{ $bgImage }}" @endif
        >
            <source src="{{ $bgVideo }}" type="video/mp4">
            @if(!empty($bgImage))
              <img class="w-full h-full object-cover object-center filter brightness-105 pointer-events-none" src="{{ $bgImage }}" alt="inbetween Hero Radiant Touch">
            @endif
        </video>
      @elseif($bgType !== 'none')
        <img class="w-full h-full object-cover object-center pointer-events-none" 
             src="{{ $bgImage }}" 
             alt="inbetween Hero Radiant Touch" 
             loading="eager">
      @endif
      <!-- Radial gradient matching desktop + snippet overlay -->
      <div class="mobile-hero-radial-overlay absolute inset-0 bg-radial-[circle_at_center,_transparent_40%,_rgba(15,4,0,0.65)_100%] pointer-events-none" style="background: radial-gradient(circle at center, transparent 40%, rgba(15, 4, 0, 0.65) 100%);"></div>
    </div>

    <!-- Top Card Content: Header & Headlines -->
    <div class="relative z-10 w-full pt-6 px-6">
      <!-- Main Headline: 2 Lines uppercase, bold white -->
      <div class="mt-7 sm:mt-8 space-y-0.5">
        <h1 class="text-[16px] sm:text-[18px] font-bold tracking-tight text-[#F6F2EF] uppercase leading-[1.25]">
          <span class="text-[#F6F2EF]  block">{{ $line1 }}</span>
          @if(!empty($line2))
            <span class="text-[#F6F2EF]  block">{{ $line2 }}</span>
          @endif
        </h1>
      </div>

      <!-- Capability Indicator: + Sales & BD (Clickable to cycle services) -->
      <!-- Rotating Text Viewport Wrapper: lấy + làm chuẩn và text thay đổi -->
      <div class="mt-5 sm:mt-6">
        <div class="inline-flex items-center gap-2.5 text-[#F6F2EF] hover:text-white transition-colors cursor-pointer group focus:outline-none text-left select-none"
             id="mobile-hero-service-badge"
             data-services='@json($serviceList)'
             title="Click to cycle capabilities">
          <!-- Fixed standard Plus symbol: Lấy + làm chuẩn cố định vị trí -->
          <span class="w-4 h-4 flex items-center justify-center text-white text-[18px] font-light leading-none shrink-0 select-none group-hover:text-[#EC460B] transition-colors"
                id="mobile-hero-plus-icon">+</span>

          <!-- Rotating Text Viewport Wrapper: Khung viewport trượt chữ từ trên xuống -->
          <div class="mobile-hero-rotating-wrapper relative inline-flex items-center overflow-hidden h-[24px] align-middle min-w-[190px]"
               id="mobile-hero-rotating-wrapper"
               aria-live="polite">
            <span class="mobile-hero-word-current block whitespace-nowrap will-change-transform text-[13px] sm:text-[14px] font-normal tracking-wide text-[#F6F2EF]">
              {{ $initialService }}
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Center Stage: The glowing hands visual is naturally framed here -->
    <div class="relative z-10 flex-1 min-h-[140px] pointer-events-none"></div>

    <!-- Bottom Card Content: Value Proposition & Talk to us CTA -->
    <div class="relative z-10 w-[240px]  px-6 pb-6 pt-2 flex flex-col items-end text-right">
      <div class="w-full  space-y-3">
        <!-- Value prop description -->
        <p class="text-[11.5px] sm:text-[12px] text-[#F6F2EF] leading-[1.38] font-light text-left">
          {!! $heroDesc !!}
        </p>

        <!-- CTA Pill Button: Dark rounded pill with arrow container -->
        <a href="#contact-modal" class="inline-flex items-center justify-between w-full sm:w-auto h-[48px] px-6 rounded-full bg-[#131313] text-white text-[15px] font-medium hover:bg-[#2B2B2B] active:scale-[0.98] transition-all shadow-sm">
          <span>Talk to us</span>
          <span class="w-7 h-7 rounded-full bg-white text-[#131313] flex items-center justify-center ml-4">
            <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none">
              <path d="M3.3 8h9.4M8.7 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </a>
      </div>
    </div>

  </div>
</section>

<!-- Mobile Hero Rotating Text Script (Lấy + làm chuẩn, text thay đổi mượt mà) -->
<script>
  (function() {
    var badge = document.getElementById('mobile-hero-service-badge');
    var wrapper = document.getElementById('mobile-hero-rotating-wrapper');
    if (!badge || !wrapper || badge.__rotatingBound) return;
    badge.__rotatingBound = true;

    var services = [];
    try {
      services = JSON.parse(badge.getAttribute('data-services') || '[]');
    } catch(e) {}
    if (!Array.isArray(services) || services.length < 2) {
      services = ['Sales & BD', 'Market Validation', 'Market Entry Execution', 'Local Business Support'];
    }

    var currentIndex = 0;
    var isAnimating = false;
    var currentEl = wrapper.querySelector('.mobile-hero-word-current');
    if (!currentEl) {
      currentEl = document.createElement('span');
      currentEl.className = 'mobile-hero-word-current block whitespace-nowrap will-change-transform text-[13px] sm:text-[14px] font-normal tracking-wide text-[#F6F2EF]';
      currentEl.textContent = services[0];
      wrapper.appendChild(currentEl);
    }

    function rotateNext() {
      if (isAnimating) return;
      isAnimating = true;

      var nextIndex = (currentIndex + 1) % services.length;
      var nextText = services[nextIndex];

      var incomingEl = document.createElement('span');
      incomingEl.className = 'mobile-hero-word-animating block whitespace-nowrap will-change-transform text-[13px] sm:text-[14px] font-normal tracking-wide text-[#F6F2EF] absolute top-0 left-0';
      incomingEl.textContent = nextText;
      wrapper.appendChild(incomingEl);

      var gsap = window.gsap;
      if (gsap) {
        gsap.to(currentEl, {
          y: 20,
          opacity: 0,
          duration: 0.35,
          ease: 'power2.in',
          onComplete: function() {
            if (currentEl && currentEl.parentNode) currentEl.remove();
          }
        });
        gsap.fromTo(incomingEl, 
          { y: -20, opacity: 0 },
          {
            y: 0,
            opacity: 1,
            duration: 0.35,
            ease: 'power2.out',
            onComplete: function() {
              incomingEl.classList.remove('absolute', 'top-0', 'left-0', 'mobile-hero-word-animating');
              incomingEl.classList.add('mobile-hero-word-current');
              currentEl = incomingEl;
              currentIndex = nextIndex;
              isAnimating = false;
            }
          }
        );
      } else {
        currentEl.style.transition = 'transform 0.35s ease, opacity 0.35s ease';
        currentEl.style.transform = 'translateY(115%)';
        currentEl.style.opacity = '0';

        incomingEl.style.transform = 'translateY(-115%)';
        incomingEl.style.opacity = '0';
        incomingEl.style.transition = 'transform 0.35s ease, opacity 0.35s ease';

        setTimeout(function() {
          incomingEl.style.transform = 'translateY(0)';
          incomingEl.style.opacity = '1';
        }, 20);

        setTimeout(function() {
          if (currentEl && currentEl.parentNode) currentEl.remove();
          incomingEl.classList.remove('absolute', 'top-0', 'left-0', 'mobile-hero-word-animating');
          incomingEl.classList.add('mobile-hero-word-current');
          currentEl = incomingEl;
          currentIndex = nextIndex;
          isAnimating = false;
        }, 360);
      }
    }

    // Auto-rotate every 2.2 seconds
    var timer = setInterval(rotateNext, 2200);

    // Tapping on badge immediately advances to next capability and resets interval
    badge.addEventListener('click', function(e) {
      e.preventDefault();
      clearInterval(timer);
      rotateNext();
      timer = setInterval(rotateNext, 2200);
    });

    // Pause rotation when tab is hidden to save battery & prevent queue pileup
    document.addEventListener('visibilitychange', function() {
      if (document.hidden) {
        clearInterval(timer);
      } else {
        clearInterval(timer);
        timer = setInterval(rotateNext, 2200);
      }
    });

    // Ensure background video plays automatically
    var vids = document.querySelectorAll('#mobile-hero video');
    vids.forEach(function(v) {
      v.muted = true;
      var p = v.play();
      if (p !== undefined) {
        p.catch(function() {
          var resume = function() { v.play(); document.removeEventListener('touchstart', resume); };
          document.addEventListener('touchstart', resume, { once: true, passive: true });
        });
      }
    });
  })();
</script>
