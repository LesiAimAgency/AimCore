@extends('superadmin.layouts.app')

@section('title', 'Export Config - ' . $project->name)

@section('content')
<div class="mb-6">
  <a href="{{ route('superadmin.projects.config', $project) }}" class="text-blue-600 hover:text-blue-700 flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
    </svg>
    Quay lại Config
  </a>
</div>

@php
  $themeManager = app(\App\Core\Theme\ThemeManager::class);
  $activeTheme = $themeManager->resolveActiveTheme($project);
  $validation = app(\App\Services\Export\ExportValidationService::class)->validateProject($project);
@endphp

<div class="bg-white rounded-lg shadow-sm p-6">
  <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
    <div>
      <h1 class="text-2xl font-bold">Export Configuration & Packages</h1>
      <p class="text-sm text-gray-500 mt-1">Active Theme: <span class="font-semibold text-indigo-600 uppercase">{{ $activeTheme }}</span></p>
    </div>
    <div class="flex flex-wrap items-center gap-2">
      <a href="{{ route('superadmin.projects.export.get', $project->code) }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 flex items-center gap-2 font-medium shadow-sm transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Xuất Website Độc Lập (Full Package + Installer)
      </a>
      <a href="{{ route('superadmin.themes.export', $activeTheme) }}" class="px-3.5 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 flex items-center gap-2 font-medium shadow-sm transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
        Xuất Theme ZIP (WP-Style)
      </a>
      <a href="{{ route('superadmin.projects.export-database', $project) }}" class="px-3 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 flex items-center gap-1.5 text-sm font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
        Database (.sql)
      </a>
      <button onclick="copyToClipboard()" class="px-3 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 text-sm font-medium">
        Copy JSON
      </button>
    </div>
  </div>

  <!-- Pre-flight Validation Box -->
  <div class="mb-6 rounded-xl border p-4 {{ $validation['is_valid'] ? 'bg-emerald-50/70 border-emerald-200' : 'bg-rose-50/70 border-rose-200' }}">
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center gap-2">
        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full {{ $validation['is_valid'] ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white' }} text-xs font-bold">
          {{ $validation['is_valid'] ? '✓' : '!' }}
        </span>
        <h3 class="font-bold text-sm {{ $validation['is_valid'] ? 'text-emerald-900' : 'text-rose-900' }}">
          Kiểm Tra Tiền Xuất Xưởng (Pre-flight Validation): {{ $validation['is_valid'] ? 'ĐẠT TIÊU CHUẨN XUẤT BẢN' : 'CẦN CHÚ Ý' }}
        </h3>
      </div>
      <span class="text-xs text-gray-500 font-mono">Theme: {{ $activeTheme }}</span>
    </div>

    @if(!empty($validation['errors']))
      <div class="mt-2 text-xs text-rose-700 space-y-1">
        @foreach($validation['errors'] as $err)
          <div class="flex items-center gap-1.5"><span class="font-bold">• Lỗi:</span> {{ $err }}</div>
        @endforeach
      </div>
    @endif

    @if(!empty($validation['warnings']))
      <div class="mt-2 text-xs text-amber-700 space-y-1">
        @foreach($validation['warnings'] as $warn)
          <div class="flex items-center gap-1.5"><span class="font-bold">• Lưu ý:</span> {{ $warn }}</div>
        @endforeach
      </div>
    @endif

    @if(empty($validation['errors']) && empty($validation['warnings']))
      <p class="text-xs text-emerald-700 mt-1">Toàn bộ cấu trúc giao diện, widget, database tables và route của theme đã được xác thực an toàn, sẵn sàng export sang môi trường độc lập.</p>
    @endif
  </div>

  <div class="space-y-6">
    <!-- Project Info -->
    <div class="border rounded-lg p-4">
      <h3 class="font-semibold text-lg mb-3">Project Information</h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <span class="text-sm text-gray-600">Name:</span>
          <p class="font-medium">{{ $exportData['project']['name'] }}</p>
        </div>
        <div>
          <span class="text-sm text-gray-600">Code:</span>
          <p class="font-medium">{{ $exportData['project']['code'] }}</p>
        </div>
        <div>
          <span class="text-sm text-gray-600">Status:</span>
          <p class="font-medium">{{ $exportData['project']['status'] }}</p>
        </div>
        <div>
          <span class="text-sm text-gray-600">Created:</span>
          <p class="font-medium">{{ $exportData['project']['created_at'] }}</p>
        </div>
      </div>
    </div>

    <!-- Debug Info -->
    <div class="border rounded-lg p-4 bg-yellow-50">
      <h3 class="font-semibold text-lg mb-3">Debug Information</h3>
      <div class="grid grid-cols-3 gap-4 text-sm">
        <div>
          <span class="text-gray-600">Export Time:</span>
          <p class="font-medium">{{ $exportData['debug_info']['export_time'] }}</p>
        </div>
        <div>
          <span class="text-gray-600">Export By:</span>
          <p class="font-medium">{{ $exportData['debug_info']['export_by'] }}</p>
        </div>
        <div>
          <span class="text-gray-600">Memory Usage:</span>
          <p class="font-medium">{{ round($exportData['debug_info']['memory_usage'] / 1048576, 2) }} MB</p>
        </div>
        <div>
          <span class="text-gray-600">Current File:</span>
          <p class="font-medium text-xs">{{ $exportData['debug_info']['current_file']['relative_path'] }}</p>
        </div>
        <div>
          <span class="text-gray-600">PHP Version:</span>
          <p class="font-medium">{{ $exportData['debug_info']['php_version'] }}</p>
        </div>
        <div>
          <span class="text-gray-600">Laravel Version:</span>
          <p class="font-medium">{{ $exportData['debug_info']['laravel_version'] }}</p>
        </div>
      </div>
    </div>

    <!-- File Analysis -->
    <div class="border rounded-lg p-4">
      <h3 class="font-semibold text-lg mb-3">File Analysis</h3>
      <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="bg-blue-50 p-3 rounded">
          <p class="text-sm text-gray-600">Total Files</p>
          <p class="text-2xl font-bold text-blue-600">{{ $exportData['file_analysis']['total_files'] }}</p>
        </div>
        <div class="bg-green-50 p-3 rounded">
          <p class="text-sm text-gray-600">Recent Changes</p>
          <p class="text-2xl font-bold text-green-600">{{ count($exportData['file_analysis']['recent_changes']) }}</p>
        </div>
        <div class="bg-orange-50 p-3 rounded">
          <p class="text-sm text-gray-600">Large Files</p>
          <p class="text-2xl font-bold text-orange-600">{{ count($exportData['file_analysis']['large_files']) }}</p>
        </div>
        <div class="bg-blue-50 p-3 rounded">
          <p class="text-sm text-gray-600">File Types</p>
          <p class="text-2xl font-bold text-blue-600">{{ count($exportData['file_analysis']['file_types']) }}</p>
        </div>
      </div>

      @if(count($exportData['file_analysis']['recent_changes']) > 0)
      <div class="mt-4">
        <h4 class="font-medium mb-2">Recent Changes (Last 24h)</h4>
        <div class="max-h-64 overflow-y-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-3 py-2 text-left">File</th>
                <th class="px-3 py-2 text-left">Modified</th>
                <th class="px-3 py-2 text-right">Size</th>
              </tr>
            </thead>
            <tbody>
              @foreach($exportData['file_analysis']['recent_changes'] as $change)
              <tr class="border-t">
                <td class="px-3 py-2 font-mono text-xs">{{ $change['file'] }}</td>
                <td class="px-3 py-2">{{ $change['modified'] }}</td>
                <td class="px-3 py-2 text-right">{{ number_format($change['size']) }} bytes</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>

    <!-- Eval Detection (if included) -->
    @if(isset($exportData['eval_detection']))
    <div class="border rounded-lg p-4 {{ $exportData['eval_detection']['found_eval'] ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200' }}">
      <h3 class="font-semibold text-lg mb-3">Eval Detection</h3>
      
      @if($exportData['eval_detection']['found_eval'])
        <div class="mb-4">
          <p class="text-red-800 font-medium">️ Eval usage detected in {{ count($exportData['eval_detection']['eval_files']) }} file(s)</p>
          <ul class="mt-2 space-y-1">
            @foreach($exportData['eval_detection']['eval_files'] as $file)
            <li class="text-sm text-red-700 font-mono">{{ $file }}</li>
            @endforeach
          </ul>
        </div>
      @else
        <p class="text-green-800 font-medium"> No eval usage detected</p>
      @endif

      @if(count($exportData['eval_detection']['suspicious_functions']) > 0)
      <div class="mt-4">
        <h4 class="font-medium mb-2">Suspicious Functions Found</h4>
        <div class="max-h-64 overflow-y-auto">
          @foreach($exportData['eval_detection']['suspicious_functions'] as $suspicious)
          <div class="mb-3 p-2 bg-white rounded border">
            <p class="text-sm font-medium">{{ $suspicious['file'] }}</p>
            <p class="text-xs text-gray-600">Function: <code class="bg-gray-100 px-1 rounded">{{ $suspicious['function'] }}</code></p>
            @foreach($suspicious['lines'] as $line)
            <p class="text-xs font-mono mt-1">Line {{ $line['line_number'] }}: {{ $line['content'] }}</p>
            @endforeach
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
    @endif

    <!-- Raw JSON -->
    <div class="border rounded-lg p-4">
      <h3 class="font-semibold text-lg mb-3">Raw JSON Data</h3>
      <pre id="json-data" class="bg-gray-900 text-green-400 p-4 rounded overflow-auto max-h-96 text-xs"><code>{{ json_encode($exportData, JSON_PRETTY_PRINT) }}</code></pre>
    </div>
  </div>
</div>

<script>
function copyToClipboard() {
  const jsonData = document.getElementById('json-data').textContent;
  navigator.clipboard.writeText(jsonData).then(() => {
    alert('JSON copied to clipboard!');
  });
}
</script>
@endsection
