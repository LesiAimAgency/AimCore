@extends('themes.ehenho.layouts.auth')

@section('title', 'Quên mật khẩu - eHenho.com')

@section('auth_content')
<div class="panel panel-default" style="box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 6px;">
  <div class="panel-body" style="padding: 30px;">
    <h3 class="text-success text-center" style="font-weight: bold; margin-top: 5px; margin-bottom: 15px;">
      Khôi Phục Mật Khẩu
    </h3>
    <p class="text-muted text-center" style="margin-bottom: 25px;">
      Vui lòng nhập địa chỉ email đã đăng ký của bạn. Chúng tôi sẽ gửi hướng dẫn khôi phục mật khẩu vào hòm thư.
    </p>

    <form action="{{ route('ehenho.password.email') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="email" class="text-muted">Địa chỉ Email</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email của bạn" value="{{ old('email') }}" required autofocus>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color: #008BC7; border-color: #0077aa; font-weight: bold; margin-top: 20px;">
        <i class="fa fa-paper-plane"></i> Gửi Hướng Dẫn Đặt Lại
      </button>

      <div class="text-center" style="margin-top: 25px;">
        <a href="{{ route('ehenho.login') }}" style="color: #008BC7;">
          <i class="fa fa-arrow-left"></i> Quay lại trang Đăng nhập
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
