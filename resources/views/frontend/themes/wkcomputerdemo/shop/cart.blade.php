@extends('layouts.app')

@section('title', 'Giỏ hàng của bạn - WKcomputer')

@section('content')
<div style="background:#f8f9fa; padding:20px 0 40px; min-height:60vh;">
    <div class="wk-container">
        
        @if(empty($cart))
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h1 style="font-size:24px; font-weight:700; color:#333; margin:0;">Giỏ hàng (0)</h1>
        </div>
        <div style="background:#fff;border-radius:8px;padding:80px 20px;text-align:center;display:flex;flex-direction:column;align-items:center;">
            <div style="width:120px;height:120px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
                <i class="fas fa-shopping-cart" style="font-size:48px;color:#cbd5e1;"></i>
            </div>
            <p style="color:#64748b;font-size:14px;margin-bottom:24px;">Chưa có sản phẩm nào trong giỏ hàng</p>
            <a href="{{ route('shop.index') }}" class="wk-btn" style="background:#e11d48;color:#fff;border-radius:4px;padding:10px 24px;font-weight:600;">
                Mua sắm ngay
            </a>
        </div>
        @else

        {{-- Header row with title and action --}}
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:20px;">
            <h1 style="font-size:24px; font-weight:700; color:#111827; margin:0;">Giỏ hàng ({{ count($cart) }})</h1>
            <div style="display:flex; align-items:center; gap:20px;">
                <form method="POST" action="{{ route('cart.clear') }}" onsubmit="return confirm('Xóa toàn bộ giỏ hàng?')">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#0ea5e9; font-size:14px; cursor:pointer;">Xóa tất cả</button>
                </form>
            </div>
        </div>

        <div class="wk-cart-layout">

            {{-- Cart Items Left Panel --}}
            <div class="wk-cart-main-panel">
                
                {{-- Table Header --}}
                <div class="wk-cart-table-header">
                    <div style="text-align:center;"><input type="checkbox" checked style="width:16px; height:16px; accent-color:#e11d48; cursor:pointer;"></div>
                    <div>Sản phẩm</div>
                    <div style="text-align:center;">Đơn giá</div>
                    <div style="text-align:center;">Số lượng</div>
                    <div style="text-align:right;">Thành tiền</div>
                </div>

                {{-- Table Items --}}
                @foreach($cart as $key => $item)
                @php
                    $itemImage = $item['image'] ?? null;
                    if ($itemImage && !str_starts_with($itemImage, 'http') && !str_starts_with($itemImage, '/')) {
                        $itemImage = '/media-files/' . $itemImage;
                    }
                    $itemSlug = $item['slug'] ?? null;
                    $itemTotal = ($item['price'] ?? 0) * ($item['qty'] ?? 1);
                @endphp
                <div class="wk-cart-item-row" data-key="{{ $key }}">
                    <div class="wk-cart-col-check">
                        <input type="checkbox" checked style="width:16px; height:16px; accent-color:#e11d48; cursor:pointer;">
                    </div>
                    
                    <div class="wk-cart-col-product">
                        <a href="{{ $itemSlug ? url($itemSlug) : '#' }}" class="wk-cart-img-box">
                            @if($itemImage)
                            <img src="{{ $itemImage }}" alt="{{ $item['name'] }}">
                            @else
                            <i class="fas fa-image" style="font-size:24px; color:#cbd5e1;"></i>
                            @endif
                        </a>
                        <div class="wk-cart-info-box">
                            <a href="{{ $itemSlug ? url($itemSlug) : '#' }}" class="wk-cart-item-name">
                                {{ $item['name'] }}
                            </a>
                            <div class="wk-cart-item-sku">
                                SKU: {{ $item['sku'] ?? $key }}<br>
                                Phân loại: Mặc định
                            </div>
                            <div class="wk-cart-mobile-price">
                                <span class="wk-cart-mobile-unit-price">{{ number_format($item['price'] ?? 0, 0, ',', '.') }}₫</span>
                                @if(!empty($item['original_price']) && $item['original_price'] > $item['price'])
                                <span class="wk-cart-mobile-orig-price">{{ number_format($item['original_price'], 0, ',', '.') }}₫</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="wk-cart-col-price">
                        <div style="font-weight:700; font-size:15px; color:#111827;">{{ number_format($item['price'] ?? 0, 0, ',', '.') }}₫</div>
                        @if(!empty($item['original_price']) && $item['original_price'] > $item['price'])
                        <div style="font-size:12px; color:#94a3b8; text-decoration:line-through; margin-top:4px;">{{ number_format($item['original_price'], 0, ',', '.') }}₫</div>
                        @endif
                    </div>
                    
                    <div class="wk-cart-col-qty">
                        <form method="POST" action="{{ route('cart.update') }}" class="cart-qty-form" data-key="{{ $key }}" style="display:inline-flex; border:1px solid #e2e8f0; border-radius:4px; overflow:hidden; background:#fff;">
                            @csrf
                            <input type="hidden" name="key" value="{{ $key }}">
                            <input type="hidden" name="product_id" value="{{ $key }}">
                            <button type="button" onclick="changeQty(this, -1)" style="width:28px; height:28px; background:#f8f9fa; border:none; cursor:pointer; color:#64748b; font-size:15px; line-height:1;">-</button>
                            <input type="number" name="qty" value="{{ $item['qty'] ?? 1 }}" min="1" max="99" onchange="submitQty(this)" style="width:38px; height:28px; text-align:center; border:none; border-left:1px solid #e2e8f0; border-right:1px solid #e2e8f0; font-size:13px; outline:none; -moz-appearance:textfield;">
                            <button type="button" onclick="changeQty(this, 1)" style="width:28px; height:28px; background:#f8f9fa; border:none; cursor:pointer; color:#64748b; font-size:15px; line-height:1;">+</button>
                        </form>
                        <form method="POST" action="{{ route('cart.remove') }}" class="cart-remove-form" data-key="{{ $key }}" onsubmit="return removeItem(this, event);" style="margin-top:6px;">
                            @csrf
                            <input type="hidden" name="key" value="{{ $key }}">
                            <input type="hidden" name="product_id" value="{{ $key }}">
                            <button type="submit" style="background:none; border:none; color:#ef4444; font-size:12px; cursor:pointer; padding:0;"><i class="far fa-trash-alt" style="margin-right:2px;"></i> Xóa</button>
                        </form>
                    </div>
                    
                    <div class="wk-cart-col-total cart-item-total" data-key="{{ $key }}">
                        {{ number_format($itemTotal, 0, ',', '.') }}₫
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Summary Right Panel --}}
            <div class="wk-cart-summary-col">
                
                {{-- Promotions --}}
                <div style="background:#fff; border-radius:8px; padding:16px;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                        <div style="font-weight:700; font-size:15px; color:#111827;">Khuyến mãi</div>
                        <a href="#" style="color:#0ea5e9; font-size:13px; text-decoration:none; font-weight:500;">
                            <i class="fas fa-ticket-alt"></i> Chọn hoặc nhập khuyến mãi
                        </a>
                    </div>
                    <div style="font-size:13px; color:#64748b; line-height:1.5;">
                        Đơn hàng chưa đủ điều kiện áp dụng khuyến mãi. Vui lòng mua thêm để áp dụng
                    </div>
                </div>
                
                {{-- Checkout Summary --}}
                <div style="background:#fff; border-radius:8px; padding:16px;">
                    <div style="font-weight:700; font-size:16px; color:#111827; margin-bottom:16px;">Thanh toán</div>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:14px; color:#475569;">
                        <span>Tổng tạm tính</span>
                        <span class="cart-subtotal-val" style="font-weight:600; color:#111827;">{{ number_format($subtotal ?? 0, 0, ',', '.') }}₫</span>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between; align-items:center; font-size:14px; color:#475569;">
                        <span>Thành tiền</span>
                        <span class="cart-total-val" style="font-weight:700; font-size:22px; color:#e11d48;">{{ number_format($subtotal ?? 0, 0, ',', '.') }}₫</span>
                    </div>
                    
                    <div style="text-align:right; font-size:12px; color:#64748b; margin-bottom:16px;">(Đã bao gồm VAT)</div>
                    
                    <a href="{{ route('checkout.index') }}" style="display:block; text-align:center; background:#e11d48; color:#fff; border-radius:4px; padding:14px; text-decoration:none; transition:background 0.2s;" onmouseover="this.style.background='#be123c'" onmouseout="this.style.background='#e11d48'">
                        <div style="font-weight:700; font-size:16px;">THANH TOÁN</div>
                        @guest
                        <div style="font-size:12px; font-weight:400; margin-top:4px;">Bạn cần đăng nhập để tiếp tục</div>
                        @endguest
                    </a>
                </div>
                
                {{-- Fundiin Promo Widget --}}
                @if(setting('fundiin_enabled', '0') == '1')
                <div class="fundiin-promotion__panel" style="background:#fff; border-radius:8px; padding:16px; margin:0;">
                    <div class="fundiin-promotion__title">
                        <span>Trả sau đến 12 tháng với</span>
                        <div class="fundiin-promotion__logo-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span class="fundiin-promotion__logo-text">fundiin</span>
                        <i class="fas fa-question-circle fundiin-promotion__help-btn" onclick="toggleFundiinPromoModal(true)"></i>
                    </div>
                    
                    <div class="fundiin-promotion__banner" onclick="toggleFundiinPromoModal(true)">
                        <div class="fundiin-promotion__badge">
                            <i class="fas fa-percentage" style="color:#fff;font-size:14px;"></i>
                        </div>
                        <div class="fundiin-promotion__banner-text">
                            Giảm đến <strong>50K</strong> khi thanh toán qua Fundiin. <span>xem thêm</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
        </div>
        @endif
    </div>
</div>

<style>
/* WK Cart Responsive Styles */
.wk-cart-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 24px;
    align-items: start;
}
.wk-cart-main-panel {
    background: #fff;
    border-radius: 8px;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.wk-cart-summary-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: sticky;
    top: 20px;
}
.wk-cart-table-header {
    display: grid;
    grid-template-columns: 32px 1fr 120px 120px 140px;
    align-items: center;
    padding-bottom: 12px;
    border-bottom: 1px solid #f1f5f9;
    margin-bottom: 12px;
    font-size: 14px;
    font-weight: 700;
    color: #333;
}
.wk-cart-item-row {
    display: grid;
    grid-template-columns: 32px 1fr 120px 120px 140px;
    align-items: start;
    padding: 16px 0;
    border-bottom: 1px solid #f1f5f9;
}
.wk-cart-item-row:last-child {
    border-bottom: none;
}
.wk-cart-col-check {
    text-align: center;
    padding-top: 30px;
}
.wk-cart-col-product {
    display: flex;
    gap: 14px;
    padding-right: 12px;
}
.wk-cart-img-box {
    width: 80px;
    height: 80px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
    flex-shrink: 0;
    text-decoration: none;
    background: #fff;
}
.wk-cart-img-box img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
.wk-cart-info-box {
    flex: 1;
    min-width: 0;
}
.wk-cart-item-name {
    font-size: 14px;
    font-weight: 500;
    color: #1e293b;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 4px;
    line-height: 1.4;
}
.wk-cart-item-name:hover {
    color: #e11d48;
}
.wk-cart-item-sku {
    font-size: 12px;
    color: #82869e;
}
.wk-cart-mobile-price {
    display: none;
}
.wk-cart-col-price {
    text-align: center;
    padding-top: 20px;
}
.wk-cart-col-qty {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
}
.wk-cart-col-total {
    text-align: right;
    font-weight: 700;
    font-size: 16px;
    color: #e11d48;
    padding-top: 20px;
}

@media (max-width: 991px) {
    .wk-cart-layout {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .wk-cart-summary-col {
        position: static;
    }
}

@media (max-width: 768px) {
    .wk-cart-table-header {
        display: none;
    }
    .wk-cart-item-row {
        display: flex;
        flex-wrap: wrap;
        position: relative;
        padding: 14px 0;
        gap: 8px;
    }
    .wk-cart-col-check {
        padding-top: 0;
        margin-right: 4px;
    }
    .wk-cart-col-product {
        flex: 1;
        min-width: 0;
        padding-right: 0;
    }
    .wk-cart-img-box {
        width: 64px;
        height: 64px;
    }
    .wk-cart-col-price {
        display: none;
    }
    .wk-cart-mobile-price {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 4px;
    }
    .wk-cart-mobile-unit-price {
        font-weight: 700;
        font-size: 14px;
        color: #e11d48;
    }
    .wk-cart-mobile-orig-price {
        font-size: 11px;
        color: #94a3b8;
        text-decoration: line-through;
    }
    .wk-cart-col-qty {
        padding-top: 4px;
        padding-left: 28px;
        flex-direction: row;
        gap: 12px;
        align-items: center;
        width: auto;
    }
    .wk-cart-col-qty form {
        margin-top: 0 !important;
    }
    .wk-cart-col-total {
        margin-left: auto;
        padding-top: 4px;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        align-self: center;
    }
}

/* Remove default number input spinners */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

/* Fundiin Promotion Widget styling */
.fundiin-promotion__panel {
    text-align: left;
    font-family: 'Outfit', 'Inter', sans-serif;
}
.fundiin-promotion__title {
    font-size: 14px;
    color: #1e293b;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    font-weight: 500;
}
.fundiin-promotion__logo-icon {
    display: inline-flex;
    flex-direction: column;
    gap: 2px;
    width: 12px;
    margin: 0 4px 0 6px;
    vertical-align: middle;
}
.fundiin-promotion__logo-icon span {
    height: 2px;
    border-radius: 1px;
}
.fundiin-promotion__logo-icon span:nth-child(1) { width: 12px; background: #3b82f6; }
.fundiin-promotion__logo-icon span:nth-child(2) { width: 9px; background: #06b6d4; }
.fundiin-promotion__logo-icon span:nth-child(3) { width: 6px; background: #6366f1; }

.fundiin-promotion__logo-text {
    font-weight: 800;
    color: #0f172a;
    font-size: 15px;
    margin-right: 6px;
}
.fundiin-promotion__help-btn {
    color: #94a3b8;
    font-size: 14px;
    cursor: pointer;
    transition: color 0.2s;
}
.fundiin-promotion__help-btn:hover {
    color: #475569;
}
.fundiin-promotion__banner {
    background: linear-gradient(90deg, #00d2c4 0%, #7547ec 100%);
    border-radius: 8px;
    padding: 10px 16px;
    display: flex;
    align-items: center;
    color: #fff;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(117, 71, 236, 0.15);
    transition: all 0.2s ease;
}
.fundiin-promotion__banner:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(117, 71, 236, 0.25);
}
.fundiin-promotion__badge {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 28px;
    height: 28px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    flex-shrink: 0;
}
.fundiin-promotion__banner-text {
    font-size: 13px;
    font-weight: 600;
    line-height: 1.4;
}
.fundiin-promotion__banner-text strong {
    color: #ffeb3b;
    font-weight: 800;
}
.fundiin-promotion__banner-text span {
    text-decoration: underline;
    font-style: italic;
    margin-left: 4px;
}

/* Modal Styling */
.fundiin-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 99999;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.fundiin-modal.show {
    display: flex;
    opacity: 1;
}
.fundiin-modal__body {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    width: 100%;
    max-width: 480px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    position: relative;
    transform: scale(0.9);
    transition: transform 0.3s ease;
    text-align: center;
}
.fundiin-modal.show .fundiin-modal__body {
    transform: scale(1);
}
.fundiin-modal__close {
    position: absolute;
    top: 16px;
    right: 16px;
    font-size: 24px;
    color: #94a3b8;
    cursor: pointer;
    transition: color 0.2s;
    background: none;
    border: none;
    line-height: 1;
}
.fundiin-modal__close:hover {
    color: #475569;
}
.fundiin-modal__title {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 20px;
    margin-top: 10px;
}
.fundiin-coupon-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.fundiin-coupon-item {
    display: flex;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    position: relative;
    height: 100px;
}
.fundiin-coupon-item__left {
    background: linear-gradient(135deg, #00d2c4 0%, #7547ec 100%);
    width: 80px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
    flex-shrink: 0;
    position: relative;
}
.fundiin-coupon-item__left-icon {
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.fundiin-coupon-item__left-icon span {
    height: 3px;
    background: #fff;
    border-radius: 1.5px;
}
.fundiin-coupon-item__left-icon span:nth-child(1) { width: 18px; }
.fundiin-coupon-item__left-icon span:nth-child(2) { width: 14px; }
.fundiin-coupon-item__left-icon span:nth-child(3) { width: 10px; }

.fundiin-coupon-item__divider {
    border-left: 2px dashed #cbd5e1;
    position: relative;
    height: 100%;
}
.fundiin-coupon-item__right {
    flex: 1;
    padding: 12px 16px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: left;
}
.fundiin-coupon-item__header {
    display: flex;
    align-items: center;
    gap: 8px;
}
.fundiin-coupon-item__label {
    font-size: 13px;
    color: #64748b;
}
.fundiin-coupon-item__code {
    border: 1.5px solid #ff6d00;
    color: #ff6d00;
    background: #fff3e0;
    padding: 1px 8px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 11px;
}
.fundiin-coupon-item__value {
    font-size: 15px;
    font-weight: 800;
    color: #1e293b;
}
.fundiin-coupon-item__footer {
    border-left: 2px solid #e2e8f0;
    padding-left: 8px;
    font-size: 12px;
    color: #64748b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

@push('scripts')
<script>
function changeQty(btn, delta) {
    const form = btn.closest('.cart-qty-form');
    const input = form.querySelector('input[name="qty"]');
    let val = parseInt(input.value) + delta;
    if (isNaN(val) || val < 1) val = 1;
    if (val > 99) val = 99;
    input.value = val;
    submitQty(input);
}

function submitQty(input) {
    const form = input.closest('.cart-qty-form');
    const key = form.dataset.key;
    const qty = parseInt(input.value) || 1;
    const token = form.querySelector('input[name="_token"]')?.value || (window.wkEndpoints?.csrfToken || '');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ key: key, qty: qty, quantity: qty })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            // Update item total
            const itemTotalEl = document.querySelector(`.cart-item-total[data-key="${key}"]`);
            if (itemTotalEl && data.formatted_item_total) {
                itemTotalEl.textContent = data.formatted_item_total;
            }
            // Update subtotal and total
            document.querySelectorAll('.cart-subtotal-val').forEach(el => el.textContent = data.formatted_subtotal);
            document.querySelectorAll('.cart-total-val').forEach(el => el.textContent = data.formatted_subtotal);
            if (typeof window.wkUpdateCartBadge === 'function') {
                window.wkUpdateCartBadge();
            }
        } else {
            form.submit();
        }
    })
    .catch(() => {
        form.submit();
    });
}

function removeItem(form, e) {
    if (e) e.preventDefault();
    if (!confirm('Xóa sản phẩm này khỏi giỏ hàng?')) return false;

    const key = form.dataset.key;
    const token = form.querySelector('input[name="_token"]')?.value || (window.wkEndpoints?.csrfToken || '');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ key: key, product_id: key })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            if (data.count === 0) {
                window.location.reload();
            } else {
                const row = form.closest('div[style*="display:grid; grid-template-columns: 32px 1fr"]');
                if (row) row.remove();
                document.querySelectorAll('.cart-subtotal-val').forEach(el => el.textContent = data.formatted_subtotal || '0₫');
                document.querySelectorAll('.cart-total-val').forEach(el => el.textContent = data.formatted_subtotal || '0₫');
                if (typeof window.wkUpdateCartBadge === 'function') {
                    window.wkUpdateCartBadge();
                }
            }
        } else {
            form.submit();
        }
    })
    .catch(() => {
        form.submit();
    });

    return false;
}

// Toggle Fundiin Promo Modal
function toggleFundiinPromoModal(show) {
    const modal = document.getElementById('fundiin-promo-modal');
    if (!modal) return;
    if (show) {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    } else {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
}
</script>
@endpush

{{-- Fundiin Promo Modal --}}
@if(setting('fundiin_enabled', '0') == '1')
<div id="fundiin-promo-modal" class="fundiin-modal" onclick="if(event.target === this) toggleFundiinPromoModal(false)">
    <div class="fundiin-modal__body">
        <button class="fundiin-modal__close" onclick="toggleFundiinPromoModal(false)">&times;</button>
        <h4 class="fundiin-modal__title">Mã giảm giá khi thanh toán qua Fundiin</h4>
        
        <div class="fundiin-coupon-list">
            <!-- Coupon 1 -->
            <div class="fundiin-coupon-item">
                <div class="fundiin-coupon-item__left">
                    <div class="fundiin-coupon-item__left-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="fundiin-coupon-item__divider"></div>
                <div class="fundiin-coupon-item__right">
                    <div class="fundiin-coupon-item__header">
                        <span class="fundiin-coupon-item__label">Nhập mã</span>
                        <span class="fundiin-coupon-item__code">XINCHAO20</span>
                    </div>
                    <div class="fundiin-coupon-item__value">Giảm 20% tối đa 30K</div>
                    <div class="fundiin-coupon-item__footer">Dành cho khách hàng lần đầu thanh toán Fundiin</div>
                </div>
            </div>

            <!-- Coupon 2 -->
            <div class="fundiin-coupon-item">
                <div class="fundiin-coupon-item__left">
                    <div class="fundiin-coupon-item__left-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="fundiin-coupon-item__divider"></div>
                <div class="fundiin-coupon-item__right">
                    <div class="fundiin-coupon-item__header">
                        <span class="fundiin-coupon-item__label">Nhập mã</span>
                        <span class="fundiin-coupon-item__code">XINCHAO03</span>
                    </div>
                    <div class="fundiin-coupon-item__value">Giảm 3% tối đa 50K</div>
                    <div class="fundiin-coupon-item__footer">Dành cho khách hàng lần đầu thanh toán Fundiin</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
