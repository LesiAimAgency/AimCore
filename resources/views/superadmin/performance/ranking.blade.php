@extends('superadmin.layouts.app')

@section('title', 'Bảng Xếp Hạng Năng Suất')

@push('scripts')
<style>
    .podium-1 { height: 120px; }
    .podium-2 { height: 90px; }
    .podium-3 { height: 70px; }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }
    
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
</style>
@endpush

@section('content')
<div class="space-y-12 pb-12">
    <!-- Header Section with Glassmorphism -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#001B4E] to-[#002D80] p-8 shadow-2xl animate-fade-in-up">
        <div class="absolute top-0 right-0 -mt-16 -mr-16 text-white opacity-5">
            <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13.5h-13L12 6.5z"/></svg>
        </div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-white">
                <h1 class="text-4xl font-black tracking-tight mb-2 flex items-center gap-3">
                    <svg class="w-10 h-10 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Bảng Xếp Hạng Năng Suất
                </h1>
                <p class="text-blue-200 text-lg">Vinh danh những cá nhân có thành tích xuất sắc nhất</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md p-2 rounded-xl border border-white/20 flex items-center gap-2">
                <svg class="w-5 h-5 text-white ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <form method="GET" action="{{ route('superadmin.performance.ranking') }}" class="flex items-center">
                    <select name="period" onchange="this.form.submit()" class="bg-transparent text-white font-medium focus:ring-0 border-none cursor-pointer text-lg px-2 py-2">
                        <option class="text-gray-900" value="week" {{ $period === 'week' ? 'selected' : '' }}>Tuần này</option>
                        <option class="text-gray-900" value="month" {{ $period === 'month' ? 'selected' : '' }}>Tháng này</option>
                        <option class="text-gray-900" value="year" {{ $period === 'year' ? 'selected' : '' }}>Năm nay</option>
                        <option class="text-gray-900" value="all" {{ $period === 'all' ? 'selected' : '' }}>Tất cả thời gian</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <!-- Podium Section (Top 3) -->
    @if($top3->count() >= 3)
    <div class="flex justify-center items-end h-80 gap-4 md:gap-8 px-4 mt-16">
        <!-- Rank 2 -->
        @php $user2 = $top3->values()->get(1); @endphp
        @if($user2)
        <div class="flex flex-col items-center animate-fade-in-up delay-100 w-1/3 max-w-[200px]">
            <div class="relative mb-4 group cursor-pointer transition-transform duration-300 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gray-400 rounded-full blur-md opacity-50 group-hover:opacity-100 transition-opacity"></div>
                <img src="{{ $user2->avatar ? asset('storage/'.$user2->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user2->name) }}" class="relative w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-gray-300 shadow-xl z-10">
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-br from-gray-300 to-gray-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-black text-sm shadow-lg border-2 border-white z-20">2</div>
            </div>
            <div class="text-center mb-4">
                <h3 class="font-bold text-gray-800 dark:text-gray-200 truncate w-24 md:w-full">{{ $user2->name }}</h3>
                <p class="text-xs font-semibold text-gray-500">{{ $user2->approved_tasks_count }} Tasks</p>
            </div>
            <div class="w-full bg-gradient-to-t from-gray-300 to-gray-100 dark:from-zinc-700 dark:to-zinc-600 rounded-t-lg podium-2 shadow-inner border-t-2 border-gray-300 flex justify-center pt-4">
                <span class="text-3xl opacity-30 font-black">2</span>
            </div>
        </div>
        @endif

        <!-- Rank 1 -->
        @php $user1 = $top3->values()->get(0); @endphp
        @if($user1)
        <div class="flex flex-col items-center animate-fade-in-up w-1/3 max-w-[220px]">
            <div class="animate-float relative mb-4 group cursor-pointer">
                <div class="absolute inset-0 bg-yellow-400 rounded-full blur-lg opacity-60 group-hover:opacity-100 transition-opacity"></div>
                <!-- Crown icon -->
                <svg class="absolute -top-8 left-1/2 -translate-x-1/2 w-10 h-10 text-yellow-400 drop-shadow-md z-30" fill="currentColor" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                
                <img src="{{ $user1->avatar ? asset('storage/'.$user1->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user1->name) }}" class="relative w-28 h-28 md:w-32 md:h-32 rounded-full object-cover border-4 border-yellow-400 shadow-2xl z-10">
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-gradient-to-br from-yellow-300 to-yellow-600 text-white w-10 h-10 rounded-full flex items-center justify-center font-black text-lg shadow-lg border-2 border-white z-20">1</div>
            </div>
            <div class="text-center mb-4">
                <h3 class="font-black text-lg text-gray-900 dark:text-gray-100 truncate w-32 md:w-full">{{ $user1->name }}</h3>
                <p class="text-sm font-bold text-yellow-600 dark:text-yellow-400">{{ $user1->approved_tasks_count }} Tasks Đã Duyệt</p>
            </div>
            <div class="w-full bg-gradient-to-t from-yellow-500 to-yellow-200 dark:from-yellow-700 dark:to-yellow-500 rounded-t-lg podium-1 shadow-[0_-10px_20px_rgba(250,204,21,0.3)] border-t-2 border-yellow-300 flex justify-center pt-4">
                <span class="text-5xl opacity-40 font-black text-white">1</span>
            </div>
        </div>
        @endif

        <!-- Rank 3 -->
        @php $user3 = $top3->values()->get(2); @endphp
        @if($user3)
        <div class="flex flex-col items-center animate-fade-in-up delay-200 w-1/3 max-w-[200px]">
            <div class="relative mb-4 group cursor-pointer transition-transform duration-300 hover:-translate-y-2">
                <div class="absolute inset-0 bg-amber-700 rounded-full blur-md opacity-50 group-hover:opacity-100 transition-opacity"></div>
                <img src="{{ $user3->avatar ? asset('storage/'.$user3->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user3->name) }}" class="relative w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-amber-600 shadow-xl z-10">
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-br from-amber-500 to-amber-700 text-white w-8 h-8 rounded-full flex items-center justify-center font-black text-sm shadow-lg border-2 border-white z-20">3</div>
            </div>
            <div class="text-center mb-4">
                <h3 class="font-bold text-gray-800 dark:text-gray-200 truncate w-24 md:w-full">{{ $user3->name }}</h3>
                <p class="text-xs font-semibold text-gray-500">{{ $user3->approved_tasks_count }} Tasks</p>
            </div>
            <div class="w-full bg-gradient-to-t from-amber-800 to-amber-600 dark:from-amber-900 dark:to-amber-800 rounded-t-lg podium-3 shadow-inner border-t-2 border-amber-500 flex justify-center pt-4">
                <span class="text-3xl opacity-30 font-black text-white">3</span>
            </div>
        </div>
        @endif
    </div>
    @elseif($top3->count() > 0)
    <!-- Fallback if less than 3 people -->
    <div class="flex justify-center gap-6 animate-fade-in-up delay-100">
        @foreach($top3 as $index => $user)
            <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl p-6 flex flex-col items-center border {{ $index === 0 ? 'border-yellow-400 shadow-[0_0_20px_rgba(250,204,21,0.2)] transform scale-110' : 'border-gray-200' }} transition-transform hover:-translate-y-2">
                <!-- Similar logic as old view but cleaner -->
                <div class="relative mb-4">
                    <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" class="w-24 h-24 rounded-full object-cover border-4 {{ $index === 0 ? 'border-yellow-400' : 'border-gray-200' }}">
                    <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full flex items-center justify-center font-bold text-white
                        {{ $index === 0 ? 'bg-gradient-to-br from-yellow-300 to-yellow-600' : 'bg-gray-400' }} border-2 border-white shadow-lg">
                        {{ $index + 1 }}
                    </div>
                </div>
                <h3 class="font-bold text-xl text-zinc-900 dark:text-zinc-100">{{ $user->name }}</h3>
                <p class="text-sm text-zinc-500">{{ $user->department }}</p>
                <div class="mt-4 text-center">
                    <span class="text-3xl font-black {{ $index === 0 ? 'text-yellow-600' : 'text-indigo-600' }}">{{ $user->approved_tasks_count }}</span>
                    <span class="text-sm text-zinc-500 block">Tasks Hoàn Thành</span>
                </div>
            </div>
        @endforeach
    </div>
    @endif

    @if($others->count() > 0)
    <!-- Leaderboard List for Others -->
    <div class="max-w-4xl mx-auto animate-fade-in-up delay-300">
        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Bảng Xếp Hạng Chung
        </h3>
        <div class="space-y-3">
            @foreach($others as $index => $user)
                <div class="group bg-white dark:bg-zinc-800 rounded-xl p-4 flex items-center justify-between shadow-sm hover:shadow-md border border-gray-100 dark:border-zinc-700 transition-all duration-300 hover:border-indigo-300 hover:scale-[1.01] cursor-pointer">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-gray-100 dark:bg-zinc-700 flex items-center justify-center font-black text-gray-400 group-hover:text-indigo-500 group-hover:bg-indigo-50 transition-colors">
                            {{ $index + 4 }}
                        </div>
                        <img class="h-12 w-12 rounded-full object-cover border-2 border-white shadow-sm" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" alt="">
                        <div>
                            <div class="text-base font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 transition-colors">{{ $user->name }}</div>
                            <div class="text-xs text-gray-500 font-medium">{{ $user->department }}</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-6">
                        <div class="text-right">
                            <div class="text-2xl font-black text-indigo-600 dark:text-indigo-400">{{ $user->approved_tasks_count }}</div>
                            <div class="text-[10px] uppercase font-bold tracking-wider text-gray-400">Tasks</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
    
    @if($top3->isEmpty() && $others->isEmpty())
    <div class="text-center py-20 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-dashed border-gray-300 dark:border-zinc-700">
        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Chưa có dữ liệu</h3>
        <p class="text-gray-500 mt-1">Chưa có công việc nào được duyệt trong khoảng thời gian này.</p>
    </div>
    @endif
</div>
@endsection
