@extends('themes.ehenho.layouts.account')

@section('title', 'Hồ sơ của tôi - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; display: flex; justify-content: space-between; align-items: center;">
    <span><i class="fa fa-user"></i> Hồ Sơ Của Tôi</span>
    <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}" class="btn btn-xs btn-primary" target="_blank">
      <i class="fa fa-external-link"></i> Xem hồ sơ công khai
    </a>
  </div>

  <div class="panel-body" style="padding: 25px;">
    <div class="row">
      <!-- Avatar & Quick links -->
      <div class="col-sm-4 text-center">
        <div style="margin-bottom: 15px;">
          <img src="{{ $profile->avatar_url ? asset($profile->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}"
               alt="{{ $profile->display_name }}"
               class="img-responsive img-thumbnail"
               style="width: 180px; height: 180px; object-fit: cover; margin: auto;">
        </div>
        <div>
          <a href="{{ route('ehenho.account.avatar_upload') }}" class="btn btn-default btn-sm btn-block">
            <i class="fa fa-camera"></i> Đổi ảnh đại diện
          </a>
          <a href="{{ route('ehenho.account.profile_edit') }}" class="btn btn-success btn-sm btn-block" style="margin-top: 6px;">
            <i class="fa fa-edit"></i> Chỉnh sửa thông tin
          </a>
        </div>
      </div>

      <!-- Profile Summary Details -->
      <div class="col-sm-8">
        <h2 style="font-size: 22px; font-weight: bold; color: #008BC7; margin-top: 0;">
          {{ $profile->display_name }}
          <small style="font-size: 14px; color: #555;">
            ({{ $profile->age }} tuổi, {{ $profile->gender == 'female' ? 'Nữ' : ($profile->gender == 'male' ? 'Nam' : 'Khác') }})
          </small>
        </h2>

        <div style="margin-bottom: 15px;">
          <span class="label label-success" style="font-size: 12px;">Đang hoạt động</span>
          @if($profile->is_online)
            <span class="label label-info" style="font-size: 12px; background-color: #10b981;"><i class="fa fa-circle"></i> Đang trực tuyến</span>
          @endif
          @if($profile->is_featured)
            <span class="label label-warning" style="font-size: 12px; background-color: #f59e0b;"><i class="fa fa-star"></i> Hồ sơ nổi bật</span>
          @endif
        </div>

        <table class="table table-bordered" style="margin-top: 15px;">
          <tr>
            <th style="width: 35%; background: #fbfbfb;">Tỉnh / Thành phố:</th>
            <td>{{ $profile->province_name ?: 'Chưa cập nhật' }}</td>
          </tr>
          <tr>
            <th style="background: #fbfbfb;">Tình trạng hôn nhân:</th>
            <td>{{ $profile->marital_status ?: 'Độc thân' }}</td>
          </tr>
          <tr>
            <th style="background: #fbfbfb;">Nghề nghiệp:</th>
            <td>{{ $profile->occupation ?: 'Chưa cập nhật' }}</td>
          </tr>
          <tr>
            <th style="background: #fbfbfb;">Chiều cao:</th>
            <td>{{ $profile->height ? $profile->height . ' cm' : 'Chưa cập nhật' }}</td>
          </tr>
          <tr>
            <th style="background: #fbfbfb;">Học vấn:</th>
            <td>{{ $profile->education ?: 'Chưa cập nhật' }}</td>
          </tr>
          <tr>
            <th style="background: #fbfbfb;">Sở thích:</th>
            <td>{{ $profile->interests ?: 'Chưa cập nhật' }}</td>
          </tr>
        </table>
      </div>
    </div>

    <hr>

    <div style="margin-top: 15px;">
      <h4 style="color: #2e5d69; font-weight: bold;">
        <i class="fa fa-heart"></i> Mục tiêu tìm kiếm
      </h4>
      <p style="font-size: 14px; line-height: 1.6em; background: #fffcf0; padding: 12px; border-left: 4px solid #f0ad4e; border-radius: 3px;">
        {{ $profile->looking_for ?: 'Chưa nhập tiêu chuẩn tìm bạn đời. Hãy cập nhật để người khác tìm thấy bạn dễ hơn!' }}
      </p>
    </div>

    <div style="margin-top: 20px;">
      <h4 style="color: #2e5d69; font-weight: bold;">
        <i class="fa fa-info-circle"></i> Giới thiệu bản thân
      </h4>
      <p style="font-size: 14px; line-height: 1.7em; background: #f8f9fa; padding: 12px; border-radius: 4px;">
        {{ $profile->about_me ?: 'Chưa có lời giới thiệu. Hãy chia sẻ về tính cách, quan điểm sống của bạn nhé.' }}
      </p>
    </div>
  </div>
</div>
@endsection
