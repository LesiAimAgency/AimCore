@extends('themes.ehenho.layouts.app')

@section('title', 'Tìm Bạn Bốn Phương, Tìm Người Yêu theo Tuổi 10/2026 (Có Hình, SĐT & 100% Miễn Phí) - eHenho.com')
@section('meta_description', 'Tìm Bạn Bốn Phương, Tìm Người Yêu, Tìm Người Kết Hôn, Tìm Bạn Đời mới nhất 10/2026 theo những độ tuổi khác nhau có Hình, SĐT Zalo liên hệ.')

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

<div class="container" style="background-color:#FFF; padding-top:10px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-success" style="font-size: 22px; font-weight: bold; margin-top: 5px; margin-bottom: 12px;">
        Tìm Bạn Bốn Phương Theo Nhóm Tuổi 10/2026
      </h1>

      <!-- Navigation Tabs -->
      @include('themes.ehenho.components.search-tabs', ['activeTab' => 'age'])
    </div>
  </div>

  <!-- Age Category Directory 2 Columns (100% Matching tim-ban-bon-phuong-theo-tuoi.html) -->
  <div class="row" style="background-color: #fafbfc; border: 1px solid #e5e5e5; border-radius: 6px; padding: 20px 10px; margin: 0 0 25px 0;">
    <!-- Column 1: TÌM BẠN NAM -->
    <div class="col-xs-12 col-sm-6 text-left" style="line-height:2.3em">
      <span class="text-success" style="font-size: 1.15em;">
        <b><i class="fa fa-male"></i> TÌM BẠN NAM:</b>
      </span>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '18-22', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 18-22</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '18-22', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 18-22</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '22-28', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 22-28</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '22-28', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 22-28</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '28-32', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 28-32</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '28-32', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 28-32</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '32-38', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 32-38</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '32-38', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 32-38</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '38-42', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 38-42</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '38-42', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 38-42</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '42-48', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 42-48</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '42-48', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 42-48</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '48-56', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 48-56</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '48-56', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 48-56</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '56+', 'gender' => 'male']) }}">
          Tìm bạn <b>nam 56 tuổi trở lên</b>
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '56+', 'gender' => 'male', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nam 56 tuổi trở lên</b> (có hình)
        </a>
      </p>
    </div>

    <!-- Column 2: TÌM BẠN NỮ -->
    <div class="col-xs-12 col-sm-6 text-left" style="line-height:2.3em">
      <span class="text-danger" style="font-size: 1.15em;">
        <b><i class="fa fa-female"></i> TÌM BẠN NỮ:</b>
      </span>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '18-22', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 18-22</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '18-22', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 18-22</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '22-28', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 22-28</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '22-28', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 22-28</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '28-32', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 28-32</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '28-32', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 28-32</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '32-38', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 32-38</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '32-38', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 32-38</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '38-42', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 38-42</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '38-42', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 38-42</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '42-48', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 42-48</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '42-48', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 42-48</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '48-56', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 48-56</b> tuổi
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '48-56', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 48-56</b> tuổi (có hình)
        </a>
      </p>
      <p>
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '56+', 'gender' => 'female']) }}">
          Tìm bạn <b>nữ 56 tuổi trở lên</b>
        </a><br />
        <a class="navlink-b" href="{{ route('ehenho.search.by_age', ['age' => '56+', 'gender' => 'female', 'co_hinh' => 1]) }}">
          Tìm bạn <b>nữ 56 tuổi trở lên</b> (có hình)
        </a>
      </p>
    </div>
  </div>

  <!-- Profiles Listing Section -->
  <div class="row">
    <div class="col-sm-8 col-sm-offset-0">
      <div style="margin-bottom: 15px; border-bottom: 2px solid #2e5d69; padding-bottom: 8px;">
        <h3 style="margin: 0; font-size: 1.25em; color: #2e5d69; font-weight: bold;">
          @if($selectedAge)
            Hồ sơ thành viên {{ $selectedGender === 'female' ? 'Nữ' : ($selectedGender === 'male' ? 'Nam' : '') }} độ tuổi {{ $selectedAge }}
          @else
            Danh sách thành viên nổi bật
          @endif
          <span style="font-size: 0.85em; font-weight: normal; color: #777;">({{ $profiles->total() }} thành viên)</span>
        </h3>
      </div>

      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-info text-center" style="padding: 40px 20px;">
          <i class="fa fa-users fa-3x" style="color: #31708f; margin-bottom: 15px;"></i>
          <h4>Chưa có thành viên nào trong nhóm tuổi này</h4>
          <p>Bạn có thể thử nhóm tuổi khác hoặc xem toàn bộ hồ sơ.</p>
          <a href="{{ route('ehenho.search.by_age') }}" class="btn btn-default" style="margin-top: 10px;">
            <i class="fa fa-refresh"></i> Xem tất cả lứa tuổi
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
