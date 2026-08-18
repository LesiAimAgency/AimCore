<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class BrandSliderWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Brand Slider',
            'description' => 'Thanh cuộn logo các đối tác/thương hiệu',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
            'variants' => ['default' => 'Mặc định'],
            'fields' => [
                [
                    'name' => 'brands',
                    'label' => 'Danh sách Logo Thương Hiệu',
                    'type' => 'repeatable',
                    'max' => 12,
                    'fields' => [
                        ['name' => 'logo', 'label' => 'Ảnh Logo', 'type' => 'image'],
                        ['name' => 'link', 'label' => 'Link đối tác', 'type' => 'url', 'default' => '#'],
                        ['name' => 'name', 'label' => 'Tên thương hiệu (Dùng cho thuộc tính alt)', 'type' => 'text'],
                    ],
                ],
                ['name' => 'opacity', 'label' => 'Hiệu ứng mờ (Hover để sáng lên)', 'type' => 'checkbox', 'default' => true],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $brands = $this->get('brands', []);
        $opacity = $this->get('opacity', true);

        if (empty($brands)) {
            return '';
        }

        $flickityOpts = htmlentities(json_encode([
            'cellAlign' => 'center',
            'contain' => true,
            'pageDots' => false,
            'prevNextButtons' => false,
            'wrapAround' => true,
            'autoPlay' => 3000,
        ]));

        $itemsHtml = '';
        $opacityClass = $opacity ? 'opacity-50 hover-opacity-100' : '';

        foreach ($brands as $brand) {
            $logo = htmlspecialchars($brand['logo'] ?? '');
            $link = htmlspecialchars($brand['link'] ?? '#');
            $name = htmlspecialchars($brand['name'] ?? 'Brand');

            if (! $logo) {
                continue;
            }

            $itemsHtml .= <<<HTML
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 px-3 text-center">
                <a href="{$link}" class="d-block {$opacityClass}" style="transition: opacity 0.3s ease;">
                    <img src="{$logo}" alt="{$name}" class="img-fluid max-w-150 mx-auto" style="max-height: 80px; object-fit: contain;">
                </a>
            </div>
HTML;
        }

        return <<<HTML
<style>.hover-opacity-100:hover { opacity: 1 !important; }</style>
<div class="kalles-brand-slider py-4 border-top border-bottom">
    <div class="container">
        <div class="row align-items-center kalles-slider" data-flickity='{$flickityOpts}'>
            {$itemsHtml}
        </div>
    </div>
</div>
HTML;
    }
}
