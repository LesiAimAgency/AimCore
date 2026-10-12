@extends('themes.inbetween_v2.layouts.app')

@section('content')
{{-- Desktop / PC One-page Experience (>= 1024px) --}}
<main class="inbetween-scroll-container intro-locked w-full h-screen h-[100dvh] overflow-y-scroll overflow-x-hidden hidden lg:block" id="inbetween-app" aria-label="Desktop One-page Experience">
    {!! render_widget_area('homepage-main') ?: render_widget_area('inbetween_v2') !!}
</main>

{{-- Mobile Natural Scrolling Experience (< 1024px) --}}
<div class="inbetween-mobile-container w-full min-h-screen block lg:hidden" id="inbetween-mobile-container" aria-label="Mobile Natural Scrolling Experience">
    @include('themes.inbetween_v2.components.mobile-experience')
</div>
@endsection
