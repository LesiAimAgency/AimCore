@extends('admin.layouts.app')
@section('title', 'Quản lý kho')
@section('page-title', 'Quản lý kho')
@section('page-subtitle', 'Tổng quan tồn kho — Nhập / Bán / Huỷ')
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.receipts.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Nhập hàng
    </a>
    <a href="{{ locale_route('admin.inventory.damages.create') }}" class="btn btn-danger">
        <i class="fa-solid fa-triangle-exclamation"></i> Ghi huỷ
    </a>
@endsection

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <a href="{{ locale_route('admin.inventory.receipts') }}" class="stat-card">
        <div class="stat-value" style="color:#2563eb;">{{ $stats['total_receipts'] }}</div>
        <div class="stat-label"><i class="fa-solid fa-file-import"></i> Phiếu nhập</div>
    </a>
    <a href="{{ locale_route('admin.inventory.damages') }}" class="stat-card">
        <div class="stat-value" style="color:#dc2626;">{{ $stats['total_damages'] }}</div>
        <div class="stat-label"><i class="fa-solid fa-ban"></i> Phiếu huỷ</div>
    </a>
    <div class="stat-card">
        <div class="stat-value" style="color:#f59e0b;">{{ $stats['low_stock'] }}</div>
        <div class="stat-label"><i class="fa-solid fa-triangle-exclamation"></i> Sắp hết (≤5)</div>
    </div>
    <div class="stat-card">
        <div class="stat-value" style="color:#ef4444;">{{ $stats['out_of_stock'] }}</div>
        <div class="stat-label"><i class="fa-solid fa-circle-xmark"></i> Hết hàng</div>
    </div>
</div>

{{-- Tìm kiếm --}}
<div class="card" style="margin-bottom:16px;">
    <div class="card-body" style="padding:14px;">
        <form method="GET" style="display:flex;gap:10px;align-items:center;">
            <input type="text" name="search" value="{{ $search }}" placeholder="Tìm sản phẩm..."
                   class="form-input" style="max-width:300px;">
            <button type="submit" class="btn btn-ghost btn-sm">
                <i class="fa-solid fa-search"></i> Tìm
            </button>
            @if($search)
                <a href="{{ locale_route('admin.inventory.index') }}" class="btn btn-ghost btn-sm">Xoá lọc</a>
            @endif
        </form>
    </div>
</div>

{{-- Bảng tồn kho --}}
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fa-solid fa-table"></i> Bảng tồn kho (Nhập - Bán - Huỷ)</span>
        <a href="{{ locale_route('admin.inventory.transactions') }}" style="font-size:12px;color:#2563eb;">
            Xem lịch sử →
        </a>
    </div>
    <div class="tbl-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Quy cách</th>
                    <th style="text-align:right;color:#2563eb;">Nhập</th>
                    <th style="text-align:right;color:#16a34a;">Bán</th>
                    <th style="text-align:right;color:#dc2626;">Huỷ</th>
                    <th style="text-align:right;">Tồn kho</th>
                </tr>
            </thead>
            <tbody>
                @forelse($balance as $row)
                <tr>
                    <td style="font-weight:600;">{{ $row->product_name }}</td>
                    <td><span class="badge badge-gray">{{ $row->unit }}</span></td>
                    <td style="text-align:right;color:#2563eb;font-weight:700;">{{ number_format($row->nhap) }}</td>
                    <td style="text-align:right;color:#16a34a;font-weight:700;">{{ number_format($row->ban) }}</td>
                    <td style="text-align:right;color:#dc2626;font-weight:700;">{{ number_format($row->huy) }}</td>
                    <td style="text-align:right;">
                        <span style="font-weight:800;font-size:15px;
                            color:{{ $row->ton <= 0 ? '#ef4444' : ($row->ton <= 5 ? '#f59e0b' : '#0f172a') }}">
                            {{ number_format($row->ton) }}
                        </span>
                        @if($row->ton <= 0)
                            <span class="badge badge-red" style="margin-left:4px;">Hết</span>
                        @elseif($row->ton <= 5)
                            <span class="badge badge-yellow" style="margin-left:4px;">Sắp hết</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;color:#94a3b8;padding:60px 0;">
                        <i class="fa-solid fa-box-open" style="font-size:2.5rem;display:block;margin-bottom:12px;opacity:.3;"></i>
                        Chưa có dữ liệu kho.
                        <a href="{{ locale_route('admin.inventory.receipts.create') }}" style="color:#2563eb;">Tạo phiếu nhập đầu tiên →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
