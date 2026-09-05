@extends('admin.layouts.app')
@section('title', 'Tạo Modal Form')
@section('page-title', 'Tạo Modal Form')
@section('page-subtitle', 'Tạo popup modal mới với form thu thập thông tin')

@section('content')
<form action="{{ locale_route('admin.modal-forms.store') }}" method="POST">
    @csrf
    
    <div class="row g-4">
        <!-- Cấu hình cơ bản -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Thông tin cơ bản</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Tên modal form</label>
                        <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                        <p class="form-hint">Tên để phân biệt trong admin</p>
                    </div>
                    
                    <div>
                        <label class="form-label">Tiêu đề hiển thị</label>
                        <input type="text" name="title" class="form-input" value="{{ old('title') }}" required>
                    </div>
                    
                    <div>
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-textarea" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="form-label">Chọn Form Template</label>
                        <select name="form_template_id" class="form-select">
                            <option value="">Không sử dụng form</option>
                            @foreach(\App\Models\FormTemplate::where('is_active', true)->get() as $template)
                                <option value="{{ $template->id }}">{{ $template->name }} ({{ count($template->fields) }} fields)</option>
                            @endforeach
                        </select>
                        <p class="form-hint">Chọn form template có sẵn hoặc <a href="{{ locale_route('admin.form-templates.create') }}" target="_blank">tạo mới</a></p>
                    </div>
                </div>
            </div>

            <!-- Nội dung Modal -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Nội dung Modal</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Pre-title (text nhỏ phía trên)</label>
                        <input type="text" name="pre_title" class="form-input" value="{{ old('pre_title', 'Get up to 30% off on your first $150 purchase') }}">
                    </div>
                    
                    <div>
                        <label class="form-label">Tiêu đề chính</label>
                        <textarea name="main_title" class="form-textarea" rows="2">{{ old('main_title', 'Feed Your Family at the Best Price') }}</textarea>
                    </div>
                    
                    <div>
                        <label class="form-label">Mô tả nội dung</label>
                        <textarea name="content_description" class="form-textarea" rows="3">{{ old('content_description', 'We have prepared special discounts for you on grocery products. Don\'t miss these opportunities...') }}</textarea>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Text nút</label>
                            <input type="text" name="button_text" class="form-input" value="{{ old('button_text', 'Shop Now') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Link nút</label>
                            <input type="text" name="button_link" class="form-input" value="{{ old('button_link', '/shop') }}">
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Text giá (from)</label>
                            <input type="text" name="price_text" class="form-input" value="{{ old('price_text', 'from') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giá hiển thị</label>
                            <input type="text" name="price_value" class="form-input" value="{{ old('price_value', '$80.99') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cấu hình bên phải -->
        <div class="col-lg-4">
            <!-- Trigger Settings -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Cài đặt Trigger</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Loại trigger</label>
                        <select name="trigger_type" class="form-select" onchange="toggleTriggerOptions(this.value)">
                            <option value="immediate">Ngay lập tức</option>
                            <option value="delay" selected>Sau X giây</option>
                            <option value="scroll">Khi scroll X%</option>
                            <option value="exit_intent">Exit intent</option>
                        </select>
                    </div>
                    
                    <div id="delay-option">
                        <label class="form-label">Delay (giây)</label>
                        <input type="number" name="trigger_delay" class="form-input" value="3" min="1" max="60">
                    </div>
                    
                    <div id="scroll-option" style="display:none;">
                        <label class="form-label">Scroll (%)</label>
                        <input type="number" name="trigger_scroll" class="form-input" value="50" min="1" max="100">
                    </div>
                    
                    <div>
                        <label class="form-label">Tần suất hiển thị</label>
                        <select name="show_frequency" class="form-select">
                            <option value="always">Luôn hiển thị</option>
                            <option value="once_per_session" selected>1 lần/session</option>
                            <option value="once_per_day">1 lần/ngày</option>
                            <option value="once_per_week">1 lần/tuần</option>
                        </select>
                    </div>
                    
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Kích hoạt</label>
                    </div>
                </div>
            </div>

            <!-- Style Settings -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Cài đặt Giao diện</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Ảnh nền</label>
                        <input type="text" name="background_image" class="form-input" placeholder="URL ảnh nền">
                    </div>
                    
                    <div>
                        <label class="form-label">Màu nền</label>
                        <input type="color" name="background_color" class="form-input" value="#ffffff">
                    </div>
                    
                    <div>
                        <label class="form-label">Màu chữ</label>
                        <input type="color" name="text_color" class="form-input" value="#000000">
                    </div>
                    
                    <div>
                        <label class="form-label">Màu nút</label>
                        <input type="color" name="button_color" class="form-input" value="#007bff">
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-save"></i> Lưu Modal Form
                    </button>
                    <a href="{{ locale_route('admin.modal-forms.index') }}" class="btn btn-ghost w-100 mt-2">
                        Hủy
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
function toggleTriggerOptions(type) {
    document.getElementById('delay-option').style.display = type === 'delay' ? 'block' : 'none';
    document.getElementById('scroll-option').style.display = type === 'scroll' ? 'block' : 'none';
}
</script>
@endsection
