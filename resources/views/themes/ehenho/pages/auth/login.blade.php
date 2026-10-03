@extends('themes.ehenho.layouts.auth')

@section('title', 'Đăng nhập - eHenho.com')

@section('auth_content')
<div class="panel panel-default" style="box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 6px;">
  <div class="panel-body" style="padding: 30px;">
    <h3 class="text-success text-center" style="font-weight: bold; margin-top: 5px; margin-bottom: 25px;">
      Đăng Nhập Tài Khoản
    </h3>

    @auth
      <div class="alert alert-info text-center" style="margin-bottom: 20px; border-radius: 6px; background-color: #f0f7fd; border-color: #d0e3f7; color: #2e5d69;">
        <p style="margin-bottom: 10px; font-size: 14px;">
          <i class="fa fa-info-circle"></i> Bạn hiện đang đăng nhập với tài khoản: <strong style="color: #008BC7;">{{ auth()->user()->name ?: auth()->user()->email }}</strong>
        </p>
        <div style="display: flex; gap: 8px; justify-content: center; align-items: center; margin-bottom: 8px;">
          <a href="{{ route('ehenho.account.my_profile') }}" class="btn btn-sm btn-primary" style="background-color: #008BC7; border-color: #0077aa; font-weight: bold;">
            <i class="fa fa-user"></i> Vào Hồ Sơ Của Tôi
          </a>
          <form action="{{ route('ehenho.logout') }}" method="POST" style="display: inline; margin: 0;">
            @csrf
            <button type="submit" class="btn btn-sm btn-default" style="color: #c71616; font-weight: bold;">
              <i class="fa fa-sign-out"></i> Đăng Xuất Tài Khoản Này
            </button>
          </form>
        </div>
        <p class="text-muted" style="margin: 0; font-size: 12px;">
          Hoặc bạn có thể nhập tài khoản khác bên dưới để chuyển phiên đăng nhập.
        </p>
      </div>
    @endauth

    <form action="{{ route('ehenho.login.submit') }}" method="POST" id="login_form">
      @csrf

      <div class="form-group">
        <label for="id_login" class="text-muted">Email hoặc Tên đăng nhập</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" name="email" id="id_login" class="form-control" placeholder="Email hoặc Tên đăng nhập" value="{{ old('email') }}" required autofocus>
        </div>
      </div>

      <div class="form-group">
        <label for="id_password" class="text-muted">Mật khẩu</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" name="password" id="id_password" class="form-control c-password-dd" placeholder="Mật khẩu" required>
        </div>
      </div>

      <div class="row" style="margin-top: 10px; margin-bottom: 15px;">
        <div class="col-xs-6">
          <div class="checkbox" style="margin: 0;">
            <label>
              <input type="checkbox" name="remember" id="id_remember" {{ old('remember') ? 'checked' : '' }}>
              Duy trì đăng nhập
            </label>
          </div>
        </div>
        <div class="col-xs-6 text-right">
          <a href="{{ route('ehenho.password.request') }}" id="id_forgot_link" style="color: #008BC7;">
            Quên mật khẩu?
          </a>
        </div>
      </div>

      @if(!empty($recaptchaSiteKey))
      <!-- Google reCAPTCHA v2 Checkbox -->
      <div class="form-group text-center" style="margin-top: 15px; margin-bottom: 20px;">
        <div style="display: inline-block;">
          <div class="g-recaptcha" data-sitekey="{{ $recaptchaSiteKey }}"></div>
        </div>
        @error('g-recaptcha-response')
          <span class="text-danger" style="font-size: 13px; display: block; margin-top: 6px; font-weight: bold;">
            <i class="fa fa-exclamation-triangle"></i> {{ $message }}
          </span>
        @enderror
      </div>
      @endif

      <button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color: #008BC7; border-color: #0077aa; font-weight: bold;">
        <i class="fa fa-sign-in"></i> Đăng nhập
      </button>

      <hr style="margin: 25px 0 20px 0;">

      <div class="text-center">
        <span class="text-muted">Chưa có tài khoản eHenho?</span><br>
        <a href="{{ route('ehenho.register') }}" class="btn btn-success btn-sc-cus" style="margin-top: 10px; font-weight: bold;">
          <i class="fa fa-user-plus"></i> Tạo hồ sơ hẹn hò mới
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

@if(!empty($recaptchaSiteKey))
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
@endpush
@endif

