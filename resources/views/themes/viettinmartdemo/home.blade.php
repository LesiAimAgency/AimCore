@extends('frontend.themes.viettinmartdemo.layouts.app')

@section('title', setting('site_title', 'VietTinMart - Thực phẩm tươi sạch mỗi ngày'))
@section('meta_description', setting('site_description', 'VietTinMart cung cấp nông sản sạch, thực phẩm tươi ngon đạt tiêu chuẩn chất lượng cao.'))

@section('content')
    {!! render_widget_area('homepage-main') ?: (function_exists('render_widgets') ? render_widgets('homepage-main') : '') !!}
@endsection
