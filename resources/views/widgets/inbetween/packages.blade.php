@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
  $mockPackages = $settings['packages_list'] ?? [];
  
  // Format features text to array if needed
  foreach($mockPackages as &$pkg) {
      if (isset($pkg['features']) && !is_array($pkg['features'])) {
          $pkg['features'] = array_filter(array_map('trim', explode("\n", $pkg['features'])));
      } elseif (!isset($pkg['features'])) {
          $pkg['features'] = [];
      }
      $pkg['highlight'] = isset($pkg['highlight']) && $pkg['highlight'] == '1';
  }
@endphp

<!-- =======================================================================
     SECTION 7: MEMBERSHIP / COMMUNITY PACKAGES (Exact 1:1 from 7.svg)
     ======================================================================= -->
<section id="packages" class="relative w-full min-h-screen bg-[#F9F9F9] text-black py-12 flex flex-col justify-center border-t border-neutral-200">
  <div class="container-custom">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

      <!-- Left Column: Big Title (Fixed / Sticky when scrolling) -->
      <div id="packages-sticky-header" class="lg:col-span-5 flex flex-col items-start lg:sticky lg:top-32">
        <h2 class="text-4xl sm:text-5xl lg:text-[56px] font-bold text-black tracking-tight leading-tight m-0">
          {!! $settings['title'] !!}
        </h2>
      </div>

      <!-- Right Column: Description at Top + 3 Stacked Package Cards (from 7.svg) -->
      <div class="lg:col-span-7 flex flex-col gap-6 w-full">

        <!-- Description at top of right column (Width 30%) -->
        <p class="text-xs sm:text-sm text-neutral-600 font-normal leading-relaxed mb-4 max-w-[260px] lg:max-w-[30%] m-0">
          {{ $settings['subtitle'] }}
        </p>
        
        @if(count($mockPackages) > 0)
          @foreach($mockPackages as $pkg)
            <!-- Package {{ $loop->iteration }} -->
            <div class="package-card border border-black rounded-[22px] p-6 sm:p-7 bg-transparent hover:bg-white hover:shadow-xl transition-all flex flex-col justify-between">
              <div>
                <div class="flex items-center justify-between pb-2">
                  <h3 class="text-2xl sm:text-3xl font-bold text-black m-0 tracking-tight">{{ $pkg['name'] }}</h3>
                  <span class="text-2xl sm:text-3xl font-bold text-black">{{ $pkg['price'] }}<span class="text-base font-normal text-neutral-600">{{ $pkg['period'] }}</span></span>
                </div>
                <h4 class="text-base font-bold text-black mt-2 mb-2 m-0">{{ $pkg['description'] }}</h4>
                <ul class="text-xs sm:text-sm text-neutral-700 space-y-1 pl-4 list-disc m-0">
                  @foreach($pkg['features'] as $feature)
                    <li>{{ $feature }}</li>
                  @endforeach
                </ul>
              </div>
              <div class="flex justify-end mt-4 pt-2">
                <a href="{{ $settings['btn_link'] }}" class="inline-flex items-center gap-2 border-b border-black pb-0.5 text-xs font-bold uppercase tracking-wider hover:text-[{{ $primaryColor }}] hover:border-[{{ $primaryColor }}] transition-colors">
                  {{ $settings['btn_text'] }} <span>→</span>
                </a>
              </div>
            </div>
          @endforeach
        @endif

      </div>

    </div>

  </div>
</section>
