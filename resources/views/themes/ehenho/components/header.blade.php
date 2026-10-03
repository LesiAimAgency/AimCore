@php
    $headerLogo = setting('site_logo') ?: asset('themes/ehenho/images/ehenho_logo.png');
    $headerHeight = setting('header_height', '54');
    $showSearch = (string) setting('header_show_search', '1') !== '0';
    $showHelp = (string) setting('header_show_help', '1') !== '0';
    $showAuth = (string) setting('header_show_auth', '1') !== '0';

    $rawNavlinks = setting('ehenho_header_navlinks');
    if (is_string($rawNavlinks) && !empty($rawNavlinks)) {
        $headerNavlinks = json_decode($rawNavlinks, true) ?: [];
    } elseif (is_array($rawNavlinks)) {
        $headerNavlinks = $rawNavlinks;
    } else {
        $headerNavlinks = [];
    }
@endphp

<!-- Static navbar -->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" style="min-height: {{ $headerHeight }}px;">
  <div class="container" style="padding-left:9px !important; padding-right:9px !important">
    <div class="navbar-header">
      <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('ehenho.home') }}">
        <img class="brand_img" src="{{ $headerLogo }}" alt="eHenho Logo" style="max-height: 38px; object-contain;" />
      </a>
      <ul class="nav navbar-nav navbar-right pull-right no-collapse">
        @auth
          <li>
            <a class="signup-btn" href="{{ route('ehenho.account.profile_edit') }}">
              <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name ?: auth()->user()->email }}
            </a>
          </li>
          <li>
            <a href="{{ route('ehenho.messages.inbox') }}" title="Hộp thư">
              <i class="fa fa-envelope" aria-hidden="true" style="font-size:1.2em;"></i>
            </a>
          </li>
        @else
          <li>
            <a class="signup-btn" href="{{ route('ehenho.register') }}">
              <span class="hidden-xs"><i aria-hidden="true" class="fa fa-check"></i></span> Đăng ký
            </a>
          </li>
        @endauth
        <li>
          <a class="hidden-xs" href="{{ route('ehenho.search.by_age') }}">
            <i aria-hidden="true" class="fa fa-search" style="font-size:1.2em;"></i>
            <span class="hidden-sm">Tìm kiếm</span>
          </a>
        </li>
        <li>
          <a class="hidden-xs" href="{{ route('ehenho.about') }}">
            <i aria-hidden="true" class="fa fa-question-circle" style="font-size:1.2em;"></i>
            <span class="hidden-sm">Trợ giúp</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="navbar-collapse collapse bs-navbar-collapse" id="navbar">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a class="visible-xs-block" href="{{ route('ehenho.search.by_age') }}">
            <i aria-hidden="true" class="fa fa-search" style="font-size:1.2em;"></i> Tìm kiếm
          </a>
        </li>
        <li>
          <a class="visible-xs-block" href="{{ route('ehenho.about') }}">
            <i aria-hidden="true" class="fa fa-question-circle" style="font-size:1.2em;"></i> Trợ giúp
          </a>
        </li>
        @auth
          @if(in_array(auth()->user()->role, ['cms', 'admin', 'dev']) || (isset(auth()->user()->level) && auth()->user()->level <= 1))
            <li>
              <a href="{{ url('/ehenho/admin') }}" style="color:#d9534f; font-weight:bold;">
                <i class="fa fa-dashboard"></i> CMS Quản trị
              </a>
            </li>
          @endif
          <li>
            <a href="{{ route('ehenho.account.my_profile') }}" style="color: #2e5d69; font-weight: bold;">
              <i class="fa fa-user-circle"></i> {{ auth()->user()->name ?: auth()->user()->username }}
            </a>
          </li>
          <li>
            <a href="{{ route('ehenho.account.profile_edit') }}"><i class="fa fa-edit"></i> Chỉnh sửa hồ sơ</a>
          </li>
          <li>
            <form action="{{ route('ehenho.logout') }}" method="POST" style="display:inline;" id="header_logout_form">
              @csrf
              <button type="submit" class="btn btn-link" style="color:#999; padding: 15px; text-decoration:none;">
                <i class="fa fa-sign-out"></i> Đăng xuất
              </button>
            </form>
          </li>
        @else
          <li class="dropdown {{ $errors->any() ? 'open' : '' }}">
            <a aria-expanded="{{ $errors->any() ? 'true' : 'false' }}" class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i aria-hidden="true" class="fa fa-sign-in" style="font-size:1em;"></i> Đăng nhập <b class="caret"></b>
            </a>
            <ul class="dropdown-menu login-dropdown" style="min-width: 260px; padding: 15px;">
              <li class="dropdown-header" style="padding: 0 0 8px 0; font-size: 13px; font-weight: bold; color: #2e5d69;">Đăng nhập vào ehenho.com</li>
              @if($errors->any())
                <li style="list-style: none;">
                  <div class="alert alert-danger" style="padding: 6px 10px; margin-bottom: 8px; font-size: 11px; border-radius: 4px;">
                    <i class="fa fa-exclamation-triangle"></i> {{ $errors->first('email') ?: ($errors->first('login') ?: $errors->first('password') ?: 'Đăng nhập không thành công.') }}
                  </div>
                </li>
              @endif
              <li style="list-style: none;">
                <form action="{{ route('ehenho.login.submit') }}" class="login" id="login_form_dd" method="post">
                  @csrf
                  <input class="form-control" id="id_login_dd" maxlength="120" name="email" value="{{ old('email') }}" placeholder="Email hoặc Tên đăng nhập" style="margin-bottom:8px;" type="text" required autocomplete="username" />
                  <input class="form-control c-password-dd" id="id_password_dd" maxlength="120" name="password" placeholder="Mật khẩu" style="margin-bottom:8px;" type="password" required autocomplete="current-password" />
                  <div class="clearfix" style="margin-bottom:8px;">
                    <a href="{{ route('ehenho.password.request') }}" id="id_forgot_link">Quên?</a>
                    <span id="mask-pw-dd" class="pull-right" style="cursor:pointer; color: #666; font-size: 12px;">
                      <i aria-hidden="true" class="fa fa-eye" id="mask-pw-i-dd"></i> Hiện
                    </span>
                  </div>
                  <div class="checkbox" style="margin-top:0; margin-bottom: 10px;">
                    <label style="font-size: 12px;">
                      <input id="id_remember_dd" name="remember" type="checkbox" /> Duy trì đăng nhập
                    </label>
                  </div>
                  <button class="btn btn-block btn-success" type="submit" style="font-weight: bold;">Đăng nhập</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</header>

<!-- Secondary category navigation bar -->
<header class="navlinkbar2" id="overview">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 navlink1-left">
        <ul class="nav nav-pills">
          @if(!empty($headerNavlinks))
            @foreach($headerNavlinks as $link)
              @if(($link['is_active'] ?? true))
                <li role="presentation">
                  <a class="navlink1" href="{{ $link['url'] ?? '#' }}">
                    <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> {{ $link['title'] ?? '' }}
                  </a>
                </li>
              @endif
            @endforeach
          @else
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index') }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn bốn phương
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['looking_for' => 'ket_hon']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm người kết hôn
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['looking_for' => 'nguoi_yeu']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm người yêu
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['gender' => 'female']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn gái
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['gender' => 'male']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn trai
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['looking_for' => 'ban_doi']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn đời
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['looking_for' => 'tam_su']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn tâm sự
              </a>
            </li>
            <li role="presentation">
              <a class="navlink1" href="{{ route('ehenho.search.index', ['looking_for' => 'ban_be']) }}">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i> Tìm bạn bè mới
              </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</header>
