<section class="inbetween-onepage-section inbetween-section-business relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#F6F4F4] text-[#131313] flex flex-col justify-between items-center pt-20 lg:pt-[84px] pb-3 sm:pb-4 px-4 sm:px-6" id="inbetween-business" aria-label="INBETWEEN Beyond Business">
  <div class="business-intro-text relative w-full max-w-[1296px] mx-auto px-4 sm:px-8 lg:px-12 flex flex-col items-center text-center z-20 pointer-events-auto shrink-0">
    <div class="w-full flex items-center justify-between mb-2 sm:mb-3 pointer-events-auto relative z-30">
      <!-- Media Badge Toggle -->
      <div class="business-badge-item business-badge-media relative text-left" id="business-badge-media">
        <button type="button" class="business-badge-trigger group inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#131313]/10 hover:border-[#EC460B]/40 shadow-xs cursor-pointer transition-all duration-200 select-none focus:outline-none" aria-expanded="false" data-toggle="media">
          <div class="w-5 h-5 shrink-0 text-[#EC460B] flex items-center justify-center transition-transform duration-200 group-hover:scale-110">
            <svg class="w-4 h-4" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19 2.15C18.696 2.013 18.359 1.969 18.03 2.022C17.701 2.075 17.395 2.224 17.15 2.45L15 4.45V3C15 2.204 14.684 1.441 14.121 0.879C13.559 0.316 12.796 0 12 0H3C2.204 0 1.441 0.316 0.879 0.879C0.316 1.441 0 2.204 0 3V11C0 11.796 0.316 12.559 0.879 13.121C1.441 13.684 2.204 14 3 14H12C12.796 14 13.559 13.684 14.121 13.121C14.684 12.559 15 11.796 15 11V9.55L17.16 11.55C17.478 11.838 17.891 11.998 18.32 12C18.558 11.999 18.793 11.948 19.01 11.85C19.305 11.731 19.558 11.526 19.736 11.263C19.914 10.999 20.009 10.688 20.01 10.37V3.63C20.009 3.311 19.912 2.999 19.732 2.735C19.552 2.472 19.297 2.268 19 2.15ZM13 11C13 11.265 12.895 11.52 12.707 11.707C12.52 11.895 12.265 12 12 12H3C2.735 12 2.48 11.895 2.293 11.707C2.105 11.52 2 11.265 2 11V3C2 2.735 2.105 2.48 2.293 2.293C2.48 2.105 2.735 2 3 2H12C12.265 2 12.52 2.105 12.707 2.293C12.895 2.48 13 2.735 13 3V11ZM18 9.6L15.19 7L18 4.4V9.6Z" fill="#EC460B"></path>
            </svg>
          </div>
          <span class="text-[12.5px] sm:text-[13px] font-bold text-[#131313] tracking-wider uppercase">{{ $settings['media_title'] ?? 'MEDIA' }}</span>
          <span class="badge-toggle-icon flex items-center justify-center transition-transform duration-200">
            <svg class="w-3.5 h-3.5 text-[#EC460B]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2.5H13.5V6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6 13.5H2.5V10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M13.5 2.5L2.5 13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
          </span>
        </button>
        <!-- Popover Card -->
        <div class="business-badge-popover absolute left-0 top-full mt-2 w-[270px] sm:w-[290px] p-4 bg-white/95 backdrop-blur-md rounded-2xl border border-black/8 shadow-xl z-50 text-left transition-all duration-300 opacity-0 pointer-events-none -translate-y-2">
          <div class="text-[12px] font-bold text-[#EC460B] uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-[#EC460B]"></span>
            <span>{{ $settings['media_title'] ?? 'MEDIA' }}</span>
          </div>
          <p class="text-[12.5px] font-normal text-[#2B2B2B] leading-relaxed">{{ $settings['media_desc'] ?? 'Business, culture, society and perspectives from across Asia.' }}</p>
        </div>
      </div>

      <!-- Center Title -->
      <span class="text-[13px] font-medium tracking-[0.2em] text-[#131313] uppercase self-center">{{ $settings['badge_title'] ?? '[ BEYOND BUSINESS ]' }}</span>

      <!-- Connections Badge Toggle -->
      <div class="business-badge-item business-badge-connections relative text-right" id="business-badge-connections">
        <button type="button" class="business-badge-trigger group inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#131313]/10 hover:border-[#EC460B]/40 shadow-xs cursor-pointer transition-all duration-200 select-none focus:outline-none" aria-expanded="false" data-toggle="connections">
          <div class="w-5 h-5 shrink-0 text-[#EC460B] flex items-center justify-center transition-transform duration-200 group-hover:scale-110">
            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.29 0.29L7.29 4.29C7.2 4.383 7.12 4.494 7.07 4.616C7.02 4.737 6.99 4.868 6.99 5C6.99 5.132 7.02 5.263 7.07 5.385C7.12 5.507 7.2 5.617 7.29 5.71C7.38 5.804 7.49 5.878 7.62 5.929C7.74 5.98 7.87 6.006 8 6.006C8.13 6.006 8.26 5.98 8.38 5.929C8.51 5.878 8.62 5.804 8.71 5.71L12.71 1.71C12.9 1.522 13 1.266 13 1C13 0.734 12.9 0.478 12.71 0.29C12.52 0.102 12.27 0 12 0C11.73 0 11.48 0.102 11.29 0.29Z" fill="#EC460B"></path>
              <path d="M10.28 8.4L9 9.67C8.28 10.41 7.31 10.86 6.29 10.934C5.26 11.008 4.24 10.7 3.42 10.07C2.99 9.714 2.64 9.272 2.39 8.771C2.14 8.271 1.99 7.724 1.97 7.165C1.94 6.606 2.03 6.048 2.24 5.527C2.44 5.006 2.75 4.533 3.15 4.14L4.57 2.71C4.66 2.617 4.74 2.506 4.79 2.385C4.84 2.263 4.87 2.132 4.87 2C4.87 1.868 4.84 1.737 4.79 1.615C4.74 1.494 4.66 1.383 4.57 1.29C4.48 1.196 4.37 1.122 4.24 1.071C4.12 1.02 3.99 0.994 3.86 0.994C3.73 0.994 3.6 1.02 3.47 1.071C3.35 1.122 3.24 1.196 3.15 1.29L1.88 2.57C0.81 3.606 0.15 4.995 0.03 6.479C-0.09 7.963 0.33 9.442 1.21 10.64C1.73 11.321 2.4 11.882 3.16 12.287C3.92 12.692 4.75 12.93 5.61 12.987C6.47 13.044 7.33 12.917 8.13 12.616C8.94 12.315 9.67 11.846 10.28 11.24L11.7 9.82C11.89 9.632 11.99 9.376 11.99 9.11C11.99 8.844 11.89 8.588 11.7 8.4C11.51 8.212 11.26 8.106 10.99 8.106C10.72 8.106 10.47 8.212 10.28 8.4Z" fill="#EC460B"></path>
              <path d="M17.66 1.22C16.45 0.326 14.96 -0.098 13.47 0.027C11.97 0.153 10.57 0.818 9.53 1.9L8.45 3C8.33 3.089 8.22 3.204 8.15 3.336C8.07 3.468 8.02 3.615 8.01 3.767C7.99 3.919 8.01 4.072 8.05 4.217C8.1 4.362 8.18 4.496 8.28 4.61C8.37 4.703 8.48 4.778 8.61 4.828C8.73 4.879 8.86 4.905 8.99 4.905C9.12 4.905 9.25 4.879 9.37 4.828C9.5 4.778 9.61 4.703 9.7 4.61L11 3.3C11.71 2.556 12.68 2.103 13.71 2.03C14.74 1.956 15.76 2.266 16.57 2.9C17 3.255 17.36 3.699 17.61 4.201C17.86 4.703 18.01 5.253 18.03 5.814C18.06 6.376 17.97 6.936 17.76 7.459C17.55 7.982 17.24 8.456 16.84 8.85L15.42 10.28C15.33 10.373 15.25 10.483 15.2 10.605C15.15 10.727 15.12 10.858 15.12 10.99C15.12 11.122 15.15 11.252 15.2 11.374C15.25 11.496 15.33 11.607 15.42 11.7C15.51 11.793 15.62 11.868 15.75 11.918C15.87 11.969 16 11.995 16.13 11.995C16.26 11.995 16.39 11.969 16.51 11.918C16.64 11.868 16.75 11.793 16.84 11.7L18.26 10.28C18.86 9.67 19.33 8.938 19.63 8.134C19.93 7.33 20.06 6.471 20 5.614C19.94 4.758 19.71 3.923 19.3 3.165C18.9 2.408 18.34 1.744 17.66 1.22Z" fill="#EC460B"></path>
            </svg>
          </div>
          <span class="text-[12.5px] sm:text-[13px] font-bold text-[#131313] tracking-wider uppercase">{{ $settings['connections_title'] ?? 'CONNECTIONS' }}</span>
          <span class="badge-toggle-icon flex items-center justify-center transition-transform duration-200">
            <svg class="w-3.5 h-3.5 text-[#EC460B]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2.5H13.5V6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6 13.5H2.5V10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M13.5 2.5L2.5 13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
          </span>
        </button>
        <!-- Popover Card -->
        <div class="business-badge-popover absolute right-0 top-full mt-2 w-[280px] sm:w-[320px] p-4 bg-white/95 backdrop-blur-md rounded-2xl border border-black/8 shadow-xl z-50 text-left transition-all duration-300 opacity-0 pointer-events-none -translate-y-2">
          <div class="text-[12px] font-bold text-[#EC460B] uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-[#EC460B]"></span>
            <span>{{ $settings['connections_title'] ?? 'CONNECTIONS' }}</span>
          </div>
          <p class="text-[12.5px] font-normal text-[#2B2B2B] leading-relaxed">{{ $settings['connections_desc'] ?? 'Business networking, industry gatherings, workshops and cross-border connections — bringing people and ideas into the same room.' }}</p>
        </div>
      </div>
    </div>
    <h2 class="text-[26px] sm:text-[34px] lg:text-[42px] font-semibold text-[#131313] leading-[1.15] tracking-tight mb-2 sm:mb-3"><span class="text-[#EC460B]">{{ $settings['heading_prefix'] ?? 'Building ' }}</span><span>{{ $settings['heading_suffix'] ?? 'more than a service.' }}</span></h2>
    <p class="text-[13.5px] sm:text-[14.5px] font-light text-[#131313] leading-relaxed max-w-[620px] mx-auto">{!! $settings['description'] ?? 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network </strong>connecting people, ideas and opportunities across Asia.' !!}</p>
  </div>
  <div class="business-pull-stage relative w-full flex flex-col items-center justify-start z-20 will-change-transform pointer-events-auto pt-[170px] sm:pt-[220px] lg:pt-[369px]">
    <div class="business-stage-wrap relative w-full flex flex-col items-center justify-start">
      <div class="w-full flex justify-center mb-[33px] pointer-events-auto"><a class="business-btn-talk inline-flex items-center justify-between w-[295px] h-[48px] pl-7 pr-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#2B2B2B] transition-colors duration-300 shadow-sm group shrink-0 select-none whitespace-nowrap cursor-pointer pointer-events-auto" href="{{ $settings['cta_link'] ?? '#inbetween-founder' }}"><span class="text-[16px] font-medium text-[#F6F4F4] whitespace-nowrap">{{ $settings['cta_text'] ?? 'Talk to us' }}</span><span class="w-[48px] h-[32px] rounded-[16px] bg-[#F6F4F4] text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
            <svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="#131313" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span></a></div>
      <div class="business-ellipse-stage relative w-full h-[500px] flex items-start justify-center overflow-visible pointer-events-auto select-none">
        @php
          $defaultCarousel = [
            ['image' => 'themes/inbetween_v2/images/hero-person-left-outer.png', 'alt' => 'Person Left Outer'],
            ['image' => 'themes/inbetween_v2/images/hero-person-left-inner.png', 'alt' => 'Person Left Inner'],
            ['image' => 'themes/inbetween_v2/images/hero-person-center.png', 'alt' => 'Person Center'],
            ['image' => 'themes/inbetween_v2/images/hero-person-right-inner.png', 'alt' => 'Person Right Inner'],
            ['image' => 'themes/inbetween_v2/images/hero-person-right-outer.png', 'alt' => 'Person Right Outer'],
          ];
          $carouselList = !empty($settings['carousel_images']) && is_array($settings['carousel_images']) ? array_values($settings['carousel_images']) : $defaultCarousel;
        @endphp
        <div class="business-panels-container relative w-full h-full flex items-start justify-center overflow-visible pointer-events-auto">
          @foreach($carouselList as $imgIndex => $cImgItem)
            @php
              $cImgSrc = is_array($cImgItem) ? ($cImgItem['image'] ?? '') : (string)$cImgItem;
              $cImgUrl = !empty($cImgSrc) ? (str_starts_with($cImgSrc, 'http') || str_starts_with($cImgSrc, '/') ? $cImgSrc : asset($cImgSrc)) : '';
              $cImgAlt = is_array($cImgItem) ? ($cImgItem['alt'] ?? '') : '';
              $slot = $imgIndex;
              $overlayClass = match($slot) {
                0, 4 => 'bg-white/40',
                1, 3 => 'bg-white/30',
                2 => 'bg-white/0',
                default => 'bg-white/40',
              };
              $extraCardClass = ($slot === 2) ? 'shadow-2xl bg-black' : 'shadow-lg';
            @endphp
            <div class="business-ellipse-card business-panel-card absolute left-1/2 top-[2px] w-[400px] h-[400px] rounded-[24px] overflow-hidden cursor-pointer {{ $extraCardClass }} will-change-transform" data-index="{{ $imgIndex }}" data-slot="{{ $slot }}"><img class="w-full h-full object-cover object-center pointer-events-none" src="{{ $cImgUrl }}" alt="{{ $cImgAlt }}">
              <div class="business-card-overlay absolute inset-0 {{ $overlayClass }} pointer-events-none transition-opacity duration-300"></div>
            </div>
          @endforeach
        </div>
        <div class="business-slider-container absolute left-1/2 top-[440px] -translate-x-1/2 flex flex-col items-center justify-center z-30 pointer-events-auto select-none opacity-0 pointer-events-none transition-opacity duration-500">
          <div class="business-slider-track-wrap relative w-[217px] h-[24px] flex items-center justify-center cursor-pointer group" aria-label="Thanh trượt chuyển ảnh">
            <div class="business-slider-line w-[217px] h-[1.5px] bg-[#3E3939] rounded-full"></div>
            <div class="business-slider-thumb absolute left-0 top-1/2 -translate-y-1/2 w-[12px] h-[12px] rounded-full bg-[#EC460B] shadow-sm cursor-grab active:cursor-grabbing hover:scale-125 transition-transform duration-150"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
