@extends('admin.layouts.app')
@section('title', 'Chi tiết phiếu nhập')
@section('page-title', 'Phiếu nhập ' . $receipt->receipt_number)
@section('page-subtitle', 'Ngày ' . $receipt->received_date->format('d/m/Y') . ($receipt->supplier ? ' · ' . $receipt->supplier : ''))
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.receipts') }}" class="btn btn-ghost btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
<div class="card">
    <div class="tbl-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Biến thể</th>
                    <th>Quy cách</th>
                    <th style="text-align:right;">Số lượng</th>
                    <th style="text-align:right;">Giá nhập</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($receipt->items as $i => $item)
                <tr>
                    <td style="color:#94a3b8;">{{ $i + 1 }}</td>
                    <td style="font-weight:600;">{{ $item->product->name }}</td>
                    <td>{{ $item->variant?->sku ?? '—' }}</td>
                    <td><span class="badge badge-gray">{{ $item->unit }}</span></td>
                    <td style="text-align:right;font-weight:700;color:#2563eb;">{{ number_format($item->quantity) }}</td>
                    <td style="text-align:right;">
                        {{ $item->unit_cost ? number_format($item->unit_cost) . 'đ' : '—' }}
                    </td>
                    <td style="color:#64748b;font-size:12.5px;">{{ $item->notes ?: '—' }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right;font-weight:700;">Tổng cộng:</td>
                    <td style="text-align:right;font-weight:800;color:#2563eb;">
                        {{ number_format($receipt->items->sum('quantity')) }}
                    </td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@if($receipt->notes)
<div class="card" style="margin-top:12px;">
    <div class="card-body">
        <strong>Ghi chú:</strong> {{ $receipt->notes }}
    </div>
</div>
@endif
@endsection
