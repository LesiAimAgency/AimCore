@extends('admin.layouts.app')
@section('title', 'Tạo Form Template')
@section('page-title', 'Tạo Form Template')
@section('page-subtitle', 'Tạo mẫu form có thể tái sử dụng')

@section('content')
<form action="{{ locale_route('admin.form-templates.store') }}" method="POST">
    @csrf
    
    <div class="row g-4">
        <!-- Form Builder -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Thông tin cơ bản</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Tên form template</label>
                        <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                        <p class="form-hint">Tên để phân biệt trong admin</p>
                    </div>
                    
                    <div>
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-textarea" rows="3">{{ old('description') }}</textarea>
                        <p class="form-hint">Mô tả ngắn về mục đích sử dụng form này</p>
                    </div>
                </div>
            </div>

            <!-- Form Builder -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Form Fields Builder</span>
                    <button type="button" class="btn btn-sm btn-secondary" onclick="addFormField()">
                        <i class="fa-solid fa-plus"></i> Thêm Field
                    </button>
                </div>
                <div class="card-body">
                    <div id="form-fields-container">
                        <!-- Form fields will be added here -->
                    </div>
                    <input type="hidden" name="fields" id="fields_input">
                    
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h6 class="text-sm font-semibold mb-2">Hướng dẫn:</h6>
                        <ul class="text-xs text-gray-600 space-y-1">
                            <li>• <strong>Tên field:</strong> Tên duy nhất cho field (vd: email, phone, message)</li>
                            <li>• <strong>Label:</strong> Nhãn hiển thị cho người dùng</li>
                            <li>• <strong>Placeholder:</strong> Text gợi ý trong ô input</li>
                            <li>• <strong>Bắt buộc:</strong> Field này có bắt buộc nhập không</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Cài đặt</span>
                </div>
                <div class="card-body space-y-4">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Kích hoạt</label>
                        <p class="form-hint">Form template có thể sử dụng trong modal và widget</p>
                    </div>
                </div>
            </div>

            <!-- Preview -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Preview</span>
                </div>
                <div class="card-body">
                    <div id="form-preview">
                        <p class="text-gray-500 text-sm">Thêm fields để xem preview</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-save"></i> Lưu Form Template
                    </button>
                    <a href="{{ locale_route('admin.form-templates.index') }}" class="btn btn-ghost w-100 mt-2">
                        Hủy
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
let fieldCounter = 0;

function addFormField() {
    fieldCounter++;
    const container = document.getElementById('form-fields-container');
    const fieldHtml = `
        <div class="form-field-item border rounded p-3 mb-3" data-field-id="${fieldCounter}">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Field #${fieldCounter}</h6>
                <button type="button" class="btn btn-sm btn-danger" onclick="removeFormField(${fieldCounter})">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên field</label>
                    <input type="text" class="form-input field-name" placeholder="email" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Label</label>
                    <input type="text" class="form-input field-label" placeholder="Email của bạn" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Loại field</label>
                    <select class="form-select field-type" onchange="toggleFieldOptions(${fieldCounter}, this.value)">
                        <option value="text">Text</option>
                        <option value="email">Email</option>
                        <option value="tel">Số điện thoại</option>
                        <option value="number">Số</option>
                        <option value="textarea">Textarea</option>
                        <option value="select">Select</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Độ rộng</label>
                    <select class="form-select field-width">
                        <option value="12">Full width</option>
                        <option value="6">Half width</option>
                        <option value="4">1/3 width</option>
                    </select>
                </div>
                <div class="col-12">
                    <input type="text" class="form-input field-placeholder" placeholder="Placeholder text">
                </div>
                <div class="col-12 select-options" style="display:none;">
                    <label class="form-label">Options (mỗi dòng 1 option: value|label)</label>
                    <textarea class="form-textarea field-options" rows="3" placeholder="option1|Option 1&#10;option2|Option 2"></textarea>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input field-required" id="required-${fieldCounter}">
                        <label class="form-check-label" for="required-${fieldCounter}">Bắt buộc</label>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', fieldHtml);
    updateFormFieldsInput();
    updatePreview();
}

function removeFormField(fieldId) {
    document.querySelector(`[data-field-id="${fieldId}"]`).remove();
    updateFormFieldsInput();
    updatePreview();
}

function toggleFieldOptions(fieldId, type) {
    const item = document.querySelector(`[data-field-id="${fieldId}"]`);
    const optionsDiv = item.querySelector('.select-options');
    optionsDiv.style.display = type === 'select' ? 'block' : 'none';
}

function updateFormFieldsInput() {
    const fields = [];
    document.querySelectorAll('.form-field-item').forEach(item => {
        const field = {
            name: item.querySelector('.field-name').value,
            label: item.querySelector('.field-label').value,
            type: item.querySelector('.field-type').value,
            width: item.querySelector('.field-width').value,
            placeholder: item.querySelector('.field-placeholder').value,
            required: item.querySelector('.field-required').checked,
        };
        
        if (field.type === 'select') {
            const optionsText = item.querySelector('.field-options').value;
            field.options = optionsText.split('\n').map(line => {
                const [value, label] = line.split('|');
                return { value: value?.trim(), label: label?.trim() || value?.trim() };
            }).filter(opt => opt.value);
        }
        
        if (field.name && field.label) {
            fields.push(field);
        }
    });
    document.getElementById('fields_input').value = JSON.stringify(fields);
}

function updatePreview() {
    const fields = [];
    document.querySelectorAll('.form-field-item').forEach(item => {
        const field = {
            name: item.querySelector('.field-name').value,
            label: item.querySelector('.field-label').value,
            type: item.querySelector('.field-type').value,
            placeholder: item.querySelector('.field-placeholder').value,
            required: item.querySelector('.field-required').checked,
        };
        if (field.name && field.label) {
            fields.push(field);
        }
    });
    
    const preview = document.getElementById('form-preview');
    if (fields.length === 0) {
        preview.innerHTML = '<p class="text-gray-500 text-sm">Thêm fields để xem preview</p>';
        return;
    }
    
    let html = '<div class="space-y-3">';
    fields.forEach(field => {
        html += `<div>`;
        html += `<label class="text-xs font-semibold text-gray-700">${field.label}${field.required ? ' *' : ''}</label>`;
        if (field.type === 'textarea') {
            html += `<textarea class="w-full text-xs border rounded p-2" placeholder="${field.placeholder}" disabled></textarea>`;
        } else {
            html += `<input type="${field.type}" class="w-full text-xs border rounded p-2" placeholder="${field.placeholder}" disabled>`;
        }
        html += `</div>`;
    });
    html += '</div>';
    preview.innerHTML = html;
}

// Update form fields input when any field changes
document.addEventListener('input', function(e) {
    if (e.target.closest('.form-field-item')) {
        updateFormFieldsInput();
        updatePreview();
    }
});

document.addEventListener('change', function(e) {
    if (e.target.closest('.form-field-item')) {
        updateFormFieldsInput();
        updatePreview();
    }
});
</script>
@endsection
