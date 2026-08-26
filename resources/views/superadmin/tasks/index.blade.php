@extends('superadmin.layouts.app')
@section('title', 'Quản lý Tasks | Super Admin')
@section('page-title', 'Quản lý Tasks (Công việc)')

@section('content')
<div class="px-1 sm:px-6 py-3 sm:py-8 w-full max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 sm:mb-6 gap-3 sm:gap-4">
        <div>
            <h1 class="text-xl sm:text-3xl font-bold text-[#001B4E]">Bảng Kanban Tasks</h1>
            <p class="text-gray-500 text-xs sm:text-sm mt-0.5 sm:mt-1">Quản lý, phân công và theo dõi tiến độ công việc</p>
        </div>
        @if(auth()->user()->hasRole('account') || auth()->user()->isSuperAdmin())
        <div>
            <a href="{{ route('superadmin.tasks.create') }}" class="w-full sm:w-auto justify-center px-4 sm:px-6 py-2 sm:py-2.5 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium inline-flex items-center transition-colors shadow-xs text-xs sm:text-sm">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tạo Task Giao Dev
            </a>
        </div>
        @endif
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Kanban Style Columns (Interactive) -->
    <livewire:superadmin.tasks.kanban-board />
</div>
@endsection