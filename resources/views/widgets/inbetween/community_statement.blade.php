@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
  $siteName       = setting('site_name', 'INBETWEEN');
  $getImage = fn($key) => str_starts_with($settings[$key] ?? '', 'http') || str_starts_with($settings[$key] ?? '', '/') ? $settings[$key] : asset($settings[$key] ?? '');
@endphp
  <!-- COMMUNITY STATEMENT & 4 PILLARS (Stage 2) -->
  <div id="community" class="absolute inset-0 flex items-center justify-center z-20">
    <div class="relative w-full max-w-[1440px] mx-auto flex flex-col justify-center px-6 lg:px-16 z-10">
      <!-- Grid layout matching 2.svg -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

        <!-- Left Column (2 Cards: Influencers & Businesses) -->
        <div class="lg:col-span-4 flex flex-col gap-4 lg:gap-8 items-center lg:items-start">
          <!-- Top Left: WHERE INFLUENCERS Sharing THEIR THOUGHTS -->
          <div id="sec2-card-1" class="group cursor-pointer max-w-[240px] lg:max-w-[340px] w-full will-change-transform">
            <div class="aspect-[300/288] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
              <img src="{{ $getImage('image_1') }}" alt="Influencers" class="w-full h-full object-cover">
            </div>
          </div>
          <!-- Bottom Left: WHERE BUSINESSES Find NEW OPPORTUNITIES -->
          <div id="sec2-card-2" class="group cursor-pointer max-w-[260px] lg:max-w-[380px] w-full will-change-transform">
            <div class="aspect-[401/346] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
              <img src="{{ $getImage('image_2') }}" alt="Businesses" class="w-full h-full object-cover">
            </div>
          </div>
        </div>

        <!-- Center Column (Main Statement & CTAs) -->
        <div class="lg:col-span-4 flex flex-col items-center text-center my-4 lg:my-6 z-20">
          <div class="flex flex-col gap-14 lg:gap-[140px]">
            <h2 id="sec2-title-top" class="text-xl sm:text-3xl lg:text-[40px] font-bold uppercase tracking-tight text-white m-0 leading-tight">
              {!! str_replace('COMMUNITY', '<span class="text-brandOrange">COMMUNITY</span>', $settings['title_top']) !!}
            </h2>
            <h2 id="sec2-title-bot" class="text-xl sm:text-3xl lg:text-[40px] font-bold uppercase tracking-tight text-white m-0 leading-tight">
              {{ $settings['title_bot'] }}
            </h2>
          </div>

          <p id="sec2-subtitle" class="text-xs sm:text-sm text-silver font-light leading-relaxed my-4 lg:my-6 max-w-[320px]">
            {{ $settings['description'] }}
          </p>

          <div id="sec2-ctas" class="flex flex-col sm:flex-row gap-3.5 items-center justify-center w-full mt-2 lg:mt-3">
            <a href="{{ $settings['btn_1_link'] }}" class="pill-btn-outline w-full sm:w-auto text-center">{{ $settings['btn_1_text'] }}</a>
            <a href="{{ $settings['btn_2_link'] }}" class="pill-btn-white w-full sm:w-auto text-center">{{ $settings['btn_2_text'] }}</a>
          </div>
        </div>

        <!-- Right Column (2 Cards: People & Creatives) -->
        <div class="lg:col-span-4 flex flex-col gap-4 lg:gap-8 items-center lg:items-end">
          <!-- Top Right: WHERE PEOPLE Connect WITH OTHERS -->
          <div id="sec2-card-3" class="group cursor-pointer max-w-[260px] lg:max-w-[380px] w-full will-change-transform">
            <div class="aspect-[402/346] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
              <img src="{{ $getImage('image_3') }}" alt="People" class="w-full h-full object-cover">
            </div>
          </div>
          <!-- Bottom Right: WHERE CREATIVES Collaborated AND IDEAS Spreaded -->
          <div id="sec2-card-4" class="group cursor-pointer max-w-[260px] lg:max-w-[380px] w-full will-change-transform">
            <div class="aspect-[402/346] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
              <img src="{{ $getImage('image_4') }}" alt="Creatives" class="w-full h-full object-cover">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
