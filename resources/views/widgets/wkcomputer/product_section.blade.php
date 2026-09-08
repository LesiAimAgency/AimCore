@php
    $cols = max(1, min(6, (int)($columns ?? 5)));
@endphp

<section class="wk-section wk-widget-product-section" style="padding:16px 0;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title">
                <i class="{{ $icon ?? 'fas fa-fire' }}"></i>
                {{ $title ?? 'Sản phẩm' }}
            </h2>
            <a href="{{ $viewAllUrl ?? route('shop.index') }}" class="wk-view-all">
                Xem tất cả <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="wk-products-grid" style="display:grid; grid-template-columns:repeat({{ $cols }}, 1fr); gap:12px;">
            @forelse($products as $product)
                <x-shop.product-card :product="$product" />
            @empty
                <div style="grid-column:1/-1;padding:30px;text-align:center;color:#666;background:#f8f9fa;border-radius:8px;">
                    Đang cập nhật sản phẩm...
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
.wk-section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; border-bottom: 2px solid #e11d48; padding-bottom: 8px; }
.wk-section-title { font-size: 18px; font-weight: 800; color: #1e293b; text-transform: uppercase; margin: 0; display: flex; align-items: center; gap: 8px; }
.wk-section-title i { color: #e11d48; }
.wk-view-all { font-size: 13px; font-weight: 600; color: #e11d48; text-decoration: none; display: flex; align-items: center; gap: 4px; }
.wk-view-all:hover { color: #be123c; }
@media (max-width: 991px) {
    .wk-products-grid { grid-template-columns: repeat(3, 1fr) !important; }
}
@media (max-width: 576px) {
    .wk-products-grid { grid-template-columns: repeat(2, 1fr) !important; gap: 8px !important; }
}
</style>
