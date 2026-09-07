@extends('layouts.app')
@section('title', 'Tài khoản của tôi - WKcomputer')
@section('content')

<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">Tài khoản</li>
        </ol>
    </div>
</div>

<div style="background:#f0f2f5;padding:24px 0 40px;">
    <div class="wk-container">
        <div style="display:grid;grid-template-columns:240px 1fr;gap:20px;align-items:start;">

            {{-- Sidebar --}}
            <div style="background:#fff;border-radius:16px;border:1px solid #f1f5f9;overflow:hidden;position:sticky;top:120px;">
                <div style="background:var(--wk-primary);padding:24px;text-align:center;">
                    <div style="width:64px;height:64px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-size:28px;font-weight:800;color:#fff;border:3px solid rgba(255,255,255,.4);">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div style="color:#fff;font-weight:700;font-size:14px;">{{ $user->name }}</div>
                    <div style="color:rgba(255,255,255,.75);font-size:11px;margin-top:2px;">{{ $user->email }}</div>
                </div>
                <nav style="padding:8px 0;">
                    @foreach([
                        [route('profile'), 'fas fa-user', 'Thông tin tài khoản', true],
                        [route('cart.page'), 'fas fa-shopping-cart', 'Giỏ hàng', false],
                        [route('wishlist'), 'fas fa-heart', 'Danh sách yêu thích', false],
                        [route('order.track'), 'fas fa-truck', 'Tra cứu đơn hàng', false],
                    ] as $nav)
                    <a href="{{ $nav[0] }}" style="display:flex;align-items:center;gap:10px;padding:12px 20px;font-size:13px;font-weight:{{ $nav[3] ? '600' : '500' }};color:{{ $nav[3] ? 'var(--wk-primary)' : '#475569' }};background:{{ $nav[3] ? '#fff5f5' : 'transparent' }};border-left:3px solid {{ $nav[3] ? 'var(--wk-primary)' : 'transparent' }};transition:all .2s;text-decoration:none;">
                        <i class="{{ $nav[1] }}" style="width:16px;text-align:center;"></i> {{ $nav[2] }}
                    </a>
                    @endforeach
                    <div style="border-top:1px solid #f1f5f9;margin:8px 0;"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="display:flex;align-items:center;gap:10px;padding:12px 20px;font-size:13px;color:#ef5350;background:none;border:none;cursor:pointer;width:100%;font-weight:500;">
                            <i class="fas fa-sign-out-alt" style="width:16px;text-align:center;"></i> Đăng xuất
                        </button>
                    </form>
                </nav>
            </div>

            {{-- Main --}}
            <div style="display:flex;flex-direction:column;gap:16px;">
                {{-- Profile info --}}
                <div style="background:#fff;border-radius:16px;border:1px solid #f1f5f9;overflow:hidden;">
                    <div style="padding:16px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
                        <h2 style="font-size:15px;font-weight:700;margin:0;"><i class="fas fa-user" style="color:var(--wk-primary);margin-right:8px;"></i>Thông tin cá nhân</h2>
                    </div>
                    <div style="padding:24px;">
                        <form method="POST" action="{{ route('account.profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                                <div>
                                    <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Họ tên</label>
                                    <input type="text" name="name" value="{{ $user->name }}" required
                                           style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;"
                                           onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                                </div>
                                <div>
                                    <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Email</label>
                                    <input type="email" value="{{ $user->email }}" disabled
                                           style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;background:#f8fafc;color:#94a3b8;">
                                </div>
                                <div>
                                    <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Số điện thoại</label>
                                    <input type="tel" name="phone" value="{{ $user->phone ?? '' }}"
                                           style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:13px;outline:none;"
                                           onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                                </div>
                            </div>
                            <button type="submit" class="wk-btn wk-btn-primary wk-btn-sm">
                                <i class="fas fa-save"></i> Lưu thông tin
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Recent orders --}}
                <div style="background:#fff;border-radius:16px;border:1px solid #f1f5f9;overflow:hidden;">
                    <div style="padding:16px 24px;border-bottom:1px solid #f1f5f9;">
                        <h2 style="font-size:15px;font-weight:700;margin:0;"><i class="fas fa-list-alt" style="color:var(--wk-primary);margin-right:8px;"></i>Đơn hàng gần đây</h2>
                    </div>
                    <div style="padding:0 24px;">
                        @forelse($orders as $order)
                        <div style="display:flex;align-items:center;gap:16px;padding:16px 0;border-bottom:1px solid #f8fafc;">
                            <div style="flex:1;">
                                <div style="font-size:13px;font-weight:700;color:#1e293b;">#{{ $order->order_number ?? $order->id }}</div>
                                <div style="font-size:11px;color:#94a3b8;margin-top:2px;">{{ $order->created_at?->format('d/m/Y H:i') }}</div>
                            </div>
                            <div style="text-align:right;">
                                <div style="font-size:14px;font-weight:700;color:var(--wk-primary);">{{ number_format($order->total, 0, ',', '.') }}₫</div>
                                @php
                                    $statusColors = ['pending'=>'#ff6d00','processing'=>'#1565c0','completed'=>'#2e7d32','cancelled'=>'#ef5350'];
                                    $statusLabels = ['pending'=>'Chờ xác nhận','processing'=>'Đang xử lý','completed'=>'Hoàn thành','cancelled'=>'Đã hủy'];
                                @endphp
                                <span style="font-size:10px;font-weight:700;color:{{ $statusColors[$order->status] ?? '#94a3b8' }};background:{{ $statusColors[$order->status] ?? '#94a3b8' }}18;padding:2px 8px;border-radius:4px;margin-top:4px;display:inline-block;">
                                    {{ $statusLabels[$order->status] ?? $order->status }}
                                </span>
                            </div>
                            <a href="{{ route('order.detail', $order) }}" class="wk-btn wk-btn-outline wk-btn-sm">Chi tiết</a>
                        </div>
                        @empty
                        <div style="padding:40px 0;text-align:center;color:#94a3b8;font-size:13px;">
                            <i class="fas fa-shopping-bag" style="font-size:40px;color:#e2e8f0;display:block;margin-bottom:12px;"></i>
                            Bạn chưa có đơn hàng nào.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
