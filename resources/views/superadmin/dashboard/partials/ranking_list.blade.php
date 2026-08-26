@if(count($ranking) > 0)
    <div class="space-y-4">
        @foreach($ranking as $index => $emp)
            @php
                if($index == 0) {
                    $bgClass = 'bg-yellow-50 border-yellow-300';
                    $circleClass = 'bg-gradient-to-r from-yellow-300 to-yellow-500 text-white shadow-md';
                    $textClass = 'text-yellow-900 font-bold text-lg';
                    $medalIcon = '🥇';
                } elseif($index == 1) {
                    $bgClass = 'bg-slate-50 border-slate-300';
                    $circleClass = 'bg-gradient-to-r from-slate-300 to-slate-500 text-white shadow-md';
                    $textClass = 'text-slate-900 font-bold text-lg';
                    $medalIcon = '🥈';
                } elseif($index == 2) {
                    $bgClass = 'bg-orange-50 border-orange-300';
                    $circleClass = 'bg-gradient-to-r from-orange-300 to-orange-500 text-white shadow-md';
                    $textClass = 'text-orange-900 font-bold text-lg';
                    $medalIcon = '🥉';
                } else {
                    $bgClass = 'bg-white border-gray-100';
                    $circleClass = 'bg-gray-100 text-gray-500';
                    $textClass = 'text-gray-700 font-medium';
                    $medalIcon = '';
                }
            @endphp
            <div class="p-3 rounded-xl border flex justify-between items-center {{ $bgClass }} transition-transform hover:scale-[1.02]">
                <div class="flex items-center">
                    <span class="w-10 h-10 rounded-full flex items-center justify-center font-black mr-3 {{ $circleClass }}">
                        {{ $index + 1 }}
                    </span>
                    <div>
                        <p class="flex items-center {{ $textClass }}">
                            {{ $emp['name'] }}
                            @if($medalIcon)
                                <span class="ml-2 text-2xl drop-shadow-md" title="Top {{ $index + 1 }}">{{ $medalIcon }}</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold {{ $index < 3 ? 'bg-white shadow-sm border text-gray-800' : 'bg-gray-100 text-gray-600' }}">
                        {{ $emp['completed_tasks'] }} tasks
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-500 text-center py-4">Chưa có dữ liệu xếp hạng.</p>
@endif
