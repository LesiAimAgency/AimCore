<!doctype html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="{{ setting('site_description', 'INBETWEEN - Cross-border community, media & connection platform') }}">
  <title>@yield('title', setting('site_name', 'INBETWEEN') . ' | Community & Platform')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&family=Pinyon+Script&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,400;1,700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brandOrange: '{{ setting("theme_primary_color", "#EC460B") }}',
            paper: '#F9F9F9', darkBg: '#050505', darkCard: '#111113', silver: '#A9A9A9', grayBorder: '#E5E5E5',
          },
          fontFamily: {
            sans: ['"SVN-Gilroy"', '"Be Vietnam Pro"', 'sans-serif'],
            gilroy: ['"SVN-Gilroy"', 'sans-serif'],
            vietnam: ['"Be Vietnam Pro"', 'sans-serif'],
            brovile: ['"Oai Brovile"', '"Playfair Display"', 'serif'],
            serif: ['"Oai Brovile"', '"Playfair Display"', 'Georgia', 'serif'],
            script: ['"Pinyon Script"', 'cursive'],
          },
          maxWidth: { container: '1440px' }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="{{ asset('themes/inbetween/style.css') }}">
  @stack('styles')
</head>
<body class="bg-black text-white">
  @include('frontend.themes.inbetween.partials.header')
  <main>@yield('content')</main>
  @include('frontend.themes.inbetween.partials.footer')
  <div id="contact-drawer-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>
  <aside id="contact-drawer" class="fixed top-0 right-0 bottom-0 w-full max-w-[420px] bg-white text-black z-50 shadow-2xl border-l border-[#B9B9B9] p-8 overflow-y-auto transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between">
    <div>
      <div class="flex items-start justify-between mb-6 pb-2">
        <div>
          <h3 class="text-lg sm:text-xl font-bold text-black m-0 tracking-tight">{{ setting('contact_drawer_title', "Let's build a community together") }}</h3>
          <p class="text-xs text-neutral-500 mt-1 m-0 font-normal">{{ setting('contact_drawer_subtitle', 'Leave us your information, we will reply immediately.') }}</p>
        </div>
        <button id="close-drawer-btn" class="w-8 h-8 rounded border border-neutral-300 flex items-center justify-center text-neutral-500 hover:text-black hover:border-black transition-colors shrink-0 ml-3">&#10005;</button>
      </div>
      <form id="drawer-form" class="space-y-4">
        @csrf
        <input type="hidden" name="form_source" value="contact_drawer">
        <div><input type="text" name="full_name" placeholder="Full Name" required class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]"></div>
        <div><input type="tel" name="phone" placeholder="Phone number" required class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]"></div>
        <div><input type="text" name="company" placeholder="Company" class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]"></div>
        <div><input type="text" name="social_link" placeholder="Website | Social link" class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B]"></div>
        <div><textarea rows="5" name="message" placeholder="Tell us more about yourself" class="w-full border border-[#393939] rounded-[6px] px-3.5 py-2.5 text-xs text-black placeholder:text-[#8B8B8B] focus:outline-none focus:border-[#EC460B] resize-none"></textarea></div>
        <button type="submit" id="drawer-submit-btn" class="w-full flex items-center justify-between border-b border-black pb-2 text-xs font-bold uppercase tracking-wider text-black hover:text-[#EC460B] hover:border-[#EC460B] transition-colors pt-2">
          <span id="drawer-submit-label">SUBMIT</span><span>&#8594;</span>
        </button>
      </form>
      <div id="drawer-success" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-sm text-green-700 text-center">&#10003; Thank you! We will contact you soon.</div>
      <div id="drawer-error" class="hidden mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700 text-center"></div>
    </div>
    <div class="pt-8 mt-6 border-t border-neutral-100">
      <p class="text-[11px] uppercase tracking-wider text-neutral-400 font-semibold m-0">Contact for work</p>
      <p class="text-sm font-bold text-black mt-1 mb-0.5 m-0">P: {{ setting('site_phone', '0909 999 999') }}</p>
      <p class="text-sm font-bold text-black underline m-0">E: {{ setting('site_email', 'inbetween.asia@gmail.com') }}</p>
      <p class="text-[11px] uppercase tracking-wider text-neutral-400 font-semibold mt-4 mb-2 m-0">Explore more content</p>
      <div class="flex items-center gap-3">
        @if($fb = setting('social_facebook'))<a href="{{ $fb }}" target="_blank" rel="noopener" class="w-7 h-7 flex items-center justify-center hover:opacity-75"><img src="{{ asset('themes/inbetween/assets/social4.svg') }}" alt="Facebook" class="w-5 h-5"></a>@endif
        @if($ig = setting('social_instagram'))<a href="{{ $ig }}" target="_blank" rel="noopener" class="w-7 h-7 flex items-center justify-center hover:opacity-75"><img src="{{ asset('themes/inbetween/assets/social5.svg') }}" alt="Instagram" class="w-5 h-5"></a>@endif
        @if($li = setting('social_linkedin'))<a href="{{ $li }}" target="_blank" rel="noopener" class="w-7 h-7 flex items-center justify-center hover:opacity-75"><img src="{{ asset('themes/inbetween/assets/social6.svg') }}" alt="LinkedIn" class="w-5 h-5"></a>@endif
        @if($tt = setting('social_tiktok'))<a href="{{ $tt }}" target="_blank" rel="noopener" class="w-7 h-7 flex items-center justify-center hover:opacity-75"><img src="{{ asset('themes/inbetween/assets/social7.svg') }}" alt="TikTok" class="w-5 h-5"></a>@endif
      </div>
    </div>
  </aside>
  <script src="{{ asset('themes/inbetween/script.js') }}"></script>
  <script>
    (function(){
      var CONTACT_URL='{{ url(request()->route("projectCode")."/contact") }}';
      var CSRF=document.querySelector('meta[name="csrf-token"]');
      document.addEventListener('DOMContentLoaded',function(){
        var form=document.getElementById('drawer-form');
        if(!form)return;
        form.addEventListener('submit',function(e){
          e.preventDefault();
          var btn=document.getElementById('drawer-submit-btn');
          var label=document.getElementById('drawer-submit-label');
          var ok=document.getElementById('drawer-success');
          var err=document.getElementById('drawer-error');
          if(btn)btn.disabled=true;
          if(label)label.textContent='SENDING...';
          if(err)err.classList.add('hidden');
          fetch(CONTACT_URL,{method:'POST',body:new FormData(form),headers:{'X-CSRF-TOKEN':CSRF?CSRF.getAttribute('content'):'','X-Requested-With':'XMLHttpRequest','Accept':'application/json'}})
          .then(function(r){return r.json();})
          .then(function(d){
            if(d.success){form.style.display='none';if(ok)ok.classList.remove('hidden');}
            else{if(err){err.textContent=d.message||'Error. Please try again.';err.classList.remove('hidden');}if(btn)btn.disabled=false;if(label)label.textContent='SUBMIT';}
          })
          .catch(function(){form.style.display='none';if(ok)ok.classList.remove('hidden');});
        });
      });
    })();
  <script src="{{ asset('themes/inbetween/script.js') }}"></script>
  @stack('scripts')
</body>
</html>