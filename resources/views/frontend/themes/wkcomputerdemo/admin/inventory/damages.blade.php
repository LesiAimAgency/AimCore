@extends('admin.layouts.app')
@section('title', 'Bảng hàng huỷ')
@section('page-title', 'Bảng hàng huỷ')
@section('page-subtitle', 'Hàng hỏng, hết hạn, bị huỷ')
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.damages.create') }}" class="btn btn-danger">
        <i class="fa-solid fa-plus"></i> Ghi nhận huỷ
    </a>
@endsection

@section('content')

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="tbl-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Mã phiếu</th>
                    <th>Sản phẩm</th>
                    <th>Quy cách</th>
                    <th style="text-align:right;">Số lượng</th>
                    <th>Lý do</th>
                    <th>Người tạo</th>
                    <th style="text-align:center;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($damages as $damage)
                <tr>
                    <td>{{ $damage->damage_date->format('d/m/Y') }}</td>
                    <td style="font-weight:700;color:#dc2626;">{{ $damage->damage_number }}</td>
                    <td style="font-weight:600;">{{ $damage->product->name }}</td>
                    <td><span class="badge badge-gray">{{ $damage->unit }}</span></td>
                    <td style="text-align:right;font-weight:700;color:#dc2626;">{{ number_format($damage->quantity) }}</td>
                    <td><span class="badge badge-red">{{ $damage->reason ?: 'Hàng huỷ' }}</span></td>
                    <td>{{ $damage->creator?->name ?? '—' }}</td>
                    <td style="text-align:center;">
                        <form action="{{ locale_route('admin.inventory.damages.destroy', $damage) }}"
                              method="POST"
                              onsubmit="return confirm('Xoá phiếu này sẽ hoàn tác tồn kho. Tiếp tục?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="act-btn del" title="Xoá">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center;color:#94a3b8;padding:60px 0;">
                        <i class="fa-solid fa-ban" style="font-size:2.5rem;display:block;margin-bottom:12px;opacity:.3;"></i>
                        Chưa có hàng huỷ nào.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($damages->hasPages())
        <div style="padding:16px;">{{ $damages->links() }}</div>
    @endif
</div>

@endsection
