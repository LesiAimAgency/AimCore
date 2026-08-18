@extends('superadmin.layouts.app')
@section('title', 'Giai Đoạn Dịch Vụ | Super Admin')
@section('page-title', 'Giai Đoạn Dịch Vụ')

@section('content')
<div class="px-6 py-8 w-full max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('superadmin.services.index') }}" class="text-[#001B4E] hover:underline flex items-center text-sm font-medium mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách Dịch Vụ
        </a>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-[#001B4E]">Giai Đoạn: {{ $service->name }}</h1>
                <p class="text-gray-500 mt-1">Cấu hình luồng công việc cho dịch vụ này</p>
            </div>
            <div>
                <a href="{{ route('superadmin.service-stages.create', ['service_id' => $service->id]) }}" class="px-6 py-3 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium inline-flex items-center transition-colors shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Thêm Giai Đoạn
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600">Thứ tự</th>
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600">Tên Giai Đoạn</th>
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600">Loại xử lý</th>
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600 text-center">Tỷ trọng (%)</th>
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600 text-center">Có form kết quả?</th>
                        <th class="py-4 px-6 text-sm font-semibold text-gray-600 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($stages as $stage)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 text-center">
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-md text-sm font-bold">{{ $stage->order }}</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-900">{{ $stage->name }}</div>
                            @if($stage->description)
                            <div class="text-xs text-gray-500 mt-1">{{ $stage->description }}</div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            @if($stage->type == 'client_info')
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-medium">Khách hàng cung cấp thông tin</span>
                            @elseif($stage->type == 'system_setup')
                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 rounded text-xs font-medium">Kỹ thuật cấu hình</span>
                            @elseif($stage->type == 'implementation')
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs font-medium">Nhân viên thực hiện</span>
                            @elseif($stage->type == 'client_review')
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs font-medium">Khách hàng duyệt</span>
                            @else
                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs font-medium">Chờ duyệt nội bộ</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center font-medium {{ $stage->weight_percent > 0 ? 'text-green-600' : 'text-gray-400' }}">
                            {{ $stage->weight_percent }}%
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($stage->requires_form)
                            <span class="text-green-600">
                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            @else
                            <span class="text-gray-300">
                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('superadmin.service-stages.edit', ['service_id' => $service->id, 'id' => $stage->id]) }}" class="p-2 text-[#001B4E] bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors" title="Sửa">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('superadmin.service-stages.destroy', ['service_id' => $service->id, 'id' => $stage->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa giai đoạn này? Các dự án đang ở giai đoạn này có thể bị ảnh hưởng.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors" title="Xóa">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-500">Dịch vụ này chưa có giai đoạn nào được cấu hình.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
