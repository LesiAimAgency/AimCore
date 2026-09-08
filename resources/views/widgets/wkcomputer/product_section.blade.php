<section class="wk-section wk-widget-product-section" style="padding:16px 0;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title">
                <i class="{{ $icon ?? 'fas fa-boxes-stacked' }}"></i>
                {{ $title ?? 'Sản phẩm' }}
            </h2>
            <a href="{{ $viewAllUrl ?? route('shop.index') }}" class="wk-view-all">
                Xem tất cả <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="wk-products-grid" @if(isset($columns) && (int)$columns === 4) style="grid-template-columns:repeat(4,1fr);" @endif>
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
