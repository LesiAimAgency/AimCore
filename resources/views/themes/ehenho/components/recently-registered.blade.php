@props(['recentFemaleProfiles' => collect(), 'recentMaleProfiles' => collect()])

<div class="recently-registered-widget" style="margin-top: 10px;">
  <h4 class="text-success" style="font-weight: bold; margin-bottom: 12px;">
    Đăng ký gần đây
  </h4>
  <div style="width: 100%;">
    <ul class="nav nav-tabs" id="recent-reg-tabs">
      <li class="active" id="tab-n-female" role="presentation">
        <a id="a-n-female" href="javascript:void(0)" onclick="switchRecentTab('female')" style="border-top: 2px solid #DEDEDE; border-radius: 4px 4px 0 0; font-weight: bold; cursor: pointer;">
          Nữ
        </a>
      </li>
      <li class="" id="tab-n-male" role="presentation">
        <a id="a-n-male" href="javascript:void(0)" onclick="switchRecentTab('male')" style="cursor: pointer;">
          Nam
        </a>
      </li>
    </ul>
  </div>

  <!-- Female List -->
  <div id="nrp-list-female" style="display: block;">
    @forelse($recentFemaleProfiles as $p)
      @php
        $avatar = $p->avatar_url ? (str_starts_with($p->avatar_url, 'http') ? $p->avatar_url : asset($p->avatar_url)) : asset('themes/ehenho/images/s1.jpg');
      @endphp
      <div style="width:100%; background-color:#fdfdfd; margin:auto; margin-top:6px; margin-bottom:6px; text-align:left; padding:4px 0; word-wrap:break-word; overflow:hidden; border:1px solid #f0f0f0; border-radius:5px;">
        <div class="pull-left" style="width:28%; height:84px; word-wrap:break-word; overflow:hidden; padding: 0 8px 0 6px; margin: 0px;">
          <a href="{{ route('ehenho.profile.show', $p->slug ?: $p->id) }}">
            <img class="displayed img-responsive" width="80" height="80" src="{{ $avatar }}" border="0" alt="{{ $p->display_name }}" style="max-height:80px; object-fit:cover; border-radius:4px;" />
          </a>
        </div>
        <div class="pull-right" style="width:72%; height:84px; padding: 0 8px 0 4px; margin:0px; display:table-cell;">
          <b>
            <a href="{{ route('ehenho.profile.show', $p->slug ?: $p->id) }}">
              <span style="font-size:1.05em; color:#008BC7;">{{ $p->display_name }}</span>
            </a>&nbsp;
          </b>
          <span style="font-size:0.9em; color:#333; font-weight:bold;">{{ $p->age }}</span>
          <br />
          <span style="font-size:0.85em; color:#3F7E8F; font-weight:600;">
            {{ $p->target_type ?: ($p->looking_for ?: 'Tìm bạn đời') }}
          </span>
          @if($p->province_name)
            <br />
            <span style="font-size:0.85em; color:#888;">
              <i class="glyphicon glyphicon-map-marker" style="font-size:0.8em; color:#2e5d69;"></i> {{ $p->province_name }}
            </span>
          @endif
        </div>
      </div>
    @empty
      <div class="text-muted text-center" style="padding: 15px 0;">Đang cập nhật...</div>
    @endforelse
  </div>

  <!-- Male List -->
  <div id="nrp-list-male" style="display: none;">
    @forelse($recentMaleProfiles as $p)
      @php
        $avatar = $p->avatar_url ? (str_starts_with($p->avatar_url, 'http') ? $p->avatar_url : asset($p->avatar_url)) : asset('themes/ehenho/images/s1.jpg');
      @endphp
      <div style="width:100%; background-color:#fdfdfd; margin:auto; margin-top:6px; margin-bottom:6px; text-align:left; padding:4px 0; word-wrap:break-word; overflow:hidden; border:1px solid #f0f0f0; border-radius:5px;">
        <div class="pull-left" style="width:28%; height:84px; word-wrap:break-word; overflow:hidden; padding: 0 8px 0 6px; margin: 0px;">
          <a href="{{ route('ehenho.profile.show', $p->slug ?: $p->id) }}">
            <img class="displayed img-responsive" width="80" height="80" src="{{ $avatar }}" border="0" alt="{{ $p->display_name }}" style="max-height:80px; object-fit:cover; border-radius:4px;" />
          </a>
        </div>
        <div class="pull-right" style="width:72%; height:84px; padding: 0 8px 0 4px; margin:0px; display:table-cell;">
          <b>
            <a href="{{ route('ehenho.profile.show', $p->slug ?: $p->id) }}">
              <span style="font-size:1.05em; color:#008BC7;">{{ $p->display_name }}</span>
            </a>&nbsp;
          </b>
          <span style="font-size:0.9em; color:#333; font-weight:bold;">{{ $p->age }}</span>
          <br />
          <span style="font-size:0.85em; color:#3F7E8F; font-weight:600;">
            {{ $p->target_type ?: ($p->looking_for ?: 'Tìm người yêu') }}
          </span>
          @if($p->province_name)
            <br />
            <span style="font-size:0.85em; color:#888;">
              <i class="glyphicon glyphicon-map-marker" style="font-size:0.8em; color:#2e5d69;"></i> {{ $p->province_name }}
            </span>
          @endif
        </div>
      </div>
    @empty
      <div class="text-muted text-center" style="padding: 15px 0;">Đang cập nhật...</div>
    @endforelse
  </div>

  <!-- Quick City Links -->
  <div style="margin-top: 25px; line-height: 2.2em;">
    <h4 class="text-success" style="font-weight: bold; margin-bottom: 8px;">
      Tìm bạn theo Tỉnh Thành
    </h4>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'ho-chi-minh') }}">Tìm bạn HCM</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'ha-noi') }}">Tìm bạn Hà Nội</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'da-nang') }}">Tìm bạn Đà Nẵng</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'hai-phong') }}">Tìm bạn Hải Phòng</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'can-tho') }}">Tìm bạn Cần Thơ</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'lam-dong') }}">Tìm bạn Lâm Đồng</a>
    <a class="c-button" href="{{ route('ehenho.search.by_location', 'dong-nai') }}">Tìm bạn Đồng Nai</a>
    <p style="margin-top: 10px;">
      <a class="c-button" href="{{ route('ehenho.search.by_location') }}">
        <i aria-hidden="true" class="fa fa-arrow-right"></i> Xem tất cả 63 Tỉnh Thành
      </a>
    </p>
  </div>
</div>

<script>
function switchRecentTab(gender) {
  var femaleTab = document.getElementById('tab-n-female');
  var maleTab = document.getElementById('tab-n-male');
  var femaleLink = document.getElementById('a-n-female');
  var maleLink = document.getElementById('a-n-male');
  var femaleList = document.getElementById('nrp-list-female');
  var maleList = document.getElementById('nrp-list-male');

  if (gender === 'female') {
    if (femaleTab) femaleTab.className = 'active';
    if (maleTab) maleTab.className = '';
    if (femaleLink) { femaleLink.style.borderTop = '2px solid #DEDEDE'; femaleLink.style.fontWeight = 'bold'; }
    if (maleLink) { maleLink.style.borderTop = 'none'; maleLink.style.fontWeight = 'normal'; }
    if (femaleList) femaleList.style.display = 'block';
    if (maleList) maleList.style.display = 'none';
  } else {
    if (femaleTab) femaleTab.className = '';
    if (maleTab) maleTab.className = 'active';
    if (maleLink) { maleLink.style.borderTop = '2px solid #DEDEDE'; maleLink.style.fontWeight = 'bold'; }
    if (femaleLink) { femaleLink.style.borderTop = 'none'; femaleLink.style.fontWeight = 'normal'; }
    if (femaleList) femaleList.style.display = 'none';
    if (maleList) maleList.style.display = 'block';
  }
}
</script>
