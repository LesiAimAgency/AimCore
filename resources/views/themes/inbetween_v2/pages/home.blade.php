@extends('themes.inbetween_v2.layouts.app')

@section('content')
<main class="inbetween-scroll-container w-full h-screen overflow-y-auto overflow-x-hidden" id="inbetween-app">
    {!! render_widget_area('homepage-main') ?: render_widget_area('inbetween_v2') !!}
</main>
@endsection
