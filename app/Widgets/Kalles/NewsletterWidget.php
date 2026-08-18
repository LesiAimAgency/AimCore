<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class NewsletterWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Newsletter Subscribe',
            'description' => 'Form đăng ký nhận bản tin (Banner hoặc Inline)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
            'variants' => ['inline' => 'Form hiển thị trong trang', 'banner' => 'Banner có ảnh nền'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text', 'default' => 'Subscribe Our Newsletter'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text', 'default' => 'Sign up to get the latest on sales, new releases and more'],
                ['name' => 'bg_image', 'label' => 'Ảnh nền (Dành cho kiểu Banner)', 'type' => 'image'],
                ['name' => 'placeholder', 'label' => 'Placeholder Ô nhập email', 'type' => 'text', 'default' => 'Your email address'],
                ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text', 'default' => 'Subscribe'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $bgImage = $this->get('bg_image');
        $placeholder = htmlspecialchars($this->get('placeholder', 'Your email address'));
        $btnText = htmlspecialchars($this->get('btn_text', 'Subscribe'));
        $variant = $this->getVariant('inline');

        // Form HTML chung
        $formHtml = <<<HTML
        <form action="/subscribe" method="POST" class="d-flex mx-auto" style="max-width: 500px;">
            <input type="email" name="email" class="form-control rounded-0 px-4 py-3" placeholder="{$placeholder}" required>
            <button type="submit" class="btn btn-dark rounded-0 px-4 fw-bold text-uppercase">{$btnText}</button>
        </form>
HTML;

        if ($variant === 'banner') {
            $bgHtml = $bgImage ? "background-image: url('{$bgImage}'); background-size: cover; background-position: center; background-attachment: fixed;" : 'background-color: #f5f5f5;';

            return <<<HTML
<div class="kalles-newsletter py-5 position-relative" style="{$bgHtml}">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-50"></div>
    <div class="container text-center py-5 position-relative z-1">
        <h3 class="fw-bold mb-2 fs-24">{$title}</h3>
        <p class="text-muted fs-15 mb-4">{$subtitle}</p>
        {$formHtml}
    </div>
</div>
HTML;
        }

        // Inline
        return <<<HTML
<div class="kalles-newsletter-inline py-4 border-top border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0 text-center text-md-start">
                <h4 class="fw-bold mb-1 fs-18">{$title}</h4>
                <p class="text-muted fs-14 mb-0">{$subtitle}</p>
            </div>
            <div class="col-md-6">
                {$formHtml}
            </div>
        </div>
    </div>
</div>
HTML;
    }
}
