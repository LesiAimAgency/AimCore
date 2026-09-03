@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
  $siteName       = setting('site_name', 'INBETWEEN');
@endphp
<!-- =======================================================================
     SECTION 3: CORE VALUES & PARTNERS (Exact 1:1 from 3.svg)
     ======================================================================= -->
<section id="core-values" class="relative w-full min-h-screen lg:min-h-0 bg-[#F9F9F9] text-black py-12 flex flex-col justify-center overflow-hidden">
  <div class="container-custom">

    <!-- Header: Exact Typography & Spacing from 3.svg -->
    <div id="core-values-header" class="text-center max-w-2xl mx-auto mb-14 lg:mb-20">
      <div class="w-48 sm:w-56 lg:w-64 mx-auto mb-4">
        <img src="{{ asset('themes/inbetween/assets/core-values-header.svg') }}" alt="{{ $siteName }}" class="w-full h-auto object-contain">
      </div>
      <h2 class="text-3xl sm:text-4xl lg:text-[52px] font-bold tracking-tight m-0 uppercase leading-none" style="color: {{ $primaryColor }};">
        {{ $settings['title'] }}
      </h2>
      <p class="text-sm sm:text-base lg:text-lg text-black font-semibold mt-3 tracking-wide">
        {{ $settings['subtitle'] }}
      </p>
    </div>

    <!-- Desktop 1:1 Overlapping Venn Diagram from 3.svg -->
    <div class="hidden lg:block venn-wrapper my-8">

      <!-- Circle 1 (Left) -->
      <div class="venn-item venn-item-1">
        <div class="venn-bg"></div>
        <div class="relative z-10 max-w-[220px]">
          <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ $primaryColor }};">
            {{ $settings['val_1_title'] }}
          </h3>
          <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">
            {{ $settings['val_1_desc'] }}
          </p>
        </div>
      </div>

      <!-- White Plus Sign 1 (Intersection 1 & 2) -->
      <span class="venn-plus-sign venn-plus-1">+</span>

      <!-- Circle 2 (Middle) -->
      <div class="venn-item venn-item-2">
        <div class="venn-bg"></div>
        <div class="relative z-10 max-w-[220px]">
          <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ $primaryColor }};">
            {{ $settings['val_2_title'] }}
          </h3>
          <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">
            {{ $settings['val_2_desc'] }}
          </p>
        </div>
      </div>

      <!-- White Plus Sign 2 (Intersection 2 & 3) -->
      <span class="venn-plus-sign venn-plus-2">+</span>

      <!-- Circle 3 (Right) -->
      <div class="venn-item venn-item-3">
        <div class="venn-bg"></div>
        <div class="relative z-10 max-w-[220px]">
          <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ $primaryColor }};">
            {{ $settings['val_3_title'] }}
          </h3>
          <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">
            {{ $settings['val_3_desc'] }}
          </p>
        </div>
      </div>

    </div>

    <!-- Mobile / Tablet Responsive Fallback (< 1024px) -->
    <div class="lg:hidden flex flex-col items-center gap-6 my-10">

      <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
        <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ $primaryColor }};">{{ $settings['val_1_title'] }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">
          {{ $settings['val_1_desc'] }}
        </p>
      </div>

      <div class="w-8 h-8 rounded-full font-bold flex items-center justify-center text-xl" style="background-color: {{ $primaryColor }}33; color: {{ $primaryColor }};">+</div>

      <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
        <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ $primaryColor }};">{{ $settings['val_2_title'] }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">
          {{ $settings['val_2_desc'] }}
        </p>
      </div>

      <div class="w-8 h-8 rounded-full font-bold flex items-center justify-center text-xl" style="background-color: {{ $primaryColor }}33; color: {{ $primaryColor }};">+</div>

      <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
        <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ $primaryColor }};">{{ $settings['val_3_title'] }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">
          {{ $settings['val_3_desc'] }}
        </p>
      </div>

    </div>

  </div>

  <!-- Partner Logos Section (from 3.svg) -->
  <div class="pt-20 border-t border-neutral-200 mt-16">
    <div class="text-center mb-10">
      <h3 class="text-sm font-bold uppercase tracking-widest text-black">{{ $settings['partners_title'] }}</h3>
    </div>

    <div class="overflow-hidden relative py-4 flex">
      <div class="marquee-track flex w-max">
        <!-- Track 1 -->
        <div class="flex items-center gap-12 sm:gap-16 pr-12 sm:pr-16 shrink-0">
          @if(!empty($settings['partners']) && is_array($settings['partners']))
            @foreach($settings['partners'] as $partner)
              @if(!empty($partner['image']))
                <img src="{{ asset($partner['image']) }}" alt="Partner" class="h-8 lg:h-10 w-auto object-contain">
              @endif
            @endforeach
          @else
            @for($i = 1; $i <= 17; $i++)
              @if(file_exists(public_path("themes/inbetween/assets/partner-{$i}.png")))
                <img src="{{ asset("themes/inbetween/assets/partner-{$i}.png") }}" alt="Partner {{ $i }}" class="h-8 lg:h-10 w-auto object-contain max-w-[120px]">
              @endif
            @endfor
          @endif
        </div>
        <!-- Track 2 (Duplicate for seamless scroll) -->
        <div class="flex items-center gap-12 sm:gap-16 pr-12 sm:pr-16 shrink-0" aria-hidden="true">
          @if(!empty($settings['partners']) && is_array($settings['partners']))
            @foreach($settings['partners'] as $partner)
              @if(!empty($partner['image']))
                <img src="{{ asset($partner['image']) }}" alt="Partner" class="h-8 lg:h-10 w-auto object-contain">
              @endif
            @endforeach
          @else
            @for($i = 1; $i <= 17; $i++)
              @if(file_exists(public_path("themes/inbetween/assets/partner-{$i}.png")))
                <img src="{{ asset("themes/inbetween/assets/partner-{$i}.png") }}" alt="Partner {{ $i }}" class="h-8 lg:h-10 w-auto object-contain max-w-[120px]">
              @endif
            @endfor
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
