@if ($paginator->hasPages())
<nav class="wk-pagination-wrapper pagination-wrapper" aria-label="Phân trang">
    <ul class="wk-pagination rts-pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="wk-page-item page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="wk-page-link page-link"><i class="fa-solid fa-chevron-left"></i></span>
            </li>
        @else
            <li class="wk-page-item page-item">
                <a class="wk-page-link page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="wk-page-item page-item disabled" aria-disabled="true"><span class="wk-page-link page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="wk-page-item page-item active" aria-current="page">
                            <span class="wk-page-link page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="wk-page-item page-item">
                            <a class="wk-page-link page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="wk-page-item page-item">
                <a class="wk-page-link page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="wk-page-item page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="wk-page-link page-link"><i class="fa-solid fa-chevron-right"></i></span>
            </li>
        @endif

    </ul>
</nav>
@endif

