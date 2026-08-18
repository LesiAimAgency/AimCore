<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class TestimonialWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Testimonials',
            'description' => 'Slider hiển thị đánh giá của khách hàng',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
            'variants' => ['default' => 'Mặc định'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => 'Customer Reviews'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                [
                    'name' => 'testimonials',
                    'label' => 'Danh sách đánh giá',
                    'type' => 'repeatable',
                    'max' => 6,
                    'fields' => [
                        ['name' => 'avatar', 'label' => 'Avatar Khách Hàng', 'type' => 'image'],
                        ['name' => 'name', 'label' => 'Tên Khách Hàng', 'type' => 'text'],
                        ['name' => 'role', 'label' => 'Chức danh (VD: Verified Buyer)', 'type' => 'text'],
                        ['name' => 'content', 'label' => 'Nội dung đánh giá', 'type' => 'textarea'],
                        ['name' => 'rating', 'label' => 'Số sao (1-5)', 'type' => 'number', 'default' => 5],
                    ],
                ],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $testimonials = $this->get('testimonials', []);

        if (empty($testimonials)) {
            return '<div class="alert alert-info">Vui lòng cấu hình đánh giá khách hàng.</div>';
        }

        $flickityOpts = htmlentities(json_encode([
            'cellAlign' => 'center',
            'contain' => true,
            'pageDots' => true,
            'prevNextButtons' => true,
            'wrapAround' => true,
            'autoPlay' => 5000,
        ]));

        $itemsHtml = '';
        foreach ($testimonials as $item) {
            $avatar = htmlspecialchars($item['avatar'] ?? asset('assets/images/avatar-placeholder.png'));
            $name = htmlspecialchars($item['name'] ?? 'Customer');
            $role = htmlspecialchars($item['role'] ?? '');
            $content = htmlspecialchars($item['content'] ?? '');
            $rating = (int) ($item['rating'] ?? 5);

            $stars = '';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                    $stars .= '<i class="las la-star text-warning"></i>';
                } else {
                    $stars .= '<i class="lar la-star text-warning"></i>';
                }
            }

            $itemsHtml .= <<<HTML
            <div class="col-lg-8 col-md-10 mx-auto px-4 text-center">
                <div class="mb-4">
                    <img src="{$avatar}" alt="{$name}" class="rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                </div>
                <div class="fs-18 mb-2">
                    {$stars}
                </div>
                <h5 class="fw-medium lh-base mb-4 fs-18 fst-italic">"{$content}"</h5>
                <div>
                    <span class="d-block fw-bold fs-15">{$name}</span>
                    <span class="text-muted fs-14">{$role}</span>
                </div>
            </div>
HTML;
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

        return <<<HTML
<div class="kalles-testimonial-widget py-5 bg-light">
    <div class="container">
        {$headerHtml}
        <div class="testimonial-slider" data-flickity='{$flickityOpts}'>
            {$itemsHtml}
        </div>
    </div>
</div>
HTML;
    }
}
