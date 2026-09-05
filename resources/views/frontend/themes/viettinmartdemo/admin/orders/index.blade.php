@extends('admin.layouts.app')
@section('title', 'Quản lý đơn hàng')
@section('page-title', 'Đơn hàng')
@section('page-subtitle', 'Theo dõi và xử lý tất cả đơn hàng hệ thống')

@section('page-actions')
<div style="display:flex;gap:12px;align-items:center;">
    <span style="font-size:12px;color:#64748b; font-weight:600;">
        Tổng: <strong style="color:#0f172a;">{{ $orders->total() }}</strong> đơn
    </span>
    <a href="{{ locale_route('admin.orders.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tạo đơn mới
    </a>
</div>
@endsection

@section('content')

{{-- Filters --}}
<div class="card" style="padding:16px 20px;margin-bottom:20px; border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
    <form method="GET" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;">
        <div style="position:relative;flex:1;min-width:240px;">
            <i class="fa-solid fa-magnifying-glass" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;"></i>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Tìm mã đơn, tên, SĐT..."
                   class="form-input" style="padding-left:36px; border-radius:10px; height:40px;">
        </div>
        <select name="status" class="form-select" style="width:160px; border-radius:10px; height:40px;">
            <option value="">Trạng thái đơn</option>
            @foreach($statuses as $key => $s)
            <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
            @endforeach
        </select>
        <select name="payment_status" class="form-select" style="width:160px; border-radius:10px; height:40px;">
            <option value="">Thanh toán</option>
            @foreach($paymentStatuses as $key => $s)
            <option value="{{ $key }}" {{ request('payment_status') === $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary" style="height:40px; border-radius:10px; padding:0 20px;">
            <i class="fa-solid fa-filter"></i> Lọc
        </button>
        @if(request()->hasAny(['search','status','payment_status']))
            <a href="{{ locale_route('admin.orders.index') }}" class="btn btn-secondary" style="height:40px; border-radius:10px; display:flex; align-items:center;">
                <i class="fa-solid fa-xmark"></i> Xóa lọc
            </a>
        @endif
        
        <a href="{{ locale_route('admin.orders.trash') }}" class="btn btn-ghost" style="height:40px; margin-left:auto;" title="Thùng rác">
            <i class="fa-solid fa-trash-can text-slate-400"></i>
        </a>
    </form>
</div>

{{-- Table --}}
<div class="card overflow-hidden" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:separate;border-spacing:0;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Mã đơn</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Khách hàng</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Đại lý</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Sản phẩm</th>
                    <th class="tbl-th" style="text-align:right; padding:16px; border-bottom:1px solid #f1f5f9;">Tổng tiền</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">Trạng thái</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;">checkout</th>
                    <th class="tbl-th" style="padding:16px; border-bottom:1px solid #f1f5f9;">Ngày đặt</th>
                    <th class="tbl-th" style="text-align:center; padding:16px; border-bottom:1px solid #f1f5f9;"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="tbl-tr">
                    <td class="tbl-td" style="padding:16px;">
                        <a href="{{ locale_route('admin.orders.show', $order) }}"
                           style="font-size:13px;font-weight:800;color:#2563eb;text-decoration:none;font-family:'Monaco', 'Consolas', monospace;" class="hover:underline">
                            #{{ $order->order_number }}
                        </a>
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        <p style="font-size:14px;font-weight:700;color:#1e293b;margin-bottom:2px;">{{ $order->customer_name }}</p>
                        <p style="font-size:11px;color:#94a3b8;display:flex;align-items:center;gap:4px;">
                            <i class="fa-solid fa-phone" style="font-size:10px;"></i> {{ $order->customer_phone }}
                        </p>
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        @if($order->agent)
                            <div style="display:flex; align-items:center; gap:8px;">
                                <div style="width:24px; height:24px; border-radius:6px; background:#eff6ff; display:flex; align-items:center; justify-content:center;">
                                    <i class="fa-solid fa-handshake" style="font-size:10px; color:#3b82f6;"></i>
                                </div>
                                <span style="font-size:12.5px; font-weight:600; color:#475569;">{{ $order->agent->name }}</span>
                            </div>
                        @else
                            <span style="font-size:12px;color:#cbd5e1; font-style:italic;">Chưa gán</span>
                        @endif
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        <div style="display:inline-flex; align-items:center; gap:6px; background:#f1f5f9; padding:4px 10px; border-radius:8px;">
                            <i class="fa-solid fa-boxes-stacked" style="font-size:11px; color:#64748b;"></i>
                            <span style="font-size:12px; font-weight:700; color:#475569;">{{ $order->items_count ?: $order->items->count() }}</span>
                        </div>
                    </td>
                    <td class="tbl-td" style="text-align:right; padding:16px;">
                        <span style="font-size:14px; font-weight:800; color:#0f172a;">
                            {{ number_format($order->total, 0, ',', '.') }}₫
                        </span>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        @php $sc = $order->status_color; @endphp
                        <span class="badge badge-{{ $sc }}" style="border-radius:20px; padding:4px 12px; font-size:10.5px; font-weight:700;">{{ $order->status_label }}</span>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        @php $pc = \App\Models\Order::$paymentStatuses[$order->payment_status]['color'] ?? 'gray'; @endphp
                        <span class="badge badge-{{ $pc }}" style="border-radius:20px; padding:4px 12px; font-size:10.5px; font-weight:700;">{{ $order->payment_status_label }}</span>
                    </td>
                    <td class="tbl-td" style="padding:16px;">
                        <span style="font-size:12.5px;color:#475569; font-weight:600;">{{ $order->created_at->format('d/m/Y') }}</span>
                        <span style="font-size:10px;color:#94a3b8;display:block;">{{ $order->created_at->format('H:i') }}</span>
                    </td>
                    <td class="tbl-td" style="text-align:center; padding:16px;">
                        <a href="{{ locale_route('admin.orders.show', $order) }}" class="act-btn view" style="width:34px; height:34px; border-radius:10px;">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center;padding:80px;color:#94a3b8;">
                        <div style="width:64px;height:64px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fa-solid fa-box-open" style="font-size:28px;opacity:.3;"></i>
                        </div>
                        <p style="font-size:15px;font-weight:600;color:#64748b;">Không tìm thấy đơn hàng nào</p>
                        <p style="font-size:13px;margin-top:4px;">Thử điều chỉnh bộ lọc hoặc tạo đơn hàng mới</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($orders->hasPages())
    <div style="padding:20px;border-top:1px solid #f1f5f9;background:#fcfcfc;">
        {{ $orders->links() }}
    </div>
    @endif
</div>

@endsection

