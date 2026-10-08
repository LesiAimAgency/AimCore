@extends('superadmin.layouts.app')

@section('title', 'Giám Sát Website Từ Xa - VGT Control Plane')

@section('content')
<div class="space-y-6">
  <!-- Header & Breadcrumb -->
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Trung Tâm Giám Sát Website Từ Xa</h1>
      <p class="text-sm text-gray-500 mt-1">VGT Core Control Plane — Giám sát nhịp tim, phiên bản CMS, và quản lý Token bảo mật độc lập.</p>
    </div>
    <div class="flex items-center gap-3">
      <a href="{{ route('superadmin.projects.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition">
        Quản lý Dự án
      </a>
      <button onclick="location.reload()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-medium transition flex items-center gap-2 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
        Làm mới Nhịp tim
      </button>
    </div>
  </div>

  @if (session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg text-sm flex items-center gap-3">
      <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  <!-- Telemetry Metrics Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
      <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center font-bold text-xl">
        🌐
      </div>
      <div>
        <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Tổng Website</p>
        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($stats['total']) }}</h3>
      </div>
    </div>

    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
      <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center font-bold text-xl">
        🟢
      </div>
      <div>
        <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Đang Online</p>
        <h3 class="text-2xl font-bold text-emerald-600 mt-1">{{ number_format($stats['online']) }}</h3>
      </div>
    </div>

    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
      <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center font-bold text-xl">
        🔴
      </div>
      <div>
        <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Ngoại tuyến / Mất tín hiệu</p>
        <h3 class="text-2xl font-bold text-rose-600 mt-1">{{ number_format($stats['offline']) }}</h3>
      </div>
    </div>

    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
      <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xl">
        📡
      </div>
      <div>
        <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold">Sự kiện Telemetry</p>
        <h3 class="text-2xl font-bold text-indigo-600 mt-1">{{ number_format($stats['recent_logs']) }}</h3>
      </div>
    </div>
  </div>

  <!-- Search & Filter Controls -->
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
    <form method="GET" action="{{ route('superadmin.remote-websites.index') }}" class="flex flex-col md:flex-row gap-3">
      <div class="flex-1">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên website, domain, UUID hoặc Project Key..." class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>
      <div class="w-full md:w-48">
        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <option value="">-- Tất cả trạng thái --</option>
          <option value="online" {{ request('status') === 'online' ? 'selected' : '' }}>Chỉ xem Online</option>
          <option value="offline" {{ request('status') === 'offline' ? 'selected' : '' }}>Chỉ xem Offline</option>
        </select>
      </div>
      <div class="flex gap-2">
        <button type="submit" class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium transition shadow-sm">
          Lọc
        </button>
        @if (request()->hasAny(['search', 'status']))
          <a href="{{ route('superadmin.remote-websites.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition">
            Xóa lọc
          </a>
        @endif
      </div>
    </form>
  </div>

  <!-- Websites Table -->
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-sm">
        <thead>
          <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
            <th class="py-3.5 px-4">Website & Domain</th>
            <th class="py-3.5 px-4">Theme & CMS</th>
            <th class="py-3.5 px-4">Trạng thái Nhịp Tim</th>
            <th class="py-3.5 px-4">Nhịp Tim Cuối</th>
            <th class="py-3.5 px-4">Project Token</th>
            <th class="py-3.5 px-4 text-right">Thao tác Quản trị</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($projects as $project)
            @php
              $isOnline = $project->isOnline();
              $activeToken = $project->activeToken();
              $targetUrl = $project->remote_url ?: ($project->external_domain ? "https://{$project->external_domain}" : null);
              $themeSlug = $project->features['theme'] ?? 'default';
            @endphp
            <tr class="hover:bg-gray-50/80 transition">
              <!-- Name & Domain -->
              <td class="py-4 px-4">
                <div class="font-medium text-gray-900">{{ $project->name }}</div>
                <div class="flex items-center gap-2 mt-1">
                  @if ($targetUrl)
                    <a href="{{ $targetUrl }}" target="_blank" rel="noopener noreferrer" class="text-xs text-indigo-600 hover:underline flex items-center gap-1 font-mono">
                      {{ $project->external_domain ?: $project->subdomain }}
                      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                  @else
                    <span class="text-xs text-gray-400 font-mono">{{ $project->subdomain ?: 'Chưa gán domain' }}</span>
                  @endif
                </div>
                <div class="text-[11px] text-gray-400 font-mono mt-0.5">UUID: {{ $project->uuid ?: 'Chưa tạo' }}</div>
              </td>

              <!-- Theme & CMS -->
              <td class="py-4 px-4">
                <div class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-purple-50 text-purple-700 uppercase">
                  {{ $themeSlug }} {{ $project->theme_version ? 'v'.$project->theme_version : '' }}
                </div>
                <div class="text-xs text-gray-500 mt-1">
                  CMS Engine: <span class="font-medium text-gray-700">v{{ $project->cms_version ?: '2.0.0' }}</span>
                </div>
              </td>

              <!-- Status -->
              <td class="py-4 px-4">
                @if ($project->connection_status === 'revoked')
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span> Đã thu hồi Token
                  </span>
                @elseif ($isOnline)
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Đang Hoạt Động (Online)
                  </span>
                @else
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Ngoại tuyến (Offline)
                  </span>
                @endif
                @if ($project->remote_ip)
                  <div class="text-[11px] text-gray-400 font-mono mt-1">IP: {{ $project->remote_ip }}</div>
                @endif
              </td>

              <!-- Last Heartbeat -->
              <td class="py-4 px-4">
                @if ($project->last_heartbeat_at)
                  <div class="text-xs font-medium text-gray-900">{{ $project->last_heartbeat_at->diffForHumans() }}</div>
                  <div class="text-[11px] text-gray-400">{{ $project->last_heartbeat_at->format('H:i:s d/m/Y') }}</div>
                @else
                  <span class="text-xs text-gray-400 italic">Chưa nhận tín hiệu</span>
                @endif
              </td>

              <!-- Token Status -->
              <td class="py-4 px-4">
                @if ($activeToken)
                  <div class="text-xs font-mono text-gray-700 bg-gray-100 px-2 py-1 rounded inline-block">
                    {{ $activeToken->token_prefix }}...
                  </div>
                  <div class="text-[11px] text-gray-400 mt-1">Tạo: {{ $activeToken->created_at->format('d/m/Y') }}</div>
                @else
                  <span class="text-xs text-amber-600 italic">Chưa cấp Token</span>
                @endif
              </td>

              <!-- Actions -->
              <td class="py-4 px-4 text-right">
                <div class="flex items-center justify-end gap-1.5">
                  <!-- Ping button -->
                  <button type="button" onclick="pingWebsite({{ $project->id }}, this)" class="p-1.5 text-gray-600 hover:text-indigo-600 hover:bg-gray-100 rounded transition" title="Ping thử kết nối">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                  </button>

                  <!-- Rotate token button -->
                  <form method="POST" action="{{ route('superadmin.remote-websites.rotate-token', $project) }}" class="inline" onsubmit="return confirm('Bạn có chắc muốn xoay token của website này? Token cũ sẽ bị vô hiệu hóa.');">
                    @csrf
                    <button type="submit" class="p-1.5 text-gray-600 hover:text-amber-600 hover:bg-gray-100 rounded transition" title="Xoay Token bảo mật (Rotate Token)">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </button>
                  </form>

                  <!-- Revoke button -->
                  <form method="POST" action="{{ route('superadmin.remote-websites.revoke-token', $project) }}" class="inline" onsubmit="return confirm('CẢNH BÁO: Thu hồi token sẽ ngắt hoàn toàn kết nối giám sát từ xa của website này!');">
                    @csrf
                    <button type="submit" class="p-1.5 text-gray-600 hover:text-red-600 hover:bg-gray-100 rounded transition" title="Thu hồi Token / Vô hiệu hóa">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                    </button>
                  </form>

                  <!-- Detail button -->
                  <a href="{{ route('superadmin.remote-websites.show', $project) }}" class="px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded text-xs font-medium transition">
                    Chi tiết
                  </a>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="py-12 text-center text-gray-500">
                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Chưa có website con nào được đăng ký kết nối với VGT Core.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if ($projects->hasPages())
      <div class="p-4 border-t border-gray-200 bg-gray-50">
        {{ $projects->links() }}
      </div>
    @endif
  </div>
</div>

<script>
function pingWebsite(projectId, btn) {
  const original = btn.innerHTML;
  btn.disabled = true;
  btn.innerHTML = '<span class="animate-spin text-xs">⏳</span>';

  fetch(`/superadmin/remote-websites/${projectId}/ping`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json'
    }
  })
  .then(res => res.json())
  .then(data => {
    btn.disabled = false;
    btn.innerHTML = original;
    alert(data.message || (data.success ? 'Ping thành công!' : 'Ping thất bại!'));
    if (data.success) {
      location.reload();
    }
  })
  .catch(err => {
    btn.disabled = false;
    btn.innerHTML = original;
    alert('Lỗi kết nối mạng khi thực hiện ping: ' + err.message);
  });
}
</script>
@endsection
