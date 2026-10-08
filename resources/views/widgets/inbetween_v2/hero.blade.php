<!-- SECTION 1: INTRO (Entering Vietnam) -->
<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#131313] text-white flex flex-col justify-between items-center cursor-default" id="inbetween-intro" aria-label="in • between Intro - Entering Vietnam">
  <!-- Preloader -->
  <div class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-[#131313] pointer-events-auto select-none" id="hero-preloader" aria-label="Loading hero...">
    <div class="flex flex-col items-center gap-3.5">
      <div class="text-[26px] sm:text-[32px] font-bold tracking-tight text-white select-none flex items-center gap-2"><span>in</span><span class="inline-block w-2 h-2 rounded-full bg-[#EC460B] animate-pulse"></span><span>between</span></div>
      <div class="w-28 sm:w-36 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
        <div class="hero-loader-bar absolute inset-0 bg-gradient-to-r from-transparent via-[#EC460B] to-transparent w-full"></div>
      </div>
    </div>
  </div>

  @php
    $logoWhite = !empty($settings['logo_white']) ? (str_starts_with($settings['logo_white'], 'http') || str_starts_with($settings['logo_white'], '/') ? $settings['logo_white'] : asset($settings['logo_white'])) : asset('themes/inbetween_v2/images/Logo-white.svg');
    $logoDark = !empty($settings['logo_dark']) ? (str_starts_with($settings['logo_dark'], 'http') || str_starts_with($settings['logo_dark'], '/') ? $settings['logo_dark'] : asset($settings['logo_dark'])) : asset('themes/inbetween_v2/images/Logo.svg');
    $connectText = $settings['connect_text'] ?? "LET'S CONNECT";
    $connectLink = $settings['connect_link'] ?? '#contact-modal';
  @endphp

  <!-- Fixed Header across sections -->
  <header class="inbetween-header fixed top-0 left-0 w-full z-50 select-none transition-colors duration-300 pointer-events-auto theme-dark text-white" id="inbetween-header">
    <div class="inbetween-container-1440 pt-5 sm:pt-6 pb-2 sm:pb-3">
      <a class="inbetween-logo inline-flex items-center w-[210px] h-[32px] shrink-0 select-none transition-opacity hover:opacity-85" href="#inbetween-intro" title="in • between">
        <img class="inbetween-logo-white w-[210px] h-[32px] object-contain" src="{{ $logoWhite }}" alt="in • between Logo" width="210" height="32"/>
        <img class="inbetween-logo-dark w-[210px] h-[32px] object-contain" src="{{ $logoDark }}" alt="in • between Logo" width="210" height="32"/>
      </a>
      <div class="flex items-center gap-5 sm:gap-7">
        <nav>
          <a class="inbetween-connect-link inline-flex items-center gap-3 text-pc-h6 text-[15px] sm:text-[16px] font-normal uppercase tracking-normal transition-all duration-200 group border-b border-transparent hover:border-current pb-0.5 text-current cursor-pointer" href="{{ $connectLink }}" data-contact-modal-toggle="" title="{{ $connectText }}">
            <span>{{ $connectText }}</span>
            <span class="transition-transform duration-200 group-hover:translate-x-1 inline-block">&rarr;</span>
          </a>
        </nav>
      </div>
    </div>
    <button class="menu-toggle-btn inbetween-menu-toggle group focus:outline-none fixed left-0 top-1/2 -translate-y-1/2 z-50 pl-4 sm:pl-6 md:pl-8 py-2" type="button" data-menu-toggle aria-label="Mở trình đơn điều hướng" aria-expanded="false">
      <span class="hamburger"><span class="line-top"></span><span class="line-bottom"></span></span>
      <span class="menu-text text-[13px] sm:text-[14px] md:text-[15px] font-bold uppercase tracking-wider ml-1">Menu</span>
    </button>
  </header>

  <!-- Section 1 Content: Question & Floating Words -->
  <div class="relative w-full flex-1 max-w-[1440px] mx-auto px-6 sm:px-12 flex flex-col items-center justify-center my-auto z-20 transition-all duration-300" id="act-question-container">
    <div class="relative z-20 text-center select-none" id="center-title-block">
      <p class="text-[18px] sm:text-[22px] lg:text-[25px] font-normal text-[#F6F4F4]/90 tracking-normal mb-1.5 sm:mb-2 transition-all duration-300" id="intro-subtitle">{{ $settings['intro_subtitle'] ?? 'Your business is' }}</p>
      <div class="relative inline-block">
        <h1 class="intro-title-gradient text-[34px] sm:text-[48px] lg:text-[62px] font-bold uppercase tracking-tight leading-tight select-none" id="intro-title-base">{{ $settings['intro_title'] ?? 'ENTERING VIETNAM?' }}</h1>
      </div>
    </div>
    @php
      $defaultWords = [
        ['text' => '[ Find Customers ]'],
        ['text' => 'Find Suppliers'],
        ['text' => 'Business Development'],
        ['text' => 'Build Partnerships'],
        ['text' => 'Market Research'],
        ['text' => 'Coordinate Meetings'],
        ['text' => 'Get Things Done Locally'],
        ['text' => 'Find Talents'],
        ['text' => 'Market Research'],
        ['text' => 'Build Relationships'],
      ];
      $floatingWords = !empty($settings['floating_words']) && is_array($settings['floating_words']) ? array_values($settings['floating_words']) : $defaultWords;
      $wordPositions = [
        1 => ['style' => 'top: 12%; left: 9%; opacity: 0.95;', 'class' => 'text-[15px] lg:text-[17px] font-medium'],
        2 => ['style' => 'top: 24%; left: 26%; opacity: 0.65;', 'class' => 'text-[14px] lg:text-[16px] font-normal'],
        3 => ['style' => 'top: 14%; left: 50%; transform: translateX(-50%); opacity: 0.50;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        4 => ['style' => 'top: 12%; right: 9%; opacity: 0.92;', 'class' => 'text-[15px] lg:text-[17px] font-medium'],
        5 => ['style' => 'top: 30%; right: 12%; opacity: 0.55;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        6 => ['style' => 'top: 62%; right: 7%; opacity: 0.88;', 'class' => 'text-[15px] lg:text-[17px] font-medium'],
        7 => ['style' => 'bottom: 10%; left: 50%; transform: translateX(-50%); opacity: 0.92;', 'class' => 'text-[15px] lg:text-[17px] font-medium'],
        8 => ['style' => 'bottom: 27%; left: 50%; transform: translateX(-50%); opacity: 0.50;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        9 => ['style' => 'bottom: 18%; left: 20%; opacity: 0.60;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        10 => ['style' => 'bottom: 30%; left: 7%; opacity: 0.88;', 'class' => 'text-[15px] lg:text-[17px] font-medium'],
      ];
    @endphp
    <div class="intro-floating-words absolute inset-0 pointer-events-none" id="floating-words-group">
      @foreach($floatingWords as $idx => $wordItem)
        @php
          $posIdx = ($idx % 10) + 1;
          $posConfig = $wordPositions[$posIdx] ?? ['style' => 'top: 50%; left: 50%; opacity: 0.8;', 'class' => 'text-[14px] font-normal'];
          $wText = is_array($wordItem) ? ($wordItem['text'] ?? '') : (string)$wordItem;
        @endphp
        <div class="floating-word {{ $posConfig['class'] }} text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="{{ $idx + 1 }}" style="{{ $posConfig['style'] }}"><span class="floating-word-inner">{{ $wText }}</span></div>
      @endforeach
    </div>
  </div>

  <!-- Bottom Scroll Helper pointing to Section 2 (#inbetween-hero) -->
  <div class="w-full shrink-0 flex flex-col items-center justify-center pb-5 sm:pb-7 z-30 pointer-events-auto transition-opacity duration-300" id="intro-scroll-helper">
    <a class="inline-flex flex-col items-center gap-1.5 text-white/70 hover:text-white transition-colors duration-200 group cursor-pointer" href="#inbetween-hero" title="Cuộn sang Hero Section">
      <span class="w-4 h-7 rounded-full border border-white/40 flex items-start justify-center p-0.5 group-hover:border-white">
        <span class="w-1 h-1.5 rounded-full bg-[#EC460B] animate-bounce"></span>
      </span>
    </a>
  </div>
</section>

<!-- SECTION 2: HERO (Your Local Team Before You're Ready To Hire One) -->
<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#131313] text-white flex flex-col justify-between items-center cursor-default" id="inbetween-hero" aria-label="INBETWEEN Hero - Your Local Team Before You're Ready To Hire One">
  <!-- Glowing Hands Radiant Background Image Layer -->
  <div class="absolute inset-0 z-0 pointer-events-none" id="hero-bg-layer">
    <img class="w-full h-full object-cover object-center filter brightness-105" src="{{ asset('themes/inbetween_v2/images/hero-hands-glow.png') }}" alt="inbetween Hero Radiant Touch">
    <div class="absolute inset-0 bg-radial-[circle_at_center,_transparent_40%,_rgba(15,4,0,0.65)_100%]"></div>
  </div>

  <!-- Hero Content Stage -->
  <div class="relative z-20 w-full h-full flex flex-col justify-between pt-20 sm:pt-24 pb-2 sm:pb-3" id="hero-content-stage">
    <div class="inbetween-container-1440 relative z-10 w-full flex-1 flex flex-col justify-between my-auto">
      <div class="w-full my-auto" style="margin-top:0">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          <div class="lg:col-span-8 xl:col-span-7 space-y-5 sm:space-y-7">
            <h1 class="text-[30px] sm:text-[38px] lg:text-[49px] font-semibold uppercase tracking-normal text-[#F6F4F4] leading-[1.15] drop-shadow-md max-w-[648px]" id="hero-headline-text">{{ $settings['headline_text'] ?? "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE." }}
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
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3.5 gap-x-6 pt-1 max-w-[600px]" id="hero-services-list">
              @foreach($serviceList as $svcTitle)
                <div class="hero-svc-item flex items-center gap-2.5 text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm"><span class="font-medium text-[20px] leading-none text-[#F6F4F4]">+</span><span>{{ $svcTitle }}</span></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="w-full pb-4 sm:pb-6">
        <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-6">
          <div class="hidden lg:block lg:col-span-6"></div>
          <div class="max-w-[440px] space-y-3.5 text-left ml-auto">
            <p class="text-[14px] sm:text-[15px] lg:text-[16px] font-light text-[#F6F4F4]/90 leading-relaxed tracking-normal drop-shadow-sm">{!! $settings['description'] ?? 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.' !!}</p>
            <div class="pt-0.5"><a class="inbetween-btn-pill inline-flex items-center justify-between gap-4 pl-6 pr-2 py-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#3E3939] transition-all duration-300 shadow-md group shrink-0 cursor-pointer" href="{{ $settings['cta_link'] ?? '#inbetween-founder' }}" title="{{ $settings['cta_text'] ?? 'Talk to us' }}"><span class="font-medium">{{ $settings['cta_text'] ?? 'Talk to us' }}</span><span class="w-8 h-8 rounded-full bg-white text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Mouse scroll indicator pointing to #inbetween-what-we-do -->
      <div class="w-full shrink-0 flex justify-center pb-1">
        <a class="inline-flex flex-col items-center gap-0.5 text-white/60 hover:text-white transition-colors duration-200 group text-[12px] font-light uppercase tracking-widest cursor-pointer" href="#inbetween-what-we-do" title="Cuộn sang What We Do">
          <span class="w-3.5 h-6 sm:w-4 sm:h-7 rounded-full border border-white/40 flex items-start justify-center p-0.5 group-hover:border-white">
            <span class="w-1 h-1.5 rounded-full bg-white animate-bounce"></span>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>
