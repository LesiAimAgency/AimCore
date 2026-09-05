@php 
    $cart = session('cart', []);
    $itemCount = count($cart);
    $total = collect($cart)->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
    $freeShippingLimit = (int) setting('free_shipping_threshold', 500000);
    $percent = $freeShippingLimit > 0 ? min(100, round(($total / $freeShippingLimit) * 100)) : 100;
    $remaining = max(0, $freeShippingLimit - $total);
@endphp

<div class="category-sub-menu card-number-show">
    <h5 class="shopping-cart-number">
        <i class="fa-solid fa-cart-shopping"></i>
        {{ __('cart_dropdown_title') }} ({{ str_pad($itemCount, 2, '0', STR_PAD_LEFT) }})
    </h5>

    <div class="cart-items-mini-list">
        @forelse($cart as $key => $item)
            <div class="cart-item-1 {{ $loop->first ? 'border-top' : '' }}">
                <div class="img-name">
                    <div class="thumbanil">
                        @php
                            $imgPath = $item['image'];
                            if (!str_starts_with($imgPath, 'http')) {
                                if (str_starts_with($imgPath, 'storage/')) {
                                    $imgUrl = asset($imgPath);
                                } elseif (str_starts_with($imgPath, 'media/')) {
                                    $imgUrl = \Storage::disk('public')->url($imgPath);
                                } else {
                                    $imgUrl = asset($imgPath);
                                }
                            } else {
                                $imgUrl = $imgPath;
                            }
                        @endphp
                        <img src="{{ $imgUrl }}" alt="{{ $item['name'] }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="details">
                        <a href="{{ locale_route('shop.show', $item['slug']) }}">
                            <h5 class="title">{{ Str::limit($item['name'], 30) }}</h5>
                        </a>
                        <div class="number">
                            <span class="qty">{{ $item['qty'] }}</span> × 
                            <span class="price">{{ number_format($item['price']) }}đ</span>
                        </div>
                    </div>
                </div>
                <div class="close-c1 cart-dropdown-remove-btn" data-row-id="{{ $key }}" data-product-name="{{ $item['name'] }}"
                    style="cursor: pointer;" title="{{ __('cart_dropdown_remove') }}">
                    <i class="fa-regular fa-times"></i>
                </div>
            </div>
        @empty
            <div class="empty-cart-message">
                <div class="empty-icon">
                    <i class="fa-light fa-cart-shopping"></i>
                </div>
                <div class="empty-text">{{ __('cart_dropdown_empty') }}</div>
                <div class="empty-subtext">{{ __('cart_dropdown_empty_sub') }}</div>
            </div>
        @endforelse
    </div>

    @if($itemCount > 0)
        <div class="sub-total-cart-balance">
            <div class="bottom-content-deals">
                <div class="top">
                    <span>{{ __('cart_dropdown_total') }}</span>
                    <span class="number-c">{{ number_format($total) }}đ</span>
                </div>
                
                @if($freeShippingLimit > 0)
                    <div class="single-progress-area-incard">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%"
                                aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @if($remaining > 0)
                        <p class="shipping-message">{!! __('cart_dropdown_free_ship_remaining', ['amount' => number_format($remaining) . 'đ']) !!}</p>
                    @else
                        <p class="shipping-message success">{!! __('cart_dropdown_free_ship_qualify') !!}</p>
                    @endif
                @endif
            </div>
            
            <div class="button-wrapper">
                <a href="{{ locale_route('cart.page') }}" class="rts-btn btn-primary btn-sm">
                    <i class="fa-solid fa-cart-shopping"></i> {{ __('cart_dropdown_view') }}
                </a>
                <a href="{{ locale_route('checkout.index') }}" class="rts-btn btn-primary border-only btn-sm">
                    <i class="fa-solid fa-credit-card"></i> {{ __('cart_dropdown_checkout') }}
                </a>
            </div>
        </div>
    @endif
</div>



