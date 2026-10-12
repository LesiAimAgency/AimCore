@php
  $rawLogoWhite = is_array($settings['logo_white'] ?? null) ? ($settings['logo_white']['url'] ?? $settings['logo_white'][0] ?? '') : ($settings['logo_white'] ?? '');
  $logoWhite = !empty($rawLogoWhite) ? (str_starts_with($rawLogoWhite, 'http') || str_starts_with($rawLogoWhite, '/') ? $rawLogoWhite : asset($rawLogoWhite)) : asset('themes/inbetween_v2/images/Logo-white.svg');
  $langEn = $settings['lang_en_label'] ?? 'EN';
  $langZh = $settings['lang_zh_label'] ?? '汉语';
@endphp

<!-- Mobile Sticky Header: Appears automatically when scrolling past the Hero card -->
<header id="mobile-sticky-header" 
        class="fixed top-0 left-0 w-full z-50 bg-[#131313]/95 backdrop-blur-md border-b border-neutral-800/80 px-4 py-2.5 transition-all duration-300 select-none -translate-y-full opacity-0 pointer-events-none" 
        aria-label="Mobile Navigation Bar">
  <div class="max-w-lg mx-auto flex items-center justify-between">
    <!-- Brand Logo -->
    <a href="#mobile-hero" class="inline-flex items-center shrink-0 transition-opacity hover:opacity-85" aria-label="in • between">
      <img class="h-5 sm:h-6 w-auto object-contain object-left" src="{{ $logoWhite }}" alt="in • between" width="131" height="20">
    </a>

    <!-- Action Right: Language + Talk CTA + Menu Button -->
    <div class="flex items-center gap-3">
      <!-- Language switch -->
      <div class="flex items-center gap-1.5 text-[11px] font-semibold tracking-wider uppercase text-neutral-300">
        <span class="inbetween-lang-btn inbetween-lang-en active cursor-pointer text-[#EC460B] font-bold" data-lang="en">{{ $langEn }}</span>
        <span class="text-white/30">|</span>
        <span class="inbetween-lang-btn inbetween-lang-zh cursor-pointer text-white/80 hover:text-white transition-colors" data-lang="zh">{{ $langZh }}</span>
      </div>

      <!-- Drawer menu hamburger icon -->
      <button type="button" class="p-1 -mr-1 text-white hover:text-[#EC460B] transition-colors focus:outline-none" data-menu-toggle aria-label="Open navigation menu">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 7H20M4 12H20M4 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>
  </div>
</header>

<script>
  (function() {
    var stickyHeader = document.getElementById('mobile-sticky-header');
    if (!stickyHeader || stickyHeader.__scrollBound) return;
    stickyHeader.__scrollBound = true;

    function handleScroll() {
      if (window.innerWidth >= 1024) return;
      var scrollY = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
      var introTrack = document.getElementById('mobile-intro-track');
      var threshold = introTrack ? (introTrack.offsetTop + introTrack.offsetHeight - (window.innerHeight || 600) * 0.3) : ((window.innerHeight || 600) * 0.8);
      if (scrollY > threshold) {
        stickyHeader.classList.remove('-translate-y-full', 'opacity-0', 'pointer-events-none');
        stickyHeader.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
      } else {
        stickyHeader.classList.add('-translate-y-full', 'opacity-0', 'pointer-events-none');
        stickyHeader.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
      }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  })();
</script>
