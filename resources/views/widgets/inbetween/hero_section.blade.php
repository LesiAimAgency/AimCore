@php
  $primaryColor   = $settings['primary_color'];
  $siteName       = setting('site_name', 'INBETWEEN');
  $heroLogo       = $settings['hero_logo'];
  $heroSubtitle   = $settings['hero_subtitle'];
@endphp
<section id="top" class="relative h-screen min-h-[640px] h-[100dvh] w-full bg-black text-white overflow-hidden flex items-center justify-center pt-16 pb-8 md:py-0">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="hero-orbits-container pointer-events-none" aria-hidden="true">
    <div class="orbit-ring orbit-outer orbit-left"></div>
    <div class="orbit-ring orbit-inner orbit-right"></div>
  </div>
  <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/40 pointer-events-none z-[1]" aria-hidden="true"></div>
  <div class="container-custom relative z-10 flex flex-col items-center justify-center text-center px-4 sm:px-6">
    <div class="hero-content flex flex-col items-center max-w-[708px] w-full">
      <div class="hero-logo-wrapper w-full max-w-[280px] sm:max-w-[420px] md:max-w-[580px] lg:max-w-[708px]">
        <img src="{{ $heroLogo }}" alt="{{ $siteName }}" class="w-full h-auto object-contain drop-shadow-2xl select-none" width="708" height="109">
      </div>
      <div class="hero-subtitle mt-4 sm:mt-8 lg:mt-11 text-[25px] font-medium leading-snug sm:leading-[1.18] space-y-0.5 sm:space-y-1 text-white select-none">
        @foreach(explode('|', $heroSubtitle) as $line)
        <p class="m-0 tracking-[-0.01em] drop-shadow-md">{!! trim($line) !!}</p>
        @endforeach
      </div>
    </div>
  </div>
</section>
