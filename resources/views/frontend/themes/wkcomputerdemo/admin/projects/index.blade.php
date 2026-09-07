@extends('admin.layouts.app')

@section('title', 'Dự án')
@section('page-title', 'Dự án')
@section('page-subtitle', 'Quản lý danh sách các dự án')

@section('page-actions')
<a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
    <i class="fa-solid fa-plus"></i> Thêm mới
</a>
@endsection

@section('content')
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;align-items:center;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm dự án..."
           class="form-input" style="width:260px;">
    <select name="service_category_id" class="form-select" style="width:220px;">
        <option value="">Tất cả danh mục</option>
        @foreach($serviceCategories as $category)
            <option value="{{ $category->id }}" @selected((int) request('service_category_id') === $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-magnifying-glass"></i> Lọc
    </button>
    @if(request()->hasAny(['search', 'service_category_id']))
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">Xóa lọc</a>
    @endif
</form>

<div class="card" style="overflow:hidden;">
    <div class="card-header">
        <span class="card-title">Danh sách ({{ $projects->total() }})</span>
    </div>
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:collapse;">
            <thead class="tbl-head">
                <tr>
                    <th class="tbl-th">Dự án</th>
                    <th class="tbl-th">Danh mục</th>
                    <th class="tbl-th">Vị trí</th>
                    <th class="tbl-th">Kỹ sư</th>
                    <th class="tbl-th">Hình ảnh</th>
                    <th class="tbl-th">Thứ tự</th>
                    <th class="tbl-th" style="width:110px;text-align:right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr class="tbl-tr">
                        <td class="tbl-td">
                            <div style="display:flex;align-items:center;gap:12px;">
                                @if($project->cover_image_url)
                                    <img src="{{ $project->cover_image_url }}" alt="{{ $project->name }}" style="width:56px;height:42px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;">
                                @else
                                    <div style="width:56px;height:42px;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;color:#cbd5e1;">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                                <div>
                                    <p style="font-weight:700;color:#0f172a;">{{ $project->name }}</p>
                                    <p style="font-size:12px;color:#94a3b8;">{{ $project->typology ?: 'N/A' }}{{ $project->style ? ' / ' . $project->style : '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="tbl-td">{{ $project->serviceCategory?->name ?: 'N/A' }}</td>
                        <td class="tbl-td">{{ $project->location ?: 'N/A' }}</td>
                        <td class="tbl-td">
                            @forelse($project->engineers as $engineer)
                                <span class="badge badge-gray" style="margin:2px;">{{ $engineer->name }}</span>
                            @empty
                                <span style="color:#94a3b8;">None</span>
                            @endforelse
                        </td>
                        <td class="tbl-td">
                            <button type="button" class="badge badge-blue" style="cursor:pointer;border:none;outline:none;" 
                                    onclick="openImagesModal('{{ e(addslashes($project->name)) }}', '{{ $project->images->pluck('image_url')->toJson() }}')">
                                {{ $project->images->count() }} <i class="fa-solid fa-expand" style="margin-left:4px;font-size:10px;"></i>
                            </button>
                        </td>
                        <td class="tbl-td">{{ $project->sort_order }}</td>
                        <td class="tbl-td" style="text-align:right;">
                            <div style="display:flex;gap:6px;justify-content:flex-end;">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="act-btn edit" title="Sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa dự án này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn del" title="Xóa">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;padding:48px;color:#94a3b8;">
                            <i class="fa-solid fa-building" style="font-size:30px;opacity:.25;display:block;margin-bottom:10px;"></i>
                            Chưa có dự án nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
        <div style="padding:20px;">{{ $projects->links() }}</div>
    @endif
</div>

{{-- Modal Preview Images --}}
<div id="project-images-modal" class="modal-overlay" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);z-index:9999;align-items:center;justify-content:center;">
    <div class="modal-content" style="background:#fff;border-radius:12px;width:90%;max-width:800px;max-height:90vh;display:flex;flex-direction:column;overflow:hidden;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);">
        <div class="modal-header" style="display:flex;align-items:center;justify-content:space-between;padding:16px 24px;border-bottom:1px solid #e2e8f0;">
            <h3 id="modal-project-title" style="margin:0;font-size:18px;color:#0f172a;">Hình ảnh dự án</h3>
            <button type="button" onclick="closeImagesModal()" style="background:none;border:none;font-size:24px;color:#64748b;cursor:pointer;line-height:1;">&times;</button>
        </div>
        <div id="modal-images-grid" style="padding:24px;overflow-y:auto;display:grid;grid-template-columns:repeat(auto-fill, minmax(150px, 1fr));gap:16px;">
            <!-- Images will be injected here -->
        </div>
    </div>
</div>

<script>
function openImagesModal(title, imagesJson) {
    const modal = document.getElementById('project-images-modal');
    const titleEl = document.getElementById('modal-project-title');
    const gridEl = document.getElementById('modal-images-grid');
    
    titleEl.textContent = title;
    
    let images = [];
    try {
        images = JSON.parse(imagesJson);
    } catch(e) {}
    
    if (images.length === 0) {
        gridEl.innerHTML = '<div style="grid-column:1/-1;text-align:center;color:#94a3b8;padding:20px;">Không có hình ảnh nào.</div>';
    } else {
        gridEl.innerHTML = images.map(img => {
            const src = img.startsWith('http') || img.startsWith('/') ? img : '/' + img;
            return `<div style="border-radius:8px;overflow:hidden;border:1px solid #e2e8f0;aspect-ratio:4/3;background:#f8fafc;">
                <img src="${src}" style="width:100%;height:100%;object-fit:cover;" />
            </div>`;
        }).join('');
    }
    
    modal.style.display = 'flex';
}

function closeImagesModal() {
    document.getElementById('project-images-modal').style.display = 'none';
}

// Đóng modal khi click ra ngoài
document.getElementById('project-images-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImagesModal();
    }
});
</script>
@endsection
