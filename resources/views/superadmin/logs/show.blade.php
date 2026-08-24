@extends('superadmin.layouts.app')

@section('title', 'Xem Chi Tiết Log')
@section('page-title', 'Nội dung Log: ' . $filename)

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('superadmin.logs.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Quay lại danh sách
        </a>
        <div class="flex items-center space-x-2">
            <a href="{{ route('superadmin.logs.download', $filename) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Tải File
            </a>
            <form action="{{ route('superadmin.logs.destroy', $filename) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa file log {{ $filename }} này không? Hành động này không thể hoàn tác.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Xóa File
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4 w-full md:w-auto">
                <span class="text-sm font-semibold text-gray-700">{{ $filename }}</span>
                <span class="text-xs font-medium text-gray-500 bg-gray-200 px-2 py-1 rounded">{{ number_format(strlen($content) / 1024, 2) }} KB</span>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto text-sm">
                <input type="text" id="filter-user" placeholder="Lọc theo tên người dùng..." class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-1.5 w-full sm:w-48 text-sm border">
                
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <input type="time" id="filter-time-start" class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-2 py-1.5 text-sm border" title="Giờ bắt đầu">
                    <span class="text-gray-500">-</span>
                    <input type="time" id="filter-time-end" class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-2 py-1.5 text-sm border" title="Giờ kết thúc">
                </div>
                
                <button type="button" id="btn-clear-filters" class="text-gray-500 hover:text-red-600 px-2 py-1.5 text-xs font-medium whitespace-nowrap">
                    Xóa lọc
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            @if(empty($parsedLogs))
                <div class="text-gray-500 text-center py-8 italic">File log trống. Chưa có lịch sử hoạt động nào được ghi lại.</div>
            @else
                <table class="min-w-full divide-y divide-gray-200" id="logs-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48">Thời gian</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48">Người dùng</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-64">Hành động</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chi tiết thay đổi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($parsedLogs as $log)
                            <tr class="hover:bg-gray-50 transition-colors log-row">
                                @if(isset($log['time']))
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono log-time" data-time="{{ substr($log['time'], 11, 5) }}">
                                        {{ $log['time'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 log-user">{{ $log['user'] }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ str_contains(strtolower($log['action']), 'log') ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $log['action'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if(is_array($log['changes']))
                                            <div class="bg-gray-50 p-3 rounded-md border border-gray-100 font-mono text-xs overflow-x-auto">
                                                @foreach($log['changes'] as $key => $value)
                                                    <div class="mb-1 last:mb-0">
                                                        <span class="font-semibold text-indigo-700">{{ $key }}:</span> 
                                                        <span class="text-gray-800">{{ is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="font-mono text-xs bg-gray-50 p-2 rounded block">{{ $log['changes'] }}</span>
                                        @endif
                                    </td>
                                @else
                                    <td colspan="4" class="px-6 py-4 text-sm font-mono text-red-500 whitespace-pre-wrap">{{ $log['raw'] }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="no-results" class="hidden text-gray-500 text-center py-8 italic">Không tìm thấy kết quả nào phù hợp với bộ lọc.</div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterUser = document.getElementById('filter-user');
    const filterTimeStart = document.getElementById('filter-time-start');
    const filterTimeEnd = document.getElementById('filter-time-end');
    const btnClear = document.getElementById('btn-clear-filters');
    const rows = document.querySelectorAll('.log-row');
    const noResults = document.getElementById('no-results');
    
    function applyFilters() {
        if (!filterUser) return;
        
        const userKeyword = filterUser.value.toLowerCase().trim();
        const timeStart = filterTimeStart.value; // format: HH:mm
        const timeEnd = filterTimeEnd.value; // format: HH:mm
        
        let visibleCount = 0;
        
        rows.forEach(row => {
            let showRow = true;
            
            // Nếu dòng bị lỗi parse (ko có data)
            const userEl = row.querySelector('.log-user');
            const timeEl = row.querySelector('.log-time');
            
            if (userEl && timeEl) {
                const userName = userEl.textContent.toLowerCase();
                const logTime = timeEl.getAttribute('data-time'); // HH:mm
                
                // Lọc theo người dùng
                if (userKeyword && !userName.includes(userKeyword)) {
                    showRow = false;
                }
                
                // Lọc theo giờ
                if (timeStart && logTime < timeStart) {
                    showRow = false;
                }
                
                if (timeEnd && logTime > timeEnd) {
                    showRow = false;
                }
            } else {
                // Các dòng raw (lỗi) - có thể chọn ẩn luôn hoặc show nếu ko filter
                if (userKeyword || timeStart || timeEnd) {
                    showRow = false;
                }
            }
            
            if (showRow) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        if (noResults) {
            noResults.classList.toggle('hidden', visibleCount > 0);
        }
    }
    
    if (filterUser) {
        filterUser.addEventListener('input', applyFilters);
        filterTimeStart.addEventListener('input', applyFilters);
        filterTimeEnd.addEventListener('input', applyFilters);
        
        btnClear.addEventListener('click', function() {
            filterUser.value = '';
            filterTimeStart.value = '';
            filterTimeEnd.value = '';
            applyFilters();
        });
    }
});
</script>
@endpush
@endsection
