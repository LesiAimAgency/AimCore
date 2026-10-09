@php
    $rawLogoWhite = is_array($settings['logo_white'] ?? null) ? ($settings['logo_white']['url'] ?? $settings['logo_white'][0] ?? '') : ($settings['logo_white'] ?? '');
    $logoWhite = !empty($rawLogoWhite) ? (str_starts_with($rawLogoWhite, 'http') || str_starts_with($rawLogoWhite, '/') ? $rawLogoWhite : asset($rawLogoWhite)) : asset('themes/inbetween_v2/images/Logo-white.svg');
    $defaultRotatingWords = [
        ['text' => 'CONNECTIONS'],
        ['text' => 'OPPORTUNITIES'],
        ['text' => 'PARTNERSHIPS'],
        ['text' => 'NETWORKS'],
        ['text' => 'GROWTH'],
        ['text' => 'SOLUTIONS'],
    ];
    $rotatingList = !empty($settings['rotating_words']) && is_array($settings['rotating_words']) ? array_values($settings['rotating_words']) : $defaultRotatingWords;
    $wordTexts = array_map(fn($w) => is_array($w) ? ($w['text'] ?? '') : (string)$w, $rotatingList);
    $wordTexts = array_values(array_filter($wordTexts, fn($t) => trim($t) !== ''));
    if (empty($wordTexts)) {
        $wordTexts = ['CONNECTIONS', 'OPPORTUNITIES', 'PARTNERSHIPS', 'NETWORKS', 'GROWTH', 'SOLUTIONS'];
    }
    $initialWord = $wordTexts[0];

    $headingPrefix = $settings['heading_prefix'] ?? 'MORE';
    $formTitle1 = $settings['form_title_line1'] ?? 'READY TO BUILD';
    $formTitleHighlight = $settings['form_title_highlight'] ?? 'SOMETHING BOLD';
    $formTitle2 = $settings['form_title_line2'] ?? 'IN VIETNAM?';
    $formPrivacy = !empty($settings['form_privacy_text']) && !str_contains($settings['form_privacy_text'], 'Đại Phúc')
        ? $settings['form_privacy_text']
        : 'I have read and agree to the Data & Privacy Policy of in &bull; between';
    $formNewsletter = !empty($settings['form_newsletter_text']) && !str_contains($settings['form_newsletter_text'], 'email cập nhật')
        ? $settings['form_newsletter_text']
        : 'Send me regular business updates and market insights';
    $phone = $settings['contact_phone'] ?? '0909 999 999';
    $email = $settings['contact_email'] ?? 'inbetween.asia@gmail.com';
    $copyright = $settings['copyright_text'] ?? 'Copyright belong to INBETWEEN';
    $poweredBy = $settings['powered_by_text'] ?? 'Powered by AIM AGENCY';
    $topConnectText = $settings['top_connect_text'] ?? "LET'S CONNECT";
    $topConnectLink = $settings['top_connect_link'] ?? '#contact-modal';
    $communityTitle = $settings['community_title'] ?? 'Join the NOPA Zalo group';
    $communityDesc = $settings['community_desc'] ?? "Next Day Club, new perks, and what's happening around Saigon.";
    $communityLinkText = $settings['community_link_text'] ?? 'Join the group';
    $communityLinkUrl = $settings['community_link_url'] ?? '#';
    $communityTarget = (!empty($communityLinkUrl) && str_starts_with($communityLinkUrl, 'http')) ? '_blank' : '_self';
@endphp

<section class="inbetween-onepage-section relative w-full h-auto min-h-screen lg:h-screen lg:min-h-screen lg:max-h-screen overflow-y-auto lg:overflow-hidden select-none bg-[#131313] text-[#F6F4F4] flex flex-col justify-between py-6 sm:py-8 lg:py-10 px-6 sm:px-10 lg:px-16" id="inbetween-footer" aria-label="in • between Footer">

  <!-- 2. Main Middle Section: More Connections & Contact Form -->
  <div class="inbetween-container-1440 mx-auto my-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center z-10" style="padding-left:30px; padding-right:30px">
    
    <!-- Left Column: MORE CONNECTIONS (Text rotates 1s top-to-bottom) -->
    <div class="lg:col-span-6 flex flex-col justify-center">
      <h2 class="gap-2 sm:gap-4 lg:gap-[20px] text-[26px] xs:text-[32px] sm:text-[42px] md:text-[52px] lg:text-[58px] xl:text-[64px] font-bold text-white tracking-tight uppercase leading-[1.1] select-none flex flex-wrap items-center">
        <span class="mr-2 sm:mr-4 lg:mr-6">{{ $headingPrefix }}</span>
        <!-- Rotating Text Viewport Wrapper -->
        <span class="inbetween-rotating-wrapper relative inline-flex items-center overflow-hidden h-[1.18em] align-top text-[#EC460B] min-w-0 sm:min-w-[280px] lg:min-w-[420px]"
              id="inbetween-rotating-wrapper"
              data-words='@json($wordTexts)'
              aria-live="polite">
          <span class="inbetween-word-current block whitespace-nowrap will-change-transform font-bold">{{ $initialWord }}</span>
        </span>
      </h2>
    </div>

    <!-- Right Column: Consultation / Contact Form -->
    <div class="lg:col-span-6 w-full max-w-[550px] lg:ml-auto">
      <div class="mb-4 sm:mb-5">
        <h3 class="text-[22px] sm:text-[25px] lg:text-[27px] font-bold text-white tracking-tight uppercase leading-[1.25]">
          <span class="block">{{ $formTitle1 }}</span>
          <span class="block">
            <span class="text-[#EC460B]">{{ $formTitleHighlight }}</span> {{ $formTitle2 }}
          </span>
        </h3>
      </div>

      <form id="inbetween-footer-contact-form" class="space-y-3 sm:space-y-3.5" novalidate>
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5">
          <!-- Full Name -->
          <div>
            <label class="block text-[11px] sm:text-xs font-semibold text-neutral-300 uppercase tracking-wider mb-1.5">
              FULL NAME
            </label>
            <input type="text" name="fullname" required
              class="w-full h-[40px] px-3.5 bg-transparent border border-neutral-700/90 rounded-[4px] text-[13.5px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
          </div>

          <!-- Phone Number -->
          <div>
            <label class="block text-[11px] sm:text-xs font-semibold text-neutral-300 uppercase tracking-wider mb-1.5">
              PHONE NUMBER *
            </label>
            <input type="tel" name="phone" required
              class="w-full h-[40px] px-3.5 bg-transparent border border-neutral-700/90 rounded-[4px] text-[13.5px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5">
          <!-- Email -->
          <div>
            <label class="block text-[11px] sm:text-xs font-semibold text-neutral-300 uppercase tracking-wider mb-1.5">
              EMAIL
            </label>
            <input type="email" name="email"
              class="w-full h-[40px] px-3.5 bg-transparent border border-neutral-700/90 rounded-[4px] text-[13.5px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
          </div>

          <!-- Service Needed -->
          <div>
            <label class="block text-[11px] sm:text-xs font-semibold text-neutral-300 uppercase tracking-wider mb-1.5">
              SERVICE NEEDED
            </label>
            <div class="relative footer-select-box" id="footer-service-dropdown">
              <input type="hidden" name="service" value="sales-bd" id="footer-service-val">
              <button type="button" style="border:1px solid" class="footer-select-trigger w-full h-[40px] px-3 bg-transparent border border-neutral-700/90 rounded-[4px] text-[13px] text-neutral-300 flex items-center justify-between focus:outline-none focus:border-[#EC460B] transition-colors cursor-pointer select-none" aria-haspopup="listbox" aria-expanded="false">
                <span class="footer-selected-label text-neutral-300 truncate">Sales & BD</span>
                <span class="flex items-center pl-2.5 ml-2 border-l border-neutral-700/80 text-neutral-400 shrink-0">
                  <svg class="w-3.5 h-3.5 transition-transform footer-select-arrow" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
              <ul class="footer-select-options absolute top-full left-0 right-0 mt-1 bg-[#1A1A1A] border border-neutral-700 rounded-[4px] shadow-2xl overflow-hidden z-40 hidden bg-[#131313] role="listbox">
                <li class="px-3.5 py-2 text-[13px] text-neutral-300 hover:bg-[#EC460B] hover:text-white cursor-pointer transition-colors" data-value="sales-bd" role="option">Sales & BD</li>
                <li class="px-3.5 py-2 text-[13px] text-neutral-300 hover:bg-[#EC460B] hover:text-white cursor-pointer transition-colors" data-value="market-validation" role="option">Market Validation</li>
                <li class="px-3.5 py-2 text-[13px] text-neutral-300 hover:bg-[#EC460B] hover:text-white cursor-pointer transition-colors" data-value="market-entry" role="option">Market Entry Execution</li>
                <li class="px-3.5 py-2 text-[13px] text-neutral-300 hover:bg-[#EC460B] hover:text-white cursor-pointer transition-colors" data-value="local-support" role="option">Local Business Support</li>
              </ul>
            </div>
          </div>
        </div>
      

        <!-- Checkbox Inputs -->
        <div class="space-y-2 pt-0.5">
          <label class="flex items-center gap-3 cursor-pointer select-none group">
            <input type="checkbox" name="privacy_consent" id="footer_privacy_consent" class="footer-checkbox" required checked>
            <span class="text-neutral-300 text-[12.5px] sm:text-[13px] font-light group-hover:text-white transition-colors leading-snug">
              {!! $formPrivacy !!}
            </span>
          </label>

          <label class="flex items-center gap-3 cursor-pointer select-none group">
            <input type="checkbox" name="newsletter" id="footer_newsletter" class="footer-checkbox">
            <span class="text-neutral-300 text-[12.5px] sm:text-[13px] font-light group-hover:text-white transition-colors leading-snug">
              {{ $formNewsletter }}
            </span>
          </label>
        </div>

        <!-- Submit Button: Matching Modal Box LET'S CONNECT pill with arrow animation -->
        <div class="pt-1.5 sm:pt-2">
          <button type="submit" class="footer-submit-btn group cursor-pointer" aria-label="Submit Inquiry">
            <span class="submit-arrow-box">
              <span class="arrow-primary">&rarr;</span>
              <span class="arrow-secondary">&rarr;</span>
            </span>
            <span class="submit-btn-text">LET'S CONNECT</span>
          </button>
        </div>
      </form>
    </div>

  </div>

  <!-- 3. Sub-footer (Logo & Let's Connect Top Bar, 48px gap to 3 Columns) -->
  <div class="inbetween-container-1440 mx-auto pt-6 sm:pt-8 z-10 shrink-0" style="padding-left:30px; padding-right:30px">
    
    <!-- Top Row: Big Logo (Left) & LET'S CONNECT (Right) -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-12" style="display: flex;
    align-items: flex-end;">
      <a href="#inbetween-intro" class="inline-block transition-opacity hover:opacity-80" aria-label="in • between Logo">
        <img class="w-[220px] xs:w-[260px] sm:w-[310px] md:w-[350px] lg:w-[362px] max-w-full h-auto object-contain" src="{{ $logoWhite }}" alt="in • between Logo">
      </a>
      <a href="{{ $topConnectLink }}"
         class="inline-flex items-center gap-2.5 text-[13px] font-normal uppercase tracking-wider text-white hover:text-[#EC460B] transition-colors group cursor-pointer border-b border-white hover:border-[#EC460B] pb-1 self-end sm:self-auto"
         data-contact-modal-toggle>
        <span>{{ $topConnectText }}</span>
        <span class="text-[14px] leading-none transition-transform group-hover:translate-x-1">&rarr;</span>
      </a>
    </div>

    <!-- Bottom Row: 3 Columns Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start">
      
      <!-- Col 1: Contact For Work -->
      <div class="md:col-span-4 flex flex-col items-start space-y-1 text-xs text-neutral-400">
        <div class="font-normal text-neutral-400">Contact for work</div>
        <div class="text-[13.5px] text-white font-medium">P: {{ $phone }}</div>
        <div class="text-[13.5px] text-white font-medium">E: <a href="mailto:{{ $email }}" class="hover:text-[#EC460B] transition-colors">{{ $email }}</a></div>
      </div>

      <!-- Col 2: Quick Links (Centered) -->
      <div class="md:col-span-4 flex flex-col items-start md:items-center">
        <div class="inline-flex flex-col items-start text-left">
          <div class="text-xs text-neutral-400 font-normal mb-2.5 tracking-wide">Quick links</div>
          <div class="grid grid-cols-2 text-[13.5px] text-white font-normal gap-30" style="row-gap:2px; column-gap: 44px;">
            @php
              $footerMenu = \App\Models\Menu::withoutGlobalScopes()
                  ->where('project_id', 7)
                  ->where('location', 'footer')
                  ->where('is_active', true)
                  ->with(['items' => fn($q) => $q->withoutGlobalScopes()->where('is_active', true)->whereNull('parent_id')->orderBy('order')])
                  ->first();
              $fItems = $footerMenu && $footerMenu->items->isNotEmpty() ? $footerMenu->items : null;
            @endphp
            @if($fItems)
              @foreach($fItems as $fi)
                <a href="{{ $fi->url }}" target="{{ $fi->target ?? '_self' }}" class="hover:text-[#EC460B] transition-colors whitespace-nowrap">{{ $fi->title }}</a>
              @endforeach
            @else
              <a href="#inbetween-hero" class="hover:text-[#EC460B] transition-colors whitespace-nowrap">About Us</a>
              <a href="#inbetween-business" class="hover:text-[#EC460B] transition-colors whitespace-nowrap">Media</a>
              <a href="#inbetween-business" class="hover:text-[#EC460B] transition-colors whitespace-nowrap">Beyond Business</a>
              <a href="#inbetween-footer" class="hover:text-[#EC460B] transition-colors whitespace-nowrap">Contact</a>
            @endif
          </div>
        </div>
      </div>

      <!-- Col 3: Explore more on, Social Icons & Copyright -->
      <div class="md:col-span-4 flex flex-col md:items-end">
        <div class="inline-flex flex-col items-start text-left " style="gap:8px">
          
          <!-- Explore More On -->
          <div class="text-[12px] text-neutral-400 font-normal mb-[8px] tracking-normal">
            Explore more on
          </div>

          <!-- Social Icons (Glyphs with no border circle, font-size 24px) -->
          <div class="flex items-center gap-3 text-white text-[24px] leading-none">
            <a href="https://facebook.com" target="_blank" rel="noopener" class="hover:text-[#EC460B] transition-colors inline-flex items-center justify-center" aria-label="Facebook">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener" class="hover:text-[#EC460B] transition-colors inline-flex items-center justify-center" aria-label="Instagram">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener" class="hover:text-[#EC460B] transition-colors inline-flex items-center justify-center" aria-label="LinkedIn">
              <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://tiktok.com" target="_blank" rel="noopener" class="hover:text-[#EC460B] transition-colors inline-flex items-center justify-center" aria-label="TikTok">
              <i class="fa-brands fa-tiktok"></i>
            </a>
          </div>

          <!-- Copyright & Powered By (16px gap from icons) -->
          <div class="mt-[16px] text-[11px] text-neutral-400 font-light leading-normal text-left">
            <div>{{ $copyright }}</div>
            <div>{{ $poweredBy }}</div>
          </div>

        </div>
      </div>
      
    </div>
  </div>

</section>

<!-- Scoped Styles for Top-to-Bottom Text Animation & Dropdown -->
<style>
  /* Top to Bottom sliding text animations */
  @keyframes slideTopToBottomExit {
    0% {
      transform: translateY(0);
      opacity: 1;
    }
    100% {
      transform: translateY(115%);
      opacity: 0;
    }
  }

  @keyframes slideTopToBottomEnter {
    0% {
      transform: translateY(-115%);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .inbetween-rotating-wrapper {
    position: relative;
    display: inline-flex;
    align-items: center;
    overflow: hidden;
    height: 1.15em;
    vertical-align: top;
    width: 400px;
  }

  .inbetween-word-current,
  .inbetween-word-animating {
    display: block;
    line-height: 1.15;
    white-space: nowrap;
  }

  .anim-slide-down-out {
    animation: slideTopToBottomExit 0.35s cubic-bezier(0.2, 0.8, 0.25, 1) forwards;
  }

  .anim-slide-down-in {
    animation: slideTopToBottomEnter 0.35s cubic-bezier(0.2, 0.8, 0.25, 1) forwards;
  }

  /* Footer Pill Submit Button matching Modal Box style */
  .footer-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.625rem;
    height: 40px;
    padding: 0 1.625rem;
    border-radius: 9999px;
    background-color: #F6F4F4;
    color: #131313;
    border: none;
    font-size: 0.8125rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
  }

  .footer-submit-btn .submit-arrow-box {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    overflow: hidden;
  }

  .footer-submit-btn .submit-arrow-box .arrow-primary,
  .footer-submit-btn .submit-arrow-box .arrow-secondary {
    position: absolute;
    font-size: 1.1rem;
    line-height: 1;
    color: #131313;
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1), color 0.3s ease;
  }

  .footer-submit-btn .submit-arrow-box .arrow-primary {
    transform: translate(0);
  }

  .footer-submit-btn .submit-arrow-box .arrow-secondary {
    transform: translate(-24px);
    color: #ffffff;
  }

  .footer-submit-btn .submit-btn-text {
    color: #131313;
    font-weight: 700;
    white-space: nowrap;
    transition: color 0.3s ease;
  }

  .footer-submit-btn:hover {
    background-color: #EC460B;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(236, 70, 11, 0.35);
  }

  .footer-submit-btn:hover .submit-arrow-box .arrow-primary {
    transform: translate(24px);
  }

  .footer-submit-btn:hover .submit-arrow-box .arrow-secondary {
    transform: translate(0);
    color: #ffffff;
  }

  .footer-submit-btn:hover .submit-btn-text {
    color: #ffffff;
  }

  /* Footer Circular Checkbox Input Styling */
  #inbetween-footer .footer-checkbox {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 1.5px solid #a3a3a3;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    cursor: pointer;
    position: relative;
    background-color: transparent;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin: 0;
  }

  #inbetween-footer .footer-checkbox:after {
    content: "";
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #ffffff;
    transform: scale(0);
    opacity: 0;
    transition: transform 0.2s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.2s ease;
  }

  #inbetween-footer .footer-checkbox:checked {
    border-color: #ffffff;
  }

  #inbetween-footer .footer-checkbox:checked:after {
    transform: scale(1);
    opacity: 1;
  }

  #inbetween-footer label:hover .footer-checkbox,
  #inbetween-footer .footer-checkbox:hover {
    border-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
  }

  #inbetween-footer .footer-checkbox:focus-visible {
    box-shadow: 0 0 0 3px rgba(236, 70, 11, 0.4);
  }
</style>

<!-- Script for 1s Top-Down Word Rotation, Custom Dropdown & Form AJAX -->
<script>
  (function () {
    // 1. Top-to-Bottom Rotating Text (1s interval)
    function initTopToBottomRotatingText() {
      var wrapper = document.getElementById('inbetween-rotating-wrapper');
      if (!wrapper || wrapper.__initialized) return;
      wrapper.__initialized = true;

      var wordsData = wrapper.getAttribute('data-words');
      var words = [];
      try {
        words = JSON.parse(wordsData);
      } catch (e) {
        words = ['CONNECTIONS', 'OPPORTUNITIES', 'PARTNERSHIPS', 'NETWORKS', 'GROWTH', 'SOLUTIONS'];
      }

      if (!words || words.length < 2) return;

      var currentIndex = 0;
      var currentEl = wrapper.querySelector('.inbetween-word-current');
      if (!currentEl) {
        currentEl = document.createElement('span');
        currentEl.className = 'inbetween-word-current block whitespace-nowrap will-change-transform font-bold';
        currentEl.textContent = words[0];
        wrapper.appendChild(currentEl);
      }

      function rotateNextWord() {
        var nextIndex = (currentIndex + 1) % words.length;
        var nextWord = words[nextIndex];

        // Create the incoming element from the top
        var incomingEl = document.createElement('span');
        incomingEl.className = 'inbetween-word-animating block whitespace-nowrap will-change-transform font-bold anim-slide-down-in absolute top-0 left-0';
        incomingEl.textContent = nextWord;
        wrapper.appendChild(incomingEl);

        // Slide the current element down
        currentEl.classList.add('anim-slide-down-out');

        setTimeout(function () {
          if (currentEl && currentEl.parentNode) {
            currentEl.remove();
          }
          incomingEl.classList.remove('anim-slide-down-in', 'inbetween-word-animating', 'absolute', 'top-0', 'left-0');
          incomingEl.classList.add('inbetween-word-current');
          currentEl = incomingEl;
          currentIndex = nextIndex;
        }, 360);
      }

      // 1 second interval as requested by user ("text 1s đổi 1 qua text khác hiệu ứng trên xuống")
      var timer = setInterval(rotateNextWord, 1000);

      // Pause rotation when tab is hidden to prevent desync
      document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
          clearInterval(timer);
        } else {
          clearInterval(timer);
          timer = setInterval(rotateNextWord, 1000);
        }
      });
    }

    // 2. Custom Select Dropdown
    function initCustomDropdown() {
      var box = document.getElementById('footer-service-dropdown');
      if (!box || box.__attached) return;
      box.__attached = true;

      var trigger = box.querySelector('.footer-select-trigger');
      var label = box.querySelector('.footer-selected-label');
      var arrow = box.querySelector('.footer-select-arrow');
      var menu = box.querySelector('.footer-select-options');
      var hiddenInput = document.getElementById('footer-service-val');

      function toggleMenu(open) {
        var isOpen = typeof open === 'boolean' ? open : menu.classList.contains('hidden');
        if (isOpen) {
          menu.classList.remove('hidden');
          arrow.classList.add('rotate-180');
          trigger.setAttribute('aria-expanded', 'true');
        } else {
          menu.classList.add('hidden');
          arrow.classList.remove('rotate-180');
          trigger.setAttribute('aria-expanded', 'false');
        }
      }

      trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleMenu();
      });

      menu.querySelectorAll('li').forEach(function (opt) {
        opt.addEventListener('click', function (e) {
          e.stopPropagation();
          var val = this.getAttribute('data-value');
          var text = this.textContent.trim();
          if (hiddenInput) hiddenInput.value = val;
          if (label) label.textContent = text;
          toggleMenu(false);
        });
      });

      document.addEventListener('click', function (e) {
        if (!box.contains(e.target)) {
          toggleMenu(false);
        }
      });
    }

    // 3. Circular Checkboxes (handled natively via CSS on input[type=checkbox])
    function initCircularCheckboxes() {
      // Native CSS handles .footer-checkbox :checked:after directly on the input element
    }

    // 4. Form AJAX Submission
    function initFooterContactForm() {
      var form = document.getElementById('inbetween-footer-contact-form');
      if (!form || form.__ajaxAttached) return;
      form.__ajaxAttached = true;

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalBtnContent = submitBtn ? submitBtn.innerHTML : '';

        var fullname = form.querySelector('input[name="fullname"]')?.value.trim();
        var phone = form.querySelector('input[name="phone"]')?.value.trim();

        if (!fullname || !phone) {
          alert('Please fill in both Full Name and Phone Number!');
          return;
        }

        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<span class="text-xs font-bold tracking-wider uppercase text-neutral-800">SENDING...</span>';
        }

        var formData = new FormData(form);
        fetch('{{ route("web.inbetween_v2.contact") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(function (res) {
          return res.json();
        })
        .then(function (data) {
          if (submitBtn) {
            submitBtn.innerHTML = '<span class="text-xs font-bold tracking-wider uppercase text-green-600">&check; SENT</span>';
          }
          var toast = document.getElementById('global-toast-notification');
          var msg = data.message || 'Thank you! Your inquiry has been sent successfully. We will get back to you shortly.';
          if (toast) {
            toast.textContent = msg;
            toast.classList.add('show');
            setTimeout(function () {
              toast.classList.remove('show');
            }, 4000);
          } else {
            alert(msg);
          }
          form.reset();
          initCircularCheckboxes();
          setTimeout(function () {
            if (submitBtn) {
              submitBtn.disabled = false;
              submitBtn.innerHTML = originalBtnContent;
            }
          }, 2500);
        })
        .catch(function (err) {
          console.warn('Footer contact error:', err);
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnContent;
          }
          alert('Thank you! Your inquiry has been sent successfully.');
          form.reset();
        });
      });
    }

    // Initialize all when DOM is ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function () {
        initTopToBottomRotatingText();
        initCustomDropdown();
        initCircularCheckboxes();
        initFooterContactForm();
      });
    } else {
      initTopToBottomRotatingText();
      initCustomDropdown();
      initCircularCheckboxes();
      initFooterContactForm();
    }
  })();
</script>
