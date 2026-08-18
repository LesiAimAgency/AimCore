<?php

namespace App\Widgets\Kalles;

use App\Models\ProductCategory;
use App\Widgets\BaseWidget;

class CategoryShowcaseWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Category Showcase',
            'description' => 'Hiển thị lưới hoặc slider các danh mục nổi bật',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2z"/>',
            'variants' => ['grid' => 'Lưới cơ bản (Grid)', 'slider' => 'Thanh cuộn (Carousel)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => 'Shop By Category'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                [
                    'name' => 'categories',
                    'label' => 'Chọn danh mục',
                    'type' => 'repeatable',
                    'max' => 6,
                    'fields' => [
                        ['name' => 'category_id', 'label' => 'ID Danh Mục', 'type' => 'number'],
                        ['name' => 'custom_image', 'label' => 'Ảnh tùy chỉnh (Bỏ trống lấy ảnh mặc định của danh mục)', 'type' => 'image'],
                    ],
                ],
                ['name' => 'columns', 'label' => 'Số cột (Chỉ áp dụng Grid)', 'type' => 'select', 'options' => ['2' => '2', '3' => '3', '4' => '4', '6' => '6'], 'default' => '4'],
                ['name' => 'design_style', 'label' => 'Kiểu thiết kế', 'type' => 'select', 'options' => ['text_below' => 'Chữ bên dưới ảnh', 'text_inside' => 'Chữ đè lên ảnh'], 'default' => 'text_inside'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $cats = $this->get('categories', []);
        $columns = (int) $this->get('columns', 4);
        $variant = $this->getVariant('grid');
        $style = $this->get('design_style', 'text_inside');

        if (empty($cats)) {
            return '<div class="alert alert-warning">Vui lòng cấu hình danh mục hiển thị.</div>';
        }

        $itemsHtml = '';
        $colClass = 'col-lg-'.(12 / $columns).' col-md-4 col-6 mb-4';

        foreach ($cats as $catConfig) {
            $catId = $catConfig['category_id'] ?? null;
            if (! $catId) {
                continue;
            }

            $category = ProductCategory::find($catId);
            if (! $category) {
                continue;
            }

            $image = htmlspecialchars($catConfig['custom_image'] ?? '');
            if (! $image) {
                // Giả định bảng product_categories có cột image
                $image = $category->image ? asset('storage/'.$category->image) : asset('assets/images/placeholder.jpg');
            }

            $name = htmlspecialchars($category->name);
            $url = url('/category/'.$category->slug);

            if ($style === 'text_inside') {
                $itemContent = <<<HTML
                <a href="{$url}" class="d-block position-relative overflow-hidden group rounded">
                    <img src="{$image}" alt="{$name}" class="img-fluid w-100 object-fit-cover" style="aspect-ratio: 4/5; transition: transform 0.5s;">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3 text-center">
                        <span class="bg-white text-dark px-4 py-2 rounded-pill fw-bold text-uppercase fs-14 shadow-sm group-hover:bg-dark group-hover:text-white transition-all duration-300">{$name}</span>
                    </div>
                </a>
HTML;
            } else {
                $itemContent = <<<HTML
                <a href="{$url}" class="d-block text-center text-decoration-none group">
                    <div class="overflow-hidden rounded mb-3">
                        <img src="{$image}" alt="{$name}" class="img-fluid w-100 object-fit-cover rounded-circle" style="aspect-ratio: 1/1; transition: transform 0.5s;">
                    </div>
                    <h6 class="text-dark fw-bold fs-16 group-hover:text-danger transition-colors">{$name}</h6>
                </a>
HTML;
            }

            if ($variant === 'slider') {
                $itemsHtml .= "<div class=\"{$colClass}\">{$itemContent}</div>";
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

        $wrapperClass = $variant === 'slider' ? 'row flex-nowrap overflow-auto hide-scrollbar' : 'row';

        return <<<HTML
<style>
.group:hover img { transform: scale(1.05); }
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
<div class="kalles-category-showcase py-5 bg-light">
    <div class="container">
        {$headerHtml}
        <div class="{$wrapperClass}">
            {$itemsHtml}
        </div>
    </div>
</div>
HTML;
    }
}
