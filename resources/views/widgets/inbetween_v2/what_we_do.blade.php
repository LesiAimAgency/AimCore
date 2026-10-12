<section class="inbetween-onepage-section relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#F6F4F4] text-[#131313] py-8 sm:py-10 lg:py-0" id="inbetween-what-we-do" aria-label="What We Do">
  <div class="inbetween-container-1440 relative z-10 pb-4 sm:pb-6 lg:pb-3">
    <div class="w-full shrink-0 pt-2 sm:pt-0">
      <div class="text-[12px] sm:text-[13px] xl:text-[14px] font-light text-[#3E3939] uppercase tracking-widest pb-1.5 sm:pb-2.5">{{ $settings['badge_text'] ?? '[ WHAT WE DO ]' }}</div>
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-3 lg:gap-6 xl:gap-12">
        <div class="w-full max-w-[560px] xl:max-w-[650px] shrink-1 min-w-0">
          <h2 class="text-[28px] sm:text-[34px] lg:text-[clamp(28px,2.4vw,42px)] xl:text-[49px] font-semibold tracking-normal leading-[1.12]">
            <span class="text-[#EC460B] block">{{ $settings['title_line1'] ?? 'Flexible local support,' }}</span>
            <span class="text-[#131313] block">{{ $settings['title_line2'] ?? 'built around what you need.' }}</span>
          </h2>
        </div>
        <div class="w-full lg:w-auto max-w-[400px] xl:max-w-[460px] shrink-0 space-y-2 sm:space-y-2.5 xl:space-y-3.5 pt-0.5 xl:pt-1">
          <p class="text-[13px] sm:text-[14px] xl:text-[16px] font-light text-[#3E3939] leading-relaxed tracking-normal">{!! $settings['description'] ?? '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.' !!}</p>
          <div class="pt-0.5">
            <a class="business-btn-talk inline-flex items-center justify-between w-[255px] xl:w-[295px] max-w-full h-[42px] xl:h-[48px] pl-5 xl:pl-7 pr-2 rounded-full bg-[#131313] text-white text-[14px] xl:text-[16px] font-medium tracking-normal hover:bg-[#2B2B2B] transition-colors duration-300 shadow-sm group shrink-0 select-none whitespace-nowrap cursor-pointer pointer-events-auto" href="{{ (!empty($settings['cta_link']) && $settings['cta_link'] !== '#inbetween-founder') ? $settings['cta_link'] : '#contact-modal' }}" data-contact-modal-toggle title="{{ $settings['cta_text'] ?? 'Talk to us' }}">
              <span class="text-[14px] xl:text-[16px] font-medium text-[#F6F4F4] whitespace-nowrap">{{ $settings['cta_text'] ?? 'Talk to us' }}</span>
              <span class="w-[40px] xl:w-[48px] h-[28px] xl:h-[32px] rounded-[16px] bg-[#F6F4F4] text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                <svg class="w-3.5 h-3.5 xl:w-4 xl:h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="#131313" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    @php
      $defaultCards = [
        [
          'card_id' => 'find',
          'badge' => 'FIND',
          'title' => 'Market & Opportunity Development',
          'description' => 'Identify priority sectors, companies, decision-makers, distributors and commercial opportunities.',
          'active_image' => 'themes/inbetween_v2/images/what-we-do-magnifier.png',
          'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
        ],
        [
          'card_id' => 'connect',
          'badge' => 'CONNECT',
          'title' => 'Strategic Partnerships & Networking',
          'description' => 'Connect directly with local key stakeholders, industry associations, and verified commercial partners.',
          'active_image' => 'themes/inbetween_v2/images/what-we-do-chain.png',
          'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
        ],
        [
          'card_id' => 'execute',
          'badge' => 'EXECUTE',
          'title' => 'Market Entry & Operational Setup',
          'description' => 'End-to-end execution of operational roadmaps, pilot testing, and localized compliance support.',
          'active_image' => 'themes/inbetween_v2/images/what-we-do-gears.png',
          'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
        ],
        [
          'card_id' => 'grow',
          'badge' => 'GROW',
          'title' => 'Scale & Long-term Expansion',
          'description' => 'Accelerate revenue pipelines, expand regional presence, and build sustainable local capabilities.',
          'active_image' => 'themes/inbetween_v2/images/what-we-do-arrow.png',
          'sand_image' => 'themes/inbetween_v2/images/what-we-do-sand-waves.jpg',
        ],
      ];
      $cards = !empty($settings['cards']) && is_array($settings['cards']) ? array_values($settings['cards']) : $defaultCards;
    @endphp
    <div class="inbetween-accordion-container flex flex-col lg:flex-row items-stretch gap-3 sm:gap-4 lg:gap-4 xl:gap-5 w-full mt-3 lg:mt-5 xl:mt-8 mb-auto">
      @foreach($cards as $index => $card)
        @php
          $cardSlug = !empty($card['card_id']) ? \Illuminate\Support\Str::slug($card['card_id']) : \Illuminate\Support\Str::slug($card['badge'] ?? 'item-'.$index);
          if (empty($cardSlug)) { $cardSlug = 'item-'.$index; }
          $isActive = ($index === 0);
          $sandRaw = is_array($card['sand_image'] ?? null) ? ($card['sand_image']['url'] ?? '') : ($card['sand_image'] ?? '');
          $sandImgUrl = !empty($sandRaw) ? (str_starts_with($sandRaw, 'http') || str_starts_with($sandRaw, '/') ? $sandRaw : asset($sandRaw)) : asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg');
          $activeRaw = is_array($card['active_image'] ?? null) ? ($card['active_image']['url'] ?? '') : ($card['active_image'] ?? '');
          $activeImgUrl = !empty($activeRaw) ? (str_starts_with($activeRaw, 'http') || str_starts_with($activeRaw, '/') ? $activeRaw : asset($activeRaw)) : asset('themes/inbetween_v2/images/what-we-do-magnifier.png');
          $badge = $card['badge'] ?? strtoupper($cardSlug);
          $title = $card['title'] ?? '';
          $desc = $card['description'] ?? '';
        @endphp
        <div class="inbetween-card inbetween-card-{{ $cardSlug }} {{ $isActive ? 'inbetween-card-active' : 'inbetween-card-collapsed' }}" id="card-{{ $cardSlug }}" data-card-id="{{ $cardSlug }}">
          <img class="inbetween-card-bg-sand" src="{{ $sandImgUrl }}" alt="{{ $title }} Pattern">
          <img class="inbetween-card-bg-active" src="{{ $activeImgUrl }}" alt="{{ $title }}">
          <div class="inbetween-card-active-content">
            <div class="text-[30px] sm:text-[38px] lg:text-[clamp(30px,3vw,48px)] xl:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">
              {{ $badge }}
            </div>
            <div class="space-y-1.5 xl:space-y-2 max-w-[500px]">
              <h3 class="text-[17px] sm:text-[20px] lg:text-[clamp(17px,1.5vw,25px)] xl:text-[31px] font-medium text-white leading-snug tracking-normal">
                {{ $title }}
              </h3>
              <p class="text-[12px] sm:text-[13px] lg:text-[clamp(12px,0.9vw,14px)] xl:text-[16px] font-normal text-white/95 leading-normal tracking-normal line-clamp-3 xl:line-clamp-none">
                {{ $desc }}
              </p>
            </div>
          </div>
          <div class="inbetween-card-collapsed-content">
            <div class="hidden lg:flex items-center justify-center w-full h-full select-none">
              <span class="inbetween-vertical-title text-[18px] lg:text-[clamp(18px,1.5vw,26px)] xl:text-[32px]">{{ $badge }}</span>
            </div>
            <div class="lg:hidden flex items-center justify-between w-full p-4">
              <span class="text-[20px] font-semibold uppercase tracking-wider text-white">{{ $badge }}</span>
              <span class="text-[12px] font-light text-white/80">Click to expand &rsaquo;</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
