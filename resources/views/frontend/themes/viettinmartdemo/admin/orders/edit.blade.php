@extends('admin.layouts.app')
@section('title', 'Cập nhật đơn hàng')
@section('page-title', 'Cập nhật đơn hàng #' . $order->order_number)
@section('page-subtitle', 'Chỉnh sửa thông tin đơn hàng hệ thống')

@section('content')
<form action="{{ locale_route('admin.orders.update', $order) }}" method="POST" x-data="orderManager()" x-init="init()">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Left: Order Items & Configuration --}}
        <div class="lg:col-span-2 flex flex-col gap-6">
            
            {{-- Sản phẩm --}}
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
                <div style="padding:20px 24px; border-bottom:1px solid #f1f5f9; background:#fcfcfc; display:flex; align-items:center; justify-content:space-between;">
                    <h3 style="font-size:15px; font-weight:800; color:#1e293b; display:flex; align-items:center; gap:10px;">
                        <span style="width:4px; height:16px; background:#3b82f6; border-radius:4px; display:inline-block;"></span>
                        Sản phẩm trong đơn
                    </h3>
                    <button type="button" @click="addItem()" class="btn btn-primary btn-sm" style="height:32px; border-radius:8px;">
                        <i class="fa-solid fa-plus"></i> Thêm sản phẩm
                    </button>
                </div>

                <div class="tbl-wrap" style="padding:0;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead style="background:#f8fafc;">
                            <tr>
                                <th class="tbl-th" style="padding:12px 20px; font-size:11px; text-transform:uppercase;">Sản phẩm</th>
                                <th class="tbl-th" style="padding:12px 20px; font-size:11px; text-transform:uppercase; width:140px;">Giá</th>
                                <th class="tbl-th" style="padding:12px 20px; font-size:11px; text-transform:uppercase; width:100px; text-align:center;">Số lượng</th>
                                <th class="tbl-th" style="padding:12px 20px; font-size:11px; text-transform:uppercase; width:140px; text-align:right;">Thành tiền</th>
                                <th class="tbl-th" style="padding:12px 20px; width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <template x-for="(item, index) in items" :key="index">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <div class="product-select-container">
                                            <select :name="`items[${index}][product_id]`" 
                                                    :data-index="index"
                                                    x-model="item.product_id"
                                                    class="form-select product-select" required>
                                                <option value="">Chọn sản phẩm</option>
                                                @foreach($products as $p)
                                                <option value="{{ $p->id }}" data-price="{{ $p->price }}">{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Variant selection --}}
                                        <div class="mt-3" x-show="getVariants(item.product_id).length > 0">
                                            <select :name="`items[${index}][variant_id]`" 
                                                    x-model="item.variant_id"
                                                    @change="onVariantChange(index)"
                                                    class="form-select w-full" style="font-size:12px; height:32px; border-style:dashed;">
                                                <option value="">Chọn biến thể (mặc định theo giá gốc)</option>
                                                <template x-for="v in getVariants(item.product_id)" :key="v.id">
                                                    <option :value="v.id" x-text="v.label + ' - ' + formatCurrency(v.price)" :selected="v.id == item.variant_id"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="padding:16px 20px; vertical-align:top;">
                                        <div style="font-size:14px; font-weight:700; color:#334155; padding-top:8px;" x-text="formatCurrency(item.price)"></div>
                                    </td>
                                    <td style="padding:16px 20px; vertical-align:top; text-align:center;">
                                        <input type="number" :name="`items[${index}][quantity]`" 
                                               x-model.number="item.quantity"
                                               class="form-input text-center" min="1" required 
                                               style="width:70px; height:36px; border-radius:8px;">
                                    </td>
                                    <td style="padding:16px 20px; vertical-align:top; text-align:right;">
                                        <div style="font-size:15px; font-weight:800; color:#0f172a; padding-top:8px;" x-text="formatCurrency(item.price * item.quantity)"></div>
                                    </td>
                                    <td style="padding:16px 20px; vertical-align:top; text-align:center;">
                                        <button type="button" @click="removeItem(index)" class="text-slate-300 hover:text-red-500 transition-colors" style="padding-top:8px;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                @error('items')
                <div style="padding:12px 24px; color:#ef4444; font-size:13px; background:#fef2f2;">{{ $message }}</div>
                @enderror
            </div>

            {{-- Ghi chú & Thanh toán --}}
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; padding:24px;">
                <h3 style="font-size:15px; font-weight:800; color:#1e293b; margin-bottom:20px; display:flex; align-items:center; gap:10px;">
                    <span style="width:4px; height:16px; background:#10b981; border-radius:4px; display:inline-block;"></span>
                    Ghi chú & Phương thức
                </h3>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="font-weight:700; color:#64748b;">GHI CHÚ CỦA KHÁCH HÀNG</label>
                        <textarea name="customer_note" rows="3" class="form-textarea" placeholder="Yêu cầu đặc biệt..." style="border-radius:12px; padding:12px;">{{ old('customer_note', $order->customer_note) }}</textarea>
                    </div>
                    <div>
                        <label class="form-label" style="font-weight:700; color:#64748b;">PHƯƠNG THỨC THANH TOÁN</label>
                        <select name="payment_method" class="form-select" style="height:42px; border-radius:10px;">
                            <option value="cod" {{ old('payment_method', $order->payment_method) == 'cod' ? 'selected' : '' }}>COD (Thanh toán khi nhận hàng)</option>
                            <option value="bank_transfer" {{ old('payment_method', $order->payment_method) == 'bank_transfer' ? 'selected' : '' }}>Chuyển khoản ngân hàng</option>
                            <option value="other" {{ old('payment_method', $order->payment_method) == 'other' ? 'selected' : '' }}>Thanh toán khác</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" style="font-weight:700; color:#64748b;">PHÍ VẬN CHUYỂN</label>
                        <div style="position:relative;">
                            <input type="number" name="shipping_fee" x-model.number="shippingFee" class="form-input" style="height:42px; border-radius:10px; padding-right:40px;">
                            <span style="position:absolute; right:12px; top:50%; transform:translateY(-50%); color:#94a3b8; font-weight:700;">₫</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="flex flex-col gap-6">
            
            {{-- Đại lý phụ trách (NEW) --}}
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; padding:24px; background:linear-gradient(135deg, #fff, #f8fafc);">
                <h3 style="font-size:14px; font-weight:800; color:#1e293b; margin-bottom:16px; text-transform:uppercase; letter-spacing:0.05em;">Đại lý phụ trách</h3>
                <div class="agent-select-container">
                    @if(auth()->user()->isStoreManager())
                        <select class="form-select select2-agent" style="width:100%;" disabled>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ $order->agent_id == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }} ({{ $agent->type_name }})
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="agent_id" value="{{ $order->agent_id }}">
                    @else
                        <select name="agent_id" class="form-select select2-agent" style="width:100%;">
                            <option value="">-- Chọn đại lý phụ trách --</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ old('agent_id', $order->agent_id) == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }} ({{ $agent->type_name }})
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>

            {{-- Thông tin khách hàng --}}
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; padding:24px;">
                <h3 style="font-size:15px; font-weight:800; color:#1e293b; margin-bottom:20px;">Thông tin giao hàng</h3>
                <div class="space-y-4">
                    <div>
                        <label class="form-label" style="font-weight:700; color:#64748b;">HỌ VÀ TÊN *</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" class="form-input" required style="height:42px; border-radius:10px;">
                    </div>
                    <div>
                        <label class="form-label" style="font-weight:700; color:#64748b;">SỐ ĐIỆN THOẠI *</label>
                        <input type="text" name="customer_phone" value="{{ old('customer_phone', $order->customer_phone) }}" class="form-input" required style="height:42px; border-radius:10px;">
                    </div>
                    <div>
                        <label class="form-label" style="font-weight:700; color:#64748b;">EMAIL</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email', $order->customer_email) }}" class="form-input" style="height:42px; border-radius:10px;">
                    </div>
                    
                    <x-address-selector 
                        container-class="grid grid-cols-1 gap-4"
                        col-class=""
                        select-class="form-select"
                        :selected-province="old('province_code', $order->shipping_province)"
                        :selected-district="old('district_code', $order->shipping_district)"
                        :selected-ward="old('ward_code', $order->shipping_ward)"
                        :required="false"
                    />
                    
                    <div class="mt-4">
                        <label class="form-label" style="font-weight:700; color:#64748b;">SỐ NHÀ, TÊN ĐƯỜNG (Địa chỉ cũ: {{ explode(', ', $order->shipping_address)[0] ?? '' }})</label>
                        <input type="text" name="street_address" class="form-input" placeholder="Để trống nếu không đổi địa chỉ mới" style="height:42px; border-radius:10px;">
                    </div>
                </div>
            </div>

            {{-- Summary & Actions --}}
            <div class="card" style="border:none; box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.15); border-radius:20px; overflow:hidden;">
                <div style="padding:24px; background:#fff;">
                    <h3 style="font-size:16px; font-weight:800; color:#1e293b; margin-bottom:20px;">Chi tiết thanh toán</h3>
                    <div class="space-y-4">
                        <div style="display:flex; justify-content:space-between; font-size:14px;">
                            <span style="color:#64748b;">Tạm tính:</span>
                            <span style="font-weight:700; color:#1e293b;" x-text="formatCurrency(subtotal)"></span>
                        </div>
                        <div style="display:flex; justify-content:space-between; font-size:14px;">
                            <span style="color:#64748b;">Phí vận chuyển:</span>
                            <span style="font-weight:700; color:#1e293b;" x-text="formatCurrency(shippingFee)"></span>
                        </div>
                        <div style="padding-top:16px; border-top:1px dashed #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
                            <span style="font-size:15px; font-weight:800; color:#1e293b;">TỔNG CỘNG:</span>
                            <span style="font-size:22px; font-weight:900; color:#2563eb;" x-text="formatCurrency(subtotal + shippingFee)"></span>
                        </div>
                    </div>

                    <div style="margin-top:24px; display:flex; flex-direction:column; gap:16px;">
                        <div>
                            <label class="form-label" style="font-weight:700; color:#64748b;">TRẠNG THÁI ĐƠN HÀNG</label>
                            <select name="status" class="form-select" style="height:40px; border-radius:10px; font-weight:700;">
                                @foreach($statuses as $key => $s)
                                <option value="{{ $key }}" {{ old('status', $order->status) == $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label" style="font-weight:700; color:#64748b;">THANH TOÁN</label>
                            <select name="payment_status" class="form-select" style="height:40px; border-radius:10px; font-weight:700;">
                                @foreach($paymentStatuses as $key => $s)
                                <option value="{{ $key }}" {{ old('payment_status', $order->payment_status) == $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%; height:54px; border-radius:14px; justify-content:center; font-size:16px; font-weight:800; margin-top:24px; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);">
                        <i class="fa-solid fa-save"></i> LƯU THAY ĐỔI
                    </button>
                    
                    <a href="{{ locale_route('admin.orders.show', $order) }}" style="display:block; text-align:center; margin-top:16px; font-size:13px; font-weight:700; color:#94a3b8; text-decoration:none;">
                        Hủy bỏ & Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Select2 Skinning */
    .select2-container--default .select2-selection--single {
        height: 42px !important; 
        border: 1px solid #e2e8f0 !important; 
        border-radius: 10px !important;
        display: flex !important;
        align-items: center !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: normal !important; 
        padding-left: 12px !important;
        color: #334155 !important;
        font-size: 14px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
    }
    .select2-dropdown {
        border: 1px solid #e2e8f0 !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important;
        overflow: hidden !important;
        padding: 4px;
    }
    .select2-search__field {
        border-radius: 8px !important;
        border: 1px solid #e2e8f0 !important;
        padding: 8px 12px !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
function orderManager() {
    return {
        items: {!! json_encode($order->items->map(function($item) { 
            return [
                'product_id' => $item->product_id, 
                'variant_id' => $item->variant_id, 
                'price'      => $item->price, 
                'quantity'   => $item->quantity
            ]; 
        })->toArray()) !!},
        products: @json($products),
        shippingFee: {{ $order->shipping_fee }},
        subtotal: {{ $order->subtotal }},

        init() {
            this.$watch('items', () => {
                this.calculateSubtotal();
                this.$nextTick(() => { this.initSelect2(); });
            }, { deep: true });
            
            this.$nextTick(() => {
                $('.select2-agent').select2({ placeholder: "Chọn đại lý" });
                this.initSelect2();
            });
        },

        initSelect2() {
            const self = this;
            $('.product-select').each(function() {
                if ($(this).hasClass('select2-hidden-accessible')) return;
                
                const index = $(this).data('index');
                $(this).select2({ 
                    placeholder: "Tìm sản phẩm...",
                    width: '100%'
                }).on('change', function(e) {
                    const val = $(this).val();
                    self.items[index].product_id = val;
                    self.onProductChange(index);
                });
                
                // Pre-select value if it exists
                if (self.items[index].product_id) {
                    $(this).val(self.items[index].product_id).trigger('change.select2');
                }
            });
        },

        addItem() {
            this.items.push({
                product_id: '',
                variant_id: '',
                price: 0,
                quantity: 1
            });
        },

        removeItem(index) {
            if (this.items.length > 1) {
                this.items.splice(index, 1);
            }
        },

        getVariants(productId) {
            if (!productId) return [];
            const p = this.products.find(p => p.id == productId);
            if (!p || !p.variants) return [];
            
            return p.variants.map(v => {
                const label = v.attribute_values.map(av => av.value).join(' / ');
                return {
                    id: v.id,
                    label: label || 'Biến thể #' + v.id,
                    price: v.price || p.price
                };
            });
        },

        onProductChange(index) {
            const item = this.items[index];
            const p = this.products.find(p => p.id == item.product_id);
            if (p) {
                item.price = p.price;
                item.variant_id = ''; 
            } else {
                item.price = 0;
            }
        },

        onVariantChange(index) {
            const item = this.items[index];
            const p = this.products.find(p => p.id == item.product_id);
            if (p && item.variant_id) {
                const v = p.variants.find(v => v.id == item.variant_id);
                if (v) {
                    item.price = v.price || p.price;
                }
            } else if (p) {
                item.price = p.price;
            }
        },

        calculateSubtotal() {
            this.subtotal = this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },

        formatCurrency(val) {
            return new Intl.NumberFormat('vi-VN').format(val) + '₫';
        }
    }
}
</script>
@endpush
@endsection

