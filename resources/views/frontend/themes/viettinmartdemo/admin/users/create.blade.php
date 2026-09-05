@extends('admin.layouts.app')
@section('title', 'Thêm tài khoản mới')
@section('page-title', 'Tạo tài khoản')
@section('page-subtitle', 'Thêm quản trị viên hoặc khách hàng mới vào hệ thống')

@section('page-actions')
<a href="{{ locale_route('admin.users.index') }}" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<form action="{{ locale_route('admin.users.store') }}" method="POST" id="user-form">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">

        {{-- Left: Create form --}}
        <div style="display:flex;flex-direction:column;gap:24px;">

            {{-- Thông tin cơ bản --}}
            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Thông tin cá nhân</span>
                </div>
                <div class="card-body" style="padding:24px; display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="color:#64748b; font-weight:700;">HỌ VÀ TÊN <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input" required placeholder="Nhập đầy đủ họ tên" style="border-radius:10px; height:42px;">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">EMAIL <span style="color:#ef4444;">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" required placeholder="example@gmail.com" style="border-radius:10px; height:42px;">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">SỐ ĐIỆN THOẠI</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="0901234567" style="border-radius:10px; height:42px;">
                        @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">VAI TRÒ <span style="color:#ef4444;">*</span></label>
                        <select name="role" class="form-select" required style="border-radius:10px; height:42px;">
                            <option value="user"           {{ old('role') === 'user' ? 'selected' : '' }}>Khách hàng (Thành viên)</option>
                            <option value="store_manager"  {{ old('role') === 'store_manager' ? 'selected' : '' }}>Quản lý cửa hàng</option>
                            <option value="web_admin"      {{ old('role') === 'web_admin' ? 'selected' : '' }}>Quản trị Website</option>
                            <option value="manager"        {{ old('role') === 'manager' ? 'selected' : '' }}>Quản lý</option>
                        </select>
                        @error('role')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div style="grid-column:1/-1;">
                        <label class="form-label" style="color:#64748b; font-weight:700;">ĐỊA CHỈ</label>
                        <textarea name="address" class="form-textarea" rows="2" placeholder="Địa chỉ liên hệ..." style="border-radius:10px; padding:12px;">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Mật khẩu --}}
            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px;">
                <div class="card-header" style="padding:20px 24px; background:#fcfcfc; border-bottom:1px solid #f1f5f9; border-radius:16px 16px 0 0;">
                    <span class="card-title" style="font-size:15px; color:#1e293b;">Thiết lập mật khẩu</span>
                </div>
                <div class="card-body" style="padding:24px; display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">MẬT KHẨU <span style="color:#ef4444;">*</span></label>
                        <input type="password" name="password" class="form-input" required placeholder="Tối thiểu 8 ký tự" style="border-radius:10px; height:42px;">
                        @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label" style="color:#64748b; font-weight:700;">XÁC NHẬN MẬT KHẨU <span style="color:#ef4444;">*</span></label>
                        <input type="password" name="password_confirmation" class="form-input" required placeholder="Nhập lại mật khẩu" style="border-radius:10px; height:42px;">
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Actions --}}
        <div style="display:flex; flex-direction:column; gap:20px; position:sticky; top:80px;">
            <div class="card" style="border:none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius:16px; padding:24px; text-align:center;">
                <div style="width:64px;height:64px;border-radius:20px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;font-size:26px;color:#cbd5e1;margin:0 auto 16px;">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h4 style="font-size:15px; font-weight:700; color:#1e293b; margin-bottom:8px;">Tạo mới tài khoản</h4>
                <p style="font-size:12px; color:#64748b; margin-bottom:24px;">Sau khi tạo, người dùng có thể đăng nhập ngay lập tức với Email và mật khẩu đã thiết lập.</p>
                
                <button type="submit" form="user-form" class="btn btn-primary" style="width:100%; height:46px; border-radius:12px; justify-content:center; font-size:14px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
                    <i class="fa-solid fa-check"></i> Hoàn tất tạo tài khoản
                </button>
            </div>

            <div class="card" style="border:none; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-radius:16px; padding:20px; background:linear-gradient(to bottom right, #f8fafc, #f1f5f9);">
                <p style="font-size:12px; color:#64748b; line-height:1.6;">
                    <i class="fa-solid fa-shield-halved" style="color:#3b82f6; margin-right:4px;"></i>
                    Mật khẩu nên bao gồm cả chữ cái, số và ký tự đặc biệt để đảm bảo an toàn cho hệ thống.
                </p>
            </div>
        </div>
    </div>
</form>
@endsection

