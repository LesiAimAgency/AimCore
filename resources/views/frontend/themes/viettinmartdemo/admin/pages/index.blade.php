@extends('admin.layouts.app')
@section('title', 'Trang tĩnh')
@section('page-title', 'Trang tĩnh')
@section('page-subtitle', 'Quản lý các trang nội dung tĩnh')
@section('page-actions')
    <div style="display:flex;gap:8px;align-items:center;">
        {{-- Language Switcher --}}
        <div style="display:flex;gap:4px;background:#f8fafc;padding:4px;border-radius:8px;border:1px solid #e2e8f0;">
            @foreach($activeLanguages as $lang)
                <a href="{{ locale_route('admin.pages.index', ['locale' => $lang->code]) }}" 
                   class="btn btn-sm {{ request('locale', $defaultLocale) === $lang->code ? 'btn-primary' : 'btn-ghost' }}" 
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
        
        <div style="width:1px;height:24px;background:#e2e8f0;"></div>
        
        <a href="{{ locale_route('admin.pages.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Thêm trang
        </a>
    </div>
@endsection

@section('content')
<div class="card" style="overflow:hidden;">
    <div class="card-header">
        <p style="font-size:13px;font-weight:700;color:#374151;">Tất cả trang tĩnh</p>
    </div>
    <table style="width:100%;border-collapse:collapse;">
        <thead>
            <tr style="background:#f8fafc;border-bottom:1.5px solid #f1f5f9;">
                <th class="tbl-th">Tiêu đề</th>
                <th class="tbl-th">Đường dẫn</th>
                <th class="tbl-th">Giao diện</th>
                <th class="tbl-th">Trạng thái</th>
                <th class="tbl-th" style="text-align:right;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
            <tr class="tbl-tr">
                <td class="tbl-td" style="font-size:13.5px;font-weight:600;color:#0f172a;">{{ $page->translate('title', $locale) ?: $page->title }}</td>
                <td class="tbl-td"><code style="font-size:12px;background:#f8fafc;border:1px solid #e2e8f0;padding:3px 8px;border-radius:6px;color:#475569;">{{ $page->slug }}</code></td>
                <td class="tbl-td"><span class="badge badge-blue">{{ $page->template }}</span></td>
                <td class="tbl-td">
                    @if($page->status === 'published')
                        <span class="badge badge-green"><i class="fa-solid fa-circle" style="font-size:6px;"></i> Đã xuất bản</span>
                    @else
                        <span class="badge badge-gray"><i class="fa-solid fa-circle" style="font-size:6px;"></i> Bản nháp</span>
                    @endif
                </td>
                <td class="tbl-td" style="text-align:right;">
                    <div style="display:flex;align-items:center;justify-content:flex-end;gap:4px;">
                        <form action="{{ locale_route('admin.duplicate.item', ['type' => 'page', 'id' => $page->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="locale" value="en">
                            <button type="submit" class="act-btn" title="Sao chép sang EN" style="background-color:#eff6ff;color:#3b82f6;border:0;width:34px;height:34px;border-radius:10px;justify-content:center;align-items:center;font-size:10px;font-weight:900;display:flex;">
                                EN
                            </button>
                        </form>
                        <a href="{{ locale_route('admin.pages.edit', [$page, 'locale' => $locale]) }}" class="act-btn edit" title="Chỉnh sửa">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ locale_route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Xóa trang này?')" class="act-btn del" title="Xóa">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding:60px 20px;text-align:center;color:#94a3b8;">
                    <i class="fa-solid fa-file-lines" style="font-size:40px;opacity:.3;display:block;margin-bottom:12px;"></i>
                    <p style="font-size:14px;font-weight:600;color:#64748b;">Chưa có trang nào</p>
                    <a href="{{ locale_route('admin.pages.create') }}" style="font-size:13px;color:#2563eb;margin-top:6px;display:inline-block;">Tạo trang đầu tiên <i class="fa-solid fa-arrow-right text-[10px]"></i></a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

