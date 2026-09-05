@extends('admin.layouts.app')

@section('title', 'Security Logs')
@section('page-title', 'Security Logs')
@section('page-subtitle', 'View and filter security events')

@section('page-actions')
    <a href="{{ locale_route('admin.spam.dashboard') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </a>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Filters --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Filters</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ locale_route('admin.spam.logs') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-input" value="{{ $date }}">
                </div>
                <div>
                    <label class="form-label">Threat Type</label>
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="sql_injection" {{ $type === 'sql_injection' ? 'selected' : '' }}>SQL Injection</option>
                        <option value="xss" {{ $type === 'xss' ? 'selected' : '' }}>XSS</option>
                        <option value="path_traversal" {{ $type === 'path_traversal' ? 'selected' : '' }}>Path Traversal</option>
                        <option value="command_injection" {{ $type === 'command_injection' ? 'selected' : '' }}>Command Injection</option>
                        <option value="bad_user_agent" {{ $type === 'bad_user_agent' ? 'selected' : '' }}>Bad User Agent</option>
                        <option value="path_probe" {{ $type === 'path_probe' ? 'selected' : '' }}>Path Probe</option>
                        <option value="honeypot_triggered" {{ $type === 'honeypot_triggered' ? 'selected' : '' }}>Honeypot</option>
                        <option value="spam_content" {{ $type === 'spam_content' ? 'selected' : '' }}>Spam Content</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">IP Address</label>
                    <input type="text" name="ip" class="form-input" value="{{ $ip }}" placeholder="192.168.1.100">
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="btn btn-primary flex-1">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
                    <a href="{{ locale_route('admin.spam.logs') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-times"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Clear Logs --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Log Management</h3>
        </div>
        <div class="card-body">
            <form id="clearLogsForm" class="flex items-end gap-4">
                <div>
                    <label class="form-label">Clear logs older than</label>
                    <select id="clearLogsDays" class="form-select">
                        <option value="7">7 days</option>
                        <option value="14">14 days</option>
                        <option value="30" selected>30 days</option>
                        <option value="60">60 days</option>
                        <option value="90">90 days</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i> Clear Old Logs
                </button>
            </form>
        </div>
    </div>

    {{-- Logs Display --}}
    <div class="card">
        <div class="card-header">
            <div class="flex items-center justify-between">
                <h3 class="card-title">Security Events ({{ count($logs) }} entries)</h3>
                <div class="text-sm text-gray-500">
                    Showing logs for {{ $date }}
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(count($logs) > 0)
                <div class="space-y-2 max-h-[600px] overflow-y-auto">
                    @foreach($logs as $log)
                        <div class="p-3 bg-gray-50 rounded-lg border-l-4 border-red-400 font-mono text-xs">
                            <pre class="whitespace-pre-wrap break-all">{{ $log }}</pre>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <i class="fa-solid fa-file-lines text-5xl mb-4"></i>
                    <p class="text-lg">No logs found for the selected filters</p>
                    <p class="text-sm mt-2">Try adjusting your filter criteria</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Clear logs form
document.getElementById('clearLogsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const days = document.getElementById('clearLogsDays').value;
    
    if (!confirm(`Clear all logs older than ${days} days? This cannot be undone.`)) {
        return;
    }
    
    fetch('{{ locale_route("admin.spam.clear-logs") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ days: parseInt(days) })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error: ' + error.message);
    });
});
</script>
@endpush

