@php
  $word1 = $settings['heading_word1'] ?? 'OUR';
  $word2 = rtrim($settings['heading_word2'] ?? 'CLIENTS', '.');
  $badgeText = !empty($settings['badge_text']) ? $settings['badge_text'] : ('[ ' . trim($word1 . ' ' . $word2) . ' ]');

  $defaultCards = [
    [
      'card_id' => 'asian-smes',
      'title' => 'Asian SMEs',
      'description' => "Established businesses looking for customers, distributors or partners in Vietnam.",
      'image' => 'themes/inbetween_v2/images/client-asian-smes.png',
    ],
    [
      'card_id' => 'founders',
      'title' => "Founders &\nEntrepreneurs",
      'description' => "Building, testing or launching their business in the market.",
      'image' => 'themes/inbetween_v2/images/client-founders.png',
    ],
    [
      'card_id' => 'regional-teams',
      'title' => 'Regional Teams',
      'description' => "Companies operating across Asia that need additional Vietnam capacity.",
      'image' => 'themes/inbetween_v2/images/client-regional-teams.png',
    ],
  ];
  $clientCards = !empty($settings['client_cards']) && is_array($settings['client_cards']) ? array_values($settings['client_cards']) : $defaultCards;
  $totalCards = count($clientCards);

  // Normalized cards for consistent rendering and JS interaction
  $normalizedCards = array_map(function($c) {
    $rawImg = is_array($c['image'] ?? null) ? ($c['image']['url'] ?? '') : ($c['image'] ?? '');
    $imgUrl = !empty($rawImg) ? (str_starts_with($rawImg, 'http') || str_starts_with($rawImg, '/') ? $rawImg : asset($rawImg)) : '';
    $rawTitle = str_replace(["\r\n", "\r", "\n"], ' ', (string)($c['title'] ?? ''));
    return [
      'card_id' => (string)($c['card_id'] ?? ''),
      'title' => strtoupper($rawTitle),
      'description' => (string)($c['description'] ?? ''),
      'image' => $imgUrl,
    ];
  }, $clientCards);

  $thumb1Idx = $totalCards > 1 ? 1 : 0;
  $thumb2Idx = $totalCards > 2 ? 2 : ($totalCards > 1 ? 0 : 0);
  $prevIdx = $totalCards > 1 ? ($totalCards - 1) : 0;
@endphp

<style>
  /* ===== MOBILE OUR CLIENTS (PIXEL-PERFECT REPLICA OF CLIENT.SVG) ===== */
  #mobile-our-clients {
    position: relative !important;
    width: 100% !important;
    background-color: #131313 !important;
    color: #ffffff !important;
    padding: 20px 0 !important;
    overflow: hidden !important;
    user-select: text;
    box-sizing: border-box;
    scroll-margin-top: 60px;
  }

  .mobile-clients-viewport {
    position: relative !important;
    width: 100% !important;
    max-width: 440px !important;
    height: 370px;
    margin: 0 auto !important;
    overflow: hidden !important;
    display: flex !important;
    justify-content: center !important;
    align-items: flex-start !important;
  }

  #mobile-clients-frame {
    position: relative !important;
    width: 440px !important;
    height: 370px !important;
    flex-shrink: 0 !important;
    background-color: #131313 !important;
    overflow: hidden !important;
    user-select: none;
    box-sizing: border-box;
    transform-origin: top center !important;
  }

  /* 1. Left Featured Active Card (client.svg: x=34.73, y=26, w=174, h=318, rx=4) */
  #mobile-our-clients .mobile-client-active-card {
    position: absolute !important;
    top: 26px !important;
    left: 34.73px !important;
    width: 174px !important;
    height: 318px !important;
    border-radius: 4px !important;
    overflow: hidden !important;
    background-color: #1a1a1a !important;
    box-shadow: 0 16px 36px -6px rgba(0, 0, 0, 0.5) !important;
    z-index: 10 !important;
  }

  #mobile-our-clients .mobile-client-active-card img {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.45s cubic-bezier(0.16, 1, 0.3, 1) !important;
    pointer-events: none;
  }

  /* 2. Right Top Info Area (client.svg: x=226, y=33) */
  #mobile-our-clients .mobile-client-info-wrap {
    position: absolute !important;
    top: 33px !important;
    left: 231.73px !important;
    width: 195px !important;
    z-index: 10 !important;
    pointer-events: none;
    box-sizing: border-box;
  }

  #mobile-our-clients .mobile-client-badge {
    font-size: 11px !important;
    font-weight: 500 !important;
    color: #F6F2EF !important;
    text-transform: uppercase !important;
    letter-spacing: 0.12em !important;
    line-height: 1 !important;
    margin-bottom: 14px !important;
    font-family: inherit;
  }

  #mobile-our-clients .mobile-client-text-stack {
    position: relative !important;
    width: 100% !important;
    min-height: 105px !important;
  }

  #mobile-our-clients .mobile-client-text-item {
    transition: opacity 0.35s ease-out, transform 0.35s ease-out !important;
  }

  #mobile-our-clients .mobile-client-text-item.is-active {
    position: relative !important;
    opacity: 1 !important;
    transform: translateY(0) !important;
    pointer-events: auto !important;
    z-index: 10 !important;
  }

  #mobile-our-clients .mobile-client-text-item.is-inactive {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    opacity: 0 !important;
    transform: translateY(6px) !important;
    pointer-events: none !important;
    z-index: 0 !important;
  }

  #mobile-our-clients .mobile-client-title {
    font-size: 20px !important;
    font-weight: 700 !important;
    color: #EC460B !important;
    line-height: 1.15 !important;
    text-transform: uppercase !important;
    letter-spacing: -0.01em !important;
    margin: 0 0 12px 0 !important;
    padding: 0 !important;
    font-family: inherit;
  }

  #mobile-our-clients .mobile-client-desc {
    margin: 0 !important;
    padding: 0 !important;
    font-size: 11.5px !important;
    font-weight: 400 !important;
    color: #F6F2EF !important;
    line-height: 1.45 !important;
    max-width: 185px !important;
    font-family: inherit;
  }

  /* 3. Left Peek Thumbnail (client.svg: x=-85.27, y=185, w=97, h=159, rx=4) */
  #mobile-our-clients .mobile-client-peek-prev {
    position: absolute !important;
    top: 185px !important;
    left: -85.27px !important;
    width: 97px !important;
    height: 159px !important;
    border-radius: 4px !important;
    overflow: hidden !important;
    background-color: #1a1a1a !important;
    cursor: pointer !important;
    border: none !important;
    padding: 0 !important;
    margin: 0 !important;
    outline: none !important;
    z-index: 20 !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35) !important;
    transition: transform 0.2s ease, opacity 0.2s ease !important;
  }

  #mobile-our-clients .mobile-client-peek-prev:hover {
    transform: scale(1.02) !important;
  }

  #mobile-our-clients .mobile-client-peek-prev img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    opacity: 0.8 !important;
    display: block !important;
    pointer-events: none;
  }

  /* 4. Right Bottom Thumbnails (client.svg: x=231.73 and x=351.73, y=185, w=97, h=159, rx=4, gap=23) */
  #mobile-our-clients .mobile-client-thumbs-row {
    position: absolute !important;
    top: 185px !important;
    left: 231.73px !important;
    height: 159px !important;
    display: flex !important;
    align-items: center !important;
    gap: 23px !important;
    z-index: 20 !important;
    margin: 0 !important;
    padding: 0 !important;
  }

  #mobile-our-clients .mobile-client-thumb-item {
    position: relative !important;
    width: 97px !important;
    height: 159px !important;
    border-radius: 4px !important;
    overflow: hidden !important;
    background-color: #1a1a1a !important;
    cursor: pointer !important;
    border: none !important;
    padding: 0 !important;
    margin: 0 !important;
    outline: none !important;
    flex-shrink: 0 !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.35) !important;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease !important;
  }

  #mobile-our-clients .mobile-client-thumb-item:hover {
    transform: scale(1.03) !important;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5) !important;
  }

  #mobile-our-clients .mobile-client-thumb-item:active {
    transform: scale(0.97) !important;
  }

  #mobile-our-clients .mobile-client-thumb-item img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    transition: transform 0.3s ease !important;
    pointer-events: none;
    display: block !important;
  }

  #mobile-our-clients .mobile-client-thumb-item:hover img {
    transform: scale(1.05) !important;
  }

  #mobile-our-clients .mobile-client-thumb-overlay {
    position: absolute !important;
    inset: 0 !important;
    background-color: rgba(0, 0, 0, 0.15) !important;
    transition: background-color 0.2s ease !important;
    pointer-events: none;
  }

  #mobile-our-clients .mobile-client-thumb-item:hover .mobile-client-thumb-overlay {
    background-color: transparent !important;
  }
</style>

<section id="mobile-our-clients" data-section="inbetween-our-clients" aria-label="Our Clients - Mobile">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-our-clients" style="position: absolute; top: -65px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>

  <div class="mobile-clients-viewport">
    <div id="mobile-clients-frame">
      
      {{-- 1. Left Featured Active Card (client.svg: x=34.73, y=26, w=174, h=318, rx=4) --}}
      <div class="mobile-client-active-card">
        @foreach($normalizedCards as $idx => $card)
          <img class="mobile-client-big-img"
               src="{{ $card['image'] }}"
               alt="{{ $card['title'] }}"
               data-client-idx="{{ $idx }}"
               style="opacity: {{ $idx === 0 ? '1' : '0' }}; z-index: {{ $idx === 0 ? '10' : '0' }}; transform: scale({{ $idx === 0 ? '1' : '1.04' }});"
               loading="{{ $idx === 0 ? 'eager' : 'lazy' }}">
        @endforeach
      </div>

      {{-- 2. Right Top: Tagline, Title and Description (client.svg: x=226, y=33) --}}
      <div class="mobile-client-info-wrap">
        {{-- Badge: [ OUR CLIENTS ] --}}
        <div class="mobile-client-badge">
          {{ $badgeText }}
        </div>

        {{-- Dynamic Title & Description Stack --}}
        <div class="mobile-client-text-stack">
          @foreach($normalizedCards as $idx => $card)
            <div class="mobile-client-text-item {{ $idx === 0 ? 'is-active' : 'is-inactive' }}"
                 data-client-idx="{{ $idx }}">
              <h3 class="mobile-client-title">
                {{ $card['title'] }}
              </h3>
              <p class="mobile-client-desc">
                {{ $card['description'] }}
              </p>
            </div>
          @endforeach
        </div>
      </div>

      {{-- 3. Far Left Peek (client.svg: x=-85.27, y=185, w=97, h=159, rx=4) --}}
      <button type="button" 
              id="mobile-client-thumb-prev" 
              class="mobile-client-peek-prev"
              data-target-idx="{{ $prevIdx }}"
              aria-label="Previous client">
        <img id="mobile-client-thumb-prev-img" 
             src="{{ $normalizedCards[$prevIdx]['image'] ?? '' }}" 
             alt="{{ $normalizedCards[$prevIdx]['title'] ?? '' }}">
        <div class="mobile-client-thumb-overlay"></div>
      </button>

      {{-- 4. Right Bottom Thumbnails (client.svg: x=231.73 and x=351.73, y=185, w=97, h=159, rx=4, gap=23) --}}
      <div class="mobile-client-thumbs-row">
        <!-- Thumb 1 -->
        <button type="button" 
                id="mobile-client-thumb-1" 
                class="mobile-client-thumb-item"
                data-target-idx="{{ $thumb1Idx }}"
                aria-label="View {{ $normalizedCards[$thumb1Idx]['title'] ?? '' }}">
          <img id="mobile-client-thumb-1-img" 
               src="{{ $normalizedCards[$thumb1Idx]['image'] ?? '' }}" 
               alt="{{ $normalizedCards[$thumb1Idx]['title'] ?? '' }}">
          <div class="mobile-client-thumb-overlay"></div>
        </button>

        <!-- Thumb 2 -->
        <button type="button" 
                id="mobile-client-thumb-2" 
                class="mobile-client-thumb-item"
                data-target-idx="{{ $thumb2Idx }}"
                aria-label="View {{ $normalizedCards[$thumb2Idx]['title'] ?? '' }}">
          <img id="mobile-client-thumb-2-img" 
               src="{{ $normalizedCards[$thumb2Idx]['image'] ?? '' }}" 
               alt="{{ $normalizedCards[$thumb2Idx]['title'] ?? '' }}">
          <div class="mobile-client-thumb-overlay"></div>
        </button>
      </div>

    </div>
  </div>

  <script>
    (function () {
      function initMobileClients() {
        var section = document.getElementById('mobile-our-clients');
        var frame = document.getElementById('mobile-clients-frame');
        var viewport = section ? section.querySelector('.mobile-clients-viewport') : null;
        if (!frame || !viewport || frame.__mobileClientsInit) return;
        frame.__mobileClientsInit = true;

        // Auto responsive proportional scaling (fits 320px to 440px+ seamlessly)
        function fitScale() {
          var containerW = section.clientWidth || window.innerWidth || 440;
          var scale = Math.min(1, containerW / 440);
          frame.style.transform = 'scale(' + scale + ')';
          viewport.style.height = (370 * scale) + 'px';
        }

        fitScale();
        window.addEventListener('resize', fitScale, { passive: true });
        window.addEventListener('orientationchange', fitScale, { passive: true });

        var cards = @json($normalizedCards);
        var total = cards.length;
        if (total <= 1) return;

        var currentIdx = 0;
        var bigImgs = frame.querySelectorAll('.mobile-client-big-img');
        var textItems = frame.querySelectorAll('.mobile-client-text-item');

        var prevBtn = document.getElementById('mobile-client-thumb-prev');
        var prevImg = document.getElementById('mobile-client-thumb-prev-img');

        var thumb1Btn = document.getElementById('mobile-client-thumb-1');
        var thumb1Img = document.getElementById('mobile-client-thumb-1-img');

        var thumb2Btn = document.getElementById('mobile-client-thumb-2');
        var thumb2Img = document.getElementById('mobile-client-thumb-2-img');

        function updateActiveClient(idx) {
          idx = (idx % total + total) % total;
          if (idx === currentIdx) return;
          currentIdx = idx;

          // 1. Update big images
          bigImgs.forEach(function (img) {
            var i = parseInt(img.getAttribute('data-client-idx'), 10);
            if (i === currentIdx) {
              img.style.opacity = '1';
              img.style.zIndex = '10';
              img.style.transform = 'scale(1)';
            } else {
              img.style.opacity = '0';
              img.style.zIndex = '0';
              img.style.transform = 'scale(1.04)';
            }
          });

          // 2. Update text items
          textItems.forEach(function (item) {
            var i = parseInt(item.getAttribute('data-client-idx'), 10);
            if (i === currentIdx) {
              item.classList.remove('is-inactive');
              item.classList.add('is-active');
            } else {
              item.classList.remove('is-active');
              item.classList.add('is-inactive');
            }
          });

          // 3. Update thumbnails
          var next1 = (currentIdx + 1) % total;
          var next2 = (currentIdx + 2) % total;
          var prev = (currentIdx - 1 + total) % total;

          if (thumb1Btn && thumb1Img && cards[next1]) {
            thumb1Btn.setAttribute('data-target-idx', next1);
            thumb1Btn.setAttribute('aria-label', 'View ' + cards[next1].title);
            thumb1Img.src = cards[next1].image;
            thumb1Img.alt = cards[next1].title;
          }

          if (thumb2Btn && thumb2Img && cards[next2]) {
            thumb2Btn.setAttribute('data-target-idx', next2);
            thumb2Btn.setAttribute('aria-label', 'View ' + cards[next2].title);
            thumb2Img.src = cards[next2].image;
            thumb2Img.alt = cards[next2].title;
          }

          if (prevBtn && prevImg && cards[prev]) {
            prevBtn.setAttribute('data-target-idx', prev);
            prevImg.src = cards[prev].image;
            prevImg.alt = cards[prev].title;
          }
        }

        if (thumb1Btn) {
          thumb1Btn.addEventListener('click', function () {
            var target = parseInt(thumb1Btn.getAttribute('data-target-idx'), 10);
            updateActiveClient(target);
          });
        }

        if (thumb2Btn) {
          thumb2Btn.addEventListener('click', function () {
            var target = parseInt(thumb2Btn.getAttribute('data-target-idx'), 10);
            updateActiveClient(target);
          });
        }

        if (prevBtn) {
          prevBtn.addEventListener('click', function () {
            var target = parseInt(prevBtn.getAttribute('data-target-idx'), 10);
            updateActiveClient(target);
          });
        }

        // Touch swipe gestures
        var touchStartX = 0;
        var touchStartY = 0;
        frame.addEventListener('touchstart', function (e) {
          if (e.touches && e.touches.length === 1) {
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
          }
        }, { passive: true });

        frame.addEventListener('touchend', function (e) {
          if (!touchStartX) return;
          var diffX = e.changedTouches[0].clientX - touchStartX;
          var diffY = e.changedTouches[0].clientY - touchStartY;
          touchStartX = 0;
          touchStartY = 0;

          if (Math.abs(diffX) > 35 && Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX < 0) {
              updateActiveClient(currentIdx + 1);
            } else {
              updateActiveClient(currentIdx - 1);
            }
          }
        }, { passive: true });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileClients);
      } else {
        initMobileClients();
      }
    })();
  </script>
</section>
