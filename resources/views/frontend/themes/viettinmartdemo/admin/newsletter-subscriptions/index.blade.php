@extends('admin.layouts.app')

@section('title', 'Đăng ký Newsletter')
@section('page-title', 'Đăng ký Newsletter')

@section('page-actions')
    <form method="GET" style="display: flex; gap: 10px; align-items: center;">
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Tìm theo email..." class="form-input" style="width: 200px;">
        
        <input type="date" name="date_from" value="{{ request('date_from') }}" 
               class="form-input" style="width: 140px;">
        
        <input type="date" name="date_to" value="{{ request('date_to') }}" 
               class="form-input" style="width: 140px;">
        
        <button type="submit" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-search"></i> Tìm
        </button>
        
        @if(request()->hasAny(['search', 'date_from', 'date_to']))
            <a href="{{ locale_route('admin.newsletter-subscriptions.index') }}" class="btn btn-ghost btn-sm">
                <i class="fa-solid fa-times"></i> Xóa bộ lọc
            </a>
        @endif
    </form>
    
    <a href="{{ locale_route('admin.newsletter-subscriptions.export', request()->all()) }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-download"></i> Xuất CSV
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="card-title">Danh sách đăng ký ({{ $subscriptions->total() }})</span>
            
            @if($subscriptions->count() > 0)
                <button type="button" class="btn btn-danger btn-sm" onclick="bulkDelete()">
                    <i class="fa-solid fa-trash"></i> Xóa đã chọn
                </button>
            @endif
        </div>
        
        <div class="card-body p-0">
            @if($subscriptions->count() > 0)
                <form id="bulkForm" method="POST" action="{{ locale_route('admin.newsletter-subscriptions.bulk-delete') }}">
                    @csrf
                    @method('DELETE')
                    
                    <div class="tbl-wrap">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead class="tbl-head">
                                <tr>
                                    <th class="tbl-th" style="width: 40px;">
                                        <input type="checkbox" id="selectAll" onchange="toggleAll(this)">
                                    </th>
                                    <th class="tbl-th">Email</th>
                                    <th class="tbl-th newsletter-ip-col" style="width: 150px;">IP Address</th>
                                    <th class="tbl-th" style="width: 150px;">Ngày đăng ký</th>
                                    <th class="tbl-th" style="width: 80px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr class="tbl-tr">
                                        <td class="tbl-td">
                                            <input type="checkbox" name="ids[]" value="{{ $subscription->id }}" class="row-checkbox">
                                        </td>
                                        <td class="tbl-td">
                                            <strong>{{ $subscription->data['email'] ?? 'N/A' }}</strong>
                                        </td>
                                        <td class="tbl-td newsletter-ip-col">
                                            <small style="color: #64748b;">{{ $subscription->ip_address }}</small>
                                        </td>
                                        <td class="tbl-td">
                                            <div style="font-size: 13px;">
                                                {{ $subscription->created_at->format('d/m/Y H:i') }}
                                                <br>
                                                <small style="color: #64748b;">{{ $subscription->created_at->diffForHumans() }}</small>
                                            </div>
                                        </td>
                                        <td class="tbl-td">
                                            <form method="POST" action="{{ locale_route('admin.newsletter-subscriptions.destroy', $subscription) }}" 
                                                  style="display: inline;" onsubmit="return confirm('Xác nhận xóa đăng ký này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="act-btn del" title="Xóa">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                
                <div style="padding: 20px;">
                    {{ $subscriptions->withQueryString()->links() }}
                </div>
            @else
                <div style="text-align: center; padding: 40px;">
                    <i class="fa-solid fa-envelope" style="font-size: 48px; color: #94a3b8; margin-bottom: 15px;"></i>
                    <p style="color: #64748b;">
                        @if(request()->hasAny(['search', 'date_from', 'date_to']))
                            Không tìm thấy đăng ký nào phù hợp với bộ lọc.
                        @else
                            Chưa có đăng ký newsletter nào.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
function toggleAll(checkbox) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(cb => cb.checked = checkbox.checked);
}

function bulkDelete() {
    const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
    if (checkedBoxes.length === 0) {
        alert('Vui lòng chọn ít nhất một đăng ký để xóa.');
        return;
    }
    
    if (confirm(`Xác nhận xóa ${checkedBoxes.length} đăng ký đã chọn?`)) {
        document.getElementById('bulkForm').submit();
    }
}
</script>
@endpush

@push('styles')
<style>
/* Responsive table for newsletter subscriptions */
@media (max-width: 768px) {
    .newsletter-ip-col {
        display: none;
    }
    .tbl-td {
        padding: 8px 12px !important;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .tbl-wrap {
        overflow-x: auto;
    }
    .act-btn {
        width: 24px !important;
        height: 24px !important;
        font-size: 10px !important;
    }
}

/* Fix button display issues */
.act-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
}

.act-btn i {
    display: block !important;
}
</style>
@endpush
