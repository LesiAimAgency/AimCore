@extends('superadmin.layouts.app')

@section('title', 'Quản lý Nhân viên')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Danh sách Nhân viên</h2>
        <p class="text-sm text-gray-500 mt-1">Theo dõi trạng thái và tiến độ công việc của nhân viên.</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="py-4 px-6 text-sm font-semibold text-gray-600">Nhân viên</th>
                    <th class="py-4 px-6 text-sm font-semibold text-gray-600">Phòng ban</th>
                    <th class="py-4 px-6 text-sm font-semibold text-gray-600">Công việc gần đây</th>
                    <th class="py-4 px-6 text-sm font-semibold text-gray-600 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($employees as $employee)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                                {{ substr($employee->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $employee->name }}</p>
                                <p class="text-xs text-gray-500">{{ $employee->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $employee->department ?? 'Chưa phân bổ' }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <p class="text-sm text-gray-600">
                            {{ $employee->tasks->count() }} công việc
                        </p>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('manager.employees.show', $employee->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Chi tiết
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-8 text-center text-gray-500">
                        Chưa có nhân viên nào trong hệ thống.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
