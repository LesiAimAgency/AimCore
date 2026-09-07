@extends('admin.layouts.app')

@section('title', 'Chi tiết log đồng bộ')

@section('page-actions')
<a href="{{ locale_route('admin.woocommerce.index') }}" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left text-xs"></i> Quay lại
</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin đồng bộ</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Loại</th>
                            <td>
                                <i class="fas fa-{{ $log->type === 'products' ? 'box' : 'folder' }}"></i>
                                {{ $log->type === 'products' ? 'Sản phẩm' : 'Danh mục' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                @if($log->status === 'running')
                                    <span class="badge bg-primary">
                                        <i class="fas fa-spinner fa-spin"></i> Đang chạy
                                    </span>
                                @elseif($log->status === 'completed')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> Hoàn thành
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i> Thất bại
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tiến độ</th>
                            <td>
                                <div class="progress mb-2" style="height: 25px;">
                                    <div class="progress-bar {{ $log->status === 'failed' ? 'bg-danger' : '' }}" 
                                         style="width: {{ $log->progress_percent }}%">
                                        {{ $log->progress_percent }}%
                                    </div>
                                </div>
                                <small class="text-muted">
                                    Đã đồng bộ: {{ $log->synced }}/{{ $log->total }}
                                    @if($log->failed > 0)
                                        | Lỗi: {{ $log->failed }}
                                    @endif
                                </small>
                            </td>
                        </tr>
                        <tr>
                            <th>Thời gian bắt đầu</th>
                            <td>{{ $log->started_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        @if($log->completed_at)
                        <tr>
                            <th>Thời gian hoàn thành</th>
                            <td>{{ $log->completed_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        @endif
                        @if($log->duration)
                        <tr>
                            <th>Thời lượng</th>
                            <td>{{ $log->duration }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Người thực hiện</th>
                            <td>{{ $log->user->name ?? 'N/A' }}</td>
                        </tr>
                        @if($log->message)
                        <tr>
                            <th>Thông báo</th>
                            <td>{{ $log->message }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thống kê</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Thành công</span>
                            <strong class="text-success">{{ $log->synced }}</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" 
                                 style="width: {{ $log->total > 0 ? ($log->synced / $log->total * 100) : 0 }}%"></div>
                        </div>
                    </div>

                    @if($log->failed > 0)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Thất bại</span>
                            <strong class="text-danger">{{ $log->failed }}</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-danger" 
                                 style="width: {{ $log->total > 0 ? ($log->failed / $log->total * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="text-center">
                        <h4 class="mb-0">{{ $log->total }}</h4>
                        <small class="text-muted">Tổng số mục</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($log->errors && count($log->errors) > 0)
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle"></i>
                        Danh sách lỗi ({{ count($log->errors) }})
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Lỗi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($log->errors as $index => $error)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><code>{{ $error }}</code></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@if($log->status === 'running')
@push('scripts')
<script>
// Auto refresh nếu đang chạy
setInterval(function() {
    location.reload();
}, 5000);
</script>
@endpush
@endif
@endsection
