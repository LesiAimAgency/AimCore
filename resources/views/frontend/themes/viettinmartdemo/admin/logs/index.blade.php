@extends('admin.layouts.app')

@section('title', 'Nhật ký hệ thống')
@section('page-title', 'Nhật ký hệ thống')
@section('page-subtitle', 'Hoạt động admin · Bảo mật · Vận hành · Laravel')

@section('page-actions')
    <a href="{{ locale_route('admin.logs.download', ['tab' => $tab]) }}" class="btn btn-secondary">
        <i class="fa-solid fa-download"></i> Tải xuống
    </a>
    <form method="POST" action="{{ locale_route('admin.logs.clear') }}"
          onsubmit="return confirm('Xóa toàn bộ log {{ $logFiles[$tab]['label'] }}?')">
        @csrf
        <input type="hidden" name="tab" value="{{ $tab }}">
        <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-trash"></i> Xóa log
        </button>
    </form>
@endsection

@section('content')

@if(session('success'))
    <div class="flash flash-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
@endif

{{-- Tab navigation --}}
<div style="display:flex;gap:8px;margin-bottom:20px;border-bottom:2px solid #e2e8f0;padding-bottom:0;">
    @foreach($logFiles as $key => $meta)
    @php $isActive = $tab === $key; @endphp
    <a href="{{ locale_route('admin.logs.index', ['tab' => $key]) }}"
       style="display:flex;align-items:center;gap:8px;padding:10px 18px;font-size:13px;font-weight:600;text-decoration:none;border-radius:8px 8px 0 0;border:1.5px solid {{ $isActive ? '#e2e8f0' : 'transparent' }};border-bottom:{{ $isActive ? '2px solid #fff' : 'none' }};margin-bottom:{{ $isActive ? '-2px' : '0' }};background:{{ $isActive ? '#fff' : 'transparent' }};color:{{ $isActive ? $meta['color'] : '#64748b' }};">
        <i class="fa-solid {{ $meta['icon'] }}" style="color:{{ $meta['color'] }};"></i>
        {{ $meta['label'] }}
        @if($stats[$key]['count'] > 0)
        <span style="background:{{ $isActive ? $meta['color'] : '#e2e8f0' }};color:{{ $isActive ? '#fff' : '#64748b' }};font-size:10px;font-weight:700;padding:1px 7px;border-radius:999px;">
            {{ number_format($stats[$key]['count']) }}
        </span>
        @endif
    </a>
    @endforeach
</div>

{{-- Stats bar --}}
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:20px;">
    <div class="card" style="margin:0;">
        <div class="card-body" style="padding:14px 18px;">
            <p style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Tổng entries</p>
            <p style="font-size:22px;font-weight:800;color:#0f172a;">{{ number_format($total) }}</p>
        </div>
    </div>
    <div class="card" style="margin:0;">
        <div class="card-body" style="padding:14px 18px;">
            <p style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Kích thước</p>
            <p style="font-size:22px;font-weight:800;color:#0f172a;">{{ $logSize }}</p>
        </div>
    </div>
    <div class="card" style="margin:0;">
        <div class="card-body" style="padding:14px 18px;">
            <p style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Cập nhật</p>
            <p style="font-size:15px;font-weight:800;color:#0f172a;">{{ $lastModified }}</p>
        </div>
    </div>
    <div class="card" style="margin:0;">
        <div class="card-body" style="padding:14px 18px;">
            <p style="font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px;">Đang lọc</p>
            <p style="font-size:15px;font-weight:800;" style="color:{{ $logFiles[$tab]['color'] }};">
                <span style="color:{{ $logFiles[$tab]['color'] }};">{{ strtoupper($level) }}</span>
            </p>
        </div>
    </div>
</div>

{{-- Filters --}}
<div class="card" style="margin-bottom:16px;">
    <div class="card-body" style="padding:14px 18px;">
        <form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap;">
            <input type="hidden" name="tab" value="{{ $tab }}">
            {{-- Level pills --}}
            <div style="display:flex;gap:6px;flex-wrap:wrap;">
                @foreach($levels as $lvl)
                @php
                    $lc = ['all'=>'#64748b','emergency'=>'#7c3aed','alert'=>'#dc2626','critical'=>'#ea580c',
                           'error'=>'#ef4444','warning'=>'#f59e0b','notice'=>'#3b82f6','info'=>'#22c55e','debug'=>'#94a3b8'];
                    $active = $level === $lvl;
                @endphp
                <a href="{{ request()->fullUrlWithQuery(['level' => $lvl, 'page' => 1, 'tab' => $tab]) }}"
                   style="padding:4px 12px;border-radius:999px;font-size:11px;font-weight:700;text-transform:uppercase;text-decoration:none;border:1.5px solid {{ $lc[$lvl] ?? '#64748b' }};color:{{ $active ? '#fff' : ($lc[$lvl] ?? '#64748b') }};background:{{ $active ? ($lc[$lvl] ?? '#64748b') : 'transparent' }};transition:all .15s;">
                    {{ $lvl }}
                </a>
                @endforeach
            </div>
            {{-- Search --}}
            <div style="flex:1;min-width:200px;display:flex;gap:8px;">
                <input type="text" name="search" value="{{ $search }}" placeholder="Tìm trong log..." class="form-input" style="flex:1;">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-search"></i></button>
                @if($search)
                <a href="{{ request()->fullUrlWithQuery(['search' => '', 'page' => 1]) }}" class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Log entries --}}
<div class="card">
    <div class="card-header">
        <span class="card-title">
            <i class="fa-solid {{ $logFiles[$tab]['icon'] }}" style="color:{{ $logFiles[$tab]['color'] }};margin-right:6px;"></i>
            {{ $logFiles[$tab]['label'] }}
        </span>
        <span style="font-size:12px;color:#64748b;">{{ count($entries) }} / {{ $total }} entries</span>
    </div>
    <div class="card-body" style="padding:0;">
        @forelse($entries as $entry)
        @php
            $lmap = [
                'emergency' => ['bg'=>'#faf5ff','border'=>'#e9d5ff','badge'=>'badge-purple','dot'=>'#7c3aed'],
                'alert'     => ['bg'=>'#fff1f2','border'=>'#fecdd3','badge'=>'badge-red','dot'=>'#dc2626'],
                'critical'  => ['bg'=>'#fff7ed','border'=>'#fed7aa','badge'=>'badge-orange','dot'=>'#ea580c'],
                'error'     => ['bg'=>'#fff1f2','border'=>'#fecdd3','badge'=>'badge-red','dot'=>'#ef4444'],
                'warning'   => ['bg'=>'#fffbeb','border'=>'#fde68a','badge'=>'badge-yellow','dot'=>'#f59e0b'],
                'notice'    => ['bg'=>'#eff6ff','border'=>'#bfdbfe','badge'=>'badge-blue','dot'=>'#3b82f6'],
                'info'      => ['bg'=>'#f0fdf4','border'=>'#bbf7d0','badge'=>'badge-green','dot'=>'#22c55e'],
                'debug'     => ['bg'=>'#f8fafc','border'=>'#e2e8f0','badge'=>'badge-gray','dot'=>'#94a3b8'],
            ];
            $lc = $lmap[$entry['level']] ?? $lmap['debug'];
        @endphp
        <div x-data="{ open: false }" style="border-bottom:1px solid #f1f5f9;padding:12px 20px;background:{{ $lc['bg'] }};">
            <div style="display:flex;align-items:flex-start;gap:12px;">
                <span style="width:8px;height:8px;border-radius:50%;background:{{ $lc['dot'] }};margin-top:5px;flex-shrink:0;"></span>
                <div style="flex:1;min-width:0;">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px;flex-wrap:wrap;">
                        <span class="badge {{ $lc['badge'] }}" style="font-size:9px;">{{ strtoupper($entry['level']) }}</span>
                        <span style="font-size:11px;color:#94a3b8;font-family:monospace;">{{ $entry['datetime'] }}</span>
                        <span style="font-size:11px;color:#94a3b8;">{{ $entry['env'] }}</span>
                    </div>
                    <p style="font-size:13px;color:#1e293b;font-family:monospace;word-break:break-all;margin:0 0 4px;line-height:1.5;">
                        {{ $entry['message'] }}
                    </p>

                    {{-- Context badges (user, ip, route...) --}}
                    @if(!empty($entry['context']))
                    <div style="display:flex;gap:6px;flex-wrap:wrap;margin-top:4px;">
                        @if(!empty($entry['context']['user']))
                        <span style="font-size:10px;background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:999px;font-weight:600;">
                            <i class="fa-solid fa-user" style="font-size:9px;"></i> {{ $entry['context']['user'] }}
                        </span>
                        @endif
                        @if(!empty($entry['context']['ip']))
                        <span style="font-size:10px;background:#f1f5f9;color:#475569;padding:2px 8px;border-radius:999px;font-weight:600;">
                            <i class="fa-solid fa-location-dot" style="font-size:9px;"></i> {{ $entry['context']['ip'] }}
                        </span>
                        @endif
                        @if(!empty($entry['context']['method']) && !empty($entry['context']['url']))
                        <span style="font-size:10px;background:#f0fdf4;color:#15803d;padding:2px 8px;border-radius:999px;font-weight:600;font-family:monospace;">
                            {{ $entry['context']['method'] }} {{ str($entry['context']['url'])->limit(60) }}
                        </span>
                        @endif
                        @if(!empty($entry['context']['threat']))
                        <span style="font-size:10px;background:#fee2e2;color:#dc2626;padding:2px 8px;border-radius:999px;font-weight:700;">
                            <i class="fa-solid fa-triangle-exclamation" style="font-size:9px;"></i> {{ $entry['context']['threat'] }}
                        </span>
                        @endif
                        @if(isset($entry['context']['success']))
                        <span style="font-size:10px;background:{{ $entry['context']['success'] ? '#dcfce7' : '#fee2e2' }};color:{{ $entry['context']['success'] ? '#15803d' : '#dc2626' }};padding:2px 8px;border-radius:999px;font-weight:600;">
                            {{ $entry['context']['success'] ? __('common.success') : 'Thất bại' }}
                        </span>
                        @endif
                    </div>
                    @endif

                    @if($entry['has_stack'] || !empty($entry['context']))
                    <button @click="open = !open"
                            style="margin-top:6px;font-size:11px;color:#3b82f6;background:none;border:none;cursor:pointer;padding:0;font-weight:600;">
                        <i class="fa-solid fa-chevron-down" :class="open ? 'rotate-180' : ''" style="transition:transform .2s;"></i>
                        <span x-text="open ? 'Ẩn chi tiết' : 'Xem chi tiết'"></span>
                    </button>
                    <div x-show="open" x-cloak>
                        @if(!empty($entry['context']))
                        <pre style="margin-top:8px;padding:10px 14px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;font-size:11px;overflow-x:auto;line-height:1.6;white-space:pre-wrap;word-break:break-all;color:#334155;">{{ json_encode($entry['context'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        @endif
                        @if($entry['has_stack'])
                        <pre style="margin-top:6px;padding:12px;background:#0f172a;color:#e2e8f0;border-radius:8px;font-size:11px;overflow-x:auto;line-height:1.6;white-space:pre-wrap;word-break:break-all;">{{ $entry['full'] }}</pre>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div style="padding:48px;text-align:center;color:#94a3b8;">
            <i class="fa-solid fa-circle-check" style="font-size:32px;color:#22c55e;margin-bottom:12px;display:block;"></i>
            <p style="font-size:14px;font-weight:600;">Không có log nào{{ $search ? ' khớp với tìm kiếm' : '' }}.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- Pagination --}}
@if($total > $perPage)
<div style="display:flex;justify-content:center;gap:8px;margin-top:16px;flex-wrap:wrap;">
    @php $totalPages = ceil($total / $perPage); @endphp
    @for($i = 1; $i <= $totalPages; $i++)
    <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
       style="width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;text-decoration:none;border:1.5px solid {{ $page === $i ? '#3b82f6' : '#e2e8f0' }};color:{{ $page === $i ? '#fff' : '#64748b' }};background:{{ $page === $i ? '#3b82f6' : '#fff' }};">
        {{ $i }}
    </a>
    @endfor
</div>
@endif

@endsection

