<div class="panel panel-default account-sidebar-panel">
  <div class="panel-heading" style="background-color: #f5f5f5; font-weight: bold;">
    <i class="fa fa-user-circle"></i> Quản Lý Tài Khoản
  </div>
  <div class="list-group">
    <a href="{{ route('ehenho.account.profile_edit') }}" class="list-group-item {{ request()->routeIs('*.profile_edit') || request()->routeIs('*.my_profile') ? 'active' : '' }}">
      <i class="fa fa-edit fa-fw"></i> Chỉnh sửa hồ sơ
    </a>
    <a href="{{ route('ehenho.account.avatar_upload') }}" class="list-group-item {{ request()->routeIs('*.avatar_upload') ? 'active' : '' }}">
      <i class="fa fa-camera fa-fw"></i> Đổi ảnh đại diện
    </a>
    <a href="{{ route('ehenho.messages.inbox') }}" class="list-group-item {{ request()->routeIs('*.messages.*') ? 'active' : '' }}" style="display: flex; justify-content: space-between; align-items: center;">
      <span><i class="fa fa-comments fa-fw"></i> Tin nhắn</span>
      @php
        $unreadMessagesCount = \App\Models\Ehenho\Message::where('recipient_id', auth()->id())->where('is_read', false)->count();
      @endphp
      @if($unreadMessagesCount > 0)
        <span class="badge" style="background-color: #ef4444; font-weight: bold; font-size: 11px;">{{ $unreadMessagesCount }}</span>
      @endif
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
    @if(auth()->check() && (method_exists(auth()->user(), 'canAccessEhenhoCms') ? auth()->user()->canAccessEhenhoCms() : (auth()->user()->role !== 'user' && in_array(auth()->user()->role, ['cms', 'admin', 'dev', 'super_admin', 'superadmin', 'manager', 'web_admin', 'store_manager', 'multi_tenancy'], true))))
      <a href="{{ url('/DA010/admin') }}" class="list-group-item text-danger" style="font-weight: bold; background-color: #fff5f5;">
        <i class="fa fa-cogs fa-fw" style="color: #dc2626;"></i> Trang Quản Trị CMS
      </a>
    @endif
  </div>
</div>
