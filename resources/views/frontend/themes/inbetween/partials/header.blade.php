@php
  $phone = setting('site_phone', '0909 999 999');
  $email = setting('site_email', 'inbetween.asia@gmail.com');
  $logo  = setting('site_logo', asset('themes/inbetween/assets/logo.svg'));
  $primaryColor = setting('theme_primary_color', '#EC460B');

  // Navigation links - CMS-driven or fallback to defaults
  $navLinks = json_decode(setting('nav_links', '[]'), true);
  if (empty($navLinks)) {
      $navLinks = [
          ['label' => 'About us',   'url' => '#about'],
          ['label' => 'Media',      'url' => '#media'],
          ['label' => 'Community',  'url' => '#community'],
      ];
  }
  $eventsLabel  = setting('nav_events_label',  'EVENTS');
  $connectLabel = setting('nav_connect_label', "LET'S CONNECT");
@endphp

<style>
  .nav-link {
    position: relative; color: rgba(255,255,255,0.9); font-size: 14px;
    font-weight: 400; letter-spacing: 0.02em; transition: color 0.3s ease; text-decoration: none;
  }
  .nav-link::after {
    content: ''; position: absolute; bottom: -4px; left: 0; width: 0%; height: 1.5px;
    background-color: {{ $primaryColor }}; transition: width 0.3s ease;
  }
  .nav-link:hover { color: #fff; }
  .nav-link:hover::after { width: 100%; }
  .pill-btn-white {
    display: inline-flex; align-items: center; justify-content: center;
    padding: 7px 24px; border-radius: 9999px; background-color: #fff !important;
    color: #000 !important; font-weight: 700; font-size: 11px; letter-spacing: 0.12em;
    text-transform: uppercase; transition: all 0.3s cubic-bezier(0.16,1,0.3,1);
    border: 1px solid #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.3); text-decoration: none;
  }
  .pill-btn-white:hover {
    background-color: {{ $primaryColor }} !important; border-color: {{ $primaryColor }};
    color: #fff !important; box-shadow: 0 4px 18px rgba(236,70,11,0.5); transform: translateY(-1px);
  }
  .cta-link {
    display: inline-flex; align-items: center; font-weight: 700; font-size: 11px;
    letter-spacing: 0.15em; text-transform: uppercase; color: #fff; text-decoration: none;
    position: relative; padding-bottom: 2px; border-bottom: 1.5px solid #fff; transition: all 0.3s ease;
  }
  .cta-link span.arrow { margin-left: 6px; display: inline-block; transition: transform 0.3s ease; }
  .cta-link:hover { color: {{ $primaryColor }}; border-bottom-color: {{ $primaryColor }}; }
  .cta-link:hover span.arrow { transform: translate(3px,-3px); }
  #site-header { transition: background-color 0.3s ease, border-color 0.3s ease, padding 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease; }
  #site-header.header-scrolled { padding-top: 1rem; padding-bottom: 1rem; background-color: rgba(5,5,5,0.85); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px); border-bottom: 1px solid rgba(255,255,255,0.1); }
  #site-header.header-scrolled.header-light { background-color: rgba(249,249,249,0.92); border-bottom: 1px solid rgba(0,0,0,0.08); box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
  #site-header.header-light .nav-link { color: #111 !important; }
  #site-header.header-light .nav-link:hover { color: {{ $primaryColor }} !important; }
  #site-header.header-light .pill-btn-white { background-color: #111 !important; color: #fff !important; border-color: #111 !important; }
  #site-header.header-light .pill-btn-white:hover { background-color: {{ $primaryColor }} !important; border-color: {{ $primaryColor }} !important; }
  #site-header.header-light .cta-link { color: #111 !important; border-bottom-color: #111 !important; }
  #site-header.header-light .cta-link:hover { color: {{ $primaryColor }} !important; border-bottom-color: {{ $primaryColor }} !important; }
  #site-header.header-light #mobile-menu-btn { color: #111 !important; }
</style>

<header id="site-header" class="fixed top-0 inset-x-0 z-50 text-white py-6 transition-all duration-300">
  <div class="container-custom flex items-center justify-between">

    {{-- Left: Navigation --}}
    <nav class="hidden md:flex items-center gap-9" aria-label="Main Navigation">
      @foreach($navLinks as $link)
        <a href="{{ $link['url'] }}" class="nav-link">{{ $link['label'] }}</a>
      @endforeach
    </nav>

    {{-- Center Logo (absolute on desktop) --}}
    <div class="hidden md:block absolute left-1/2 -translate-x-1/2">
      <a href="{{ url(request()->route('projectCode') ?? '/') }}" aria-label="{{ setting('site_name', 'INBETWEEN') }}">
        <img src="{{ $logo }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="h-8 lg:h-9 w-auto object-contain select-none">
      </a>
    </div>

    {{-- Mobile Logo --}}
    <a href="{{ url(request()->route('projectCode') ?? '/') }}" class="md:hidden" aria-label="{{ setting('site_name', 'INBETWEEN') }}">
      <img src="{{ $logo }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="h-7 w-auto object-contain select-none">
    </a>

    {{-- Right: CTAs --}}
    <div class="flex items-center justify-end gap-6 sm:gap-8 w-full md:w-auto">
      <a href="#events" class="pill-btn-white" aria-label="{{ $eventsLabel }}">{{ $eventsLabel }}</a>
      <a href="#contact" class="cta-link hidden sm:inline-flex" aria-label="{{ $connectLabel }}">
        {{ $connectLabel }} <span class="arrow font-normal">&#8599;</span>
      </a>
      <button id="mobile-menu-btn" class="md:hidden p-2 text-white hover:text-orange-500 transition-colors" aria-label="Toggle menu">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>
    </div>

  </div>

  {{-- Mobile Dropdown --}}
  <div id="mobile-menu" class="hidden md:hidden bg-black/95 border-b border-white/10 px-6 py-6">
    <nav class="flex flex-col gap-4 text-base">
      @foreach($navLinks as $link)
        <a href="{{ $link['url'] }}" class="text-white hover:text-orange-500 transition-colors">{{ $link['label'] }}</a>
      @endforeach
      <div class="pt-4 border-t border-white/10 flex items-center justify-between">
        <a href="#contact" class="cta-link">{{ $connectLabel }} <span class="arrow font-normal">&#8599;</span></a>
      </div>
    </nav>
  </div>
</header>