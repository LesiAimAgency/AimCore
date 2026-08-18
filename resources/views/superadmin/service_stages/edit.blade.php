@extends('superadmin.layouts.app')
@section('title', 'Sửa Giai Đoạn | Super Admin')
@section('page-title', 'Sửa Giai Đoạn Dịch Vụ')

@section('content')
<div class="px-6 py-8 w-full max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('superadmin.service-stages.index', ['service_id' => $service->id]) }}" class="text-[#001B4E] hover:underline flex items-center text-sm font-medium">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách giai đoạn
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Chỉnh sửa giai đoạn: {{ $stage->name }}</h2>
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-medium">Dịch vụ: {{ $service->name }}</span>
        </div>

        <div class="p-6">
            <form action="{{ route('superadmin.service-stages.update', ['service_id' => $service->id, 'id' => $stage->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên giai đoạn <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $stage->name) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thứ tự (Order) <span class="text-red-500">*</span></label>
                            <input type="number" name="order" value="{{ old('order', $stage->order) }}" min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            <p class="text-xs text-gray-500 mt-1">Giai đoạn có thứ tự nhỏ sẽ được thực hiện trước.</p>
                            @error('order')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Loại xử lý <span class="text-red-500">*</span></label>
                            <select name="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                                <option value="client_info" {{ old('type', $stage->type) == 'client_info' ? 'selected' : '' }}>Khách hàng cung cấp thông tin</option>
                                <option value="system_setup" {{ old('type', $stage->type) == 'system_setup' ? 'selected' : '' }}>Kỹ thuật cấu hình</option>
                                <option value="implementation" {{ old('type', $stage->type) == 'implementation' ? 'selected' : '' }}>Nhân viên thực hiện</option>
                                <option value="internal_review" {{ old('type', $stage->type) == 'internal_review' ? 'selected' : '' }}>Chờ duyệt nội bộ</option>
                                <option value="client_review" {{ old('type', $stage->type) == 'client_review' ? 'selected' : '' }}>Khách hàng duyệt</option>
                            </select>
                            @error('type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tỷ trọng (% hiệu suất) <span class="text-red-500">*</span></label>
                            <input type="number" name="weight_percent" value="{{ old('weight_percent', $stage->weight_percent) }}" min="0" max="100" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                            <p class="text-xs text-gray-500 mt-1">Phần trăm khối lượng công việc cho giai đoạn này (tổng các giai đoạn nên là 100%).</p>
                            @error('weight_percent')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cấu hình Form Kết Quả (JSON)</label>
                        <textarea name="form_schema" rows="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm font-mono">{{ old('form_schema', is_array($stage->form_schema) ? json_encode($stage->form_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $stage->form_schema) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Form động để nhân viên điền khi báo cáo hoàn thành giai đoạn.</p>
                        @error('form_schema')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
                        <textarea name="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('description', $stage->description) }}</textarea>
                        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center">
                        <input type="hidden" name="requires_form" value="0">
                        <input type="checkbox" name="requires_form" value="1" id="requires_form" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{ old('requires_form', $stage->requires_form) ? 'checked' : '' }}>
                        <label for="requires_form" class="ml-2 block text-sm text-gray-900">
                            Bắt buộc điền form (form_schema của dịch vụ hoặc của giai đoạn) khi hoàn thành
                        </label>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-100 flex justify-end space-x-3">
                    <a href="{{ route('superadmin.service-stages.index', ['service_id' => $service->id]) }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#001B4E] hover:bg-[#002D80] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Cập nhật Giai Đoạn
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
