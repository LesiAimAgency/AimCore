@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa tài khoản')
@section('page-title', 'Chỉnh sửa tài khoản')
@section('page-subtitle', $user->name)

@section('page-actions')
<div style="display:flex; gap:8px;">
    <a href="{{ locale_route('admin.users.show', $user) }}" class="btn btn-ghost">
        <i class="fa-solid fa-eye"></i> Xem hồ sơ
    </a>
    <a href="{{ locale_route('admin.users.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
    </a>
</div>
@endsection

@section('content')
<form action="{{ locale_route('admin.users.update', $user) }}" method="POST" id="user-form">
    @csrf @method('PUT')
    <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">

        {{-- Left: Edit form --}}
        <div style="display:flex;flex-direction:column;gap:24px;">

            {{-- Thông tin cơ bản --}}
            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Thông tin tài khoản</span>
                </div>
                <div class="card-body" style="padding:24px; display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">HỌ VÀ TÊN <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required style="border-radius:10px; height:42px;">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">EMAIL <span style="color:#ef4444;">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required style="border-radius:10px; height:42px;">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">SỐ ĐIỆN THOẠI</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-input" placeholder="0901234567" style="border-radius:10px; height:42px;">
                        @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">VAI TRÒ <span style="color:#ef4444;">*</span></label>
                        <select name="role" class="form-select" style="border-radius:10px; height:42px;">
                            <option value="user"           {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Khách hàng (Thành viên)</option>
                            <option value="store_manager"  {{ old('role', $user->role) === 'store_manager' ? 'selected' : '' }}>Quản lý cửa hàng</option>
                            <option value="web_admin"      {{ old('role', $user->role) === 'web_admin' ? 'selected' : '' }}>Quản trị Website</option>
                            <option value="manager"        {{ old('role', $user->role) === 'manager' ? 'selected' : '' }}>Quản lý</option>
                            @if($user->role === 'admin')
                                <option value="admin" selected>Administrator (Toàn quyền)</option>
                            @endif
                        </select>
                        @error('role')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="color:#64748b; font-weight:700;">ĐỊA CHỈ</label>
                        <textarea name="address" class="form-textarea" rows="2" placeholder="Địa chỉ liên hệ..." style="border-radius:10px; padding:12px;">{{ old('address', $user->address) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Đổi mật khẩu --}}
            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Bảo mật & Mật khẩu</span>
                </div>
                <div class="card-body" style="padding:24px;">
                    <div style="background:#fff7ed; border:1px solid #ffedd5; border-radius:12px; padding:12px 16px; margin-bottom:20px; display:flex; align-items:center; gap:12px;">
                        <i class="fa-solid fa-circle-info" style="color:#f59e0b;"></i>
                        <p style="font-size:13px; color:#9a3412;">Để trống các trường dưới đây nếu bạn không muốn thay đổi mật khẩu của người dùng này.</p>
                    </div>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                        <div>
                            <label class="form-label" style="color:#64748b; font-weight:700;">MẬT KHẨU MỚI</label>
                            <input type="password" name="password" class="form-input" placeholder="Tối thiểu 8 ký tự" style="border-radius:10px; height:42px;">
                        </div>
                        <div>
                            <label class="form-label" style="color:#64748b; font-weight:700;">XÁC NHẬN MẬT KHẨU</label>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="Nhập lại mật khẩu" style="border-radius:10px; height:42px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: Status & Action --}}
        <div style="display:flex;flex-direction:column;gap:20px; position:sticky; top:80px;">
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; overflow:hidden;">
                <div style="padding:24px; background:#fff;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px; justify-content:center; flex-direction:column; text-align:center;">
                        <div style="width:64px;height:64px;border-radius:20px;background:linear-gradient(135deg,#3b82f6,#8b5cf6);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:700;color:#fff;box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);">
                            {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p style="font-size:15px; font-weight:700; color:#1e293b;">{{ $user->name }}</p>
                            @php
                                $badgeClass = [
                                    'admin'         => 'badge-red',
                                    'manager'       => 'badge-purple',
                                    'store_manager' => 'badge-orange',
                                    'web_admin'     => 'badge-blue',
                                ][$user->role] ?? 'badge-gray';
                            @endphp
                            <span class="badge {{ $badgeClass }}" style="font-size:10px;">{{ $user->role_name }}</span>
                        </div>
                    </div>
                    
                    <button type="submit" form="user-form" class="btn btn-primary" style="width:100%; height:46px; border-radius:12px; justify-content:center; font-size:14px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
                        <i class="fa-solid fa-save"></i> Lưu thay đổi
                    </button>
                    
                    <div style="margin-top:16px; padding-top:16px; border-top:1px solid #f1f5f9; color:#94a3b8; font-size:11px; text-align:center;">
                        Tài khoản tạo ngày: {{ $user->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>

            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px; padding:20px; background:linear-gradient(to bottom right, #f8fafc, #f1f5f9);">
                <p style="font-size:12px; color:#64748b; line-height:1.6;">
                    <i class="fa-solid fa-circle-info" style="color:#3b82f6; margin-right:4px;"></i>
                    Việc thay đổi email hoặc mật khẩu sẽ ảnh hưởng đến thông tin đăng nhập của người dùng này.
                </p>
            </div>
        </div>
    </div>
</form>
@endsection

