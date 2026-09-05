@extends('admin.layouts.app')
@section('title', 'Đơn hàng ' . $order->order_number)
@section('page-title', 'Đơn hàng ' . $order->order_number)
@section('page-subtitle', 'Đặt lúc ' . $order->created_at->format('H:i d/m/Y'))

@section('page-actions')
<div style="display:flex; gap:8px;">
    <a href="{{ locale_route('admin.orders.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
    <a href="{{ locale_route('admin.orders.edit', $order) }}" class="btn btn-warning" style="background:#f59e0b; color:#fff; border:none; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);">
        <i class="fa-solid fa-pen"></i> Sửa thông tin
    </a>
    <a href="{{ locale_route('admin.orders.print', $order) }}" target="_blank" class="btn btn-primary" style="box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
        <i class="fa-solid fa-print"></i> In đơn hàng
    </a>
</div>
@endsection

@section('content')
<div style="display:grid; grid-template-columns:1fr 340px; gap:24px; align-items:start;">

    {{-- Cột trái: Chi tiết đơn hàng --}}
    <div style="display:flex; flex-direction:column; gap:24px;">

        {{-- Danh sách sản phẩm --}}
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
            <div class="card-header" style="padding:16px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:15px; color:#1e293b;">Sản phẩm đặt hàng</span>
            </div>
            <div class="tbl-wrap" style="padding:0;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th class="tbl-th" style="padding:14px 24px; font-size:11px; text-transform:uppercase;">Sản phẩm</th>
                            <th class="tbl-th" style="padding:14px 24px; font-size:11px; text-transform:uppercase; text-align:right; width:140px;">Đơn giá</th>
                            <th class="tbl-th" style="padding:14px 24px; font-size:11px; text-transform:uppercase; text-align:center; width:80px;">SL</th>
                            <th class="tbl-th" style="padding:14px 24px; font-size:11px; text-transform:uppercase; text-align:right; width:140px;">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr class="tbl-tr">
                            <td class="tbl-td" style="padding:16px 24px;">
                                <div style="display:flex;align-items:center;gap:12px;">
                                    @if($item->image_url)
                                        <img src="{{ $item->image_url }}" style="width:48px; height:48px; border-radius:10px; object-fit:cover; border:1px solid #f1f5f9; flex-shrink:0;">
                                    @else
                                        <div style="width:48px; height:48px; border-radius:10px; background:#f8fafc; border:1px solid #f1f5f9; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                            <i class="fa-solid fa-box" style="color:#cbd5e1; font-size:16px;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p style="font-size:14px; font-weight:700; color:#1e293b; margin-bottom:2px;">{{ $item->product_name }}</p>
                                        @if($item->variant_label)
                                            <span class="badge badge-gray" style="font-size:10px; padding:2px 8px; border-radius:6px;">{{ $item->variant_label }}</span>
                                        @endif
                                        @if($item->sku)
                                            <p style="font-size:11px; color:#94a3b8; font-family:monospace; margin-top:2px;">{{ $item->sku }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="tbl-td" style="padding:16px 24px; text-align:right; font-size:13.5px; color:#475569;">
                                {{ number_format($item->price, 0, ',', '.') }}₫
                            </td>
                            <td class="tbl-td" style="padding:16px 24px; text-align:center; font-size:14px; font-weight:700; color:#1e293b;">
                                {{ $item->quantity }}
                            </td>
                            <td class="tbl-td" style="padding:16px 24px; text-align:right; font-size:14.5px; font-weight:800; color:#0f172a;">
                                {{ number_format($item->total, 0, ',', '.') }}₫
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="border-top:1px solid #f1f5f9; background:linear-gradient(to right, #fcfcfc, #f8fafc);">
                        <tr>
                            <td colspan="3" style="padding:12px 24px; text-align:right; font-size:13px; color:#64748b;">Tạm tính</td>
                            <td style="padding:12px 24px; text-align:right; font-size:14px; font-weight:700; color:#1e293b;">{{ number_format($order->subtotal, 0, ',', '.') }}₫</td>
                        </tr>
                        @if($order->discount > 0)
                            <tr>
                                <td colspan="3" style="padding:12px 24px; text-align:right; font-size:13px; color:#16a34a;">Giảm giá</td>
                                <td style="padding:12px 24px; text-align:right; font-size:14px; font-weight:700; color:#16a34a;">-{{ number_format($order->discount, 0, ',', '.') }}₫</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="3" style="padding:12px 24px; text-align:right; font-size:13px; color:#64748b;">Phí vận chuyển</td>
                            <td style="padding:12px 24px; text-align:right; font-size:14px; font-weight:700; color:#1e293b;">{{ number_format($order->shipping_fee, 0, ',', '.') }}₫</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding:20px 24px; text-align:right; font-size:15px; font-weight:800; color:#1e293b;">TỔNG THANH TOÁN</td>
                            <td style="padding:20px 24px; text-align:right; font-size:22px; font-weight:900; color:#2563eb;">
                                {{ number_format($order->total, 0, ',', '.') }}₫
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Lịch sử đơn hàng --}}
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px;">
            <div class="card-header" style="padding:16px 24px; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:15px; color:#1e293b;">Lịch trình đơn hàng</span>
            </div>
            <div class="card-body" style="padding:24px;">
                <div style="display:flex; flex-direction:column; gap:20px; position:relative;">
                    <div style="position:absolute; left:7px; top:10px; bottom:10px; width:2px; background:#f1f5f9; z-index:0;"></div>
                    @forelse($order->statusHistories as $history)
                        <div style="display:flex; align-items:flex-start; gap:20px; position:relative; z-index:1;">
                            <div style="width:16px; height:16px; border-radius:50%; background:#fff; border:4px solid #3b82f6; margin-top:4px; flex-shrink:0;"></div>
                            <div style="flex:1;">
                                <div style="display:flex; align-items:center; gap:12px; margin-bottom:4px;">
                                    <span style="font-size:14px; font-weight:800; color:#1e293b;">
                                        {{ \App\Models\Order::$statuses[$history->status]['label'] ?? $history->status }}
                                    </span>
                                    <span style="font-size:11px; font-weight:700; color:#94a3b8;">{{ $history->created_at->format('H:i d/m/Y') }}</span>
                                    @if($history->createdBy)
                                        <span style="font-size:11px; font-weight:700; color:#3b82f6; background:#eff6ff; padding:2px 8px; border-radius:6px;">
                                            <i class="fa-solid fa-user"></i> {{ $history->createdBy->name }}
                                        </span>
                                    @endif
                                </div>
                                @if($history->note)
                                    <p style="font-size:13px; color:#64748b; line-height:1.5;">{{ $history->note }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p style="font-size:13px; color:#94a3b8; text-align:center;">Chưa có lịch sử trạng thái cho đơn hàng này.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    {{-- Cột phải: Thông tin & Trạng thái --}}
    <div style="display:flex; flex-direction:column; gap:24px;">

        {{-- Trạng thái đơn hàng --}}
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
            <div class="card-header" style="padding:16px 20px; background:#fcfcfc; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:14px; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em;">Xử lý đơn hàng</span>
            </div>
            <div class="card-body" style="padding:20px;">
                <form action="{{ locale_route('admin.orders.update-status', $order) }}" method="POST" style="display:flex; flex-direction:column; gap:12px;">
                    @csrf @method('PUT')
                    <div>
                        <label class="form-label" style="font-size:11px; font-weight:700; color:#94a3b8;">TRẠNG THÁI HIỆN TẠI</label>
                        <select name="status" class="form-select" style="height:42px; border-radius:10px; font-weight:700;">
                            @foreach($statuses as $key => $s)
                                <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label" style="font-size:11px; font-weight:700; color:#94a3b8;">GHI CHÚ (NẾU CÓ)</label>
                        <textarea name="note" rows="2" class="form-textarea" placeholder="Nội dung thông báo cho khách..." style="border-radius:10px; font-size:13px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="justify-content:center; height:42px; border-radius:10px; font-weight:700;">
                        Cập nhật trạng thái
                    </button>
                </form>

                <div style="height:1px; background:#f1f5f9; margin:20px 0;"></div>

                <form action="{{ locale_route('admin.orders.update-payment', $order) }}" method="POST" style="display:flex; flex-direction:column; gap:12px;">
                    @csrf @method('PUT')
                    <div>
                        <label class="form-label" style="font-size:11px; font-weight:700; color:#94a3b8;">THANH TOÁN ({{ strtoupper($order->payment_method) }})</label>
                        <select name="payment_status" class="form-select" style="height:42px; border-radius:10px; font-weight:700;">
                            @foreach(\App\Models\Order::$paymentStatuses as $key => $s)
                                <option value="{{ $key }}" {{ $order->payment_status === $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary" style="justify-content:center; height:42px; border-radius:10px; font-weight:700;">
                        Xác nhận thanh toán
                    </button>
                </form>
            </div>
        </div>

        {{-- Đại lý phụ trách (REFINED) - Hidden for Store Managers --}}
        @if(!auth()->user()->isStoreManager())
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden; background:linear-gradient(to bottom right, #fff, #f8fafc);">
            <div class="card-header" style="padding:16px 20px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between;">
                <span class="card-title" style="font-size:14px; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em;">Đại lý phụ trách</span>
                @if($order->agent)
                    <a href="{{ locale_route('admin.agents.show', $order->agent) }}" class="btn btn-ghost btn-sm" style="width:28px; height:28px; padding:0; border-radius:8px;">
                        <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                    </a>
                @endif
            </div>
            <div class="card-body" style="padding:20px;">
                @if($order->agent)
                    <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:16px; margin-bottom:16px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                        <p style="font-size:15px; font-weight:800; color:#1e293b; margin-bottom:8px;">{{ $order->agent->name }}</p>
                        <div style="display:flex; flex-direction:column; gap:6px;">
                            @if($order->agent->phone)
                                <div style="display:flex; align-items:center; gap:8px; font-size:12px; color:#475569;">
                                    <i class="fa-solid fa-phone" style="width:14px; color:#10b981;"></i>
                                    {{ $order->agent->phone }}
                                </div>
                            @endif
                            @if($order->agent->address)
                                <div style="display:flex; align-items:flex-start; gap:8px; font-size:12px; color:#475569;">
                                    <i class="fa-solid fa-location-dot" style="width:14px; color:#ef4444; margin-top:2px;"></i>
                                    <span style="line-height:1.4;">{{ $order->agent->address }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <form action="{{ locale_route('admin.orders.update-agent', $order) }}" method="POST">
                    @csrf @method('PUT')
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <select name="agent_id" class="form-select select2-agent" style="width:100%;">
                            <option value="">— Đổi đại lý —</option>
                            @foreach(\App\Models\Agent::where('is_active', true)->orderBy('name')->get() as $ag)
                                <option value="{{ $ag->id }}" {{ $order->agent_id == $ag->id ? 'selected' : '' }}>
                                    {{ $ag->name }} ({{ $ag->type_name }})
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary" style="justify-content:center; height:38px; border-radius:8px; font-size:13px; font-weight:700;">
                            Cập nhật đại lý
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        {{-- Thông tin giao hàng --}}
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px;">
            <div class="card-header" style="padding:16px 20px; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:14px; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em;">Khách hàng</span>
            </div>
            <div class="card-body" style="padding:20px; display:flex; flex-direction:column; gap:16px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div style="width:40px; height:40px; border-radius:12px; background:linear-gradient(135deg, #3b82f6, #6366f1); display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:18px;">
                        {{ strtoupper(mb_substr($order->customer_name, 0, 1)) }}
                    </div>
                    <div>
                        <p style="font-size:15px; font-weight:800; color:#1e293b; margin-bottom:2px;">{{ $order->customer_name }}</p>
                        <p style="font-size:13px; font-weight:700; color:#3b82f6;">{{ $order->customer_phone }}</p>
                    </div>
                </div>

                <div style="display:flex; flex-direction:column; gap:12px; padding-top:16px; border-top:1px solid #f1f5f9;">
                    @if($order->customer_email)
                    <div style="display:flex; gap:10px; font-size:13px;">
                        <i class="fa-solid fa-envelope" style="width:16px; color:#94a3b8; margin-top:2px;"></i>
                        <span style="color:#475569;">{{ $order->customer_email }}</span>
                    </div>
                    @endif
                    <div style="display:flex; gap:10px; font-size:13px;">
                        <i class="fa-solid fa-location-dot" style="width:16px; color:#94a3b8; margin-top:2px;"></i>
                        <span style="color:#475569; line-height:1.5;">{{ $order->shipping_address }}</span>
                    </div>
                </div>

                @if($order->customer_note)
                    <div style="background:#fffbeb; border:1px solid #fef3c7; border-radius:12px; padding:12px;">
                        <p style="font-size:11px; font-weight:800; color:#b45309; text-transform:uppercase; margin-bottom:6px;">Ghi chú từ khách</p>
                        <p style="font-size:13px; color:#b45309; line-height:1.5;">{{ $order->customer_note }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Ghi chú nội bộ --}}
        <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
            <div class="card-header" style="padding:16px 20px; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:14px; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em;">Ghi chú nội bộ</span>
            </div>
            <form action="{{ locale_route('admin.orders.update-note', $order) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body" style="padding:20px;">
                    <textarea name="admin_note" rows="3" class="form-textarea" placeholder="Chỉ quản trị viên nhìn thấy..." style="border-radius:10px; font-size:13px; margin-bottom:12px;">{{ $order->admin_note }}</textarea>
                    <button type="submit" class="btn btn-secondary w-full justify-center" style="height:38px; border-radius:8px; font-size:13px; font-weight:700;">Lưu ghi chú</button>
                </div>
            </form>
        </div>

        {{-- Actions --}}
        <form action="{{ locale_route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Xác nhận xóa đơn hàng này?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger w-full justify-center" style="height:46px; border-radius:12px; background:#fee2e2; color:#ef4444; border:none; font-weight:700;">
                <i class="fa-solid fa-trash-can"></i> Xóa đơn hàng
            </button>
        </form>

    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
        height: 38px !important; 
        border: 1px solid #e2e8f0 !important; 
        border-radius: 8px !important;
        display: flex !important;
        align-items: center !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: normal !important; 
        padding-left: 10px !important;
        color: #334155 !important;
        font-size: 13px !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-agent').select2({ placeholder: "Chọn đại lý" });
    });
</script>
@endpush
@endsection
