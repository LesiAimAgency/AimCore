<!doctype html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VGT Website Application Installer | Trình Cài Đặt 19 Bước</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-neutral-950 text-neutral-100 min-h-screen flex items-center justify-center p-4">
  <div class="max-w-2xl w-full bg-neutral-900 border border-neutral-800 rounded-2xl shadow-2xl overflow-hidden p-8">
    <!-- Header -->
    <div class="flex items-center justify-between pb-6 border-b border-neutral-800 mb-6">
      <div>
        <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2">
          <span class="text-orange-500">✦</span> VGT Website Installer (19-Step)
        </h1>
        <p class="text-xs text-neutral-400 mt-1">Cài đặt Website Application độc lập với đầy đủ CMS Admin và Database riêng biệt.</p>
      </div>
      <div class="px-3 py-1 bg-orange-950/60 border border-orange-800 text-orange-400 rounded-full text-xs font-semibold uppercase">
        Theme: {{ $activeTheme }}
      </div>
    </div>

    @if($isInstalled ?? false)
      <!-- Already Installed State -->
      <div class="space-y-6">
        <div class="p-6 rounded-xl bg-emerald-950/30 border border-emerald-800/80 text-center">
          <div class="w-14 h-14 mx-auto rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-2xl font-bold mb-3 border border-emerald-500/40">
            ✓
          </div>
          <h2 class="text-lg font-bold text-white mb-1">Website đã được cài đặt và khóa bảo mật!</h2>
          <p class="text-xs text-neutral-400 mb-5">Website Application đang hoạt động hoàn toàn độc lập với database riêng.</p>

          <div class="grid grid-cols-2 gap-3 text-left text-xs bg-neutral-950/90 p-4 rounded-xl border border-neutral-800 mb-6">
            <div>
              <span class="text-neutral-500 block mb-0.5">Tiêu đề Website:</span>
              <span class="font-bold text-white text-sm">{{ $installedInfo['site_title'] ?? $installedInfo['project_name'] ?? 'Website CMS' }}</span>
            </div>
            <div>
              <span class="text-neutral-500 block mb-0.5">Router Quản Trị:</span>
              <span class="font-bold text-orange-400 text-sm font-mono">/admin</span>
            </div>
            <div>
              <span class="text-neutral-500 block mb-0.5">Database Website:</span>
              <span class="font-bold text-emerald-400 text-sm font-mono">{{ $installedInfo['database'] ?? config('database.connections.mysql.database') }}</span>
            </div>
            <div>
              <span class="text-neutral-500 block mb-0.5">Theme kích hoạt:</span>
              <span class="font-bold text-amber-400 uppercase text-sm">{{ $installedInfo['theme'] ?? $activeTheme }}</span>
            </div>
            <div class="col-span-2 pt-2 border-t border-neutral-800/80">
              <span class="text-neutral-500 block mb-0.5">Project UUID:</span>
              <span class="text-neutral-300 font-mono text-[11px] break-all">{{ $installedInfo['project_uuid'] ?? 'Đã cấp' }}</span>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ url('/') }}" class="flex-1 py-3 px-4 bg-neutral-800 hover:bg-neutral-700 text-white rounded-xl text-xs font-semibold text-center transition">
              Xem Trang Chủ Website (➔ /)
            </a>
            <a href="{{ url('/admin') }}" class="flex-1 py-3 px-4 bg-orange-600 hover:bg-orange-500 text-white rounded-xl text-xs font-bold text-center uppercase tracking-wider shadow-lg transition">
              Vào Quản Trị CMS (➔ /admin)
            </a>
          </div>
        </div>

        <div class="pt-4 border-t border-neutral-800 flex justify-between items-center text-xs">
          <span class="text-neutral-500">Cần thiết lập lại cơ sở dữ liệu khác?</span>
          <button type="button" id="btn-reset-lock" class="text-orange-400 hover:text-orange-300 font-semibold underline">
            Mở lại trình cài đặt (Re-install)
          </button>
        </div>
      </div>
    @else
      <!-- Diagnostics -->
      <div class="mb-6 bg-neutral-950/60 p-4 rounded-xl border border-neutral-800">
        <h2 class="text-xs uppercase tracking-wider text-neutral-400 font-semibold mb-3">1. Kiểm tra môi trường hosting</h2>
        <div class="grid grid-cols-2 gap-2 text-xs">
          <div class="flex items-center justify-between p-2 bg-neutral-900 rounded">
            <span>PHP 8.2+:</span>
            <span class="{{ $envCheck['php_ok'] ? 'text-green-400' : 'text-red-400' }} font-bold">
              {{ $envCheck['php_version'] }} {{ $envCheck['php_ok'] ? '✓' : '✗' }}
            </span>
          </div>
          <div class="flex items-center justify-between p-2 bg-neutral-900 rounded">
            <span>PDO MySQL:</span>
            <span class="{{ $envCheck['pdo_mysql'] ? 'text-green-400' : 'text-red-400' }} font-bold">
              {{ $envCheck['pdo_mysql'] ? 'Sẵn sàng ✓' : 'Thiếu ✗' }}
            </span>
          </div>
          <div class="flex items-center justify-between p-2 bg-neutral-900 rounded">
            <span>Storage Writable:</span>
            <span class="{{ $envCheck['storage_writable'] ? 'text-green-400' : 'text-red-400' }} font-bold">
              {{ $envCheck['storage_writable'] ? 'Ghi được ✓' : 'Không ghi được ✗' }}
            </span>
          </div>
          <div class="flex items-center justify-between p-2 bg-neutral-900 rounded">
            <span>OpenSSL & MBString:</span>
            <span class="{{ $envCheck['openssl'] && $envCheck['mbstring'] ? 'text-green-400' : 'text-red-400' }} font-bold">
              {{ $envCheck['openssl'] && $envCheck['mbstring'] ? 'Sẵn sàng ✓' : 'Thiếu ✗' }}
            </span>
          </div>
        </div>
      </div>

      <!-- Installation Form -->
      <form id="install-form" class="space-y-5">
        @csrf

        <!-- 2. THÔNG TIN WEBSITE & KẾT NỐI VGT CORE -->
        <div>
          <h2 class="text-xs uppercase tracking-wider text-neutral-400 font-semibold mb-2">2. Thông tin Website &amp; Kết nối VGT Core</h2>
          <div class="grid grid-cols-2 gap-3 text-xs">
            <div>
              <label class="block text-neutral-400 mb-1">Tên Website / Thương hiệu</label>
              <input type="text" name="site_title" id="site_title" value="Website CMS" placeholder="Ví dụ: Ehenho Dating / InBetween Studio..." required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500 font-medium">
            </div>
            <div>
              <label class="block text-neutral-400 mb-1">VGT Core Control Plane URL (Tùy chọn)</label>
              <input type="url" name="vgt_core_url" id="vgt_core_url" value="{{ env('VGT_CORE_URL', 'http://127.0.0.1:8000') }}" placeholder="https://vgt-core.example.com" class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-indigo-400 font-mono focus:outline-none focus:border-indigo-500">
            </div>
            <div class="col-span-2 p-2.5 bg-neutral-950/80 rounded border border-neutral-800 flex items-center justify-between text-[11px]">
              <div class="text-neutral-400">
                <span>Frontend:</span>
                <span class="text-emerald-400 font-mono font-semibold ml-1">/ (Trang chủ độc lập)</span>
              </div>
              <div class="text-neutral-400">
                <span>CMS Admin:</span>
                <span class="text-orange-400 font-mono font-semibold ml-1">/admin (Quản trị CMS)</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. CƠ SỞ DỮ LIỆU RIÊNG CHO WEBSITE -->
        <div>
          <h2 class="text-xs uppercase tracking-wider text-neutral-400 font-semibold mb-2">3. Cơ sở dữ liệu riêng của Website (Isolated DB)</h2>
          <div class="grid grid-cols-2 gap-3 text-xs">
            <div>
              <label class="block text-neutral-400 mb-1">DB Host</label>
              <input type="text" name="db_host" value="127.0.0.1" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500 font-mono">
            </div>
            <div>
              <label class="block text-neutral-400 mb-1">DB Port</label>
              <input type="text" name="db_port" value="3306" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500 font-mono">
            </div>
            <div>
              <label class="block text-neutral-400 mb-1">Tên Database Website</label>
              <input type="text" name="db_database" id="db_database" value="website_cms_db" placeholder="website_db" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-emerald-400 font-mono focus:outline-none focus:border-orange-500">
            </div>
            <div>
              <label class="block text-neutral-400 mb-1">DB Username</label>
              <input type="text" name="db_username" value="root" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500 font-mono">
            </div>
            <div class="col-span-2">
              <label class="block text-neutral-400 mb-1">DB Password</label>
              <input type="password" name="db_password" value="root" placeholder="Mật khẩu database (nếu có)" class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500 font-mono">
            </div>
          </div>
        </div>

        <!-- 4. TÀI KHOẢN QUẢN TRỊ CMS CỤC BỘ -->
        <div>
          <h2 class="text-xs uppercase tracking-wider text-neutral-400 font-semibold mb-2">4. Tài khoản Quản trị CMS Cục bộ (Local Website Admin)</h2>
          <div class="grid grid-cols-2 gap-3 text-xs">
            <div>
              <label class="block text-neutral-400 mb-1">Admin Username</label>
              <input type="text" name="admin_username" value="admin" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500">
            </div>
            <div>
              <label class="block text-neutral-400 mb-1">Admin Password</label>
              <input type="password" name="admin_password" value="admin123" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500">
            </div>
            <div class="col-span-2">
              <label class="block text-neutral-400 mb-1">Admin Email</label>
              <input type="email" name="admin_email" value="admin@website.local" required class="w-full bg-neutral-950 border border-neutral-700 rounded px-3 py-2 text-white focus:outline-none focus:border-orange-500">
            </div>
          </div>
        </div>

        <!-- 19-Step Progress Checklist Container (hidden initially) -->
        <div id="progress-box" class="hidden bg-neutral-950 p-4 rounded-xl border border-neutral-800 text-xs space-y-2">
          <div class="flex items-center justify-between font-semibold text-neutral-300 mb-1">
            <span>Tiến trình Cài đặt 19 Bước:</span>
            <span id="progress-percentage" class="text-orange-400">0%</span>
          </div>
          <div class="w-full bg-neutral-800 h-2 rounded-full overflow-hidden">
            <div id="progress-bar" class="bg-orange-500 h-full w-0 transition-all duration-300"></div>
          </div>
          <div id="step-log" class="text-[11px] text-neutral-400 font-mono mt-2 h-16 overflow-y-auto space-y-0.5">
            <div>Chờ khởi động quy trình...</div>
          </div>
        </div>

        <div id="install-alert" class="hidden p-3 rounded text-xs"></div>

        <div class="pt-4 flex gap-3">
          <button type="button" id="btn-test-db" class="w-1/3 py-2.5 px-4 bg-neutral-800 hover:bg-neutral-700 text-white rounded-lg text-xs font-semibold transition">
            Kiểm tra kết nối DB
          </button>
          <button type="submit" id="btn-submit-install" class="w-2/3 py-2.5 px-4 bg-orange-600 hover:bg-orange-500 text-white rounded-lg text-xs font-bold uppercase tracking-wider shadow-lg transition">
            Khởi động Cài đặt 19 Bước ➔
          </button>
        </div>
      </form>
    @endif
  </div>

  <script>
    var token = document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') : '';

    var siteTitleInput = document.getElementById('site_title');
    var dbDatabaseInput = document.getElementById('db_database');

    if (siteTitleInput && dbDatabaseInput) {
      siteTitleInput.addEventListener('input', function() {
        if (!dbDatabaseInput.dataset.modified) {
          var clean = this.value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9]/g, '_').replace(/_+/g, '_');
          dbDatabaseInput.value = (clean ? clean : 'website') + '_db';
        }
      });
      dbDatabaseInput.addEventListener('input', function() {
        this.dataset.modified = 'true';
      });
    }

    var resetBtn = document.getElementById('btn-reset-lock');
    if (resetBtn) {
      resetBtn.addEventListener('click', function() {
        if (!confirm('Bạn có chắc chắn muốn mở lại trình cài đặt để cấu hình lại Database không?')) return;
        fetch('/install/reset', {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' }
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
          if (d.success) {
            location.reload();
          } else {
            alert(d.message || 'Lỗi mở khóa');
          }
        })
        .catch(function(e) { alert('Lỗi mạng: ' + e.message); });
      });
    }

    var btnTestDb = document.getElementById('btn-test-db');
    var installAlert = document.getElementById('install-alert');

    function showAlert(msg, isSuccess) {
      if (!installAlert) return;
      installAlert.className = isSuccess
        ? 'p-3 rounded text-xs bg-emerald-950/60 border border-emerald-800 text-emerald-300'
        : 'p-3 rounded text-xs bg-rose-950/60 border border-rose-800 text-rose-300';
      installAlert.textContent = msg;
      installAlert.classList.remove('hidden');
    }

    if (btnTestDb) {
      btnTestDb.addEventListener('click', function() {
        var form = document.getElementById('install-form');
        var fd = new FormData(form);
        btnTestDb.disabled = true;
        btnTestDb.textContent = 'Đang kiểm tra...';

        fetch('/install/test-db', {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
          body: fd
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
          btnTestDb.disabled = false;
          btnTestDb.textContent = 'Kiểm tra kết nối DB';
          showAlert(d.message, d.success);
        })
        .catch(function(e) {
          btnTestDb.disabled = false;
          btnTestDb.textContent = 'Kiểm tra kết nối DB';
          showAlert('Lỗi: ' + e.message, false);
        });
      });
    }

    var form = document.getElementById('install-form');
    var submitBtn = document.getElementById('btn-submit-install');
    var progressBox = document.getElementById('progress-box');
    var progressBar = document.getElementById('progress-bar');
    var progressPct = document.getElementById('progress-percentage');
    var stepLog = document.getElementById('step-log');

    var steps19 = [
      '1. Kiểm tra môi trường hosting (PHP, PDO, Storage)',
      '2. Khởi tạo/Cấu hình database website MySQL riêng biệt',
      '3. Cấu hình môi trường ứng dụng (.env)',
      '4. Chạy migrations thiết lập cấu trúc bảng CMS',
      '5. Cài đặt CMS Engine cốt lõi',
      '6. Kích hoạt giao diện Theme',
      '7. Nhập cấu hình Theme (Colors, Typography, Layouts)',
      '8. Nhập danh mục Widgets và Master Sections',
      '9. Khởi tạo cây Menus điều hướng',
      '10. Nhập danh mục Services & Cấu trúc dịch vụ',
      '11. Nhập cấu trúc Pages tĩnh (Trang chủ, Giới thiệu, Liên hệ)',
      '12. Khởi tạo kho Media Assets & Public Storage',
      '13. Nhập dữ liệu SEO & Metadata mặc định',
      '14. Khởi tạo tài khoản Quản trị Admin cục bộ',
      '15. Sinh định danh duy nhất (UUID, Project Key, Installation ID)',
      '16. Khởi tạo Project Token bảo mật',
      '17. Đăng ký Website với VGT Core Control Plane',
      '18. Xác thực bắt tay tín hiệu từ xa',
      '19. Khóa bảo mật trình cài đặt (installed.lock)'
    ];

    if (form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (!confirm('Bắt đầu cài đặt Website Application 19 bước? Dữ liệu bảng CMS sẽ được khởi tạo vào database mới.')) return;

        var fd = new FormData(form);
        submitBtn.disabled = true;
        submitBtn.textContent = 'Đang thực thi 19 bước...';
        progressBox.classList.remove('hidden');

        var currentStep = 0;
        var stepInterval = setInterval(function() {
          if (currentStep < steps19.length) {
            var stepText = steps19[currentStep];
            var pct = Math.round(((currentStep + 1) / steps19.length) * 100);
            progressBar.style.width = pct + '%';
            progressPct.textContent = pct + '%';

            var logLine = document.createElement('div');
            logLine.textContent = '✓ ' + stepText;
            logLine.className = 'text-emerald-400';
            stepLog.appendChild(logLine);
            stepLog.scrollTop = stepLog.scrollHeight;
            currentStep++;
          }
        }, 150);

        fetch('/install/execute', {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
          body: fd
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
          clearInterval(stepInterval);
          progressBar.style.width = '100%';
          progressPct.textContent = '100%';

          if (d.success) {
            showAlert(d.message || 'Cài đặt thành công!', true);
            setTimeout(function() {
              window.location.href = d.redirect_url || '/admin';
            }, 1200);
          } else {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Thử lại ➔';
            showAlert('Lỗi: ' + (d.message || 'Không thể hoàn tất cài đặt.'), false);
          }
        })
        .catch(function(err) {
          clearInterval(stepInterval);
          submitBtn.disabled = false;
          submitBtn.textContent = 'Thử lại ➔';
          showAlert('Lỗi kết nối máy chủ: ' + err.message, false);
        });
      });
    }
  </script>
</body>
</html>
