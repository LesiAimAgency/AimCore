@extends('themes.ehenho.layouts.auth')

@section('title', 'Đăng ký tài khoản - eHenho.com')

@section('auth_content')
<div class="panel panel-default" style="box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 6px;">
  <div class="panel-body" style="padding: 30px;">
    <h3 class="text-success text-center" style="font-weight: bold; margin-top: 5px; margin-bottom: 25px;">
      Đăng Ký Hồ Sơ Hẹn Hò
    </h3>

    <form action="{{ route('ehenho.register.submit') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name" class="text-muted">Họ tên / Tên hiển thị <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Ví dụ: Thùy Tiên, Minh Đức..." value="{{ old('name') }}" required>
      </div>

      <div class="form-group">
        <label for="email" class="text-muted">Địa chỉ Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email nhận thông báo và đăng nhập" value="{{ old('email') }}" required>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="gender" class="text-muted">Giới tính <span class="text-danger">*</span></label>
            <select name="gender" id="gender" class="form-control" required>
              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
              <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="age" class="text-muted">Tuổi <span class="text-danger">*</span></label>
            <input type="number" name="age" id="age" class="form-control" min="18" max="80" placeholder="18 - 80" value="{{ old('age', 24) }}" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="province_id" class="text-muted">Tỉnh / Thành phố sinh sống</label>
        <select name="province_id" id="province_id" class="form-control">
          <option value="">-- Chọn Tỉnh / Thành phố --</option>
          @foreach($provinces as $province)
            <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
              {{ $province->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password" class="text-muted">Mật khẩu <span class="text-danger">*</span></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Tối thiểu 6 ký tự" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_confirmation" class="text-muted">Nhập lại mật khẩu <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu" required>
          </div>
        </div>
      </div>

      <div class="checkbox" style="margin-top: 15px; margin-bottom: 20px;">
        <label>
          <input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }} required>
          Tôi đồng ý với <a href="{{ route('ehenho.terms') }}" target="_blank" style="color: #008BC7;">Điều khoản sử dụng</a> và cam kết thông tin trung thực.
        </label>
      </div>

      <button type="submit" class="btn btn-success btn-block btn-lg btn-sc-cus" style="font-weight: bold;">
        <i class="fa fa-user-plus"></i> Hoàn Tất Đăng Ký
      </button>

      <div class="text-center" style="margin-top: 20px;">
        <span class="text-muted">Đã có tài khoản?</span>
        <a href="{{ route('ehenho.login') }}" style="color: #008BC7; font-weight: bold;">Đăng nhập ngay</a>
      </div>
    </form>
  </div>
</div>
@endsection
