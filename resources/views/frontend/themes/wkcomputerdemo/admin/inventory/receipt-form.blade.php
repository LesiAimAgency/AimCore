@extends('admin.layouts.app')
@section('title', 'Tạo phiếu nhập hàng')
@section('page-title', 'Tạo phiếu nhập hàng')
@section('page-subtitle', 'Ghi nhận hàng nhập vào kho')
@section('page-actions')
    <a href="{{ locale_route('admin.inventory.receipts') }}" class="btn btn-ghost btn-sm">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')

@if($errors->any())
    <div class="alert-danger">
        <ul style="margin:0;padding-left:16px;">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
@endif

<form action="{{ locale_route('admin.inventory.receipts.store') }}" method="POST" id="receipt-form">
    @csrf
    <div class="flex flex-col lg:flex-row gap-5 items-start">

        {{-- Main --}}
        <div class="flex-1 w-full flex flex-col gap-4">

            {{-- Thông tin phiếu --}}
            <div class="card">
                <div class="card-header"><span class="card-title">Thông tin phiếu nhập</span></div>
                <div class="card-body grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Ngày nhập <span style="color:#ef4444">*</span></label>
                        <input type="date" name="received_date" class="form-input"
                               value="{{ old('received_date', now()->format('Y-m-d')) }}" required>
                    </div>
                    <div>
                        <label class="form-label">Nhà cung cấp</label>
                        <input type="text" name="supplier" class="form-input"
                               value="{{ old('supplier') }}" placeholder="Tên nhà cung cấp...">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="form-label">Ghi chú</label>
                        <textarea name="notes" class="form-textarea" rows="2"
                                  placeholder="Ghi chú thêm...">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Danh sách hàng nhập --}}
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Danh sách hàng nhập</span>
                    <button type="button" id="add-item" class="btn btn-ghost btn-sm">
                        <i class="fa-solid fa-plus"></i> Thêm dòng
                    </button>
                </div>
                <div class="tbl-wrap">
                    <table class="table" id="items-table">
                        <thead>
                            <tr>
                                <th style="min-width:200px;">Sản phẩm</th>
                                <th style="min-width:160px;">Biến thể</th>
                                <th style="min-width:110px;">Quy cách</th>
                                <th style="min-width:90px;">Số lượng</th>
                                <th style="min-width:110px;">Giá nhập</th>
                                <th style="min-width:150px;">Ghi chú</th>
                                <th style="width:40px;"></th>
                            </tr>
                        </thead>
                        <tbody id="items-body">
                            <tr class="item-row" data-index="0">
                                <td>
                                    <select name="items[0][product_id]" class="form-select product-select" required>
                                        <option value="">-- Chọn sản phẩm --</option>
                                        @foreach($products as $p)
                                        <option value="{{ $p->id }}" data-has-variants="{{ $p->has_variants ? 1 : 0 }}">
                                            {{ $p->name }} (Tồn: {{ $p->stock }})
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="items[0][variant_id]" class="form-select variant-select" disabled>
                                        <option value="">-- Không có --</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="items[0][unit]" class="form-input"
                                           value="hộp" placeholder="hộp, gói..." required>
                                </td>
                                <td>
                                    <input type="number" name="items[0][quantity]" class="form-input"
                                           min="1" value="1" required>
                                </td>
                                <td>
                                    <input type="number" name="items[0][unit_cost]" class="form-input"
                                           min="0" placeholder="0">
                                </td>
                                <td>
                                    <input type="text" name="items[0][notes]" class="form-input"
                                           placeholder="Ghi chú...">
                                </td>
                                <td>
                                    <button type="button" class="act-btn del remove-item" title="Xoá dòng">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="w-full lg:w-[300px] shrink-0 flex flex-col gap-3 lg:sticky lg:top-5">
            <div class="card">
                <div class="card-body" style="display:flex;flex-direction:column;gap:10px;">
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-floppy-disk"></i> Lưu phiếu nhập
                    </button>
                    <a href="{{ locale_route('admin.inventory.receipts') }}" class="btn btn-ghost"
                       style="width:100%;justify-content:center;">Huỷ</a>
                </div>
            </div>
            <div class="card" style="border-color:#dbeafe;">
                <div class="card-body" style="padding:14px;font-size:12.5px;color:#1e40af;">
                    <p style="font-weight:700;margin-bottom:6px;"><i class="fa-solid fa-circle-info"></i> Lưu ý</p>
                    <ul style="padding-left:16px;line-height:1.9;">
                        <li>Tồn kho cập nhật ngay sau khi lưu</li>
                        <li>Quy cách: hộp, gói, thùng, kg...</li>
                        <li>Giá nhập không bắt buộc</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
let rowIndex = 1;

document.getElementById('add-item').addEventListener('click', () => {
    const tbody = document.getElementById('items-body');
    const tpl = tbody.querySelector('.item-row').cloneNode(true);
    tpl.dataset.index = rowIndex;
    tpl.querySelectorAll('input,select').forEach(el => {
        el.name = el.name.replace(/\[\d+\]/, `[${rowIndex}]`);
        if (el.tagName === 'SELECT') {
            el.selectedIndex = 0;
            if (el.classList.contains('variant-select')) el.disabled = true;
        } else {
            el.value = el.name.includes('unit') ? 'hộp' : (el.name.includes('quantity') ? '1' : '');
        }
    });
    tbody.appendChild(tpl);
    bindRow(tpl);
    rowIndex++;
});

function bindRow(row) {
    row.querySelector('.remove-item').addEventListener('click', () => {
        if (document.querySelectorAll('.item-row').length > 1) row.remove();
    });

    const productSel = row.querySelector('.product-select');
    const variantSel = row.querySelector('.variant-select');

    productSel.addEventListener('change', async () => {
        const pid = productSel.value;
        const hasVariants = productSel.selectedOptions[0]?.dataset.hasVariants === '1';
        variantSel.innerHTML = '<option value="">Đang tải...</option>';
        variantSel.disabled = true;
        if (!pid || !hasVariants) {
            variantSel.innerHTML = '<option value="">-- Không có --</option>';
            return;
        }
        const res = await fetch(`{{ url('admin/inventory/api/variants') }}/${pid}`);
        const variants = await res.json();
        variantSel.innerHTML = '<option value="">-- Chọn biến thể --</option>';
        variants.forEach(v => {
            variantSel.innerHTML += `<option value="${v.id}">${v.label} (Tồn: ${v.stock})</option>`;
        });
        variantSel.disabled = false;
    });
}

document.querySelectorAll('.item-row').forEach(bindRow);
</script>
@endpush

@endsection
