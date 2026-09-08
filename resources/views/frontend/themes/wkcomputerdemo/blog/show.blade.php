@extends('layouts.app')

@section('title', ($post->meta_title ?? $post->name ?? $post->title ?? 'Bài viết') . ' - WKcomputer')
@section('description', strip_tags($post->meta_description ?? $post->short_description ?? ''))

@section('content')

{{-- Breadcrumb --}}
<div class="wk-breadcrumb">
    <div class="wk-container">
        <ol>
            <li><a href="{{ url('/wkcomputer') }}"><i class="fas fa-home"></i></a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li><a href="{{ route('blog.index') }}">Tin tức</a></li>
            <li><span class="sep"><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">{{ Str::limit($post->name ?? $post->title, 50) }}</li>
        </ol>
    </div>
</div>

<div style="background:#f0f2f5; padding:24px 0 40px;">
    <div class="wk-container">
        <div style="display:grid; grid-template-columns:1fr 300px; gap:24px; align-items:start;">

            {{-- MAIN CONTENT --}}
            <div>
                {{-- Post Header --}}
                <article style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,.05);">
                    @php
                        $postImg = $post->image ?? $post->featured_image ?? null;
                        if ($postImg && !str_starts_with($postImg, 'http') && !str_starts_with($postImg, '/')) {
                            $postImg = '/storage/' . $postImg;
                        }
                    @endphp

                    @if($postImg)
                    <div style="height:360px; overflow:hidden;">
                        <img src="{{ $postImg }}"
                             alt="{{ $post->name ?? $post->title }}"
                             style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    @endif

                    <div style="padding:28px 32px;">
                        {{-- Category/Date --}}
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px; flex-wrap:wrap;">
                            @if($post->category)
                            <span style="background:var(--wk-primary); color:#fff; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:700;">
                                {{ $post->category->name }}
                            </span>
                            @endif
                            <span style="color:#94a3b8; font-size:13px;">
                                <i class="fas fa-calendar-alt" style="margin-right:4px;"></i>
                                {{ $post->published_at?->format('d/m/Y') ?? $post->created_at?->format('d/m/Y') ?? '' }}
                            </span>
                            @if($post->author)
                            <span style="color:#94a3b8; font-size:13px;">
                                <i class="fas fa-user" style="margin-right:4px;"></i>
                                {{ $post->author->name }}
                            </span>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h1 style="font-size:26px; font-weight:800; color:#1e293b; margin:0 0 20px; line-height:1.4;">
                            {{ $post->name ?? $post->title }}
                        </h1>

                        {{-- Short description --}}
                        @if($post->short_description)
                        <div style="font-size:15px; color:#475569; line-height:1.8; margin-bottom:24px; padding:16px; background:#f8fafc; border-left:4px solid var(--wk-primary); border-radius:0 8px 8px 0;">
                            {{ strip_tags($post->short_description) }}
                        </div>
                        @endif

                        {{-- Main content --}}
                        @if($post->content ?? $post->description)
                        <div class="post-content" style="font-size:15px; color:#374151; line-height:1.9;">
                            {!! $post->content ?? $post->description !!}
                        </div>
                        @endif

                        {{-- Tags --}}
                        @if($post->tags && $post->tags->isNotEmpty())
                        <div style="margin-top:28px; padding-top:20px; border-top:1px solid #f1f5f9;">
                            <span style="color:#64748b; font-size:13px; font-weight:600; margin-right:8px;">
                                <i class="fas fa-tags"></i> Tags:
                            </span>
                            @foreach($post->tags as $tag)
                            <span style="display:inline-block; background:#f1f5f9; color:#475569; padding:4px 12px; border-radius:20px; font-size:12px; margin:2px 4px 2px 0;">
                                #{{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </article>

                {{-- ===================================================
                     RELATED PRODUCTS FROM POST
                ====================================================== --}}
                @if(isset($relatedProducts) && $relatedProducts->isNotEmpty())
                <section style="margin-top:32px;">
                    <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,.05);">
                        <div class="wk-section-header" style="margin-bottom:20px;">
                            <h2 class="wk-section-title">
                                <i class="fas fa-box-open"></i> Sản phẩm liên quan bài viết
                            </h2>
                        </div>
                        <div class="wk-products-grid"
                             data-recommendation-type="post_related"
                             data-source="post_detail">
                            @foreach($relatedProducts as $index => $product)
                            <div data-product-id="{{ $product->id }}"
                                 data-position="{{ $index + 1 }}"
                                 data-recommendation-type="post_related"
                                 data-source="post_detail"
                                 class="rec-product-wrapper">
                                <x-shop.product-card :product="$product" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif

                {{-- Related Posts --}}
                @if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
                <section style="margin-top:28px;">
                    <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,.05);">
                        <div class="wk-section-header" style="margin-bottom:16px;">
                            <h2 class="wk-section-title"><i class="fas fa-newspaper"></i> Bài viết liên quan</h2>
                            <a href="{{ route('blog.index') }}" class="wk-view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:16px;">
                            @foreach($relatedPosts as $relPost)
                            @php
                                $rpImg = $relPost->image ?? $relPost->featured_image ?? null;
                                if ($rpImg && !str_starts_with($rpImg, 'http') && !str_starts_with($rpImg, '/')) {
                                    $rpImg = '/storage/' . $rpImg;
                                }
                            @endphp
                            <a href="{{ url($relPost->slug) }}" style="text-decoration:none; color:inherit;">
                                <article style="background:#f8fafc; border-radius:12px; overflow:hidden; border:1px solid #f1f5f9; transition:box-shadow .2s,transform .2s;"
                                         onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,.08)';this.style.transform='translateY(-2px)'"
                                         onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                                    <div style="height:130px; overflow:hidden; background:#e2e8f0;">
                                        @if($rpImg)
                                        <img src="{{ $rpImg }}" alt="{{ $relPost->name ?? $relPost->title }}"
                                             style="width:100%; height:100%; object-fit:cover;">
                                        @else
                                        <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                                            <i class="fas fa-newspaper" style="font-size:36px; color:#94a3b8;"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <div style="padding:12px;">
                                        <div style="font-size:10px; color:var(--wk-primary); font-weight:700; margin-bottom:4px;">
                                            {{ $relPost->published_at?->format('d/m/Y') ?? '' }}
                                        </div>
                                        <h3 style="font-size:13px; font-weight:700; color:#1e293b; margin:0; line-height:1.4; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                            {{ $relPost->name ?? $relPost->title }}
                                        </h3>
                                    </div>
                                </article>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
            </div>

            {{-- SIDEBAR --}}
            <aside style="position:sticky; top:80px;">
                {{-- Share buttons --}}
                <div style="background:#fff; border-radius:16px; padding:20px; box-shadow:0 2px 12px rgba(0,0,0,.05); margin-bottom:16px;">
                    <h3 style="font-size:14px; font-weight:700; color:#1e293b; margin:0 0 14px;">
                        <i class="fas fa-share-alt"></i> Chia sẻ bài viết
                    </h3>
                    <div style="display:flex; gap:10px; flex-wrap:wrap;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                           target="_blank" rel="noopener"
                           style="display:inline-flex; align-items:center; gap:6px; background:#1877f2; color:#fff; padding:8px 14px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none;">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->name ?? $post->title ?? '') }}"
                           target="_blank" rel="noopener"
                           style="display:inline-flex; align-items:center; gap:6px; background:#1da1f2; color:#fff; padding:8px 14px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none;">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    </div>
                </div>

                {{-- Sidebar: Latest Posts --}}
                @if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
                <div style="background:#fff; border-radius:16px; padding:20px; box-shadow:0 2px 12px rgba(0,0,0,.05);">
                    <h3 style="font-size:14px; font-weight:700; color:#1e293b; margin:0 0 14px; padding-bottom:10px; border-bottom:2px solid var(--wk-primary);">
                        <i class="fas fa-clock"></i> Bài viết mới nhất
                    </h3>
                    @foreach($relatedPosts->take(4) as $sPost)
                    @php
                        $sImg = $sPost->image ?? $sPost->featured_image ?? null;
                        if ($sImg && !str_starts_with($sImg, 'http') && !str_starts_with($sImg, '/')) {
                            $sImg = '/storage/' . $sImg;
                        }
                    @endphp
                    <a href="{{ url($sPost->slug) }}" style="display:flex; gap:10px; padding:10px 0; border-bottom:1px solid #f1f5f9; text-decoration:none; color:inherit; align-items:flex-start;"
                       onmouseover="this.style.color='var(--wk-primary)'"
                       onmouseout="this.style.color='inherit'">
                        <div style="width:64px; height:48px; border-radius:8px; overflow:hidden; flex-shrink:0; background:#f1f5f9;">
                            @if($sImg)
                            <img src="{{ $sImg }}" alt="{{ $sPost->name ?? $sPost->title }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                                <i class="fas fa-newspaper" style="color:#94a3b8;"></i>
                            </div>
                            @endif
                        </div>
                        <div>
                            <div style="font-size:10px; color:#94a3b8; margin-bottom:3px;">
                                {{ $sPost->published_at?->format('d/m/Y') ?? '' }}
                            </div>
                            <div style="font-size:13px; font-weight:600; line-height:1.4; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                {{ $sPost->name ?? $sPost->title }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            </aside>
        </div>
    </div>
</div>

{{-- Post content styling --}}
<style>
.post-content h1, .post-content h2, .post-content h3, .post-content h4 {
    color: #1e293b;
    font-weight: 700;
    margin: 24px 0 12px;
    line-height: 1.4;
}
.post-content h2 { font-size: 22px; }
.post-content h3 { font-size: 18px; }
.post-content h4 { font-size: 16px; }
.post-content p { margin-bottom: 16px; }
.post-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 12px 0; }
.post-content ul, .post-content ol { padding-left: 20px; margin-bottom: 16px; }
.post-content li { margin-bottom: 6px; }
.post-content a { color: var(--wk-primary); }
.post-content a:hover { text-decoration: underline; }
.post-content blockquote {
    border-left: 4px solid var(--wk-primary);
    padding: 12px 20px;
    background: #f8fafc;
    margin: 16px 0;
    border-radius: 0 8px 8px 0;
    color: #475569;
    font-style: italic;
}
.post-content table {
    width: 100%; border-collapse: collapse; margin: 16px 0;
}
.post-content th, .post-content td {
    border: 1px solid #e2e8f0; padding: 10px 14px; text-align: left;
}
.post-content th {
    background: #f1f5f9; font-weight: 700;
}
.post-content tr:nth-child(even) td { background: #f8fafc; }
.rec-product-wrapper { position: relative; }

@media (max-width: 992px) {
    div[style*="grid-template-columns:1fr 300px"] {
        grid-template-columns: 1fr !important;
    }
    div[style*="position:sticky"] {
        position: static !important;
    }
}
</style>

@push('scripts')
<script>
// Track recommendation clicks for post-related products
document.querySelectorAll('.rec-product-wrapper').forEach(function(wrapper) {
    wrapper.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (!link) return;
        const productId = wrapper.dataset.productId;
        const recType = wrapper.dataset.recommendationType;
        const source = wrapper.dataset.source;
        const position = wrapper.dataset.position;
        if (productId) {
            navigator.sendBeacon('/api/recommendations/track', JSON.stringify({
                product_id: parseInt(productId),
                recommendation_type: recType,
                source: source,
                position: parseInt(position),
                _token: document.querySelector('meta[name="csrf-token"]')?.content
            }));
        }
    });
});
</script>
@endpush

@endsection
