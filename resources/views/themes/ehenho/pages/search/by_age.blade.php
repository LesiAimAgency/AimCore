@extends('themes.ehenho.layouts.app')

@section('title', 'Tìm Bạn Bốn Phương Theo Độ Tuổi - eHenho.com')
@section('meta_description', 'Tìm kiếm bạn trai, bạn gái, kết bạn hẹn hò theo từng nhóm độ tuổi phù hợp nhất.')

@section('content')
<header class="text-center" style="background-color: #FCF8E3; color:#8A6D3B; padding-top:6px; padding-bottom:6px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <span style="font-size:1.0em" title="Lưu ý">
          <i aria-hidden="true" class="fa fa-info-circle"></i>
          eHenho.com 100% Miễn Phí!
        </span>
      </div>
    </div>
  </div>
</header>

<div class="container cont-sb-loc">
  <a class="b-button" href="{{ route('ehenho.search.index') }}">
    <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
  </a>
  <a class="b-button" href="{{ route('ehenho.search.by_age') }}">
    <span class="glyphicon glyphicon-calendar"></span> Tất cả độ tuổi
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:15px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-success" style="font-size: 22px; font-weight: bold; margin-top: 5px; margin-bottom: 15px;">
        Tìm Bạn Bốn Phương Theo Nhóm Tuổi {{ $age ? "({$age} tuổi)" : '' }}
      </h1>

      <!-- Age Quick Filter Pills -->
      <div style="margin-bottom: 25px; line-height: 2.8em;">
        <span style="font-weight: bold; margin-right: 10px; color: #2e5d69;">Chọn nhóm tuổi:</span>
        <a href="{{ route('ehenho.search.by_age', ['age' => '18-22']) }}" class="btn {{ $age == '18-22' ? 'btn-primary' : 'btn-default' }} btn-sm" style="margin: 2px;">
          18 - 22 tuổi
        </a>
        <a href="{{ route('ehenho.search.by_age', ['age' => '23-27']) }}" class="btn {{ $age == '23-27' ? 'btn-primary' : 'btn-default' }} btn-sm" style="margin: 2px;">
          23 - 27 tuổi
        </a>
        <a href="{{ route('ehenho.search.by_age', ['age' => '28-35']) }}" class="btn {{ $age == '28-35' ? 'btn-primary' : 'btn-default' }} btn-sm" style="margin: 2px;">
          28 - 35 tuổi
        </a>
        <a href="{{ route('ehenho.search.by_age', ['age' => '36-45']) }}" class="btn {{ $age == '36-45' ? 'btn-primary' : 'btn-default' }} btn-sm" style="margin: 2px;">
          36 - 45 tuổi
        </a>
        <a href="{{ route('ehenho.search.by_age', ['age' => '46-60']) }}" class="btn {{ $age == '46-60' ? 'btn-primary' : 'btn-default' }} btn-sm" style="margin: 2px;">
          46 - 60 tuổi
        </a>
        <a href="{{ route('ehenho.search.by_age') }}" class="btn {{ empty($age) ? 'btn-info' : 'btn-default' }} btn-sm" style="margin: 2px;">
          Mọi lứa tuổi
        </a>
      </div>
    </div>

    <!-- Main List of Profiles -->
    <div class="col-sm-8 col-sm-offset-0">
      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-info text-center" style="padding: 40px 20px;">
          <i class="fa fa-users" style="font-size: 3em; color: #31708f; margin-bottom: 15px;"></i>
          <h4>Chưa có thành viên nào trong nhóm tuổi này</h4>
          <p>Bạn có thể thử nhóm tuổi khác hoặc xem toàn bộ hồ sơ.</p>
          <a href="{{ route('ehenho.search.by_age') }}" class="btn btn-default" style="margin-top: 10px;">
            <i class="fa fa-refresh"></i> Xem tất cả
          </a>
        </div>
      @endforelse

      <div class="text-center" style="margin-top: 25px;">
        {{ $profiles->links('themes.ehenho.components.pagination') }}
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading" style="font-weight: bold; background-color: #f7f7f7; color: #2e5d69;">
          <i class="fa fa-filter"></i> Lọc Tỉnh Thành
        </div>
        <div class="panel-body">
          <form action="{{ route('ehenho.search.index') }}" method="GET">
            <div class="form-group">
              <label for="province">Tỉnh / Thành phố</label>
              <select name="province" id="province" class="form-control">
                <option value="">-- Tất cả --</option>
                @foreach($provinces as $prov)
                  <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-search"></i> Tìm Kiếm
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
