<div class="panel panel-default account-sidebar-panel">
  <div class="panel-heading" style="background-color: #f5f5f5; font-weight: bold;">
    <i class="fa fa-user-circle"></i> Quản Lý Tài Khoản
  </div>
  <div class="list-group">
    <a href="{{ route('ehenho.account.my_profile') }}" class="list-group-item {{ request()->routeIs('*.my_profile') ? 'active' : '' }}">
      <i class="fa fa-user fa-fw"></i> Hồ sơ của tôi
    </a>
    <a href="{{ route('ehenho.account.profile_edit') }}" class="list-group-item {{ request()->routeIs('*.profile_edit') ? 'active' : '' }}">
      <i class="fa fa-edit fa-fw"></i> Chỉnh sửa hồ sơ
    </a>
    <a href="{{ route('ehenho.account.avatar_upload') }}" class="list-group-item {{ request()->routeIs('*.avatar_upload') ? 'active' : '' }}">
      <i class="fa fa-camera fa-fw"></i> Đổi ảnh đại diện
    </a>
    <a href="{{ route('ehenho.messages.inbox') }}" class="list-group-item {{ request()->routeIs('*.messages.inbox') || request()->routeIs('*.messages.show') ? 'active' : '' }}">
      <i class="fa fa-inbox fa-fw"></i> Hộp thư đến
    </a>
    <a href="{{ route('ehenho.messages.sent') }}" class="list-group-item {{ request()->routeIs('*.messages.sent') ? 'active' : '' }}">
      <i class="fa fa-paper-plane fa-fw"></i> Thư đã gửi
    </a>
    <a href="{{ route('ehenho.social.contacts') }}" class="list-group-item {{ request()->routeIs('*.social.contacts') ? 'active' : '' }}">
      <i class="fa fa-address-book fa-fw"></i> Danh bạ kết nối
    </a>
    <a href="{{ route('ehenho.social.likes') }}" class="list-group-item {{ request()->routeIs('*.social.likes') ? 'active' : '' }}">
      <i class="fa fa-heart fa-fw"></i> Người đã thích
    </a>
    <a href="{{ route('ehenho.social.bookmarks') }}" class="list-group-item {{ request()->routeIs('*.social.bookmarks') ? 'active' : '' }}">
      <i class="fa fa-bookmark fa-fw"></i> Hồ sơ đã lưu
    </a>
    <a href="{{ route('ehenho.social.blocked') }}" class="list-group-item {{ request()->routeIs('*.social.blocked') ? 'active' : '' }}">
      <i class="fa fa-ban fa-fw"></i> Danh sách chặn
    </a>
    <a href="{{ route('ehenho.account.emails') }}" class="list-group-item {{ request()->routeIs('*.account.emails') ? 'active' : '' }}">
      <i class="fa fa-envelope fa-fw"></i> Quản lý email
    </a>
    <a href="{{ route('ehenho.account.password') }}" class="list-group-item {{ request()->routeIs('*.account.password') ? 'active' : '' }}">
      <i class="fa fa-key fa-fw"></i> Đổi mật khẩu
    </a>
    <a href="{{ route('ehenho.account.settings') }}" class="list-group-item {{ request()->routeIs('*.account.settings') ? 'active' : '' }}">
      <i class="fa fa-cog fa-fw"></i> Thiết lập tài khoản
    </a>
  </div>
</div>
