@extends('frontend.themes.inbetween.layout')

@section('title', setting('site_name', 'INBETWEEN') . ' | ' . setting('site_tagline', 'Cross-border Community & Platform'))

@section('content')

{!! render_widget_area('homepage-main') !!}

@endsection
