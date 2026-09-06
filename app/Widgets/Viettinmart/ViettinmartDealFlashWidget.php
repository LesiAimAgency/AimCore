<?php

namespace App\Widgets\Viettinmart;

use App\Models\Product;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartDealFlashWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Deal Flash',
            'description' => 'Hiển thị sản phẩm Big Sale với đồng hồ đếm ngược và banner',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề',
                    'type' => 'text',
                    'default' => 'Flash Sale Cuối Tuần',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số sản phẩm hiển thị',
                    'type' => 'number',
                    'default' => 6,
                ],
                [
                    'name' => 'end_date',
                    'label' => 'Thời gian kết thúc',
                    'type' => 'text',
                    'default' => '12/31/2026 23:59:59',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $limit = (int) ($config['limit'] ?? 6);

        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : null)
            ?? (session('current_project_id') ?: null);

        $table = (new Product)->getTable();
        $query = Product::query();

        if ($projectId && (Schema::hasColumn($table, 'project_id') || Schema::hasColumn('products_enhanced', 'project_id'))) {
            $query->where('project_id', $projectId);
        }

        if (Schema::hasColumn($table, 'status')) {
            $query->whereIn('status', ['published', 'active', 1]);
        }

        $saleQuery = clone $query;
        if (Schema::hasColumn($table, 'sale_price')) {
            $saleQuery->whereNotNull('sale_price')->where('sale_price', '>', 0);
        }

        $products = $saleQuery->latest()->take($limit)->get();

        // Fallback to latest project products if no on-sale products
        if ($products->isEmpty()) {
            $products = $query->latest()->take($limit)->get();
        }

        return view('widgets.inbetween.viettinmart_deal_flash', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'products' => $products,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
