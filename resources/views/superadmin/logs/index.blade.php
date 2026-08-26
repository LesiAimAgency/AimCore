@extends('superadmin.layouts.app')

@section('title', 'System Logs')
@section('page-title', 'Quản lý System Logs')

<div class="px-1 sm:px-6 py-3 sm:py-6 max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100">
            <h2 class="text-base sm:text-lg font-semibold text-gray-900">Danh sách File Log (Lưu trữ 7 ngày)</h2>
            <p class="mt-1 text-xs sm:text-sm text-gray-500">Các file log ghi lại mọi thao tác trên hệ thống Super Admin để phục vụ việc truy xuất khi có sự cố. Chỉ những tài khoản Dev hoặc SuperAdmin mới có thể tải về.</p>
        </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Tên File</th>
                    <th scope="col" class="px-6 py-3">Ngày cập nhật cuối</th>
                    <th scope="col" class="px-6 py-3 text-right">Dung lượng</th>
                    <th scope="col" class="px-6 py-3 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ $log['name'] }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($log['modified'])->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{ $log['size'] }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('superadmin.logs.show', $log['name']) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-600 text-white text-xs font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-sm transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Xem Trực Tiếp
                        </a>
                        <a href="{{ route('superadmin.logs.download', $log['name']) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Tải Log
                        </a>
                        <form action="{{ route('superadmin.logs.destroy', $log['name']) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa file log {{ $log['name'] }} này không? Hành động này không thể hoàn tác.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="mt-2 font-medium text-gray-900">Không có dữ liệu log</p>
                        <p class="mt-1 text-sm text-gray-500">Chưa có hành động nào được ghi nhận vào hệ thống log.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
