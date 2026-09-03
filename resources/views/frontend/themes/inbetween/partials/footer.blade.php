@php
  $phone = setting('site_phone', '0909 999 999');
  $email = setting('site_email', 'inbetween.asia@gmail.com');
  $logo  = setting('site_logo_footer', asset('themes/inbetween/assets/logo-footer.svg'));
  $copyright = setting('site_copyright', 'Copyright belong to INBETWEEN');
  $poweredBy  = setting('site_powered_by', 'Powered by AIM AGENCY');
  $primaryColor = setting('theme_primary_color', '#EC460B');
  $brandStatement = setting('footer_brand_statement', 'ONE NETWORK. ENDLESS POSSIBILITIES.');
  $brandSubtitle  = setting('footer_brand_subtitle', 'WE CONNECT PEOPLE, TALENT, AND<br class="hidden sm:inline"> BUSINESSES ACROSS BORDERS TO CREATE<br class="hidden sm:inline"> LASTING OPPORTUNITIES.');
@endphp

<footer id="contact" class="relative w-full min-h-screen bg-black text-white overflow-hidden flex flex-col justify-between">

  <!-- Top Giant Statement Banner from 8.svg -->
  <div id="brand-statement-banner" class="border-b border-white/15 py-16 lg:py-24 px-6 sm:px-12 flex justify-center items-center">
    <div class="w-fit mx-auto font-black uppercase tracking-tight text-white leading-[0.95] text-5xl sm:text-7xl lg:text-[96px]">

      <!-- Line 1: ONE -->
      <div>ONE</div>

      <!-- 2-Column Grid to lock ENDLESS and POSSIBILITIES into the exact same column -->
      <div class="grid grid-cols-1 sm:grid-cols-[auto_auto] items-baseline gap-x-6 sm:gap-x-12">

        <!-- Row 2 Left: NETWORK + Orange Dot -->
        <div class="flex items-center justify-between sm:justify-start gap-4 sm:gap-6 my-1 sm:my-2">
          <span>NETWORK</span>
          <span class="w-3.5 h-3.5 sm:w-5 sm:h-5 rounded-full shrink-0" style="background-color: {{ $primaryColor }};"></span>
        </div>

        <!-- Row 2 Right: ENDLESS -->
        <div class="my-1 sm:my-2">
          <span>ENDLESS</span>
        </div>

        <!-- Row 3 Left: Small Description Paragraph -->
        <div class="self-end pb-2 sm:pb-3">
          <p class="text-[10px] sm:text-[12px] font-light uppercase tracking-widest text-neutral-400 leading-[1.8] m-0 max-w-[320px]">
            {!! $brandSubtitle !!}
          </p>
        </div>

        <!-- Row 3 Right: POSSIBILITIES (100% aligned under ENDLESS) -->
        <div>
          <span>POSSIBILITIES</span>
        </div>

      </div>

    </div>
  </div>

  <!-- Bottom Footer Navigation & Brand from 8.svg -->
  <div class="py-16 lg:py-20">
    <div class="container-custom">

      <!-- Footer Row 1: Logo (Left) & Action Links LET'S CONNECT / JOIN COMMUNITY (Right) -->
      <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8 pb-10 lg:pb-12">
        <!-- Logo Brand -->
        <div>
          <img src="{{ $logo }}" alt="{{ setting('site_name', 'in • between') }}" class="h-10 lg:h-12 w-auto object-contain">
        </div>

        <!-- Action Links in 1 Row -->
        <div class="flex flex-col gap-5 pt-1">
          <a href="#contact" class="min-w-[150px] sm:min-w-[170px] border-b border-white pb-1.5 flex items-center justify-between text-xs sm:text-sm font-bold tracking-widest uppercase hover:text-[#EC460B] hover:border-[#EC460B] transition-colors">
            <span>LET'S CONNECT</span>
            <span class="text-sm font-normal">→</span>
          </a>
          <a href="#packages" class="min-w-[150px] sm:min-w-[170px] border-b border-white pb-1.5 flex items-center justify-between text-xs sm:text-sm font-bold tracking-widest uppercase hover:text-[#EC460B] hover:border-[#EC460B] transition-colors">
            <span>JOIN OUR CREW</span>
            <span class="text-sm font-normal">→</span>
          </a>
        </div>
      </div>

      <!-- Footer Row 2: 3 Columns (Contact for work, Quick links, Explore more on / Copyright) -->
      <div id="footer-grid" class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start pt-10 lg:pt-12">

        <!-- Col 1: Contact for work -->
        <div class="md:col-span-4 lg:col-span-4">
          <p class="text-xs text-neutral-400 mb-2.5 m-0 font-normal">Contact for work</p>
          <p class="text-sm font-bold text-white mb-1 m-0">P: {{ $phone }}</p>
          <p class="text-sm font-bold text-white m-0">E: {{ $email }}</p>
        </div>

        <!-- Col 2: Quick links -->
        <div class="md:col-span-4 lg:col-span-4">
          <p class="text-xs text-neutral-400 mb-2.5 m-0 font-normal">Quick links</p>
          <nav class="flex flex-col gap-3 text-sm font-semibold tracking-wide" aria-label="Footer Navigation">
            <a href="#about" class="hover:text-[#EC460B] transition-colors">About Us</a>
            <a href="#media" class="hover:text-[#EC460B] transition-colors">Media</a>
            <a href="#events" class="hover:text-[#EC460B] transition-colors">Events</a>
            <a href="#packages" class="hover:text-[#EC460B] transition-colors">Community</a>
          </nav>
        </div>

        <!-- Col 3: Explore more on & Copyright -->
        <div class="md:col-span-4 lg:col-span-4 flex flex-col items-start md:items-end">
          <p class="text-xs text-neutral-400 mb-3 m-0 font-normal">Explore more on</p>
          <div class="flex items-center gap-3 mb-4">
            @if($fb = setting('social_facebook'))<a href="{{ $fb }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social8.svg') }}" alt="Facebook" class="w-6 h-6"></a>@endif
            @if($ig = setting('social_instagram'))<a href="{{ $ig }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social9.svg') }}" alt="Instagram" class="w-6 h-6"></a>@endif
            @if($li = setting('social_linkedin'))<a href="{{ $li }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social10.svg') }}" alt="LinkedIn" class="w-6 h-6"></a>@endif
            @if($tt = setting('social_tiktok'))<a href="{{ $tt }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social11.svg') }}" alt="TikTok" class="w-6 h-6"></a>@endif
          </div>
          <p class="text-[11px] text-neutral-400 m-0">{{ $copyright }}</p>
          <p class="text-[11px] text-neutral-500 m-0">{{ $poweredBy }}</p>
        </div>

      </div>

    </div>
  </div>
</footer>

<!-- =========================================================================
     SUBMIT FORM DRAWER MODAL (Exact 1:1 from SUBMIT FORM.svg)
     ========================================================================= -->
<div id="contact-drawer-overlay"
  class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

<aside id="contact-drawer"
  class="fixed top-0 right-0 bottom-0 w-full max-w-[420px] bg-white text-black z-50 shadow-2xl border-l border-[#B9B9B9] p-8 overflow-y-auto transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between">
  <div>
    <!-- Header with Close Button -->
    <div class="flex items-start justify-between mb-6 pb-2">
      <div>
        <h3 class="text-lg sm:text-xl font-bold text-black m-0 tracking-tight">Let's build a community together</h3>
        <p class="text-xs text-neutral-500 mt-1 m-0 font-normal">Leave us your information, we will reply immediately.
        </p>
      </div>
      <button id="close-drawer-btn"
        class="w-8 h-8 rounded border border-neutral-300 flex items-center justify-center text-neutral-500 hover:text-black hover:border-black transition-colors shrink-0 ml-3">
        ✕
      </button>
    </div>

    <!-- Form Inputs matching SUBMIT FORM.svg -->
    <form id="drawer-form" class="space-y-4" onsubmit="submitDrawerForm(event)">
      <input type="hidden" name="form_name" value="Contact">
      <div>
        <input type="text" name="Full Name" placeholder="Full Name" required
          class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]">
      </div>
      <div>
        <input type="tel" name="Phone number" placeholder="Phone number" required
          class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]">
      </div>
      <div>
        <input type="text" name="Company" placeholder="Company"
          class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]">
      </div>
      <div>
        <input type="text" name="Website" placeholder="Website | Social link"
          class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]">
      </div>
      <div>
        <textarea rows="5" name="Message" placeholder="Tell us more about yourself"
          class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B] resize-none"></textarea>
      </div>
      
      <div id="drawer-form-message" class="hidden text-xs"></div>

      <button type="submit" id="drawer-submit-btn"
        class="w-full flex items-center justify-between border-b border-black pb-2 text-xs font-bold uppercase tracking-wider text-black hover:text-[#EC460B] hover:border-[#EC460B] transition-colors pt-2 disabled:opacity-50">
        <span>SUBMIT</span>
        <span>→</span>
      </button>
    </form>
  </div>

  <script>
    async function submitDrawerForm(event) {
      event.preventDefault();
      const form = event.target;
      const submitBtn = document.getElementById('drawer-submit-btn');
      const msgBox = document.getElementById('drawer-form-message');
      
      submitBtn.disabled = true;
      msgBox.classList.add('hidden');
      
      try {
        const formData = new FormData(form);
        const response = await fetch('/api/form-submit', {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
          }
        });
        
        const result = await response.json();
        
        if (response.ok) {
          msgBox.textContent = 'Cảm ơn bạn! Thông tin đã được gửi thành công.';
          msgBox.className = 'text-xs text-green-600 block mb-3';
          form.reset();
          setTimeout(() => closeDrawer(), 3000);
        } else {
          let errorText = 'Có lỗi xảy ra. ';
          if (result.error) errorText += result.error;
          msgBox.textContent = errorText;
          msgBox.className = 'text-xs text-red-600 block mb-3';
        }
      } catch (error) {
        msgBox.textContent = 'Lỗi kết nối, vui lòng thử lại sau.';
        msgBox.className = 'text-xs text-red-600 block mb-3';
      } finally {
        submitBtn.disabled = false;
      }
    }
  </script>

  <!-- Bottom Contact Info from SUBMIT FORM.svg -->
  <div class="pt-8 mt-6 border-t border-neutral-100">
    <p class="text-[11px] uppercase tracking-wider text-neutral-400 font-semibold m-0">Contact for work</p>
    <p class="text-sm font-bold text-black mt-1 mb-0.5 m-0">P: {{ $phone }}</p>
    <p class="text-sm font-bold text-black underline m-0">E: {{ $email }}</p>

    <p class="text-[11px] uppercase tracking-wider text-neutral-400 font-semibold mt-4 mb-2 m-0">Explore more content
    </p>
    <div class="flex items-center gap-3">
      @if($fb = setting('social_facebook'))<a href="{{ $fb }}" class="w-7 h-7 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social4.svg') }}" alt="Facebook" class="w-5 h-5"></a>@endif
      @if($ig = setting('social_instagram'))<a href="{{ $ig }}" class="w-7 h-7 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social5.svg') }}" alt="Instagram" class="w-5 h-5"></a>@endif
      @if($li = setting('social_linkedin'))<a href="{{ $li }}" class="w-7 h-7 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social6.svg') }}" alt="LinkedIn" class="w-5 h-5"></a>@endif
      @if($tt = setting('social_tiktok'))<a href="{{ $tt }}" class="w-7 h-7 rounded-full hover:opacity-75 transition-opacity flex items-center justify-center"><img src="{{ asset('themes/inbetween/assets/social7.svg') }}" alt="TikTok" class="w-5 h-5"></a>@endif
    </div>
  </div>
</aside>