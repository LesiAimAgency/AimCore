<section class="wk-widget-deal-flash" style="padding:0 0 20px;">
    <div class="wk-container">
        <div class="wk-flash-section">
            <div class="wk-flash-header">
                <div class="wk-flash-badge">
                    <i class="fas fa-bolt"></i> {{ $title ?? 'FLASH SALE' }}
                </div>
                <div class="wk-countdown" data-end="{{ $endTimestamp ?? (now()->addDays(3)->timestamp * 1000) }}">
                    <div class="wk-countdown-unit"><span data-cd="h">00</span><small class="wk-countdown-label">GIỜ</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="m">00</span><small class="wk-countdown-label">PHÚT</small></div>
                    <span class="wk-countdown-sep">:</span>
                    <div class="wk-countdown-unit"><span data-cd="s">00</span><small class="wk-countdown-label">GIÂY</small></div>
                </div>
                <a href="{{ route('shop.index') }}?on_sale=1" style="color:#ffcdd2;font-size:12px;font-weight:600;margin-left:auto;white-space:nowrap;">Xem tất cả <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="wk-products-grid" style="grid-template-columns:repeat(auto-fill, minmax(200px, 1fr));gap:12px;">
                @forelse($products as $product)
                    <x-shop.product-card :product="$product" />
                @empty
                    <div style="grid-column:1/-1;padding:30px;text-align:center;color:#fff;background:rgba(0,0,0,0.2);border-radius:8px;">
                        Đang cập nhật sản phẩm khuyến mãi...
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
