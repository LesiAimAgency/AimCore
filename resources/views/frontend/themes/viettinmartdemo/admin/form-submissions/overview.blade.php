@extends('admin.layouts.app')

@section('title', 'Tổng quan Form Submissions')
@section('page-title', 'Tổng quan Form Submissions')

@section('content')
    <!-- Stats Cards -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 32px; font-weight: bold; color: #2563eb; margin-bottom: 8px;">
                    {{ $stats['total_submissions'] }}
                </div>
                <div style="color: #64748b; font-size: 13px;">Tổng submissions</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 32px; font-weight: bold; color: #16a34a; margin-bottom: 8px;">
                    {{ $stats['contact_submissions'] }}
                </div>
                <div style="color: #64748b; font-size: 13px;">Tin nhắn liên hệ</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 32px; font-weight: bold; color: #dc2626; margin-bottom: 8px;">
                    {{ $stats['newsletter_subscriptions'] }}
                </div>
                <div style="color: #64748b; font-size: 13px;">Đăng ký newsletter</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 32px; font-weight: bold; color: #7c3aed; margin-bottom: 8px;">
                    {{ $stats['today_submissions'] }}
                </div>
                <div style="color: #64748b; font-size: 13px;">Hôm nay</div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 32px; font-weight: bold; color: #ea580c; margin-bottom: 8px;">
                    {{ $stats['this_week_submissions'] }}
                </div>
                <div style="color: #64748b; font-size: 13px;">Tuần này</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Quản lý Tin nhắn liên hệ</span>
            </div>
            <div class="card-body">
                <p style="color: #64748b; margin-bottom: 15px;">Xem và quản lý các tin nhắn từ form liên hệ</p>
                <a href="{{ locale_route('admin.contact-submissions.index') }}" class="btn btn-primary" style="width: 100%;">
                    <i class="fa-solid fa-envelope"></i> Xem tin nhắn liên hệ
                </a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <span class="card-title">Quản lý Newsletter</span>
            </div>
            <div class="card-body">
                <p style="color: #64748b; margin-bottom: 15px;">Xem danh sách đăng ký newsletter và xuất dữ liệu</p>
                <a href="{{ locale_route('admin.newsletter-subscriptions.index') }}" class="btn btn-primary" style="width: 100%;">
                    <i class="fa-solid fa-newspaper"></i> Xem đăng ký newsletter
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Submissions -->
    <div class="card">
        <div class="card-header">
            <span class="card-title">Submissions gần đây</span>
        </div>
        
        <div class="card-body p-0">
            @if($recent_submissions->count() > 0)
                <div class="tbl-wrap">
                    <table style="width:100%;border-collapse:collapse;">
                        <thead class="tbl-head">
                            <tr>
                                <th class="tbl-th" style="width: 80px;">Loại</th>
                                <th class="tbl-th">Thông tin</th>
                                <th class="tbl-th" style="width: 150px;">Thời gian</th>
                                <th class="tbl-th" style="width: 80px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_submissions as $submission)
                                <tr class="tbl-tr">
                                    <td class="tbl-td">
                                        @if($submission['type'] === 'contact')
                                            <span class="badge badge-blue">Liên hệ</span>
                                        @elseif($submission['type'] === 'newsletter')
                                            <span class="badge badge-green">Newsletter</span>
                                        @else
                                            <span class="badge badge-gray">Khác</span>
                                        @endif
                                    </td>
                                    <td class="tbl-td">
                                        @if($submission['type'] === 'contact')
                                            <strong>{{ $submission['data']['name'] ?? 'N/A' }}</strong>
                                            <br>
                                            <small style="color: #64748b;">{{ $submission['data']['email'] ?? 'N/A' }}</small>
                                            <br>
                                            <small style="color: #64748b;">{{ Str::limit($submission['data']['subject'] ?? 'Không có chủ đề', 40) }}</small>
                                        @elseif($submission['type'] === 'newsletter')
                                            <strong>{{ $submission['data']['email'] ?? 'N/A' }}</strong>
                                            <br>
                                            <small style="color: #64748b;">Đăng ký newsletter</small>
                                        @else
                                            <small style="color: #64748b;">{{ $submission['source'] }}</small>
                                        @endif
                                    </td>
                                    <td class="tbl-td">
                                        <div style="font-size: 13px;">
                                            {{ $submission['created_at']->format('d/m/Y H:i') }}
                                            <br>
                                            <small style="color: #64748b;">{{ $submission['created_at']->diffForHumans() }}</small>
                                        </div>
                                    </td>
                                    <td class="tbl-td">
                                        @if($submission['type'] === 'contact')
                                            <a href="{{ locale_route('admin.contact-submissions.show', $submission['id']) }}" 
                                               class="act-btn view" title="Xem chi tiết">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @else
                                            <span style="color: #94a3b8;">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div style="text-align: center; padding: 40px;">
                    <i class="fa-solid fa-inbox" style="font-size: 48px; color: #94a3b8; margin-bottom: 15px;"></i>
                    <p style="color: #64748b;">Chưa có submissions nào.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
