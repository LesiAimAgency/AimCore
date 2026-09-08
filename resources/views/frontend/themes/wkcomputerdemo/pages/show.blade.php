@extends('layouts.app')
@section('title', ($page->meta_title ?: $page->title) . ' - WK Store')
@section('content')

<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ url('/wkcomputer') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">{{ $page->title }}</li>
        </ol>
    </div>
</div>

<div style="background:#f8fafc; padding: 40px 0 60px;">
    <div class="wk-container" style="max-width: 960px;">
        <div style="background:#fff; padding: 40px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <h1 style="font-size: 26px; font-weight: 800; color: #0f172a; margin-bottom: 24px; text-align: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 16px;">
                {{ $page->title }}
            </h1>
            
            <div class="wk-page-content" style="font-size: 15px; line-height: 1.8; color: #334155;">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>

<style>
.wk-page-content h3 {
    font-size: 18px;
    font-weight: 700;
    color: #0f172a;
    margin-top: 24px;
    margin-bottom: 12px;
}
.wk-page-content p {
    margin-bottom: 14px;
}
.wk-page-content ul {
    margin-left: 20px;
    margin-bottom: 16px;
    list-style-type: disc;
}
.wk-page-content li {
    margin-bottom: 6px;
}
.wk-page-content strong {
    color: #0f172a;
}
.wk-page-content hr {
    border: 0;
    border-top: 1px solid #e2e8f0;
    margin: 24px 0;
}
</style>

@endsection
