<?php

namespace App\Widgets\Kalles;

use App\Models\ProductCategory;
use App\Widgets\BaseWidget;

class CategoryMenuWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Category Vertical Menu',
            'description' => 'Menu dọc hiển thị danh mục sản phẩm (thường dùng cho Sidebar)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>',
            'variants' => ['default' => 'Mặc định'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề Menu', 'type' => 'text', 'default' => 'Categories'],
                ['name' => 'parent_id', 'label' => 'ID Danh mục cha (Bỏ trống lấy gốc)', 'type' => 'number'],
                ['name' => 'show_count', 'label' => 'Hiển thị số lượng sản phẩm', 'type' => 'checkbox', 'default' => true],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', 'Categories'));
        $parentId = $this->get('parent_id');
        $showCount = $this->get('show_count', true);

        $query = ProductCategory::where('status', 'published')->orderBy('order', 'asc');
        if ($parentId) {
            $query->where('parent_id', $parentId);
        } else {
            $query->whereNull('parent_id');
        }

        $categories = $query->get();

        if ($categories->isEmpty()) {
            return '';
        }

        $listHtml = '';
        foreach ($categories as $category) {
            $name = htmlspecialchars($category->name);
            $url = url('/category/'.$category->slug);
            // Cần eager load products_count nếu muốn tối ưu
            $countHtml = $showCount ? "<span class=\"text-muted fs-12\">({$category->products()->count()})</span>" : '';

            $listHtml .= <<<HTML
            <li class="mb-2">
                <a href="{$url}" class="text-dark text-decoration-none d-flex justify-content-between align-items-center widget-menu-link">
                    <span>{$name}</span>
                    {$countHtml}
                </a>
            </li>
HTML;
        }

        return <<<HTML
<style>
.widget-menu-link:hover { color: var(--kalles-primary, #56cfe1) !important; padding-left: 5px; transition: all 0.3s ease; }
</style>
<div class="kalles-category-menu widget-sidebar mb-4">
    <h5 class="fw-bold mb-3 text-uppercase fs-16 border-bottom pb-2">{$title}</h5>
    <ul class="list-unstyled mb-0">
        {$listHtml}
    </ul>
</div>
HTML;
    }
}
