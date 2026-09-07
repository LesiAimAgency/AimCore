@php
    $categoryPreviewValue = old('image') ?: $serviceCategory->image_url;
    $categoryPreviewUrl = \Illuminate\Support\Str::startsWith((string) $categoryPreviewValue, 'assets/')
        ? asset('frontend/' . $categoryPreviewValue)
        : $categoryPreviewValue;
@endphp

<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fa-solid fa-briefcase" style="color:#2563eb;margin-right:8px;"></i>Thông tin Dịch vụ</span>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Tên dịch vụ <span style="color:#ef4444;">*</span></label>
                <input type="text" name="name" value="{{ old('name', $serviceCategory->name) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Tiền tố tiêu đề</label>
                <input type="text" name="title_prefix" value="{{ old('title_prefix', $serviceCategory->title_prefix) }}" class="form-input" placeholder="VD: We">
            </div>
            <div>
                <label class="form-label">Hậu tố tiêu đề</label>
                <input type="text" name="title_suffix" value="{{ old('title_suffix', $serviceCategory->title_suffix) }}" class="form-input" placeholder="VD: Solutions">
            </div>
            <div>
                <label class="form-label">Đường dẫn (Slug)</label>
                <input type="text" name="slug" value="{{ old('slug', $serviceCategory->slug) }}" class="form-input" placeholder="Tự động tạo nếu để trống">
            </div>
            <div>
                <label class="form-label">Thứ tự hiển thị</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $serviceCategory->sort_order ?? 0) }}" min="0" class="form-input">
            </div>
            <div>
                <label class="form-label">Hình ảnh</label>
                <input type="hidden" name="image" id="service_category_image" value="{{ old('image', $serviceCategory->image) }}">
                <button type="button" class="btn btn-secondary" onclick="openMediaPicker('service_category_image', function(url){ setAdminImagePreview('category-image-preview', url, 'category'); })">
                    <i class="fa-solid fa-images"></i> Chọn ảnh
                </button>
                <p class="form-hint">Tải lên hoặc chọn ảnh từ thư viện.</p>
            </div>
            <div class="sm:col-span-2">
                <label class="form-label">Mô tả</label>
                @include('components.admin.editor', [
                    'name'   => 'description',
                    'value'  => old('description', $serviceCategory->description ?? ''),
                    'height' => 200,
                ])
            </div>
            <div class="sm:col-span-2">
                <label class="form-label">Xem trước</label>
                <div id="category-image-preview" style="min-height:80px;display:flex;align-items:center;gap:12px;">
                    @if($categoryPreviewUrl)
                        <img src="{{ $categoryPreviewUrl }}" alt="" style="width:120px;height:80px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;">
                        <label style="display:flex;align-items:center;gap:8px;font-size:12px;color:#64748b;">
                            <input type="checkbox" name="remove_image" value="1"> Xóa ảnh hiện tại
                        </label>
                    @else
                        <span style="color:#94a3b8;font-size:12px;">Chưa chọn ảnh.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function setAdminImagePreview(previewId, url, type) {
    const preview = document.getElementById(previewId);
    if (!preview) return;
    const radius = type === 'avatar' ? '50%' : '8px';
    const width = type === 'avatar' ? '80px' : '120px';
    preview.innerHTML = url
        ? '<img src="' + url + '" style="width:' + width + ';height:80px;border-radius:' + radius + ';object-fit:cover;border:1px solid #e2e8f0;">'
        : '<span style="color:#94a3b8;font-size:12px;">Chưa chọn ảnh.</span>';
}
</script>
@endpush
