<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Super Admin')</title>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
        // Bỏ qua lỗi từ browser extensions
        window.addEventListener('error', function(e) {
            if (e.message && e.message.includes('message channel closed')) {
                e.preventDefault();
                return false;
            }
        });
        
        window.addEventListener('unhandledrejection', function(e) {
            if (e.reason && e.reason.message && e.reason.message.includes('message channel closed')) {
                e.preventDefault();
                return false;
            }
        });

        // Xử lý resize sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar-resizable');
            if(sidebar) {
                new ResizeObserver(entries => {
                    for (let entry of entries) {
                        document.documentElement.style.setProperty('--sidebar-width', entry.contentRect.width + 'px');
                    }
                }).observe(sidebar);
            }
        });
    </script>
    <style>
        :root {
            --sidebar-width: 18rem; /* 72 * 0.25rem = 18rem */
        }
        .sidebar-resizable {
            width: var(--sidebar-width);
            min-width: 15rem;
            max-width: 30rem;
            resize: horizontal;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .content-resizable {
            margin-left: var(--sidebar-width);
        }
        /* Style cho thanh kéo resize */
        .sidebar-resizable::-webkit-resizer {
            background-color: #002D80;
            border-left: 1px solid #ffffff33;
        }
        /* Style cho thanh cuộn (Scrollbar) đẹp hơn */
        .sidebar-resizable::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-resizable::-webkit-scrollbar-track {
            background: transparent; 
        }
        .sidebar-resizable::-webkit-scrollbar-thumb {
            background: #002D80; 
            border-radius: 10px;
        }
        .sidebar-resizable::-webkit-scrollbar-thumb:hover {
            background: #0040A0; 
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-gray-800">
    <div class="min-h-screen flex w-full">
        <div class="sidebar-resizable bg-[#001B4E] shadow-2xl fixed h-screen flex flex-col">
            <div class="flex-shrink-0 p-6 border-b border-[#002D80]">
                <div class="flex items-center justify-center py-6 px-4">
                    <img src="{{ asset('Logo.png') }}" alt="AIM AGENCY" class="h-20 w-full object-contain">
                </div>
            </div>

            <nav class="flex-1 py-6 px-3">
                <div class="px-4 py-2 mt-2 text-[11px] font-bold text-[#8FA3C9] uppercase tracking-wider">Cá nhân & Công việc</div>
                <a href="{{ route('superadmin.dashboard') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.dashboard') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>

                <a href="{{ route('superadmin.my-tasks.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.my-tasks.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <span class="ml-3 font-medium">Việc của tôi</span>
                </a>

                @if(auth()->user()->isManager())
                <a href="{{ route('superadmin.performance.ranking') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.performance.ranking') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="ml-3 font-medium">Xếp Hạng Năng Suất</span>
                </a>

                <a href="{{ route('superadmin.performance.report') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.performance.report') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ml-3 font-medium">Báo cáo Hiệu suất</span>
                </a>

                @if(config('features.gold_enabled'))
                <a href="{{ route('superadmin.performance.gold') }}" class="flex items-center px-4 py-3 mb-2 text-yellow-500 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.performance.gold') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 13H8V8h1v5zm2 0h-1V8h1v5zm2 0h-1V8h1v5z"/>
                    </svg>
                    <span class="ml-3 font-medium">Bảng Vàng</span>
                </a>
                @endif
                @endif

                @if(auth()->user()->isSuperAdmin() || auth()->user()->hasPermission('manage-contracts') || auth()->user()->hasPermission('manage-projects') || auth()->user()->role === 'dev' || auth()->user()->hasRole('dev'))
                <div class="px-4 py-2 mt-4 text-[11px] font-bold text-[#8FA3C9] uppercase tracking-wider">Khách hàng & Dự án</div>
                @if(auth()->user()->isSuperAdmin() || auth()->user()->hasPermission('manage-contracts'))
                <a href="{{ route('superadmin.contracts.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.contracts.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Dữ liệu Khách hàng</span>
                </a>
                @endif
                @if(auth()->user()->isSuperAdmin() || auth()->user()->hasPermission('manage-projects') || auth()->user()->role === 'dev' || auth()->user()->hasRole('dev'))
                <a href="{{ route('superadmin.projects.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.projects.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="ml-3 font-medium">Quản lý Dự án</span>
                </a>
                @endif
                @endif

                @if(auth()->user()->isManager() || auth()->user()->isEmployee())
                <div class="px-4 py-2 mt-4 text-[11px] font-bold text-[#8FA3C9] uppercase tracking-wider">Nội bộ</div>
                @endif

                @if(auth()->user()->isManager())
                <a href="{{ route('superadmin.departments.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.departments.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="ml-3 font-medium">Quản lý Bộ Phận</span>
                </a>

                <a href="{{ route('superadmin.users.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.users.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Quản lý Nhân sự</span>
                </a>
                @endif

              

                @if(auth()->user()->isSuperAdmin() || auth()->user()->role === 'dev' || auth()->user()->hasRole('dev') || auth()->user()->department === 'Thiết kế website')
                <div class="px-4 py-2 mt-4 text-[11px] font-bold text-[#8FA3C9] uppercase tracking-wider">Hệ thống</div>
                <a href="{{ route('superadmin.multi-tenancy') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.multi-tenancy') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Multi-Tenancy</span>
                </a>

                <a href="{{ route('superadmin.logs.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.logs.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="ml-3 font-medium">System Logs</span>
                </a>
                @endif

                @if(auth()->user()->isSuperAdmin())
                @if(!auth()->user()->isSuperAdmin() && !auth()->user()->role === 'dev' && !auth()->user()->hasRole('dev') && !auth()->user()->department === 'Thiết kế website')
                <div class="px-4 py-2 mt-4 text-[11px] font-bold text-[#8FA3C9] uppercase tracking-wider">Hệ thống</div>
                @endif
                <a href="{{ route('superadmin.services.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.services.*') || request()->routeIs('superadmin.service-stages.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Quản lý Dịch Vụ</span>
                </a>

                <a href="{{ route('superadmin.feature-packs.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.feature-packs.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="ml-3 font-medium">Gói Tính Năng</span>
                </a>

                <a href="{{ route('superadmin.roles.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.roles.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Vai trò (Roles)</span>
                </a>

                <a href="{{ route('superadmin.permissions.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.permissions.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Quyền hạn (Permissions)</span>
                </a>
                @endif

                {{--
                @if(auth()->user()->isSuperAdmin() || auth()->user()->hasPermission('manage-tasks') || auth()->user()->hasPermission('update-tasks-progress') || auth()->user()->hasPermission('review-tasks') || auth()->user()->role === 'dev' || auth()->user()->hasRole('dev'))
                <a href="{{ route('superadmin.tickets.index') }}" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-[#002D80] rounded-lg {{ request()->routeIs('superadmin.tickets.*') ? 'bg-[#002D80]' : '' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="ml-3 font-medium">Hỗ trợ / Tickets</span>
                </a>
                @endif
                --}}

               


            </nav>

            <div class="mt-auto flex-shrink-0 p-4 border-t border-[#002D80]">
                <div class="text-gray-400 text-xs text-center space-y-1">
                    <p class="font-semibold">Super Admin Panel</p>
                    <p>© 2025 AIM AGENCY</p>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col content-resizable">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Super Admin')</h1>
                    <div class="flex items-center space-x-3">
                        {{-- Gold Reward Points Badge --}}
                        @if(config('features.gold_enabled'))
                        <div class="flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-full shadow-xs" id="user-header-gold" title="Điểm thưởng Gold tích lũy">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="8" fill="#FBBF24" stroke="#D97706" stroke-width="1.5"/>
                                <circle cx="10" cy="10" r="5.5" fill="#F59E0B" stroke="#B45309" stroke-width="0.75"/>
                                <text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text>
                            </svg>
                            <span class="text-xs font-bold text-amber-900 tracking-tight" id="user-header-gold-val">{{ number_format(auth()->user()->gold ?? 0) }}</span>
                            <span class="text-[10px] font-semibold text-amber-600 uppercase">Gold</span>
                        </div>
                        @endif


                        <a href="{{ route('superadmin.users.edit', auth()->user()->id) }}" class="text-right cursor-pointer group" title="Sửa tài khoản">
                            <p class="text-sm font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-indigo-600 font-medium group-hover:text-indigo-800 transition-colors">{{ auth()->user()->roles->first()?->display_name ?? (auth()->user()->department ?? 'Thành viên') }} (Sửa)</p>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-500 hover:text-red-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 bg-gray-50">
                @if(session('alert'))
                <div class="mb-6 p-4 rounded-lg {{ session('alert.type') === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {!! nl2br(e(session('alert.message'))) !!}
                </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof tinymce !== 'undefined' && document.querySelector('.tinymce-editor')) {
            tinymce.init({
                selector: '.tinymce-editor',
                height: 380,
                menubar: 'file edit view insert format tools table',
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media code | fullscreen',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; padding: 10px; }',
                branding: false,
                promotion: false,
                setup: function (editor) {
                    editor.on('change keyup blur', function () {
                        editor.save();
                    });
                }
            });
        }
    });
    </script>
    @stack('scripts')
    
    <!-- Change Password Modal -->
    <div id="change-password-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="document.getElementById('change-password-modal').classList.add('hidden')"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Đổi mật khẩu tài khoản</h3>
                        <div class="mt-4 space-y-4">
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Mật khẩu hiện tại</label>
                                <input type="password" name="current_password" id="current_password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu mới</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Cập nhật
                        </button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('change-password-modal').classList.add('hidden')">
                            Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @if($errors->has('current_password') || $errors->has('password'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('change-password-modal').classList.remove('hidden');
        });
    </script>
    @endif
</body>
</html>
