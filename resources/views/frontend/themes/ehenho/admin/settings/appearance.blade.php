@extends('admin.layouts.app')

@section('title', 'Cấu hình Giao diện')
@section('page-title', 'Cấu hình Giao diện')
@section('page-subtitle', 'Tùy chỉnh màu sắc, header, slider hero và bố cục website eHenho')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
/* ── STANDARD CMS DESIGN SYSTEM UTILITIES ── */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
    transition: all .15s;
    text-decoration: none;
    white-space: nowrap;
}
.btn-primary { background: #2563eb; color: #fff; }
.btn-primary:hover { background: #1d4ed8; }
.btn-secondary { background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; }
.btn-secondary:hover { background: #f1f5f9; }

.card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(15,23,42,.04);
}
.card-header {
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #f1f5f9;
}
.card-title { font-size: 13px; font-weight: 700; color: #0f172a; }
.card-body { padding: 20px; }

.form-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .05em;
    color: #475569;
    margin-bottom: 6px;
}
.form-input, .form-select {
    width: 100%;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 13.5px;
    font-weight: 400;
    color: #0f172a;
    outline: none;
    transition: border-color .15s, box-shadow .15s;
    background: #fff;
}
.form-input:focus, .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,.1);
}

.ap-nav-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    text-align: left;
    transition: all .15s ease;
    margin-bottom: 2px;
    background: transparent;
    color: #475569;
}
.ap-nav-btn:hover {
    background: #f1f5f9;
    color: #0f172a;
}
.ap-nav-btn.active {
    background: #2563eb !important;
    color: #fff !important;
}

/* Zero-FOUC Tab System */
html:not(.alpine-loaded) .ap-tab-pane {
    display: none !important;
}
html:not(.alpine-loaded)[data-admin-tab="design"] .ap-tab-pane[data-tab="design"],
html:not(.alpine-loaded)[data-admin-tab="logo_icons"] .ap-tab-pane[data-tab="logo_icons"],
html:not(.alpine-loaded)[data-admin-tab="header"] .ap-tab-pane[data-tab="header"],
html:not(.alpine-loaded)[data-admin-tab="menus"] .ap-tab-pane[data-tab="menus"],
html:not(.alpine-loaded)[data-admin-tab="widgets"] .ap-tab-pane[data-tab="widgets"],
html:not(.alpine-loaded)[data-admin-tab="general"] .ap-tab-pane[data-tab="general"] {
    display: block !important;
}
html:not(.alpine-loaded):not([data-admin-tab]) .ap-tab-pane[data-tab="design"] {
    display: block !important;
}
html:not(.alpine-loaded)[data-admin-tab="design"] .ap-nav-btn[data-tab-target="design"],
html:not(.alpine-loaded)[data-admin-tab="logo_icons"] .ap-nav-btn[data-tab-target="logo_icons"],
html:not(.alpine-loaded)[data-admin-tab="header"] .ap-nav-btn[data-tab-target="header"],
html:not(.alpine-loaded)[data-admin-tab="menus"] .ap-nav-btn[data-tab-target="menus"],
html:not(.alpine-loaded)[data-admin-tab="widgets"] .ap-nav-btn[data-tab-target="widgets"],
html:not(.alpine-loaded)[data-admin-tab="general"] .ap-nav-btn[data-tab-target="general"],
html:not(.alpine-loaded):not([data-admin-tab]) .ap-nav-btn[data-tab-target="design"] {
    background: #2563eb !important;
    color: #fff !important;
}

.eh-color-picker-box {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: 2px solid #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    cursor: pointer;
    padding: 0;
    appearance: none;
    -webkit-appearance: none;
    flex-shrink: 0;
}
.eh-color-picker-box::-webkit-color-swatch-wrapper { padding: 0; }
.eh-color-picker-box::-webkit-color-swatch { border: none; border-radius: 6px; }

.preset-pill {
    cursor: pointer;
    transition: transform 0.15s, box-shadow 0.15s;
}
.preset-pill:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.slide-preview-thumb {
    height: 110px;
    border-radius: 10px;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
    border: 1px solid #e2e8f0;
}
.slide-preview-overlay {
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
}

.eh-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(4px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
}
.eh-modal-card {
    background: #fff;
    border-radius: 14px;
    width: 100%;
    max-width: 520px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    animation: ehModalIn .2s ease-out;
}
@keyframes ehModalIn {
    from { opacity: 0; transform: scale(0.96) translateY(8px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
</style>
@endpush

@section('content')
@php
    $currentProject = $currentProject ?? (request()->attributes->get('project') ?? session('current_project'));
    $projectCode = is_object($currentProject) ? ($currentProject->code ?? 'ehenho') : (is_string($currentProject) ? $currentProject : 'ehenho');

    $settings = $settings ?? [];
    $themeColor = $settings['theme_color'] ?? setting('theme_color', '#007cae');
    $categoryBarColor = $settings['category_bar_color'] ?? setting('category_bar_color', '#e85151');
    $headerBgColor = $settings['header_bg_color'] ?? setting('header_bg_color', '#202020');
    $headerTextColor = $settings['header_text_color'] ?? setting('header_text_color', '#f0f0f0');
    $headerButtonColor = $settings['header_button_color'] ?? setting('header_button_color', '#d9534f');

    $siteLogo = $settings['site_logo'] ?? setting('site_logo', '');
    $siteFavicon = $settings['site_favicon'] ?? setting('site_favicon', '');
    $siteName = $settings['site_name'] ?? setting('site_name', 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương');
    $siteCopyright = $settings['site_copyright'] ?? setting('site_copyright', 'Email: hi@ehenho.com');
    $socialFacebook = $settings['social_facebook'] ?? setting('social_facebook', 'http://www.facebook.com/ehenho');
    $socialTwitter = $settings['social_twitter'] ?? setting('social_twitter', 'http://www.twitter.com/ehenho');
    $socialInstagram = $settings['social_instagram'] ?? setting('social_instagram', '');
    $socialYoutube = $settings['social_youtube'] ?? setting('social_youtube', '');
    $socialTiktok = $settings['social_tiktok'] ?? setting('social_tiktok', '');
    $socialZalo = $settings['social_zalo'] ?? setting('social_zalo', '');
    $logoHeight = $settings['logo_height'] ?? setting('logo_height', '40');

    $headerHeight = $settings['header_height'] ?? setting('header_height', '54');
    $headerSticky = $settings['header_sticky'] ?? setting('header_sticky', '1');
    $headerShowSearch = $settings['header_show_search'] ?? setting('header_show_search', '1');
    $headerShowHelp = $settings['header_show_help'] ?? setting('header_show_help', '1');
    $headerShowAuth = $settings['header_show_auth'] ?? setting('header_show_auth', '1');

    $navlinks = $navlinks ?? \App\Http\Controllers\Admin\Ehenho\AdminThemeSettingController::getDefaultNavlinks();
    $slides = $slides ?? \App\Widgets\Ehenho\EhenhoHeroSliderWidget::getDefaultSlides();
    $interval = $interval ?? 5000;

    $initialTab = $initialTab ?? (request()->query('tab') ?: 'design');
@endphp

<script>
    (function() {
        var validTabs = ['design', 'logo_icons', 'header', 'menus', 'widgets', 'general'];
        var hash = (window.location.hash ? window.location.hash.substring(1) : '{{ $initialTab }}') || 'design';
        if (!validTabs.includes(hash)) hash = 'design';
        document.documentElement.setAttribute('data-admin-tab', hash);
    })();
</script>

<div x-data="{
        activeTab: window.location.hash ? window.location.hash.substring(1) : '{{ $initialTab }}',
        filterLocation: 'all',
        themeColor: '{{ $themeColor }}',
        categoryBarColor: '{{ $categoryBarColor }}',
        headerBgColor: '{{ $headerBgColor }}',
        headerTextColor: '{{ $headerTextColor }}',
        headerButtonColor: '{{ $headerButtonColor }}',
        headerSticky: '{{ $headerSticky }}',
        headerShowSearch: '{{ $headerShowSearch }}',
        headerShowHelp: '{{ $headerShowHelp }}',
        headerShowAuth: '{{ $headerShowAuth }}',
        logoUrl: '{{ $siteLogo }}',
        setPreset(theme, cat, hBg, hText, hBtn) {
            this.themeColor = theme;
            this.categoryBarColor = cat;
            this.headerBgColor = hBg;
            this.headerTextColor = hText;
            this.headerButtonColor = hBtn;
        },
        init() {
            document.documentElement.classList.add('alpine-loaded');
            this.$watch('activeTab', (val) => {
                location.hash = val;
                document.documentElement.setAttribute('data-admin-tab', val);
            });
            window.addEventListener('hashchange', () => {
                const h = window.location.hash.substring(1);
                if (h && h !== this.activeTab) this.activeTab = h;
            });
        }
    }" style="display:flex;gap:16px;align-items:flex-start;">

    {{-- ── Left Navigation Sidebar (width: 200px, standard CMS) ── --}}
    <div style="width:200px;flex-shrink:0;background:#fff;border-radius:12px;border:1px solid #e2e8f0;overflow:hidden;position:sticky;top:16px;">
        <div style="padding:10px 14px;border-bottom:1px solid #f1f5f9;background:#f8fafc;">
            <p style="font-size:9px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin:0;">Danh mục cấu hình</p>
        </div>
        <nav style="padding:6px;">
            <button type="button" @click="activeTab = 'design'" data-tab-target="design" :class="activeTab === 'design' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-palette" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Design System</span>
            </button>
            <button type="button" @click="activeTab = 'logo_icons'" data-tab-target="logo_icons" :class="activeTab === 'logo_icons' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-icons" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Logo &amp; Icons</span>
            </button>
            <button type="button" @click="activeTab = 'header'" data-tab-target="header" :class="activeTab === 'header' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-window-maximize" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Header Bar &amp; Nav</span>
            </button>
            <button type="button" @click="activeTab = 'menus'" data-tab-target="menus" :class="activeTab === 'menus' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-bars-staggered" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Menu Header &amp; Footer</span>
            </button>
            <button type="button" @click="activeTab = 'widgets'" data-tab-target="widgets" :class="activeTab === 'widgets' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-images" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Slider Hero</span>
            </button>
            <button type="button" @click="activeTab = 'general'" data-tab-target="general" :class="activeTab === 'general' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-gear" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Cấu hình chung &amp; Social</span>
            </button>
        </nav>
    </div>

    {{-- ── Right Main Form Container ── --}}
    <form id="appearanceMainForm" action="{{ route('project.admin.ehenho.theme.appearance.update', $projectCode) }}" method="POST" enctype="multipart/form-data" class="flex-1 min-w-0" @submit="this.action = this.action.split('#')[0] + '#' + activeTab">
        @csrf
        <input type="hidden" name="active_tab" :value="activeTab">

        <div class="card overflow-hidden">
            <div style="padding:20px 24px;">

                {{-- ======================================================== --}}
                {{-- TAB 1: DESIGN SYSTEM --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'design'" x-cloak class="ap-tab-pane space-y-6" data-tab="design"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Design System &amp; Bảng Màu</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Tùy biến bảng màu nhận diện thương hiệu cho nền tảng hẹn hò.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[11px] uppercase tracking-wider">
                            Live System
                        </span>
                    </div>

                    <!-- Presets Selection -->
                    <div>
                        <label class="form-label mb-2 flex items-center gap-1.5">
                            <i class="fa-solid fa-wand-magic-sparkles text-blue-600"></i>
                            Bộ Phối Màu Thịnh Hành (Click chọn nhanh)
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div @click="setPreset('#e11d48', '#be123c', '#001235', '#ffffff', '#e11d48')" class="preset-pill p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white text-left">
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#e11d48;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#be123c;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#001235;"></span>
                                </div>
                                <div class="font-bold text-xs text-slate-800">Lãng Mạn (Rose)</div>
                                <div class="text-[10px] text-slate-500">Rose / Navy Blue</div>
                            </div>

                            <div @click="setPreset('#007cae', '#e85151', '#202020', '#f0f0f0', '#d9534f')" class="preset-pill p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white text-left">
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#007cae;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#e85151;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#202020;"></span>
                                </div>
                                <div class="font-bold text-xs text-slate-800">eHenho Gốc</div>
                                <div class="text-[10px] text-slate-500">Cyan / Red / Dark</div>
                            </div>

                            <div @click="setPreset('#ec4899', '#db2777', '#1e1b4b', '#ffffff', '#ec4899')" class="preset-pill p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white text-left">
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#ec4899;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#db2777;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#1e1b4b;"></span>
                                </div>
                                <div class="font-bold text-xs text-slate-800">Ngọt Ngào (Pink)</div>
                                <div class="text-[10px] text-slate-500">Pink / Indigo</div>
                            </div>

                            <div @click="setPreset('#7c3aed', '#6d28d9', '#0f172a', '#ffffff', '#7c3aed')" class="preset-pill p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white text-left">
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#7c3aed;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#6d28d9;"></span>
                                    <span class="w-3.5 h-3.5 rounded-full" style="background:#0f172a;"></span>
                                </div>
                                <div class="font-bold text-xs text-slate-800">Quyến Rũ (Purple)</div>
                                <div class="text-[10px] text-slate-500">Violet / Dark Slate</div>
                            </div>
                        </div>
                    </div>

                    <!-- Color Pickers Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="card p-4">
                            <label class="form-label">Màu chủ đạo (Theme Primary)</label>
                            <p class="text-[11px] text-slate-500 mb-2.5">Màu viền, hover, icon trái tim và các điểm nhấn thương hiệu.</p>
                            <div class="flex items-center gap-2.5">
                                <input type="color" x-model="themeColor" class="eh-color-picker-box">
                                <input type="text" name="theme_color" x-model="themeColor" class="form-input font-mono text-xs uppercase font-bold">
                            </div>
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Màu thanh danh mục (Navlink Bar 2)</label>
                            <p class="text-[11px] text-slate-500 mb-2.5">Màu nền thanh điều hướng tìm kiếm danh mục nằm dưới Header.</p>
                            <div class="flex items-center gap-2.5">
                                <input type="color" x-model="categoryBarColor" class="eh-color-picker-box">
                                <input type="text" name="category_bar_color" x-model="categoryBarColor" class="form-input font-mono text-xs uppercase font-bold">
                            </div>
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Màu nền Header chính</label>
                            <p class="text-[11px] text-slate-500 mb-2.5">Màu nền của thanh Header trên cùng chứa Logo và các menu.</p>
                            <div class="flex items-center gap-2.5">
                                <input type="color" x-model="headerBgColor" class="eh-color-picker-box">
                                <input type="text" name="header_bg_color" x-model="headerBgColor" class="form-input font-mono text-xs uppercase font-bold">
                            </div>
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Màu chữ Header</label>
                            <p class="text-[11px] text-slate-500 mb-2.5">Màu văn bản và icon hiển thị trên thanh Header chính.</p>
                            <div class="flex items-center gap-2.5">
                                <input type="color" x-model="headerTextColor" class="eh-color-picker-box">
                                <input type="text" name="header_text_color" x-model="headerTextColor" class="form-input font-mono text-xs uppercase font-bold">
                            </div>
                        </div>

                        <div class="card p-4 md:col-span-2">
                            <label class="form-label">Màu nút hành động Header</label>
                            <p class="text-[11px] text-slate-500 mb-2.5">Màu nút nổi bật trên Header (VD: nút "Đăng Ký / Tạo Hồ Sơ").</p>
                            <div class="flex items-center gap-2.5 max-w-sm">
                                <input type="color" x-model="headerButtonColor" class="eh-color-picker-box">
                                <input type="text" name="header_button_color" x-model="headerButtonColor" class="form-input font-mono text-xs uppercase font-bold">
                            </div>
                        </div>
                    </div>

                    <!-- Live Header Contrast Inspector -->
                    <div class="card p-5 bg-slate-50/50">
                        <div class="flex items-center justify-between mb-3">
                            <label class="form-label m-0 flex items-center gap-1.5">
                                <i class="fa-solid fa-eye text-blue-600"></i>
                                Mô Phỏng Trực Tiếp &amp; Đo Độ Tương Phản (Header Live Inspector)
                            </label>
                            <span class="text-[11px] font-bold text-slate-500">WCAG Contrast Preview</span>
                        </div>

                        <div class="rounded-xl overflow-hidden border border-slate-200 shadow-sm" :style="'background-color: ' + headerBgColor">
                            <div class="px-5 py-3.5 flex items-center justify-between" :style="'color: ' + headerTextColor">
                                <div class="flex items-center gap-3">
                                    <template x-if="logoUrl">
                                        <img :src="logoUrl" alt="Logo" class="h-8 object-contain">
                                    </template>
                                    <template x-if="!logoUrl">
                                        <span class="font-black text-sm tracking-tight flex items-center gap-1.5">
                                            <i class="fa-solid fa-heart" :style="'color: ' + themeColor"></i>
                                            eHenho.com
                                        </span>
                                    </template>
                                </div>
                                <div class="hidden sm:flex items-center gap-5 text-xs font-semibold">
                                    <span class="cursor-pointer hover:opacity-80">Trang chủ</span>
                                    <span class="cursor-pointer hover:opacity-80">Tìm bạn</span>
                                    <span class="cursor-pointer hover:opacity-80">Cẩm nang</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <button type="button" class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-white shadow-sm transition-all" :style="'background-color: ' + headerButtonColor">
                                        Tạo hồ sơ
                                    </button>
                                </div>
                            </div>
                            <div class="px-5 py-2 text-xs text-white font-medium flex items-center gap-4 overflow-x-auto" :style="'background-color: ' + categoryBarColor">
                                <span>Tìm bạn bốn phương</span>
                                <span>•</span>
                                <span>Tìm bạn đời</span>
                                <span>•</span>
                                <span>Hẹn hò kết hôn</span>
                                <span>•</span>
                                <span>Kết bạn tâm sự</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- TAB 2: LOGO & ICONS --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'logo_icons'" x-cloak class="ap-tab-pane space-y-6" data-tab="logo_icons"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Logo &amp; Biểu Tượng Favicon</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Tải lên hoặc nhập URL logo thương hiệu và favicon trình duyệt.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[11px] uppercase tracking-wider">
                            Brand Assets
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Website Logo Card -->
                        <div class="card p-5 space-y-4">
                            <label class="form-label">Logo website chính</label>
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center min-h-[90px]" :style="'background-color: ' + headerBgColor">
                                @if(!empty($siteLogo))
                                    <img src="{{ $siteLogo }}" alt="Site Logo" id="logoPreviewImg" class="max-h-14 object-contain">
                                @else
                                    <div id="logoPreviewImg" class="text-slate-400 text-xs italic">Chưa có ảnh logo (đang dùng text mặc định)</div>
                                @endif
                            </div>

                            <div>
                                <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Tải ảnh logo từ máy tính</label>
                                <input type="file" name="site_logo_file" accept="image/*" class="form-input text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </div>

                            <div>
                                <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Hoặc đường dẫn ảnh URL</label>
                                <input type="text" name="site_logo_url" x-model="logoUrl" value="{{ $siteLogo }}" class="form-input font-mono text-xs" placeholder="https://domain.com/logo.png">
                            </div>

                            <div>
                                <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Chiều cao hiển thị của Logo (px)</label>
                                <input type="number" name="logo_height" value="{{ $logoHeight }}" class="form-input text-xs w-32" min="20" max="120">
                            </div>
                        </div>

                        <!-- Favicon Card -->
                        <div class="card p-5 space-y-4">
                            <label class="form-label">Favicon trình duyệt (32x32px)</label>
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center min-h-[90px]">
                                @if(!empty($siteFavicon))
                                    <img src="{{ $siteFavicon }}" alt="Favicon" class="w-8 h-8 object-contain">
                                @else
                                    <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-xs">
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Tải tệp Favicon (.ico, .png)</label>
                                <input type="file" name="site_favicon_file" accept=".ico,.png,.svg,.jpg" class="form-input text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </div>
                            <p class="text-[11px] text-slate-400">Favicon xuất hiện trên tab trình duyệt, bookmark và thông báo ứng dụng.</p>
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- TAB 3: HEADER & MENU NAVIGATION --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'header'" x-cloak class="ap-tab-pane space-y-6" data-tab="header"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Cấu hình Header &amp; Menu Điều Hướng</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Thiết lập chiều cao, trạng thái cố định và danh mục đường dẫn Bar 2.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[11px] uppercase tracking-wider">
                            Header Layout
                        </span>
                    </div>

                    <!-- Prominent Banner Chuyển nhanh & Thêm Menu Footer -->
                    <div class="p-4 rounded-xl border border-blue-200 bg-gradient-to-r from-blue-50/90 via-indigo-50/70 to-purple-50/90 shadow-sm">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center text-lg flex-shrink-0 shadow-sm">
                                    <i class="fa-solid fa-sitemap"></i>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <button type="button" @click="activeTab = 'menus'; filterLocation = 'footer'; openAddMenuModal('footer')" class="btn btn-primary text-xs shadow-sm">
                                    <i class="fa-solid fa-plus"></i> Thêm Menu Footer Mới
                                </button>
                                <button type="button" @click="activeTab = 'menus'" class="btn btn-secondary text-xs">
                                    <i class="fa-solid fa-bars-staggered"></i> Quản lý toàn bộ Menu
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="card p-4">
                            <label class="form-label">Chiều cao Header (px)</label>
                            <input type="number" name="header_height" value="{{ $headerHeight }}" class="form-input text-xs" min="40" max="100">
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Cố định Header khi cuộn (Sticky)</label>
                            <select name="header_sticky" class="form-select text-xs">
                                <option value="1" {{ $headerSticky == '1' ? 'selected' : '' }}>Có (Sticky)</option>
                                <option value="0" {{ $headerSticky == '0' ? 'selected' : '' }}>Không cố định</option>
                            </select>
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Nút Tìm kiếm nhanh</label>
                            <select name="header_show_search" class="form-select text-xs">
                                <option value="1" {{ $headerShowSearch == '1' ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ $headerShowSearch == '0' ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>

                        <div class="card p-4">
                            <label class="form-label">Cụm nút Đăng Nhập / Đăng Ký</label>
                            <select name="header_show_auth" class="form-select text-xs">
                                <option value="1" {{ $headerShowAuth == '1' ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ $headerShowAuth == '0' ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>
                    </div>

                    <!-- Category Navigation Links (Bar 2) Table -->
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <div>
                                <span class="card-title">Thanh Danh Mục Điều Hướng (Navlink Bar 2)</span>
                                <p class="text-[11px] text-slate-500 mt-0.5">Các liên kết chuyên mục hẹn hò hiển thị trên thanh màu dưới Header chính.</p>
                            </div>
                            <button type="button" onclick="addNavlinkRow()" class="btn btn-secondary text-xs">
                                <i class="fa-solid fa-plus text-blue-600"></i> Thêm liên kết
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px] border-b border-slate-100">
                                    <tr>
                                        <th class="p-3 text-center w-12">#</th>
                                        <th class="p-3">Tên liên kết (Tiêu đề)</th>
                                        <th class="p-3">Đường dẫn URL</th>
                                        <th class="p-3 text-center w-24">Bật / Tắt</th>
                                        <th class="p-3 text-center w-16">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody id="navlinksTableBody" class="divide-y divide-slate-100">
                                    @foreach($navlinks as $idx => $link)
                                        <tr id="navlinkRow_{{ $idx }}" class="hover:bg-slate-50/50 transition-colors">
                                            <td class="p-3 text-center font-bold text-slate-400">{{ $idx + 1 }}</td>
                                            <td class="p-3">
                                                <input type="text" name="navlinks[{{ $idx }}][title]" value="{{ $link['title'] ?? '' }}" class="form-input text-xs font-semibold">
                                            </td>
                                            <td class="p-3">
                                                <input type="text" name="navlinks[{{ $idx }}][url]" value="{{ $link['url'] ?? '' }}" class="form-input text-xs font-mono text-slate-600">
                                            </td>
                                            <td class="p-3 text-center">
                                                <input type="checkbox" name="navlinks[{{ $idx }}][is_active]" value="1" {{ !empty($link['is_active']) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                                            </td>
                                            <td class="p-3 text-center">
                                                <button type="button" onclick="removeNavlinkRow({{ $idx }})" class="p-1.5 text-slate-400 hover:text-red-600 transition-colors" title="Xóa mục này">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Direct Footer Menus Quick Access Card inside Header Tab -->
                    @php
                        $footerMenus = collect($menus)->filter(fn($m) => in_array($m->location, ['footer', 'footer_bottom']))->values();
                    @endphp
                    <div class="card overflow-hidden border border-purple-200/80">
                        <div class="card-header bg-gradient-to-r from-purple-50/50 to-pink-50/30">
                            <div>
                                <span class="card-title text-purple-950 flex items-center gap-2">
                                    <i class="fa-solid fa-shoe-prints text-purple-600"></i>
                                    Danh mục Menu Chân Trang (Footer)
                                </span>
                                <p class="text-[11px] text-slate-500 mt-0.5">Các nhóm liên kết hiển thị tại chân trang website (Khu vực, Tình trạng, Mục đích, Tỉnh thành, Chính sách).</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" @click="activeTab = 'menus'; filterLocation = 'footer'; openAddMenuModal('footer')" class="btn btn-primary text-xs shadow-sm">
                                    <i class="fa-solid fa-plus"></i> Thêm Menu Footer Mới
                                </button>
                                <button type="button" @click="activeTab = 'menus'; filterLocation = 'footer'" class="btn btn-secondary text-xs">
                                    <i class="fa-solid fa-arrow-right"></i> Mở trang quản lý Footer
                                </button>
                            </div>
                        </div>

                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                            @forelse($footerMenus as $fMenu)
                                <div class="p-3.5 rounded-xl border border-slate-200 bg-white hover:border-purple-300 hover:shadow-xs transition-all flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between gap-2 mb-1.5">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $fMenu->location === 'footer_bottom' ? 'bg-amber-100 text-amber-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ $fMenu->location === 'footer_bottom' ? 'Footer Bottom' : 'Footer Cột' }}
                                            </span>
                                            <span class="text-[11px] font-semibold text-slate-400">#Thứ tự: {{ $fMenu->sort_order }}</span>
                                        </div>
                                        <h5 class="text-xs font-bold text-slate-900 m-0">{{ $fMenu->name }}</h5>
                                        <p class="text-[11px] text-slate-500 font-mono mt-0.5">{{ $fMenu->slug }} ({{ $fMenu->items->count() }} liên kết)</p>
                                    </div>
                                    <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between">
                                        <button type="button" @click="openAddMenuItemModal({{ $fMenu->id }}, '{{ addslashes($fMenu->name) }}')" class="text-xs text-blue-600 font-semibold hover:underline flex items-center gap-1">
                                            <i class="fa-solid fa-plus text-[10px]"></i> Thêm liên kết
                                        </button>
                                        <button type="button" @click="activeTab = 'menus'; filterLocation = '{{ $fMenu->location }}'" class="text-xs text-purple-700 font-semibold hover:underline flex items-center gap-1">
                                            Chi tiết <i class="fa-solid fa-angle-right text-[10px]"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-6 text-slate-400 text-xs">
                                    Chưa có Menu Footer nào. Hãy bấm nút <strong>Thêm Menu Footer Mới</strong> để tạo!
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- TAB: MULTI-MENU MANAGEMENT (HEADER, FOOTER & MORE) --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'menus'" x-cloak class="ap-tab-pane space-y-6" data-tab="menus"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <div class="flex items-center gap-2">
                                <h2 class="text-base font-bold text-slate-900 tracking-tight">Hệ Thống Quản Lý Multi-Menu</h2>
                                <span class="px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-bold uppercase">Header &amp; Footer Engine</span>
                            </div>
                            <p class="text-xs text-slate-500 mt-0.5">Quản lý toàn bộ cấu trúc Menu đa vị trí: Header chính, 4 nhóm Footer chuyên mục, Footer Bottom chính sách, Mobile &amp; Sidebar.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" @click="openAddMenuModal('footer')" class="btn btn-secondary text-xs">
                                <i class="fa-solid fa-plus text-purple-600"></i> + Thêm Menu Footer
                            </button>
                            <button type="button" @click="openAddMenuModal()" class="btn btn-primary text-xs shadow-sm">
                                <i class="fa-solid fa-plus"></i> + Thêm Menu Mới
                            </button>
                        </div>
                    </div>

                    <!-- Location Filter Navigation Bar -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1">
                        <button type="button" @click="filterLocation = 'all'" :class="filterLocation === 'all' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            Tất cả ({{ count($menus) }})
                        </button>
                        <button type="button" @click="filterLocation = 'header'" :class="filterLocation === 'header' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            <i class="fa-solid fa-window-maximize mr-1"></i> Header ({{ collect($menus)->where('location', 'header')->count() }})
                        </button>
                        <button type="button" @click="filterLocation = 'footer'" :class="filterLocation === 'footer' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-purple-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            <i class="fa-solid fa-shoe-prints mr-1"></i> Chân trang Footer ({{ collect($menus)->where('location', 'footer')->count() }})
                        </button>
                        <button type="button" @click="filterLocation = 'footer_bottom'" :class="filterLocation === 'footer_bottom' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-amber-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            <i class="fa-solid fa-file-contract mr-1"></i> Footer Bottom ({{ collect($menus)->where('location', 'footer_bottom')->count() }})
                        </button>
                        <button type="button" @click="filterLocation = 'sub_location'" :class="filterLocation === 'sub_location' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-teal-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            <i class="fa-solid fa-location-dot mr-1"></i> Thanh Tỉnh Thành ({{ collect($menus)->where('location', 'sub_location')->count() }})
                        </button>
                        <button type="button" @click="filterLocation = 'sidebar'" :class="filterLocation === 'sidebar' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            Sidebar ({{ collect($menus)->where('location', 'sidebar')->count() }})
                        </button>
                        <button type="button" @click="filterLocation = 'mobile'" :class="filterLocation === 'mobile' ? 'px-3 py-1.5 rounded-lg text-xs font-bold bg-rose-600 text-white shadow-xs' : 'px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200'">
                            Mobile ({{ collect($menus)->where('location', 'mobile')->count() }})
                        </button>
                    </div>

                    <!-- Menus List -->
                    <div class="space-y-5">
                        @forelse($menus as $menu)
                            <div x-show="filterLocation === 'all' || filterLocation === '{{ $menu->location }}'"
                                 class="card overflow-hidden border border-slate-200 transition-all hover:border-slate-300 shadow-xs"
                                 id="menuCard_{{ $menu->id }}">
                                
                                {{-- Menu Card Header --}}
                                <div class="p-4 bg-slate-50/70 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold {{ $menu->location === 'header' ? 'bg-blue-100 text-blue-700' : ($menu->location === 'sub_location' ? 'bg-teal-100 text-teal-700' : ($menu->location === 'footer' ? 'bg-purple-100 text-purple-700' : ($menu->location === 'footer_bottom' ? 'bg-amber-100 text-amber-700' : 'bg-slate-200 text-slate-700'))) }}">
                                            @if($menu->location === 'header') <i class="fa-solid fa-window-maximize"></i>
                                            @elseif($menu->location === 'sub_location') <i class="fa-solid fa-location-dot"></i>
                                            @elseif($menu->location === 'footer') <i class="fa-solid fa-shoe-prints"></i>
                                            @elseif($menu->location === 'footer_bottom') <i class="fa-solid fa-file-contract"></i>
                                            @else <i class="fa-solid fa-bars"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <h3 class="text-sm font-bold text-slate-900 m-0">{{ $menu->name }}</h3>
                                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $menu->location === 'header' ? 'bg-blue-100 text-blue-800' : ($menu->location === 'sub_location' ? 'bg-teal-100 text-teal-800' : ($menu->location === 'footer' ? 'bg-purple-100 text-purple-800' : ($menu->location === 'footer_bottom' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700'))) }}">
                                                    Vị trí: {{ $menu->location }}
                                                </span>
                                                <span class="px-1.5 py-0.5 rounded text-[10px] font-medium bg-slate-100 text-slate-500 font-mono">
                                                    slug: {{ $menu->slug }}
                                                </span>
                                                @if($menu->is_active)
                                                    <span class="w-2 h-2 rounded-full bg-emerald-500" title="Đang kích hoạt"></span>
                                                @else
                                                    <span class="w-2 h-2 rounded-full bg-slate-300" title="Tạm ẩn"></span>
                                                @endif
                                            </div>
                                            <p class="text-[11px] text-slate-500 mt-0.5 mb-0">Thứ tự hiển thị: <strong>{{ $menu->sort_order }}</strong> • Tổng số: <strong>{{ $menu->items->count() }} liên kết</strong></p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <button type="button" @click="openAddMenuItemModal({{ $menu->id }}, '{{ addslashes($menu->name) }}')" class="btn btn-primary text-xs py-1.5 px-3">
                                            <i class="fa-solid fa-plus"></i> Thêm liên kết
                                        </button>
                                        <button type="button" @click="openEditMenuModal({{ json_encode($menu) }})" class="btn btn-secondary text-xs py-1.5 px-3">
                                            <i class="fa-solid fa-pen-to-square"></i> Sửa Menu
                                        </button>
                                        <button type="button" @click="deleteMenu({{ $menu->id }}, '{{ addslashes($menu->name) }}')" class="p-2 text-slate-400 hover:text-red-600 transition-colors rounded-lg hover:bg-red-50" title="Xóa Menu">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </div>
                                </div>

                                {{-- Items Table --}}
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-xs">
                                        <thead class="bg-white text-slate-400 font-bold uppercase tracking-wider text-[10px] border-b border-slate-100">
                                            <tr>
                                                <th class="p-3 text-center w-12">#</th>
                                                <th class="p-3">Tiêu đề liên kết</th>
                                                <th class="p-3">Đường dẫn URL</th>
                                                <th class="p-3">CSS Class (Nút bấm)</th>
                                                <th class="p-3 text-center w-20">Target</th>
                                                <th class="p-3 text-center w-24">Trạng thái</th>
                                                <th class="p-3 text-center w-24">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100 bg-white" id="menuItemsTable_{{ $menu->id }}">
                                            @forelse($menu->items as $iIdx => $item)
                                                <tr class="hover:bg-slate-50/50 transition-colors" id="itemRow_{{ $item->id }}">
                                                    <td class="p-3 text-center font-bold text-slate-400">{{ $item->order ?? ($iIdx + 1) }}</td>
                                                    <td class="p-3">
                                                        <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                                            @if($item->icon)
                                                                <i class="{{ $item->icon }} text-slate-400 text-xs"></i>
                                                            @endif
                                                            <span>{{ $item->title }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="p-3 font-mono text-[11px] text-slate-600 max-w-xs truncate" title="{{ $item->url }}">
                                                        <a href="{{ $item->url }}" target="_blank" class="hover:text-blue-600 hover:underline">
                                                            {{ $item->url }}
                                                        </a>
                                                    </td>
                                                    <td class="p-3">
                                                        @if(!empty($item->css_class))
                                                            @php
                                                                $classes = explode(' ', trim($item->css_class));
                                                            @endphp
                                                            <div class="flex flex-wrap gap-1">
                                                                @foreach($classes as $c)
                                                                    <span class="px-1.5 py-0.5 rounded font-mono text-[10px] font-semibold {{ $c === 't-button' ? 'bg-indigo-50 text-indigo-700 border border-indigo-200' : ($c === 'g-button' ? 'bg-pink-50 text-pink-700 border border-pink-200' : ($c === 'c-button' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-slate-100 text-slate-600')) }}">
                                                                        {{ $c }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <span class="text-slate-300 text-[11px] italic">mặc định</span>
                                                        @endif
                                                    </td>
                                                    <td class="p-3 text-center">
                                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-mono {{ $item->target === '_blank' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600' }}">
                                                            {{ $item->target }}
                                                        </span>
                                                    </td>
                                                    <td class="p-3 text-center">
                                                        <button type="button" onclick="toggleItemStatus({{ $item->id }}, {{ $item->is_active ? 0 : 1 }})" class="px-2 py-0.5 rounded-full text-[10px] font-bold cursor-pointer transition-all {{ $item->is_active ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                                            {{ $item->is_active ? 'Hiển thị' : 'Ẩn' }}
                                                        </button>
                                                    </td>
                                                    <td class="p-3 text-center">
                                                        <div class="flex items-center justify-center gap-1">
                                                            <button type="button" @click="openEditMenuItemModal({{ json_encode($item) }})" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors" title="Sửa liên kết">
                                                                <i class="fa-solid fa-pen"></i>
                                                            </button>
                                                            <button type="button" onclick="deleteMenuItem({{ $item->id }}, '{{ addslashes($item->title) }}')" class="p-1.5 text-slate-400 hover:text-red-600 transition-colors" title="Xóa liên kết">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="p-6 text-center text-slate-400 text-xs italic">
                                                        Menu này chưa có liên kết con nào. Hãy bấm <strong>+ Thêm liên kết</strong> để bổ sung!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @empty
                            <div class="card p-12 text-center text-slate-500">
                                <i class="fa-solid fa-bars text-3xl text-slate-300 mb-3 block"></i>
                                <h4 class="font-bold text-sm text-slate-700 mb-1">Chưa có Menu nào trong hệ thống</h4>
                                <p class="text-xs text-slate-400 mb-4">Hãy bắt đầu bằng cách thêm Menu Header hoặc Menu Footer.</p>
                                <button type="button" @click="openAddMenuModal('footer')" class="btn btn-primary text-xs">
                                    <i class="fa-solid fa-plus"></i> Thêm Menu Footer Mới
                                </button>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- TAB 4: SLIDER HERO & WIDGETS --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'widgets'" x-cloak class="ap-tab-pane space-y-6" data-tab="widgets"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Slider Hero Trang Chủ</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Quản lý banner xoay vòng, hình ảnh, thông điệp kêu gọi và nút hành động.</p>
                        </div>
                        <button type="button" onclick="addSlideCard()" class="btn btn-secondary text-xs">
                            <i class="fa-solid fa-plus text-blue-600"></i> Thêm Slide Mới
                        </button>
                    </div>

                    <!-- Slider Config Controls -->
                    <div class="card p-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <label class="form-label mb-1">Thời gian tự động chuyển Slide (Interval)</label>
                                <p class="text-[11px] text-slate-500 m-0">Đơn vị: Mili-giây (1000ms = 1 giây). Mặc định khuyên dùng: 5000ms.</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="number" name="interval" value="{{ $interval }}" class="form-input text-xs w-32 font-bold text-center" min="2000" max="30000" step="500">
                                <span class="text-xs text-slate-500 font-semibold">ms</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Items Container -->
                    <div id="slidesContainer" class="space-y-4">
                        @foreach($slides as $idx => $slide)
                            <div class="slide-card card p-5 relative transition-all" id="slideRow_{{ $idx }}">
                                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-md bg-blue-600 text-white font-bold text-xs flex items-center justify-center">
                                            #{{ $idx + 1 }}
                                        </span>
                                        <h4 class="font-bold text-slate-900 text-sm">Slide Hero {{ $idx + 1 }}</h4>
                                    </div>
                                    <button type="button" onclick="removeSlideCard({{ $idx }})" class="p-1.5 text-slate-400 hover:text-red-500 transition-colors" title="Xóa slide này">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
                                    <div class="lg:col-span-4 space-y-3">
                                        <label class="form-label">Hình ảnh Slide</label>
                                        <div class="slide-preview-thumb" id="thumbPreview_{{ $idx }}" style="background-image: url('{{ $slide['image'] ?? '/themes/ehenho/images/tim-ban-bon-phuong.jpg' }}');">
                                            <div class="slide-preview-overlay absolute inset-0 flex items-end p-2.5 text-white">
                                                <span class="text-[11px] font-bold truncate">{{ $slide['button_text'] ?? 'TẠO HỒ SƠ' }}</span>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Tải ảnh mới từ máy tính</label>
                                            <input type="file" name="slide_files[{{ $idx }}]" accept="image/*" class="form-input text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" onchange="previewSlideFile(this, {{ $idx }})">
                                        </div>

                                        <div>
                                            <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Hoặc đường dẫn ảnh URL</label>
                                            <input type="text" name="slides[{{ $idx }}][image_url]" id="imageUrlInput_{{ $idx }}" value="{{ $slide['image'] ?? '' }}" class="form-input text-xs font-mono" placeholder="/themes/ehenho/images/slide.jpg" oninput="previewSlideUrl(this.value, {{ $idx }})">
                                        </div>
                                    </div>

                                    <div class="lg:col-span-8 space-y-3">
                                        <div>
                                            <label class="form-label">Tiêu đề chính Slide</label>
                                            <input type="text" name="slides[{{ $idx }}][title]" value="{{ $slide['title'] ?? '' }}" class="form-input text-xs font-bold text-slate-900" placeholder="VD: eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương">
                                        </div>

                                        <div>
                                            <label class="form-label">Phụ đề / Thông điệp</label>
                                            <textarea name="slides[{{ $idx }}][subtitle]" rows="2" class="form-input text-xs" placeholder="VD: Chủ động, Bảo mật & Hoàn toàn Miễn Phí!!">{{ $slide['subtitle'] ?? '' }}</textarea>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div>
                                                <label class="form-label">Chữ trên nút bấm</label>
                                                <input type="text" name="slides[{{ $idx }}][button_text]" value="{{ $slide['button_text'] ?? 'TẠO HỒ SƠ CỦA BẠN!' }}" class="form-input text-xs font-semibold text-slate-800">
                                            </div>

                                            <div>
                                                <label class="form-label">Đường dẫn nút bấm</label>
                                                <input type="text" name="slides[{{ $idx }}][button_link]" value="{{ $slide['button_link'] ?? '/ehenho/dang-ky' }}" class="form-input text-xs font-mono text-slate-700">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ======================================================== --}}
                {{-- TAB 5: GENERAL CONFIG & FOOTER --}}
                {{-- ======================================================== --}}
                <div x-show="activeTab === 'general'" x-cloak class="ap-tab-pane space-y-6" data-tab="general"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">

                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Cấu hình chung, Footer &amp; Mạng Xã Hội</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Tên hiển thị thương hiệu, thông tin bản quyền và các liên kết mạng xã hội dưới chân trang.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[11px] uppercase tracking-wider">
                            General &amp; Social
                        </span>
                    </div>

                    <div class="card p-5 space-y-4">
                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2 border-b border-slate-100 pb-2">
                            <i class="fa-solid fa-circle-info text-blue-600"></i> Thông Tin Thương Hiệu &amp; Bản Quyền
                        </h3>
                        <div>
                            <label class="form-label">Tên website chính (Site Name)</label>
                            <input type="text" name="site_name" value="{{ $siteName }}" class="form-input text-xs font-bold text-slate-800" placeholder="VD: eHenho.com - Hẹn hò Online">
                        </div>

                        <div>
                            <label class="form-label">Bản quyền chân trang (Copyright text)</label>
                            <input type="text" name="site_copyright" value="{{ $siteCopyright }}" class="form-input text-xs font-medium text-slate-700" placeholder="VD: Email: hi@ehenho.com">
                        </div>
                    </div>

                    <div class="card p-5 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2 m-0">
                                <i class="fa-solid fa-share-nodes text-blue-600"></i> Liên Kết Mạng Xã Hội Chân Trang (Footer Social Links)
                            </h3>
                            <span class="text-[11px] text-slate-400">Hiển thị ở thanh Footer</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-2">Các biểu tượng mạng xã hội sẽ hiển thị ở khu vực chân trang (footer). Để trống nếu không muốn hiển thị mạng xã hội đó.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-brands fa-facebook text-blue-600"></i> Facebook URL
                                </label>
                                <input type="url" name="social_facebook" value="{{ $socialFacebook }}" class="form-input text-xs font-mono text-slate-700" placeholder="http://www.facebook.com/ehenho">
                            </div>

                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-brands fa-x-twitter text-slate-900"></i> Twitter / X URL
                                </label>
                                <input type="url" name="social_twitter" value="{{ $socialTwitter }}" class="form-input text-xs font-mono text-slate-700" placeholder="http://www.twitter.com/ehenho">
                            </div>

                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-brands fa-instagram text-pink-600"></i> Instagram URL
                                </label>
                                <input type="url" name="social_instagram" value="{{ $socialInstagram }}" class="form-input text-xs font-mono text-slate-700" placeholder="https://instagram.com/ehenho">
                            </div>

                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-brands fa-youtube text-red-600"></i> YouTube URL
                                </label>
                                <input type="url" name="social_youtube" value="{{ $socialYoutube }}" class="form-input text-xs font-mono text-slate-700" placeholder="https://youtube.com/@ehenho">
                            </div>

                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-brands fa-tiktok text-slate-800"></i> TikTok URL
                                </label>
                                <input type="url" name="social_tiktok" value="{{ $socialTiktok }}" class="form-input text-xs font-mono text-slate-700" placeholder="https://tiktok.com/@ehenho">
                            </div>

                            <div>
                                <label class="form-label flex items-center gap-1.5">
                                    <i class="fa-solid fa-comment-dots text-blue-500"></i> Zalo URL / Số điện thoại
                                </label>
                                <input type="url" name="social_zalo" value="{{ $socialZalo }}" class="form-input text-xs font-mono text-slate-700" placeholder="https://zalo.me/090xxxxxxx">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── Standard CMS Card Footer Bar ── --}}
            <div x-show="activeTab !== 'menus'" style="padding:16px 24px;border-top:1px solid #f1f5f9;background:#f8fafc;display:flex;align-items:center;justify-content:space-between;">
                <span style="font-size:11.5px;color:#94a3b8;">* Nhớ nhấn <strong>Lưu cấu hình</strong> sau khi thực hiện các thay đổi.</span>
                <div style="display:flex;gap:8px;">
                    <a href="{{ route('project.admin.dashboard', $projectCode) }}" class="btn btn-secondary">
                        Hủy
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Lưu cấu hình
                    </button>
                </div>
            </div>
            <div x-show="activeTab === 'menus'" style="padding:16px 24px;border-top:1px solid #f1f5f9;background:#f8fafc;display:flex;align-items:center;justify-content:space-between;">
                <span style="font-size:11.5px;color:#059669;font-weight:600;"><i class="fa-solid fa-circle-check"></i> Menu và các liên kết được tự động lưu trực tiếp ngay khi bạn Thêm / Sửa / Xóa.</span>
                <div style="display:flex;gap:8px;">
                    <button type="button" @click="openAddMenuModal('footer')" class="btn btn-secondary text-xs">
                        <i class="fa-solid fa-plus text-purple-600"></i> + Thêm Menu Footer
                    </button>
                    <button type="button" @click="openAddMenuModal()" class="btn btn-primary text-xs">
                        <i class="fa-solid fa-plus"></i> + Thêm Menu Mới
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let navlinkCount = {{ count($navlinks) }};
    let slideTotal = {{ count($slides) }};

    function previewSlideUrl(url, idx) {
        if (url) {
            const thumb = document.getElementById('thumbPreview_' + idx);
            if (thumb) {
                thumb.style.backgroundImage = `url('${url}')`;
            }
        }
    }

    function previewSlideFile(input, idx) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const thumb = document.getElementById('thumbPreview_' + idx);
                if (thumb) {
                    thumb.style.backgroundImage = `url('${e.target.result}')`;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeSlideCard(idx) {
        const rows = document.querySelectorAll('.slide-card');
        if (rows.length <= 1) {
            alert('Cần giữ lại ít nhất 1 slide cho website!');
            return;
        }
        const card = document.getElementById('slideRow_' + idx);
        if (card) {
            card.remove();
        }
    }

    function addSlideCard() {
        const container = document.getElementById('slidesContainer');
        const idx = slideTotal++;
        const card = document.createElement('div');
        card.className = 'slide-card card p-5 relative transition-all';
        card.id = 'slideRow_' + idx;
        card.innerHTML = `
            <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-md bg-blue-600 text-white font-bold text-xs flex items-center justify-center">
                        #${idx + 1}
                    </span>
                    <h4 class="font-bold text-slate-900 text-sm">Slide Hero ${idx + 1}</h4>
                </div>
                <button type="button" onclick="removeSlideCard(${idx})" class="p-1.5 text-slate-400 hover:text-red-500 transition-colors" title="Xóa slide này">
                    <i class="fa-solid fa-trash-can text-sm"></i>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
                <div class="lg:col-span-4 space-y-3">
                    <label class="form-label">Hình ảnh Slide</label>
                    <div class="slide-preview-thumb" id="thumbPreview_${idx}" style="background-image: url('/themes/ehenho/images/tim-ban-bon-phuong.jpg');">
                        <div class="slide-preview-overlay absolute inset-0 flex items-end p-2.5 text-white">
                            <span class="text-[11px] font-bold truncate">TẠO HỒ SƠ</span>
                        </div>
                    </div>

                    <div>
                        <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Tải ảnh mới từ máy tính</label>
                        <input type="file" name="slide_files[${idx}]" accept="image/*" class="form-input text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" onchange="previewSlideFile(this, ${idx})">
                    </div>

                    <div>
                        <label class="text-[11px] font-semibold text-slate-600 mb-1 block">Hoặc đường dẫn ảnh URL</label>
                        <input type="text" name="slides[${idx}][image_url]" id="imageUrlInput_${idx}" value="/themes/ehenho/images/tim-ban-bon-phuong.jpg" class="form-input text-xs font-mono" placeholder="/themes/ehenho/images/slide.jpg" oninput="previewSlideUrl(this.value, ${idx})">
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-3">
                    <div>
                        <label class="form-label">Tiêu đề chính Slide</label>
                        <input type="text" name="slides[${idx}][title]" value="eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương" class="form-input text-xs font-bold text-slate-900">
                    </div>

                    <div>
                        <label class="form-label">Phụ đề / Thông điệp</label>
                        <textarea name="slides[${idx}][subtitle]" rows="2" class="form-input text-xs">Chủ động, Bảo mật & Hoàn toàn Miễn Phí!!</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="form-label">Chữ trên nút bấm</label>
                            <input type="text" name="slides[${idx}][button_text]" value="TẠO HỒ SƠ CỦA BẠN!" class="form-input text-xs font-semibold text-slate-800">
                        </div>

                        <div>
                            <label class="form-label">Đường dẫn nút bấm</label>
                            <input type="text" name="slides[${idx}][button_link]" value="/ehenho/dang-ky" class="form-input text-xs font-mono text-slate-700">
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(card);
    }

    function addNavlinkRow() {
        const tbody = document.getElementById('navlinksTableBody');
        const idx = navlinkCount++;
        const tr = document.createElement('tr');
        tr.id = 'navlinkRow_' + idx;
        tr.className = 'hover:bg-slate-50/50 transition-colors';
        tr.innerHTML = `
            <td class="p-3 text-center font-bold text-slate-400">${idx + 1}</td>
            <td class="p-3">
                <input type="text" name="navlinks[${idx}][title]" value="Danh mục mới" class="form-input text-xs font-semibold">
            </td>
            <td class="p-3">
                <input type="text" name="navlinks[${idx}][url]" value="/ehenho/tim-kiem" class="form-input text-xs font-mono text-slate-600">
            </td>
            <td class="p-3 text-center">
                <input type="checkbox" name="navlinks[${idx}][is_active]" value="1" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
            </td>
            <td class="p-3 text-center">
                <button type="button" onclick="removeNavlinkRow(${idx})" class="p-1.5 text-slate-400 hover:text-red-600 transition-colors" title="Xóa mục này">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    }

    function removeNavlinkRow(idx) {
        const row = document.getElementById('navlinkRow_' + idx);
        if (row) {
            row.remove();
        }
    }

    /* ── MULTI-MENU MANAGEMENT JS HELPERS ── */
    const csrfToken = '{{ csrf_token() }}';
    const projectCode = '{{ $projectCode }}';

    function autoSlugifyMenu(text) {
        const slug = text.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[đĐ]/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        const slugInput = document.getElementById('addMenuSlug');
        if (slugInput && (!slugInput.dataset.manual || slugInput.dataset.manual === 'false')) {
            slugInput.value = slug;
        }
    }

    document.getElementById('addMenuSlug')?.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });

    function openAddMenuModal(location = 'footer') {
        const modal = document.getElementById('modalAddMenu');
        if (modal) {
            document.getElementById('addMenuName').value = '';
            document.getElementById('addMenuSlug').value = '';
            document.getElementById('addMenuSlug').dataset.manual = 'false';
            document.getElementById('addMenuLocation').value = location;
            document.getElementById('addMenuSortOrder').value = '0';
            document.getElementById('addMenuIsActive').checked = true;
            modal.style.display = 'flex';
        }
    }

    function closeAddMenuModal() {
        const modal = document.getElementById('modalAddMenu');
        if (modal) modal.style.display = 'none';
    }

    async function submitAddMenu(e) {
        e.preventDefault();
        const btn = document.getElementById('btnSubmitAddMenu');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang tạo...';

        const payload = {
            name: document.getElementById('addMenuName').value,
            slug: document.getElementById('addMenuSlug').value,
            location: document.getElementById('addMenuLocation').value,
            sort_order: parseInt(document.getElementById('addMenuSortOrder').value) || 0,
            is_active: document.getElementById('addMenuIsActive').checked ? 1 : 0
        };

        try {
            const res = await fetch(`/${projectCode}/admin/menus`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                alert('Tạo Menu thành công!');
                window.location.hash = 'menus';
                window.location.reload();
            } else {
                alert(data.message || 'Lỗi khi tạo menu');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Tạo Menu Mới';
        }
    }

    function openEditMenuModal(menu) {
        const modal = document.getElementById('modalEditMenu');
        if (modal && menu) {
            document.getElementById('editMenuId').value = menu.id;
            document.getElementById('editMenuName').value = menu.name || '';
            document.getElementById('editMenuLocation').value = menu.location || 'footer';
            document.getElementById('editMenuSortOrder').value = menu.sort_order ?? 0;
            document.getElementById('editMenuIsActive').checked = !!menu.is_active;
            modal.style.display = 'flex';
        }
    }

    function closeEditMenuModal() {
        const modal = document.getElementById('modalEditMenu');
        if (modal) modal.style.display = 'none';
    }

    async function submitEditMenu(e) {
        e.preventDefault();
        const id = document.getElementById('editMenuId').value;
        const btn = document.getElementById('btnSubmitEditMenu');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang lưu...';

        const payload = {
            name: document.getElementById('editMenuName').value,
            location: document.getElementById('editMenuLocation').value,
            sort_order: parseInt(document.getElementById('editMenuSortOrder').value) || 0,
            is_active: document.getElementById('editMenuIsActive').checked ? 1 : 0
        };

        try {
            const res = await fetch(`/${projectCode}/admin/menus/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                alert('Cập nhật Menu thành công!');
                window.location.hash = 'menus';
                window.location.reload();
            } else {
                alert(data.message || 'Lỗi khi cập nhật menu');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi';
        }
    }

    async function deleteMenu(id, name) {
        if (!confirm(`Bạn có chắc chắn muốn xóa Menu "${name}" cùng toàn bộ liên kết bên trong?`)) {
            return;
        }

        try {
            const res = await fetch(`/${projectCode}/admin/menus/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const data = await res.json();
            if (data.success) {
                const el = document.getElementById('menuCard_' + id);
                if (el) el.remove();
                alert(data.message || 'Đã xóa Menu thành công!');
            } else {
                alert(data.message || 'Lỗi khi xóa menu');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        }
    }

    function openAddMenuItemModal(menuId, menuName) {
        const modal = document.getElementById('modalAddMenuItem');
        if (modal) {
            document.getElementById('addMenuItemMenuId').value = menuId;
            document.getElementById('addMenuItemMenuNameTitle').innerText = 'Thêm vào: ' + menuName;
            document.getElementById('addMenuItemTitle').value = '';
            document.getElementById('addMenuItemUrl').value = '';
            document.getElementById('addMenuItemCss').value = '';
            document.getElementById('addMenuItemIcon').value = '';
            document.getElementById('addMenuItemTarget').value = '_self';
            document.getElementById('addMenuItemIsActive').checked = true;
            modal.style.display = 'flex';
        }
    }

    function closeAddMenuItemModal() {
        const modal = document.getElementById('modalAddMenuItem');
        if (modal) modal.style.display = 'none';
    }

    function setAddCss(cls) {
        document.getElementById('addMenuItemCss').value = cls;
    }

    async function submitAddMenuItem(e) {
        e.preventDefault();
        const menuId = document.getElementById('addMenuItemMenuId').value;
        const btn = document.getElementById('btnSubmitAddMenuItem');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang thêm...';

        const payload = {
            title: document.getElementById('addMenuItemTitle').value,
            url: document.getElementById('addMenuItemUrl').value,
            css_class: document.getElementById('addMenuItemCss').value,
            icon: document.getElementById('addMenuItemIcon').value,
            target: document.getElementById('addMenuItemTarget').value,
            is_active: document.getElementById('addMenuItemIsActive').checked ? 1 : 0
        };

        try {
            const res = await fetch(`/${projectCode}/admin/menus/${menuId}/items`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                alert('Thêm liên kết thành công!');
                window.location.hash = 'menus';
                window.location.reload();
            } else {
                alert(data.message || 'Lỗi khi thêm liên kết');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-plus"></i> Thêm Liên Kết';
        }
    }

    function openEditMenuItemModal(item) {
        const modal = document.getElementById('modalEditMenuItem');
        if (modal && item) {
            document.getElementById('editMenuItemId').value = item.id;
            document.getElementById('editMenuItemTitle').value = item.title || '';
            document.getElementById('editMenuItemUrl').value = item.url || '';
            document.getElementById('editMenuItemCss').value = item.css_class || '';
            document.getElementById('editMenuItemIcon').value = item.icon || '';
            document.getElementById('editMenuItemOrder').value = item.order ?? 0;
            document.getElementById('editMenuItemTarget').value = item.target || '_self';
            document.getElementById('editMenuItemIsActive').checked = !!item.is_active;
            modal.style.display = 'flex';
        }
    }

    function closeEditMenuItemModal() {
        const modal = document.getElementById('modalEditMenuItem');
        if (modal) modal.style.display = 'none';
    }

    function setEditCss(cls) {
        document.getElementById('editMenuItemCss').value = cls;
    }

    async function submitEditMenuItem(e) {
        e.preventDefault();
        const id = document.getElementById('editMenuItemId').value;
        const btn = document.getElementById('btnSubmitEditMenuItem');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang lưu...';

        const payload = {
            title: document.getElementById('editMenuItemTitle').value,
            url: document.getElementById('editMenuItemUrl').value,
            css_class: document.getElementById('editMenuItemCss').value,
            icon: document.getElementById('editMenuItemIcon').value,
            order: parseInt(document.getElementById('editMenuItemOrder').value) || 0,
            target: document.getElementById('editMenuItemTarget').value,
            is_active: document.getElementById('editMenuItemIsActive').checked ? 1 : 0
        };

        try {
            const res = await fetch(`/${projectCode}/admin/menus/items/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                alert('Cập nhật liên kết thành công!');
                window.location.hash = 'menus';
                window.location.reload();
            } else {
                alert(data.message || 'Lỗi khi cập nhật liên kết');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi';
        }
    }

    async function deleteMenuItem(id, title) {
        if (!confirm(`Bạn có chắc chắn muốn xóa liên kết "${title}"?`)) {
            return;
        }

        try {
            const res = await fetch(`/${projectCode}/admin/menus/items/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const data = await res.json();
            if (data.success) {
                const el = document.getElementById('itemRow_' + id);
                if (el) el.remove();
                alert(data.message || 'Đã xóa liên kết thành công!');
            } else {
                alert(data.message || 'Lỗi khi xóa liên kết');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        }
    }

    async function toggleItemStatus(id, newStatus) {
        try {
            const res = await fetch(`/${projectCode}/admin/menus/items/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ is_active: newStatus })
            });
            const data = await res.json();
            if (data.success) {
                window.location.hash = 'menus';
                window.location.reload();
            } else {
                alert(data.message || 'Lỗi khi đổi trạng thái');
            }
        } catch (err) {
            alert('Lỗi kết nối: ' + err.message);
        }
    }
</script>

{{-- ======================================================== --}}
{{-- MODALS FOR MENU & MENU ITEM MANAGEMENT --}}
{{-- ======================================================== --}}

<!-- Modal: Add New Menu -->
<div id="modalAddMenu" class="eh-modal-backdrop" style="display:none;">
    <div class="eh-modal-card">
        <div class="p-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900 m-0 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-blue-600"></i> Thêm Menu Mới
            </h3>
            <button type="button" onclick="closeAddMenuModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
        <form onsubmit="submitAddMenu(event)" class="p-5 space-y-4">
            <div>
                <label class="form-label">Tên Menu <span class="text-red-500">*</span></label>
                <input type="text" id="addMenuName" class="form-input text-xs font-semibold" placeholder="VD: Footer - Hướng dẫn & Trợ giúp" required oninput="autoSlugifyMenu(this.value)">
            </div>
            <div>
                <label class="form-label">Slug (Mã định danh) <span class="text-red-500">*</span></label>
                <input type="text" id="addMenuSlug" class="form-input text-xs font-mono text-slate-600" placeholder="VD: footer-huong-dan" required>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Vị trí (Location) <span class="text-red-500">*</span></label>
                    <select id="addMenuLocation" class="form-select text-xs">
                        <option value="footer" selected>Chân trang (footer)</option>
                        <option value="footer_bottom">Chân trang dưới (footer_bottom)</option>
                        <option value="sub_location">Thanh Tỉnh Thành (sub_location)</option>
                        <option value="header">Đầu trang (header)</option>
                        <option value="sidebar">Thanh bên (sidebar)</option>
                        <option value="mobile">Ngăn kéo Mobile (mobile)</option>
                        <option value="custom">Tùy biến (custom)</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Thứ tự hiển thị</label>
                    <input type="number" id="addMenuSortOrder" class="form-input text-xs" value="0" min="0">
                </div>
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="addMenuIsActive" value="1" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="addMenuIsActive" class="text-xs font-semibold text-slate-700 m-0">Kích hoạt Menu ngay sau khi tạo</label>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeAddMenuModal()" class="btn btn-secondary text-xs">Hủy</button>
                <button type="submit" id="btnSubmitAddMenu" class="btn btn-primary text-xs">
                    <i class="fa-solid fa-floppy-disk"></i> Tạo Menu Mới
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Edit Menu -->
<div id="modalEditMenu" class="eh-modal-backdrop" style="display:none;">
    <div class="eh-modal-card">
        <div class="p-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900 m-0 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-blue-600"></i> Chỉnh sửa Menu
            </h3>
            <button type="button" onclick="closeEditMenuModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
        <form onsubmit="submitEditMenu(event)" class="p-5 space-y-4">
            <input type="hidden" id="editMenuId">
            <div>
                <label class="form-label">Tên Menu <span class="text-red-500">*</span></label>
                <input type="text" id="editMenuName" class="form-input text-xs font-semibold" required>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Vị trí (Location) <span class="text-red-500">*</span></label>
                    <select id="editMenuLocation" class="form-select text-xs">
                        <option value="footer">Chân trang (footer)</option>
                        <option value="footer_bottom">Chân trang dưới (footer_bottom)</option>
                        <option value="sub_location">Thanh Tỉnh Thành (sub_location)</option>
                        <option value="header">Đầu trang (header)</option>
                        <option value="sidebar">Thanh bên (sidebar)</option>
                        <option value="mobile">Ngăn kéo Mobile (mobile)</option>
                        <option value="custom">Tùy biến (custom)</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Thứ tự hiển thị</label>
                    <input type="number" id="editMenuSortOrder" class="form-input text-xs" min="0">
                </div>
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="editMenuIsActive" value="1" class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="editMenuIsActive" class="text-xs font-semibold text-slate-700 m-0">Kích hoạt Menu</label>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeEditMenuModal()" class="btn btn-secondary text-xs">Hủy</button>
                <button type="submit" id="btnSubmitEditMenu" class="btn btn-primary text-xs">
                    <i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Add Menu Item -->
<div id="modalAddMenuItem" class="eh-modal-backdrop" style="display:none;">
    <div class="eh-modal-card">
        <div class="p-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-sm font-bold text-slate-900 m-0 flex items-center gap-2">
                    <i class="fa-solid fa-plus-circle text-blue-600"></i> Thêm Liên Kết Vào Menu
                </h3>
                <p class="text-[11px] text-slate-500 mt-0.5 mb-0" id="addMenuItemMenuNameTitle"></p>
            </div>
            <button type="button" onclick="closeAddMenuItemModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
        <form onsubmit="submitAddMenuItem(event)" class="p-5 space-y-4">
            <input type="hidden" id="addMenuItemMenuId">
            <div>
                <label class="form-label">Tiêu đề liên kết <span class="text-red-500">*</span></label>
                <input type="text" id="addMenuItemTitle" class="form-input text-xs font-semibold" placeholder="VD: Tìm bạn gái tại Hà Nội" required>
            </div>
            <div>
                <label class="form-label">Đường dẫn URL <span class="text-red-500">*</span></label>
                <input type="text" id="addMenuItemUrl" class="form-input text-xs font-mono text-slate-600" placeholder="VD: /ehenho/tim-kiem?province=ha_noi" required>
            </div>
            <div>
                <label class="form-label">CSS Class (Định kiểu nút bấm)</label>
                <input type="text" id="addMenuItemCss" class="form-input text-xs font-mono" placeholder="VD: t-button, g-button, c-button, navlink-b">
                <div class="flex items-center gap-1.5 mt-1.5">
                    <span class="text-[11px] text-slate-400">Chọn nhanh:</span>
                    <button type="button" onclick="setAddCss('t-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-indigo-50 text-indigo-700 border border-indigo-200 hover:bg-indigo-100">t-button (Xanh)</button>
                    <button type="button" onclick="setAddCss('g-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-pink-50 text-pink-700 border border-pink-200 hover:bg-pink-100">g-button (Hồng)</button>
                    <button type="button" onclick="setAddCss('c-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100">c-button (Cam)</button>
                    <button type="button" onclick="setAddCss('')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-slate-100 text-slate-600 hover:bg-slate-200">Xóa class</button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Biểu tượng FontAwesome</label>
                    <input type="text" id="addMenuItemIcon" class="form-input text-xs font-mono" placeholder="VD: fa-solid fa-heart">
                </div>
                <div>
                    <label class="form-label">Mở liên kết (Target)</label>
                    <select id="addMenuItemTarget" class="form-select text-xs">
                        <option value="_self">Cùng trang (_self)</option>
                        <option value="_blank">Tab mới (_blank)</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="addMenuItemIsActive" value="1" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="addMenuItemIsActive" class="text-xs font-semibold text-slate-700 m-0">Hiển thị liên kết này</label>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeAddMenuItemModal()" class="btn btn-secondary text-xs">Hủy</button>
                <button type="submit" id="btnSubmitAddMenuItem" class="btn btn-primary text-xs">
                    <i class="fa-solid fa-plus"></i> Thêm Liên Kết
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Edit Menu Item -->
<div id="modalEditMenuItem" class="eh-modal-backdrop" style="display:none;">
    <div class="eh-modal-card">
        <div class="p-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900 m-0 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-blue-600"></i> Chỉnh Sửa Liên Kết Menu
            </h3>
            <button type="button" onclick="closeEditMenuItemModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
        <form onsubmit="submitEditMenuItem(event)" class="p-5 space-y-4">
            <input type="hidden" id="editMenuItemId">
            <div>
                <label class="form-label">Tiêu đề liên kết <span class="text-red-500">*</span></label>
                <input type="text" id="editMenuItemTitle" class="form-input text-xs font-semibold" required>
            </div>
            <div>
                <label class="form-label">Đường dẫn URL <span class="text-red-500">*</span></label>
                <input type="text" id="editMenuItemUrl" class="form-input text-xs font-mono text-slate-600" required>
            </div>
            <div>
                <label class="form-label">CSS Class (Định kiểu nút bấm)</label>
                <input type="text" id="editMenuItemCss" class="form-input text-xs font-mono">
                <div class="flex items-center gap-1.5 mt-1.5">
                    <span class="text-[11px] text-slate-400">Chọn nhanh:</span>
                    <button type="button" onclick="setEditCss('t-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-indigo-50 text-indigo-700 border border-indigo-200 hover:bg-indigo-100">t-button (Xanh)</button>
                    <button type="button" onclick="setEditCss('g-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-pink-50 text-pink-700 border border-pink-200 hover:bg-pink-100">g-button (Hồng)</button>
                    <button type="button" onclick="setEditCss('c-button')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100">c-button (Cam)</button>
                    <button type="button" onclick="setEditCss('')" class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-slate-100 text-slate-600 hover:bg-slate-200">Xóa class</button>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div>
                    <label class="form-label">Biểu tượng Icon</label>
                    <input type="text" id="editMenuItemIcon" class="form-input text-xs font-mono">
                </div>
                <div>
                    <label class="form-label">Thứ tự (#Order)</label>
                    <input type="number" id="editMenuItemOrder" class="form-input text-xs" min="0">
                </div>
                <div>
                    <label class="form-label">Target</label>
                    <select id="editMenuItemTarget" class="form-select text-xs">
                        <option value="_self">_self</option>
                        <option value="_blank">_blank</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" id="editMenuItemIsActive" value="1" class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="editMenuItemIsActive" class="text-xs font-semibold text-slate-700 m-0">Hiển thị liên kết này</label>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeEditMenuItemModal()" class="btn btn-secondary text-xs">Hủy</button>
                <button type="submit" id="btnSubmitEditMenuItem" class="btn btn-primary text-xs">
                    <i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
