@php
    $selectedEngineerIds = collect(old('engineers', $selectedEngineers ?? []))->map(fn ($id) => (int) $id)->all();
    $projectImageValues = old('images_raw') !== null
        ? collect(preg_split('/\r\n|\r|\n/', (string) old('images_raw')))->map(fn ($url) => trim($url))->filter()->values()->all()
        : ($project->exists ? $project->images->map(fn ($image) => $image->image_url ?: $image->image)->values()->all() : []);
    $projectDetailValues = old('details') !== null
        ? collect(old('details'))->map(fn ($item) => [
            'label' => trim((string) ($item['label'] ?? '')),
            'value' => trim((string) ($item['value'] ?? '')),
        ])->filter(fn ($item) => $item['label'] !== '' || $item['value'] !== '')->values()->all()
        : ($project->exists ? $project->detail_rows : [
            ['label' => 'Total Area', 'value' => ''],
            ['label' => 'Location', 'value' => ''],
            ['label' => 'Typology', 'value' => ''],
            ['label' => 'Style', 'value' => ''],
            ['label' => 'Tech Solution', 'value' => ''],
        ]);
@endphp

<div class="flex flex-col lg:flex-row gap-5 items-start">
    <div class="flex-1 w-full flex flex-col gap-4">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fa-solid fa-building" style="color:#2563eb;margin-right:8px;"></i>Thông tin dự án</span>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Danh mục dịch vụ <span style="color:#ef4444;">*</span></label>
                        <select name="service_category_id" class="form-select" required>
                            <option value="">Chọn danh mục</option>
                            @foreach($serviceCategories as $category)
                                <option value="{{ $category->id }}" @selected((int) old('service_category_id', $project->service_category_id) === $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if($serviceCategories->isEmpty())
                            <p class="form-hint">Hãy tạo danh mục trước khi thêm dự án.</p>
                        @endif
                    </div>
                    <div>
                        <label class="form-label">Thứ tự hiển thị</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0" class="form-input">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="form-label">Tên dự án <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}" class="form-input" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="form-label">Mô tả</label>
                        @include('components.admin.editor', [
                            'name' => 'description',
                            'value' => old('description', $project->description),
                            'height' => 260,
                        ])
                    </div>
                </div>
            </div>
        </div>

        <div class="card" x-data="projectDetailsManager(@js($projectDetailValues))">
            <div class="card-header">
                <span class="card-title"><i class="fa-solid fa-list-check" style="color:#2563eb;margin-right:8px;"></i>Thông tin chi tiết</span>
                <button type="button" class="btn btn-primary btn-sm" @click="addDetail()">
                    <i class="fa-solid fa-plus"></i> Thêm dòng
                </button>
            </div>
            <div class="card-body">
                <p class="form-hint" style="margin-bottom:12px;">Những thông tin này sẽ hiển thị ở trang chi tiết dự án. Bạn có thể thêm, sửa, xóa, và thay đổi thứ tự.</p>

                <template x-if="details.length === 0">
                    <div style="border:1px dashed #cbd5e1;border-radius:10px;padding:22px;text-align:center;color:#94a3b8;background:#f8fafc;">
                        Chưa có thông tin nào. Thêm một vài dòng để hiển thị thông tin dự án.
                    </div>
                </template>

                <div style="display:flex;flex-direction:column;gap:10px;">
                    <template x-for="(detail, index) in details" :key="detail.id">
                        <div class="grid grid-cols-1 sm:grid-cols-[minmax(130px,220px)_minmax(0,1fr)_auto] gap-2 items-start p-2.5 border border-slate-200 rounded-lg bg-slate-50">
                            <input type="text" class="form-input" :name="`details[${index}][label]`" x-model="detail.label" placeholder="Tiêu đề, VD: Diện tích">
                            <textarea class="form-textarea" rows="2" :name="`details[${index}][value]`" x-model="detail.value" placeholder="Giá trị"></textarea>
                            <div style="display:flex;gap:6px;">
                                <button type="button" class="btn btn-secondary btn-sm" @click="moveDetail(index, -1)" :disabled="index === 0" title="Lên trên">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button" class="btn btn-secondary btn-sm" @click="moveDetail(index, 1)" :disabled="index === details.length - 1" title="Xuống dưới">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" @click="removeDetail(index)" title="Xóa">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="card" x-data="projectImageManager(@js($projectImageValues))" x-init="syncInput()">
            <div class="card-header">
                <span class="card-title"><i class="fa-solid fa-images" style="color:#2563eb;margin-right:8px;"></i>Hình ảnh dự án</span>
                <button type="button" class="btn btn-primary btn-sm" @click="addImage()">
                    <i class="fa-solid fa-images"></i> Thêm ảnh
                </button>
            </div>
            <div class="card-body">
                <p class="form-hint" style="margin-bottom:12px;">Hình ảnh sẽ được chọn hoặc tải lên thông qua Thư viện Media.</p>

                <input type="hidden" name="images_raw" id="project_images_raw_input" :value="gallery.join('\n')">

                <template x-if="gallery.length === 0">
                    <div style="border:1px dashed #cbd5e1;border-radius:10px;padding:28px;text-align:center;color:#94a3b8;background:#f8fafc;">
                        <i class="fa-solid fa-images" style="font-size:26px;display:block;margin-bottom:8px;opacity:.45;"></i>
                        Chưa chọn hình ảnh nào.
                    </div>
                </template>

                <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(170px,1fr));">
                    <template x-for="(image, index) in gallery" :key="image + index">
                        <div style="border:1px solid #e2e8f0;border-radius:10px;padding:10px;background:#f8fafc;">
                            <img :src="image" alt="" style="width:100%;height:110px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;background:#fff;">
                            <div style="display:flex;gap:6px;margin-top:10px;">
                                <button type="button" class="btn btn-secondary btn-sm" style="flex:1;justify-content:center;" @click="moveImage(index, -1)" :disabled="index === 0">
                                    <i class="fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button" class="btn btn-secondary btn-sm" style="flex:1;justify-content:center;" @click="moveImage(index, 1)" :disabled="index === gallery.length - 1">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" style="flex:1;justify-content:center;" @click="removeImage(index)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-[340px] shrink-0 flex flex-col gap-4">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fa-solid fa-user-tie" style="color:#2563eb;margin-right:8px;"></i>Kỹ sư / Chuyên gia</span>
            </div>
            <div class="card-body">
                @forelse($engineers as $engineer)
                    <label style="display:flex;align-items:flex-start;gap:10px;padding:10px 0;border-bottom:1px solid #f1f5f9;">
                        <input type="checkbox" name="engineers[]" value="{{ $engineer->id }}" @checked(in_array($engineer->id, $selectedEngineerIds, true)) style="margin-top:3px;">
                        <span>
                            <span style="display:block;font-weight:700;color:#0f172a;">{{ $engineer->name }}</span>
                            <span style="display:block;font-size:12px;color:#94a3b8;">{{ $engineer->role ?: 'Chưa cài chức vụ' }}</span>
                        </span>
                    </label>
                @empty
                    <p style="font-size:12px;color:#94a3b8;">Chưa có kỹ sư nào. Bạn có thể tạo trong mục Chuyên gia & Kỹ sư.</p>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p style="font-size:12px;color:#64748b;line-height:1.6;">
                    Giao diện website sẽ hiển thị danh sách kỹ sư được chỉ định. Nếu dự án không có kỹ sư thì phần này sẽ tự động được ẩn.
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
window.projectImageManager = function(initialImages) {
    return {
        gallery: Array.isArray(initialImages) ? initialImages.filter(Boolean) : [],
        syncInput() {
            const input = document.getElementById('project_images_raw_input');
            if (input) input.value = this.gallery.join('\n');
        },
        addImage() {
            openMediaPicker(null, (urls) => {
                if (!Array.isArray(urls)) urls = [urls];
                urls.forEach(url => {
                    if (url && !this.gallery.includes(url)) {
                        this.gallery.push(url);
                        this.syncInput();
                    }
                });
            }, true);
        },
        removeImage(index) {
            this.gallery.splice(index, 1);
            this.syncInput();
        },
        moveImage(index, direction) {
            const nextIndex = index + direction;
            if (nextIndex < 0 || nextIndex >= this.gallery.length) return;
            const current = this.gallery[index];
            this.gallery.splice(index, 1);
            this.gallery.splice(nextIndex, 0, current);
            this.syncInput();
        }
    };
};

window.projectDetailsManager = function(initialDetails) {
    return {
        details: Array.isArray(initialDetails)
            ? initialDetails.map((detail, index) => ({
                id: `${Date.now()}_${index}_${Math.random().toString(16).slice(2)}`,
                label: detail.label || '',
                value: detail.value || '',
            }))
            : [],
        addDetail() {
            this.details.push({
                id: `${Date.now()}_${Math.random().toString(16).slice(2)}`,
                label: '',
                value: '',
            });
        },
        removeDetail(index) {
            this.details.splice(index, 1);
        },
        moveDetail(index, direction) {
            const nextIndex = index + direction;
            if (nextIndex < 0 || nextIndex >= this.details.length) return;
            const current = this.details[index];
            this.details.splice(index, 1);
            this.details.splice(nextIndex, 0, current);
        }
    };
};
</script>
@endpush
