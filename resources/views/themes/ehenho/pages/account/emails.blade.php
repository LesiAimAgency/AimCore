@extends('themes.ehenho.layouts.account')

@section('title', 'Quản lý email - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-envelope"></i> Quản Lý Địa Chỉ Email
  </div>

  <div class="panel-body" style="padding: 25px;">
    <div class="alert alert-info">
      <strong>Email hiện tại:</strong> {{ auth()->user()->email }} 
      <span class="label label-success" style="margin-left: 8px;"><i class="fa fa-check"></i> Đang hoạt động</span>
    </div>

    <p style="color: #666; font-size: 14px; margin-top: 15px;">
      Địa chỉ email này được dùng để đăng nhập vào eHenho và nhận các thông báo quan trọng khi có tin nhắn hoặc người ghép đôi mới.
    </p>

    <hr>

    <h4 style="color: #2e5d69; font-weight: bold; margin-bottom: 15px;">
      Cập nhật email mới
    </h4>

    <form action="{{ route('ehenho.account.settings_update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="new_email">Địa chỉ Email mới:</label>
        <input type="email" name="email" id="new_email" class="form-control" placeholder="Nhập email mới của bạn" value="{{ old('email') }}" required>
      </div>

      <button type="submit" class="btn btn-primary" style="background-color: #008BC7; border-color: #0077aa;">
        <i class="fa fa-save"></i> Cập Nhật Email
      </button>
    </form>
  </div>
</div>
@endsection
