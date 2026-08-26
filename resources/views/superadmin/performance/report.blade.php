@extends('superadmin.layouts.app')

@section('title', 'Báo cáo hiệu suất')
@section('page-title', 'Báo cáo hiệu suất cá nhân')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Filter Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
        <form action="{{ route('superadmin.performance.report') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            @if($isAdminOrPm)
            <div class="flex-1 min-w-[200px]">
                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">Nhân viên</label>
                <select name="user_id" id="user_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2">
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ $targetUser->id == $u->id ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->department ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="flex-1 min-w-[200px]">
                <label for="period" class="block text-sm font-medium text-gray-700 mb-1">Kỳ báo cáo</label>
                <select name="period" id="period" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm border px-4 py-2">
                    <option value="month" {{ $period == 'month' ? 'selected' : '' }}>Tháng này</option>
                    <option value="week" {{ $period == 'week' ? 'selected' : '' }}>Tuần này</option>
                    <option value="year" {{ $period == 'year' ? 'selected' : '' }}>Năm nay</option>
                    <option value="all" {{ $period == 'all' ? 'selected' : '' }}>Tất cả thời gian</option>
                </select>
            </div>

            <div class="flex-none">
                <button type="submit" class="bg-[#002D80] hover:bg-[#0040A0] text-white px-6 py-2 rounded-md font-medium text-sm transition-colors shadow-sm">
                    Xem Báo Cáo
                </button>
            </div>
        </form>
    </div>

    <!-- User Profile Summary -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3 sm:gap-4">
            @if($targetUser->avatar)
                <img src="{{ asset('storage/' . $targetUser->avatar) }}" alt="{{ $targetUser->name }}" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover border-2 border-gray-200">
            @else
                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-indigo-100 flex items-center justify-center border-2 border-indigo-200 shrink-0">
                    <span class="text-indigo-600 font-bold text-lg sm:text-2xl">{{ substr($targetUser->name, 0, 1) }}</span>
                </div>
            @endif
            <div>
                <h2 class="text-lg sm:text-2xl font-bold text-gray-900">{{ $targetUser->name }}</h2>
                <p class="text-xs sm:text-sm text-gray-500 font-medium">{{ $targetUser->department ?? 'Chưa cập nhật phòng ban' }} - {{ $targetUser->employee_code ?? 'N/A' }}</p>
            </div>
        </div>
        
        @if(config('features.gold_enabled'))
        <div class="text-left sm:text-right w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-t-0 border-gray-100 flex sm:block items-center justify-between">
            <p class="text-sm text-gray-500 font-medium mb-1">Tổng Gold kiếm được (Kỳ này)</p>
            <div class="flex items-center gap-2 justify-end">
                <svg class="w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <circle cx="10" cy="10" r="8" fill="#FBBF24" stroke="#D97706" stroke-width="1.5"/>
                    <circle cx="10" cy="10" r="5.5" fill="#F59E0B" stroke="#B45309" stroke-width="0.75"/>
                    <text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text>
                </svg>
                <span class="text-2xl font-bold text-amber-600">{{ number_format($total_gold_earned) }}</span>
            </div>
        </div>
        @endif
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Khối lượng công việc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 border-l-4 border-l-blue-500">
            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-1">Khối lượng công việc</h3>
            <div class="flex items-end gap-2">
                <span class="text-3xl font-bold text-gray-900">{{ $total_tasks }}</span>
                <span class="text-sm text-gray-500 mb-1">tasks</span>
            </div>
            <p class="text-xs text-gray-500 mt-2">Tổng số được giao</p>
        </div>

        <!-- Tiến độ / Hoàn thành -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 border-l-4 border-l-indigo-500">
            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-1">Tiến độ</h3>
            <div class="flex items-end gap-2">
                <span class="text-3xl font-bold text-indigo-600">{{ $completed_tasks }}</span>
                <span class="text-sm text-gray-500 mb-1">/ {{ $total_tasks }} hoàn thành</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                @php $percent = $total_tasks > 0 ? ($completed_tasks / $total_tasks) * 100 : 0; @endphp
                <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $percent }}%"></div>
            </div>
        </div>

        <!-- Đúng hạn / Trễ hạn -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 border-l-4 border-l-green-500">
            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-1">Kết quả đánh giá</h3>
            <div class="flex gap-4 mt-2">
                <div>
                    <p class="text-2xl font-bold text-green-600">{{ $on_time_tasks }}</p>
                    <p class="text-xs text-gray-500">Đúng hạn</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-red-500">{{ $late_tasks }}</p>
                    <p class="text-xs text-gray-500">Trễ hạn</p>
                </div>
            </div>
        </div>

        <!-- Thời gian xử lý -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 border-l-4 border-l-purple-500">
            <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider mb-1">TG Xử lý trung bình</h3>
            <div class="flex items-end gap-2">
                <span class="text-3xl font-bold text-purple-600">{{ $average_processing_time }}</span>
                <span class="text-sm text-gray-500 mb-1">ngày / task</span>
            </div>
            <p class="text-xs text-gray-500 mt-2">Tính trên số task đã hoàn thành</p>
        </div>
    </div>

    <!-- Task List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-bold text-gray-900">Chi tiết công việc kỳ báo cáo</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Tên công việc</th>
                        <th class="px-6 py-3">Bắt đầu</th>
                        <th class="px-6 py-3">Deadline</th>
                        <th class="px-6 py-3">Hoàn thành lúc</th>
                        <th class="px-6 py-3">Trạng thái</th>
                        @if(config('features.gold_enabled'))
                        <th class="px-6 py-3 text-right">Gold</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($tasks as $task)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $task->title }}</td>
                            <td class="px-6 py-4">{{ $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('d/m/Y') : '-' }}</td>
                            <td class="px-6 py-4">
                                @if($task->deadline)
                                    <span class="{{ \Carbon\Carbon::parse($task->deadline)->isPast() && !$task->completed_at ? 'text-red-600 font-medium' : '' }}">
                                        {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $task->completed_at ? \Carbon\Carbon::parse($task->completed_at)->format('d/m/Y H:i') : 'Đang làm' }}</td>
                            <td class="px-6 py-4">
                                @if($task->completed_at)
                                    @if($task->deadline && \Carbon\Carbon::parse($task->completed_at)->gt(\Carbon\Carbon::parse($task->deadline)->endOfDay()))
                                        <span class="px-2.5 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Hoàn thành trễ</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Đã hoàn thành</span>
                                    @endif
                                @else
                                    @if($task->deadline && \Carbon\Carbon::today()->gt(\Carbon\Carbon::parse($task->deadline)->endOfDay()))
                                        <span class="px-2.5 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Trễ hạn</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Đang tiến hành</span>
                                    @endif
                                @endif
                            </td>
                            @if(config('features.gold_enabled'))
                            <td class="px-6 py-4 text-right font-medium {{ $task->gold_awarded ? 'text-amber-600' : 'text-gray-400' }}">
                                {{ $task->gold_awarded ? '+' . $task->gold : 0 }}
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                Không có công việc nào trong kỳ báo cáo này.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
