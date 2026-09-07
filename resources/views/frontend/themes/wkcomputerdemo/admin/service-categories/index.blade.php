@extends('admin.layouts.app')

@section('title', 'Dịch vụ')
@section('page-title', 'Dịch vụ')
@section('page-subtitle', 'Quản lý các danh mục dịch vụ hiển thị trên trang')

@section('page-actions')
<a href="{{ locale_route('admin.service-categories.create') }}" class="btn btn-primary btn-sm">
    <i class="fa-solid fa-plus"></i> Thêm mới
</a>
@endsection

@section('content')
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;align-items:center;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm tên, đường dẫn..."
           class="form-input" style="width:280px;">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-magnifying-glass"></i> Lọc
    </button>
    @if(request()->has('search'))
        <a href="{{ locale_route('admin.service-categories.index') }}" class="btn btn-secondary btn-sm">Xóa lọc</a>
    @endif
</form>

<div class="card" style="overflow:hidden;">
    <div class="card-header">
        <span class="card-title">Danh sách ({{ $serviceCategories->total() }})</span>
    </div>
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:collapse;">
            <thead class="tbl-head">
                <tr>
                    <th class="tbl-th">Dịch vụ</th>
                    <th class="tbl-th">Đường dẫn</th>
                    <th class="tbl-th">Dự án</th>
                    <th class="tbl-th">Thứ tự</th>
                    <th class="tbl-th" style="width:110px;text-align:right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($serviceCategories as $category)
                    <tr class="tbl-tr">
                        <td class="tbl-td">
                            <div style="display:flex;align-items:center;gap:12px;">
                                @if($category->image_url)
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" style="width:48px;height:48px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;">
                                @else
                                    <div style="width:48px;height:48px;border-radius:8px;background:#f8fafc;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;color:#cbd5e1;">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                                <div>
                                    <p style="font-weight:700;color:#0f172a;">{{ $category->name }}</p>
                                    <p style="font-size:12px;color:#94a3b8;">{{ Str::limit($category->description, 80) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="tbl-td">{{ $category->slug }}</td>
                        <td class="tbl-td"><span class="badge badge-blue">{{ $category->projects_count }}</span></td>
                        <td class="tbl-td">{{ $category->sort_order }}</td>
                        <td class="tbl-td" style="text-align:right;">
                            <div style="display:flex;gap:6px;justify-content:flex-end;">
                                <a href="{{ locale_route('admin.service-categories.edit', $category) }}" class="act-btn edit" title="Sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ locale_route('admin.service-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa dịch vụ này và các dự án của nó?')">
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
                        <td colspan="5" style="text-align:center;padding:48px;color:#94a3b8;">
                            <i class="fa-solid fa-briefcase" style="font-size:30px;opacity:.25;display:block;margin-bottom:10px;"></i>
                            Chưa có dịch vụ nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($serviceCategories->hasPages())
        <div style="padding:20px;">{{ $serviceCategories->links() }}</div>
    @endif
</div>
@endsection
