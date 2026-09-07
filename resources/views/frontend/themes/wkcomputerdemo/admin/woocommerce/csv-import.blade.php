@extends('admin.layouts.app')

@section('title', 'Đồng bộ sản phẩm từ CSV')

@push('styles')
<style>
/* ─── Variables ─── */
:root {
    --csv-primary:   #6366f1;
    --csv-success:   #22c55e;
    --csv-warning:   #f59e0b;
    --csv-danger:    #ef4444;
    --csv-info:      #3b82f6;
    --csv-dark:      #0f172a;
    --csv-surface:   #1e293b;
    --csv-border:    #334155;
}

/* ─── Page header ─── */
.csv-header {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    border-bottom: 1px solid #334155;
    padding: 28px 32px;
    margin: -24px -24px 32px -24px;
}
.csv-header h1 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #f1f5f9;
    margin: 0 0 4px 0;
}
.csv-header p {
    color: #94a3b8;
    margin: 0;
    font-size: 14px;
}

/* ─── Cards ─── */
.csv-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 12px rgba(0,0,0,.04);
    overflow: hidden;
    margin-bottom: 24px;
}
.csv-card-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    border-bottom: 1px solid #f1f5f9;
    background: #f8fafc;
}
.csv-card-header .step-badge {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--csv-primary);
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.csv-card-header h5 {
    margin: 0;
    font-size: 15px;
    font-weight: 600;
    color: #1e293b;
}
.csv-card-body { padding: 24px; }

/* ─── Drop zone ─── */
.drop-zone {
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    padding: 40px 24px;
    text-align: center;
    cursor: pointer;
    transition: all .2s ease;
    background: #f8fafc;
    position: relative;
}
.drop-zone:hover, .drop-zone.dragover {
    border-color: var(--csv-primary);
    background: #eef2ff;
}
.drop-zone .dz-icon {
    font-size: 40px;
    color: var(--csv-primary);
    margin-bottom: 12px;
}
.drop-zone h6 { font-weight: 600; color: #334155; margin-bottom: 4px; }
.drop-zone p  { font-size: 13px; color: #94a3b8; margin: 0; }

/* ─── File info badge ─── */
.file-badge {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 10px;
}
.file-badge .fi-icon { font-size: 28px; color: var(--csv-success); }
.file-badge .fi-name { font-weight: 600; font-size: 14px; color: #166534; word-break: break-all; }
.file-badge .fi-meta { font-size: 12px; color: #4ade80; }

/* ─── Option toggles ─── */
.opt-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 0;
    border-bottom: 1px solid #f1f5f9;
}
.opt-row:last-child { border-bottom: none; padding-bottom: 0; }
.opt-row .form-check-input {
    width: 2.4em;
    height: 1.2em;
    margin-top: 3px;
    cursor: pointer;
    flex-shrink: 0;
}
.opt-label strong { display: block; font-size: 14px; color: #1e293b; }
.opt-label small  { font-size: 12px; color: #94a3b8; }

/* ─── Batch size selector ─── */
.batch-pills { display: flex; gap: 8px; flex-wrap: wrap; }
.batch-pill {
    padding: 6px 16px;
    border-radius: 20px;
    border: 1.5px solid #e2e8f0;
    background: #fff;
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
    cursor: pointer;
    transition: all .15s;
}
.batch-pill:hover { border-color: var(--csv-primary); color: var(--csv-primary); }
.batch-pill.active {
    background: var(--csv-primary);
    border-color: var(--csv-primary);
    color: #fff;
}

/* ─── Start button ─── */
.btn-import-start {
    width: 100%;
    padding: 14px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 10px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all .2s ease;
    box-shadow: 0 4px 14px rgba(99,102,241,.35);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.btn-import-start:hover:not(:disabled) {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(99,102,241,.45);
}
.btn-import-start:disabled { opacity: .55; cursor: not-allowed; transform: none; }
.btn-import-stop {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 10px;
    background: #fff;
    color: var(--csv-danger);
    border: 2px solid var(--csv-danger);
    cursor: pointer;
    transition: all .2s;
    display: none;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 10px;
}
.btn-import-stop:hover { background: #fef2f2; }

/* ─── Stats row ─── */
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 20px; }
.stat-tile {
    border-radius: 12px;
    padding: 16px;
    text-align: center;
    transition: transform .2s;
}
.stat-tile:hover { transform: translateY(-2px); }
.stat-tile .snum {
    font-size: 30px;
    font-weight: 800;
    line-height: 1;
    display: block;
}
.stat-tile .slbl {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-top: 4px;
    opacity: .75;
    display: block;
}
.stat-tile.s-total   { background:#eff6ff; color:#1d4ed8; }
.stat-tile.s-success { background:#f0fdf4; color:#15803d; }
.stat-tile.s-skip    { background:#fefce8; color:#92400e; }
.stat-tile.s-error   { background:#fff1f2; color:#be123c; }

/* ─── Progress bar ─── */
.progress-wrap { margin-bottom: 16px; }
.progress-meta {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #64748b;
    margin-bottom: 6px;
}
.prog-bar-outer {
    height: 10px;
    background: #e2e8f0;
    border-radius: 99px;
    overflow: hidden;
}
.prog-bar-inner {
    height: 100%;
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    border-radius: 99px;
    transition: width .4s ease;
    width: 0%;
}

/* ─── Console log ─── */
.log-console {
    background: #0f172a;
    border-radius: 10px;
    padding: 14px 16px;
    height: 300px;
    overflow-y: auto;
    font-family: 'Consolas', 'Monaco', monospace;
    font-size: 12px;
    line-height: 1.7;
}
.log-console::-webkit-scrollbar { width: 5px; }
.log-console::-webkit-scrollbar-track { background: #1e293b; }
.log-console::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
.log-line { padding: 0; }
.log-success { color: #4ade80; }
.log-error   { color: #f87171; }
.log-skip    { color: #94a3b8; }
.log-info    { color: #60a5fa; }
.log-head    { color: #c084fc; font-weight: 600; }

/* ─── Preview table ─── */
.preview-table th { background: #1e293b; color: #cbd5e1; font-weight: 500; font-size: 12px; text-transform: uppercase; letter-spacing: .4px; white-space: nowrap; }
.preview-table td { font-size: 13px; vertical-align: middle; }
.type-badge { font-size: 11px; padding: 2px 8px; border-radius: 99px; font-weight: 600; }
.type-simple   { background: #dbeafe; color: #1e40af; }
.type-variable { background: #fef3c7; color: #92400e; }

/* ─── Preloaded alert ─── */
.preload-alert {
    background: linear-gradient(135deg, #0f172a, #1e293b);
    border: 1px solid #334155;
    border-radius: 12px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 28px;
}
.preload-alert .pa-icon { font-size: 32px; flex-shrink: 0; }
.preload-alert .pa-text strong { color: #f1f5f9; display: block; font-size: 15px; }
.preload-alert .pa-text span   { color: #94a3b8; font-size: 13px; }
.preload-alert .btn-use {
    padding: 10px 20px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    white-space: nowrap;
    flex-shrink: 0;
    transition: opacity .2s;
    text-decoration: none;
}
.preload-alert .btn-use:hover { opacity: .85; color: #fff; }

/* ─── Error panel ─── */
.err-panel {
    background: #fff1f2;
    border: 1px solid #fecdd3;
    border-radius: 10px;
    padding: 14px 18px;
    margin-top: 16px;
    display: none;
}
.err-panel h6 { color: #be123c; font-size: 13px; font-weight: 600; margin-bottom: 8px; }
.err-list { max-height: 200px; overflow-y: auto; margin: 0; padding: 0; list-style: none; }
.err-list li { font-size: 12px; color: #9f1239; padding: 3px 0; border-bottom: 1px solid #fee2e2; }
.err-list li:last-child { border-bottom: none; }

@media (max-width: 991px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}
</style>
@endpush

@section('content')

{{-- ── Page Header ── --}}
<div class="csv-header">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div class="d-flex align-items-center gap-3">
            <div style="width:48px;height:48px;background:linear-gradient(135deg,#6366f1,#8b5cf6);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <i class="fas fa-file-import" style="color:#fff;font-size:20px;"></i>
            </div>
            <div>
                <h1>Đồng bộ sản phẩm WooCommerce</h1>
                <p>Import toàn bộ sản phẩm từ file CSV — hình ảnh được tải về tự động</p>
            </div>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            @if($uploadedFile)
            <button class="btn btn-outline-danger btn-sm px-3" id="btn-clear-file">
                <i class="fas fa-trash me-1"></i> Xóa file hiện tại
            </button>
            @endif
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show border-0 rounded-3 mb-4" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 mb-4" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- ── Preloaded CSV Notice ── --}}
@if(!$uploadedFile && !empty($preloadedExists))
<div class="preload-alert">
    <div class="pa-icon">⚡</div>
    <div class="pa-text flex-grow-1">
        <strong>File CSV có sẵn trên server!</strong>
        <span>wc-product-export-14-7-2026 &nbsp;·&nbsp; ~7.6 MB &nbsp;·&nbsp; ~15.400 sản phẩm &nbsp;·&nbsp; Không cần upload lại</span>
    </div>
    <form method="POST" action="{{ route('admin.woocommerce-csv.use-preloaded') }}">
        @csrf
        <button type="submit" class="btn-use">
            <i class="fas fa-bolt me-2"></i>Dùng file này ngay
        </button>
    </form>
</div>
@endif

<div class="row g-4">

{{-- ══════════════════════════════════
     LEFT COLUMN: Upload + Options
══════════════════════════════════ --}}
<div class="col-xl-4 col-lg-5">

    {{-- Upload Card --}}
    <div class="csv-card">
        <div class="csv-card-header">
            <div class="step-badge">1</div>
            <h5>Tải lên file CSV</h5>
        </div>
        <div class="csv-card-body">
            @if($uploadedFile)

            {{-- File already loaded --}}
            <div class="file-badge mb-3">
                <div class="fi-icon"><i class="fas fa-file-csv"></i></div>
                <div>
                    <div class="fi-name">{{ $uploadedFile }}</div>
                    @if(!empty($previewData['total_rows']))
                    <div class="fi-meta">
                        {{ number_format($previewData['total_rows']) }} sản phẩm
                    </div>
                    @endif
                </div>
            </div>
            <label for="csv-file-replace" class="btn btn-sm btn-outline-secondary w-100" style="cursor:pointer;">
                <i class="fas fa-exchange-alt me-2"></i>Đổi file CSV khác
            </label>
            <input type="file" id="csv-file-replace" accept=".csv,.txt" class="d-none">

            @else

            {{-- Drop zone --}}
            <form id="upload-form" method="POST" action="{{ route('admin.woocommerce-csv.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="drop-zone" id="drop-zone">
                    <div class="dz-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <h6>Kéo thả file CSV vào đây</h6>
                    <p>hoặc bấm để chọn từ máy tính</p>
                    <input type="file" id="csv-file-input" name="csv_file" accept=".csv,.txt" class="d-none" required>
                </div>
                <div id="file-selected-name" class="d-none mt-3 p-3 bg-light rounded-3 small fw-semibold text-truncate" style="color:#334155;"></div>
                <button type="submit" class="btn btn-success w-100 mt-3 d-none py-2" id="btn-upload-submit">
                    <i class="fas fa-upload me-2"></i>Tải lên & tiếp tục
                </button>
            </form>
            @endif
        </div>
    </div>

    {{-- Options Card --}}
    <div class="csv-card" id="options-card" @if(!$uploadedFile) style="opacity:.6;pointer-events:none;" @endif>
        <div class="csv-card-header">
            <div class="step-badge">2</div>
            <h5>Tuỳ chọn import</h5>
        </div>
        <div class="csv-card-body">

            {{-- Batch size --}}
            <div class="mb-4">
                <div style="font-size:13px;font-weight:600;color:#475569;margin-bottom:10px;">Số sản phẩm mỗi lần (batch)</div>
                <div class="batch-pills">
                    <div class="batch-pill" data-val="25">25</div>
                    <div class="batch-pill active" data-val="50">50</div>
                    <div class="batch-pill" data-val="100">100</div>
                    <div class="batch-pill" data-val="200">200</div>
                </div>
                <input type="hidden" id="batch-size" value="50">
                <div style="font-size:11px;color:#94a3b8;margin-top:6px;">Batch nhỏ hơn = ổn định hơn khi tải ảnh</div>
            </div>

            {{-- Download images --}}
            <div class="opt-row">
                <input class="form-check-input" type="checkbox" id="download-images" checked>
                <div class="opt-label">
                    <strong><i class="fas fa-images me-1 text-primary"></i>Tải hình ảnh về local</strong>
                    <small>Download ảnh từ wkcomputer.vn về server này. Mất nhiều thời gian hơn nhưng hình sẽ hiển thị đúng.</small>
                </div>
            </div>

            {{-- Overwrite --}}
            <div class="opt-row">
                <input class="form-check-input" type="checkbox" id="overwrite" checked>
                <div class="opt-label">
                    <strong><i class="fas fa-redo me-1 text-warning"></i>Ghi đè sản phẩm đã có</strong>
                    <small>Cập nhật thông tin nếu sản phẩm đã tồn tại (khớp theo ID hoặc SKU).</small>
                </div>
            </div>

            {{-- Start batch --}}
            <div class="opt-row">
                <div style="flex-shrink:0;">
                    <input type="number" id="start-batch" value="1" min="1" class="form-control form-control-sm" style="width:80px;">
                </div>
                <div class="opt-label">
                    <strong><i class="fas fa-forward me-1 text-info"></i>Bắt đầu từ batch</strong>
                    <small>Tiếp tục từ điểm dừng nếu import bị gián đoạn. <span id="total-batches-hint"></span></small>
                </div>
            </div>

            {{-- Start button --}}
            <div class="mt-4">
                <button class="btn-import-start" id="btn-start" {{ !$uploadedFile ? 'disabled' : '' }}>
                    <i class="fas fa-play"></i>
                    <span>Bắt đầu Import</span>
                </button>
                <button class="btn-import-stop" id="btn-stop">
                    <i class="fas fa-stop-circle"></i> Dừng lại
                </button>
            </div>
        </div>
    </div>

    {{-- Tips Card --}}
    <div class="csv-card">
        <div class="csv-card-body" style="padding:18px 20px;">
            <div style="font-size:13px;font-weight:600;color:#64748b;margin-bottom:10px;">
                <i class="fas fa-lightbulb text-warning me-1"></i> Ước tính thời gian
            </div>
            <div style="font-size:13px;color:#475569;line-height:1.8;">
                <div>• Không tải ảnh: <strong>~5–10 phút</strong></div>
                <div>• Có tải ảnh: <strong>~8–12 giờ</strong> (15K SP)</div>
                <div>• Khuyến nghị: tắt ảnh lần đầu → sync nhanh → bật ảnh sau</div>
            </div>
            <hr style="border-color:#f1f5f9;margin:12px 0;">
            <div style="font-size:12px;color:#94a3b8;">
                Bạn có thể <strong>dừng bất kỳ lúc nào</strong> và tiếp tục bằng cách điều chỉnh "Bắt đầu từ batch".
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════
     RIGHT COLUMN: Progress + Preview
══════════════════════════════════ --}}
<div class="col-xl-8 col-lg-7">

    {{-- Progress Card --}}
    <div class="csv-card">
        <div class="csv-card-header justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div class="step-badge">3</div>
                <h5 class="mb-0">Tiến trình import</h5>
            </div>
            <span class="badge rounded-pill px-3 py-2" id="status-badge" style="background:#e2e8f0;color:#64748b;font-size:12px;">
                Chờ bắt đầu
            </span>
        </div>
        <div class="csv-card-body">

            {{-- Stats --}}
            <div class="stats-grid">
                <div class="stat-tile s-total">
                    <span class="snum" id="stat-total">—</span>
                    <span class="slbl">Tổng SP</span>
                </div>
                <div class="stat-tile s-success">
                    <span class="snum" id="stat-synced">0</span>
                    <span class="slbl">Thành công</span>
                </div>
                <div class="stat-tile s-skip">
                    <span class="snum" id="stat-skipped">0</span>
                    <span class="slbl">Bỏ qua</span>
                </div>
                <div class="stat-tile s-error">
                    <span class="snum" id="stat-failed">0</span>
                    <span class="slbl">Lỗi</span>
                </div>
            </div>

            {{-- Progress --}}
            <div class="progress-wrap">
                <div class="progress-meta">
                    <span id="batch-label">Batch <strong id="cur-batch">0</strong> / <strong id="tot-batch">?</strong></span>
                    <span id="pct-label" style="font-weight:600;color:var(--csv-primary);">0%</span>
                </div>
                <div class="prog-bar-outer">
                    <div class="prog-bar-inner" id="prog-bar"></div>
                </div>
            </div>

            {{-- Console --}}
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span style="font-size:12px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:.5px;">
                    <i class="fas fa-terminal me-1"></i>Log
                </span>
                <button class="btn btn-xs btn-outline-secondary py-0 px-2" style="font-size:11px;" onclick="clearLog()">Xóa log</button>
            </div>
            <div class="log-console" id="log-console">
                <div class="log-line log-info">// Log sẽ hiển thị tại đây khi import bắt đầu...</div>
            </div>

            {{-- Error panel --}}
            <div class="err-panel" id="err-panel">
                <h6><i class="fas fa-exclamation-circle me-1"></i>Lỗi gặp phải (<span id="err-count">0</span>)</h6>
                <ul class="err-list" id="err-list"></ul>
            </div>
        </div>
    </div>

    {{-- Preview Table --}}
    @if($uploadedFile && !empty($previewData['preview']))
    <div class="csv-card">
        <div class="csv-card-header">
            <div class="step-badge" style="background:#0ea5e9;">👁</div>
            <h5>Preview — 10 sản phẩm đầu tiên</h5>
            @if(!empty($previewData['total_rows']))
            <span class="ms-auto text-muted" style="font-size:13px;">
                Tổng: <strong>{{ number_format($previewData['total_rows']) }}</strong> dòng
            </span>
            @endif
        </div>
        <div style="overflow-x:auto;">
            <table class="table table-sm table-hover preview-table mb-0">
                <thead>
                    <tr>
                        <th style="padding:12px 16px;">ID</th>
                        <th>Loại</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-end">Giá bán</th>
                        <th class="text-end">Kho</th>
                        <th class="text-center">Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($previewData['preview'] as $row)
                    <tr>
                        <td style="padding:10px 16px;color:#94a3b8;font-size:12px;">{{ $row['id'] }}</td>
                        <td>
                            <span class="type-badge {{ $row['type'] === 'variable' ? 'type-variable' : 'type-simple' }}">
                                {{ $row['type'] }}
                            </span>
                        </td>
                        <td>
                            <div style="font-size:13px;font-weight:500;color:#1e293b;" title="{{ $row['name'] }}">
                                {{ Str::limit($row['name'], 52) }}
                            </div>
                            @if($row['categories'])
                            <div style="font-size:11px;color:#94a3b8;">{{ Str::limit($row['categories'], 45) }}</div>
                            @endif
                        </td>
                        <td class="text-end" style="white-space:nowrap;">
                            @if((float)$row['sale_price'] > 0)
                            <del style="color:#94a3b8;font-size:11px;">{{ number_format((float)$row['regular_price']) }}₫</del><br>
                            <strong style="color:#ef4444;font-size:13px;">{{ number_format((float)$row['sale_price']) }}₫</strong>
                            @else
                            <span style="font-size:13px;font-weight:500;">{{ number_format((float)$row['regular_price']) }}₫</span>
                            @endif
                        </td>
                        <td class="text-end" style="font-size:13px;">{{ number_format((int)$row['stock']) }}</td>
                        <td class="text-center">
                            <span style="background:#dbeafe;color:#1e40af;font-size:11px;font-weight:600;padding:2px 8px;border-radius:99px;">
                                {{ $row['images_count'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
</div>
@endsection

@push('scripts')
<script>
/* ════════════════════════════════════════════
   Import State
════════════════════════════════════════════ */
let isRunning    = false;
let shouldStop   = false;
let curBatch     = 1;
let totBatch     = null;
let sumSynced    = 0;
let sumSkipped   = 0;
let sumFailed    = 0;
let allErrors    = [];

/* ════════════════════════════════════════════
   Drop Zone
════════════════════════════════════════════ */
const dz = document.getElementById('drop-zone');
const fi = document.getElementById('csv-file-input');
const nameEl = document.getElementById('file-selected-name');
const submitBtn = document.getElementById('btn-upload-submit');

if (dz) {
    dz.addEventListener('click', () => fi.click());
    dz.addEventListener('dragover', e => { e.preventDefault(); dz.classList.add('dragover'); });
    dz.addEventListener('dragleave', () => dz.classList.remove('dragover'));
    dz.addEventListener('drop', e => {
        e.preventDefault(); dz.classList.remove('dragover');
        if (e.dataTransfer.files.length) { fi.files = e.dataTransfer.files; onFileChosen(fi.files[0]); }
    });
    fi.addEventListener('change', () => { if (fi.files.length) onFileChosen(fi.files[0]); });
}

function onFileChosen(f) {
    nameEl.textContent = '📄 ' + f.name + ' (' + fmtBytes(f.size) + ')';
    nameEl.classList.remove('d-none');
    submitBtn.classList.remove('d-none');
}

/* Replace file for already-loaded state */
const replaceInput = document.getElementById('csv-file-replace');
if (replaceInput) {
    replaceInput.addEventListener('change', function () {
        if (!this.files.length) return;
        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('csv_file', this.files[0]);
        fetch('{{ route("admin.woocommerce-csv.upload") }}', { method: 'POST', body: fd })
            .then(r => { if (r.redirected) location.href = r.url; else location.reload(); });
    });
}

/* ════════════════════════════════════════════
   Batch pills
════════════════════════════════════════════ */
document.querySelectorAll('.batch-pill').forEach(pill => {
    pill.addEventListener('click', function () {
        document.querySelectorAll('.batch-pill').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        document.getElementById('batch-size').value = this.dataset.val;
    });
});

/* ════════════════════════════════════════════
   Clear file
════════════════════════════════════════════ */
document.getElementById('btn-clear-file')?.addEventListener('click', () => {
    if (!confirm('Xóa file CSV hiện tại?')) return;
    fetch('{{ route("admin.woocommerce-csv.clear") }}', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
    }).then(() => location.reload());
});

/* ════════════════════════════════════════════
   Start / Stop
════════════════════════════════════════════ */
document.getElementById('btn-start')?.addEventListener('click', function () {
    if (isRunning) return;

    // Reset
    isRunning  = true; shouldStop = false;
    sumSynced  = 0; sumSkipped = 0; sumFailed = 0; allErrors = [];
    curBatch   = parseInt(document.getElementById('start-batch').value) || 1;

    clearLog();
    logHead('══════════════════════════════════');
    logHead('  BẮT ĐẦU IMPORT — ' + new Date().toLocaleTimeString('vi-VN'));
    logHead('══════════════════════════════════');

    setBadge('Đang import...', 'primary');
    this.disabled = true;
    document.getElementById('btn-stop').style.display = 'flex';
    document.getElementById('err-panel').style.display = 'none';
    document.getElementById('err-list').innerHTML = '';
    allErrors = [];

    runBatch();
});

document.getElementById('btn-stop')?.addEventListener('click', function () {
    shouldStop = true;
    this.disabled = true;
    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang dừng...';
    logInfo('⏸ Yêu cầu dừng — chờ batch hiện tại xong...');
});

/* ════════════════════════════════════════════
   Batch runner
════════════════════════════════════════════ */
async function runBatch() {
    if (shouldStop) { finish('stopped'); return; }

    const batchSize     = parseInt(document.getElementById('batch-size').value) || 50;
    const dlImages      = document.getElementById('download-images').checked ? 1 : 0;
    const overwrite     = document.getElementById('overwrite').checked ? 1 : 0;

    logInfo('▶ Batch ' + curBatch + (totBatch ? '/' + totBatch : '') + ' — đang xử lý...');

    try {
        const res = await fetch('{{ route("admin.woocommerce-csv.import") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ batch: curBatch, batch_size: batchSize, download_images: dlImages, overwrite })
        });

        const j = await res.json();
        if (!res.ok || !j.success) {
            logErr('❌ Server lỗi: ' + (j.message || res.statusText));
            finish('error'); return;
        }

        const d = j.data;
        totBatch   = d.total_batches;
        sumSynced  += (d.synced  || 0);
        sumSkipped += (d.skipped || 0);
        sumFailed  += (d.failed  || 0);

        if (d.errors?.length) {
            allErrors.push(...d.errors);
            showErrors();
        }

        // Update stats
        document.getElementById('stat-synced').textContent  = fmtNum(sumSynced);
        document.getElementById('stat-skipped').textContent = fmtNum(sumSkipped);
        document.getElementById('stat-failed').textContent  = fmtNum(sumFailed);
        if (d.total_rows) document.getElementById('stat-total').textContent = fmtNum(d.total_rows);

        // Progress
        const pct = totBatch ? Math.min(100, Math.round((curBatch / totBatch) * 100)) : 0;
        document.getElementById('prog-bar').style.width = pct + '%';
        document.getElementById('pct-label').textContent = pct + '%';
        document.getElementById('cur-batch').textContent = curBatch;
        document.getElementById('tot-batch').textContent = totBatch || '?';
        document.getElementById('start-batch').value = curBatch;
        if (totBatch) document.getElementById('total-batches-hint').textContent = '(tổng ' + totBatch + ' batch)';

        // Log items (last 15)
        (d.items || []).slice(-15).forEach(line => {
            if (line.startsWith('✅'))      logOk(line);
            else if (line.startsWith('❌')) logErr(line);
            else if (line.startsWith('⏭')) logSkip(line);
            else                            logInfo(line);
        });
        logInfo('  Kết quả: ✅ ' + d.synced + ' · ⏭ ' + d.skipped + ' · ❌ ' + d.failed);

        if (d.is_last) { finish('done'); return; }

        curBatch++;
        setTimeout(runBatch, 200);

    } catch (err) {
        logErr('⚠ Network error: ' + err.message + ' — thử lại sau 5s...');
        setTimeout(runBatch, 5000);
    }
}

/* ════════════════════════════════════════════
   Finish
════════════════════════════════════════════ */
function finish(state) {
    isRunning = false;
    const startBtn = document.getElementById('btn-start');
    const stopBtn  = document.getElementById('btn-stop');
    startBtn.disabled = false;
    stopBtn.style.display = 'none';
    stopBtn.disabled = false;
    stopBtn.innerHTML = '<i class="fas fa-stop-circle"></i> Dừng lại';

    if (state === 'done') {
        setBadge('✅ Hoàn tất', 'success');
        document.getElementById('prog-bar').style.width = '100%';
        document.getElementById('pct-label').textContent = '100%';
        logHead('══════════════════════════════════');
        logOk('🎉 IMPORT HOÀN TẤT!');
        logInfo('Tổng kết → ✅ ' + sumSynced + ' thành công · ⏭ ' + sumSkipped + ' bỏ qua · ❌ ' + sumFailed + ' lỗi');
        if (typeof toastr !== 'undefined') toastr.success('Import hoàn tất! ' + fmtNum(sumSynced) + ' sản phẩm.', '', { timeOut: 0 });
    } else if (state === 'stopped') {
        setBadge('⏸ Đã dừng', 'warning');
        logInfo('⏹ Dừng ở batch ' + curBatch + '. Bắt đầu lại từ đây để tiếp tục.');
        document.getElementById('start-batch').value = curBatch;
    } else {
        setBadge('❌ Lỗi', 'danger');
    }
}

/* ════════════════════════════════════════════
   Helpers
════════════════════════════════════════════ */
const logEl = document.getElementById('log-console');
function appendLog(cls, txt) {
    const d = document.createElement('div');
    d.className = 'log-line ' + cls;
    d.textContent = txt;
    logEl.appendChild(d);
    logEl.scrollTop = logEl.scrollHeight;
    while (logEl.children.length > 600) logEl.removeChild(logEl.firstChild);
}
function clearLog() { logEl.innerHTML = ''; }
function logHead(t) { appendLog('log-head', t); }
function logOk(t)   { appendLog('log-success', t); }
function logErr(t)  { appendLog('log-error', t); }
function logSkip(t) { appendLog('log-skip', t); }
function logInfo(t) { appendLog('log-info', t); }

function setBadge(text, color) {
    const colors = {
        primary: 'linear-gradient(135deg,#6366f1,#8b5cf6)',
        success: 'linear-gradient(135deg,#22c55e,#16a34a)',
        warning: 'linear-gradient(135deg,#f59e0b,#d97706)',
        danger:  'linear-gradient(135deg,#ef4444,#dc2626)',
    };
    const badge = document.getElementById('status-badge');
    badge.style.background = colors[color] || '#e2e8f0';
    badge.style.color = color === 'warning' ? '#1c1917' : '#fff';
    badge.textContent = text;
}

function showErrors() {
    const panel = document.getElementById('err-panel');
    const list  = document.getElementById('err-list');
    const cnt   = document.getElementById('err-count');
    panel.style.display = 'block';
    cnt.textContent = allErrors.length;
    list.innerHTML = allErrors.slice(-50).map(e =>
        '<li>' + escHtml(e) + '</li>'
    ).join('');
}

function fmtNum(n)    { return (n||0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','); }
function fmtBytes(b)  { return b < 1048576 ? (b/1024).toFixed(1)+' KB' : (b/1048576).toFixed(1)+' MB'; }
function escHtml(s)   { return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }
</script>
@endpush
