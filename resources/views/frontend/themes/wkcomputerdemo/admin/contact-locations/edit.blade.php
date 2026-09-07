@extends('admin.layouts.app')
@section('title', __('common.edit') . ' địa điểm liên hệ')
@section('page-title', __('common.edit') . ' địa điểm liên hệ')

@section('page-actions')
<a href="{{ locale_route('admin.contact-locations.index') }}" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ locale_route('admin.contact-locations.update', $contactLocation) }}" method="POST">
    @csrf @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Thông tin cơ bản</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Tên địa điểm *</label>
                        <input type="text" name="name" class="form-input" value="{{ old('name', $contactLocation->name) }}" 
                               placeholder="VD:  Hạt Điều Nhân Hòa Phát - Chi nhánh Quận 1" required>
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Loại địa điểm *</label>
                        <select name="type" class="form-select" required>
                            <option value="">-- Chọn loại --</option>
                            <option value="store" {{ old('type', $contactLocation->type) == 'store' ? 'selected' : '' }}>Cửa hàng</option>
                            <option value="warehouse" {{ old('type', $contactLocation->type) == 'warehouse' ? 'selected' : '' }}>Kho hàng</option>
                            <option value="office" {{ old('type', $contactLocation->type) == 'office' ? 'selected' : '' }}>Văn phòng</option>
                            <option value="showroom" {{ old('type', $contactLocation->type) == 'showroom' ? 'selected' : '' }}>Showroom</option>
                        </select>
                        @error('type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Địa chỉ *</label>
                        <textarea name="address" class="form-textarea" rows="3" required 
                                  placeholder="Địa chỉ đầy đủ của địa điểm">{{ old('address', $contactLocation->address) }}</textarea>
                        @error('address')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-input" value="{{ old('phone', $contactLocation->phone) }}" 
                                   placeholder="0123 456 789">
                            @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Hotline</label>
                            <input type="text" name="hotline" class="form-input" value="{{ old('hotline', $contactLocation->hotline) }}" 
                                   placeholder="1900 1234">
                            @error('hotline')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email', $contactLocation->email) }}" 
                               placeholder="contact@ Hạt Điều Nhân Hòa Phát.com">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Mô tả</label>
                        @include('components.admin.editor', [
                            'name'   => 'description',
                            'value'  => old('description', $contactLocation->description),
                            'height' => 140,
                        ])
                        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span class="card-title">Bản đồ & Tọa độ</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Google Maps URL</label>
                        <input type="url" name="map_url" class="form-input" value="{{ old('map_url', $contactLocation->map_url) }}" 
                               placeholder="https://maps.google.com/...">
                        <p class="form-hint">Link Google Maps để khách hàng có thể chỉ đường</p>
                        @error('map_url')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Google Maps Embed Code</label>
                        <textarea name="map_iframe" class="form-textarea" rows="4" 
                                  placeholder="<iframe src=&quot;https://www.google.com/maps/embed?pb=...&quot; width=&quot;600&quot; height=&quot;450&quot;></iframe>">{{ old('map_iframe', $contactLocation->map_iframe) }}</textarea>
                        <p class="form-hint">Mã nhúng iframe từ Google Maps để hiển thị bản đồ</p>
                        @error('map_iframe')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Latitude (Vĩ độ)</label>
                            <input type="number" name="latitude" class="form-input" value="{{ old('latitude', $contactLocation->latitude) }}" 
                                   step="0.00000001" placeholder="10.7722744">
                            @error('latitude')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Longitude (Kinh độ)</label>
                            <input type="number" name="longitude" class="form-input" value="{{ old('longitude', $contactLocation->longitude) }}" 
                                   step="0.00000001" placeholder="106.6791963">
                            @error('longitude')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Cài đặt</span>
                </div>
                <div class="card-body space-y-4">
                    <div>
                        <label class="form-label">Thứ tự hiển thị</label>
                        <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $contactLocation->sort_order) }}" min="0">
                        <p class="form-hint">Số nhỏ hơn sẽ hiển thị trước</p>
                    </div>

                    <div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $contactLocation->is_active) ? 'checked' : '' }}>
                            <span>Kích hoạt</span>
                        </label>
                        <p class="form-hint">Chỉ những địa điểm được kích hoạt mới hiển thị trên website</p>
                    </div>

                    <div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="is_primary" value="1" {{ old('is_primary', $contactLocation->is_primary) ? 'checked' : '' }}>
                            <span>Địa điểm chính</span>
                        </label>
                        <p class="form-hint">Địa điểm chính sẽ hiển thị đầu tiên và nổi bật hơn</p>
                    </div>

                    <div>
                        <label class="form-label">Hình ảnh</label>
                        <input type="text" name="image" class="form-input" value="{{ old('image', $contactLocation->image) }}" 
                               placeholder="media/stores/store1.jpg">
                        <p class="form-hint">Đường dẫn hình ảnh cửa hàng</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span class="card-title">Giờ làm việc</span>
                </div>
                <div class="card-body space-y-3">
                    @php
                        $days = [
                            'monday' => 'Thứ 2',
                            'tuesday' => 'Thứ 3',
                            'wednesday' => 'Thứ 4', 
                            'thursday' => 'Thứ 5',
                            'friday' => 'Thứ 6',
                            'saturday' => 'Thứ 7',
                            'sunday' => 'Chủ nhật'
                        ];
                        $workingHours = old('working_hours', $contactLocation->working_hours ?: []);
                    @endphp
                    @foreach($days as $key => $day)
                    <div>
                        <label class="form-label">{{ $day }}</label>
                        <input type="text" name="working_hours[{{ $key }}]" class="form-input" 
                               value="{{ $workingHours[$key] ?? '' }}" 
                               placeholder="8:00 - 22:00 hoặc 'Nghỉ'">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn btn-primary flex-1">
                    <i class="fa-solid fa-save"></i> Cập nhật
                </button>
                <a href="{{ locale_route('admin.contact-locations.index') }}" class="btn btn-secondary">
                    Hủy
                </a>
            </div>
        </div>
    </div>
</form>
@endsection