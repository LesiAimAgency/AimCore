@extends('layouts.app')
@section('title', 'Chi tiết đơn hàng - ' . ($order->order_number ?? $order->id))

@section('content')
<div class="wk-container" style="padding: 40px 15px; min-height: 60vh;">
    <div style="max-width: 800px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h1 style="font-size: 24px; font-weight: 700; margin: 0;">Chi tiết đơn hàng #{{ $order->order_number ?? $order->id }}</h1>
            <a href="{{ route('profile') }}" class="wk-btn wk-btn-outline wk-btn-sm">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 24px; margin-bottom: 24px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; font-size: 14px;">
                <div>
                    <div style="color: #64748b; margin-bottom: 4px;">Ngày đặt hàng:</div>
                    <div style="font-weight: 600;">{{ $order->created_at?->format('d/m/Y H:i') }}</div>
                </div>
                <div>
                    <div style="color: #64748b; margin-bottom: 4px;">Trạng thái:</div>
                    @php
                        $statusColors = ['pending'=>'#ff6d00','processing'=>'#1565c0','completed'=>'#2e7d32','cancelled'=>'#ef5350'];
                        $statusLabels = ['pending'=>'Chờ xác nhận','processing'=>'Đang xử lý','completed'=>'Hoàn thành','cancelled'=>'Đã hủy'];
                    @endphp
                    <span style="font-size:12px;font-weight:700;color:{{ $statusColors[$order->status] ?? '#94a3b8' }};background:{{ $statusColors[$order->status] ?? '#94a3b8' }}18;padding:4px 10px;border-radius:4px;">
                        {{ $statusLabels[$order->status] ?? $order->status }}
                    </span>
                </div>
                <div>
                    <div style="color: #64748b; margin-bottom: 4px;">Người nhận:</div>
                    <div style="font-weight: 600;">{{ $order->customer_name }}</div>
                </div>
                <div>
                    <div style="color: #64748b; margin-bottom: 4px;">Điện thoại:</div>
                    <div style="font-weight: 600;">{{ $order->customer_phone }}</div>
                </div>
                <div style="grid-column: span 2;">
                    <div style="color: #64748b; margin-bottom: 4px;">Địa chỉ giao hàng:</div>
                    <div style="font-weight: 600;">{{ $order->shipping_address }}</div>
                </div>
                <div style="grid-column: span 2;">
                    <div style="color: #64748b; margin-bottom: 4px;">Ghi chú:</div>
                    <div style="font-weight: 600;">{{ $order->notes ?: 'Không có' }}</div>
                </div>
            </div>
        </div>

        <div style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); overflow: hidden;">
            <div style="padding: 16px 24px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
                <h2 style="font-size: 16px; font-weight: 700; margin: 0;">Sản phẩm đã đặt</h2>
            </div>
            
            <div style="padding: 0 24px;">
                @foreach($order->items as $item)
                <div style="display: flex; gap: 16px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                    <img src="{{ $item->product?->image_url ?: '/images/placeholder.png' }}" alt="{{ $item->product_name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <div style="flex: 1;">
                        <a href="{{ $item->product ? route('product.show', $item->product->slug) : '#' }}" style="font-weight: 600; color: #1e293b; text-decoration: none; display: block; margin-bottom: 4px;">
                            {{ $item->product_name }}
                        </a>
                        <div style="font-size: 13px; color: #64748b;">Số lượng: {{ $item->quantity }}</div>
                    </div>
                    <div style="font-weight: 700; color: var(--wk-primary);">
                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫
                    </div>
                </div>
                @endforeach
            </div>
            
            <div style="padding: 24px; background: #f8fafc; border-top: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                    <span style="color: #64748b;">Tạm tính:</span>
                    <span style="font-weight: 600;">{{ number_format($order->subtotal, 0, ',', '.') }}₫</span>
                </div>
                @if($order->discount > 0)
                <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
                    <span style="color: #64748b;">Giảm giá:</span>
                    <span style="font-weight: 600; color: #16a34a;">-{{ number_format($order->discount, 0, ',', '.') }}₫</span>
                </div>
                @endif
                <div style="display: flex; justify-content: space-between; margin-top: 16px; padding-top: 16px; border-top: 1px dashed #cbd5e1; font-size: 16px;">
                    <span style="font-weight: 700;">Tổng cộng:</span>
                    <span style="font-weight: 700; color: var(--wk-primary); font-size: 20px;">{{ number_format($order->total, 0, ',', '.') }}₫</span>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
