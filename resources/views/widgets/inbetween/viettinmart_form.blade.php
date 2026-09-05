@php
    $formStyle = $config['form_style'] ?? 'default';
    $showTitle = $config['show_title'] ?? true;
    $buttonText = $config['button_text'] ?? __('frontend.widget_form_default_button');
    $successMessage = $config['success_message'] ?? __('frontend.widget_form_default_success');
    
    $containerClass = match($formStyle) {
        'inline' => 'form-widget-inline',
        'compact' => 'form-widget-compact',
        'card' => 'form-widget-card',
        default => 'form-widget-default'
    };
@endphp

<!-- Form Widget start -->
<div class="form-widget-area {{ $containerClass }}" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        @if($showTitle && !empty($config['title']))
            <div class="form-widget-header">
                <h3 class="form-widget-title">{{ $config['title'] }}</h3>
            </div>
        @endif

        @if($formTemplate && !empty($formTemplate->fields))
            <div class="form-widget-content">
                {{-- Newsletter Signup - sử dụng class Ekomart --}}
                @if($formTemplate->name === 'Đăng Ký Nhận Tin' || $formStyle === 'ekomart')
                    <form class="footersubscribe-form" data-template-id="{{ $formTemplate->id }}" data-source="widget">
                        @csrf
                        @foreach($formTemplate->fields as $field)
                            @if($field['type'] === 'email')
                                <input 
                                    type="email" 
                                    name="{{ $field['name'] }}" 
                                    placeholder="{{ $field['placeholder'] ?? $field['label'] }}"
                                    @if($field['required'] ?? false) required @endif>
                            @elseif($field['type'] === 'checkbox')
                                <input 
                                    type="hidden" 
                                    name="{{ $field['name'] }}" 
                                    value="1">
                            @endif
                        @endforeach
                        <button type="submit" class="rts-btn btn-primary">{{ $buttonText }}</button>
                        
                        <div class="form-widget-message" style="display:none;">
                            <p class="success-message">{{ $successMessage }}</p>
                        </div>
                    </form>
                
                {{-- Các form khác - sử dụng layout tùy chỉnh --}}
                @else
                    <form class="form-widget-form" data-template-id="{{ $formTemplate->id }}" data-source="widget">
                        @csrf
                        <div class="form-widget-fields {{ $formStyle === 'inline' ? 'row g-3' : 'space-y-4' }}">
                            @foreach($formTemplate->fields as $field)
                                @php
                                    $colClass = $formStyle === 'inline' ? 'col-md-' . (12 / count($formTemplate->fields)) : '';
                                    if ($formStyle === 'inline' && count($formTemplate->fields) > 4) {
                                        $colClass = 'col-md-3';
                                    }
                                @endphp
                                
                                <div class="{{ $colClass }}">
                                    @if($field['type'] === 'text' || $field['type'] === 'email' || $field['type'] === 'tel' || $field['type'] === 'number')
                                        <input 
                                            type="{{ $field['type'] }}" 
                                            name="{{ $field['name'] }}" 
                                            class="form-widget-input" 
                                            placeholder="{{ $field['placeholder'] ?? $field['label'] }}"
                                            @if($field['required'] ?? false) required @endif>
                                            
                                    @elseif($field['type'] === 'textarea')
                                        <textarea 
                                            name="{{ $field['name'] }}" 
                                            class="form-widget-textarea" 
                                            rows="{{ $field['rows'] ?? 3 }}"
                                            placeholder="{{ $field['placeholder'] ?? $field['label'] }}"
                                            @if($field['required'] ?? false) required @endif></textarea>
                                            
                                    @elseif($field['type'] === 'select')
                                        <select 
                                            name="{{ $field['name'] }}" 
                                            class="form-widget-select"
                                            @if($field['required'] ?? false) required @endif>
                                            <option value="">{{ $field['placeholder'] ?? __('frontend.widget_form_select_placeholder') }}</option>
                                            @foreach($field['options'] ?? [] as $option)
                                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                            @endforeach
                                        </select>
                                        
                                    @elseif($field['type'] === 'checkbox')
                                        <div class="form-widget-checkbox">
                                            <input 
                                                type="checkbox" 
                                                name="{{ $field['name'] }}" 
                                                value="1"
                                                class="form-widget-checkbox-input" 
                                                id="widget-field-{{ $field['name'] }}"
                                                @if($field['required'] ?? false) required @endif>
                                            <label class="form-widget-checkbox-label" for="widget-field-{{ $field['name'] }}">
                                                {{ $field['label'] }}
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            
                            <div class="{{ $formStyle === 'inline' ? 'col-md-auto' : '' }}">
                                <button type="submit" class="form-widget-submit">
                                    {{ $buttonText }}
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-widget-message" style="display:none;">
                            <p class="success-message">{{ $successMessage }}</p>
                        </div>
                    </form>
                @endif
            </div>
        @else
            <div class="form-widget-empty">
                <p>{{ __('frontend.widget_form_no_template') }}</p>
            </div>
        @endif
    </div>
</div>
<!-- Form Widget end -->

<style>
.form-widget-area {
    padding: 50px 0;
    background: #f8fafc;
}

.form-widget-area .footersubscribe-form {
    position: relative;
    max-width: 580px;
    margin: 0 auto;
}

.form-widget-area .footersubscribe-form input {
    height: 54px;
    width: 100%;
    border: 1px solid #e2e8f0;
    border-radius: 50px;
    padding-left: 24px;
    padding-right: 160px;
    background: #fff;
    font-size: 15px;
    transition: all 0.2s ease;
}

.form-widget-area .footersubscribe-form input:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(98, 157, 35, 0.15);
    outline: none;
}

.form-widget-area .footersubscribe-form button {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    height: 42px;
    border-radius: 50px;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.form-widget-card {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.form-widget-title {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 20px;
    text-align: center;
}

.form-widget-input,
.form-widget-textarea,
.form-widget-select {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.15s;
}

.form-widget-input:focus,
.form-widget-textarea:focus,
.form-widget-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}

.form-widget-checkbox {
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-widget-submit {
    background: var(--color-primary, #3b82f6);
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.15s;
    width: 100%;
}

.form-widget-submit:hover {
    background: var(--color-primary-dark, #2563eb);
}

.form-widget-inline .form-widget-submit {
    width: auto;
    white-space: nowrap;
}

.form-widget-compact {
    padding: 20px 0;
}

.form-widget-compact .form-widget-input,
.form-widget-compact .form-widget-textarea,
.form-widget-compact .form-widget-select {
    padding: 8px 12px;
    font-size: 13px;
}

.success-message {
    color: #059669;
    background: #ecfdf5;
    padding: 12px 16px;
    border-radius: 8px;
    margin-top: 16px;
    text-align: center;
}

.form-widget-empty {
    text-align: center;
    color: #64748b;
    font-style: italic;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý cả form-widget-form và footersubscribe-form
    const forms = document.querySelectorAll('.form-widget-form, .footersubscribe-form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const templateId = form.dataset.templateId;
            const source = form.dataset.source;
            
            // Add source to form data
            formData.append('source', source);
            
            fetch(`/form-templates/${templateId}/submit`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tìm message container
                    const messageContainer = form.querySelector('.form-widget-message');
                    
                    if (messageContainer) {
                        // Hide form fields và show success message
                        const fieldsContainer = form.querySelector('.form-widget-fields');
                        if (fieldsContainer) {
                            fieldsContainer.style.display = 'none';
                        } else {
                            // Newsletter form - ẩn input và button
                            const inputs = form.querySelectorAll('input[type="email"], button');
                            inputs.forEach(input => input.style.display = 'none');
                        }
                        
                        messageContainer.style.display = 'block';
                        
                        // Reset form after 3 seconds
                        setTimeout(() => {
                            form.reset();
                            if (fieldsContainer) {
                                fieldsContainer.style.display = 'block';
                            } else {
                                // Newsletter form - hiện lại input và button
                                const inputs = form.querySelectorAll('input[type="email"], button');
                                inputs.forEach(input => input.style.display = '');
                            }
                            messageContainer.style.display = 'none';
                        }, 3000);
                    } else {
                        // Fallback nếu không có message container
                        alert(data.message || 'Cảm ơn bạn đã gửi thông tin!');
                    }
                } else {
                    alert('{{ __('frontend.widget_form_error') }}');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('{{ __('frontend.widget_form_error') }}');
            });
        });
    });
});
</script>