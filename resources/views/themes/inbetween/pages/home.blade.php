@extends('frontend.themes.inbetween.layout')

@section('title', setting('site_name', 'INBETWEEN') . ' | ' . setting('site_tagline', 'Cross-border Community & Platform'))

@section('content')

@php
    $renderedArea = render_widget_area('homepage-main');
@endphp

@if(!empty(trim($renderedArea)))
    {!! $renderedArea !!}
@else
    @include('widgets.inbetween.theme')
@endif

@endsection
