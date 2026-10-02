@extends('cms.layouts.app')

@section('title', 'Tương tác & Tin nhắn - eHenho')
@section('page-title', 'Nhật Ký Tương Tác & Kết Nối')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="p-6 max-w-7xl mx-auto space-y-6">
    <!-- Stat row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Tổng kết nối</p>
                <p class="text-2xl font-black text-slate-900 mt-1">{{ number_format($totalConnections ?? 0) }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                <i class="fa-solid fa-heart"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Lượt Thích</p>
                <p class="text-2xl font-black text-pink-600 mt-1">{{ number_format($totalLikes ?? 0) }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center">
                <i class="fa-solid fa-thumbs-up"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Cuộc trò chuyện</p>
                <p class="text-2xl font-black text-indigo-600 mt-1">{{ number_format($totalConversations ?? 0) }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <i class="fa-solid fa-comments"></i>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Lượt Chặn (Block)</p>
                <p class="text-2xl font-black text-red-600 mt-1">{{ number_format($totalBlocks ?? 0) }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
        </div>
    </div>

    <!-- Connections Table -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-sm font-bold text-slate-900">
                Lịch sử Tương tác Gần đây
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Người thực hiện (User ID)</th>
                        <th class="py-3 px-4">Loại tương tác</th>
                        <th class="py-3 px-4">Đối tượng nhận (Target ID)</th>
                        <th class="py-3 px-4">Thời gian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($connections as $conn)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4 font-mono text-slate-400">#{{ $conn->id }}</td>
                        <td class="py-3 px-4 font-bold text-slate-800">User ID: {{ $conn->user_id }}</td>
                        <td class="py-3 px-4">
                            @if($conn->type === 'block')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-100 text-red-700">Chặn (Block)</span>
                            @elseif($conn->type === 'like')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-pink-100 text-pink-700">Thích (Like)</span>
                            @elseif($conn->type === 'match')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-100 text-purple-700">Ghép đôi (Match)</span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700">{{ $conn->type }}</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-slate-600">Profile / Target ID: {{ $conn->target_id ?? $conn->connected_user_id }}</td>
                        <td class="py-3 px-4 text-slate-400">{{ $conn->created_at?->diffForHumans() ?? 'Vừa xong' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-8 text-slate-400">
                            Chưa có tương tác nào được ghi nhận.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($connections->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $connections->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
