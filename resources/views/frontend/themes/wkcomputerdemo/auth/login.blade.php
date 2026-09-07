@extends('layouts.app')
@section('title', 'Đăng nhập - WKcomputer')
@section('content')
<div style="background:#f0f2f5;min-height:80vh;display:flex;align-items:center;padding:40px 0;">
    <div class="wk-container">
        <div style="max-width:440px;margin:0 auto;">
            <div style="background:#fff;border-radius:20px;padding:40px;box-shadow:0 4px 24px rgba(0,0,0,.08);">
                <div style="text-align:center;margin-bottom:28px;">
                    <div style="font-size:28px;font-weight:800;color:#1e293b;margin-bottom:6px;">
                        <span style="color:var(--wk-primary);">WK</span>Computer
                    </div>
                    <p style="color:#64748b;font-size:13px;margin:0;">Đăng nhập vào tài khoản của bạn</p>
                </div>

                @if(session('error'))
                <div style="background:#ffebee;border:1px solid #ef9a9a;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:13px;color:#c62828;">
                    {{ session('error') }}
                </div>
                @endif

                @if($errors->any())
                <div style="background:#ffebee;border:1px solid #ef9a9a;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:13px;color:#c62828;">
                    @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="margin-bottom:14px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="email@example.com"
                               style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:14px;outline:none;transition:border .2s;"
                               onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>
                    <div style="margin-bottom:6px;">
                        <label style="font-size:12px;font-weight:700;color:#64748b;margin-bottom:6px;display:block;">Mật khẩu</label>
                        <input type="password" name="password" required
                               placeholder="••••••••"
                               style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;font-size:14px;outline:none;transition:border .2s;"
                               onfocus="this.style.borderColor='var(--wk-primary)'" onblur="this.style.borderColor='#e2e8f0'">
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;font-size:12px;">
                        <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
                            <input type="checkbox" name="remember" style="accent-color:var(--wk-primary);">
                            Ghi nhớ đăng nhập
                        </label>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color:var(--wk-primary);">Quên mật khẩu?</a>
                        @endif
                    </div>
                    <button type="submit" class="wk-btn wk-btn-primary wk-btn-block wk-btn-lg">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </button>
                </form>

                <div style="text-align:center;margin-top:24px;font-size:13px;color:#64748b;">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}" style="color:var(--wk-primary);font-weight:600;">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
