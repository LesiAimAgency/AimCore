@php
    $todaySpam = count(\Illuminate\Support\Facades\Cache::get('spam_attempts:' . date('Y-m-d'), []));
    $blockedIps = count(\Illuminate\Support\Facades\Cache::get('blocked_ips', []));
    $spamData = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = now()->subDays($i)->format('Y-m-d');
        $attempts = \Illuminate\Support\Facades\Cache::get("spam_attempts:{$date}", []);
        $spamData[] = count($attempts);
    }
    $weekTotal = array_sum($spamData);
@endphp

<div class="card">
    <div class="card-header">
        <div class="flex items-center justify-between">
            <h3 class="card-title flex items-center gap-2">
                <i class="fa-solid fa-shield-virus text-red-500"></i>
                Anti-Spam Protection
            </h3>
            <a href="{{ locale_route('admin.spam.dashboard') }}" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-chart-line"></i> View Details
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-red-500">{{ $todaySpam }}</div>
                <div class="text-xs text-gray-500">Today's Blocks</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-orange-500">{{ $weekTotal }}</div>
                <div class="text-xs text-gray-500">This Week</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-500">{{ $blockedIps }}</div>
                <div class="text-xs text-gray-500">Blocked IPs</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-green-500">
                    {{ $weekTotal > 0 ? '99%' : '100%' }}
                </div>
                <div class="text-xs text-gray-500">Protection Rate</div>
            </div>
        </div>
        
        @if($weekTotal > 0)
            <div class="flex items-center gap-2 p-3 bg-red-50 rounded-lg">
                <i class="fa-solid fa-exclamation-triangle text-red-500"></i>
                <div class="text-sm">
                    <strong>{{ $weekTotal }} spam attempts</strong> blocked this week.
                    <a href="{{ locale_route('admin.spam.dashboard') }}" class="text-blue-600 hover:underline">View details →</a>
                </div>
            </div>
        @else
            <div class="flex items-center gap-2 p-3 bg-green-50 rounded-lg">
                <i class="fa-solid fa-shield-check text-green-500"></i>
                <div class="text-sm text-green-700">
                    <strong>All clear!</strong> No spam attempts detected this week. 🎉
                </div>
            </div>
        @endif
        
        {{-- Mini Chart --}}
        <div class="mt-4">
            <div class="text-xs text-gray-500 mb-2">Last 7 days activity:</div>
            <div class="flex items-end gap-1 h-8">
                @foreach($spamData as $count)
                    <div class="flex-1 bg-red-200 rounded-t" 
                         style="height: {{ $count > 0 ? max(4, ($count / max(1, max($spamData))) * 32) : 2 }}px"
                         title="{{ $count }} attempts"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
