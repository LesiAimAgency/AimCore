@extends('layouts.app')
@section('title', 'Tin tức công nghệ - WKcomputer')
@section('content')

<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">Tin tức công nghệ</li>
        </ol>
    </div>
</div>

<div style="background:#f0f2f5;padding:24px 0 40px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h1 class="wk-section-title"><i class="fas fa-newspaper"></i> Tin Tức Công Nghệ</h1>
        </div>

        @if(isset($posts) && $posts->isNotEmpty())
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-bottom:32px;">
            @foreach($posts as $post)
            @php
                $postImg = $post->image ?? $post->featured_image ?? null;
                if ($postImg && !str_starts_with($postImg, 'http') && !str_starts_with($postImg, '/')) $postImg = '/storage/' . $postImg;
            @endphp
            <a href="{{ url($post->slug) }}" style="text-decoration:none;color:inherit;">
                <article style="background:#fff;border-radius:14px;overflow:hidden;border:1px solid #f1f5f9;height:100%;transition:box-shadow .2s,transform .2s;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,.1)';this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                    <div style="height:200px;overflow:hidden;background:#f8fafc;">
                        @if($postImg)
                        <img src="{{ $postImg }}" alt="{{ $post->name ?? $post->title }}" style="width:100%;height:100%;object-fit:cover;">
                        @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f1f5f9,#e2e8f0);">
                            <i class="fas fa-newspaper" style="font-size:48px;color:#94a3b8;"></i>
                        </div>
                        @endif
                    </div>
                    <div style="padding:18px;">
                        <div style="font-size:10px;color:var(--wk-primary);font-weight:700;text-transform:uppercase;margin-bottom:8px;">
                            {{ $post->published_at?->format('d/m/Y') ?? 'Tin tức' }}
                        </div>
                        <h2 style="font-size:14px;font-weight:700;color:#1e293b;margin:0 0 8px;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                            {{ $post->name ?? $post->title }}
                        </h2>
                        @if($post->short_description)
                        <p style="font-size:12px;color:#64748b;margin:0;line-height:1.6;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                            {{ strip_tags($post->short_description) }}
                        </p>
                        @endif
                    </div>
                </article>
            </a>
            @endforeach
        </div>

        @if(method_exists($posts, 'links'))
        <div style="display:flex;justify-content:center;">
            {{ $posts->links('vendor.pagination.theme') }}
        </div>
        @endif
        @else
        <div style="background:#fff;border-radius:16px;padding:60px;text-align:center;">
            <i class="fas fa-newspaper" style="font-size:48px;color:#e2e8f0;margin-bottom:16px;display:block;"></i>
            <p style="color:#94a3b8;">Chưa có bài viết nào.</p>
        </div>
        @endif
    </div>
</div>
@endsection
