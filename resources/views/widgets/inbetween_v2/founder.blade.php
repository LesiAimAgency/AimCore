<section class="inbetween-onepage-section relative w-full h-screen min-h-screen max-h-screen overflow-hidden select-none bg-[#F6F4F4] text-[#131313]" id="inbetween-founder">
  <div class="inbetween-container-1440 relative z-10 pt-[52px] sm:pt-[56px] lg:pt-[54px] pb-0">
    <div class="founder-stage state-overview w-full h-full" id="founder-stage">
      <div class="founder-grid grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
        <div class="founder-col-left lg:col-span-5 xl:col-span-5 flex flex-col items-center lg:items-start justify-center">
          <div class="founder-portrait-card founder-portrait-card" data-flip-id="founder-portrait"><img class="founder-portrait-img w-full h-full object-cover object-top" src="{{ asset('themes/inbetween_v2/images/founder-airu-portrait.png') }}" alt="AIRU - Founder of INBETWEEN"></div>
        </div>
        <div class="founder-col-right lg:col-span-7 xl:col-span-7 h-full flex flex-col justify-center lg:pl-6">
          <div class="founder-header-block space-y-1.5 w-full max-w-[460px] mb-6 sm:mb-8" data-flip-id="founder-header">
            <button class="founder-name-trigger group text-left inline-flex items-center gap-3 cursor-pointer focus:outline-none focus-visible:ring-2 focus-visible:ring-[#EC460B] rounded-lg p-0.5" type="button" aria-expanded="false" aria-controls="founder-scroll-detail" aria-label="Xem chi tiết hồ sơ Founder AIRU" title="Nhấn để xem chi tiết / thu gọn hồ sơ AIRU">
              <h2 class="founder-name text-[86.86px] font-semibold text-[#EC460B] tracking-tight leading-none transition-transform duration-300 group-hover:translate-x-1">{{ $settings['founder_name'] ?? 'AIRU' }}</h2>
            </button>
            <div class="flex items-center gap-8 sm:gap-12 pt-1.5"><span class="founder-role text-[18px] sm:text-[20px] font-light text-[#131313] tracking-normal">{{ $settings['founder_role'] ?? 'Founder of INBETWEEN' }}</span>
              <button class="inbetween-btn-plus text-[#EC460B] text-[22px] sm:text-[25px] font-light leading-none inline-flex items-center justify-center cursor-pointer select-none transition-all hover:opacity-80 focus:outline-none tracking-wider" type="button" aria-label="Xem thêm thông tin Founder" title="Chi tiết Founder" data-action="toggle-founder"><span>[+]</span></button>
            </div>
          </div>
          <div class="founder-quote-block flex items-start gap-4 lg:gap-[38px]" data-flip-id="founder-quote"><img class="founder-quote-icon w-[30px] sm:w-[34px] lg:w-[36px] h-auto shrink-0 select-none pointer-events-none mt-1 sm:mt-1.5" src="data:image/svg+xml,%3csvg%20width='36'%20height='26'%20viewBox='0%200%2036%2026'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M15.6%2018.1294C15%2022.3295%2011.28%2025.5695%207.2%2025.5695C3.36%2025.5695%200%2022.6895%200%2018.6094C0%2010.6895%206.6%202.88945%2013.32%200.129451C14.28%20-0.230552%2014.4%200.249449%2013.68%200.489453C8.64%202.40945%205.16%209.48945%205.28%2011.8894C6.6%2010.9294%208.28%2010.6895%209.24%2010.6895C13.44%2010.6895%2016.32%2013.9295%2015.6%2018.1294ZM35.28%2018.1294C34.68%2022.3295%2030.96%2025.5695%2026.88%2025.5695C23.04%2025.5695%2019.68%2022.6895%2019.68%2018.6094C19.68%2010.6895%2026.28%202.88945%2033%200.129451C33.96%20-0.230552%2034.08%200.249449%2033.36%200.489453C28.32%202.40945%2024.84%209.48945%2024.96%2011.8894C26.28%2010.9294%2027.96%2010.6895%2028.92%2010.6895C33.12%2010.6895%2036%2013.9295%2035.28%2018.1294Z'%20fill='%23EC460B'/%3e%3c/svg%3e" alt="Quote">
            <div class="space-y-1 sm:space-y-1.5">
              <p class="text-[28px] sm:text-[34px] lg:text-[39px] font-medium text-[#131313] leading-[1.18] tracking-tight">{{ $settings['quote_line1'] ?? 'Built between cultures.' }}
              </p>
              <p class="text-[28px] sm:text-[34px] lg:text-[39px] font-medium text-[#EC460B] leading-[1.18] tracking-tight">{{ $settings['quote_line2'] ?? 'Connected across borders.' }}
              </p>
            </div>
          </div>
          <div class="founder-stat-block flex items-center gap-6 sm:gap-7 max-w-[520px] mt-8 lg:mt-0">
            <div class="founder-stat-number text-[48px] sm:text-[56px] lg:text-[61px] font-light text-[#EC460B] tracking-tight leading-none shrink-0 tabular-nums" data-count-value="{{ $settings['experience_years'] ?? '14+' }}" data-count-duration="1.6" data-count-start="0">{{ $settings['experience_years'] ?? '14+' }}
            </div>
            <div class="text-[13px] sm:text-[14px] font-light text-[#3E3939] leading-[1.35] max-w-[285px]">Years of experience across Europe, the Arab region, Africa and Asia
            </div>
          </div>
          <div class="founder-top-line w-full h-[0.5px] bg-[#323232]/80 my-3 hidden"></div>
          <div class="founder-scroll-detail hidden space-y-4 overflow-y-auto pr-3 sm:pr-4 custom-founder-scrollbar" id="founder-scroll-detail" tabindex="0" role="region" aria-label="Nội dung chi tiết hồ sơ Founder AIRU">
            <div class="founder-detail-section space-y-3 pt-1">
              <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3 sm:gap-6">
                <h3 class="text-[15px] sm:text-[16px] font-medium text-[#EC460B] uppercase tracking-wider shrink-0">14 YEARS OF EXPERIENCE
                </h3>
                <p class="text-[13px] sm:text-[14px] lg:text-[14.5px] font-light text-[#3E3939] leading-relaxed max-w-[460px]">AiRu is a driven international professional with <strong class="font-semibold text-[#131313]">14 years of experience across Europe, the Arab region, Africa and Asia</strong>, specializing in <strong class="font-semibold text-[#131313]">cross-border partnerships and business development</strong>. She navigates nuanced intercultural environments to build high-trust commercial pathways between emerging and developed ecosystems.
                </p>
              </div>
              <div class="founder-stage-img relative w-full max-w-[600px] overflow-hidden rounded-xl shadow-xs mt-3"><img class="w-full h-auto aspect-[600/346] object-cover object-center block" src="{{ asset('themes/inbetween_v2/images/founder-airu-stage.png') }}" alt="AIRU - Cross-border partnerships and business development"></div>
            </div>
            <div class="founder-divider w-full h-[0.5px] bg-[#323232]/20 my-4"></div>
            <div class="founder-detail-section space-y-3">
              <h3 class="text-[15px] sm:text-[16px] font-medium text-[#EC460B] uppercase tracking-wider">FLUENCY IN 3 LANGUAGES
              </h3>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                <div class="p-3.5 rounded-xl bg-white border border-neutral-200/80 shadow-xs">
                  <div class="text-[15px] font-medium text-[#131313]">Vietnamese</div>
                  <div class="text-[12px] font-light text-[#3E3939] mt-0.5">Native / Bilingual</div>
                </div>
                <div class="p-3.5 rounded-xl bg-white border border-neutral-200/80 shadow-xs">
                  <div class="text-[15px] font-medium text-[#131313]">English</div>
                  <div class="text-[12px] font-light text-[#3E3939] mt-0.5">Professional Working</div>
                </div>
                <div class="p-3.5 rounded-xl bg-white border border-neutral-200/80 shadow-xs">
                  <div class="text-[15px] font-medium text-[#131313]">Arabic</div>
                  <div class="text-[12px] font-light text-[#3E3939] mt-0.5">Working Proficiency</div>
                </div>
              </div>
            </div>
            <div class="founder-divider w-full h-[0.5px] bg-[#323232]/20 my-4"></div>
            <div class="founder-detail-section space-y-3">
              <h3 class="text-[15px] sm:text-[16px] font-medium text-[#EC460B] uppercase tracking-wider">OWN MEDIA PLATFORM WITH 35K+ FOLLOWERS
              </h3>
              <p class="text-[13px] sm:text-[14px] lg:text-[14.5px] font-light text-[#3E3939] leading-relaxed tracking-normal">Host and curator of leading cross-border business discussions, podcasts, and intercultural networking series with an engaged executive community of over 35,000 global founders, investors, and industry decision-makers.
              </p>
              <div class="founder-media-img relative w-full max-w-[600px] overflow-hidden rounded-xl shadow-xs mt-3"><img class="w-full h-auto aspect-[600/320] object-cover object-center block" src="{{ asset('themes/inbetween_v2/images/image 13.png') }}" alt="AiRu executive business podcast and cross-border commercial dialogue"></div>
            </div>
            <div class="founder-divider w-full h-[0.5px] bg-[#323232]/20 my-4"></div>
            <div class="founder-detail-section space-y-3">
              <h3 class="text-[15px] sm:text-[16px] font-medium text-[#EC460B] uppercase tracking-wider">CROSS-BORDER EXPERTISE &amp; REGIONS
              </h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                <div class="p-4 rounded-xl bg-white border border-neutral-200/80 shadow-xs space-y-1">
                  <div class="text-[14px] font-medium text-[#EC460B] uppercase tracking-wide">Europe</div>
                  <p class="text-[13px] font-light text-[#3E3939] leading-relaxed">Facilitating bilateral enterprise cooperation, multilateral trade dialogs, and specialized technology exchange between EU innovation hubs and Southeast Asia.</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-neutral-200/80 shadow-xs space-y-1">
                  <div class="text-[14px] font-medium text-[#EC460B] uppercase tracking-wide">The Arab Region</div>
                  <p class="text-[13px] font-light text-[#3E3939] leading-relaxed">Advising cross-regional joint ventures, sovereign investment dialogues, and executive business missions across the GCC and North Africa.</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-neutral-200/80 shadow-xs space-y-1">
                  <div class="text-[14px] font-medium text-[#EC460B] uppercase tracking-wide">Africa</div>
                  <p class="text-[13px] font-light text-[#3E3939] leading-relaxed">Establishing foundational distributor channels, industrial supply chain links, and public-private sector partnerships in high-growth frontier markets.</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-neutral-200/80 shadow-xs space-y-1">
                  <div class="text-[14px] font-medium text-[#EC460B] uppercase tracking-wide">Asia &amp; Vietnam</div>
                  <p class="text-[13px] font-light text-[#3E3939] leading-relaxed">Serving as on-the-ground operational anchor for foreign SMEs and founders entering Vietnam, from market validation to entity formation and commercial scale.</p>
                </div>
              </div>
            </div>
            <div class="founder-divider w-full h-[0.5px] bg-[#323232]/20 my-4"></div>
            <div class="founder-detail-section space-y-3">
              <h3 class="text-[15px] sm:text-[16px] font-medium text-[#EC460B] uppercase tracking-wider">BUSINESS DEVELOPMENT &amp; STRATEGIC ALLIANCES
              </h3>
              <p class="text-[13px] sm:text-[14px] lg:text-[14.5px] font-light text-[#3E3939] leading-relaxed tracking-normal">At INBETWEEN, AiRu leverages deep relational equity and agile localized strategies to bridge international standards with Vietnam's dynamic commercial realities. Her approach removes operational friction, minimizes foreign market entry risk, and accelerates time-to-market for pioneering ventures.
              </p>
            </div>
            <div class="pt-2 pb-2">
              <div class="p-5 rounded-2xl bg-white border border-neutral-200/90 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 max-w-[600px]">
                <div class="space-y-1">
                  <h4 class="text-[16px] font-medium text-[#131313]">START A CONVERSATION</h4>
                  <p class="text-[13px] font-light text-[#3E3939]">Explore how INBETWEEN can serve as your dedicated local team before you are ready to hire one.</p>
                </div>
                <div class="shrink-0"><a class="inbetween-btn-pill inline-flex items-center justify-between gap-4 pl-6 pr-2 py-2 rounded-full bg-[#131313] text-white text-[16px] font-medium tracking-normal hover:bg-[#3E3939] transition-all duration-300 shadow-md group shrink-0 cursor-pointer" href="#contact" data-contact-modal-toggle="" title="Let's Connect With AiRu"><span class="font-medium">Let's Connect With AiRu</span><span class="w-8 h-8 rounded-full bg-white text-[#131313] flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1 shrink-0">
                      <svg class="w-3.5 h-3.5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.33334 8H12.6667M12.6667 8L8.66668 4M12.6667 8L8.66668 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="founder-bottom-line w-full h-[0.5px] bg-[#323232]/80 mt-3 hidden"></div>
        </div>
      </div>
    </div>
  </div>
</section>
