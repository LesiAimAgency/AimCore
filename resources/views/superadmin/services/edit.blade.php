@extends('superadmin.layouts.app')
@section('title', 'Sửa Dịch Vụ | Super Admin')
@section('page-title', 'Sửa Dịch Vụ')

@section('content')
<div class="px-6 py-8 w-full max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('superadmin.services.index') }}" class="text-[#001B4E] hover:underline flex items-center text-sm font-medium">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Chỉnh sửa dịch vụ: {{ $service->name }}</h2>
            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-mono">{{ $service->code }}</span>
        </div>

        <div class="p-6">
            <form action="{{ route('superadmin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên dịch vụ <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $service->name) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã (Code) <span class="text-red-500">*</span></label>
                            <input type="text" name="code" value="{{ old('code', $service->code) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            @error('code')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bộ phận phụ trách <span class="text-red-500">*</span></label>
                        <select name="department_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            <option value="">-- Chọn bộ phận --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id', $service->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Form Schema (JSON)</label>
                        <textarea name="form_schema" rows="6" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm font-mono">{{ old('form_schema', is_array($service->form_schema) ? json_encode($service->form_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $service->form_schema) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Định nghĩa cấu trúc form động để lấy thông tin từ khách hàng (dạng JSON array).</p>
                        @error('form_schema')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
                        <textarea name="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('description', $service->description) }}</textarea>
                        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                        <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                            <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Hoạt động</option>
                            <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
                        </select>
                        @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-100 flex justify-end space-x-3">
                    <a href="{{ route('superadmin.services.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#001B4E] hover:bg-[#002D80] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Cập nhật Dịch Vụ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
