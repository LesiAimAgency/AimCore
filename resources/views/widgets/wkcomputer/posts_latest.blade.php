<section class="wk-section wk-widget-posts-latest" style="background:#fff;padding:20px 0 28px;">
    <div class="wk-container">
        <div class="wk-section-header">
            <h2 class="wk-section-title">
                <i class="fas fa-newspaper"></i>
                {{ $title ?? 'TIN TỨC CÔNG NGHỆ & REVIEW' }}
            </h2>
            <a href="{{ route('blog.index') }}" class="wk-view-all">
                Xem tất cả <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));gap:16px;">
            @forelse($posts as $post)
                @php
                    $postImg = $post->image ?? $post->featured_image ?? null;
                    if ($postImg && !str_starts_with($postImg, 'http') && !str_starts_with($postImg, '/')) {
                        $postImg = '/storage/' . $postImg;
                    }
                @endphp
                <a href="{{ url($post->slug ?? '#') }}" style="text-decoration:none;color:inherit;">
                    <article style="background:#fff;border-radius:12px;border:1px solid #f1f5f9;overflow:hidden;height:100%;transition:box-shadow .2s,transform .2s;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,.1)';this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                        <div style="height:160px;overflow:hidden;background:#f8fafc;">
                            @if($postImg)
                                <img src="{{ $postImg }}" alt="{{ $post->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform .4s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            @else
                                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#f1f5f9,#e2e8f0);">
                                    <i class="fas fa-newspaper" style="font-size:40px;color:#94a3b8;"></i>
                                </div>
                            @endif
                        </div>
                        <div style="padding:14px;">
                            <div style="font-size:10px;color:#e11d48;font-weight:700;text-transform:uppercase;margin-bottom:6px;">
                                {{ $post->published_at?->format('d/m/Y') ?? 'Công Nghệ' }}
                            </div>
                            <h3 style="font-size:13px;font-weight:700;color:#1e293b;margin:0;line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                {{ $post->title }}
                            </h3>
                        </div>
                    </article>
                </a>
            @empty
                <div style="grid-column:1/-1;padding:30px;text-align:center;color:#666;background:#f8f9fa;border-radius:8px;">
                    Đang cập nhật tin tức công nghệ...
                </div>
            @endforelse
        </div>
    </div>
</section>
