@php
  $badgeText = $settings['badge_text'] ?? '[ WHERE WE FOCUS ]';
  $headingLine1 = $settings['heading_line1'] ?? 'Our core business sectors';
  $headingLine2 = $settings['heading_line2'] ?? 'Where we create values';

  $defaultSectors = [
    [
      'title_line1' => 'INDUSTRIAL &',
      'title_line2' => 'MANUFACTURING',
      'tags' => 'Machinery, Factory Solutions, Equipment, Components, Materials, Materials',
      'image' => 'themes/inbetween_v2/images/sector-robot-arm.png',
    ],
    [
      'title_line1' => 'ELECTRONICS, AUTOMATION',
      'title_line2' => '& TECHNOLOGY',
      'tags' => 'Testing & Inspection, Electronics, Industrial Technology, Automation, Digital Solutions',
      'image' => 'themes/inbetween_v2/images/sector-chipset-ai.png',
    ],
    [
      'title_line1' => 'BIOTECHNOLOGY &',
      'title_line2' => 'HEALTHCARE',
      'tags' => 'Healthcare solutions, Biotech, Medical Technology, Pharma, Laboratory, Diagnostics',
      'image' => 'themes/inbetween_v2/images/sector-dna-helix.png',
    ],
    [
      'title_line1' => 'ENERGY, ENVIRONMENT',
      'title_line2' => '& SUSTAINABILITY',
      'tags' => 'Sustainability Technology, Energy Technology, Environmental Solutions, Water & Waste, Renewable Energy',
      'image' => 'themes/inbetween_v2/images/sector-lightning-bolt.png',
    ],
  ];
  $sectors = !empty($settings['sectors']) && is_array($settings['sectors']) ? array_values($settings['sectors']) : $defaultSectors;
@endphp

<section class="relative w-full border-t border-neutral-200 select-text py-[20px]" id="mobile-where-we-focus" data-section="inbetween-where-we-focus" aria-label="Where We Focus - Mobile">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-where-we-focus" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  <div class="mobile-focus-container">
    <!-- Header: Centered matching focus.svg -->
    <div class="mobile-focus-header">
      <div class="mobile-focus-badge">
        {{ $badgeText }}
      </div>
      <h2 class="mobile-focus-h1">{{ $headingLine1 }}</h2>
      <h2 class="mobile-focus-h2">{{ $headingLine2 }}</h2>
    </div>

    <!-- Swiper Carousel of Focus Sector Cards (Converted from vertical list) -->
    <div class="swiper mobile-focus-swiper overflow-hidden">
      <div class="swiper-wrapper">
        @foreach($sectors as $idx => $sector)
          @php
            $imgRaw = is_array($sector['image'] ?? null) ? ($sector['image']['url'] ?? '') : ($sector['image'] ?? '');
            $imgUrl = !empty($imgRaw) ? (str_starts_with($imgRaw, 'http') || str_starts_with($imgRaw, '/') ? $imgRaw : asset($imgRaw)) : '';
            $tagsRaw = $sector['tags'] ?? '';
            $tagList = is_array($tagsRaw) ? $tagsRaw : array_filter(array_map('trim', explode(',', (string)$tagsRaw)));
            
            $half = (int)ceil(count($tagList) / 2);
            $col1Tags = array_slice($tagList, 0, $half);
            $col2Tags = array_slice($tagList, $half);

          @endphp
          <div class="swiper-slide">
            <div class="mobile-focus-card">
              <!-- 3D Artwork Background (Right-positioned subject matching focus.svg) -->
              @if($imgUrl)
                <div class="mobile-focus-bg mobile-focus-bg-{{ $idx }}" style="background-image: url('{{ $imgUrl }}');"></div>
              @endif

              <!-- Subtle left gradient overlay for legibility -->
              <div class="mobile-focus-overlay"></div>

              <!-- Content: Title and 2-Column Pill Tags placed in lower-left area matching focus.svg -->
              <div class="mobile-focus-content">
                <h3 class="mobile-focus-title">
                  <div>{{ $sector['title_line1'] ?? '' }}</div>
                  <div>{{ $sector['title_line2'] ?? '' }}</div>
                </h3>

                <!-- 2-Column Tags Layout: Even tags on Col 1, Odd tags on Col 2 -->
                <div class="mobile-focus-tags-wrap">
                  <div class="mobile-focus-col">
                    @foreach($col1Tags as $tag)
                      <span class="mobile-focus-tag-pill">{{ $tag }}</span>
                    @endforeach
                  </div>
                  <div class="mobile-focus-col">
                    @foreach($col2Tags as $tag)
                      <span class="mobile-focus-tag-pill">{{ $tag }}</span>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- Pagination indicator dots -->
      <div class="mobile-focus-pagination"></div>
    </div>
  </div>

  <script>
    (function () {
      function initMobileFocusSwiper() {
        var el = document.querySelector('.mobile-focus-swiper');
        if (!el || el.__mobileFocusSwiperInit) return;

        if (typeof Swiper === 'undefined') {
          setTimeout(initMobileFocusSwiper, 80);
          return;
        }

        el.__mobileFocusSwiperInit = true;
        new Swiper(el, {
          slidesPerView: 1,
          spaceBetween: 16,
          grabCursor: true,
          pagination: {
            el: el.querySelector('.mobile-focus-pagination') || '#mobile-where-we-focus .mobile-focus-pagination',
            clickable: true,
          },
        });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileFocusSwiper);
      } else {
        initMobileFocusSwiper();
      }
    })();
  </script>
</section>



