@php
    $engineerPreviewValue = old('avatar') ?: $engineer->avatar_url;
    $engineerPreviewUrl = \Illuminate\Support\Str::startsWith((string) $engineerPreviewValue, 'assets/')
        ? asset('frontend/' . $engineerPreviewValue)
        : $engineerPreviewValue;
@endphp

<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fa-solid fa-user-tie" style="color:#2563eb;margin-right:8px;"></i>Thông tin chi tiết</span>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Họ và tên <span style="color:#ef4444;">*</span></label>
                <input type="text" name="name" value="{{ old('name', $engineer->name) }}" class="form-input" required>
            </div>
            <div>
                <label class="form-label">Chức vụ / Vai trò</label>
                <input type="text" name="role" value="{{ old('role', $engineer->role) }}" class="form-input" placeholder="VD: Kiến trúc sư trưởng, Giám đốc dự án...">
            </div>
            <div>
                <label class="form-label">Ảnh đại diện</label>
                <input type="hidden" name="avatar" id="engineer_avatar" value="{{ old('avatar', $engineer->avatar) }}">
                <button type="button" class="btn btn-secondary" onclick="openMediaPicker('engineer_avatar', function(url){ setAdminImagePreview('engineer-avatar-preview', url, 'avatar'); })">
                    <i class="fa-solid fa-images"></i> Chọn ảnh
                </button>
                <p class="form-hint">Tải lên hoặc chọn ảnh từ thư viện.</p>
            </div>
            <div>
                <label class="form-label">Xem trước</label>
                <div id="engineer-avatar-preview" style="min-height:80px;display:flex;align-items:center;gap:12px;">
                    @if($engineerPreviewUrl)
                        <img src="{{ $engineerPreviewUrl }}" alt="" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:1px solid #e2e8f0;">
                        <label style="display:flex;align-items:center;gap:8px;font-size:12px;color:#64748b;">
                            <input type="checkbox" name="remove_avatar" value="1"> Xóa ảnh hiện tại
                        </label>
                    @else
                        <span style="color:#94a3b8;font-size:12px;">Chưa chọn ảnh.</span>
                    @endif
                </div>
            </div>
            <div class="sm:col-span-2">
                <label class="form-label">Mô tả thêm</label>
                @include('components.admin.editor', [
                    'name'   => 'description',
                    'value'  => old('description', $engineer->description ?? ''),
                    'height' => 200,
                ])
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
