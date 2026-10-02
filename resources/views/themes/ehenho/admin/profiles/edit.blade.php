@extends('cms.layouts.app')

@section('title', 'Chỉnh sửa Hồ sơ Hẹn hò - eHenho')
@section('page-title', 'Chỉnh Sửa Hồ Sơ: ' . $profile->display_name)

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-6 max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <div class="flex items-center gap-4">
                @if($profile->avatar)
                    <img src="{{ $profile->avatar }}" alt="{{ $profile->display_name }}" class="w-14 h-14 rounded-full object-cover border-2 border-rose-500 shadow-md">
                @else
                    <div class="w-14 h-14 rounded-full bg-rose-100 text-rose-600 font-bold flex items-center justify-center text-xl">
                        {{ strtoupper(substr($profile->display_name ?? 'U', 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h3 class="text-base font-bold text-slate-900 m-0">{{ $profile->display_name }}</h3>
                    <p class="text-xs text-slate-400 font-mono m-0">Slug: {{ $profile->slug }}</p>
                </div>
            </div>
            <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold">
                &larr; Quay lại danh sách
            </a>
        </div>

        <form method="POST" action="{{ route('project.admin.ehenho.profiles.update', ['projectCode' => $projectCode, 'id' => $profile->id]) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tên hiển thị *</label>
                    <input type="text" name="display_name" value="{{ old('display_name', $profile->display_name) }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tuổi *</label>
                    <input type="number" name="age" value="{{ old('age', $profile->age) }}" min="18" max="99" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Giới tính *</label>
                    <select name="gender" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                        <option value="female" {{ old('gender', $profile->gender) === 'female' ? 'selected' : '' }}>Nữ</option>
                        <option value="male" {{ old('gender', $profile->gender) === 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="other" {{ old('gender', $profile->gender) === 'other' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tỉnh / Thành phố</label>
                    <select name="province" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                        <option value="">-- Chọn tỉnh thành --</option>
                        @foreach($provinces as $prov)
                            <option value="{{ $prov->name }}" {{ old('province', $profile->province) === $prov->name ? 'selected' : '' }}>
                                {{ $prov->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Tiêu đề tìm bạn (Headline)</label>
                <input type="text" name="headline" value="{{ old('headline', $profile->headline) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none" placeholder="Ví dụ: Tìm bạn gái nghiêm túc để kết hôn">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Giới thiệu bản thân (About me)</label>
                <textarea name="about_me" rows="4" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">{{ old('about_me', $profile->about_me) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Trạng thái hồ sơ *</label>
                <select name="status" required class="w-full px-3 py-2 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-rose-500 focus:outline-none">
                    <option value="active" {{ old('status', $profile->status) === 'active' ? 'selected' : '' }}>Hoạt động bình thường</option>
                    <option value="pending" {{ old('status', $profile->status) === 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                    <option value="blocked" {{ old('status', $profile->status) === 'blocked' ? 'selected' : '' }}>Đã khóa tài khoản</option>
                </select>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('project.admin.ehenho.profiles.index', $projectCode) }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-all">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-6 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold transition-all shadow-md">
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
