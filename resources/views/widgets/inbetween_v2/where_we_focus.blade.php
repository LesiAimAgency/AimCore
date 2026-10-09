<section class="inbetween-onepage-section relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#F6F4F4] text-[#131313] py-8 sm:py-10 lg:py-0" id="inbetween-where-we-focus">
  <div class="inbetween-container-1440 relative z-10 pb-4 sm:pb-6 lg:pb-2">
    <div class="w-full shrink-0 pt-4 sm:pt-6 lg:pt-8 pb-1 sm:pb-2 lg:pb-3">
      <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-2.5 sm:gap-4">
        <div class="text-[14px] font-light text-[#3E3939] uppercase tracking-widest">{{ $settings['badge_text'] ?? '[ WHERE WE FOCUS ]' }}</div>
        <div class="text-left sm:text-right">
          <h2 class="text-[26px] sm:text-[34px] lg:text-[46px] xl:text-[49px] font-semibold tracking-normal leading-[1.2]"><span class="text-[#EC460B] block">{{ $settings['heading_line1'] ?? 'Our core business sectors' }}</span><span class="text-[#131313] block">{{ $settings['heading_line2'] ?? 'Where we create values' }}</span></h2>
        </div>
      </div>
    </div>
    @php
      $defaultSectors = [
        [
          'title_line1' => 'INDUSTRIAL &',
          'title_line2' => 'MANUFACTURING',
          'tags' => 'Machinery, Equipment, Components, Factory Solutions, Materials, Materials',
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
          'tags' => 'Sustainability Technology, Energy Technology, Environmental Solutions, Water & Waste, Renewable Energy, Materials',
          'image' => 'themes/inbetween_v2/images/sector-lightning-bolt.png',
        ],
      ];
      $sectors = !empty($settings['sectors']) && is_array($settings['sectors']) ? array_values($settings['sectors']) : $defaultSectors;
      $chunked = array_chunk($sectors, 2);
    @endphp
    <div class="sectors-grid-wrap w-full my-auto flex flex-col gap-3 sm:gap-4 lg:gap-[24px] xl:gap-[32px]">
      @foreach($chunked as $rowIdx => $rowSectors)
        @php
          $isRow1 = ($rowIdx % 2 === 0);
          $rowClass = $isRow1 
            ? 'sectors-row-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[519fr_741fr] gap-3 sm:gap-4 lg:gap-[clamp(24px,2.7vw,40px)]' 
            : 'sectors-row-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[741fr_519fr] gap-3 sm:gap-4 lg:gap-[clamp(16px,2.5vw,40px)]';
        @endphp
        <div class="{{ $rowClass }}">
          @foreach($rowSectors as $colIdx => $sector)
            @php
              $globalIdx = $rowIdx * 2 + $colIdx;
              $imgUrl = !empty($sector['image']) ? (str_starts_with($sector['image'], 'http') || str_starts_with($sector['image'], '/') ? $sector['image'] : asset($sector['image'])) : '';
              $tagsRaw = $sector['tags'] ?? '';
              $tagList = is_array($tagsRaw) ? $tagsRaw : array_filter(array_map('trim', explode(',', (string)$tagsRaw)));
              
              // Layout style alternate
              $isLeftCol = ($colIdx === 0);
              $bgAlign = $isLeftCol ? 'bg-left' : 'bg-right';
              $flipClass = ($globalIdx === 1) ? 'scale-x-[-1]' : '';
              $contentAlign = $isLeftCol ? 'sm:ml-auto mr-0 xl:mr-2' : 'sm:mr-auto ml-0 xl:ml-2';
              $maxW = ($globalIdx === 0 || $globalIdx === 3) ? 'sm:max-w-[270px] xl:max-w-[285px]' : 'sm:max-w-[310px] xl:max-w-[330px]';
            @endphp
            <div class="inbetween-sector-card relative rounded-[14px] overflow-hidden bg-[#F6F4F4] border border-neutral-200/90 flex flex-col justify-center shadow-xs">
              <div class="absolute inset-0 w-full h-full bg-cover {{ $bgAlign }} bg-no-repeat pointer-events-none {{ $flipClass }}" style="background-image: url('{{ $imgUrl }}')" role="img" aria-label="{{ $sector['title_line1'] ?? '' }} {{ $sector['title_line2'] ?? '' }}"></div>
              <div class="relative z-10 w-full {{ $maxW }} {{ $contentAlign }} space-y-2 sm:space-y-2.5">
                <h3 class="text-[20px] sm:text-[20px] xl:text-[20px] font-regular tracking-wide text-[#131313] leading-[1.25]">
                  <span class="block">{{ $sector['title_line1'] ?? '' }}</span>
                  <span class="block">{{ $sector['title_line2'] ?? '' }}</span>
                </h3>
                <div class="flex flex-wrap items-center gap-2.5">
                  @foreach($tagList as $tag)
                    <span class="inbetween-tag-pill inline-block px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full border border-neutral-300/80 bg-white text-[12px] font-light text-[#3E3939] whitespace-nowrap shadow-[0_1px_2px_rgba(0,0,0,0.03)]">{{ $tag }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
    <div class="relative z-20 w-full shrink-0 flex justify-center pb-1"><a class="inline-flex flex-col items-center gap-0.5 text-neutral-400 hover:text-[#EC460B] transition-colors duration-200 group text-[12px] font-light uppercase tracking-widest" href="#inbetween-founder" title="Cuộn sang Founder Profile"><span class="w-3.5 h-6 sm:w-4 sm:h-7 rounded-full border border-neutral-300 flex items-start justify-center p-0.5 group-hover:border-[#EC460B]"><span class="w-1 h-1.5 rounded-full bg-neutral-400 group-hover:bg-[#EC460B] animate-bounce"></span></span></a></div>
  </div>
</section>
