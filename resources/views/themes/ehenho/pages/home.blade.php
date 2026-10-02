@extends('themes.ehenho.layouts.frontend')

@section('title', 'eHenho.com - Hẹn hò Online & Tìm bạn Bốn phương')
@section('meta_description', 'eHenho.com là trang web hẹn hò online, tìm bạn, kết bạn theo sở thích & tính cách giúp bạn nhanh chóng tìm được một nửa yêu thương của mình.')

@section('frontend_content')
<!-- Circular Marker Filter Buttons (100% Matching index.html) -->
<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.by_location') }}">
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

<div class="container" style="background-color:#FFF; padding-top:0px; padding-bottom:64px;">
  <!-- Hero Carousel Component -->
  <div class="row">
    @include('themes.ehenho.components.hero-carousel')
  </div>

  <div class="row" style="margin-top: 20px;">
    <!-- Main Left Column: Profiles List (100% Matching index.html) -->
    <div class="col-sm-8 col-sm-offset-0">
      @forelse($newestProfiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="col-sm-12 text-center" style="padding: 40px 0; color: #888;">
          <i class="fa fa-user-plus fa-3x" style="color: #ccc; margin-bottom: 10px;"></i>
          <p style="font-size: 1.1em;">Chưa có hồ sơ thành viên nào được đăng ký.</p>
          <a href="{{ route('ehenho.register') }}" class="btn btn-danger">Tạo hồ sơ đầu tiên ngay!</a>
        </div>
      @endforelse

      <!-- See More Button (Exact index.html) -->
      <div style="text-align:center; width:100%; margin-top: 15px; margin-bottom: 25px;">
        <a class="btn btn-primary btn-pm-sft-cus btn-lg" href="{{ route('ehenho.search.index') }}">
          <i aria-hidden="true" class="fa fa-arrow-right"></i> XEM THÊM THÀNH VIÊN
        </a>
      </div>
    </div>

    <!-- Right Sidebar Column (100% Matching index.html) -->
    <div class="col-sm-4">
      <h4 class="text-success" style="font-weight: bold; margin-top: 5px;">
        eHenho - Hẹn hò Online theo Sở thích &amp; Tính cách
      </h4>
      <h4 class="text-info" style="font-weight: bold;">
        100% Miễn Phí
      </h4>

      <!-- Recently Registered Widget (Nữ / Nam Tabs) -->
      @include('themes.ehenho.components.recently-registered', [
        'recentFemaleProfiles' => $recentFemaleProfiles,
        'recentMaleProfiles' => $recentMaleProfiles
      ])
    </div>
  </div>
</div>
@endsection
