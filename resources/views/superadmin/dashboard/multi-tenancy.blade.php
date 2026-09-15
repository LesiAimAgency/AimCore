@extends('superadmin.layouts.app')

@section('title', 'Multi-Tenancy Dashboard')
@section('page-title', 'Quản lý tất cả Projects')

@section('content')
<div class="mb-6">
  <div class="bg-gradient-to-r from-blue-600 to-blue-600 rounded-lg p-6 text-white">
    <h2 class="text-2xl font-bold mb-2">Multi-Tenancy Control Center</h2>
    <p class="opacity-90">Quản lý và giám sát tất cả {{ $projects->count() }} projects từ một nơi</p>
  </div>
</div>

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
  <div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Tổng Projects</p>
        <p class="text-3xl font-bold text-gray-900">{{ $projects->count() }}</p>
      </div>
      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Active</p>
        <p class="text-3xl font-bold text-green-600">{{ $projects->where('status', 'active')->count() }}</p>
      </div>
      <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Pending</p>
        <p class="text-3xl font-bold text-yellow-600">{{ $projects->where('status', 'pending')->count() }}</p>
      </div>
      <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-600">Hoạt động hôm nay</p>
        <p class="text-3xl font-bold text-blue-600">{{ $todayActivities }}</p>
      </div>
      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
      </div>
    </div>
  </div>
</div>

<!-- Projects Grid -->
<div class="bg-white rounded-lg shadow-sm p-6">
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
    <div>
      <h3 class="text-lg font-semibold text-gray-900">Tất cả Projects / Tenants</h3>
      <p class="text-xs text-gray-500">Quản lý CMS, triển khai và tài khoản quản trị Multi-Tenancy</p>
    </div>
    <div class="flex items-center gap-3 w-full sm:w-auto">
      <input type="text" id="searchProjects" placeholder="Tìm kiếm project..." class="px-4 py-2 border rounded-lg text-sm w-full sm:w-64 focus:ring-2 focus:ring-blue-500">
      <button type="button" onclick="openCreateAccountModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg text-sm font-semibold flex items-center gap-2 shadow-sm whitespace-nowrap transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
        + Cấp tài khoản Multi-Tenancy
      </button>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projectsGrid">
    @foreach($projects as $project)
    <div class="border rounded-lg p-6 hover:shadow-lg transition-all duration-200 project-card bg-white flex flex-col justify-between" data-name="{{ strtolower($project->name) }}" data-code="{{ strtolower($project->code) }}">
      <div>
        <div class="flex items-start justify-between mb-3">
          <div class="flex-1 mr-2">
            <h4 class="font-bold text-lg mb-0.5 text-gray-900">{{ $project->name }}</h4>
            <p class="text-xs font-mono text-blue-600 font-semibold">{{ $project->code }}</p>
          </div>
          <span class="px-2.5 py-1 text-xs font-semibold rounded-full 
            {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
            {{ $project->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
            {{ $project->status === 'assigned' ? 'bg-blue-100 text-blue-800' : '' }}">
            {{ ucfirst($project->status) }}
          </span>
        </div>

        <div class="space-y-1.5 mb-4 text-xs text-gray-600">
          <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Khách hàng: <span class="font-medium text-gray-800 ml-1">{{ $project->client_name ?? 'N/A' }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
            </svg>
            Domain: <span class="font-mono text-gray-700 ml-1">{{ $project->external_domain ?: ($project->subdomain ?: 'Chưa cấu hình') }}</span>
          </div>
          <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Hạn: <span class="font-medium text-gray-800 ml-1">{{ $project->deadline?->format('d/m/Y') ?? 'N/A' }}</span>
          </div>
        </div>

        <!-- Multi-Tenancy Account Box -->
        <div class="bg-purple-50/60 border border-purple-100 rounded-lg p-3 mb-4 flex items-center justify-between text-xs">
          <div class="truncate mr-2">
            <span class="text-purple-700 font-semibold block text-[11px] uppercase tracking-wider">Tài khoản Multi-Tenancy:</span>
            @if($project->admin || $project->project_admin_username)
              <div class="font-medium text-gray-900 flex items-center gap-1.5 mt-0.5">
                <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                <span class="font-mono font-bold">{{ $project->project_admin_username ?? $project->admin->username }}</span>
                <span class="text-gray-500 font-normal">({{ $project->admin->email ?? strtolower($project->code).'@project.local' }})</span>
              </div>
            @else
              <span class="text-amber-600 font-medium italic mt-0.5 block">Chưa cấp tài khoản quản lý</span>
            @endif
          </div>
          <button type="button" 
            onclick="openProjectAccountModal({{ $project->id }}, '{{ addslashes($project->name) }}', '{{ $project->code }}', '{{ $project->project_admin_username ?? ($project->admin->username ?? '') }}', '{{ $project->admin->email ?? strtolower($project->code).'@project.local' }}', '{{ $project->getDecryptedPassword() ?? '' }}')"
            class="px-2.5 py-1.5 bg-white hover:bg-purple-100 text-purple-700 border border-purple-200 rounded text-xs font-semibold shadow-xs flex items-center gap-1 whitespace-nowrap transition-colors"
            title="Cấp hoặc cập nhật tài khoản quản lý cho website này">
            <svg class="w-3.5 h-3.5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
            </svg>
            Tài khoản
          </button>
        </div>
      </div>

      <div>
        <div class="flex gap-2 mb-2.5">
          <a href="{{ route('project.admin.dashboard', $project->code) }}" 
            class="flex-1 px-3 py-2 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
            Vào CMS
          </a>
          <button onclick="showDeployModal({{ $project->id }}, '{{ $project->code }}', '{{ $project->external_domain ?? '' }}')" 
            class="px-3 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors" title="Deploy Lên Server">
            🚀
          </button>
          <button onclick="exportWebsite('{{ $project->code }}')" 
            class="px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors" title="Xuất Website">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
          </button>
        </div>
        <div class="flex gap-2">
          <a href="{{ route('superadmin.projects.config', $project) }}" 
            class="flex-1 px-3 py-2 bg-gray-100 text-gray-700 text-center rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
            Cấu hình
          </a>
          <a href="{{ route('superadmin.projects.show', $project) }}" 
            class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" title="Xem chi tiết">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- Recent Activities -->
<div class="bg-white rounded-lg shadow-sm p-6 mt-6">
  <h3 class="text-lg font-semibold mb-4">Hoạt động gần đây</h3>
  <div class="space-y-3">
    @forelse($recentActivities as $activity)
    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
      <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
        <span class="text-blue-600 font-bold">{{ substr($activity->user->name ?? 'U', 0, 1) }}</span>
      </div>
      <div class="flex-1">
        <p class="text-sm">
          <span class="font-semibold">{{ $activity->user->name ?? 'Unknown' }}</span>
          <span class="text-gray-600">{{ $activity->description }}</span>
        </p>
        <div class="flex items-center gap-4 mt-1 text-xs text-gray-500">
          <span>{{ $activity->created_at->diffForHumans() }}</span>
          @if($activity->project)
          <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded">{{ $activity->project->code }}</span>
          @endif
          <span>{{ $activity->ip_address }}</span>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center text-gray-500 py-8">Chưa có hoạt động nào</p>
    @endforelse
  </div>
</div>



<!-- Deploy Modal -->
<div id="deployModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
    <h3 class="text-xl font-bold mb-4">🚀 Deploy Project <span id="deployProjectCode" class="text-blue-600"></span></h3>
    <form id="deployForm" method="POST" action="">
      @csrf
      <input type="hidden" name="project_id" id="deployProjectId">
      
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Chọn Server (Hosting Profile)</label>
        <select name="hosting_profile_id" class="w-full border rounded-lg px-3 py-2" required>
          <option value="">-- Chọn Server --</option>
          @foreach($hostingProfiles ?? [] as $hp)
            <option value="{{ $hp->id }}">{{ $hp->name }} ({{ $hp->hostname }})</option>
          @endforeach
        </select>
        @if(($hostingProfiles ?? collect())->isEmpty())
          <p class="text-xs text-red-500 mt-1">Chưa có Server nào. <a href="{{ route('superadmin.hosting.create') }}" class="underline">Thêm mới</a></p>
        @endif
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tên miền (Domain)</label>
        <input type="text" name="domain" id="deployDomain" placeholder="Ví dụ: client-domain.com" class="w-full border rounded-lg px-3 py-2" required>
        <p class="text-xs text-gray-500 mt-1">Thư mục code sẽ được tự động tạo dựa trên Project Code nếu chưa có.</p>
      </div>

      <div class="flex justify-end gap-2 mt-6">
        <button type="button" onclick="closeDeployModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Hủy</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">Bắt đầu Deploy</button>
      </div>
    </form>
  </div>
</div>

<!-- Multi-Tenancy Account Modal -->
<div id="accountModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-xl shadow-2xl p-6 max-w-lg w-full">
    <div class="flex items-center justify-between border-b pb-3 mb-4">
      <div class="flex items-center gap-2">
        
        <div>
          <h3 class="text-lg font-bold text-gray-900">Cấp tài khoản Multi-Tenancy Control Center</h3>
          <p class="text-xs text-gray-500">Tài khoản có quyền quản trị website/tenant độc lập</p>
        </div>
      </div>
      <button type="button" onclick="closeAccountModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
    </div>

    <form id="accountForm" method="POST" action="{{ route('superadmin.multi-tenancy.accounts.store') }}">
      @csrf
      
      <div class="mb-4">
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Chọn Dự án / Website <span class="text-red-500">*</span></label>
        <select name="project_id" id="accountProjectId" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-500" required onchange="onProjectSelectChange(this)">
          <option value="">-- Chọn dự án --</option>
          @foreach($projects as $proj)
            <option value="{{ $proj->id }}" data-code="{{ $proj->code }}" data-name="{{ $proj->name }}" data-username="{{ $proj->project_admin_username ?? $proj->code }}">
              {{ $proj->name }} ({{ $proj->code }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
        <div>
          <label class="block text-xs font-medium text-gray-700 mb-1">Tên hiển thị <span class="text-red-500">*</span></label>
          <input type="text" name="name" id="accountName" placeholder="Admin Tên Dự Án" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-500" required>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-700 mb-1">Username <span class="text-red-500">*</span></label>
          <input type="text" name="username" id="accountUsername" placeholder="ten_du_an" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono focus:ring-2 focus:ring-purple-500" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="block text-xs font-medium text-gray-700 mb-1">Email quản trị <span class="text-red-500">*</span></label>
        <input type="email" name="email" id="accountEmail" placeholder="admin@domain.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-500" required>
      </div>

      <div class="mb-4">
        <div class="flex items-center justify-between mb-1">
          <label class="block text-xs font-medium text-gray-700">Mật khẩu truy cập <span class="text-red-500">*</span></label>
          <button type="button" onclick="generateRandomPassword()" class="text-xs text-purple-600 hover:text-purple-800 font-medium">🎲 Tạo ngẫu nhiên</button>
        </div>
        <div class="relative">
          <input type="text" name="password" id="accountPassword" placeholder="Tối thiểu 6 ký tự" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono focus:ring-2 focus:ring-purple-500" required>
        </div>
      </div>

      <div class="bg-purple-50 border border-purple-100 rounded-lg p-3 mb-5">
        <div class="flex items-center gap-2">
          <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-purple-600 text-white">
            Vai trò: Multi-Tenancy Control Center
          </span>
        </div>
        <p class="text-[11px] text-purple-800 mt-1.5 leading-relaxed">
          Tài khoản này được cấp quyền vào <strong>Multi-Tenancy Control Center</strong> và CMS riêng của website đã chọn, quản trị dữ liệu độc lập mà không cần quyền SuperAdmin hệ thống.
        </p>
      </div>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeAccountModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200 transition-colors">Đóng</button>
        <button type="submit" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg text-sm font-semibold hover:from-purple-700 hover:to-indigo-700 transition-all shadow-sm">
          Lưu & Cấp tài khoản
        </button>
      </div>
    </form>
  </div>
</div>

<script>
function openCreateAccountModal() {
  document.getElementById('accountModal').classList.remove('hidden');
  document.getElementById('accountProjectId').value = '';
  document.getElementById('accountName').value = '';
  document.getElementById('accountUsername').value = '';
  document.getElementById('accountEmail').value = '';
  generateRandomPassword();
}

function openProjectAccountModal(projectId, projectName, projectCode, existingUsername, existingEmail, existingPassword) {
  document.getElementById('accountModal').classList.remove('hidden');
  document.getElementById('accountProjectId').value = projectId;
  document.getElementById('accountName').value = 'Admin ' + projectName;
  document.getElementById('accountUsername').value = existingUsername || projectCode.toLowerCase();
  document.getElementById('accountEmail').value = existingEmail || (projectCode.toLowerCase() + '@project.local');
  if (existingPassword) {
    document.getElementById('accountPassword').value = existingPassword;
  } else {
    generateRandomPassword();
  }
}

function closeAccountModal() {
  document.getElementById('accountModal').classList.add('hidden');
}

function onProjectSelectChange(selectEl) {
  const selectedOpt = selectEl.options[selectEl.selectedIndex];
  if (selectedOpt && selectedOpt.value) {
    const code = selectedOpt.dataset.code || '';
    const name = selectedOpt.dataset.name || '';
    const username = selectedOpt.dataset.username || code.toLowerCase();
    
    if (!document.getElementById('accountName').value) {
      document.getElementById('accountName').value = 'Admin ' + name;
    }
    if (!document.getElementById('accountUsername').value) {
      document.getElementById('accountUsername').value = username;
    }
    if (!document.getElementById('accountEmail').value) {
      document.getElementById('accountEmail').value = code.toLowerCase() + '@project.local';
    }
  }
}

function generateRandomPassword() {
  const chars = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789!@#$%';
  let password = '';
  for (let i = 0; i < 10; i++) {
    password += chars.charAt(Math.floor(Math.random() * chars.length));
  }
  document.getElementById('accountPassword').value = password;
}
function showDeployModal(projectId, projectCode, existingDomain) {
  document.getElementById('deployModal').classList.remove('hidden');
  document.getElementById('deployProjectCode').textContent = projectCode;
  document.getElementById('deployProjectId').value = projectId;
  
  if (existingDomain && existingDomain !== 'null') {
    // Remove https:// or http:// if present
    let cleanDomain = existingDomain.replace(/^https?:\/\//, '');
    document.getElementById('deployDomain').value = cleanDomain;
  } else {
    document.getElementById('deployDomain').value = '';
  }

  document.getElementById('deployForm').action = `{{ url('/superadmin/multi-tenancy/projects') }}/${projectId}/deploy`;
}

function closeDeployModal() {
  document.getElementById('deployModal').classList.add('hidden');
}

let currentProjectId = null;

document.getElementById('searchProjects').addEventListener('input', function(e) {
  const search = e.target.value.toLowerCase();
  document.querySelectorAll('.project-card').forEach(card => {
    const name = card.dataset.name;
    const code = card.dataset.code;
    if (name.includes(search) || code.includes(search)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});

function exportWebsite(projectCode) {
  if (confirm('Bạn có chắc muốn xuất website cho project ' + projectCode + '?\n\nBao gồm: Full Laravel source, Database SQL, Cấu hình')) {
    showProgressModal(projectCode);
    startExportProcess(projectCode);
  }
}

function showProgressModal(projectCode) {
  const modal = document.createElement('div');
  modal.id = 'exportModal';
  modal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center';
  modal.innerHTML = '<div class="bg-white rounded-lg p-6 max-w-lg w-full mx-4">' +
    '<div class="text-center mb-4">' +
      '<h3 class="text-lg font-semibold mb-2">Đang xuất Project: ' + projectCode + '</h3>' +
      '<p class="text-sm text-gray-600">Quá trình này mất khoảng 2 phút...</p>' +
      '<div class="mt-2 text-xs text-blue-600 bg-blue-50 p-2 rounded"> Laravel CMS Export (~150MB)</div>' +
    '</div>' +
    '<div class="mb-4">' +
      '<div class="flex justify-between text-sm mb-2">' +
        '<div id="progressText">Chuẩn bị...</div>' +
        '<span id="progressPercent">0%</span>' +
      '</div>' +
      '<div class="w-full bg-gray-200 rounded-full h-4">' +
        '<div id="progressBar" class="bg-gradient-to-r from-blue-500 to-blue-600 h-4 rounded-full transition-all duration-500" style="width: 0%"></div>' +
      '</div>' +
    '</div>' +
    '<div id="progressSteps" class="text-xs text-gray-600 space-y-2">' +
      '<div id="step1" class="flex items-center p-2 rounded"><div class="w-4 h-4 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 border px-4 py-2"></div><span>25% - Chuẩn bị thư mục export</span></div>' +
      '<div id="step2" class="flex items-center p-2 rounded"><div class="w-4 h-4 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 border px-4 py-2"></div><span>50% - Copy source code (app, config, routes...)</span></div>' +
      '<div id="step3" class="flex items-center p-2 rounded"><div class="w-4 h-4 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 border px-4 py-2"></div><span>75% - Export database & migrations</span></div>' +
      '<div id="step4" class="flex items-center p-2 rounded"><div class="w-4 h-4 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 border px-4 py-2"></div><span>90% - Tạo file cấu hình (.env, deploy.sh)</span></div>' +
    '</div>' +
    '<div class="mt-4 text-xs text-gray-500 bg-gray-50 p-3 rounded">' +
      '<div class="flex justify-between mb-1"><span>File xuất:</span><span class="font-medium text-blue-600">' + projectCode + '_website.zip</span></div>' +
      '<div class="flex justify-between mb-1"><span>Bao gồm:</span><span class="font-medium">deploy.bat + deploy.sh</span></div>' +
      '<div class="flex justify-between mb-1"><span>Dung lượng:</span><span class="font-medium text-orange-600">~150MB</span></div>' +
      '<div class="flex justify-between"><span>Thời gian:</span><span class="font-medium text-orange-600">~2 phút</span></div>' +
    '</div>' +
    '<button onclick="closeExportModal()" class="mt-4 w-full px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors" disabled id="closeBtn">⏳ Đang xử lý...</button>' +
  '</div>';
  document.body.appendChild(modal);
}

function updateProgress(percent, text, step) {
  document.getElementById('progressBar').style.width = percent + '%';
  document.getElementById('progressPercent').textContent = percent + '%';
  document.getElementById('progressText').textContent = text;
  
  if (step) {
    const stepEl = document.getElementById('step' + step);
    if (stepEl) {
      const circle = stepEl.querySelector('div');
      circle.className = 'w-4 h-4 rounded-full bg-green-500 text-white text-xs mr-3 flex items-center justify-center flex-shrink-0';
      circle.innerHTML = '';
      stepEl.className = 'flex items-center p-2 rounded bg-green-50 text-green-700';
    }
  }
}

function closeExportModal() {
  const modal = document.getElementById('exportModal');
  if (modal) {
    document.body.removeChild(modal);
  }
}

function startExportProcess(projectCode) {
  const steps = [
    { percent: 25, text: 'Mốc 1: Chuẩn bị thư mục export...', step: 1, duration: 1000 },
    { percent: 50, text: 'Mốc 2: Copy toàn bộ Laravel source...', step: 2, duration: 3000 },
    { percent: 75, text: 'Mốc 3: Export database...', step: 3, duration: 1500 },
    { percent: 90, text: 'Mốc 4: Tạo file cấu hình...', step: 4, duration: 1500 }
  ];
  
  let currentStep = 0;
  
  function runStep() {
    if (currentStep < steps.length) {
      const step = steps[currentStep];
      updateProgress(step.percent, step.text, step.step);
      
      setTimeout(() => {
        currentStep++;
        runStep();
      }, step.duration);
    } else {
      updateProgress(100, 'Hoàn thành! Tạo file ZIP...', null);
      performExport(projectCode);
    }
  }
  
  runStep();
}

function performExport(projectCode) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
  
  if (!csrfToken) {
    console.error('CSRF token not found');
    updateProgress(0, 'Lỗi: CSRF token không tìm thấy', null);
    return;
  }
  
  fetch('{{ url("/superadmin/projects") }}/' + projectCode + '/export', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrfToken,
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      include_database: true,
      include_security: true
    })
  })
  .then(response => {
    if (!response.ok) {
      return response.text().then(text => {
        try {
          const data = JSON.parse(text);
          throw new Error(data.message || 'Export failed');
        } catch {
          throw new Error('HTTP ' + response.status + ': Export failed');
        }
      });
    }
    
    const contentType = response.headers.get('content-type');
    if (contentType && contentType.includes('application/json')) {
      return response.json().then(data => {
        if (data.error) {
          throw new Error(data.message || 'Export failed');
        }
        throw new Error('Unexpected JSON response');
      });
    }
    
    return response.blob();
  })
  .then(blob => {
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = projectCode + '_website.zip';
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);
    
    document.getElementById('closeBtn').disabled = false;
    document.getElementById('closeBtn').textContent = 'Đóng';
    document.getElementById('closeBtn').className = 'mt-4 w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors';
    
    updateProgress(100, 'Tải xuống thành công!', null);
  })
  .catch(error => {
    console.error('Export Error:', error);
    updateProgress(0, 'Lỗi: ' + error.message, null);
    document.getElementById('progressBar').className = 'bg-red-600 h-4 rounded-full transition-all duration-500';
    document.getElementById('closeBtn').disabled = false;
    document.getElementById('closeBtn').textContent = 'Đóng';
    document.getElementById('closeBtn').className = 'mt-4 w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors';
  });
}


</script>
@endsection
