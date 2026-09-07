<?php

namespace App\Widgets\Viettinmart;

use App\Models\Product;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Schema;

class ViettinmartDealFlashWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        $productsList = [];
        try {
            if (class_exists(Product::class)) {
                $pQuery = Product::withoutGlobalScopes();
                $projId = function_exists('current_project') && current_project() ? current_project()->id : (session('current_project_id') ?: null);
                if ($projId && (Schema::hasColumn('products', 'project_id') || Schema::hasColumn('products_enhanced', 'project_id'))) {
                    $pQuery->where('project_id', $projId);
                }
                $prods = $pQuery->orderBy('name')->take(120)->get();
                foreach ($prods as $prod) {
                    $priceText = $prod->sale_price ? number_format($prod->sale_price, 0, ',', '.').'đ' : ($prod->price ? number_format($prod->price, 0, ',', '.').'đ' : '');
                    $productsList[(string) $prod->id] = $prod->name.($priceText ? " ({$priceText})" : '');
                }
            }
        } catch (\Throwable $e) {
        }

        return [
            'name' => 'Viettinmart Deal Flash',
            'description' => 'Hiển thị sản phẩm Big Sale với đồng hồ đếm ngược và banner',
            'category' => 'viettinmart',
            'version' => '2.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề khối',
                    'type' => 'text',
                    'default' => 'Flash Sale Cuối Tuần',
                ],
                [
                    'name' => 'start_date',
                    'label' => 'Thời gian bắt đầu (Picktime)',
                    'type' => 'datetime',
                    'default' => now()->format('Y-m-d\TH:i'),
                    'help' => 'Thời điểm bắt đầu chương trình Flash Sale',
                ],
                [
                    'name' => 'end_date',
                    'label' => 'Thời gian kết thúc (Picktime)',
                    'type' => 'datetime',
                    'default' => now()->addDays(7)->format('Y-m-d\T23:59'),
                    'help' => 'Thời điểm kết thúc và đếm ngược của chương trình',
                ],
                [
                    'name' => 'source',
                    'label' => 'Nguồn sản phẩm',
                    'type' => 'select',
                    'options' => [
                        'sale' => 'Sản phẩm đang giảm giá (Tự động)',
                        'manual' => 'Chọn sản phẩm cụ thể thủ công',
                        'all' => 'Tất cả sản phẩm mới nhất',
                    ],
                    'default' => 'sale',
                ],
                [
                    'name' => 'product_ids',
                    'label' => 'Chọn các sản phẩm Flash Sale',
                    'type' => 'select',
                    'multiple' => true,
                    'size' => 8,
                    'options' => $productsList,
                    'show_if' => ['source' => 'manual'],
                    'help' => 'Chọn các sản phẩm hiển thị trong khối Flash Sale (giữ Ctrl/Cmd để chọn nhiều)',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số sản phẩm tối đa',
                    'type' => 'number',
                    'default' => 6,
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $limit = (int) ($config['limit'] ?? 6);
        $source = $config['source'] ?? 'sale';

        $productIds = $config['product_ids'] ?? [];
        if (! is_array($productIds) && ! empty($productIds)) {
            $productIds = explode(',', (string) $productIds);
        }
        $productIds = array_filter(array_map('trim', (array) $productIds));

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

        if ($source === 'manual' && ! empty($productIds)) {
            $cleanIds = array_map('intval', $productIds);
            $manualQuery = (clone $query)->whereIn('id', $cleanIds);
            if (config('database.default') !== 'sqlite') {
                $manualQuery->orderByRaw('FIELD(id, '.implode(',', $cleanIds).')');
            }
            $products = $manualQuery->take($limit)->get();
        } elseif ($source === 'all') {
            $products = (clone $query)->latest()->take($limit)->get();
        } else {
            // Default: 'sale'
            $saleQuery = clone $query;
            if (Schema::hasColumn($table, 'sale_price')) {
                $saleQuery->whereNotNull('sale_price')->where('sale_price', '>', 0);
            }
            $products = $saleQuery->latest()->take($limit)->get();

            // Fallback to latest project products if no on-sale products
            if ($products->isEmpty()) {
                $products = $query->latest()->take($limit)->get();
            }
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
