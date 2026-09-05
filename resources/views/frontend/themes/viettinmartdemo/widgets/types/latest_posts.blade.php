@php
    $columns = $config['columns'] ?? 4;
    $gridClass = match($columns) {
        '2' => 'col-lg-6 col-md-6 col-sm-12',
        '3' => 'col-lg-4 col-md-6 col-sm-12',
        '4' => 'col-lg-3 col-md-6 col-sm-12',
        default => 'col-lg-3 col-md-6 col-sm-12'
    };
@endphp

<!-- Title Section - Full White Background -->
<div class="blog-title-section" style="background: {{ $config['title_bg_color'] ?? '#ffffff' }}; ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <div class="title-left-area">
                        @if($config['pre_title'] ?? false)
                            <span class="pre-title" style="color: #2563eb; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 5px;">{{ $config['pre_title'] }}</span>
                        @endif
                        <h2 class="title-left mb--0">{{ $config['title'] ?? __('frontend.widget_posts_default_title') }}</h2>
                        @if($config['subtitle'] ?? false)
                            <p class="description mt--10" style="color: #64748b; font-size: 15px; margin-top: 10px;">{{ $config['subtitle'] }}</p>
                        @endif
                    </div>
                    @if($config['show_btn'] ?? false)
                        <div class="rts-btn-wrapper">
                            <a href="{{ $config['btn_link'] ?? locale_route('blog.index') }}" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">{{ $config['btn_text'] ?? __('frontend.widget_posts_view_all') }}</div>
                                <div class="arrow-icon"><x-theme-icon name="arrow-right" /></div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Content Section - Custom Background -->
<div class="blog-area-start rts-section-gapBottom" {!! $sectionStyles ?? '' !!}>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-card-main-over">
                    <div class="row g-4">
            @forelse($posts as $post)
            <div class="{{ $gridClass }}">
                <div class="single-blog-area-start">
                            <a href="{{ locale_route('blog.show', $post->slug) }}" class="thumbnail">
                        @php
                            $thumb = $post->thumbnail;
                            if (!$thumb) {
                                $thumbUrl = asset('theme/images/blog/blog-01.jpg');
                            } elseif (str_starts_with($thumb, 'http')) {
                                // Full URL stored in DB — extract relative path (media/...) and rebuild
                                if (preg_match('#/storage/(media/.+)$#', $thumb, $m)) {
                                    $thumbUrl = asset('storage/' . $m[1]);
                                } elseif (preg_match('#/public/(storage/media/.+)$#', $thumb, $m)) {
                                    $thumbUrl = asset($m[1]);
                                } else {
                                    $thumbUrl = $thumb; // fallback: use as-is
                                }
                            } elseif (str_starts_with($thumb, 'storage/') || str_starts_with($thumb, 'media/')) {
                                $thumbUrl = asset(ltrim($thumb, '/'));
                            } else {
                                $thumbUrl = asset('storage/' . ltrim($thumb, '/'));
                            }
                        @endphp
                        <x-theme-image :name="$thumbUrl" :alt="$post->title" class="post-thumbnail" style="width:100%;height:200px;object-fit:cover;" />
                    </a>
                    <div class="blog-body">
                        <div class="top-area">
                            <div class="single-meta">
                                <x-theme-icon name="clock" />
                                <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}</span>
                            </div>
                            <div class="single-meta">
                                <x-theme-icon name="folder" />
                                <span>{{ $post->category?->name ?? __('frontend.widget_posts_uncategorized') }}</span>
                            </div>
                        </div>
                        <a href="{{ locale_route('blog.show', $post->slug) }}">
                            <h4 class="title">{{ $post->title }}</h4>
                        </a>
                        @if($config['show_excerpt'] ?? false)
                            <p class="disc">{{ $post->excerpt }}</p>
                        @endif
                        
                        @if($config['show_read_btn'] ?? true)
                            <a href="{{ locale_route('blog.show', $post->slug) }}" class="shop-now-goshop-btn">
                <span class="text">{{ __('frontend.widget_posts_read_details') }}</span>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                                <div class="plus-icon">
                                    <i class="fa-sharp fa-regular fa-plus"></i>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">
                    <p>{{ __('frontend.widget_posts_empty') }}</p>
                </div>
            @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->


