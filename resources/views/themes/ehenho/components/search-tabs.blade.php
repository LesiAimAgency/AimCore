@props(['activeTab' => 'all'])

<div style="margin-bottom: 12px; width:100%">
  <ul class="nav nav-tabs">
    <li class="{{ $activeTab === 'age' ? 'active' : '' }}" role="presentation">
      <a href="{{ route('ehenho.search.by_age') }}" style="font-size: 1.1em; {{ $activeTab === 'age' ? 'border-top: 3px solid #737373; border-radius: 4px 4px 0 0; font-weight: bold;' : '' }}">
        <i class="glyphicon glyphicon-stats"></i> Tìm theo Tuổi
      </a>
    </li>
    <li class="{{ $activeTab === 'location' ? 'active' : '' }}" role="presentation">
      <a href="{{ route('ehenho.search.by_location') }}" style="font-size: 1.1em; {{ $activeTab === 'location' ? 'border-top: 3px solid #737373; border-radius: 4px 4px 0 0; font-weight: bold;' : '' }}">
        <i class="glyphicon glyphicon-map-marker"></i> Tìm theo Nơi ở
      </a>
    </li>
    <li class="{{ $activeTab === 'detailed' ? 'active' : '' }}" role="presentation">
      <a href="{{ route('ehenho.search.detailed') }}" style="font-size: 1.1em; {{ $activeTab === 'detailed' ? 'border-top: 3px solid #737373; border-radius: 4px 4px 0 0; font-weight: bold;' : '' }}">
        <i class="glyphicon glyphicon-tasks"></i> Tìm theo chi tiết (Bộ Lọc)
      </a>
    </li>
    <li class="{{ $activeTab === 'all' ? 'active' : '' }}" role="presentation">
      <a href="{{ route('ehenho.search.index') }}" style="font-size: 1.1em; {{ $activeTab === 'all' ? 'border-top: 3px solid #737373; border-radius: 4px 4px 0 0; font-weight: bold;' : '' }}">
        <i class="fa fa-users"></i> Tất cả thành viên
      </a>
    </li>
  </ul>
</div>
