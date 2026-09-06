@extends('layouts.app')

@section('title', Lang('checkout_title'))

@section('content')
    <x-breadcrumb :items="[
            ['label' => Lang('common_shop'), 'url' => locale_route('shop.index')],
            ['label' => Lang('checkout_title')]
        ]" />

    <div class="checkout-area rts-section-gap">
        <div class="container">


            @if(session('error'))
                <div class="alert alert-danger mb--30 p-4 rounded-3 border-0 shadow-sm" style="background-color: #ffe5e5; color: #d32f2f;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ locale_route('checkout.store') }}" method="POST" id="checkout-form" novalidate>
                @csrf
                <div class="row">
                    
                    <div class="col-lg-8 order-1">
                        <div class="checkout-billing-section">
                            @auth
                                @if(auth()->user()->addresses->count() > 0)
                                    <div class="saved-addresses-wrapper mb-4">
                                        <h4 class="h5 mb-3">{{ Lang('checkout_saved_address') }}</h4>
                                        <div class="row g-3">
                                            @foreach(auth()->user()->addresses->sortByDesc('is_default') as $addr)
                                                <div class="col-md-6">
                                                    <div class="address-card p-3 border rounded pointer {{ $addr->is_default ? 'selected border-primary bg_light-2 shadow-sm' : '' }}" 
                                                         data-id="{{ $addr->id }}"
                                                         data-receiver-name="{{ $addr->receiver_name }}"
                                                         data-receiver-phone="{{ $addr->receiver_phone }}"
                                                         data-province="{{ $addr->province_code ?: $addr->province_name }}"
                                                         data-district="{{ $addr->district_name }}"
                                                         data-ward="{{ $addr->ward_code ?: $addr->ward_name }}"
                                                         data-detail="{{ $addr->address_detail }}">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="selection-indicator me-2">
                                                                    <i class="fa-regular {{ $addr->is_default ? 'fa-circle-dot text-primary' : 'fa-circle text-muted' }}"></i>
                                                                </div>
                                                                <h6 class="mb-0">{{ $addr->receiver_name }}</h6>
                                                            </div>
                                                            @if($addr->is_default)
                                                                <span class="badge bg-primary px-2 py-1" style="font-size: 0.6rem;">{{ Lang('checkout_default_badge') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="ms-4">
                                                            <p class="small text-muted mb-1"><i class="fa-solid fa-phone me-2"></i>{{ $addr->receiver_phone }}</p>
                                                            <p class="small text-dark mb-0"><i class="fa-solid fa-location-dot me-2"></i>{{ Str::limit($addr->full_address, 70) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-md-6">
                                                <div class="address-card p-3 border rounded pointer d-flex align-items-center h-100 border-dashed" data-id="new">
                                                    <div class="selection-indicator me-3">
                                                        <i class="fa-regular fa-circle text-muted"></i>
                                                    </div>
                                                    <span class="small fw-bold text-primary"><i class="fa-solid fa-plus me-2"></i>{{ Lang('checkout_use_other_address') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="saved_address_id" id="saved_address_id" value="{{ auth()->user()->addresses->where('is_default', true)->first()?->id }}">
                                    </div>
                                @endif
                            @endauth       

                            <div class="rts-billing-details-area" id="manual_address_fields">
                                @php
                                    $defaultAddr = auth()->user()?->addresses->where('is_default', true)->first();
                                    $defaultName = $defaultAddr ? $defaultAddr->receiver_name : (auth()->user()?->name ?? '');
                                    $defaultPhone = $defaultAddr ? $defaultAddr->receiver_phone : (auth()->user()?->phone ?? '');
                                    
                                    $nameParts = explode(' ', trim($defaultName));
                                    $lastName = count($nameParts) > 1 ? array_pop($nameParts) : '';
                                    $firstName = implode(' ', $nameParts) ?: $defaultName;
                                @endphp
                                
                                <h3 class="title animated fadeIn h5 mb-3">{{ Lang('checkout_billing_title') }}</h3>

                                <div class="half-input-wrapper mb-3">
                                    <x-form-input name="first_name" id="f-name" label="{{ Lang('checkout_first_name') }}" placeholder="Nguyễn Văn" required 
                                                 value="{{ old('first_name', $firstName) }}" />
                                    <x-form-input name="last_name" id="l-name" label="{{ Lang('checkout_last_name') }}" placeholder="A" required 
                                                 value="{{ old('last_name', $lastName) }}" />
                                </div>

                                <div class="half-input-wrapper mb-3">
                                    <x-form-input name="email" id="email" type="email" label="{{ Lang('checkout_email') }}" placeholder="example@gmail.com" required 
                                                 value="{{ old('email', auth()->user()?->email) }}" />
                                    <x-form-input name="phone" id="phone" label="{{ Lang('checkout_phone') }}" placeholder="0123 456 789" required 
                                                 value="{{ old('phone', $defaultPhone) }}" />
                                </div>

                                <div id="address_fields_wrapper">
                                    <x-address-selector 
                                        id="checkout-addr"
                                        :selected-province="old('province_code', auth()->user()?->province_code)"
                                        :selected-district="old('district_code', auth()->user()?->district_code)"
                                        :selected-ward="old('ward_code', auth()->user()?->ward_code)"
                                    />

                                    <x-form-input name="street_address" id="street" label="{{ Lang('checkout_address_detail') }}" placeholder="{{ Lang('checkout_address_detail') }}" required 
                                                 value="{{ old('street_address', auth()->user()?->address_detail) }}" />
                                </div>
                            </div>

                            <div class="single-input mt-4">
                                <label for="ordernotes" class="h6 mb-2">{{ Lang('checkout_notes_label') }}</label>
                                <textarea id="ordernotes" name="notes" class="form-control" rows="3"
                                    placeholder="{{ Lang('checkout_notes_placeholder') }}">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-4 order-2">
                        <h3 class="title-checkout animated fadeIn">{{ Lang('checkout_order_summary') }}</h3>
                        <div class="right-card-sidebar-checkout p-4 border rounded-3 bg-white shadow-sm">
                            
                            <!-- Voucher Section -->
                            <div class="voucher-selection-area mb--30">
                                <div class="d-flex align-items-center justify-content-between mb--15">
                                    <h4 class="h6 mb-0 text-uppercase fw-bold" style="letter-spacing: 0.5px; color: #2C3C28;">{{ Lang('checkout_voucher_title') }}</h4>
                                    <span class="text-primary small pointer fw-bold" data-bs-toggle="modal" data-bs-target="#voucherModal">{{ Lang('checkout_voucher_see_more') }}</span>
                                </div>
                                
                                <div class="input-group mb-3 coupon ">
                                    <input type="text" id="coupon_code_input" class="form-control" placeholder="{{ Lang('checkout_voucher_placeholder') }}" 
                                           style="height: 45px; border-radius: 4px 0 0 4px; border-right: none;">
                                    <button class="btn btn-primary px-4 fw-bold apply-coupon-btn" type="button" 
                                            style="height: 45px; border-radius: 0 4px 4px 0; font-size: 13px;">{{ Lang('checkout_voucher_apply') }}</button>
                                </div>

                                <div class="selected-vouchers-list">
                                    @php
                                        $appliedCodes = array_column($couponList, 'code');
                                    @endphp
                                    @foreach($availableCoupons->whereIn('code', $appliedCodes) as $coupon)
                                        <div class="voucher-card d-flex mb-3 align-items-stretch position-relative" 
                                             style="height: 90px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05)); border: 1px solid var(--color-primary); border-radius: 4px;">
                                            <!-- Left side (Logo/Icon) -->
                                            <div class="voucher-left bg-primary d-flex flex-column align-items-center justify-content-center text-white px-2 py-1 position-relative" 
                                                 style="width: 80px; border-radius: 3px 0 0 3px;">
                                                <img src="{{ media_url('media/viettinmart-logo-tach-nen-1774681112-1775614627.png') }}" alt="VTM" style="width: 30px; margin-bottom: 2px; filter: brightness(0) invert(1);">
                                                <span style="font-size: 8px; font-weight: 700;">{{ setting('site_name', 'VietTinMart') }}</span>
                                            </div>
                                            <!-- Right side (Content) -->
                                            <div class="voucher-right flex-grow-1 bg-white p-2 d-flex flex-column justify-content-center position-relative" 
                                                 style="border-radius: 0 4px 4px 0;">
                                                <div class="info">
                                                    <h5 class="mb-0 fw-bold text-primary" style="font-size: 13px;">Đã áp dụng mã: {{ $coupon->code }}</h5>
                                                    <p class="mb-0 text-muted" style="font-size: 10px;">Giảm {{ $coupon->type === 'fixed' ? number_format($coupon->value, 0, ',', '.') . 'đ' : $coupon->value . '%' }}</p>
                                                </div>
                                                <div class="action-btn position-absolute top-0 end-0 p-2">
                                                    <button type="button" class="btn-close remove-coupon-btn" data-id="{{ $coupon->id }}" style="font-size: 8px;"></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if(count($appliedCodes) == 0)
                                        <div class="text-center py-3 border rounded-3 dashed mb-3" style="border: 1px dashed #ddd;">
                                            <p class="small text-muted mb-0">{{ Lang('checkout_no_voucher') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="top-wrapper border-bottom pb--15 mb--15">
                                <div class="product fw-bold text-uppercase" style="font-size: 13px; color: #777;">{{ Lang('checkout_col_product') }}</div>
                                <div class="price fw-bold text-uppercase" style="font-size: 13px; color: #777;">{{ Lang('checkout_col_total') }}</div>
                            </div>

                            <div class="cart-items-list" style="max-height: 450px; overflow-y: auto;">
                                @foreach($cart as $item)
                                    <div class="single-shop-list">
                                        <div class="left-area">
                                            <a href="{{ locale_route('shop.show', $item['slug']) }}" class="thumbnail">
                                                @php
                                                    $imgSrc = media_url($item['image'] ?? '', 'theme/images/shop/default.png');
                                                @endphp
                                                <img src="{{ $imgSrc }}" alt="{{ $item['name'] }}">
                                            </a>
                                            <div class="info" style="flex: 1; padding-left: 15px;">
                                                <a href="{{ locale_route('shop.show', $item['slug']) }}" class="title"
                                                    style="font-size: 14px; font-weight: 500; color: #2C3C28; line-height: 1.4; display: block; margin-bottom: 2px;">{{ $item['name'] }}</a>
                                                <span class="qty" style="font-size: 12px; color: #777;">{{ Lang('checkout_qty_label') }} {{ $item['qty'] }}</span>
                                            </div>
                                        </div>
                                        <span class="price" style="font-weight: 500; color: #2C3C28;">{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="single-shop-list mt--20">
                                <div class="left-area"><span>{{ Lang('checkout_subtotal') }}</span></div>
                                <span class="price">{{ number_format($subtotal, 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</span>
                            </div>

                            @if($totalDiscount > 0)
                                @foreach($couponList as $cItem)
                                <div class="single-shop-list">
                                    <div class="left-area"><span class="text-success">{{ Lang('cart_discount') }} ({{ $cItem['code'] }})</span></div>
                                    <span class="price text-success">-{{ number_format($cItem['discount'], 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}</span>
                                </div>
                                @endforeach
                            @endif

                            <div class="single-shop-list">
                                <div class="left-area"><span>{{ Lang('checkout_shipping_fee') }}</span></div>
                                <span class="price shipping-fee">
                                    @php
                                        $threshold = (float)setting('free_shipping_threshold', 500000);
                                        $defaultFee = (float)setting('default_shipping_fee', 30000);
                                    @endphp
                                    {{ $subtotal >= $threshold ? Lang('checkout_free_shipping') : number_format($defaultFee, 0, ',', '.') . setting('currency_symbol', 'đ') }}
                                </span>
                            </div>

                            <div class="single-shop-list border-top pt--20">
                                <div class="left-area">
                                    <span style="font-weight: 600; color: #2C3C28; font-size: 18px;">{{ Lang('checkout_total') }}</span>
                                </div>
                                <span class="price" style="color: #629D23; font-size: 20px; font-weight: 700;">
                                    @php
                                        $threshold = (float)setting('free_shipping_threshold', 500000);
                                        $defaultFee = (float)setting('default_shipping_fee', 30000);
                                        $shipping = $subtotal >= $threshold ? 0 : $defaultFee;
                                        $finalTotal = max(0, $subtotal - $totalDiscount + $shipping);
                                    @endphp
                                    {{ number_format($finalTotal, 0, ',', '.') }}{{ setting('currency_symbol', 'đ') }}
                                </span>
                            </div>

                            <div class="cottom-cart-right-area mt--30">
                                <h4 class="mb--20 h6 text-uppercase fw-extrabold" style="letter-spacing: 1px;">{{ Lang('checkout_payment_title') }}</h4>
                                <ul class="list-unstyled p-0 m-0">
                                    @if(setting('cod_enabled', true))
                                    <li class="mb--15 d-flex align-items-center">
                                        <input type="radio" id="cod" name="payment_method" value="cod" checked
                                            style="width: auto; margin-right: 10px;">
                                        <label for="cod" class="m-0 pointer">{{ Lang('checkout_payment_cod') }}</label>
                                    </li>
                                    @endif

                                    @if(setting('bank_transfer_enabled', true))
                                    <li class="mb--20 d-flex align-items-center">
                                        <input type="radio" id="bacs" name="payment_method" value="bank_transfer"
                                            style="width: auto; margin-right: 10px;">
                                        <label for="bacs" class="m-0 pointer">{{ Lang('checkout_payment_bank') }}</label>
                                    </li>
                                    @endif

                                    @if(setting('momo_enabled', false))
                                    <li class="mb--20 d-flex align-items-center">
                                        <input type="radio" id="momo" name="payment_method" value="momo"
                                            style="width: auto; margin-right: 10px;">
                                        <label for="momo" class="m-0 pointer">{{ Lang('checkout_payment_momo') }}</label>
                                    </li>
                                    @endif
                                </ul>

                                <p class="mb--25 small text-muted lh-base">
                                    {{ Lang('checkout_privacy_note') }}
                                </p>

                                <div class="single-category mb--30">
                                    <input id="agree" type="checkbox" required name="agree"
                                        style="width: auto; margin-right: 10px;">
                                    <label for="agree" class="pointer small">{{ Lang('checkout_agree_terms') }}</label>
                                </div>

                                <button type="submit" class="rts-btn btn-primary w-100 py-4 fw-bold h6 m-0 shadow-sm"
                                    style="border-radius: 8px; letter-spacing: 0.5px;">{{ Lang('checkout_place_order') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Move to global scope so it's accessible
            function handleAddressCardSelection($card) {
                $('.address-card').removeClass('selected border-primary bg_light-2 text-primary shadow-sm');
                $('.address-card .selection-indicator i').removeClass('fa-circle-dot text-primary').addClass('fa-circle text-muted');
                
                $card.addClass('selected border-primary bg_light-2 text-primary shadow-sm');
                $card.find('.selection-indicator i').removeClass('fa-circle text-muted').addClass('fa-circle-dot text-primary');
                
                const val = $card.data('id');
                $('#saved_address_id').val(val);
                const $manualFields = $('#manual_address_fields');
                
                if (val === 'new') {
                    // Clear fields
                    $('#f-name, #l-name, #phone, #street').val('');
                    
                    const $container = $('#checkout-addr');
                    $container.attr('data-initial-p', '');
                    $container.attr('data-initial-d', '');
                    $container.attr('data-initial-w', '');
                    
                    $('#province-checkout-addr').val('').trigger('change').trigger('change.select2');
                } else {
                    // Fill manual fields with card data
                    
                    const name = $card.data('receiver-name') || '';
                    const phone = $card.data('receiver-phone') || '';
                    const pCode = $card.data('province');
                    const dCode = $card.data('district');
                    const wCode = $card.data('ward');
                    const detail = $card.data('detail');

                    const nameParts = name.trim().split(/\s+/);
                    let firstName = '';
                    let lastName = '';
                    
                    if (nameParts.length > 1) {
                        lastName = nameParts.pop();
                        firstName = nameParts.join(' ');
                    } else {
                        firstName = name;
                        lastName = '';
                    }

                    $('#f-name').val(firstName);
                    $('#l-name').val(lastName);
                    $('#phone').val(phone);
                    $('#street').val(detail);

                    // Reset email to default user email
                    @auth
                        $('#email').val('{{ auth()->user()->email }}');
                    @endauth

                    // Update address selector container data attributes so it knows what to select
                    const $container = $('#checkout-addr');
                    console.log("Setting target address codes on container:", { pCode, dCode, wCode });
                    $container.attr('data-initial-p', pCode);
                    $container.attr('data-initial-d', dCode);
                    $container.attr('data-initial-w', wCode);

                    console.log("Triggering province change for:", pCode);
                    $('#province-checkout-addr').val(pCode).trigger('change').trigger('change.select2');
                }
            };

            $(document).ready(function () {

                $(document).on('click', '.address-card', function() {
                    handleAddressCardSelection($(this));
                });

                // Initial Load for default address card
                const $defaultCard = $('.address-card.selected');
                if ($defaultCard.length) {
                    // Pre-fill fields but don't hide
                    setTimeout(() => handleAddressCardSelection($defaultCard), 100);
                }

                // Form Validation & Loading State
                $('#checkout-form').on('submit', function (e) {
                    const $form = $(this);
                    const $btn = $form.find('button[type="submit"]');

                    let isValid = true;

                    // Reset previous styles and error messages
                    $('.error-msg').text('');
                    $('.form-control').css('border-color', '#eeeeee');

                    function setError(id, msg) {
                        $(`#error-${id}`).text(msg);
                        $(`#${id}`).addClass('border-danger');
                        $(`#${id}`).css('border-color', '#d32f2f');
                        isValid = false;
                    }

                    // Check products stock first
                    const hasInsufficientStock = $('.cart-items-list .text-danger').length > 0;
                    if (hasInsufficientStock) {
                        Swal.fire({
                            title: 'Lỗi tồn kho!',
                            text: 'Thay đổi số lượng giỏ hàng vì một số sản phẩm đã hết hàng hoặc không đủ tồn kho.',
                            icon: 'error',
                            confirmButtonText: 'Đóng'
                        });
                        return false;
                    }

                    // Validate Fields
                    if (!$('#f-name').val().trim()) setError('f-name', "{{ Lang('checkout_first_name_required', [], 'vi') == 'checkout_first_name_required' ? 'Vui lòng nhập Họ.' : Lang('checkout_first_name_required') }}");
                    if (!$('#l-name').val().trim()) setError('l-name', "{{ Lang('checkout_last_name_required', [], 'vi') == 'checkout_last_name_required' ? 'Vui lòng nhập Tên.' : Lang('checkout_last_name_required') }}");
                    
                    const email = $('#email').val().trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!email) setError('email', "{{ Lang('checkout_email_required', [], 'vi') == 'checkout_email_required' ? 'Vui lòng nhập Địa chỉ Email.' : Lang('checkout_email_required') }}");
                    else if (!emailRegex.test(email)) setError('email', "{{ Lang('checkout_email_invalid', [], 'vi') == 'checkout_email_invalid' ? 'Địa chỉ Email không hợp lệ.' : Lang('checkout_email_invalid') }}");

                    const phone = $('#phone').val().trim();
                    if (!phone) setError('phone', "{{ Lang('checkout_phone_required', [], 'vi') == 'checkout_phone_required' ? 'Vui lòng nhập Số điện thoại.' : Lang('checkout_phone_required') }}");

                    // Address Validation
                    if (!$('#province-checkout-addr').val()) setError('province-checkout-addr', "{{ Lang('checkout_select_province', [], 'vi') == 'checkout_select_province' ? 'Vui lòng chọn Tỉnh / Thành phố.' : Lang('checkout_select_province') }}");
                    if (!$('#ward-checkout-addr').val()) setError('ward-checkout-addr', "{{ Lang('checkout_select_ward', [], 'vi') == 'checkout_select_ward' ? 'Vui lòng chọn Phường / Xã.' : Lang('checkout_select_ward') }}");
                    if (!$('#street').val().trim()) setError('street', "{{ Lang('checkout_address_required', [], 'vi') == 'checkout_address_required' ? 'Vui lòng nhập Địa chỉ chi tiết.' : Lang('checkout_address_required') }}");
                    
                    if (!$('#agree').is(':checked')) {
                        Swal.fire({
                            title: 'Thiếu xác nhận!',
                            text: "{{ Lang('checkout_agree_required', [], 'vi') == 'checkout_agree_required' ? 'Bạn phải đồng ý với Điều khoản & Chính sách.' : Lang('checkout_agree_required') }}",
                            icon: 'warning',
                            confirmButtonText: 'Đóng'
                        });
                        isValid = false;
                    }

                    if (!isValid) {
                        e.preventDefault();
                        // Scroll to the first error
                        const firstError = $('.error-msg:not(:empty)').first().parent();
                        if (firstError.length) {
                             $('html, body').animate({
                                scrollTop: firstError.offset().top - 150
                            }, 500);
                        }
                        return false;
                    }

                    // Form is valid - Show loading
                    $btn.prop('disabled', true)
                        .addClass('opacity-50')
                        .html('<i class="fa-solid fa-spinner fa-spin me-2"></i> {{ Lang('checkout_processing') }}');
                    
                    return true;
                });

                // Voucher Selection & Application
                $('.apply-coupon-btn').on('click', function() {
                    const code = $('#coupon_code_input').val().trim();
                    if (!code) {
                        alert("Vui lòng nhập mã giảm giá.");
                        return;
                    }
                    applyCouponCode(code);
                });

                $(document).on('click', '.select-voucher-btn', function() {
                    const code = $(this).data('code');
                    applyCouponCode(code);
                });

                function applyCouponCode(code) {
                    const $btn = $('.apply-coupon-btn');
                    const originalText = $btn.text();
                    
                    $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');

                    $.ajax({
                        url: '{{ locale_route("cart.apply-coupon") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            code: code
                        },
                        success: function(res) {
                            if (res.success) {
                                // Close modal if open
                                $('#voucherModal').modal('hide');
                                // Clear input
                                $('#coupon_code_input').val('');
                                // Show success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành công!',
                                    text: res.message || 'Đã áp dụng mã giảm giá.',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Không thể áp dụng',
                                    text: res.message || "Mã giảm giá không hợp lệ.",
                                    confirmButtonText: 'Đóng'
                                });
                            }
                        },
                        error: function(xhr) {
                            let errorMsg = "Đã có lỗi xảy ra. Vui lòng thử lại.";
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: errorMsg,
                                confirmButtonText: 'Đóng'
                            });
                        },
                        complete: function() {
                            $btn.prop('disabled', false).text(originalText);
                        }
                    });
                }

                $(document).on('click', '.remove-coupon-btn', function() {
                    const id = $(this).data('id');
                    const $btn = $(this);
                    const originalText = $btn.html();
                    
                    $btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    
                    $.post('{{ locale_route("cart.remove-coupon") }}', {
                        _token: '{{ csrf_token() }}',
                        coupon_id: id
                    }, function(res) {
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã gỡ',
                                text: res.message || 'Đã gỡ mã giảm giá.',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        }
                    }).fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Không thể gỡ mã giảm giá.',
                            confirmButtonText: 'Đóng'
                        });
                        $btn.prop('disabled', false).html(originalText);
                    });
                });

                // Clear errors on input
                $('.form-control, select:not(.rts-custom-select)').on('input change', function() {
                    const id = $(this).attr('id');
                    $(`#error-${id}`).text('');
                    $(this).css('border-color', '#eeeeee');
                });
            });
        </script>
    @endpush

    <style>
        .rts-custom-select {
            height: 50px !important;
            border: 1px solid #eeeeee !important;
            background: #fff !important;
            padding-left: 20px !important;
            border-radius: 4px !important;
            color: #777 !important;
            width: 100% !important;
            outline: none !important;
            display: block;
        }

        .pointer {
            cursor: pointer;
        }

        .single-shop-list {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed #eee;
        }

        .single-shop-list:last-child {
            border-bottom: none;
        }

        .single-shop-list .left-area {
            display: flex;
            align-items: center;
        }

        .half-input-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .half-input-wrapper {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        .single-shop-list .left-area .thumbnail img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #f0f0f0;
        }

        .rts-billing-details-area .title {
            font-size: 24px;
            font-weight: 700;
            color: #2C3C28;
            margin-bottom: 30px;
        }

        .single-input label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            color: #2C3C28;
        }

        .single-input input,
        .single-input textarea {
            border: 1px solid #eeeeee !important;
            padding: 15px 20px !important;
            border-radius: 6px !important;
            width: 100% !important;
            transition: all 0.3s ease;
        }

        .single-input input:focus,
        .single-input textarea:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
            outline: none;
        }

        .single-input textarea {
            height: 120px !important;
        }
    </style>

    <!-- Voucher Modal -->
    <div class="modal fade" id="voucherModal" tabindex="-1" aria-labelledby="voucherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 overflow-hidden" style="border-radius: 12px; background: #f8f9fa;">
                <div class="modal-header border-bottom-0 p-4 pb-0">
                    <h5 class="modal-title fw-bold" id="voucherModalLabel" style="color: #2C3C28;">{{ Lang('checkout_voucher_warehouse') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" style="max-height: 70vh; overflow-y: auto;">
                    @if($availableCoupons->isEmpty())
                        <div class="text-center py-5">
                            <i class="fa-solid fa-ticket fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Hiện tại không có voucher nào khả dụng.</p>
                        </div>
                    @else
                        <div class="row g-4">
                            @foreach($availableCoupons as $coupon)
                                @php
                                    // Tính discount trên subtotal không bao gồm combo
                                    $discountableSubtotal = collect($cart)
                                        ->filter(fn($i) => empty($i['is_combo']))
                                        ->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 1));
                                    
                                    $invalidReason = $coupon->getInvalidReason($discountableSubtotal);
                                    $isApplied = in_array($coupon->code, array_column($couponList, 'code'));
                                @endphp
                                <div class="col-md-6">
                                    <div class="voucher-card d-flex align-items-stretch position-relative {{ $invalidReason ? 'opacity-75' : '' }}" 
                                         style="height: 110px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05)); border-radius: 6px; overflow: hidden; border: 1px solid {{ $isApplied ? 'var(--color-primary)' : '#e0e0e0' }};">
                                        <div class="voucher-left bg-primary d-flex flex-column align-items-center justify-content-center text-white px-3" style="width: 100px;">
                                            <img src="{{ media_url('media/viettinmart-logo-tach-nen-1774681112-1775614627.png') }}" style="width: 40px; filter: brightness(0) invert(1);">
                                            <span style="font-size: 9px; font-weight: 700; margin-top: 5px;">{{ setting('site_name', 'VietTinMart') }}</span>
                                        </div>
                                        <div class="voucher-right flex-grow-1 bg-white p-3 d-flex flex-column justify-content-between">
                                            <div>
                                                <h6 class="mb-0 fw-bold" style="font-size: 15px;">Giảm {{ $coupon->type === 'fixed' ? number_format($coupon->value, 0, ',', '.') . 'đ' : $coupon->value . '%' }}</h6>
                                                <p class="small text-muted mb-0" style="font-size: 11px;">Đơn tối thiểu {{ number_format($coupon->min_order_value, 0, ',', '.') }}đ</p>
                                                @if($coupon->end_date)
                                                    <p class="small text-muted mb-0" style="font-size: 10px;">HSD: {{ $coupon->end_date->format('d/m/Y') }}</p>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-primary fw-bold" style="font-size: 11px;">Mã: {{ $coupon->code }}</span>
                                                @if($isApplied)
                                                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2 remove-coupon-btn" 
                                                            data-id="{{ $coupon->id }}" style="font-size: 10px; height: 26px;">Gỡ</button>
                                                @elseif($invalidReason)
                                                    <span class="text-danger fw-bold" style="font-size: 10px;">{{ $invalidReason }}</span>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-primary py-0 px-2 select-voucher-btn" 
                                                            data-code="{{ $coupon->code }}" style="font-size: 11px; height: 26px;">Dùng ngay</button>
                                                @endif
                                            </div>
                                        </div>
                                        @if($isApplied)
                                        <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-0" style="font-size: 9px; border-radius: 0 0 0 6px;">
                                            Đã chọn
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-secondary w-100 fw-bold py-3" data-bs-dismiss="modal">{{ Lang('checkout_voucher_close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

