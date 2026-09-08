<?php

namespace App\Widgets\Wkcomputer;

use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkProduct;
use App\Widgets\BaseWidget;

class WkProductSectionWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'WK Product Section',
            'description' => 'Khối danh sách sản phẩm theo danh mục hoặc bộ lọc (Bán chạy, Nổi bật, v.v.)',
            'category' => 'wkcomputer',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề khối',
                    'type' => 'text',
                    'default' => 'Sản phẩm nổi bật',
                ],
                [
                    'name' => 'filter',
                    'label' => 'Loại hiển thị / Bộ lọc',
                    'type' => 'select',
                    'options' => [
                        'category' => 'Theo danh mục (Category)',
                        'best_selling' => 'Sản phẩm bán chạy',
                        'featured' => 'Sản phẩm nổi bật',
                        'sale' => 'Sản phẩm đang giảm giá',
                        'latest' => 'Sản phẩm mới nhất',
                    ],
                    'default' => 'category',
                ],
                [
                    'name' => 'category_id',
                    'label' => 'ID Danh mục (nếu chọn theo danh mục)',
                    'type' => 'number',
                    'default' => null,
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng sản phẩm',
                    'type' => 'number',
                    'default' => 10,
                ],
                [
                    'name' => 'columns',
                    'label' => 'Số cột hiển thị',
                    'type' => 'select',
                    'options' => [
                        '4' => '4 cột',
                        '5' => '5 cột',
                    ],
                    'default' => '5',
                ],
                [
                    'name' => 'icon',
                    'label' => 'Icon FontAwesome',
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'name' => 'banner_image',
                    'label' => 'Banner danh mục / khối (Hình ảnh hoặc URL)',
                    'type' => 'image',
                    'default' => '',
                    'help' => 'Chọn hình ảnh hoặc dán URL banner hiển thị ở đầu khối sản phẩm',
                ],
                [
                    'name' => 'banner_link',
                    'label' => 'Link liên kết của Banner (URL)',
                    'type' => 'url',
                    'default' => '',
                    'help' => 'Đường dẫn khi nhấp vào banner (tùy chọn)',
                ],
                [
                    'name' => 'link',
                    'label' => 'Đường dẫn Xem tất cả (tùy chọn)',
                    'type' => 'text',
                    'default' => '',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : 14);

        $limit = max(1, (int) ($config['limit'] ?? 10));
        $filter = $config['filter'] ?? 'category';
        $categoryId = $config['category_id'] ?? null;
        $title = $config['title'] ?? 'Sản phẩm';

        $query = WkProduct::withoutGlobalScopes()
            ->where(function ($q) use ($projectId) {
                if ($projectId) {
                    $q->where('project_id', $projectId);
                }
            })
            ->whereIn('status', ['published', 'active', 1]);

        $category = null;
        $viewAllUrl = $config['link'] ?? '';

        if ($filter === 'category' && $categoryId) {
            $category = WkCategory::withoutGlobalScopes()
                ->where(function ($q) use ($projectId) {
                    if ($projectId) {
                        $q->where('project_id', $projectId);
                    }
                })
                ->find($categoryId);

            if ($category) {
                $categoryIds = array_merge([$category->id], $category->children()->pluck('id')->toArray());
                $query->whereIn('product_category_id', $categoryIds);

                if (empty($viewAllUrl)) {
                    $viewAllUrl = route('shop.index', ['categories' => [$category->slug]]);
                }
            }
        } elseif ($filter === 'best_selling') {
            $query->orderByDesc('views');
            if (empty($viewAllUrl)) {
                $viewAllUrl = route('shop.index');
            }
        } elseif ($filter === 'featured') {
            $query->where('is_featured', 1);
            if (empty($viewAllUrl)) {
                $viewAllUrl = route('shop.index', ['is_featured' => 1]);
            }
        } elseif ($filter === 'sale') {
            $query->whereNotNull('sale_price')
                ->where('sale_price', '>', 0)
                ->whereColumn('sale_price', '<', 'price');
            if (empty($viewAllUrl)) {
                $viewAllUrl = route('shop.index', ['on_sale' => 1]);
            }
        } else {
            $query->latest();
            if (empty($viewAllUrl)) {
                $viewAllUrl = route('shop.index');
            }
        }

        $products = $query->take($limit)->get();

        // Fallback if empty to ensure good presentation
        if ($products->isEmpty()) {
            $products = WkProduct::withoutGlobalScopes()
                ->where(function ($q) use ($projectId) {
                    if ($projectId) {
                        $q->where('project_id', $projectId);
                    }
                })
                ->whereIn('status', ['published', 'active', 1])
                ->latest()
                ->take($limit)
                ->get();
        }

        $icon = $config['icon'] ?? $this->resolveIcon($title, $category?->slug);
        $bannerImage = $config['banner_image'] ?? null;
        if (empty($bannerImage) && $category && ! empty($category->image)) {
            $bannerImage = $category->image;
        }
        $bannerLink = ! empty($config['banner_link']) ? $config['banner_link'] : ($viewAllUrl ?: route('shop.index'));

        return view('widgets.wkcomputer.product_section', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'title' => $title,
            'icon' => $icon,
            'products' => $products,
            'viewAllUrl' => $viewAllUrl ?: route('shop.index'),
            'columns' => $config['columns'] ?? '5',
            'bannerImage' => $bannerImage,
            'bannerLink' => $bannerLink,
        ])->render();
    }

    protected function resolveIcon(string $title, ?string $slug = null): string
    {
        $normalized = mb_strtolower($title.' '.($slug ?? ''));

        if (str_contains($normalized, 'bán chạy') || str_contains($normalized, 'hot') || str_contains($normalized, 'best')) {
            return 'fas fa-fire';
        }
        if (str_contains($normalized, 'pc gaming') || str_contains($normalized, 'streaming')) {
            return 'fas fa-server';
        }
        if (str_contains($normalized, 'cpu') || str_contains($normalized, 'vi xử lý')) {
            return 'fas fa-microchip';
        }
        if (str_contains($normalized, 'vga') || str_contains($normalized, 'card')) {
            return 'fas fa-tv';
        }
        if (str_contains($normalized, 'tản nhiệt') || str_contains($normalized, 'cooling')) {
            return 'fas fa-fan';
        }
        if (str_contains($normalized, 'psu') || str_contains($normalized, 'nguồn')) {
            return 'fas fa-plug';
        }
        if (str_contains($normalized, 'case') || str_contains($normalized, 'vỏ')) {
            return 'fas fa-columns';
        }
        if (str_contains($normalized, 'mainboard') || str_contains($normalized, 'bo mạch')) {
            return 'fas fa-memory';
        }
        if (str_contains($normalized, 'màn hình') || str_contains($normalized, 'monitor')) {
            return 'fas fa-desktop';
        }
        if (str_contains($normalized, 'gear') || str_contains($normalized, 'phím') || str_contains($normalized, 'chuột')) {
            return 'fas fa-gamepad';
        }

        return 'fas fa-boxes-stacked';
    }
}
