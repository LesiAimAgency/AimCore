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
    $siteCopyright = $settings['site_copyright'] ?? setting('site_copyright', '© 2026 eHenho.com. Bản quyền thuộc về eHenho Dating.');
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
        var validTabs = ['design', 'logo_icons', 'header', 'widgets', 'general'];
        var hash = (window.location.hash ? window.location.hash.substring(1) : '{{ $initialTab }}') || 'design';
        if (!validTabs.includes(hash)) hash = 'design';
        document.documentElement.setAttribute('data-admin-tab', hash);
    })();
</script>

<div x-data="{
        activeTab: window.location.hash ? window.location.hash.substring(1) : '{{ $initialTab }}',
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
                <span>Header &amp; Menu</span>
            </button>
            <button type="button" @click="activeTab = 'widgets'" data-tab-target="widgets" :class="activeTab === 'widgets' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-images" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Slider Hero</span>
            </button>
            <button type="button" @click="activeTab = 'general'" data-tab-target="general" :class="activeTab === 'general' ? 'ap-nav-btn active' : 'ap-nav-btn'" class="ap-nav-btn">
                <i class="fa-solid fa-wand-magic-sparkles" style="width:14px;text-align:center;font-size:11px;"></i>
                <span>Cấu hình chung</span>
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
                            <h2 class="text-base font-bold text-slate-900 tracking-tight">Cấu hình chung &amp; Chân trang (Footer)</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Tên hiển thị thương hiệu và thông tin bản quyền website.</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[11px] uppercase tracking-wider">
                            General
                        </span>
                    </div>

                    <div class="card p-5 space-y-4">
                        <div>
                            <label class="form-label">Tên website chính (Site Name)</label>
                            <input type="text" name="site_name" value="{{ $siteName }}" class="form-input text-xs font-bold text-slate-800" placeholder="VD: eHenho.com - Hẹn hò Online">
                        </div>

                        <div>
                            <label class="form-label">Bản quyền chân trang (Copyright text)</label>
                            <input type="text" name="site_copyright" value="{{ $siteCopyright }}" class="form-input text-xs font-medium text-slate-700" placeholder="VD: © 2026 eHenho.com. Bản quyền thuộc về eHenho.">
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── Standard CMS Card Footer Bar ── --}}
            <div style="padding:16px 24px;border-top:1px solid #f1f5f9;background:#f8fafc;display:flex;align-items:center;justify-content:space-between;">
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
</script>
@endsection
