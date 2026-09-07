@extends('layouts.app')
@section('title', 'Tra cứu đơn hàng - WKcomputer')

@section('content')
<div style="background:#f0f2f5;padding:60px 0;min-height:60vh;">
    <div class="wk-container">
        <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 24px rgba(0,0,0,0.05);">
            <div style="text-align: center; margin-bottom: 32px;">
                <h1 style="font-size: 24px; font-weight: 800; margin-bottom: 8px;">Tra cứu đơn hàng</h1>
                <p style="color: #64748b; font-size: 14px;">Kiểm tra tình trạng đơn hàng của bạn</p>
            </div>

            @if(isset($error))
                <div style="background: #fef2f2; color: #b91c1c; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; font-size: 14px; text-align: center;">
                    <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>{{ $error }}
                </div>
            @endif

            <form action="{{ route('order.track') }}" method="POST">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px;">Mã đơn hàng</label>
                    <input type="text" name="order_number" placeholder="VD: ORD-20260703-ABCD123" required value="{{ request('order_number') }}" style="width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; font-size: 14px;" onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('order_number')
                        <span style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
                
                <div style="margin-bottom: 24px;">
                    <label style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px;">Email mua hàng</label>
                    <input type="email" name="email" placeholder="VD: email@example.com" required value="{{ request('email') }}" style="width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; font-size: 14px;" onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    @error('email')
                        <span style="color: #ef4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="wk-btn wk-btn-primary" style="width: 100%;">
                    <i class="fas fa-search" style="margin-right: 8px;"></i> Tra cứu
                </button>
            </form>

            @if(isset($order))
            <div style="margin-top: 40px; border-top: 1px solid #e2e8f0; padding-top: 32px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h3 style="font-size: 18px; font-weight: 700; margin: 0;">Đơn hàng #{{ $order->order_number ?? $order->id }}</h3>
                    @php
                        $statusColors = ['pending'=>'#ff6d00','processing'=>'#1565c0','completed'=>'#2e7d32','cancelled'=>'#ef5350'];
                        $statusLabels = ['pending'=>'Chờ xác nhận','processing'=>'Đang xử lý','completed'=>'Hoàn thành','cancelled'=>'Đã hủy'];
                    @endphp
                    <span style="font-size:12px;font-weight:700;color:{{ $statusColors[$order->status] ?? '#94a3b8' }};background:{{ $statusColors[$order->status] ?? '#94a3b8' }}18;padding:4px 10px;border-radius:4px;">
                        {{ $statusLabels[$order->status] ?? $order->status }}
                    </span>
                </div>

                <div style="background: #f8fafc; border-radius: 12px; padding: 20px; margin-bottom: 24px; font-size: 13px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div>
                            <span style="color: #64748b; display: block; margin-bottom: 2px;">Ngày đặt:</span>
                            <strong>{{ $order->created_at?->format('d/m/Y H:i') }}</strong>
                        </div>
                        <div>
                            <span style="color: #64748b; display: block; margin-bottom: 2px;">Tổng tiền:</span>
                            <strong style="color: var(--wk-primary); font-size: 14px;">{{ number_format($order->total, 0, ',', '.') }}₫</strong>
                        </div>
                        <div style="grid-column: span 2;">
                            <span style="color: #64748b; display: block; margin-bottom: 2px;">Địa chỉ giao hàng:</span>
                            <strong>{{ $order->shipping_address }}</strong>
                        </div>
                    </div>
                </div>

                <div style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
                    <div style="background: #f8fafc; padding: 12px 16px; border-bottom: 1px solid #e2e8f0; font-weight: 600; font-size: 14px;">
                        Sản phẩm đã đặt
                    </div>
                    <div>
                        @foreach($order->items as $item)
                        <div style="display: flex; gap: 12px; padding: 16px; border-bottom: 1px solid #f1f5f9;">
                            <img src="{{ $item->product?->image_url ?: '/images/placeholder.png' }}" alt="{{ $item->product_name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                            <div style="flex: 1;">
                                <div style="font-weight: 600; font-size: 13px; margin-bottom: 4px;">{{ $item->product_name }}</div>
                                <div style="font-size: 12px; color: #64748b;">Số lượng: {{ $item->quantity }}</div>
                            </div>
                            <div style="font-weight: 700; font-size: 13px; color: var(--wk-primary);">
                                {{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
