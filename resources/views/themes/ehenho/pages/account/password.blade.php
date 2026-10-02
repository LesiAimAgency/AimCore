@extends('themes.ehenho.layouts.account')

@section('title', 'Đổi mật khẩu - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-key"></i> Thay Đổi Mật Khẩu
  </div>

  <div class="panel-body" style="padding: 25px;">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul style="margin-bottom: 0; padding-left: 20px;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('ehenho.account.password_update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="current_password">Mật khẩu hiện tại <span class="text-danger">*</span></label>
        <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Nhập mật khẩu đang dùng" required>
      </div>

      <div class="form-group">
        <label for="password">Mật khẩu mới <span class="text-danger">*</span></label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Tối thiểu 6 ký tự" required>
      </div>

      <div class="form-group">
        <label for="password_confirmation">Xác nhận mật khẩu mới <span class="text-danger">*</span></label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
      </div>

      <div style="margin-top: 25px;">
        <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
          <i class="fa fa-check"></i> Lưu Mật Khẩu Mới
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
