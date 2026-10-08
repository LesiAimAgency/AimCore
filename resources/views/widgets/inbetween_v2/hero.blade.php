<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#131313] text-white flex flex-col justify-between items-center cursor-default" id="inbetween-hero" aria-label="INBETWEEN Hero - Your Local Team Before You're Ready To Hire One">
  <div class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-[#131313] pointer-events-auto select-none" id="hero-preloader" aria-label="Loading hero...">
    <div class="flex flex-col items-center gap-3.5">
      <div class="text-[26px] sm:text-[32px] font-bold tracking-tight text-white select-none flex items-center gap-2"><span>in</span><span class="inline-block w-2 h-2 rounded-full bg-[#EC460B] animate-pulse"></span><span>between</span></div>
      <div class="w-28 sm:w-36 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
        <div class="hero-loader-bar absolute inset-0 bg-gradient-to-r from-transparent via-[#EC460B] to-transparent w-full"></div>
      </div>
    </div>
  </div>
  <div class="absolute inset-0 z-0 pointer-events-none opacity-0" id="hero-bg-layer" style="display: none; opacity: 0;"><img class="w-full h-full object-cover object-center filter brightness-105" src="{{ asset('themes/inbetween_v2/images/hero-hands-glow.png') }}" alt="inbetween Hero Radiant Touch">
    <div class="absolute inset-0 bg-radial-[circle_at_center,_transparent_40%,_rgba(15,4,0,0.65)_100%]"></div>
  </div>
  <header class="inbetween-header fixed top-0 left-0 w-full z-50 select-none transition-colors duration-300 pointer-events-auto theme-dark text-white" id="inbetween-header">
    <div class="inbetween-container-1440 pt-5 sm:pt-6 pb-2 sm:pb-3"><a class="inbetween-logo inline-flex items-center w-[210px] h-[32px] shrink-0 select-none transition-opacity hover:opacity-85" href="#inbetween-hero" title="in • between"><img class="inbetween-logo-white w-[210px] h-[32px] object-contain" src="{{ asset('themes/inbetween_v2/images/Logo-white.svg') }}" alt="in • between Logo" width="210" height="32"/><img class="inbetween-logo-dark w-[210px] h-[32px] object-contain" src="{{ asset('themes/inbetween_v2/images/Logo.svg') }}" alt="in • between Logo" width="210" height="32"/></a>
      <div class="flex items-center gap-5 sm:gap-7">
        <nav><a class="inbetween-connect-link inline-flex items-center gap-3 text-pc-h6 text-[15px] sm:text-[16px] font-normal uppercase tracking-normal transition-all duration-200 group border-b border-transparent hover:border-current pb-0.5 text-current cursor-pointer" href="#contact-modal" data-contact-modal-toggle="" title="Let's Connect"><span>LET'S CONNECT</span><span class="transition-transform duration-200 group-hover:translate-x-1 inline-block">&rarr;</span></a></nav>
      </div>
    </div>
    <button class="menu-toggle-btn inbetween-menu-toggle group focus_outline-none fixed left-0 top-1/2 -translate-y-1/2 z-50 pl-4 sm:pl-6 md:pl-8 py-2" type="button" data-menu-toggle aria-label="Mở trình đơn điều hướng" aria-expanded="false"><span class="hamburger"><span class="line-top"></span><span class="line-bottom"></span></span><span class="menu-text text-[13px] sm:text-[14px] md:text-[15px] font-bold uppercase tracking-wider ml-1">Menu</span></button>
  </header>
  <div class="relative w-full flex-1 max-w-[1440px] mx-auto px-6 sm:px-12 flex flex-col items-center justify-center my-auto z-20 transition-all duration-300" id="act-question-container">
    <div class="relative z-20 text-center select-none" id="center-title-block">
      <p class="text-[18px] sm:text-[22px] lg:text-[25px] font-normal text-[#F6F4F4]/90 tracking-normal mb-1.5 sm:mb-2 transition-all duration-300" id="intro-subtitle">{{ $settings['intro_subtitle'] ?? 'Your business is' }}</p>
      <div class="relative inline-block">
        <h1 class="intro-title-gradient text-[34px] sm:text-[48px] lg:text-[62px] font-bold uppercase tracking-tight leading-tight select-none" id="intro-title-base">{{ $settings['intro_title'] ?? 'ENTERING VIETNAM?' }}</h1>
      </div>
    </div>
    <div class="intro-floating-words absolute inset-0 pointer-events-none" id="floating-words-group">
      <div class="floating-word text-[15px] lg:text-[17px] font-medium text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="1" style="top: 12%; left: 9%; opacity: 0.95;"><span class="floating-word-inner">[ Find Customers ]</span></div>
      <div class="floating-word text-[14px] lg:text-[16px] font-normal text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="2" style="top: 24%; left: 26%; opacity: 0.65;"><span class="floating-word-inner">Find Suppliers</span></div>
      <div class="floating-word text-[13px] lg:text-[15px] font-normal text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="3" style="top: 14%; left: 50%; transform: translateX(-50%); opacity: 0.50;"><span class="floating-word-inner">Business Development</span></div>
      <div class="floating-word text-[15px] lg:text-[17px] font-medium text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="4" style="top: 12%; right: 9%; opacity: 0.92;"><span class="floating-word-inner">Build Partnerships</span></div>
      <div class="floating-word text-[13px] lg:text-[15px] font-normal text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="5" style="top: 30%; right: 12%; opacity: 0.55;"><span class="floating-word-inner">Market Research</span></div>
      <div class="floating-word text-[15px] lg:text-[17px] font-medium text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="6" style="top: 62%; right: 7%; opacity: 0.88;"><span class="floating-word-inner">Coordinate Meetings</span></div>
      <div class="floating-word text-[15px] lg:text-[17px] font-medium text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="7" style="bottom: 10%; left: 50%; transform: translateX(-50%); opacity: 0.92;"><span class="floating-word-inner">Get Things Done Locally</span></div>
      <div class="floating-word text-[13px] lg:text-[15px] font-normal text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="8" style="bottom: 27%; left: 50%; transform: translateX(-50%); opacity: 0.50;"><span class="floating-word-inner">Find Talents</span></div>
      <div class="floating-word text-[13px] lg:text-[15px] font-normal text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="9" style="bottom: 18%; left: 20%; opacity: 0.60;"><span class="floating-word-inner">Market Research</span></div>
      <div class="floating-word text-[15px] lg:text-[17px] font-medium text-[#F6F4F4] pointer-events-auto cursor-default" data-word-idx="10" style="bottom: 30%; left: 7%; opacity: 0.88;"><span class="floating-word-inner">Build Relationships</span></div>
    </div>
  </div>
  <div class="absolute inset-0 z-30 flex items-center justify-center opacity-0 pointer-events-none select-none overflow-hidden" id="act-wecanhelp-container" style="display: none; opacity: 0;">
    <h2 class="text-[60px] sm:text-[90px] lg:text-[120px] font-bold uppercase tracking-tight text-white whitespace-nowrap will-change-transform" id="wecanhelp-text">WE CAN HELP!</h2>
  </div>
  <div class="absolute inset-0 z-35 bg-white opacity-0 pointer-events-none" id="hero-white-transition" style="display: none; opacity: 0;"></div>
  <div class="absolute inset-0 z-20 flex flex-col justify-between pt-20 sm:pt-24 pb-2 sm:pb-3 opacity-0 pointer-events-none" id="hero-content-stage" style="display: none; opacity: 0;">
    <div class="inbetween-container-1440 relative z-10 w-full flex-1 flex flex-col justify-between my-auto">
      <div class="w-full my-auto " style="margin-top:0">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          <div class="lg:col-span-8 xl:col-span-7 space-y-5 sm:space-y-7">
            <h1 class="text-[30px] sm:text-[38px] lg:text-[49px] font-semibold uppercase tracking-normal text-[#F6F4F4] leading-[1.15] drop-shadow-md max-w-[648px]" id="hero-headline-text">{{ $settings['headline_text'] ?? "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE." }}
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3.5 gap-x-6 pt-1 max-w-[600px]" id="hero-services-list">
              <div class="hero-svc-item flex items-center gap-2.5 text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm"><span class="font-medium text-[20px] leading-none text-[#F6F4F4]">+</span><span>Sales &amp; BD</span></div>
              <div class="hero-svc-item flex items-center gap-2.5 text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm"><span class="font-medium text-[20px] leading-none text-[#F6F4F4]">+</span><span>Market Validation</span></div>
              <div class="hero-svc-item flex items-center gap-2.5 text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm"><span class="font-medium text-[20px] leading-none text-[#F6F4F4]">+</span><span>Market Entry Execution</span></div>
              <div class="hero-svc-item flex items-center gap-2.5 text-[16px] lg:text-[20px] font-medium text-[#F6F4F4] tracking-normal drop-shadow-sm"><span class="font-medium text-[20px] leading-none text-[#F6F4F4]">+</span><span>Local Business Support</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full pb-4 sm:pb-6">
        <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-6">
          <div class="hidden lg:block lg:col-span-6"></div>
          <div class="max-w-[440px] space-y-3.5 text-left ml-auto">
            <p class="text-[14px] sm:text-[15px] lg:text-[16px] font-light text-[#F6F4F4]/90 leading-relaxed tracking-normal drop-shadow-sm">We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.</p>
            <div class="pt-0.5"><a class="inbetween-btn-pill inline-flex items-center justify-between gap-4 pl-6 pr-2 py-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#3E3939] transition-all duration-300 shadow-md group shrink-0 cursor-pointer" href="{{ $settings['cta_link'] ?? '#inbetween-founder' }}" title="{{ $settings['cta_text'] ?? 'Talk to us' }}"><span class="font-medium">{{ $settings['cta_text'] ?? 'Talk to us' }}</span><span class="w-8 h-8 rounded-full bg-white text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full shrink-0 flex justify-center pb-1"><a class="inline-flex flex-col items-center gap-0.5 text-white/60 hover:text-white transition-colors duration-200 group text-[12px] font-light uppercase tracking-widest cursor-pointer" href="#inbetween-what-we-do" title="Cuộn sang What We Do"><span class="w-3.5 h-6 sm:w-4 sm:h-7 rounded-full border border-white/40 flex items-start justify-center p-0.5 group-hover:border-white"><span class="w-1 h-1.5 rounded-full bg-white animate-bounce"></span></span></a></div>
    </div>
  </div>
  <div class="w-full shrink-0 flex flex-col items-center justify-center pb-5 sm:pb-7 z-30 pointer-events-none transition-opacity duration-300" id="scroll-prompt-helper">
    <div class="inline-flex flex-col items-center gap-1.5 text-white/70"><span class="text-[12px] font-medium tracking-[0.2em] text-[#EC460B] uppercase"> </span><span class="w-4 h-7 rounded-full border border-white/40 flex items-start justify-center p-0.5"><span class="w-1 h-1.5 rounded-full bg-[#EC460B] animate-bounce"></span></span></div>
  </div>
</section>
