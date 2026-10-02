@props(['profile', 'showActions' => true])

<div class="profile-card-item" style="background-color:#fff; border:1px #dedede solid; margin:auto; margin-bottom:12px; text-align:left; padding:10px 0; word-wrap:break-word; overflow:hidden; border-radius:5px; box-shadow:0 1px 2px #dfdfdf;">
  <div class="row" style="margin: 0;">
    <div class="col-xs-4 col-sm-3" style="padding-left:10px; padding-right:10px;">
      <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}">
        <img alt="{{ $profile->display_name }}" class="img-responsive center-block" 
             src="{{ $profile->avatar_url ? (str_starts_with($profile->avatar_url, 'http') ? $profile->avatar_url : asset($profile->avatar_url)) : asset('themes/ehenho/images/s1.jpg') }}" 
             style="border-radius:4px; max-height:140px; object-fit:cover; width:100%;" />
      </a>
    </div>
    <div class="col-xs-8 col-sm-9" style="padding-left:5px; padding-right:15px;">
      <p class="pinfo5" style="margin-bottom: 4px;">
        <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}" style="color:#008BC7; font-size:1.2em; font-weight:bold;">
          {{ $profile->display_name }}
        </a>
        <span style="color:#545454; font-size:1.1em; font-weight:bold; margin-left: 5px;">{{ $profile->age }}</span>
        @if($profile->marital_status)
          <span class="text-muted" style="margin-left: 8px;">&bull; {{ $profile->marital_status }}</span>
        @endif
      </p>
      <p class="pinfo5" style="margin-bottom: 4px;">
        @if($profile->looking_for)
          <strong style="color:#3F7E8F; font-size:1.05em;">{{ $profile->looking_for }}</strong>
        @endif
        @if($profile->province_name)
          <span class="glyphicon glyphicon-map-marker" style="color:#2e5d69; font-size:0.85em; margin-left:8px;"></span>
          <span style="color:#2e5d69; font-size:0.95em;">{{ $profile->province_name }}</span>
        @endif
      </p>
      @if($profile->about_me)
        <p class="pinfo5 text-muted" style="color:#545454; margin-bottom: 6px; font-size: 0.95em;">
          {{ Str::limit($profile->about_me, 140) }}
        </p>
      @endif

      @if($showActions)
        <div class="profile-card-actions" style="margin-top: 5px;">
          <a href="{{ route('ehenho.profile.show', $profile->slug ?: $profile->id) }}" class="btn btn-xs btn-info">
            <i class="fa fa-user"></i> Xem hồ sơ
          </a>
          <a href="{{ route('ehenho.messages.compose', ['to' => $profile->user_id ?: $profile->id]) }}" class="btn btn-xs btn-default">
            <i class="fa fa-envelope"></i> Gửi tin nhắn
          </a>
        </div>
      @endif
    </div>
  </div>
</div>
