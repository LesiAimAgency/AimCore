@php
  $rawPortrait = is_array($settings['founder_portrait'] ?? null) ? ($settings['founder_portrait']['url'] ?? $settings['founder_portrait'][0] ?? '') : ($settings['founder_portrait'] ?? '');
  $badgeText = $settings['badge_text'] ?? '[ MEET THE FOUNDER ]';
  $portraitUrl = !empty($rawPortrait) ? (str_starts_with($rawPortrait, 'http') || str_starts_with($rawPortrait, '/') ? $rawPortrait : asset($rawPortrait)) : asset('themes/inbetween_v2/images/founder-airu-portrait.png');
  $founderName = $settings['founder_name'] ?? 'AIRU';
  $founderNameZh = $settings['founder_name_zh'] ?? $settings['founder_name_cn'] ?? '';
  $founderNameEn = $settings['founder_name_en'] ?? '';

  if (empty($founderNameZh) && empty($founderNameEn)) {
    if (preg_match('/([\x{4e00}-\x{9fa5}\x{3400}-\x{4dbf}]+)/u', (string)$founderName, $m)) {
      $founderNameZh = trim($m[1]);
      $founderNameEn = trim(str_replace($m[1], '', (string)$founderName));
    } else {
      $founderNameZh = '爱茹';
      $founderNameEn = (string)$founderName;
    }
  } elseif (empty($founderNameEn)) {
    $founderNameEn = (string)$founderName;
  }
  $founderRole = $settings['founder_role'] ?? 'Founder of INBETWEEN';
  $quote1 = $settings['quote_line1'] ?? 'Built between cultures.';
  $quote2 = $settings['quote_line2'] ?? 'Connected across borders.';
  $expYears = $settings['experience_years'] ?? '14+';
  $expLabel = $settings['experience_label'] ?? 'Years of experience across Europe, the Arab region, Africa and Asia';

  $rawStageImg = is_array($settings['detail_exp_image'] ?? null) ? ($settings['detail_exp_image']['url'] ?? $settings['detail_exp_image'][0] ?? '') : ($settings['detail_exp_image'] ?? '');
  $stageImgUrl = !empty($rawStageImg) ? (str_starts_with($rawStageImg, 'http') || str_starts_with($rawStageImg, '/') ? $rawStageImg : asset($rawStageImg)) : asset('themes/inbetween_v2/images/founder-airu-stage.png');

  $defaultLanguages = [
    ['name' => 'Vietnamese', 'proficiency' => 'Native / Bilingual'],
    ['name' => 'English', 'proficiency' => 'Professional Working'],
    ['name' => 'Arabic', 'proficiency' => 'Working Proficiency'],
  ];
  $languages = !empty($settings['languages']) && is_array($settings['languages']) ? array_values($settings['languages']) : $defaultLanguages;

  $rawMediaImg = is_array($settings['media_image'] ?? null) ? ($settings['media_image']['url'] ?? $settings['media_image'][0] ?? '') : ($settings['media_image'] ?? '');
  $mediaImgUrl = !empty($rawMediaImg) ? (str_starts_with($rawMediaImg, 'http') || str_starts_with($rawMediaImg, '/') ? $rawMediaImg : asset($rawMediaImg)) : asset('themes/inbetween_v2/images/image 13.png');

  $defaultRegions = [
    ['title' => 'Europe', 'desc' => 'Facilitating bilateral enterprise cooperation, multilateral trade dialogs, and specialized technology exchange between EU innovation hubs and Southeast Asia.'],
    ['title' => 'The Arab Region', 'desc' => 'Advising cross-regional joint ventures, sovereign investment dialogues, and executive business missions across the GCC and North Africa.'],
    ['title' => 'Africa', 'desc' => 'Establishing foundational distributor channels, industrial supply chain links, and public-private sector partnerships in high-growth frontier markets.'],
    ['title' => 'Asia & Vietnam', 'desc' => 'Serving as on-the-ground operational anchor for foreign SMEs and founders entering Vietnam, from market validation to entity formation and commercial scale.'],
  ];
  $regions = !empty($settings['regions']) && is_array($settings['regions']) ? array_values($settings['regions']) : $defaultRegions;
@endphp

<section class="relative w-full bg-[#F6F4F4] text-[#131313] py-[20px] px-0 select-text border-t  border-neutral-300/70" id="mobile-founder" data-section="inbetween-founder" aria-label="Founder Profile - Mobile">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-founder" style="position: absolute; top: -60px; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>
  <div class="w-full max-w-[440px] mx-auto h-[359px] relative overflow-hidden bg-[#F6F4F4]" id="mobile-founder-frame">
    
    {{-- 1. OVERVIEW VIEW (Matches Frame 348.svg precisely, no gaps, perfect responsive fit on 360px-440px) --}}
    <div class="w-full h-full flex flex-row items-stretch" id="mobile-founder-overview">
      {{-- Left Side: Portrait 50% width --}}
      <div class="w-1/2 h-full shrink-0 overflow-hidden relative select-none">
        <img class="w-full h-full object-cover object-top block" src="{{ $portraitUrl }}" alt="{{ $founderName }} - {{ $founderRole }}">
      </div>

      {{-- Right Side: Info, Quotes & Stat 50% width --}}
      <div class="w-1/2 h-full flex flex-col justify-between pt-4 pb-5 pl-3.5 pr-2.5 min-[375px]:pt-5 min-[375px]:pb-6 min-[375px]:pl-4 min-[375px]:pr-3.5 select-none box-border">
        {{-- Top Group --}}
        <div class="flex gap-2 flex-col">
          <div class="text-[10px] min-[375px]:text-[10.5px] font-normal text-[#131313] uppercase tracking-[0.1em] min-[375px]:tracking-[0.12em] leading-none mb-1.5 min-[375px]:mb-2">
            {{ $badgeText }}
          </div>
          <button type="button" class="mobile-founder-trigger text-left cursor-pointer focus:outline-none group block select-none" aria-expanded="false" aria-controls="mobile-founder-detail" title="Click to view founder details">
            <h2 class="text-[28px] min-[375px]:text-[30px] text-[#EC460B] tracking-tight leading-none transition-transform duration-200 group-hover:translate-x-0.5">
              @if(!empty($founderNameZh))
                <span class="founder-name-zh inline font-normal mr-1.5">{!! $founderNameZh !!}</span>
              @endif
              <span class="founder-name-en inline font-bold">{!! $founderNameEn !!}</span>
            </h2>
          </button>
          <div class="flex items-center justify-between gap-1.5 pt-0.5">
            <span class="text-[11px] min-[375px]:text-[11.5px] font-normal text-[#131313] leading-tight tracking-tight">{{ $founderRole }}</span>
            <button class="mobile-founder-toggle-btn inbetween-btn-plus text-[#EC460B] text-[16px] min-[375px]:text-[18px] font-light leading-none inline-flex items-center justify-center cursor-pointer select-none transition-all hover:opacity-80 p-0.5 shrink-0" type="button" aria-label="View founder details" title="View details" data-action="toggle-founder">
              <span>[+]</span>
            </button>
          </div>
        </div>

        {{-- Middle Group: Quote --}}
        <div class="my-auto py-1">
          <svg class="w-[16px] min-[375px]:w-[18px] h-auto select-none pointer-events-none mb-1.5 min-[375px]:mb-2 block" viewBox="0 0 36 26" fill="#EC460B" xmlns="http://www.w3.org/2000/svg" style="color: #EC460B; fill: #EC460B;">
            <path d="M15.6 18.1294C15 22.3295 11.28 25.5695 7.2 25.5695C3.36 25.5695 0 22.6895 0 18.6094C0 10.6895 6.6 2.88945 13.32 0.129451C14.28 -0.230552 14.4 0.249449 13.68 0.489453C8.64 2.40945 5.16 9.48945 5.28 11.8894C6.6 10.9294 8.28 10.6895 9.24 10.6895C13.44 10.6895 16.32 13.9295 15.6 18.1294ZM35.28 18.1294C34.68 22.3295 30.96 25.5695 26.88 25.5695C23.04 25.5695 19.68 22.6895 19.68 18.6094C19.68 10.6895 26.28 2.88945 33 0.129451C33.96 -0.230552 34.08 0.249449 33.36 0.489453C28.32 2.40945 24.84 9.48945 24.96 11.8894C26.28 10.9294 27.96 10.6895 28.92 10.6895C33.12 10.6895 36 13.9295 35.28 18.1294Z" fill="#EC460B"/>
          </svg>
          <p class="text-[12.5px] min-[375px]:text-[13px] font-medium text-[#131313] leading-[1.3] tracking-tight">{{ $quote1 }}</p>
          <p class="text-[12.5px] min-[375px]:text-[13px] font-medium text-[#EC460B] leading-[1.3] tracking-tight mt-1">{{ $quote2 }}</p>
        </div>

        {{-- Bottom Group: Stat --}}
        <div class="flex items-center gap-2 min-[375px]:gap-2.5 pt-2 min-[375px]:pt-2.5">
          <div class="text-[30px] min-[375px]:text-[32px] font-light text-[#EC460B] leading-none shrink-0 tracking-tight">{{ $expYears }}</div>
          <div class="text-[9.5px] min-[375px]:text-[10px] font-light text-[#3E3939] leading-[1.25] flex-1">{{ $expLabel }}</div>
        </div>
      </div>
    </div>

    {{-- 2. EXPANDED DETAIL VIEW (Stays strictly inside this 359px frame with internal scroll) --}}
    <div class="w-full h-full hidden overflow-y-auto px-4 pb-4 custom-founder-scrollbar overscroll-contain select-text" id="mobile-founder-detail">
      {{-- Sticky Header with title and [-] button matching user screenshot --}}
      <div class="sticky top-0 -mx-4 px-4 py-2.5 bg-[#F6F4F4]/98 backdrop-blur-md z-20 flex items-center justify-between border-b border-[#323232]/20 mb-3">
        <h3 class="text-[12.5px] sm:text-[13.5px] font-medium text-[#EC460B] uppercase tracking-wider">
          {{ $settings['detail_exp_title'] ?? '14 YEARS OF EXPERIENCE' }}
        </h3>
        <button class="mobile-founder-toggle-btn inbetween-btn-plus text-[#EC460B] text-[20px] font-light leading-none cursor-pointer p-1 -mr-1 shrink-0" type="button" aria-label="Collapse founder profile" data-action="toggle-founder">
          <span>[-]</span>
        </button>
      </div>

      {{-- Section 1: Overview & Stage Image --}}
      <div class="founder-detail-section space-y-3 pt-0.5">
        <p class="text-[12.5px] sm:text-[13px] font-light text-[#3E3939] leading-relaxed">
          {!! $settings['detail_exp_desc'] ?? 'AiRu is a driven international professional with <strong class="font-semibold text-[#131313]">14 years of experience across Europe, the Arab region, Africa and Asia</strong>, specializing in <strong class="font-semibold text-[#131313]">cross-border partnerships and business development</strong>. She navigates nuanced intercultural environments to build high-trust commercial pathways between emerging and developed ecosystems.' !!}
        </p>
        <div class="w-full rounded-xl overflow-hidden mt-3 shadow-xs">
          <img class="w-full h-auto aspect-[600/346] object-cover object-center block" src="{{ $stageImgUrl }}" alt="{{ $founderName }} - Stage">
        </div>
      </div>

      <div class="w-full h-[0.5px] bg-[#323232]/20 my-4"></div>

      {{-- Section 2: Fluency in 3 Languages --}}
      <div class="founder-detail-section space-y-2.5">
        <h3 class="text-[12.5px] sm:text-[13.5px] font-medium text-[#EC460B] uppercase tracking-wider">
          {{ $settings['languages_title'] ?? 'FLUENCY IN 3 LANGUAGES' }}
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 pt-1">
          @foreach($languages as $lang)
            <div class="p-3 rounded-xl bg-white border border-neutral-200/80 shadow-2xs">
              <div class="text-[13px] font-medium text-[#131313]">{{ $lang['name'] ?? '' }}</div>
              <div class="text-[11px] font-light text-[#3E3939] mt-0.5">{{ $lang['proficiency'] ?? '' }}</div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="w-full h-[0.5px] bg-[#323232]/20 my-4"></div>

      {{-- Section 3: Media Platform --}}
      <div class="founder-detail-section space-y-2.5">
        <h3 class="text-[12.5px] sm:text-[13.5px] font-medium text-[#EC460B] uppercase tracking-wider">
          {{ $settings['media_title'] ?? 'OWN MEDIA PLATFORM WITH 35K+ FOLLOWERS' }}
        </h3>
        <p class="text-[12px] sm:text-[12.5px] font-light text-[#3E3939] leading-relaxed">
          {{ $settings['media_desc'] ?? 'Host and curator of leading cross-border business discussions, podcasts, and intercultural networking series with an engaged executive community of over 35,000 global founders, investors, and industry decision-makers.' }}
        </p>
        <div class="w-full rounded-xl overflow-hidden mt-3 shadow-xs">
          <img class="w-full h-auto aspect-[600/320] object-cover object-center block" src="{{ $mediaImgUrl }}" alt="{{ $founderName }} Media Platform">
        </div>
      </div>

      <div class="w-full h-[0.5px] bg-[#323232]/20 my-4"></div>

      {{-- Section 4: Cross-Border Expertise & Regions --}}
      <div class="founder-detail-section space-y-2.5">
        <h3 class="text-[12.5px] sm:text-[13.5px] font-medium text-[#EC460B] uppercase tracking-wider">
          {{ $settings['regions_title'] ?? 'CROSS-BORDER EXPERTISE & REGIONS' }}
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-1">
          @foreach($regions as $reg)
            <div class="p-3.5 rounded-xl bg-white border border-neutral-200/80 shadow-2xs space-y-1">
              <div class="text-[12.5px] font-medium text-[#EC460B] uppercase tracking-wide">{{ $reg['title'] ?? '' }}</div>
              <p class="text-[11.5px] font-light text-[#3E3939] leading-relaxed">{{ $reg['desc'] ?? '' }}</p>
            </div>
          @endforeach
        </div>
      </div>

      <div class="w-full h-[0.5px] bg-[#323232]/20 my-4"></div>

      {{-- Section 5: Business Development & Strategic Alliances --}}
      <div class="founder-detail-section space-y-2.5">
        <h3 class="text-[12.5px] sm:text-[13.5px] font-medium text-[#EC460B] uppercase tracking-wider">
          {{ $settings['alliances_title'] ?? 'BUSINESS DEVELOPMENT & STRATEGIC ALLIANCES' }}
        </h3>
        <p class="text-[12px] sm:text-[12.5px] font-light text-[#3E3939] leading-relaxed pb-4">
          {{ $settings['alliances_desc'] ?? 'At INBETWEEN, AiRu leverages deep relational equity and agile localized strategies to bridge international standards with Vietnam\'s dynamic commercial realities. Her approach removes operational friction, minimizes foreign market entry risk, and accelerates time-to-market for pioneering ventures.' }}
        </p>
      </div>
    </div>
  </div>

  <script>
    (function () {
      function initMobileFounder() {
        var section = document.getElementById('mobile-founder');
        if (!section || section.__mobileFounderBound) return;
        section.__mobileFounderBound = true;

        var overview = document.getElementById('mobile-founder-overview');
        var detail = document.getElementById('mobile-founder-detail');
        var nameTrigger = section.querySelector('.mobile-founder-trigger');

        function setExpanded(expand) {
          if (expand) {
            overview.classList.add('hidden');
            detail.classList.remove('hidden');
            section.classList.add('is-expanded');
            detail.scrollTop = 0;
            if (nameTrigger) nameTrigger.setAttribute('aria-expanded', 'true');
          } else {
            detail.classList.add('hidden');
            overview.classList.remove('hidden');
            section.classList.remove('is-expanded');
            if (nameTrigger) nameTrigger.setAttribute('aria-expanded', 'false');
          }
        }

        section.addEventListener('click', function (e) {
          var btn = e.target.closest('.mobile-founder-toggle-btn, .mobile-founder-trigger');
          if (btn) {
            e.preventDefault();
            var isCurrentlyExpanded = section.classList.contains('is-expanded');
            setExpanded(!isCurrentlyExpanded);
          }
        });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileFounder);
      } else {
        initMobileFounder();
      }
    })();
  </script>
</section>
