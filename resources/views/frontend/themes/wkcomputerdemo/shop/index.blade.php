@extends('layouts.app')

@php
    $currentCat = null;
    $selectedSlugs = $activeFilters['categories'] ?? [];
    if (!empty($selectedSlugs)) {
        $currentCat = \App\Models\Wkcomputer\WkCategory::whereIn('slug', $selectedSlugs)
            ->where('is_active', true)
            ->first();
    }
    $pageTitle = $currentCat?->name ?? 'Cửa hàng';
    $searchQuery = $activeFilters['q'] ?? '';
@endphp

@section('title', ($searchQuery ? "Tìm kiếm: $searchQuery" : $pageTitle) . ' - WKcomputer')
@section('description', $currentCat?->description ?? 'Danh sách sản phẩm laptop, PC, linh kiện, gaming gear, phụ kiện công nghệ chính hãng giá tốt nhất.')

@section('content')

{{-- Breadcrumb --}}
<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            @if($currentCat)
            <li><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">{{ $currentCat->name }}</li>
            @elseif($searchQuery)
            <li><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">Kết quả: "{{ $searchQuery }}"</li>
            @else
            <li class="active">Cửa hàng</li>
            @endif
        </ol>
    </div>
</div>

{{-- Category banner --}}
@if($currentCat)
<div style="background:linear-gradient(135deg,#1a1a2e,#16213e);padding:20px 0;">
    <div class="wk-container" style="display:flex;align-items:center;gap:20px;">
        <div>
            <h1 style="color:#fff;font-size:22px;font-weight:800;margin:0 0 4px;">{{ $currentCat->name }}</h1>
            @if($currentCat->description)
            <p style="color:rgba(255,255,255,.7);margin:0;font-size:13px;">{{ $currentCat->description }}</p>
            @endif
        </div>
        <div style="margin-left:auto;color:rgba(255,255,255,.4);font-size:13px;">
            {{ $products->total() }} sản phẩm
        </div>
    </div>
</div>
@elseif($searchQuery)
<div style="background:#fff;border-bottom:1px solid #f1f5f9;padding:14px 0;">
    <div class="wk-container">
        <h1 style="font-size:16px;font-weight:700;color:#1e293b;margin:0;">
            Kết quả tìm kiếm: "<span style="color:var(--wk-primary);">{{ $searchQuery }}</span>"
            <span style="font-weight:400;color:#94a3b8;font-size:14px;">({{ $products->total() }} sản phẩm)</span>
        </h1>
    </div>
</div>
@endif

<div style="padding:16px 0 32px;background:#f0f2f5;">
    <div class="wk-container">
        <div class="wk-shop-layout">

            {{-- SIDEBAR FILTER --}}
            <aside class="wk-filter-sidebar d-none d-lg-block">
                <div class="wk-filter-header">
                    <h3><i class="fas fa-sliders-h" style="color:var(--wk-primary);"></i> Lọc sản phẩm</h3>
                    @if(!empty(array_filter($activeFilters)))
                    <a href="{{ route('shop.index') }}" class="wk-filter-clear">Xóa tất cả</a>
                    @endif
                </div>

                <form method="GET" action="{{ route('shop.index') }}" id="filter-form">

                    {{-- Danh mục --}}
                    <div class="wk-filter-group">
                        <div class="wk-filter-group-head">
                            <span><i class="fas fa-th-large" style="margin-right:6px;color:#aaa;"></i>Danh mục</span>
                            <i class="fas fa-chevron-down" style="font-size:10px;"></i>
                        </div>
                        <div class="wk-filter-group-body">
                            @foreach($categories->take(12) as $cat)
                            <label class="wk-filter-check">
                                <input type="checkbox" name="categories[]"
                                       value="{{ $cat->slug }}"
                                       {{ in_array($cat->slug, $selectedSlugs) ? 'checked' : '' }}
                                       onchange="document.getElementById('filter-form').submit()">
                                {{ $cat->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Khoảng giá --}}
                    <div class="wk-filter-group">
                        <div class="wk-filter-group-head">
                            <span><i class="fas fa-tag" style="margin-right:6px;color:#aaa;"></i>Khoảng giá</span>
                            <i class="fas fa-chevron-down" style="font-size:10px;"></i>
                        </div>
                        <div class="wk-filter-group-body">
                            @php
                                $presets = [
                                    ['label' => 'Dưới 5 triệu', 'val' => '_5000000'],
                                    ['label' => '5 - 10 triệu', 'val' => '5000000_10000000'],
                                    ['label' => '10 - 20 triệu', 'val' => '10000000_20000000'],
                                    ['label' => '20 - 30 triệu', 'val' => '20000000_30000000'],
                                    ['label' => 'Trên 30 triệu', 'val' => '30000000_'],
                                ];
                            @endphp
                            @foreach($presets as $preset)
                            <label class="wk-filter-check">
                                <input type="radio" name="price_preset"
                                       value="{{ $preset['val'] }}"
                                       {{ ($activeFilters['price_preset'] ?? '') === $preset['val'] ? 'checked' : '' }}
                                       onchange="document.getElementById('filter-form').submit()">
                                {{ $preset['label'] }}
                            </label>
                            @endforeach

                            <div style="margin-top:10px;padding-top:10px;border-top:1px dashed #f1f5f9;">
                                <div style="font-size:11px;font-weight:600;color:#64748b;margin-bottom:8px;">Hoặc nhập khoảng giá:</div>
                                <div class="wk-price-range-inputs">
                                    <input type="number" name="min_price" placeholder="Từ" value="{{ $activeFilters['min_price'] ?? '' }}">
                                    <input type="number" name="max_price" placeholder="Đến" value="{{ $activeFilters['max_price'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tình trạng --}}
                    <div class="wk-filter-group">
                        <div class="wk-filter-group-head">
                            <span><i class="fas fa-check-circle" style="margin-right:6px;color:#aaa;"></i>Tình trạng</span>
                            <i class="fas fa-chevron-down" style="font-size:10px;"></i>
                        </div>
                        <div class="wk-filter-group-body">
                            <label class="wk-filter-check">
                                <input type="checkbox" name="in_stock" value="1"
                                       {{ $activeFilters['in_stock'] ?? false ? 'checked' : '' }}
                                       onchange="document.getElementById('filter-form').submit()">
                                Còn hàng
                            </label>
                            <label class="wk-filter-check">
                                <input type="checkbox" name="on_sale" value="1"
                                       {{ $activeFilters['on_sale'] ?? false ? 'checked' : '' }}
                                       onchange="document.getElementById('filter-form').submit()">
                                Đang giảm giá
                            </label>
                        </div>
                    </div>

                    {{-- Search hidden --}}
                    @if($searchQuery)
                    <input type="hidden" name="q" value="{{ $searchQuery }}">
                    @endif

                    <div style="padding:14px 16px;">
                        <button type="submit" class="wk-btn wk-btn-primary wk-btn-block wk-btn-sm">
                            <i class="fas fa-search"></i> Áp dụng bộ lọc
                        </button>
                    </div>
                </form>
            </aside>

            {{-- MAIN CONTENT --}}
            <div>
                {{-- Toolbar --}}
                <div class="wk-shop-toolbar">
                    <div style="display:flex;align-items:center;gap:10px;">
                        {{-- Mobile filter toggle --}}
                        <button class="wk-btn wk-btn-outline wk-btn-sm d-lg-none wk-filter-toggle" type="button">
                            <i class="fas fa-sliders-h"></i> Bộ lọc
                        </button>
                        <span style="font-size:13px;color:#64748b;">
                            Hiển thị <strong>{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong> trong <strong>{{ $products->total() }}</strong> sản phẩm
                        </span>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <span style="font-size:13px;color:#64748b;white-space:nowrap;">Sắp xếp:</span>
                        <select class="wk-sort-select"
                                onchange="window.location = '{{ route('shop.index') }}?' + new URLSearchParams({...Object.fromEntries(new URLSearchParams(location.search)), sort: this.value})">
                            <option value="default" {{ ($activeFilters['sort'] ?? '') === 'default' ? 'selected' : '' }}>Mặc định</option>
                            <option value="newest" {{ ($activeFilters['sort'] ?? '') === 'newest' ? 'selected' : '' }}>Mới nhất</option>
                            <option value="price_asc" {{ ($activeFilters['sort'] ?? '') === 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                            <option value="price_desc" {{ ($activeFilters['sort'] ?? '') === 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                        </select>
                    </div>
                </div>

                {{-- Active Filters chips --}}
                @php $hasActive = !empty($selectedSlugs) || $searchQuery || ($activeFilters['on_sale'] ?? false) || ($activeFilters['in_stock'] ?? false) || ($activeFilters['price_preset'] ?? ''); @endphp
                @if($hasActive)
                <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:14px;">
                    @foreach($selectedSlugs as $slug)
                    <span style="background:#ffebee;color:var(--wk-primary);font-size:11px;font-weight:600;padding:4px 10px 4px 8px;border-radius:20px;display:flex;align-items:center;gap:5px;">
                        <i class="fas fa-times" style="cursor:pointer;" onclick="removeFilter('categories[]','{{ $slug }}')"></i>
                        {{ $categories->firstWhere('slug', $slug)?->name ?? $slug }}
                    </span>
                    @endforeach
                    @if($searchQuery)
                    <span style="background:#e3f2fd;color:var(--wk-secondary);font-size:11px;font-weight:600;padding:4px 10px;border-radius:20px;">
                        Tìm: "{{ $searchQuery }}"
                    </span>
                    @endif
                </div>
                @endif

                {{-- Product Grid --}}
                @if($products->isNotEmpty())
                <div class="wk-products-grid-4" style="margin-bottom:24px;">
                    @foreach($products as $product)
                    <x-shop.product-card :product="$product" />
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div style="display:flex;justify-content:center;">
                    {{ $products->withQueryString()->links('vendor.pagination.tailwind') }}
                </div>
                @else
                <div style="background:#fff;border-radius:16px;border:1px solid #f1f5f9;padding:60px 20px;text-align:center;">
                    <i class="fas fa-search" style="font-size:48px;color:#e2e8f0;margin-bottom:16px;"></i>
                    <h3 style="font-size:16px;font-weight:700;color:#64748b;margin:0 0 8px;">Không tìm thấy sản phẩm nào</h3>
                    <p style="color:#94a3b8;font-size:13px;margin:0 0 20px;">Thử thay đổi bộ lọc hoặc tìm kiếm với từ khóa khác.</p>
                    <a href="{{ route('shop.index') }}" class="wk-btn wk-btn-outline wk-btn-sm">Xóa bộ lọc</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function removeFilter(key, val) {
    const params = new URLSearchParams(location.search);
    const vals = params.getAll(key).filter(v => v !== val);
    params.delete(key);
    vals.forEach(v => params.append(key, v));
    window.location = location.pathname + '?' + params.toString();
}
</script>
@endpush

@endsection
