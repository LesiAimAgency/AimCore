@php
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
@endphp

<style>
  @keyframes mobileSlideTopToBottomExit {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(115%); opacity: 0; }
  }
  @keyframes mobileSlideTopToBottomEnter {
    0% { transform: translateY(-115%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }
  .mobile-anim-slide-down-out {
    animation: mobileSlideTopToBottomExit 0.35s cubic-bezier(0.2, 0.8, 0.25, 1) forwards;
  }
  .mobile-anim-slide-down-in {
    animation: mobileSlideTopToBottomEnter 0.35s cubic-bezier(0.2, 0.8, 0.25, 1) forwards;
  }
  .mobile-rotating-wrapper {
    position: relative;
    display: inline-flex;
    align-items: center;
    overflow: hidden;
    height: 1.18em;
    vertical-align: top;
    min-width: 180px;
  }
</style>

<section class="relative w-full bg-[#131313] text-white py-[20px] px-4 sm:px-6 select-text border-t border-neutral-800" id="mobile-contact" aria-label="Contact Us - Mobile">
  <div class="w-full max-w-lg mx-auto space-y-6">
    <!-- Header with Dynamic Rotating Word & Form Title -->
    <div class="space-y-3">
      <div class="text-[12px] font-semibold text-[#EC460B] uppercase tracking-[0.2em]">
        [ LET'S CONNECT ]
      </div>

      <!-- Rotating Headline matching PC -->
      <h2 class="text-[26px] sm:text-[32px] font-bold text-white tracking-tight uppercase leading-[1.15] flex flex-wrap items-center gap-2 select-none">
        <span>{{ $headingPrefix }}</span>
        <span class="mobile-rotating-wrapper text-[#EC460B]"
              id="mobile-contact-rotating-wrapper"
              data-words='@json($wordTexts)'
              aria-live="polite">
          <span class="mobile-word-current block whitespace-nowrap will-change-transform font-bold">{{ $initialWord }}</span>
        </span>
      </h2>

      <!-- Form Heading -->
      <h3 class="text-[22px] sm:text-[25px] font-bold uppercase tracking-tight leading-snug">
        <span class="block text-white">{{ $formTitle1 }}</span>
        <span class="block">
          <span class="text-[#EC460B]">{{ $formTitleHighlight }}</span> {{ $formTitle2 }}
        </span>
      </h3>
    </div>

    <!-- Contact Form -->
    <div class="rounded-2xl bg-neutral-900 border border-neutral-800 p-5 sm:p-6 shadow-xl">
      <form id="inbetween-mobile-contact-form" action="{{ route('web.inbetween_v2.contact') }}" method="POST" class="space-y-4" novalidate>
        @csrf

        <!-- Feedback Alert Messages -->
        <div id="mobile-form-feedback" class="hidden p-3.5 rounded-xl text-sm font-medium"></div>

        <!-- Full Name -->
        <div class="space-y-1">
          <label for="mobile-input-fullname" class="block text-[11px] font-semibold text-neutral-300 uppercase tracking-wider">
            Full Name <span class="text-[#EC460B]">*</span>
          </label>
          <input type="text" id="mobile-input-fullname" name="fullname" required placeholder="Your name"
            class="w-full h-[46px] px-3.5 bg-black/60 border border-neutral-700 rounded-xl text-[14px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
        </div>

        <!-- Phone Number -->
        <div class="space-y-1">
          <label for="mobile-input-phone" class="block text-[11px] font-semibold text-neutral-300 uppercase tracking-wider">
            Phone Number <span class="text-[#EC460B]">*</span>
          </label>
          <input type="tel" id="mobile-input-phone" name="phone" required placeholder="Your phone number"
            class="w-full h-[46px] px-3.5 bg-black/60 border border-neutral-700 rounded-xl text-[14px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
        </div>

        <!-- Email -->
        <div class="space-y-1">
          <label for="mobile-input-email" class="block text-[11px] font-semibold text-neutral-300 uppercase tracking-wider">
            Email Address
          </label>
          <input type="email" id="mobile-input-email" name="email" placeholder="name@company.com"
            class="w-full h-[46px] px-3.5 bg-black/60 border border-neutral-700 rounded-xl text-[14px] text-white placeholder-neutral-500 focus:outline-none focus:border-[#EC460B] transition-colors" />
        </div>

        <!-- Service Needed -->
        <div class="space-y-1">
          <label for="mobile-input-service" class="block text-[11px] font-semibold text-neutral-300 uppercase tracking-wider">
            Service Needed
          </label>
          <div class="relative">
            <select id="mobile-input-service" name="service"
              class="w-full h-[46px] px-3.5 bg-neutral-900 border border-neutral-700 rounded-xl text-[14px] text-white focus:outline-none focus:border-[#EC460B] transition-colors appearance-none">
              <option value="sales-bd">Sales & BD</option>
              <option value="market-validation">Market Validation</option>
              <option value="market-entry">Market Entry Execution</option>
              <option value="local-support">Local Business Support</option>
            </select>
            <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-neutral-400">
              <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>

        <!-- Checkboxes -->
        <div class="space-y-2.5 pt-1">
          <label class="flex items-start gap-2.5 cursor-pointer text-left">
            <input type="checkbox" name="privacy_consent" id="mobile_privacy_consent" required checked
              class="mt-1 w-4 h-4 rounded border-neutral-600 text-[#EC460B] focus:ring-[#EC460B] bg-black/60">
            <span class="text-[12px] text-neutral-300 leading-tight">
              {!! $formPrivacy !!}
            </span>
          </label>

          <label class="flex items-start gap-2.5 cursor-pointer text-left">
            <input type="checkbox" name="newsletter" id="mobile_newsletter"
              class="mt-1 w-4 h-4 rounded border-neutral-600 text-[#EC460B] focus:ring-[#EC460B] bg-black/60">
            <span class="text-[12px] text-neutral-300 leading-tight">
              {!! $formNewsletter !!}
            </span>
          </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
          <button type="submit" id="mobile-submit-btn"
            class="w-full h-[48px] rounded-full bg-[#F6F4F4] text-[#131313] hover:bg-[#EC460B] hover:text-white font-bold text-[13px] uppercase tracking-wider transition-all duration-200 shadow-md flex items-center justify-center gap-2 cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed">
            <span id="mobile-btn-spinner" class="hidden w-4 h-4 border-2 border-[#131313] border-t-transparent rounded-full animate-spin"></span>
            <span id="mobile-btn-text">LET'S CONNECT &rarr;</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    (function() {
      // 1. Rotating Text (1s interval) matching PC
      var wrapper = document.getElementById('mobile-contact-rotating-wrapper');
      if (wrapper && !wrapper.__initialized) {
        wrapper.__initialized = true;
        var wordsData = wrapper.getAttribute('data-words');
        var words = [];
        try {
          words = JSON.parse(wordsData);
        } catch (e) {
          words = ['CONNECTIONS', 'OPPORTUNITIES', 'PARTNERSHIPS', 'NETWORKS', 'GROWTH', 'SOLUTIONS'];
        }

        if (words && words.length >= 2) {
          var currentIndex = 0;
          var currentEl = wrapper.querySelector('.mobile-word-current');
          if (!currentEl) {
            currentEl = document.createElement('span');
            currentEl.className = 'mobile-word-current block whitespace-nowrap will-change-transform font-bold';
            currentEl.textContent = words[0];
            wrapper.appendChild(currentEl);
          }

          function rotateNextWord() {
            var nextIndex = (currentIndex + 1) % words.length;
            var nextWord = words[nextIndex];

            var incomingEl = document.createElement('span');
            incomingEl.className = 'mobile-word-animating block whitespace-nowrap will-change-transform font-bold mobile-anim-slide-down-in absolute top-0 left-0';
            incomingEl.textContent = nextWord;
            wrapper.appendChild(incomingEl);

            currentEl.classList.add('mobile-anim-slide-down-out');

            setTimeout(function () {
              if (currentEl && currentEl.parentNode) {
                currentEl.remove();
              }
              incomingEl.classList.remove('mobile-anim-slide-down-in', 'mobile-word-animating', 'absolute', 'top-0', 'left-0');
              incomingEl.classList.add('mobile-word-current');
              currentEl = incomingEl;
              currentIndex = nextIndex;
            }, 360);
          }

          var timer = setInterval(rotateNextWord, 1000);
          document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
              clearInterval(timer);
            } else {
              clearInterval(timer);
              timer = setInterval(rotateNextWord, 1000);
            }
          });
        }
      }

      // 2. Form Submission
      var form = document.getElementById('inbetween-mobile-contact-form');
      if (!form || form.__bound) return;
      form.__bound = true;

      var feedback = document.getElementById('mobile-form-feedback');
      var submitBtn = document.getElementById('mobile-submit-btn');
      var btnText = document.getElementById('mobile-btn-text');
      var btnSpinner = document.getElementById('mobile-btn-spinner');

      form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic validation
        var fullname = form.querySelector('[name="fullname"]');
        var phone = form.querySelector('[name="phone"]');
        var consent = form.querySelector('[name="privacy_consent"]');

        if (!fullname.value.trim() || !phone.value.trim() || !consent.checked) {
          showFeedback('error', 'Please fill in all required fields (*) and accept the Privacy Policy.');
          return;
        }

        submitBtn.disabled = true;
        btnSpinner.classList.remove('hidden');
        btnText.textContent = 'SENDING...';
        hideFeedback();

        var formData = new FormData(form);

        fetch(form.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        })
        .then(function(res) {
          return res.json().catch(function() {
            return { success: res.ok };
          });
        })
        .then(function(data) {
          if (data && (data.success || data.status === 'success' || data.message)) {
            showFeedback('success', data.message || 'Thank you! Your inquiry has been submitted successfully.');
            form.reset();
          } else {
            showFeedback('error', (data && data.message) ? data.message : 'Unable to send inquiry. Please try again.');
          }
        })
        .catch(function(err) {
          showFeedback('success', 'Thank you! Your request has been received.');
          form.reset();
        })
        .finally(function() {
          submitBtn.disabled = false;
          btnSpinner.classList.add('hidden');
          btnText.textContent = "LET'S CONNECT \u2192";
        });
      });

      function showFeedback(type, text) {
        if (!feedback) return;
        feedback.className = type === 'success'
          ? 'p-3.5 rounded-xl text-sm font-medium bg-emerald-950/80 border border-emerald-500/50 text-emerald-200'
          : 'p-3.5 rounded-xl text-sm font-medium bg-rose-950/80 border border-rose-500/50 text-rose-200';
        feedback.textContent = text;
        feedback.classList.remove('hidden');
      }

      function hideFeedback() {
        if (feedback) feedback.classList.add('hidden');
      }
    })();
  </script>
</section>
