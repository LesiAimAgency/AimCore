@props(['items' => []])

@php
    // Bỏ qua item đầu nếu nó đã là "Trang chủ" hoặc "Home" để tránh lặp: Trang chủ > Trang chủ
    $cleanItems = [];
    foreach ($items as $idx => $item) {
        if ($idx === 0 && isset($item['label']) && in_array(mb_strtolower(trim($item['label'])), ['trang chủ', 'trang chu', 'home'])) {
            continue;
        }
        $cleanItems[] = $item;
    }
@endphp

<div class="rts-navigation-area-breadcrumb bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="{{ locale_route('home') }}">{{ __('Trang chủ') }}</a>
                    @foreach($cleanItems as $item)
                        @if(isset($item['label']))
                            <i class="fa-regular fa-chevron-right"></i>
                            @if($loop->last)
                                <a class="current" href="javascript:void(0);">{{ $item['label'] }}</a>
                            @else
                                <a href="{{ $item['url'] ?? 'javascript:void(0);' }}">{{ $item['label'] }}</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
