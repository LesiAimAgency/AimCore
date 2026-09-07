@extends('admin.layouts.app')

@section('title', 'Chuyên gia & Kỹ sư')
@section('page-title', 'Chuyên gia & Kỹ sư')
@section('page-subtitle', 'Quản lý danh sách chuyên gia/kỹ sư của dự án')

@section('page-actions')
<a href="{{ locale_route('admin.engineers.create') }}" class="btn btn-primary btn-sm">
    <i class="fa-solid fa-plus"></i> Thêm mới
</a>
@endsection

@section('content')
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;align-items:center;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm tên, chức vụ..."
           class="form-input" style="width:280px;">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-magnifying-glass"></i> Lọc
    </button>
    @if(request()->has('search'))
        <a href="{{ locale_route('admin.engineers.index') }}" class="btn btn-secondary btn-sm">Xóa lọc</a>
    @endif
</form>

<div class="card" style="overflow:hidden;">
    <div class="card-header">
        <span class="card-title">Danh sách ({{ $engineers->total() }})</span>
    </div>
    <div class="tbl-wrap">
        <table style="width:100%;border-collapse:collapse;">
            <thead class="tbl-head">
                <tr>
                    <th class="tbl-th">Họ và tên</th>
                    <th class="tbl-th">Chức vụ</th>
                    <th class="tbl-th">Dự án</th>
                    <th class="tbl-th" style="width:110px;text-align:right;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($engineers as $engineer)
                    <tr class="tbl-tr">
                        <td class="tbl-td">
                            <div style="display:flex;align-items:center;gap:12px;">
                                @if($engineer->avatar_url)
                                    <img src="{{ $engineer->avatar_url }}" alt="{{ $engineer->name }}" style="width:44px;height:44px;border-radius:50%;object-fit:cover;border:1px solid #e2e8f0;">
                                @else
                                    <div style="width:44px;height:44px;border-radius:50%;background:#2563eb;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;">
                                        {{ strtoupper(substr($engineer->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <p style="font-weight:700;color:#0f172a;">{{ $engineer->name }}</p>
                                    <p style="font-size:12px;color:#94a3b8;">{{ Str::limit($engineer->description, 80) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="tbl-td">{{ $engineer->role ?: 'N/A' }}</td>
                        <td class="tbl-td"><span class="badge badge-blue">{{ $engineer->projects_count }}</span></td>
                        <td class="tbl-td" style="text-align:right;">
                            <div style="display:flex;gap:6px;justify-content:flex-end;">
                                <a href="{{ locale_route('admin.engineers.edit', $engineer) }}" class="act-btn edit" title="Sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ locale_route('admin.engineers.destroy', $engineer) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người này?')">
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
                        <td colspan="4" style="text-align:center;padding:48px;color:#94a3b8;">
                            <i class="fa-solid fa-user-tie" style="font-size:30px;opacity:.25;display:block;margin-bottom:10px;"></i>
                            Chưa có dữ liệu.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($engineers->hasPages())
        <div style="padding:20px;">{{ $engineers->links() }}</div>
    @endif
</div>
@endsection
