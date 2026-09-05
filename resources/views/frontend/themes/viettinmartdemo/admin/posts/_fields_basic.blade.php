@php
    $p = $prefix ? $prefix . '[' : '';
    $s = $prefix ? ']' : '';
    $td = $transData ?? [];
@endphp

<div class="space-y-4">
    <div>
        <label class="form-label">
            Tiêu đề <span class="text-red-500">*</span>
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        <input type="text"
               name="{{ $p }}title{{ $s }}"
               value="{{ old($p . 'title' . $s, $locale ? ($td['title'] ?? '') : ($post?->title ?? '')) }}"
               {{ !$locale ? 'required' : '' }}
               placeholder="Nhập tiêu đề bài viết..."
               class="form-input">
    </div>

    <div>
        <label class="form-label">
            Nội dung
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        @include('components.admin.editor', [
            'name'   => ($p . 'content' . $s),
            'value'  => old($p . 'content' . $s, $locale ? ($td['content'] ?? '') : ($post?->content ?? '')),
            'height' => 400,
        ])
    </div>

    <div>
        <label class="form-label">
            Tóm tắt
            @if($locale) <span class="text-xs text-gray-400 font-normal">({{ strtoupper($locale) }})</span> @endif
        </label>
        @include('components.admin.editor', [
            'name'   => ($p . 'excerpt' . $s),
            'value'  => old($p . 'excerpt' . $s, $locale ? ($td['excerpt'] ?? '') : ($post?->getRawOriginal('excerpt') ?? '')),
            'height' => 150,
        ])
    </div>

    <div class="pt-4 border-t border-slate-50">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Cấu hình SEO @if($locale) ({{ strtoupper($locale) }}) @endif</p>
        <div class="space-y-4">
            <div>
                <label class="form-label text-xs">Meta Title</label>
                <input type="text"
                       name="{{ $p }}meta_title{{ $s }}"
                       value="{{ old($p . 'meta_title' . $s, $locale ? ($td['meta_title'] ?? '') : ($post?->getRawOriginal('meta_title') ?? '')) }}"
                       placeholder="Nhập tiêu đề SEO..."
                       class="form-input !text-sm">
            </div>
            <div>
                <label class="form-label text-xs">Meta Description</label>
                <textarea name="{{ $p }}meta_description{{ $s }}"
                          rows="3"
                          placeholder="Nhập mô tả SEO..."
                          class="form-input !text-sm">{{ old($p . 'meta_description' . $s, $locale ? ($td['meta_description'] ?? '') : ($post?->meta_description ?? '')) }}</textarea>
            </div>
        </div>
    </div>
</div>
