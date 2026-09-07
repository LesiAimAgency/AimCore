<!DOCTYPE html>
<html lang="vi" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quản trị') | {{ get_setting('site_name', 'WKcomputer') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/logo.png') }}">
    <script>
        window.tailwind = window.tailwind || {};
        tailwind.config = {
            corePlugins: {
                preflight: false,
            }
        }
        
        // Translation helper for JavaScript
        window.__ = function(key, replace = {}) {
            const translations = {
                'common.success': 'Thành công',
                'common.error': 'Lỗi',
                'common.delete': 'Xóa',
                'common.edit': 'Sửa',
                'common.view': 'Xem',
                'common.save': 'Lưu',
                'common.cancel': 'Hủy',
                'common.back': 'Quay lại',
                'common.search': 'Tìm kiếm',
                'common.loading': 'Đang tải',
                'common.shop_now': 'Mua ngay',
                'common.register': 'Đăng ký',
                'common.of': 'của',
                'pagination.previous': 'Trước',
                'pagination.next': 'Tiếp',
                'Showing': 'Hiển thị',
                'to': 'đến',
                'of': 'trong tổng số',
                'results': 'kết quả',
                'Pagination Navigation': 'Điều hướng phân trang',
                'Go to page :page': 'Đi đến trang :page'
            };
            
            let translation = translations[key] || key;
            
            // Simple replacement
            Object.keys(replace).forEach(placeholder => {
                translation = translation.replace(':' + placeholder, replace[placeholder]);
            });
            
            return translation;
        };
    </script>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }

        /* ── CRITICAL LAYOUT UTILITIES (Zero-FOUC, immediate render before CDN JS) ── */
        .flex { display: flex; }
        .inline-flex { display: inline-flex; }
        .flex-col { flex-direction: column; }
        .flex-row { flex-direction: row; }
        .flex-wrap { flex-wrap: wrap; }
        .flex-1 { flex: 1 1 0%; }
        .flex-shrink-0 { flex-shrink: 0; }
        .min-w-0 { min-width: 0; }
        .w-full { width: 100%; }
        .h-full { height: 100%; }
        .w-fit { width: fit-content; }
        .items-center { align-items: center; }
        .items-start { align-items: flex-start; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .justify-end { justify-content: flex-end; }

        /* Grid */
        .grid { display: grid; }
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .grid-cols-5 { grid-template-columns: repeat(5, minmax(0, 1fr)); }
        .grid-cols-6 { grid-template-columns: repeat(6, minmax(0, 1fr)); }
        .grid-cols-12 { grid-template-columns: repeat(12, minmax(0, 1fr)); }

        /* Gaps & Spacing */
        .gap-1 { gap: 0.25rem; }
        .gap-1\.5 { gap: 0.375rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }
        .p-1\.5 { padding: 0.375rem; }
        .p-4 { padding: 1rem; }
        .p-6 { padding: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .py-2\.5 { padding-top: 0.625rem; padding-bottom: 0.625rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .px-8 { padding-left: 2rem; padding-right: 2rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 0.75rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mr-1 { margin-right: 0.25rem; }
        .mr-2 { margin-right: 0.5rem; }
        .ml-1 { margin-left: 0.25rem; }
        .space-y-3 > * + * { margin-top: 0.75rem; }
        .space-y-4 > * + * { margin-top: 1rem; }
        .space-y-6 > * + * { margin-top: 1.5rem; }
        .space-y-8 > * + * { margin-top: 2rem; }

        /* Appearance & Admin Visual Utilities */
        .bg-white { background-color: #ffffff; }
        .bg-slate-50 { background-color: #f8fafc; }
        .bg-slate-100 { background-color: #f1f5f9; }
        .text-slate-800 { color: #1e293b; }
        .text-slate-700 { color: #334155; }
        .text-slate-600 { color: #475569; }
        .text-slate-500 { color: #64748b; }
        .text-slate-400 { color: #94a3b8; }
        .text-slate-300 { color: #cbd5e1; }
        .rounded-lg { border-radius: 0.5rem; }
        .rounded-xl { border-radius: 0.75rem; }
        .rounded-2xl { border-radius: 1rem; }
        .border-slate-50 { border-color: #f8fafc; }
        .border-slate-100 { border-color: #f1f5f9; }
        .border-slate-200 { border-color: #e2e8f0; }
        .overflow-hidden { overflow: hidden; }
        .overflow-y-auto { overflow-y: auto; }
        .relative { position: relative; }
        .sticky { position: sticky; }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); }
        .hidden { display: none; }
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            font-size: 13.5px;
            background: #f1f5f9;
            color: #1e293b;
            -webkit-font-smoothing: antialiased;
        }
        input, button, select, textarea { font-family: inherit !important; }

        /* ── SIDEBAR ── */
        #sidebar {
            width: 220px;
            min-width: 220px;
            background: #0f172a;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            overflow-x: hidden;
            flex-shrink: 0;
        }
        #sidebar::-webkit-scrollbar { width: 3px; }
        #sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.06); }

        .sb-logo {
            padding: 16px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,.05);
        }
        .sb-logo-icon {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: #2563eb;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sb-logo-icon i { color: #fff; font-size: 14px; }
        .sb-logo-text p { font-size: 13px; font-weight: 700; color: #fff; }
        .sb-logo-text span { font-size: 10px; color: #475569; font-weight: 500; display: block; margin-top: 1px; }

        .nav-label {
            padding: 16px 14px 6px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #334155;
        }
        .nav-item {
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
        }
        .nav-item:hover { color: #cbd5e1; }
        .nav-item.active { color: #fff; background: rgba(255,255,255,.04); }
        .nav-item.active .nav-icon { background: #2563eb; color: #fff; }
        .nav-icon {
            width: 28px; height: 28px;
            border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 12px;
            background: rgba(255,255,255,.04);
            color: #475569;
            transition: all .15s;
        }
        .nav-item:hover .nav-icon { background: rgba(255,255,255,.07); color: #94a3b8; }
        .sub-menu { padding: 2px 0; }
        .sub-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 14px 7px 52px;
            font-size: 12.5px;
            font-weight: 400;
            color: #475569;
            text-decoration: none;
            transition: color .15s;
        }
        .sub-item:hover { color: #94a3b8; }
        .sub-item.active { color: #e2e8f0; font-weight: 600; }
        .sub-item .dot {
            width: 4px; height: 4px;
            border-radius: 50%;
            background: #334155;
            flex-shrink: 0;
        }
        .sub-item.active .dot { background: #3b82f6; }

        /* ── TOPBAR ── */
        #topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 24px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar-title { font-size: 15px; font-weight: 700; color: #0f172a; }
        .topbar-sub { font-size: 11px; color: #94a3b8; margin-top: 1px; }

        /* ── BUTTONS ── */
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
        .btn-danger { background: #fee2e2; color: #dc2626; }
        .btn-danger:hover { background: #dc2626; color: #fff; }
        .btn-ghost { background: transparent; color: #64748b; border: 1px solid #e2e8f0; }
        .btn-ghost:hover { background: #f8fafc; }
        .btn-sm { padding: 5px 11px; font-size: 11.5px; }

        /* ── CARDS ── */
        .card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(15,23,42,.04);
        }
        .card-header {
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #f1f5f9;
        }
        .card-title { font-size: 13px; font-weight: 700; color: #0f172a; }
        .card-body { padding: 20px; }

        /* ── TABLES ── */
        .tbl-wrap { overflow-x: auto; }
        .tbl-head { background: #f8fafc; }
        .tbl-th {
            padding: 10px 16px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .05em;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }
        .tbl-tr { transition: background .1s; }
        .tbl-tr:hover { background: #f8fafc; }
        .tbl-td {
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 500;
            color: #1e293b;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        /* ── FORMS ── */
        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
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
        .form-textarea {
            width: 100%;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13.5px;
            color: #0f172a;
            outline: none;
            resize: vertical;
            transition: border-color .15s, box-shadow .15s;
            background: #fff;
        }
        .form-textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.1);
        }
        .form-hint { font-size: 11.5px; color: #94a3b8; margin-top: 5px; }

        /* ── BADGES ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 11.5px;
            font-weight: 600;
        }
        .badge-green  { background: #dcfce7; color: #15803d; }
        .badge-yellow { background: #fef9c3; color: #a16207; }
        .badge-red    { background: #fee2e2; color: #dc2626; }
        .badge-blue   { background: #dbeafe; color: #1d4ed8; }
        .badge-gray   { background: #f1f5f9; color: #475569; }
        .badge-purple { background: #ede9fe; color: #7c3aed; }
        .badge-orange { background: #ffedd5; color: #c2410c; }

        /* ── ACTION BUTTONS ── */
        .act-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px; height: 30px;
            border-radius: 7px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #64748b;
            font-size: 12px;
            cursor: pointer;
            transition: all .15s;
            text-decoration: none;
        }
        .act-btn:hover { border-color: #cbd5e1; color: #1e293b; }
        .act-btn.view:hover { background: #eff6ff; border-color: #bfdbfe; color: #2563eb; }
        .act-btn.edit:hover { background: #f0fdf4; border-color: #bbf7d0; color: #16a34a; }
        .act-btn.del { border: none; background: transparent; }
        .act-btn.del:hover { background: #fee2e2; color: #dc2626; border-color: #fecaca; border: 1px solid; }

        /* ── FLASH MESSAGES ── */
        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 16px;
        }
        .flash-success { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        .flash-error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        /* ── SCROLLBAR ── */
        .custom-scroll::-webkit-scrollbar { width: 5px; height: 5px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }

        /* ── SEO COMPONENT ── */
        .seo-tab {
            display: flex; align-items: center; gap: 7px;
            padding: 9px 16px;
            font-size: 12px; font-weight: 600; color: #64748b;
            border-bottom: 2px solid transparent;
            transition: all .15s;
            background: transparent; cursor: pointer;
        }
        .seo-tab.active { color: #2563eb; border-bottom-color: #2563eb; }
        .seo-check-item {
            display: flex; align-items: flex-start; gap: 10px;
            padding: 8px 0; font-size: 13px; font-weight: 500; color: #334155;
        }
    </style>
    @stack('styles')
</head>
<body>

@php
    $inShop     = request()->routeIs('admin.products.*') || request()->routeIs('admin.attributes.*') || (request()->routeIs('admin.categories.*') && request()->get('type','product') === 'product');
    $inContent  = request()->routeIs('admin.posts.*') || request()->routeIs('admin.pages.*') || request()->routeIs('admin.form-templates.*') || request()->routeIs('admin.modal-forms.*') || (request()->routeIs('admin.categories.*') && request()->get('type') === 'post');
    $inMedia    = request()->routeIs('admin.media.*') || request()->routeIs('admin.widgets.*') || request()->routeIs('admin.menus.*');
    $inSettings = request()->routeIs('admin.settings.*') || request()->routeIs('admin.languages.*') || request()->routeIs('admin.translations.*');
    $inSystem   = request()->routeIs('admin.modules.*') || request()->routeIs('admin.logs.*') || request()->routeIs('admin.seo.*');
    $inSpam     = request()->routeIs('admin.spam.*');

    $authUser = $authUser ?? auth()->user();
    if (! $authUser && session('project_user_id')) {
        $authUser = \App\Models\ProjectUser::find(session('project_user_id'));
    }
    if ($authUser && ! auth()->check()) {
        \Illuminate\Support\Facades\Auth::setUser($authUser);
    }
@endphp

<div style="display:flex;height:100vh;overflow:hidden;"
     x-data="{ open: '{{ $inShop ? 'shop' : ($inContent ? 'content' : ($inMedia ? 'appearance' : ($inSettings ? 'settings' : ($inSystem ? 'system' : '')))) }}' }">

    {{-- SIDEBAR --}}
    @include('frontend.themes.wkcomputerdemo.admin.layouts.sidebar')


    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header id="topbar">
            <div>
                <h1 class="topbar-title">@yield('page-title', 'Dashboard')</h1>
                @hasSection('page-subtitle')
                    <div class="topbar-sub">@yield('page-subtitle')</div>
                @endif
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                @yield('page-actions')
                <a href="@yield('preview-url', url('/'))" target="_blank" class="btn btn-ghost btn-sm">
                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:11px;"></i> Xem site
                </a>
            </div>
        </header>

        <main id="main-scroll" class="flex-1 overflow-y-auto p-6 custom-scroll" style="background:#f1f5f9;">
            @yield('content')
        </main>
    </div>

    {{-- Toast --}}
    <div x-data x-cloak>
        <template x-if="$store.toast.show">
            <div x-show="$store.toast.show"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed top-20 right-5 z-[9999] flex items-center gap-3 px-5 py-3 rounded-xl shadow-xl min-w-[280px] max-w-sm text-white"
                 :class="{
                    'bg-red-600': $store.toast.type === 'error',
                    'bg-blue-600': $store.toast.type === 'info',
                    'bg-emerald-600': $store.toast.type === 'success' || !$store.toast.type
                 }">
                <i :class="{
                    'fa-solid fa-circle-xmark': $store.toast.type === 'error',
                    'fa-solid fa-circle-info': $store.toast.type === 'info',
                    'fa-solid fa-circle-check': $store.toast.type === 'success' || !$store.toast.type
                }" style="font-size:16px;flex-shrink:0;"></i>
                <div>
                    <p style="font-size:12px;font-weight:700;" x-text="$store.toast.title"></p>
                    <p style="font-size:11.5px;opacity:.85;" x-text="$store.toast.message"></p>
                </div>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('toast', {
                show: false, title: '', message: '', type: 'success',
                fire(title, message, type = 'success') {
                    this.title = title; this.message = message; this.type = type;
                    this.show = true;
                    setTimeout(() => { this.show = false; }, 4000);
                }
            });
        });
        window.adminToast = (title, message, type = 'success') => {
            if (window.Alpine) Alpine.store('toast').fire(title, message, type);
        };
        @if(session('success'))
            window.addEventListener('load', () => adminToast(__('common.success'), "{{ session('success') }}", 'success'));
        @endif
        @if(session('error'))
            window.addEventListener('load', () => adminToast(__('common.error'), "{{ session('error') }}", 'error'));
        @endif
        @if(session('info'))
            window.addEventListener('load', () => adminToast('Thông báo', "{{ session('info') }}", 'info'));
        @endif
        @if($errors->any())
            window.addEventListener('load', () => adminToast('Lỗi nhập liệu', "{{ $errors->first() }}", 'error'));
        @endif

        // Order poller
        (function() {
            let lastSeenId = parseInt(localStorage.getItem('last_order_id')) || 0;
            let isPolling = false;
            function checkNewOrders() {
                if (isPolling) return;
                isPolling = true;
                fetch(`{{ locale_route('admin.orders.new-check') }}?after=${lastSeenId}&_t=${Date.now()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.status === 404 ? { orders: [], latest_id: lastSeenId } : res.json())
                .then(data => {
                    const newOrders = data.orders || [];
                    const serverLatestId = parseInt(data.latest_id);
                    if (lastSeenId === 0) { lastSeenId = serverLatestId; localStorage.setItem('last_order_id', lastSeenId); return; }
                    if (newOrders.length > 0) {
                        const activityList = document.getElementById('recent-activity-list');
                        newOrders.forEach((order, index) => {
                            setTimeout(() => {
                                adminToast('Đơn hàng mới', `#${order.order_number} — ${order.customer_name}`, 'success');
                                if (activityList) {
                                    const el = document.createElement('div');
                                    el.className = 'flex items-center justify-between';
                                    el.innerHTML = `<div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span><span style="font-size:11px;font-weight:600;">#${order.order_number}</span></div><span style="font-size:10px;color:#94a3b8;">Vừa xong</span>`;
                                    activityList.prepend(el);
                                    if (activityList.children.length > 8) activityList.removeChild(activityList.lastChild);
                                }
                            }, index * 800);
                        });
                    }
                    if (serverLatestId > lastSeenId) { lastSeenId = serverLatestId; localStorage.setItem('last_order_id', lastSeenId); }
                })
                .catch(() => {})
                .finally(() => { isPolling = false; });
            }
            setTimeout(checkNewOrders, 500);
            setInterval(checkNewOrders, 60000);
            document.addEventListener('visibilitychange', () => { if (document.visibilityState === 'visible') checkNewOrders(); });
            window.addEventListener('focus', checkNewOrders);
        })();
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="{{ asset('js/admin/seo-checklist.js') }}"></script>
    @include('components.admin.media-picker')
    @stack('modals')
    
    {{-- Global Admin SweetAlert Handler --}}
    <script>
        // Global function to replace confirm() with SweetAlert
        window.confirmDelete = function(message, callback) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: message || 'Bạn có chắc chắn muốn xóa?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed && callback) {
                    callback();
                }
            });
        };

        // Override native confirm for forms with onsubmit
        document.addEventListener('DOMContentLoaded', function() {
            // Find all forms with onsubmit confirm
            const forms = document.querySelectorAll('form[onsubmit*="confirm"]');
            forms.forEach(form => {
                const originalOnsubmit = form.getAttribute('onsubmit');
                if (originalOnsubmit && originalOnsubmit.includes('confirm(')) {
                    // Extract message from confirm()
                    const match = originalOnsubmit.match(/confirm\(['"`]([^'"`]+)['"`]\)/);
                    const message = match ? match[1] : 'Bạn có chắc chắn?';
                    
                    // Remove original onsubmit
                    form.removeAttribute('onsubmit');
                    
                    // Add new event listener
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        confirmDelete(message, () => {
                            form.submit();
                        });
                    });
                }
            });

            // Find all buttons with onclick confirm
            const buttons = document.querySelectorAll('button[onclick*="confirm"], a[onclick*="confirm"]');
            buttons.forEach(button => {
                const originalOnclick = button.getAttribute('onclick');
                if (originalOnclick && originalOnclick.includes('confirm(')) {
                    // Extract message from confirm()
                    const match = originalOnclick.match(/confirm\(['"`]([^'"`]+)['"`]\)/);
                    const message = match ? match[1] : 'Bạn có chắc chắn?';
                    
                    // Remove original onclick
                    button.removeAttribute('onclick');
                    
                    // Add new event listener
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        confirmDelete(message, () => {
                            // Execute the original action (usually form submit)
                            const form = button.closest('form');
                            if (form) {
                                form.submit();
                            } else {
                                // If it's a link, navigate to href
                                if (button.tagName === 'A' && button.href) {
                                    window.location.href = button.href;
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
    
    <script>
        function updateImgPreview(previewId, url) {
            const el = document.getElementById(previewId);
            if (!el) return;
            el.innerHTML = url ? `<img src="${url}" style="height:72px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;max-width:100%;" onerror="this.style.display='none'">` : '';
        }
    </script>
</div>
</body>
</html>
