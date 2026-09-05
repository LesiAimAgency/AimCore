<?php

namespace App\Widgets\Viettinmart;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartTopTrendingWidget extends BaseWidget
{
    public $id = 'trending-1';

    public function __construct(array $settings = [], string $variant = 'default')
    {
        parent::__construct($settings, $variant);
        $this->id = 'trending-'.uniqid();
    }

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

        return [
            'name' => 'Viettinmart Top Trending',
            'description' => 'Hiển thị danh sách sản phẩm thịnh hành / xu hướng (Lưới Grid hoặc Slider)',
            'category' => 'viettinmart',
            'version' => '2.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề khối',
                    'type' => 'text',
                    'default' => 'Sản phẩm thịnh hành',
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
                    'name' => 'category_id',
                    'label' => 'Lọc theo danh mục',
                    'type' => 'select',
                    'options' => $categories,
                    'default' => '',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng sản phẩm',
                    'type' => 'number',
                    'default' => 8,
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
                    'default' => '4',
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
                    'label' => 'Sắp xếp theo',
                    'type' => 'select',
                    'options' => [
                        'views_desc' => 'Xem nhiều nhất',
                        'latest' => 'Mới nhất',
                        'price_asc' => 'Giá thấp đến cao',
                        'price_desc' => 'Giá cao đến thấp',
                        'name_asc' => 'Tên A - Z',
                    ],
                    'default' => 'views_desc',
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
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $limit = (int) ($config['limit'] ?? 8);
        $categoryId = $config['category_id'] ?? null;
        $orderBy = $config['order_by'] ?? 'views_desc';

        $query = Product::query();
        if (Schema::hasColumn('products', 'status') || Schema::hasColumn('products_enhanced', 'status')) {
            $query->whereIn('status', ['published', 'active', 1]);
        }

        if (! empty($categoryId)) {
            $catId = (int) $categoryId;
            $query->where(function ($q) use ($catId) {
                $q->where('product_category_id', $catId)
                    ->orWhereHas('categories', function ($sub) use ($catId) {
                        $sub->where('product_categories.id', $catId);
                    });
            });
        }

        match ($orderBy) {
            'latest' => $query->latest(),
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc' => $query->orderBy('name', 'asc'),
            default => (Schema::hasColumn('products', 'views') || Schema::hasColumn('products_enhanced', 'views'))
                ? $query->orderBy('views', 'desc')
                : $query->latest(),
        };

        $products = $query->take($limit)->get();

        return view('widgets.inbetween.viettinmart_top_trending', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'products' => $products,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
