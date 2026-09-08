@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="https://pc.baokim.vn/css/bk.css?v=1.0.0">
<style>
    /* Styling for tables inside short description */
    .wk-short-desc {
        font-size: 13px;
        color: #475569;
        line-height: 1.7;
        margin-bottom: 16px;
        padding: 12px;
        background: #f8fafc;
        border-radius: 8px;
        border-left: 3px solid var(--wk-primary);
        overflow-x: auto;
    }
    .wk-short-desc table {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        background: #fff;
    }
    .wk-short-desc th, .wk-short-desc td {
        border: 1px solid #e2e8f0;
        padding: 8px 12px;
        text-align: left;
    }
    .wk-short-desc th {
        background: #f1f5f9;
        font-weight: 600;
        color: #1e293b;
    }
    .wk-short-desc tr:nth-child(even) td {
        background: #f8fafc;
    }
    .wk-short-desc tr:hover td {
        background: #f1f5f9;
    }

    /* Fundiin Promotion Widget styling */
    .fundiin-promotion__panel {
        margin: 20px 0;
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
@endpush

@php
    $price = (float)($product->price ?? 0);
    $comparePrice = (float)($product->compare_price ?? 0);
    $hasDiscount = $comparePrice > 0 && $comparePrice > $price;
    $discountPct = $hasDiscount ? round((($comparePrice - $price) / $comparePrice) * 100) : 0;
    $savedAmount = $hasDiscount ? ($comparePrice - $price) : 0;

    // Images
    $mainImage = $product->image ?? null;
    $allImages = [];
    if ($mainImage) $allImages[] = $mainImage;
    if (is_array($product->images)) {
        foreach ($product->images as $img) {
            if ($img && !in_array($img, $allImages)) $allImages[] = $img;
        }
    }
    $allImages = array_values(array_filter($allImages));

    // Fix relative paths
    foreach ($allImages as &$img) {
        if ($img && !str_starts_with($img, 'http') && !str_starts_with($img, '/')) {
            $img = '/media-files/' . $img;
        }
    }
    unset($img);

    // Specs from additional_info
    $specs = [];
    if (!empty($product->additional_info)) {
        $info = is_string($product->additional_info) ? json_decode($product->additional_info, true) : $product->additional_info;
        if (is_array($info)) $specs = $info;
    }

    // First category
    $firstCat = $product->categories->first();
    $sku = $product->sku ?? 'N/A';
    $stock = $product->stock ?? 0;
    $stockStatus = $product->stock_status ?? ($stock > 0 ? 'instock' : 'outofstock');

    // Variants
    $hasVariants = (bool)($product->has_variants ?? false);
    $variants = $product->activeVariants ?? collect();

    // Reviews
    $approvedReviews = $product->approvedReviews()->latest()->get();
    $reviewCount = $approvedReviews->count();
    $rating = $approvedReviews->avg('rating') ?: 0.0;

    $starCounts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
    foreach ($approvedReviews as $r) {
        $starCounts[$r->rating] = ($starCounts[$r->rating] ?? 0) + 1;
    }
    $starPercentages = [];
    foreach ([5, 4, 3, 2, 1] as $star) {
        $starPercentages[$star] = $reviewCount > 0 ? round(($starCounts[$star] / $reviewCount) * 100) : 0;
    }
@endphp

@section('title', $product->name . ' - WKcomputer')
@section('description', strip_tags($product->short_description ?? $product->description ?? '') ?: 'Chi tiết sản phẩm ' . $product->name . ' - WKcomputer')

@section('content')

{{-- Breadcrumb --}}
<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
            @if($firstCat)
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li><a href="{{ url($firstCat->slug) }}">{{ $firstCat->name }}</a></li>
            @endif
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active" style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $product->name }}</li>
        </ol>
    </div>
</div>

{{-- PRODUCT DETAIL --}}
<div style="background:#f4f4f5;padding:20px 0 32px;">
    <div class="wk-container">
        <div class="product-layout-grid">

            {{-- LEFT COLUMN: Gallery & Tabs --}}
            <div class="product-layout-left">
                
                {{-- GALLERY CARD --}}
                <div class="wk-gallery-card wk-gallery-section">
                    <div class="wk-gallery">
                        {{-- Main image --}}
                        <div class="wk-gallery-main" id="wk-gallery-main">
                            @if(count($allImages))
                            <img src="{{ $allImages[0] }}"
                                 alt="{{ $product->name }}"
                                 id="main-img"
                                 style="width: 100%; height: 400px; object-fit: contain; transition: opacity .2s ease; display: block; margin: 0 auto; background: #fff; border-radius: 8px;">
                            @else
                            <div style="width:100%;height:360px;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:12px;color:#cbd5e1;">
                                <i class="fas fa-image" style="font-size:64px;"></i>
                                <span style="font-size:13px;">Chưa có ảnh sản phẩm</span>
                            </div>
                            @endif
                        </div>

                        {{-- Thumbnails --}}
                        @if(count($allImages) > 1)
                        <div class="wk-gallery-thumbs" style="margin-top:10px;">
                            @foreach($allImages as $i => $img)
                            <div class="wk-thumb {{ $i === 0 ? 'active' : '' }}" data-full="{{ $img }}">
                                <img src="{{ $img }}" alt="{{ $product->name }} - ảnh {{ $i + 1 }}">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                {{-- TABS CARD (Description / Specs / Reviews) --}}
                <div class="wk-tabs-card wk-tabs-section">
                    <div class="wk-tabs-wrap">
                        <div class="wk-tabs-nav">
                            <button class="wk-tab-btn active" data-tab="description">Mô tả sản phẩm</button>
                            @if(count($specs))
                            <button class="wk-tab-btn" data-tab="specs">Thông số kỹ thuật</button>
                            @endif
                            <button class="wk-tab-btn" data-tab="reviews">
                                Đánh giá ({{ $reviewCount }})
                            </button>
                        </div>

                        {{-- Description Tab --}}
                        <div class="wk-tab-panel active" data-tab="description">
                            <div class="wk-desc-collapse-wrapper" id="desc-wrapper">
                                @if($product->description)
                                <div style="font-size:14px;line-height:1.8;color:#334155;" class="wk-product-description">
                                    {!! $product->description !!}
                                </div>
                                @else
                                <p style="color:#94a3b8;text-align:center;padding:40px 0;">Chưa có mô tả chi tiết cho sản phẩm này.</p>
                                @endif
                                <div class="wk-desc-fade-overlay"></div>
                            </div>
                            @if($product->description)
                            <div class="wk-desc-toggle-container">
                                <button type="button" class="wk-btn-desc-toggle" onclick="toggleDescription()">
                                    <span id="desc-toggle-text">Xem tất cả</span>
                                    <i id="desc-toggle-icon" class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            @endif
                        </div>

                        {{-- Specs Tab --}}
                        @if(count($specs))
                        <div class="wk-tab-panel" data-tab="specs">
                            <table style="width:100%;border-collapse:collapse;font-size:14px;">
                                <tbody>
                                    <tr>
                                        <td colspan="2" style="padding:12px 16px; font-weight:700; color:#333333; background:#ffffff; border-bottom: 2px solid #e4e4e7;">Thông số chi tiết</td>
                                    </tr>
                                    @foreach($specs as $key => $val)
                                    <tr style="{{ $loop->index % 2 == 0 ? 'background:#f6f6f6;' : 'background:#ffffff;' }}">
                                        <td style="padding:12px 16px; color:#71717a; width:30%; vertical-align:top; font-weight:600;">{{ $key }}</td>
                                        <td style="padding:12px 16px; color:#18181b; vertical-align:top;">{{ is_array($val) ? implode(', ', $val) : $val }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                        {{-- Reviews Tab --}}
                        <div class="wk-tab-panel" data-tab="reviews">
                            <div style="display:flex; flex-wrap:wrap; background:#f4f4f5; border-radius:8px; margin-bottom:24px; border:1px solid #e4e4e7;">
                                {{-- Left Summary --}}
                                <div style="flex:1; min-width:280px; padding:24px; border-right:1px solid #e4e4e7;">
                                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                                        <div style="font-size:48px; font-weight:800; color:#18181b; line-height:1;">{{ number_format($rating ?: 5, 1) }}</div>
                                        <div>
                                            <div style="color:#ffa000; font-size:16px; margin-bottom:4px;">
                                                @for($s = 1; $s <= 5; $s++)
                                                    @if($s <= floor($rating ?: 5))<i class="fas fa-star"></i>
                                                    @elseif($s - 0.5 <= ($rating ?: 5))<i class="fas fa-star-half-alt"></i>
                                                    @else<i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div style="font-size:13px; color:#71717a;">{{ $reviewCount > 0 ? $reviewCount : 0 }} đánh giá</div>
                                        </div>
                                    </div>
                                    
                                    <div style="display:flex; flex-direction:column; gap:8px;">
                                        @foreach([5, 4, 3, 2, 1] as $star)
                                        <div style="display:flex; align-items:center; gap:12px; font-size:13px; color:#4b5563;">
                                            <div style="display:flex; gap:2px; color:#ffa000; width:70px;">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i<=$star)<i class="fas fa-star" style="font-size:10px;"></i>
                                                    @else<i class="far fa-star" style="font-size:10px; color:#d4d4d8;"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div style="flex:1; height:8px; background:#e4e4e7; border-radius:4px; overflow:hidden;">
                                                <div style="height:100%; background:#800000; width:{{ $starPercentages[$star] }}%; border-radius:4px;"></div>
                                            </div>
                                            <div style="width:60px; text-align:right; font-weight:600;">{{ $starPercentages[$star] }}% | {{ $starCounts[$star] }}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Right Form --}}
                                <div style="flex:1; min-width:280px; padding:24px; background:#f4f4f5; border-radius:0 8px 8px 0;">
                                    <div style="text-align:center; color:#ffa000; font-size:24px; margin-bottom:16px; cursor:pointer;" id="new-star-input">
                                        @for($s = 1; $s <= 5; $s++)
                                        <i class="fas fa-star" data-star="{{ $s }}" style="color:#ffa000;"></i>
                                        @endfor
                                    </div>
                                    <form id="review-form" action="{{ route('review.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="rating" id="new-rating-val" value="5">
                                        
                                        <div style="display:flex; flex-direction:column; gap:12px; margin-bottom:12px;">
                                            <div style="display:flex; gap:12px;">
                                                <input type="text" name="customer_name" placeholder="Họ tên của bạn" required style="flex:1; border:1px solid #d4d4d8; padding:10px 12px; border-radius:4px; font-size:13px; outline:none;" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                                                <input type="email" name="customer_email" placeholder="Email của bạn" required style="flex:1; border:1px solid #d4d4d8; padding:10px 12px; border-radius:4px; font-size:13px; outline:none;" value="{{ auth()->check() ? auth()->user()->email : '' }}">
                                            </div>
                                            <textarea name="comment" rows="3" required placeholder="Mời bạn để lại bình luận đánh giá chi tiết về sản phẩm..." style="width:100%; border:1px solid #d4d4d8; padding:10px 12px; border-radius:4px; font-size:13px; resize:vertical; outline:none;"></textarea>
                                        </div>

                                        <div style="display:flex; justify-content:flex-end;">
                                            <button type="submit" id="submit-review-btn" style="background:#800000; color:#fff; border:none; padding:10px 24px; border-radius:4px; font-weight:700; font-size:13px; cursor:pointer; text-transform:uppercase; transition: background 0.2s;">Gửi Đánh Giá</button>
                                        </div>
                                        <div id="review-alert" style="display:none; margin-top:12px; font-size:13px; padding:10px; border-radius:4px;"></div>
                                    </form>
                                </div>
                            </div>

                            {{-- Filter --}}
                            <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid #e4e4e7; flex-wrap:wrap;">
                                <span style="font-size:13px; color:#71717a; font-weight:700;">Lọc theo:</span>
                                <button type="button" class="wk-filter-btn active" data-rating="all" style="padding:6px 16px; background:#e0f2fe; color:#0369a1; border:none; border-radius:20px; font-size:13px; font-weight:600; cursor:pointer; outline:none;">Tất cả</button>
                                @foreach([5, 4, 3, 2, 1] as $s)
                                <button type="button" class="wk-filter-btn" data-rating="{{ $s }}" style="padding:6px 16px; background:#f4f4f5; color:#71717a; border:none; border-radius:20px; font-size:13px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:4px; outline:none;">
                                    {{ $s }} <i class="fas fa-star" style="font-size:10px; color:#a1a1aa;"></i>
                                </button>
                                @endforeach
                            </div>

                            {{-- Review List --}}
                            <div style="display:flex; flex-direction:column; gap:24px;">
                                @forelse($approvedReviews as $review)
                                @php
                                    $rName = $review->customer_name ?? $review->name ?? 'Khách hàng';
                                    $nameParts = explode(' ', trim($rName));
                                    $firstChar = mb_strtoupper(mb_substr($nameParts[0] ?? 'K', 0, 1));
                                    $lastChar = count($nameParts) > 1 ? mb_strtoupper(mb_substr(end($nameParts), 0, 1)) : '';
                                    $avatarText = $firstChar . $lastChar;
                                @endphp
                                <div class="wk-review-item" data-rating="{{ $review->rating }}" style="display:flex; gap:16px; border-bottom:1px solid #e4e4e7; padding-bottom:24px;">
                                    {{-- Avatar --}}
                                    <div style="width:40px; height:40px; border-radius:50%; background:#800000; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:14px; flex-shrink:0;">
                                        {{ $avatarText }}
                                    </div>
                                    
                                    {{-- Content --}}
                                    <div style="flex:1;">
                                        <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                                            <div>
                                                <div style="font-weight:700; color:#18181b; font-size:14px;">{{ $rName }}</div>
                                                <div style="font-size:12px; color:#10b981; font-weight:600; display:flex; align-items:center; gap:4px; margin-top:2px;">
                                                    <i class="fas fa-check-circle"></i> Đã Mua Hàng Từ Shop
                                                </div>
                                            </div>
                                            <div style="color:#ffa000; font-size:12px;">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i<=$review->rating)<i class="fas fa-star"></i>
                                                    @else<i class="far fa-star" style="color:#d4d4d8;"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        
                                        <div style="background:#f4f4f5; padding:16px; border-radius:8px; margin-bottom:12px; border: 1px solid #e4e4e7;">
                                            <div style="font-weight:700; font-size:13px; color:#18181b; margin-bottom:8px;">{{ $review->title ?: ($review->rating >= 4 ? 'Cực kì hài lòng' : 'Hài lòng') }}</div>
                                            <div style="font-size:13px; color:#52525b; line-height:1.6;">{{ $review->comment }}</div>
                                            <div style="font-size:12px; color:#a1a1aa; margin-top:12px;">{{ $review->created_at ? $review->created_at->diffForHumans() : '1 năm trước' }}</div>
                                        </div>

                                        {{-- Display Shop Reply --}}
                                        @if(!empty($review->reply))
                                        <div class="wk-review-reply-content" style="background:#fff7ed; border-left:3px solid #f97316; padding:12px 16px; border-radius:8px; margin-top:12px; margin-bottom:12px; margin-left: 20px;">
                                            <div style="font-weight:700; font-size:13px; color:#c2410c; margin-bottom:4px;"><i class="fas fa-reply"></i> Phản hồi từ cửa hàng:</div>
                                            <div style="font-size:13px; color:#7c2d12; line-height:1.6;">{{ $review->reply }}</div>
                                        </div>
                                        @endif
                                        
                                        <div style="display:flex; gap:16px; align-items:center;">
                                            <button type="button" class="wk-review-like-btn" data-id="{{ $review->id }}" style="background:#fff; border:1px solid #800000; color:#800000; padding:4px 12px; border-radius:4px; font-size:12px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:6px; outline:none; transition: background 0.2s;">
                                                <i class="far fa-thumbs-up"></i> Thích <span class="like-count">{{ $review->likes ?? 0 }}</span>
                                            </button>
                                            <button type="button" class="wk-reply-toggle-btn" style="background:none; border:none; color:#71717a; font-size:12px; font-weight:600; cursor:pointer; outline:none;">
                                                Gửi trả lời
                                            </button>
                                        </div>

                                        {{-- Reply Form --}}
                                        <div class="wk-reply-form-container" style="display:none; margin-top:12px; max-width: 500px;">
                                            <form class="wk-reply-form" action="/review/{{ $review->id }}/reply" method="POST">
                                                @csrf
                                                <div style="display:flex; gap:12px;">
                                                    <input type="text" name="reply" placeholder="Nhập câu trả lời của bạn..." required style="flex:1; border:1px solid #d4d4d8; padding:8px 12px; border-radius:4px; font-size:13px; outline:none;">
                                                    <button type="submit" style="background:#800000; color:#fff; border:none; padding:8px 16px; border-radius:4px; font-weight:700; font-size:13px; cursor:pointer;">Gửi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div style="text-align:center; padding:40px 0;">
                                        <i class="fas fa-star" style="font-size:48px; color:#e4e4e7; margin-bottom:12px;"></i>
                                        <p style="color:#a1a1aa; margin-bottom:16px;">Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN: Product Meta, Pricing, Purchase actions & Policies --}}
            <aside class="product-layout-right">
                
                {{-- Block 1: Title & Meta Info --}}
                <div class="wk-title-card">
                    {{-- Title & Meta Section --}}
                    <div class="wk-detail-title-section">
                        {{-- Title --}}
                        <h1 class="wk-detail-title">{{ $product->name }}</h1>
                        
                        {{-- Meta --}}
                        <div class="wk-detail-meta">
                            <span>Mã SP: <strong>{{ $sku }}</strong></span>
                            <a href="#" id="meta-review-link" style="display:inline-flex;align-items:center;gap:4px;color:#ffa000;text-decoration:none;">
                                @if($reviewCount > 0)
                                    @for($s = 1; $s <= 5; $s++)
                                        @if($s <= floor($rating))<i class="fas fa-star" style="font-size:12px;"></i>
                                        @elseif($s - 0.5 <= $rating)<i class="fas fa-star-half-alt" style="font-size:12px;"></i>
                                        @else<i class="far fa-star" style="font-size:12px;color:#e4e4e7;"></i>
                                        @endif
                                    @endfor
                                @else
                                    @for($s = 1; $s <= 5; $s++)
                                        <i class="far fa-star" style="font-size:12px;color:#d4d4d8;"></i>
                                    @endfor
                                @endif
                                <span style="color:#71717a;">({{ $reviewCount }} đánh giá)</span>
                            </a>
                            @if($firstCat)
                            <span>Danh mục: <a href="{{ url($firstCat->slug) }}" style="color:#800000; font-weight:700;">{{ $firstCat->name }}</a></span>
                            @endif
                        </div>
                        
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px; color:#52525b;">
                            <span>Bảo hành: <span style="color:#ef4444; font-weight:700;">12 Tháng</span></span>
                            <span>Tình trạng: 
                                @if($stockStatus === 'instock' || $stock > 0)
                                <span style="color:#10b981; font-weight:700;">Còn hàng</span>
                                @else
                                <span style="color:#71717a; font-weight:700;">Tạm hết hàng</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Block 2: Price & Buy Actions Card --}}
                <div class="wk-buy-card">
                    {{-- Deal Price Box --}}
                    <div class="wk-deal-price-box">
                        <div class="wk-deal-price-header">
                            <span class="deal-title"><i class="fas fa-bolt"></i> GIÁ TỐT NHẤT</span>
                            <span class="deal-timer">Flash Sale</span>
                        </div>
                        <div class="wk-deal-price-body">
                            <div class="wk-deal-price-row">
                                <span class="wk-deal-price-main">{{ number_format($price, 0, ',', '.') }}₫</span>
                                @if($hasDiscount)
                                <div class="wk-deal-price-old-wrap">
                                    <del class="wk-deal-price-old">{{ number_format($comparePrice, 0, ',', '.') }}₫</del>
                                    <span class="wk-deal-price-save">Tiết kiệm: {{ number_format($savedAmount, 0, ',', '.') }}₫</span>
                                </div>
                                @endif
                            </div>
                            
                            <div class="wk-deal-price-installment">
                                <span>Hoặc trả góp chỉ từ:</span>
                                <strong>{{ number_format(round($price / 12), 0, ',', '.') }}₫/tháng</strong>
                            </div>
                        </div>
                    </div>

                    {{-- Short Description table (if any) --}}
                    @if($product->short_description)
                    <div class="wk-short-desc" style="margin-top:16px;">
                        {!! $product->short_description !!}
                    </div>
                    @endif

                    {{-- Variants --}}
                    @if($hasVariants && $variants->isNotEmpty())
                    <div style="margin-top:16px; border-top:1px solid #f4f4f5; padding-top:16px;">
                        <div style="font-size:13px;font-weight:700;color:#18181b;margin-bottom:8px;">Chọn phiên bản:</div>
                        <div style="display:flex;flex-wrap:wrap;gap:8px;">
                            @foreach($variants as $variant)
                            <button type="button"
                                    class="wk-variant-btn"
                                    data-variant="{{ $variant->id }}"
                                    data-price="{{ $variant->price ?? $price }}"
                                    style="padding:8px 14px;border:2px solid #e4e4e7;border-radius:6px;font-size:12px;font-weight:700;cursor:pointer;background:#fff;color:#27272a;transition:all .2s;"
                                    onmouseover="this.style.borderColor='#800000'"
                                    onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='#e4e4e7'">
                                {{ $variant->name ?? 'Phiên bản ' . $variant->id }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Quantity Selector --}}
                    <div class="wk-qty-wrap" style="margin-top:16px; display:flex; align-items:center; gap:12px;">
                        <span style="font-size:13px;font-weight:700;color:#71717a;">Số lượng:</span>
                        <div class="wk-qty-control">
                            <button class="wk-qty-btn" data-action="minus" type="button">−</button>
                            <input class="wk-qty-input" type="number" value="1" min="1" max="{{ max(1, $stock) }}" id="qty-{{ $product->id }}" data-product="{{ $product->id }}">
                            <button class="wk-qty-btn" data-action="plus" type="button">+</button>
                        </div>
                        @if($stock > 0 && $stock <= 10)
                        <span style="font-size:12px;color:#ea580c;font-weight:700;"><i class="fas fa-exclamation-triangle"></i> Chỉ còn {{ $stock }} sản phẩm</span>
                        @endif
                    </div>

                    {{-- Action Buttons --}}
                    <div class="wk-product-actions" style="margin-top:20px;">
                        {{-- Buy Now --}}
                        <button class="wk-btn-buy-now-new" type="button" onclick="addToCartAndRedirect({{ $product->id }})">
                            <strong>MUA NGAY</strong>
                            <span>Giao hàng tận nơi hoặc nhận tại cửa hàng</span>
                        </button>
                        
                        {{-- Installment & Add to Cart --}}
                        <div class="wk-product-actions-row">
                            <button class="wk-btn-installment-new" type="button" onclick="triggerInstallment()">
                                <strong>TRẢ GÓP</strong>
                                <span>Chỉ từ {{ number_format(round($price / 12), 0, ',', '.') }}₫/tháng</span>
                            </button>
                            
                            <button class="wk-btn-add-to-cart-new" type="button" data-add-cart="{{ $product->id }}">
                                <i class="fas fa-cart-plus" style="font-size:16px;"></i>
                                <span>Thêm giỏ</span>
                            </button>
                        </div>
                    </div>

                    {{-- BaoKim Installment button & hidden data --}}
                    <div class="bk-btn" style="display:none !important;"></div>
                    <div id="bk-modal"></div>
                    <div class="baokim-data-hidden" style="display:none !important;">
                        <span class="bk-product-name">{{ $product->name }}</span>
                        <span class="bk-product-price">{{ $price }}</span>
                        <span class="bk-product-qty">1</span>
                        <img class="bk-product-image" src="{{ $mainImage ? asset($mainImage) : '' }}" alt="{{ $product->name }}">
                        <span class="bk-product-property"></span>
                    </div>

                    {{-- Fundiin Promo Widget --}}
                    @if(setting('fundiin_enabled', '0') == '1')
                    <div class="fundiin-promotion__panel" style="margin-top:16px; border-top:1px solid #f4f4f5; padding-top:16px;">
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
                        
                        <div class="fundiin-promotion__banner" onclick="toggleFundiinPromoModal(true)" style="margin-top:8px;">
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

                {{-- Block 3: Showrooms --}}
                <div class="wk-showroom-box">
                    <div class="wk-showroom-header">
                        <i class="fas fa-store"></i>
                        <span>Chi nhánh đang có hàng sẵn</span>
                    </div>
                    <div class="wk-showroom-list">
                        <div class="wk-showroom-region">
                            <strong>Khu vực Hà Nội:</strong>
                            <ul>
                                <li><i class="fas fa-check-circle"></i> 17 Phố Hà Kế Tấn, Phường Phương Liệt, Q. Thanh Xuân</li>
                            </ul>
                        </div>
                        <div class="wk-showroom-region">
                            <strong>Khu vực TP. Hồ Chí Minh:</strong>
                            <ul>
                                <li><i class="fas fa-check-circle"></i> 246 Tân Sơn Nhì, Phường Tân Sơn Nhì, Q. Tân Phú</li>
                            </ul>
                        </div>
                        <p class="wk-showroom-note">Lưu ý: Quý khách có thể yêu cầu điều chuyển kho giữa các chi nhánh hoàn toàn miễn phí.</p>
                    </div>
                </div>

                {{-- Block 4: Policy Box & Share --}}
                <div class="wk-policy-box" style="margin-top:0;">
                    <div class="wk-policy-grid" style="grid-template-columns: 1fr; gap: 12px; margin-bottom:12px;">
                        <div class="wk-policy-item" style="border: 1px solid #e4e4e7; border-radius: 6px; padding: 12px; background: #fff; box-shadow: 0 1px 2px rgba(0,0,0,0.01);">
                            <i class="fas fa-shield-halved" style="color:#800000; font-size:18px;"></i>
                            <div>
                                <h6 style="margin:0; font-size:13px; font-weight:700;">Bảo hành chính hãng</h6>
                                <p style="margin:2px 0 0 0; font-size:11px; color:#71717a;">{{ $price >= 20000000 ? '36' : '12' }} tháng, lỗi 1 đổi 1 trong 30 ngày</p>
                            </div>
                        </div>
                        <div class="wk-policy-item" style="border: 1px solid #e4e4e7; border-radius: 6px; padding: 12px; background: #fff; box-shadow: 0 1px 2px rgba(0,0,0,0.01);">
                            <i class="fas fa-truck-fast" style="color:#800000; font-size:18px;"></i>
                            <div>
                                <h6 style="margin:0; font-size:13px; font-weight:700;">Giao hàng siêu tốc</h6>
                                <p style="margin:2px 0 0 0; font-size:11px; color:#71717a;">Nhận hàng sau 2h tại Hà Nội & TP. HCM</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Share --}}
                    <div style="display:flex;align-items:center;justify-content:center;gap:12px;font-size:13px;color:#71717a;background:#fff;border:1px solid #e4e4e7;padding:10px;border-radius:8px;box-shadow: 0 1px 2px rgba(0,0,0,0.01);">
                        <span>Chia sẻ:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" style="color:#1565c0;font-size:18px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($product->name) }}" target="_blank" rel="noopener noreferrer" style="color:#1DA1F2;font-size:18px;"><i class="fab fa-twitter"></i></a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' ' . request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" style="color:#25D366;font-size:18px;"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

        {{-- COMBO PRODUCTS / FREQUENTLY BOUGHT TOGETHER --}}
        @if(isset($product->activeCombos) && $product->activeCombos->isNotEmpty())
        <section class="wk-combo-section" style="margin-top:28px;" id="wk-combo-deals">
            <div class="wk-section-header">
                <h2 class="wk-section-title"><i class="fas fa-gift"></i> Combo Mua Kèm Giá Tốt</h2>
            </div>
            
            <div class="wk-combo-box">
                <div class="wk-combo-products">
                    
                    {{-- Main Product Card --}}
                    <div class="wk-combo-item wk-combo-main-item">
                        <div class="wk-combo-check-wrap">
                            <input type="checkbox" id="combo-main-checkbox" checked disabled>
                            <label for="combo-main-checkbox"></label>
                        </div>
                        <div class="wk-combo-img">
                            <img src="{{ $mainImage ? asset($mainImage) : '' }}" alt="{{ $product->name }}">
                        </div>
                        <div class="wk-combo-info">
                            <span class="wk-combo-tag">Sản phẩm chính</span>
                            <span class="wk-combo-name" title="{{ $product->name }}">{{ $product->name }}</span>
                            <div class="wk-combo-price">
                                <span class="price-current" data-price="{{ $price }}">{{ number_format($price, 0, ',', '.') }}₫</span>
                            </div>
                        </div>
                    </div>

                    @foreach($product->activeCombos as $comboProduct)
                        @php
                            $comboPivot = $comboProduct->pivot;
                            $addonBasePrice = (float)$comboProduct->price;
                            $addonSku = $comboProduct->sku;
                            $addonImage = $comboProduct->image;
                            
                            // Check if specific variant is set for the combo
                            if ($comboPivot->combo_product_variant_id) {
                                $variant = $comboProduct->activeVariants->firstWhere('id', $comboPivot->combo_product_variant_id);
                                if ($variant) {
                                    $addonBasePrice = (float)$variant->price;
                                    $addonSku = $variant->sku;
                                    if ($variant->image) {
                                        $addonImage = $variant->image;
                                    }
                                }
                            }
                            
                            // Calculate combo discount
                            $discountType = $comboPivot->discount_type;
                            $discountValue = (float)$comboPivot->discount_value;
                            $discountAmount = 0;
                            
                            if ($discountType === 'percent') {
                                $discountAmount = $addonBasePrice * ($discountValue / 100);
                            } else {
                                $discountAmount = $discountValue;
                            }
                            
                            $addonComboPrice = max(0, $addonBasePrice - $discountAmount);
                        @endphp
                        
                        <div class="wk-combo-operator">+</div>
                        
                        {{-- Addon Product Card --}}
                        <div class="wk-combo-item wk-combo-addon-item" data-product-id="{{ $comboProduct->id }}" data-variant-id="{{ $comboPivot->combo_product_variant_id ?? '' }}">
                            <div class="wk-combo-check-wrap">
                                <input type="checkbox" class="wk-combo-addon-checkbox" 
                                       id="combo-addon-{{ $comboProduct->id }}-{{ $comboPivot->combo_product_variant_id ?? '0' }}" 
                                       data-original-price="{{ $addonBasePrice }}" 
                                       data-combo-price="{{ $addonComboPrice }}"
                                       data-savings="{{ $discountAmount }}"
                                       checked>
                                <label for="combo-addon-{{ $comboProduct->id }}-{{ $comboPivot->combo_product_variant_id ?? '0' }}"></label>
                            </div>
                            <div class="wk-combo-img">
                                <img src="{{ $addonImage ? (str_starts_with($addonImage, 'http') || str_starts_with($addonImage, '/') ? $addonImage : '/media-files/' . $addonImage) : '' }}" alt="{{ $comboProduct->name }}">
                            </div>
                            <div class="wk-combo-info">
                                <a href="{{ route('shop.show', $comboProduct->slug) }}" target="_blank" class="wk-combo-name" title="{{ $comboProduct->name }}">
                                    {{ $comboProduct->name }}
                                </a>
                                @if($comboPivot->combo_product_variant_id && isset($variant))
                                    <span class="wk-combo-variant-label">Biến thể: {{ $variant->label }}</span>
                                @endif
                                <div class="wk-combo-price">
                                    <span class="price-current">{{ number_format($addonComboPrice, 0, ',', '.') }}₫</span>
                                    <del class="price-old">{{ number_format($addonBasePrice, 0, ',', '.') }}₫</del>
                                    <span class="wk-combo-discount-tag">
                                        @if($discountType === 'percent')
                                            -{{ round($discountValue) }}%
                                        @else
                                            -{{ number_format($discountValue, 0, ',', '.') }}₫
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Combo summary section --}}
                <div class="wk-combo-summary-box">
                    <div class="wk-combo-summary-row">
                        <span class="lbl">Tổng giá trị gốc:</span>
                        <span class="val" id="combo-total-original">0₫</span>
                    </div>
                    <div class="wk-combo-summary-row saving">
                        <span class="lbl">Tiết kiệm combo:</span>
                        <span class="val" id="combo-total-savings">0₫</span>
                    </div>
                    <div class="wk-combo-summary-divider"></div>
                    <div class="wk-combo-summary-row total">
                        <span class="lbl">Giá trọn bộ combo:</span>
                        <span class="val" id="combo-total-price">0₫</span>
                    </div>
                    
                    <button type="button" class="wk-btn-buy-combo" id="btn-buy-combo" onclick="buyCombo()">
                        <i class="fas fa-shopping-cart"></i>
                        <span>MUA TRỌN BỘ COMBO</span>
                    </button>
                </div>
            </div>
        </section>
        @endif

        {{-- RELATED PRODUCTS --}}
        @if($relatedProducts->isNotEmpty())
        <section style="margin-top:8px;" id="rec-related-products">
            <div class="wk-section-header">
                <h2 class="wk-section-title"><i class="fas fa-cubes"></i> Sản Phẩm Liên Quan</h2>
            </div>
            <div class="wk-products-grid" data-recommendation-type="related" data-source="product_detail">
                @foreach($relatedProducts as $index => $related)
                <div data-product-id="{{ $related->id }}"
                     data-position="{{ $index + 1 }}"
                     data-recommendation-type="related"
                     data-source="product_detail"
                     class="rec-product-wrapper">
                    <x-shop.product-card :product="$related" />
                </div>
                @endforeach
            </div>
        </section>
        @endif

        {{-- ALSO VIEWED --}}
        @if(isset($alsoViewedProducts) && $alsoViewedProducts->isNotEmpty())
        <section style="margin-top:28px;" id="rec-also-viewed">
            <div class="wk-section-header">
                <h2 class="wk-section-title"><i class="fas fa-users"></i> Người xem cũng xem</h2>
            </div>
            <div class="wk-products-grid" data-recommendation-type="also_viewed" data-source="product_detail">
                @foreach($alsoViewedProducts as $index => $avProduct)
                <div data-product-id="{{ $avProduct->id }}"
                     data-position="{{ $index + 1 }}"
                     data-recommendation-type="also_viewed"
                     data-source="product_detail"
                     class="rec-product-wrapper">
                    <x-shop.product-card :product="$avProduct" />
                </div>
                @endforeach
            </div>
        </section>
        @endif

        {{-- RECENTLY VIEWED --}}
        @if(isset($recentlyViewedProducts) && $recentlyViewedProducts->isNotEmpty())
        <section style="margin-top:28px;" id="rec-recently-viewed">
            <div class="wk-section-header">
                <h2 class="wk-section-title"><i class="fas fa-history"></i> Sản phẩm bạn vừa xem</h2>
            </div>
            <div class="wk-products-grid" data-recommendation-type="recently_viewed" data-source="product_detail">
                @foreach($recentlyViewedProducts as $index => $rvProduct)
                <div data-product-id="{{ $rvProduct->id }}"
                     data-position="{{ $index + 1 }}"
                     data-recommendation-type="recently_viewed"
                     data-source="product_detail"
                     class="rec-product-wrapper">
                    <x-shop.product-card :product="$rvProduct" />
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>

@push('scripts')
<script>
// Star rating input for new review
document.querySelectorAll('#new-star-input .fas').forEach(star => {
    star.addEventListener('click', function() {
        const val = this.dataset.star;
        document.getElementById('new-rating-val').value = val;
        document.querySelectorAll('#new-star-input .fas').forEach((s, i) => {
            s.style.color = i < val ? '#ffa000' : '#e2e8f0';
        });
    });
    star.addEventListener('mouseenter', function() {
        const val = this.dataset.star;
        document.querySelectorAll('#new-star-input .fas').forEach((s, i) => {
            s.style.color = i < val ? '#ffa000' : '#e2e8f0';
        });
    });
});

// Submit Review AJAX
document.getElementById('review-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('submit-review-btn');
    const alertBox = document.getElementById('review-alert');
    btn.disabled = true;
    btn.innerText = 'ĐANG GỬI...';
    
    fetch(this.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(data => {
        alertBox.style.display = 'block';
        if (data.success) {
            alertBox.style.background = '#dcfce3';
            alertBox.style.color = '#166534';
            alertBox.innerText = data.message;
            this.reset();
            setTimeout(() => window.location.reload(), 2000);
        } else {
            alertBox.style.background = '#fee2e2';
            alertBox.style.color = '#991b1b';
            alertBox.innerText = data.message || 'Có lỗi xảy ra.';
            btn.disabled = false;
            btn.innerText = 'GỬI ĐÁNH GIÁ';
        }
    })
    .catch(err => {
        alertBox.style.display = 'block';
        alertBox.style.background = '#fee2e2';
        alertBox.style.color = '#991b1b';
    });
});

// Click review stars/count link under title to switch to reviews tab and scroll
document.getElementById('meta-review-link')?.addEventListener('click', function(e) {
    e.preventDefault();
    const tabBtn = document.querySelector('.wk-tab-btn[data-tab="reviews"]');
    if (tabBtn) {
        tabBtn.click();
        document.querySelector('.wk-tabs-wrap')?.scrollIntoView({ behavior: 'smooth' });
    }
});

// Review Filtering
document.querySelectorAll('.wk-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.wk-filter-btn').forEach(b => {
            b.classList.remove('active');
            b.style.background = '#f1f5f9';
            b.style.color = '#94a3b8';
            const star = b.querySelector('i');
            if (star) star.style.color = '#cbd5e1';
        });

        this.classList.add('active');
        this.style.background = '#e0f2fe';
        this.style.color = '#0369a1';
        const star = this.querySelector('i');
        if (star) star.style.color = '#0369a1';

        const rating = this.dataset.rating;
        document.querySelectorAll('.wk-review-item').forEach(item => {
            if (rating === 'all' || item.dataset.rating === rating) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

// Toggle Reply Form
document.querySelectorAll('.wk-reply-toggle-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const formContainer = this.closest('.wk-review-item').querySelector('.wk-reply-form-container');
        if (formContainer) {
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        }
    });
});

// Submit Reply AJAX
document.querySelectorAll('.wk-reply-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerText = '...';

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                reply: this.querySelector('input[name="reply"]').value
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.message || 'Có lỗi xảy ra.');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Gửi';
            }
        })
        .catch(() => {
            alert('Có lỗi xảy ra khi gửi câu trả lời.');
            submitBtn.disabled = false;
            submitBtn.innerText = 'Gửi';
        });
    });
});

// Liking Review AJAX
document.querySelectorAll('.wk-review-like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const reviewId = this.dataset.id;
        const countSpan = this.querySelector('.like-count');
        this.disabled = true;

        fetch(`/review/${reviewId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                countSpan.innerText = data.likes;
            }
            this.disabled = false;
        })
        .catch(() => {
            this.disabled = false;
        });
    });
});

// Buy now
function addToCartAndRedirect(productId) {
    const qty = parseInt(document.getElementById('qty-' + productId)?.value) || 1;
    fetch('{{ route('cart.add') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
            'Accept': 'application/json',
        },
        body: JSON.stringify({ product_id: productId, qty: qty, quantity: qty })
    }).then(() => window.location = '{{ route("checkout.index") }}').catch(() => {
        window.location = '{{ route("checkout.index") }}';
    });
}
// Cập nhật giá, số lượng và biến thể cho BaoKim
const updateBaoKimData = () => {
    const qty = document.getElementById('qty-{{ $product->id }}').value;
    document.querySelector('.baokim-data-hidden .bk-product-qty').innerText = qty;

    if (currentVariant) {
        document.querySelector('.baokim-data-hidden .bk-product-price').innerText = currentVariant.price;
        document.querySelector('.baokim-data-hidden .bk-product-name').innerText = '{{ $product->name }} - ' + currentVariant.name;
    } else {
        document.querySelector('.baokim-data-hidden .bk-product-price').innerText = '{{ $price }}';
        document.querySelector('.baokim-data-hidden .bk-product-name').innerText = '{{ $product->name }}';
    }
    
    // Nếu BaoKim script đã load và có hàm re-init, gọi lại
    if (typeof window.BaoKim !== 'undefined' && typeof initBaoKim === 'function') {
        initBaoKim();
    }
};

// Cập nhật BaoKim khi bấm cộng/trừ số lượng
document.querySelectorAll('.wk-qty-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        setTimeout(updateBaoKimData, 100);
    });
});

// Gắn thêm gọi hàm updateBaoKimData() khi chọn biến thể 
document.querySelectorAll('.wk-variant-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Biến currentVariant đã được set ở đoạn code trên
        setTimeout(updateBaoKimData, 100);
    });
});

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

// Custom click forwarder to BaoKim installment button
function triggerInstallment() {
    // Try to click BaoKim button inside .bk-btn
    const bkInstallmentBtn = document.querySelector('.bk-btn button, .bk-btn a, .bk-btn-installment');
    if (bkInstallmentBtn) {
        bkInstallmentBtn.click();
    } else {
        // Fallback: trigger Fundiin banner click
        const fundiinBanner = document.querySelector('.fundiin-promotion__banner');
        if (fundiinBanner) {
            fundiinBanner.click();
        } else {
            // Fallback: standard buy now redirect to checkout
            const buyNowBtn = document.querySelector('.wk-btn-buy-now-new');
            if (buyNowBtn) buyNowBtn.click();
        }
    }
}

// Collapsible description toggle function
function toggleDescription() {
    const wrapper = document.getElementById('desc-wrapper');
    const textSpan = document.getElementById('desc-toggle-text');
    const icon = document.getElementById('desc-toggle-icon');
    if (!wrapper || !textSpan || !icon) return;
    
    if (wrapper.classList.contains('expanded')) {
        wrapper.classList.remove('expanded');
        textSpan.innerText = 'Xem tất cả';
        icon.className = 'fas fa-chevron-down';
        // Scroll smoothly back to top of tabs nav
        document.querySelector('.wk-tabs-wrap')?.scrollIntoView({ behavior: 'smooth' });
    } else {
        wrapper.classList.add('expanded');
        textSpan.innerText = 'Thu gọn';
        icon.className = 'fas fa-chevron-up';
    }
}

// Dynamic Combo Total Calculation
function initComboDeals() {
    const mainCheckbox = document.getElementById('combo-main-checkbox');
    if (!mainCheckbox) return;

    const addonCheckboxes = document.querySelectorAll('.wk-combo-addon-checkbox');
    const totalOriginalEl = document.getElementById('combo-total-original');
    const totalSavingsEl = document.getElementById('combo-total-savings');
    const totalPriceEl = document.getElementById('combo-total-price');

    const mainPrice = parseFloat(document.querySelector('.wk-combo-main-item .price-current').dataset.price || 0);

    function recalculate() {
        let totalOriginal = mainPrice;
        let totalSavings = 0;
        let totalPrice = mainPrice;

        addonCheckboxes.forEach(cb => {
            if (cb.checked) {
                const orig = parseFloat(cb.dataset.originalPrice || 0);
                const combo = parseFloat(cb.dataset.comboPrice || 0);
                const save = parseFloat(cb.dataset.savings || 0);

                totalOriginal += orig;
                totalSavings += save;
                totalPrice += combo;
            }
        });

        totalOriginalEl.innerText = new Intl.NumberFormat('vi-VN').format(totalOriginal) + '₫';
        totalSavingsEl.innerText = new Intl.NumberFormat('vi-VN').format(totalSavings) + '₫';
        totalPriceEl.innerText = new Intl.NumberFormat('vi-VN').format(totalPrice) + '₫';
    }

    addonCheckboxes.forEach(cb => {
        cb.addEventListener('change', recalculate);
    });

    recalculate();
}

// buyCombo Ajax submission
function buyCombo() {
    const mainProductId = '{{ $product->id }}';
    const qtyInput = document.getElementById('qty-{{ $product->id }}');
    const qty = qtyInput ? parseInt(qtyInput.value) : 1;

    const combos = [];
    document.querySelectorAll('.wk-combo-addon-checkbox:checked').forEach(cb => {
        const itemEl = cb.closest('.wk-combo-addon-item');
        if (itemEl) {
            combos.push({
                product_id: parseInt(itemEl.dataset.productId),
                variant_id: itemEl.dataset.variantId ? parseInt(itemEl.dataset.variantId) : null
            });
        }
    });

    const btn = document.getElementById('btn-buy-combo');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>ĐANG THÊM...</span>';
    }

    fetch('{{ route("cart.addCombo") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            main_product_id: mainProductId,
            qty: qty,
            combos: combos
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location = '{{ route("cart.page") }}';
        } else {
            alert(data.message || 'Có lỗi xảy ra.');
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-shopping-cart"></i> <span>MUA TRỌN BỘ COMBO</span>';
            }
        }
    })
    .catch(() => {
        alert('Có lỗi xảy ra khi thêm combo vào giỏ hàng.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-shopping-cart"></i> <span>MUA TRỌN BỘ COMBO</span>';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initComboDeals();
});
</script>

<script>
// =============================================
// RECOMMENDATION TRACKING (non-blocking)
// =============================================
(function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    // Track click on recommended product cards
    document.querySelectorAll('.rec-product-wrapper').forEach(function(wrapper) {
        wrapper.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (!link) return;
            const productId = parseInt(wrapper.dataset.productId);
            const recType = wrapper.dataset.recommendationType;
            const source = wrapper.dataset.source;
            const position = parseInt(wrapper.dataset.position);
            if (productId && recType) {
                try {
                    navigator.sendBeacon('/api/recommendations/track',
                        new Blob([JSON.stringify({
                            product_id: productId,
                            recommendation_type: recType,
                            source: source,
                            position: position,
                            _token: csrfToken
                        })], {type: 'application/json'})
                    );
                } catch(e) {}
            }
        });
    });

    // Track recommendation impressions using IntersectionObserver
    if ('IntersectionObserver' in window) {
        const impressionSections = document.querySelectorAll('[data-recommendation-type]');
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const recType = el.dataset.recommendationType;
                    const source = el.dataset.source;
                    if (recType && el.dataset.impressionTracked !== '1') {
                        el.dataset.impressionTracked = '1';
                        try {
                            navigator.sendBeacon('/api/recommendations/track',
                                new Blob([JSON.stringify({
                                    event_type: 'recommendation_impression',
                                    recommendation_type: recType,
                                    source: source,
                                    _token: csrfToken
                                })], {type: 'application/json'})
                            );
                        } catch(e) {}
                    }
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        impressionSections.forEach(function(el) { observer.observe(el); });
    }
})();
</script>

<script src="https://pc.baokim.vn/js/bk_plus_v2.popup.js?v=1.0.0"></script>
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
