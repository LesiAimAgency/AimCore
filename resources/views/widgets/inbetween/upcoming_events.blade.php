@php
  $primaryColor   = setting('theme_primary_color', '#EC460B');
  $manualEvents = !empty($settings['manual_events']) && is_array($settings['manual_events']) ? $settings['manual_events'] : null;

  if ($manualEvents) {
      $displayEvents = $manualEvents;
  } else {
      $displayEvents = count($events) ? $events : [
        [
            'title' => 'Private Preview',
            'start_date' => '2026-08-18 09:00:00',
            'location' => 'Grand Ballroom - Park Hyatt Saigon',
            'image' => asset('themes/inbetween/assets/events-bg.png'),
        ]
      ];
  }

  // Get the first event to display as the VIP event
  $event = $displayEvents[0] ?? null;
  if ($event) {
      $date = is_array($event) ? \Carbon\Carbon::parse($event['start_date']) : \Carbon\Carbon::parse($event->start_date);
      $day = $date->format('d.m');
      $year = $date->format('Y');
      $dayOfWeek = $date->format('l');
      $title = is_array($event) ? $event['title'] : $event->title;
      $location = is_array($event) ? $event['location'] : $event->location;
      $img = is_array($event) ? $event['image'] : (isset($event->image_id) ? asset($event->image_id) : asset('themes/inbetween/assets/events-bg.png'));
  }
@endphp

@if($event)
<!-- =======================================================================
     SECTION 5: UPCOMING EVENTS & VIP PREVIEW (Exact 1:1 from 5.svg)
     ======================================================================= -->
<section id="events" class="relative w-full min-h-screen bg-black text-white overflow-hidden py-16 lg:py-12 flex flex-col justify-center">

  <!-- Fullscreen Spotlight Background Photo (image0_200_411) -->
  <div class="events-bg absolute inset-0 bg-center bg-cover bg-no-repeat pointer-events-none" style="background-image: url('{{ $img }}');">
  </div>

  <!-- Linear Gradient Overlay for High Legibility on Left Column -->
  <div class="absolute inset-0 bg-gradient-to-r from-black via-black/85 lg:via-black/75 to-transparent pointer-events-none">
  </div>
  <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/60 pointer-events-none">
  </div>

  <div class="container-custom relative z-10 w-full h-full flex flex-col justify-between my-auto">

    <!-- Header (Center Top) -->
    <div id="events-header" class="text-center pt-2 mb-12 lg:mb-16">
      <h2 class="text-3xl sm:text-4xl lg:text-[44px] font-bold tracking-[0.15em] uppercase text-white m-0">
        {{ $settings['title'] }}
      </h2>
    </div>

    <!-- VIP Event Information Column (Left Side from 5.svg / Wireframe-4) -->
    <div id="vip-invitation-box" class="flex flex-col items-center text-center max-w-xl lg:max-w-2xl lg:ml-12 xl:ml-20">

      <span class="text-xs sm:text-sm lg:text-base font-bold uppercase tracking-[0.2em] text-neutral-300 mb-2">PREMIUM EVENT</span>

      <h1 class="font-serif text-8xl sm:text-9xl lg:text-[140px] font-normal text-white leading-none tracking-normal m-0 uppercase drop-shadow-lg">
        VIP
      </h1>

      <div class="py-2 border-t border-b border-white/60 mb-10 inline-block mt-3 px-2">
        <p class="font-serif italic font-bold text-3xl sm:text-4xl lg:text-[42px] text-white tracking-wide m-0">
          {{ $title }}
        </p>
      </div>

      <!-- Date & Time Details (Be Vietnam Pro) -->
      <div class="space-y-2 mb-10 text-white font-sans">
        <p class="text-xl sm:text-2xl lg:text-[28px] font-semibold tracking-wide text-neutral-200 m-0">{{ $dayOfWeek }}</p>
        <p class="text-5xl sm:text-6xl lg:text-[68px] font-bold tracking-tight text-white leading-[1.05] m-0">
          {{ $day }}
        </p>
        <p class="text-5xl sm:text-6xl lg:text-[68px] font-bold tracking-tight text-white leading-[1.05] m-0">
          {{ $year }}
        </p>
        <p class="text-base sm:text-lg lg:text-[20px] text-neutral-300 font-normal tracking-widest m-0 pt-3">
          9:00AM - 11:30 AM
        </p>
      </div>

      <!-- Location (Venue & Address - Be Vietnam Pro) -->
      <div class="space-y-2 mb-10 text-neutral-200 font-sans">
        <p class="text-2xl sm:text-3xl lg:text-[32px] font-bold text-white m-0 tracking-wide leading-snug">
          {{ $location }}
        </p>
        <p class="text-base sm:text-lg lg:text-[22px] text-neutral-300 m-0 font-normal tracking-wide leading-relaxed">
          No.02 Cong Truong Lam Son St, Sai Gon Ward, HCMC
        </p>
      </div>

      <!-- Agenda (Be Vietnam Pro) -->
      <div class="space-y-3 mb-10 text-neutral-200 font-sans">
        <h4 class="text-3xl sm:text-4xl lg:text-[42px] font-bold text-white m-0 mb-4 tracking-wide">
          Agenda
        </h4>
        <p class="text-lg sm:text-xl lg:text-[24px] text-neutral-100 m-0 font-medium tracking-wide">
          Meeting with special guest
        </p>
        <p class="text-lg sm:text-xl lg:text-[24px] text-neutral-100 m-0 font-medium tracking-wide">
          Having brunch
        </p>
        <p class="text-lg sm:text-xl lg:text-[24px] text-neutral-100 m-0 font-medium tracking-wide">
          Luck Gifts
        </p>
      </div>

      <!-- Join Us Button -->
      <a href="{{ $settings['btn_link'] }}" class="inline-flex items-center justify-center px-12 py-3.5 rounded-full border-2 border-white text-white font-sans text-sm sm:text-base font-bold tracking-widest uppercase hover:bg-white hover:text-black transition-all">
        {{ $settings['btn_text'] }}
      </a>

    </div>

    <div class="hidden lg:block pt-8"></div>

  </div>
</section>
@endif
