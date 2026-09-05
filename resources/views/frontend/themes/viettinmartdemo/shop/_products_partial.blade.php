{{-- Partial: chỉ render các product card, dùng cho AJAX response --}}
@forelse($products as $product)
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
    <x-product-card :product="$product" />
</div>
@empty
<div class="col-12 text-center shop-empty-state" style="padding: 80px 0;">
    <i class="fa-light fa-box-open" style="font-size: 60px; color: #ccc; display:block; margin-bottom:20px;"></i>
    <h5>{{ __('frontend.message_no_products_found') }}</h5>
    <p style="color:#999;">{{ __('frontend.search_try_different_filters') }}</p>
</div>
@endforelse
