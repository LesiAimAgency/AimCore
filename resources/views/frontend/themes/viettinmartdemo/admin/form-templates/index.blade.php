@extends('admin.layouts.app')
@section('title', 'Form Templates')
@section('page-title', 'Form Templates')
@section('page-subtitle', 'Quản lý các mẫu form có thể tái sử dụng')

@section('page-actions')
    <a href="{{ locale_route('admin.form-templates.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tạo Form Template
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Danh sách Form Templates ({{ $templates->total() }})</span>
    </div>
    <div class="card-body">
        @if($templates->count() > 0)
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <thead class="tbl-head">
                        <tr>
                            <th class="tbl-th">Tên</th>
                            <th class="tbl-th">Mô tả</th>
                            <th class="tbl-th">Số Fields</th>
                            <th class="tbl-th">Trạng thái</th>
                            <th class="tbl-th">Submissions</th>
                            <th class="tbl-th">Ngày tạo</th>
                            <th class="tbl-th">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($templates as $template)
                        <tr class="tbl-tr">
                            <td class="tbl-td">{{ $template->name }}</td>
                            <td class="tbl-td">{{ $template->description }}</td>
                            <td class="tbl-td">
                                <span class="badge badge-blue">{{ count($template->fields) }} fields</span>
                            </td>
                            <td class="tbl-td">
                                @if($template->is_active)
                                    <span class="badge badge-green">Hoạt động</span>
                                @else
                                    <span class="badge badge-gray">Tạm dừng</span>
                                @endif
                            </td>
                            <td class="tbl-td">
                                <a href="{{ locale_route('admin.form-templates.submissions', $template) }}" class="text-blue-600 hover:underline">
                                    {{ $template->submissions_count }} submissions
                                </a>
                            </td>
                            <td class="tbl-td">{{ $template->created_at->format('d/m/Y H:i') }}</td>
                            <td class="tbl-td">
                                <a href="{{ locale_route('admin.form-templates.show', $template) }}" class="act-btn view">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ locale_route('admin.form-templates.edit', $template) }}" class="act-btn edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ locale_route('admin.form-templates.destroy', $template) }}" method="POST" 
                                      style="display:inline;" onsubmit="return confirm('Xóa form template này?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="act-btn del">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $templates->links() }}
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="fa-solid fa-wpforms fa-3x mb-3 opacity-50"></i>
                <p>Chưa có form template nào. <a href="{{ locale_route('admin.form-templates.create') }}">Tạo form template đầu tiên</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
