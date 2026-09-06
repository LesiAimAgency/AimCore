<?php

namespace App\Widgets\Viettinmart;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartProductTabsWidget extends BaseWidget
{
    public $id = 'product-tabs-1';

    public function __construct(array $settings = [], string $variant = 'default')
    {
        parent::__construct($settings, $variant);
        $this->id = 'product-tabs-'.uniqid();
    }

    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Product Tabs',
            'description' => 'Hiển thị sản phẩm chia theo các Tab danh mục',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề',
                    'type' => 'text',
                    'default' => 'Sản phẩm bán chạy trong tuần',
                ],
                [
                    'name' => 'columns',
                    'label' => 'Số cột (Desktop)',
                    'type' => 'select',
                    'options' => ['4' => '4 cột', '5' => '5 cột', '6' => '6 cột'],
                    'default' => '5',
                ],
                [
                    'name' => 'tabs',
                    'label' => 'Danh sách Tab',
                    'type' => 'repeatable',
                    'fields' => [
                        ['name' => 'label', 'label' => 'Tên Tab', 'type' => 'text'],
                        ['name' => 'category_id', 'label' => 'Danh mục', 'type' => 'select'],
                        ['name' => 'filter', 'label' => 'Bộ lọc', 'type' => 'text'],
                    ],
                    'default' => [
                        ['label' => 'Tất cả'],
                        ['label' => 'Thực phẩm tươi'],
                        ['label' => 'Rau củ quả'],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $tabs = $config['tabs'] ?? [
            ['label' => 'Tất cả'],
            ['label' => 'Thực phẩm tươi'],
            ['label' => 'Rau củ quả'],
        ];

        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : null)
            ?? (session('current_project_id') ?: null);

        $tabProducts = [];
        $table = (new Product)->getTable();
        $baseQuery = Product::query();

        if ($projectId && (Schema::hasColumn($table, 'project_id') || Schema::hasColumn('products_enhanced', 'project_id'))) {
            $baseQuery->where('project_id', $projectId);
        }

        if (Schema::hasColumn($table, 'status')) {
            $baseQuery->whereIn('status', ['published', 'active', 1]);
        }
        $allProducts = (clone $baseQuery)->latest()->take((int) ($config['limit'] ?? 10))->get();

        foreach ($tabs as $i => $tab) {
            $catIds = (array) ($tab['category_id'] ?? []);
            $catIds = array_filter(array_map('intval', $catIds));

            // Validate that these catIds actually belong to this project
            if (! empty($catIds) && $projectId) {
                $validCatCount = ProductCategory::withoutGlobalScopes()
                    ->where('project_id', $projectId)
                    ->whereIn('id', $catIds)
                    ->count();
                if ($validCatCount === 0) {
                    $catIds = []; // clear to trigger name/slug matching below
                }
            }

            $filter = $tab['filter'] ?? 'latest';

            $tabQuery = clone $baseQuery;

            if (! empty($catIds)) {
                $tabQuery->where(function ($q) use ($catIds) {
                    $q->whereIn('product_category_id', $catIds)
                        ->orWhereHas('categories', function ($sub) use ($catIds) {
                            $sub->whereIn('product_categories.id', $catIds);
                        });
                });
            } elseif (! empty($tab['label']) && $tab['label'] !== 'Tất cả') {
                $matchedCat = ProductCategory::withoutGlobalScopes()
                    ->when($projectId, fn($q) => $q->where('project_id', $projectId))
                    ->where(function ($q) use ($tab) {
                        $q->where('name', 'like', '%'.trim($tab['label']).'%')
                          ->orWhere('slug', 'like', '%'.\Illuminate\Support\Str::slug($tab['label']).'%');
                    })
                    ->first();
                if ($matchedCat) {
                    $tabQuery->where('product_category_id', $matchedCat->id);
                }
            }

            if ($filter === 'best_selling' && Schema::hasColumn($table, 'views')) {
                $tabQuery->orderByDesc('views')->latest();
            } else {
                $tabQuery->latest();
            }

            $limit = (int) ($config['limit'] ?? 8);
            $prods = $tabQuery->take($limit)->get();

            $tabProducts[$i] = $prods->isNotEmpty() ? $prods : $allProducts;
        }

        return view('widgets.inbetween.viettinmart_product_tabs', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'tabProducts' => $tabProducts,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
