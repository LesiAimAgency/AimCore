@php
    $allImages = [];
    if ($product->thumbnail_url) $allImages[] = $product->thumbnail_url;
    if ($product->images_urls && is_array($product->images_urls)) {
        foreach ($product->images_urls as $imgUrl) {
            if ($imgUrl) $allImages[] = $imgUrl;
        }
    }
    if (empty($allImages)) $allImages[] = asset('theme/images/grocery/01.jpg');
    $allImages = array_unique(array_slice($allImages, 0, 4));
    $numberClasses = ['one', 'two', 'three', 'four'];
    $avgRating = $product->approvedReviews->avg('rating') ?? 5;
    $reviewCount = $product->approvedReviews->count();
@endphp

<div class="product-details-popup-wrapper popup">
    <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
        <div class="product-details-popup">
            <button class="product-details-close-btn qv-close-btn" style="top:0;right:0;"><i class="fal fa-times"></i></button>
            <div class="details-product-area">
                <div class="product-thumb-area">
                    <div class="cursor"></div>
                    @foreach($allImages as $index => $imgUrl)
                        @php $cls = $numberClasses[$index] ?? 'more'; @endphp
                        <div class="thumb-wrapper {{ $cls }} filterd-items {{ $index === 0 ? 'figure' : 'hide' }}" style="position: relative; width: 100%; height: 400px; max-height: 400px; overflow: hidden; border-radius: 8px; background-color: #f8f9fa;">
                            <div class="product-thumb" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; position: relative;">
                                <img src="{{ $imgUrl }}" alt="{{ $product->name }}" style="max-width: 100% !important; max-height: 100% !important; width: auto !important; height: auto !important; object-fit: contain !important; position: relative !important; z-index: 1 !important; opacity: 1 !important; display: block !important;">
                            </div>
                        </div>
                    @endforeach
                    <div class="product-thumb-filter-group">
                        @foreach($allImages as $index => $imgUrl)
                            @php $cls = $numberClasses[$index] ?? 'more'; @endphp
                            <div class="thumb-filter filter-btn {{ $index === 0 ? 'active' : '' }}" data-show=".{{ $cls }}" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 2px solid #e2e8f0; border-radius: 6px; cursor: pointer;">
                                <img src="{{ $imgUrl }}" alt="product-thumb-filter" style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="contents">
                    <div class="product-status">
                        <span class="product-catagory">{{ $product->categories->first()->name ?? '' }}</span>
                        @if(setting('review_enabled', true))
                        <div class="rating-stars-group">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="rating-star"><i class="{{ $i <= $avgRating ? 'fas' : 'far' }} fa-star"></i></div>
                            @endfor
                            <span>{{ $reviewCount }} {{ __('product_reviews') }}</span>
                        </div>
                        @endif
                    </div>
                    <h2 class="product-title">{{ $product->name }} <span class="stock">{{ $product->stock > 0 ? __('product_in_stock') : __('product_out_of_stock') }}</span></h2>
                    <span class="product-price">
                        @if($product->compare_price > $product->price)
                            <span class="old-price">{{ number_format($product->compare_price) }}đ</span>
                        @endif
                        <span class="current-price">{{ $product->formatted_price }}</span>
                    </span>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($product->short_description ?: $product->description), 150) !!}</p>
                    <div class="product-bottom-action">
                        @if(!$product->has_contact_price)
                            <div class="cart-edit">
                                <div class="quantity-edit action-item">
                                    <button class="button qv-qty-btn qv-minus"><i class="fal fa-minus minus"></i></button>
                                    <input type="text" class="input qv-qty-input" value="1" style="text-align: center;" onkeyup="this.value = Math.max(1, Math.min(999, parseInt(this.value) || 1))">
                                    <button class="button plus qv-qty-btn qv-plus">+<i class="fal fa-plus plus"></i></button>
                                </div>
                            </div>
                            <a href="javascript:void(0);" onclick="window.cart.add({{ $product->id }}, this);" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">{{ __('product_add_to_cart') }}</div>
                                <div class="arrow-icon"><i class="fa-regular fa-cart-shopping"></i></div>
                                <div class="arrow-icon"><i class="fa-regular fa-cart-shopping"></i></div>
                            </a>
                        @else
                            <a href="tel:{{ setting('site_phone') }}" class="rts-btn btn-primary radious-sm">{{ __('product_contact_price') }}: {{ setting('site_phone') }}</a>
                        @endif
                        <a href="javascript:void(0);" onclick="cwAction.addWishlist({{ $product->id }}, this)" class="rts-btn btn-primary ml--20"><i class="fa-light fa-heart"></i></a>
                    </div>
                    <div class="product-uniques">
                        <span class="sku product-unipue"><span>{{ __('quickview_sku') }}: </span>{{ $product->sku ?? '' }}</span>
                        @if($product->categories->isNotEmpty())
                            <span class="catagorys product-unipue"><span>{{ __('quickview_categories') }}: </span>{{ $product->categories->pluck('name')->join(', ') }}</span>
                        @endif
                    </div>
                    <div class="share-social">
                        <span>{{ __('quickview_share') }}:</span>
                        @if(setting('social_links.facebook'))
                            <a class="platform" href="{{ setting('social_links.facebook') }}" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(setting('social_links.twitter'))
                            <a class="platform" href="{{ setting('social_links.twitter') }}" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(setting('social_links.youtube'))
                            <a class="platform" href="{{ setting('social_links.youtube') }}" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if(setting('social_links.linkedin'))
                            <a class="platform" href="{{ setting('social_links.linkedin') }}" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

