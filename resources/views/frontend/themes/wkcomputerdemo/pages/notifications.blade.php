@extends('layouts.app')

@section('title', 'Thông báo - WKcomputer')

@section('content')

<div style="background:#fff;min-height:calc(100vh - 120px);">
    {{-- Header --}}
    <div style="padding:16px;text-align:center;position:relative;border-bottom:1px solid #f1f5f9;">
        <h1 style="font-size:16px;font-weight:700;margin:0;">Thông báo</h1>
        <button style="position:absolute;right:16px;top:16px;background:none;border:none;color:#64748b;font-size:18px;">
            <i class="fas fa-check-double"></i>
        </button>
    </div>

    {{-- Tabs --}}
    <div style="display:flex;border-bottom:1px solid #f1f5f9;">
        <div style="flex:1;text-align:center;padding:12px;font-size:14px;font-weight:600;color:#e11d48;border-bottom:2px solid #e11d48;">
            Ưu đãi & Cập nhật
        </div>
        <div style="flex:1;text-align:center;padding:12px;font-size:14px;color:#64748b;">
            Đơn hàng
        </div>
    </div>

    {{-- Empty State --}}
    <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:80px 20px;">
        <div style="width:120px;height:120px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
            <i class="fas fa-search" style="font-size:48px;color:#cbd5e1;"></i>
        </div>
        <p style="color:#64748b;font-size:14px;">Bạn chưa có thông báo mới</p>
    </div>

</div>

@endsection
