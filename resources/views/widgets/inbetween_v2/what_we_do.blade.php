<section class="inbetween-onepage-section relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#F6F4F4] text-[#131313] py-8 sm:py-10 lg:py-0" id="inbetween-what-we-do">
  <div class="inbetween-container-1440 relative z-10 pb-4 sm:pb-6 lg:pb-3">
    <div class="w-full shrink-0 pt-4 sm:pt-0 lg:pt-[32px]">
      <div class="text-[14px] font-light text-[#3E3939] uppercase tracking-widest " style="padding: 44px 0 12px 0;">{{ $settings['badge_text'] ?? '[ WHAT WE DO ]' }}</div>
      <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4 lg:gap-12">
        <div class="w-full max-w-[650px]">
          <h2 class="text-[28px] sm:text-[36px] lg:text-[49px] font-semibold tracking-normal leading-[1.15]"><span class="text-[#EC460B] block">{{ $settings['title_line1'] ?? 'Flexible local support,' }}</span><span class="text-[#131313] block">{{ $settings['title_line2'] ?? 'built around what you need.' }}</span></h2>
        </div>
        <div class="max-w-[460px] space-y-3 sm:space-y-3.5 pt-1">
          <p class="text-[14px] sm:text-[15px] lg:text-[16px] font-light text-[#3E3939] leading-relaxed tracking-normal">{!! $settings['description'] ?? '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.' !!}</p>
          <div class="pt-0.5"><a class="inbetween-btn-pill inline-flex items-center justify-between gap-4 pl-6 pr-2 py-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#3E3939] transition-all duration-300 shadow-md group shrink-0 cursor-pointer" href="{{ $settings['cta_link'] ?? '#inbetween-founder' }}" title="{{ $settings['cta_text'] ?? 'Talk to us' }}"><span class="font-medium">{{ $settings['cta_text'] ?? 'Talk to us' }}</span><span class="w-8 h-8 rounded-full bg-white text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></span></a>
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
    <div class="inbetween-accordion-container flex flex-col lg:flex-row items-stretch gap-3 sm:gap-4 lg:gap-5 w-full mt-6 lg:mt-8 mb-auto">
      @foreach($cards as $index => $card)
        @php
          $cardSlug = !empty($card['card_id']) ? \Illuminate\Support\Str::slug($card['card_id']) : \Illuminate\Support\Str::slug($card['badge'] ?? 'item-'.$index);
          if (empty($cardSlug)) { $cardSlug = 'item-'.$index; }
          $isActive = ($index === 0);
          $sandImgUrl = !empty($card['sand_image']) ? (str_starts_with($card['sand_image'], 'http') || str_starts_with($card['sand_image'], '/') ? $card['sand_image'] : asset($card['sand_image'])) : asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg');
          $activeImgUrl = !empty($card['active_image']) ? (str_starts_with($card['active_image'], 'http') || str_starts_with($card['active_image'], '/') ? $card['active_image'] : asset($card['active_image'])) : asset('themes/inbetween_v2/images/what-we-do-magnifier.png');
          $badge = $card['badge'] ?? strtoupper($cardSlug);
          $title = $card['title'] ?? '';
          $desc = $card['description'] ?? '';
        @endphp
        <div class="inbetween-card inbetween-card-{{ $cardSlug }} {{ $isActive ? 'inbetween-card-active' : 'inbetween-card-collapsed' }}" id="card-{{ $cardSlug }}" data-card-id="{{ $cardSlug }}">
          <img class="inbetween-card-bg-sand" src="{{ $sandImgUrl }}" alt="{{ $title }} Pattern">
          <img class="inbetween-card-bg-active" src="{{ $activeImgUrl }}" alt="{{ $title }}">
          <div class="inbetween-card-active-content">
            <div class="text-[32px] sm:text-[44px] lg:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">
              {{ $badge }}
            </div>
            <div class="space-y-2 max-w-[500px]">
              <h3 class="text-[20px] sm:text-[24px] lg:text-[31px] font-medium text-white leading-snug tracking-normal">
                {{ $title }}
              </h3>
              <p class="text-[14px] lg:text-[16px] font-normal text-white/95 leading-normal tracking-normal">
                {{ $desc }}
              </p>
            </div>
          </div>
          <div class="inbetween-card-collapsed-content">
            <div class="hidden lg:flex items-center justify-center w-full h-full select-none">
              <span class="inbetween-vertical-title text-[26px] xl:text-[32px]">{{ $badge }}</span>
            </div>
            <div class="lg:hidden flex items-center justify-between w-full p-4">
              <span class="text-[20px] font-semibold uppercase tracking-wider text-white">{{ $badge }}</span>
              <span class="text-[12px] font-light text-white/80">Nhấn để mở rộng &rsaquo;</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
