@extends('superadmin.layouts.app')

@section('title', 'Cấu hình Project')
@section('page-title', 'Cấu hình chức năng - ' . $project->name)

@section('content')
<div class="mb-6">
  <a href="{{ route('superadmin.projects.index') }}" class="text-blue-600 hover:text-blue-700 flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Quay lại Dự án
  </a>
</div>

<div class="bg-white rounded-xl shadow-xs p-4 sm:p-6 mb-6 border border-gray-100">
  <div class="flex items-center justify-between mb-4">
    <div>
      <h3 class="text-lg sm:text-xl font-bold">{{ $project->name }}</h3>
      <p class="text-xs sm:text-sm text-gray-600">{{ $project->code }}</p>
    </div>
    <div class="flex items-center gap-3">
      <a href="#deployment-tab" class="px-3 py-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 text-xs sm:text-sm font-semibold inline-flex items-center gap-1.5 shadow-xs transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
        Triển khai & Hosting (cPanel)
      </a>
      <form method="POST" action="{{ route('superadmin.projects.deploy-vtm', $project) }}" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn Triển khai Mẫu Viettinmart (1-Click VTM)? Toàn bộ Theme, 21 Module, Menu, Widgets và Dữ liệu mẫu eCommerce sẽ được tự động cài đặt.')">
        @csrf
        <button type="submit" class="px-3 py-1.5 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 text-xs sm:text-sm font-semibold inline-flex items-center gap-1.5 shadow-xs transition-all">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          Deploy 1-Click VTM
        </button>
      </form>
      <form method="POST" action="{{ route('superadmin.projects.deploy-wkcomputer', $project) }}" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn Triển khai Mẫu WKComputer (1-Click WK)? Toàn bộ Theme Gaming, 21 Module, Menu, Widgets và 1.035 Sản phẩm linh kiện sẽ được tự động cài đặt.')">
        @csrf
        <button type="submit" class="px-3 py-1.5 bg-gradient-to-r from-rose-600 to-red-600 text-white rounded-lg hover:from-rose-700 hover:to-red-700 text-xs sm:text-sm font-semibold inline-flex items-center gap-1.5 shadow-xs transition-all">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          Deploy 1-Click WK
        </button>
      </form>
      <span class="px-3 py-1 text-xs sm:text-sm font-semibold rounded-full 
        {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
        {{ ucfirst($project->status) }}
      </span>
    </div>
  </div>
  
  @if($remoteStats)
  <div class="border-t pt-4 mt-4">
    <h4 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base">Thống kê Remote Server</h4>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
      <div class="bg-blue-50 p-3 rounded-lg">
        <p class="text-xs sm:text-sm text-gray-600">Users</p>
        <p class="text-xl sm:text-2xl font-bold text-blue-600">{{ $remoteStats['users'] ?? 0 }}</p>
      </div>
      <div class="bg-green-50 p-3 rounded-lg">
        <p class="text-xs sm:text-sm text-gray-600">Products</p>
        <p class="text-xl sm:text-2xl font-bold text-green-600">{{ $remoteStats['products'] ?? 0 }}</p>
      </div>
      <div class="bg-blue-50 p-3 rounded-lg">
        <p class="text-xs sm:text-sm text-gray-600">Orders</p>
        <p class="text-xl sm:text-2xl font-bold text-blue-600">{{ $remoteStats['orders'] ?? 0 }}</p>
      </div>
      <div class="bg-orange-50 p-3 rounded-lg">
        <p class="text-xs sm:text-sm text-gray-600">Posts</p>
        <p class="text-xl sm:text-2xl font-bold text-orange-600">{{ $remoteStats['posts'] ?? 0 }}</p>
      </div>
    </div>
  </div>
  @endif
  
  <div class="border-t pt-4 mt-4">
    <h4 class="font-semibold text-gray-700 mb-3">Thông tin Truy cập</h4>
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
      <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="flex-1">
          <p class="text-sm text-blue-800 font-medium mb-2">Hướng dẫn đăng nhập:</p>
          <ol class="text-sm text-blue-700 space-y-1 list-decimal list-inside">
            <li>Truy cập Login URL bên dưới</li>
            <li>Đăng nhập với Username và Mật khẩu ở phần "Thông tin tài khoản"</li>
            <li>Sau khi đăng nhập thành công sẽ vào Admin Panel</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-3">
      @if($project->api_token)
      <div class="border rounded-lg p-3 bg-yellow-50">
        <label class="text-sm font-medium text-gray-700">API Token (Remote Control):</label>
        <div class="flex items-center gap-2 mt-1">
          <code class="flex-1 text-xs bg-gray-900 text-green-400 p-2 rounded font-mono break-all">{{ $project->api_token }}</code>
          <button onclick="copyToClipboard('{{ $project->api_token }}')" 
              class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-xs">
            Copy
          </button>
        </div>
        <p class="text-xs text-gray-600 mt-2">Sử dụng token này để SuperAdmin control project từ xa</p>
      </div>
      @endif
      <div class="border rounded-lg p-3">
        <label class="text-sm font-medium text-gray-700">Login URL:</label>
        <div class="flex items-center gap-2 mt-1">
          <a href="{{ route('project.login', $project->code) }}" target="_blank" 
            class="flex-1 text-blue-600 hover:text-blue-700 font-mono text-sm break-all">
            {{ route('project.login', $project->code) }}
          </a>
          <button onclick="copyToClipboard('{{ route('project.login', $project->code) }}')" 
              class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-xs">
            Copy
          </button>
        </div>
      </div>
      <div class="border rounded-lg p-3 bg-gray-50">
        <label class="text-sm font-medium text-gray-700">Admin Panel (sau khi đăng nhập):</label>
        <p class="text-gray-600 font-mono text-sm mt-1 break-all">
          {{ route('project.admin.dashboard', $project->code) }}
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Khối Triển khai & Hosting (cPanel) Độc lập Full-Width -->
<div id="deployment-tab" class="w-full mb-8 bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden scroll-mt-6">
  <!-- Top Executive Gradient Header -->
  <div class="px-6 py-5 bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 text-white flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-700/60">
    <div>
      <div class="flex items-center flex-wrap gap-2 mb-1.5">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider
          {{ ($deploymentConfig['status'] ?? '') === 'CONFLICT_DETECTED' ? 'bg-amber-500/20 text-amber-300 border border-amber-500/30' : (($deploymentConfig['status'] ?? '') === 'DRIFT_DETECTED' ? 'bg-rose-500/20 text-rose-300 border border-rose-500/30' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30') }}">
          {{ $deploymentConfig['status'] ?? 'CONFIGURED' }}
        </span>
        <span class="text-xs text-slate-300 font-mono">ID: <strong>{{ $deploymentConfig['deployment_id'] ?? $project->getDeploymentId() }}</strong></span>
        <span class="text-xs text-slate-500">|</span>
        <span class="text-xs text-slate-300">Host: <strong class="text-indigo-200">{{ $deploymentConfig['cpanel']['hostname'] ?? ($hostingProfile->hostname ?? 'host236.vietnix.vn') }}</strong></span>
        <span class="text-xs text-slate-500">|</span>
        <span class="text-xs text-slate-300">IP: <strong class="text-emerald-300">{{ $deploymentConfig['cpanel']['shared_ip'] ?? ($deploymentConfig['server']['host_ip'] ?? '103.200.23.236') }}</strong></span>
      </div>
      <h3 class="text-xl font-bold flex items-center gap-2.5 text-white">
        <svg class="w-6 h-6 text-indigo-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
        Trung Tâm Cấu Hình & Triển Khai Hosting (cPanel Auto-Config)
      </h3>
      <p class="text-xs text-slate-300 mt-1 max-w-3xl leading-relaxed">
        Quản lý đồng bộ Domain, Document Root độc lập, cPanel Credentials & Quy trình Triển khai cho Kỹ thuật viên.
      </p>
    </div>
    
    <div class="flex items-center flex-wrap gap-2 shrink-0">
      <form method="POST" action="{{ route('superadmin.projects.discover-cpanel', $project) }}" class="inline">
        @csrf
        <button type="submit" class="px-3 py-2 bg-indigo-600/80 hover:bg-indigo-600 text-white rounded-lg text-xs font-semibold flex items-center gap-1.5 border border-indigo-400/30 shadow-xs transition">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          Quét cPanel
        </button>
      </form>
      <form method="POST" action="{{ route('superadmin.projects.health-check', $project) }}" class="inline">
        @csrf
        <button type="submit" class="px-3 py-2 bg-emerald-600/80 hover:bg-emerald-600 text-white rounded-lg text-xs font-semibold flex items-center gap-1.5 border border-emerald-400/30 shadow-xs transition">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          Health Check
        </button>
      </form>
    </div>
  </div>

  <div class="p-6 sm:p-8 space-y-6">
    <!-- CẢNH BÁO CỐT LÕI: KHÔNG CHIA SẺ DOCUMENT ROOT CPANEL -->
    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-xl shadow-2xs">
      <div class="flex items-start gap-3">
        <span class="text-2xl mt-0.5">⚠️</span>
        <div class="flex-1 text-xs text-amber-950 leading-relaxed">
          <strong class="font-bold text-amber-950 block text-sm mb-1">
            QUY TẮC CỐT LÕI KHI TẠO DOMAIN TRÊN CPANEL (KHÔNG SHARE DOCUMENT ROOT):
          </strong>
          <p class="mb-1 text-amber-900">
            Khi tạo Domain trên cPanel tại mục <em>cPanel &rarr; Domains &rarr; Create A New Domain</em>, bạn <strong>BẮT BUỘC BỎ CHỌN (UNCHECK)</strong> ô kiểm:
          </p>
          <div class="bg-amber-100/90 border border-amber-300 rounded px-3 py-2 font-mono text-xs text-amber-950 my-1.5 font-bold flex items-center gap-2">
            <span class="text-rose-600 text-sm">✖ [ ]</span>
            <span>Share document root (/home/fukkatsu/public_html) with “fukkatsumedia.com”.</span>
          </div>
          <p class="text-amber-800 mt-1">
            &bull; <strong>Hệ quả nếu share:</strong> Nếu bạn để tùy chọn này, tên miền mới sẽ trỏ chung vào mã nguồn chính của <code>fukkatsumedia.com</code> và không thể chạy độc lập!<br>
            &bull; <strong>Đường dẫn Document Root chuẩn:</strong> Điền đường dẫn riêng biệt cho dự án: 
            <code class="bg-white border border-amber-300 text-slate-800 font-bold px-1.5 py-0.5 rounded font-mono">{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? ('/home/fukkatsu/' . ($deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn')) }}</code>
          </p>
        </div>
      </div>
    </div>

    @if(!empty($deploymentConfig['conflict']['has_conflict']))
    <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl shadow-2xs">
      <div class="flex items-center gap-2">
        <span class="text-xl">🚨</span>
        <div class="text-xs text-rose-900">
          <strong class="font-bold text-sm block">Xung đột Tên miền phát hiện!</strong>
          Tên miền <code>{{ $deploymentConfig['domain']['name'] ?? '' }}</code> đang được sử dụng bởi dự án khác (ID: {{ $deploymentConfig['conflict']['conflicting_project_id'] ?? 'Unknown' }}). Vui lòng kiểm tra lại.
        </div>
      </div>
    </div>
    @endif

    @if(!empty($deploymentConfig['drift']['has_drift']))
    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-xl shadow-2xs">
      <div class="flex items-center gap-2">
        <span class="text-xl">⚠️</span>
        <div class="text-xs text-amber-900">
          <strong class="font-bold text-sm block">Phát hiện Lệch cấu hình giữa Server thực tế & Database (Drift Warning):</strong>
          @foreach($deploymentConfig['drift']['drifts'] ?? [] as $drift)
            <div class="mt-1 font-mono text-[11px]">&bull; {{ $drift['field'] }}: Live ({{ $drift['live'] }}) &ne; Saved ({{ $drift['saved'] }})</div>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    @if(session('health_check_result'))
    @php $hc = session('health_check_result'); @endphp
    <div class="p-4 rounded-xl border {{ ($hc['status'] ?? '') === 'HEALTHY' ? 'bg-emerald-50 border-emerald-200 text-emerald-900' : 'bg-amber-50 border-amber-200 text-amber-900' }}">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="text-lg">{{ ($hc['status'] ?? '') === 'HEALTHY' ? '✅' : '⚠️' }}</span>
          <span class="text-xs font-bold">Kết quả Health Check gần nhất: {{ $hc['message'] ?? 'OK' }}</span>
        </div>
        <span class="text-xs font-mono">HTTP: {{ $hc['http_status'] ?? 200 }} | Độ trễ: {{ $hc['latency_ms'] ?? 0 }}ms</span>
      </div>
    </div>
    @endif

    <!-- 1-Click Direct cPanel Automation Actions -->
    <div class="bg-gradient-to-r from-slate-50 to-indigo-50/50 border border-indigo-100 rounded-xl p-4">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
          <h4 class="text-xs font-bold text-indigo-950 uppercase tracking-wider flex items-center gap-1.5">
            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Tác vụ Tự Động Hóa 1-Click Trực Tiếp Lên cPanel
          </h4>
          <p class="text-[11px] text-slate-600 mt-0.5">Thực thi tự động qua API cPanel: tạo Database MySQL, cấu hình Domain độc lập và Deploy mã nguồn.</p>
        </div>
        <div class="flex items-center flex-wrap gap-2">
          <!-- Create DB Button -->
          <form method="POST" action="{{ route('superadmin.projects.create-cpanel-db', $project) }}" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn Tự động tạo Database MySQL và User riêng biệt cho dự án này trên cPanel?')">
            @csrf
            <button type="submit" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-bold flex items-center gap-1 shadow-xs transition">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
              Tạo MySQL DB trên cPanel
            </button>
          </form>

          <!-- Create Domain Button -->
          <form method="POST" action="{{ route('superadmin.projects.create-cpanel-domain', $project) }}" class="inline" onsubmit="return confirm('Tự động tạo Domain độc lập trên cPanel với Document Root riêng biệt (KHÔNG chia sẻ với fukkatsumedia.com)?')">
            @csrf
            <input type="hidden" name="domain" value="{{ $deploymentConfig['domain']['name'] ?? $project->external_domain }}">
            <input type="hidden" name="document_root" value="{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] }}">
            <button type="submit" class="px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-xs font-bold flex items-center gap-1 shadow-xs transition">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
              Tạo Domain Độc Lập cPanel
            </button>
          </form>

          <!-- Trigger Deploy Button (Interactive Live Console Stream) -->
          <form id="formTriggerDeploy" method="POST" action="{{ route('superadmin.projects.trigger-deploy', $project) }}" class="inline">
            @csrf
            <button type="button" id="btnStartDeploy" onclick="startLiveDeployment()" class="px-3.5 py-1.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white rounded-lg text-xs font-bold flex items-center gap-1.5 shadow-xs transition cursor-pointer">
              <svg id="deployIconNormal" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
              <svg id="deployIconSpinner" class="w-3.5 h-3.5 animate-spin hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
              <span id="deployBtnText">Deploy Lên Hosting cPanel</span>
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Live Deployment Console & Real-time Progress Monitor -->
    <div id="deployConsoleContainer" class="bg-slate-950 rounded-2xl border border-slate-800 shadow-2xl overflow-hidden transition-all duration-300">
      <!-- Terminal Header -->
      <div class="px-4 py-3 bg-slate-900/90 border-b border-slate-800/80 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2.5">
          <!-- Terminal window dots -->
          <div class="flex items-center gap-1.5">
            <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block shadow-xs"></span>
            <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block shadow-xs"></span>
            <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block shadow-xs"></span>
          </div>
          <span class="text-xs font-mono font-semibold text-slate-200 flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Console Giám Sát Tiến Trình Triển Khai (cPanel Deployment Terminal)
          </span>
        </div>

        <div class="flex items-center gap-2.5">
          <!-- Status Badge -->
          <span id="deployStatusBadge" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono font-bold bg-slate-800 text-slate-300 border border-slate-700">
            <span id="deployStatusDot" class="w-2 h-2 rounded-full bg-slate-400"></span>
            <span id="deployStatusLabel">SẴN SÀNG</span>
          </span>

          <!-- Deploy Progress Percentage -->
          <span id="deployProgressPercent" class="text-xs font-mono font-bold text-emerald-400 min-w-[38px] text-right">0%</span>

          <!-- Action Buttons -->
          <button type="button" onclick="loadLatestDeployLogs()" title="Tải lại log gần nhất từ hệ thống" class="px-2.5 py-1 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded text-[11px] font-mono border border-slate-700 transition flex items-center gap-1 cursor-pointer">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Reload Log
          </button>
          <button type="button" onclick="clearDeployConsole()" title="Xóa log trên màn hình console" class="px-2 py-1 bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-slate-200 rounded text-[11px] font-mono border border-slate-700 transition cursor-pointer">
            Clear
          </button>
          <a id="deployLiveUrlBtn" href="https://{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? '' }}" target="_blank" class="hidden px-2.5 py-1 bg-emerald-600 hover:bg-emerald-500 text-white rounded text-[11px] font-mono font-bold transition items-center gap-1 shadow-xs">
            <span>Truy Cập Web ↗</span>
          </a>
        </div>
      </div>

      <!-- Animated Progress Bar & Steps Tracker -->
      <div class="px-4 pt-3 pb-2.5 bg-slate-900/50 border-b border-slate-800/60">
        <!-- Progress Bar -->
        <div class="w-full bg-slate-800/80 rounded-full h-2.5 overflow-hidden p-0.5 border border-slate-700/50">
          <div id="deployProgressBar" class="bg-gradient-to-r from-indigo-500 via-blue-500 to-emerald-400 h-full rounded-full transition-all duration-500 ease-out" style="width: 0%;"></div>
        </div>

        <!-- 5-Step Progress Indicators -->
        <div class="grid grid-cols-5 gap-1.5 pt-2.5 text-[10px] font-mono">
          <div id="step-pill-1" class="text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all">
            <span class="block font-bold step-title text-slate-400">● 1. Kết Nối</span>
            <span class="text-[9px] text-slate-500 hidden sm:inline">Verify cPanel</span>
          </div>
          <div id="step-pill-2" class="text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all">
            <span class="block font-bold step-title text-slate-400">● 2. Đóng Gói</span>
            <span class="text-[9px] text-slate-500 hidden sm:inline">Export ZIP & SQL</span>
          </div>
          <div id="step-pill-3" class="text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all">
            <span class="block font-bold step-title text-slate-400">● 3. DB & Domain</span>
            <span class="text-[9px] text-slate-500 hidden sm:inline">MySQL & DocRoot</span>
          </div>
          <div id="step-pill-4" class="text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all">
            <span class="block font-bold step-title text-slate-400">● 4. Upload ZIP</span>
            <span class="text-[9px] text-slate-500 hidden sm:inline">cPanel Fileman</span>
          </div>
          <div id="step-pill-5" class="text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all">
            <span class="block font-bold step-title text-slate-400">● 5. Kích Hoạt</span>
            <span class="text-[9px] text-slate-500 hidden sm:inline">Artisan & Live</span>
          </div>
        </div>
      </div>

      <!-- Terminal Output Feed -->
      <div id="deployConsoleOutput" class="font-mono text-xs text-slate-300 p-4 max-h-72 min-h-[160px] overflow-y-auto space-y-1 select-text scroll-smooth bg-slate-950">
        <div class="text-slate-500 italic">Console sẵn sàng. Nhấn "Deploy Lên Hosting cPanel" để bắt đầu quá trình triển khai mã nguồn và cơ sở dữ liệu...</div>
      </div>
      
      <!-- Terminal Footer Bar -->
      <div class="px-4 py-2 bg-slate-900/70 border-t border-slate-800/80 flex items-center justify-between text-[11px] font-mono text-slate-400">
        <div class="flex items-center gap-2">
          <span id="deployLivePulse" class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          <span>Target: <code class="text-indigo-400 font-semibold">{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn' }}</code></span>
          <span class="text-slate-600">|</span>
          <span>DB: <code class="text-emerald-400 font-semibold">{{ $deploymentConfig['database']['name'] ?? 'fukkatsu_wkcomputer' }}</code></span>
        </div>
        <div class="text-slate-500 text-[10px]">
          Session: <span id="deploySessionId" class="text-slate-400 font-bold">--</span>
        </div>
      </div>
    </div>

    <!-- 4-Column Parameter Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <!-- Card 1: Domain -->
      <div class="p-4 bg-slate-50/80 rounded-xl border border-slate-200 hover:border-indigo-300 transition-colors">
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
            <span class="w-5 h-5 rounded bg-indigo-100 text-indigo-700 flex items-center justify-center text-xs">🌐</span>
            Tên miền xác minh
          </span>
          <button type="button" onclick="copyValue('{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? '' }}', 'Đã copy Tên miền!')" class="text-slate-400 hover:text-indigo-600 text-[11px]">Copy</button>
        </div>
        <p class="font-mono text-xs font-bold text-indigo-700 break-all">
          {{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn' }}
        </p>
        <p class="text-[11px] text-slate-500 mt-1">Loại: <span class="font-medium text-slate-700">{{ $deploymentConfig['domain']['type'] ?? 'addon_domain' }}</span></p>
      </div>

      <!-- Card 2: Document Root -->
      <div class="p-4 bg-slate-50/80 rounded-xl border border-slate-200 hover:border-indigo-300 transition-colors">
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
            <span class="w-5 h-5 rounded bg-amber-100 text-amber-700 flex items-center justify-center text-xs">📁</span>
            Document Root (Độc lập)
          </span>
          <button type="button" onclick="copyValue('{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? '' }}', 'Đã copy Document Root!')" class="text-slate-400 hover:text-indigo-600 text-[11px]">Copy</button>
        </div>
        <p class="font-mono text-[11px] font-bold text-slate-800 break-all">
          {{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? ('/home/fukkatsu/' . ($deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn')) }}
        </p>
        <p class="text-[11px] text-emerald-600 font-medium mt-1">✓ Không chia sẻ public_html</p>
      </div>

      <!-- Card 3: cPanel Host -->
      <div class="p-4 bg-slate-50/80 rounded-xl border border-slate-200 hover:border-indigo-300 transition-colors">
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
            <span class="w-5 h-5 rounded bg-purple-100 text-purple-700 flex items-center justify-center text-xs">🖥️</span>
            Máy chủ cPanel
          </span>
          <button type="button" onclick="copyValue('{{ $deploymentConfig['cpanel']['hostname'] ?? ($hostingProfile->hostname ?? '') }}', 'Đã copy cPanel Host!')" class="text-slate-400 hover:text-indigo-600 text-[11px]">Copy</button>
        </div>
        <p class="font-mono text-xs font-bold text-slate-800">
          User: <span class="text-purple-700">{{ $deploymentConfig['cpanel']['username'] ?? 'fukkatsu' }}</span> (Port {{ $deploymentConfig['cpanel']['port'] ?? 2083 }})
        </p>
        <p class="text-[11px] text-slate-500 mt-1 truncate">{{ $deploymentConfig['cpanel']['hostname'] ?? ($hostingProfile->hostname ?? 'host236.vietnix.vn') }}</p>
      </div>

      <!-- Card 4: Database MySQL -->
      <div class="p-4 bg-slate-50/80 rounded-xl border border-slate-200 hover:border-indigo-300 transition-colors">
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
            <span class="w-5 h-5 rounded bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs">🗄️</span>
            Cơ sở dữ liệu MySQL
          </span>
          <button type="button" onclick="copyValue('{{ $deploymentConfig['database']['name'] ?? '' }}', 'Đã copy Tên DB!')" class="text-slate-400 hover:text-indigo-600 text-[11px]">Copy</button>
        </div>
        <p class="font-mono text-xs font-bold text-emerald-700 break-all">
          DB: {{ $deploymentConfig['database']['name'] ?? 'fukkatsu_wkcomputer' }}
        </p>
        <p class="text-[11px] text-slate-500 mt-1">User: <code class="font-mono text-slate-700">{{ $deploymentConfig['database']['user'] ?? 'fukkatsu_wkcomp' }}</code></p>
      </div>
    </div>

    <!-- Quick Copy Toolkit Row -->
    <div class="bg-slate-50 border border-slate-200/90 rounded-xl p-3 flex flex-wrap items-center justify-between gap-2.5">
      <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
        <span>📋</span> Quick Copy Toolkit:
      </span>
      <div class="flex items-center flex-wrap gap-2">
        <button type="button" onclick="copyEnvTemplate()" class="px-2.5 py-1 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded text-xs font-medium shadow-2xs">
          Copy Mẫu .env
        </button>
        <button type="button" onclick="copyDeployCommands()" class="px-2.5 py-1 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded text-xs font-medium shadow-2xs">
          Copy Lệnh Artisan
        </button>
        <button type="button" onclick="copyValue('{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? '' }}', 'Đã copy Domain!')" class="px-2.5 py-1 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded text-xs font-medium shadow-2xs">
          Copy Domain
        </button>
        <button type="button" onclick="copyValue('{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? '' }}', 'Đã copy Document Root!')" class="px-2.5 py-1 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded text-xs font-medium shadow-2xs">
          Copy DocRoot
        </button>
        <button type="button" onclick="copyValue('{{ $deploymentConfig['database']['name'] ?? '' }}', 'Đã copy DB Name!')" class="px-2.5 py-1 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 rounded text-xs font-medium shadow-2xs">
          Copy DB Name
        </button>
        <button type="button" onclick="copyValue('{{ json_encode($deploymentConfig, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}', 'Đã copy toàn bộ JSON Config!')" class="px-2.5 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 rounded text-xs font-bold shadow-2xs">
          Copy JSON Cấu hình
        </button>
      </div>
    </div>

    <!-- 2-Column Wide Section: Technician Guide (Left) & Settings / Checklist (Right) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 pt-2">
      <!-- Left (Col 7): Technician Guide -->
      <div class="lg:col-span-7 space-y-4">
        <h4 class="text-sm font-bold text-slate-800 flex items-center gap-2">
          <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          Hướng dẫn Kỹ thuật viên Triển khai (Technician Standard Manual)
        </h4>

        <div class="border border-slate-200 rounded-xl divide-y divide-slate-200 bg-white">
          <!-- Step 1 -->
          <div class="p-4">
            <div class="flex items-center gap-2 font-bold text-xs text-slate-900 mb-1.5">
              <span class="w-5 h-5 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[10px]">1</span>
              Tạo Addon Domain / Subdomain (BẮT BUỘC BỎ SHARE DOCUMENT ROOT)
            </div>
            <p class="text-xs text-slate-600 leading-relaxed pl-7">
              Truy cập cPanel &rarr; <strong>Domains</strong> &rarr; <strong>Create A New Domain</strong>:<br>
              &bull; Domain: <code class="font-bold text-indigo-700">{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn' }}</code><br>
              &bull; <strong>Bỏ chọn (Uncheck):</strong> <em>Share document root with “fukkatsumedia.com”</em>.<br>
              &bull; Document Root: <code class="font-bold text-amber-800">{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? 'domains/wkcomputer/public' }}</code>
            </p>
          </div>

          <!-- Step 2 -->
          <div class="p-4">
            <div class="flex items-center gap-2 font-bold text-xs text-slate-900 mb-1.5">
              <span class="w-5 h-5 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[10px]">2</span>
              Khởi tạo Cơ sở dữ liệu MySQL & Gán quyền User
            </div>
            <p class="text-xs text-slate-600 leading-relaxed pl-7">
              Dự án sử dụng Database riêng biệt để đảm bảo cô lập dữ liệu (Single-Tenant Isolation):<br>
              &bull; Database Name: <code class="font-bold text-emerald-700">{{ $deploymentConfig['database']['name'] ?? 'fukkatsu_wkcomputer' }}</code><br>
              &bull; Database User: <code class="font-bold text-emerald-700">{{ $deploymentConfig['database']['user'] ?? 'fukkatsu_wkcomp' }}</code><br>
              &bull; Gán <strong>ALL PRIVILEGES</strong> cho user trên database vừa tạo (Có thể bấm nút tự động ở trên).
            </p>
          </div>

          <!-- Step 3 -->
          <div class="p-4">
            <div class="flex items-center gap-2 font-bold text-xs text-slate-900 mb-1.5">
              <span class="w-5 h-5 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[10px]">3</span>
              Đẩy Code & Thiết lập môi trường .env Chuẩn
            </div>
            <p class="text-xs text-slate-600 leading-relaxed pl-7">
              Tải file mã nguồn lên thư mục gốc triển khai và cấu hình <code>.env</code> tương ứng. Bấm <strong>Copy Mẫu .env</strong> trong thanh công cụ phía trên để dán trực tiếp.
            </p>
          </div>

          <!-- Step 4 -->
          <div class="p-4">
            <div class="flex items-center gap-2 font-bold text-xs text-slate-900 mb-1.5">
              <span class="w-5 h-5 rounded-full bg-indigo-600 text-white flex items-center justify-center text-[10px]">4</span>
              Tạo Symlink Storage & Tối ưu hóa Artisan
            </div>
            <div class="pl-7 mt-1 font-mono text-[11px] bg-slate-900 text-emerald-400 p-2.5 rounded-lg">
              php artisan storage:link<br>
              php artisan optimize:clear && php artisan optimize
            </div>
          </div>
        </div>
      </div>

      <!-- Right (Col 5): Checklist & Settings Form -->
      <div class="lg:col-span-5 space-y-5">
        <!-- Checklist Box -->
        <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-2xs">
          <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-3 flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            Checklist Kiểm tra Kỹ thuật viên
          </h4>
          <div class="space-y-2.5 text-xs text-slate-700">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
              <span>DNS Tên miền đã trỏ về IP: <strong class="font-mono text-indigo-700">{{ $deploymentConfig['cpanel']['shared_ip'] ?? '103.200.23.236' }}</strong></span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
              <span>Bỏ share document root với <code>fukkatsumedia.com</code></span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
              <span>Database MySQL & User đã tạo trên cPanel</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
              <span>Chứng chỉ SSL Let's Encrypt / AutoSSL đã kích hoạt</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
              <span>Đã liên kết Storage: <code>php artisan storage:link</code></span>
            </label>
          </div>
        </div>

        <!-- Update Deployment Form -->
        <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-2xs">
          <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-3 flex items-center gap-2">
            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Cập nhật Tên miền & Document Root
          </h4>
          <form method="POST" action="{{ route('superadmin.projects.config', $project) }}" class="space-y-3">
            @csrf
            <div>
              <label class="block text-[11px] font-semibold text-slate-700 mb-1">Tên miền triển khai (Domain):</label>
              <input type="text" name="deployment_domain" value="{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? '' }}" 
                     placeholder="wkcomputer.aimagency.vn" class="w-full border-slate-300 rounded-lg p-2 text-xs font-mono bg-white focus:ring-indigo-500 focus:border-indigo-500">
              <p class="text-[11px] text-slate-500 mt-0.5">Tên miền chính thức khi chạy trên cPanel.</p>
            </div>

            <div>
              <label class="block text-[11px] font-semibold text-slate-700 mb-1">Document Root Tùy chỉnh (Độc lập):</label>
              <input type="text" name="custom_document_root" value="{{ $deploymentConfig['domain']['document_root'] ?? $deploymentConfig['docroot'] ?? '' }}" 
                     placeholder="/home/fukkatsu/{{ $deploymentConfig['domain']['name'] ?? $project->external_domain ?? 'wkcomputer.aimagency.vn' }}" class="w-full border-slate-300 rounded-lg p-2 text-xs font-mono bg-white focus:ring-indigo-500 focus:border-indigo-500">
              <p class="text-[11px] text-amber-700 mt-0.5">Lưu ý: Không để trống thành public_html để tránh đụng độ với fukkatsumedia.com.</p>
            </div>

            <div class="flex justify-end pt-1">
              <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-bold shadow-xs transition">
                Lưu Cấu Hình Triển Khai
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Cột trái: Thông tin tài khoản -->
  <div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-bold">Thông tin tài khoản</h3>
      <button type="button" onclick="document.getElementById('resetAccountModal').classList.remove('hidden')" class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tạo / Đổi mật khẩu
      </button>
    </div>
    
    @if($users->isNotEmpty())
    <div class="space-y-3">
      @foreach($users as $user)
      <div class="border rounded-lg p-4 hover:border-blue-200 transition-colors">
        <div class="flex items-start justify-between mb-2">
          <div class="flex-1">
            <h5 class="font-semibold text-gray-900">{{ $user->name }}</h5>
            <p class="text-sm text-gray-600">{{ $user->email }}</p>
          </div>
          <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
            {{ ucfirst($user->role ?? 'user') }}
          </span>
        </div>
        <div class="grid grid-cols-2 gap-2 text-sm">
          <div>
            <span class="text-gray-500">Username:</span>
            <p class="font-mono text-gray-900">{{ $user->username }}</p>
          </div>
          <div>
            <span class="text-gray-500">Mật khẩu:</span>
            @php $plainPwd = $project->getDecryptedPassword(); @endphp
            @if($user->username == $project->project_admin_username && $plainPwd)
              <p class="font-mono text-blue-600 font-semibold">{{ $plainPwd }}</p>
            @else
              <p class="text-gray-400">***</p>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <p class="text-gray-500 text-center py-8">Chưa có tài khoản nào</p>
    @endif
  </div>

  <!-- Cột phải: Tabs -->
  <div class="bg-white rounded-lg shadow-sm p-6">
    <form method="POST" action="{{ route('superadmin.projects.config', $project) }}">
      @csrf
      
      <!-- Tab Navigation -->
      <div class="flex border-b mb-4">
        <button type="button" id="tab-btn-config" class="tab-button active px-4 py-2 border-b-2 border-blue-600 text-blue-600 font-semibold flex items-center gap-2" onclick="showTab('config', this)">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
          Cấu hình CMS
        </button>
        <button type="button" id="tab-btn-features" class="tab-button px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 flex items-center gap-2" onclick="showTab('features', this)">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
          </svg>
          Feature Packs
          @php $activeFeatureCount = count(is_array($project->cms_features) ? $project->cms_features : json_decode($project->cms_features ?? '[]', true) ?? []); @endphp
          @if($activeFeatureCount > 0)
            <span class="bg-blue-600 text-white text-xs font-bold rounded-full px-1.5 py-0.5 min-w-[20px] text-center">{{ $activeFeatureCount }}</span>
          @endif
        </button>
        <button type="button" id="tab-btn-api" class="tab-button px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 flex items-center gap-2" onclick="showTab('api', this)">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
          </svg>
          API Hub & Tích hợp
          @php
            $activeApiCount = count(array_filter($settings, fn($v, $k) => (str_starts_with($k, 'api.') || in_array($k, ['openai_key', 'vietqr_bank_id', 'momo_partner_code', 'ghn_token', 'telegram_bot_token'])) && !empty($v), ARRAY_FILTER_USE_BOTH));
          @endphp
          @if($activeApiCount > 0)
            <span class="bg-emerald-600 text-white text-xs font-bold rounded-full px-1.5 py-0.5 min-w-[20px] text-center">{{ $activeApiCount }}</span>
          @endif
        </button>
        <button type="button" id="tab-btn-history" class="tab-button px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 flex items-center gap-2" onclick="showTab('history', this)">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          Lịch sử
        </button>
      </div>
      
      <!-- Config Tab -->
      <div id="config-tab" class="tab-content">
        <div class="space-y-6 max-h-[600px] overflow-y-auto pr-2">
          
          <!-- Feature Packs are now in features-tab -->
          
          <div>
            <h4 class="font-bold text-gray-800 mb-3 flex items-center">
              <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
              </svg>
              Core Modules
            </h4>
            <div class="space-y-3">
          @foreach($systemModules as $module)
          @php $isLanguagesModule = ($module['key'] === 'settings.languages'); @endphp
          <div class="border rounded-lg p-4 hover:border-blue-300 transition-colors {{ $isLanguagesModule ? 'bg-gradient-to-r from-red-50/40 to-white border-red-200' : '' }}">
            <div class="flex items-center justify-between">
              <div class="flex-1">
                <div class="flex items-center gap-2">
                  <h5 class="font-semibold text-gray-800 mb-1">{{ $module['title'] }}</h5>
                  @if($isLanguagesModule)
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                      Cấu hình trực tiếp
                    </span>
                  @endif
                </div>
                <p class="text-sm text-gray-500">{{ $module['description'] }}</p>
              </div>
              <label class="toggle-switch ml-4">
                <input type="checkbox" name="settings[{{ $module['key'] }}]" value="1" 
                  id="{{ $isLanguagesModule ? 'toggle-settings-languages' : '' }}"
                  {{ isset($settings[$module['key']]) && $settings[$module['key']] == '1' ? 'checked' : '' }}
                  {{ $isLanguagesModule ? 'onchange="toggleLanguageConfigPanel(this.checked)"' : '' }}>
                <span class="toggle-slider"></span>
              </label>
            </div>

            @if($isLanguagesModule)
            {{-- Panel cấu hình trực tiếp đa ngôn ngữ --}}
            <div id="language-config-panel" class="{{ isset($settings[$module['key']]) && $settings[$module['key']] == '1' ? '' : 'hidden' }} mt-4 pt-4 border-t border-red-200 space-y-4">
              <div class="bg-white rounded-lg p-4 border border-red-200 shadow-xs space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-gray-100">
                  <div>
                    <h6 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                      <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                      </svg>
                      Cài đặt Ngôn ngữ & Dịch thuật của Website
                    </h6>
                    <p class="text-xs text-gray-500 mt-0.5">Chọn ngôn ngữ hỗ trợ, ngôn ngữ mặc định và tự động đồng bộ sang giao diện trang web.</p>
                  </div>
                  <label class="inline-flex items-center gap-2 cursor-pointer bg-red-50 px-3 py-1.5 rounded-lg border border-red-200 hover:bg-red-100 transition">
                    <input type="checkbox" name="multilingual_enabled" value="1" {{ ($multilingualEnabled ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                    <span class="text-xs font-bold text-red-900">Bật đa ngôn ngữ</span>
                  </label>
                </div>

                {{-- Ngôn ngữ mặc định & nhận diện --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Ngôn ngữ chính (Mặc định khi vào web):</label>
                    <select name="default_language" id="select-default-lang" class="w-full text-sm border-gray-300 rounded-lg shadow-xs focus:border-red-500 focus:ring-red-500 py-1.5" onchange="syncDefaultLanguage(this.value)">
                      @foreach(($projectLanguages ?? []) as $lang)
                        <option value="{{ $lang['code'] }}" {{ ($lang['code'] === ($defaultLanguage ?? 'vi')) ? 'selected' : '' }}>
                          {{ $lang['name'] }} ({{ strtoupper($lang['code']) }})
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Tùy chọn tự động:</label>
                    <label class="flex items-center gap-2 mt-2 cursor-pointer">
                      <input type="checkbox" name="auto_detect_language" value="1" {{ ($autoDetectLanguage ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                      <span class="text-xs text-gray-700">Tự động nhận diện ngôn ngữ theo trình duyệt khách</span>
                    </label>
                  </div>
                </div>

                {{-- Bảng danh sách ngôn ngữ --}}
                <div>
                  <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold text-gray-700">Danh sách ngôn ngữ hỗ trợ:</span>
                    <button type="button" onclick="addCustomLanguageRow()" class="text-xs text-red-600 hover:text-red-700 font-semibold flex items-center gap-1 bg-red-50 px-2 py-1 rounded border border-red-200">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                      Thêm ngôn ngữ khác
                    </button>
                  </div>

                  <div id="language-rows-container" class="space-y-2">
                    @php
                      $flags = [
                        'vi' => '🇻🇳',
                        'en' => '🇬🇧',
                        'zh' => '🇨🇳',
                        'ja' => '🇯🇵',
                        'ko' => '🇰🇷',
                        'fr' => '🇫🇷',
                        'de' => '🇩🇪',
                      ];
                    @endphp
                    @foreach(($projectLanguages ?? []) as $idx => $lang)
                    <div class="flex items-center gap-3 p-2 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100/80 transition" id="lang-row-{{ $idx }}">
                      <span class="text-base">{{ $flags[$lang['code']] ?? '🌐' }}</span>
                      
                      <div class="w-20">
                        <input type="text" name="languages[{{ $idx }}][code]" value="{{ $lang['code'] }}" class="w-full text-xs font-mono border-gray-300 rounded px-2 py-1 uppercase text-center font-bold bg-white" placeholder="CODE" readonly>
                      </div>

                      <div class="flex-1">
                        <input type="text" name="languages[{{ $idx }}][name]" value="{{ $lang['name'] }}" class="w-full text-xs border-gray-300 rounded px-2 py-1 bg-white font-medium" placeholder="Tên ngôn ngữ">
                      </div>

                      <div class="flex items-center gap-3 pr-2">
                        <label class="inline-flex items-center gap-1.5 cursor-pointer text-xs text-gray-700">
                          <input type="checkbox" name="languages[{{ $idx }}][is_active]" value="1" {{ !empty($lang['is_active']) ? 'checked' : '' }} class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                          <span>Bật</span>
                        </label>

                        <label class="inline-flex items-center gap-1.5 cursor-pointer text-xs text-gray-700">
                          <input type="radio" name="default_lang_radio" value="{{ $lang['code'] }}" {{ $lang['code'] === ($defaultLanguage ?? 'vi') ? 'checked' : '' }} onchange="setDefaultLangFromRadio('{{ $lang['code'] }}')" class="border-gray-300 text-red-600 focus:ring-red-500">
                          <span>Mặc định</span>
                        </label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

                {{-- Nút link tới trang CMS Strings & Translations --}}
                <div class="pt-2 flex items-center justify-between border-t border-gray-100 text-xs">
                  <span class="text-gray-500">Quản lý từ vựng và chuỗi giao diện chi tiết:</span>
                  <a href="{{ route('project.admin.settings.languages', $project->code) }}" target="_blank" class="inline-flex items-center gap-1 text-red-600 hover:text-red-700 font-bold bg-red-50 px-2.5 py-1 rounded border border-red-200 hover:bg-red-100 transition">
                    <span>Mở Quản lý Chuỗi dịch CMS</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                  </a>
                </div>
              </div>
            </div>
            @endif
          </div>
          @endforeach
            </div>

          </div>
        </div>
        
        <div class="border-t pt-4 mt-4">
          <label class="flex items-center gap-3 p-4 bg-blue-50 border border-blue-200 rounded-lg cursor-pointer hover:bg-blue-100 transition-colors">
            <input type="checkbox" name="sync_data" value="1" class="w-5 h-5 text-blue-600 rounded">
            <div class="flex-1">
              <span class="font-semibold text-blue-900">Đồng bộ dữ liệu từ Main DB</span>
              <p class="text-sm text-blue-700 mt-1">Copy settings, menus, widgets, posts, categories, brands từ database chính sang project database</p>
            </div>
          </label>
        </div>
        
        <div class="flex justify-end gap-3 mt-6 pt-6 border-t">
          <a href="{{ route('superadmin.projects.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Hủy</a>
          <button type="button" onclick="this.form.submit()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Lưu cấu hình</button>
        </div>
      </div>
      
      <!-- Features Tab -->
      <div id="features-tab" class="tab-content hidden">
        @php
          $currentFeatures = is_array($project->cms_features) ? $project->cms_features : json_decode($project->cms_features ?? '[]', true) ?? [];
          $currentFeatures = old('cms_features', $currentFeatures);
          $groupConfigs = config('feature_packs.groups', []);
          $groupedPacks = $featurePacks->groupBy('group_name');
          
          // Map group label -> config key for icon/color lookup
          $groupMeta = [];
          foreach ($groupConfigs as $key => $cfg) {
            $groupMeta[$cfg['label']] = [
              'icon' => $cfg['icon'] ?? '',
              'color' => $cfg['color'] ?? 'gray',
              'description' => $cfg['description'] ?? '',
            ];
          }
          $colorMap = [
            'red'  => ['bg' => 'bg-red-50',  'border' => 'border-red-200',  'title' => 'text-red-700',  'badge' => 'bg-red-100 text-red-700',  'check' => 'text-red-600'],
            'blue'  => ['bg' => 'bg-blue-50',  'border' => 'border-blue-200',  'title' => 'text-blue-700',  'badge' => 'bg-blue-100 text-blue-700',  'check' => 'text-blue-600'],
            'yellow' => ['bg' => 'bg-yellow-50', 'border' => 'border-yellow-200', 'title' => 'text-yellow-700', 'badge' => 'bg-yellow-100 text-yellow-700', 'check' => 'text-yellow-600'],
            'green' => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'title' => 'text-green-700', 'badge' => 'bg-green-100 text-green-700', 'check' => 'text-green-600'],
            'purple' => ['bg' => 'bg-purple-50', 'border' => 'border-purple-200', 'title' => 'text-purple-700', 'badge' => 'bg-purple-100 text-purple-700', 'check' => 'text-purple-600'],
            'gray'  => ['bg' => 'bg-gray-50',  'border' => 'border-gray-200',  'title' => 'text-gray-700',  'badge' => 'bg-gray-100 text-gray-700',  'check' => 'text-gray-600'],
          ];
        @endphp

        @if($featurePacks->isEmpty())
          <div class="text-center py-12">
            <div class="text-5xl mb-3"></div>
            <p class="text-gray-500 font-medium">Chưa có Feature Pack nào.</p>
            <p class="text-gray-400 text-sm mt-1">Vui lòng chạy <code class="bg-gray-100 px-1 rounded">php artisan db:seed --class=FeaturePackSeeder</code></p>
          </div>
        @else
          {{-- Summary bar --}}
          <div class="flex items-center justify-between mb-4 px-1">
            <div class="flex items-center gap-2">
              <span class="text-sm font-semibold text-gray-700">Tính năng đã kích hoạt:</span>
              <span id="feature-count-badge" class="px-2.5 py-0.5 rounded-full text-sm font-bold bg-blue-600 text-white">{{ count($currentFeatures) }}</span>
              <span class="text-sm text-gray-500">/ {{ $featurePacks->count() }}</span>
            </div>
            <button type="button" onclick="toggleAllFeatures()" class="text-xs text-blue-600 hover:text-blue-800 underline">Bỏ chọn tất cả</button>
          </div>

          <div class="space-y-4 max-h-[520px] overflow-y-auto pr-1 pb-1">
          @foreach($groupedPacks as $groupName => $packs)
            @php
              $meta = $groupMeta[$groupName] ?? ['icon' => '', 'color' => 'gray', 'description' => ''];
              $colors = $colorMap[$meta['color']] ?? $colorMap['gray'];
              $activeCount = $packs->filter(fn($p) => in_array($p->code, $currentFeatures))->count();
            @endphp
            <div class="rounded-xl border-2 {{ $colors['border'] }} {{ $colors['bg'] }} overflow-hidden">
              {{-- Group Header --}}
              <div class="flex items-center justify-between px-4 py-3 border-b {{ $colors['border'] }} bg-white/60">
                <div class="flex items-center gap-2">
                  <span class="text-xl">{{ $meta['icon'] }}</span>
                  <div>
                    <h4 class="font-bold text-sm {{ $colors['title'] }}">{{ $groupName }}</h4>
                    @if($meta['description'])
                      <p class="text-xs text-gray-500">{{ $meta['description'] }}</p>
                    @endif
                  </div>
                </div>
                <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $colors['badge'] }}">
                  {{ $activeCount }}/{{ $packs->count() }} tính năng
                </span>
              </div>

              {{-- Feature Cards --}}
              <div class="p-3 grid grid-cols-1 gap-2">
                @foreach($packs as $pack)
                  @php $isChecked = in_array($pack->code, $currentFeatures); @endphp
                  <label class="feature-card flex items-start gap-3 p-3 rounded-lg cursor-pointer border-2 transition-all duration-200 {{ $isChecked ? 'bg-white border-' . $meta['color'] . '-400 shadow-sm' : 'bg-white/50 border-transparent hover:border-gray-300 hover:bg-white' }} border"
                    id="label-{{ $pack->code }}">
                    <input type="checkbox"
                      name="cms_features[]"
                      value="{{ $pack->code }}"
                      class="feature-checkbox mt-0.5 w-4 h-4 rounded border-gray-300 {{ $colors['check'] }} focus:ring-2 border px-4 py-2"
                      {{ $isChecked ? 'checked' : '' }}
                      onchange="onFeatureChange(this, '{{ $meta['color'] }}')">
                    <div class="flex-1 min-w-0">
                      <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $pack->name }}</p>
                      @if($pack->description)
                        <p class="text-xs text-gray-500 mt-0.5 leading-relaxed">{{ $pack->description }}</p>
                      @endif
                    </div>
                    @if($isChecked)
                      <svg class="feature-check-icon w-4 h-4 {{ $colors['check'] }} shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                      </svg>
                    @else
                      <svg class="feature-check-icon w-4 h-4 text-transparent shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                      </svg>
                    @endif
                  </label>
                @endforeach
              </div>
            </div>
          @endforeach
          </div>
        @endif

        <div class="flex justify-end gap-3 mt-4 pt-4 border-t">
          <a href="{{ route('superadmin.projects.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Hủy</a>
          <button type="button" onclick="this.form.submit()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"> Lưu Feature Packs</button>
        </div>
      </div>

      <!-- API Hub Tab -->
      <div id="api-tab" class="tab-content hidden space-y-6">
        <div class="bg-gradient-to-r from-slate-900 to-indigo-950 p-5 rounded-xl text-white shadow-xs border border-slate-800">
          <div class="flex items-start justify-between">
            <div>
              <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Centralized Control Hub</span>
                <span class="text-xs text-slate-400">Dự án: <strong class="text-white">{{ $project->name }} ({{ $project->code }})</strong></span>
              </div>
              <h4 class="text-lg font-bold mt-1 text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                Quản lý Cấu hình API & Tích hợp Dịch vụ Bên thứ 3
              </h4>
              <p class="text-xs text-slate-300 mt-1 max-w-2xl leading-relaxed">
                Thiết lập tập trung API keys cho các nguồn rải rác từ SuperAdmin. Khi lưu, cấu hình sẽ được lưu vào hệ thống và tự động sẵn sàng cho các chức năng AI, Cổng thanh toán, Đơn vị vận chuyển và Webhook của website con.
              </p>
            </div>
            <span class="text-2xl">⚡</span>
          </div>
        </div>

        <div class="space-y-5 max-h-[620px] overflow-y-auto pr-1">

          <!-- 1. Remote Bridge & Connection -->
          <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs">
            <h5 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-3">
              <span class="w-6 h-6 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-xs font-bold">1</span>
              Kết nối Bridge & Remote Source (Điều khiển từ xa)
            </h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Remote Website URL (Nếu là Source độc lập):</label>
                <input type="url" name="remote_url" value="{{ $project->remote_url }}" class="w-full text-xs font-mono border-slate-300 rounded-lg px-3 py-2 bg-slate-50 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://viettinmart.vnglobaltech.com">
                <p class="text-[11px] text-slate-500 mt-1">URL trang web con khi chạy ở hosting/server độc lập (như public_html).</p>
              </div>
              <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">API Token (Bridge Secret Key):</label>
                <div class="flex items-center gap-2">
                  <input type="text" name="custom_api_token" value="{{ $project->api_token }}" class="w-full text-xs font-mono border-slate-300 rounded-lg px-3 py-2 bg-slate-50 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tự sinh hoặc dán token bí mật">
                </div>
                <label class="inline-flex items-center gap-2 mt-2 cursor-pointer">
                  <input type="checkbox" name="regenerate_api_token" value="1" class="w-3.5 h-3.5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                  <span class="text-xs text-indigo-600 font-medium">Tạo mới API Token ngẫu nhiên (64 ký tự)</span>
                </label>
              </div>
            </div>

            @if($project->remote_url)
            <div class="mt-3 p-3 bg-indigo-50/70 border border-indigo-100 rounded-lg flex items-center justify-between">
              <div class="flex items-center gap-2">
                <span class="text-sm">🔄</span>
                <span class="text-xs font-semibold text-indigo-900">Bắn cấu hình tức thì qua Bridge:</span>
                <span class="text-xs text-indigo-700 font-mono">{{ $project->remote_url }}/api/bridge</span>
              </div>
              <label class="inline-flex items-center gap-2 cursor-pointer bg-white px-3 py-1 rounded-md border border-indigo-200">
                <input type="checkbox" name="sync_api_to_remote" value="1" checked class="w-3.5 h-3.5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                <span class="text-xs font-bold text-indigo-900">Gửi qua Bridge khi bấm Lưu</span>
              </label>
            </div>
            @endif
          </div>

          <!-- 2. AI Providers -->
          <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs">
            <h5 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs font-bold">2</span>
              Trí tuệ nhân tạo (AI Providers & Models)
            </h5>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">OpenAI API Key:</label>
                <div class="relative">
                  <input type="password" id="api_openai_key" name="api[openai_key]" value="{{ $settings['api.openai_key'] ?? ($settings['openai_key'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded-lg px-3 py-2 pr-8 bg-slate-50 focus:bg-white focus:ring-emerald-500 focus:border-emerald-500" placeholder="sk-proj-...">
                  <button type="button" onclick="togglePasswordVisibility('api_openai_key')" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  </button>
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Dùng cho AI Content Writer, SEO Meta Generator.</p>
              </div>

              <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Gemini API Key:</label>
                <div class="relative">
                  <input type="password" id="api_gemini_key" name="api[gemini_key]" value="{{ $settings['api.gemini_key'] ?? ($settings['gemini_key'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded-lg px-3 py-2 pr-8 bg-slate-50 focus:bg-white focus:ring-emerald-500 focus:border-emerald-500" placeholder="AIzaSy...">
                  <button type="button" onclick="togglePasswordVisibility('api_gemini_key')" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  </button>
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Google Gemini 1.5 Flash / Pro API.</p>
              </div>

              <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Model mặc định:</label>
                @php $selectedModel = $settings['api.ai_default_model'] ?? ($settings['ai_default_model'] ?? 'gpt-4o-mini'); @endphp
                <select name="api[ai_default_model]" class="w-full text-xs border-slate-300 rounded-lg px-3 py-2 bg-slate-50 focus:bg-white focus:ring-emerald-500 focus:border-emerald-500">
                  <option value="gpt-4o-mini" {{ $selectedModel === 'gpt-4o-mini' ? 'selected' : '' }}>OpenAI - GPT-4o Mini (Khuyên dùng - Nhanh & Rẻ)</option>
                  <option value="gpt-4o" {{ $selectedModel === 'gpt-4o' ? 'selected' : '' }}>OpenAI - GPT-4o (Thông minh nhất)</option>
                  <option value="gemini-1.5-flash" {{ $selectedModel === 'gemini-1.5-flash' ? 'selected' : '' }}>Google - Gemini 1.5 Flash</option>
                  <option value="gemini-1.5-pro" {{ $selectedModel === 'gemini-1.5-pro' ? 'selected' : '' }}>Google - Gemini 1.5 Pro</option>
                </select>
                <p class="text-[11px] text-slate-400 mt-1">Model ưu tiên khi gọi sinh bài viết tự động.</p>
              </div>
            </div>
          </div>

          <!-- 3. Payment Gateways -->
          <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs">
            <h5 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-3">
              <span class="w-6 h-6 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-bold">3</span>
              Cổng thanh toán trực tuyến (Payment Gateways)
            </h5>

            <!-- VietQR -->
            <div class="mb-4 pb-4 border-b border-slate-100">
              <div class="flex items-center gap-2 mb-2">
                <span class="text-xs font-bold text-slate-900 bg-blue-50 text-blue-700 px-2 py-0.5 rounded border border-blue-200">VietQR Ngân Hàng</span>
                <span class="text-xs text-slate-500">Tạo mã QR động cho khách thanh toán chuyển khoản</span>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                <div>
                  <label class="block text-[11px] font-semibold text-slate-700 mb-1">Mã ngân hàng (BIN / Code):</label>
                  <input type="text" name="api[vietqr_bank_id]" value="{{ $settings['api.vietqr_bank_id'] ?? ($settings['vietqr_bank_id'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1.5 uppercase" placeholder="MB, VCB, TCB...">
                </div>
                <div>
                  <label class="block text-[11px] font-semibold text-slate-700 mb-1">Số tài khoản:</label>
                  <input type="text" name="api[vietqr_account_no]" value="{{ $settings['api.vietqr_account_no'] ?? ($settings['vietqr_account_no'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1.5" placeholder="0123456789">
                </div>
                <div>
                  <label class="block text-[11px] font-semibold text-slate-700 mb-1">Tên chủ tài khoản:</label>
                  <input type="text" name="api[vietqr_account_name]" value="{{ $settings['api.vietqr_account_name'] ?? ($settings['vietqr_account_name'] ?? '') }}" class="w-full text-xs border-slate-300 rounded px-2.5 py-1.5 uppercase" placeholder="NGUYEN VAN A">
                </div>
                <div>
                  <label class="block text-[11px] font-semibold text-slate-700 mb-1">Template QR:</label>
                  @php $qrTpl = $settings['api.vietqr_template'] ?? ($settings['vietqr_template'] ?? 'compact2'); @endphp
                  <select name="api[vietqr_template]" class="w-full text-xs border-slate-300 rounded px-2.5 py-1.5">
                    <option value="compact2" {{ $qrTpl === 'compact2' ? 'selected' : '' }}>compact2 (540×640)</option>
                    <option value="compact" {{ $qrTpl === 'compact' ? 'selected' : '' }}>compact (540×540)</option>
                    <option value="qr_only" {{ $qrTpl === 'qr_only' ? 'selected' : '' }}>qr_only (Chỉ QR)</option>
                    <option value="print" {{ $qrTpl === 'print' ? 'selected' : '' }}>print (Đầy đủ)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- MoMo & VNPay -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- MoMo -->
              <div class="p-3 bg-pink-50/50 border border-pink-100 rounded-lg">
                <span class="text-xs font-bold text-pink-700 block mb-2">Ví điện tử MoMo</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Partner Code:</label>
                    <input type="text" name="api[momo_partner_code]" value="{{ $settings['api.momo_partner_code'] ?? ($settings['momo_partner_code'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="MOMO_PARTNER_CODE">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Access Key:</label>
                    <input type="text" name="api[momo_access_key]" value="{{ $settings['api.momo_access_key'] ?? ($settings['momo_access_key'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="Access Key">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Secret Key:</label>
                    <input type="password" name="api[momo_secret_key]" value="{{ $settings['api.momo_secret_key'] ?? ($settings['momo_secret_key'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="Secret Key">
                  </div>
                </div>
              </div>

              <!-- VNPay -->
              <div class="p-3 bg-blue-50/50 border border-blue-100 rounded-lg">
                <span class="text-xs font-bold text-blue-700 block mb-2">Cổng VNPay</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">TMN Code (Merchant Code):</label>
                    <input type="text" name="api[vnpay_tmn_code]" value="{{ $settings['api.vnpay_tmn_code'] ?? ($settings['vnpay_tmn_code'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="VNPAY_TMN_CODE">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Hash Secret:</label>
                    <input type="password" name="api[vnpay_hash_secret]" value="{{ $settings['api.vnpay_hash_secret'] ?? ($settings['vnpay_hash_secret'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="Hash Secret Key">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- 4. Shipping Carriers -->
          <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs">
            <h5 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-3">
              <span class="w-6 h-6 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center text-xs font-bold">4</span>
              Đơn vị vận chuyển (Shipping Carriers)
            </h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="p-3 bg-orange-50/40 border border-orange-100 rounded-lg">
                <span class="text-xs font-bold text-orange-800 block mb-2">Giao Hàng Nhanh (GHN)</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">API Token:</label>
                    <input type="password" name="api[ghn_token]" value="{{ $settings['api.ghn_token'] ?? ($settings['ghn_token'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="GHN API Token">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Shop ID:</label>
                    <input type="text" name="api[ghn_shop_id]" value="{{ $settings['api.ghn_shop_id'] ?? ($settings['ghn_shop_id'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="Shop ID">
                  </div>
                </div>
              </div>

              <div class="p-3 bg-emerald-50/40 border border-emerald-100 rounded-lg">
                <span class="text-xs font-bold text-emerald-800 block mb-2">Giao Hàng Tiết Kiệm (GHTK)</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">API Token:</label>
                    <input type="password" name="api[ghtk_token]" value="{{ $settings['api.ghtk_token'] ?? ($settings['ghtk_token'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="GHTK API Token">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- 5. Notifications & Webhooks -->
          <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs">
            <h5 class="text-sm font-bold text-slate-800 flex items-center gap-2 mb-3">
              <span class="w-6 h-6 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-xs font-bold">5</span>
              Thông báo & Webhooks (Telegram Bot & Outbound Webhook)
            </h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="p-3 bg-sky-50/40 border border-sky-100 rounded-lg">
                <span class="text-xs font-bold text-sky-800 block mb-2">Telegram Báo đơn hàng</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Bot Token:</label>
                    <input type="password" name="api[telegram_bot_token]" value="{{ $settings['api.telegram_bot_token'] ?? ($settings['telegram_bot_token'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="123456789:ABC-DEF1234ghIkl-zyx57W2v1u123ew11">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Chat ID / Group ID:</label>
                    <input type="text" name="api[telegram_chat_id]" value="{{ $settings['api.telegram_chat_id'] ?? ($settings['telegram_chat_id'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="-1001234567890">
                  </div>
                </div>
              </div>

              <div class="p-3 bg-purple-50/40 border border-purple-100 rounded-lg">
                <span class="text-xs font-bold text-purple-800 block mb-2">Outbound Webhook (Bắn dữ liệu sang CRM ngoài)</span>
                <div class="space-y-2">
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Webhook URL:</label>
                    <input type="url" name="api[webhook_url]" value="{{ $settings['api.webhook_url'] ?? ($settings['webhook_url'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="https://external-crm.com/api/webhooks/orders">
                  </div>
                  <div>
                    <label class="block text-[11px] font-medium text-slate-600 mb-0.5">Secret Key / Signing Token:</label>
                    <input type="password" name="api[webhook_secret]" value="{{ $settings['api.webhook_secret'] ?? ($settings['webhook_secret'] ?? '') }}" class="w-full text-xs font-mono border-slate-300 rounded px-2.5 py-1" placeholder="Secret Key để verify chữ ký">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="flex justify-end gap-3 mt-4 pt-4 border-t">
          <a href="{{ route('superadmin.projects.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50 text-xs font-medium">Hủy</a>
          <button type="submit" class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg hover:from-indigo-700 hover:to-blue-700 text-xs font-bold flex items-center gap-1.5 shadow-xs">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Lưu Cấu Hình API Hub
          </button>
        </div>
      </div>
    </form>


    <!-- History Tab -->
    <div id="history-tab" class="tab-content hidden">
      <div class="mb-4 flex flex-wrap gap-2 items-center justify-between">
        <div class="flex gap-2">
          <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2" onclick="refreshHistory()">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
          Refresh
        </button>
        <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center gap-2" onclick="if(confirm('Bạn có chắc chắn muốn xóa toàn bộ log của dự án này?')) document.getElementById('delete-logs-form').submit();">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
          </svg>
          Xóa Logs
        </button>
        <form id="delete-logs-form" action="{{ route('superadmin.projects.delete-logs', $project) }}" method="POST" class="hidden">
          @csrf
          @method('DELETE')
        </form>
        </div>
        <div class="flex items-center gap-3 bg-gray-50 px-3 py-2 rounded-lg border">
          <span class="text-sm font-medium text-gray-700 whitespace-nowrap">Khoảng thời gian:</span>
          <input type="date" id="history-start-date" class="border border-gray-300 rounded-md px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500" title="Từ ngày">
          <span class="text-gray-400">-</span>
          <input type="date" id="history-end-date" class="border border-gray-300 rounded-md px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500" title="Đến ngày">
          <button type="button" onclick="loadHistory()" class="px-3 py-1 bg-gray-600 text-white rounded-md text-sm hover:bg-gray-700 transition-colors">Lọc</button>
          <button type="button" onclick="document.getElementById('history-start-date').value=''; document.getElementById('history-end-date').value=''; loadHistory();" class="text-xs text-gray-500 hover:text-red-500">Xóa lọc</button>
        </div>
      </div>
      
      <div id="history-content">
        <div class="text-center py-8">
          <div class="spinner-border" role="status"></div>
          <p class="text-gray-500 mt-2">Đang tải lịch sử...</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reset Account -->
<div id="resetAccountModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <div class="flex justify-between items-center mb-4">
      <h4 class="text-lg font-bold">Tạo / Đổi mật khẩu</h4>
      <button onclick="document.getElementById('resetAccountModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>
    <form method="POST" action="{{ route('superadmin.projects.reset-admin', $project) }}">
      @csrf
      <div class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Tên đăng nhập</label>
          <input type="text" name="username" value="{{ $project->code }}" required class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" name="email" value="{{ 'admin@' . $project->code . '.com' }}" required class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu mới</label>
          <input type="password" name="password" required minlength="6" class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="pt-4 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('resetAccountModal').classList.add('hidden')" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">Hủy</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Lưu thay đổi</button>
        </div>
      </div>
    </form>
  </div>
</div>

<style>
.toggle-switch {
  position: relative;
  display: inline-block;
  width: 48px;
  height: 24px;
}

.toggle-switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.toggle-slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #cbd5e1;
  transition: .3s;
  border-radius: 24px;
}

.toggle-slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: .3s;
  border-radius: 50%;
}

input:checked + .toggle-slider {
  background-color: #7c3aed;
}

input:checked + .toggle-slider:before {
  transform: translateX(24px);
}

.toggle-slider:hover {
  background-color: #94a3b8;
}

input:checked + .toggle-slider:hover {
  background-color: #6d28d9;
}
</style>

<script>
// Utility functions
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(() => {
    alert('Đã copy link!');
  });
}

function showNotification(message, type = 'info') {
  const existing = document.querySelectorAll('.notification-toast');
  existing.forEach(n => n.remove());
  
  const colors = {
    success: 'bg-green-100 border-green-200 text-green-800',
    error: 'bg-red-100 border-red-200 text-red-800',
    warning: 'bg-yellow-100 border-yellow-200 text-yellow-800',
    info: 'bg-blue-100 border-blue-200 text-blue-800'
  };
  
  const notification = document.createElement('div');
  notification.className = `notification-toast fixed top-4 right-4 ${colors[type]} border rounded-lg p-4 shadow-lg z-50 max-w-sm`;
  notification.innerHTML = `
    <div class="flex items-start">
      <div class="flex-1 text-sm font-medium">${message}</div>
      <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-gray-400 hover:text-gray-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
  `;
  
  document.body.appendChild(notification);
  
  setTimeout(() => {
    if (notification.parentNode) {
      notification.remove();
    }
  }, 5000);
}

function showProcessingStatus(step, message, progress = null) {
  const statusHtml = `
    <div class="text-center py-8">
      <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-100 to-blue-100 text-blue-800 rounded-lg mb-4 shadow-sm">
        <svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <div class="text-left">
          <div class="font-semibold">Bước ${step}: ${message}</div>
          ${progress ? `<div class="text-xs mt-1 opacity-75">${progress}</div>` : ''}
        </div>
      </div>
      <div class="space-y-2 text-sm text-gray-600">
        <div class="flex items-center justify-center space-x-4">
          <div class="flex items-center ${step >= 1 ? 'text-green-600' : 'text-gray-400'}">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Kết nối API
          </div>
          <div class="flex items-center ${step >= 2 ? 'text-green-600' : 'text-gray-400'}">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Nhận dữ liệu
          </div>
          <div class="flex items-center ${step >= 3 ? 'text-green-600' : 'text-gray-400'}">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Xử lý & hiển thị
          </div>
        </div>
      </div>
    </div>
  `;
  
  document.getElementById('history-content').innerHTML = statusHtml;
}

function getMethodColor(method) {
  const colors = {
    'GET': 'bg-blue-100 text-blue-800',
    'POST': 'bg-green-100 text-green-800',
    'PUT': 'bg-yellow-100 text-yellow-800',
    'PATCH': 'bg-orange-100 text-orange-800',
    'DELETE': 'bg-red-100 text-red-800'
  };
  return colors[method] || 'bg-gray-100 text-gray-800';
}

function getTimeAgo(date) {
  const now = new Date();
  const diffInSeconds = Math.floor((now - date) / 1000);
  
  if (diffInSeconds < 60) return 'Vừa xong';
  if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' phút trước';
  if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' giờ trước';
  if (diffInSeconds < 2592000) return Math.floor(diffInSeconds / 86400) + ' ngày trước';
  
  return date.toLocaleDateString('vi-VN');
}

// Tab management
function showTab(tabName, btnEl) {
  document.querySelectorAll('.tab-content').forEach(tab => {
    tab.classList.add('hidden');
  });
  
  document.querySelectorAll('.tab-button').forEach(btn => {
    btn.classList.remove('active', 'border-blue-600', 'text-blue-600', 'font-semibold');
    btn.classList.add('border-transparent', 'text-gray-500');
  });
  
  document.getElementById(tabName + '-tab').classList.remove('hidden');
  
  // Use the passed button element (fixes SVG child click issue)
  var activeBtn = btnEl || document.getElementById('tab-btn-' + tabName);
  if (activeBtn) {
    activeBtn.classList.add('active', 'border-blue-600', 'text-blue-600', 'font-semibold');
    activeBtn.classList.remove('border-transparent', 'text-gray-500');
  }
  
  if (tabName === 'history') {
    loadHistory();
  }
}

// Feature Pack toggle
function onFeatureChange(checkbox, colorKey) {
  var label = checkbox.closest('label');
  var icon = label.querySelector('.feature-check-icon');
  var borderColorMap = {
    'red': 'border-red-400', 'blue': 'border-blue-400',
    'yellow': 'border-yellow-400', 'green': 'border-green-400',
    'purple': 'border-purple-400', 'gray': 'border-gray-400'
  };
  var iconColorMap = {
    'red': 'text-red-600', 'blue': 'text-blue-600',
    'yellow': 'text-yellow-600', 'green': 'text-green-600',
    'purple': 'text-purple-600', 'gray': 'text-gray-600'
  };
  
  if (checkbox.checked) {
    label.classList.add('bg-white', 'shadow-sm', borderColorMap[colorKey] || 'border-blue-400');
    label.classList.remove('bg-white/50', 'border-transparent');
    if (icon) {
      icon.classList.remove('text-transparent');
      icon.classList.add(iconColorMap[colorKey] || 'text-blue-600');
    }
  } else {
    label.classList.remove('bg-white', 'shadow-sm', borderColorMap[colorKey] || 'border-blue-400');
    label.classList.add('bg-white/50', 'border-transparent');
    if (icon) {
      icon.classList.add('text-transparent');
      icon.classList.remove(iconColorMap[colorKey] || 'text-blue-600');
    }
  }
  
  // Update count badge
  var total = document.querySelectorAll('.feature-checkbox:checked').length;
  var badge = document.getElementById('feature-count-badge');
  if (badge) badge.textContent = total;
}

// Toggle all feature checkboxes
var allFeaturesSelected = false;
function toggleAllFeatures() {
  allFeaturesSelected = !allFeaturesSelected;
  document.querySelectorAll('.feature-checkbox').forEach(cb => {
    if (cb.checked !== allFeaturesSelected) {
      cb.checked = allFeaturesSelected;
      onFeatureChange(cb, cb.closest('[data-color]')?.dataset.color || 'blue');
    }
  });
  var btn = event.target;
  btn.textContent = allFeaturesSelected ? 'Bỏ chọn tất cả' : 'Chọn tất cả';
}

// History management
function loadHistory() {
  console.log('Loading history for project: {{ $project->code }}');
  
  let url = '/superadmin/file-monitor?project={{ $project->code }}';
  const startDate = document.getElementById('history-start-date');
  const endDate = document.getElementById('history-end-date');
  
  if (startDate && startDate.value && endDate && endDate.value) {
    if (new Date(startDate.value) > new Date(endDate.value)) {
      alert('Lỗi: Ngày bắt đầu không được lớn hơn ngày kết thúc!');
      return;
    }
  }

  if (startDate && startDate.value) {
    url += '&start_date=' + startDate.value;
  }
  if (endDate && endDate.value) {
    url += '&end_date=' + endDate.value;
  }
  
  showProcessingStatus(1, 'Khởi tạo kết nối', 'Đang quét file log: storage/logs/file-changes-{{ $project->code }}.log');
  
  fetch(url, {
    headers: {
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    }
  })
  .then(response => {
    console.log('Response status:', response.status);
    showProcessingStatus(2, 'Nhận dữ liệu thành công', `API Status: ${response.status} - Đang parse JSON response...`);
    return response.json();
  })
  .then(data => {
    console.log('History data:', data);
    showProcessingStatus(3, 'Xử lý dữ liệu', `Tổng số logs: ${data.total || (data.logs ? data.logs.length : 0)} - Đang format hiển thị...`);
    
    const logs = data.logs || data || [];
    console.log('Processed logs:', logs);
    
    setTimeout(() => {
      if (logs && logs.length > 0) {
        displayLogs(logs);
      } else {
        showEmptyState();
      }
    }, 800);
  })
  .catch(error => {
    console.error('Error loading history:', error);
    showErrorState(error);
  });
}

function displayLogs(logs) {
  let historyHtml = '<div class="space-y-3 max-h-[500px] overflow-y-auto">';
  
  logs.forEach(log => {
    const date = new Date(log.timestamp);
    const timeAgo = getTimeAgo(date);
    
    historyHtml += `
      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors">
        <div class="flex items-start justify-between mb-2">
          <div class="flex-1">
            <h5 class="font-semibold text-gray-900">${log.action || 'Thay đổi'}</h5>
            <p class="text-sm text-gray-600">${log.route || log.url}</p>
          </div>
          <span class="px-2 py-1 text-xs font-semibold rounded-full ${getMethodColor(log.method)}">
            ${log.method}
          </span>
        </div>
        <div class="flex items-center justify-between text-sm text-gray-500">
          <span class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            ${log.user_name || 'Khách'} ${log.user_email ? `(${log.user_email})` : ''}
          </span>
          <span class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            ${date.toLocaleString('vi-VN')} <span class="text-xs text-gray-400">(${timeAgo})</span>
          </span>
        </div>
        ${log.data_summary && Object.keys(log.data_summary).length > 0 ? `
          <div class="mt-3 p-2 bg-gray-100 rounded text-xs overflow-x-auto whitespace-pre-wrap max-h-32">
            <strong>Dữ liệu:</strong> ${
              Object.entries(log.data_summary).map(([key, value]) => `<br/>- <b>${key}:</b> ${value}`).join('')
            }
          </div>
        ` : ''}
      </div>
    `;
  });
  
  historyHtml += '</div>';
  
  const summaryHtml = `
    <div class="mb-6 grid grid-cols-3 gap-4">
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          <div>
            <p class="text-sm font-medium text-blue-900">Tổng số logs</p>
            <p class="text-2xl font-bold text-blue-600">${logs.length}</p>
          </div>
        </div>
      </div>
      <div class="bg-green-50 border border-green-200 rounded-lg p-4">
        <div class="flex items-center">
          <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <div>
            <p class="text-sm font-medium text-green-900">Log mới nhất</p>
            <p class="text-sm font-bold text-green-600">${getTimeAgo(new Date(logs[0].timestamp))}</p>
          </div>
        </div>
      </div>
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
          <div>
            <p class="text-sm font-medium text-blue-900">Project</p>
            <p class="text-sm font-bold text-blue-600">{{ $project->code }}</p>
          </div>
        </div>
      </div>
    </div>
  `;
  
  document.getElementById('history-content').innerHTML = summaryHtml + historyHtml;
  showNotification(' Đã tải thành công ' + logs.length + ' log entries', 'success');
}

function showEmptyState() {
  document.getElementById('history-content').innerHTML = `
    <div class="text-center py-12">
      <div class="mb-4">
        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
      </div>
      <h3 class="text-lg font-medium text-gray-900 mb-2">Chưa có lịch sử chỉnh sửa</h3>
      <p class="text-sm text-gray-500 mb-4">Các thay đổi sẽ được ghi lại tự động khi bạn thực hiện các hành động.</p>
      
      <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 max-w-md mx-auto">
        <div class="flex items-start">
          <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
          </svg>
          <div class="text-left">
            <h4 class="text-sm font-medium text-yellow-800">Để tạo log mẫu:</h4>
            <ul class="mt-2 text-xs text-yellow-700 space-y-1">
              <li>• Thực hiện thay đổi cấu hình</li>
              <li>• Tạo/sửa sản phẩm, bài viết</li>
              <li>• Hoặc <a href="/superadmin/test-logging" target="_blank" class="underline">test logging</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  `;
  
  showNotification('ℹ️ Không tìm thấy log nào cho project này', 'info');
}

function showErrorState(error) {
  document.getElementById('history-content').innerHTML = `
    <div class="text-center py-8">
      <div class="bg-red-50 border border-red-200 rounded-lg p-6 max-w-md mx-auto">
        <div class="text-red-600 mb-4">
          <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
          </svg>
        </div>
        <h3 class="text-lg font-medium text-red-900 mb-2">Lỗi tải lịch sử</h3>
        <p class="text-red-700 mb-4">${error.message}</p>
        
        <div class="flex gap-2">
          <button onclick="loadHistory()" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
             Thử lại
          </button>
          <a href="/superadmin/debug-history" target="_blank" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">
             Debug
          </a>
        </div>
      </div>
    </div>
  `;
  
  showNotification(' Lỗi tải lịch sử: ' + error.message, 'error');
}

function refreshHistory() {
  showNotification(' Đang refresh lịch sử...', 'info');
  loadHistory();
}

// Export menu management
function toggleExportMenu() {
  const menu = document.getElementById('export-menu');
  if (menu) menu.classList.toggle('hidden');
}

// Close export menu when clicking outside
document.addEventListener('click', function(event) {
  const menu = document.getElementById('export-menu');
  const button = event.target.closest('button');
  if (menu && (!button || !button.onclick || button.onclick.toString().indexOf('toggleExportMenu') === -1)) {
    menu.classList.add('hidden');
  }
});

// Direct Multi-Language Configuration Helpers
function toggleLanguageConfigPanel(isChecked) {

  const panel = document.getElementById('language-config-panel');
  if (panel) {
    if (isChecked) {
      panel.classList.remove('hidden');
    } else {
      panel.classList.add('hidden');
    }
  }
}

function syncDefaultLanguage(val) {
  const radios = document.querySelectorAll('input[name="default_lang_radio"]');
  radios.forEach(r => {
    r.checked = (r.value === val);
  });
}

function setDefaultLangFromRadio(val) {
  const select = document.getElementById('select-default-lang');
  if (select) {
    select.value = val;
  }
}

let customLangIdx = {{ count($projectLanguages ?? []) }};
function addCustomLanguageRow() {
  const container = document.getElementById('language-rows-container');
  if (!container) return;

  const row = document.createElement('div');
  row.className = 'flex items-center gap-3 p-2 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100/80 transition animate-fadeIn';
  row.id = `lang-row-${customLangIdx}`;
  row.innerHTML = `
    <span class="text-base">🌐</span>
    <div class="w-20">
      <input type="text" name="languages[${customLangIdx}][code]" class="w-full text-xs font-mono border-gray-300 rounded px-2 py-1 uppercase text-center font-bold bg-white" placeholder="CODE" required onchange="this.value = this.value.toLowerCase().trim(); updateDefaultSelectOption(this.value);">
    </div>
    <div class="flex-1">
      <input type="text" name="languages[${customLangIdx}][name]" class="w-full text-xs border-gray-300 rounded px-2 py-1 bg-white font-medium" placeholder="Tên ngôn ngữ" required>
    </div>
    <div class="flex items-center gap-3 pr-2">
      <label class="inline-flex items-center gap-1.5 cursor-pointer text-xs text-gray-700">
        <input type="checkbox" name="languages[${customLangIdx}][is_active]" value="1" checked class="rounded border-gray-300 text-red-600 focus:ring-red-500">
        <span>Bật</span>
      </label>
      <button type="button" onclick="document.getElementById('lang-row-${customLangIdx}').remove()" class="text-gray-400 hover:text-red-500 p-1" title="Xóa">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>
  `;
  container.appendChild(row);
  customLangIdx++;
}

function updateDefaultSelectOption(code) {
  if (!code) return;
  const select = document.getElementById('select-default-lang');
  if (!select) return;
  let exists = false;
  for (let i = 0; i < select.options.length; i++) {
    if (select.options[i].value === code) {
      exists = true;
      break;
    }
  }
  if (!exists) {
    const opt = document.createElement('option');
    opt.value = code;
    opt.textContent = code.toUpperCase();
    select.appendChild(opt);
  }
}

function togglePasswordVisibility(id) {
  const input = document.getElementById(id);
  if (input) {
    input.type = (input.type === 'password') ? 'text' : 'password';
  }
}

function copyValue(val, successMsg) {
  if (!val) {
    if (typeof showNotification === 'function') {
      showNotification('Không có giá trị để copy', 'warning');
    } else {
      alert('Không có giá trị để copy');
    }
    return;
  }
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(val).then(() => {
      if (typeof showNotification === 'function') {
        showNotification(successMsg || 'Đã sao chép vào bộ nhớ tạm!', 'success');
      } else {
        alert(successMsg || 'Đã sao chép!');
      }
    }).catch(() => {
      fallbackCopy(val, successMsg);
    });
  } else {
    fallbackCopy(val, successMsg);
  }
}

function fallbackCopy(val, successMsg) {
  const textarea = document.createElement('textarea');
  textarea.value = val;
  textarea.style.position = 'fixed';
  textarea.style.opacity = '0';
  document.body.appendChild(textarea);
  textarea.select();
  try {
    document.execCommand('copy');
    if (typeof showNotification === 'function') {
      showNotification(successMsg || 'Đã sao chép!', 'success');
    } else {
      alert(successMsg || 'Đã sao chép!');
    }
  } catch (err) {
    alert('Không thể sao chép: ' + err);
  }
  document.body.removeChild(textarea);
}

function copyEnvTemplate() {
  const envText = `APP_NAME="{{ addslashes($project->name) }}"
APP_ENV=production
APP_DEBUG=false
APP_URL="https://{{ $deploymentConfig['domain']['name'] ?? 'example.com' }}"

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="{{ $deploymentConfig['database']['name'] ?? 'db_name' }}"
DB_USERNAME="{{ $deploymentConfig['database']['user'] ?? 'db_user' }}"
DB_PASSWORD="YOUR_DB_PASSWORD"

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

PROJECT_ID={{ $project->id }}
TENANT_ID={{ $project->tenant_id ?? $project->id }}
PROJECT_CODE="{{ $project->code }}"
`;
  copyValue(envText, 'Đã copy mẫu .env chuẩn xác!');
}

function copyDeployCommands() {
  const path = '{{ $deploymentConfig['domain']['deployment_path'] ?? '.' }}';
  const cmds = `cd ${path}
php artisan migrate --force
php artisan storage:link
php artisan optimize
`;
  copyValue(cmds, 'Đã copy lệnh triển khai Artisan!');
}

// =========================================================================
// CPANEL LIVE DEPLOYMENT CONSOLE & PROGRESS MONITOR
// =========================================================================
let deployPollTimer = null;
let isDeploying = false;
let displayedLogCount = 0;

function updateDeployProgress(percent, label, theme = 'info') {
  const bar = document.getElementById('deployProgressBar');
  const percentEl = document.getElementById('deployProgressPercent');
  const badge = document.getElementById('deployStatusBadge');
  const dot = document.getElementById('deployStatusDot');
  const labelEl = document.getElementById('deployStatusLabel');

  if (bar) bar.style.width = Math.min(100, Math.max(0, percent)) + '%';
  if (percentEl) percentEl.textContent = Math.round(percent) + '%';

  if (badge && labelEl && dot) {
    labelEl.textContent = label;
    if (theme === 'running') {
      badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono font-bold bg-amber-950/70 text-amber-300 border border-amber-800/80 shadow-xs';
      dot.className = 'w-2 h-2 rounded-full bg-amber-400 animate-ping';
    } else if (theme === 'success') {
      badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono font-bold bg-emerald-950/70 text-emerald-300 border border-emerald-800/80 shadow-xs';
      dot.className = 'w-2 h-2 rounded-full bg-emerald-400';
    } else if (theme === 'error') {
      badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono font-bold bg-rose-950/70 text-rose-300 border border-rose-800/80 shadow-xs';
      dot.className = 'w-2 h-2 rounded-full bg-rose-400';
    } else {
      badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono font-bold bg-slate-800 text-slate-300 border border-slate-700';
      dot.className = 'w-2 h-2 rounded-full bg-slate-400';
    }
  }
}

function updateStepPills(currentStepNum) {
  for (let i = 1; i <= 5; i++) {
    const pill = document.getElementById(`step-pill-${i}`);
    if (!pill) continue;
    const title = pill.querySelector('.step-title');

    if (i < currentStepNum) {
      // Completed step
      pill.className = 'text-center text-emerald-300 py-1.5 px-1 rounded bg-emerald-950/40 border border-emerald-800/60 transition-all';
      if (title) title.className = 'block font-bold step-title text-emerald-400';
    } else if (i === currentStepNum) {
      // Active current step
      pill.className = 'text-center text-indigo-200 py-1.5 px-1 rounded bg-indigo-950/60 border border-indigo-500 shadow-xs ring-1 ring-indigo-400/30 transition-all';
      if (title) title.className = 'block font-bold step-title text-indigo-300 animate-pulse';
    } else {
      // Pending step
      pill.className = 'text-center text-slate-500 py-1.5 px-1 rounded bg-slate-900/60 border border-slate-800/60 transition-all';
      if (title) title.className = 'block font-bold step-title text-slate-400';
    }
  }
}

function clearDeployConsole() {
  const output = document.getElementById('deployConsoleOutput');
  if (output) {
    output.innerHTML = '<div class="text-slate-500 italic">Màn hình console đã được dọn sạch.</div>';
  }
  displayedLogCount = 0;
}

function appendConsoleLog(level, message, timeStr = null) {
  const output = document.getElementById('deployConsoleOutput');
  if (!output) return;

  const now = new Date();
  const time = timeStr || (
    String(now.getHours()).padStart(2, '0') + ':' +
    String(now.getMinutes()).padStart(2, '0') + ':' +
    String(now.getSeconds()).padStart(2, '0')
  );

  let badgeColor = 'text-sky-400';
  let badgeText = '[INFO]';
  let msgColor = 'text-slate-300';

  if (level === 'success') {
    badgeColor = 'text-emerald-400 font-bold';
    badgeText = '[SUCCESS]';
    msgColor = 'text-emerald-200';
  } else if (level === 'error') {
    badgeColor = 'text-rose-400 font-bold';
    badgeText = '[ERROR]';
    msgColor = 'text-rose-200';
  } else if (level === 'warning') {
    badgeColor = 'text-amber-400 font-bold';
    badgeText = '[WARN]';
    msgColor = 'text-amber-200';
  }

  const logRow = document.createElement('div');
  logRow.className = 'flex items-start gap-2 hover:bg-slate-900/60 px-1 py-0.5 rounded transition-colors';
  logRow.innerHTML = `
    <span class="text-slate-500 select-none">[${time}]</span>
    <span class="${badgeColor} select-none">${badgeText}</span>
    <span class="${msgColor} flex-1 break-words">${escapeHtml(message)}</span>
  `;

  output.appendChild(logRow);
  output.scrollTop = output.scrollHeight;
}

function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');
}

async function startLiveDeployment() {
  if (isDeploying) return;

  if (!confirm('Kích hoạt Triển khai (Deploy) toàn bộ mã nguồn dự án lên Hosting cPanel?')) {
    return;
  }

  isDeploying = true;
  const btn = document.getElementById('btnStartDeploy');
  const iconNormal = document.getElementById('deployIconNormal');
  const iconSpinner = document.getElementById('deployIconSpinner');
  const btnText = document.getElementById('deployBtnText');
  const output = document.getElementById('deployConsoleOutput');
  const liveUrlBtn = document.getElementById('deployLiveUrlBtn');

  if (btn) btn.disabled = true;
  if (iconNormal) iconNormal.classList.add('hidden');
  if (iconSpinner) iconSpinner.classList.remove('hidden');
  if (btnText) btnText.textContent = 'Đang triển khai cPanel...';
  if (liveUrlBtn) liveUrlBtn.classList.add('hidden');

  // Scroll to console
  const consoleContainer = document.getElementById('deployConsoleContainer');
  if (consoleContainer) {
    consoleContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  // Reset Console
  if (output) output.innerHTML = '';
  displayedLogCount = 0;
  updateDeployProgress(5, 'ĐANG KHỞI CHẠY...', 'running');
  updateStepPills(1);

  appendConsoleLog('info', '🚀 Bắt đầu phiên triển khai dự án lên hosting cPanel...');
  appendConsoleLog('info', 'Đang thiết lập kết nối API cPanel và chuẩn bị snapshot cơ sở dữ liệu...');

  // Start polling
  if (deployPollTimer) clearInterval(deployPollTimer);
  deployPollTimer = setInterval(() => {
    pollDeployLogs();
  }, 1500);

  try {
    const response = await fetch("{{ route('superadmin.projects.trigger-deploy', $project) }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });

    const data = await response.json();
    if (deployPollTimer) clearInterval(deployPollTimer);

    if (response.ok && data.success) {
      if (data.logs && Array.isArray(data.logs)) {
        renderReceivedLogs(data.logs);
      }
      
      updateDeployProgress(100, 'HOÀN TẤT', 'success');
      updateStepPills(6);

      if (data.history_id) {
        const sessEl = document.getElementById('deploySessionId');
        if (sessEl) sessEl.textContent = '#' + data.history_id;
      }

      appendConsoleLog('success', '🎉 Triển khai thành công! Mã nguồn và Database đã đồng bộ hoàn chỉnh trên cPanel.');
      if (data.deployed_url) {
        appendConsoleLog('success', `🌐 URL Website: ${data.deployed_url}`);
        if (liveUrlBtn) {
          liveUrlBtn.href = data.deployed_url;
          liveUrlBtn.classList.remove('hidden');
          liveUrlBtn.classList.add('inline-flex');
        }
      }

      if (typeof showNotification === 'function') {
        showNotification(data.message || 'Triển khai cPanel hoàn tất thành công!', 'success');
      }
    } else {
      updateDeployProgress(100, 'THẤT BẠI', 'error');
      const errMsg = data.message || 'Quá trình triển khai gặp sự cố.';
      appendConsoleLog('error', `❌ Lỗi: ${errMsg}`);
      if (typeof showNotification === 'function') {
        showNotification(errMsg, 'error');
      }
    }
  } catch (err) {
    if (deployPollTimer) clearInterval(deployPollTimer);
    updateDeployProgress(100, 'THẤT BẠI', 'error');
    appendConsoleLog('error', `❌ Lỗi kết nối mạng: ${err.message}`);
  } finally {
    isDeploying = false;
    if (btn) btn.disabled = false;
    if (iconNormal) iconNormal.classList.remove('hidden');
    if (iconSpinner) iconSpinner.classList.add('hidden');
    if (btnText) btnText.textContent = 'Deploy Lên Hosting cPanel';
  }
}

async function pollDeployLogs() {
  try {
    const res = await fetch("{{ route('superadmin.projects.deploy-logs', $project) }}", {
      headers: { 'Accept': 'application/json' }
    });
    if (!res.ok) return;
    const data = await res.json();
    if (data.history_id) {
      const sessEl = document.getElementById('deploySessionId');
      if (sessEl) sessEl.textContent = '#' + data.history_id;
    }
    if (data.logs && Array.isArray(data.logs)) {
      renderReceivedLogs(data.logs);
      estimateProgressFromLogs(data.logs, data.status);
    }
  } catch (e) {
    // Ignore polling network blips
  }
}

function renderReceivedLogs(logs) {
  if (logs.length <= displayedLogCount) return;
  for (let i = displayedLogCount; i < logs.length; i++) {
    const l = logs[i];
    appendConsoleLog(l.level || l.status || 'info', l.message, l.time);
  }
  displayedLogCount = logs.length;
}

function estimateProgressFromLogs(logs, status) {
  if (status === 'success') {
    updateDeployProgress(100, 'HOÀN TẤT', 'success');
    updateStepPills(6);
    return;
  }
  if (status === 'failed') {
    updateDeployProgress(100, 'THẤT BẠI', 'error');
    return;
  }

  let maxStep = 1;
  logs.forEach(l => {
    if (l.step_number && l.step_number > maxStep) {
      maxStep = l.step_number;
    }
  });

  const stepMapping = {
    1: { percent: 15, label: 'KẾT NỐI CPANEL...', pill: 1 },
    2: { percent: 35, label: 'ĐÓNG GÓI MÃ NGUỒN...', pill: 2 },
    3: { percent: 55, label: 'CẤU HÌNH DB & DOMAIN...', pill: 3 },
    4: { percent: 75, label: 'UPLOAD SOURCE ZIP...', pill: 4 },
    5: { percent: 90, label: 'GIẢI NÉN & CẤU HÌNH...', pill: 5 },
    6: { percent: 95, label: 'BOOTSTRAP ARTISAN...', pill: 5 },
    7: { percent: 100, label: 'HOÀN TẤT', pill: 6 }
  };

  const info = stepMapping[maxStep] || { percent: Math.min(85, maxStep * 15), label: 'ĐANG XỬ LÝ...', pill: Math.min(5, maxStep) };
  updateDeployProgress(info.percent, info.label, 'running');
  updateStepPills(info.pill);
}

async function loadLatestDeployLogs() {
  try {
    const res = await fetch("{{ route('superadmin.projects.deploy-logs', $project) }}", {
      headers: { 'Accept': 'application/json' }
    });
    if (!res.ok) return;
    const data = await res.json();
    if (data.status === 'idle' || !data.logs || data.logs.length === 0) {
      return;
    }

    const output = document.getElementById('deployConsoleOutput');
    if (output) output.innerHTML = '';
    displayedLogCount = 0;

    if (data.history_id) {
      const sessEl = document.getElementById('deploySessionId');
      if (sessEl) sessEl.textContent = '#' + data.history_id + (data.completed_at ? ` (${data.completed_at})` : '');
    }

    renderReceivedLogs(data.logs);

    const liveUrlBtn = document.getElementById('deployLiveUrlBtn');
    if (data.status === 'success') {
      updateDeployProgress(100, 'HOÀN TẤT', 'success');
      updateStepPills(6);
      if (data.deployed_url && liveUrlBtn) {
        liveUrlBtn.href = data.deployed_url;
        liveUrlBtn.classList.remove('hidden');
        liveUrlBtn.classList.add('inline-flex');
      }
    } else if (data.status === 'failed') {
      updateDeployProgress(100, 'THẤT BẠI', 'error');
      if (data.error_message) {
        appendConsoleLog('error', `Chi tiết lỗi: ${data.error_message}`);
      }
    } else if (data.status === 'running') {
      estimateProgressFromLogs(data.logs, 'running');
    }
  } catch (err) {
    console.error('Không thể nạp deploy logs:', err);
  }
}

// Automatically load latest logs on page load
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', loadLatestDeployLogs);
} else {
  loadLatestDeployLogs();
}
</script>

@endsection
