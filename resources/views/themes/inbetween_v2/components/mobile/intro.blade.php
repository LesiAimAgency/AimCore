@php
  $rawLogoWhite = is_array($settings['logo_white'] ?? null) ? ($settings['logo_white']['url'] ?? $settings['logo_white'][0] ?? '') : ($settings['logo_white'] ?? '');
  $logoWhite = !empty($rawLogoWhite) ? (str_starts_with($rawLogoWhite, 'http') || str_starts_with($rawLogoWhite, '/') ? $rawLogoWhite : asset($rawLogoWhite)) : asset('themes/inbetween_v2/images/Logo-white.svg');
  $langEn = $settings['lang_en_label'] ?? 'EN';
  $langZh = $settings['lang_zh_label'] ?? '汉语';
  $introSubtitle = $settings['intro_subtitle'] ?? 'Your business is';
  $introTitle = $settings['intro_title'] ?? 'ENTERING VIETNAM?';
  $weCanHelpText = $settings['wecanhelp_text'] ?? 'WE CAN HELP!';

  $defaultWords = [
    ['text' => '[ Find Customers ]'],
    ['text' => 'Find Suppliers'],
    ['text' => 'Business Development'],
    ['text' => 'Build Partnerships'],
    ['text' => 'Market Research'],
    ['text' => 'Coordinate Meetings'],
    ['text' => 'Get Things Done Locally'],
    ['text' => 'Find Talents'],
    ['text' => 'Market Research'],
    ['text' => 'Build Relationships'],
  ];

  $rawWords = !empty($settings['floating_words']) && is_array($settings['floating_words'])
    ? array_values($settings['floating_words'])
    : $defaultWords;

  $wordList = [];
  foreach ($rawWords as $w) {
    $txt = is_array($w) ? ($w['text'] ?? '') : (string)$w;
    if (trim((string)$txt) !== '') {
      $wordList[] = trim((string)$txt);
    }
  }
  if (empty($wordList)) {
    $wordList = array_map(fn($item) => $item['text'], $defaultWords);
  }

  // Exact mobile spatial positioning:
  // Top Zone (6% - 28%) & Bottom Zone (6% - 28% from bottom), leaving middle 35% - 65% 100% clean for title!
  $mobileWordPositions = [
    1 => ['style' => 'top: 6%; left: 4%;', 'class' => 'text-[11.5px] sm:text-[12.5px] font-medium opacity-90'],
    2 => ['style' => 'top: 17%; left: 5%;', 'class' => 'text-[11px] sm:text-[12px] font-normal opacity-70'],
    3 => ['style' => 'top: 6%; right: 4%;', 'class' => 'text-[11.5px] sm:text-[12.5px] font-medium opacity-90'],
    4 => ['style' => 'top: 17%; right: 5%;', 'class' => 'text-[11px] sm:text-[12px] font-normal opacity-70'],
    5 => ['style' => 'top: 27%; right: 6%;', 'class' => 'text-[11px] sm:text-[12px] font-normal opacity-65'],
    6 => ['style' => 'bottom: 27%; right: 5%;', 'class' => 'text-[11px] sm:text-[12px] font-medium opacity-85'],
    7 => ['style' => 'bottom: 16%; right: 4%;', 'class' => 'text-[11.5px] sm:text-[12.5px] font-medium opacity-90'],
    8 => ['style' => 'bottom: 27%; left: 6%;', 'class' => 'text-[11px] sm:text-[12px] font-normal opacity-70'],
    9 => ['style' => 'bottom: 16%; left: 4%;', 'class' => 'text-[11.5px] sm:text-[12.5px] font-medium opacity-85'],
    10 => ['style' => 'bottom: 6%; left: 8%;', 'class' => 'text-[11px] sm:text-[12px] font-normal opacity-65'],
  ];
@endphp

<!-- Mobile Onepage Intro Track (Sticky Pinned Layer with extended height 220vh) -->
<section id="mobile-intro-track" 
         data-section="inbetween-intro" 
         class="relative w-full select-none bg-[#131313]" 
         style="height: 220vh; min-height: 220vh; position: relative; width: 100%; background-color: #131313; background-color: rgb(19 19 19 / var(--tw-bg-opacity, 1));" 
         aria-label="Mobile Intro - Entering Vietnam">
  {{-- Anchor target for mobile nav drawer and page links --}}
  <div id="inbetween-intro" style="position: absolute; top: 0; left: 0; width: 1px; height: 1px; pointer-events: none; opacity: 0;"></div>

  <!-- Sticky Visual Stage (Stays pinned in viewport while scrolling through the 220vh track) -->
  <div id="mobile-intro-sticky" 
       class="sticky top-0 left-0 w-full overflow-hidden bg-[#131313] text-white flex flex-col justify-between items-center z-30 select-none will-change-transform"
       style="position: sticky; top: 0; left: 0; width: 100%; height: 100vh; height: 100dvh; min-height: 100vh; min-height: 100dvh; max-height: 100vh; max-height: 100dvh; background-color: #131313; background-color: rgb(19 19 19 / var(--tw-bg-opacity, 1));">

    <!-- Top Bar: Logo + Language Switcher + Drawer Menu Trigger -->
    <div class="w-full px-5 pt-4 pb-2 flex items-center justify-between select-none shrink-0" 
         style="height: 56px; width: 100%; position: relative; z-index: 40; padding-top: 60px;">
      <a href="#inbetween-intro" class="inline-flex items-center select-none" title="in • between">
        <img src="{{ $logoWhite }}" 
             alt="in • between Logo" 
             class="w-auto h-[22px] object-contain object-left"
             width="131" 
             height="22">
      </a>

      <div class="flex items-center gap-3">
        <!-- Language Switcher -->
        <div class="flex items-center gap-1.5 text-[12px] font-semibold tracking-wider uppercase text-neutral-300 select-none">
          <span class="inbetween-lang-btn inbetween-lang-en active cursor-pointer text-[#EC460B] font-bold" data-lang="en">{{ $langEn }}</span>
          <span class="text-white/40">|</span>
          <span class="inbetween-lang-btn inbetween-lang-zh cursor-pointer text-white/80 hover:text-white transition-colors" data-lang="zh">{{ $langZh }}</span>
        </div>

        <!-- Drawer menu hamburger icon -->
        <button type="button" class="p-1 -mr-1 text-white hover:text-[#EC460B] transition-colors focus:outline-none" data-menu-toggle aria-label="Open navigation menu">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 7H20M4 12H20M4 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Act 1: Main Center Question & Orbiting Floating Words -->
    <div class="relative w-full flex-1 max-w-[500px] mx-auto px-4 flex flex-col items-center justify-center z-20 transition-opacity duration-300"
         id="mobile-act-question-container"
         style="flex: 1 1 auto; height: calc(100% - 120px); width: 100%; position: relative;">

      <!-- Center Question Title Block: Fixed cleanly in vertical middle with zero word collision -->
      <div class="relative z-20 text-center select-none max-w-full px-2 pointer-events-none" 
           id="mobile-center-title-block"
           style="position: relative; z-index: 25;">
        <p class="text-[14px] sm:text-[16px] font-normal text-[#F6F4F4]/90 tracking-normal mb-1.5 transition-all duration-300"
           id="mobile-intro-subtitle">
          {{ $introSubtitle }}
        </p>

        <div class="relative inline-block">
          <h1 class="mobile-intro-gradient text-[26px] sm:text-[32px] font-bold uppercase tracking-tight leading-tight select-none"
              id="mobile-intro-title-base"
              style="color: #FFFFFF !important; background-image: linear-gradient(180deg, #FFFFFF var(--grad-top, 100%), #EC310B var(--grad-bottom, 100%), #F1791C 100%) !important; -webkit-background-clip: text !important; -webkit-text-fill-color: transparent !important; background-clip: text !important; display: inline-block;">
            {{ $introTitle }}
          </h1>
        </div>
      </div>

      <!-- Orbiting Floating Words Group: Sits in dedicated top & bottom zones -->
      <div class="intro-floating-words absolute inset-0 pointer-events-none" 
           id="mobile-floating-words-group"
           style="position: absolute; inset: 0; pointer-events: none;">
        @foreach($wordList as $idx => $wordText)
          @php
            $posNum = ($idx % 10) + 1;
            $posConfig = $mobileWordPositions[$posNum] ?? ['style' => 'top: 10%; left: 5%;', 'class' => 'text-[11px] font-normal opacity-70'];
          @endphp
          <div class="mobile-floating-word absolute {{ $posConfig['class'] }} text-[#F6F4F4] pointer-events-auto cursor-default whitespace-nowrap will-change-transform"
               data-word-idx="{{ $idx + 1 }}"
               data-word-pos="{{ $posNum }}"
               style="{{ $posConfig['style'] }}">
            <span class="mobile-floating-word-inner inline-block will-change-transform">{{ $wordText }}</span>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Act 2: Big WE CAN HELP! Container (Scales up 1.0x -> 14x -> 110x) -->
    <div class="absolute inset-0 z-[30] flex items-center justify-center opacity-0 pointer-events-none select-none overflow-hidden"
         id="mobile-act-wecanhelp-container"
         style="display: none; opacity: 0; z-index: 30;">
      <h2 class="font-bold uppercase tracking-tight text-white whitespace-nowrap will-change-transform font-sans text-center"
          id="mobile-wecanhelp-text"
          style="font-size: clamp(38px, 11vw, 68px); line-height: 1.05; letter-spacing: -0.02em; transform-origin: 50% 50%;">
        {{ $weCanHelpText }}
      </h2>
    </div>



    

  </div>
</section>

<!-- Mobile Onepage Intro Sticky Pinned Controller Script -->
<script>
(function() {
  var track = document.getElementById('mobile-intro-track');
  var stickyStage = document.getElementById('mobile-intro-sticky');
  if (!track || !stickyStage || track.__stickyIntroBound) return;
  track.__stickyIntroBound = true;

  var qContainer = document.getElementById('mobile-act-question-container');
  var centerTitle = document.getElementById('mobile-center-title-block');
  var subtitle = document.getElementById('mobile-intro-subtitle');
  var titleBase = document.getElementById('mobile-intro-title-base');
  var wordsGroup = document.getElementById('mobile-floating-words-group');
  var words = Array.from(stickyStage.querySelectorAll('.mobile-floating-word'));
  var weCanHelpContainer = document.getElementById('mobile-act-wecanhelp-container');
  var weCanHelpText = document.getElementById('mobile-wecanhelp-text');

  var advanceBtn = document.getElementById('mobile-intro-advance-btn');
  var promptCue = document.getElementById('mobile-intro-scroll-prompt');

  // Gradient thresholds per frame
  var gradientSteps = {
    0: { top: 100, bottom: 100 },
    1: { top: 60, bottom: 88 },
    2: { top: 38, bottom: 68 },
    3: { top: 18, bottom: 48 },
    4: { top: -2, bottom: 28 },
    5: { top: -35, bottom: 0 }
  };

  // Word objects for suction calculation and floating physics
  var wordObjects = words.map(function(el, idx) {
    var num = parseInt(el.getAttribute('data-word-idx') || String(idx + 1), 10);
    var inner = el.querySelector('.mobile-floating-word-inner');
    return {
      el: el,
      inner: inner,
      idx: num,
      baseOpacity: parseFloat(window.getComputedStyle(el).opacity) || 0.85,
      phase: idx * 0.7,
      speed: 0.002 + (idx % 3) * 0.0008,
      rangeX: 3 + (idx % 3) * 1.5,
      rangeY: 2.5 + (idx % 2) * 1.5
    };
  });

  // Calculate vector from word to title center
  function getCenterVector(wordEl) {
    if (!wordsGroup || !centerTitle) return { dx: 0, dy: 0 };
    var groupRect = wordsGroup.getBoundingClientRect();
    var titleRect = centerTitle.getBoundingClientRect();
    var titleCenterX = (titleRect.left + titleRect.width / 2) - groupRect.left;
    var titleCenterY = (titleRect.top + titleRect.height / 2) - groupRect.top;
    var wordCenterX = wordEl.offsetLeft + wordEl.offsetWidth / 2;
    var wordCenterY = wordEl.offsetTop + wordEl.offsetHeight / 2;
    return {
      dx: titleCenterX - wordCenterX,
      dy: titleCenterY - wordCenterY
    };
  }

  // Floating drift when at rest (progress < 0.08)
  var currentProgress = 0;
  function runFloatingDrift(time) {
    if (currentProgress < 0.08) {
      wordObjects.forEach(function(item) {
        if (item.inner) {
          var t = (time || performance.now()) * item.speed + item.phase;
          var dx = Math.sin(t) * item.rangeX;
          var dy = Math.cos(t * 0.8) * item.rangeY;
          item.inner.style.transform = 'translate3d(' + dx.toFixed(2) + 'px, ' + dy.toFixed(2) + 'px, 0)';
        }
      });
    }
    requestAnimationFrame(runFloatingDrift);
  }
  requestAnimationFrame(runFloatingDrift);

  // Render stage based on continuous scroll progress (0.0 to 1.0)
  function renderProgress(p) {
    currentProgress = p;

    // Prompt cue visibility
    if (promptCue) {
      if (p > 0.08) {
        promptCue.style.opacity = '0';
        promptCue.style.pointerEvents = 'none';
      } else {
        promptCue.style.opacity = '1';
        promptCue.style.pointerEvents = 'auto';
      }
    }

    // Phase 1: Floating words suction and gradient rise (0.0 to 0.65)
    if (p < 0.65) {
      if (qContainer) {
        qContainer.style.display = 'flex';
        qContainer.style.opacity = '1';
      }
      if (weCanHelpContainer) {
        weCanHelpContainer.style.display = 'none';
        weCanHelpContainer.style.opacity = '0';
      }


      // Map progress [0, 0.60] to frames 0..5
      var frameFloat = Math.min(5, (p / 0.60) * 5);
      var frameInt = Math.floor(frameFloat);
      var frameFrac = frameFloat - frameInt;

      var curGrad = gradientSteps[frameInt] || { top: 100, bottom: 100 };
      var nextGrad = gradientSteps[Math.min(5, frameInt + 1)] || curGrad;
      var topVal = curGrad.top + (nextGrad.top - curGrad.top) * frameFrac;
      var botVal = curGrad.bottom + (nextGrad.bottom - curGrad.bottom) * frameFrac;

      if (titleBase) {
        titleBase.style.setProperty('--grad-top', topVal.toFixed(1) + '%');
        titleBase.style.setProperty('--grad-bottom', botVal.toFixed(1) + '%');
        titleBase.style.letterSpacing = (0.01 + (frameFloat / 5) * 0.04).toFixed(3) + 'em';
      }
      if (subtitle) {
        subtitle.style.letterSpacing = (0.01 + (frameFloat / 5) * 0.02).toFixed(3) + 'em';
      }

      // Suck words in pairs based on frameFloat
      wordObjects.forEach(function(item) {
        var wordThreshold = (item.idx - 1) / 2; // idx 1,2 -> 0; idx 3,4 -> 1, etc.
        if (frameFloat > wordThreshold) {
          var wordProgress = Math.min(1, Math.max(0, (frameFloat - wordThreshold)));
          var vec = getCenterVector(item.el);
          var curX = vec.dx * wordProgress;
          var curY = vec.dy * wordProgress;
          var curScale = 1 - 0.9 * wordProgress;
          var curRot = (item.idx % 2 === 0 ? 8 : -8) * wordProgress;
          var curOp = item.baseOpacity * (1 - wordProgress);

          item.el.style.transform = 'translate(' + curX.toFixed(1) + 'px, ' + curY.toFixed(1) + 'px) scale(' + curScale.toFixed(2) + ') rotate(' + curRot.toFixed(1) + 'deg)';
          item.el.style.opacity = curOp.toFixed(2);
        } else {
          item.el.style.transform = 'none';
          item.el.style.opacity = String(item.baseOpacity);
        }
      });
    }
    // Phase 2: "WE CAN HELP!" zooms in and scales (0.65 to 0.92)
    else if (p >= 0.65 && p < 0.92) {
      if (qContainer) {
        // Fade out Act 1
        var fadeOutProg = Math.min(1, (p - 0.65) / 0.06);
        qContainer.style.opacity = (1 - fadeOutProg).toFixed(2);
        if (fadeOutProg >= 1) qContainer.style.display = 'none';
      }

      if (weCanHelpContainer) {
        weCanHelpContainer.style.display = 'flex';
        var act2Prog = (p - 0.68) / (0.92 - 0.68);
        act2Prog = Math.max(0, Math.min(1, act2Prog));

        weCanHelpContainer.style.opacity = '1';
        // Exponential scale from 1.0x to 16x
        var currentScale = 1.0 + Math.pow(act2Prog, 2.2) * 15;
        var currentTracking = 0.02 + act2Prog * 0.22;

        if (weCanHelpText) {
          weCanHelpText.style.transform = 'scale(' + currentScale.toFixed(2) + ')';
          weCanHelpText.style.letterSpacing = currentTracking.toFixed(3) + 'em';
          weCanHelpText.style.opacity = (act2Prog < 0.9 ? 1 : 1 - (act2Prog - 0.9) * 5).toFixed(2);
        }
      }

    }
    // Phase 3: Transition out at end of track (0.92 to 1.0)
    else if (p >= 0.92) {
      if (qContainer) qContainer.style.display = 'none';
      if (weCanHelpContainer) {
        weCanHelpContainer.style.display = 'none';
        weCanHelpContainer.style.opacity = '0';
      }
    }
  }

  // Scroll listener for sticky pinning on mobile
  var isTicking = false;
  function onScroll() {
    if (window.innerWidth >= 1024) return;
    if (!isTicking) {
      requestAnimationFrame(function() {
        var rect = track.getBoundingClientRect();
        var scrollDistance = track.offsetHeight - window.innerHeight;
        if (scrollDistance > 0) {
          var progress = Math.max(0, Math.min(1, -rect.top / scrollDistance));
          renderProgress(progress);
        }
        isTicking = false;
      });
      isTicking = true;
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll, { passive: true });

  // Advance on tap: smoothly scrolls down the track by 1 step
  if (advanceBtn) {
    advanceBtn.addEventListener('click', function(e) {
      e.preventDefault();
      var scrollDistance = track.offsetHeight - window.innerHeight;
      var stepDistance = scrollDistance / 5;
      window.scrollBy({ top: stepDistance, behavior: 'smooth' });
    });
  }

  // Initial render
  onScroll();
})();
</script>
