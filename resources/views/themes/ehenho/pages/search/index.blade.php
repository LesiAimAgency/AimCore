@extends('themes.ehenho.layouts.app')

@section('title', 'Tìm bạn bốn phương, Hẹn hò, Kết bạn - eHenho.com')
@section('meta_description', 'Tìm kiếm bạn trai, bạn gái, người yêu, tìm bạn đời nghiêm túc theo tỉnh thành, độ tuổi và sở thích.')

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
    <span class="glyphicon glyphicon-heart"></span> Tìm bạn theo Độ tuổi
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'female']) }}">
    <span class="glyphicon glyphicon-user"></span> Tìm bạn gái
  </a>
  <a class="b-button" href="{{ route('ehenho.search.index', ['gender' => 'male']) }}">
    <span class="glyphicon glyphicon-user"></span> Tìm bạn trai
  </a>
</div>

<div class="container" style="background-color:#FFF; padding-top:15px; padding-bottom:64px">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-success" style="font-size: 22px; font-weight: bold; margin-top: 5px; margin-bottom: 10px;">
        Tìm bạn bốn phương, Hẹn hò, Kết bạn mới nhất
      </h1>
      <p style="color: #666; font-size: 14px; margin-bottom: 20px;">
        Tìm thấy <strong>{{ $profiles->total() }}</strong> thành viên phù hợp với tiêu chí của bạn.
      </p>
    </div>

    <!-- Main List of Profiles -->
    <div class="col-sm-8 col-sm-offset-0">
      @forelse($profiles as $profile)
        @include('themes.ehenho.components.profile-card', ['profile' => $profile])
      @empty
        <div class="alert alert-info text-center" style="padding: 40px 20px;">
          <i class="fa fa-search" style="font-size: 3em; color: #31708f; margin-bottom: 15px;"></i>
          <h4>Không tìm thấy hồ sơ nào phù hợp</h4>
          <p>Hãy thử mở rộng tiêu chí tìm kiếm hoặc lựa chọn tỉnh thành khác.</p>
          <a href="{{ route('ehenho.search.index') }}" class="btn btn-default" style="margin-top: 10px;">
            <i class="fa fa-refresh"></i> Đặt lại bộ lọc
          </a>
        </div>
      @endforelse

      <div class="text-center" style="margin-top: 25px;">
        {{ $profiles->links('themes.ehenho.components.pagination') }}
      </div>
    </div>

    <!-- Search Sidebar Filters -->
    <div class="col-sm-4">
      <div class="panel panel-default" style="border: 1px solid #dedede; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; color: #2e5d69;">
          <i class="fa fa-filter"></i> Bộ Lọc Tìm Kiếm
        </div>
        <div class="panel-body">
          <form action="{{ route('ehenho.search.index') }}" method="GET">
            <div class="form-group">
              <label for="gender">Giới tính</label>
              <select name="gender" id="gender" class="form-control">
                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>Tất cả</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Nữ (Tìm bạn gái)</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Nam (Tìm bạn trai)</option>
              </select>
            </div>

            <div class="form-group">
              <label>Độ tuổi</label>
              <div class="row">
                <div class="col-xs-6">
                  <input type="number" name="age_min" class="form-control" placeholder="Từ" min="18" max="80" value="{{ request('age_min') }}">
                </div>
                <div class="col-xs-6">
                  <input type="number" name="age_max" class="form-control" placeholder="Đến" min="18" max="80" value="{{ request('age_max') }}">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="province">Tỉnh / Thành phố</label>
              <select name="province" id="province" class="form-control">
                <option value="">-- Tất cả tỉnh thành --</option>
                @foreach($provinces as $prov)
                  <option value="{{ $prov->id }}" {{ request('province') == $prov->id ? 'selected' : '' }}>
                    {{ $prov->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="marital_status">Tình trạng hôn nhân</label>
              <select name="marital_status" id="marital_status" class="form-control">
                <option value="">-- Mọi tình trạng --</option>
                <option value="Độc thân" {{ request('marital_status') == 'Độc thân' ? 'selected' : '' }}>Độc thân</option>
                <option value="Ly dị" {{ request('marital_status') == 'Ly dị' ? 'selected' : '' }}>Ly dị</option>
                <option value="Ở góa" {{ request('marital_status') == 'Ở góa' ? 'selected' : '' }}>Ở góa</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success btn-block" style="margin-top: 15px;">
              <i class="fa fa-search"></i> Lọc Kết Quả
            </button>
          </form>
        </div>
      </div>

      <!-- Category Quick Links -->
      <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; color: #2e5d69;">
          <i class="fa fa-heart"></i> Chủ Đề Hẹn Hò
        </div>
        <div class="list-group">
          <a href="{{ route('ehenho.search.index', ['marital_status' => 'Độc thân']) }}" class="list-group-item">
            <i class="fa fa-angle-right text-muted"></i> Tìm bạn độc thân
          </a>
          <a href="{{ route('ehenho.search.index', ['marital_status' => 'Ly dị']) }}" class="list-group-item">
            <i class="fa fa-angle-right text-muted"></i> Tìm bạn ly dị
          </a>
          <a href="{{ route('ehenho.search.index', ['looking_for' => 'kết hôn']) }}" class="list-group-item">
            <i class="fa fa-angle-right text-muted"></i> Tìm người để kết hôn
          </a>
          <a href="{{ route('ehenho.search.index', ['looking_for' => 'yêu lâu dài']) }}" class="list-group-item">
            <i class="fa fa-angle-right text-muted"></i> Tìm người yêu lâu dài
          </a>
          <a href="{{ route('ehenho.search.index', ['looking_for' => 'tâm sự']) }}" class="list-group-item">
            <i class="fa fa-angle-right text-muted"></i> Tìm bạn tâm sự
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
