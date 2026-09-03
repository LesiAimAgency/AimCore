@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
@endphp
<!-- =======================================================================
     SECTION 4: FOUNDER & MISSION (Exact 1:1 from 4.svg)
     ======================================================================= -->
<section id="founder" class="relative w-full h-screen bg-black text-white overflow-hidden pt-24 lg:pt-32 pb-16 lg:pb-24 flex flex-col justify-between">

  <!-- Fullscreen Founder Background Photo from 4.svg -->
  <div class="founder-bg absolute inset-0 bg-center bg-cover bg-no-repeat pointer-events-none" style="background-image: url('{{ $settings['background_image'] }}');">
  </div>

  <div class="container-custom relative z-10 w-full h-full flex flex-col justify-between items-start my-auto">

    <!-- Top Left: Founder Name & Title -->
    <div id="founder-title-block" class="max-w-xl pt-4">
      <h2 class="text-3xl sm:text-4xl lg:text-[54px] font-bold uppercase tracking-tight text-white leading-none m-0">
        {{ $settings['founder_name'] }}
      </h2>
      <p class="text-base sm:text-xl lg:text-[22px] font-normal text-white/90 mt-3 m-0">
        {{ $settings['founder_role'] }}
      </p>
    </div>

    <!-- Floating Social Badges from 4.svg (Desktop Absolute Positioning 1:1 with Figma) -->
    <!-- YouTube Badge (Left) at x: ~14%, y: ~40% -->
    <div id="founder-badge-yt" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 left-[6%] xl:left-[12%] top-[46%] max-w-[200px] text-left group">
      <div class="w-6 h-6 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
        <img src="{{ asset('themes/inbetween/assets/social1.svg') }}" alt="YouTube" class="w-6 h-6 object-contain drop-shadow-lg">
      </div>
      <p class="text-[12px] text-white/90 leading-snug m-0 font-normal drop-shadow-md">
        {{ $settings['social_1_text'] }}
      </p>
    </div>

    <!-- Facebook Badge (Top Right) at x: ~69%, y: ~27% -->
    <div id="founder-badge-fb" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 right-[18%] xl:right-[20%] top-[34%] max-w-[200px] text-left group">
      <div class="w-6 h-6 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
        <img src="{{ asset('themes/inbetween/assets/social2.svg') }}" alt="Facebook" class="w-6 h-6 object-contain drop-shadow-lg">
      </div>
      <p class="text-[12px] text-white/90 leading-snug m-0 font-normal drop-shadow-md">
        {{ $settings['social_2_text'] }}
      </p>
    </div>

    <!-- Instagram Badge (Bottom Right) at x: ~76%, y: ~50% -->
    <div id="founder-badge-ig" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 right-[8%] xl:right-[10%] top-[57%] max-w-[200px] text-left group">
      <div class="w-6 h-6 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
        <img src="{{ asset('themes/inbetween/assets/social3.svg') }}" alt="Instagram" class="w-6 h-6 object-contain drop-shadow-lg">
      </div>
      <p class="text-[12px] text-white/90 leading-snug m-0 font-normal drop-shadow-md">
        {{ $settings['social_3_text'] }}
      </p>
    </div>

    <!-- Mobile / Tablet Responsive Social Badges Grid (< lg) -->
    <div class="flex lg:hidden flex-col sm:flex-row gap-4 my-8 w-full z-20">
      <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
        <img src="{{ asset('themes/inbetween/assets/social1.svg') }}" alt="YouTube" class="w-10 h-10 object-contain shrink-0">
        <p class="text-xs text-white/90 leading-snug m-0">{{ $settings['social_1_text'] }}</p>
      </div>
      <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
        <img src="{{ asset('themes/inbetween/assets/social2.svg') }}" alt="Facebook" class="w-10 h-10 object-contain shrink-0">
        <p class="text-xs text-white/90 leading-snug m-0">{{ $settings['social_2_text'] }}</p>
      </div>
      <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
        <img src="{{ asset('themes/inbetween/assets/social3.svg') }}" alt="Instagram" class="w-10 h-10 object-contain shrink-0">
        <p class="text-xs text-white/90 leading-snug m-0">{{ $settings['social_3_text'] }}</p>
      </div>
    </div>

    <!-- Bottom Left: Big Mission Headline -->
    <div id="founder-mission-slogan" class="max-w-xl pb-4 overflow-hidden">
      <h2 class="text-3xl sm:text-4xl lg:text-[50px] font-bold uppercase tracking-tight text-white leading-tight m-0 flex flex-wrap gap-[10px]">
        @foreach(explode(' ', $settings['mission_statement']) as $word)
          <span class="mission-word inline-block">{{ $word }}</span>
        @endforeach
      </h2>
    </div>

  </div>
</section>
