@extends('superadmin.layouts.app')

@section('content')
<div class="px-1 sm:px-4 py-3 sm:py-8 max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4 sm:mb-6">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Deploy: {{ $project->name }}</h1>
        <a href="{{ route('superadmin.multi-tenancy.index') }}" class="text-blue-600 hover:underline text-xs sm:text-sm">
            &larr; Back to Multi-Tenancy
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
        <!-- Target Info -->
        <div class="bg-white shadow-xs rounded-xl p-4 sm:p-6 border border-gray-100">
            <h2 class="text-base sm:text-lg font-bold mb-4 border-b pb-2">Target Info</h2>
            <ul class="text-sm space-y-2">
                <li><span class="font-semibold text-gray-600">Profile:</span> {{ $profile->name }}</li>
                <li><span class="font-semibold text-gray-600">Panel:</span> {{ ucfirst($profile->panel_type) }}</li>
                <li><span class="font-semibold text-gray-600">Domain:</span> <a href="https://{{ $project->external_domain ?? $profile->domain }}" target="_blank" class="text-blue-500">{{ $project->external_domain ?? $profile->domain }}</a></li>
                <li><span class="font-semibold text-gray-600">Path:</span> {{ $profile->public_html_path }}</li>
                <li><span class="font-semibold text-gray-600">Last Deploy:</span> 
                    @if($latestHistory)
                        {{ $latestHistory->started_at->diffForHumans() }} 
                        <span class="text-xs px-2 py-1 rounded {{ $latestHistory->status == 'success' ? 'bg-green-100 text-green-800' : ($latestHistory->status == 'failed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($latestHistory->status) }}
                        </span>
                    @else
                        Never
                    @endif
                </li>
            </ul>
        </div>

        <!-- Deployment Progress -->
        <div class="md:col-span-2 bg-white shadow-md rounded p-6">
            <h2 class="text-lg font-bold mb-4 border-b pb-2 flex justify-between">
                <span>Deployment Logs</span>
                @if($latestHistory)
                    <span id="deploy-status" class="text-sm font-normal px-2 py-1 rounded {{ $latestHistory->status == 'running' ? 'bg-blue-100 text-blue-800 animate-pulse' : '' }}">
                        {{ ucfirst($latestHistory->status) }}
                    </span>
                @endif
            </h2>

            <div class="bg-gray-900 rounded p-4 h-96 overflow-y-auto font-mono text-sm shadow-inner" id="log-container">
                @if(!$latestHistory)
                    <div class="text-gray-500 italic">No deployment history found. Click "Start Deployment" to begin.</div>
                @else
                    <div class="text-gray-400 mb-2">--- Deployment started at {{ $latestHistory->started_at }} ---</div>
                    <ul id="log-list" class="space-y-1">
                        <!-- Logs will be loaded via JS -->
                        <li class="text-gray-500">Loading logs...</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

@if($latestHistory)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const historyId = {{ $latestHistory->id }};
        const logList = document.getElementById('log-list');
        const logContainer = document.getElementById('log-container');
        const statusBadge = document.getElementById('deploy-status');
        let currentStatus = '{{ $latestHistory->status }}';
        
        function formatTime(dateStr) {
            const d = new Date(dateStr);
            return `[${d.getHours().toString().padStart(2, '0')}:${d.getMinutes().toString().padStart(2, '0')}:${d.getSeconds().toString().padStart(2, '0')}]`;
        }

        function getLevelClass(level) {
            switch(level) {
                case 'error': return 'text-red-400';
                case 'success': return 'text-green-400';
                case 'warning': return 'text-yellow-400';
                default: return 'text-blue-300';
            }
        }

        function fetchLogs() {
            fetch(`/superadmin/hosting/deployments/${historyId}/logs`)
                .then(response => response.json())
                .then(data => {
                    logList.innerHTML = '';
                    
                    data.logs.forEach(log => {
                        const li = document.createElement('li');
                        li.className = 'flex';
                        li.innerHTML = `
                            <span class="text-gray-500 mr-2 shrink-0">${formatTime(log.logged_at)}</span>
                            <span class="font-bold mr-2 shrink-0 ${getLevelClass(log.level)}">${log.level.toUpperCase()}</span>
                            <span class="text-gray-300">${log.message}</span>
                        `;
                        logList.appendChild(li);
                    });
                    
                    // Auto scroll to bottom
                    logContainer.scrollTop = logContainer.scrollHeight;
                    
                    // Update status
                    if (data.status !== currentStatus) {
                        currentStatus = data.status;
                        statusBadge.textContent = currentStatus.charAt(0).toUpperCase() + currentStatus.slice(1);
                        
                        if (currentStatus === 'success') {
                            statusBadge.className = 'text-sm font-normal px-2 py-1 rounded bg-green-100 text-green-800';
                        } else if (currentStatus === 'failed') {
                            statusBadge.className = 'text-sm font-normal px-2 py-1 rounded bg-red-100 text-red-800';
                        }
                    }
                    
                    // If still running, poll again
                    if (currentStatus === 'running' || currentStatus === 'pending') {
                        setTimeout(fetchLogs, 2000);
                        
                        // Fire the queue processor in the background if not already fired
                        if (!window.queueProcessorFired) {
                            window.queueProcessorFired = true;
                            fetch(`/superadmin/hosting/deployments/${historyId}/run`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'application/json'
                                }
                            }).catch(err => console.error('Deployment execution failed:', err));
                        }
                    }
                });
        }
        
        fetchLogs();
    });
</script>
@endif
@endsection
