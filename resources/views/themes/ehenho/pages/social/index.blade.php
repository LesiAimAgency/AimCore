@extends('themes.ehenho.layouts.account')

@section('title', $pageTitle . ' - eHenho.com')

@section('account_content')
<div class="panel panel-default" style="box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
  <div class="panel-heading" style="background-color: #f7f7f7; font-weight: bold;">
    <i class="fa {{ $activeTab == 'likes' ? 'fa-heart text-danger' : ($activeTab == 'bookmarks' ? 'fa-star text-warning' : ($activeTab == 'blocked' ? 'fa-ban text-danger' : 'fa-address-book text-primary')) }}"></i>
    {{ $pageTitle }} ({{ $profiles->total() }})
  </div>

  <div class="panel-body" style="padding: 20px;">
    <!-- Sub-tabs Navigation -->
    <ul class="nav nav-pills" style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 12px;">
      <li role="presentation" class="{{ $activeTab == 'contacts' ? 'active' : '' }}">
        <a href="{{ route('ehenho.social.contacts') }}">
          <i class="fa fa-address-book"></i> Danh bạ kết nối
        </a>
      </li>
      <li role="presentation" class="{{ $activeTab == 'likes' ? 'active' : '' }}">
        <a href="{{ route('ehenho.social.likes') }}">
          <i class="fa fa-heart"></i> Người đã thích
        </a>
      </li>
      <li role="presentation" class="{{ $activeTab == 'bookmarks' ? 'active' : '' }}">
        <a href="{{ route('ehenho.social.bookmarks') }}">
          <i class="fa fa-star"></i> Hồ sơ đã lưu
        </a>
      </li>
      <li role="presentation" class="{{ $activeTab == 'blocked' ? 'active' : '' }}">
        <a href="{{ route('ehenho.social.blocked') }}">
          <i class="fa fa-ban"></i> Danh sách chặn
        </a>
      </li>
    </ul>

    <!-- Profiles List -->
    @forelse($profiles as $profile)
      @include('themes.ehenho.components.profile-card', ['profile' => $profile])
    @empty
      <div class="text-center" style="padding: 40px 20px;">
        @if($activeTab == 'likes')
          <i class="fa fa-heart-o" style="font-size: 3.5em; color: #f0ad4e; margin-bottom: 15px;"></i>
          <h4 style="color: #666;">Bạn chưa thích hồ sơ nào</h4>
          <p class="text-muted">Khi bạn bấm "Thích" hồ sơ của ai đó, họ sẽ được lưu lại ở đây.</p>
        @elseif($activeTab == 'bookmarks')
          <i class="fa fa-star-o" style="font-size: 3.5em; color: #f0ad4e; margin-bottom: 15px;"></i>
          <h4 style="color: #666;">Bạn chưa đánh dấu hồ sơ nào</h4>
          <p class="text-muted">Lưu lại những hồ sơ ấn tượng để tìm lại bất cứ lúc nào một cách riêng tư.</p>
        @elseif($activeTab == 'blocked')
          <i class="fa fa-shield" style="font-size: 3.5em; color: #5cb85c; margin-bottom: 15px;"></i>
          <h4 style="color: #666;">Danh sách chặn trống</h4>
          <p class="text-muted">Bạn chưa chặn thành viên nào.</p>
        @else
          <i class="fa fa-users" style="font-size: 3.5em; color: #31708f; margin-bottom: 15px;"></i>
          <h4 style="color: #666;">Danh bạ kết nối đang trống</h4>
          <p class="text-muted">Kết nối và trò chuyện với các thành viên để xây dựng danh bạ của bạn.</p>
        @endif

        <a href="{{ route('ehenho.search.index') }}" class="btn btn-success btn-sc-cus" style="margin-top: 15px;">
          <i class="fa fa-search"></i> Khám phá thành viên mới
        </a>
      </div>
    @endforelse

    <div class="text-center" style="margin-top: 20px;">
      {{ $profiles->links('themes.ehenho.components.pagination') }}
    </div>
  </div>
</div>
@endsection
