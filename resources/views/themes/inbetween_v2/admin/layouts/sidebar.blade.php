@php
    $currentProject = $currentProject ?? (request()->attributes->get('project') ?? session('current_project'));
    $projectCode = is_object($currentProject) ? ($currentProject->code ?? 'inbetween_v2') : (is_string($currentProject) ? $currentProject : 'inbetween_v2');

    $authUser = $authUser ?? auth()->user();
    if (! $authUser && session('project_user_id')) {
        $authUser = \App\Models\ProjectUser::find(session('project_user_id')) ?? \App\Models\User::find(session('project_user_id'));
    }
    if ($authUser && ! auth()->check()) {
        \Illuminate\Support\Facades\Auth::setUser($authUser);
    }
    $initial = strtoupper(substr($authUser?->name ?? $authUser?->username ?? 'A', 0, 1));

    $pendingFormsCount = \Illuminate\Support\Facades\Schema::hasTable('form_submissions') 
        ? \App\Models\FormSubmission::withoutGlobalScopes()->where('status', 'pending')->count() 
        : 0;

    $inContent  = request()->routeIs('project.admin.posts.*') || request()->routeIs('project.admin.pages.*') || request()->routeIs('project.admin.widgets.*') || request()->routeIs('cms.widgets.*');
    $inSettings = request()->routeIs('project.admin.settings.*') || request()->routeIs('cms.settings.*');
@endphp

@once
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* ── INBETWEEN V2 CMS SIDEBAR ── */
    #sidebar.ib-sidebar {
        width: 250px !important;
        min-width: 250px !important;
        max-width: 250px !important;
        height: 100% !important;
        background: #11141a !important;
        display: flex !important;
        flex-direction: column !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        flex-shrink: 0 !important;
        z-index: 40;
        border-right: 1px solid rgba(255,255,255,.06);
        color: #94a3b8;
    }
    #sidebar.ib-sidebar::-webkit-scrollbar { width: 3px; }
    #sidebar.ib-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.08); }
    .ib-sidebar .sb-logo {
        padding: 16px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255,255,255,.06);
        background: #0d0f14;
    }
    .ib-sidebar .sb-logo-icon {
        width: 34px; height: 34px;
        border-radius: 9px;
        background: #EC460B;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-weight: 900;
        color: #fff;
    }
    .ib-sidebar .sb-logo-text p { font-size: 13px; font-weight: 800; color: #fff; margin: 0; line-height: 1.2; letter-spacing: -0.01em; }
    .ib-sidebar .sb-logo-text span { font-size: 10px; color: #64748b; font-weight: 500; display: block; margin-top: 1px; }

    .ib-sidebar .nav-label {
        padding: 14px 14px 4px;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #475569;
        margin: 0;
    }
    .ib-sidebar .nav-item {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 500;
        color: #94a3b8;
        cursor: pointer;
        transition: color .15s, background .15s;
        border: none;
        width: 100%;
        text-align: left;
        text-decoration: none;
        background: transparent;
        box-sizing: border-box;
    }
    .ib-sidebar .nav-item:hover { color: #f8fafc; background: rgba(255,255,255,.03); }
    .ib-sidebar .nav-item.active { color: #fff; background: rgba(236,70,11,.12); }
    .ib-sidebar .nav-item.active .nav-icon { background: #EC460B; color: #fff; }
    .ib-sidebar .nav-icon {
        width: 28px; height: 28px;
        border-radius: 7px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 12px;
        background: rgba(255,255,255,.04);
        color: #64748b;
        transition: all .15s;
    }
    .ib-sidebar .nav-item:hover .nav-icon { background: rgba(255,255,255,.08); color: #cbd5e1; }
    .ib-sidebar .sub-menu { padding: 2px 0; }
    .ib-sidebar .sub-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 7px 14px 7px 50px;
        font-size: 12.5px;
        font-weight: 400;
        color: #64748b;
        text-decoration: none;
        transition: color .15s;
    }
    .ib-sidebar .sub-item:hover { color: #cbd5e1; }
    .ib-sidebar .sub-item.active { color: #f8fafc; font-weight: 600; }
    .ib-sidebar .sub-item .dot {
        width: 4px; height: 4px;
        border-radius: 50%;
        background: #334155;
        flex-shrink: 0;
    }
    .ib-sidebar .sub-item.active .dot { background: #EC460B; }

    .ib-sidebar .badge-pill {
        margin-left: auto;
        font-size: 10px;
        font-weight: 700;
        padding: 1px 7px;
        border-radius: 999px;
        background: #EC460B;
        color: #ffffff;
    }
</style>
@endonce

<aside id="sidebar" class="ib-sidebar">
    <!-- Logo & Project Identity -->
    <div class="sb-logo">
        <div class="sb-logo-icon">
            <span>ib</span>
        </div>
        <div class="sb-logo-text">
            <p>in <span style="color: #EC460B">•</span> between</p>
            <span>Quản Trị Inbetween V2</span>
        </div>
    </div>

    <!-- Navigation List -->
    <div class="flex-1 py-2">
        <!-- 1. TỔNG QUAN -->
        <p class="nav-label">TỔNG QUAN</p>

        <!-- Dashboard -->
        <a href="{{ route('project.admin.dashboard', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-chart-pie"></i></span>
            <span>Dashboard</span>
        </a>

        <!-- Form Submissions (Khách gửi thông tin qua form) -->
        @if(Route::has('project.admin.form-submissions.index'))
        <a href="{{ route('project.admin.form-submissions.index', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.form-submissions.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-inbox"></i></span>
            <span>Khách Gửi Form</span>
            @if($pendingFormsCount > 0)
                <span class="badge-pill">{{ $pendingFormsCount }}</span>
            @endif
        </a>
        @endif

        <!-- 2. NỘI DUNG & GIAO DIỆN -->
        <p class="nav-label mt-2">NỘI DUNG & GIAO DIỆN</p>

        <!-- Widgets Builder -->
        <a href="{{ Route::has('project.admin.widgets.index') ? route('project.admin.widgets.index', $projectCode) : route('cms.widgets.index') }}"
           class="nav-item {{ request()->routeIs('project.admin.widgets.*') || request()->routeIs('cms.widgets.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-cubes"></i></span>
            <span>Khối Widgets</span>
        </a>

        <!-- Trang Tĩnh (Pages) -->
        @if(Route::has('project.admin.pages.index'))
        <a href="{{ route('project.admin.pages.index', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.pages.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-file-lines"></i></span>
            <span>Trang Tĩnh</span>
        </a>
        @endif

        <!-- Bài Viết (Posts) -->
        @if(Route::has('project.admin.posts.index'))
        <a href="{{ route('project.admin.posts.index', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.posts.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-newspaper"></i></span>
            <span>Bài Viết / Tin Tức</span>
        </a>
        @endif

        <!-- Thư Viện Media -->
        @if(Route::has('project.admin.media.list'))
        <a href="{{ route('project.admin.media.list', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.media.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-photo-film"></i></span>
            <span>Thư Viện Media</span>
        </a>
        @endif

        <!-- Menus -->
        @if(Route::has('project.admin.menus.index'))
        <a href="{{ route('project.admin.menus.index', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.menus.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-bars"></i></span>
            <span>Menu Điều Hướng</span>
        </a>
        @endif

        <!-- 3. HỆ THỐNG -->
        <p class="nav-label mt-2">HỆ THỐNG</p>

        @if(Route::has('project.admin.settings.index'))
        <a href="{{ route('project.admin.settings.index', $projectCode) }}"
           class="nav-item {{ request()->routeIs('project.admin.settings.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gear"></i></span>
            <span>Cài Đặt Hệ Thống</span>
        </a>
        @endif

        <!-- Xem Website Ngoài Client -->
        <a href="{{ url('/inbetween_v2') }}" target="_blank"
           class="nav-item hover:text-orange-400">
            <span class="nav-icon"><i class="fa-solid fa-arrow-up-right-from-square text-[#EC460B]"></i></span>
            <span>Xem Website</span>
        </a>
    </div>

    <!-- Bottom User Bar -->
    <div class="p-3 border-t border-white/5 bg-[#0d0f14] flex items-center justify-between">
        <div class="flex items-center gap-2.5 overflow-hidden">
            <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-white text-xs font-bold shrink-0">
                {{ $initial }}
            </div>
            <div class="truncate">
                <p class="text-xs font-bold text-white truncate m-0 leading-tight">
                    {{ $authUser?->name ?? $authUser?->username ?? 'Administrator' }}
                </p>
                <span class="text-[10px] text-slate-500 block truncate">Quản trị viên</span>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="p-1.5 rounded-lg text-slate-500 hover:text-rose-400 hover:bg-white/5 transition-colors" title="Đăng xuất">
                <i class="fa-solid fa-right-from-bracket text-xs"></i>
            </button>
        </form>
    </div>
</aside>
