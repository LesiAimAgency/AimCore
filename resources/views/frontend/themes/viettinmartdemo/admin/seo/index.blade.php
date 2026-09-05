@extends('admin.layouts.app')

@section('title', 'SEO Manager')
@section('page-title', 'SEO Manager')
@section('page-subtitle', 'Quản lý meta title, description, OG image cho toàn bộ nội dung')

@section('content')

{{-- Type tabs --}}
<div style="display:flex;gap:4px;margin-bottom:20px;background:#f1f5f9;padding:4px;border-radius:12px;width:fit-content;">
    @foreach(['products' => [__('common.products'),'fa-box'], 'pages' => ['Trang tĩnh','fa-file'], 'posts' => ['Bài viết','fa-newspaper'], 'categories' => ['Chuyên mục','fa-folder']] as $t => [$label, $icon])
    <a href="{{ request()->fullUrlWithQuery(['type' => $t, 'page' => 1]) }}"
       style="padding:8px 16px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;transition:all .15s;{{ $type === $t ? 'background:#fff;color:#0f172a;box-shadow:0 1px 3px rgba(0,0,0,.1);' : 'color:#64748b;' }}">
        <i class="fa-solid {{ $icon }}" style="font-size:11px;"></i> {{ $label }}
    </a>
    @endforeach
</div>

{{-- Search --}}
<form method="GET" style="margin-bottom:16px;display:flex;gap:8px;">
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="text" name="search" value="{{ $search }}" placeholder="search..." class="form-input" style="max-width:320px;">
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-search"></i></button>
    @if($search)
    <a href="{{ request()->fullUrlWithQuery(['search' => '']) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-xmark"></i></a>
    @endif
</form>

<form method="POST" action="{{ locale_route('admin.seo.bulk-update') }}">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">

    <div class="card">
        <div class="card-header">
            <span class="card-title">{{ $items->total() }} mục — {{ ucfirst($type) }}</span>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk"></i> Lưu tất cả
            </button>
        </div>
        <div class="tbl-wrap">
            <table style="width:100%;border-collapse:collapse;">
                <thead class="tbl-head">
                    <tr>
                        <th class="tbl-th" style="width:220px;">Tên / Tiêu đề</th>
                        <th class="tbl-th">Meta Title</th>
                        <th class="tbl-th">Meta Description</th>
                        <th class="tbl-th" style="width:80px;">Trạng thái</th>
                        <th class="tbl-th" style="width:60px;">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    @php
                        $name = $item->name ?? $item->title ?? '—';
                        $metaTitle = $item->meta_title ?? '';
                        $metaDesc  = $item->meta_description ?? '';
                        $status    = $item->status ?? ($item->is_active ?? true);
                        $editRoute = match($type) {
                            'posts'      => locale_route('admin.posts.edit', $item->id),
                            'pages'      => locale_route('admin.pages.edit', $item->id),
                            'products'   => locale_route('admin.products.edit', $item->id),
                            default      => '#',
                        };
                        $titleScore = strlen($metaTitle) >= 30 && strlen($metaTitle) <= 60;
                        $descScore  = strlen($metaDesc) >= 70 && strlen($metaDesc) <= 160;
                    @endphp
                    <tr class="tbl-tr">
                        <td class="tbl-td">
                            <p style="font-size:13px;font-weight:600;color:#0f172a;margin:0 0 2px;">{{ Str::limit($name, 40) }}</p>
                            <p style="font-size:11px;color:#94a3b8;margin:0;font-family:monospace;">{{ $item->slug ?? '' }}</p>
                        </td>
                        <td class="tbl-td">
                            <input type="text"
                                   name="items[{{ $item->id }}][meta_title]"
                                   value="{{ $metaTitle }}"
                                   placeholder="Để trống = dùng tên mặc định"
                                   class="form-input"
                                   style="font-size:12px;padding:6px 10px;"
                                   maxlength="70">
                            <p class="form-hint" style="margin-top:3px;">
                                <span style="color:{{ $titleScore ? '#22c55e' : '#f59e0b' }};">
                                    {{ strlen($metaTitle) }}/60 ký tự
                                    @if($titleScore) ✓ @else (tối ưu: 30-60) @endif
                                </span>
                            </p>
                        </td>
                        <td class="tbl-td">
                            <textarea name="items[{{ $item->id }}][meta_description]"
                                      placeholder="Mô tả ngắn cho Google..."
                                      class="form-textarea"
                                      style="font-size:12px;padding:6px 10px;min-height:60px;resize:vertical;"
                                      maxlength="200">{{ $metaDesc }}</textarea>
                            <p class="form-hint" style="margin-top:3px;">
                                <span style="color:{{ $descScore ? '#22c55e' : '#f59e0b' }};">
                                    {{ strlen($metaDesc) }}/160 ký tự
                                    @if($descScore) ✓ @else (tối ưu: 70-160) @endif
                                </span>
                            </p>
                        </td>
                        <td class="tbl-td" style="text-align:center;">
                            @if($status === 'published' || $status === true || $status === 1)
                                <span class="badge badge-green">Active</span>
                            @else
                                <span class="badge badge-gray">Draft</span>
                            @endif
                        </td>
                        <td class="tbl-td" style="text-align:center;">
                            @if($editRoute !== '#')
                            <a href="{{ $editRoute }}" class="act-btn edit" title="Chỉnh sửa chi tiết">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding:40px;text-align:center;color:#94a3b8;font-size:14px;">
                            no_data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top:16px;display:flex;justify-content:space-between;align-items:center;">
        {{ $items->withQueryString()->links() }}
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i> Lưu tất cả thay đổi
        </button>
    </div>
</form>

@endsection

@push('scripts')
<script>
// Live character counter
document.querySelectorAll('input[name*="meta_title"], textarea[name*="meta_description"]').forEach(el => {
    el.addEventListener('input', function() {
        const hint = this.closest('td').querySelector('.form-hint span');
        if (!hint) return;
        const len = this.value.length;
        const isTitle = this.tagName === 'INPUT';
        const [min, max] = isTitle ? [30, 60] : [70, 160];
        const ok = len >= min && len <= max;
        hint.style.color = ok ? '#22c55e' : '#f59e0b';
        hint.textContent = `${len}/${max} ký tự ${ok ? '✓' : `(tối ưu: ${min}-${max})`}`;
    });
});
</script>
@endpush

