@extends('admin.layouts.app')
@section('title', 'Sửa đại lý: ' . $agent->name)
@section('page-title', 'Chỉnh sửa đại lý')
@section('page-subtitle', $agent->display_name)

@section('page-actions')
<div style="display:flex; gap:8px;">
    <a href="{{ locale_route('admin.agents.show', $agent) }}" class="btn btn-ghost">
        <i class="fa-solid fa-eye"></i> Xem chi tiết
    </a>
    <a href="{{ locale_route('admin.agents.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
</div>
@endsection

@section('content')
<form action="{{ locale_route('admin.agents.update', $agent) }}" method="POST">
    @csrf @method('PUT')
    <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">

        {{-- Cột trái --}}
        <div style="display:flex;flex-direction:column;gap:24px;">
            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Thông tin cơ bản</span>
                </div>
                <div class="card-body" style="padding:24px; display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="color:#64748b; font-weight:700;">TÊN ĐẠI LÝ / CÔNG TY <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" class="form-input" value="{{ old('name', $agent->name) }}" required style="border-radius:10px; height:42px;">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">MÃ ĐẠI LÝ</label>
                        <input type="text" name="code" class="form-input" value="{{ old('code', $agent->code) }}" placeholder="VD: DL001" style="border-radius:10px; height:42px;">
                        @error('code')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">LOẠI ĐẠI LÝ <span style="color:#ef4444;">*</span></label>
                        <select name="type" class="form-select" required style="border-radius:10px; height:42px;">
                            @foreach($types as $key => $label)
                                <option value="{{ $key }}" {{ old('type', $agent->type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">SỐ ĐIỆN THOẠI</label>
                        <input type="text" name="phone" class="form-input" value="{{ old('phone', $agent->phone) }}" style="border-radius:10px; height:42px;">
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">EMAIL</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email', $agent->email) }}" style="border-radius:10px; height:42px;">
                    </div>
                    
                    {{-- NEW: Liên kết tài khoản --}}
                    <div style="grid-column:1/-1; background:#f8fafc; padding:16px; border-radius:12px; border:1px dashed #e2e8f0;">
                        <label class="form-label" style="color:#1e293b; font-weight:700; margin-bottom:8px; display:flex; align-items:center; gap:8px;">
                            <i class="fa-solid fa-user-shield text-blue-500"></i> Tài khoản hệ thống
                        </label>
                        <select name="user_id" class="form-select" style="background:#fff; border-radius:10px; height:42px;">
                            <option value="">-- Không liên kết tài khoản --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $agent->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <p style="font-size:11px; color:#64748b; margin-top:8px;">* Dùng để đại lý đăng nhập vào hệ thống quản lý riêng.</p>
                        @error('user_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="color:#64748b; font-weight:700;">NGƯỜI LIÊN HỆ</label>
                        <input type="text" name="contact_person" class="form-input" value="{{ old('contact_person', $agent->contact_person) }}" style="border-radius:10px; height:42px;">
                    </div>
                </div>
            </div>

            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Địa chỉ & Khu vực</span>
                </div>
                <div class="card-body" style="padding:24px; display:flex; flex-direction:column; gap:20px;">
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700; margin-bottom:12px;">KHU VỰC PHỤ TRÁCH</label>
                        <div style="background:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:12px 16px; margin-bottom:16px; display:flex; align-items:center; gap:10px;">
                            <i class="fa-solid fa-map-location-dot" style="color:#6366f1;"></i>
                            <span style="font-size:13.5px; color:#334155; font-weight:600;">Hiện tại: {{ $agent->region ?: 'Chưa xác định' }}</span>
                        </div>
                        
                        @php
                            $regionParts = $agent->region ? explode(', ', $agent->region) : [];
                            // region is stored as "Ward, District, Province" in AgentController
                            $currentWard = $regionParts[0] ?? null;
                            $currentDistrict = $regionParts[1] ?? null;
                            $currentProvince = $regionParts[2] ?? null;
                        @endphp
                        <x-address-selector 
                            container-class="grid grid-cols-1 md:grid-cols-2 gap-4"
                            col-class=""
                            select-class="form-select"
                            style="border-radius:10px; height:42px;"
                            :selected-province="$currentProvince"
                            :selected-district="$currentDistrict"
                            :selected-ward="$currentWard"
                            :required="false"
                        />
                        <p class="form-hint" style="margin-top:12px; color:#94a3b8; font-style:italic;">* Chọn lại tỉnh/thành nếu bạn muốn thay đổi khu vực phụ trách của đại lý này.</p>
                        <input type="hidden" name="region" value="{{ $agent->region }}">
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">ĐỊA CHỈ CHI TIẾT</label>
                        <textarea name="address" class="form-textarea" rows="2" style="border-radius:10px; padding:12px;">{{ old('address', $agent->address) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Ghi chú nội bộ</span>
                </div>
                <div class="card-body" style="padding:24px;">
                    <textarea name="notes" class="form-textarea" rows="4" placeholder="Nhập ghi chú quan trọng về đại lý..." style="border-radius:10px; padding:12px;">{{ old('notes', $agent->notes) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Cột phải --}}
        <div style="display:flex;flex-direction:column;gap:20px; position:sticky; top:80px;">
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
                <div style="padding:24px; background:#fff;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px;">
                        <div style="width:10px; height:10px; border-radius:50%; background:#10b981; animation: pulse 2s infinite;"></div>
                        <span style="font-size:12px; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Trạng thái: Đang mở</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%; height:46px; border-radius:12px; justify-content:center; font-size:14px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
                        <i class="fa-solid fa-save"></i> Cập nhật đại lý
                    </button>
                    <div style="margin-top:16px; padding-top:16px; border-top:1px solid #f1f5f9; color:#94a3b8; font-size:11px; text-align:center;">
                        Lần cuối cập nhật: {{ $agent->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>

            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px; padding:20px; background:linear-gradient(to bottom right, #f8fafc, #f1f5f9);">
                <p style="font-size:12px; color:#64748b; line-height:1.6;">
                    <i class="fa-solid fa-circle-info" style="color:#3b82f6; margin-right:4px;"></i>
                    Mọi thay đổi sẽ được áp dụng ngay lập tức vào hệ thống đơn hàng và phân quyền đại lý.
                </p>
            </div>
        </div>
    </div>
</form>

<style>
@keyframes pulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}
</style>
@endsection

