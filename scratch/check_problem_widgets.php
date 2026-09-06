<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== 1. CHECK VTM_DEAL_FLASH ===\n";
$flash = \App\Models\Widget::where('type', 'vtm_deal_flash')->first();
if ($flash) {
    echo "Settings: " . json_encode($flash->settings) . "\n";
    $inst = new \App\Widgets\Viettinmart\ViettinmartDealFlashWidget($flash->settings);
    // Let's reflect into getProducts or see what it queries
    $ref = new \ReflectionClass($inst);
    if ($ref->hasMethod('getProducts')) {
        $m = $ref->getMethod('getProducts');
        $m->setAccessible(true);
        $prods = $m->invoke($inst);
        echo "Found " . $prods->count() . " products:\n";
        foreach ($prods as $p) {
            echo "  - ID: {$p->id}, name: {$p->name}, featured_image: {$p->featured_image}\n";
        }
    }
}

echo "\n=== 2. CHECK VTM_TOP_TRENDING ===\n";
$trend = \App\Models\Widget::where('type', 'vtm_top_trending')->first();
if ($trend) {
    echo "Settings: " . json_encode($trend->settings) . "\n";
    $inst = new \App\Widgets\Viettinmart\ViettinmartTopTrendingWidget($trend->settings);
    $ref = new \ReflectionClass($inst);
    if ($ref->hasMethod('getProducts')) {
        $m = $ref->getMethod('getProducts');
        $m->setAccessible(true);
        $prods = $m->invoke($inst);
        echo "Found " . $prods->count() . " products:\n";
        foreach ($prods as $p) {
            echo "  - ID: {$p->id}, name: {$p->name}, featured_image: {$p->featured_image}\n";
        }
    }
}

echo "\n=== 3. CHECK VTM_POSTS_LATEST ===\n";
$posts = \App\Models\Widget::where('type', 'vtm_posts_latest')->first();
if ($posts) {
    echo "Settings: " . json_encode($posts->settings) . "\n";
    $inst = new \App\Widgets\Viettinmart\ViettinmartPostsLatestWidget($posts->settings);
    $ref = new \ReflectionClass($inst);
    if ($ref->hasMethod('getPosts')) {
        $m = $ref->getMethod('getPosts');
        $m->setAccessible(true);
        $pList = $m->invoke($inst);
        echo "Found " . $pList->count() . " posts:\n";
        foreach ($pList as $p) {
            echo "  - ID: {$p->id}, title: {$p->title}, featured_image: {$p->featured_image}\n";
        }
    }
}
