@extends('layouts.app')

@section('title', Lang('wishlist_title') . ' - ' . setting('site_name'))

@section('content')
    <!-- rts breadcrumb area start -->
    <x-breadcrumb :items="[['label' => Lang('wishlist_title')]]" />
    <!-- rts breadcrumb area end -->

    <div class="rts-cart-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rts-cart-list-area wishlist shadow-sm rounded-4 bg-white overflow-hidden">
                        @if($products->isEmpty())
                            <div class="text-center py-5 d-flex align-items-center justify-content-center flex-column">
                                <i class="fa-light fa-heart-circle-xmark mb-4" style="font-size: 80px; color: #eee;"></i>
                                <h3 class="title fw-bold" style="color: #2C3C28;">{{ Lang('wishlist_empty') }}</h3>
                                <p class="text-muted mb-4">{{ Lang('wishlist_empty_message') }}</p>
                                <a href="{{ locale_route('shop.index') }}" class="rts-btn btn-primary px-5 py-3 rounded-pill transition">
                                    {{ Lang('btn_back_to_shop') }}
                                </a>
                            </div>
                        @else
                            <div class="single-cart-area-list head py-4 px-4 bg-light border-bottom">
                                <div class="product-main">
                                    <p class="mb-0 fw-bold text-uppercase tracking-wider" style="font-size: 13px; color: #666;">{{ Lang('wishlist_col_product') }}</p>
                                </div>
                                <div class="price">
                                    <p class="mb-0 fw-bold text-uppercase tracking-wider" style="font-size: 13px; color: #666;">{{ Lang('wishlist_col_price') }}</p>
                                </div>
                                <div class="quantity">
                                    <p class="mb-0 fw-bold text-uppercase tracking-wider text-center" style="font-size: 13px; color: #666;">{{ Lang('wishlist_col_status') }}</p>
                                </div>
                                <div class="subtotal">
                                    <p class="mb-0 fw-bold text-uppercase tracking-wider text-center" style="font-size: 13px; color: #666;">{{ Lang('wishlist_col_action') }}</p>
                                </div>
                            </div>

                            @foreach($products as $product)
                                <div class="single-cart-area-list main item-parent py-4 px-4 border-bottom hover:bg-slate-50 transition-all" x-data="{ qty: 1 }">
                                    <div class="product-main-cart d-flex align-items-center gap-4">
                                        <div class="close-btn text-muted hover:text-danger transition-colors"
                                             onclick="removeFromWishlist({{ $product->id }})"
                                             style="cursor: pointer; font-size: 18px;">
                                            <i class="fa-light fa-trash-can"></i>
                                        </div>
                                        <div class="thumbnail" style="width: 80px; height: 80px; border-radius: 12px; overflow: hidden; border: 1px solid #f0f0f0;">
                                            <img src="{{ $product->thumbnail_url ?: asset('theme/images/shop/default.png') }}"
                                                 alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="information">
                                            <h6 class="title mb-1 fw-bold" style="font-size: 15px;">
                                                <a href="{{ locale_route('shop.show', $product->slug) }}" class="text-dark hover:text-primary transition-colors">{{ $product->name }}</a>
                                            </h6>
                                            <span class="text-muted" style="font-size: 12px; letter-spacing: 0.5px;">SKU: <span class="font-mono">{{ $product->sku ?? '---' }}</span></span>
                                        </div>
                                    </div>

                                    <div class="price">
                                        <p class="mb-0 fw-bold text-danger" style="font-size: 16px;">{{ $product->formatted_price }}</p>
                                        @if($product->old_price > $product->effective_price)
                                            <span class="text-muted text-decoration-line-through" style="font-size: 12px;">{{ number_format($product->old_price, 0, ',', '.') }}đ</span>
                                        @endif
                                    </div>

                                    <div class="quantity d-flex justify-content-center">
                                        <span class="badge rounded-pill px-3 py-2"
                                              style="background: {{ $product->stock > 0 ? '#eefdec' : '#fff1f2' }}; color: {{ $product->stock > 0 ? '#166534' : '#991b1b' }}; border: 1px solid {{ $product->stock > 0 ? '#bbf7d0' : '#fecaca' }}; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                                            {{ $product->stock > 0 ? Lang('in_stock') : Lang('out_of_stock') }}
                                        </span>
                                    </div>

                                    <div class="subtotal d-flex align-items-center justify-content-center flex-column gap-3">
                                        @if($product->stock > 0 && !$product->has_contact_price)
                                            <div class="quantity-edit d-flex align-items-center border rounded p-1 bg-white shadow-sm" style="width: 100px;">
                                                <button class="btn btn-sm p-0 flex-grow-1" @click="qty > 1 ? qty-- : 1" style="color: #666;"><i class="fa-regular fa-minus"></i></button>
                                                <input type="text" class="input border-0 text-center fw-bold" x-model="qty" @input="qty = Math.max(1, Math.min(999, parseInt($event.target.value) || 1))" style="width: 35px; font-size: 14px; background: transparent;">
                                                <button class="btn btn-sm p-0 flex-grow-1" @click="qty++" style="color: #666;"><i class="fa-regular fa-plus"></i></button>
                                            </div>
                                            <button type="button" @click="cart.add({{ $product->id }}, $event.target, qty)"
                                                    class="rts-btn btn-primary radious-sm d-flex align-items-center justify-content-center gap-2 px-3 py-2 w-100" style="font-size: 13px; font-weight: 700;">
                                                <i class="fa-regular fa-cart-shopping"></i> {{ strtoupper(Lang('add_to_cart')) }}
                                            </button>
                                        @else
                                            <a href="tel:{{ setting('site_phone') ?: setting('hotline') }}" class="rts-btn btn-secondary radious-sm d-flex align-items-center justify-content-center gap-2 px-3 py-2 w-100" style="font-size: 12px; font-weight: 700;">
                                                <i class="fa-regular fa-phone"></i> {{ strtoupper(Lang('contact_price')) }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .single-cart-area-list.main:hover {
            background-color: #fcfdfe;
        }
        .rts-cart-list-area.wishlist .single-cart-area-list .price,
        .rts-cart-list-area.wishlist .single-cart-area-list .quantity,
        .rts-cart-list-area.wishlist .single-cart-area-list .subtotal {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        @media (max-width: 991px) {
            .single-cart-area-list.head { display: none; }
            .single-cart-area-list.main {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 20px;
                padding: 25px !important;
            }
            .single-cart-area-list.main > div {
                width: 100% !important;
                justify-content: flex-start !important;
                align-items: flex-start !important;
                padding: 0 !important;
            }
            .product-main-cart { width: 100% !important; }
        }
    </style>

    <script>
        function removeFromWishlist(productId) {
            Swal.fire({
                title: '{{ Lang('wishlist_remove_confirm_title') }}',
                text: '{{ Lang('wishlist_remove_confirm') }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ Lang('btn_delete') }}',
                cancelButtonText: '{{ Lang('btn_cancel') }}',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '{{ Lang('processing') }}',
                        allowOutsideClick: false,
                        didOpen: () => { Swal.showLoading(); }
                    });

                    window.cwAction.removeWishlist(productId, function(response) {
                        Swal.fire({
                            title: '{{ Lang('success') }}',
                            text: response.message || '{{ Lang('wishlist_remove_success') }}',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    });
                }
            });
        }
    </script>
@endsection


