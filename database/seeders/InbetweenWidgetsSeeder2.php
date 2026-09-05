<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenWidgetsSeeder2 extends Seeder
{
    public function run(): void
    {
        $tenantId = session('current_project')['id'] ?? Project::first()->id ?? 1;

        $widgets = [
            'inbetween-partners' => <<<'BLADE'
<div class="text-center mb-10">
    <h3 class="text-sm font-bold uppercase tracking-widest text-black">{{ setting('partners_section_title', 'OUR BUSINESS PARTNERS') }}</h3>
</div>
<div class="overflow-hidden relative py-4">
    <div class="marquee-track flex items-center gap-12 sm:gap-16">
    @for($i = 0; $i <= 11; $i++)
        @if(file_exists(public_path("themes/inbetween/assets/image{$i}_200_302.png")))
        <img src="{{ asset("themes/inbetween/assets/image{$i}_200_302.png") }}" alt="Partner {{ $i + 1 }}" class="h-8 lg:h-10 w-auto object-contain">
        @endif
    @endfor
    @for($i = 0; $i <= 11; $i++)
        @if(file_exists(public_path("themes/inbetween/assets/image{$i}_200_302.png")))
        <img src="{{ asset("themes/inbetween/assets/image{$i}_200_302.png") }}" alt="" class="h-8 lg:h-10 w-auto object-contain" aria-hidden="true">
        @endif
    @endfor
    </div>
</div>
BLADE,

            'inbetween-media' => <<<BLADE
@php
    \$stories = App\Models\Post::where('post_type', 'post')->where('status', 'published')->orderBy('published_at', 'desc')->limit(4)->get();
@endphp
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 items-start">
    @if(\$stories->count() > 0)
    @foreach(\$stories as \$idx => \$story)
    <article class="story-card {{ (\$idx % 2 !== 0) ? 'story-stagger-down' : '' }} group flex flex-col">
        <div class="aspect-[297/450] rounded-[22px] overflow-hidden bg-neutral-200 shadow-sm mb-4">
        @if(\$story->thumbnail)
        <img src="{{ \$story->thumbnail }}" alt="{{ \$story->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
        <div class="w-full h-full bg-neutral-300 flex items-center justify-center"><span class="text-neutral-500 text-xs uppercase tracking-widest">Media</span></div>
        @endif
        </div>
        <h3 class="text-sm sm:text-base font-bold text-black leading-snug m-0 uppercase mb-3 min-h-[44px]">{{ Str::upper(\$story->title) }}</h3>
        <div class="story-toggle-bar flex items-center justify-between pt-1 cursor-pointer select-none" onclick="toggleStoryCard(this)">
        <div class="flex items-center gap-2 pointer-events-none">
            @if(\$story->getMeta('story_role'))<span class="border border-black rounded-full px-3 py-0.5 text-xs font-semibold text-black">{{ \$story->getMeta('story_role') }}</span>@endif
            <span class="text-sm font-bold text-black">{{ \$story->getMeta('story_guest_name', \$story->title) }}</span>
        </div>
        <button type="button" class="story-toggle-btn p-1.5 rounded-full hover:bg-neutral-200 transition-colors focus:outline-none flex items-center justify-center pointer-events-none" aria-label="Toggle">
            <svg class="w-4 h-4 text-black story-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
        </button>
        </div>
        <div class="story-drawer text-xs text-neutral-600 leading-relaxed font-normal">
        <div class="story-drawer-inner">
            <p class="pt-2.5 border-t border-neutral-200 m-0">{{ Str::limit(strip_tags(\$story->content), 200) }}</p>
        </div>
        </div>
    </article>
    @endforeach
    @else
    @php
    \$staticStories = [
        ['title' => setting('story_1_title', 'HAY DE VIET NAM DUOC LA VIET NAM'), 'guest' => setting('story_1_guest', 'Ken'), 'desc' => setting('story_1_desc', ''), 'img' => asset('themes/inbetween/assets/story-1.png'), 'idx' => 0],
        ['title' => setting('story_2_title', 'VIET NAM KHIEN TOI TRAN TRONG HON'), 'guest' => setting('story_2_guest', 'Hayo Jongejans'), 'desc' => setting('story_2_desc', ''), 'img' => asset('themes/inbetween/assets/story-2.png'), 'idx' => 1],
        ['title' => setting('story_3_title', 'PHA SAN VI KHOI NGHIEP CO-WORKING'), 'guest' => setting('story_3_guest', 'Thuc Doan'), 'desc' => setting('story_3_desc', ''), 'img' => asset('themes/inbetween/assets/story-3.png'), 'idx' => 2],
        ['title' => setting('story_4_title', 'MEDIA TITLE GOES HERE'), 'guest' => setting('story_4_guest', 'Mr. A'), 'desc' => setting('story_4_desc', ''), 'img' => asset('themes/inbetween/assets/story-4.png'), 'idx' => 3],
    ];
    @endphp
    @foreach(\$staticStories as \$story)
    <article class="story-card {{ (\$story['idx'] % 2 !== 0) ? 'story-stagger-down' : '' }} group flex flex-col">
    <div class="aspect-[297/450] rounded-[22px] overflow-hidden bg-neutral-200 shadow-sm mb-4">
        <img src="{{ \$story['img'] }}" alt="{{ \$story['guest'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </div>
    <h3 class="text-sm sm:text-base font-bold text-black leading-snug m-0 uppercase mb-3 min-h-[44px]">{{ \$story['title'] }}</h3>
    <div class="story-toggle-bar flex items-center justify-between pt-1 cursor-pointer select-none" onclick="toggleStoryCard(this)">
        <div class="flex items-center gap-2 pointer-events-none">
        <span class="border border-black rounded-full px-3 py-0.5 text-xs font-semibold text-black">Guest</span>
        <span class="text-sm font-bold text-black">{{ \$story['guest'] }}</span>
        </div>
        <button type="button" class="story-toggle-btn p-1.5 rounded-full hover:bg-neutral-200 transition-colors focus:outline-none flex items-center justify-center pointer-events-none" aria-label="Toggle">
        <svg class="w-4 h-4 text-black story-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
        </button>
    </div>
    <div class="story-drawer text-xs text-neutral-600 leading-relaxed font-normal">
        <div class="story-drawer-inner">
        <p class="pt-2.5 border-t border-neutral-200 m-0">{{ \$story['desc'] }}</p>
        </div>
    </div>
    </article>
    @endforeach
    @endif
</div>
BLADE,

            'inbetween-packages' => <<<BLADE
@php
    \$packages = App\Models\Post::where('post_type', 'product')->where('status', 'published')->orderBy('created_at', 'asc')->limit(3)->get();
@endphp
@if(\$packages->count() > 0)
    @foreach(\$packages as \$pkg)
    <div class="package-card border border-black rounded-[22px] p-6 sm:p-7 bg-transparent hover:bg-white hover:shadow-xl transition-all flex flex-col justify-between">
    <div>
        <div class="flex items-center justify-between pb-2">
        <h3 class="text-2xl sm:text-3xl font-bold text-black m-0 tracking-tight">{{ Str::upper(\$pkg->title) }}</h3>
        @if(\$pkg->price)<span class="text-2xl sm:text-3xl font-bold text-black">\${{ number_format(\$pkg->price) }}<span class="text-base font-normal text-neutral-600">/ Month</span></span>@endif
        </div>
        <h4 class="text-base font-bold text-black mt-2 mb-2 m-0">{{ \$pkg->getMeta('privilege_title', 'Privilege') }}</h4>
        @if(\$pkg->getMeta('privileges'))
        <ul class="text-xs sm:text-sm text-neutral-700 space-y-1 pl-4 list-disc m-0">
        @foreach(array_filter(explode("\n", \$pkg->getMeta('privileges'))) as \$priv)
        <li>{{ trim(\$priv) }}</li>
        @endforeach
        </ul>
        @else
        <p class="text-xs sm:text-sm text-neutral-700 m-0">{{ Str::limit(strip_tags(\$pkg->content ?? ''), 150) }}</p>
        @endif
    </div>
    <div class="flex justify-end mt-4 pt-2">
        <a href="#contact" class="inline-flex items-center gap-2 border-b border-black pb-0.5 text-xs font-bold uppercase tracking-wider hover:opacity-75 transition-opacity">BECOME A MEMBER <span>&#8594;</span></a>
    </div>
    </div>
    @endforeach
@else
@php
    \$staticPkgs = [
    ['name' => setting('package_1_name', 'PACKAGE 1'), 'price' => setting('package_1_price', '$29'), 'privs' => setting('package_1_privileges', "Access to community events\nMonthly newsletter\nBasic networking tools")],
    ['name' => setting('package_2_name', 'PACKAGE 2'), 'price' => setting('package_2_price', '$49'), 'privs' => setting('package_2_privileges', "All Package 1 benefits\nVIP event access\nMentorship sessions")],
    ['name' => setting('package_3_name', 'PACKAGE 3'), 'price' => setting('package_3_price', '$69'), 'privs' => setting('package_3_privileges', "All Package 2 benefits\nExclusive partner benefits\nCustom branding opportunities")],
    ];
@endphp
@foreach(\$staticPkgs as \$pkg)
<div class="package-card border border-black rounded-[22px] p-6 sm:p-7 bg-transparent hover:bg-white hover:shadow-xl transition-all flex flex-col justify-between">
    <div>
    <div class="flex items-center justify-between pb-2">
        <h3 class="text-2xl sm:text-3xl font-bold text-black m-0 tracking-tight">{{ \$pkg['name'] }}</h3>
        <span class="text-2xl sm:text-3xl font-bold text-black">{{ \$pkg['price'] }}<span class="text-base font-normal text-neutral-600">/ Month</span></span>
    </div>
    <h4 class="text-base font-bold text-black mt-2 mb-2 m-0">Privilege</h4>
    <ul class="text-xs sm:text-sm text-neutral-700 space-y-1 pl-4 list-disc m-0">
        @foreach(array_filter(explode("\n", \$pkg['privs'])) as \$priv)
        <li>{{ trim(\$priv) }}</li>
        @endforeach
    </ul>
    </div>
    <div class="flex justify-end mt-4 pt-2">
    <a href="#contact" class="inline-flex items-center gap-2 border-b border-black pb-0.5 text-xs font-bold uppercase tracking-wider hover:opacity-75 transition-opacity">BECOME A MEMBER <span>&#8594;</span></a>
    </div>
</div>
@endforeach
@endif
BLADE,
        ];

        foreach ($widgets as $area => $content) {
            Widget::updateOrCreate([
                'tenant_id' => $tenantId,
                'area' => $area,
            ], [
                'name' => "Widget: $area",
                'type' => 'blade',
                'is_active' => true,
                'settings' => [
                    'content' => $content,
                ],
            ]);
        }

        $this->command->info('Remaining dynamic widgets seeded successfully.');
    }
}
