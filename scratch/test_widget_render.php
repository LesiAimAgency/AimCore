<?php

use App\Models\Product;
use App\Models\Project;
use App\Models\Widget;
use App\Widgets\WidgetRegistry;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
request()->attributes->set('project', $project);

echo "=== PRODUCTS STATS FOR PROJECT 10 ===\n";
echo 'Total products: '.Product::count()."\n";
echo 'With sale_price: '.Product::whereNotNull('sale_price')->where('sale_price', '>', 0)->count()."\n";
echo 'With is_featured: '.Product::where('is_featured', 1)->count()."\n";

echo "\n=== HOMEPAGE WIDGETS RENDER TEST ===\n";
$widgets = Widget::where('project_id', $project->id)
    ->where('area', 'homepage-main')
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->get();

foreach ($widgets as $w) {
    echo "\n----------------------------------------\n";
    echo "Widget #{$w->id} [{$w->type}] \"{$w->name}\" (Order: {$w->sort_order})\n";
    $settings = $w->settings ?? [];

    try {
        $widgetClass = WidgetRegistry::get($w->type);
        if (! $widgetClass) {
            echo "  ERROR: Widget type '{$w->type}' not found in registry!\n";

            continue;
        }
        $instance = new $widgetClass($settings);
        $html = $instance->render();
        echo '  Rendered HTML length: '.strlen($html)." bytes\n";

        // Count product cards in html
        preg_match_all('/class="[^"]*product-[^"]*"/i', $html, $matches);
        echo '  Product elements count in HTML: '.count($matches[0])."\n";
    } catch (Throwable $e) {
        echo '  EXCEPTION: '.$e->getMessage().' at '.$e->getFile().':'.$e->getLine()."\n";
    }
}
