@extends('superadmin.layouts.app')
@section('title', 'Sửa Bộ Phận | Super Admin')
@section('page-title', 'Sửa Bộ Phận')

@section('content')
<div class="px-1 sm:px-6 py-3 sm:py-8 w-full max-w-4xl mx-auto">
    <div class="mb-4 sm:mb-6">
        <a href="{{ route('superadmin.departments.index') }}" class="text-[#001B4E] hover:underline flex items-center text-xs sm:text-sm font-medium">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden">
        <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Chỉnh sửa bộ phận: {{ $department->name }}</h2>
            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-mono w-fit">{{ $department->code }}</span>
        </div>

        <div class="p-4 sm:p-6">
            <form action="{{ route('superadmin.departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên bộ phận <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $department->name) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2" required>
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã (Code) <span class="text-red-500">*</span></label>
                            <input type="text" name="code" value="{{ old('code', $department->code) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2" required>
                            @error('code')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trưởng bộ phận</label>
                        <select name="manager_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2">
                            <option value="">-- Chọn trưởng bộ phận --</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}" {{ old('manager_id', $department->manager_id) == $manager->id ? 'selected' : '' }}>{{ $manager->name }} ({{ $manager->employee_code }})</option>
                            @endforeach
                        </select>
                        @error('manager_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
                        <textarea name="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2">{{ old('description', $department->description) }}</textarea>
                        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                        <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2">
                            <option value="active" {{ old('status', $department->status) == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="inactive" {{ old('status', $department->status) == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
                        </select>
                        @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-100 flex justify-end space-x-3">
                    <a href="{{ route('superadmin.departments.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#001B4E] hover:bg-[#002D80] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Cập nhật Bộ Phận
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
