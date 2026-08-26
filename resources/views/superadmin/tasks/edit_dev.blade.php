@extends('superadmin.layouts.app')
@section('content')
<div class="px-1 sm:px-6 py-3 sm:py-8 max-w-7xl mx-auto">
    <div class="mb-4 sm:mb-6">
        <a href="{{ route('superadmin.tasks.index') }}" class="text-gray-500 hover:text-[#001B4E] text-xs sm:text-sm">&larr; Quay lại bảng Tasks</a>
        <h1 class="text-xl sm:text-3xl font-bold text-[#001B4E] mt-2">Báo cáo Kết quả: {{ $task->title }}</h1>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        <div class="lg:col-span-2 bg-white rounded-xl shadow-xs p-4 sm:p-6 border border-gray-100">
            <div class="mb-6">
                <h3 class="text-sm font-bold text-gray-500 uppercase">Mô tả công việc (Từ Account)</h3>
                <div class="mt-2 p-4 bg-gray-50 rounded-lg text-gray-800 whitespace-pre-wrap">{{ $task->description }}</div>
            </div>
            
            <form action="{{ route('superadmin.tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label class="block text-sm font-bold text-[#001B4E] mb-2">Báo cáo tiến độ / Link kết quả</label>
                    <textarea name="result_notes" rows="6" placeholder="Nhập link file, link design hoặc mô tả kết quả công việc đã làm..." required class="w-full rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 border px-4 py-2">{{ $task->result_notes }}</textarea>
                </div>
                
                <div class="mb-8 p-4 bg-blue-50 border border-blue-100 rounded-lg">
                    <label class="block text-sm font-bold text-blue-900 mb-2">Trạng thái hiện tại: {{ strtoupper($task->status) }}</label>
                    <div class="flex items-center gap-4">
                        <select name="status" class="w-full max-w-xs rounded-lg border-gray-300 focus:border-[#001B4E] focus:ring focus:ring-[#001B4E] focus:ring-opacity-50 border px-4 py-2">
                            <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>Cần làm</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>Đang làm</option>
                            <option value="review" {{ $task->status == 'review' ? 'selected' : '' }}>Nộp kết quả (Chờ duyệt)</option>
                        </select>
                        <button type="submit" class="px-6 py-2 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium">Cập nhật & Gửi</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Thông tin Task</h3>
            <div class="text-sm space-y-3 text-gray-600">
                <p><strong>Dự án:</strong> {{ $task->project->name ?? 'N/A' }}</p>
                <p><strong>Deadline:</strong> {{ $task->deadline ? $task->deadline->format('d/m/Y') : 'Không có' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection