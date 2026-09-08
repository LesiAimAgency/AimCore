@extends('layouts.app')
@section('title', (request()->get('status') === 'failed' || request()->has('error')) ? 'Đặt hàng không thành công - WKcomputer' : 'Đặt hàng thành công - WKcomputer')
@section('content')
<div style="background:#f0f2f5;padding:60px 0;min-height:60vh;display:flex;align-items:center;">
    <div class="wk-container" style="text-align:center;">
        <div style="background:#fff;border-radius:20px;padding:60px;max-width:560px;margin:0 auto;box-shadow:0 4px 24px rgba(0,0,0,.08);">
            @if(request()->get('status') === 'failed' || request()->has('error'))
                <div style="width:80px;height:80px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;animation:wkFadeIn .5s ease;">
                    <i class="fas fa-times-circle" style="font-size:40px;color:#ef4444;"></i>
                </div>
                <h1 style="font-size:24px;font-weight:800;color:#1e293b;margin:0 0 12px;">Đặt hàng không thành công!</h1>
                <p style="color:#64748b;font-size:14px;line-height:1.6;margin:0 0 24px;">
                    Giao dịch thanh toán qua {{ $order->payment_method === 'fundiin' ? 'Fundiin' : ($order->payment_method === 'kredivo' ? 'Kredivo' : ucfirst($order->payment_method)) }} không thành công hoặc đã bị hủy.<br>
                    Mã đơn hàng của bạn: <strong style="color:var(--wk-primary);font-size:16px;">#{{ $order->order_number ?? $order->id }}</strong>
                    @if(request()->get('error'))
                        <br><span style="color:#ef4444;font-size:13px;display:block;margin-top:8px;">Chi tiết lỗi: <strong>{{ request()->get('error') }}</strong></span>
                    @endif
                </p>
            @else
                <div style="width:80px;height:80px;background:#e8f5e9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;animation:wkFadeIn .5s ease;">
                    <i class="fas fa-check-circle" style="font-size:40px;color:#4caf50;"></i>
                </div>
                <h1 style="font-size:24px;font-weight:800;color:#1e293b;margin:0 0 12px;">Đặt hàng thành công!</h1>
                <p style="color:#64748b;font-size:14px;line-height:1.6;margin:0 0 24px;">
                    Cảm ơn bạn đã mua hàng tại WKcomputer.<br>
                    Mã đơn hàng của bạn: <strong style="color:var(--wk-primary);font-size:16px;">#{{ $order->order_number ?? $order->id }}</strong>
                </p>
            @endif
            <div style="background:#f8fafc;border-radius:12px;padding:20px;margin-bottom:28px;text-align:left;">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:13px;">
                    <div><span style="color:#94a3b8;">Người nhận:</span><br><strong>{{ $order->customer_name }}</strong></div>
                    <div><span style="color:#94a3b8;">Điện thoại:</span><br><strong>{{ $order->customer_phone }}</strong></div>
                    <div style="grid-column:span 2;"><span style="color:#94a3b8;">Địa chỉ:</span><br><strong>{{ $order->formatted_shipping_address ?: (is_array($order->shipping_address) ? ($order->shipping_address['full_address'] ?? implode(', ', array_filter($order->shipping_address))) : $order->shipping_address) }}</strong></div>
                    <div><span style="color:#94a3b8;">Tổng tiền:</span><br><strong style="color:var(--wk-primary);font-size:16px;">{{ number_format($order->total, 0, ',', '.') }}₫</strong></div>
                    <div><span style="color:#94a3b8;">Thanh toán:</span><br><strong>{{ $order->payment_method === 'cod' ? 'Tiền mặt khi nhận' : ($order->payment_method === 'vietqr' ? 'Chuyển khoản VietQR' : ucfirst($order->payment_method)) }}</strong></div>
                </div>

                @if($order->payment_method === 'vietqr')
                    @php
                        $bankId = setting('vietqr_bank_id');
                        $accNo = setting('vietqr_account_no');
                        $accName = setting('vietqr_account_name');
                        $template = setting('vietqr_template', 'compact2');
                        $amount = $order->total;
                        $addInfo = urlencode('Thanh toan ' . ($order->order_number ?? $order->id));
                        $accNameEncoded = urlencode($accName);
                        
                        $qrUrl = "https://img.vietqr.io/image/{$bankId}-{$accNo}-{$template}.png?amount={$amount}&addInfo={$addInfo}&accountName={$accNameEncoded}";
                    @endphp
                    
                    @if($bankId && $accNo)
                        <div style="margin-top: 24px; padding-top: 24px; border-top: 1px dashed #cbd5e1; text-align: center;">
                            <div style="font-weight: 700; font-size: 16px; margin-bottom: 8px; color: #1e293b;">Quét mã QR để thanh toán</div>
                            <p style="font-size: 13px; color: #64748b; margin-bottom: 16px;">Vui lòng sử dụng ứng dụng Mobile Banking của bạn để quét mã và chuyển khoản.</p>
                            
                            <div style="background: #fff; padding: 16px; border-radius: 12px; border: 1px solid #e2e8f0; display: inline-block; margin-bottom: 16px;">
                                <img src="{{ $qrUrl }}" alt="VietQR" style="max-width: 250px; display: block;">
                            </div>
                            
                            <div style="background: #fff; padding: 16px; border-radius: 8px; text-align: left; font-size: 13px; display: inline-block; width: 100%; max-width: 350px; border: 1px solid #e2e8f0;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <strong style="color: #64748b;">Ngân hàng:</strong> 
                                    <span style="font-weight: 600;">{{ setting('vietqr_bank_name', $bankId) }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <strong style="color: #64748b;">Số tài khoản:</strong> 
                                    <span style="font-weight: 600;">{{ $accNo }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <strong style="color: #64748b;">Chủ tài khoản:</strong> 
                                    <span style="font-weight: 600;">{{ $accName }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <strong style="color: #64748b;">Số tiền:</strong> 
                                    <strong style="color:var(--wk-primary); font-size: 14px;">{{ number_format($order->total, 0, ',', '.') }}₫</strong>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <strong style="color: #64748b;">Nội dung CK:</strong> 
                                    <span style="font-weight: 600;">Thanh toan {{ $order->order_number ?? $order->id }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="margin-top: 24px; padding: 16px; border-radius: 8px; background: #fff3cd; color: #856404; font-size: 13px; text-align: center;">
                            Thông tin tài khoản VietQR chưa được cấu hình.
                        </div>
                    @endif
                @endif
            </div>
            <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                @auth
                <a href="{{ route('profile') }}" class="wk-btn wk-btn-outline">
                    <i class="fas fa-list-alt"></i> Xem đơn hàng
                </a>
                @endauth
                <a href="{{ route('home') }}" class="wk-btn wk-btn-primary">
                    <i class="fas fa-home"></i> Về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
