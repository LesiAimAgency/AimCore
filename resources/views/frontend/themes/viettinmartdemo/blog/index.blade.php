@extends('layouts.app')

@section('title', 'Tin tức & Bài viết - VietTinMart')

@section('content')
<x-breadcrumb :items="[
    ['label' => 'Tin tức']
]" />

@php
    $layout = get_theme_layout('post_category');
    $contentCols = ($layout === 'full-width') ? 'col-lg-12' : 'col-lg-8';
    $contentOrder = ($layout === 'sidebar-left') ? 'order-lg-2' : 'order-lg-1';
    $sidebarCols = 'col-lg-4';
    $sidebarOrder = ($layout === 'sidebar-left') ? 'order-lg-1' : 'order-lg-2';

    $excerptLength = (int) get_theme_option('post-category', 'post_excerpt_length', 150);
    $showThumbnail = (bool) get_theme_option('post-category', 'show_post_thumbnail', 1);
    $showTitle = (bool) get_theme_option('post-category', 'show_post_title', 1);
    $showExcerpt = (bool) get_theme_option('post-category', 'show_post_excerpt', 1);
    $showDate = (bool) get_theme_option('post-category', 'show_post_date', 1);
    $showAuthor = (bool) get_theme_option('post-category', 'show_post_author', 1);
    $showReadMore = (bool) get_theme_option('post-category', 'show_post_read_more', 1);
    $readMoreText = get_theme_option('post-category', 'post_read_more_text', Lang('blog_read_more'));
@endphp

<!-- blog list area start -->
<div class="rts-blog-list-area rts-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="{{ $contentCols }} {{ $contentOrder }}">
                @if(request('category') || request('tag') || request('q'))
                <div class="alert alert-light border d-flex justify-content-between align-items-center mb-4 p-3 rounded-3">
                    <div>
                        <span class="text-muted me-2">Đang lọc theo:</span>
                        @if(request('category') && !empty($currentCategory))
                            <span class="badge bg-primary me-2"><i class="fa-light fa-folder me-1"></i>Chuyên mục: {{ $currentCategory->name }}</span>
                        @endif
                        @if(request('tag') && !empty($currentTag))
                            <span class="badge bg-success me-2"><i class="fa-light fa-tag me-1"></i>Thẻ: #{{ $currentTag->name }}</span>
                        @endif
                        @if(request('q'))
                            <span class="badge bg-info me-2"><i class="fa-light fa-magnifying-glass me-1"></i>Từ khóa: "{{ request('q') }}"</span>
                        @endif
                    </div>
                    <a href="{{ locale_route('blog.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa-regular fa-xmark me-1"></i> Xóa lọc
                    </a>
                </div>
                @endif

                <div class="row g-4">
                    @forelse($posts as $post)
                    <div class="col-lg-12">
                        <div class="single-blog-list-style">
                            @if($showThumbnail)
                            <a href="{{ locale_route('blog.show', ['slug' => $post->slug]) }}" class="thumbnail">
                                @php
                                    $th = $post->thumbnail;
                                    $m  = [];
                                    if (!$th) {
                                        $thUrl = asset('theme/images/blog/01.jpg');
                                    } elseif (str_starts_with($th, 'http')) {
                                        if (preg_match('#/storage/(media/.+)$#', $th, $m)) {
                                            $thUrl = asset('storage/' . $m[1]);
                                        } elseif (preg_match('#/public/(storage/media/.+)$#', $th, $m)) {
                                            $thUrl = asset($m[1]);
                                        } else {
                                            $thUrl = $th;
                                        }
                                    } elseif (str_starts_with($th, 'storage/') || str_starts_with($th, 'media/')) {
                                        $thUrl = asset(ltrim($th, '/'));
                                    } else {
                                        $thUrl = asset('storage/' . ltrim($th, '/'));
                                    }
                                @endphp
                                <div class="img-placeholder" style="aspect-ratio: 16/9; width: 100%;">
                                    <img src="{{ $thUrl }}" alt="{{ $post->title }}" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" decoding="async" width="350" height="250">
                                </div>
                            </a>
                            @endif
                            <div class="blog-content">
                                <div class="top-area">
                                    @if($showDate)
                                    <div class="single-meta">
                                        <i class="fa-light fa-calendar-days"></i>
                                        <span>{{ $post->published_at ? $post->published_at->format('d/m/Y') : $post->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    @endif
                                    @if($showAuthor)
                                    <div class="single-meta">
                                        <i class="fa-light fa-user"></i>
                                        <span>{{ $post->author->name ?? 'Admin' }}</span>
                                    </div>
                                    @endif
                                    @if($post->category)
                                    <div class="single-meta">
                                        <i class="fa-light fa-folder text-primary"></i>
                                        <a href="{{ locale_route('blog.index', ['category' => $post->category->slug]) }}" class="text-primary fw-medium">{{ $post->category->name }}</a>
                                    </div>
                                    @endif
                                </div>
                                @if($showTitle)
                                <a href="{{ locale_route('blog.show', ['slug' => $post->slug]) }}">
                                    <h3 class="title">{{ $post->title }}</h3>
                                </a>
                                @endif
                                @if($showExcerpt)
                                <p class="disc">
                                    {{ $post->excerpt ?: Str::limit(strip_tags($post->content), $excerptLength) }}
                                </p>
                                @endif
                                @if($showReadMore)
                                <a href="{{ locale_route('blog.show', ['slug' => $post->slug]) }}" class="rts-btn btn-primary mt--10">{{ $readMoreText }} <i class="fa-regular fa-arrow-right ms-2"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5 bg-white border rounded">
                        <i class="fa-light fa-newspaper fa-3x mb-3 text-muted"></i>
                        <p class="text-muted">{{ Lang('blog_empty') }}</p>
                    </div>
                    @endforelse
                </div>
                
                <div class="row mt--40">
                    <div class="col-lg-12">
                        <div class="pagination-area">
                            {{ $posts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            
            @if($layout !== 'full-width')
            <div class="{{ $sidebarCols }} {{ $sidebarOrder }}">
                <div class="blog-sidebar-area">
                    <div class="single-sidebar-widget search">
                        <h4 class="title">{{ Lang('blog_search_title') }}</h4>
                        <form action="{{ locale_route('blog.index') }}" class="search-form">
                            <input name="q" value="{{ request('q') }}" type="text" placeholder="{{ Lang('blog_search_placeholder') }}" required>
                            <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    {{-- Categories Widget --}}
                    @if(!empty($categories) && $categories->isNotEmpty())
                    <div class="single-sidebar-widget category-widget">
                        <h4 class="title">{{ Lang('blog_categories_title', 'Chuyên mục') }}</h4>
                        <ul class="category-list list-unstyled mb-0">
                            @foreach($categories as $cat)
                            <li class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <a href="{{ locale_route('blog.index', ['category' => $cat->slug]) }}" class="{{ request('category') == $cat->slug ? 'text-primary fw-bold' : 'text-secondary text-decoration-none' }}">
                                    <i class="fa-regular fa-folder me-2 text-primary"></i>{{ $cat->name }}
                                </a>
                                <span class="badge bg-light text-dark border rounded-pill px-2 py-1">{{ $cat->posts_count ?? 0 }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="single-sidebar-widget recent-post">
                        <h4 class="title">{{ Lang('blog_recent_posts') }}</h4>
                        <div class="recent-post-wrapper">
                            @foreach($recentPosts ?? [] as $recent)
                            <div class="single-recent-post">
                                <a href="{{ locale_route('blog.show', ['slug' => $recent->slug]) }}" class="thumbnail">
                                    @php
                                        $rth = $recent->thumbnail;
                                        $m   = [];
                                        if (!$rth) {
                                            $rthUrl = asset('theme/images/blog/11.jpg');
                                        } elseif (str_starts_with($rth, 'http')) {
                                            if (preg_match('#/storage/(media/.+)$#', $rth, $m)) {
                                                $rthUrl = asset('storage/' . $m[1]);
                                            } else {
                                                $rthUrl = $rth;
                                            }
                                        } else {
                                            $rthUrl = asset('storage/' . ltrim($rth, '/'));
                                        }
                                    @endphp
                                    <img src="{{ $rthUrl }}" alt="recent-post" loading="{{ config('performance.lazy_load') ? 'lazy' : 'eager' }}" decoding="async" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                </a>
                                <div class="content">
                                    <span class="date">{{ $recent->published_at ? $recent->published_at->format('d/m/Y') : $recent->created_at->format('d/m/Y') }}</span>
                                    <a href="{{ locale_route('blog.show', ['slug' => $recent->slug]) }}">
                                        <h5 class="title">{{ Str::limit($recent->title, 40) }}</h5>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tag Cloud Widget --}}
                    @if(!empty($popularTags) && $popularTags->isNotEmpty())
                    <div class="single-sidebar-widget tag-cloud-widget">
                        <h4 class="title">{{ Lang('blog_tags_title', 'Thẻ bài viết') }}</h4>
                        <div class="tag-cloud d-flex flex-wrap gap-2">
                            @foreach($popularTags as $tag)
                            <a href="{{ locale_route('blog.index', ['tag' => $tag->slug]) }}" class="badge {{ request('tag') == $tag->slug ? 'bg-primary text-white' : 'bg-light text-dark border' }} text-decoration-none py-2 px-3 rounded-pill">
                                #{{ $tag->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    
                    <div class="single-sidebar-widget newsletter" style="background-image: url('{{ asset('theme/images/blog/sidebar-bg.png') }}')">
                        <h4 class="title text-white">{{ Lang('blog_newsletter_title') }}</h4>
                        <p class="disc text-white opacity-75">{{ Lang('blog_newsletter_desc') }}</p>
                        <form action="{{ locale_route('newsletter.subscribe') }}" method="POST" class="newsletter-form newsletter-form-sidebar">
                            @csrf
                            <input name="email" type="email" placeholder="{{ Lang('blog_newsletter_email') }}" required>
                            <button type="submit" class="rts-btn btn-primary w-100 mt-3">
                                <span class="btn-text">{{ Lang('blog_newsletter_btn') }}</span>
                                <span class="btn-loading d-none">
                                    <i class="fa-solid fa-spinner fa-spin"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.single-blog-list-style {
    display: flex;
    gap: 30px;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #f1f5f9;
    transition: all 0.3s ease;
    margin-bottom: 30px;
}
.single-blog-list-style:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transform: translateY(-5px);
}
.single-blog-list-style .thumbnail {
    flex: 0 0 350px;
    overflow: hidden;
    border-radius: 10px;
}
.single-blog-list-style .thumbnail img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: 0.5s;
}
.single-blog-list-style:hover .thumbnail img {
    transform: scale(1.1);
}
.single-blog-list-style .blog-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.single-blog-list-style .top-area {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}
.single-blog-list-style .top-area .single-meta {
    font-size: 14px;
    color: var(--color-body);
    display: flex;
    align-items: center;
    gap: 8px;
}
.single-blog-list-style .top-area .single-meta i {
    color: var(--color-primary);
}
.single-blog-list-style .title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.4;
    transition: 0.3s;
}
.single-blog-list-style .title:hover {
    color: var(--color-primary);
}
.single-sidebar-widget {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #f1f5f9;
    margin-bottom: 40px;
}
.single-sidebar-widget .title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f1f5f9;
    position: relative;
}
.single-sidebar-widget .title::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 50px;
    height: 2px;
    background: var(--color-primary);
}
.search-form {
    position: relative;
}
.search-form input {
    width: 100%;
    height: 50px;
    border: 1px solid #f1f5f9;
    border-radius: 8px;
    padding: 0 50px 0 20px;
}
.search-form button {
    position: absolute;
    right: 0;
    top: 0;
    width: 50px;
    height: 50px;
    background: none;
    border: none;
    color: var(--color-primary);
}
.recent-post-wrapper .single-recent-post {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}
.recent-post-wrapper .single-recent-post:last-child {
    margin-bottom: 0;
}
.recent-post-wrapper .single-recent-post .content .date {
    font-size: 12px;
    color: var(--color-body);
    display: block;
    margin-bottom: 5px;
}
.recent-post-wrapper .single-recent-post .content .title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 0;
    line-height: 1.4;
    border: none;
    padding: 0;
}
@media (max-width: 991px) {
    .single-blog-list-style {
        flex-direction: column;
    }
    .single-blog-list-style .thumbnail {
        flex: 0 0 100%;
    }
}
</style>
@endsection


