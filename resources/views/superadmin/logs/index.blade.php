@extends('superadmin.layouts.app')

@section('title', 'System Logs')
@section('page-title', 'Quản lý System Logs')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-900">Danh sách File Log (Lưu trữ 7 ngày)</h2>
        <p class="mt-1 text-sm text-gray-500">Các file log ghi lại mọi thao tác trên hệ thống Super Admin để phục vụ việc truy xuất khi có sự cố. Chỉ những tài khoản Dev hoặc SuperAdmin mới có thể tải về.</p>
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
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('superadmin.logs.download', $log['name']) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Tải Log
                        </a>
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
