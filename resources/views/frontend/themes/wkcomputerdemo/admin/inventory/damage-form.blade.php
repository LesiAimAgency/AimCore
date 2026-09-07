@extends('admin.layouts.app')
@section('title', 'Ghi nhận hàng huỷ')
@section('page-title', 'Ghi nhận hàng huỷ')
@section('page-subtitle', 'Ghi nhận hàng hỏng, hết hạn hoặc bị huỷ')
@section('page-actions')
    <a href="{{ route('admin.inventory.damages') }}" class="btn btn-ghost btn-sm">
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

<form action="{{ route('admin.inventory.damages.store') }}" method="POST">
    @csrf
    <div class="flex flex-col lg:flex-row gap-5 items-start">

        <div class="card flex-1 w-full">
            <div class="card-header"><span class="card-title">Thông tin hàng huỷ</span></div>
            <div class="card-body" style="display:flex;flex-direction:column;gap:14px;">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Ngày huỷ <span style="color:#ef4444">*</span></label>
                        <input type="date" name="damage_date" class="form-input"
                               value="{{ old('damage_date', now()->format('Y-m-d')) }}" required>
                    </div>
                    <div>
                        <label class="form-label">Lý do huỷ</label>
                        <select name="reason" class="form-select">
                            <option value="Hàng huỷ">Hàng huỷ</option>
                            <option value="Hàng hỏng">Hàng hỏng</option>
                            <option value="Hết hạn sử dụng">Hết hạn sử dụng</option>
                            <option value="Chụp hình huỷ">Chụp hình huỷ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="form-label">Sản phẩm <span style="color:#ef4444">*</span></label>
                    <select name="product_id" id="product-select" class="form-select" required>
                        <option value="">-- Chọn sản phẩm --</option>
                        @foreach($products as $p)
                        <option value="{{ $p->id }}"
                                data-has-variants="{{ $p->has_variants ? 1 : 0 }}"
                                {{ old('product_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->name }} (Tồn: {{ $p->stock }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <div id="variant-wrap" style="display:none;">
                    <label class="form-label">Biến thể</label>
                    <select name="variant_id" id="variant-select" class="form-select">
                        <option value="">-- Chọn biến thể --</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Quy cách <span style="color:#ef4444">*</span></label>
                        <input type="text" name="unit" class="form-input"
                               value="{{ old('unit', 'hộp') }}" placeholder="hộp, gói..." required>
                    </div>
                    <div>
                        <label class="form-label">Số lượng <span style="color:#ef4444">*</span></label>
                        <input type="number" name="quantity" class="form-input"
                               value="{{ old('quantity', 1) }}" min="1" required>
                    </div>
                </div>

                <div>
                    <label class="form-label">Ghi chú</label>
                    <textarea name="notes" class="form-textarea" rows="2"
                              placeholder="Ghi chú thêm...">{{ old('notes') }}</textarea>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[300px] shrink-0 flex flex-col gap-3 lg:sticky lg:top-5">
            <div class="card">
                <div class="card-body" style="display:flex;flex-direction:column;gap:10px;">
                    <button type="submit" class="btn btn-danger" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-triangle-exclamation"></i> Ghi nhận huỷ
                    </button>
                    <a href="{{ route('admin.inventory.damages') }}"
                       class="btn btn-ghost" style="width:100%;justify-content:center;">Huỷ</a>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('product-select').addEventListener('change', async function() {
    const pid = this.value;
    const hasVariants = this.selectedOptions[0]?.dataset.hasVariants === '1';
    const wrap = document.getElementById('variant-wrap');
    const sel  = document.getElementById('variant-select');
    if (!pid || !hasVariants) { wrap.style.display = 'none'; return; }
    sel.innerHTML = '<option value="">Đang tải...</option>';
    wrap.style.display = 'block';
    const res = await fetch(`{{ url('admin/inventory/api/variants') }}/${pid}`);
    const variants = await res.json();
    sel.innerHTML = '<option value="">-- Chọn biến thể --</option>';
    variants.forEach(v => {
        sel.innerHTML += `<option value="${v.id}">${v.label} (Tồn: ${v.stock})</option>`;
    });
});
</script>
@endpush

@endsection
