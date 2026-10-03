@extends('cms.layouts.app')

@section('title', 'Trung tâm Điều hành eHenho Dating')
@section('page-title', 'Bảng Điều Khiển eHenho')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    .eh-card {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .eh-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
    }
</style>
@endpush

@section('content')
@php
    $projectCode = $currentProject?->code ?? request()->route('projectCode', 'ehenho');
@endphp

<div class="p-6 max-w-7xl mx-auto space-y-8">
    <!-- 1. Hero Welcome Banner -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#001235] via-[#001B4E] to-[#1e3a8a] p-8 text-white shadow-xl">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-semibold uppercase tracking-wider mb-3">
                    <i class="fa-solid fa-heart text-blue-400"></i>
                    Dating & Social Network Platform
                </div>
                <h2 class="text-2xl md:text-3xl font-black tracking-tight text-white mb-2">
                    Trung tâm Quản trị 
                </h2>
                <p class="text-slate-300 text-sm max-w-2xl">
                    Hệ thống quản lý chuyên sâu cho nền tảng Hẹn hò: Quản lý hồ sơ thành viên, phê duyệt tài khoản, xuất bản nội dung trang tĩnh, cẩm nang tình cảm và kiểm soát tương tác an toàn.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('project.admin.pages.index', $projectCode) }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-slate-900 text-xs font-bold shadow hover:bg-slate-100 transition-all">
                    <i class="fa-solid fa-file-pen text-blue-600"></i>
                    Quản lý Trang (Pages)
                </a>
                <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 text-white text-xs font-bold shadow hover:bg-blue-700 transition-all">
                    <i class="fa-solid fa-users"></i>
                    Quản lý Thành viên
                </a>
            </div>
        </div>
        <!-- Decorative Glow -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
    </div>

    <!-- 2. KPI Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Metric 1: Total Profiles -->
        <div class="eh-card bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tổng Thành viên</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-black text-slate-900">{{ number_format($totalProfiles ?? 0) }}</span>
                <span class="text-xs font-semibold text-emerald-600">
                    <i class="fa-solid fa-arrow-trend-up"></i> +{{ $newProfilesWeek ?? 0 }} tuần này
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-2">Hồ sơ đăng ký tìm bạn bốn phương</p>
        </div>

        <!-- Metric 2: Gender Ratio -->
        <div class="eh-card bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tỷ lệ Giới tính</span>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-venus-mars"></i>
                </div>
            </div>
            <div class="flex items-center justify-between text-sm font-bold text-slate-800">
                <span class="flex items-center gap-1.5 text-pink-600">
                    <i class="fa-solid fa-venus"></i> Nữ: {{ $femaleProfiles ?? 0 }}
                </span>
                <span class="flex items-center gap-1.5 text-sky-600">
                    <i class="fa-solid fa-mars"></i> Nam: {{ $maleProfiles ?? 0 }}
                </span>
            </div>
            @php
                $totalG = ($femaleProfiles ?? 0) + ($maleProfiles ?? 0);
                $femalePct = $totalG > 0 ? round((($femaleProfiles ?? 0) / $totalG) * 100) : 50;
            @endphp
            <div class="w-full bg-slate-100 rounded-full h-2 mt-3 overflow-hidden flex">
                <div class="bg-pink-500 h-2" style="width: {{ $femalePct }}%"></div>
                <div class="bg-sky-500 h-2" style="width: {{ 100 - $femalePct }}%"></div>
            </div>
            <div class="flex justify-between text-[11px] text-slate-400 mt-1">
                <span>{{ $femalePct }}% Nữ</span>
                <span>{{ 100 - $femalePct }}% Nam</span>
            </div>
        </div>

        <!-- Metric 3: CMS Pages -->
        <div class="eh-card bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Trang Tĩnh (Pages)</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-black text-slate-900">{{ number_format($totalPages ?? 0) }}</span>
                <span class="text-xs font-medium text-slate-500">Trang</span>
            </div>
            <div class="flex items-center justify-between text-xs text-slate-500 mt-2 pt-2 border-t border-slate-50">
                <span>Đã xuất bản:</span>
                <span class="font-bold text-slate-800">{{ $publishedPages ?? $totalPages ?? 0 }} trang</span>
            </div>
        </div>

        <!-- Metric 4: Messages & Social -->
        <div class="eh-card bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Trò chuyện & Tương tác</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-comments"></i>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-black text-slate-900">{{ number_format($totalConversations ?? 0) }}</span>
                <span class="text-xs font-medium text-slate-500">Hội thoại</span>
            </div>
            <div class="flex items-center justify-between text-xs text-slate-500 mt-2 pt-2 border-t border-slate-50">
                <span>Tổng tin nhắn:</span>
                <span class="font-bold text-slate-800">{{ number_format($totalMessages ?? 0) }} tin gửi</span>
            </div>
        </div>
    </div>

    <!-- 3. Dual Section: Recent Profiles & Pages Management -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left: Recent Dating Profiles -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-user-check text-blue-600"></i>
                        Hồ sơ Thành viên Mới Đăng ký
                    </h3>
                    <p class="text-xs text-slate-400">Các thành viên mới cập nhật thông tin tìm bạn</p>
                </div>
                <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="text-xs font-bold text-blue-600 hover:text-blue-700">
                    Xem tất cả &rarr;
                </a>
            </div>

            <div class="space-y-3 flex-1">
                @forelse($recentProfiles ?? [] as $profile)
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        @if($profile->avatar)
                            <img src="{{ $profile->avatar }}" alt="{{ $profile->display_name }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 flex-shrink-0">
                        @else
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center flex-shrink-0 text-sm">
                                {{ strtoupper(substr($profile->display_name ?? 'U', 0, 1)) }}
                            </div>
                        @endif
                        <div class="min-w-0">
                            <p class="text-xs font-bold text-slate-900 truncate m-0">
                                {{ $profile->display_name ?? 'Thành viên eHenho' }}
                                <span class="text-[11px] font-normal text-slate-500">({{ $profile->age ?? 25 }} tuổi)</span>
                            </p>
                            <p class="text-[11px] text-slate-500 truncate m-0">
                                <i class="fa-solid fa-location-dot text-slate-400 mr-1"></i>{{ $profile->location_text }}
                                &bull;
                                @if($profile->gender === 'female')
                                    <span class="text-pink-600 font-medium">Nữ</span>
                                @else
                                    <span class="text-sky-600 font-medium">Nam</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $profile->status === 'blocked' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $profile->status === 'blocked' ? 'Đã khóa' : 'Hoạt động' }}
                        </span>
                        <a href="{{ route('project.admin.ehenho.profiles.edit', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" class="p-1.5 text-slate-400 hover:text-blue-600 transition-colors">
                            <i class="fa-solid fa-pen text-xs"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-slate-400 text-xs">
                    Chưa có hồ sơ nào.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Right: CMS Pages Management -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-file-shield text-purple-600"></i>
                        Trang Nội Dung Tĩnh (Pages)
                    </h3>
                    <p class="text-xs text-slate-400">Quản lý nội dung hiển thị trực tiếp ngoài giao diện Client</p>
                </div>
                <a href="{{ route('project.admin.pages.create', $projectCode) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-purple-50 text-purple-700 hover:bg-purple-100 text-xs font-bold transition-all">
                    <i class="fa-solid fa-plus text-[10px]"></i> Thêm trang
                </a>
            </div>

            <div class="space-y-3 flex-1">
                @forelse($recentPages ?? [] as $page)
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                    <div class="min-w-0 pr-3">
                        <p class="text-xs font-bold text-slate-900 truncate m-0">
                            {{ $page->title }}
                        </p>
                        <p class="text-[11px] text-slate-400 font-mono truncate m-0">
                            /ehenho/{{ $page->slug }}
                        </p>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $page->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-200 text-slate-700' }}">
                            {{ $page->status === 'published' ? 'Đã xuất bản' : 'Bản nháp' }}
                        </span>
                        <a href="{{ route('project.admin.pages.edit', ['projectCode' => $projectCode, 'post' => $page->id]) }}" class="px-2.5 py-1 rounded bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:text-purple-600 transition-colors shadow-sm">
                            <i class="fa-solid fa-pen-to-square text-[10px] mr-1"></i> Sửa
                        </a>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-slate-400 text-xs">
                    Chưa có trang tĩnh nào. Bấm "Thêm trang" để tạo trang Giới thiệu, Điều khoản, Chính sách.
                </div>
                @endforelse
            </div>

            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Cần đồng bộ trang mặc định?</span>
                <a href="{{ route('project.admin.pages.index', $projectCode) }}" class="font-bold text-purple-600 hover:text-purple-700">
                    Xem tất cả trang CMS &rarr;
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
