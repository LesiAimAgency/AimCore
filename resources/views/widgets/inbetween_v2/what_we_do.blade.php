<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#F6F4F4] text-[#131313]" id="inbetween-what-we-do">
  <div class="inbetween-container-1440 relative z-10 pb-2 sm:pb-3">
    <div class="w-full shrink-0 pt-[52px] sm:pt-[56px] lg:pt-[62px]">
      <div class="text-[14px] font-light text-[#3E3939] uppercase tracking-widest mb-2 sm:mb-2.5">[ WHAT WE DO ]</div>
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
    <div class="inbetween-accordion-container flex flex-col lg:flex-row items-stretch gap-3 sm:gap-4 lg:gap-5 w-full mt-6 lg:mt-8 mb-auto">
      <div class="inbetween-card inbetween-card-find inbetween-card-active" id="card-find" data-card-id="find"><img class="inbetween-card-bg-sand inbetween-card-bg-sand" src="{{ asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg') }}" alt="Market &amp; Opportunity Development Pattern"><img class="inbetween-card-bg-active inbetween-card-bg-active" src="{{ asset('themes/inbetween_v2/images/what-we-do-magnifier.png') }}" alt="Market &amp; Opportunity Development">
        <div class="inbetween-card-active-content">
          <div class="text-[32px] sm:text-[44px] lg:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">FIND
          </div>
          <div class="space-y-2 max-w-[500px]">
            <h3 class="text-[20px] sm:text-[24px] lg:text-[31px] font-medium text-white leading-snug tracking-normal">Market &amp; Opportunity Development
            </h3>
            <p class="text-[14px] lg:text-[16px] font-normal text-white/95 leading-normal tracking-normal">Identify priority sectors, companies, decision-makers, distributors and commercial opportunities.
            </p>
          </div>
        </div>
        <div class="inbetween-card-collapsed-content">
          <div class="hidden lg:flex items-center justify-center w-full h-full select-none"><span class="inbetween-vertical-title text-[26px] xl:text-[32px]">FIND</span></div>
          <div class="lg:hidden flex items-center justify-between w-full p-4"><span class="text-[20px] font-semibold uppercase tracking-wider text-white">FIND</span><span class="text-[12px] font-light text-white/80">Nhấn để mở rộng ;</span></div>
        </div>
      </div>
      <div class="inbetween-card inbetween-card-connect inbetween-card-collapsed" id="card-connect" data-card-id="connect"><img class="inbetween-card-bg-sand inbetween-card-bg-sand" src="{{ asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg') }}" alt="Strategic Partnerships &amp; Networking Pattern"><img class="inbetween-card-bg-active inbetween-card-bg-active" src="{{ asset('themes/inbetween_v2/images/what-we-do-chain.png') }}" alt="Strategic Partnerships &amp; Networking">
        <div class="inbetween-card-active-content">
          <div class="text-[32px] sm:text-[44px] lg:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">CONNECT
          </div>
          <div class="space-y-2 max-w-[500px]">
            <h3 class="text-[20px] sm:text-[24px] lg:text-[31px] font-medium text-white leading-snug tracking-normal">Strategic Partnerships &amp; Networking
            </h3>
            <p class="text-[14px] lg:text-[16px] font-normal text-white/95 leading-normal tracking-normal">Connect directly with local key stakeholders, industry associations, and verified commercial partners.
            </p>
          </div>
        </div>
        <div class="inbetween-card-collapsed-content">
          <div class="hidden lg:flex items-center justify-center w-full h-full select-none"><span class="inbetween-vertical-title text-[26px] xl:text-[32px]">CONNECT</span></div>
          <div class="lg:hidden flex items-center justify-between w-full p-4"><span class="text-[20px] font-semibold uppercase tracking-wider text-white">CONNECT</span><span class="text-[12px] font-light text-white/80">Nhấn để mở rộng ;</span></div>
        </div>
      </div>
      <div class="inbetween-card inbetween-card-execute inbetween-card-collapsed" id="card-execute" data-card-id="execute"><img class="inbetween-card-bg-sand inbetween-card-bg-sand" src="{{ asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg') }}" alt="Market Entry &amp; Operational Setup Pattern"><img class="inbetween-card-bg-active inbetween-card-bg-active" src="{{ asset('themes/inbetween_v2/images/what-we-do-gears.png') }}" alt="Market Entry &amp; Operational Setup">
        <div class="inbetween-card-active-content">
          <div class="text-[32px] sm:text-[44px] lg:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">EXECUTE
          </div>
          <div class="space-y-2 max-w-[500px]">
            <h3 class="text-[20px] sm:text-[24px] lg:text-[31px] font-medium text-white leading-snug tracking-normal">Market Entry &amp; Operational Setup
            </h3>
            <p class="text-[14px] lg:text-[16px] font-normal text-white/95 leading-normal tracking-normal">End-to-end execution of operational roadmaps, pilot testing, and localized compliance support.
            </p>
          </div>
        </div>
        <div class="inbetween-card-collapsed-content">
          <div class="hidden lg:flex items-center justify-center w-full h-full select-none"><span class="inbetween-vertical-title text-[26px] xl:text-[32px]">EXECUTE</span></div>
          <div class="lg:hidden flex items-center justify-between w-full p-4"><span class="text-[20px] font-semibold uppercase tracking-wider text-white">EXECUTE</span><span class="text-[12px] font-light text-white/80">Nhấn để mở rộng ;</span></div>
        </div>
      </div>
      <div class="inbetween-card inbetween-card-grow inbetween-card-collapsed" id="card-grow" data-card-id="grow"><img class="inbetween-card-bg-sand inbetween-card-bg-sand" src="{{ asset('themes/inbetween_v2/images/what-we-do-sand-waves.jpg') }}" alt="Scale &amp; Long-term Expansion Pattern"><img class="inbetween-card-bg-active inbetween-card-bg-active" src="{{ asset('themes/inbetween_v2/images/what-we-do-arrow.png') }}" alt="Scale &amp; Long-term Expansion">
        <div class="inbetween-card-active-content">
          <div class="text-[32px] sm:text-[44px] lg:text-[61px] font-semibold uppercase tracking-tight text-white leading-none">GROW
          </div>
          <div class="space-y-2 max-w-[500px]">
            <h3 class="text-[20px] sm:text-[24px] lg:text-[31px] font-medium text-white leading-snug tracking-normal">Scale &amp; Long-term Expansion
            </h3>
            <p class="text-[14px] lg:text-[16px] font-normal text-white/95 leading-normal tracking-normal">Accelerate revenue pipelines, expand regional presence, and build sustainable local capabilities.
            </p>
          </div>
        </div>
        <div class="inbetween-card-collapsed-content">
          <div class="hidden lg:flex items-center justify-center w-full h-full select-none"><span class="inbetween-vertical-title text-[26px] xl:text-[32px]">GROW</span></div>
          <div class="lg:hidden flex items-center justify-between w-full p-4"><span class="text-[20px] font-semibold uppercase tracking-wider text-white">GROW</span><span class="text-[12px] font-light text-white/80">Nhấn để mở rộng ;</span></div>
        </div>
      </div>
    </div>
  </div>
</section>
