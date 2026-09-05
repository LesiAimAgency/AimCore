@extends('admin.layouts.app')

@section('title', 'Blocked IPs')
@section('page-title', 'Blocked IP Addresses')
@section('page-subtitle', 'Manage blocked IP addresses')

@section('page-actions')
    <div class="flex gap-2">
        <a href="{{ locale_route('admin.spam.dashboard') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
        @if(count($blockedIps) > 0)
            <button onclick="bulkExtendBlocks()" class="btn btn-secondary">
                <i class="fa-solid fa-clock"></i> Extend All
            </button>
            <button onclick="bulkUnblockIps()" class="btn btn-danger">
                <i class="fa-solid fa-unlock"></i> Unblock All
            </button>
        @endif
    </div>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-red-500 mb-2">{{ count($blockedIps) }}</div>
                <div class="text-sm text-gray-600">Total Blocked IPs</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-orange-500 mb-2">
                    {{ collect($blockedIps)->where('reason', 'Manual block')->count() }}
                </div>
                <div class="text-sm text-gray-600">Manual Blocks</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body text-center">
                <div class="text-3xl font-bold text-blue-500 mb-2">
                    {{ collect($blockedIps)->where('reason', '!=', 'Manual block')->count() }}
                </div>
                <div class="text-sm text-gray-600">Auto Blocks</div>
            </div>
        </div>
    </div>

    {{-- Manual Block Form --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Block New IP</h3>
        </div>
        <div class="card-body">
            <form id="blockIpForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="form-label">IP Address *</label>
                    <input type="text" id="blockIp" class="form-input" placeholder="192.168.1.100" required>
                </div>
                <div>
                    <label class="form-label">Duration (minutes) *</label>
                    <select id="blockDuration" class="form-select">
                        <option value="60">1 hour</option>
                        <option value="360">6 hours</option>
                        <option value="1440">1 day</option>
                        <option value="10080">7 days</option>
                        <option value="43200">30 days</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Reason</label>
                    <input type="text" id="blockReason" class="form-input" placeholder="Manual block">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="btn btn-danger w-full">
                        <i class="fa-solid fa-ban"></i> Block IP
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Blocked IPs Table --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Currently Blocked IPs</h3>
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
                                <th class="tbl-th">Expires At</th>
                                <th class="tbl-th">Time Remaining</th>
                                <th class="tbl-th">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blockedIps as $blocked)
                                <tr class="tbl-tr">
                                    <td class="tbl-td">
                                        <span class="font-mono">{{ $blocked['ip'] }}</span>
                                    </td>
                                    <td class="tbl-td">
                                        <span class="badge {{ str_contains($blocked['reason'], 'Manual') ? 'badge-orange' : 'badge-red' }}">
                                            {{ ucfirst(str_replace('_', ' ', $blocked['reason'])) }}
                                        </span>
                                    </td>
                                    <td class="tbl-td">
                                        {{ $blocked['blocked_at'] ? \Carbon\Carbon::parse($blocked['blocked_at'])->format('M j, Y H:i') : '-' }}
                                    </td>
                                    <td class="tbl-td">
                                        {{ $blocked['expires_at'] ? \Carbon\Carbon::parse($blocked['expires_at'])->format('M j, Y H:i') : '-' }}
                                    </td>
                                    <td class="tbl-td">
                                        @if($blocked['ttl_seconds'] > 0)
                                            <span class="font-mono text-sm">
                                                {{ gmdate('H:i:s', $blocked['ttl_seconds']) }}
                                            </span>
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
                <div class="text-center py-12 text-gray-500">
                    <i class="fa-solid fa-unlock text-5xl mb-4 text-green-500"></i>
                    <p class="text-lg">No IPs are currently blocked</p>
                    <p class="text-sm mt-2">All clear! 🎉</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Block IP form
document.getElementById('blockIpForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const ip = document.getElementById('blockIp').value;
    const duration = document.getElementById('blockDuration').value;
    const reason = document.getElementById('blockReason').value || 'Manual block';
    
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

// Unblock IP
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

// Auto refresh every 30 seconds
setInterval(() => {
    location.reload();
}, 30000);
</script>
@endpush

