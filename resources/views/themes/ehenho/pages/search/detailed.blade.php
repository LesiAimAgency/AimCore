@extends('themes.ehenho.layouts.app')

@section('title', 'Tìm Bạn Bốn Phương Theo Chi Tiết - Bộ Lọc Tìm Kiếm - eHenho.com')
@section('meta_description', 'Bộ lọc tìm bạn bốn phương, tìm người yêu, kết bạn theo độ tuổi, giới tính, nơi ở và sở thích chi tiết.')

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
        Bộ Lọc Tìm Bạn Bốn Phương Chi Tiết 10/2026
      </h1>

      <!-- Navigation Tabs -->
      @include('themes.ehenho.components.search-tabs', ['activeTab' => 'detailed'])

      <!-- Search Filter Panel Component -->
      @include('themes.ehenho.components.search-filter', ['provinces' => $provinces])
    </div>
  </div>

  <div class="row" style="margin-top: 10px;">
    <!-- Main Left Column -->
    <div class="col-sm-8 col-sm-offset-0">
      <div style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 8px;">
        <span style="font-size: 1.1em; color: #2e5d69; font-weight: bold;">
          Kết quả tìm kiếm: Tìm thấy <span class="text-danger">{{ $profiles->total() }}</span> thành viên phù hợp
        </span>
      </div>

      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-warning text-center" style="padding: 40px 20px; background-color: #fcf8e3; border: 1px solid #faebcc;">
          <i class="fa fa-search fa-3x" style="color: #8a6d3b; margin-bottom: 15px;"></i>
          <h4>Không tìm thấy hồ sơ nào khớp với tiêu chí bạn đã lọc</h4>
          <p style="color: #666;">Hãy thử mở rộng khoảng tuổi, bỏ bớt điều kiện lọc hoặc chọn khu vực toàn quốc.</p>
          <a href="{{ route('ehenho.search.detailed') }}" class="btn btn-default" style="margin-top: 10px;">
            <i class="fa fa-refresh"></i> Đặt lại bộ lọc ban đầu
          </a>
        </div>
      @endforelse

      <div class="text-center" style="margin-top: 25px;">
        {{ $profiles->links('themes.ehenho.components.pagination') }}
      </div>
    </div>

    <!-- Right Sidebar Column -->
    <div class="col-sm-4">
      @include('themes.ehenho.components.recently-registered', [
        'recentFemaleProfiles' => $recentFemaleProfiles,
        'recentMaleProfiles' => $recentMaleProfiles
      ])
    </div>
  </div>
</div>
@endsection
