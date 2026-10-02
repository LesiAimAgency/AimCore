<!-- Static navbar -->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container" style="padding-left:9px !important; padding-right:9px !important">
    <div class="navbar-header">
      <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('ehenho.home') }}">
        <img class="brand_img" src="{{ asset('themes/ehenho/images/ehenho_logo.png') }}" alt="eHenho Logo" />
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
          <li class="dropdown">
            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i aria-hidden="true" class="fa fa-sign-in" style="font-size:1em;"></i> Đăng nhập <b class="caret"></b>
            </a>
            <ul class="dropdown-menu login-dropdown" style="min-width: 250px; padding: 15px;">
              <li class="dropdown-header">Đăng nhập vào ehenho.com</li>
              <li>
                <form action="{{ route('ehenho.login.submit') }}" class="login" id="login_form_dd" method="post">
                  @csrf
                  <input class="form-control" id="id_login_dd" maxlength="120" name="email" placeholder="Địa chỉ email" style="margin-bottom:5px;" type="email" required />
                  <input class="form-control c-password-dd" id="id_password_dd" maxlength="120" name="password" placeholder="Mật khẩu" style="margin-bottom:5px;" type="password" required />
                  <div class="clearfix" style="margin-bottom:5px;">
                    <a href="{{ route('ehenho.password.request') }}" id="id_forgot_link">Quên?</a>
                    <span id="mask-pw-dd" class="pull-right" style="cursor:pointer;">
                      <i aria-hidden="true" class="fa fa-eye" id="mask-pw-i-dd"></i> Hiện
                    </span>
                  </div>
                  <div class="checkbox" style="margin-top:0;">
                    <label>
                      <input id="id_remember_dd" name="remember" type="checkbox" /> Duy trì đăng nhập
                    </label>
                  </div>
                  <button class="btn btn-block btn-success" type="submit">Đăng nhập</button>
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
        </ul>
      </div>
    </div>
  </div>
</header>
