@php
    $inShop     = request()->routeIs('*.products.*') || request()->routeIs('*.attributes.*') || (request()->routeIs('*.categories.*') && request()->get('type','product') === 'product');
    $inContent  = request()->routeIs('*.posts.*') || request()->routeIs('*.pages.*') || request()->routeIs('*.form-templates.*') || request()->routeIs('*.widget-templates.*') || request()->routeIs('*.modal-forms.*') || request()->routeIs('*.form-submissions.*') || (request()->routeIs('*.categories.*') && request()->get('type') === 'post');
    $inMedia    = request()->routeIs('*.media.*') || request()->routeIs('*.widgets.*') || request()->routeIs('*.code-widgets.*') || request()->routeIs('*.menus.*') || request()->routeIs('*.theme-options.*') || request()->routeIs('*.website-config.*') || request()->is('*/admin/settings/group/appearance*') || request()->is('*/admin/settings/appearance*');
    $inSettings = request()->routeIs('*.settings.*') || request()->routeIs('*.languages.*') || request()->routeIs('*.translations.*');
    $inSystem   = request()->routeIs('*.modules.*') || request()->routeIs('*.logs.*') || request()->routeIs('*.seo.*') || request()->routeIs('*.spam.*');

    $authUser = $authUser ?? auth()->user();
    if (! $authUser && session('project_user_id')) {
        $authUser = \App\Models\ProjectUser::find(session('project_user_id'));
    }
    if ($authUser && ! auth()->check()) {
        \Illuminate\Support\Facades\Auth::setUser($authUser);
    }
    $initial = strtoupper(substr($authUser?->name ?? 'A', 0, 1));
@endphp

@once
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* ── WKCOMPUTER SIDEBAR ── */
    #sidebar.wk-sidebar {
        width: 250px !important;
        min-width: 250px !important;
        max-width: 250px !important;
        height: 100% !important;
        background: #0f172a !important;
        display: flex !important;
        flex-direction: column !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        flex-shrink: 0 !important;
        z-index: 40;
        border-right: 1px solid rgba(255,255,255,.05);
        color: #94a3b8;
    }
    #sidebar.wk-sidebar::-webkit-scrollbar { width: 3px; }
    #sidebar.wk-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.06); }
    .wk-sidebar .sb-logo {
        padding: 16px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255,255,255,.05);
    }
    .wk-sidebar .sb-logo-icon {
        width: 34px; height: 34px;
        border-radius: 9px;
        background: #2563eb;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .wk-sidebar .sb-logo-icon i { color: #fff; font-size: 14px; }
    .wk-sidebar .sb-logo-text p { font-size: 13px; font-weight: 700; color: #fff; margin: 0; line-height: 1.2; }
    .wk-sidebar .sb-logo-text span { font-size: 10px; color: #475569; font-weight: 500; display: block; margin-top: 1px; }

    .wk-sidebar .nav-label {
        padding: 14px 14px 4px;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #334155;
        margin: 0;
    }
    .wk-sidebar .nav-item {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 500;
        color: #64748b;
        cursor: pointer;
        transition: color .15s, background .15s;
        border: none;
        width: 100%;
        text-align: left;
        text-decoration: none;
        background: transparent;
        box-sizing: border-box;
    }
    .wk-sidebar .nav-item:hover { color: #cbd5e1; }
    .wk-sidebar .nav-item.active { color: #fff; background: rgba(255,255,255,.04); }
    .wk-sidebar .nav-item.active .nav-icon { background: #2563eb; color: #fff; }
    .wk-sidebar .nav-icon {
        width: 28px; height: 28px;
        border-radius: 7px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 12px;
        background: rgba(255,255,255,.04);
        color: #475569;
        transition: all .15s;
    }
    .wk-sidebar .nav-item:hover .nav-icon { background: rgba(255,255,255,.07); color: #94a3b8; }
    .wk-sidebar .sub-menu { padding: 2px 0; }
    .wk-sidebar .sub-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 7px 14px 7px 50px;
        font-size: 12.5px;
        font-weight: 400;
        color: #475569;
        text-decoration: none;
        transition: color .15s;
    }
    .wk-sidebar .sub-item:hover { color: #94a3b8; }
    .wk-sidebar .sub-item.active { color: #e2e8f0; font-weight: 600; }
    .wk-sidebar .sub-item .dot {
        width: 4px; height: 4px;
        border-radius: 50%;
        background: #334155;
        flex-shrink: 0;
    }
    .wk-sidebar .sub-item.active .dot { background: #3b82f6; }
</style>
@endonce

<aside id="sidebar" class="wk-sidebar custom-scroll" x-data="{ open: '{{ $inShop ? 'shop' : ($inContent ? 'content' : ($inMedia ? 'appearance' : ($inSettings ? 'settings' : ($inSystem ? 'system' : '')))) }}' }">
    <div class="sb-logo">
        <div class="sb-logo-icon"><i class="fa-solid fa-desktop"></i></div>
        <div class="sb-logo-text flex-1">
            <p>WKcomputer</p>
            <span>Admin Panel</span>
        </div>
        <button type="button" onclick="toggleAdminSidebar(false)" class="lg:hidden p-1.5 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition" title="Đóng menu">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>

    <nav class="flex-1 py-2">
        <p class="nav-label">Tổng quan</p>
        <a href="{{ locale_route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('*.admin.dashboard') || request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gauge"></i></span>
            Dashboard
        </a>

        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('products') ?? true))
        <button @click="open = open === 'shop' ? '' : 'shop'" class="nav-item {{ $inShop ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-box"></i></span>
            <span class="flex-1">Sản phẩm</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='shop' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='shop'" x-cloak x-collapse class="sub-menu">
            <a href="{{ locale_route('admin.products.index') }}" class="sub-item {{ request()->routeIs('*.products.index') ? 'active' : '' }}"><span class="dot"></span> Danh sách</a>
            <a href="{{ locale_route('admin.products.create') }}" class="sub-item {{ request()->routeIs('*.products.create') ? 'active' : '' }}"><span class="dot"></span> Thêm mới</a>
            <a href="{{ locale_route('admin.categories.index', ['type' => 'product']) }}" class="sub-item {{ (request()->routeIs('*.categories.*') || request()->routeIs('categories.*')) && request()->get('type','product') === 'product' ? 'active' : '' }}"><span class="dot"></span> Chuyên mục</a>
            <a href="{{ locale_route('admin.attributes.index') }}" class="sub-item {{ request()->routeIs('*.attributes.*') ? 'active' : '' }}"><span class="dot"></span> Thuộc tính</a>
        </div>
        @endif

        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('orders') ?? true))
        <a href="{{ locale_route('admin.orders.index') }}" class="nav-item {{ request()->routeIs('*.orders.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-bag-shopping"></i></span>
            Đơn hàng
        </a>
        @endif

        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('reviews') ?? true))
        <a href="{{ locale_route('admin.reviews.index') }}" class="nav-item {{ request()->routeIs('*.reviews.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-star"></i></span>
            Đánh giá
        </a>
        @endif

        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('posts') || $authUser?->canAccess('pages') ?? true))
        <p class="nav-label">Nội dung</p>
        <a href="{{ locale_route('admin.form-submissions.overview') }}" class="nav-item {{ request()->routeIs('*.form-submissions.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-chart-line"></i></span>
            Form liên hệ
        </a>
        <button @click="open = open === 'content' ? '' : 'content'" class="nav-item {{ $inContent ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-pen-nib"></i></span>
            <span class="flex-1">Bài viết & Trang</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='content' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='content'" x-cloak x-collapse class="sub-menu">
            <a href="{{ locale_route('admin.posts.index') }}" class="sub-item {{ request()->routeIs('*.posts.*') ? 'active' : '' }}"><span class="dot"></span> Blog</a>
            <a href="{{ locale_route('admin.pages.index') }}" class="sub-item {{ request()->routeIs('*.pages.*') ? 'active' : '' }}"><span class="dot"></span> Trang tĩnh</a>
            <a href="{{ locale_route('admin.form-templates.index') }}" class="sub-item {{ request()->routeIs('*.widget-templates.*') || request()->routeIs('*.form-templates.*') ? 'active' : '' }}"><span class="dot"></span> Widget Templates</a>
            <a href="{{ locale_route('admin.categories.index', ['type' => 'post']) }}" class="sub-item {{ request()->routeIs('*.categories.*') && request()->get('type') === 'post' ? 'active' : '' }}"><span class="dot"></span> Chuyên mục tin</a>
        </div>
        @endif

        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('appearance') ?? true))
        <p class="nav-label">Giao diện</p>
        <button @click="open = open === 'appearance' ? '' : 'appearance'" class="nav-item {{ $inMedia ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-swatchbook"></i></span>
            <span class="flex-1">Giao diện & Media</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='appearance' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='appearance'" x-cloak x-collapse class="sub-menu">
            <a href="{{ locale_route('admin.settings.group', 'appearance') }}" class="sub-item {{ request()->routeIs('*.theme-options.*') || request()->is('*/admin/theme-options') || request()->is('*/admin/settings/group/appearance') ? 'active' : '' }}"><span class="dot"></span> Cấu hình UX</a>
            <a href="{{ locale_route('admin.settings.group', 'appearance') }}#footer" class="sub-item"><span class="dot"></span> Thanh dịch vụ & Footer</a>
            <a href="{{ locale_route('admin.menus.index') }}" class="sub-item {{ request()->routeIs('*.menus.*') ? 'active' : '' }}"><span class="dot"></span> Menu</a>
            <a href="{{ locale_route('admin.widgets.index') }}" class="sub-item {{ request()->routeIs('*.widgets.*') && !request()->routeIs('*.widget-templates.*') ? 'active' : '' }}"><span class="dot"></span> Widgets</a>
            <a href="{{ locale_route('admin.media.index') }}" class="sub-item {{ request()->routeIs('*.media.*') ? 'active' : '' }}"><span class="dot"></span> Media</a>
        </div>
        @endif

        <p class="nav-label">Hệ thống</p>
        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('settings') ?? true))
        <a href="{{ locale_route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('*.settings.index') || request()->is('*/admin/settings') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-sliders"></i></span>
            Cài đặt
        </a>
        @endif
        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('languages') ?? true))
        <a href="{{ locale_route('admin.languages.index') }}" class="nav-item {{ request()->routeIs('*.languages.*') || request()->is('*/admin/settings/languages') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-language"></i></span>
            Ngôn ngữ
        </a>
        @endif
        <button @click="open = open === 'system' ? '' : 'system'" class="nav-item {{ $inSystem ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-shield-halved"></i></span>
            <span class="flex-1">Hệ thống & SEO</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='system' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='system'" x-cloak x-collapse class="sub-menu">
            <a href="{{ locale_route('admin.seo.index') }}" class="sub-item {{ request()->routeIs('*.seo.*') || request()->is('*/admin/settings/seo') ? 'active' : '' }}"><span class="dot"></span> SEO</a>
            <a href="{{ locale_route('admin.logs.index') }}" class="sub-item {{ request()->routeIs('*.logs.*') || request()->is('*/admin/settings/logs') ? 'active' : '' }}"><span class="dot"></span> Logs</a>
            <a href="{{ locale_route('admin.spam.dashboard') }}" class="sub-item {{ request()->routeIs('*.spam.*') ? 'active' : '' }}"><span class="dot"></span> Anti-Spam</a>
        </div>
        @if(!method_exists($authUser ?? new \stdClass, 'canAccess') || ($authUser?->canAccess('users') ?? true))
        <a href="{{ locale_route('admin.users.index') }}" class="nav-item {{ request()->routeIs('*.users.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span>
            Người dùng
        </a>
        @endif
    </nav>

    {{-- User block --}}
    <div style="padding:12px;border-top:1px solid rgba(255,255,255,.05);">
        <div style="display:flex;align-items:center;gap:10px;background:rgba(255,255,255,.04);padding:10px 12px;border-radius:10px;">
            <div style="width:32px;height:32px;border-radius:8px;background:#2563eb;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;">
                {{ $initial }}
            </div>
            <div style="flex:1;min-width:0;">
                <p style="font-size:12.5px;font-weight:600;color:#e2e8f0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $authUser?->name ?? 'Admin' }}</p>
                <p style="font-size:10px;color:#475569;margin-top:1px;">{{ $authUser?->role_name ?? 'Quản trị viên' }}</p>
            </div>
            <form action="{{ locale_route('admin.logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" title="Đăng xuất" style="width:28px;height:28px;border-radius:7px;background:rgba(239,68,68,.1);color:#f87171;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .15s;"
                    onmouseover="this.style.background='#ef4444';this.style.color='#fff'"
                    onmouseout="this.style.background='rgba(239,68,68,.1)';this.style.color='#f87171'">
                    <i class="fa-solid fa-right-from-bracket" style="font-size:11px;"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
