@php
  $rawLogoWhite = is_array($settings['logo_white'] ?? null) ? ($settings['logo_white']['url'] ?? $settings['logo_white'][0] ?? '') : ($settings['logo_white'] ?? '');
  $logoWhite = !empty($rawLogoWhite) ? (str_starts_with($rawLogoWhite, 'http') || str_starts_with($rawLogoWhite, '/') ? $rawLogoWhite : asset($rawLogoWhite)) : asset('storage/media/project-DA005/Logo-white.svg');
  $rawLogoDark = is_array($settings['logo_dark'] ?? null) ? ($settings['logo_dark']['url'] ?? $settings['logo_dark'][0] ?? '') : ($settings['logo_dark'] ?? '');
  $logoDark = !empty($rawLogoDark) ? (str_starts_with($rawLogoDark, 'http') || str_starts_with($rawLogoDark, '/') ? $rawLogoDark : asset($rawLogoDark)) : asset('storage/media/project-DA005/Logo.svg');
  $connectText = $settings['connect_text'] ?? "LET'S CONNECT";
  $connectLink = $settings['connect_link'] ?? '#contact-modal';
  $langEn = $settings['lang_en_label'] ?? 'EN';
  $langZh = $settings['lang_zh_label'] ?? '汉语';
@endphp

<!-- Fixed Header across sections -->
@once('inbetween-header')
<style>
  #wecanhelp-text {
    font-size: clamp(52px, 8.5vw, 132px) !important;
    line-height: 1.05 !important;
    font-family: 'SVN-Gilroy', 'Inter', sans-serif !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: -0.02em;
    will-change: transform, letter-spacing, opacity;
    transform-origin: 50% 50%;
  }
  @media (min-width: 640px) { #wecanhelp-text { font-size: 84px !important; } }
  @media (min-width: 1024px) { #wecanhelp-text { font-size: 116px !important; } }
  @media (min-width: 1280px) { #wecanhelp-text { font-size: 132px !important; } }
  /* Fixed hit-area & stable hover for inbetween menu toggle */
  .inbetween-header .inbetween-menu-toggle {
    position: fixed;
    left: 0;
    top: 50%;
    transform: translateY(-50%) !important;
    z-index: 50;
    cursor: pointer;
    font-family: 'SVN-Gilroy', 'Inter', sans-serif;
    -webkit-user-select: none;
    user-select: none;
    padding: 16px 28px 16px 0 !important;
    min-height: 56px;
    min-width: 48px;
    display: inline-flex;
    align-items: center;
    background: transparent;
    border: none;
    outline: none;
    overflow: visible;
    transition: color .25s ease;
  }
  /* Generous invisible hit-area box to ensure easy hover and click without precision aiming */
  .inbetween-header .inbetween-menu-toggle::before {
    content: '';
    position: absolute;
    left: 0;
    top: -16px;
    bottom: -16px;
    right: -24px;
    min-width: 64px;
    pointer-events: auto;
  }
  /* Sliding track holding icon + text: moves inside stationary button */
  .inbetween-header .inbetween-menu-toggle .menu-toggle-track {
    display: inline-flex;
    align-items: center;
    transform: translateX(-12px);
    transition: transform .32s cubic-bezier(0.16, 1, 0.3, 1), color .25s ease;
    will-change: transform;
    pointer-events: none;
  }
  .inbetween-header .inbetween-menu-toggle:hover .menu-toggle-track,
  .inbetween-header .inbetween-menu-toggle.is-active .menu-toggle-track,
  .inbetween-header .inbetween-menu-toggle[aria-expanded="true"] .menu-toggle-track {
    transform: translateX(16px);
    color: #ec460b !important;
  }
  @media (min-width: 640px) {
    .inbetween-header .inbetween-menu-toggle:hover .menu-toggle-track,
    .inbetween-header .inbetween-menu-toggle.is-active .menu-toggle-track,
    .inbetween-header .inbetween-menu-toggle[aria-expanded="true"] .menu-toggle-track {
      transform: translateX(24px);
    }
  }
  @media (min-width: 1024px) {
    .inbetween-header .inbetween-menu-toggle:hover .menu-toggle-track,
    .inbetween-header .inbetween-menu-toggle.is-active .menu-toggle-track,
    .inbetween-header .inbetween-menu-toggle[aria-expanded="true"] .menu-toggle-track {
      transform: translateX(32px);
    }
  }
  .inbetween-header .inbetween-menu-toggle .menu-icon-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
    transition: transform .3s ease;
    pointer-events: none;
  }
  .inbetween-header .inbetween-menu-toggle:hover .menu-icon-wrap {
    transform: scale(1.06);
  }
  .inbetween-header .inbetween-menu-toggle .menu-icon-svg {
    display: block;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
    color: currentColor;
    pointer-events: none;
  }
  .inbetween-header .inbetween-menu-toggle .menu-text {
    font-family: 'SVN-Gilroy', 'Inter', sans-serif;
    font-weight: 700;
    letter-spacing: .06em;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transform: translateX(-10px);
    transition: opacity .3s cubic-bezier(0.16, 1, 0.3, 1), transform .3s cubic-bezier(0.16, 1, 0.3, 1), visibility .3s ease, color .2s ease;
    pointer-events: none;
  }
  .inbetween-header .inbetween-menu-toggle:hover .menu-text,
  .inbetween-header .inbetween-menu-toggle.is-active .menu-text,
  .inbetween-header .inbetween-menu-toggle[aria-expanded="true"] .menu-text {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
    color: #ec460b !important;
  }
</style>
<header class="inbetween-header fixed top-0 left-0 w-full z-50 select-none transition-colors duration-300 pointer-events-auto theme-dark text-white" id="inbetween-header">
  <div class="inbetween-container-1440 pt-4 sm:pt-6 pb-2 sm:pb-3 transition-all duration-300">
    <a class="inbetween-logo inline-flex items-center w-[140px] xs:w-[170px] sm:w-[190px] lg:w-[210px] h-auto max-h-[32px] shrink-0 select-none transition-opacity hover:opacity-85" href="#inbetween-intro" title="in • between">
      <img class="inbetween-logo-white w-full h-auto max-h-[26px] sm:max-h-[30px] lg:max-h-[32px] object-contain object-left" src="{{ $logoWhite }}" alt="in • between Logo" width="210" height="32"/>
      <img class="inbetween-logo-dark w-full h-auto max-h-[26px] sm:max-h-[30px] lg:max-h-[32px] object-contain object-left" src="{{ $logoDark }}" alt="in • between Logo" width="210" height="32"/>
    </a>
    <div class="flex items-center gap-3 sm:gap-5 lg:gap-7">
      <!-- Language Switcher -->
      <div class="flex items-center gap-1.5 text-xs sm:text-[13px] tracking-wider uppercase font-medium inbetween-header-lang">
        <span class="inbetween-lang-btn inbetween-lang-en active cursor-pointer font-semibold text-current hover:text-[#EC460B] transition-colors" data-lang="en">{{ $langEn }}</span>
        <span class="opacity-40">|</span>
        <span class="inbetween-lang-btn inbetween-lang-zh cursor-pointer opacity-70 hover:opacity-100 hover:text-[#EC460B] transition-all" data-lang="zh">{{ $langZh }}</span>
      </div>
      <nav>
        <a class="inbetween-connect-link inline-flex items-center gap-1.5 sm:gap-3 text-pc-h6 text-[13px] sm:text-[15px] lg:text-[16px] font-normal uppercase tracking-normal transition-all duration-200 group border-b border-transparent hover:border-current pb-0.5 text-current cursor-pointer whitespace-nowrap" href="{{ $connectLink }}" data-contact-modal-toggle="" title="{{ $connectText }}">
          <span>{{ $connectText }}</span>
          <span class="transition-transform duration-200 group-hover:translate-x-1 inline-block">&rarr;</span>
        </a>
      </nav>
    </div>
  </div>
  <button class="menu-toggle-btn inbetween-menu-toggle group focus:outline-none fixed left-0 top-1/2 -translate-y-1/2 z-50 flex items-center cursor-pointer select-none" type="button" data-menu-toggle aria-label="Open navigation menu" aria-expanded="false">
    <span class="menu-toggle-track flex items-center">
      <span class="menu-icon-wrap flex items-center justify-center shrink-0 w-6 h-6">
        <svg class="menu-icon-svg w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_inbetween_menu)">
            <path d="M4 13C4.55228 13 5 12.5523 5 12C5 11.4477 4.55228 11 4 11C3.44772 11 3 11.4477 3 12Z" fill="currentColor"/>
            <path d="M20.06 11H7.94C7.42085 11 7 11.4209 7 11.94V12.06C7 12.5791 7.42085 13 7.94 13H20.06C20.5791 13 21 12.5791 21 12.06V11.94C21 11.4209 20.5791 11 20.06 11Z" fill="currentColor"/>
            <path d="M20.06 16H3.94C3.42085 16 3 16.4209 3 16.94V17.06C3 17.5791 3.42085 18 3.94 18H20.06C20.5791 18 21 17.5791 21 17.06V16.94C21 16.4209 20.5791 16 20.06 16Z" fill="currentColor"/>
            <path d="M20.06 6H3.94C3.42085 6 3 6.42085 3 6.94V7.06C3 7.57915 3.42085 8 3.94 8H20.06C20.5791 8 21 7.57915 21 7.06V6.94C21 6.42085 20.5791 6 20.06 6Z" fill="currentColor"/>
          </g>
          <defs>
            <clipPath id="clip0_inbetween_menu">
              <rect width="24" height="24" fill="white"/>
            </clipPath>
          </defs>
        </svg>
      </span>
      <span class="menu-text text-[13px] sm:text-[14px] md:text-[15px] font-bold uppercase tracking-wider ml-2.5">Menu</span>
    </span>
  </button>
</header>
@endonce

<!-- SECTION 2: HERO (Your Local Team Before You're Ready To Hire One) -->
<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden bg-[#131313] text-white flex flex-col justify-between items-center cursor-default" id="inbetween-hero" aria-label="INBETWEEN Hero - Your Local Team Before You're Ready To Hire One">
  <!-- Glowing Hands Radiant Background Image Layer -->
  <div class="absolute inset-0 z-0 pointer-events-none" id="hero-bg-layer" style="pointer-events: none !important;">
    <img class="w-full h-full object-cover object-center filter brightness-105 pointer-events-none" src="{{ asset('storage/media/project-DA005/hero-hands-glow.png') }}" alt="inbetween Hero Radiant Touch">
    <div class="absolute inset-0 bg-radial-[circle_at_center,_transparent_40%,_rgba(15,4,0,0.65)_100%] pointer-events-none"></div>
  </div>

  <!-- Hero Content Stage -->
  <div class="relative z-20 w-full h-full flex flex-col justify-between pt-16 sm:pt-24 pb-2 sm:pb-3 stage-active select-text pointer-events-auto" id="hero-content-stage" style="pointer-events: auto !important;">
    <div class="inbetween-container-1440 relative z-10 w-full flex-1 flex flex-col justify-between my-auto pointer-events-auto">
      <div class="w-full my-auto pointer-events-auto" style="margin-top:0">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          <div class="lg:col-span-8 xl:col-span-7 space-y-4 sm:space-y-7 pointer-events-auto">
            <h1 class="text-[23px] sm:text-[34px] lg:text-[49px] font-semibold uppercase tracking-normal text-[#F6F4F4] leading-[1.15] drop-shadow-md max-w-[648px] select-text" id="hero-headline-text">{{ $settings['headline_text'] ?? "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE." }}
            </h1>
            @php
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
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 sm:gap-y-3.5 gap-x-6 pt-1 max-w-[600px] select-text" id="hero-services-list">
              @foreach($serviceList as $svcTitle)
                <div class="hero-svc-item flex items-center gap-2.5 text-[13.5px] sm:text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm select-text"><span class="font-medium text-[17px] sm:text-[20px] leading-none text-[#F6F4F4]">+</span><span>{{ $svcTitle }}</span></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="w-full pb-3 sm:pb-6 pointer-events-auto">
        <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-4 sm:gap-6">
          <div class="hidden lg:block lg:col-span-6"></div>
          <div class="max-w-[440px] space-y-2.5 sm:space-y-3.5 text-left ml-auto pointer-events-auto">
            <p class="text-[13.5px] sm:text-[15px] lg:text-[16px] font-light text-[#F6F4F4]/90 leading-relaxed tracking-normal drop-shadow-sm select-text">{!! $settings['description'] ?? 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.' !!}</p>
            <div class="pt-0.5"><a class="business-btn-talk inline-flex items-center justify-between w-[295px] max-w-full h-[48px] pl-7 pr-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#2B2B2B] transition-colors duration-300 shadow-sm group shrink-0 select-none whitespace-nowrap cursor-pointer pointer-events-auto relative z-30" href="{{ (!empty($settings['cta_link']) && $settings['cta_link'] !== '#inbetween-founder') ? $settings['cta_link'] : '#contact-modal' }}" data-contact-modal-toggle title="{{ $settings['cta_text'] ?? 'Talk to us' }}" style="pointer-events: auto !important; cursor: pointer !important;"><span class="text-[16px] font-medium text-[#F6F4F4] whitespace-nowrap">{{ $settings['cta_text'] ?? 'Talk to us' }}</span><span class="w-[48px] h-[32px] rounded-[16px] bg-[#F6F4F4] text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                  <svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="#131313" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Mouse scroll indicator pointing to #inbetween-what-we-do -->
      <!-- <div class="w-full shrink-0 flex justify-center pb-1 pointer-events-auto">
        <a class="inline-flex flex-col items-center gap-0.5 text-white/60 hover:text-white transition-colors duration-200 group text-[12px] font-light uppercase tracking-widest cursor-pointer relative z-30" href="#inbetween-what-we-do" title="Scroll to What We Do" style="pointer-events: auto !important; cursor: pointer !important;">
          <span class="w-3.5 h-6 sm:w-4 sm:h-7 rounded-full border border-white/40 flex items-start justify-center p-0.5 group-hover:border-white">
            <span class="w-1 h-1.5 rounded-full bg-white animate-bounce"></span>
          </span>
        </a>
      </div> -->
    </div>
  </div>
</section>
