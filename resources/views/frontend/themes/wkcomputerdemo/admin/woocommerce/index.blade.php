@extends('admin.layouts.app')

@section('title', 'Đồng bộ WooCommerce')

@section('content')
<div class="container-fluid">
    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#config-tab">
                <i class="fas fa-cog"></i> Cấu hình
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#sync-tab">
                <i class="fas fa-sync"></i> Đồng bộ API
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#logs-tab" id="logs-tab-link">
                <i class="fas fa-list"></i> Lịch sử
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-success fw-semibold" href="{{ route('admin.woocommerce-csv.index') }}">
                <i class="fas fa-file-csv"></i> Import CSV
                <span class="badge bg-success ms-1" style="font-size:10px;">MỚI</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <!-- Config Tab -->
        <div class="tab-pane fade show active" id="config-tab">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cấu hình WooCommerce</h3>
                </div>
                <div class="card-body">
                    <form id="woocommerce-config-form">
                        @csrf
                        <div class="mb-3">
                            <label for="domain" class="form-label">Domain WooCommerce</label>
                            <input type="url" class="form-control" id="domain" name="domain" 
                                   value="{{ $config['domain'] ?? '' }}" 
                                   placeholder="https://example.com" required>
                            <small class="form-text text-muted">Ví dụ: https://yourstore.com</small>
                        </div>

                        <div class="mb-3">
                            <label for="consumer_key" class="form-label">Consumer Key</label>
                            <input type="text" class="form-control" id="consumer_key" name="consumer_key" 
                                   value="{{ $config['consumer_key'] ?? '' }}" required>
                            <small class="form-text text-muted">Lấy từ WooCommerce > Settings > Advanced > REST API</small>
                        </div>

                        <div class="mb-3">
                            <label for="consumer_secret" class="form-label">Consumer Secret</label>
                            <input type="password" class="form-control" id="consumer_secret" name="consumer_secret" 
                                   value="{{ $config['consumer_secret'] ?? '' }}" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Lưu cấu hình
                            </button>
                            <button type="button" class="btn btn-info" id="test-connection">
                                <i class="fas fa-plug"></i> Kiểm tra kết nối
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sync Tab -->
        <div class="tab-pane fade" id="sync-tab">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Đồng bộ dữ liệu</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Chức năng này sẽ tải tất cả sản phẩm và hình ảnh từ WooCommerce về hệ thống. 
                        Hình ảnh trong nội dung sẽ được tự động tải về và thay thế URL.
                    </div>

                    <div class="d-flex gap-2 mb-3">
                        <button type="button" class="btn btn-success" id="sync-categories">
                            <i class="fas fa-folder"></i> Đồng bộ danh mục
                        </button>
                        <button type="button" class="btn btn-success" id="sync-products">
                            <i class="fas fa-box"></i> Đồng bộ sản phẩm
                        </button>
                    </div>

                    <div id="sync-progress" class="d-none">
                        <div class="progress mb-2" style="height: 25px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                 role="progressbar" style="width: 0%">
                                <span class="progress-text">0%</span>
                            </div>
                        </div>
                        <div id="sync-status" class="text-muted"></div>
                    </div>

                    <div id="sync-result" class="mt-3"></div>
                </div>
            </div>
        </div>

        <!-- Logs Tab -->
        <div class="tab-pane fade" id="logs-tab">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Lịch sử đồng bộ</h3>
                    <button type="button" class="btn btn-sm btn-secondary" id="refresh-logs">
                        <i class="fas fa-sync"></i> Làm mới
                    </button>
                </div>
                <div class="card-body">
                    <div id="logs-container">
                        <div class="text-center py-4">
                            <i class="fas fa-spinner fa-spin fa-2x"></i>
                            <p class="mt-2">Đang tải...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentLogId = null;
let progressInterval = null;

$(document).ready(function() {
    // Load logs when tab is clicked
    $('#logs-tab-link').on('click', function() {
        loadLogs();
    });

    // Refresh logs
    $('#refresh-logs').on('click', function() {
        loadLogs();
    });

    // Lưu cấu hình
    $('#woocommerce-config-form').on('submit', function(e) {
        e.preventDefault();
        
        const btn = $(this).find('button[type="submit"]');
        const originalText = btn.html();
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang lưu...');

        $.ajax({
            url: '{{ route("admin.woocommerce.save-config") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON?.message || 'Có lỗi xảy ra');
            },
            complete: function() {
                btn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Kiểm tra kết nối
    $('#test-connection').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang kiểm tra...');

        $.ajax({
            url: '{{ route("admin.woocommerce.test-connection") }}',
            method: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Không thể kết nối đến WooCommerce');
            },
            complete: function() {
                btn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Đồng bộ danh mục
    $('#sync-categories').on('click', function() {
        if (!confirm('Bạn có chắc muốn đồng bộ danh mục?')) return;

        const btn = $(this);
        const originalText = btn.html();
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang đồng bộ...');

        startSync('categories');
    });

    // Đồng bộ sản phẩm
    $('#sync-products').on('click', function() {
        if (!confirm('Bạn có chắc muốn đồng bộ sản phẩm? Quá trình này có thể mất vài phút.')) return;

        const btn = $(this);
        const originalText = btn.html();
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang đồng bộ...');

        startSync('products');
    });
});

function startSync(type) {
    $('#sync-progress').removeClass('d-none');
    $('#sync-status').text('Đang bắt đầu đồng bộ...');
    $('#sync-result').html('');

    const url = type === 'categories' 
        ? '{{ route("admin.woocommerce.sync-categories") }}'
        : '{{ route("admin.woocommerce.sync-products") }}';

    $.ajax({
        url: url,
        method: 'POST',
        data: { 
            _token: '{{ csrf_token() }}',
            page: 1,
            per_page: 100
        },
        success: function(response) {
            if (response.data.log_id) {
                currentLogId = response.data.log_id;
                startProgressTracking();
            }
            
            toastr.success(response.message);
            
            let resultHtml = `
                <div class="alert alert-success">
                    <strong>Thành công!</strong> ${response.message}
                </div>
            `;

            if (response.data.errors && response.data.errors.length > 0) {
                resultHtml += `
                    <div class="alert alert-warning">
                        <strong>Một số lỗi:</strong>
                        <ul class="mb-0">
                            ${response.data.errors.map(err => `<li>${err}</li>`).join('')}
                        </ul>
                    </div>
                `;
            }

            $('#sync-result').html(resultHtml);
        },
        error: function(xhr) {
            toastr.error(xhr.responseJSON?.message || 'Có lỗi xảy ra');
            $('#sync-progress').addClass('d-none');
        },
        complete: function() {
            $('#sync-categories, #sync-products').prop('disabled', false).each(function() {
                const icon = $(this).data('type') === 'categories' ? 'folder' : 'box';
                $(this).html(`<i class="fas fa-${icon}"></i> ${$(this).text().trim()}`);
            });
        }
    });
}

function startProgressTracking() {
    if (progressInterval) clearInterval(progressInterval);
    
    progressInterval = setInterval(function() {
        if (!currentLogId) return;
        
        $.ajax({
            url: '{{ route("admin.woocommerce.log-progress", ":id") }}'.replace(':id', currentLogId),
            method: 'GET',
            success: function(data) {
                updateProgress(data);
                
                if (data.status !== 'running') {
                    clearInterval(progressInterval);
                    progressInterval = null;
                    currentLogId = null;
                }
            }
        });
    }, 1000);
}

function updateProgress(data) {
    const percent = data.progress || 0;
    $('.progress-bar').css('width', percent + '%');
    $('.progress-text').text(percent + '%');
    
    let statusText = `Đã đồng bộ: ${data.synced}/${data.total}`;
    if (data.failed > 0) {
        statusText += ` | Lỗi: ${data.failed}`;
    }
    if (data.duration) {
        statusText += ` | Thời gian: ${data.duration}`;
    }
    
    $('#sync-status').text(statusText);
    
    if (data.status === 'completed') {
        $('#sync-progress').addClass('d-none');
        toastr.success('Đồng bộ hoàn tất!');
    } else if (data.status === 'failed') {
        $('#sync-progress').addClass('d-none');
        toastr.error('Đồng bộ thất bại!');
    }
}

function loadLogs() {
    $('#logs-container').html(`
        <div class="text-center py-4">
            <i class="fas fa-spinner fa-spin fa-2x"></i>
            <p class="mt-2">Đang tải...</p>
        </div>
    `);

    $.ajax({
        url: '{{ route("admin.woocommerce.logs") }}',
        method: 'GET',
        success: function(html) {
            $('#logs-container').html($(html).find('#logs-container').html());
        },
        error: function() {
            $('#logs-container').html(`
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Không thể tải lịch sử. Vui lòng thử lại.
                </div>
            `);
        }
    });
}
</script>
@endpush
@endsection
