@extends('themes.ehenho.layouts.account')

@section('title', 'Tải lên ảnh đại diện - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa fa-camera"></i> Đổi Ảnh Đại Diện
  </div>

  <div class="panel-body" style="padding: 25px;">
    <div class="row">
      <!-- Current Avatar -->
      <div class="col-sm-4 text-center">
        <label class="text-muted" style="display: block; margin-bottom: 10px;">Ảnh hiện tại:</label>
        <img src="{{ $profile->avatar_url ? asset($profile->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}"
             alt="{{ $profile->display_name }}"
             class="img-responsive img-thumbnail"
             style="width: 180px; height: 180px; object-fit: cover; margin: auto;">
      </div>

      <!-- Upload Form -->
      <div class="col-sm-8">
        <form action="{{ route('ehenho.account.avatar_save') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="avatar">Chọn ảnh từ máy tính / điện thoại:</label>
            <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*" required>
            <p class="help-block" style="font-size: 13px;">
              Định dạng hỗ trợ: JPG, PNG, WEBP. Dung lượng tối đa: 5MB.
            </p>
          </div>

          <div class="alert alert-warning" style="font-size: 13px; line-height: 1.6em;">
            <strong><i class="fa fa-info-circle"></i> Lưu ý khi chọn ảnh đại diện:</strong>
            <ul style="padding-left: 20px; margin-top: 5px; margin-bottom: 0;">
              <li>Sử dụng ảnh chụp chân dung rõ nét khuôn mặt để tăng độ tin cậy.</li>
              <li>Không đăng ảnh có nội dung nhạy cảm, đồi trụy, vi phạm thuần phong mỹ tục.</li>
              <li>Hồ sơ có ảnh đại diện đẹp sẽ nhận được gấp 5 lần lượt tương tác và tin nhắn!</li>
            </ul>
          </div>

          <button type="submit" class="btn btn-success btn-lg btn-sc-cus">
            <i class="fa fa-upload"></i> Tải Lên & Lưu Thay Đổi
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
