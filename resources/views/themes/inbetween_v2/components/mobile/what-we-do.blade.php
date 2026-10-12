@php
  $badgeText = $settings['badge_text'] ?? '[ WHAT WE DO ]';
  $titleLine1 = $settings['title_line1'] ?? 'Flexible local support,';
  $titleLine2 = $settings['title_line2'] ?? 'built around what you need.';
  $desc = $settings['description'] ?? '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.';
  $ctaText = $settings['cta_text'] ?? 'Talk to us';
  $ctaLink = (!empty($settings['cta_link']) && $settings['cta_link'] !== '#inbetween-founder') ? $settings['cta_link'] : '#mobile-contact';

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

<section class="relative w-full bg-[#F6F4F4] text-[#131313] py-[20px] px-4 sm:px-5 select-text" id="mobile-what-we-do" data-section="inbetween-what-we-do" aria-label="What We Do - Mobile">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-what-we-do" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  <div class="w-full max-w-lg mx-auto">
    <!-- Header Badge & Heading -->
    <div class="space-y-3 mb-8 text-center">
      <div class="inline-block text-[12px] font-semibold text-[#EC460B] uppercase tracking-[0.2em]">
        {{ $badgeText }}
      </div>
      <h2 class="text-[25px] sm:text-[28px] font-bold tracking-tight leading-[1.2]">
        <span class="text-[#EC460B] block text-[20px]">{{ $titleLine1 }}</span>
        <span class="text-[#131313] block text-[20px]">{{ $titleLine2 }}</span>
      </h2>
      <p class="text-[12px] sm:text-[13px] text-[#3E3939] leading-relaxed">
        {!! $desc !!}
      </p>
      <div class="pt-2">
        <a href="{{ $ctaLink }}"
           class="inline-flex items-center justify-between w-full sm:w-auto h-[48px] px-6 rounded-full bg-[#131313] text-white text-[15px] font-medium hover:bg-[#2B2B2B] active:scale-[0.98] transition-all shadow-sm">
          <span>{{ $ctaText }}</span>
          <span class="w-7 h-7 rounded-full bg-white text-[#131313] flex items-center justify-center ml-4">
            <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none">
              <path d="M3.3 8h9.4M8.7 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </a>
      </div>
    </div>

    <!-- 4 Pillars Mobile Vertical Accordion -->
    <div class="mobile-what-we-do-accordion space-y-3.5 w-full" id="mobile-what-we-do-accordion">
      @foreach($cards as $idx => $card)
        @php
          $sandRaw = is_array($card['sand_image'] ?? null) ? ($card['sand_image']['url'] ?? '') : ($card['sand_image'] ?? '');
          $sandImgUrl = !empty($sandRaw) ? (str_starts_with($sandRaw, 'http') || str_starts_with($sandRaw, '/') ? $sandRaw : asset($sandRaw)) : asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg');
          $activeRaw = is_array($card['active_image'] ?? null) ? ($card['active_image']['url'] ?? '') : ($card['active_image'] ?? '');
          $activeImgUrl = !empty($activeRaw) ? (str_starts_with($activeRaw, 'http') || str_starts_with($activeRaw, '/') ? $activeRaw : asset($activeRaw)) : asset('themes/inbetween_v2/images/what-we-do-magnifier.png');
          $badge = $card['badge'] ?? ('STEP ' . ($idx + 1));
          $title = $card['title'] ?? '';
          $cardDesc = $card['description'] ?? '';
          $isActive = ($idx === 0);
        @endphp
        <div class="mobile-accordion-card relative overflow-hidden rounded-[22px] select-none transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] cursor-pointer shadow-md {{ $isActive ? 'is-active' : 'is-collapsed' }}"
             data-accordion-index="{{ $idx }}"
             tabindex="0"
             role="button"
             aria-expanded="{{ $isActive ? 'true' : 'false' }}">
          <!-- Background Sand Waves (for Collapsed state) -->
          <img src="{{ $sandImgUrl }}" alt="{{ $title }} Sand Pattern" class="mobile-card-bg-sand absolute inset-0 w-full h-full object-cover object-center pointer-events-none transition-all duration-500">
          
          <!-- Background Active Full Illustration (for Active state) -->
          <img src="{{ $activeImgUrl }}" alt="{{ $title }}" class="mobile-card-bg-active absolute inset-0 w-full h-full object-cover object-center pointer-events-none transition-all duration-500">

          <!-- Collapsed State Header Bar -->
          <div class="mobile-card-collapsed-content flex items-center justify-between w-full h-full px-5 sm:px-6 relative z-10 transition-opacity duration-300">
            <span class="text-[20px] sm:text-[22px] font-bold uppercase tracking-wider text-white drop-shadow-sm font-sans">{{ $badge }}</span>
            <span class="text-[13px] sm:text-[14px] font-light text-white/90 drop-shadow-sm flex items-center gap-1">Click to expand <span class="text-[16px] leading-none">&rsaquo;</span></span>
          </div>

          <!-- Active State Full Content -->
          <div class="mobile-card-active-content flex flex-col justify-between w-full h-full p-6 sm:p-7 relative z-10 text-white transition-opacity duration-400">
            <div class="text-[30px] sm:text-[34px] font-extrabold uppercase tracking-tight text-white leading-none drop-shadow-sm">
              {{ $badge }}
            </div>
            <div class="space-y-2 max-w-[340px] pb-1">
              <h3 class="text-[19px] sm:text-[22px] font-bold text-white leading-snug drop-shadow-sm">
                {{ $title }}
              </h3>
              <p class="text-[13.5px] sm:text-[14.5px] text-white/95 font-light leading-relaxed drop-shadow-sm">
                {{ $cardDesc }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script>
    (function () {
      function initMobileAccordion() {
        var container = document.getElementById('mobile-what-we-do-accordion');
        if (!container || container.__accordionAttached) return;
        container.__accordionAttached = true;

        var cards = Array.from(container.querySelectorAll('.mobile-accordion-card'));
        cards.forEach(function (card) {
          card.addEventListener('click', function () {
            if (card.classList.contains('is-active')) return;
            cards.forEach(function (c) {
              c.classList.remove('is-active');
              c.classList.add('is-collapsed');
              c.setAttribute('aria-expanded', 'false');
            });
            card.classList.remove('is-collapsed');
            card.classList.add('is-active');
            card.setAttribute('aria-expanded', 'true');
          });

          card.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              card.click();
            }
          });
        });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileAccordion);
      } else {
        initMobileAccordion();
      }
    })();
  </script>
</section>
