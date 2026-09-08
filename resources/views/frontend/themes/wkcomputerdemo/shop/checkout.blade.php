@extends('layouts.app')

@section('title', 'Thanh toán - WKcomputer')

@section('content')
<div style="background:#f4f6f8; padding:20px 0 60px; min-height:80vh;">
    <div class="wk-container">
        @if($errors->any())
        <div style="background:#fee2e2; border:1px solid #ef4444; color:#b91c1c; padding:16px; border-radius:8px; margin-bottom:20px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="checkout-form" method="POST" action="{{ route('checkout.store') ?? '#' }}">
            @csrf
            <div class="wk-checkout-layout">
                
                {{-- Left Column: Form Info --}}
                <div class="wk-checkout-main-col">
                    {{-- Thông tin nhận hàng --}}
                    <div style="background:#fff; padding:24px; margin-bottom:16px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.03);">
                        <div style="font-weight:700; font-size:16px; color:#1e293b; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
                            <i class="fas fa-map-marker-alt" style="color:#e11d48;"></i> Thông tin nhận hàng
                        </div>
                        
                        <div class="wk-form-row-2col">
                            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Họ *" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">
                            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Tên *" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div style="margin-bottom:16px;">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại *" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div class="wk-form-row-3col">
                            <select name="province_code" id="province" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px; background:#fff; cursor:pointer;" onchange="loadDistricts()">
                                <option value="">Tỉnh/Thành phố *</option>
                                @if(!empty($provinces))
                                    @foreach($provinces as $p)
                                        <option value="{{ $p['code'] }}">{{ $p['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <input type="hidden" name="province_name" id="province_name" value="">
                            
                            <select name="district_code" id="district" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px; background:#fff; cursor:pointer;" onchange="loadWards()">
                                <option value="">Quận/Huyện *</option>
                            </select>
                            <input type="hidden" name="district_name" id="district_name" value="">
                            
                            <select name="ward_code" id="ward" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px; background:#fff; cursor:pointer;" onchange="updateWardName()">
                                <option value="">Phường/Xã *</option>
                            </select>
                            <input type="hidden" name="ward_name" id="ward_name" value="">
                        </div>
                        <div>
                            <input type="text" name="street_address" value="{{ old('street_address') }}" placeholder="Địa chỉ cụ thể (Số nhà, Tên đường...) *" required style="border:1px solid #e2e8f0; padding:12px; border-radius:4px; width:100%; outline:none; font-size:14px;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                    </div>

                    {{-- Nhận Mã online, hóa đơn qua email --}}
                    <div style="background:#fff; padding:24px; margin-bottom:16px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.03);">
                        <div style="font-weight:700; font-size:14px; margin-bottom:12px;">Nhận Mã online, hóa đơn qua email</div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email nhận thông tin *" required style="border:1px solid #e2e8f0; border-radius:4px; padding:12px; width:100%; outline:none; font-size:14px;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>

                    {{-- Ghi chú cho đơn hàng --}}
                    <div style="background:#fff; padding:24px; margin-bottom:16px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.03);">
                        <div style="font-weight:700; font-size:14px; margin-bottom:12px;">Ghi chú cho đơn hàng</div>
                        <textarea name="notes" placeholder="Nhập thông tin ghi chú cho nhà bán hàng" style="border:1px solid #e2e8f0; border-radius:4px; padding:12px; width:100%; outline:none; height:100px; resize:none; font-size:14px; font-family:inherit;" onfocus="this.style.borderColor='#e11d48'" onblur="this.style.borderColor='#e2e8f0'">{{ old('notes') }}</textarea>
                    </div>

                    {{-- Phương thức thanh toán --}}
                    <div style="background:#fff; padding:24px; margin-bottom:16px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.03);">
                        <div style="font-weight:700; font-size:18px; margin-bottom:4px;">Phương thức thanh toán</div>
                        <div style="font-size:13px; color:#64748b; margin-bottom:20px;">Thông tin thanh toán của bạn sẽ luôn được bảo mật</div>
                        
                        <div class="wk-payment-grid">
                            <label class="payment-method-box" style="border:1px solid #e11d48; border-radius:4px; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this)">
                                <input type="radio" name="payment_method" value="cod" style="display:none;" checked>
                                <div style="font-weight:700; font-size:14px; color:#111827;">Thanh toán khi nhận hàng (COD)</div>
                                <div style="font-size:12px; color:#64748b; margin-top:4px;">Thanh toán tiền mặt khi nhận hàng</div>
                                <div class="check-mark" style="display:block; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                <i class="fas fa-check check-icon" style="display:block; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                            </label>

                            <label class="payment-method-box" style="border:1px solid #e2e8f0; border-radius:4px; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this)">
                                <input type="radio" name="payment_method" value="vietqr" style="display:none;">
                                <div style="font-weight:700; font-size:14px; color:#111827;">Chuyển khoản ngân hàng (VietQR)</div>
                                <div style="font-size:12px; color:#64748b; margin-top:4px;">Quét mã QR qua app ngân hàng</div>
                                <div class="check-mark" style="display:none; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                <i class="fas fa-check check-icon" style="display:none; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                            </label>

                            <label class="payment-method-box" style="border:1px solid #e2e8f0; border-radius:4px; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this)">
                                <input type="radio" name="payment_method" value="momo" style="display:none;">
                                <div style="font-weight:700; font-size:14px; color:#111827;">Ví MoMo</div>
                                <div style="font-size:12px; color:#64748b; margin-top:4px;">Quét mã QR qua ứng dụng MoMo</div>
                                <div class="check-mark" style="display:none; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                <i class="fas fa-check check-icon" style="display:none; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                            </label>

                            <label class="payment-method-box" style="border:1px solid #e2e8f0; border-radius:4px; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this)">
                                <input type="radio" name="payment_method" value="baokim" style="display:none;">
                                <div style="font-weight:700; font-size:14px; color:#111827;">Thanh toán qua Bảo Kim</div>
                                <div style="font-size:12px; color:#64748b; margin-top:4px;">Thẻ ATM nội địa, Thẻ quốc tế, Trả góp</div>
                                <div class="check-mark" style="display:none; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                <i class="fas fa-check check-icon" style="display:none; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                            </label>

                            <div style="border:1px solid #e2e8f0; border-radius:4px;">
                                <label class="payment-method-box" style="display:block; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this); fetchKredivoOptions()">
                                    <input type="radio" name="payment_method" value="kredivo" style="display:none;">
                                    <div style="font-weight:700; font-size:14px; color:#111827;">Mua trước trả sau Kredivo</div>
                                    <div style="font-size:12px; color:#64748b; margin-top:4px;">Trả góp linh hoạt qua Kredivo</div>
                                    <div class="check-mark" style="display:none; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                    <i class="fas fa-check check-icon" style="display:none; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                                </label>
                                <div id="kredivo-options-container" style="display:none; padding: 0 16px 16px 16px; border-top: 1px solid #e2e8f0; margin-top: -5px;">
                                    <div style="font-size: 13px; font-weight: 600; margin-bottom: 8px; margin-top: 12px;">Chọn kỳ hạn trả góp:</div>
                                    <div id="kredivo-options-loading" style="font-size:13px; color:#64748b;">Đang tải các lựa chọn trả góp...</div>
                                    <div id="kredivo-options-list" style="display:flex; flex-direction:column; gap:8px;"></div>
                                    <!-- Hidden input to store selected kredivo payment type -->
                                    <input type="hidden" name="kredivo_payment_type" id="kredivo_payment_type" value="30_days">
                                </div>
                            </div>

                            <label class="payment-method-box" style="border:1px solid #e2e8f0; border-radius:4px; padding:16px; cursor:pointer; position:relative; overflow:hidden;" onclick="selectPayment(this)">
                                <input type="radio" name="payment_method" value="fundiin" style="display:none;">
                                <div style="font-weight:700; font-size:14px; color:#111827;">Trả góp qua Fundiin</div>
                                <div style="font-size:12px; color:#64748b; margin-top:4px;">Thanh toán 3 kỳ qua Fundiin</div>
                                <div class="check-mark" style="display:none; position:absolute; top:0; right:0; width:0; height:0; border-top: 24px solid #e11d48; border-left: 24px solid transparent;"></div>
                                <i class="fas fa-check check-icon" style="display:none; position:absolute; top:4px; right:4px; color:#fff; font-size:10px;"></i>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Summary --}}
                <div class="wk-checkout-summary-col">
                    
                    {{-- Order Info --}}
                    <div style="background:#fff; border-radius:8px; padding:24px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                            <div style="font-weight:700; font-size:16px;">Thông tin đơn hàng</div>
                            <a href="{{ route('cart.page') }}" style="color:#0ea5e9; font-size:13px; text-decoration:none;">Chỉnh sửa</a>
                        </div>
                        
                        @if(isset($cart) && count($cart) > 0)
                            @foreach($cart as $item)
                            @php
                                $itemImage = $item['image'] ?? null;
                                if ($itemImage && !str_starts_with($itemImage, 'http') && !str_starts_with($itemImage, '/')) {
                                    $itemImage = '/media-files/' . $itemImage;
                                }
                            @endphp
                            <div style="display:flex; gap:12px; margin-bottom:16px; border-bottom:1px solid #f1f5f9; padding-bottom:16px;">
                                @if($itemImage)
                                <img src="{{ $itemImage }}" style="width:60px; height:60px; object-fit:contain; border:1px solid #e2e8f0; border-radius:4px; padding:4px;">
                                @else
                                <div style="width:60px; height:60px; background:#f1f5f9; border:1px solid #e2e8f0; border-radius:4px; display:flex; align-items:center; justify-content:center;"><i class="fas fa-image" style="color:#cbd5e1;"></i></div>
                                @endif
                                <div style="flex:1;">
                                    <div style="font-size:13px; font-weight:400; color:#111827; margin-bottom:4px; line-height:1.4; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                        {{ $item['name'] }}
                                    </div>
                                    <div style="font-size:12px; color:#64748b;">Số lượng {{ $item['qty'] }}</div>
                                    <div style="font-weight:700; font-size:14px; color:#111827; margin-top:4px;">
                                        {{ number_format($item['price'] ?? 0, 0, ',', '.') }}₫
                                        @if(!empty($item['original_price']) && $item['original_price'] > $item['price'])
                                        <span style="font-weight:400; font-size:12px; color:#94a3b8; text-decoration:line-through; margin-left:6px;">{{ number_format($item['original_price'], 0, ',', '.') }}₫</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div style="font-size:13px; color:#64748b;">Giỏ hàng trống.</div>
                        @endif
                    </div>

                    {{-- Khuyen Mai --}}
                    <div style="background:#fff; border-radius:8px; padding:20px 24px;">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div style="font-weight:700; font-size:14px; color:#111827;">Khuyến mãi đơn hàng</div>
                            <a href="#" style="color:#0ea5e9; font-size:13px; text-decoration:none;"><i class="fas fa-ticket-alt" style="margin-right:4px;"></i> Chọn hoặc nhập khuyến mãi</a>
                        </div>
                    </div>

                    {{-- Options --}}
                    <div style="background:#fff; border-radius:8px; padding:16px 24px; display:flex; justify-content:space-between; align-items:center;">
                        <label style="display:flex; align-items:center; gap:12px; cursor:pointer; margin:0;">
                            <input type="checkbox" style="width:18px; height:18px; accent-color:#e11d48;">
                            <span style="font-size:14px; font-weight:500; color:#111827;">Cài đặt</span>
                        </label>
                        <div style="font-weight:700; color:#e11d48; font-size:14px;">Miễn phí</div>
                    </div>
                    <div style="background:#fff; border-radius:8px; padding:16px 24px; display:flex; justify-content:space-between; align-items:center;">
                        <label style="display:flex; align-items:center; gap:12px; cursor:pointer; margin:0;">
                            <input type="checkbox" style="width:18px; height:18px; accent-color:#e11d48;">
                            <span style="font-size:14px; font-weight:500; color:#111827;">Hỗ trợ kỹ thuật</span>
                        </label>
                        <div style="font-weight:700; color:#e11d48; font-size:14px;">Miễn phí</div>
                    </div>

                    {{-- Checkout Total --}}
                    <div style="background:#fff; border-radius:8px; padding:24px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:14px; color:#64748b;">
                            <span>Tổng tạm tính</span>
                            <span style="font-weight:600; color:#111827;">{{ number_format($subtotal ?? 0, 0, ',', '.') }}₫</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:14px; color:#64748b;">
                            <span>Phí vận chuyển</span>
                            <span style="font-weight:600; color:#111827;">Miễn phí</span>
                        </div>
                        @if(!empty($totalDiscount) && $totalDiscount > 0)
                        <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:14px; color:#64748b;">
                            <span>Giảm giá</span>
                            <span style="font-weight:600; color:#22c55e;">-{{ number_format($totalDiscount, 0, ',', '.') }}₫</span>
                        </div>
                        @endif
                        <div style="display:flex; justify-content:space-between; margin-bottom:4px; font-size:14px; color:#64748b; align-items:flex-end;">
                            <span>Thành tiền</span>
                            <span style="font-weight:700; font-size:24px; color:#dc2626; line-height:1;">{{ number_format($total ?? 0, 0, ',', '.') }} <span style="font-size:20px;">₫</span></span>
                        </div>
                        <div style="text-align:right; font-size:12px; color:#94a3b8; margin-bottom:24px;">(Đã bao gồm VAT)</div>
                        
                        <button type="submit" style="width:100%; text-align:center; background:#e11d48; color:#fff; border:none; border-radius:4px; padding:16px; font-weight:700; font-size:16px; cursor:pointer; transition:background 0.2s;" onmouseover="this.style.background='#be123c'" onmouseout="this.style.background='#e11d48'">
                            THANH TOÁN
                        </button>
                        <div style="font-size:12px; color:#64748b; margin-top:20px; text-align:center; line-height:1.6;">
                            Nhấn "Thanh toán" đồng nghĩa với việc bạn đọc và đồng ý tuân theo <a href="#" style="color:#0ea5e9; text-decoration:none;">Điều khoản và Điều kiện</a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<script>
function selectPayment(element) {
    // Reset all boxes
    const boxes = document.querySelectorAll('.payment-method-box');
    boxes.forEach(box => {
        box.style.borderColor = '#e2e8f0';
        box.querySelector('.check-mark').style.display = 'none';
        box.querySelector('.check-icon').style.display = 'none';
        box.querySelector('input[type="radio"]').checked = false;
    });
    
    // Set active box
    element.style.borderColor = '#e11d48';
    element.querySelector('.check-mark').style.display = 'block';
    element.querySelector('.check-icon').style.display = 'block';
    element.querySelector('input[type="radio"]').checked = true;
}

let locationData = [];
async function initLocations() {
    const urls = [
        '/data/provinces.json',
        '{{ asset("data/provinces.json") }}',
        '/data/vietnam-provinces.json'
    ];
    
    for (const url of urls) {
        try {
            const res = await fetch(url);
            if (res.ok) {
                const data = await res.json();
                if (Array.isArray(data) && data.length > 0) {
                    locationData = data;
                    let provinceSelect = document.getElementById('province');
                    if (provinceSelect && provinceSelect.options.length <= 1) {
                        data.forEach(province => {
                            let option = document.createElement('option');
                            option.value = province.code;
                            option.textContent = province.name;
                            provinceSelect.appendChild(option);
                        });
                    }
                    return; // Successfully loaded
                }
            }
        } catch (err) {
            console.warn('Could not load provinces from ' + url, err);
        }
    }
}

document.addEventListener("DOMContentLoaded", function() {
    initLocations();

    document.getElementById('checkout-form')?.addEventListener('submit', function() {
        let pSelect = document.getElementById('province');
        let dSelect = document.getElementById('district');
        let wSelect = document.getElementById('ward');
        if (pSelect && pSelect.selectedIndex > 0) {
            document.getElementById('province_name').value = pSelect.options[pSelect.selectedIndex].text;
        }
        if (dSelect && dSelect.selectedIndex > 0) {
            document.getElementById('district_name').value = dSelect.options[dSelect.selectedIndex].text;
        }
        if (wSelect && wSelect.selectedIndex > 0) {
            document.getElementById('ward_name').value = wSelect.options[wSelect.selectedIndex].text;
        }
    });
});

function loadDistricts() {
    let provinceCode = document.getElementById('province').value;
    let provinceSelect = document.getElementById('province');
    if (provinceSelect.selectedIndex > 0) {
        document.getElementById('province_name').value = provinceSelect.options[provinceSelect.selectedIndex].text;
    }
    
    let districtSelect = document.getElementById('district');
    let wardSelect = document.getElementById('ward');
    
    districtSelect.innerHTML = '<option value="">Quận/Huyện *</option>';
    wardSelect.innerHTML = '<option value="">Phường/Xã *</option>';
    document.getElementById('district_name').value = '';
    document.getElementById('ward_name').value = '';
    
    if(!provinceCode) return;
    
    let province = locationData.find(p => p.code == provinceCode);
    if(province && province.districts) {
        province.districts.forEach(district => {
            let option = document.createElement('option');
            option.value = district.code;
            option.textContent = district.name;
            districtSelect.appendChild(option);
        });
    }
}

function loadWards() {
    let provinceCode = document.getElementById('province').value;
    let districtCode = document.getElementById('district').value;
    let districtSelect = document.getElementById('district');
    
    if (districtSelect.selectedIndex > 0) {
        document.getElementById('district_name').value = districtSelect.options[districtSelect.selectedIndex].text;
    }
    
    let wardSelect = document.getElementById('ward');
    wardSelect.innerHTML = '<option value="">Phường/Xã *</option>';
    document.getElementById('ward_name').value = '';
    
    if(!districtCode) return;
    
    let province = locationData.find(p => p.code == provinceCode);
    if(province && province.districts) {
        let district = province.districts.find(d => d.code == districtCode);
        if(district && district.wards) {
            district.wards.forEach(ward => {
                let option = document.createElement('option');
                option.value = ward.code;
                option.textContent = ward.name;
                wardSelect.appendChild(option);
            });
        }
    }
}

function updateWardName() {
    let wardSelect = document.getElementById('ward');
    if (wardSelect.selectedIndex > 0) {
        document.getElementById('ward_name').value = wardSelect.options[wardSelect.selectedIndex].text;
    }
}

let isKredivoFetched = false;
function fetchKredivoOptions() {
    let container = document.getElementById('kredivo-options-container');
    container.style.display = 'block';
    
    // Hide all other containers if needed
    
    if (isKredivoFetched) return;
    
    fetch('{{ route("kredivo.calculate") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({})
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('kredivo-options-loading').style.display = 'none';
        let listContainer = document.getElementById('kredivo-options-list');
        listContainer.innerHTML = '';
        
        if(data.success && data.payments && data.payments.length > 0) {
            data.payments.forEach((payment, index) => {
                let interestText = payment.interest_rate > 0 ? `(Lãi suất ${payment.interest_rate}%)` : '(Không lãi suất)';
                let html = `
                    <label style="display:flex; align-items:center; gap:10px; cursor:pointer; padding:12px; border:1px solid #e2e8f0; border-radius:6px; margin-bottom:8px; transition:all 0.2s; background: ${index === 0 ? '#f8fafc' : '#fff'};" onclick="selectKredivoOption('${payment.id}')" id="kredivo-label-${payment.id}">
                        <input type="radio" name="kredivo_option_radio" value="${payment.id}" ${index === 0 ? 'checked' : ''} onchange="updateKredivoStyles()">
                        <div style="flex:1;">
                            <div style="font-weight:700; font-size:14px; color:#1e293b;">${payment.name} <span style="font-size:12px; font-weight:400; color:#10b981; margin-left:4px;">${interestText}</span></div>
                            <div style="font-size:14px; color:#ef4444; font-weight:600; margin-top:4px;">${new Intl.NumberFormat('vi-VN').format(payment.installment_amount || payment.amount)}đ <span style="font-size:12px; color:#64748b; font-weight:400;">/ tháng</span></div>
                        </div>
                    </label>
                `;
                listContainer.insertAdjacentHTML('beforeend', html);
                if(index === 0) {
                    document.getElementById('kredivo_payment_type').value = payment.id;
                }
            });
            isKredivoFetched = true;
        } else {
            let errorMsg = data.message ? data.message : 'Không thể tải dữ liệu trả góp hoặc giỏ hàng không đủ điều kiện.';
            listContainer.innerHTML = '<div style="color:#ef4444; font-size:13px;">' + errorMsg + '</div>';
        }
    })
    .catch(err => {
        document.getElementById('kredivo-options-loading').style.display = 'none';
        document.getElementById('kredivo-options-list').innerHTML = '<div style="color:#ef4444; font-size:13px;">Lỗi kết nối khi lấy dữ liệu trả góp.</div>';
    });
}

function selectKredivoOption(id) {
    document.getElementById('kredivo_payment_type').value = id;
    let radio = document.querySelector(`input[name="kredivo_option_radio"][value="${id}"]`);
    if(radio) {
        radio.checked = true;
        updateKredivoStyles();
    }
}

function updateKredivoStyles() {
    document.querySelectorAll('input[name="kredivo_option_radio"]').forEach(radio => {
        let label = document.getElementById('kredivo-label-' + radio.value);
        if(label) {
            if(radio.checked) {
                label.style.background = '#f8fafc';
                label.style.borderColor = '#e11d48';
            } else {
                label.style.background = '#fff';
                label.style.borderColor = '#e2e8f0';
            }
        }
    });
}

// Ensure container is hidden if other payment method selected
const originalSelectPayment = selectPayment;
selectPayment = function(element) {
    originalSelectPayment(element);
    let radio = element.querySelector('input[type="radio"]');
    let kredivoContainer = document.getElementById('kredivo-options-container');
    if (kredivoContainer) {
        if (radio && radio.value === 'kredivo') {
            kredivoContainer.style.display = 'block';
        } else {
            kredivoContainer.style.display = 'none';
        }
}
</script>

<style>
.wk-checkout-layout {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 24px;
    align-items: start;
}
.wk-checkout-main-col {
    min-width: 0;
}
.wk-checkout-summary-col {
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: sticky;
    top: 20px;
}
.wk-form-row-2col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}
.wk-form-row-3col {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}
.wk-payment-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

@media (max-width: 991px) {
    .wk-checkout-layout {
        grid-template-columns: 1fr !important;
        gap: 16px !important;
    }
    .wk-checkout-summary-col {
        position: static !important;
    }
}

@media (max-width: 640px) {
    .wk-form-row-3col {
        grid-template-columns: 1fr !important;
        gap: 12px !important;
    }
    .wk-payment-grid {
        grid-template-columns: 1fr !important;
        gap: 12px !important;
    }
}

@media (max-width: 480px) {
    .wk-form-row-2col {
        grid-template-columns: 1fr !important;
        gap: 12px !important;
    }
}
</style>
@endsection
