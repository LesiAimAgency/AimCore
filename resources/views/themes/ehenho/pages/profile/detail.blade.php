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
          <!-- Left Action Buttons (Bookmark, Like, Block) -->
          <td style="width: 25%; text-align: center; vertical-align: top; padding: 15px 5px;">
            @if($isOwnProfile ?? false)
              <div style="margin-bottom: 12px;">
                <a href="{{ route('ehenho.account.profile_edit') }}" class="btn btn-default btn-block btn-sm" style="color: #2e5d69; font-weight: bold; background-color: #f0fdf4; border-color: #86efac;">
                  <i class="fa fa-edit text-success" style="font-size: 1.4em;"></i><br>
                  <small>Sửa hồ sơ</small>
                </a>
              </div>
              <div style="margin-bottom: 12px;">
                <a href="{{ route('ehenho.account.avatar_upload') }}" class="btn btn-default btn-block btn-sm" style="color: #475569;">
                  <i class="fa fa-camera text-primary" style="font-size: 1.4em;"></i><br>
                  <small>Đổi ảnh</small>
                </a>
              </div>
            @else
              <div style="margin-bottom: 12px;">
                <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline;">
                  @csrf
                  <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                  <input type="hidden" name="type" value="bookmark">
                  <button type="submit" class="btn btn-default btn-block btn-sm {{ ($isBookmarked ?? false) ? 'active' : '' }}" title="{{ ($isBookmarked ?? false) ? 'Bỏ lưu hồ sơ' : 'Lưu vào danh sách yêu thích' }}" style="{{ ($isBookmarked ?? false) ? 'background-color: #fef3c7; border-color: #f59e0b; color: #b45309;' : '' }}">
                    <i class="fa fa-star {{ ($isBookmarked ?? false) ? 'text-warning' : 'text-muted' }}" style="font-size: 1.4em;"></i><br>
                    <small>{{ ($isBookmarked ?? false) ? 'Đã lưu' : 'Đánh dấu' }}</small>
                  </button>
                </form>
              </div>

              <div style="margin-bottom: 12px;">
                <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline;">
                  @csrf
                  <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                  <input type="hidden" name="type" value="like">
                  <button type="submit" class="btn btn-default btn-block btn-sm {{ ($isLiked ?? false) ? 'active' : '' }}" title="{{ ($isLiked ?? false) ? 'Bỏ thích hồ sơ' : 'Thích hồ sơ này' }}" style="{{ ($isLiked ?? false) ? 'background-color: #fee2e2; border-color: #ef4444; color: #b91c1c;' : '' }}">
                    <i class="fa fa-heart {{ ($isLiked ?? false) ? 'text-danger' : 'text-muted' }}" style="font-size: 1.4em;"></i><br>
                    <small>{{ ($isLiked ?? false) ? 'Đã thích' : 'Thích' }}</small>
                  </button>
                </form>
              </div>

              <div>
                <form id="block_profile_form" action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline;" onsubmit="return confirm('{{ ($isBlocked ?? false) ? 'Bạn có muốn bỏ chặn hồ sơ này?' : 'Bạn có chắc chắn muốn chặn hồ sơ này? Người này sẽ không thể liên lạc hoặc nhắn tin với bạn.' }}');">
                  @csrf
                  <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                  <input type="hidden" name="type" value="block">
                  <button type="submit" class="btn btn-default btn-block btn-sm {{ ($isBlocked ?? false) ? 'btn-danger active' : '' }}" title="{{ ($isBlocked ?? false) ? 'Bỏ chặn hồ sơ này' : 'Chặn không cho liên lạc' }}" style="{{ ($isBlocked ?? false) ? 'background-color: #fee2e2; border-color: #dc2626; color: #dc2626; font-weight: bold;' : 'color: #666;' }}">
                    <i class="fa fa-ban {{ ($isBlocked ?? false) ? 'text-danger' : 'text-muted' }}" style="font-size: 1.4em;"></i><br>
                    <small>{{ ($isBlocked ?? false) ? 'Đã chặn' : 'Chặn hồ sơ' }}</small>
                  </button>
                </form>
              </div>
            @endif
          </td>

          <!-- Big Photo & Header Action -->
          <td style="width: 75%; padding: 15px;">
            <div class="text-center" style="margin-bottom: 15px;">
              <img src="{{ $profile->avatar_url ? asset($profile->avatar_url) : asset('themes/ehenho/images/df_picture.png') }}"
                   alt="{{ $profile->display_name }}"
                   class="img-responsive img-thumbnail"
                   style="max-height: 400px; margin: auto; object-fit: contain;">
            </div>

            <div style="margin-top: 15px; margin-bottom: 10px;">
              <h1 style="color:#c71616; font-size: 24px; font-weight: bold; margin: 0 0 10px 0;">
                {{ $profile->target_type ?: $profile->looking_for ?: 'Tìm người yêu lâu dài' }}
              </h1>
            </div>

            <!-- Direct Message Box matching 100% screenshot -->
            <div style="border: 1px solid #dcdcdc; background: #fafafa; border-radius: 4px; padding: 12px; margin-bottom: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
              @if($isOwnProfile ?? false)
                <div class="alert alert-info" style="margin-bottom: 0; padding: 10px 14px; font-size: 13px;">
                  <i class="fa fa-user-circle text-primary"></i> <strong>Đây là hồ sơ cá nhân của bạn.</strong> Bạn có thể <a href="{{ route('ehenho.account.profile_edit') }}" class="alert-link" style="text-decoration: underline;">chỉnh sửa thông tin</a> hoặc <a href="{{ route('ehenho.account.avatar_upload') }}" class="alert-link" style="text-decoration: underline;">thay đổi ảnh đại diện</a> bất cứ lúc nào.
                </div>
              @elseif($isBlocked ?? false)
                <div class="alert alert-warning" style="margin-bottom: 0; padding: 10px; font-size: 13px;">
                  <i class="fa fa-ban text-danger"></i> <strong>Hồ sơ đang bị chặn.</strong> Bạn đã chặn người này (không thể gửi tin nhắn).
                  <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline-block; margin-left: 10px;">
                    @csrf
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                    <input type="hidden" name="type" value="block">
                    <button type="submit" class="btn btn-xs btn-default" style="font-size: 11px;">Bỏ chặn</button>
                  </form>
                </div>
              @elseif($isBlockedByTarget ?? false)
                <div class="alert alert-danger" style="margin-bottom: 0; padding: 10px; font-size: 13px;">
                  <i class="fa fa-ban text-danger"></i> <strong>Không thể gửi tin nhắn.</strong> Thành viên này hiện không nhận tin nhắn từ bạn.
                </div>
              @elseif(auth()->check())
              <form action="{{ route('ehenho.messages.store') }}" method="POST">
                @csrf
                <input type="hidden" name="recipient_id" value="{{ $profile->user_id }}">
                <input type="hidden" name="subject" value="Chào bạn, mình muốn làm quen!">
                <textarea name="body" class="form-control" rows="3" placeholder="Gửi tin nhắn tới người này" style="width: 100%; border: 1px solid #ccc; border-radius: 3px; padding: 8px; margin-bottom: 8px; background: #fff; font-size: 13px;" required></textarea>
                <div class="clearfix">
                  <div class="pull-left">
                    <button type="submit" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c; font-weight: bold; padding: 6px 16px; border-radius: 4px;">
                      Gửi <i class="fa fa-paper-plane" style="margin-left: 2px;"></i>
                    </button>
                  </div>
                  <div class="pull-right" style="padding-top: 6px;">
                    <a href="javascript:void(0)" onclick="if(confirm('Bạn có chắc chắn muốn chặn hồ sơ này?')) { $('#block_profile_form').submit(); }" class="text-muted" style="font-size: 12px; text-decoration: none;">
                      <i class="fa fa-ban text-danger"></i> Chặn người này
                    </a>
                  </div>
                </div>
              </form>
              @else
              <form action="{{ route('ehenho.login') }}" method="GET">
                <textarea name="saved_msg" class="form-control" rows="3" placeholder="Gửi tin nhắn tới người này" style="width: 100%; border: 1px solid #ccc; border-radius: 3px; padding: 8px; margin-bottom: 8px; background: #fff; font-size: 13px;" required></textarea>
                <div class="text-left">
                  <button type="submit" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c; font-weight: bold; padding: 6px 16px; border-radius: 4px;">
                    Gửi <i class="fa fa-paper-plane" style="margin-left: 2px;"></i>
                  </button>
                </div>
              </form>
              @endif
            </div>
          </td>
        </tr>

        <!-- Table of Specs matching 100% UI -->
        <tr>
          <td class="pv-td" style="font-weight: bold; width: 25%; background: #fcfcfc;">Thông tin cơ bản</td>
          <td class="pv-details" style="width: 75%;">
            {{ $profile->gender == 'female' ? 'Nữ' : ($profile->gender == 'male' ? 'Nam' : 'Khác') }} tìm {{ $profile->gender == 'female' ? 'nam' : 'nữ' }} - 
            {{ $profile->marital_status ?: 'Độc thân' }} - 
            {{ $profile->age }} tuổi
            @if($profile->height) - Cao {{ $profile->height }} cm @endif
            @if($profile->weight) - Nặng {{ $profile->weight }} kg @endif
            @if($profile->education) - {{ $profile->education }} @endif
          </td>
        </tr>

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Nơi ở</td>
          <td class="pv-details">
            @if($profile->district_name){{ $profile->district_name }}, @endif{{ $profile->province_name ?: 'Chưa cập nhật' }}
          </td>
        </tr>

        @if($profile->body_type)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Dáng người</td>
          <td class="pv-details">{{ $profile->body_type }}</td>
        </tr>
        @endif

        @if($profile->interests)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Sở thích</td>
          <td class="pv-details">{{ $profile->interests }}</td>
        </tr>
        @endif

        @if($profile->personality)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Tính cách</td>
          <td class="pv-details">{{ $profile->personality }}</td>
        </tr>
        @endif

        @if($profile->lifestyle)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Lối sống</td>
          <td class="pv-details">{{ $profile->lifestyle }}</td>
        </tr>
        @endif

        @if($profile->precious)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Quý giá nhất</td>
          <td class="pv-details">{{ $profile->precious }}</td>
        </tr>
        @endif

        @if($profile->occupation)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Nghề nghiệp</td>
          <td class="pv-details">{{ $profile->occupation }}</td>
        </tr>
        @endif

        @if($profile->religion)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Tôn giáo</td>
          <td class="pv-details">{{ $profile->religion }}</td>
        </tr>
        @endif

        @if($profile->smoking)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Hút thuốc</td>
          <td class="pv-details">{{ $profile->smoking }}</td>
        </tr>
        @endif

        @if($profile->drinking)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Uống rượu bia</td>
          <td class="pv-details">{{ $profile->drinking }}</td>
        </tr>
        @endif

        @if($profile->children)
        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Con cái</td>
          <td class="pv-details">{{ $profile->children }}</td>
        </tr>
        @endif

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Về tôi</td>
          <td class="pv-details" style="line-height: 1.7em;">
            {{ $profile->about_me ?: 'Thành viên chưa viết lời giới thiệu bản thân.' }}
          </td>
        </tr>

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Tìm người</td>
          <td class="pv-details" style="line-height: 1.7em; color: #c71616; font-weight: 500;">
            {{ $profile->looking_for ?: 'Tìm một người bạn chân thành, đồng điệu trong cuộc sống.' }}
          </td>
        </tr>

        <tr>
          <td class="pv-td" style="font-weight: bold; background: #fcfcfc;">Đăng nhập</td>
          <td class="pv-details">
            {{ $profile->last_active_at ? $profile->last_active_at->format('d/m/Y h:i a') : date('d/m/Y h:i a') }}
          </td>
        </tr>

        <tr>
          <td class="pv-td text-muted" style="font-weight: bold; background: #fcfcfc;">Tùy chọn</td>
          <td class="pv-details text-muted">
            {{ $profile->privacy_option ?: 'Chỉ nhận tin nhắn từ hồ sơ có hình đại diện.' }}
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
