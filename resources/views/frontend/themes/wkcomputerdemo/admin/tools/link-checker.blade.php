@extends('admin.layouts.app')

@section('title', 'Kiểm tra Link')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kiểm tra và sửa Link bị lỗi</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Công cụ này sẽ quét tất cả các file blade và tìm các link có thể bị lỗi 404.
                    </div>

                    <button id="scanLinks" class="btn btn-primary mb-3">
                        <i class="fas fa-search"></i> Quét Link
                    </button>

                    <button id="fixLinks" class="btn btn-success mb-3" style="display:none;">
                        <i class="fas fa-wrench"></i> Sửa tất cả Link
                    </button>

                    <div id="results" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('scanLinks').addEventListener('click', function() {
    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang quét...';

    fetch('/admin/tools/scan-links')
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-search"></i> Quét lại';
            
            if (data.broken_links && data.broken_links.length > 0) {
                document.getElementById('fixLinks').style.display = 'inline-block';
                
                let html = '<div class="table-responsive"><table class="table table-bordered">';
                html += '<thead><tr><th>File</th><th>Link</th><th>Loại</th></tr></thead><tbody>';
                
                data.broken_links.forEach(link => {
                    html += `<tr>
                        <td><code>${link.file}</code></td>
                        <td><code>${link.link}</code></td>
                        <td><span class="badge badge-warning">${link.type}</span></td>
                    </tr>`;
                });
                
                html += '</tbody></table></div>';
                html += `<div class="alert alert-warning mt-3">Tìm thấy ${data.broken_links.length} link có thể bị lỗi</div>`;
                
                document.getElementById('results').innerHTML = html;
            } else {
                document.getElementById('results').innerHTML = '<div class="alert alert-success">Không tìm thấy link bị lỗi!</div>';
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-search"></i> Quét Link';
            document.getElementById('results').innerHTML = '<div class="alert alert-danger">Lỗi: ' + err.message + '</div>';
        });
});

document.getElementById('fixLinks').addEventListener('click', function() {
    if (!confirm('Bạn có chắc muốn sửa tất cả các link bị lỗi?')) {
        return;
    }

    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang sửa...';

    fetch('/admin/tools/fix-links', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-wrench"></i> Sửa tất cả Link';
            
            if (data.success) {
                document.getElementById('results').innerHTML = `<div class="alert alert-success">Đã sửa ${data.fixed_count} file thành công!</div>`;
                btn.style.display = 'none';
            } else {
                document.getElementById('results').innerHTML = '<div class="alert alert-danger">Có lỗi xảy ra khi sửa link</div>';
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-wrench"></i> Sửa tất cả Link';
            document.getElementById('results').innerHTML = '<div class="alert alert-danger">Lỗi: ' + err.message + '</div>';
        });
});
</script>
@endsection
