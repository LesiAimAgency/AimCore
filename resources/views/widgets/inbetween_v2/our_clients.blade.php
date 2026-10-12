<section class="inbetween-onepage-section relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#131313] text-white" id="inbetween-our-clients" aria-label="Inbetween Clients - Our Clients">
  <div class="inbetween-container-1440 our-clients-stage w-full h-full relative z-10">
    @php
      $defaultCards = [
        [
          'card_id' => 'asian-smes',
          'title' => 'Asian SMEs',
          'description' => "Established businesses looking\nfor customers, distributors or\npartners in Vietnam.",
          'image' => 'themes/inbetween_v2/images/client-asian-smes.png',
        ],
        [
          'card_id' => 'founders',
          'title' => "Founders &\nEntrepreneurs",
          'description' => "Building, testing or launching\ntheir business in the market.",
          'image' => 'themes/inbetween_v2/images/client-founders.png',
        ],
        [
          'card_id' => 'regional-teams',
          'title' => 'Regional Teams',
          'description' => "Companies operating across\nAsia that need additional\nVietnam capacity.",
          'image' => 'themes/inbetween_v2/images/client-regional-teams.png',
        ],
      ];
      $clientCards = !empty($settings['client_cards']) && is_array($settings['client_cards']) ? array_values($settings['client_cards']) : $defaultCards;
    @endphp
    <div class="our-clients-grid w-full h-full flex flex-col lg:flex-row items-stretch">
      <div class="our-clients-col-title w-full lg:w-1/4 h-auto lg:h-full shrink-0 flex flex-col justify-center pl-6 sm:pl-10 lg:pl-10 xl:pl-16 2xl:pl-[96px] pr-4 sm:pr-6 lg:pr-8 pt-[95px] sm:pt-[72px] lg:pt-0 pb-6 lg:pb-0 z-20 bg-[#131313]">
        <h2 class="our-clients-heading flex flex-col select-none"><span class="our-clients-word-our text-[36px] sm:text-[48px] lg:text-[61px] font-semibold text-[#F6F4F4] leading-none tracking-normal">{{ $settings['heading_word1'] ?? 'OUR' }}</span><span class="our-clients-word-clients text-[36px] sm:text-[48px] lg:text-[61px] font-semibold text-[#EC460B] leading-none tracking-normal pt-2 sm:pt-3 lg:pt-[19px]">{{ $settings['heading_word2'] ?? 'CLIENTS.' }}</span></h2>

        {{-- Swiper navigation controls --}}
        <div class="our-clients-nav flex items-center gap-3 pt-6 sm:pt-8 lg:pt-10 z-30 select-none">
          <button type="button" class="our-clients-nav-prev our-clients-title-prev w-10 h-10 rounded-full border border-neutral-700/80 text-neutral-300 hover:text-white hover:border-[#EC460B] hover:bg-[#EC460B]/15 flex items-center justify-center transition-all duration-300 disabled:opacity-20 disabled:pointer-events-none cursor-pointer focus:outline-none" aria-label="Previous slide">
            <i class="fa-solid fa-arrow-left text-sm"></i>
          </button>
          <button type="button" class="our-clients-nav-next our-clients-title-next w-10 h-10 rounded-full border border-neutral-700/80 text-neutral-300 hover:text-white hover:border-[#EC460B] hover:bg-[#EC460B]/15 flex items-center justify-center transition-all duration-300 disabled:opacity-20 disabled:pointer-events-none cursor-pointer focus:outline-none" aria-label="Next slide">
            <i class="fa-solid fa-arrow-right text-sm"></i>
          </button>
          <div class="our-clients-pagination flex items-center gap-1.5 pl-2"></div>
        </div>
      </div>

      <div class="our-clients-swiper-container w-full lg:w-3/4 flex-1 h-full min-w-0 relative overflow-hidden">
        <div class="swiper our-clients-swiper w-full h-full">
          <div class="swiper-wrapper h-full">
            @foreach($clientCards as $cIndex => $card)
              @php
                $cardSlug = !empty($card['card_id']) ? \Illuminate\Support\Str::slug($card['card_id']).'-'.$cIndex : 'card-'.$cIndex;
                $cardImgRaw = is_array($card['image'] ?? null) ? ($card['image']['url'] ?? '') : ($card['image'] ?? '');
                $cImg = !empty($cardImgRaw) ? (str_starts_with($cardImgRaw, 'http') || str_starts_with($cardImgRaw, '/') ? $cardImgRaw : asset($cardImgRaw)) : '';
                $cTitle = $card['title'] ?? '';
                $cDesc = $card['description'] ?? '';
              @endphp
              <div class="swiper-slide h-full">
                <div class="our-clients-card group relative w-full h-full min-h-[380px] lg:min-h-0 overflow-hidden flex flex-col justify-between cursor-grab active:cursor-grabbing border-t lg:border-t-0 lg:border-l border-neutral-800/30" id="client-card-{{ $cardSlug }}">
                  @if($cImg)
                    <img class="clients-card-bg absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105" src="{{ $cImg }}" alt="{{ $cTitle }}" loading="lazy">
                  @endif
                  <div class="clients-card-overlay absolute inset-0 pointer-events-none transition-opacity duration-300"></div>
                  <div class="clients-card-top relative z-10 pt-[24px] sm:pt-[40px] lg:pt-[104px] px-6 sm:px-7 lg:px-[28px]">
                    <h3 class="clients-card-title text-[22px] sm:text-[26px] lg:text-[31px] font-medium text-[#EC460B] tracking-normal leading-[1.15]">
                      <span class="block">{!! nl2br(e($cTitle)) !!}</span>
                    </h3>
                  </div>
                  <div class="clients-card-bottom relative z-10 pb-[28px] sm:pb-[48px] lg:pb-[94px] px-6 sm:px-7 lg:px-[28px]">
                    <p class="clients-card-desc text-[14px] sm:text-[16px] lg:text-[20px] font-normal text-white leading-[1.4] max-w-[280px]">
                      {!! nl2br(e($cDesc)) !!}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Floating Next & Prev Buttons on the right and left edges of the Swiper --}}
        <button type="button" class="our-clients-nav-prev our-clients-float-prev absolute left-3 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-neutral-900/80 border border-neutral-700/80 text-white/90 hover:text-white hover:bg-[#EC460B] hover:border-[#EC460B] hover:scale-105 flex items-center justify-center transition-all duration-300 shadow-xl backdrop-blur-sm cursor-pointer disabled:opacity-0 disabled:pointer-events-none opacity-0 pointer-events-none" aria-label="Previous slide">
          <i class="fa-solid fa-chevron-left text-sm"></i>
        </button>
        <button type="button" class="our-clients-nav-next our-clients-float-next absolute right-3 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-neutral-900/80 border border-neutral-700/80 text-white/90 hover:text-white hover:bg-[#EC460B] hover:border-[#EC460B] hover:scale-105 flex items-center justify-center transition-all duration-300 shadow-xl backdrop-blur-sm cursor-pointer disabled:opacity-0 disabled:pointer-events-none opacity-0 pointer-events-none" aria-label="Next slide">
          <i class="fa-solid fa-chevron-right text-sm"></i>
        </button>
      </div>
    
    </div>
  </div>

  <script>
    (function () {
      function initOurClientsSwiper() {
        var section = document.getElementById('inbetween-our-clients');
        if (!section) return;
        var swiperEl = section.querySelector('.our-clients-swiper');
        if (!swiperEl) return;
        if (swiperEl.__clientsSwiperInstance) {
          swiperEl.__clientsSwiperInstance.update();
          return;
        }

        if (typeof Swiper === 'undefined') {
          setTimeout(initOurClientsSwiper, 80);
          return;
        }

        var swiperInstance = new Swiper(swiperEl, {
          slidesPerView: 1,
          spaceBetween: 0,
          speed: 550,
          grabCursor: true,
          watchOverflow: true,
          observer: true,
          observeParents: true,
          watchSlidesProgress: true,
          pagination: {
            el: section.querySelector('.our-clients-pagination'),
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + ' our-clients-bullet inline-block w-2 h-2 rounded-full bg-neutral-600 hover:bg-[#EC460B] transition-all duration-300 cursor-pointer"></span>';
            },
          },
          breakpoints: {
            640: {
              slidesPerView: 2,
              spaceBetween: 0,
            },
            1024: {
              slidesPerView: 3,
              spaceBetween: 0,
            },
          },
          on: {
            init: function () {
              updateControls(this);
            },
            slideChange: function () {
              updateControls(this);
            },
            resize: function () {
              updateControls(this);
            },
            update: function () {
              updateControls(this);
            },
          },
        });

        swiperEl.__clientsSwiperInstance = swiperInstance;

        function updateControls(swiper) {
          var isBeginning = swiper.isBeginning;
          var isEnd = swiper.isEnd;
          var isLocked = swiper.isLocked;

          var prevBtns = section.querySelectorAll('.our-clients-nav-prev');
          var nextBtns = section.querySelectorAll('.our-clients-nav-next');
          var navBlock = section.querySelector('.our-clients-nav');

          if (isLocked) {
            if (navBlock) navBlock.style.display = 'none';
            prevBtns.forEach(function (b) {
              b.style.display = 'none';
            });
            nextBtns.forEach(function (b) {
              b.style.display = 'none';
            });
          } else {
            if (navBlock) navBlock.style.display = 'flex';
            prevBtns.forEach(function (b) {
              b.style.display = '';
              b.disabled = isBeginning;
              if (b.classList.contains('our-clients-float-prev')) {
                b.style.opacity = isBeginning ? '0' : '1';
                b.style.pointerEvents = isBeginning ? 'none' : 'auto';
              }
            });
            nextBtns.forEach(function (b) {
              b.style.display = '';
              b.disabled = isEnd;
              if (b.classList.contains('our-clients-float-next')) {
                b.style.opacity = isEnd ? '0' : '1';
                b.style.pointerEvents = isEnd ? 'none' : 'auto';
              }
            });
          }
        }

        section.querySelectorAll('.our-clients-nav-prev').forEach(function (btn) {
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            swiperInstance.slidePrev();
          });
        });

        section.querySelectorAll('.our-clients-nav-next').forEach(function (btn) {
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            swiperInstance.slideNext();
          });
        });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOurClientsSwiper);
      } else {
        initOurClientsSwiper();
      }
      window.addEventListener('load', initOurClientsSwiper);
    })();
  </script>
</section>
