<?php

use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$mapping = [
    'Sản phẩm tươi cấp đông chưa sơ chế' => 53,
    'Sản phẩm đã làm sạch' => 54,
    'Ready to Cook' => 55,
    'Ready to Eat' => 56,
];

foreach (Widget::all() as $widget) {
    if (in_array($widget->type, ['vtm_product_featured', 'vtm_prod_featured'])) {
        $settings = is_array($widget->settings) ? $widget->settings : (json_decode($widget->settings ?? '{}', true) ?: []);
        $name = trim($widget->name);

        $catId = null;
        foreach ($mapping as $key => $id) {
            if (stripos($name, $key) !== false || stripos($settings['title'] ?? '', $key) !== false) {
                $catId = $id;
                break;
            }
        }

        if ($catId) {
            $settings['category_id'] = (string) $catId;
            $settings['source'] = 'category';
            $widget->settings = $settings;
            $widget->save();
            echo "Updated widget {$widget->id} ({$widget->name}) with category_id = {$catId}\n";
        } else {
            echo "Widget {$widget->id} ({$widget->name}) - no specific cat mapping\n";
        }
    }
}
