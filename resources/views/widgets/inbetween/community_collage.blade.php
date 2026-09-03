@php
  $siteName = setting('site_name', 'INBETWEEN');
@endphp
<!-- =======================================================================
     SECTION 1 & 2: COMMUNITY PINNED WRAPPER (Onepage Transition)
     ======================================================================= -->
<section id="community-pinned-wrapper" class="relative w-full h-screen bg-black overflow-hidden">
  <div id="about" class="absolute -top-20"></div>

  <!-- Central Inbetween Logo (Moved outside wall to sit above text with z-30) -->
  <div id="wall-center-logo" class="wall-center-logo absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-30 w-[70vw] md:w-[42vw] max-w-[548px] pointer-events-none text-center select-none will-change-transform">
    <img src="{{ $settings['center_logo'] }}" alt="{{ $siteName }}" class="w-full h-auto object-contain drop-shadow-[0_10px_30px_rgba(0,0,0,0.9)]">
  </div>

  <!-- COMMUNITY WALL (Stage 1) -->
  <div id="community-wall" class="absolute inset-0 flex items-center justify-center z-10" aria-label="INBETWEEN Community Collage">
    <div class="wall-stage">
      <div class="floating-card" style="left: 8.61%; top: 11.22%; width: 15.35%; height: 31.0%; z-index: 12; opacity: 0.4;">
        <img src="{{ $settings['image_1'] }}" alt="Community Voices">
      </div>
      <div class="floating-card" style="left: 28.19%; top: -4.67%; width: 12.85%; height: 25.89%; z-index: 10; opacity: 0.4;">
        <img src="{{ $settings['image_2'] }}" alt="Founder Story">
      </div>
      <div class="floating-card" style="left: 34.58%; top: 65.56%; width: 7.71%; height: 15.67%; z-index: 11; opacity: 1;">
        <img src="{{ $settings['image_3'] }}" alt="Creative Member">
      </div>
      <div class="floating-card" style="left: 54.24%; top: 11.11%; width: 7.71%; height: 15.67%; z-index: 11; opacity: 0.6;">
        <img src="{{ $settings['image_4'] }}" alt="Keynote Speaker">
      </div>
      <div class="floating-card" style="left: 51.32%; top: 69.22%; width: 10.62%; height: 21.67%; z-index: 12; opacity: 1;">
        <img src="{{ $settings['image_5'] }}" alt="Event Moment">
      </div>
      <div class="floating-card" style="left: 68.40%; top: 52.44%; width: 14.10%; height: 28.78%; z-index: 12; opacity: 1;">
        <img src="{{ $settings['image_6'] }}" alt="Interview Spotlight">
      </div>
      <div class="floating-card" style="left: 73.33%; top: -2.00%; width: 18.40%; height: 37.67%; z-index: 10; opacity: 0.4;">
        <img src="{{ $settings['image_7'] }}" alt="Summit Gala Host">
      </div>
      <div class="floating-card" style="left: 87.22%; top: 44.44%; width: 14.51%; height: 29.67%; z-index: 11; opacity: 0.6;">
        <img src="{{ $settings['image_8'] }}" alt="Media Spotlight">
      </div>
      <div class="floating-card" style="left: 16.46%; top: 52.89%; width: 10.90%; height: 22.11%; z-index: 12; opacity: 0.7;">
        <img src="{{ $settings['image_9'] }}" alt="Podcast Guest">
      </div>
      <div class="floating-card" style="left: -6.81%; top: 51.11%; width: 19.65%; height: 39.78%; z-index: 10; opacity: 0.4;">
        <img src="{{ $settings['image_10'] }}" alt="Innovator Profile">
      </div>
    </div>
  </div>
