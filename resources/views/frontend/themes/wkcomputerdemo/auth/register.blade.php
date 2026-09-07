@extends('layouts.app')
@section('title', 'Đăng ký tài khoản - WKcomputer')
@section('content')
<div style="background:#f0f2f5;min-height:80vh;display:flex;align-items:center;padding:40px 0;">
    <div class="wk-container">
        <div style="max-width:480px;margin:0 auto;">
            <div style="background:#fff;border-radius:20px;padding:40px;box-shadow:0 4px 24px rgba(0,0,0,.08);">
                <div style="text-align:center;margin-bottom:28px;">
                    <div style="font-size:28px;font-weight:800;color:#1e293b;margin-bottom:6px;">
                        <span style="color:var(--wk-primary);">WK</span>Computer
                    </div>
                    <p style="color:#64748b;font-size:13px;margin:0;">Tạo tài khoản mới, nhận ưu đãi độc quyền</p>
                </div>

                @if($errors->any())
                <div style="background:#ffebee;border:1px solid #ef9a9a;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:13px;color:#c62828;">
                    @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px;">
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Họ tên *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   placeholder="Nguyễn Văn A"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Số điện thoại</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   placeholder="0901234567"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                    </div>
                    <div style="margin-bottom:12px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               placeholder="email@example.com"
                               style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:14px;outline:none;"
                               onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;">
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Mật khẩu *</label>
                            <input type="password" name="password" required
                                   placeholder="Tối thiểu 8 ký tự"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div>
                            <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Xác nhận mật khẩu *</label>
                            <input type="password" name="password_confirmation" required
                                   placeholder="Nhập lại mật khẩu"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:13px;outline:none;"
                                   onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                    </div>
                    <button type="submit" class="wk-btn wk-btn-primary wk-btn-block wk-btn-lg">
                        <i class="fas fa-user-plus"></i> Đăng ký ngay
                    </button>
                </form>

                <div style="text-align:center;margin-top:24px;font-size:13px;color:#64748b;">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}" style="color:var(--wk-primary);font-weight:600;">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
