<?php

namespace App\Widgets\Kalles;

use App\Models\Product;
use App\Widgets\BaseWidget;

class LookbookWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Lookbook',
            'description' => 'Hiển thị ảnh tĩnh và các điểm ghim (hotspot) sản phẩm',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9zM15 13a3 3 0 11-6 0 3 3 0 016 0z"/>',
            'variants' => ['default' => 'Mặc định'],
            'fields' => [
                ['name' => 'image', 'label' => 'Ảnh Lookbook', 'type' => 'image'],
                [
                    'name' => 'pins',
                    'label' => 'Các điểm ghim (Hotspots)',
                    'type' => 'repeatable',
                    'max' => 5,
                    'fields' => [
                        ['name' => 'product_id', 'label' => 'ID Sản Phẩm', 'type' => 'number'],
                        ['name' => 'pos_top', 'label' => 'Vị trí TOP (%)', 'type' => 'number', 'default' => 50],
                        ['name' => 'pos_left', 'label' => 'Vị trí LEFT (%)', 'type' => 'number', 'default' => 50],
                        ['name' => 'color', 'label' => 'Màu sắc ghim', 'type' => 'color', 'default' => '#000000'],
                    ],
                ],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $image = htmlspecialchars($this->get('image', ''));
        $pins = $this->get('pins', []);

        if (! $image) {
            return '<div class="alert alert-info">Vui lòng tải lên ảnh Lookbook.</div>';
        }

        $pinsHtml = '';
        foreach ($pins as $index => $pin) {
            $productId = $pin['product_id'] ?? null;
            $top = floatval($pin['pos_top'] ?? 50);
            $left = floatval($pin['pos_left'] ?? 50);
            $color = htmlspecialchars($pin['color'] ?? '#000000');

            $productHtml = '';
            if ($productId) {
                $product = Product::find($productId);
                if ($product) {
                    $pImg = $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.jpg');
                    $pTitle = htmlspecialchars($product->name);
                    $pPrice = number_format($product->price ?? 0).' đ';
                    $pUrl = url('/product/'.$product->slug);

                    // Box thông tin sản phẩm bật lên khi hover vào hotspot
                    $productHtml = <<<HTML
                    <div class="kalles-pin-popup position-absolute bg-white shadow-lg p-2 rounded d-none" style="width: 200px; z-index: 10; transform: translate(-50%, -110%); top: -10px; left: 50%;">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{$pImg}" alt="{$pTitle}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded me-2">
                            <div>
                                <a href="{$pUrl}" class="text-dark fs-12 fw-medium text-decoration-none d-block lh-sm mb-1">{$pTitle}</a>
                                <span class="text-danger fs-12 fw-bold">{$pPrice}</span>
                            </div>
                        </div>
                    </div>
HTML;
                }
            }

            $pinsHtml .= <<<HTML
            <div class="position-absolute kalles-pin-container" style="top: {$top}%; left: {$left}%; transform: translate(-50%, -50%);">
                <div class="kalles-pin d-flex align-items-center justify-content-center rounded-circle" style="width: 24px; height: 24px; background-color: {$color}; color: #fff; cursor: pointer; box-shadow: 0 0 0 4px rgba(255,255,255,0.5);">
                    <i class="las la-plus fs-14"></i>
                </div>
                {$productHtml}
            </div>
HTML;
        }

        return <<<HTML
<style>
.kalles-pin-container:hover .kalles-pin-popup { display: block !important; }
.kalles-pin-container .kalles-pin { transition: all 0.3s ease; }
.kalles-pin-container:hover .kalles-pin { transform: scale(1.2); }
</style>
<div class="kalles-lookbook-widget py-5">
    <div class="container">
        <div class="position-relative d-inline-block w-100 max-w-100 overflow-hidden rounded">
            <img src="{$image}" class="img-fluid w-100" alt="Lookbook">
            {$pinsHtml}
        </div>
    </div>
</div>
HTML;
    }
}
