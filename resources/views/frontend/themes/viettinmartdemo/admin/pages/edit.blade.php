@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa trang')
@section('page-title', 'Chỉnh sửa: ' . $page->title)
@section('page-subtitle', 'Cập nhật nội dung trang')
@section('page-actions')
    <div style="display:flex;gap:8px;align-items:center;">
        {{-- Language Switcher --}}
        <div style="display:flex;gap:4px;background:#f8fafc;padding:4px;border-radius:8px;border:1px solid #e2e8f0;">
            @foreach($activeLanguages as $lang)
                <a href="{{ locale_route('admin.pages.edit', [$page, 'locale' => $lang->code, 'edits' => 1]) }}" 
                   class="btn btn-sm {{ $locale === $lang->code ? 'btn-primary' : 'btn-ghost' }}" 
                   style="font-size:11px;padding:6px 12px;min-width:auto;">
                    @if($lang->flag_emoji)
                        <span style="font-size:12px;">{{ $lang->flag_emoji }}</span>
                    @elseif($lang->flag_url)
                        <img src="{{ $lang->flag_url }}" style="width:14px;height:14px;object-fit:cover;border-radius:2px;">
                    @endif
                    <span>{{ strtoupper($lang->code) }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
<form action="{{ locale_route('admin.pages.update', [$page, 'locale' => $locale, 'edits' => 1]) }}" method="POST">
    @csrf @method('PUT')
    @include('admin.pages._form', ['page' => $page])
    <div class="flex justify-end gap-3 mt-6">
        <a href="{{ locale_route('admin.pages.index', ['locale' => $locale]) }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Hủy
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi
        </button>
    </div>
</form>
@endsection

