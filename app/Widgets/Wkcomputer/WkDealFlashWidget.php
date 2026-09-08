<?php

namespace App\Widgets\Wkcomputer;

use App\Models\Wkcomputer\WkProduct;
use App\Widgets\BaseWidget;
use Carbon\Carbon;

class WkDealFlashWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'WK Deal Flash / Flash Sale',
            'description' => 'Khối Flash Sale đếm ngược với danh sách sản phẩm giảm giá',
            'category' => 'wkcomputer',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề Flash Sale',
                    'type' => 'text',
                    'default' => 'Flash Sale Gaming Gear',
                ],
                [
                    'name' => 'start_date',
                    'label' => 'Thời gian bắt đầu',
                    'type' => 'datetime',
                    'default' => '',
                ],
                [
                    'name' => 'end_date',
                    'label' => 'Thời gian kết thúc',
                    'type' => 'datetime',
                    'default' => '',
                ],
                [
                    'name' => 'limit',
                    'label' => 'Số lượng sản phẩm',
                    'type' => 'number',
                    'default' => 6,
                ],
                [
                    'name' => 'product_ids',
                    'label' => 'ID sản phẩm chỉ định (phân tách bằng dấu phẩy)',
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'name' => 'source',
                    'label' => 'Nguồn sản phẩm',
                    'type' => 'select',
                    'options' => [
                        'sale' => 'Sản phẩm đang giảm giá',
                        'featured' => 'Sản phẩm nổi bật',
                        'latest' => 'Sản phẩm mới nhất',
                    ],
                    'default' => 'sale',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : 14);

        $limit = max(1, (int) ($config['limit'] ?? 6));

        $query = WkProduct::withoutGlobalScopes()
            ->where(function ($q) use ($projectId) {
                if ($projectId) {
                    $q->where('project_id', $projectId);
                }
            })
            ->whereIn('status', ['published', 'active', 1]);

        if (! empty($config['product_ids'])) {
            $ids = is_array($config['product_ids'])
                ? $config['product_ids']
                : explode(',', (string) $config['product_ids']);
            $ids = array_filter(array_map('trim', $ids));
            if (! empty($ids)) {
                $query->whereIn('id', $ids);
            }
        } else {
            $source = $config['source'] ?? 'sale';
            if ($source === 'featured') {
                $query->where('is_featured', 1);
            } elseif ($source === 'sale') {
                $query->whereNotNull('sale_price')
                    ->where('sale_price', '>', 0)
                    ->whereColumn('sale_price', '<', 'price');
            }
        }

        $products = $query->latest()->take($limit)->get();

        // Fallback if empty
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

        $endDateStr = $config['end_date'] ?? null;
        try {
            $endDate = $endDateStr ? Carbon::parse($endDateStr) : now()->addDays(7);
        } catch (\Throwable) {
            $endDate = now()->addDays(7);
        }
        $endTimestamp = $endDate->timestamp * 1000;

        return view('widgets.wkcomputer.deal_flash', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'title' => $config['title'] ?? 'Flash Sale Gaming Gear',
            'products' => $products,
            'endTimestamp' => $endTimestamp,
            'endDate' => $endDate,
        ])->render();
    }
}
