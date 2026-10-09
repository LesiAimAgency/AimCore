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
  #inbetween-hero .intro-title-gradient,
  #inbetween-intro .intro-title-gradient,
  .intro-title-gradient {
    color: #FFFFFF !important;
    background-image: linear-gradient(180deg,
      #FFFFFF var(--grad-top, 100%),
      #EC310B var(--grad-bottom, 100%),
      #F1791C 100%
    ) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
    display: inline-block;
    will-change: --grad-top, --grad-bottom, letter-spacing;
    filter: none !important;
    text-shadow: none !important;
    box-shadow: none !important;
  }
  #wecanhelp-text {
    font-size: 52px !important;
    line-height: 1.05 !important;
    font-family: 'SVN-Gilroy', 'Inter', sans-serif !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: -0.02em;
    will-change: transform, letter-spacing, opacity;
    transform-origin: 50% 50%;
  }
  @media (min-width: 640px) {
    #wecanhelp-text {
      font-size: 84px !important;
    }
  }
  @media (min-width: 1024px) {
    #wecanhelp-text {
      font-size: 116px !important;
    }
  }
  @media (min-width: 1280px) {
    #wecanhelp-text {
      font-size: 132px !important;
    }
  }
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
  <div class="inbetween-container-1440 pt-4 sm:pt-6 pb-2 sm:pb-3 transition-all duration-300" style="padding-bottom: 40px;padding-top: 40px;">
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
            <path d="M4 13C4.55228 13 5 12.5523 5 12C5 11.4477 4.55228 11 4 11C3.44772 11 3 11.4477 3 12C3 12.5523 3.44772 13 4 13Z" fill="currentColor"/>
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

  <!-- Section 1 Content: Question & Floating Words -->
  <div class="relative w-full flex-1 max-w-[1440px] mx-auto px-6 sm:px-12 flex flex-col items-center justify-center my-auto z-20 transition-all duration-300" id="act-question-container">
    <div class="relative z-20 text-center select-none" id="center-title-block">
      <p class="text-[18px] sm:text-[22px] lg:text-[25px] font-normal text-[#F6F4F4]/90 tracking-normal mb-1.5 sm:mb-2 transition-all duration-300" id="intro-subtitle">{{ $settings['intro_subtitle'] ?? 'Your business is' }}</p>
      <div class="relative inline-block">
        <h1 class="intro-title-gradient text-[28px] xs:text-[34px] sm:text-[48px] lg:text-[62px] font-bold uppercase tracking-tight leading-tight select-none" id="intro-title-base">{{ $settings['intro_title'] ?? 'ENTERING VIETNAM?' }}</h1>
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
        11 => ['style' => 'top: 26%; right: 26%; opacity: 0.70;', 'class' => 'text-[14px] lg:text-[16px] font-normal'],
        12 => ['style' => 'bottom: 19%; right: 19%; opacity: 0.65;', 'class' => 'text-[14px] lg:text-[16px] font-normal'],
        13 => ['style' => 'top: 45%; left: 6%; opacity: 0.75;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        14 => ['style' => 'top: 45%; right: 6%; opacity: 0.75;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
        15 => ['style' => 'bottom: 10%; right: 33%; opacity: 0.60;', 'class' => 'text-[13px] lg:text-[15px] font-normal'],
      ];

      $assignedWords = [];
      $usedPositions = [];
      foreach ($floatingWords as $wordItem) {
          $wText = is_array($wordItem) ? ($wordItem['text'] ?? '') : (string)$wordItem;
          if (trim((string)$wText) === '') continue;
          $reqPos = is_array($wordItem) ? ($wordItem['position'] ?? null) : null;
          if ($reqPos !== null && $reqPos !== '' && $reqPos !== 'auto') {
              $pNum = (int)$reqPos;
              if (isset($wordPositions[$pNum]) && !in_array($pNum, $usedPositions, true)) {
                  $assignedWords[] = ['text' => $wText, 'pos' => $pNum];
                  $usedPositions[] = $pNum;
                  continue;
              }
          }
          $assignedWords[] = ['text' => $wText, 'pos' => null];
      }

      $allPosKeys = array_keys($wordPositions);
      foreach ($assignedWords as &$aw) {
          if ($aw['pos'] === null) {
              $available = array_values(array_diff($allPosKeys, $usedPositions));
              if (!empty($available)) {
                  $aw['pos'] = $available[0];
                  $usedPositions[] = $available[0];
              } else {
                  $aw['pos'] = 1;
              }
          }
      }
      unset($aw);
    @endphp
    <div class="intro-floating-words absolute inset-0 pointer-events-none" id="floating-words-group">
      @foreach($assignedWords as $idx => $assignedItem)
        @php
          $posConfig = $wordPositions[$assignedItem['pos']] ?? ['style' => 'top: 50%; left: 50%; opacity: 0.8;', 'class' => 'text-[14px] font-normal'];
        @endphp
        <div class="floating-word {{ $posConfig['class'] }} text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="{{ $idx + 1 }}" data-word-pos="{{ $assignedItem['pos'] }}" style="{{ $posConfig['style'] }}"><span class="floating-word-inner">{{ $assignedItem['text'] }}</span></div>
      @endforeach
    </div>
  </div>

  <!-- Act 2: Big WE CAN HELP! Container (Frames 12 - 21) -->
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
    @media (min-width: 640px) {
      #wecanhelp-text {
        font-size: 84px !important;
      }
    }
    @media (min-width: 1024px) {
      #wecanhelp-text {
        font-size: 116px !important;
      }
    }
    @media (min-width: 1280px) {
      #wecanhelp-text {
        font-size: 132px !important;
      }
    }
  </style>
  <div class="absolute inset-0 z-[30] flex items-center justify-center opacity-0 pointer-events-none select-none overflow-hidden" id="act-wecanhelp-container" style="display: none; opacity: 0; z-index: 30;">
    <h2 class="font-bold uppercase tracking-tight text-white whitespace-nowrap will-change-transform font-sans"
        id="wecanhelp-text"
        style="font-size: clamp(52px, 8.5vw, 132px) !important; line-height: 1.05 !important; font-weight: 700 !important; font-family: 'SVN-Gilroy', 'Inter', sans-serif !important; will-change: transform, letter-spacing, opacity; transform-origin: 50% 50%;">
      {{ $settings['wecanhelp_text'] ?? 'WE CAN HELP!' }}
    </h2>
  </div>

  <!-- Act 3: White Transition Flash Screen -->
  <div class="absolute inset-0 z-[35] bg-white opacity-0 pointer-events-none" id="hero-white-transition" style="display: none; opacity: 0; z-index: 35;"></div>

</section>
