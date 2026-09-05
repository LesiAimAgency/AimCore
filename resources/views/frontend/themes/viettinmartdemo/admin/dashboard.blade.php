@extends('admin.layouts.app')
@section('title', 'Bảng điều khiển')
@section('page-title', 'Bảng điều khiển')
@section('page-subtitle')
    Xin chào, {{ auth()->user()->name ?? 'Admin' }}! Đây là báo cáo kinh doanh của bạn.
@endsection

@section('content')

@php $user = auth()->user(); @endphp

{{-- Order Pipeline Hub --}}
<div class="mb-6">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
        <h3 style="font-size:12px;font-weight:800;color:#1e293b;text-transform:uppercase;letter-spacing:.05em;display:flex;align-items:center;gap:8px;">
            <i class="fa-solid fa-route text-blue-600"></i>
            Tiến độ vận hành đơn hàng
        </h3>
        <span style="font-size:11px;color:#64748b;">Dữ liệu cập nhật: {{ now()->format('H:i') }}</span>
    </div>

    <div class="grid grid-cols-5 gap-4">
        {{-- Pipeline Item: New/Unassigned (Special for Admin) --}}
        @if($user->isAdmin())
        <div class="card" style="padding:15px;border-left:4px solid #ef4444;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="width:36px;height:36px;border-radius:10px;background:#fef2f2;color:#ef4444;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa- parachute-box"></i>
                </div>
                <div>
                    <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;">Chưa gán đại lý</p>
                    <p style="font-size:18px;font-weight:800;color:#b91c1c;">{{ $stats['unassigned_orders'] }}</p>
                </div>
            </div>
            <a href="{{ locale_route('admin.orders.index') }}?filter=unassigned" style="font-size:9px;color:#ef4444;text-decoration:none;font-weight:700;margin-top:8px;display:block;">Gán đơn ngay <i class="fa-solid fa-arrow-right ml-1"></i></a>
        </div>
        @else
        <div class="card" style="padding:15px;border-left:4px solid #f59e0b;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="width:36px;height:36px;border-radius:10px;background:#fffbeb;color:#f59e0b;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <div>
                    <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;">Chờ xác nhận</p>
                    <p style="font-size:18px;font-weight:800;color:#d97706;">{{ $stats['pending_orders'] }}</p>
                </div>
            </div>
            <p style="font-size:9px;color:#94a3b8;margin-top:8px;">Vui lòng kiểm tra kho</p>
        </div>
        @endif

        {{-- Processing --}}
        <div class="card" style="padding:15px;border-left:4px solid #3b82f6;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="width:36px;height:36px;border-radius:10px;background:#eff6ff;color:#3b82f6;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-box-open"></i>
                </div>
                <div>
                    <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;">Đang xử lý</p>
                    <p style="font-size:18px;font-weight:800;color:#1d4ed8;">{{ $stats['processing_orders'] }}</p>
                </div>
            </div>
        </div>

        {{-- Shipping --}}
        <div class="card" style="padding:15px;border-left:4px solid #8b5cf6;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="width:36px;height:36px;border-radius:10px;background:#f5f3ff;color:#8b5cf6;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div>
                    <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;">Đang giao</p>
                    <p style="font-size:18px;font-weight:800;color:#6d28d9;">{{ $stats['shipping_orders'] }}</p>
                </div>
            </div>
        </div>

        {{-- Completed --}}
        <div class="card" style="padding:15px;border-left:4px solid #10b981;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div style="width:36px;height:36px;border-radius:10px;background:#ecfdf5;color:#10b981;display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-check-double"></i>
                </div>
                <div>
                    <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;">Xong hôm nay</p>
                    <p style="font-size:18px;font-weight:800;color:#047857;">{{ $stats['completed_today'] }}</p>
                </div>
            </div>
        </div>

        {{-- Performance/Revenue (Summary) --}}
        <div class="card" style="padding:15px;background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);color:#fff;">
            <p style="font-size:9px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;">Tổng doanh thu ({{ now()->format('M') }})</p>
            <p style="font-size:16px;font-weight:900;margin-top:4px;">{{ number_format($stats['monthly_revenue'], 0, ',', '.') }}₫</p>
            <div style="margin-top:6px;display:flex;align-items:center;gap:4px;">
                <span style="font-size:9px;color:#10b981;font-weight:700;">+12.5%</span>
                <span style="font-size:8px;color:#475569;">so với tháng trước</span>
            </div>
        </div>
    </div>
</div>

{{-- E-commerce Stat Cards --}}
@php $repeat = $stats['repeat_customers'] ?? ['rate' => 0, 'count' => 0, 'total' => 0]; @endphp
<div class="grid grid-cols-5 gap-4 mb-5">
    @php
    $stats_cards = [
        [
            'label' => 'Doanh thu (6 tháng)',
            'value' => number_format($stats['revenue_6m'], 0, ',', '.') . '₫',
            'icon'  => 'fa-money-bill-trend-up',
            'class' => 'bg-emerald-50 text-emerald-600',
            'sub'   => null,
        ],
        [
            'label' => 'Doanh thu (3 tháng)',
            'value' => number_format($stats['revenue_3m'], 0, ',', '.') . '₫',
            'icon'  => 'fa-chart-line',
            'class' => 'bg-blue-50 text-blue-600',
            'sub'   => null,
        ],
        [
            'label' => 'Tháng này',
            'value' => number_format($stats['monthly_revenue'], 0, ',', '.') . '₫',
            'icon'  => 'fa-calendar-check',
            'class' => 'bg-indigo-50 text-indigo-600',
            'sub'   => null,
        ],
        [
            'label' => 'Đơn hàng',
            'value' => number_format($stats['total_orders']),
            'icon'  => 'fa-shopping-bag',
            'class' => 'bg-amber-50 text-amber-600',
            'sub'   => $stats['pending_orders'] . ' chờ xử lý',
        ],
        [
            'label' => 'Khách hàng',
            'value' => number_format($stats['total_customers']),
            'icon'  => 'fa-users',
            'class' => 'bg-rose-50 text-rose-600',
            'sub'   => null,
        ],
    ];
    @endphp
    @foreach($stats_cards as $sc)
    <div class="card" style="padding:14px 16px;display:flex;flex-direction:column;gap:10px;"
         x-data="{}" @mouseenter="$el.style.transform='translateY(-2px)'" @mouseleave="$el.style.transform='none'">
        <div class="w-9 h-9 rounded-xl {{ $sc['class'] }} flex items-center justify-center shrink-0">
            <i class="fa-solid {{ $sc['icon'] }}"></i>
        </div>
        <div>
            <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;margin-bottom:3px;">{{ $sc['label'] }}</p>
            <p style="font-size:15px;font-weight:800;color:#0f172a;line-height:1;">{{ $sc['value'] }}</p>
            @if($sc['sub'])
                <p style="font-size:10px;color:#94a3b8;margin-top:3px;">{{ $sc['sub'] }}</p>
            @endif
        </div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-12 gap-6">
    {{-- High Level Insights (60%) --}}
    <div class="col-span-8 flex flex-col gap-6">
        {{-- SPECIAL: Dispatch Hub for Admin / Work Hub for Agent --}}
        @if($user->isAdmin() && $stats['unassigned_orders'] > 0)
        <div class="card overflow-hidden" style="border-top: 3px solid #ef4444;">
            <div style="padding:12px 16px;background:#fef2f2;display:flex;align-items:center;justify-content:space-between;">
                <h3 style="font-size:11px;font-weight:800;color:#b91c1c;text-transform:uppercase;letter-spacing:.05em;">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i> Đơn hàng chưa có đại lý (Cần đổ đơn)
                </h3>
                <a href="{{ locale_route('admin.orders.index') }}?filter=unassigned" style="font-size:10px;font-weight:700;color:#ef4444;">Xem tất cả</a>
            </div>
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <tbody>
                        @foreach($stats['recent_unassigned'] as $uo)
                        <tr class="tbl-tr">
                            <td class="tbl-td" style="font-weight:700;">#{{ $uo->order_number }}</td>
                            <td class="tbl-td">{{ $uo->customer_name }}</td>
                            <td class="tbl-td"><span class="badge badge-gray">{{ $uo->shipping_province }}</span></td>
                            <td class="tbl-td" style="font-weight:700;text-align:right;">{{ number_format($uo->total, 0, ',', '.') }}₫</td>
                            <td class="tbl-td" style="text-align:center;">
                                <a href="{{ locale_route('admin.orders.edit', $uo) }}" class="btn btn-primary btn-sm" style="padding:3px 10px;font-size:10px;">
                                    Gán ngay
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        {{-- Revenue Chart --}}
        <div class="card" style="padding:16px 20px;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <h3 style="font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.1em;display:flex;align-items:center;gap:8px;">
                    <span style="width:20px;height:2px;background:#10b981;border-radius:2px;display:inline-block;"></span>
                    Biểu đồ doanh thu hàng tháng
                </h3>
            </div>
            @if($stats['revenue_chart']->isEmpty())
                <div style="height:200px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;color:#94a3b8;">
                    <i class="fa-solid fa-chart-line" style="font-size:32px;opacity:.3;"></i>
                    <p style="font-size:12px;font-weight:600;">Chưa có dữ liệu doanh thu</p>
                    <p style="font-size:11px;">Biểu đồ sẽ hiển thị khi có đơn hàng hoàn thành</p>
                </div>
            @else
                <div style="height:200px;width:100%;position:relative;">
                    <canvas id="revenueChart"></canvas>
                </div>
            @endif
        </div>

        {{-- Top Selling Products --}}
        <div class="card overflow-hidden">
            <div style="padding:12px 16px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
                <h3 style="font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.1em;display:flex;align-items:center;gap:8px;">
                    <span style="width:20px;height:2px;background:#3b82f6;border-radius:2px;display:inline-block;"></span>
                    Sản phẩm bán chạy nhất
                </h3>
                <span style="font-size:9px;font-weight:700;color:#2563eb;border:1px solid #dbeafe;padding:2px 8px;border-radius:4px;text-transform:uppercase;">Theo số lượng</span>
            </div>
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <thead class="tbl-head">
                        <tr>
                            <th class="tbl-th">Sản phẩm</th>
                            <th class="tbl-th" style="text-align:center;">Đã bán</th>
                            <th class="tbl-th" style="text-align:right;">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['top_selling'] as $p)
                        <tr class="tbl-tr">
                            <td class="tbl-td">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <img src="{{ $p->image_url }}" style="width:32px;height:32px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;">
                                    <span style="font-size:12px;font-weight:600;color:#475569;">{{ $p->product_name }}</span>
                                </div>
                            </td>
                            <td class="tbl-td" style="text-align:center;">
                                <span class="badge badge-green">{{ $p->total_qty }}</span>
                            </td>
                            <td class="tbl-td" style="text-align:right;font-weight:700;font-size:12px;color:#1e293b;">
                                {{ number_format($p->revenue, 0, ',', '.') }}₫
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Side Reports (40%) --}}
    <div class="col-span-4 flex flex-col gap-6">
        {{-- Slow Moving Products --}}
        <div class="card overflow-hidden">
            <div style="padding:12px 16px;border-bottom:1px solid #fee2e2;background:#fff5f5;">
                <h3 style="font-size:11px;font-weight:700;color:#dc2626;text-transform:uppercase;letter-spacing:.08em;display:flex;align-items:center;gap:8px;">
                    <span style="width:20px;height:2px;background:#ef4444;border-radius:2px;display:inline-block;"></span>
                    Sản phẩm chưa bán được
                </h3>
            </div>
            <div style="padding:12px;display:flex;flex-direction:column;gap:6px;">
                @forelse($stats['low_selling'] as $lp)
                <div style="display:flex;align-items:center;justify-content:space-between;padding:8px 10px;border-radius:8px;border:1px solid #f1f5f9;">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <img src="{{ $lp->thumbnail_url ?: asset('theme/images/no-image.png') }}" style="width:30px;height:30px;border-radius:6px;object-fit:cover;opacity:.7;">
                        <div>
                            <span style="font-size:11px;font-weight:600;color:#475569;display:block;">{{ Str::limit($lp->name, 22) }}</span>
                            <span style="font-size:9px;color:#94a3b8;text-transform:uppercase;">{{ $lp->sku ?? 'NO SKU' }}</span>
                        </div>
                    </div>
                    <a href="{{ locale_route('admin.products.edit', $lp) }}" class="act-btn edit">
                        <i class="fa-solid fa-pen" style="font-size:10px;"></i>
                    </a>
                </div>
                @empty
                <p style="text-align:center;padding:16px;font-size:11px;color:#94a3b8;font-style:italic;">Mọi sản phẩm đều đang bán tốt!</p>
                @endforelse
                <p style="font-size:10px;color:#dc2626;font-style:italic;margin-top:4px;">
                    <i class="fa-solid fa-circle-exclamation me-1"></i> Gợi ý: Kiểm tra lại mô tả hoặc chạy Flash Sale cho những mặt hàng này.
                </p>
            </div>
        </div>

        {{-- DA-01: Agent Performance (Admin Only) --}}
        @if($user->isAdmin() && $stats['agent_performance'])
        <div class="card overflow-hidden">
            <div style="padding:12px 16px;border-bottom:1px solid #e0f2fe;background:#f0f9ff;">
                <h3 style="font-size:11px;font-weight:700;color:#0369a1;text-transform:uppercase;letter-spacing:.08em;display:flex;align-items:center;gap:8px;">
                    <i class="fa-solid fa-ranking-star"></i> Xếp hạng Đại lý
                </h3>
            </div>
            <div style="padding:8px;">
                @foreach($stats['agent_performance'] as $idx => $ap)
                <div style="display:flex;align-items:center;justify-content:space-between;padding:10px;border-radius:8px;{{ $idx === 0 ? 'background:#fff7ed;border:1px solid #ffedd5;' : '' }}">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <span style="font-size:11px;font-weight:900;color:{{ $idx === 0 ? '#f59e0b' : '#94a3b8' }};">#{{ $idx + 1 }}</span>
                        <div>
                            <span style="font-size:12px;font-weight:700;color:#334155;display:block;">{{ $ap->name }}</span>
                            <span style="font-size:10px;color:#64748b;">{{ $ap->orders_count }} đơn hoàn tất</span>
                        </div>
                    </div>
                    <div style="text-align:right;">
                        <span style="font-size:12px;font-weight:800;color:#0f172a;display:block;">{{ number_format($ap->orders_sum_total, 0, ',', '.') }}₫</span>
                        <span style="font-size:9px;color:#10b981;font-weight:700;">{{ $ap->orders_sum_total > 0 ? round(($ap->orders_sum_total / max($stats['revenue_6m'],1)) * 100, 1) : 0 }}% tổng</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Quick Actions --}}
        <div class="card" style="padding:14px 16px;">
            <h3 style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.08em;margin-bottom:12px;">Thao tác quản trị</h3>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                <a href="{{ locale_route('admin.products.create') }}" style="display:flex;flex-direction:column;align-items:center;gap:6px;padding:10px 8px;border-radius:10px;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s;" onmouseover="this.style.background='#f0fdf4'" onmouseout="this.style.background='transparent'">
                    <div style="width:32px;height:32px;border-radius:8px;background:#dcfce7;color:#16a34a;display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-plus" style="font-size:13px;"></i>
                    </div>
                    <span style="font-size:9px;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:.05em;text-align:center;">Thêm sản phẩm</span>
                </a>
                <a href="{{ locale_route('admin.orders.index') }}" style="display:flex;flex-direction:column;align-items:center;gap:6px;padding:10px 8px;border-radius:10px;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s;" onmouseover="this.style.background='#eff6ff'" onmouseout="this.style.background='transparent'">
                    <div style="width:32px;height:32px;border-radius:8px;background:#dbeafe;color:#2563eb;display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-cart-shopping" style="font-size:13px;"></i>
                    </div>
                    <span style="font-size:9px;font-weight:700;color:#475569;text-transform:uppercase;letter-spacing:.05em;text-align:center;">QL Đơn hàng</span>
                </a>
            </div>
        </div>

        {{-- Recent Orders Small List --}}
        <div class="card p-5">
            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Hoạt động gần đây</h4>
            <div class="space-y-3" id="recent-activity-list">
                @foreach($stats['recent_orders'] as $ro)
                <div class="flex items-center justify-between anim-new-order">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                        <span class="text-[10px] font-bold">#{{ $ro->order_number }}</span>
                    </div>
                    <span class="text-[9px] text-slate-400">{{ $ro->created_at->diffForHumans() }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- DA-01: Top 10 khách mua nhiều nhất — Sale chăm sóc --}}
<div id="top-buyers" class="card overflow-hidden mt-6">
    <div style="padding:14px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
        <h3 style="font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.1em;display:flex;align-items:center;gap:8px;">
            <span style="width:20px;height:2px;background:#7c3aed;border-radius:2px;display:inline-block;"></span>
            Top 10 khách hàng mua nhiều nhất
        </h3>
        <div style="display:flex;align-items:center;gap:10px;">
            <span style="font-size:11px;color:#7c3aed;font-weight:700;">
                <i class="fa-solid fa-arrow-rotate-right mr-1"></i>
                Mua lại: {{ $repeat['rate'] }}%
                <span style="font-size:10px;font-weight:500;color:#94a3b8;">({{ $repeat['count'] }}/{{ $repeat['total'] }} khách)</span>
            </span>
            <span style="font-size:9px;font-weight:700;color:#7c3aed;border:1px solid #ede9fe;padding:2px 8px;border-radius:4px;text-transform:uppercase;background:#faf5ff;">
                <i class="fa-solid fa-headset mr-1"></i> Dành cho Sale
            </span>
        </div>
    </div>
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:collapse;">
            <thead class="tbl-head">
                <tr>
                    <th class="tbl-th" style="width:32px;">#</th>
                    <th class="tbl-th">Khách hàng</th>
                    <th class="tbl-th">Liên hệ</th>
                    <th class="tbl-th" style="text-align:center;">Số đơn</th>
                    <th class="tbl-th" style="text-align:right;">Tổng chi tiêu</th>
                    <th class="tbl-th">Đơn gần nhất</th>
                    <th class="tbl-th" style="text-align:center;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stats['top_buyers'] ?? [] as $i => $buyer)
                <tr class="tbl-tr">
                    <td class="tbl-td" style="font-size:11px;font-weight:700;color:#94a3b8;">{{ $i + 1 }}</td>
                    <td class="tbl-td">
                        <div style="display:flex;align-items:center;gap:10px;">
                            {{-- Avatar --}}
                            <div style="width:34px;height:34px;border-radius:50%;background:{{ ['#dbeafe','#dcfce7','#fef9c3','#ede9fe','#ffedd5','#fee2e2','#f0fdf4','#faf5ff','#fff7ed','#f0f9ff'][$i % 10] }};display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;color:{{ ['#1d4ed8','#15803d','#a16207','#7c3aed','#c2410c','#dc2626','#16a34a','#6d28d9','#c2410c','#0369a1'][$i % 10] }};flex-shrink:0;">
                                {{ strtoupper(mb_substr($buyer->customer_name ?? '?', 0, 1)) }}
                            </div>
                            <div>
                                <div style="font-size:12.5px;font-weight:700;color:#0f172a;">
                                    {{ $buyer->customer_name ?: 'Khách vãng lai' }}
                                    @if($buyer->user_id_link)
                                        <span style="font-size:9px;background:#dbeafe;color:#1d4ed8;padding:1px 6px;border-radius:4px;margin-left:4px;font-weight:600;">Thành viên</span>
                                    @endif
                                </div>
                                @if($buyer->user_address)
                                    <div style="font-size:10px;color:#94a3b8;margin-top:1px;">
                                        <i class="fa-solid fa-location-dot" style="font-size:9px;"></i>
                                        {{ Str::limit($buyer->user_address, 35) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="tbl-td">
                        <div style="display:flex;flex-direction:column;gap:3px;">
                            @if($buyer->customer_phone)
                                <a href="tel:{{ $buyer->customer_phone }}"
                                   onclick="event.stopPropagation()"
                                   style="font-size:12px;color:#0f172a;font-weight:600;text-decoration:none;display:flex;align-items:center;gap:5px;"
                                   onmouseover="this.style.color='#2563eb'" onmouseout="this.style.color='#0f172a'">
                                    <i class="fa-solid fa-phone" style="font-size:10px;color:#16a34a;"></i>
                                    {{ $buyer->customer_phone }}
                                </a>
                            @endif
                            @if($buyer->customer_email)
                                <a href="mailto:{{ $buyer->customer_email }}"
                                   onclick="event.stopPropagation()"
                                   style="font-size:11px;color:#64748b;text-decoration:none;display:flex;align-items:center;gap:5px;"
                                   onmouseover="this.style.color='#2563eb'" onmouseout="this.style.color='#64748b'">
                                    <i class="fa-solid fa-envelope" style="font-size:9px;color:#64748b;"></i>
                                    {{ Str::limit($buyer->customer_email, 28) }}
                                </a>
                            @endif
                        </div>
                    </td>
                    <td class="tbl-td" style="text-align:center;">
                        <span class="badge {{ $buyer->order_count >= 5 ? 'badge-purple' : ($buyer->order_count >= 3 ? 'badge-blue' : 'badge-gray') }}">
                            {{ $buyer->order_count }} đơn
                        </span>
                    </td>
                    <td class="tbl-td" style="text-align:right;font-weight:800;font-size:13px;color:#0f172a;">
                        {{ number_format($buyer->total_spent, 0, ',', '.') }}₫
                    </td>
                    <td class="tbl-td" style="font-size:11px;color:#64748b;">
                        {{ \Carbon\Carbon::parse($buyer->last_order_at)->diffForHumans() }}
                    </td>
                    <td class="tbl-td">
                        <div style="display:flex;align-items:center;gap:5px;">
                            {{-- Gọi điện --}}
                            @if($buyer->customer_phone)
                            <a href="tel:{{ $buyer->customer_phone }}"
                               class="act-btn view"
                               title="Gọi {{ $buyer->customer_phone }}">
                                <i class="fa-solid fa-phone" style="font-size:11px;"></i>
                            </a>
                            @endif

                            {{-- Gửi email --}}
                            @if($buyer->customer_email)
                            <a href="mailto:{{ $buyer->customer_email }}"
                               class="act-btn edit"
                               title="Email {{ $buyer->customer_email }}">
                                <i class="fa-solid fa-envelope" style="font-size:11px;"></i>
                            </a>
                            @endif

                            {{-- Xem đơn hàng — giống nhau cho cả 2 loại khách --}}
                            @php
                                $searchKey = $buyer->customer_email ?: $buyer->customer_phone;
                            @endphp
                            <a href="{{ locale_route('admin.orders.index') }}?search={{ urlencode($searchKey) }}"
                               class="act-btn"
                               style="background:#fef9c3;color:#a16207;border-color:#fde68a;"
                               title="Xem tất cả đơn hàng">
                                <i class="fa-solid fa-bag-shopping" style="font-size:11px;"></i>
                            </a>

                            {{-- Hồ sơ — chỉ thành viên đã đăng ký --}}
                            @if($buyer->user_id_link)
                            <a href="{{ locale_route('admin.users.show', $buyer->user_id_link) }}"
                               class="act-btn"
                               style="background:#ede9fe;color:#7c3aed;border-color:#ddd6fe;"
                               title="Xem hồ sơ thành viên">
                                <i class="fa-solid fa-user" style="font-size:11px;"></i>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:32px;font-size:12px;color:#94a3b8;font-style:italic;">
                        Chưa có dữ liệu đơn hàng
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('revenueChart');
        if (!canvas) return; // Không có data, canvas không được render

        const ctx = canvas.getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 220);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.15)');
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($stats['revenue_chart']->pluck('month')) !!},
                datasets: [{
                    label: 'Doanh thu',
                    data: {!! json_encode($stats['revenue_chart']->pluck('revenue')) !!},
                    borderColor: '#10b981',
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 1.5,
                    pointRadius: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { size: 9, weight: 'bold' },
                        bodyFont: { size: 11, weight: '900' },
                        padding: 8,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: true, color: '#f1f5f9', borderDash: [5, 5] },
                        ticks: {
                            font: { size: 8, weight: '700' },
                            color: '#94a3b8',
                            callback: function(value) {
                                if (value >= 1000000) return (value / 1000000) + 'M';
                                if (value >= 1000) return (value / 1000) + 'K';
                                return value;
                            }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 8, weight: '700' }, color: '#94a3b8' }
                    }
                }
            }
        });
    });
</script>
@endpush

