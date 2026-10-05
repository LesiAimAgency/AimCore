@extends('cms.layouts.app')

@section('title', 'Quản lý Hồ sơ Hẹn hò - eHenho')
@section('page-title', 'Danh Sách Hồ Sơ Hẹn Hò')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-6 max-w-7xl mx-auto space-y-6">

    {{-- Thông báo thành công --}}
    @if(session('success'))
    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span class="text-xs font-semibold">{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-sm">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    @endif

    <!-- Header Actions & Search -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
        <form method="GET" action="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3">
            <div class="lg:col-span-2 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên, headline, tỉnh thành..." class="w-full pl-9 pr-4 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
            </div>

            <div>
                <select name="gender" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Tất cả giới tính --</option>
                    <option value="female" {{ request('gender') === 'female' ? 'selected' : '' }}>Nữ</option>
                    <option value="male" {{ request('gender') === 'male' ? 'selected' : '' }}>Nam</option>
                </select>
            </div>

            <div>
                <select name="country" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Quốc gia / Khu vực --</option>
                    <option value="nhat" {{ request('country') === 'nhat' ? 'selected' : '' }}>🇯🇵 Ở Nhật (Nhật Bản)</option>
                    <option value="vietnam" {{ request('country') === 'vietnam' ? 'selected' : '' }}>🇻🇳 Việt Nam</option>
                    <option value="my" {{ request('country') === 'my' ? 'selected' : '' }}>🇺🇸 Hoa Kỳ (Mỹ)</option>
                    <option value="uc" {{ request('country') === 'uc' ? 'selected' : '' }}>🇦🇺 Úc (Australia)</option>
                    <option value="canada" {{ request('country') === 'canada' ? 'selected' : '' }}>🇨🇦 Canada</option>
                    <option value="duc" {{ request('country') === 'duc' ? 'selected' : '' }}>🇩🇪 Đức (Germany)</option>
                    <option value="overseas" {{ request('country') === 'overseas' ? 'selected' : '' }}>🌍 Toàn bộ Nước ngoài</option>
                </select>
            </div>

            <div>
                <select name="status" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Tất cả trạng thái --</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Đang hoạt động</option>
                    <option value="blocked" {{ request('status') === 'blocked' ? 'selected' : '' }}>Đã khóa</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm">
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
        <div class="p-4 border-b border-slate-100 flex items-center justify-between flex-wrap gap-3">
            <h3 class="text-sm font-bold text-slate-900">
                Tổng số: <span class="text-blue-600 font-extrabold">{{ $profiles->total() }}</span> thành viên
            </h3>
            <a href="{{ route('project.admin.ehenho.profiles.create', $projectCode) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-sm inline-flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-xs"></i>
                <span>Thêm thành viên</span>
            </a>
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
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-sm">
                                        {{ strtoupper(substr($profile->display_name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <p class="font-bold text-slate-900 m-0">{{ $profile->display_name }}</p>
                                        @if($profile->is_featured)
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-100 text-amber-700" title="Hồ sơ nổi bật">
                                                <i class="fa-solid fa-star text-[8px] mr-0.5 text-amber-500"></i> Nổi bật
                                            </span>
                                        @endif
                                    </div>
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
                            <div class="flex items-center gap-1.5">
                                <i class="fa-solid fa-location-dot text-slate-400 text-xs"></i>
                                <span class="font-medium text-slate-800">{{ $profile->location_text }}</span>
                            </div>
                            @if(str_contains($profile->province_name, 'Nhật') || str_contains($profile->province_name, 'Japan') || $profile->province_id == 68)
                                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-rose-50 text-rose-700 border border-rose-200 mt-1">
                                    <span>🇯🇵</span> Ở Nhật (Japan)
                                </span>
                            @elseif(str_contains($profile->province_name, 'Mỹ') || str_contains($profile->province_name, 'Hoa Kỳ') || $profile->province_id == 64)
                                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-blue-50 text-blue-700 border border-blue-200 mt-1">
                                    <span>🇺🇸</span> Ở Mỹ (USA)
                                </span>
                            @elseif(str_contains($profile->province_name, 'Úc') || $profile->province_id == 65)
                                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-200 mt-1">
                                    <span>🇦🇺</span> Ở Úc
                                </span>
                            @elseif(str_contains($profile->province_name, 'Canada') || $profile->province_id == 66)
                                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-red-50 text-red-700 border border-red-200 mt-1">
                                    <span>🇨🇦</span> Ở Canada
                                </span>
                            @elseif(str_contains($profile->province_name, 'Đức') || $profile->province_id == 67)
                                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[9px] font-bold bg-purple-50 text-purple-700 border border-purple-200 mt-1">
                                    <span>🇩🇪</span> Ở Đức
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-4 max-w-xs truncate text-slate-600" title="{{ $profile->headline }}">
                            {{ $profile->headline ?: 'Chưa cập nhật headline' }}
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $profile->status === 'blocked' ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700' }}">
                                {{ $profile->status === 'blocked' ? 'Đã khóa' : 'Hoạt động' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-right space-x-1 whitespace-nowrap">
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
                            <form method="POST" action="{{ route('project.admin.ehenho.profiles.destroy', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa thành viên {{ $profile->display_name }}? Toàn bộ dữ liệu hồ sơ và tài khoản sẽ bị xóa vĩnh viễn.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Xóa thành viên" class="p-1.5 rounded bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
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
