@extends('admin.layouts.app')
@section('title', 'Hồ sơ: ' . $user->name)
@section('page-title', $user->name)
@section('page-subtitle', 'Hồ sơ khách hàng hệ thống')

@section('page-actions')
<div style="display:flex; gap:8px;">
    <a href="{{ locale_route('admin.users.edit', $user) }}" class="btn btn-primary">
        <i class="fa-solid fa-pen"></i> Chỉnh sửa
    </a>
    <a href="{{ locale_route('admin.users.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
</div>
@endsection

@section('content')
<div style="display:grid;grid-template-columns:320px 1fr;gap:24px;align-items:start;">

    {{-- ── CỘT TRÁI: Thông tin khách hàng ── --}}
    <div style="display:flex;flex-direction:column;gap:24px;">

        {{-- Avatar + tóm tắt --}}
        <div class="card" style="padding:32px 24px; text-align:center; border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
            <div style="width:72px;height:72px;border-radius:20px;background:linear-gradient(135deg,#3b82f6,#8b5cf6);display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:700;color:#fff;margin:0 auto 16px;box-shadow: 0 8px 16px rgba(59, 130, 246, 0.2);">
                {{ strtoupper(mb_substr($user->name, 0, 1)) }}
            </div>
            <h2 style="font-size:18px;font-weight:800;color:#0f172a;margin-bottom:4px;">{{ $user->name }}</h2>
            <p style="font-size:13px;color:#64748b;margin-bottom:12px;">{{ $user->email }}</p>
            
            <div style="margin-bottom:20px;">
                @php
                    $badgeClass = [
                        'admin'         => 'badge-red',
                        'manager'       => 'badge-purple',
                        'store_manager' => 'badge-orange',
                        'web_admin'     => 'badge-blue',
                    ][$user->role] ?? 'badge-gray';
                @endphp
                <span class="badge {{ $badgeClass }}" style="border-radius:20px; padding:4px 12px;">{{ $user->role_name }}</span>
            </div>

            {{-- Stats --}}
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                <div style="background:#f8fafc; border-radius:12px; padding:12px;">
                    <p style="font-size:22px; font-weight:800; color:#0f172a;">{{ $orderCount }}</p>
                    <p style="font-size:10px; color:#94a3b8; text-transform:uppercase; font-weight:700; letter-spacing:0.05em;">Đơn hàng</p>
                </div>
                <div style="background:#f0fdf4; border-radius:12px; padding:12px;">
                    <p style="font-size:16px; font-weight:800; color:#15803d; line-height:22px;">{{ number_format($totalSpent, 0, ',', '.') }}₫</p>
                    <p style="font-size:10px; color:#15803d; text-transform:uppercase; font-weight:700; letter-spacing:0.05em;">Chi tiêu</p>
                </div>
            </div>
        </div>

        {{-- NEW: Nếu là Đại lý --}}
        @if($user->agent)
        <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px; background:linear-gradient(to right, #fff, #f8fafc);">
            <div class="card-header" style="padding:16px 20px; background:transparent; border-bottom:1px solid #f1f5f9;">
                <span class="card-title" style="font-size:14px; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Thông tin Đại lý</span>
            </div>
            <div class="card-body" style="padding:20px;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="width:40px; height:40px; border-radius:12px; background:linear-gradient(135deg,#6366f1,#8b5cf6); display:flex; align-items:center; justify-content:center; color:#fff; flex-shrink:0;">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <div>
                        <p style="font-size:14px; font-weight:700; color:#1e293b; margin-bottom:2px;">{{ $user->agent->name }}</p>
                        <span class="badge badge-orange" style="font-size:9px; padding:2px 8px;">{{ $user->agent->type_name }}</span>
                    </div>
                </div>
                <a href="{{ locale_route('admin.agents.show', $user->agent) }}" class="btn btn-secondary w-full justify-center" style="font-size:12px; height:36px; border-radius:8px;">
                    <i class="fa-solid fa-eye"></i> Xem hồ sơ Đại lý
                </a>
            </div>
        </div>
        @endif

        {{-- Thông tin liên hệ --}}
        <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
            <div class="card-header" style="padding:16px 20px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                <span class="card-title" style="font-size:14px; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Thông tin liên hệ</span>
            </div>
            <div class="card-body" style="padding:20px; display:flex; flex-direction:column; gap:16px;">
                @if($user->phone)
                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa-solid fa-phone" style="font-size:12px;color:#16a34a;"></i>
                    </div>
                    <div>
                        <p style="font-size:10px;color:#94a3b8;text-transform:uppercase;font-weight:700;">Điện thoại</p>
                        <a href="tel:{{ $user->phone }}" style="font-size:14px;font-weight:700;color:#0f172a;text-decoration:none;">{{ $user->phone }}</a>
                    </div>
                </div>
                @endif

                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa-solid fa-envelope" style="font-size:12px;color:#2563eb;"></i>
                    </div>
                    <div>
                        <p style="font-size:10px;color:#94a3b8;text-transform:uppercase;font-weight:700;">Email</p>
                        <a href="mailto:{{ $user->email }}" style="font-size:14px;font-weight:700;color:#0f172a;text-decoration:none;">{{ $user->email }}</a>
                    </div>
                </div>

                @if($user->address)
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:#fef9c3;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;">
                        <i class="fa-solid fa-location-dot" style="font-size:12px;color:#a16207;"></i>
                    </div>
                    <div>
                        <p style="font-size:10px;color:#94a3b8;text-transform:uppercase;font-weight:700;">Địa chỉ</p>
                        <p style="font-size:13px;color:#334155;line-height:1.6;">{{ $user->address }}</p>
                    </div>
                </div>
                @endif

                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:32px;height:32px;border-radius:10px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa-solid fa-calendar" style="font-size:12px;color:#64748b;"></i>
                    </div>
                    <div>
                        <p style="font-size:10px;color:#94a3b8;text-transform:uppercase;font-weight:700;">Ngày đăng ký</p>
                        <p style="font-size:14px;font-weight:600;color:#334155;">{{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nút thao tác nhanh --}}
        <div class="card" style="padding:20px; display:flex; flex-direction:column; gap:10px; border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
            @if($user->phone)
            <a href="tel:{{ $user->phone }}"
               style="display:flex;align-items:center;gap:10px;padding:12px 16px;background:#dcfce7;color:#15803d;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;">
                <i class="fa-solid fa-phone"></i> Gọi điện ngay
            </a>
            <a href="https://zalo.me/{{ preg_replace('/[^0-9]/', '', $user->phone) }}" target="_blank"
               style="display:flex;align-items:center;gap:10px;padding:12px 16px;background:#dbeafe;color:#1d4ed8;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;">
                <i class="fa-solid fa-comment-dots"></i> Nhắn tin Zalo
            </a>
            @endif
            <a href="mailto:{{ $user->email }}"
               style="display:flex;align-items:center;gap:10px;padding:12px 16px;background:#f1f5f9;color:#475569;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;">
                <i class="fa-solid fa-envelope"></i> Gửi Email
            </a>
        </div>

    </div>

    {{-- ── CỘT PHẢI: Lịch sử đơn hàng ── --}}
    <div style="display:flex;flex-direction:column;gap:24px;">

        <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
            <div style="padding:20px 24px; border-bottom:1px solid #f1f5f9; background:#fcfcfc; border-radius:16px 16px 0 0;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                    <h3 style="font-size:12px; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.08em; display:flex; align-items:center; gap:10px;">
                        <span style="width:4px; height:16px; background:#3b82f6; border-radius:4px; display:inline-block;"></span>
                        Lịch sử đơn hàng
                    </h3>
                    <span style="font-size:11px; color:#94a3b8; font-weight:700;">{{ $orders->total() }} đơn</span>
                </div>

                {{-- Filter Bar --}}
                <form method="GET" action="{{ locale_route('admin.users.show', $user) }}" style="display:flex; flex-wrap:wrap; gap:12px; align-items:flex-end;">
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label style="font-size:10px; font-weight:700; color:#64748b; text-transform:uppercase;">Từ ngày</label>
                        <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-input" style="width:140px; padding:6px 12px; border-radius:8px; height:36px; font-size:13px;">
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label style="font-size:10px; font-weight:700; color:#64748b; text-transform:uppercase;">Đến ngày</label>
                        <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-input" style="width:140px; padding:6px 12px; border-radius:8px; height:36px; font-size:13px;">
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label style="font-size:10px; font-weight:700; color:#64748b; text-transform:uppercase;">Trạng thái</label>
                        <select name="status" class="form-select" style="width:160px; padding:6px 12px; border-radius:8px; height:36px; font-size:13px;">
                            <option value="">Tất cả</option>
                            @foreach(\App\Models\Order::$statuses as $key => $s)
                                <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $s['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label style="font-size:10px; font-weight:700; color:#64748b; text-transform:uppercase;">Thanh toán</label>
                        <select name="payment_status" class="form-select" style="width:160px; padding:6px 12px; border-radius:8px; height:36px; font-size:13px;">
                            <option value="">Tất cả</option>
                            @foreach(\App\Models\Order::$paymentStatuses as $key => $ps)
                                <option value="{{ $key }}" {{ request('payment_status') === $key ? 'selected' : '' }}>{{ $ps['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" style="height:36px; padding:0 16px; border-radius:8px; font-weight:700;">
                        <i class="fa-solid fa-filter"></i> Lọc
                    </button>
                    @if(request()->anyFilled(['date_from', 'date_to', 'status', 'payment_status']))
                        <a href="{{ locale_route('admin.users.show', $user) }}" class="btn btn-secondary btn-sm" style="height:36px; padding:0 12px; border-radius:8px; font-weight:700;">
                            <i class="fa-solid fa-times"></i> Xóa lọc
                        </a>
                    @endif
                </form>
            </div>

            <div class="card-body p-0">
                @if($orders->isEmpty())
                    <div style="text-align:center;padding:80px 48px;color:#94a3b8;">
                        <div style="width:64px;height:64px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                            <i class="fa-solid fa-bag-shopping" style="font-size:28px;opacity:.3;"></i>
                        </div>
                        <p style="font-size:15px;font-weight:600;color:#64748b;">Không tìm thấy đơn hàng</p>
                        <p style="font-size:13px;margin-top:4px;">Thử thay đổi bộ lọc để xem kết quả khác.</p>
                    </div>
                @else
                    <div class="tbl-wrap">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead style="background:#f8fafc;">
                                <tr>
                                    <th class="tbl-th" style="padding:14px 20px;">Mã đơn</th>
                                    <th class="tbl-th" style="padding:14px 20px;">Ngày đặt</th>
                                    <th class="tbl-th" style="text-align:right; padding:14px 20px;">Tổng tiền</th>
                                    <th class="tbl-th" style="text-align:center; padding:14px 20px;">Trạng thái</th>
                                    <th class="tbl-th" style="text-align:center; padding:14px 20px;">Thanh toán</th>
                                    <th class="tbl-th" style="text-align:center; width:60px; padding:14px 20px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="tbl-tr">
                                    <td class="tbl-td" style="padding:14px 20px;">
                                        <a href="{{ locale_route('admin.orders.show', $order) }}"
                                           style="font-size:13px;font-weight:800;color:#2563eb;text-decoration:none;font-family:'Monaco', 'Consolas', monospace;">
                                            #{{ $order->order_number }}
                                        </a>
                                    </td>
                                    <td class="tbl-td" style="padding:14px 20px;">
                                        <div style="font-size:13.5px; font-weight:700; color:#334155;">{{ $order->created_at->format('d/m/Y') }}</div>
                                        <div style="font-size:11px; color:#94a3b8;">{{ $order->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="tbl-td" style="text-align:right;font-weight:800;font-size:14px;color:#0f172a;padding:14px 20px;">
                                        {{ number_format($order->total, 0, ',', '.') }}₫
                                    </td>
                                    <td class="tbl-td" style="text-align:center; padding:14px 20px;">
                                        @php $sc = \App\Models\Order::$statuses[$order->status] ?? ['label'=>$order->status,'color'=>'gray']; @endphp
                                        <span class="badge badge-{{ $sc['color'] }}" style="font-size:11px; border-radius:20px; padding:3px 12px; font-weight:700;">{{ $sc['label'] }}</span>
                                    </td>
                                    <td class="tbl-td" style="text-align:center; padding:14px 20px;">
                                        @php $psc = \App\Models\Order::$paymentStatuses[$order->payment_status] ?? ['label'=>$order->payment_status,'color'=>'gray']; @endphp
                                        <span class="badge badge-{{ $psc['color'] }}" style="font-size:11px; border-radius:20px; padding:3px 12px; font-weight:700;">{{ $psc['label'] }}</span>
                                    </td>
                                    <td class="tbl-td" style="text-align:center; padding:14px 20px;">
                                        <a href="{{ locale_route('admin.orders.show', $order) }}" class="act-btn view" style="width:32px; height:32px; border-radius:10px;">
                                            <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($orders->hasPages())
                    <div style="padding:20px; border-top:1px solid #f1f5f9;">
                        {{ $orders->links() }}
                    </div>
                    @endif
                @endif
            </div>
        </div>

    </div>
</div>
@endsection

