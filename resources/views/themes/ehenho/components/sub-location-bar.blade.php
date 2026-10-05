@php
    $subLocationMenu = \App\Services\MenuService::getMenuByLocation('sub_location');
    $subLocationItems = $subLocationMenu ? $subLocationMenu->items : collect();
@endphp

<!-- Circular Marker Filter Buttons (Sub-location bar: 100% Dynamic from Menu Engine) -->
<div class="container cont-sb-loc">
  @forelse($subLocationItems as $item)
    <a class="{{ $item->css_class ?: 'b-button' }}" href="{{ $item->url }}" target="{{ $item->target ?? '_self' }}">
      <span class="{{ $item->icon ?: 'glyphicon glyphicon-map-marker' }}"></span> {{ $item->title }}
    </a>
  @empty
    <a class="b-button" href="{{ route('ehenho.search.by_location') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Tìm bạn bốn phương theo Tỉnh Thành
    </a>
    <a class="b-button" href="{{ route('ehenho.search.by_location', 'ho-chi-minh') }}">
      <span class="glyphicon glyphicon-map-marker"></span> TP.Hồ Chí Minh
    </a>
    <a class="b-button" href="{{ route('ehenho.search.by_location', 'ha-noi') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Hà Nội
    </a>
    <a class="b-button" href="{{ route('ehenho.search.by_location', 'da-nang') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Đà Nẵng
    </a>
    <a class="b-button" href="{{ route('ehenho.search.by_location', 'can-tho') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Cần Thơ
    </a>
    <a class="b-button" href="{{ route('ehenho.search.by_location', 'ca-mau') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Cà Mau
    </a>
    <a class="b-button" href="{{ route('ehenho.search.o_my') }}">
      <span class="glyphicon glyphicon-map-marker"></span> USA – Mỹ
    </a>
    <a class="b-button" href="{{ route('ehenho.search.o_uc') }}">
      <span class="glyphicon glyphicon-map-marker"></span> ÚC
    </a>
    <a class="b-button" href="{{ route('ehenho.search.o_nhat') }}">
      <span class="glyphicon glyphicon-map-marker"></span> Nhật
    </a>
  @endforelse
</div>
