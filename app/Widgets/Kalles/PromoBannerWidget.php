<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class PromoBannerWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Promo Banners',
            'description' => 'Hiển thị các banner quảng cáo (Bento Grid hoặc Grid thông thường)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
            'variants' => ['grid' => 'Lưới thông thường (Grid)', 'bento' => 'Bento Grid (Bất đối xứng)'],
            'fields' => [
                [
                    'name' => 'banners',
                    'label' => 'Danh sách Banner',
                    'type' => 'repeatable',
                    'max' => 6,
                    'fields' => [
                        ['name' => 'image', 'label' => 'Ảnh Banner', 'type' => 'image'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'subtitle', 'label' => 'Tiêu đề phụ', 'type' => 'text'],
                        ['name' => 'link', 'label' => 'Đường dẫn', 'type' => 'url', 'default' => '#'],
                        ['name' => 'text_align', 'label' => 'Căn lề chữ', 'type' => 'select', 'options' => ['left' => 'Trái', 'center' => 'Giữa', 'right' => 'Phải'], 'default' => 'center'],
                        ['name' => 'text_color', 'label' => 'Màu chữ', 'type' => 'color', 'default' => '#ffffff'],
                    ],
                ],
                ['name' => 'columns', 'label' => 'Số cột (Chỉ áp dụng cho Grid)', 'type' => 'select', 'options' => ['2' => '2 Cột', '3' => '3 Cột', '4' => '4 Cột'], 'default' => '3'],
                ['name' => 'gap', 'label' => 'Khoảng cách giữa các banner', 'type' => 'select', 'options' => ['g-0' => 'Không có', 'g-2' => 'Nhỏ', 'g-4' => 'Lớn'], 'default' => 'g-4'],
                ['name' => 'hover_effect', 'label' => 'Hiệu ứng Hover', 'type' => 'select', 'options' => ['zoom' => 'Zoom ảnh', 'flash' => 'Nháy sáng', 'none' => 'Không'], 'default' => 'zoom'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $banners = $this->get('banners', []);
        $variant = $this->getVariant('grid');
        $columns = (int) $this->get('columns', 3);
        $gap = $this->get('gap', 'g-4');
        $hover = $this->get('hover_effect', 'zoom');

        if (empty($banners)) {
            return '<div class="alert alert-info">Chưa cấu hình Promo Banner.</div>';
        }

        $html = '';

        if ($variant === 'bento') {
            // Bento Grid logic (Ví dụ: 3 ảnh, 1 to 2 nhỏ)
            $html .= "<div class=\"row {$gap}\">";
            foreach ($banners as $index => $banner) {
                $colClass = ($index === 0 && count($banners) >= 3) ? 'col-lg-6' : 'col-lg-6';
                if (count($banners) == 3) {
                    $colClass = ($index === 0) ? 'col-lg-6' : 'col-lg-6';
                }

                $html .= $this->renderBannerItem($banner, $colClass, $hover, $index === 0 && count($banners) == 3);
            }
            $html .= '</div>';
        } else {
            // Normal Grid
            $colClass = 'col-lg-'.(12 / $columns).' col-md-6';
            $html .= "<div class=\"row {$gap}\">";
            foreach ($banners as $banner) {
                $html .= $this->renderBannerItem($banner, $colClass, $hover);
            }
            $html .= '</div>';
        }

        return <<<HTML
<div class="kalles-promo-banners py-5">
    <div class="container">
        {$html}
    </div>
</div>
HTML;
    }

    private function renderBannerItem(array $banner, string $colClass, string $hover, bool $isLarge = false): string
    {
        $img = htmlspecialchars($banner['image'] ?? '');
        $title = htmlspecialchars($banner['title'] ?? '');
        $subtitle = htmlspecialchars($banner['subtitle'] ?? '');
        $link = htmlspecialchars($banner['link'] ?? '#');
        $align = htmlspecialchars($banner['text_align'] ?? 'center');
        $color = htmlspecialchars($banner['text_color'] ?? '#ffffff');

        $alignClass = match ($align) {
            'left' => 'text-start align-items-start',
            'right' => 'text-end align-items-end',
            default => 'text-center align-items-center',
        };

        $hoverClass = $hover === 'zoom' ? 'overflow-hidden img-zoom' : ($hover === 'flash' ? 'hover-flash' : '');
        $heightClass = $isLarge ? 'h-100' : 'h-100'; // Có thể tùy chỉnh logic height ở đây

        return <<<HTML
        <div class="{$colClass} mb-4 mb-lg-0">
            <a href="{$link}" class="d-block position-relative {$hoverClass} {$heightClass} rounded w-100 bg-dark" style="min-height:250px;">
                <img src="{$img}" alt="{$title}" class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" style="transition: transform 0.5s;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                <div class="position-absolute top-0 start-0 w-100 h-100 p-4 d-flex flex-column justify-content-center {$alignClass}" style="color: {$color};">
                    <p class="fs-14 fw-medium text-uppercase mb-1" style="letter-spacing:1px;">{$subtitle}</p>
                    <h3 class="fw-bold m-0">{$title}</h3>
                </div>
            </a>
        </div>
HTML;
    }
}
