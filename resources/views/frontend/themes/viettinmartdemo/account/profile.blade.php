@extends('layouts.app')

@section('title', __('account_title'))

@section('content')
    <style>
        .address-management-area .title {
            font-size: 28px;
            font-weight: 700;
            color: #2C3C28;
        }

        .add-address-form .card {
            border: 1px solid #eeeeee;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            background: #fff;
        }

        .add-address-form h3 {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            margin: -1.5rem -1.5rem 1.5rem -1.5rem;
            padding: 1.2rem 1.5rem;
            background: var(--color-primary);
            display: flex;
            align-items: center;
        }

        .single-input label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #2C3C28;
            font-size: 14px;
        }

        .single-input input,
        .single-input textarea,
        .account-details-area input {
            border: 1px solid #eeeeee !important;
            padding: 12px 20px !important;
            border-radius: 6px !important;
            width: 100% !important;
            transition: all 0.3s ease;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .single-input input:focus,
        .account-details-area input:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
            outline: none;
        }

        .address-card {
            border: 1px solid #eeeeee !important;
            border-radius: 10px !important;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            background: #fff;
        }

        .address-card:hover {
            border-color: var(--color-primary) !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .address-card.border-primary {
            border-color: var(--color-primary) !important;
            background: rgba(var(--color-primary-rgb), 0.02);
        }

        .address-card h5 {
            font-size: 16px;
            font-weight: 700;
            color: #2C3C28;
            margin-bottom: 10px;
        }

        .address-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .address-card .badge {
            font-size: 10px;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .address-card .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .address-selector-wrapper {
            margin-bottom: 20px;
        }

        .address-section h3, .password-section h3 {
            font-size: 18px;
            font-weight: 700;
            color: #2C3C28;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        /* Fix duplicated selects in profile */
        .address-selector-container .nice-select {
            display: none !important;
        }
    </style>
    <!-- rts navigation area breadcrumb start -->
    <div class="rts-navigation-area-breadcrumb">
        <div class="container-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="{{ locale_route('home') }}">{{ __('breadcrumb_home') }}</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="{{ locale_route('profile') }}">{{ __('breadcrumb_account') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts navigation area breadcrumb end -->

    <!-- account tab area start -->
    <div class="account-tab-area-start rts-section-gap">
        <div class="container-2">
            <div class="row">
                <div class="col-lg-3">
                    <div class="nav accout-dashborard-nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa-regular fa-chart-line"></i>{{ __('account_dashboard') }}
                        </button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa-regular fa-bag-shopping"></i>{{ __('account_orders') }}
                        </button>

                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fa-sharp fa-regular fa-location-dot"></i>{{ __('account_my_addresses') }}
                        </button>
                        <button class="nav-link" id="v-pills-settingsa-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settingsa" type="button" role="tab" aria-controls="v-pills-settingsa" aria-selected="false">
                            <i class="fa-light fa-user"></i>{{ __('account_account_info') }}
                        </button>
                        <button class="nav-link" id="v-pills-settingsb-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settingsb" type="button" role="tab" aria-controls="v-pills-settingsb" aria-selected="false">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-light fa-right-from-bracket"></i>{{ __('account_logout') }}
                            </a>
                        </button>
                        <form id="logout-form" action="{{ locale_route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 pl--50 pl_md--10 pl_sm--10 pt_md--30 pt_sm--30">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="dashboard-account-area">
                                <h2 class="title">
                                    {{ __('account_greeting', ['name' => Auth::user()->name]) }}
                                    {{ __('account_not_you', ['name' => Auth::user()->name]) }}
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('account_logout_link') }}</a>
                                </h2>
                                <p class="disc">{{ __('account_dashboard_desc') }}</p>
                            </div>
                        </div>

                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="order-table-account">
                                <div class="h2 title">{{ __('account_your_orders') }}</div>

                                <!-- Order Detail Modal Area (Hidden by default) -->
                                <div id="orderDetailArea" class="order-detail-area" style="display: none;">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ __('account_order_detail_title') }}</h4>
                                        <button class="btn btn-sm btn-secondary" onclick="hideOrderDetail()">
                                            <i class="fa-regular fa-times"></i> {{ __('action_close') }}
                                        </button>
                                    </div>
                                    <div id="orderDetailContent" class="card p-4">
                                        <!-- Order details will be loaded here -->
                                    </div>
                                </div>

                                <!-- Orders Table -->
                                <div id="ordersTableArea">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('account_order_number') }}</th>
                                                    <th>{{ __('account_order_date') }}</th>
                                                    <th>{{ __('account_order_status') }}</th>
                                                    <th>{{ __('account_order_total') }}</th>
                                                    <th>{{ __('account_order_action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($orders ?? [] as $order)
                                                    <tr>
                                                        <td><strong>#{{ $order->order_number ?? $order->id }}</strong></td>
                                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $order->status_color ?? 'secondary' }}">
                                                                {{ $order->status_label ?? __('account_processing') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <strong>{{ number_format($order->total ?? 0, 0, ',', '.') }}đ</strong><br>
                                                            <small class="text-muted">{{ $order->items->count() }} {{ __('order_detail_items_count') }}</small>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary" onclick="viewOrderDetail({{ $order->id }})">
                                                                <i class="fa-regular fa-eye"></i> {{ __('account_order_view') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center py-4">
                                                            <div class="text-muted">
                                                                <i class="fa-light fa-shopping-bag fa-2x mb-2"></i>
                                                                <p>{{ __('account_no_orders') }}</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Address Tab -->
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                            <div class="address-management-area">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h2 class="title">{{ __('account_my_addresses') }}</h2>
                                    <button class="rts-btn btn-primary" onclick="showAddAddressForm()">
                                        <i class="fa-regular fa-plus"></i> {{ __('account_add_address') }}
                                    </button>
                                </div>

                                <!-- Add Address Form (Hidden by default) -->
                                <div id="addAddressForm" class="add-address-form" style="display: none;">
                                    <div class="card p-4 mb-4">
                                        <h3>{{ __('account_add_address_title') }}</h3>
                                        <form id="newAddressForm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label>{{ __('account_receiver_name') }} *</label>
                                                        <input type="text" name="receiver_name" placeholder="Nguyễn Văn A" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <label>{{ __('account_receiver_phone') }} *</label>
                                                        <input type="text" name="receiver_phone" placeholder="0123 456 789" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Address Selector Component -->
                                            <div class="address-selector-wrapper">
                                                <x-address-selector id="new-addr" />
                                            </div>

                                            <div class="single-input">
                                                <label>{{ __('account_address_detail_placeholder') }} *</label>
                                                <input type="text" name="address_detail" id="new_address_detail" placeholder="Số nhà, tên đường..." required>
                                            </div>

                                            <!-- Hidden fields for validation -->
                                            <input type="hidden" name="full_address" id="new_full_address">
                                            <input type="hidden" name="province_name" id="new_province_name">
                                            <input type="hidden" name="district_name" id="new_district_name">
                                            <input type="hidden" name="ward_name" id="new_ward_name">

                                            <div class="form-check mb-3">
                                                <input type="checkbox" name="is_default" id="set_as_default" class="form-check-input">
                                                <label class="form-check-label" for="set_as_default">{{ __('account_set_default_address') }}</label>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="rts-btn btn-primary">{{ __('account_save_address') }}</button>
                                                <button type="button" class="rts-btn btn-secondary" onclick="hideAddAddressForm()">{{ __('action_cancel') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Address List -->
                                <div id="addressList" class="row">
                                    @forelse(Auth::user()->addresses ?? [] as $address)
                                        <div class="col-md-6 mb-3" id="address-{{ $address->id }}">
                                            <div class="address-card card p-3 {{ $address->is_default ? 'border-primary' : '' }}">
                                                @if($address->is_default)
                                                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">{{ __('account_default_badge') }}</span>
                                                @endif
                                                <h5>{{ $address->receiver_name }}</h5>
                                                <p class="mb-1"><i class="fa-regular fa-phone"></i> {{ $address->receiver_phone }}</p>
                                                <p class="mb-3"><i class="fa-regular fa-location-dot"></i> {{ $address->full_address }}</p>
                                                <div class="d-flex gap-2 mt-auto pt-3 border-top">
                                                    <button class="btn btn-sm btn-outline-primary flex-grow-1" onclick="editAddress({{ $address->id }})">
                                                        <i class="fa-regular fa-edit me-1"></i> {{ __('account_edit_btn') }}
                                                    </button>
                                                    @if(!$address->is_default)
                                                        <button class="btn btn-sm btn-outline-success flex-grow-1" onclick="setDefaultAddress({{ $address->id }})">
                                                            <i class="fa-regular fa-check me-1"></i> {{ __('account_set_default_btn') }}
                                                        </button>
                                                    @endif
                                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteAddress({{ $address->id }})" title="{{ __('account_delete_btn') }}">
                                                        <i class="fa-regular fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center py-5">
                                            <p class="text-muted">{{ __('account_no_address') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Account Details Tab -->
                        <div class="tab-pane fade" id="v-pills-settingsa" role="tabpanel" aria-labelledby="v-pills-settingsa-tab" tabindex="0">
                            <form action="{{ locale_route('account.profile.update') }}" method="POST" class="account-details-area">
                                @csrf
                                @method('PUT')
                                <h2 class="title">{{ __('account_account_info') }}</h2>

                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="input-half-area">
                                    <div class="single-input">
                                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="{{ __('account_name_placeholder') }}" required>
                                    </div>
                                    <div class="single-input">
                                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="{{ __('account_phone_placeholder') }}">
                                    </div>
                                </div>

                                <input type="text" name="display_name" value="{{ old('display_name', Auth::user()->name) }}" placeholder="{{ __('account_display_name_placeholder') }}" required>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="{{ __('account_email_field_placeholder') }}" readonly required>

                                <!-- Address Fields -->
                                <div class="address-section mt-4">
                                    <h3>{{ __('account_default_address_title') }}</h3>
                                    <x-address-selector
                                        :selected-province="Auth::user()->province_code"
                                        :selected-district="Auth::user()->district_code"
                                        :selected-ward="Auth::user()->ward_code"
                                    />
                                    <input type="text" name="address_detail" id="address_detail" value="{{ old('address_detail', Auth::user()->address_detail) }}" placeholder="{{ __('account_address_detail_field') }}">
                                    <input type="hidden" name="address" id="full_address" value="{{ old('address', Auth::user()->address) }}">
                                </div>

                                <!-- Password Change Section -->
                                <div class="password-section mt-4">
                                    <h3>{{ __('account_change_password_title') }}</h3>
                                    <input type="password" name="current_password" placeholder="{{ __('account_current_password') }}">
                                    <input type="password" name="password" placeholder="{{ __('account_new_password') }}">
                                    <input type="password" name="password_confirmation" placeholder="{{ __('account_confirm_password') }}">
                                </div>

                                <button class="rts-btn btn-primary">{{ __('account_save_changes') }}</button>
                            </form>
                        </div>

                        <!-- Logout Tab (Empty) -->
                        <div class="tab-pane fade" id="v-pills-settingsb" role="tabpanel" aria-labelledby="v-pills-settingsb-tab" tabindex="0">
                            <!-- This tab is handled by the logout form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account tab area end -->

    <!-- rts shorts service area start -->
    <div class="rts-shorts-service-area rts-section-gap bg_primary">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icons/service-1.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">{{ __('service_best_price_title') }}</h4>
                            <p class="disc">{{ __('service_best_price_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icons/service-2.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">{{ __('service_return_policy_title') }}</h4>
                            <p class="disc">{{ __('service_return_policy_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icons/service-3.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">{{ __('service_support_title') }}</h4>
                            <p class="disc">{{ __('service_support_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="single-short-service-area-start">
                        <div class="icon-area">
                            <img src="{{ asset('theme/images/icons/service-4.svg') }}" alt="icon">
                        </div>
                        <div class="information">
                            <h4 class="title">{{ __('service_daily_offers_title') }}</h4>
                            <p class="disc">{{ __('service_daily_offers_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts shorts service area end -->
@endsection

@push('scripts')
<script>
// CSRF Token
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

// i18n strings from PHP
const i18n = {
    processing:     "{{ __('account_processing') }}",
    addressAdded:   "{{ __('account_address_added') }}",
    errorOccurred:  "{{ __('account_error_occurred') }}",
    actionClose:    "{{ __('action_close') }}",
    cancel:         "{{ __('action_cancel') }}",
    confirm:        "{{ __('action_confirm') }}",
    delete:         "{{ __('action_delete') }}",
    loadingDetails: "{{ __('message_loading_details') }}",
};

// Utility functions
function showAlert(message, type = 'success') {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertHtml = `<div class="alert ${alertClass} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>`;
    const activeTab = document.querySelector('.tab-pane.active');
    if (activeTab) {
        activeTab.insertAdjacentHTML('afterbegin', alertHtml);
        setTimeout(() => {
            const alert = activeTab.querySelector('.alert');
            if (alert) alert.remove();
        }, 5000);
    }
}

function showLoading(button) {
    if (!button) return '';
    const originalText = button.innerHTML;
    button.innerHTML = `<i class="fa fa-spinner fa-spin"></i> ${i18n.processing}`;
    button.disabled = true;
    return originalText;
}

function hideLoading(button, originalText) {
    if (!button) return;
    button.innerHTML = originalText;
    button.disabled = false;
}

// Address Management Functions
function showAddAddressForm() {
    document.getElementById('addAddressForm').style.display = 'block';
}

function hideAddAddressForm() {
    document.getElementById('addAddressForm').style.display = 'none';
    document.getElementById('newAddressForm').reset();
}

function updateFullAddress(prefix = '') {
    const provinceSelect = document.querySelector(`select[name="${prefix}province_code"]`);
    const districtSelect = document.querySelector(`select[name="${prefix}district_code"]`);
    const wardSelect = document.querySelector(`select[name="${prefix}ward_code"]`);
    const detailInput = document.getElementById(`${prefix}address_detail`);
    const fullAddressInput = document.getElementById(`${prefix}full_address`);
    const provinceNameInput = document.getElementById(`${prefix}province_name`);
    const districtNameInput = document.getElementById(`${prefix}district_name`);
    const wardNameInput = document.getElementById(`${prefix}ward_name`);

    if (!provinceSelect || !fullAddressInput) return;

    const province = provinceSelect.options[provinceSelect.selectedIndex]?.text || '';
    const district = districtSelect?.options[districtSelect.selectedIndex]?.text || '';
    const ward = wardSelect?.options[wardSelect.selectedIndex]?.text || '';
    const detail = detailInput?.value || '';

    const fullAddress = [detail, ward, district, province].filter(Boolean).join(', ');
    fullAddressInput.value = fullAddress;

    if (provinceNameInput) provinceNameInput.value = province;
    if (districtNameInput) districtNameInput.value = district;
    if (wardNameInput) wardNameInput.value = ward;
}

// Add Address
const newAddressForm = document.getElementById('newAddressForm');
if (newAddressForm) {
    newAddressForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        if (!submitBtn) return;
        const originalText = showLoading(submitBtn);
        try {
            const formData = new FormData(this);
            const response = await fetch('{{ locale_route("address.store") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: formData
            });
            const result = await response.json();
            if (response.ok) {
                showAlert(i18n.addressAdded);
                hideAddAddressForm();
                location.reload();
            } else {
                showAlert(result.message || i18n.errorOccurred, 'error');
            }
        } catch (error) {
            showAlert(i18n.errorOccurred, 'error');
        } finally {
            hideLoading(submitBtn, originalText);
        }
    });
}

function deleteAddress(addressId) {
    Swal.fire({
        title: i18n.confirm,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: i18n.delete,
        cancelButtonText: i18n.cancel
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await fetch(`{{ url('/tai-khoan/dia-chi/xoa') }}/${addressId}`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'Content-Type': 'application/json' }
                });
                const data = await response.json();
                if (response.ok) {
                    document.getElementById(`address-${addressId}`)?.remove();
                    showAlert(data.message || 'Deleted');
                } else {
                    showAlert(data.message || i18n.errorOccurred, 'error');
                }
            } catch (e) {
                showAlert(i18n.errorOccurred, 'error');
            }
        }
    });
}

function setDefaultAddress(addressId) {
    fetch(`{{ url('/tai-khoan/dia-chi/mac-dinh') }}/${addressId}`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'Content-Type': 'application/json' }
    }).then(r => r.json()).then(data => {
        if (data.success || data.status === 'success') {
            location.reload();
        } else {
            showAlert(data.message || i18n.errorOccurred, 'error');
        }
    }).catch(() => showAlert(i18n.errorOccurred, 'error'));
}

function viewOrderDetail(orderId) {
    const detailArea = document.getElementById('orderDetailArea');
    const detailContent = document.getElementById('orderDetailContent');
    const ordersTable = document.getElementById('ordersTableArea');

    ordersTable.style.display = 'none';
    detailArea.style.display = 'block';
    detailContent.innerHTML = `<div class="text-center py-4"><i class="fa fa-spinner fa-spin fa-2x"></i><p class="mt-2">${i18n.loadingDetails}</p></div>`;

    fetch(`{{ url('/tai-khoan/don-hang') }}/${orderId}/ajax`, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken }
    }).then(r => r.json()).then(data => {
        if (data.html) {
            detailContent.innerHTML = data.html;
        } else {
            detailContent.innerHTML = `<p class="text-danger">${i18n.errorOccurred}</p>`;
        }
    }).catch(() => {
        detailContent.innerHTML = `<p class="text-danger">${i18n.errorOccurred}</p>`;
    });
}

function hideOrderDetail() {
    document.getElementById('orderDetailArea').style.display = 'none';
    document.getElementById('ordersTableArea').style.display = 'block';
}
</script>
@endpush



