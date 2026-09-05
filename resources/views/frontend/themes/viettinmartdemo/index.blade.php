@extends('frontend.themes.viettinmartdemo.layouts.app')

@section('title', setting('seo_meta_title') ?? 'VietTinMart - Thực phẩm tươi sạch mỗi ngày')
@section('meta_description', setting('seo_meta_description') ?? '')
@section('meta_keywords', setting('seo_meta_keywords') ?? '')

@section('content')
    {!! render_widgets('homepage-main') ?: render_widgets('homepage') !!}
@endsection



