@extends('admin.layouts.app')
@section('title', 'Modal Forms')
@section('page-title', 'Modal Forms')
@section('page-subtitle', 'Quản lý popup modal với form thu thập thông tin')

@section('page-actions')
    <a href="{{ locale_route('admin.modal-forms.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tạo Modal Form
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Danh sách Modal Forms ({{ $forms->total() }})</span>
    </div>
    <div class="card-body">
        @if($forms->count() > 0)
            <div class="tbl-wrap">
                <table style="width:100%;border-collapse:collapse;">
                    <thead class="tbl-head">
                        <tr>
                            <th class="tbl-th">Tên</th>
                            <th class="tbl-th">Tiêu đề</th>
                            <th class="tbl-th">Trigger</th>
                            <th class="tbl-th">Trạng thái</th>
                            <th class="tbl-th">Submissions</th>
                            <th class="tbl-th">Ngày tạo</th>
                            <th class="tbl-th">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forms as $form)
                        <tr class="tbl-tr">
                            <td class="tbl-td">{{ $form->name }}</td>
                            <td class="tbl-td">{{ $form->title }}</td>
                            <td class="tbl-td">
                                <span class="badge badge-blue">{{ ucfirst($form->trigger_type) }}</span>
                                @if($form->trigger_type === 'delay')
                                    <small>({{ $form->trigger_delay }}s)</small>
                                @elseif($form->trigger_type === 'scroll')
                                    <small>({{ $form->trigger_scroll }}%)</small>
                                @endif
                            </td>
                            <td class="tbl-td">
                                @if($form->is_active)
                                    <span class="badge badge-green">Hoạt động</span>
                                @else
                                    <span class="badge badge-gray">Tạm dừng</span>
                                @endif
                            </td>
                            <td class="tbl-td">
                                <a href="{{ locale_route('admin.modal-forms.submissions', $form) }}" class="text-blue-600 hover:underline">
                                    {{ $form->submissions_count }} submissions
                                </a>
                            </td>
                            <td class="tbl-td">{{ $form->created_at->format('d/m/Y H:i') }}</td>
                            <td class="tbl-td">
                                <a href="{{ locale_route('admin.modal-forms.show', $form) }}" class="act-btn view">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ locale_route('admin.modal-forms.edit', $form) }}" class="act-btn edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ locale_route('admin.modal-forms.destroy', $form) }}" method="POST" 
                                      style="display:inline;" onsubmit="return confirm('Xóa modal form này?')">
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
                {{ $forms->links() }}
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <i class="fa-solid fa-window-maximize fa-3x mb-3 opacity-50"></i>
                <p>Chưa có modal form nào. <a href="{{ locale_route('admin.modal-forms.create') }}">Tạo modal form đầu tiên</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
