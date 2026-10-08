@extends('superadmin.layouts.app')

@section('title', 'Chi tiết Giám sát - ' . $project->name)

@section('content')
<div class="space-y-6">
  <!-- Back button -->
  <div>
    <a href="{{ route('superadmin.remote-websites.index') }}" class="text-blue-600 hover:text-blue-700 flex items-center gap-2 text-sm font-medium">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
      Quay lại Danh sách Website Giám sát
    </a>
  </div>

  <!-- Header Card -->
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div>
        <div class="flex items-center gap-3">
          <h1 class="text-2xl font-bold text-gray-900">{{ $project->name }}</h1>
          @if ($project->isOnline())
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
              <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> ONLINE
            </span>
          @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
              <span class="w-2 h-2 rounded-full bg-gray-400"></span> OFFLINE
            </span>
          @endif
        </div>
        <p class="text-sm text-gray-500 mt-1">Domain: <a href="{{ $project->remote_url }}" target="_blank" class="text-indigo-600 hover:underline font-mono">{{ $project->external_domain ?: $project->subdomain }}</a></p>
      </div>

      <div class="flex items-center gap-2">
        <form method="POST" action="{{ route('superadmin.remote-websites.rotate-token', $project) }}" onsubmit="return confirm('Bạn có chắc muốn xoay Token cho website này?');">
          @csrf
          <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg text-sm font-medium transition shadow-sm">
            Xoay Token Mới
          </button>
        </form>
        <form method="POST" action="{{ route('superadmin.remote-websites.revoke-token', $project) }}" onsubmit="return confirm('CẢNH BÁO: Thu hồi token sẽ ngắt hoàn toàn kết nối telemetry!');">
          @csrf
          <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-sm font-medium transition shadow-sm">
            Thu Hồi Token
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Technical Specs Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
      <p class="text-xs text-gray-500 font-semibold uppercase">Project UUID</p>
      <div class="text-sm font-mono font-medium text-gray-900 mt-1 break-all">{{ $project->uuid ?: 'N/A' }}</div>
    </div>
    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
      <p class="text-xs text-gray-500 font-semibold uppercase">Theme & CMS</p>
      <div class="text-sm font-medium text-gray-900 mt-1">
        Theme: <span class="text-purple-600 font-semibold uppercase">{{ $project->features['theme'] ?? 'default' }}</span> (v{{ $project->theme_version ?: '1.0' }})<br>
        CMS Engine: <span class="text-indigo-600 font-semibold">v{{ $project->cms_version ?: '2.0.0' }}</span>
      </div>
    </div>
    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
      <p class="text-xs text-gray-500 font-semibold uppercase">Nhịp tim gần nhất</p>
      <div class="text-sm font-medium text-gray-900 mt-1">
        {{ $project->last_heartbeat_at ? $project->last_heartbeat_at->diffForHumans() : 'Chưa nhận' }}
      </div>
      <div class="text-xs text-gray-400 mt-0.5">{{ $project->last_heartbeat_at ? $project->last_heartbeat_at->format('H:i:s d/m/Y') : '' }}</div>
    </div>
    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
      <p class="text-xs text-gray-500 font-semibold uppercase">Địa chỉ IP Máy Chủ</p>
      <div class="text-sm font-mono font-medium text-gray-900 mt-1">{{ $project->remote_ip ?: 'Chưa ghi nhận' }}</div>
    </div>
  </div>

  <!-- Tokens List -->
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Danh Sách Token Bảo Mật (Project Tokens)</h3>
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-sm">
        <thead>
          <tr class="bg-gray-50 text-xs text-gray-500 uppercase font-semibold">
            <th class="py-2.5 px-3">Tên Token</th>
            <th class="py-2.5 px-3">Tiền tố Token</th>
            <th class="py-2.5 px-3">Trạng thái</th>
            <th class="py-2.5 px-3">Sử dụng gần nhất</th>
            <th class="py-2.5 px-3">Ngày cấp</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse ($project->tokens as $token)
            <tr>
              <td class="py-3 px-3 font-medium">{{ $token->name }}</td>
              <td class="py-3 px-3 font-mono text-gray-600">{{ $token->token_prefix }}...</td>
              <td class="py-3 px-3">
                @if ($token->isValid())
                  <span class="px-2 py-0.5 rounded text-xs font-semibold bg-emerald-100 text-emerald-800">Hiệu lực</span>
                @else
                  <span class="px-2 py-0.5 rounded text-xs font-semibold bg-red-100 text-red-800">Đã thu hồi</span>
                @endif
              </td>
              <td class="py-3 px-3 text-xs text-gray-600">
                {{ $token->last_used_at ? $token->last_used_at->diffForHumans() : 'Chưa sử dụng' }}
              </td>
              <td class="py-3 px-3 text-xs text-gray-500">{{ $token->created_at->format('H:i d/m/Y') }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-4 text-center text-gray-400 italic">Chưa có token nào được sinh ra cho website này.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Telemetry Event Logs -->
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Nhật Ký Tín Hiệu Telemetry & Heartbeat</h3>
    <div class="overflow-x-auto max-h-96 overflow-y-auto">
      <table class="w-full text-left border-collapse text-xs">
        <thead class="sticky top-0 bg-gray-50">
          <tr class="text-gray-500 uppercase font-semibold">
            <th class="py-2 px-3">Thời gian</th>
            <th class="py-2 px-3">Sự kiện</th>
            <th class="py-2 px-3">IP Nguồn</th>
            <th class="py-2 px-3">Mã phản hồi</th>
            <th class="py-2 px-3">Dữ liệu chi tiết</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 font-mono">
          @forelse ($recentLogs as $log)
            <tr class="hover:bg-gray-50">
              <td class="py-2 px-3 text-gray-500">{{ $log->created_at }}</td>
              <td class="py-2 px-3 font-semibold text-indigo-700">{{ $log->event_type }}</td>
              <td class="py-2 px-3 text-gray-600">{{ $log->ip_address }}</td>
              <td class="py-2 px-3">
                <span class="px-1.5 py-0.5 rounded text-[11px] {{ $log->status_code < 400 ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                  {{ $log->status_code }}
                </span>
              </td>
              <td class="py-2 px-3 text-gray-500 truncate max-w-xs" title="{{ $log->payload }}">{{ $log->payload }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-4 text-center text-gray-400 italic">Chưa có nhật ký sự kiện nào.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
