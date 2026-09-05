@php
    $placeholderText = $config['placeholder_text'] ?? __('frontend.widget_newsletter_placeholder');
    $buttonText = $config['button_text'] ?? __('frontend.widget_newsletter_button');
    $successMessage = $config['success_message'] ?? __('frontend.widget_newsletter_success');
@endphp

<!-- Newsletter Widget start -->
<div class="newsletter-widget-area" {!! $sectionStyles ?? '' !!}>
    @if($formTemplate && !empty($formTemplate->fields))
        <form class="footersubscribe-form" data-template-id="{{ $formTemplate->id }}" data-source="widget">
            @csrf
            @foreach($formTemplate->fields as $field)
                @if($field['type'] === 'email')
                    <input 
                        type="email" 
                        name="{{ $field['name'] }}" 
                        placeholder="{{ $placeholderText }}"
                        @if($field['required'] ?? false) required @endif>
                @elseif($field['type'] === 'checkbox')
                    {{-- Tự động đồng ý terms cho newsletter --}}
                    <input 
                        type="hidden" 
                        name="{{ $field['name'] }}" 
                        value="1">
                @endif
            @endforeach
            <button type="submit" class="rts-btn btn-primary">{{ $buttonText }}</button>
            
            <div class="newsletter-message" style="display:none;">
                <p class="success-message">{{ $successMessage }}</p>
            </div>
        </form>
    @else
        <div class="newsletter-empty">
            <p>{{ __('frontend.widget_newsletter_no_template') }}</p>
        </div>
    @endif
</div>
<!-- Newsletter Widget end -->

<style>
.newsletter-widget-area {
    /* Không thêm style gì để giữ nguyên style Ekomart */
}

.success-message {
    color: #059669;
    background: #ecfdf5;
    padding: 12px 16px;
    border-radius: 8px;
    margin-top: 16px;
    text-align: center;
    font-size: 14px;
}

.newsletter-empty {
    text-align: center;
    color: #64748b;
    font-style: italic;
    padding: 20px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.newsletter-widget-area .footersubscribe-form');
    
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
                    // Ẩn input và button, hiện thông báo
                    const emailInput = form.querySelector('input[type="email"]');
                    const submitButton = form.querySelector('button[type="submit"]');
                    const messageContainer = form.querySelector('.newsletter-message');
                    
                    if (emailInput) emailInput.style.display = 'none';
                    if (submitButton) submitButton.style.display = 'none';
                    if (messageContainer) messageContainer.style.display = 'block';
                    
                    // Reset form after 4 seconds
                    setTimeout(() => {
                        form.reset();
                        if (emailInput) emailInput.style.display = '';
                        if (submitButton) submitButton.style.display = '';
                        if (messageContainer) messageContainer.style.display = 'none';
                    }, 4000);
                } else {
                    alert('{{ __('frontend.widget_newsletter_error') }}');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('{{ __('frontend.widget_newsletter_error') }}');
            });
        });
    });
});
</script>
