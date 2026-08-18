@extends('superadmin.layouts.app')

@section('title', 'Bảng Vàng (Gold Ranking)')

@push('scripts')
<style>
    @keyframes shine {
        0% { background-position: 200% center; }
        100% { background-position: -200% center; }
    }
    .animate-shine {
        background: linear-gradient(120deg, #ca8a04 20%, #fef08a 30%, #eab308 40%, #ca8a04 50%);
        background-size: 200% auto;
        animation: shine 3s linear infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .dark .glass-card {
        background: rgba(39, 39, 42, 0.7);
        border: 1px solid rgba(63, 63, 70, 0.5);
    }
</style>
@endpush

@section('content')
<div class="space-y-10 pb-12">
    <!-- Header Hero -->
    <div class="relative overflow-hidden rounded-3xl bg-[#001B4E] shadow-2xl p-10 md:p-16 flex flex-col items-center text-center">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fbbf24 2px, transparent 2px); background-size: 30px 30px;"></div>
        
        <!-- Glowing Orb -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#002D80] rounded-full blur-[120px] opacity-40 pointer-events-none"></div>

        <div class="relative z-10 flex flex-col items-center">
            <svg class="w-20 h-20 text-yellow-400 mb-6 animate-float drop-shadow-[0_0_15px_rgba(250,204,21,0.5)]" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 13H8V8h1v5zm2 0h-1V8h1v5zm2 0h-1V8h1v5z"/>
            </svg>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight uppercase animate-shine drop-shadow-sm mb-4">
                Bảng Vàng Danh Dự
            </h1>
            <p class="text-blue-200 text-lg md:text-xl max-w-2xl">
                Vinh danh những cá nhân xuất sắc nhất, tích lũy được nhiều Gold thưởng qua các dự án và cống hiến vượt trội.
            </p>
        </div>
    </div>

    <!-- Gold Ranking Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($ranking as $index => $user)
            <div class="glass-card rounded-2xl shadow-lg p-8 flex flex-col items-center transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-yellow-500/10 group relative overflow-hidden">
                
                <!-- Rank Badge -->
                @if($index < 3)
                    <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-yellow-300 to-yellow-600 shadow-md transform translate-x-4 -translate-y-4 rotate-45 flex items-end justify-center pb-2 z-10">
                        <span class="text-yellow-900 font-black transform -rotate-45 block text-lg">#{{ $index + 1 }}</span>
                    </div>
                @else
                    <div class="absolute top-4 right-4 bg-zinc-200 dark:bg-zinc-700 text-zinc-500 dark:text-zinc-400 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">
                        {{ $index + 1 }}
                    </div>
                @endif

                <div class="relative mb-6">
                    <div class="absolute inset-0 bg-yellow-400 rounded-full blur-md opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>
                    <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" class="relative w-28 h-28 rounded-full object-cover border-4 {{ $index < 3 ? 'border-yellow-400' : 'border-zinc-200 dark:border-zinc-600' }} shadow-xl z-10 transition-transform duration-500 group-hover:scale-105">
                </div>
                
                <h3 class="font-bold text-xl text-zinc-900 dark:text-zinc-100 group-hover:text-yellow-600 transition-colors">{{ $user->name }}</h3>
                <p class="text-sm font-medium text-zinc-500 mb-6">{{ $user->department ?? 'Chưa cập nhật' }}</p>
                
                <div class="mt-auto flex items-center gap-2 bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 border border-yellow-200 dark:border-yellow-700/50 px-6 py-3 rounded-xl w-full justify-center group-hover:border-yellow-400 transition-colors">
                    <span class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-amber-600 dark:from-yellow-400 dark:to-amber-500">{{ number_format($user->gold) }}</span>
                    <span class="text-sm font-bold text-yellow-700 dark:text-yellow-500 uppercase tracking-widest mt-1">Gold</span>
                </div>
            </div>
        @endforeach

        @if($ranking->isEmpty())
            <div class="col-span-full flex flex-col items-center justify-center py-20 bg-zinc-50 dark:bg-zinc-800/50 rounded-3xl border border-dashed border-zinc-300 dark:border-zinc-700">
                <svg class="w-16 h-16 text-zinc-300 dark:text-zinc-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="text-xl font-bold text-zinc-700 dark:text-zinc-300">Hòm Vàng Trống Rỗng</h3>
                <p class="text-zinc-500 mt-2">Chưa có thành viên nào kiếm được điểm Gold.</p>
            </div>
        @endif
    </div>
</div>
@endsection
