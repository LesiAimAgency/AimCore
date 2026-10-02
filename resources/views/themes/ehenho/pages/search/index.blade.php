@extends('themes.ehenho.layouts.app')

@section('title', 'Tìm bạn bốn phương, Hẹn hò, Kết bạn mới nhất (Có Hình) - eHenho.com')
@section('meta_description', 'Tìm kiếm bạn trai, bạn gái, người yêu, tìm bạn đời nghiêm túc theo tỉnh thành, độ tuổi và sở thích.')

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

<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.by_location') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.search.by_age') }}">
    <span class="glyphicon glyphicon-stats"></span> Tìm theo Tuổi
  </a>
  <a class="b-button" href="{{ route('ehenho.search.detailed') }}">
    <span class="glyphicon glyphicon-tasks"></span> Tìm theo chi tiết (Bộ Lọc)
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['looking_for' => 'ket_hon']) }}">
    <span class="glyphicon glyphicon-heart"></span> Tìm người kết hôn
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'female']) }}">
    <span class="glyphicon glyphicon-user"></span> Tìm bạn gái
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'male']) }}">
    <span class="glyphicon glyphicon-user"></span> Tìm bạn trai
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:10px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-success" style="font-size: 22px; font-weight: bold; margin-top: 5px; margin-bottom: 12px;">
        Tìm bạn bốn phương, Hẹn hò, Kết bạn mới nhất 10/2026
      </h1>

      <!-- Navigation Tabs -->
      @include('themes.ehenho.components.search-tabs', ['activeTab' => 'all'])
    </div>
  </div>

  <div class="row">
    <!-- Left Column: Profiles List -->
    <div class="col-sm-8 col-sm-offset-0">
      <div style="margin-bottom: 15px; padding-bottom: 6px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <span style="font-size: 1.05em; color: #555;">
          Tìm thấy <strong class="text-danger">{{ $profiles->total() }}</strong> thành viên phù hợp
          @if(request()->hasAny(['gender', 'age_min', 'age_max', 'province', 'marital_status', 'looking_for', 'keyword']))
            <a href="{{ route('ehenho.search.index') }}" class="btn btn-xs btn-default" style="margin-left: 10px;">
              <i class="fa fa-times"></i> Xóa bộ lọc
            </a>
          @endif
        </span>
        <a href="{{ route('ehenho.search.detailed') }}" class="btn btn-xs btn-info" style="font-weight: 500;">
          <i class="fa fa-sliders"></i> Mở bộ lọc chi tiết
        </a>
      </div>

      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-info text-center" style="padding: 40px 20px;">
          <i class="fa fa-search fa-3x" style="color: #31708f; margin-bottom: 15px;"></i>
          <h4>Không tìm thấy hồ sơ nào phù hợp</h4>
          <p>Hãy thử mở rộng tiêu chí tìm kiếm hoặc lựa chọn tỉnh thành khác.</p>
          <a href="{{ route('ehenho.search.index') }}" class="btn btn-default" style="margin-top: 10px;">
            <i class="fa fa-refresh"></i> Đặt lại tìm kiếm
          </a>
        </div>
      @endforelse

      <div class="text-center" style="margin-top: 25px;">
        {{ $profiles->links('themes.ehenho.components.pagination') }}
      </div>
    </div>

    <!-- Right Column: Sidebar -->
    <div class="col-sm-4">
      <!-- Quick Filter Sidebar Box -->
      <div class="panel panel-default" style="border: 1px solid #dedede; box-shadow: 0 1px 3px rgba(0,0,0,0.05); margin-bottom: 20px;">
        <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; color: #2e5d69;">
          <i class="fa fa-filter"></i> Lọc Nhanh Thành Viên
        </div>
        <div class="panel-body">
          <form action="{{ route('ehenho.search.index') }}" method="GET">
            <div class="form-group" style="margin-bottom: 10px;">
              <label for="gender" style="font-size: 13px;">Giới tính:</label>
              <select name="gender" id="gender" class="form-control input-sm">
                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>Tất cả</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Nữ (Tìm bạn gái)</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Nam (Tìm bạn trai)</option>
              </select>
            </div>

            <div class="form-group" style="margin-bottom: 10px;">
              <label style="font-size: 13px;">Độ tuổi:</label>
              <div class="row">
                <div class="col-xs-6">
                  <input type="number" name="age_min" class="form-control input-sm" placeholder="Từ" min="18" max="80" value="{{ request('age_min', 18) }}">
                </div>
                <div class="col-xs-6">
                  <input type="number" name="age_max" class="form-control input-sm" placeholder="Đến" min="18" max="80" value="{{ request('age_max', 55) }}">
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-bottom: 10px;">
              <label for="province" style="font-size: 13px;">Tỉnh / Thành phố:</label>
              <select name="province" id="province" class="form-control input-sm">
                <option value="">-- Toàn quốc --</option>
                @foreach($provinces as $prov)
                  <option value="{{ $prov->id }}" {{ (string)request('province') === (string)$prov->id ? 'selected' : '' }}>
                    {{ $prov->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group" style="margin-bottom: 12px;">
              <label for="looking_for" style="font-size: 13px;">Mục tiêu tìm kiếm:</label>
              <select name="looking_for" id="looking_for" class="form-control input-sm">
                <option value="">-- Tất cả --</option>
                <option value="ket_hon" {{ request('looking_for') == 'ket_hon' ? 'selected' : '' }}>Tìm người để kết hôn</option>
                <option value="nguoi_yeu" {{ request('looking_for') == 'nguoi_yeu' ? 'selected' : '' }}>Tìm người yêu</option>
                <option value="ban_doi" {{ request('looking_for') == 'ban_doi' ? 'selected' : '' }}>Tìm bạn đời</option>
                <option value="tam_su" {{ request('looking_for') == 'tam_su' ? 'selected' : '' }}>Tìm bạn tâm sự</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success btn-sc-cus btn-block btn-sm" style="font-weight: bold;">
              <i class="fa fa-search"></i> Lọc Kết Quả
            </button>
          </form>
        </div>
      </div>

      <!-- Recently Registered Widget -->
      @include('themes.ehenho.components.recently-registered', [
        'recentFemaleProfiles' => $recentFemaleProfiles,
        'recentMaleProfiles' => $recentMaleProfiles
      ])
    </div>
  </div>
</div>
@endsection
