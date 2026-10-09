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
    <div class="our-clients-grid w-full h-full grid grid-cols-1 lg:grid-cols-4 items-stretch">
      <div class="our-clients-col-title w-full h-auto lg:h-full flex flex-col justify-center pl-6 sm:pl-10 lg:pl-10 xl:pl-16 2xl:pl-[96px] pr-4 sm:pr-6 lg:pr-8 pt-[95px] sm:pt-[72px] lg:pt-0 pb-6 lg:pb-0 z-20 bg-[#131313]">
        <h2 class="our-clients-heading flex flex-col select-none"><span class="our-clients-word-our text-[36px] sm:text-[48px] lg:text-[61px] font-semibold text-[#F6F4F4] leading-none tracking-normal">{{ $settings['heading_word1'] ?? 'OUR' }}</span><span class="our-clients-word-clients text-[36px] sm:text-[48px] lg:text-[61px] font-semibold text-[#EC460B] leading-none tracking-normal pt-2 sm:pt-3 lg:pt-[19px]">{{ $settings['heading_word2'] ?? 'CLIENTS.' }}</span></h2>
      </div>
      @foreach($clientCards as $cIndex => $card)
        @php
          $cardSlug = !empty($card['card_id']) ? \Illuminate\Support\Str::slug($card['card_id']) : 'card-'.$cIndex;
          $cardImgRaw = is_array($card['image'] ?? null) ? ($card['image']['url'] ?? '') : ($card['image'] ?? '');
          $cImg = !empty($cardImgRaw) ? (str_starts_with($cardImgRaw, 'http') || str_starts_with($cardImgRaw, '/') ? $cardImgRaw : asset($cardImgRaw)) : '';
          $cTitle = $card['title'] ?? '';
          $cDesc = $card['description'] ?? '';
        @endphp
        <div class="our-clients-card group relative w-full h-full min-h-[380px] lg:min-h-0 overflow-hidden flex flex-col justify-between cursor-default border-t lg:border-t-0 lg:border-l border-neutral-800/30" id="client-card-{{ $cardSlug }}">
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
      @endforeach
    
    </div>
  </div>
</section>
