@php
    $currentProject = $currentProject ?? (request()->attributes->get('project') ?? session('current_project'));
    $projectCode = is_object($currentProject) ? ($currentProject->code ?? 'ehenho') : (is_string($currentProject) ? $currentProject : 'ehenho');

    $authUser = $authUser ?? auth()->user();
    if (! $authUser && session('project_user_id')) {
        $authUser = \App\Models\ProjectUser::find(session('project_user_id')) ?? \App\Models\User::find(session('project_user_id'));
    }
    if ($authUser && ! auth()->check()) {
        \Illuminate\Support\Facades\Auth::setUser($authUser);
    }
    $initial = strtoupper(substr($authUser?->name ?? 'A', 0, 1));

    $inProfiles = request()->routeIs('project.admin.ehenho.profiles.*') || request()->routeIs('project.admin.ehenho.interactions.*') || request()->routeIs('project.admin.users.*');
    $inContent  = request()->routeIs('project.admin.posts.*') || request()->routeIs('project.admin.pages.*');
    $inMedia    = request()->routeIs('project.admin.ehenho.theme.*') || request()->routeIs('project.admin.settings.appearance') || request()->routeIs('project.admin.widgets.*') || request()->routeIs('project.admin.media.*');
@endphp

@once
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* ── EHENHO STANDARD CMS SIDEBAR ── */
    #sidebar.eh-sidebar {
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
    #sidebar.eh-sidebar::-webkit-scrollbar { width: 3px; }
    #sidebar.eh-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.06); }
    .eh-sidebar .sb-logo {
        padding: 16px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255,255,255,.05);
    }
    .eh-sidebar .sb-logo-icon {
        width: 34px; height: 34px;
        border-radius: 9px;
        background: #2563eb;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .eh-sidebar .sb-logo-icon i { color: #fff; font-size: 14px; }
    .eh-sidebar .sb-logo-text p { font-size: 13px; font-weight: 700; color: #fff; margin: 0; line-height: 1.2; }
    .eh-sidebar .sb-logo-text span { font-size: 10px; color: #475569; font-weight: 500; display: block; margin-top: 1px; }

    .eh-sidebar .nav-label {
        padding: 14px 14px 4px;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #334155;
        margin: 0;
    }
    .eh-sidebar .nav-item {
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
    .eh-sidebar .nav-item:hover { color: #cbd5e1; }
    .eh-sidebar .nav-item.active { color: #fff; background: rgba(255,255,255,.04); }
    .eh-sidebar .nav-item.active .nav-icon { background: #2563eb; color: #fff; }
    .eh-sidebar .nav-icon {
        width: 28px; height: 28px;
        border-radius: 7px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 12px;
        background: rgba(255,255,255,.04);
        color: #475569;
        transition: all .15s;
    }
    .eh-sidebar .nav-item:hover .nav-icon { background: rgba(255,255,255,.07); color: #94a3b8; }
    .eh-sidebar .sub-menu { padding: 2px 0; }
    .eh-sidebar .sub-item {
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
    .eh-sidebar .sub-item:hover { color: #94a3b8; }
    .eh-sidebar .sub-item.active { color: #e2e8f0; font-weight: 600; }
    .eh-sidebar .sub-item .dot {
        width: 4px; height: 4px;
        border-radius: 50%;
        background: #334155;
        flex-shrink: 0;
    }
    .eh-sidebar .sub-item.active .dot { background: #3b82f6; }

    .eh-sidebar .badge-pill {
        margin-left: auto;
        font-size: 10px;
        font-weight: 600;
        padding: 1px 6px;
        border-radius: 999px;
        background: #2563eb;
        color: #ffffff;
    }
</style>
@endonce

<aside id="sidebar" class="eh-sidebar custom-scroll" x-data="{ open: '{{ $inProfiles ? 'profiles' : ($inContent ? 'content' : ($inMedia ? 'appearance' : '')) }}' }">
    <!-- Brand / Logo Header -->
    <div class="sb-logo">
        <div class="sb-logo-icon">
            <i class="fa-solid fa-heart"></i>
        </div>
        <div class="sb-logo-text flex-1">
            <p>Dating</p>
            <span>Admin Panel</span>
        </div>
        <button type="button" onclick="toggleAdminSidebar(false)" class="lg:hidden p-1.5 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition" title="Đóng menu">
            <i class="fa-solid fa-xmark text-base"></i>
        </button>
    </div>

    <!-- Navigation List -->
    <nav class="flex-1 py-2">
        <!-- 1. TỔNG QUAN -->
        <p class="nav-label">Tổng quan</p>
        <a href="{{ route('project.admin.dashboard', $projectCode) }}" class="nav-item {{ request()->routeIs('project.admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gauge"></i></span>
            <span>Dashboard</span>
        </a>

        <!-- 2. THÀNH VIÊN & HỒ SƠ -->
        <p class="nav-label">Thành viên</p>
        <button @click="open = open === 'profiles' ? '' : 'profiles'" class="nav-item {{ $inProfiles ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-users"></i></span>
            <span class="flex-1">Hồ sơ Dating</span>
            @php
                $profileCount = \App\Models\Ehenho\Profile::count();
            @endphp
            @if($profileCount > 0)
                <span class="badge-pill mr-1">{{ $profileCount }}</span>
            @endif
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='profiles' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='profiles'" x-cloak x-collapse class="sub-menu">
            <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.ehenho.profiles.*') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Danh sách hồ sơ</span>
            </a>
            <a href="{{ route('project.admin.users.index', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.users.*') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Tài khoản người dùng</span>
            </a>
            <a href="{{ route('project.admin.ehenho.interactions.index', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.ehenho.interactions.*') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Tương tác & Tin nhắn</span>
            </a>
        </div>

        <!-- 3. NỘI DUNG -->
        <p class="nav-label">Nội dung</p>
        <button @click="open = open === 'content' ? '' : 'content'" class="nav-item {{ $inContent ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-pen-nib"></i></span>
            <span class="flex-1">Bài viết & Trang</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='content' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='content'" x-cloak x-collapse class="sub-menu">
           
           
            <a href="{{ route('project.admin.pages.index', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.pages.index') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Trang tĩnh (Pages)</span>
            </a>
            <a href="{{ route('project.admin.pages.create', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.pages.create') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Thêm trang mới</span>
            </a>
        </div>

        <!-- 4. GIAO DIỆN & SLIDER -->
        <p class="nav-label">Giao diện</p>
        <button @click="open = open === 'appearance' ? '' : 'appearance'" class="nav-item {{ $inMedia ? 'active' : '' }}" type="button">
            <span class="nav-icon"><i class="fa-solid fa-swatchbook"></i></span>
            <span class="flex-1">Giao diện & Media</span>
            <i class="fa-solid fa-chevron-down text-[10px] transition-transform" :class="open==='appearance' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="open==='appearance'" x-cloak x-collapse class="sub-menu">
            <a href="{{ route('project.admin.ehenho.theme.header', $projectCode) }}#design" class="sub-item {{ request()->routeIs('project.admin.ehenho.theme.header') || request()->routeIs('project.admin.ehenho.theme.appearance') || request()->routeIs('project.admin.settings.appearance') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Quản lý Header &amp; Giao diện</span>
            </a>
            <a href="{{ route('project.admin.ehenho.theme.widgets', $projectCode) }}#menus" class="sub-item">
                <span class="dot"></span>
                <span>Quản lý Menu (Header &amp; Footer)</span>
            </a>
            <a href="{{ route('project.admin.ehenho.theme.widgets', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.ehenho.theme.widgets') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Slider Hero & Widgets</span>
            </a>
            <a href="{{ route('project.admin.media.list', $projectCode) }}" class="sub-item {{ request()->routeIs('project.admin.media.*') ? 'active' : '' }}">
                <span class="dot"></span>
                <span>Media Library</span>
            </a>
        </div>

        <!-- 5. HỆ THỐNG -->
        <p class="nav-label">Hệ thống</p>
        <a href="{{ route('project.admin.settings.seo', $projectCode) }}" class="nav-item {{ request()->routeIs('project.admin.settings.seo') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></span>
            <span>Cấu hình SEO</span>
        </a>

        <a href="{{ url('/' . $projectCode) }}" target="_blank" class="nav-item text-slate-400 hover:text-white">
            <span class="nav-icon"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            <span>Xem Website Client</span>
        </a>
    </nav>

    <!-- User Profile Footer -->
    <div style="padding:12px;border-top:1px solid rgba(255,255,255,.05);">
        <div style="display:flex;align-items:center;gap:10px;background:rgba(255,255,255,.04);padding:10px 12px;border-radius:10px;">
            <div style="width:32px;height:32px;border-radius:8px;background:#2563eb;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:13px;flex-shrink:0;">
                {{ $initial }}
            </div>
            <div style="flex:1;min-width:0;">
                <p style="font-size:12.5px;font-weight:600;color:#e2e8f0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin:0;">{{ $authUser?->name ?? 'Admin' }}</p>
                <p style="font-size:10px;color:#475569;margin-top:1px;margin-bottom:0;">Quản trị viên </p>
            </div>
            <form action="{{ route('project.logout', $projectCode) }}" method="POST" style="margin:0;">
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
