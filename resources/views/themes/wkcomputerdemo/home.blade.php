@extends('frontend.themes.wkcomputerdemo.layouts.app')

@section('title', setting('site_title', 'WK Computer - Máy Tính, Laptop, Linh Kiện Chính Hãng'))
@section('description', setting('site_description', 'WK Computer - Hệ thống bán lẻ laptop, PC, linh kiện, gaming gear và phụ kiện công nghệ chính hãng.'))

@section('content')
    {!! render_widget_area('homepage-main') ?: (function_exists('render_widgets') ? render_widgets('homepage-main') : '') !!}
@endsection
