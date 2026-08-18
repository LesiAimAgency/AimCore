<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class HeroSliderWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Hero Slider',
            'description' => 'Slider trình chiếu hình ảnh ở đầu trang, hỗ trợ nhiều layout (Full-width, Boxed)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>',
            'variants' => ['full-width' => 'Full Width', 'boxed' => 'Boxed (Container)'],
            'fields' => [
                [
                    'name' => 'slides',
                    'label' => 'Danh sách Slide',
                    'type' => 'repeatable',
                    'max' => 5,
                    'fields' => [
                        ['name' => 'image', 'label' => 'Hình ảnh (Bắt buộc)', 'type' => 'image'],
                        ['name' => 'subheading', 'label' => 'Tiêu đề phụ', 'type' => 'text', 'placeholder' => 'SUMMER 2024'],
                        ['name' => 'heading', 'label' => 'Tiêu đề chính', 'type' => 'text', 'placeholder' => 'New Arrival Collection'],
                        ['name' => 'btn_text', 'label' => 'Chữ nút bấm', 'type' => 'text', 'placeholder' => 'Explore Now'],
                        ['name' => 'btn_link', 'label' => 'Link nút bấm', 'type' => 'url', 'default' => '#'],
                        ['name' => 'content_align', 'label' => 'Căn chỉnh nội dung', 'type' => 'select', 'options' => ['left' => 'Trái', 'center' => 'Giữa', 'right' => 'Phải'], 'default' => 'center'],
                    ],
                ],
                ['name' => 'height_desktop', 'label' => 'Chiều cao Desktop (vh/px)', 'type' => 'text', 'default' => '100vh', 'placeholder' => 'VD: 100vh hoặc 600px'],
                ['name' => 'height_mobile', 'label' => 'Chiều cao Mobile (vh/px)', 'type' => 'text', 'default' => '60vh', 'placeholder' => 'VD: 60vh hoặc 400px'],
                ['name' => 'autoplay', 'label' => 'Tự động chạy', 'type' => 'checkbox', 'default' => true],
                ['name' => 'fade', 'label' => 'Hiệu ứng Fade (Mờ dần)', 'type' => 'checkbox', 'default' => false],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $slides = $this->get('slides', []);
        $variant = $this->getVariant('full-width');
        $heightDesktop = htmlspecialchars($this->get('height_desktop', '100vh'));
        $heightMobile = htmlspecialchars($this->get('height_mobile', '60vh'));
        $autoplay = $this->get('autoplay', true) ? 'true' : 'false';
        $fade = $this->get('fade', false) ? 'true' : 'false';

        if (empty($slides)) {
            return '<div class="alert alert-info m-4">Chưa có slide nào được cấu hình cho Hero Slider.</div>';
        }

        $flickityOptions = htmlentities(json_encode([
            'fade' => $this->get('fade', false),
            'cellAlign' => 'center',
            'imagesLoaded' => true,
            'lazyLoad' => false,
            'wrapAround' => true,
            'autoPlay' => $this->get('autoplay', true) ? 5000 : false,
            'pauseAutoPlayOnHover' => true,
            'prevNextButtons' => true,
            'pageDots' => true,
            'contain' => true,
            'adaptiveHeight' => true,
            'dragThreshold' => 5
        ]));

        $slidesHtml = '';
        foreach ($slides as $index => $slide) {
            $image = htmlspecialchars($slide['image'] ?? '');
            $subheading = htmlspecialchars($slide['subheading'] ?? '');
            $heading = htmlspecialchars($slide['heading'] ?? '');
            $btnText = htmlspecialchars($slide['btn_text'] ?? '');
            $btnLink = htmlspecialchars($slide['btn_link'] ?? '#');
            $align = $slide['content_align'] ?? 'center';

            $alignClass = match($align) {
                'left' => 'text-start align-items-start',
                'right' => 'text-end align-items-end',
                default => 'text-center align-items-center',
            };

            $colClass = match($align) {
                'left' => 'offset-lg-1 col-lg-7',
                'right' => 'offset-lg-4 col-lg-7',
                default => 'col-lg-8 mx-auto',
            };

            $slidesHtml .= <<<HTML
            <div class="slideshow__slide w-100 position-relative d-flex bg-dark overlay-slide" style="background-image: url('{$image}'); background-size: cover; background-position: center; min-height: var(--hero-h-desk);">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                <div class="container position-relative z-1 d-flex flex-column justify-content-center h-100">
                    <div class="row w-100">
                        <div class="{$colClass}">
                            <div class="slide-content {$alignClass} d-flex flex-column text-white">
                                <h4 class="fs-18 fw-medium mb-2 text-uppercase" style="letter-spacing: 2px;">{$subheading}</h4>
                                <h1 class="display-3 fw-bold mb-4">{$heading}</h1>
                                HTML;
            if ($btnText) {
                $slidesHtml .= <<<HTML
                                <a class="btn btn-light rounded-0 px-5 py-3 fw-semibold text-uppercase" href="{$btnLink}">{$btnText}</a>
                                HTML;
            }
            $slidesHtml .= <<<HTML
                            </div>
                        </div>
                    </div>
                </div>
            </div>
HTML;
        }

        $containerClass = $variant === 'boxed' ? 'container' : 'container-fluid px-0';

        return <<<HTML
<style>
    .kalles-hero-slider { --hero-h-desk: {$heightDesktop}; }
    @media (max-width: 767px) { .kalles-hero-slider { --hero-h-desk: {$heightMobile}; } .slideshow__slide { min-height: var(--hero-h-desk) !important; } }
</style>
<div class="kalles-hero-slider {$containerClass}">
    <div class="slideshow" data-flickity='{$flickityOptions}'>
        {$slidesHtml}
    </div>
</div>
HTML;
    }
}
