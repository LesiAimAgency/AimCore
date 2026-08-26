@extends('superadmin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Super Admin')

@section('content')

@if(isset($infectedProjects) && count($infectedProjects) > 0)
<div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-lg shadow-sm mb-6">
    <div class="flex items-center">
        <svg class="w-8 h-8 mr-4 text-red-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <div>
            <h3 class="font-bold text-red-800 text-lg">CẢNH BÁO BẢO MẬT NGHIÊM TRỌNG!</h3>
            <p class="text-red-700 mb-2">Hệ thống phát hiện <strong>{{ count($infectedProjects) }} dự án</strong> có dấu hiệu bị chèn mã độc. Yêu cầu kiểm tra ngay:</p>
            <ul class="list-disc list-inside text-red-800 font-medium">
                @foreach($infectedProjects as $project)
                <li>
                    Dự án {{ $project->code }} ({{ $project->name }}) - 
                    <a href="{{ url('/superadmin/projects/'.$project->id.'/config') }}" class="underline hover:text-red-900">Vào Lịch sử dự án</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-md p-4 sm:p-6 mb-4 sm:mb-6 text-white">
    <h2 class="text-lg sm:text-2xl font-bold">
        Xin chào, {{ auth()->user()->employee->position ?? 'Nhân viên' }} {{ auth()->user()->name }}!
    </h2>
    <p class="text-blue-100 text-xs sm:text-sm mt-1 sm:mt-2">Chào mừng bạn quay trở lại hệ thống quản trị</p>
</div>

<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6 mb-4 sm:mb-6">
    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Khách hàng</p>
                <p class="text-xl sm:text-3xl font-bold text-indigo-600 mt-1">{{ $totalCustomers }}</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-indigo-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Tổng Nhân sự</p>
                <p class="text-xl sm:text-3xl font-bold text-blue-600 mt-1">{{ $totalEmployees }}</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-blue-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Tổng Hợp đồng</p>
                <p class="text-xl sm:text-3xl font-bold text-blue-600 mt-1">{{ $totalContracts }}</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-blue-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">HĐ Chờ duyệt</p>
                <p class="text-xl sm:text-3xl font-bold text-yellow-600 mt-1">{{ $pendingContracts }}</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-yellow-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Dự án hoạt động</p>
                <p class="text-lg sm:text-3xl font-bold text-green-600 mt-1">{{ $activeProjects }}/{{ $totalProjects }}</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-green-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100 col-span-2 sm:col-span-1">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Thực thu tháng này</p>
                <p class="text-base sm:text-2xl font-bold text-purple-600 mt-1 truncate">{{ number_format($actualRevenueThisMonth) }} đ</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-purple-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-xs p-3.5 sm:p-6 border border-gray-100 col-span-2 sm:col-span-1">
        <div class="flex items-center justify-between">
            <div class="min-w-0">
                <p class="text-xs sm:text-sm text-gray-500 font-medium truncate">Dự kiến tháng này</p>
                <p class="text-base sm:text-2xl font-bold text-pink-600 mt-1 truncate">{{ number_format($expectedRevenue) }} đ</p>
            </div>
            <div class="h-9 w-9 sm:h-12 sm:w-12 bg-pink-50 rounded-lg flex items-center justify-center shrink-0">
                <svg class="h-5 w-5 sm:h-6 sm:w-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Mục tiêu chung -->
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-gray-900 flex items-center">
            <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Mục tiêu chung tháng {{ now()->month }}
        </h2>
        @if(auth()->user()->isManager() || auth()->user()->isSuperAdmin())
        <button type="button" onclick="document.getElementById('targetModal').classList.remove('hidden')" class="text-sm text-indigo-600 hover:underline flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Thiết lập mục tiêu
        </button>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            $targetCards = [
                ['name' => 'Team Account (Khách hàng)', 'actual' => $actualCustomers, 'target' => $targetCustomers, 'color' => 'blue', 'unit' => 'KH'],
                ['name' => 'Team Dev (Tasks)', 'actual' => $actualDevTasks, 'target' => $targetDevTasks, 'color' => 'indigo', 'unit' => 'task'],
                ['name' => 'Team Design (Tasks)', 'actual' => $actualDesignTasks, 'target' => $targetDesignTasks, 'color' => 'pink', 'unit' => 'task'],
                ['name' => 'Doanh thu (VNĐ)', 'actual' => $actualRevenueThisMonth, 'target' => $targetRevenue, 'color' => 'purple', 'unit' => 'đ', 'money' => true],
            ];
        @endphp

        @foreach($targetCards as $card)
            @php
                $percentage = $card['target'] > 0 ? min(round(($card['actual'] / $card['target']) * 100), 100) : 0;
                $remaining = max($card['target'] - $card['actual'], 0);
            @endphp
            <div class="border rounded-lg p-4 bg-gray-50 relative overflow-hidden">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-sm font-medium text-gray-700">{{ $card['name'] }}</p>
                    <span class="text-xs font-bold text-{{ $card['color'] }}-600 bg-{{ $card['color'] }}-100 px-2 py-1 rounded">
                        {{ $percentage }}%
                    </span>
                </div>
                <div class="flex justify-between items-end mt-4">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ isset($card['money']) ? number_format($card['actual']) : $card['actual'] }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Mục tiêu: {{ isset($card['money']) ? number_format($card['target']) : $card['target'] }} {{ $card['unit'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-medium text-red-500">Còn thiếu: {{ isset($card['money']) ? number_format($remaining) : $remaining }}</p>
                    </div>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-gray-200 h-1.5 mt-3 rounded-full overflow-hidden">
                    <div class="bg-{{ $card['color'] }}-500 h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal Thiết lập mục tiêu -->
<div id="targetModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Mục tiêu tháng {{ now()->month }}
                </h3>
                <button type="button" onclick="document.getElementById('targetModal').classList.add('hidden')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Đóng</span>
                </button>
            </div>
            <form action="{{ route('superadmin.dashboard.targets.update') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <label for="target_customers" class="block mb-2 text-sm font-medium text-gray-900">Khách hàng mới (Account)</label>
                        <input type="number" name="target_customers" id="target_customers" value="{{ $targetCustomers }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="target_dev_tasks" class="block mb-2 text-sm font-medium text-gray-900">Tasks hoàn thành (Dev)</label>
                        <input type="number" name="target_dev_tasks" id="target_dev_tasks" value="{{ $targetDevTasks }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="target_design_tasks" class="block mb-2 text-sm font-medium text-gray-900">Tasks hoàn thành (Design)</label>
                        <input type="number" name="target_design_tasks" id="target_design_tasks" value="{{ $targetDesignTasks }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="target_revenue" class="block mb-2 text-sm font-medium text-gray-900">Doanh thu (VNĐ)</label>
                        <input type="number" name="target_revenue" id="target_revenue" value="{{ $targetRevenue }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                    Lưu mục tiêu
                </button>
            </form>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Dự án sắp trễ hạn -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-500">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Dự án sắp trễ hạn / Quá hạn
            </h2>
            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ count($urgentProjects) }} dự án</span>
        </div>
        
        @if(count($urgentProjects) > 0)
            <div class="space-y-4">
                @foreach($urgentProjects as $project)
                    @php
                        $daysLeft = now()->diffInDays($project->deadline, false);
                    @endphp
                    <div class="p-4 bg-red-50 rounded-lg border border-red-100 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-red-800">{{ $project->name }}</p>
                            <p class="text-sm text-red-600">Client: {{ $project->client_name }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $daysLeft < 0 ? 'bg-red-600 text-white' : 'bg-red-200 text-red-800' }}">
                                @if($daysLeft < 0)
                                    Quá hạn {{ abs(intval($daysLeft)) }} ngày
                                @elseif($daysLeft == 0)
                                    Hạn chót hôm nay
                                @else
                                    Còn {{ intval($daysLeft) }} ngày
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-4">Tuyệt vời! Không có dự án nào đang sắp trễ hạn.</p>
        @endif
    </div>

    <!-- Tiến độ dự án -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Tiến độ dự án (Task)
            </h2>
            <a href="{{ route('superadmin.projects.index') }}" class="text-sm text-blue-600 hover:underline">Xem tất cả</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">Dự án</th>
                        <th scope="col" class="px-4 py-3">Tiến độ</th>
                        <th scope="col" class="px-4 py-3 text-right">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projectProgresses as $project)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $project->name }}
                                <div class="text-xs text-gray-500 mt-1">Deadline: {{ $project->deadline ? $project->deadline->format('d/m/Y') : 'N/A' }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-between mb-1">
                                    <span class="text-xs font-medium text-blue-700">{{ $project->progress }}%</span>
                                    <span class="text-xs font-medium text-gray-500">{{ $project->completedTasks }}/{{ $project->totalTasks }} tasks</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->progress }}%"></div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-right">
                                @if($project->progress == 100 && $project->totalTasks > 0)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Hoàn thành</span>
                                @elseif($project->progress > 0)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Đang làm</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Chưa bắt đầu</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">Chưa có dự án nào đang hoạt động.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Ranking Bảng vàng -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Bảng xếp hạng Nhân viên
            </h2>
            <div>
                <select id="rankingFilterSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block p-2">
                    <option value="7" {{ $rankingFilter == '7' ? 'selected' : '' }}>7 ngày qua</option>
                    <option value="14" {{ $rankingFilter == '14' ? 'selected' : '' }}>14 ngày qua</option>
                    <option value="30" {{ $rankingFilter == '30' ? 'selected' : '' }}>30 ngày qua</option>
                    <option value="all" {{ $rankingFilter == 'all' ? 'selected' : '' }}>Tất cả</option>
                </select>
            </div>
        </div>

        <div id="rankingListContainer">
            @include('superadmin.dashboard.partials.ranking_list')
        </div>
    </div>

    <!-- Tài nguyên Web sắp hết hạn -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path></svg>
                Tài nguyên Web (Domain/Hosting) sắp hết hạn
            </h2>
            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ count($expiringWebResources) }} tài nguyên</span>
        </div>

        @if(count($expiringWebResources) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Hợp đồng / Khách hàng</th>
                            <th scope="col" class="px-4 py-3">Domain</th>
                            <th scope="col" class="px-4 py-3">Hosting</th>
                            <th scope="col" class="px-4 py-3 text-right">Ngày hết hạn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expiringWebResources as $resource)
                            @php
                                $daysLeft = now()->diffInDays($resource->end_date, false);
                            @endphp
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900">{{ $resource->title }}</div>
                                    <div class="text-xs text-gray-500">Khách hàng: {{ $resource->client_name }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    {{ $resource->domain_name ?: '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $resource->hosting_provider ?: '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="font-medium text-gray-900 mb-1">{{ $resource->end_date->format('d/m/Y') }}</div>
                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $daysLeft < 0 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        @if($daysLeft < 0)
                                            Quá hạn {{ abs(intval($daysLeft)) }} ngày
                                        @elseif($daysLeft == 0)
                                            Hôm nay
                                        @else
                                            Còn {{ intval($daysLeft) }} ngày
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 text-center py-4">Chưa có tài nguyên Domain/Hosting nào sắp hết hạn trong 30 ngày tới.</p>
        @endif
    </div>
</div>

<script>
    document.getElementById('rankingFilterSelect').addEventListener('change', function() {
        const filter = this.value;
        const container = document.getElementById('rankingListContainer');
        container.innerHTML = '<p class="text-gray-500 text-center py-4">Đang tải dữ liệu...</p>';
        
        fetch(`{{ route('superadmin.dashboard.ranking-data') }}?ranking_filter=${filter}`)
            .then(res => res.json())
            .then(data => {
                container.innerHTML = data.html;
            })
            .catch(err => {
                console.error(err);
                container.innerHTML = '<p class="text-red-500 text-center py-4">Lỗi tải dữ liệu. Hãy thử lại.</p>';
            });
    });
</script>
@endsection
