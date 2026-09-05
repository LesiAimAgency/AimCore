@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' - ' . setting('site_name', 'VietTin Mart'))
@section('meta_description', $post->meta_description ?: $post->excerpt)
@section('meta_keywords', $post->meta_keywords)
@section('canonical', locale_route('blog.show', ['slug' => $post->slug]))
@section('og_type', 'article')
@section('og_image', $post->thumbnail ? asset($post->thumbnail) : asset(setting('site_og_image')))


@section('content')
    <x-breadcrumb :items="[
        ['label' => 'Tin tức', 'url' => locale_route('blog.index')],
        ['label' => Str::limit($post->title, 40)],
    ]" />

    @php
        $layout = get_theme_layout('post');
        $contentCols = ($layout === 'full-width') ? 'col-lg-12' : 'col-lg-8';
        $contentOrder = ($layout === 'sidebar-left') ? 'order-lg-2' : 'order-lg-1';
        $sidebarCols = 'col-lg-4';
        $sidebarOrder = ($layout === 'sidebar-left') ? 'order-lg-1' : 'order-lg-2';
    @endphp

    <!-- blog detail area start -->
    <div class="rts-blog-detail-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="{{ $contentCols }} {{ $contentOrder }}">


                    <div class="blog-detail-content-wrapper">
                        <div class="thumbnail mb--40">
                            <img src="{{ $post->thumbnail ? asset($post->thumbnail) : asset('theme/images/blog/01.jpg') }}"
                                alt="blog-detail" style="width: 100%; border-radius: 12px; height: 450px; object-fit: cover;">
                        </div>

                        <div class="blog-meta-area mb--20">
                            <div class="single-meta">
                                <i class="fa-light fa-calendar-days"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('d/m/Y') : $post->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="single-meta">
                                <i class="fa-light fa-user"></i>
                                <span>{{ optional($post->author)->name ?? 'Admin' }}</span>
                            </div>
                            @if ($post->category)
                                <div class="single-meta">
                                    <i class="fa-light fa-folder-open"></i>
                                    <span>{{ $post->category->name }}</span>
                                </div>
                            @endif
                        </div>

                        <h1 class="title mb--30">{{ $post->title }}</h1>
                        {{-- Table of Contents --}}
                        @if (setting('toc_enabled', true))
                            <div id="vtm-toc-container" style="display:none;" class="mb--40 p-4 bg_light-1 rounded">
                                <h5 class="title mb--15" style="font-size:16px;font-weight:700;">
                                    {{ setting('toc_title', 'Mục lục') }}
                                </h5>
                                <ul id="vtm-toc-list" class="list-unstyled mb-0" style="padding-left:0;"></ul>
                            </div>
                            @push('scripts')
                                <script>
                                    (function() {
                                        const minH = {{ (int) setting('toc_min_headings', 3) }};
                                        const tags = '{{ setting('toc_heading_tags', 'h2,h3') }}'.split(',').map(t => t.trim()).filter(Boolean);
                                        const content = document.querySelector('.entry-content');
                                        if (!content) return;

                                        const headings = content.querySelectorAll(tags.join(','));
                                        if (headings.length < minH) return;

                                        const list = document.getElementById('vtm-toc-list');
                                        headings.forEach(function(h, i) {
                                            if (!h.id) h.id = 'toc-heading-' + i;
                                            const li = document.createElement('li');
                                            li.style.paddingLeft = h.tagName === 'H3' ? '16px' : '0';
                                            li.style.marginBottom = '6px';
                                            li.innerHTML = '<a href="#' + h.id +
                                                '" style="color:var(--color-primary);text-decoration:none;font-size:14px;">' +
                                                (h.tagName === 'H3' ? '↳ ' : '') + h.textContent + '</a>';
                                            list.appendChild(li);
                                        });

                                        document.getElementById('vtm-toc-container').style.display = 'block';
                                    })();
                                </script>
                            @endpush
                        @endif
                        <div class="blog-content-post entry-content mt--20">
                            {!! $post->content !!}
                        </div>


                        <div class="blog-footer-meta mt--40 pt--20 border-top d-flex justify-content-between align-items-center flex-wrap">
                            <div class="tags-area">
                                @if($post->tags && $post->tags->isNotEmpty())
                                    <span>Thẻ:</span>
                                    @foreach($post->tags as $tag)
                                        <a href="{{ locale_route('blog.index', ['tag' => $tag->slug]) }}" class="badge bg-light text-dark text-decoration-none me-1">{{ $tag->name }}</a>
                                    @endforeach
                                @endif
                            </div>

                            <div class="share-area">
                                <span>Chia sẻ:</span>
                                <div class="social-icons ms-3 d-inline-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" class="rts-btn btn-primary"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                        target="_blank" class="rts-btn btn-primary" style=""><i
                                            class="fa-brands fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related posts -->
                    <div class="related-posts-area mt--60">
                        <h3 class="title mb--40">Các bài viết liên quan</h3>
                        <div class="row g-4">
                            @foreach ($relatedPosts ?? [] as $related)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-blog-style-one border rounded p-3">
                                        <a href="{{ locale_route('blog.show', ['slug' => $related->slug]) }}" class="thumbnail">
                                            <img src="{{ $related->thumbnail ? asset($related->thumbnail) : asset('theme/images/blog/02.jpg') }}"
                                                alt="blog"
                                                style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                                        </a>
                                        <div class="blog-content pt-3">
                                            <span
                                                class="date d-block mb-1 small text-muted">{{ $related->published_at ? $related->published_at->format('d/m/Y') : $related->created_at->format('d/m/Y') }}</span>
                                            <a href="{{ locale_route('blog.show', ['slug' => $related->slug]) }}">
                                                <h5 class="title h6 mb-0">{{ Str::limit($related->title, 50) }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if($layout !== 'full-width')
                <div class="{{ $sidebarCols }} {{ $sidebarOrder }}">
                    <!-- Sidebar -->
                    <div class="blog-sidebar-area">
                        @if(!empty($categories) && $categories->isNotEmpty())
                        <div class="single-sidebar-widget category-widget">
                            <h4 class="title">{{ Lang('blog_categories_title', 'Chuyên mục') }}</h4>
                            <ul class="category-list list-unstyled mb-0">
                                @foreach($categories as $cat)
                                <li class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                    <a href="{{ locale_route('blog.index', ['category' => $cat->slug]) }}" class="text-secondary text-decoration-none">
                                        <i class="fa-regular fa-folder me-2 text-primary"></i>{{ $cat->name }}
                                    </a>
                                    <span class="badge bg-light text-dark border rounded-pill px-2 py-1">{{ $cat->posts_count ?? 0 }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="single-sidebar-widget recent-post">
                            <h4 class="title">Bài viết mới nhất</h4>
                            <div class="recent-post-wrapper">
                                @php
                                    $latest = \App\Models\Post::posts()->where('status', 'published')
                                        ->where('id', '!=', $post->id)
                                        ->latest('published_at')
                                        ->limit(5)
                                        ->get();
                                @endphp
                                @foreach ($latest as $l)
                                    <div class="single-recent-post">
                                        <a href="{{ locale_route('blog.show', ['slug' => $l->slug]) }}" class="thumbnail">
                                            <img src="{{ $l->thumbnail ? asset($l->thumbnail) : asset('theme/images/blog/11.jpg') }}"
                                                alt="recent-post"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                        </a>
                                        <div class="content">
                                            <span
                                                class="date">{{ $l->published_at ? $l->published_at->format('d/m/Y') : $l->created_at->format('d/m/Y') }}</span>
                                            <a href="{{ locale_route('blog.show', ['slug' => $l->slug]) }}">
                                                <h5 class="title">{{ Str::limit($l->title, 40) }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if(!empty($popularTags) && $popularTags->isNotEmpty())
                        <div class="single-sidebar-widget tag-cloud-widget">
                            <h4 class="title">{{ Lang('blog_tags_title', 'Thẻ bài viết') }}</h4>
                            <div class="tag-cloud d-flex flex-wrap gap-2">
                                @foreach($popularTags as $tag)
                                <a href="{{ locale_route('blog.index', ['tag' => $tag->slug]) }}" class="badge bg-light text-dark border text-decoration-none py-2 px-3 rounded-pill">
                                    #{{ $tag->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

    <style>
        .blog-meta-area {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .blog-meta-area .single-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: var(--color-body);
        }

        .blog-meta-area .single-meta i {
            color: var(--color-primary);
        }

        .entry-content {
            font-size: 16px;
            line-height: 1.8;
            color: #444;
        }

        .entry-content p {
            margin-bottom: 25px;
        }

        .entry-content h2,
        .entry-content h3 {
            color: var(--color-heading);
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .entry-content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 30px 0;
        }

        .btn-white {
            background: #fff;
            color: var(--color-primary);
        }

        .btn-white:hover {
            background: var(--color-secondary);
            color: #fff;
        }

        .single-sidebar-widget .author-area {
            padding-top: 10px;
        }
    </style>
@endsection


