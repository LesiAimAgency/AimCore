@extends('layouts.app')

@section('title', __('orders_my_orders'))

@section('content')
    <x-breadcrumb :items="[
            ['label' => __('account_title'), 'url' => locale_route('profile')],
            ['label' => __('orders_my_orders')]
        ]" />

    <div class="account-area rts-section-gap bg_light-1">
        <div class="container">
            <div class="row g-5">
                {{-- Sidebar --}}
                <div class="col-lg-3">
                    <div class="account-sidebar bg-white p-4 rounded shadow-sm">
                        <div class="user-info-brief mb-4 pb-4 border-bottom d-flex align-items-center gap-3">
                            <div class="avatar-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                style="width: 50px; height: 50px; border-radius: 50%; font-size: 20px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                <span class="text-muted small">{{ __('account_member') }}</span>
                            </div>
                        </div>
                        <ul class="account-nav list-unstyled m-0 p-0">
                            <li class="mb-2">
                                <a href="{{ locale_route('profile') }}"
                                    class="nav-link p-3 rounded {{ request()->routeIs('profile') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }}">
                                    <i class="fa-light fa-user me-2"></i> {{ __('account_my_profile') }}
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ locale_route('orders') }}"
                                    class="nav-link p-3 rounded {{ request()->routeIs('orders*') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }}">
                                    <i class="fa-light fa-box me-2"></i> {{ __('orders_my_orders') }}
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ locale_route('wishlist') }}" class="nav-link p-3 rounded text-dark hover-bg-light">
                                    <i class="fa-light fa-heart me-2"></i> {{ __('account_my_wishlist') }}
                                </a>
                            </li>
                            <li class="mt-4 pt-4 border-top">
                                <form action="{{ locale_route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link p-3 rounded text-danger w-100 text-start border-0 bg-transparent hover-bg-light">
                                        <i class="fa-light fa-right-from-bracket me-2"></i> {{ __('account_logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-lg-9">
                    <div class="account-main-content bg-white p-5 rounded shadow-sm">
                        <h3 class="mb-5">{{ __('orders_title') }}</h3>

                        @if($orders->isEmpty())
                            <div class="empty-orders text-center py-5">
                                <i class="fa-light fa-cart-xmark mb-4" style="font-size: 60px; color: #ddd;"></i>
                                <p class="text-muted">{{ __('orders_empty') }}</p>
                                <a href="{{ locale_route('shop.index') }}" class="rts-btn btn-primary mt-3">{{ __('orders_shop_now') }}</a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="bg-light-1 border-0">
                                        <tr>
                                            <th class="p-3 border-0">{{ __('orders_col_number') }}</th>
                                            <th class="p-3 border-0">{{ __('orders_col_date') }}</th>
                                            <th class="p-3 border-0">{{ __('orders_col_status') }}</th>
                                            <th class="p-3 border-0">{{ __('orders_col_total') }}</th>
                                            <th class="p-3 border-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="p-3 fw-bold text-dark">#{{ $order->order_number }}</td>
                                                <td class="p-3 text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="p-3">
                                                    @php
                                                        $colors = [
                                                            'pending' => '#f59e0b',
                                                            'processing' => '#3b82f6',
                                                            'shipping' => '#8b5cf6',
                                                            'delivered' => '#10b981',
                                                            'completed' => '#059669',
                                                            'cancelled' => '#ef4444',
                                                        ];
                                                        $color = $colors[$order->status] ?? '#6b7280';
                                                    @endphp
                                                    <span class="badge" style="background-color: {{ $color }};">{{ $order->status_label }}</span>
                                                </td>
                                                <td class="p-3 fw-bold text-primary">
                                                    {{ number_format($order->total, 0, ',', '.') }}đ</td>
                                                <td class="p-3 text-end">
                                                    <a href="{{ locale_route('order.detail', $order) }}"
                                                        class="btn btn-sm btn-outline-primary rounded-pill px-3">{{ __('orders_detail_btn') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                {{ $orders->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-bg-light:hover { background-color: #f8f9fa; }
        .account-nav .nav-link { transition: all 0.3s ease; font-weight: 500; }
        .table thead th { font-weight: 600; color: #2C3C28; font-size: 14px; }
    </style>
@endsection



