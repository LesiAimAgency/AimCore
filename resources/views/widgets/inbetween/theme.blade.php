@php
  $showHero      = $settings['show_hero'] ?? true;
  $showCollage   = $settings['show_collage'] ?? true;
  $showStatement = $settings['show_statement'] ?? true;
  $showValues    = $settings['show_values'] ?? true;
  $showFounder   = $settings['show_founder'] ?? true;
  $showEvents    = $settings['show_events'] ?? true;
  $showStories   = $settings['show_stories'] ?? true;
  $showPackages  = $settings['show_packages'] ?? true;
@endphp

<div class="inbetween-master-theme-wrapper w-full bg-black text-white overflow-hidden">
  {{-- Section 0: Hero Section --}}
  @if($showHero)
    @include('widgets.inbetween.hero_section')
  @endif

  {{-- Section 1 & 2: Community Wall & Statement --}}
  @if($showCollage || $showStatement)
    <section id="community-pinned-wrapper" class="relative w-full h-screen bg-black overflow-hidden">
      {{-- Central Inbetween Logo --}}
      <div id="wall-center-logo" class="wall-center-logo absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-30 w-[42vw] max-w-[548px] pointer-events-none text-center select-none will-change-transform">
        <img src="{{ asset('themes/inbetween/assets/logo-white.svg') }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="w-full h-auto object-contain drop-shadow-[0_10px_30px_rgba(0,0,0,0.9)]">
      </div>

      <!-- @if($showCollage)
        @include('widgets.inbetween.community_collage')
      @endif

      @if($showStatement)
        @include('widgets.inbetween.community_statement')
      @endif -->
    </section>
  @endif

  {{-- Section 3: Core Values (Venn Circles) --}}
  @if($showValues)
    @include('widgets.inbetween.core_values')
  @endif

  {{-- Section 4: Founder Section --}}
  @if($showFounder)
    @include('widgets.inbetween.founder_section')
  @endif

  {{-- Section 5: Upcoming Events --}}
  @if($showEvents)
    @include('widgets.inbetween.upcoming_events')
  @endif

  {{-- Section 6: Media Stories --}}
  @if($showStories)
    @include('widgets.inbetween.media_stories')
  @endif

  {{-- Section 7: Packages --}}
  @if($showPackages)
    @include('widgets.inbetween.packages')
  @endif
</div>
