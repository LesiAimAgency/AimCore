@extends('themes.ehenho.layouts.app')

@section('title', $profile->display_name . ' - ' . ($profile->looking_for ?? 'Hẹn hò kết bạn') . ' tại ' . ($profile->province_name ?? 'Việt Nam') . ' - eHenho.com')
@section('meta_description', 'Hồ sơ ' . $profile->display_name . ', ' . $profile->age . ' tuổi, ' . ($profile->marital_status ?? 'Độc thân') . ' tại ' . ($profile->province_name ?? 'Việt Nam') . '. ' . \Illuminate\Support\Str::limit($profile->about_me ?? '', 150))

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

<div class="container" style="background-color:#FFF; padding-top:15px; padding-bottom:64px">
  <!-- Related Profiles Strip -->
  @if($relatedProfiles->isNotEmpty())
  <div class="row" style="margin-bottom: 20px;">
    <div class="col-md-12">
      <div style="font-weight: bold; margin-bottom: 8px; color: #2e5d69;">
        <i class="fa fa-users"></i> Có thể bạn cũng quan tâm:
      </div>
      <div class="row" style="margin: 0 -4px;">
        @foreach($relatedProfiles as $rel)
        <div class="col-xs-4 col-sm-2 text-center" style="padding: 0 4px; margin-bottom: 10px;">
          <a href="{{ route('ehenho.profile.show', $rel->slug ?: $rel->id) }}" style="text-decoration: none;">
            <img src="{{ $rel->avatar_url ? asset($rel->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}"
                 alt="{{ $rel->display_name }}"
                 class="img-responsive img-thumbnail"
                 style="width: 100px; height: 100px; object-fit: cover; margin: auto;">
            <div style="font-size: 12px; font-weight: bold; color: #008BC7; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 4px;">
              {{ $rel->display_name }}
            </div>
            <div style="font-size: 11px; color: #777;">
              {{ $rel->age }} tuổi, {{ $rel->province_name ?? 'VN' }}
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endif

  <!-- Main Profile Details -->
  <div class="row">
    <div class="col-sm-8 col-sm-offset-0">
      <table class="table table-striped table-bordered border-collapse ptable" style="width:100%; table-layout:fixed;">
        <tr>
          <td colspan="2" style="font-size:1.4em; text-align:center; vertical-align:middle; padding: 12px; height:48px; border-bottom:3px solid #EDEDED; background-color: #fafafa;">
            <span style="font-weight:bold; color:#1D788F;">
              {{ $profile->display_name }}:
            </span>
            <span style="font-weight:500; color:#3F728E;">
              <i aria-hidden="true" class="fa fa-quote-left"></i>
              {{ $profile->looking_for ?: 'Tìm bạn chân thành, nghiêm túc' }}
              <i aria-hidden="true" class="fa fa-quote-right"></i>
            </span>
          </td>
        </tr>

        <tr>
          <!-- Left Action Buttons (Bookmark, Like) -->
          <td style="width: 25%; text-align: center; vertical-align: top; padding: 15px 5px;">
            <div style="margin-bottom: 15px;">
              <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                <input type="hidden" name="type" value="bookmark">
                <button type="submit" class="btn btn-default btn-block btn-sm" title="Lưu vào danh sách yêu thích">
                  <i class="fa fa-star text-warning" style="font-size: 1.4em;"></i><br>
                  <small>Đánh dấu</small>
                </button>
              </form>
            </div>

            <div>
              <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                <input type="hidden" name="type" value="like">
                <button type="submit" class="btn btn-default btn-block btn-sm" title="Thích hồ sơ này">
                  <i class="fa fa-heart text-danger" style="font-size: 1.4em;"></i><br>
                  <small>Thích</small>
                </button>
              </form>
            </div>
          </td>

          <!-- Big Photo & Header Action -->
          <td style="width: 75%; padding: 15px;">
            <div class="text-center" style="margin-bottom: 15px;">
              <img src="{{ $profile->avatar_url ? asset($profile->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}"
                   alt="{{ $profile->display_name }}"
                   class="img-responsive img-thumbnail"
                   style="max-height: 400px; margin: auto; object-fit: contain;">
            </div>

            <div class="text-center" style="margin-top: 15px;">
              <a class="btn btn-success btn-lg btn-sc-cus" href="{{ route('ehenho.messages.compose', ['to' => $profile->user_id]) }}">
                <i aria-hidden="true" class="fa fa-envelope"></i>
                Nhắn tin ngay cho {{ $profile->display_name }}!
              </a>
            </div>
          </td>
        </tr>

        <!-- Table of Specs -->
        <tr>
          <td class="pv-td" style="font-weight: bold; width: 25%; background: #fcfcfc;">Thông tin cơ bản</td>
          <td class="pv-details" style="width: 75%;">
            {{ $profile->gender == 'female' ? 'Nữ' : ($profile->gender == 'male' ? 'Nam' : 'Khác') }} - 
            {{ $profile->marital_status ?: 'Độc thân' }} - 
            {{ $profile->age }} tuổi 
            @if($profile->height) - Cao {{ $profile->height }} cm @endif
            @if($profile->education) - {{ $profile->education }} @endif
          </td>
        </tr>

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Nơi ở</td>
          <td class="pv-details">{{ $profile->province_name ?: 'Chưa cập nhật' }}</td>
        </tr>

        @if($profile->occupation)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Nghề nghiệp</td>
          <td class="pv-details">{{ $profile->occupation }}</td>
        </tr>
        @endif

        @if($profile->interests)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Sở thích</td>
          <td class="pv-details">{{ $profile->interests }}</td>
        </tr>
        @endif

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Giới thiệu bản thân</td>
          <td class="pv-details" style="line-height: 1.7em;">
            {{ $profile->about_me ?: 'Thành viên chưa viết lời giới thiệu bản thân.' }}
          </td>
        </tr>

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Mục tiêu tìm kiếm</td>
          <td class="pv-details" style="line-height: 1.7em; color: #c71616; font-weight: 500;">
            {{ $profile->looking_for ?: 'Tìm một người bạn chân thành, đồng điệu trong cuộc sống.' }}
          </td>
        </tr>
      </table>
    </div>

    <!-- Right Sidebar -->
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold; color: #2e5d69;">
          <i class="fa fa-search"></i> Tìm kiếm người khác
        </div>
        <div class="panel-body">
          <a href="{{ route('ehenho.search.index') }}" class="btn btn-default btn-block">
            <i class="fa fa-list"></i> Xem tất cả hồ sơ
          </a>
          <a href="{{ route('ehenho.search.by_age') }}" class="btn btn-default btn-block" style="margin-top: 10px;">
            <i class="fa fa-calendar"></i> Tìm kiếm theo độ tuổi
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
