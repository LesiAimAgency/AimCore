@extends('superadmin.layouts.app')

@section('title', 'Chi tiết Nhân viên')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div class="flex items-center gap-4">
        <a href="{{ route('manager.employees.index') }}" class="p-2 text-gray-500 hover:text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-900">{{ $employee->name }}</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $employee->email }} &bull; {{ $employee->department ?? 'Chưa phân bổ phòng ban' }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Thông tin cá nhân -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-gray-900 border-b pb-3 mb-4">Thông tin cá nhân</h3>
        <div class="space-y-4">
            <div>
                <p class="text-sm text-gray-500">Mã nhân viên</p>
                <p class="font-medium">{{ $employee->employee_code ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Số điện thoại</p>
                <p class="font-medium">{{ $employee->phone ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Ngày tham gia</p>
                <p class="font-medium">{{ $employee->joining_date ? $employee->joining_date->format('d/m/Y') : 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Trạng thái</p>
                @if($employee->status)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Hoạt động</span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Đã khóa</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Công việc (Tasks) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:col-span-2">
        <h3 class="text-lg font-bold text-gray-900 border-b pb-3 mb-4">Công việc gần đây</h3>
        
        <div class="space-y-4">
            @forelse($employee->tasks as $task)
            <div class="p-4 border border-gray-100 rounded-lg hover:border-indigo-100 transition-colors">
                <div class="flex justify-between items-start mb-2">
                    <h4 class="font-bold text-gray-900">{{ $task->title ?? 'Không có tiêu đề' }}</h4>
                    <span class="text-xs font-medium px-2 py-1 bg-gray-100 text-gray-600 rounded">
                        {{ $task->status ?? 'Mới' }}
                    </span>
                </div>
                <p class="text-sm text-gray-600 line-clamp-2 mb-3">{{ $task->description ?? 'Không có mô tả' }}</p>
                <div class="flex items-center text-xs text-gray-500 gap-4">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Tạo lúc: {{ $task->created_at ? $task->created_at->format('d/m/Y H:i') : 'N/A' }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500 bg-gray-50 rounded-lg">
                Nhân viên này chưa có công việc nào.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
