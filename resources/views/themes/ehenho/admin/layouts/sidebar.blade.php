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
    $initial = strtoupper(substr($authUser?->name ?? 'Admin', 0, 1));

    $inDashboard = request()->routeIs('project.admin.dashboard');
    $inProfiles = request()->routeIs('project.admin.ehenho.profiles.*');
    $inPages = request()->routeIs('project.admin.pages.*');
    $inPosts = request()->routeIs('project.admin.posts.*');
    $inInteractions = request()->routeIs('project.admin.ehenho.interactions.*');
    $inSettings = request()->routeIs('project.admin.settings.*') || request()->routeIs('project.admin.website-config.*');
@endphp

@once
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* ── EHENHO DATING SIDEBAR ── */
    #sidebar.eh-sidebar {
        width: 250px !important;
        min-width: 250px !important;
        max-width: 250px !important;
        height: 100% !important;
        background: #001235 !important;
        display: flex !important;
        flex-direction: column !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        flex-shrink: 0 !important;
        z-index: 40;
        border-right: 1px solid rgba(255,255,255,.07);
        color: #94a3b8;
    }
    #sidebar.eh-sidebar::-webkit-scrollbar { width: 3px; }
    #sidebar.eh-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); }

    .eh-sidebar .sb-logo {
        padding: 16px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255,255,255,.07);
        background: #000d26;
    }
    .eh-sidebar .sb-logo-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        background: linear-gradient(135deg, #e11d48, #ec4899);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(225, 29, 72, 0.3);
    }
    .eh-sidebar .sb-logo-icon i { color: #fff; font-size: 16px; }
    .eh-sidebar .sb-logo-text p { font-size: 14px; font-weight: 700; color: #fff; margin: 0; line-height: 1.2; letter-spacing: -0.01em; }
    .eh-sidebar .sb-logo-text span { font-size: 10px; color: #fda4af; font-weight: 500; display: block; margin-top: 1px; }

    .eh-sidebar .nav-label {
        padding: 16px 14px 6px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #64748b;
        margin: 0;
    }
    .eh-sidebar .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 14px;
        font-size: 13px;
        font-weight: 500;
        color: #94a3b8;
        cursor: pointer;
        transition: all .15s ease;
        border: none;
        width: 100%;
        text-align: left;
        text-decoration: none;
        background: transparent;
        box-sizing: border-box;
        border-left: 3px solid transparent;
    }
    .eh-sidebar .nav-item:hover {
        color: #fff;
        background: rgba(255,255,255,.04);
        border-left-color: #f43f5e;
    }
    .eh-sidebar .nav-item.active {
        color: #fff;
        background: rgba(225, 29, 72, 0.12);
        border-left-color: #e11d48;
        font-weight: 600;
    }
    .eh-sidebar .nav-item.active .nav-icon {
        background: #e11d48;
        color: #fff;
        box-shadow: 0 2px 6px rgba(225, 29, 72, 0.4);
    }
    .eh-sidebar .nav-icon {
        width: 30px; height: 30px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 13px;
        background: rgba(255,255,255,.06);
        color: #94a3b8;
        transition: all .15s ease;
    }
    .eh-sidebar .nav-item:hover .nav-icon {
        background: rgba(255,255,255,.1);
        color: #fff;
    }
    .eh-sidebar .badge-pill {
        margin-left: auto;
        font-size: 10px;
        font-weight: 600;
        padding: 2px 7px;
        border-radius: 999px;
        background: rgba(225, 29, 72, 0.2);
        color: #fb7185;
    }
    .eh-sidebar .sb-footer {
        margin-top: auto;
        padding: 14px;
        border-top: 1px solid rgba(255,255,255,.07);
        background: #000d26;
    }
</style>
@endonce

<div id="sidebar" class="eh-sidebar">
    <!-- Brand / Logo -->
    <div class="sb-logo">
        <div class="sb-logo-icon">
            <i class="fa-solid fa-heart"></i>
        </div>
        <div class="sb-logo-text">
            <p>eHenho CMS</p>
            <span>Hẹn hò & Tìm bạn</span>
        </div>
    </div>

    <!-- Navigation List -->
    <div class="flex-1 py-2">
        <!-- 1. TỔNG QUAN -->
        <p class="nav-label">Trung tâm điều hành</p>
        <a href="{{ route('project.admin.dashboard', $projectCode) }}" class="nav-item {{ $inDashboard ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-chart-pie"></i></div>
            <span>Tổng quan (Dashboard)</span>
        </a>

        <!-- 2. HỒ SƠ THÀNH VIÊN -->
        <p class="nav-label">Thành viên & Kết bạn</p>
        <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="nav-item {{ $inProfiles ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-users"></i></div>
            <span>Hồ sơ Hẹn hò</span>
            @php
                $profileCount = \App\Models\Ehenho\Profile::count();
            @endphp
            @if($profileCount > 0)
                <span class="badge-pill">{{ $profileCount }}</span>
            @endif
        </a>

        <a href="{{ route('project.admin.ehenho.interactions.index', $projectCode) }}" class="nav-item {{ $inInteractions ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-heart-pulse"></i></div>
            <span>Tương tác & Tin nhắn</span>
        </a>

        <!-- 3. QUẢN LÝ NỘI DUNG -->
        <p class="nav-label">Nội dung Trang & Bài viết</p>
        <a href="{{ route('project.admin.pages.index', $projectCode) }}" class="nav-item {{ $inPages ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-file-lines"></i></div>
            <span>Trang tĩnh (Pages)</span>
        </a>

        <a href="{{ route('project.admin.pages.create', $projectCode) }}" class="nav-item text-xs pl-12 text-slate-400 hover:text-white">
            <i class="fa-solid fa-plus mr-2 text-[10px]"></i>
            <span>Thêm trang mới</span>
        </a>

        <a href="{{ route('project.admin.posts.index', $projectCode) }}" class="nav-item {{ $inPosts ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-newspaper"></i></div>
            <span>Cẩm nang hẹn hò</span>
        </a>

        <a href="{{ route('project.admin.posts.create', $projectCode) }}" class="nav-item text-xs pl-12 text-slate-400 hover:text-white">
            <i class="fa-solid fa-pen-nib mr-2 text-[10px]"></i>
            <span>Viết bài mới</span>
        </a>

        <!-- 4. HỆ THỐNG -->
        <p class="nav-label">Cài đặt Website</p>
        <a href="{{ route('project.admin.settings.index', $projectCode) }}" class="nav-item {{ $inSettings ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-sliders"></i></div>
            <span>Cấu hình Website</span>
        </a>

        <a href="{{ url('/' . $projectCode) }}" target="_blank" class="nav-item text-slate-400 hover:text-rose-400">
            <div class="nav-icon"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
            <span>Xem Website Client</span>
        </a>
    </div>

    <!-- Sidebar Footer -->
    <div class="sb-footer">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2 overflow-hidden">
                <div class="w-8 h-8 rounded-full bg-rose-600 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                    {{ $initial }}
                </div>
                <div class="truncate">
                    <p class="text-xs font-semibold text-white truncate m-0 leading-tight">{{ $authUser->name ?? 'CMS Admin' }}</p>
                    <span class="text-[10px] text-slate-400 block">Quản trị viên eHenho</span>
                </div>
            </div>
            <form method="POST" action="{{ route('project.logout', $projectCode) }}">
                @csrf
                <button type="submit" title="Đăng xuất" class="p-2 text-slate-400 hover:text-rose-400 transition-colors">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</div>
