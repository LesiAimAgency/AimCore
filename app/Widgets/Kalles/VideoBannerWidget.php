<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class VideoBannerWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Video Banner',
            'description' => 'Banner video nền với text overlay (hỗ trợ Youtube, Vimeo, File tĩnh)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
            'variants' => ['default' => 'Mặc định'],
            'fields' => [
                ['name' => 'video_type', 'label' => 'Nguồn video', 'type' => 'select', 'options' => ['youtube' => 'YouTube', 'vimeo' => 'Vimeo', 'file' => 'File MP4 tĩnh'], 'default' => 'youtube'],
                ['name' => 'video_id', 'label' => 'ID Video (YouTube/Vimeo)', 'type' => 'text', 'placeholder' => 'VD: dQw4w9WgXcQ'],
                ['name' => 'video_url', 'label' => 'Đường dẫn file (Nếu chọn File MP4)', 'type' => 'url'],
                ['name' => 'poster_img', 'label' => 'Ảnh poster (hiển thị khi video tải)', 'type' => 'image'],
                ['name' => 'overlay_opacity', 'label' => 'Độ mờ lớp phủ nền (0-100)', 'type' => 'number', 'default' => 30],
                ['name' => 'title', 'label' => 'Tiêu đề chính', 'type' => 'text', 'default' => 'Khám Phá Video'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'textarea'],
                ['name' => 'btn_text', 'label' => 'Nút bấm (Bỏ trống để ẩn)', 'type' => 'text'],
                ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'url', 'default' => '#'],
                ['name' => 'height', 'label' => 'Chiều cao banner (px/vh)', 'type' => 'text', 'default' => '600px'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $type = $this->get('video_type', 'youtube');
        $vid = htmlspecialchars($this->get('video_id', ''));
        $url = htmlspecialchars($this->get('video_url', ''));
        $poster = htmlspecialchars($this->get('poster_img', ''));
        $opacity = ((int) $this->get('overlay_opacity', 30)) / 100;
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $btnText = htmlspecialchars($this->get('btn_text', ''));
        $btnLink = htmlspecialchars($this->get('btn_link', '#'));
        $height = htmlspecialchars($this->get('height', '600px'));

        $videoHtml = '';
        if ($type === 'youtube' && $vid) {
            $videoHtml = "<iframe src=\"https://www.youtube.com/embed/{$vid}?autoplay=1&loop=1&mute=1&controls=0&playlist={$vid}\" class=\"w-100 h-100 position-absolute top-0 start-0\" style=\"object-fit:cover; border:none; pointer-events:none; transform: scale(1.2);\"></iframe>";
        } elseif ($type === 'vimeo' && $vid) {
            $videoHtml = "<iframe src=\"https://player.vimeo.com/video/{$vid}?background=1&autoplay=1&loop=1&byline=0&title=0\" class=\"w-100 h-100 position-absolute top-0 start-0\" style=\"object-fit:cover; border:none; pointer-events:none; transform: scale(1.2);\"></iframe>";
        } elseif ($type === 'file' && $url) {
            $posterAttr = $poster ? "poster=\"{$poster}\"" : '';
            $videoHtml = "<video autoplay loop muted playsinline {$posterAttr} class=\"w-100 h-100 position-absolute top-0 start-0\" style=\"object-fit:cover; pointer-events:none;\"><source src=\"{$url}\" type=\"video/mp4\"></video>";
        } elseif ($poster) {
            $videoHtml = "<div class=\"w-100 h-100 position-absolute top-0 start-0\" style=\"background:url('{$poster}') center/cover;\"></div>";
        }

        $btnHtml = $btnText ? "<a href=\"{$btnLink}\" class=\"btn btn-light rounded-0 px-4 py-2 mt-3\">{$btnText}</a>" : '';

        return <<<HTML
<div class="kalles-video-banner position-relative overflow-hidden bg-dark" style="min-height: {$height};">
    {$videoHtml}
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: {$opacity}; z-index:1;"></div>
    
    <div class="container h-100 position-relative z-2 d-flex align-items-center justify-content-center text-center">
        <div class="text-white">
            <h2 class="display-4 fw-bold mb-3">{$title}</h2>
            <p class="fs-18 mb-0 mx-auto" style="max-width: 600px;">{$subtitle}</p>
            {$btnHtml}
        </div>
    </div>
</div>
HTML;
    }
}
