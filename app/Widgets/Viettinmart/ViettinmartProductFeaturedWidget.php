<?php

namespace App\Widgets\Viettinmart;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartProductFeaturedWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        $categories = ['' => '-- Tất cả danh mục --'];
        try {
            if (class_exists(ProductCategory::class)) {
                $cats = ProductCategory::withoutGlobalScopes()
                    ->orderBy('name')
                    ->get();
                foreach ($cats as $cat) {
                    $categories[(string) $cat->id] = $cat->name;
                }
            }
        } catch (\Throwable $e) {
        }

        $productsList = [];
        try {
            if (class_exists(Product::class)) {
                $prods = Product::withoutGlobalScopes()
                    ->orderBy('name')
                    ->take(60)
                    ->pluck('name', 'id')
                    ->toArray();
                foreach ($prods as $id => $name) {
                    $productsList[(string) $id] = $name;
                }
            }
        } catch (\Throwable $e) {
        }

        return [
            'name' => 'Viettinmart Product Featured',
            'description' => 'Hiển thị danh sách sản phẩm theo danh mục, nổi bật, giảm giá (Lưới Grid hoặc Slider)',
            'category' => 'viettinmart',
            'version' => '2.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề khối',
                    'type' => 'text',
                    'default' => 'Sản phẩm nổi bật',
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Tiêu đề phụ / Mô tả ngắn',
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'name' => 'layout',
                    'label' => 'Kiểu hiển thị (Bố cục)',
                    'type' => 'select',
                    'options' => [
                        'slider' => 'Thanh trượt (Slider / Swiper)',
                        'grid' => 'Dạng Lưới (Grid)',
                    ],
                    'default' => 'slider',
                ],
                [
                    'name' => 'source',
                    'label' => 'Nguồn lọc sản phẩm',
                    'type' => 'select',
                    'options' => [
                        'category' => 'Theo danh mục cụ thể',
                        'featured' => 'Sản phẩm nổi bật (Featured)',
                        'sale' => 'Sản phẩm đang giảm giá (On Sale)',
                        'best_selling' => 'Sản phẩm bán chạy / Xem nhiều',
                        'all' => 'Tất cả sản phẩm mới nhất',
                        'manual' => 'Chọn sản phẩm cụ thể thủ công',
                    ],
                    'default' => 'category',
                ],
                [
                    'name' => 'category_id',
                    'label' => 'Chọn danh mục',
                    'type' => 'select',
                    'options' => $categories,
                    'show_if' => ['source' => 'category'],
                    'default' => '',
                ],
                [
                    'name' => 'product_ids',
                    'label' => 'Chọn các sản phẩm cụ thể',
                    'type' => 'select',
                    'multiple' => true,
                    'size' => 6,
                    'options' => $productsList,
                    'show_if' => ['source' => 'manual'],
                    'default' => [],
                ],
                [
                    'name' => 'limit',
                    'label' => 'Tổng số lượng sản phẩm hiển thị',
                    'type' => 'number',
                    'default' => 12,
                ],
                [
                    'name' => 'columns',
                    'label' => 'Số cột hiển thị (Desktop)',
                    'type' => 'radio',
                    'options' => [
                        '2' => '2 cột',
                        '3' => '3 cột',
                        '4' => '4 cột',
                        '5' => '5 cột',
                        '6' => '6 cột',
                    ],
                    'default' => '5',
                ],
                [
                    'name' => 'columns_tablet',
                    'label' => 'Số cột hiển thị (Tablet)',
                    'type' => 'radio',
                    'options' => [
                        '2' => '2 cột',
                        '3' => '3 cột',
                        '4' => '4 cột',
                    ],
                    'default' => '3',
                ],
                [
                    'name' => 'columns_mobile',
                    'label' => 'Số cột hiển thị (Mobile)',
                    'type' => 'radio',
                    'options' => [
                        '1' => '1 cột',
                        '2' => '2 cột',
                    ],
                    'default' => '2',
                ],
                [
                    'name' => 'order_by',
                    'label' => 'Sắp xếp sản phẩm theo',
                    'type' => 'select',
                    'options' => [
                        'latest' => 'Mới nhất',
                        'oldest' => 'Cũ nhất',
                        'price_asc' => 'Giá: Thấp đến Cao',
                        'price_desc' => 'Giá: Cao đến Thấp',
                        'name_asc' => 'Tên: A đến Z',
                        'views_desc' => 'Xem nhiều nhất',
                    ],
                    'default' => 'latest',
                ],
                [
                    'name' => 'show_nav',
                    'label' => 'Nút điều hướng Slider (< >)',
                    'type' => 'select',
                    'options' => [
                        '1' => 'Hiển thị',
                        '0' => 'Ẩn',
                    ],
                    'show_if' => ['layout' => 'slider'],
                    'default' => '1',
                ],
                [
                    'name' => 'autoplay',
                    'label' => 'Tự động trượt (Autoplay)',
                    'type' => 'select',
                    'options' => [
                        '0' => 'Tắt',
                        '1' => 'Bật',
                    ],
                    'show_if' => ['layout' => 'slider'],
                    'default' => '0',
                ],
                [
                    'name' => 'autoplay_delay',
                    'label' => 'Thời gian tự trượt (ms)',
                    'type' => 'number',
                    'show_if' => ['layout' => 'slider'],
                    'default' => 4000,
                ],
                [
                    'name' => 'loop',
                    'label' => 'Vòng lặp vô tận (Loop)',
                    'type' => 'select',
                    'options' => [
                        '1' => 'Bật',
                        '0' => 'Tắt',
                    ],
                    'show_if' => ['layout' => 'slider'],
                    'default' => '1',
                ],
                [
                    'name' => 'show_view_all',
                    'label' => 'Nút "Xem tất cả"',
                    'type' => 'select',
                    'options' => [
                        '0' => 'Ẩn',
                        '1' => 'Hiển thị',
                    ],
                    'default' => '0',
                ],
                [
                    'name' => 'view_all_text',
                    'label' => 'Chữ nút xem tất cả',
                    'type' => 'text',
                    'show_if' => ['show_view_all' => '1'],
                    'default' => 'Xem tất cả',
                ],
                [
                    'name' => 'view_all_link',
                    'label' => 'Đường dẫn nút xem tất cả',
                    'type' => 'text',
                    'show_if' => ['show_view_all' => '1'],
                    'default' => '/shop',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $limit = (int) ($config['limit'] ?? 12);
        $source = $config['source'] ?? 'category';
        $categoryId = $config['category_id'] ?? null;
        $productIds = $config['product_ids'] ?? [];
        $orderBy = $config['order_by'] ?? 'latest';

        // Auto-match category if not explicitly set in category mode
        if (empty($categoryId) && ($source === 'category' || empty($source))) {
            $widgetTitle = $config['title'] ?? '';
            if (! empty($widgetTitle)) {
                $matchedCategory = ProductCategory::withoutGlobalScopes()
                    ->where('name', 'like', '%'.trim($widgetTitle).'%')
                    ->first();
                if ($matchedCategory) {
                    $categoryId = $matchedCategory->id;
                }
            }
        }

        $query = Product::query();

        // Status check
        if (Schema::hasColumn('products', 'status') || Schema::hasColumn('products_enhanced', 'status')) {
            $query->whereIn('status', ['published', 'active', 1]);
        }

        // Filtering by source
        if ($source === 'featured') {
            if (Schema::hasColumn('products', 'is_featured') || Schema::hasColumn('products_enhanced', 'is_featured')) {
                $query->where('is_featured', 1);
            }
        } elseif ($source === 'sale') {
            $query->whereNotNull('sale_price')->where('sale_price', '>', 0);
        } elseif ($source === 'best_selling') {
            if (Schema::hasColumn('products', 'views') || Schema::hasColumn('products_enhanced', 'views')) {
                $query->orderBy('views', 'desc');
            }
        } elseif ($source === 'manual' && ! empty($productIds)) {
            $query->whereIn('id', (array) $productIds);
        } elseif (! empty($categoryId)) {
            $catId = (int) $categoryId;
            $query->where(function ($q) use ($catId) {
                $q->where('product_category_id', $catId)
                    ->orWhereHas('categories', function ($sub) use ($catId) {
                        $sub->where('product_categories.id', $catId);
                    });
            });
        }

        // Ordering
        match ($orderBy) {
            'oldest' => $query->oldest(),
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc' => $query->orderBy('name', 'asc'),
            'views_desc' => $query->orderBy('views', 'desc'),
            default => $query->latest(),
        };

        $products = $query->take($limit)->get();

        return view('widgets.inbetween.viettinmart_product_featured', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'products' => $products,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
