@extends('admin.layouts.app')
@section('title', 'Cấu hình Giao diện')
@section('page-title', 'Cấu hình Giao diện')
@section('page-subtitle', 'Tùy chỉnh màu sắc, header, footer và bố cục website')

@push('styles')
<style>
.ap-nav-btn {
    width:100%;display:flex;align-items:center;gap:8px;
    padding:7px 10px;border-radius:8px;font-size:12px;font-weight:600;
    border:none;cursor:pointer;text-align:left;transition:all .15s;
    margin-bottom:1px;background:transparent;color:#475569;
}
.ap-nav-btn.active { background:#2563eb !important; color:#fff !important; }
</style>
@endpush

@section('content')
    @php
        function _murl(?string $p, string $d = ''): string {
            if (!$p) return $d ? asset($d) : '';
            if (str_contains($p, '://')) return $p;
            if (str_starts_with($p, 'media/')) return \Illuminate\Support\Facades\Storage::disk('public')->url($p);
            return asset($p);
        }
    @endphp
    <div x-data="{ 
            activeTab: window.location.hash ? window.location.hash.substring(1) : 'design',
            topbarShow: '{{ $settingsMap['topbar_show'] ?? '0' }}',
            mobileMenuSide: '{{ $settingsMap['mobile_menu_side'] ?? 'left' }}',
            showNavTypography: false,
            navFontSize: '{{ $settingsMap['nav_font_size'] ?? '16' }}',
            navFontWeight: '{{ $settingsMap['nav_font_weight'] ?? '500' }}',
            navPosition: '{{ $settingsMap['nav_position'] ?? 'right' }}',
            init() {
                this.$watch('activeTab', (val) => { location.hash = val; });
                window.addEventListener('hashchange', () => {
                    const h = window.location.hash.substring(1);
                    if (h && h !== this.activeTab) this.activeTab = h;
                });
            }
        }" style="display:flex;gap:16px;align-items:flex-start;">

        {{-- Sidebar Navigation --}}
        <div style="width:200px;flex-shrink:0;background:#fff;border-radius:12px;border:1px solid #e2e8f0;overflow:hidden;position:sticky;top:16px;">
            <div style="padding:10px 14px;border-bottom:1px solid #f1f5f9;background:#f8fafc;">
                <p style="font-size:9px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;">Danh mục cấu hình</p>
            </div>
            <nav style="padding:6px;">
                @php
                $navItems = [
                    ['tab'=>'design',     'icon'=>'fa-palette',              'label'=>'Design System'],
                    ['tab'=>'general',    'icon'=>'fa-wand-magic-sparkles',  'label'=>'Cấu hình chung'],
                    ['tab'=>'topbar',     'icon'=>'fa-arrows-up-to-line',    'label'=>'Top Bar'],
                    ['tab'=>'header',     'icon'=>'fa-window-maximize',      'label'=>'Header'],
                    ['tab'=>'mobile',     'icon'=>'fa-mobile-screen',        'label'=>'Header Mobile'],
                    ['tab'=>'navigation', 'icon'=>'fa-bars',                 'label'=>'Navigation'],
                    ['tab'=>'map',        'icon'=>'fa-map-location-dot',     'label'=>'Map'],
                    ['tab'=>'footer',     'icon'=>'fa-window-minimize',      'label'=>'Footer'],
                    ['tab'=>'logo_icons', 'icon'=>'fa-icons',                'label'=>'Logo & Icons'],
                ];
                @endphp
                @foreach($navItems as $item)
                <button @click="activeTab = '{{ $item['tab'] }}'"
                    :class="activeTab === '{{ $item['tab'] }}' ? 'ap-nav-btn active' : 'ap-nav-btn'">
                    <i class="fa-solid {{ $item['icon'] }}" style="width:14px;text-align:center;font-size:11px;"></i>
                    {{ $item['label'] }}
                </button>
                @endforeach
            </nav>
        </div>

        {{-- Main Form Container --}}
        <form action="{{ locale_route('admin.settings.group.update', 'appearance') }}" method="POST" class="flex-1 min-w-0" 
              @submit="this.action = this.action.split('#')[0] + '#' + activeTab">
            @csrf @method('PUT')

            <div class="card overflow-hidden">

                {{-- Tabs Content --}}
                <div style="padding:20px 24px;">

                    {{-- GENERAL --}}
                    <div x-show="activeTab === 'general'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8">Cấu hình chung</h2>
                        <div class="space-y-8">
                            <div>
                                <label
                                    class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block"></label>
                                <input type="text" name="settings[site_name]" value="{{ $settingsMap['site_name'] ?? '' }}"
                                    class="form-input rounded-2xl border-slate-100 py-4 font-semibold text-slate-700"
                                    placeholder="">
                            </div>
                            <div>
                                <label
                                    class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Banner
                                    các chuyên mục</label>
                                <div class="flex gap-2">
                                    <input type="text" name="settings[category_banner]" id="category_banner"
                                        value="{{ $settingsMap['category_banner'] ?? '' }}"
                                        class="form-input rounded-2xl border-slate-100 py-4" placeholder="">
                                    <button type="button" onclick="openMediaPicker('category_banner')"
                                        class="bg-blue-600 text-white px-8 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/20 active:scale-95 transition-all flex-shrink-0">
                                        <i class="fa-solid fa-images mr-2"></i> Chọn Ảnh
                                    </button>
                                </div>
                            </div>
                            {{-- Global Colors moved to Design System --}}
                        </div>
                    </div>


                    <div x-show="activeTab === 'topbar'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">TOP BAR</h2>
                        <div class="space-y-8">
                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Hiển
                                        Thị Top Bar</label>
                                    <div class="flex bg-slate-100 p-1.5 rounded-2xl w-fit">
                                        <button type="button" @click="topbarShow = '1'"
                                            :class="topbarShow == '1' ? 'bg-white text-blue-600 shadow-md font-black' : 'text-slate-400 font-bold'"
                                            class="px-8 py-2.5 rounded-xl text-[10px] transition-all uppercase tracking-widest">YES</button>
                                        <button type="button" @click="topbarShow = '0'"
                                            :class="topbarShow == '0' ? 'bg-rose-500 text-white shadow-md font-black' : 'text-slate-400 font-bold'"
                                            class="px-8 py-2.5 rounded-xl text-[10px] transition-all uppercase tracking-widest ml-1">NO</button>
                                        <input type="hidden" name="settings[topbar_show]" :value="topbarShow">
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Câu
                                        welcome top bar</label>
                                    @if(isset($activeLanguages) && $activeLanguages->count() > 1)
                                        <div x-data="{ topbarWelcomeLang: '{{ $activeLanguages->first()->code }}' }" class="space-y-3">
                                            <div class="flex gap-1 flex-wrap">
                                                @foreach($activeLanguages as $lang)
                                                    <button type="button"
                                                        @click="topbarWelcomeLang = '{{ $lang->code }}'"
                                                        :class="topbarWelcomeLang === '{{ $lang->code }}' ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-100 text-slate-500'"
                                                        class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                                                        {{ strtoupper($lang->code) }}
                                                    </button>
                                                @endforeach
                                            </div>
                                            @foreach($activeLanguages as $lang)
                                                <div x-show="topbarWelcomeLang === '{{ $lang->code }}'">
                                                    <input type="text" name="settings[topbar_welcome_{{ $lang->code }}]"
                                                        value="{{ $settingsMap['topbar_welcome_' . $lang->code] ?? ($lang->is_default ? ($settingsMap['topbar_welcome'] ?? '') : '') }}"
                                                        class="form-input rounded-2xl border-slate-100 py-4 font-semibold text-slate-700"
                                                        placeholder="{{ $lang->code === 'vi' ? 'Giao hàng miễn phí...' : 'Free delivery...' }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <input type="text" name="settings[topbar_welcome]"
                                            value="{{ $settingsMap['topbar_welcome'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 py-4 font-semibold text-slate-700"
                                            placeholder="">
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-8">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Câu
                                        bên phải top bar</label>
                                    @if(isset($activeLanguages) && $activeLanguages->count() > 1)
                                        <div x-data="{ topbarRightLang: '{{ $activeLanguages->first()->code }}' }" class="space-y-3">
                                            <div class="flex gap-1 flex-wrap">
                                                @foreach($activeLanguages as $lang)
                                                    <button type="button"
                                                        @click="topbarRightLang = '{{ $lang->code }}'"
                                                        :class="topbarRightLang === '{{ $lang->code }}' ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-100 text-slate-500'"
                                                        class="px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                                                        {{ strtoupper($lang->code) }}
                                                    </button>
                                                @endforeach
                                            </div>
                                            @foreach($activeLanguages as $lang)
                                                <div x-show="topbarRightLang === '{{ $lang->code }}'">
                                                    <input type="text" name="settings[topbar_right_text_{{ $lang->code }}]"
                                                        value="{{ $settingsMap['topbar_right_text_' . $lang->code] ?? ($lang->is_default ? ($settingsMap['topbar_right_text'] ?? '') : '') }}"
                                                        class="form-input rounded-2xl border-slate-100 py-4 font-bold text-slate-700"
                                                        placeholder="{{ $lang->code === 'vi' ? 'Cần trợ giúp? Gọi: ...' : 'Need help? Call: ...' }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <input type="text" name="settings[topbar_right_text]"
                                            value="{{ $settingsMap['topbar_right_text'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 py-4 font-bold text-slate-700"
                                            placeholder="">
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-8">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Hình
                                        nền top bar</label>
                                    <div class="flex gap-2">
                                        <input type="text" name="settings[topbar_bg_image]" id="topbar_bg_image"
                                            value="{{ $settingsMap['topbar_bg_image'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 py-4" placeholder="">
                                        <button type="button" onclick="openMediaPicker('topbar_bg_image')"
                                            class="bg-blue-600 text-white px-6 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/20 active:scale-95 transition-all flex-shrink-0">Chọn
                                            Ảnh</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- HEADER --}}
                    <div x-show="activeTab === 'header'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">HEADER</h2>
                        <div class="space-y-8">
                            <div class="grid grid-cols-[1fr_220px_200px] gap-8">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Logo
                                        website</label>
                                    <div class="flex gap-2 mb-4">
                                        <input type="text" name="settings[site_logo]" id="site_logo"
                                            value="{{ $settingsMap['site_logo'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 py-4 text-xs font-mono"
                                            placeholder="">
                                        <button type="button" onclick="openMediaPicker('site_logo')"
                                            class="bg-blue-600 text-white px-8 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/20 flex-shrink-0">Chọn
                                            Ảnh</button>
                                    </div>
                                    <div class="p-4 bg-slate-50 rounded-3xl border border-slate-100 inline-block">
                                        @php
                                            $logoVal = $settingsMap['site_logo'] ?? '';
                                            $logoSrc = $logoVal ? (str_starts_with($logoVal, 'media/') ? \Illuminate\Support\Facades\Storage::disk('public')->url($logoVal) : (str_contains($logoVal, '://') ? $logoVal : asset($logoVal))) : asset('logo/logo-default.png');
                                        @endphp
                                        <img src="{{ $logoSrc }}" class="max-h-20 object-contain">
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Favicon
                                        (32×32px)</label>
                                    <div class="flex gap-2 mb-4">
                                        <input type="text" name="settings[site_favicon]" id="header_favicon"
                                            value="{{ $settingsMap['site_favicon'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 py-4 text-xs font-mono"
                                            placeholder="">
                                        <button type="button" onclick="openMediaPicker('header_favicon')"
                                            class="bg-blue-600 text-white px-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/20 flex-shrink-0">Chọn</button>
                                    </div>
                                    <div class="p-4 bg-slate-50 rounded-3xl border border-slate-100 inline-flex items-center justify-center w-[88px] h-[88px]">
                                        @if(!empty($settingsMap['site_favicon']))
                                            <img src="{{ _murl($settingsMap['site_favicon']) }}" class="w-10 h-10 object-contain">
                                        @else
                                            <span class="text-slate-300"><i class="fa-solid fa-image-slash text-2xl"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Chiều
                                        cao logo</label>
                                    <input type="number" name="settings[logo_height]"
                                        value="{{ $settingsMap['logo_height'] ?? '100' }}"
                                        class="form-input rounded-2xl border-slate-100 py-4 font-bold text-center"
                                        placeholder="">
                                </div>
                            </div>

                            <div>
                                @include('admin.components.color-picker', [
                                    'name' => 'settings[header_bg_color]',
                                    'value' => $settingsMap['header_bg_color'] ?? '#ffffff',
                                    'label' => 'Màu nền header'
                                ])
                            </div>

                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    @include('admin.components.color-picker', [
                                        'name' => 'settings[header_hotline_bg]',
                                        'value' => $settingsMap['header_hotline_bg'] ?? '#ffffff',
                                        'label' => 'Màu nền hotline'
                                    ])
                                </div>
                                <div>
                                    @include('admin.components.color-picker', [
                                        'name' => 'settings[header_hotline_color]',
                                        'value' => $settingsMap['header_hotline_color'] ?? '#000000',
                                        'label' => 'Màu chữ hotline'
                                    ])
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-8 items-end">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Chữ
                                        dưới hotline</label>
                                    <input type="text" name="settings[header_hotline_text]"
                                        value="{{ $settingsMap['header_hotline_text'] ?? '' }}"
                                        class="form-input rounded-2xl border-slate-100 py-4 font-semibold text-slate-700">
                                </div>
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Placeholder ô tìm kiếm</label>
                                    <input type="text" name="settings[search_placeholder]"
                                        value="{{ $settingsMap['search_placeholder'] ?? 'Search for products, categories or brands' }}"
                                        class="form-input rounded-2xl border-slate-100 py-4 font-bold text-slate-700">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-8">
                                <div>
                                    <label
                                        class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Liên kết Chữ dưới hotline</label>
                                    <input type="text" name="settings[header_hotline_link]"
                                        value="{{ $settingsMap['header_hotline_link'] ?? '' }}"
                                        class="form-input rounded-2xl border-slate-100 py-4 font-bold text-slate-700">
                                </div>
                            </div>

                            {{-- Icon Header --}}
                            <div class="border-t border-slate-100 pt-8">
                                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-6">Icon Header</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                    @foreach([
                                        'icon_search'       => 'Icon ' . __('common.search'),
                                        'icon_user'         => 'Icon ' . __('common.account'),
                                        'icon_wishlist'     => 'Icon Wishlist',
                                        'icon_cart'         => 'Icon ' . __('common.cart'),
                                        'icon_category_bar' => 'Icon Category Bar',
                                    ] as $iconKey => $iconLabel)
                                    <div>
                                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">{{ $iconLabel }}</label>
                                        <div class="flex gap-2 mb-2">
                                            <input type="text"
                                                name="settings[{{ $iconKey }}]"
                                                id="{{ $iconKey }}"
                                                value="{{ $settingsMap[$iconKey] ?? '' }}"
                                                class="form-input rounded-2xl border-slate-100 py-3 text-xs font-mono w-full"
                                                placeholder="Đường dẫn ảnh SVG/PNG">
                                            <button type="button" onclick="openMediaPicker('{{ $iconKey }}')"
                                                class="bg-blue-600 text-white px-4 rounded-2xl font-black text-[10px] uppercase flex-shrink-0 active:scale-95 transition-all">
                                                <i class="fa-solid fa-image"></i>
                                            </button>
                                        </div>
                                        @if(!empty($settingsMap[$iconKey]))
                                        <div class="p-2 bg-slate-50 rounded-xl border border-slate-100 inline-flex items-center justify-center w-10 h-10">
                                            <img src="{{ _murl($settingsMap[$iconKey]) }}" alt="{{ $iconLabel }}" class="w-6 h-6 object-contain">
                                        </div>
                                        @else
                                        <div class="p-2 bg-slate-50 rounded-xl border border-dashed border-slate-200 inline-flex items-center justify-center w-10 h-10 text-slate-300">
                                            <i class="fa-regular fa-image text-sm"></i>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MOBILE --}}
                    <div x-show="activeTab === 'mobile'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">HEADER MOBILE</h2>
                        <div class="bg-slate-50/50 rounded-[2rem] p-8 border border-slate-100 mb-10">
                                <div>
                                    <label class="text-[9px] font-black text-slate-400 mb-3 block">ICON GIỎ HÀNG</label>
                                    <div class="flex gap-2">
                                        <input type="text" name="settings[mobile_cart_icon]" id="mobile_cart_icon"
                                            value="{{ $settingsMap['mobile_cart_icon'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 shadow-sm text-xs py-4 w-full">
                                        <button type="button" onclick="openMediaPicker('mobile_cart_icon')"
                                            class="bg-blue-600 text-white px-8 rounded-2xl font-black text-[10px] uppercase flex-shrink-0 active:scale-95 transition-all">Chọn</button>
                                    </div>
                                </div>
                        </div>

                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">MENU MOBILE</h2>
                        <div class="bg-slate-50/50 rounded-[2rem] p-8 border border-slate-100 mb-10">
                            <div class="space-y-8">
                                <div>
                                    <label class="text-[9px] font-black text-slate-400 mb-3 block tracking-[.2em]">HIỂN
                                        THỊ</label>
                                    <div class="flex gap-4">
                                        <input type="hidden" name="settings[mobile_menu_side]" x-model="mobileMenuSide">
                                        
                                        {{-- Option: Left --}}
                                        <div @click="mobileMenuSide = 'left'"
                                            :class="mobileMenuSide === 'left' ? 'border-blue-600 bg-blue-50/10' : 'border-slate-100 bg-white'"
                                            class="w-24 h-16 rounded-2xl border-2 relative overflow-hidden group cursor-pointer transition-all">
                                            <div
                                                class="absolute left-0 top-0 bottom-0 w-8 bg-slate-200 opacity-20 border-r border-slate-200 pointer-events-none">
                                            </div>
                                            {{-- Selection Badge --}}
                                            <div class="absolute top-1 right-1 w-5 h-5 bg-blue-600 text-white rounded-full flex items-center justify-center pointer-events-none transition-all scale-0"
                                                :class="mobileMenuSide === 'left' ? 'scale-100 opacity-100' : 'opacity-0 scale-50'">
                                                <i class="fa-solid fa-check text-[10px]"></i>
                                            </div>
                                        </div>

                                        {{-- Option: Right --}}
                                        <div @click="mobileMenuSide = 'right'"
                                            :class="mobileMenuSide === 'right' ? 'border-blue-600 bg-blue-50/10' : 'border-slate-100 bg-white'"
                                            class="w-24 h-16 rounded-2xl border-2 relative overflow-hidden group cursor-pointer transition-all">
                                            <div
                                                class="absolute right-0 top-0 bottom-0 w-8 bg-slate-200 opacity-20 border-l border-slate-200 pointer-events-none">
                                            </div>
                                            {{-- Selection Badge --}}
                                            <div class="absolute top-1 right-1 w-5 h-5 bg-blue-600 text-white rounded-full flex items-center justify-center pointer-events-none transition-all scale-0"
                                                :class="mobileMenuSide === 'right' ? 'scale-100 opacity-100' : 'opacity-0 scale-50'">
                                                <i class="fa-solid fa-check text-[10px]"></i>
                                            </div>
                                        </div>

                                        {{-- Option: Full --}}
                                        <div @click="mobileMenuSide = 'full'"
                                            :class="mobileMenuSide === 'full' ? 'border-blue-600 bg-blue-50/10' : 'border-slate-100 bg-white'"
                                            class="w-24 h-16 rounded-2xl border-2 flex flex-col items-center justify-center gap-1.5 group cursor-pointer transition-all relative">
                                            <div class="w-12 h-1 bg-slate-200 rounded-full pointer-events-none"></div>
                                            <div class="w-12 h-1 bg-slate-200 rounded-full pointer-events-none"></div>
                                            <div class="w-12 h-1 bg-slate-200 rounded-full pointer-events-none"></div>
                                            {{-- Selection Badge --}}
                                            <div class="absolute top-1 right-1 w-5 h-5 bg-blue-600 text-white rounded-full flex items-center justify-center pointer-events-none transition-all scale-0"
                                                :class="mobileMenuSide === 'full' ? 'scale-100 opacity-100' : 'opacity-0 scale-50'">
                                                <i class="fa-solid fa-check text-[10px]"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-6 items-end">
                                    <div class="col-span-1">
                                        <label
                                            class="text-[9px] font-black text-slate-400 mb-3 block uppercase tracking-widest">Hình
                                            nền menu mobile</label>
                                        <div class="flex gap-2">
                                            <input type="text" name="settings[mobile_menu_image]" id="mobile_menu_image"
                                                value="{{ $settingsMap['mobile_menu_image'] ?? '' }}"
                                                class="form-input rounded-2xl border-slate-100 shadow-sm text-xs py-4 w-full">
                                            <button type="button" onclick="openMediaPicker('mobile_menu_image')"
                                                class="bg-blue-600 text-white px-8 rounded-2xl font-black text-[10px] uppercase flex-shrink-0 active:scale-95 transition-all">Chọn</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="text-3xl font-black text-slate-800 tracking-tighter mb-8 uppercase">TÌM KIẾM
                            MOBILE</h2>
                        <div class="bg-slate-50/50 rounded-[2rem] p-8 border border-slate-100">
                            <div class="grid grid-cols-1 gap-8">
                                <div>
                                    <label
                                        class="text-[9px] font-black text-slate-400 mb-3 block uppercase tracking-widest">Hình
                                        nền tìm kiếm mobile</label>
                                    <div class="flex gap-2">
                                        <input type="text" name="settings[mobile_search_image]" id="mobile_search_image"
                                            value="{{ $settingsMap['mobile_search_image'] ?? '' }}"
                                            class="form-input rounded-2xl border-slate-100 shadow-sm py-4 w-full">
                                        <button type="button" onclick="openMediaPicker('mobile_search_image')"
                                            class="bg-blue-600 text-white px-8 rounded-2xl font-black text-[10px] uppercase flex-shrink-0 active:scale-95 transition-all">Chọn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NAVIGATION --}}
                    <div x-show="activeTab === 'navigation'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        
                        <div class="flex items-center justify-between mb-8">
                            <h2 class="text-3xl font-black text-slate-800 tracking-tighter uppercase">NAVIGATION</h2>
                            <div class="flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-xl">
                                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest">Cấu hình Menu Trình Duyệt</span>
                            </div>
                        </div>

                        <div class="space-y-8">
                            <div class="grid grid-cols-2 gap-8">
                                {{-- Typography Config --}}
                                <div class="relative">
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Kiểu chữ</label>
                                    <button type="button" @click="showNavTypography = !showNavTypography"
                                        class="w-full bg-white border-2 border-slate-100 text-slate-700 py-4 rounded-2xl font-black text-xs uppercase tracking-[.2em] shadow-sm hover:border-blue-500 hover:shadow-md transition-all flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-wand-magic-sparkles text-blue-500"></i> Cấu hình
                                    </button>

                                    {{-- Typography Popup Modal-like --}}
                                    <div x-show="showNavTypography" 
                                         @click.away="showNavTypography = false"
                                         class="absolute left-0 top-full mt-4 w-[400px] bg-white rounded-3xl shadow-2xl border border-slate-100 p-8 z-50 overflow-hidden"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                                         x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                                        
                                        <div class="grid grid-cols-2 gap-6 mb-8">
                                            <div>
                                                <label class="text-[9px] font-black uppercase text-slate-400 mb-3 block">Màu chữ</label>
                                                <input type="color" name="settings[nav_font_color]" value="{{ $settingsMap['nav_font_color'] ?? '#333333' }}"
                                                    class="w-full h-12 rounded-xl border-2 border-slate-100 p-1 cursor-pointer">
                                            </div>
                                            <div>
                                                <label class="text-[9px] font-black uppercase text-slate-400 mb-3 block">Màu chữ (hover)</label>
                                                <input type="color" name="settings[nav_font_color_hover]" value="{{ $settingsMap['nav_font_color_hover'] ?? '#629D23' }}"
                                                    class="w-full h-12 rounded-xl border-2 border-slate-100 p-1 cursor-pointer">
                                            </div>
                                        </div>

                                        <div class="space-y-6">
                                            <div>
                                                <label class="text-[9px] font-bold uppercase text-slate-400 mb-3 block">Font chữ</label>
                                                <input type="text" name="settings[nav_font]" value="{{ $settingsMap['nav_font'] ?? 'Be Vietnam Pro, sans-serif' }}"
                                                    class="w-full py-4 px-6 bg-slate-50 border-0 rounded-2xl text-xs font-bold text-slate-800 focus:ring-2 focus:ring-blue-500/20" placeholder="Font mặc định">
                                            </div>

                                            <div class="flex gap-4">
                                                <div class="flex-1">
                                                    <label class="text-[9px] font-black uppercase text-slate-400 mb-3 block">Line Height</label>
                                                    <input type="number" name="settings[nav_line_height]" value="{{ $settingsMap['nav_line_height'] ?? '1.5' }}" step="0.1"
                                                        class="w-full py-4 px-6 bg-slate-50 border-0 rounded-2xl text-xs font-black text-slate-800 text-center">
                                                </div>
                                                <div class="flex-[2]">
                                                    <label class="text-[9px] font-black uppercase text-slate-400 mb-2 block">In đậm</label>
                                                    <div class="flex gap-1.5 flex-wrap">
                                                        <input type="hidden" name="settings[nav_font_weight]" x-model="navFontWeight">
                                                        <template x-for="w in ['300', '400', '500', '600', '700', '800', '900', 'bold']">
                                                            <button type="button" @click="navFontWeight = w"
                                                                :class="navFontWeight == w ? 'bg-blue-600 text-white shadow-lg' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                                                                class="px-2.5 py-1.5 rounded-lg text-[9px] font-black transition-all" x-text="w"></button>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="text-[9px] font-black uppercase text-slate-400 mb-2 block">Cỡ chữ (px)</label>
                                                <div class="flex gap-1.5 flex-wrap">
                                                    <input type="hidden" name="settings[nav_font_size]" x-model="navFontSize">
                                                    <template x-for="s in ['10', '12', '13', '14', '15', '16', '17', '18', '20', '22', '24', '26', '30', '35', '42', '50']">
                                                        <button type="button" @click="navFontSize = s"
                                                            :class="navFontSize == s ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                                                            class="w-8 h-8 rounded-lg text-[9px] font-black flex items-center justify-center transition-all" x-text="s"></button>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" @click="showNavTypography = false"
                                            class="w-full mt-8 py-3 bg-white border border-slate-200 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-600 hover:bg-slate-50 transition-colors">Đóng</button>
                                    </div>
                                </div>

                                {{-- Menu Position --}}
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Vị trí menu</label>
                                    <div class="flex bg-white border-2 border-slate-50 p-1.5 rounded-2xl shadow-sm">
                                        <input type="hidden" name="settings[nav_position]" x-model="navPosition">
                                        <button type="button" @click="navPosition = 'left'"
                                            :class="navPosition === 'left' ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-50'"
                                            class="flex-1 py-3 px-4 rounded-xl text-[10px] font-black transition-all uppercase tracking-[.15em]">Trái</button>
                                        <button type="button" @click="navPosition = 'center'"
                                            :class="navPosition === 'center' ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-50'"
                                            class="flex-1 py-3 px-4 rounded-xl text-[10px] font-black transition-all uppercase tracking-[.15em] ml-1">Giữa</button>
                                        <button type="button" @click="navPosition = 'right'"
                                            :class="navPosition === 'right' ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-50'"
                                            class="flex-1 py-3 px-4 rounded-xl text-[10px] font-black transition-all uppercase tracking-[.15em] ml-1">Phải</button>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Màu nền</label>
                                    <x-admin.color-picker name="settings[nav_bg_color]" label="" value="{{ $settingsMap['nav_bg_color'] ?? '' }}" />
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Màu chữ menu con</label>
                                    <x-admin.color-picker name="settings[nav_submenu_color]" label="" value="{{ $settingsMap['nav_submenu_color'] ?? '' }}" />
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- MAP --}}
                    <div x-show="activeTab === 'map'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">Cấu hình Map</h2>
                        <div class="space-y-8">
                            <div>
                                <label
                                    class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Google
                                    Maps Iframe (Tùy chọn)</label>
                                <textarea name="settings[google_maps_iframe]" rows="6"
                                    class="form-input rounded-3xl border-slate-100 p-6 font-mono text-xs bg-slate-50/50"
                                    placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'>{{ $settingsMap['google_maps_iframe'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div x-show="activeTab === 'footer'" x-cloak
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight mb-8 uppercase">Cấu hình Footer</h2>
                        <div class="space-y-8">
                            <div>
                                <label
                                    class="form-label text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Bản
                                    quyền (Copyright text)</label>
                                <input type="text" name="settings[site_copyright]"
                                    value="{{ $settingsMap['site_copyright'] ?? '' }}"
                                    class="form-input rounded-2xl border-slate-100 py-4 font-bold text-slate-700"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    {{-- DESIGN SYSTEM --}}
                    <div x-show="activeTab === 'design'" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="card-title mb-4">Design System</h2>
                        
                        <div style="display:flex;flex-direction:column;gap:20px;">
                            {{-- Section: Core Colors --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Màu sắc cốt lõi</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-3 gap-3">
                                    @php
                                        $coreColors = [
                                            'color_primary' => ['label' => 'Primary', 'default' => '#629D23'],
                                            'color_secondary' => ['label' => 'Secondary', 'default' => '#1F1F25'],
                                            'site_bg_color' => ['label' => 'Site BG', 'default' => '#ffffff'],
                                            'color_body' => ['label' => 'Body Text', 'default' => '#6E777D'],
                                            'color_heading_1' => ['label' => 'Heading', 'default' => '#2C3C28'],
                                            'color_success' => ['label' => 'Success', 'default' => '#3EB75E'],
                                            'color_danger' => ['label' => 'Danger', 'default' => '#DC2626'],
                                            'color_warning' => ['label' => 'Warning', 'default' => '#FF8F3C'],
                                            'color_info' => ['label' => 'Info', 'default' => '#1BA2DB'],
                                        ];
                                    @endphp
                                    @foreach($coreColors as $key => $meta)
                                        @include('admin.components.color-picker', [
                                            'name' => "settings[$key]",
                                            'value' => $settingsMap[$key] ?? $meta['default'],
                                            'label' => $meta['label']
                                        ])
                                    @endforeach
                                </div>
                                </div>
                            </div>

                            {{-- Section: Typography System --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Typography — Fonts</span>
                                </div>
                                <div class="card-body">
                                @php
                                    $fontOptions = [
                                        'Inter, sans-serif'                  => 'Inter',
                                        "'Be Vietnam Pro', sans-serif"       => 'Be Vietnam Pro',
                                        "'Roboto', sans-serif"               => 'Roboto',
                                        "'Outfit', sans-serif"               => 'Outfit',
                                        "'Montserrat', sans-serif"           => 'Montserrat',
                                        "'Barlow', sans-serif"               => 'Barlow',
                                        "'Playfair Display', serif"          => 'Playfair Display',
                                        "'Open Sans', sans-serif"            => 'Open Sans',
                                    ];
                                @endphp
                                <div class="grid grid-cols-3 gap-3 mb-3">
                                    <div>
                                        <label class="form-label">Font chính (Main)</label>
                                        <select name="settings[font_main]" class="form-select">
                                            @foreach($fontOptions as $val => $label)
                                                <option value="{{ $val }}" {{ ($settingsMap['font_main'] ?? 'Inter, sans-serif') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Font Tiêu đề (Headings)</label>
                                        <select name="settings[font_heading]" class="form-select">
                                            @foreach($fontOptions as $val => $label)
                                                <option value="{{ $val }}" {{ ($settingsMap['font_heading'] ?? 'Inter, sans-serif') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Font Menu (Navigation)</label>
                                        <select name="settings[nav_font]" class="form-select">
                                            @foreach($fontOptions as $val => $label)
                                                <option value="{{ $val }}" {{ ($settingsMap['nav_font'] ?? 'Inter, sans-serif') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Nhúng Google Fonts (Custom CSS/Link)</label>
                                    <textarea name="settings[font_import_urls]" class="form-textarea" rows="2" placeholder="@import url(...)">{{ $settingsMap['font_import_urls'] ?? '' }}</textarea>
                                    <p class="form-hint">Dán link @import từ Google Fonts vào đây</p>
                                </div>
                                </div>
                            </div>

                            {{-- Section: Font Sizes & Headings --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Kích thước Headings & Font Sizes</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-6 gap-3 mb-3">
                                    @foreach(['h1' => '60px', 'h2' => '30px', 'h3' => '26px', 'h4' => '18px', 'h5' => '16px', 'h6' => '15px'] as $h => $def)
                                        <div>
                                            <label class="form-label">{{ strtoupper($h) }}</label>
                                            <input type="text" name="settings[{{ $h }}]" value="{{ $settingsMap[$h] ?? $def }}" 
                                                class="form-input text-center" placeholder="{{ $def }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid grid-cols-3 gap-3 mb-3">
                                    @foreach(['b1' => '16px', 'b2' => '16px', 'b3' => '14px'] as $b => $def)
                                        <div>
                                            <label class="form-label">Body Size ({{ strtoupper($b) }})</label>
                                            <input type="text" name="settings[font_size_{{ $b }}]" value="{{ $settingsMap['font_size_' . $b] ?? $def }}" 
                                                class="form-input" placeholder="{{ $def }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid grid-cols-3 gap-3">
                                    @foreach(['b1' => '1.3', 'b2' => '1.3', 'b3' => '1.3'] as $b => $def)
                                        <div>
                                            <label class="form-label">Line Height ({{ strtoupper($b) }})</label>
                                            <input type="text" name="settings[line_height_{{ $b }}]" value="{{ $settingsMap['line_height_' . $b] ?? $def }}" 
                                                class="form-input" placeholder="{{ $def }}">
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>

                            {{-- Section: Social Colors --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Màu sắc Mạng xã hội</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-3 gap-3">
                                    @php
                                        $socialColors = [
                                            'color_facebook'  => ['label' => 'Facebook',  'default' => '#3B5997'],
                                            'color_twitter'   => ['label' => 'Twitter/X', 'default' => '#1BA1F2'],
                                            'color_youtube'   => ['label' => 'Youtube',   'default' => '#ED4141'],
                                            'color_linkedin'  => ['label' => 'Linkedin',  'default' => '#0077B5'],
                                            'color_pinterest' => ['label' => 'Pinterest', 'default' => '#E60022'],
                                            'color_instagram' => ['label' => 'Instagram', 'default' => '#C231A1'],
                                            'color_vimeo'     => ['label' => 'Vimeo',     'default' => '#00ADEF'],
                                            'color_twitch'    => ['label' => 'Twitch',    'default' => '#6441A3'],
                                            'color_discord'   => ['label' => 'Discord',   'default' => '#7289da'],
                                        ];
                                    @endphp
                                    @foreach($socialColors as $key => $meta)
                                        @include('admin.components.color-picker', [
                                            'name' => "settings[$key]",
                                            'value' => $settingsMap[$key] ?? $meta['default'],
                                            'label' => $meta['label']
                                        ])
                                    @endforeach
                                </div>
                                </div>
                            </div>

                            {{-- Section: Font Weights --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">Độ đậm nhạt (Font Weights)</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-7 gap-3 mb-3">
                                    @php
                                        $weights = ['light' => 300, 'regular' => 400, 'medium' => 500, 'semi_bold' => 600, 'bold' => 700, 'extra_bold' => 800, 'black' => 900];
                                    @endphp
                                    @foreach($weights as $name => $val)
                                        <div>
                                            <label class="form-label">{{ str_replace('_', ' ', ucfirst($name)) }}</label>
                                            <input type="number" name="settings[p_{{ $name }}]" value="{{ $settingsMap['p_' . $name] ?? $val }}" 
                                                class="form-input text-center">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flash flash-success" style="margin-bottom:0;">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Font Weights chỉ có tác dụng nếu Font bạn chọn có hỗ trợ các trọng lượng tương ứng.
                                </div>
                                </div>
                            </div>
                        </div>
                        {{-- LOGO & ICONS --}}
                    <div x-show="activeTab === 'logo_icons'" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h2 class="card-title mb-4">Logo & Hệ thống Icon</h2>
                        
                        <div style="display:flex;flex-direction:column;gap:16px;">
                            {{-- Site Logos --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><i class="fa-solid fa-image text-blue-500 mr-1"></i> Logo Website</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-2 gap-4">
                                    <div style="display:flex;flex-direction:column;gap:8px;">
                                        <label class="form-label">Logo chính (Header)</label>
                                        <div style="display:flex;gap:6px;">
                                            <input type="text" id="logo_main" value="{{ $settingsMap['site_logo'] ?? '' }}" class="form-input" placeholder="URL logo..." readonly>
                                            <button type="button" onclick="openMediaPicker('site_logo'); document.getElementById('logo_main').value = document.getElementById('site_logo').value;" class="btn btn-secondary btn-sm" style="flex-shrink:0;"><i class="fa-solid fa-images"></i></button>
                                        </div>
                                        <div style="padding:10px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;min-height:72px;">
                                            <img src="{{ _murl($settingsMap['site_logo'] ?? '', 'theme/images/logo/logo-01.svg') }}" style="max-height:44px;object-fit:contain;">
                                        </div>
                                    </div>
                                    <div style="display:flex;flex-direction:column;gap:8px;">
                                        <label class="form-label">Favicon (32x32px)</label>
                                        <div style="display:flex;gap:6px;">
                                            <input type="text" id="logo_favicon_preview" value="{{ $settingsMap['site_favicon'] ?? '' }}" class="form-input" placeholder="URL favicon..." readonly>
                                            <button type="button" onclick="openMediaPicker('header_favicon'); document.getElementById('logo_favicon_preview').value = document.getElementById('header_favicon').value;" class="btn btn-secondary btn-sm" style="flex-shrink:0;"><i class="fa-solid fa-images"></i></button>
                                        </div>
                                        <div style="padding:10px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;min-height:72px;">
                                            @if(!empty($settingsMap['site_favicon']))
                                                <img src="{{ _murl($settingsMap['site_favicon']) }}" style="width:32px;height:32px;object-fit:contain;">
                                            @else
                                                <i class="fa-solid fa-image-slash" style="color:#e2e8f0;font-size:22px;"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            {{-- Action Icons --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><i class="fa-solid fa-shapes text-orange-400 mr-1"></i> Icon Hành động</span>
                                </div>
                                <div class="card-body">
                                <p class="form-hint mb-3">Dùng class FontAwesome (vd: fa-light fa-cart-shopping) hoặc URL ảnh SVG</p>
                                <div class="grid grid-cols-4 gap-3">
                                    @php
                                        $actionIcons = [
                                            'icon_cart'     => ['label' => __('common.cart'),    'default' => 'fa-light fa-cart-shopping'],
                                            'icon_user'     => ['label' => __('common.account'), 'default' => 'fa-light fa-user'],
                                            'icon_wishlist' => ['label' => 'Yêu thích',          'default' => 'fa-light fa-heart'],
                                            'icon_search'   => ['label' => __('common.search'),  'default' => 'fa-light fa-magnifying-glass'],
                                        ];
                                    @endphp
                                    @foreach($actionIcons as $key => $icon)
                                        <div style="display:flex;flex-direction:column;gap:6px;">
                                            <label class="form-label">{{ $icon['label'] }}</label>
                                            <div style="display:flex;gap:4px;">
                                                <input type="text" name="settings[{{ $key }}]" id="icon_{{ $key }}" value="{{ $settingsMap[$key] ?? $icon['default'] }}" class="form-input" style="font-size:11px;">
                                                <button type="button" onclick="openMediaPicker('icon_{{ $key }}')" class="btn btn-secondary btn-sm" style="flex-shrink:0;"><i class="fa-solid fa-image"></i></button>
                                            </div>
                                            <div style="height:48px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;">
                                                @php $val = $settingsMap[$key] ?? $icon['default']; @endphp
                                                @if(\Illuminate\Support\Str::contains($val, 'fa-') && !\Illuminate\Support\Str::contains($val, '/'))
                                                    <i class="{{ $val }}" style="font-size:18px;color:#2563eb;"></i>
                                                @else
                                                    <img src="{{ asset($val) }}" style="height:24px;width:24px;object-fit:contain;">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>

                            {{-- Other Icons --}}
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><i class="fa-solid fa-sliders text-teal-500 mr-1"></i> Icon Chức năng khác</span>
                                </div>
                                <div class="card-body">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="form-label">Icon Menu Danh mục (Category Bar)</label>
                                        <div style="display:flex;gap:6px;">
                                            <input type="text" name="settings[icon_category_bar]" id="icon_cat_bar" value="{{ $settingsMap['icon_category_bar'] ?? 'fa-solid fa-bars' }}" class="form-input">
                                            <button type="button" onclick="openMediaPicker('icon_cat_bar')" class="btn btn-secondary btn-sm" style="flex-shrink:0;"><i class="fa-solid fa-images"></i></button>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label">Icon Quay lại đầu trang (Back to top)</label>
                                        <div style="display:flex;gap:6px;">
                                            <input type="text" name="settings[icon_back_to_top]" id="icon_btt" value="{{ $settingsMap['icon_back_to_top'] ?? 'fa-solid fa-arrow-up' }}" class="form-input">
                                            <button type="button" onclick="openMediaPicker('icon_btt')" class="btn btn-secondary btn-sm" style="flex-shrink:0;"><i class="fa-solid fa-images"></i></button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Action Bar --}}
                <div style="background:#0f172a;padding:14px 24px;display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <p style="color:#fff;font-size:13px;font-weight:600;">Lưu thay đổi</p>
                        <p style="color:#475569;font-size:11px;margin-top:2px;">Cài đặt áp dụng ngay lập tức cho toàn website</p>
                    </div>
                    <div style="display:flex;gap:8px;">
                        <a href="{{ locale_route('admin.settings.index') }}" class="btn btn-secondary">Hủy</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Lưu cấu hình
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .form-input:focus {
            border-color: #3b82f6;
            ring-color: #dbeafe;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('colorPicker', (initialHex) => ({
                hex: initialHex || '#000000',
                r: 0,
                g: 0,
                b: 0,
                init() {
                    this.updateFromHex();
                },
                updateFromHex() {
                    if (!this.hex.startsWith('#')) this.hex = '#' + this.hex;
                    const r = parseInt(this.hex.slice(1, 3), 16);
                    const g = parseInt(this.hex.slice(3, 5), 16);
                    const b = parseInt(this.hex.slice(5, 7), 16);
                    if (!isNaN(r)) this.r = r;
                    if (!isNaN(g)) this.g = g;
                    if (!isNaN(b)) this.b = b;
                },
                updateFromRGB() {
                    const toHex = (n) => {
                        const h = Math.max(0, Math.min(255, n)).toString(16);
                        return h.length === 1 ? '0' + h : h;
                    };
                    this.hex = '#' + toHex(this.r) + toHex(this.g) + toHex(this.b);
                }
            }));
        });
    </script>
@endpush
