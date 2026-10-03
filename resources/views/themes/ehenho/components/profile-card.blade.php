@props(['profile', 'showActions' => true, 'activeTab' => null])

@php
  $avatar = $profile->avatar_url ? (str_starts_with($profile->avatar_url, 'http') ? $profile->avatar_url : asset($profile->avatar_url)) : asset('themes/ehenho/images/s1.jpg');
@endphp

<div class="profile-card-container" style="background-color:#fff; border:1px #dedede solid; margin:auto; margin-bottom:12px; text-align:left; padding:10px 0 10px 0; word-wrap:break-word; overflow:hidden; border-radius:5px; box-shadow:0 1px 2px #dfdfdf;">
  <style>
    .col1 { width: 21%; }
    .col2 { width: 79%; }
    @media(max-width: 480px) {
      .col1 { width: 28%; }
      .col2 { width: 72%; }
    }
  </style>

  <div class="pull-left col1" id="pro_pic" style="height:138px; word-wrap:break-word; overflow:hidden; padding-left:10px; padding-right:10px; margin-top:5px; margin-bottom:5px;">
    <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}">
      <img alt="{{ $profile->display_name }}" border="0" class="displayed img-responsive" 
           src="{{ $avatar }}" width="138" 
           style="max-height:138px; width:100%; object-fit:cover; border-radius:3px;" />
    </a>
  </div>

  <div class="pull-right col2" id="pro_info" style="display:table-cell; padding-left:12px; padding-right:12px; margin-top:1px; margin-bottom:1px;">
    <p class="pinfo5" style="margin-bottom: 4px;">
      <span>
        <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}" style="color:#008BC7; font-size:1.2em; font-weight:bold;">
          {{ $profile->display_name }}
        </a>
        <span style="font-size:1.1em; font-weight:bold; color:#444; margin-left: 4px;">{{ $profile->age }}</span>
        @if($profile->marital_status)
          <a href="{{ route('ehenho.search.index', ['marital_status' => $profile->marital_status]) }}" style="color:#545454; font-size:0.95em; margin-left: 6px;">
            {{ $profile->marital_status }}
          </a>
        @endif
      </span>
      <br />
      <span>
        @if($profile->target_type || $profile->looking_for)
          <b>
            <a href="{{ route('ehenho.search.index', ['looking_for' => $profile->target_type ?: $profile->looking_for]) }}" style="color:#3F7E8F; font-size:1.05em;">
              {{ $profile->target_type ?: $profile->looking_for }}
            </a>
          </b>
        @endif
        @if($profile->province_name)
          <span aria-hidden="true" class="glyphicon glyphicon-map-marker" style="color:#2e5d69; font-size:0.85em; margin-left: 4px;"></span>
          @if($profile->district_name)
            <a href="{{ route('ehenho.search.index', ['province' => $profile->province_id, 'district' => $profile->district_name]) }}" style="color:#2e5d69; font-size:1.0em;">
              {{ $profile->district_name }}
            </a>,
          @endif
          <a href="{{ route('ehenho.search.by_location', $profile->province_id) }}" style="color:#2e5d69; font-size:1.0em;">
            {{ $profile->province_name }}
          </a>
        @endif
      </span>
    </p>

    @if($profile->headline)
      <p class="pinfo5" style="color:#2e5d69; font-style:italic; font-size:0.95em; margin-bottom: 3px;">
        "{{ $profile->headline }}"
      </p>
    @endif

    <p class="pinfo5" style="color:#545454; font-size: 0.95em; line-height: 1.45em; margin-bottom: 6px;">
      {{ Str::limit($profile->about_me ?: 'Chưa cập nhật giới thiệu bản thân.', 160) }}
    </p>

    @if($showActions)
      <div class="profile-card-actions" style="margin-top: 4px;">
        <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}" class="btn btn-xs btn-info" style="border-radius: 3px; font-weight: 500;">
          <i class="fa fa-user"></i> Xem hồ sơ
        </a>
        @if(($activeTab ?? null) === 'blocked')
          <form action="{{ route('ehenho.social.toggle') }}" method="POST" style="display: inline-block; margin-left: 4px;" onsubmit="return confirm('Bạn có chắc chắn muốn bỏ chặn thành viên {{ $profile->display_name }}?');">
            @csrf
            <input type="hidden" name="profile_id" value="{{ $profile->id }}">
            <input type="hidden" name="type" value="block">
            <button type="submit" class="btn btn-xs btn-danger" style="border-radius: 3px; font-weight: bold; background-color: #dc2626; border-color: #b91c1c;">
              <i class="fa fa-unlock"></i> Bỏ chặn
            </button>
          </form>
        @else
          <a href="{{ route('ehenho.messages.compose', ['to' => $profile->user_id ?: $profile->id]) }}" class="btn btn-xs btn-default" style="border-radius: 3px; font-weight: 500; margin-left: 3px;">
            <i class="fa fa-envelope"></i> Gửi tin nhắn
          </a>
        @endif
      </div>
    @endif
  </div>
</div>
