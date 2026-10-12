@php
  $badgeTitle = $settings['badge_title'] ?? '[ BEYOND BUSINESS ]';
  $headingPrefix = $settings['heading_prefix'] ?? 'Building ';
  $headingSuffix = $settings['heading_suffix'] ?? 'more than a service.';
  $desc = $settings['description'] ?? 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network</strong> connecting people, ideas and opportunities across Asia.';
  $ctaText = $settings['cta_text'] ?? 'Talk to us';
  $ctaLink = (!empty($settings['cta_link']) && $settings['cta_link'] !== '#inbetween-founder') ? $settings['cta_link'] : '#contact-modal';

  $mediaTitle = $settings['media_title'] ?? 'MEDIA';
  $mediaDesc = $settings['media_desc'] ?? 'Business, culture, society and perspectives from across Asia.';
  $connTitle = $settings['connections_title'] ?? 'CONNECTIONS';
  $connDesc = $settings['connections_desc'] ?? 'Business networking, industry gatherings, workshops and cross-border connections — bringing people and ideas into the same room.';

  $defaultCarousel = [
    ['image' => 'themes/inbetween_v2/images/hero-person-left-outer.png', 'alt' => 'Person Left Outer'],
    ['image' => 'themes/inbetween_v2/images/hero-person-left-inner.png', 'alt' => 'Person Left Inner'],
    ['image' => 'themes/inbetween_v2/images/hero-person-center.png', 'alt' => 'Person Center'],
    ['image' => 'themes/inbetween_v2/images/hero-person-right-inner.png', 'alt' => 'Person Right Inner'],
    ['image' => 'themes/inbetween_v2/images/hero-person-right-outer.png', 'alt' => 'Person Right Outer'],
  ];
  $carouselList = !empty($settings['carousel_images']) && is_array($settings['carousel_images']) ? array_values($settings['carousel_images']) : $defaultCarousel;
  $totalCards = count($carouselList);
  $centerCardIndex = (int) floor($totalCards / 2);
@endphp

<section class="relative w-full bg-[#F6F4F4] text-[#131313] pt-[20px] pb-[32px] px-4 select-text overflow-hidden" id="mobile-business" data-section="inbetween-business" aria-label="Beyond Business - Mobile">
  {{-- Anchor targets for mobile nav drawer and page links --}}
  <div id="inbetween-business" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  <div id="inbetween-media" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  
  <div class="mobile-biz-container w-full max-w-[440px] mx-auto flex flex-col items-center select-none gap-4">
    
    <!-- Top Header Bar: Center Title matching media.svg -->
    <div class="w-full flex items-center justify-center mb-[14px] relative z-40">
      <span class="text-[13px] font-normal text-[#131313] uppercase tracking-[0.2em] whitespace-nowrap text-center" style="font-size: 13px !important; font-weight: 400 !important;">{{ $badgeTitle }}</span>
    </div>

    <!-- Heading: Building more than a service. (media.svg line 3 & 4) -->
    <h2 class="text-[20px] font-semibold text-center tracking-tight leading-[1.2] mb-[10px]" style="font-size: 20px !important; font-weight: 600 !important;">
      <span class="text-[#EC460B]">{{ $headingPrefix }}</span>
      <span class="text-[#131313]">{{ $headingSuffix }}</span>
    </h2>

    <!-- Description (media.svg line 5) -->
    <p class="text-[12px] font-normal text-[#3E3939] text-center leading-relaxed max-w-[380px] mx-auto mb-[14px]" style="font-size: 12px !important; font-weight: 400 !important;">
      {!! $desc !!}
    </p>

    <!-- Talk to us Button (media.svg line 6-10: 174px width, rounded pill) -->
    <div class="w-full flex justify-center mb-5 pointer-events-auto">
      <a href="{{ $ctaLink }}" data-contact-modal-toggle class="mobile-biz-btn-talk inline-flex items-center justify-between rounded-full bg-[#131313] text-white text-[14px] font-medium hover:bg-[#2B2B2B] active:scale-[0.98] transition-all shadow-sm">
        <span>{{ $ctaText }}</span>
        <span class="arrow-circle">
          <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none">
            <path d="M3.3 8h9.4M8.7 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>
      </a>
    </div>

    <!-- Scaled 3D Ellipse Cards Carousel (media.svg lines 12-14: 214px center card, 160.5px side cards) -->
    <div class="mobile-biz-stage relative w-full flex items-start justify-center overflow-visible select-none touch-pan-y" id="mobile-biz-stage" style="height: 235px; min-height: 235px;">
      <div class="mobile-biz-cards-container relative w-full h-full flex items-start justify-center overflow-visible">
        @foreach($carouselList as $imgIndex => $cImgItem)
          @php
            $cRaw = is_array($cImgItem) ? ($cImgItem['image'] ?? '') : (string)$cImgItem;
            $cSrc = is_array($cRaw) ? ($cRaw['url'] ?? '') : (string)$cRaw;
            $cUrl = !empty($cSrc) ? (str_starts_with($cSrc, 'http') || str_starts_with($cSrc, '/') ? $cSrc : asset($cSrc)) : '';
            $cAlt = is_array($cImgItem) ? ($cImgItem['alt'] ?? '') : 'Community photo ' . ($imgIndex + 1);
            $diffFromCenter = abs($imgIndex - $centerCardIndex);
            $overlayOpacity = $diffFromCenter === 0 ? 'opacity-0' : ($diffFromCenter === 1 ? 'opacity-30' : 'opacity-50');
            $initScale = $diffFromCenter === 0 ? 1 : ($diffFromCenter === 1 ? 0.75 : 0.55);
            $initZ = 30 - $diffFromCenter * 5;
            $initX = ($imgIndex - $centerCardIndex) * 203;
            $initY = $diffFromCenter === 0 ? 0 : 26.75;
          @endphp
          <div class="mobile-biz-card absolute left-1/2 top-0 rounded-[12px] overflow-hidden cursor-pointer will-change-transform select-none bg-neutral-900 border border-neutral-200/50"
               data-index="{{ $imgIndex }}"
               style="width: 214px; height: 214px; transform: translateX(-50%) translate3d({{ $initX }}px, {{ $initY }}px, 0) scale({{ $initScale }}); z-index: {{ $initZ }}; transform-origin: top center;">
            <img class="w-full h-full object-cover object-center pointer-events-none" src="{{ $cUrl }}" alt="{{ $cAlt }}" loading="lazy">
            <div class="mobile-biz-overlay absolute inset-0 bg-white/40 pointer-events-none transition-opacity duration-300 {{ $overlayOpacity }}"></div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Mobile Business Dots Pagination (Thanh dots) -->
    <div class="mobile-biz-dots-wrap relative flex items-center justify-center gap-2 select-none z-30" id="mobile-biz-dots" style="margin-top: 26px; margin-bottom: 8px;">
      @for($i = 0; $i < $totalCards; $i++)
        <button type="button"
                class="mobile-biz-dot {{ $i === $centerCardIndex ? 'is-active' : '' }}"
                data-index="{{ $i }}"
                aria-label="Go to slide {{ $i + 1 }}"></button>
      @endfor
    </div>

  </div>

  <script>
    (function () {
      function initMobileBusiness() {
        var section = document.getElementById('mobile-business');
        if (!section || section.__mobileBusinessInitialized) return;
        section.__mobileBusinessInitialized = true;

        // 1. Badge Popovers Toggle
        var badgeItems = section.querySelectorAll('.business-badge-item');
        badgeItems.forEach(function (item) {
          var btn = item.querySelector('.mobile-biz-badge-trigger');
          if (!btn) return;
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var isOpen = item.classList.contains('is-open');
            badgeItems.forEach(function (other) {
              if (other !== item) {
                other.classList.remove('is-open');
                var otherBtn = other.querySelector('.mobile-biz-badge-trigger');
                if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
              }
            });
            if (isOpen) {
              item.classList.remove('is-open');
              btn.setAttribute('aria-expanded', 'false');
            } else {
              item.classList.add('is-open');
              btn.setAttribute('aria-expanded', 'true');
            }
          });
        });

        document.addEventListener('click', function (e) {
          if (!e.target.closest('#mobile-business .business-badge-item')) {
            badgeItems.forEach(function (item) {
              item.classList.remove('is-open');
              var btn = item.querySelector('.mobile-biz-badge-trigger');
              if (btn) btn.setAttribute('aria-expanded', 'false');
            });
          }
        });

        // 2. 3D Ellipse Carousel & Dots Pagination (Thanh dots)
        var stage = section.querySelector('#mobile-biz-stage');
        var cards = Array.from(section.querySelectorAll('.mobile-biz-card'));
        var dotsWrap = section.querySelector('#mobile-biz-dots') || section.querySelector('.mobile-biz-dots-wrap');
        var dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll('.mobile-biz-dot')) : [];

        var totalCards = cards.length;
        if (totalCards === 0) return;

        var maxIndex = Math.max(0, totalCards - 1);
        var defaultCenter = Math.floor(totalCards / 2);
        var activeIndex = defaultCenter;

        function updateCards(targetIdx) {
          var clampedIdx = Math.max(0, Math.min(maxIndex, targetIdx));
          var roundedIdx = Math.round(clampedIdx);

          // Update active dot in Thanh dots
          if (dots.length > 0) {
            dots.forEach(function (dot, idx) {
              if (idx === roundedIdx) {
                dot.classList.add('is-active');
                dot.setAttribute('aria-current', 'true');
              } else {
                dot.classList.remove('is-active');
                dot.removeAttribute('aria-current');
              }
            });
          }

          // Update 3D card layout according to media.svg geometry
          cards.forEach(function (card, idx) {
            var diff = idx - targetIdx;
            var absDiff = Math.abs(diff);

            // Step of 203px matching media.svg
            var x = diff * 203;
            // Vertical arc curve drop matching media.svg 26.75px
            var y = 26.75 * absDiff;
            // Scale: 1 for active center card, 0.75 for distance 1, 0.55 for distance 2
            var scale = absDiff === 0 ? 1 : Math.max(0.45, 0.75 - (absDiff - 1) * 0.15);
            var zIndex = Math.max(1, 30 - Math.round(absDiff * 5));
            var overlayOpacity = absDiff === 0 ? 0 : Math.min(0.45, 0.28 + absDiff * 0.1);
            var shadow = absDiff === 0
              ? '0 16px 32px -4px rgba(0,0,0,0.18), 0 4px 12px rgba(0,0,0,0.08)'
              : '0 4px 14px rgba(0,0,0,0.08)';

            card.style.zIndex = zIndex;
            card.style.boxShadow = shadow;
            card.style.transformOrigin = 'top center';
            card.style.transform = 'translateX(-50%) translate3d(' + x.toFixed(2) + 'px, ' + y.toFixed(2) + 'px, 0) scale(' + scale.toFixed(3) + ')';

            var overlay = card.querySelector('.mobile-biz-overlay');
            if (overlay) {
              overlay.style.opacity = overlayOpacity.toFixed(2);
            }
          });
        }

        // Tap card to select
        cards.forEach(function (card, idx) {
          card.addEventListener('click', function (e) {
            if (isDragging) return;
            if (idx !== activeIndex) {
              e.preventDefault();
              activeIndex = idx;
              updateCards(activeIndex);
            }
          });
        });

        // Touch & swipe handling on stage
        var isDragging = false;
        var startX = 0;
        var currentDragIndex = activeIndex;
        var dragStartTime = 0;

        function onTouchStart(e) {
          var clientX = e.touches ? e.touches[0].clientX : e.clientX;
          isDragging = true;
          startX = clientX;
          currentDragIndex = activeIndex;
          dragStartTime = Date.now();
          if (stage) stage.classList.add('is-dragging');
        }

        function onTouchMove(e) {
          if (!isDragging) return;
          var clientX = e.touches ? e.touches[0].clientX : e.clientX;
          var deltaX = clientX - startX;
          var fractionalStep = -deltaX / 203;
          var tempIndex = Math.max(-0.3, Math.min(maxIndex + 0.3, currentDragIndex + fractionalStep));
          updateCards(tempIndex);
        }

        function onTouchEnd(e) {
          if (!isDragging) return;
          isDragging = false;
          if (stage) stage.classList.remove('is-dragging');

          var clientX = e.changedTouches ? e.changedTouches[0].clientX : (e.clientX || startX);
          var deltaX = clientX - startX;
          var elapsed = Date.now() - dragStartTime;

          if (Math.abs(deltaX) > 35 || (Math.abs(deltaX) > 15 && elapsed < 250)) {
            if (deltaX < 0) {
              activeIndex = Math.min(maxIndex, activeIndex + 1);
            } else {
              activeIndex = Math.max(0, activeIndex - 1);
            }
          }
          updateCards(activeIndex);
        }

        if (stage) {
          stage.addEventListener('touchstart', onTouchStart, { passive: true });
          stage.addEventListener('touchmove', onTouchMove, { passive: true });
          stage.addEventListener('touchend', onTouchEnd);
          stage.addEventListener('touchcancel', onTouchEnd);
        }

        // Dots click & scrub handling (Thanh dots)
        if (dotsWrap && dots.length > 0) {
          dots.forEach(function (dot) {
            dot.addEventListener('click', function (e) {
              e.preventDefault();
              e.stopPropagation();
              var target = parseInt(dot.getAttribute('data-index'), 10);
              if (!isNaN(target)) {
                activeIndex = target;
                updateCards(activeIndex);
              }
            });
          });

          var isDotsDragging = false;
          var dotsRect = null;

          function handleDotsInput(clientX) {
            if (!dotsRect) dotsRect = dotsWrap.getBoundingClientRect();
            var clickX = clientX - dotsRect.left;
            var fraction = Math.max(0, Math.min(1, clickX / dotsRect.width));
            var targetIdx = Math.round(fraction * maxIndex);
            if (targetIdx !== activeIndex) {
              activeIndex = targetIdx;
              updateCards(activeIndex);
            }
          }

          dotsWrap.addEventListener('touchstart', function (e) {
            isDotsDragging = true;
            dotsRect = dotsWrap.getBoundingClientRect();
            var clientX = e.touches[0].clientX;
            handleDotsInput(clientX);
          }, { passive: true });

          window.addEventListener('touchmove', function (e) {
            if (!isDotsDragging || !dotsRect) return;
            var clientX = e.touches[0].clientX;
            handleDotsInput(clientX);
          }, { passive: true });

          window.addEventListener('touchend', function () {
            isDotsDragging = false;
            dotsRect = null;
          });
        }
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileBusiness);
      } else {
        initMobileBusiness();
      }
    })();
  </script>
</section>
