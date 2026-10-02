@extends('themes.ehenho.layouts.frontend')

@section('title', 'eHenho.com - Hẹn hò Online, Tìm bạn, Kết bạn theo Sở thích & Tính cách')

@section('frontend_content')
<div class="container cont-sb-loc" style="margin-top: 15px; margin-bottom: 15px;">
  <a class="b-button" href="{{ route('ehenho.search.index') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['looking_for' => 'ket_hon']) }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm người kết hôn
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['looking_for' => 'nguoi_yeu']) }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm người yêu
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'female']) }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn gái
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'male']) }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn trai
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['looking_for' => 'ban_doi']) }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn đời
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:0px; padding-bottom:40px;">
  <!-- Hero Carousel Component -->
  @include('themes.ehenho.components.hero-carousel')

  <!-- Search Filter Component -->
  <div style="margin-top: 25px;">
    @include('themes.ehenho.components.search-filter')
  </div>

  <!-- Featured / New Members Section -->
  <div class="row" style="margin-top: 30px;">
    <div class="col-sm-12">
      <h3 style="border-bottom: 2px solid #e74c3c; padding-bottom: 8px; color: #2c3e50; font-size: 1.4em; font-weight: bold;">
        <i class="fa fa-users" style="color: #e74c3c;"></i> Thành Viên Mới Tham Gia
      </h3>
    </div>
  </div>

  <div class="row" style="margin-top: 15px;">
    @forelse($newestProfiles as $profile)
      <div class="col-md-6 col-sm-12">
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      </div>
    @empty
      <div class="col-sm-12 text-center" style="padding: 40px 0; color: #888;">
        <i class="fa fa-user-plus fa-3x" style="color: #ccc; margin-bottom: 10px;"></i>
        <p style="font-size: 1.1em;">Chưa có hồ sơ thành viên nào được đăng ký.</p>
        <a href="{{ route('ehenho.register') }}" class="btn btn-danger">Tạo hồ sơ đầu tiên ngay!</a>
      </div>
    @endforelse
  </div>

  <!-- Introduction & Safe Dating Notice -->
  <div class="row" style="margin-top: 40px; background-color: #fcfcfc; border: 1px solid #eee; border-radius: 6px; padding: 25px 15px;">
    <div class="col-md-8">
      <h4 style="font-weight: bold; color: #2e5d69;">
        <i class="fa fa-heart" style="color: #e74c3c;"></i> Hẹn hò Online &amp; Tìm bạn bốn phương tại eHenho.com
      </h4>
      <p style="color: #555; line-height: 1.7em;">
        eHenho.com là nền tảng kết bạn, tìm người yêu và tìm bạn đời nghiêm túc hàng đầu, hoàn toàn 100% miễn phí. Với hệ thống phân loại theo tỉnh thành, độ tuổi và sở thích tính cách, chúng tôi giúp bạn nhanh chóng tìm thấy một nửa phù hợp với mình một cách chủ động, an toàn và bảo mật thông tin.
      </p>
    </div>
    <div class="col-md-4 text-center" style="border-left: 1px solid #eee; padding-top: 15px;">
      <h4 class="text-info" style="font-weight: bold;">100% Miễn Phí</h4>
      <p class="text-muted">Không thu phí duy trì hay gửi tin nhắn.</p>
      <a href="{{ route('ehenho.register') }}" class="btn btn-success btn-lg">
        <i class="fa fa-check"></i> Đăng Ký Miễn Phí
      </a>
    </div>
  </div>
</div>
@endsection
