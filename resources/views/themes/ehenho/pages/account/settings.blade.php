@extends('themes.ehenho.layouts.account')

@section('title', 'Thiết lập tài khoản - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-cog"></i> Thiết Lập Quyền Riêng Tư & Thông Báo
  </div>

  <div class="panel-body" style="padding: 25px;">
    <form action="{{ route('ehenho.account.settings_update') }}" method="POST">
      @csrf
      @method('PUT')

      <h4 style="color: #2e5d69; font-weight: bold; margin-top: 5px;">
        <i class="fa fa-bell"></i> Cài Đặt Thông Báo
      </h4>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="notify_new_message" value="1" checked>
          Gửi email thông báo khi có thành viên khác gửi tin nhắn cho tôi
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="notify_likes" value="1" checked>
          Gửi email thông báo khi có người thích hồ sơ của tôi
        </label>
      </div>

      <hr>

      <h4 style="color: #2e5d69; font-weight: bold;">
        <i class="fa fa-eye"></i> Trạng Thái Hiển Thị Hồ Sơ
      </h4>
      <div class="radio">
        <label>
          <input type="radio" name="visibility" value="public" checked>
          <strong>Công khai:</strong> Hiển thị hồ sơ cho tất cả thành viên trên hệ thống tìm kiếm
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="visibility" value="hidden">
          <strong>Ẩn hồ sơ:</strong> Tạm thời ẩn hồ sơ khỏi kết quả tìm kiếm (Dành cho khi bạn đã tìm được nửa kia)
        </label>
      </div>

      <div style="margin-top: 30px;">
        <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
          <i class="fa fa-save"></i> Lưu Thiết Lập
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
