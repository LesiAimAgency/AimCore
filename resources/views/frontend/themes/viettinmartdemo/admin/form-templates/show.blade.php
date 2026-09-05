@extends('admin.layouts.app')
@section('title', 'Chi tiết Form Template')
@section('page-title', $formTemplate->name)
@section('page-subtitle', 'Chi tiết và submissions của form template')

@section('page-actions')
    <a href="{{ locale_route('admin.form-templates.edit', $formTemplate) }}" class="btn btn-primary">
        <i class="fa-solid fa-pen"></i> Chỉnh sửa
    </a>
    <a href="{{ locale_route('admin.form-templates.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
<div class="row" style="gap: 20px;">
    <!-- Left Column: Form Info -->
    <div class="col-lg-8">
        <!-- Basic Info -->
        <div class="card">
            <div class="card-header">
                <span class="card-title">Thông tin Form Template</span>
            </div>
            <div class="card-body">
                <div class="row" style="gap: 16px;">
                    <div class="col-6">
                        <label class="form-label">Tên</label>
                        <p class="font-medium">{{ $formTemplate->name }}</p>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Trạng thái</label>
                        <p>
                            @if($formTemplate->is_active)
                                <span class="badge badge-green">Hoạt động</span>
                            @else
                                <span class="badge badge-gray">Tạm dừng</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Mô tả</label>
                        <p>{{ $formTemplate->description ?: 'Không có mô tả' }}</p>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Số Fields</label>
                        <p><span class="badge badge-blue">{{ count($formTemplate->fields) }} fields</span></p>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Ngày tạo</label>
                        <p>{{ $formTemplate->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="card mt-4">
            <div class="card-header">
                <span class="card-title">Form Fields ({{ count($formTemplate->fields) }})</span>
            </div>
            <div class="card-body">
                @if(count($formTemplate->fields) > 0)
                    <div class="tbl-wrap">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead class="tbl-head">
                                <tr>
                                    <th class="tbl-th">Field Name</th>
                                    <th class="tbl-th">Label</th>
                                    <th class="tbl-th">Type</th>
                                    <th class="tbl-th">Width</th>
                                    <th class="tbl-th">Required</th>
                                    <th class="tbl-th">Placeholder</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($formTemplate->fields as $field)
                                <tr class="tbl-tr">
                                    <td class="tbl-td"><code>{{ $field['name'] }}</code></td>
                                    <td class="tbl-td">{{ $field['label'] }}</td>
                                    <td class="tbl-td">
                                        <span class="badge badge-blue">{{ $field['type'] }}</span>
                                    </td>
                                    <td class="tbl-td">{{ $field['width'] ?? '12' }} cols</td>
                                    <td class="tbl-td">
                                        @if($field['required'] ?? false)
                                            <span class="badge badge-red">Required</span>
                                        @else
                                            <span class="badge badge-gray">Optional</span>
                                        @endif
                                    </td>
                                    <td class="tbl-td">{{ $field['placeholder'] ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-4">Chưa có field nào được định nghĩa</p>
                @endif
            </div>
        </div>

        <!-- Recent Submissions -->
        <div class="card mt-4">
            <div class="card-header">
                <span class="card-title">Submissions gần đây</span>
                <a href="{{ locale_route('admin.form-templates.submissions', $formTemplate) }}" class="btn btn-sm btn-ghost">
                    Xem tất cả ({{ $submissions->total() }})
                </a>
            </div>
            <div class="card-body">
                @if($submissions->count() > 0)
                    <div class="tbl-wrap">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead class="tbl-head">
                                <tr>
                                    <th class="tbl-th">ID</th>
                                    <th class="tbl-th">Source</th>
                                    <th class="tbl-th">Data</th>
                                    <th class="tbl-th">Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissions->take(5) as $submission)
                                <tr class="tbl-tr">
                                    <td class="tbl-td">#{{ $submission->id }}</td>
                                    <td class="tbl-td">
                                        <span class="badge badge-blue">{{ $submission->source }}</span>
                                    </td>
                                    <td class="tbl-td">
                                        <small>{{ Str::limit(json_encode($submission->data), 50) }}</small>
                                    </td>
                                    <td class="tbl-td">{{ $submission->submitted_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-4">Chưa có submission nào</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Right Column: Actions & Preview -->
    <div class="col-lg-4">
        <!-- Actions -->
        <div class="card">
            <div class="card-header">
                <span class="card-title">Thao tác</span>
            </div>
            <div class="card-body">
                <a href="{{ locale_route('admin.form-templates.edit', $formTemplate) }}" class="btn btn-primary w-100 mb-2">
                    <i class="fa-solid fa-pen"></i> Chỉnh sửa
                </a>
                
                <a href="{{ locale_route('admin.form-templates.submissions', $formTemplate) }}" class="btn btn-ghost w-100 mb-2">
                    <i class="fa-solid fa-list"></i> Xem Submissions ({{ $formTemplate->submissions()->count() }})
                </a>
                
                @if($formTemplate->submissions()->count() > 0)
                <a href="{{ locale_route('admin.form-templates.export', $formTemplate) }}" class="btn btn-ghost w-100 mb-2">
                    <i class="fa-solid fa-download"></i> Export CSV
                </a>
                @endif
                
                <form action="{{ locale_route('admin.form-templates.destroy', $formTemplate) }}" method="POST" 
                      onsubmit="return confirm('Xóa form template này? Tất cả submissions sẽ bị xóa theo.')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fa-solid fa-trash"></i> Xóa Form Template
                    </button>
                </form>
            </div>
        </div>

        <!-- Usage Info -->
        <div class="card mt-4">
            <div class="card-header">
                <span class="card-title">Cách sử dụng</span>
            </div>
            <div class="card-body">
                <div style="font-size: 13px;">
                    <p><strong>1. Form Widget:</strong></p>
                    <p class="text-muted mb-3">Vào Widgets → Thêm "Form Widget" → Chọn template này</p>
                    
                    <p><strong>2. Modal Form:</strong></p>
                    <p class="text-muted mb-3">Vào Modal Forms → Tạo modal → Chọn template này</p>
                    
                    <p><strong>3. Shortcode:</strong></p>
                    <code style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 11px;">
                        [form id="{{ $formTemplate->id }}"]
                    </code>
                </div>
            </div>
        </div>

        <!-- Form Preview -->
        <div class="card mt-4">
            <div class="card-header">
                <span class="card-title">Preview</span>
            </div>
            <div class="card-body">
                <div style="border: 1px dashed #e2e8f0; padding: 16px; border-radius: 8px; background: #f8fafc; font-size: 13px;">
                    @foreach($formTemplate->fields as $field)
                        <div style="margin-bottom: 12px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 4px;">
                                {{ $field['label'] }}{{ ($field['required'] ?? false) ? ' *' : '' }}
                            </label>
                            @if($field['type'] === 'textarea')
                                <textarea placeholder="{{ $field['placeholder'] ?? '' }}" 
                                         style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;" 
                                         rows="3" disabled></textarea>
                            @elseif($field['type'] === 'select')
                                <select style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;" disabled>
                                    <option>{{ $field['placeholder'] ?? 'Chọn...' }}</option>
                                    @if(isset($field['options']))
                                        @foreach($field['options'] as $option)
                                            <option>{{ $option['label'] ?? $option['value'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            @else
                                <input type="{{ $field['type'] }}" 
                                       placeholder="{{ $field['placeholder'] ?? '' }}" 
                                       style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;" 
                                       disabled>
                            @endif
                        </div>
                    @endforeach
                    
                    @if(count($formTemplate->fields) > 0)
                        <button style="background: #2563eb; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: not-allowed;" disabled>
                            Gửi thông tin
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
