@props(['product'])

@if(empty($product))
    @php return; @endphp
@endif

@php
    $price = (float) ($product->effective_price ?? ($product->sale_price && $product->sale_price < $product->price ? $product->sale_price : $product->price));
    $comparePrice = (float) ($product->compare_price ?? ($product->sale_price && $product->sale_price < $product->price ? $product->price : 0));
    $hasDiscount = $comparePrice > 0 && $comparePrice > $price;
    $discountPercent = $hasDiscount ? round((($comparePrice - $price) / $comparePrice) * 100) : 0;

    // Image: try main image, then first in array
    $image = $product->image ?? (is_array($product->images) && count($product->images) ? $product->images[0] : null);
    if ($image && !str_starts_with($image, 'http') && !str_starts_with($image, '/')) {
        $image = '/media-files/' . $image;
    }

    // Category name: prefer specific child category over generic root
    $cat = $product->categories->whereNotNull('parent_id')->last() 
        ?? $product->categories->last() 
        ?? $product->category;
    $catName = $cat?->name ?? '';

    // Specs from additional_info (JSON or string) with smart fallbacks
    $specs = [];
    if (!empty($product->additional_info)) {
        $info = is_string($product->additional_info) ? json_decode($product->additional_info, true) : $product->additional_info;
        if (is_array($info)) {
            foreach ($info as $key => $val) {
                if (!empty($val) && is_string($val) && mb_strlen($val) <= 25) {
                    $specs[] = $val;
                }
            }
        }
    }
    // Fallback: extract specs from short_description list items
    if (empty($specs) && !empty($product->short_description)) {
        if (preg_match_all('/<li>(?:<strong>[^<]*:?<\/strong>\s*)?([^<]+)<\/li>/iu', $product->short_description, $matches)) {
            foreach (array_slice($matches[1], 0, 3) as $specVal) {
                $clean = trim(html_entity_decode(strip_tags($specVal)));
                if (!empty($clean) && mb_strlen($clean) <= 25) {
                    $specs[] = $clean;
                }
            }
        }
    }
    // Fallback: extract key tech keywords from product name
    if (empty($specs) && !empty($product->name)) {
        $name = $product->name;
        if (preg_match('/(\bRTX\s*\d{4}(?:\s*Ti|\s*Super)?\b|\bGTX\s*\d{4}\b|\bRX\s*\d{4}(?:\s*XT)?\b|\bCore\s*i[3579][-\s]*\w+\b|\bRyzen\s*[3579][-\s]*\w+\b)/i', $name, $m)) {
            $specs[] = trim($m[1]);
        }
        if (preg_match('/(\b\d+\s*GB\b|\b\d+\s*TB\b|\b\d+G\b)/i', $name, $m)) {
            if (!in_array(trim($m[1]), $specs)) $specs[] = trim($m[1]);
        }
        if (preg_match('/(\bGDDR\d+\b|\bDDR\d+\b|\b\d{4}\s*MHz\b|\bNVMe\b)/i', $name, $m)) {
            if (!in_array(trim($m[1]), $specs)) $specs[] = trim($m[1]);
        }
    }

    // Rating (database stores rating_average & rating_count)
    $rating = (float) ($product->reviews_avg_rating ?? $product->rating_average ?? $product->average_rating ?? 0);
    $reviewCount = (int) ($product->reviews_count ?? $product->rating_count ?? 0);

    // Slug & URL (Multisite: always route to /wkcomputer/{slug})
    $slug = trim($product->slug ?? '', '/');
    $productUrl = !empty($slug) ? url('/wkcomputer/' . $slug) : '#';

    // Warranty & stock status for tooltip
    $warranty = 'Bảo hành chính hãng';
    if (!empty($product->description) && preg_match('/Bảo\s*Hành\s*(\d+\s*(?:Tháng|tháng|Năm|năm))/iu', $product->description, $wMatch)) {
        $warranty = 'Bảo hành ' . $wMatch[1];
    } elseif (!empty($product->name) && preg_match('/BH\s*(\d+T)/i', $product->name, $wMatch)) {
        $warranty = 'Bảo hành ' . $wMatch[1];
    }
    $inStock = ($product->stock_status ?? 'in_stock') === 'in_stock' && ($product->stock_quantity === null || (int)$product->stock_quantity > 0);
@endphp

<div class="wk-product-card" onmouseenter="showTooltip(this)" onmousemove="moveTooltip(event, this)" onmouseleave="hideTooltip(this)">
    {{-- Image --}}
    <a href="{{ $productUrl }}" class="wk-card-img-wrap" style="position:relative; display:block;">

        @if($price >= 1000000)
        <span class="wk-badge wk-badge-installment">Trả góp 0%</span>
        @endif

        <img class="wk-card-img"
             src="{{ $image ?? 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\'%3E%3Crect width=\'200\' height=\'200\' fill=\'%23f5f5f5\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' font-family=\'Arial\' font-size=\'12\' fill=\'%23aaa\' text-anchor=\'middle\' dy=\'.4em\'%3ENo Image%3C/text%3E%3C/svg%3E' }}"
             alt="{{ $product->name }}"
             loading="lazy"
             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\'%3E%3Crect width=\'200\' height=\'200\' fill=\'%23f5f5f5\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' font-family=\'Arial\' font-size=\'12\' fill=\'%23aaa\' text-anchor=\'middle\' dy=\'.4em\'%3ENo Image%3C/text%3E%3C/svg%3E'">

        @if($hasDiscount)
        @php $saveAmount = $comparePrice - $price; @endphp
        <div style="position:absolute; bottom:-4px; left:0; width:96px; height:40px; display:flex; flex-direction:column; align-items:flex-start; justify-content:center; background-image:url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTYiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA5NiA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iOTYiIGhlaWdodD0iNDAiIHJ4PSI0IiBmaWxsPSJ1cmwoI3BhaW50MF9saW5lYXIpIiAvPgogIDxtYXNrIGlkPSJtYXNrMCIgbWFzay10eXBlPSJhbHBoYSIgbWFza1VuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeD0iMCIgeT0iMCIgd2lkdGg9Ijk2IiBoZWlnaHQ9IjQwIj4KICAgIDxyZWN0IHdpZHRoPSI5NiIgaGVpZ2h0PSI0MCIgcng9IjQiIGZpbGw9IndoaXRlIiAvPgogIDwvbWFzaz4KICA8ZyBtYXNrPSJ1cmwoI21hc2swKSI+CiAgICA8cGF0aCBvcGFjaXR5PSIwLjMiCiAgICAgIGQ9Ik03NC4yNDQ2IC05LjAyODY5TDY1Ljg3NjcgOC45MTYyMUw3MC43NzA4IDExLjE5ODNMNjMuOTI0NCAyNS44ODA1TDg0LjQ3MjQgMTEuNjI5M0w3Ny45NDcgOC41ODY0Mkw5MC41NTgxIC0xLjQyMTU2TDc0LjI0NDYgLTkuMDI4NjlaIgogICAgICBmaWxsPSIjMUIxRDI5IiAvPgogIDwvZz4KICA8ZGVmcz4KICAgIDxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhciIgeDE9IjM1LjcyMDkiIHkxPSIxLjY2NTQ0ZS0wNiIgeDI9IjU3Ljg4ODYiIHkyPSI0MC4wODczIgogICAgICBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CiAgICAgIDxzdG9wIHN0b3AtY29sb3I9IiNBQTIwRkYiIC8+CiAgICAgIDxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzQxM0VGRiIgLz4KICAgIDwvbGluZWFyR3JhZGllbnQ+CiAgPC9kZWZzPgo8L3N2Zz4='); background-size:100% 100%; padding:0 8px; z-index:10;">
            <div style="font-size:10px; font-weight:800; color:#facc15; line-height:1; margin-bottom:2px;">TIẾT KIỆM</div>
            <div style="font-size:14px; font-weight:800; color:#fff; line-height:1;">{{ number_format($saveAmount, 0, ',', '.') }} ₫</div>
        </div>
        @endif
    </a>

    {{-- Body --}}
    <div class="wk-card-body">
        @if($catName)
        <a href="{{ $cat?->slug ? url('/wkcomputer/cua-hang?categories[]=' . $cat->slug) : url('/wkcomputer/cua-hang') }}" class="wk-card-cat" style="text-decoration:none; display:inline-block;">{{ $catName }}</a>
        @endif

        <a href="{{ $productUrl }}" class="wk-card-name" title="{{ $product->name }}">{{ $product->name }}</a>

        {{-- Specs --}}
        @if(count($specs))
        <div class="wk-card-specs">
            @foreach(array_slice($specs, 0, 3) as $key => $val)
            <span class="wk-spec-tag">{{ $val }}</span>
            @endforeach
        </div>
        @endif

        {{-- Rating --}}
        @if($rating > 0)
        <div class="wk-card-rating">
            <span class="wk-stars">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor($rating))<i class="fas fa-star" style="font-size:11px;"></i>
                    @elseif($i - 0.5 <= $rating)<i class="fas fa-star-half-alt" style="font-size:11px;"></i>
                    @else<i class="far fa-star" style="font-size:11px;"></i>
                    @endif
                @endfor
            </span>
            @if($reviewCount > 0)<span class="wk-rating-count">({{ $reviewCount }})</span>@endif
        </div>
        @endif

        {{-- Price --}}
        <div class="wk-card-price-wrap">
            <div style="display:flex; align-items:baseline; gap:8px; flex-wrap:wrap;">
                <span class="wk-price-main">{{ number_format($price, 0, ',', '.') }}₫</span>
                @if($hasDiscount)
                <span class="wk-price-old">{{ number_format($comparePrice, 0, ',', '.') }}₫</span>
                @if($discountPercent > 0)
                <span class="wk-price-percent">-{{ $discountPercent }}%</span>
                @endif
                @endif
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="wk-card-footer">
        <button class="wk-btn-cart"
                data-add-cart="{{ $product->id }}"
                type="button">
            <i class="fas fa-cart-plus"></i>
            Thêm vào giỏ
        </button>
    </div>

    {{-- Hover Tooltip --}}
    <div class="wk-product-tooltip">
        <div style="background:#e11d48; color:#fff; padding:10px 12px; font-weight:700; font-size:14px; text-transform:uppercase; line-height:1.4;">
            {{ $product->name }}
        </div>
        <div style="padding:12px; background:#fff; border: 1px solid #e11d48; border-top: none;">
            <table style="width:100%; font-size:13px; line-height:1.6; margin-bottom:12px;">
                @if($hasDiscount && $comparePrice > $price)
                <tr>
                    <td style="color:#333; font-weight:600; width:35%; padding-bottom:6px;">Giá niêm yết</td>
                    <td style="padding-bottom:6px;">
                        <span style="text-decoration:line-through; color:#94a3b8; font-weight:600;">{{ number_format($comparePrice, 0, ',', '.') }}đ</span>
                        @if($discountPercent > 0)
                        <span style="color:#e11d48; font-weight:700; margin-left:4px;">-{{ $discountPercent }}%</span>
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td style="color:#333; font-weight:600; padding-bottom:6px;">Giá bán</td>
                    <td style="color:#e11d48; font-weight:700; padding-bottom:6px;">{{ number_format($price, 0, ',', '.') }}đ</td>
                </tr>
                <tr>
                    <td style="color:#333; font-weight:600; padding-bottom:6px;">Bảo hành</td>
                    <td style="color:#e11d48; font-weight:600; padding-bottom:6px;">{{ $warranty }}</td>
                </tr>
                <tr>
                    <td style="color:#333; font-weight:600;">Tình trạng</td>
                    <td style="color:{{ $inStock ? '#2e7d32' : '#dc2626' }}; font-weight:700;">{{ $inStock ? 'Còn hàng' : 'Hết hàng' }}</td>
                </tr>
            </table>
            
            <div style="border: 1px solid #e11d48; position: relative; padding: 16px 10px 10px; margin-top: 20px;">
                <div style="position: absolute; top: -14px; left: -1px; background: #e11d48; color: #fff; padding: 4px 16px 4px 12px; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; clip-path: polygon(0 0, 100% 0, 90% 50%, 100% 100%, 0 100%);">
                    <i class="fas fa-gift"></i> Khuyến mãi
                </div>
                <ul style="margin:0; padding-left:14px; font-size:12px; color:#000; line-height:1.6;">
                    @if(!empty($product->promotions) && is_array($product->promotions) && count($product->promotions) > 0)
                        @foreach($product->promotions as $promo)
                        <li style="margin-bottom:4px;">{{ $promo }}</li>
                        @endforeach
                    @else
                        <li>Bảo hành đổi mới trong thời gian đầu sử dụng – nhanh gọn.</li>
                        <li>Miễn phí giao hàng toàn quốc.</li>
                        <li>Hỗ trợ trả góp online toàn quốc – linh hoạt.</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

@once
<script>
    function showTooltip(card) {
        let tooltip = card.querySelector('.wk-product-tooltip') || card._tooltipNode;
        if(tooltip) {
            document.body.appendChild(tooltip);
            card._tooltipNode = tooltip;
            tooltip.style.display = 'block';
        }
    }
    function hideTooltip(card) {
        const tooltip = card._tooltipNode;
        if(tooltip) {
            tooltip.style.display = 'none';
            card.appendChild(tooltip);
            card._tooltipNode = null;
        }
    }
    function moveTooltip(e, card) {
        const tooltip = card._tooltipNode;
        if (!tooltip) return;
        
        let offsetX = 20;
        let offsetY = 20;
        
        let x = e.pageX + offsetX;
        let y = e.pageY + offsetY;
        
        // Prevent going off right edge of the viewport
        if (e.clientX + offsetX + tooltip.offsetWidth > window.innerWidth) {
            x = e.pageX - tooltip.offsetWidth - offsetX;
        }
        
        // Prevent going off bottom edge of the viewport
        if (e.clientY + offsetY + tooltip.offsetHeight > window.innerHeight) {
            y = e.pageY - tooltip.offsetHeight - offsetY;
        }
        
        tooltip.style.left = x + 'px';
        tooltip.style.top = y + 'px';
    }
</script>
@endonce

<style>
    .wk-product-card { position: relative; overflow: visible !important; }
    .wk-product-card:hover { z-index: 99999 !important; }
    .wk-card-img-wrap { position: relative; display: block; width: 100%; height: 180px; overflow: hidden; background: #fff; text-align: center; }
    .wk-card-img { max-width: 100% !important; max-height: 180px !important; width: auto !important; height: auto !important; object-fit: contain !important; display: inline-block !important; margin: 0 auto !important; }
    .wk-product-tooltip {
        display: none;
        position: absolute;
        width: 380px;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        z-index: 999999;
        pointer-events: none; /* prevent flickering when mouse enters tooltip */
    }
</style>
