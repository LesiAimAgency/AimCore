@extends('cms.layouts.app')

@section('title', 'Chi tiết Form liên hệ')
@section('page-title', 'Chi tiết Form liên hệ #' . $submission->id)

@section('content')
@php $projectCode = request()->route('projectCode'); @endphp

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('project.admin.form-submissions.index', $projectCode) }}" class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Quay lại danh sách
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden p-6">
        <div class="border-b pb-4 mb-4 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-gray-900">Form: {{ $submission->form_name ?? 'Liên hệ' }}</h2>
                <p class="text-xs text-gray-500 mt-1">Gửi lúc: {{ $submission->created_at ? $submission->created_at->format('d/m/Y H:i:s') : 'N/A' }} | IP: {{ $submission->ip_address ?? 'N/A' }}</p>
            </div>
            <div>
                @php
                    $sc = ['pending' => 'bg-yellow-100 text-yellow-800', 'approved' => 'bg-green-100 text-green-800', 'rejected' => 'bg-red-100 text-red-800'];
                    $sl = ['pending' => 'Chờ xử lý', 'approved' => 'Đã xử lý', 'rejected' => 'Từ chối'];
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $sc[$submission->status] ?? 'bg-gray-100 text-gray-700' }}">
                    {{ $sl[$submission->status] ?? $submission->status }}
                </span>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Thông tin gửi:</h3>
            <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                @if(is_array($submission->data))
                    @foreach($submission->data as $key => $val)
                        <div class="grid grid-cols-4 gap-4 text-sm">
                            <span class="font-medium text-gray-600 capitalize">{{ str_replace('_', ' ', $key) }}:</span>
                            <span class="col-span-3 text-gray-900 whitespace-pre-line">{{ is_array($val) ? json_encode($val, JSON_UNESCAPED_UNICODE) : $val }}</span>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500">{{ $submission->data }}</p>
                @endif
            </div>

            <div class="mt-6 border-t pt-6">
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4">Cập nhật trạng thái & Ghi chú</h3>
                <form method="POST" action="{{ route('project.admin.form-submissions.update-status', [$projectCode, $submission->id]) }}" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái xử lý</label>
                        <select name="status" class="w-full max-w-xs border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option value="pending" {{ $submission->status === 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="approved" {{ $submission->status === 'approved' ? 'selected' : '' }}>Đã xử lý</option>
                            <option value="rejected" {{ $submission->status === 'rejected' ? 'selected' : '' }}>Từ chối</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú nội bộ</label>
                        <textarea name="admin_note" rows="3" class="w-full border border-gray-300 rounded-lg p-3 text-sm" placeholder="Nhập ghi chú xử lý...">{{ old('admin_note', $submission->admin_note) }}</textarea>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                        Lưu cập nhật
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
