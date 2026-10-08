<!-- SECTION 1: INTRO (Entering Vietnam) -->
<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#131313] text-white flex flex-col justify-between items-center cursor-default" id="inbetween-intro" aria-label="in • between Intro - Entering Vietnam">
  <!-- Preloader -->
  @once('inbetween-preloader')
  <div class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-[#131313] pointer-events-auto select-none" id="hero-preloader" aria-label="Loading hero...">
    <div class="flex flex-col items-center gap-3.5">
      <div class="text-[26px] sm:text-[32px] font-bold tracking-tight text-white select-none flex items-center gap-2"><span>in</span><span class="inline-block w-2 h-2 rounded-full bg-[#EC460B] animate-pulse"></span><span>between</span></div>
      <div class="w-28 sm:w-36 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
        <div class="hero-loader-bar absolute inset-0 bg-gradient-to-r from-transparent via-[#EC460B] to-transparent w-full"></div>
      </div>
    </div>
  </div>
  @endonce

  @php
    $logoWhite = !empty($settings['logo_white']) ? (str_starts_with($settings['logo_white'], 'http') || str_starts_with($settings['logo_white'], '/') ? $settings['logo_white'] : asset($settings['logo_white'])) : asset('themes/inbetween_v2/images/Logo-white.svg');
    $logoDark = !empty($settings['logo_dark']) ? (str_starts_with($settings['logo_dark'], 'http') || str_starts_with($settings['logo_dark'], '/') ? $settings['logo_dark'] : asset($settings['logo_dark'])) : asset('themes/inbetween_v2/images/Logo.svg');
    $connectText = $settings['connect_text'] ?? "LET'S CONNECT";
    $connectLink = $settings['connect_link'] ?? '#contact-modal';
  @endphp

  <!-- Fixed Header across sections -->
  @once('inbetween-header')
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
  @endonce

  <!-- Section 1 Content: Question & Floating Words -->
  <div class="relative w-full flex-1 max-w-[1440px] mx-auto px-8 sm:px-12 flex flex-col items-center justify-center my-auto z-20 transition-all duration-300 pt-[80px] sm:pt-[88px] lg:pt-0 pb-6 sm:pb-8 lg:pb-0" id="act-question-container">
    <div class="relative z-20 text-center select-none" id="center-title-block">
      <p class="text-[15px] sm:text-[20px] lg:text-[25px] font-normal text-[#F6F4F4]/90 tracking-normal mb-1.5 sm:mb-2 transition-all duration-300" id="intro-subtitle">{{ $settings['intro_subtitle'] ?? 'Your business is' }}</p>
      <div class="relative inline-block">
        <h1 class="intro-title-gradient text-[26px] sm:text-[42px] lg:text-[62px] font-bold uppercase tracking-tight leading-tight select-none" id="intro-title-base">{{ $settings['intro_title'] ?? 'ENTERING VIETNAM?' }}</h1>
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
        1 => ['style' => 'top: 16%; left: 8%; opacity: 0.95;', 'class' => 'text-[13px] sm:text-[15px] lg:text-[17px] font-medium'],
        2 => ['style' => 'top: 25%; left: 24%; opacity: 0.65;', 'class' => 'text-[12px] sm:text-[14px] lg:text-[16px] font-normal'],
        3 => ['style' => 'top: 18%; left: 50%; transform: translateX(-50%); opacity: 0.50;', 'class' => 'text-[12px] sm:text-[13px] lg:text-[15px] font-normal'],
        4 => ['style' => 'top: 16%; right: 8%; opacity: 0.92;', 'class' => 'text-[13px] sm:text-[15px] lg:text-[17px] font-medium'],
        5 => ['style' => 'top: 30%; right: 10%; opacity: 0.55;', 'class' => 'text-[12px] sm:text-[13px] lg:text-[15px] font-normal'],
        6 => ['style' => 'top: 60%; right: 7%; opacity: 0.88;', 'class' => 'text-[13px] sm:text-[15px] lg:text-[17px] font-medium'],
        7 => ['style' => 'bottom: 12%; left: 50%; transform: translateX(-50%); opacity: 0.92;', 'class' => 'text-[13px] sm:text-[15px] lg:text-[17px] font-medium'],
        8 => ['style' => 'bottom: 25%; left: 50%; transform: translateX(-50%); opacity: 0.50;', 'class' => 'text-[12px] sm:text-[13px] lg:text-[15px] font-normal'],
        9 => ['style' => 'bottom: 18%; left: 18%; opacity: 0.60;', 'class' => 'text-[12px] sm:text-[13px] lg:text-[15px] font-normal'],
        10 => ['style' => 'bottom: 28%; left: 8%; opacity: 0.88;', 'class' => 'text-[13px] sm:text-[15px] lg:text-[17px] font-medium'],
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
