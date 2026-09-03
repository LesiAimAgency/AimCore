<?php

namespace Database\Seeders;

use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenWidgetsSeeder extends Seeder
{
    public function run(): void
    {
        $tenantId = session('current_project')['id'] ?? \App\Models\Project::first()->id ?? 1;

        // Clear existing INBETWEEN widgets to prevent duplicates
        Widget::where('tenant_id', $tenantId)
            ->where('area', 'like', 'inbetween-%')
            ->delete();

        $widgets = [
            'inbetween-hero' => <<<BLADE
<div class="hero-content flex flex-col items-center max-w-[708px] w-full">
    <div class="hero-logo-wrapper w-full max-w-[280px] sm:max-w-[420px] md:max-w-[580px] lg:max-w-[708px]">
    <img src="{{ setting('hero_logo', asset('themes/inbetween/assets/logo.svg')) }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="w-full h-auto object-contain drop-shadow-2xl select-none" width="708" height="109">
    </div>
    <div class="hero-subtitle mt-4 sm:mt-8 lg:mt-11 text-[25px] font-medium leading-snug sm:leading-[1.18] space-y-0.5 sm:space-y-1 text-white select-none">
    @foreach(explode('|', setting('hero_subtitle', 'Cross-border community, media & connection platform|for|Professionals, Founders, Creatives & Organizations')) as \$line)
    <p class="m-0 tracking-[-0.01em] drop-shadow-md">{{ trim(\$line) }}</p>
    @endforeach
    </div>
</div>
BLADE,

            'inbetween-community-wall' => <<<BLADE
<div class="wall-stage">
    <!-- Central Inbetween Logo (GSAP xPercent/yPercent replaces tailwind translate) -->
    <div id="wall-center-logo" class="wall-center-logo absolute left-1/2 top-1/2 z-30 w-[38%] pointer-events-none text-center select-none will-change-transform">
        <img src="https://aimagency.vn/themes/inbetween/assets/logo-white.svg" alt="INBETWEEN" class="w-full h-auto object-contain drop-shadow-[0_10px_30px_rgba(0,0,0,0.9)]">
    </div>
    <div class="floating-card" style="left:8.61%;top:11.22%;width:15.35%;height:31.0%;z-index:12;"><img src="{{ asset('themes/inbetween/assets/image0_252_132.png') }}" alt="Community"></div>
    <div class="floating-card" style="left:28.19%;top:-4.67%;width:12.85%;height:25.89%;z-index:10;"><img src="{{ asset('themes/inbetween/assets/image1_252_132.png') }}" alt="Founder"></div>
    <div class="floating-card" style="left:34.58%;top:65.56%;width:7.71%;height:15.67%;z-index:11;"><img src="{{ asset('themes/inbetween/assets/image2_252_132.png') }}" alt="Member"></div>
    <div class="floating-card" style="left:54.24%;top:11.11%;width:7.71%;height:15.67%;z-index:11;"><img src="{{ asset('themes/inbetween/assets/image3_252_132.png') }}" alt="Speaker"></div>
    <div class="floating-card" style="left:51.32%;top:69.22%;width:10.62%;height:21.67%;z-index:12;"><img src="{{ asset('themes/inbetween/assets/image4_252_132.png') }}" alt="Event"></div>
    <div class="floating-card" style="left:68.40%;top:52.44%;width:14.10%;height:28.78%;z-index:12;"><img src="{{ asset('themes/inbetween/assets/image5_252_132.png') }}" alt="Interview"></div>
    <div class="floating-card" style="left:73.33%;top:-2.00%;width:18.40%;height:37.67%;z-index:10;"><img src="{{ asset('themes/inbetween/assets/image6_252_132.png') }}" alt="Summit"></div>
    <div class="floating-card" style="left:87.22%;top:44.44%;width:14.51%;height:29.67%;z-index:11;"><img src="{{ asset('themes/inbetween/assets/image7_252_132.png') }}" alt="Media"></div>
    <div class="floating-card" style="left:16.46%;top:52.89%;width:10.90%;height:22.11%;z-index:12;"><img src="{{ asset('themes/inbetween/assets/image8_252_132.png') }}" alt="Podcast"></div>
    <div class="floating-card" style="left:-6.81%;top:51.11%;width:19.65%;height:39.78%;z-index:10;"><img src="{{ asset('themes/inbetween/assets/image9_252_132.png') }}" alt="Innovator"></div>
</div>
BLADE,

            'inbetween-community' => <<<BLADE
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
    <div class="lg:col-span-4 flex flex-col gap-8 items-start">
    <div id="sec2-card-1" class="group cursor-pointer max-w-[340px] w-full will-change-transform">
        <div class="aspect-[300/288] rounded-[20px] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
        <img src="{{ asset('themes/inbetween/assets/image1_250_148.png') }}" alt="Influencers" class="w-full h-full object-cover">
        </div>
    </div>
    <div id="sec2-card-2" class="group cursor-pointer max-w-[380px] w-full will-change-transform">
        <div class="aspect-[401/346] rounded-[20px] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
        <img src="{{ asset('themes/inbetween/assets/image2_250_148.png') }}" alt="Businesses" class="w-full h-full object-cover">
        </div>
    </div>
    </div>
    <div class="lg:col-span-4 flex flex-col items-center text-center my-6 lg:my-0 z-20">
    <h2 id="sec2-title-top" class="text-2xl sm:text-3xl lg:text-[40px] font-bold uppercase tracking-tight text-white m-0 leading-tight">
        THE <span style="color: {{ setting('theme_primary_color', '#EC460B') }};">COMMUNITY</span>
    </h2>
    <div id="sec2-logo" class="my-4 w-full max-w-[340px] flex items-center justify-center">
        <img src="{{ asset('themes/inbetween/assets/logo-white.svg') }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="w-full h-auto object-contain drop-shadow-xl">
    </div>
    <h2 id="sec2-title-bot" class="text-2xl sm:text-3xl lg:text-[40px] font-bold uppercase tracking-tight text-white m-0 leading-tight">CREATING</h2>
    <p id="sec2-subtitle" class="text-xs sm:text-sm font-light leading-relaxed my-4 max-w-[320px] text-[#A9A9A9]">{{ setting('community_description', 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.') }}</p>
    <div id="sec2-ctas" class="flex flex-col sm:flex-row gap-3.5 items-center justify-center w-full mt-3">
        <a href="#packages" class="pill-btn-outline w-full sm:w-auto text-center">JOIN COMMUNITY</a>
        <a href="#events" class="pill-btn-white w-full sm:w-auto text-center">UPCOMING EVENTS</a>
    </div>
    </div>
    <div class="lg:col-span-4 flex flex-col gap-8 items-end">
    <div id="sec2-card-3" class="group cursor-pointer max-w-[380px] w-full will-change-transform">
        <div class="aspect-[402/346] rounded-[20px] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
        <img src="{{ asset('themes/inbetween/assets/image3_250_148.png') }}" alt="People" class="w-full h-full object-cover">
        </div>
    </div>
    <div id="sec2-card-4" class="group cursor-pointer max-w-[380px] w-full will-change-transform">
        <div class="aspect-[402/346] rounded-[20px] overflow-hidden bg-neutral-900 shadow-2xl transition-transform duration-500 group-hover:scale-105">
        <img src="{{ asset('themes/inbetween/assets/image4_250_148.png') }}" alt="Creatives" class="w-full h-full object-cover">
        </div>
    </div>
    </div>
</div>
BLADE,

            'inbetween-about' => <<<BLADE
<div id="core-values-header" class="text-center max-w-2xl mx-auto mb-14 lg:mb-20">
    <div class="w-48 sm:w-56 lg:w-64 mx-auto mb-4">
    <img src="{{ asset('themes/inbetween/assets/core-values-header.svg') }}" alt="{{ setting('site_name', 'INBETWEEN') }}" class="w-full h-auto object-contain">
    </div>
    <h2 class="text-3xl sm:text-4xl lg:text-[52px] font-bold tracking-tight m-0 uppercase leading-none" style="color: {{ setting('theme_primary_color', '#EC460B') }};">
    {{ setting('core_values_title', 'CORE VALUES') }}
    </h2>
    <p class="text-sm sm:text-base lg:text-lg text-black font-semibold mt-3 tracking-wide">{{ setting('core_values_subtitle', 'Who we are inspire what we do') }}</p>
</div>
<div class="hidden lg:block venn-wrapper my-8">
    <div class="venn-item venn-item-1">
    <div class="venn-bg"></div>
    <div class="relative z-10 max-w-[220px]">
        <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_1_title', 'AUTHENTICITY') }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">{{ setting('core_value_1_desc', 'Building genuine bonds across diverse cultures and creative industries') }}</p>
    </div>
    </div>
    <span class="venn-plus-sign venn-plus-1">+</span>
    <div class="venn-item venn-item-2">
    <div class="venn-bg"></div>
    <div class="relative z-10 max-w-[220px]">
        <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_2_title', 'INNOVATION') }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">{{ setting('core_value_2_desc', 'Empowering bold ideas and fostering cross-border breakthroughs') }}</p>
    </div>
    </div>
    <span class="venn-plus-sign venn-plus-2">+</span>
    <div class="venn-item venn-item-3">
    <div class="venn-bg"></div>
    <div class="relative z-10 max-w-[220px]">
        <h3 class="text-lg lg:text-xl font-bold uppercase tracking-wider mb-2.5" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_3_title', 'IMPACT') }}</h3>
        <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold">{{ setting('core_value_3_desc', 'Creating lasting value and sustainable growth for our global community') }}</p>
    </div>
    </div>
</div>
<div class="lg:hidden flex flex-col items-center gap-6 my-10">
    <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
    <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_1_title', 'AUTHENTICITY') }}</h3>
    <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">{{ setting('core_value_1_desc', 'Building genuine bonds across diverse cultures and creative industries') }}</p>
    </div>
    <div class="w-8 h-8 rounded-full font-bold flex items-center justify-center text-xl" style="color: {{ setting('theme_primary_color', '#EC460B') }};">+</div>
    <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
    <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_2_title', 'INNOVATION') }}</h3>
    <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">{{ setting('core_value_2_desc', 'Empowering bold ideas and fostering cross-border breakthroughs') }}</p>
    </div>
    <div class="w-8 h-8 rounded-full font-bold flex items-center justify-center text-xl" style="color: {{ setting('theme_primary_color', '#EC460B') }};">+</div>
    <div class="w-full max-w-[340px] aspect-square rounded-full flex flex-col items-center justify-center p-8 text-center bg-gradient-to-b from-[#FFE7DA]/0 to-[#F5AD93] shadow-sm">
    <h3 class="text-lg font-bold uppercase tracking-wider mb-2" style="color: {{ setting('theme_primary_color', '#EC460B') }};">{{ setting('core_value_3_title', 'IMPACT') }}</h3>
    <p class="text-xs sm:text-sm text-black leading-relaxed m-0 font-semibold max-w-[220px]">{{ setting('core_value_3_desc', 'Creating lasting value and sustainable growth for our global community') }}</p>
    </div>
</div>
BLADE,

            'inbetween-founder' => <<<BLADE
<div id="founder-title-block" class="max-w-xl pt-4">
    <h2 class="text-3xl sm:text-4xl lg:text-[54px] font-bold uppercase tracking-tight text-white leading-none m-0">{{ setting('founder_name', 'HUYNH THI AI NHU') }}</h2>
    <p class="text-base sm:text-xl lg:text-[22px] font-normal text-white/90 mt-3 m-0">{{ setting('founder_title', 'Founder of INBETWEEN') }}</p>
</div>

@if(setting('social_youtube'))
<div id="founder-badge-yt" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 left-[6%] xl:left-[12%] top-[38%] max-w-[200px] group">
    <div class="w-12 h-12 transition-transform duration-300 group-hover:scale-110">
    <img src="{{ asset('themes/inbetween/assets/social1.svg') }}" alt="YouTube" class="w-12 h-12 object-contain drop-shadow-lg">
    </div>
    <p class="text-[12px] text-white/90 leading-snug m-0 drop-shadow-md">{{ setting('founder_social_yt_text', '') }}</p>
</div>
@endif

@if(setting('social_facebook'))
<div id="founder-badge-fb" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 right-[18%] xl:right-[20%] top-[26%] max-w-[200px] group">
    <div class="w-12 h-12 transition-transform duration-300 group-hover:scale-110">
    <img src="{{ asset('themes/inbetween/assets/social2.svg') }}" alt="Facebook" class="w-12 h-12 object-contain drop-shadow-lg">
    </div>
    <p class="text-[12px] text-white/90 leading-snug m-0 drop-shadow-md">{{ setting('founder_social_fb_text', '') }}</p>
</div>
@endif

@if(setting('social_instagram'))
<div id="founder-badge-ig" class="hidden lg:flex flex-col items-start gap-2.5 absolute z-20 right-[8%] xl:right-[10%] top-[49%] max-w-[200px] group">
    <div class="w-12 h-12 transition-transform duration-300 group-hover:scale-110">
    <img src="{{ asset('themes/inbetween/assets/social3.svg') }}" alt="Instagram" class="w-12 h-12 object-contain drop-shadow-lg">
    </div>
    <p class="text-[12px] text-white/90 leading-snug m-0 drop-shadow-md">{{ setting('founder_social_ig_text', '') }}</p>
</div>
@endif

<div class="flex lg:hidden flex-col sm:flex-row gap-4 my-8 w-full z-20">
    <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
    <img src="{{ asset('themes/inbetween/assets/social1.svg') }}" alt="YouTube" class="w-10 h-10 shrink-0">
    <p class="text-xs text-white/90 leading-snug m-0">{{ setting('founder_social_yt_text', '') }}</p>
    </div>
    <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
    <img src="{{ asset('themes/inbetween/assets/social2.svg') }}" alt="Facebook" class="w-10 h-10 shrink-0">
    <p class="text-xs text-white/90 leading-snug m-0">{{ setting('founder_social_fb_text', '') }}</p>
    </div>
    <div class="flex items-center gap-3 bg-black/50 backdrop-blur-md p-3.5 rounded-xl border border-white/10 flex-1">
    <img src="{{ asset('themes/inbetween/assets/social3.svg') }}" alt="Instagram" class="w-10 h-10 shrink-0">
    <p class="text-xs text-white/90 leading-snug m-0">{{ setting('founder_social_ig_text', '') }}</p>
    </div>
</div>

<div id="founder-mission-slogan" class="max-w-xl pb-4">
    <h2 class="text-3xl sm:text-4xl lg:text-[50px] font-bold uppercase tracking-tight text-white leading-tight m-0">
    {!! nl2br(e(setting('founder_mission', "CONNECTING PEOPLE\nIS OUR VERY MISSION"))) !!}
    </h2>
</div>
BLADE,

            'inbetween-events' => <<<BLADE
@php
    \$events = App\Models\Post::where('post_type', 'event')->where('status', 'published')->orderBy('published_at', 'asc')->limit(1)->first();
@endphp
<div id="vip-invitation-box" class="flex flex-col items-center text-center max-w-lg lg:ml-12 xl:ml-20">
    <span class="text-xs font-semibold uppercase tracking-[0.25em] text-neutral-400 mb-2">PREMIUM EVENT</span>
    <h1 class="font-serif text-7xl sm:text-8xl lg:text-[120px] font-bold text-white leading-none tracking-wider m-0 uppercase">VIP</h1>
    <div class="pb-1 border-b border-white/40 mb-6 inline-block">
    <p class="font-serif italic text-2xl sm:text-3xl text-neutral-200 tracking-wide m-0">Private Preview</p>
    </div>

    @if(\$events)
    <div class="space-y-1 mb-6 text-neutral-200">
    <p class="text-sm font-medium uppercase tracking-wider text-neutral-400 m-0">{{ \$events->published_at ? \$events->published_at->format('l') : '' }}</p>
    <p class="text-4xl sm:text-5xl font-bold tracking-tight text-white m-0">{{ \$events->published_at ? \$events->published_at->format('d.m') : '' }}</p>
    <p class="text-2xl sm:text-3xl font-bold tracking-tight text-white m-0">{{ \$events->published_at ? \$events->published_at->format('Y') : '' }}</p>
    </div>
    @if(\$events->getMeta('event_location'))
    <div class="space-y-1 mb-6">
    <p class="text-base sm:text-lg font-bold text-white m-0">{{ \$events->getMeta('event_location') }}</p>
    @if(\$events->getMeta('event_address'))<p class="text-xs sm:text-sm text-neutral-400 m-0">{{ \$events->getMeta('event_address') }}</p>@endif
    </div>
    @endif
    @else
    <div class="space-y-1 mb-6 text-neutral-200">
    <p class="text-sm font-medium uppercase tracking-wider text-neutral-400 m-0">{{ setting('event_day', 'Tuesday') }}</p>
    <p class="text-4xl sm:text-5xl font-bold tracking-tight text-white m-0">{{ setting('event_date', '18.08') }}</p>
    <p class="text-2xl sm:text-3xl font-bold tracking-tight text-white m-0">{{ setting('event_year', '2026') }}</p>
    <p class="text-xs text-neutral-300 font-medium tracking-wider m-0 pt-2 flex items-center justify-center gap-1.5">
        <span style="color: {{ setting('theme_primary_color', '#EC460B') }};">&#10022;</span> {{ setting('event_time', '9:00AM - 11:30 AM') }}
    </p>
    </div>
    <div class="space-y-1 mb-6">
    <p class="text-base sm:text-lg font-bold text-white m-0">{{ setting('event_location', 'Grand Ballroom - Park Hyatt Saigon') }}</p>
    <p class="text-xs sm:text-sm text-neutral-400 m-0">{{ setting('event_address', 'No.02 Cong Truong Lam Son St, Sai Gon Ward, HCMC') }}</p>
    </div>
    <div class="space-y-1.5 mb-8">
    <h4 class="text-lg font-bold text-white m-0 mb-1">Agenda</h4>
    @foreach(array_filter(explode("\n", setting('event_agenda', "Meeting with special guest\nHaving brunch\nLuck Gifts"))) as \$agendaItem)
    <p class="text-xs sm:text-sm text-neutral-300 m-0">{{ trim(\$agendaItem) }}</p>
    @endforeach
    </div>
    @endif

    <a href="#contact" class="inline-flex items-center justify-center px-10 py-2.5 rounded-full border border-white text-white text-xs font-bold tracking-widest uppercase hover:bg-white hover:text-black transition-all">JOIN US</a>
</div>
BLADE,
        ];

        $sort = 1;
        foreach ($widgets as $area => $content) {
            Widget::create([
                'tenant_id' => $tenantId,
                'name' => "Widget: $area",
                'type' => 'blade',
                'area' => $area,
                'sort_order' => $sort++,
                'is_active' => true,
                'settings' => [
                    'content' => $content,
                ],
            ]);
        }

        $this->command->info('Dynamic widgets seeded successfully.');
    }
}
