@php
    $p = $prefix ? $prefix . '[' : '';
    $s = $prefix ? ']' : '';
    $td = $transData ?? [];
@endphp

<div class="space-y-4">
    <div>
        <div class="flex items-center justify-between">
            <label class="form-label">
                Tên sản phẩm <span class="text-red-500">*</span>
                @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
            </label>
            @if(!$locale && $product)
                @php
                    $stock = $product->stock;
                    $status = $stock > 5 ? 'bg-green-100 text-green-700' : ($stock > 0 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700');
                    $label = $stock > 5 ? 'Sẵn hàng' : ($stock > 0 ? 'Sắp hết' : __('common.out_of_stock'));
                @endphp
                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $status }}">
                    {{ $label }}: {{ $stock }}
                </span>
            @endif
        </div>
        <input type="text"
               name="{{ $p }}name{{ $s }}"
               value="{{ old($p . 'name' . $s, $locale ? ($td['name'] ?? '') : ($product?->name ?? '')) }}"
               {{ !$locale ? 'required' : '' }}
               placeholder="Nhập tên sản phẩm..."
               class="form-input">
    </div>

    <div>
        <label class="form-label">
            Mô tả ngắn
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        @include('components.admin.editor', [
            'name'   => ($p . 'short_description' . $s),
            'value'  => old($p . 'short_description' . $s, $locale ? ($td['short_description'] ?? '') : ($product?->short_description ?? '')),
            'height' => 180,
        ])
    </div>

    <div>
        <label class="form-label">
            Mô tả chi tiết
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        @include('components.admin.editor', [
            'name'   => ($p . 'description' . $s),
            'value'  => old($p . 'description' . $s, $locale ? ($td['description'] ?? '') : ($product?->description ?? '')),
            'height' => 360,
        ])
    </div>

    <div>
        <label class="form-label">
            Thông tin bổ sung (Cấu hình, thông số...)
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        @include('components.admin.editor', [
            'name'   => ($p . 'additional_info' . $s),
            'value'  => old($p . 'additional_info' . $s, $locale ? ($td['additional_info'] ?? '') : ($product?->additional_info ?? '')),
            'height' => 250,
        ])
    </div>

 
</div>
