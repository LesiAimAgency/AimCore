@extends('admin.layouts.app')

@section('title', 'Security Dashboard')
@section('page-title', 'Security & Anti-Spam Dashboard')
@section('page-subtitle', 'Monitor security threats and spam attempts')

@section('page-actions')
    <div class="flex gap-2">
        <a href="{{ locale_route('admin.spam.logs') }}" class="btn btn-secondary">
            <i class="fa-solid fa-file-lines"></i> View Logs
        </a>
        <a href="{{ locale_route('admin.spam.blocked-ips') }}" class="btn btn-secondary">
            <i class="fa-solid fa-ban"></i> Blocked IPs
        </a>
        <a href="{{ locale_route('admin.security.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-gear"></i> Settings
        </a>
    </div>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-red-500 mb-2">{{ $stats['today'] }}</div>
                <div class="text-sm text-gray-600">Today's Threats</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-orange-500 mb-2">{{ $stats['week'] }}</div>
                <div class="text-sm text-gray-600">This Week</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-blue-500 mb-2">{{ $stats['month'] }}</div>
                <div class="text-sm text-gray-600">This Month</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-purple-500 mb-2">{{ count($blockedIps) }}</div>
                <div class="text-sm text-gray-600">Blocked IPs</div>
            </div>
        </div>
    </div>

    {{-- Top Attack Types --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Attack Types</h3>
            </div>
            <div class="card-body">
                @if(count($topAttackTypes) > 0)
                    <div class="space-y-3">
                        @foreach($topAttackTypes as $type => $count)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <i class="fa-solid fa-shield-halved text-red-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-sm">{{ ucfirst(str_replace('_', ' ', $type)) }}</div>
                                        <div class="text-xs text-gray-500">{{ $count }} attempts</div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold text-red-500">{{ $count }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fa-solid fa-shield-check text-4xl mb-4 text-green-500"></i>
                        <p>No threats detected! 🎉</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Recent Attacks --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Security Events</h3>
            </div>
            <div class="card-body">
                @if(count($recentAttacks) > 0)
                    <div class="space-y-2 max-h-96 overflow-y-auto">
                        @foreach($recentAttacks as $attack)
                            <div class="flex items-start gap-3 p-2 text-sm border-l-4 border-red-200 bg-red-50">
                                <div class="text-xs text-gray-500 w-20">{{ $attack['timestamp'] }}</div>
                                <div class="flex-1">
                                    <div class="font-semibold">{{ $attack['message'] }}</div>
                                    <div class="text-xs text-gray-600 mt-1">{{ Str::limit($attack['context'], 100) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fa-solid fa-clock text-4xl mb-4"></i>
                        <p>No recent events</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Blocked IPs Management --}}
    <div class="card">
        <div class="card-header">
            <div class="flex items-center justify-between">
                <h3 class="card-title">Currently Blocked IPs</h3>
                @if(count($blockedIps) > 0)
                    <div class="flex gap-2">
                        <button onclick="bulkExtendBlocks()" class="btn btn-sm btn-secondary">
                            <i class="fa-solid fa-clock"></i> Extend All
                        </button>
                        <button onclick="bulkUnblockIps()" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-unlock"></i> Unblock All
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            @if(count($blockedIps) > 0)
                <div class="tbl-wrap">
                    <table style="width:100%;border-collapse:collapse;">
                        <thead class="tbl-head">
                            <tr>
                                <th class="tbl-th">IP Address</th>
                                <th class="tbl-th">Reason</th>
                                <th class="tbl-th">Blocked At</th>
                                <th class="tbl-th">Expires In</th>
                                <th class="tbl-th">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blockedIps as $blocked)
                                <tr class="tbl-tr">
                                    <td class="tbl-td font-mono">{{ $blocked['ip'] }}</td>
                                    <td class="tbl-td">
                                        <span class="badge badge-red">{{ ucfirst(str_replace('_', ' ', $blocked['reason'])) }}</span>
                                    </td>
                                    <td class="tbl-td">
                                        {{ $blocked['blocked_at'] ? \Carbon\Carbon::parse($blocked['blocked_at'])->format('M j, Y H:i') : '-' }}
                                    </td>
                                    <td class="tbl-td">
                                        @if($blocked['ttl_seconds'] > 0)
                                            {{ gmdate('H:i:s', $blocked['ttl_seconds']) }}
                                        @else
                                            <span class="text-gray-400">Expired</span>
                                        @endif
                                    </td>
                                    <td class="tbl-td">
                                        <button onclick="unblockIp('{{ $blocked['ip'] }}')" class="act-btn edit" title="Unblock">
                                            <i class="fa-solid fa-unlock"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fa-solid fa-unlock text-4xl mb-4 text-green-500"></i>
                    <p>No IPs are currently blocked</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Manual Block IP --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manual IP Block</h3>
        </div>
        <div class="card-body">
            <form id="manualBlockForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="form-label">IP Address</label>
                    <input type="text" id="manualBlockIp" class="form-input" placeholder="192.168.1.100" required>
                </div>
                <div>
                    <label class="form-label">Duration (minutes)</label>
                    <select id="manualBlockDuration" class="form-select">
                        <option value="60">1 hour</option>
                        <option value="360">6 hours</option>
                        <option value="1440">1 day</option>
                        <option value="10080">7 days</option>
                        <option value="43200">30 days</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Reason</label>
                    <input type="text" id="manualBlockReason" class="form-input" placeholder="Manual block">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="btn btn-danger w-full">
                        <i class="fa-solid fa-ban"></i> Block IP
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Manual block form
document.getElementById('manualBlockForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const ip = document.getElementById('manualBlockIp').value;
    const duration = document.getElementById('manualBlockDuration').value;
    const reason = document.getElementById('manualBlockReason').value || 'Manual block';
    
    fetch('{{ locale_route("admin.spam.block-ip") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ ip, duration, reason })
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

// Unblock IP function
function unblockIp(ip) {
    if (confirm(`Unblock IP ${ip}?`)) {
        fetch('{{ locale_route("admin.spam.unblock-ip") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ ip })
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
    }
}

// Bulk unblock all IPs
function bulkUnblockIps() {
    if (confirm('Unblock ALL IPs? This cannot be undone.')) {
        fetch('{{ locale_route("admin.spam.bulk-unblock-ips") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
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
    }
}

// Bulk extend blocks
function bulkExtendBlocks() {
    const minutes = prompt('Extend all blocks by how many minutes?', '60');
    if (minutes && parseInt(minutes) > 0) {
        fetch('{{ locale_route("admin.spam.bulk-extend-blocks") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ minutes: parseInt(minutes) })
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
    }
}

// Auto refresh every 60 seconds
setInterval(() => {
    location.reload();
}, 60000);
</script>
@endpush

