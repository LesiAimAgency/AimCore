@extends('admin.layouts.app')

@section('title', 'Lịch sử đồng bộ WooCommerce')

@section('content')
<div id="logs-container">
    @if($logs->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            Chưa có lịch sử đồng bộ nào.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Loại</th>
                        <th>Trạng thái</th>
                        <th>Tiến độ</th>
                        <th>Thời gian</th>
                        <th>Người thực hiện</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>
                            <i class="fas fa-{{ $log->type === 'products' ? 'box' : 'folder' }}"></i>
                            {{ $log->type === 'products' ? 'Sản phẩm' : 'Danh mục' }}
                        </td>
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
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress flex-grow-1" style="height: 20px; min-width: 100px;">
                                    <div class="progress-bar {{ $log->status === 'failed' ? 'bg-danger' : '' }}" 
                                         style="width: {{ $log->progress_percent }}%">
                                        {{ $log->progress_percent }}%
                                    </div>
                                </div>
                                <small class="text-muted">{{ $log->synced }}/{{ $log->total }}</small>
                            </div>
                        </td>
                        <td>
                            <small>
                                {{ $log->started_at->format('d/m/Y H:i') }}
                                @if($log->duration)
                                    <br><span class="text-muted">({{ $log->duration }})</span>
                                @endif
                            </small>
                        </td>
                        <td>
                            {{ $log->user->name ?? 'N/A' }}
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ locale_route('admin.woocommerce.log-detail', $log->id) }}" 
                                   class="btn btn-info" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-danger delete-log" 
                                        data-id="{{ $log->id }}" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $logs->links() }}
        </div>
    @endif
</div>

@push('scripts')
<script>
$(document).on('click', '.delete-log', function() {
    if (!confirm('Bạn có chắc muốn xóa log này?')) return;
    
    const logId = $(this).data('id');
    const row = $(this).closest('tr');
    
    $.ajax({
        url: '{{ locale_route("admin.woocommerce.log-delete", ":id") }}'.replace(':id', logId),
        method: 'DELETE',
        data: { _token: '{{ csrf_token() }}' },
        success: function(response) {
            toastr.success(response.message);
            row.fadeOut(300, function() {
                $(this).remove();
            });
        },
        error: function() {
            toastr.error('Không thể xóa log');
        }
    });
});
</script>
@endpush
@endsection
