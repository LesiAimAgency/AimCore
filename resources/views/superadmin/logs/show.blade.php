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

    <div class="bg-gray-900 rounded-lg shadow-sm overflow-hidden">
        <div class="px-4 py-3 bg-gray-800 border-b border-gray-700 flex justify-between items-center">
            <span class="text-xs font-mono text-gray-300">{{ $filename }}</span>
            <span class="text-xs font-mono text-gray-500">{{ number_format(strlen($content) / 1024, 2) }} KB</span>
        </div>
        <div class="p-4 overflow-x-auto">
            <pre class="text-sm font-mono text-gray-300 whitespace-pre-wrap leading-relaxed">{{ $content }}</pre>
            @if(empty(trim($content)))
                <div class="text-gray-500 text-center py-8 italic">File log trống. Chưa có lịch sử hoạt động nào được ghi lại.</div>
            @endif
        </div>
    </div>
</div>
@endsection
