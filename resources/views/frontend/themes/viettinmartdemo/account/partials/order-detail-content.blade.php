<!-- Order Header -->
<div class="order-header mb-4">
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-1">{{ __('order_detail_number', ['number' => $order->order_number]) }}</h5>
            <p class="text-muted mb-0">{{ __('order_detail_placed_on', ['date' => $order->created_at->format('d/m/Y H:i')]) }}</p>
        </div>
        <div class="col-md-6 text-md-end">
            <span class="badge bg-{{ $order->status_color ?? 'secondary' }} fs-6 px-3 py-2">
                {{ $order->status_label ?? __('order_detail_processing') }}
            </span>
        </div>
    </div>
</div>

<!-- Customer Info -->
<div class="customer-info mb-4">
    <div class="row">
        <div class="col-md-6">
            <h6><i class="fa-regular fa-user"></i> {{ __('order_detail_customer_info') }}</h6>
            <p class="mb-1"><strong>{{ $order->customer_name }}</strong></p>
            <p class="mb-1"><i class="fa-regular fa-phone"></i> {{ $order->customer_phone }}</p>
            <p class="mb-0"><i class="fa-regular fa-envelope"></i> {{ $order->customer_email }}</p>
        </div>
        <div class="col-md-6">
            <h6><i class="fa-regular fa-location-dot"></i> {{ __('order_detail_shipping_address') }}</h6>
            <p class="mb-0">{{ $order->shipping_address }}</p>
        </div>
    </div>
</div>

<!-- Order Items -->
<div class="order-items mb-4">
    <h6><i class="fa-regular fa-shopping-bag"></i> {{ __('order_detail_items') }}</h6>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="table-light">
                <tr>
                    <th>{{ __('order_detail_col_product') }}</th>
                    <th class="text-center">{{ __('order_detail_col_qty') }}</th>
                    <th class="text-end">{{ __('order_detail_col_price') }}</th>
                    <th class="text-end">{{ __('order_detail_col_total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" 
                                         alt="{{ $item->product_name }}" 
                                         class="me-2" 
                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                @endif
                                <div>
                                    <strong>{{ $item->product_name }}</strong>
                                    @if($item->variant_label)
                                        <br><small class="text-muted">{{ $item->variant_label }}</small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-end">{{ number_format($item->price, 0, ',', '.') }}đ</td>
                        <td class="text-end"><strong>{{ number_format($item->total, 0, ',', '.') }}đ</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Order Summary -->
<div class="order-summary">
    <div class="row">
        <div class="col-md-6">
            @if($order->customer_note)
                <h6><i class="fa-regular fa-comment"></i> {{ __('order_detail_note') }}</h6>
                <p class="text-muted">{{ $order->customer_note }}</p>
            @endif
            
            @if($order->admin_note)
                <h6><i class="fa-regular fa-note-sticky"></i> {{ __('order_detail_admin_note') }}</h6>
                <p class="text-info">{{ $order->admin_note }}</p>
            @endif
        </div>
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title">{{ __('order_detail_summary') }}</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('order_detail_subtotal') }}</span>
                        <span>{{ number_format($order->subtotal, 0, ',', '.') }}đ</span>
                    </div>
                    @if($order->discount > 0)
                        <div class="d-flex justify-content-between mb-2 text-success">
                            <span>{{ __('order_detail_discount') }}</span>
                            <span>-{{ number_format($order->discount, 0, ',', '.') }}đ</span>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('order_detail_shipping') }}</span>
                        <span>{{ number_format($order->shipping_fee, 0, ',', '.') }}đ</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>{{ __('order_detail_total') }}</strong>
                        <strong class="text-primary">{{ number_format($order->total, 0, ',', '.') }}đ</strong>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            {{ __('order_detail_payment') }} {{ $order->payment_method ?? 'COD' }}
                            @if($order->payment_status)
                                <br>{{ __('order_detail_payment_status') }}
                                <span class="badge bg-{{ $order->payment_status === 'paid' ? 'success' : 'warning' }}">
                                    {{ $order->payment_status_label ?? $order->payment_status }}
                                </span>
                            @endif
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Status History -->
@if($order->statusHistories && $order->statusHistories->count() > 0)
    <div class="order-history mt-4">
        <h6><i class="fa-regular fa-clock"></i> {{ __('order_detail_history') }}</h6>
        <div class="timeline">
            @foreach($order->statusHistories as $history)
                <div class="timeline-item mb-3">
                    <div class="d-flex">
                        <div class="timeline-marker me-3">
                            <i class="fa-solid fa-circle text-primary" style="font-size: 8px;"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $history->status_label ?? $history->status }}</strong>
                                <small class="text-muted">{{ $history->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                            @if($history->note)
                                <p class="mb-0 text-muted">{{ $history->note }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

<style>
.timeline-item { position: relative; }
.timeline-marker { width: 20px; text-align: center; padding-top: 2px; }
.timeline-item:not(:last-child) .timeline-marker::after {
    content: ''; position: absolute; left: 50%; top: 15px;
    width: 1px; height: 30px; background: #dee2e6; transform: translateX(-50%);
}
.order-detail-area { animation: slideIn 0.3s ease-in-out; }
@keyframes slideIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
.order-detail-area .card { border: 1px solid #e9ecef; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.order-detail-area h6 { color: #495057; font-weight: 600; margin-bottom: 0.75rem; }
.order-detail-area h6 i { color: #6c757d; margin-right: 0.5rem; }
</style>

