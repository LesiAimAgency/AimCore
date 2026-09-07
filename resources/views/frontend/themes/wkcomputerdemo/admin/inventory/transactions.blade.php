@extends('admin.layouts.app')
@section('title', 'Lịch sử giao dịch kho')
@section('page-title', 'Lịch sử giao dịch')
@section('page-subtitle', 'Toàn bộ biến động kho hàng')
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.index') }}" class="btn btn-ghost btn-sm">
        <i class="fa-solid fa-warehouse"></i> Tổng quan kho
    </a>
@endsection

@section('content')

{{-- Bộ lọc --}}
<div class="card" style="margin-bottom:16px;">
    <div class="card-body" style="padding:14px;">
        <form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
            <select name="product_id" class="form-select" style="max-width:220px;">
                <option value="">-- Tất cả sản phẩm --</option>
                @foreach($products as $p)
                <option value="{{ $p->id }}" {{ request('product_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
                @endforeach
            </select>
            <select name="type" class="form-select" style="max-width:160px;">
                <option value="">-- Tất cả loại --</option>
                <option value="stock_in"   {{ request('type') === 'stock_in'   ? 'selected' : '' }}>Nhập hàng</option>
                <option value="stock_out"  {{ request('type') === 'stock_out'  ? 'selected' : '' }}>Bán hàng</option>
                <option value="damaged"    {{ request('type') === 'damaged'    ? 'selected' : '' }}>Hàng huỷ</option>
                <option value="adjustment" {{ request('type') === 'adjustment' ? 'selected' : '' }}>Điều chỉnh</option>
            </select>
            <button type="submit" class="btn btn-ghost btn-sm">
                <i class="fa-solid fa-filter"></i> Lọc
            </button>
            <a href="{{ locale_route('admin.inventory.transactions') }}" class="btn btn-ghost btn-sm">Xoá lọc</a>
        </form>
    </div>
</div>

<div class="card">
    <div class="tbl-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Loại</th>
                    <th>Sản phẩm</th>
                    <th>Quy cách</th>
                    <th style="text-align:right;">Số lượng</th>
                    <th style="text-align:right;">Trước</th>
                    <th style="text-align:right;">Sau</th>
                    <th>Ghi chú</th>
                    <th>Người tạo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $tx)
                @php
                    $badgeClass = match($tx->type) {
                        'stock_in'   => 'badge-blue',
                        'stock_out'  => 'badge-green',
                        'damaged'    => 'badge-red',
                        'adjustment' => 'badge-purple',
                        default      => 'badge-gray',
                    };
                @endphp
                <tr>
                    <td style="font-size:12px;color:#64748b;white-space:nowrap;">
                        {{ $tx->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td>
                        <span class="badge {{ $badgeClass }}">{{ $tx->type_label }}</span>
                    </td>
                    <td style="font-weight:600;">{{ $tx->product->name }}</td>
                    <td><span class="badge badge-gray">{{ $tx->unit }}</span></td>
                    <td style="text-align:right;font-weight:700;
                        color:{{ $tx->quantity >= 0 ? '#2563eb' : '#dc2626' }};">
                        {{ $tx->quantity >= 0 ? '+' : '' }}{{ number_format($tx->quantity) }}
                    </td>
                    <td style="text-align:right;color:#94a3b8;">{{ number_format($tx->stock_before) }}</td>
                    <td style="text-align:right;font-weight:600;">{{ number_format($tx->stock_after) }}</td>
                    <td style="font-size:12px;color:#64748b;max-width:200px;">
                        {{ Str::limit($tx->notes, 50) }}
                    </td>
                    <td style="font-size:12px;">{{ $tx->creator?->name ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center;color:#94a3b8;padding:60px 0;">
                        <i class="fa-solid fa-clock-rotate-left" style="font-size:2.5rem;display:block;margin-bottom:12px;opacity:.3;"></i>
                        Chưa có giao dịch nào.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($transactions->hasPages())
        <div style="padding:16px;">{{ $transactions->links() }}</div>
    @endif
</div>

@endsection
