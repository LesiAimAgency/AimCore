<?php

namespace App\Widgets\Kalles;

use App\Models\Post;
use App\Widgets\BaseWidget;
use Illuminate\Support\Str;

class LatestBlogWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Latest Blog',
            'description' => 'Hiển thị các bài viết Blog mới nhất',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>',
            'variants' => ['grid' => 'Lưới cơ bản (Grid)', 'slider' => 'Thanh cuộn (Carousel)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => 'Latest News'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                ['name' => 'limit', 'label' => 'Số lượng bài viết', 'type' => 'number', 'default' => 3],
                ['name' => 'show_date', 'label' => 'Hiển thị Ngày đăng', 'type' => 'checkbox', 'default' => true],
                ['name' => 'show_excerpt', 'label' => 'Hiển thị Tóm tắt', 'type' => 'checkbox', 'default' => true],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $limit = (int) $this->get('limit', 3);
        $showDate = $this->get('show_date', true);
        $showExcerpt = $this->get('show_excerpt', true);
        $variant = $this->getVariant('grid');

        // Master Prompt Rule 23: Tối ưu Performance - Eager Load relationships
        $posts = Post::where('status', 'published')
            ->latest()
            ->take($limit)
            ->get();

        if ($posts->isEmpty()) {
            return '<div class="alert alert-info">Chưa có bài viết nào.</div>';
        }

        $itemsHtml = '';
        $colClass = 'col-lg-4 col-md-6 mb-4';

        foreach ($posts as $post) {
            $img = $post->image ? asset('storage/'.$post->image) : asset('assets/images/placeholder.jpg');
            $pTitle = htmlspecialchars($post->title);
            $pUrl = url('/blog/'.$post->slug);
            $date = $post->created_at ? $post->created_at->format('M d, Y') : '';
            $excerpt = htmlspecialchars(Str::limit($post->excerpt ?? strip_tags($post->content), 100));

            $dateHtml = $showDate && $date ? "<span class=\"text-muted fs-13 text-uppercase me-3\"><i class=\"las la-calendar me-1\"></i>{$date}</span>" : '';
            $excerptHtml = $showExcerpt ? "<p class=\"text-muted fs-14 mt-2 mb-0\">{$excerpt}</p>" : '';

            $itemContent = <<<HTML
            <div class="kalles-post-card group">
                <a href="{$pUrl}" class="d-block overflow-hidden rounded mb-3 position-relative">
                    <img src="{$img}" alt="{$pTitle}" class="img-fluid w-100 object-fit-cover" style="aspect-ratio: 3/2; transition: transform 0.5s;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-0 group-hover:opacity-25 transition-all duration-300"></div>
                </a>
                <div class="post-info">
                    <div class="mb-2">{$dateHtml}</div>
                    <h5 class="fw-bold fs-18 lh-base mb-1"><a href="{$pUrl}" class="text-dark text-decoration-none group-hover:text-primary transition-colors">{$pTitle}</a></h5>
                    {$excerptHtml}
                </div>
            </div>
HTML;
            if ($variant === 'slider') {
                $itemsHtml .= "<div class=\"col-lg-4 col-md-6\">{$itemContent}</div>";
            } else {
                $itemsHtml .= "<div class=\"{$colClass}\">{$itemContent}</div>";
            }
        }

        $headerHtml = '';
        if ($title || $subtitle) {
            $headerHtml = '<div class="text-center mb-5">';
            if ($title) {
                $headerHtml .= "<h3 class=\"fw-bold mb-2\">{$title}</h3>";
            }
            if ($subtitle) {
                $headerHtml .= "<p class=\"text-muted fs-14\">{$subtitle}</p>";
            }
            $headerHtml .= '</div>';
        }

        if ($variant === 'slider') {
            $flickityOpts = htmlentities(json_encode([
                'cellAlign' => 'left',
                'contain' => true,
                'pageDots' => true,
                'prevNextButtons' => true,
                'wrapAround' => true,
            ]));
            $wrapper = "<div class=\"row kalles-slider\" data-flickity='{$flickityOpts}'>{$itemsHtml}</div>";
        } else {
            $wrapper = "<div class=\"row\">{$itemsHtml}</div>";
        }

        return <<<HTML
<style>.group:hover img { transform: scale(1.05); }</style>
<div class="kalles-latest-blog py-5">
    <div class="container">
        {$headerHtml}
        {$wrapper}
    </div>
</div>
HTML;
    }
}
