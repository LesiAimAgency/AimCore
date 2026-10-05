@extends('themes.ehenho.layouts.app')

@section('title', ($selectedProvince ? 'Tìm bạn bốn phương, Hẹn hò, Kết bạn ' . $selectedProvince->name : 'Tìm bạn bốn phương theo Tỉnh Thành') . ' 10/2026 (Có Hình) - eHenho.com')
@section('meta_description', 'Tìm bạn bốn phương, tìm người yêu, tìm bạn gái, tìm bạn trai, tìm bạn đời tại 63 tỉnh thành Việt Nam và nước ngoài có số điện thoại Zalo.')

@section('content')
<header class="text-center" style="background-color: #FCF8E3; color:#8A6D3B; padding-top:6px; padding-bottom:6px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span style="font-size:1.0em" title="Lưu ý">
          <i aria-hidden="true" class="fa fa-info-circle"></i> eHenho.com 100% Miễn Phí!
        </span>
      </div>
    </div>
  </div>
</header>

@include('themes.ehenho.components.sub-location-bar')

<div class="container" style="background-color:#FFF; padding-top:10px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-success" style="font-size: 22px; font-weight: bold; margin-top: 5px; margin-bottom: 12px;">
        @if($selectedProvince)
          Tìm bạn bốn phương, Hẹn hò, Kết bạn {{ $selectedProvince->name }} 10/2026
        @else
          Tìm bạn bốn phương theo Nơi ở &amp; Tỉnh Thành 10/2026
        @endif
      </h1>

      <!-- Navigation Tabs -->
      @include('themes.ehenho.components.search-tabs', ['activeTab' => 'location'])
    </div>
  </div>

  <!-- Province Fast Directory -->
  <div class="row" style="background-color: #fafbfc; border: 1px solid #e5e5e5; border-radius: 6px; padding: 15px 12px; margin: 0 0 25px 0;">
    <div class="col-sm-12">
      <strong style="color: #2e5d69; font-size: 1.05em; display: block; margin-bottom: 8px;">
        <i class="glyphicon glyphicon-map-marker"></i> Chọn Tỉnh / Thành phố tìm kiếm nhanh:
      </strong>
      <div style="line-height: 2.2em;">
        @foreach($provinces as $prov)
          <a class="{{ (isset($selectedProvince) && $selectedProvince->id === $prov->id) ? 'c-button' : 'b-button' }}" 
             href="{{ route('ehenho.search.by_location', $prov->id) }}" 
             style="margin: 2px;">
            {{ $prov->name }}
          </a>
        @endforeach
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Left Column: Profiles List -->
    <div class="col-sm-8 col-sm-offset-0">
      <p class="text-warning" style="font-size:1.1em; margin-bottom: 15px;">
        @if($selectedProvince)
          Các hồ sơ bạn trai, bạn gái mới nhất ở {{ $selectedProvince->name }} đang tìm người yêu, tìm người kết hôn, tìm bạn đời:
        @else
          Tất cả hồ sơ thành viên mới nhất đang tìm bạn bốn phương trên toàn quốc:
        @endif
      </p>

      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-info text-center" style="padding: 40px 20px;">
          <i class="fa fa-map-marker fa-3x" style="color: #31708f; margin-bottom: 15px;"></i>
          <h4>Chưa có thành viên nào tại khu vực {{ $selectedProvince ? $selectedProvince->name : 'này' }}</h4>
          <p>Hãy trở thành người đầu tiên tạo hồ sơ kết bạn tại khu vực này!</p>
          <a href="{{ route('ehenho.register') }}" class="btn btn-success" style="margin-top: 10px;">
            <i class="fa fa-user-plus"></i> Đăng ký hồ sơ ngay
          </a>
        </div>
      @endforelse

      <div class="text-center" style="margin-top: 25px;">
        {{ $profiles->links('themes.ehenho.components.pagination') }}
      </div>
    </div>

    <!-- Right Column: Sidebar -->
    <div class="col-sm-4">
      @include('themes.ehenho.components.recently-registered', [
        'recentFemaleProfiles' => $recentFemaleProfiles,
        'recentMaleProfiles' => $recentMaleProfiles
      ])
    </div>
  </div>
</div>
@endsection
