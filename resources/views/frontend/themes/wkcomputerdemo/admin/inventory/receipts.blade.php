@extends('admin.layouts.app')
@section('title', 'Bảng nhập hàng')
@section('page-title', 'Bảng nhập hàng')
@section('page-subtitle', 'Lịch sử các phiếu nhập kho')
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.receipts.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tạo phiếu nhập
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
                    <th>Ngày nhập</th>
                    <th>Mã phiếu</th>
                    <th>Nhà cung cấp</th>
                    <th style="text-align:right;">Tổng SL</th>
                    <th>Người tạo</th>
                    <th>Ghi chú</th>
                    <th style="text-align:center;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->received_date->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ locale_route('admin.inventory.receipts.show', $receipt) }}"
                           style="font-weight:700;color:#2563eb;text-decoration:none;">
                            {{ $receipt->receipt_number }}
                        </a>
                    </td>
                    <td>{{ $receipt->supplier ?: '—' }}</td>
                    <td style="text-align:right;font-weight:700;color:#2563eb;">
                        {{ $receipt->items->sum('quantity') }}
                    </td>
                    <td>{{ $receipt->creator?->name ?? '—' }}</td>
                    <td style="color:#64748b;font-size:12.5px;">{{ Str::limit($receipt->notes, 40) }}</td>
                    <td style="text-align:center;">
                        <div style="display:flex;gap:6px;justify-content:center;">
                            <a href="{{ locale_route('admin.inventory.receipts.show', $receipt) }}"
                               class="act-btn view" title="Xem chi tiết">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <form action="{{ locale_route('admin.inventory.receipts.destroy', $receipt) }}"
                                  method="POST"
                                  onsubmit="return confirm('Xoá phiếu này sẽ hoàn tác tồn kho. Tiếp tục?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="act-btn del" title="Xoá">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;color:#94a3b8;padding:60px 0;">
                        <i class="fa-solid fa-file-import" style="font-size:2.5rem;display:block;margin-bottom:12px;opacity:.3;"></i>
                        Chưa có phiếu nhập nào.
                        <a href="{{ locale_route('admin.inventory.receipts.create') }}" style="color:#2563eb;">Tạo ngay →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($receipts->hasPages())
        <div style="padding:16px;">{{ $receipts->links() }}</div>
    @endif
</div>

@endsection
