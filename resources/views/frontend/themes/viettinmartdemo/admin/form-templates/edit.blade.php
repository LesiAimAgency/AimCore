@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa Form Template')
@section('page-title', 'Chỉnh sửa Form Template')
@section('page-subtitle', 'Cập nhật thông tin form template')

@section('page-actions')
    <a href="{{ locale_route('admin.form-templates.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
@endsection

@section('content')
<form action="{{ locale_route('admin.form-templates.update', $formTemplate) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row" style="gap: 20px;">
        <!-- Left Column: Basic Info -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Thông tin cơ bản</span>
                </div>
                <div class="card-body">
                    <div class="row" style="gap: 16px;">
                        <div class="col-12">
                            <label class="form-label">Tên Form Template *</label>
                            <input type="text" name="name" class="form-input" value="{{ old('name', $formTemplate->name) }}" required>
                            @error('name')
                                <p class="form-hint text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-textarea" rows="3">{{ old('description', $formTemplate->description) }}</textarea>
                            @error('description')
                                <p class="form-hint text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $formTemplate->is_active) ? 'checked' : '' }}>
                                Kích hoạt form template
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Builder -->
            <div class="card mt-4">
                <div class="card-header">
                    <span class="card-title">Form Fields</span>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addField()">
                        <i class="fa-solid fa-plus"></i> Thêm Field
                    </button>
                </div>
                <div class="card-body">
                    <div id="form-fields">
                        <!-- Fields will be populated by JavaScript -->
                    </div>
                    <input type="hidden" name="form_fields" id="form_fields_json" value="{{ json_encode($formTemplate->fields) }}">
                </div>
            </div>
        </div>

        <!-- Right Column: Preview & Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Thao tác</span>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fa-solid fa-save"></i> Cập nhật Form Template
                    </button>
                    
                    <a href="{{ locale_route('admin.form-templates.show', $formTemplate) }}" class="btn btn-ghost w-100 mb-2">
                        <i class="fa-solid fa-eye"></i> Xem chi tiết
                    </a>
                    
                    <a href="{{ locale_route('admin.form-templates.submissions', $formTemplate) }}" class="btn btn-ghost w-100">
                        <i class="fa-solid fa-list"></i> Xem Submissions ({{ $formTemplate->submissions()->count() }})
                    </a>
                </div>
            </div>

            <!-- Form Preview -->
            <div class="card mt-4">
                <div class="card-header">
                    <span class="card-title">Preview</span>
                </div>
                <div class="card-body">
                    <div id="form-preview" style="border: 1px dashed #e2e8f0; padding: 16px; border-radius: 8px; background: #f8fafc;">
                        <p class="text-muted text-center">Form preview sẽ hiển thị ở đây</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
let fieldIndex = 0;
let formFields = @json($formTemplate->fields);

// Field types configuration
const fieldTypes = {
    'text': { label: 'Text Input', hasOptions: false },
    'email': { label: 'Email', hasOptions: false },
    'tel': { label: 'Phone', hasOptions: false },
    'number': { label: 'Number', hasOptions: false },
    'textarea': { label: 'Textarea', hasOptions: false },
    'select': { label: 'Select Dropdown', hasOptions: true },
    'checkbox': { label: 'Checkbox', hasOptions: false },
    'radio': { label: 'Radio Buttons', hasOptions: true },
};

function initFormBuilder() {
    const container = document.getElementById('form-fields');
    container.innerHTML = '';
    
    formFields.forEach((field, index) => {
        addFieldToBuilder(field, index);
    });
    
    updatePreview();
    updateJsonInput();
}

function addField() {
    const newField = {
        name: 'field_' + Date.now(),
        label: 'New Field',
        type: 'text',
        width: '12',
        placeholder: '',
        required: false
    };
    
    formFields.push(newField);
    addFieldToBuilder(newField, formFields.length - 1);
    updatePreview();
    updateJsonInput();
}

function addFieldToBuilder(field, index) {
    const container = document.getElementById('form-fields');
    const fieldHtml = `
        <div class="field-item" data-index="${index}" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 16px; background: #fff;">
            <div class="row" style="gap: 12px;">
                <div class="col-6">
                    <label class="form-label">Field Name</label>
                    <input type="text" class="form-input" value="${field.name}" onchange="updateField(${index}, 'name', this.value)">
                </div>
                <div class="col-6">
                    <label class="form-label">Label</label>
                    <input type="text" class="form-input" value="${field.label}" onchange="updateField(${index}, 'label', this.value)">
                </div>
                <div class="col-4">
                    <label class="form-label">Type</label>
                    <select class="form-select" onchange="updateField(${index}, 'type', this.value)">
                        ${Object.entries(fieldTypes).map(([key, config]) => 
                            `<option value="${key}" ${field.type === key ? 'selected' : ''}>${config.label}</option>`
                        ).join('')}
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Width (1-12)</label>
                    <select class="form-select" onchange="updateField(${index}, 'width', this.value)">
                        ${[3,4,6,8,12].map(w => `<option value="${w}" ${field.width == w ? 'selected' : ''}>${w} cols</option>`).join('')}
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">
                        <input type="checkbox" ${field.required ? 'checked' : ''} onchange="updateField(${index}, 'required', this.checked)">
                        Required
                    </label>
                </div>
                <div class="col-12">
                    <label class="form-label">Placeholder</label>
                    <input type="text" class="form-input" value="${field.placeholder || ''}" onchange="updateField(${index}, 'placeholder', this.value)">
                </div>
                ${fieldTypes[field.type]?.hasOptions ? `
                <div class="col-12">
                    <label class="form-label">Options (JSON format)</label>
                    <textarea class="form-textarea" rows="3" onchange="updateFieldOptions(${index}, this.value)">${JSON.stringify(field.options || [], null, 2)}</textarea>
                </div>
                ` : ''}
                <div class="col-12" style="text-align: right;">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeField(${index})">
                        <i class="fa-solid fa-trash"></i> Xóa
                    </button>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', fieldHtml);
}

function updateField(index, key, value) {
    formFields[index][key] = value;
    updatePreview();
    updateJsonInput();
    
    // If type changed, rebuild the field to show/hide options
    if (key === 'type') {
        initFormBuilder();
    }
}

function updateFieldOptions(index, value) {
    try {
        formFields[index].options = JSON.parse(value);
        updatePreview();
        updateJsonInput();
    } catch (e) {
        alert('Invalid JSON format for options');
    }
}

function removeField(index) {
    formFields.splice(index, 1);
    initFormBuilder();
}

function updatePreview() {
    const preview = document.getElementById('form-preview');
    let html = '<div style="font-size: 13px;">';
    
    formFields.forEach(field => {
        html += `<div style="margin-bottom: 12px;">`;
        html += `<label style="display: block; font-weight: 600; margin-bottom: 4px;">${field.label}${field.required ? ' *' : ''}</label>`;
        
        if (field.type === 'textarea') {
            html += `<textarea placeholder="${field.placeholder}" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;" rows="3"></textarea>`;
        } else if (field.type === 'select') {
            html += `<select style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;">`;
            html += `<option>${field.placeholder}</option>`;
            if (field.options) {
                field.options.forEach(opt => {
                    html += `<option>${opt.label || opt.value}</option>`;
                });
            }
            html += `</select>`;
        } else {
            html += `<input type="${field.type}" placeholder="${field.placeholder}" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px;">`;
        }
        html += `</div>`;
    });
    
    html += '</div>';
    preview.innerHTML = html;
}

function updateJsonInput() {
    document.getElementById('form_fields_json').value = JSON.stringify(formFields);
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initFormBuilder();
});
</script>
@endpush
@endsection
