@extends('cms.layouts.app')

@section('title', 'Quản lý Hồ sơ Hẹn hò - eHenho')
@section('page-title', 'Danh Sách Hồ Sơ Hẹn Hò')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-6 max-w-7xl mx-auto space-y-6">
    <!-- Header Actions & Search -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
        <form method="GET" action="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="lg:col-span-2 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên, headline, tỉnh thành..." class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
            </div>

            <div>
                <select name="gender" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                    <option value="">-- Tất cả giới tính --</option>
                    <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>Nữ</option>
                    <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>Nam</option>
                </select>
            </div>

            <div>
                <select name="status" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                    <option value="">-- Tất cả trạng thái --</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Đang hoạt động</option>
                    <option value="blocked" {{ request('status') === 'blocked' ? 'selected' : '' }}>Đã khóa</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm">
                    Lọc
                </button>
                <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold transition-all">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Profiles Table -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900">
                Tổng số: <span class="text-rose-600 font-extrabold">{{ $profiles->total() }}</span> thành viên
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">Ảnh & Thành viên</th>
                        <th class="py-3 px-4">Giới tính / Tuổi</th>
                        <th class="py-3 px-4">Tỉnh thành</th>
                        <th class="py-3 px-4">Tiêu đề tìm bạn</th>
                        <th class="py-3 px-4">Trạng thái</th>
                        <th class="py-3 px-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($profiles as $profile)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                @if($profile->avatar)
                                    <img src="{{ $profile->avatar }}" alt="{{ $profile->display_name }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 shadow-sm">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-rose-100 text-rose-600 font-bold flex items-center justify-center text-sm">
                                        {{ strtoupper(substr($profile->display_name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-slate-900 m-0">{{ $profile->display_name }}</p>
                                    <span class="text-[11px] text-slate-400 font-mono">{{ $profile->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            @if($profile->gender === 'female')
                                <span class="inline-flex items-center gap-1 text-pink-600 font-medium">
                                    <i class="fa-solid fa-venus"></i> Nữ
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-sky-600 font-medium">
                                    <i class="fa-solid fa-mars"></i> Nam
                                </span>
                            @endif
                            <span class="text-slate-500 ml-1">({{ $profile->age ?? '?' }} tuổi)</span>
                        </td>
                        <td class="py-3 px-4 text-slate-600">
                            <i class="fa-solid fa-location-dot text-slate-400 mr-1"></i>
                            {{ $profile->province ?? 'Toàn quốc' }}
                        </td>
                        <td class="py-3 px-4 max-w-xs truncate text-slate-600" title="{{ $profile->headline }}">
                            {{ $profile->headline ?: 'Chưa cập nhật headline' }}
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $profile->status === 'blocked' ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700' }}">
                                {{ $profile->status === 'blocked' ? 'Đã khóa' : 'Hoạt động' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right space-x-1">
                            <a href="{{ url('/ehenho/ho-so/' . ($profile->slug ?: $profile->id)) }}" target="_blank" title="Xem ngoài web" class="p-1.5 rounded bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200 inline-block">
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                            </a>
                            <a href="{{ route('project.admin.ehenho.profiles.edit', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" title="Chỉnh sửa" class="p-1.5 rounded bg-blue-50 text-blue-600 hover:bg-blue-100 inline-block">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </a>
                            <form method="POST" action="{{ route('project.admin.ehenho.profiles.toggle-status', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" class="inline-block" onsubmit="return confirm('Bạn có chắc muốn đổi trạng thái thành viên này?');">
                                @csrf
                                <button type="submit" title="{{ $profile->status === 'blocked' ? 'Mở khóa' : 'Khóa hồ sơ' }}" class="p-1.5 rounded {{ $profile->status === 'blocked' ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' : 'bg-amber-50 text-amber-600 hover:bg-amber-100' }}">
                                    <i class="fa-solid {{ $profile->status === 'blocked' ? 'fa-lock-open' : 'fa-lock' }} text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-slate-400">
                            Không tìm thấy hồ sơ thành viên nào phù hợp.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($profiles->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $profiles->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
