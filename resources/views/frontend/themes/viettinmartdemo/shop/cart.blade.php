@extends('layouts.app')

@section('title', Lang('cart_title'))

@section('content')
    {{-- Breadcrumb --}}
    <x-breadcrumb :items="[['label' => Lang('nav_cart')]]" />

    <div class="section-seperator bg_light-1">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

    <style>
        /* CSS đồng bộ tuyệt đối với theme Ekomart nhưng dùng class riêng để tránh xung đột JS */
        .single-cart-area-list.main .quantity-edit {
            width: 92px;
            display: flex;
            align-items: center;
            border: 1px solid rgba(43, 66, 38, 0.12);
            border-radius: 4px;
            padding: 2px 10px;
            justify-content: space-between;
            background: #fff;
            box-shadow: 0px 4px 17px rgba(0, 0, 0, 0.04);
        }
        .single-cart-area-list.main .quantity-edit .button-wrapper-action {
            border: 1px solid rgba(43, 66, 38, 0.12);
            border-radius: 2px;
            background: #fff;
            display: flex;
        }
        .single-cart-area-list.main .quantity-edit input.cart-qty-input {
            padding: 0;
            max-width: 30px !important; /* Nới rộng một chút để hiện đủ 2-3 chữ số */
            font-weight: 600;
            border: none !important;
            background: transparent !important;
            text-align: center;
        }
        .qty-btn-fix {
            padding: 0;
            max-width: max-content;
            font-size: 0;
            border: none;
            background: none;
            cursor: pointer;
        }
        .qty-btn-fix i {
            font-size: 10px;
            padding: 4px 6px;
            transition: 0.3s;
            display: block;
            color: #2C3C28;
        }
        .qty-btn-fix:first-child i {
            border-right: 1px solid rgba(43, 66, 38, 0.12);
        }
        .qty-btn-fix:hover i {
            background: var(--color-primary);
            color: #fff;
        }
        .d-none { display: none !important; }
    </style>

    <div class="rts-cart-area rts-section-gap bg_light-1">
        <div class="container">
            @if(empty($cart))
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center py-5">
                        <div class="empty-cart-wrapper p-5 bg-white rounded shadow-sm d-flex align-item-center flex-column align-items-center ">
                            <i class="fa-light fa-cart-shopping-low-capacity mb-4" style="font-size: 80px; color: #ddd;"></i>
                            <h3 class="mb-3">{{ Lang('cart_empty_title') }}</h3>
                            <p class="text-muted mb-4">{{ Lang('cart_empty_desc') }}</p>
                            <a href="{{ locale_route('shop.index') }}" class="rts-btn btn-primary">{{ __('cart_back_to_shop') }}</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row g-5">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-12 order-2 order-xl-1">
                        <div class="cart-area-main-wrapper">
                            @php
                                $threshold = (int)setting('free_shipping_threshold', 500000);
                                $remaining = max(0, $threshold - $subtotal);
                                $progress = $threshold > 0 ? min(100, ($subtotal / $threshold) * 100) : 100;
                            @endphp
                            <div class="cart-top-area-note">
                                <p id="shipping-tracker-text">
                                    @if($remaining > 0)
                                        {!! Lang('cart_free_ship_progress', ['amount' => '<span>' . number_format($remaining, 0, ',', '.') . setting('currency_symbol', 'đ') . '</span>']) !!}
                                    @else
                                        {!! Lang('cart_free_ship_congrats') !!}
                                    @endif
                                </p>
                                <div class="bottom-content-deals mt--10">
                                    <div class="single-progress-area-incard">
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" id="shipping-progress-bar" role="progressbar" style="width: {{ $progress }}%"
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rts-cart-list-area">
                            <div class="single-cart-area-list head">
                                <div class="product-main">
                                    <p>{{ Lang('cart_col_product') }}</p>
                                </div>
                                <div class="price">
                                    <p>{{ Lang('cart_col_price') }}</p>
                                </div>
                                <div class="quantity">
                                    <p>{{ Lang('cart_col_quantity') }}</p>
                                </div>
                                <div class="subtotal">
                                    <p>{{ Lang('cart_col_subtotal') }}</p>
                                </div>
                            </div>

                            @foreach($cart as $rowId => $item)
                            <div class="single-cart-area-list main item-parent" data-row-id="{{ $rowId }}">
                                <div class="product-main-cart">
                                    <div class="close section-activation cart-remove-btn" data-row-id="{{ $rowId }}" style="cursor: pointer;">
                                        <i class="fa-regular fa-x"></i>
                                    </div>
                                    <div class="thumbnail">
                                        @php
                                            $imgRaw = $item['image'];
                                            if ($imgRaw && !str_starts_with($imgRaw, 'http')) {
                                                if (str_starts_with($imgRaw, 'media/')) {
                                                    $imgSrc = \Storage::disk('public')->url($imgRaw);
                                                } else {
                                                    $imgSrc = asset($imgRaw);
                                                }
                                            } else {
                                                $imgSrc = $imgRaw ?: asset('theme/images/shop/default.png');
                                            }
                                        @endphp
                                        <img src="{{ $imgSrc }}" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="information">
                                        <h6 class="title mb-1">
                                            <a href="{{ locale_route('shop.show', $item['slug']) }}">{{ $item['name'] }}</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="price">
                                    <p>{{ number_format($item['price'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</p>
                                </div>
                                <div class="quantity">
                                    <div class="quantity-edit">
                                        <input type="text" class="input cart-qty-input" value="{{ $item['qty'] }}" data-row-id="{{ $rowId }}">
                                        <div class="button-wrapper-action">
                                            <button class="qty-btn-fix cart-qty-btn" data-row-id="{{ $rowId }}" data-action="minus"><i class="fa-regular fa-chevron-down"></i></button>
                                            <button class="qty-btn-fix plus cart-qty-btn" data-row-id="{{ $rowId }}" data-action="plus"><i class="fa-regular fa-chevron-up"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="subtotal">
                                    <p class="item-subtotal">{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</p>
                                </div>
                            </div>
                            @endforeach

                            <div class="bottom-cupon-code-cart-area">
                                <form id="apply-coupon-form" style="display: flex; gap: 10px; align-items: center;">
                                    <input type="text" id="coupon-code-input" placeholder="{{ Lang('cart_coupon_placeholder') }}" style="padding: 10px 15px; border: 1px solid #ddd; border-radius: 4px; min-width: 200px;">
                                    <button type="submit" class="rts-btn btn-primary">{{ Lang('cart_coupon_apply') }}</button>
                                </form>
                                <a href="javascript:void(0);" id="clear-cart-btn" class="rts-btn btn-primary">{{ Lang('cart_clear_all') }}</a>
                            </div>

                            @if(!empty($validCoupons))
                            <div class="applied-coupons-list mt-4 p-3 bg-white border rounded">
                                <h6 class="mb-3" style="font-size: 14px;">{{ Lang('cart_applied_coupons') }}</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($validCoupons as $vCoupon)
                                        <div class="applied-coupon-item d-flex align-items-center gap-2" style="background: #f8f9fa; border: 1px solid #e9ecef; padding: 5px 12px; border-radius: 20px;">
                                            <span class="fw-bold text-success">{{ $vCoupon['code'] }}</span>
                                            <span class="text-muted" style="font-size: 12px;">(-{{ number_format($vCoupon['discount'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }})</span>
                                            <button type="button" class="remove-single-coupon" data-id="{{ $vCoupon['id'] }}" style="border: none; background: transparent; color: #ff4d4d; padding: 0 0 0 5px; cursor: pointer;">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-12 col-md-12 col-12 order-1 order-xl-2">
                        <div class="cart-total-area-start-right">
                            <h5 class="title">{{ Lang('cart_summary_title') }}</h5>
                            <div class="subtotal">
                                <span>{{ Lang('cart_subtotal') }}</span>
                                <h6 class="price cart-subtotal-val">{{ number_format($subtotal, 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</h6>
                            </div>
                            
                            <div id="cart-discounts-container">
                                @if(!empty($validCoupons))
                                    @foreach($validCoupons as $vCoupon)
                                    <div class="subtotal" style="border-top: 1px dashed #eee; padding-top: 10px; margin-top: 10px;">
                                        <span class="text-success">{{ Lang('cart_discount') }} ({{ $vCoupon['code'] }})</span>
                                        <h6 class="price text-success">-{{ number_format($vCoupon['discount'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</h6>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="shipping">
                                <span>{{ Lang('cart_shipping') }}</span>
                                <ul>
                                    <li>
                                        <input type="radio" id="f-option" name="shipping_selector" checked>
                                        <label for="f-option">{{ Lang('cart_free_shipping') }}</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input type="radio" id="s-option" name="shipping_selector" disabled>
                                        <label for="s-option" class="opacity-50">{{ Lang('cart_flat_rate') }}</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <p>{{ Lang('cart_shipping_note') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <div class="wrapper">
                                    <span>{{ Lang('cart_total') }}</span>
                                    <h6 class="price cart-total-val">{{ number_format($subtotal - $totalDiscount, 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</h6>
                                </div>
                                <div class="button-area">
                                    <a href="{{ locale_route('checkout.index') }}" class="rts-btn btn-primary">{{ Lang('cart_proceed_checkout') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const token = $('meta[name="csrf-token"]').attr('content');
    const _i18n = {
        confirmDelete: '{{ __('swal_confirm_delete') }}',
        confirmDeleteItem: '{{ __('swal_confirm_delete_item') }}',
        deleted: '{{ __('swal_deleted') }}',
        itemRemoved: '{{ __('swal_item_removed') }}',
        deleteError: '{{ __('swal_delete_error') }}',
        clearCartTitle: '{{ __('swal_clear_cart_title') }}',
        clearing: '{{ __('swal_clearing') }}',
        pleaseWait: '{{ __('swal_please_wait') }}',
        cartCleared: '{{ __('swal_cart_cleared') }}',
        clearError: '{{ __('swal_clear_error') }}',
        deleteAll: '{{ __('swal_delete_all') }}',
        cancel: '{{ __('swal_cancel') }}',
        close: '{{ __('swal_close') }}',
        delete: '{{ __('swal_delete') }}',
        processing: '{{ __('swal_processing') }}',
        success: '{{ __('swal_success') }}',
        error: '{{ __('swal_error') }}',
        cartDiscount: '{{ __('cart_discount') }}',
        freeShipProgress: '{{ __('cart_free_ship_progress', ['amount' => ':amount']) }}',
        freeShipCongrats: '{!! __('cart_free_ship_congrats') !!}',
        couponRequired: '{{ __('cart_coupon_required') }}',
    };

    // Remove item
    $(document).on('click', '.cart-remove-btn', function() {
        const rowId = $(this).data('row-id');
        const $row = $(this).closest('.item-parent');
        const productName = $row.find('.product-name').text().trim();

        Swal.fire({
            title: _i18n.confirmDelete,
            text: _i18n.confirmDeleteItem.replace(':name', productName),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: _i18n.delete,
            cancelButtonText: _i18n.cancel,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('{{ locale_route('cart.remove') }}', { rowId, _token: token }, function(res) {
                    $row.fadeOut(300, function() {
                        $(this).remove();
                        if ($('.item-parent').length === 0) {
                            location.reload();
                        } else {
                            refreshTotals();
                            Swal.fire({
                                title: _i18n.deleted,
                                text: _i18n.itemRemoved,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    });
                    updateHeaderCount();
                }).fail(function() {
                    Swal.fire({ title: _i18n.error, text: _i18n.deleteError, icon: 'error' });
                });
            }
        });
    });

    // Qty update via buttons
    $(document).on('click', '.cart-qty-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();

        const rowId = $(this).data('row-id');
        const action = $(this).data('action');
        const $input = $(this).closest('.quantity-edit').find('.cart-qty-input');
        
        let qty = parseInt($input.val()) || 1;
        qty = action === 'plus' ? qty + 1 : Math.max(1, qty - 1);
        $input.val(qty);
        
        updateQty(rowId, qty, $(this).closest('.item-parent').find('.item-subtotal'));
    });

    // Manual Qty Input
    $(document).on('change', '.cart-qty-input', function() {
        const rowId = $(this).data('row-id');
        let qty = Math.max(1, parseInt($(this).val()) || 1);
        $(this).val(qty);
        updateQty(rowId, qty, $(this).closest('.item-parent').find('.item-subtotal'));
    });

    // Clear All
    $('#clear-cart-btn').on('click', function() {
        const itemCount = $('.item-parent').length;
        
        Swal.fire({
            title: _i18n.clearCartTitle,
            text: _i18n.clearCartTitle.replace(':count', itemCount),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: _i18n.deleteAll,
            cancelButtonText: _i18n.cancel,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: _i18n.clearing,
                    text: _i18n.pleaseWait,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => { Swal.showLoading(); }
                });
                
                $.post('{{ locale_route('cart.clear') }}', { _token: token }, function() {
                    Swal.fire({
                        title: _i18n.deleted,
                        text: _i18n.cartCleared,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => location.reload());
                }).fail(function() {
                    Swal.fire({ title: _i18n.error, text: _i18n.clearError, icon: 'error' });
                });
            }
        });
    });

    function updateQty(rowId, qty, $subtotalEl) {
        $.post('{{ locale_route('cart.update') }}', { rowId, qty, _token: token }, function(res) {
            if (res && res.item_subtotal_formatted) {
                $subtotalEl.text(res.item_subtotal_formatted);
            }
            refreshTotals();
            updateHeaderCount();
        });
    }

    function refreshTotals() {
        $.get('{{ locale_route('cart.total') }}', function(data) {
            $('.cart-subtotal-val').text(data.subtotal_formatted);
            $('.cart-total-val').text(data.total_formatted);

            let $container = $('#cart-discounts-container');
            $container.empty();
            if (data.coupons && data.coupons.length > 0) {
                data.coupons.forEach(function(c) {
                    $container.append(`
                        <div class="subtotal" style="border-top: 1px dashed #eee; padding-top: 10px; margin-top: 10px;">
                            <span class="text-success">${_i18n.cartDiscount} (${c.code})</span>
                            <h6 class="price text-success">${c.discount_formatted}</h6>
                        </div>
                    `);
                });
            }

            const total = data.subtotal;
            const threshold = {{ (int)setting('free_shipping_threshold', 500000) }};
            const remaining = Math.max(0, threshold - total);
            const progress = Math.min(100, (total / threshold) * 100);

            $('#shipping-progress-bar').css('width', progress + '%');
            
            if (remaining > 0) {
                let formattedRemaining = new Intl.NumberFormat('{{ app()->getLocale() == 'vi' ? 'vi-VN' : 'en-US' }}').format(remaining) + '{{ setting('currency_symbol', 'đ') }}';
                $('#shipping-tracker-text').html(_i18n.freeShipProgress.replace(':amount', `<span>${formattedRemaining}</span>`));
            } else {
                $('#shipping-tracker-text').html(_i18n.freeShipCongrats);
            }
        });
    }

    // Apply Coupon
    $('#apply-coupon-form').on('submit', function(e) {
        e.preventDefault();
        const code = $('#coupon-code-input').val().trim();
        if (!code) {
            Swal.fire({ icon: 'warning', title: 'Thiếu mã', text: _i18n.couponRequired, confirmButtonText: 'Đóng' });
            return;
        }

        const $btn = $(this).find('button[type="submit"]');
        const origText = $btn.text();
        $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');

        $.post('{{ locale_route('cart.apply-coupon') }}', { code, _token: token }, function(res) {
            if (res.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: res.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => location.reload());
            } else {
                Swal.fire({ icon: 'error', title: 'Không thể áp dụng', text: res.message, confirmButtonText: 'Đóng' });
            }
        }).fail(function(xhr) {
            let msg = 'Đã có lỗi xảy ra.';
            if (xhr.status === 429) {
                msg = 'Bạn thử quá nhiều lần. Vui lòng đợi 1 phút rồi thử lại.';
            } else if (xhr.responseJSON?.message) {
                msg = xhr.responseJSON.message;
            }
            Swal.fire({ icon: 'error', title: 'Lỗi', text: msg, confirmButtonText: 'Đóng' });
        }).always(function() {
            $btn.prop('disabled', false).text(origText);
        });
    });

    // Remove Single Coupon
    $(document).on('click', '.remove-single-coupon', function() {
        const couponId = $(this).data('id');
        $.post('{{ locale_route('cart.remove-coupon') }}', { coupon_id: couponId, _token: token }, function(res) {
            if (res.success) location.reload();
        });
    });

    function updateHeaderCount() {
        if (typeof cart !== 'undefined' && cart.updateDropdown) {
            cart.updateDropdown();
        }
        $.get('{{ locale_route('cart.count') }}', function(data) {
            $('.cart .number').text(data.count);
        });
    }
});
</script>
@endpush


