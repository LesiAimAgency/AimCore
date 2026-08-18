<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class ServiceFeaturesWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Service Features',
            'description' => 'Hiển thị các cam kết dịch vụ (Miễn phí vận chuyển, Hỗ trợ 24/7)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
            'variants' => ['row' => 'Nằm ngang (Row)', 'column' => 'Cột xếp chồng (Dùng cho Sidebar)'],
            'fields' => [
                [
                    'name' => 'features',
                    'label' => 'Danh sách Tính năng',
                    'type' => 'repeatable',
                    'max' => 4,
                    'fields' => [
                        ['name' => 'icon', 'label' => 'Icon (LineAwesome Class)', 'type' => 'text', 'placeholder' => 'VD: las la-shipping-fast'],
                        ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text'],
                        ['name' => 'description', 'label' => 'Mô tả', 'type' => 'text'],
                    ],
                ],
                ['name' => 'icon_position', 'label' => 'Vị trí Icon', 'type' => 'select', 'options' => ['top' => 'Trên', 'left' => 'Trái'], 'default' => 'left'],
                ['name' => 'border', 'label' => 'Hiển thị viền', 'type' => 'checkbox', 'default' => true],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $features = $this->get('features', []);
        $variant = $this->getVariant('row');
        $iconPos = $this->get('icon_position', 'left');
        $border = $this->get('border', true);

        if (empty($features)) {
            return '';
        }

        $itemsHtml = '';
        $colClass = $variant === 'row' ? 'col-md-6 col-lg-'.(12 / count($features)) : 'col-12 mb-4';

        foreach ($features as $feature) {
            $icon = htmlspecialchars($feature['icon'] ?? 'las la-star');
            $title = htmlspecialchars($feature['title'] ?? '');
            $desc = htmlspecialchars($feature['description'] ?? '');

            if ($iconPos === 'top') {
                $itemContent = <<<HTML
                <div class="text-center p-3">
                    <i class="{$icon} fs-1 text-dark mb-3"></i>
                    <h6 class="fw-bold mb-1 fs-15">{$title}</h6>
                    <p class="text-muted fs-13 mb-0">{$desc}</p>
                </div>
HTML;
            } else {
                $itemContent = <<<HTML
                <div class="d-flex align-items-center p-3">
                    <i class="{$icon} fs-1 text-dark me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1 fs-15">{$title}</h6>
                        <p class="text-muted fs-13 mb-0">{$desc}</p>
                    </div>
                </div>
HTML;
            }

            if ($border && $variant === 'row') {
                $itemsHtml .= "<div class=\"{$colClass} border-end border-end-md-0\">{$itemContent}</div>";
            } else {
                $itemsHtml .= "<div class=\"{$colClass}\">{$itemContent}</div>";
            }
        }

        $borderClass = $border && $variant === 'row' ? 'border-top border-bottom' : '';

        return <<<HTML
<div class="kalles-service-features py-4 {$borderClass}">
    <div class="container">
        <div class="row g-0 justify-content-center">
            {$itemsHtml}
        </div>
    </div>
</div>
HTML;
    }
}
