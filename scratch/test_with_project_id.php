<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$projectId = 10;

echo "=== 1. DEAL FLASH WITH PROJECT 10 ===\n";
$w = \App\Models\Widget::where('project_id', $projectId)->where('type', 'vtm_deal_flash')->first();
$settings = $w ? $w->settings : [];
$settings['project_id'] = $projectId;
$inst = new \App\Widgets\Viettinmart\ViettinmartDealFlashWidget($settings);
$html = $inst->render();
preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $html, $m1);
echo "Images in Deal Flash:\n";
foreach ($m1[1] as $src) {
    echo "  - $src\n";
}

echo "\n=== 2. TOP TRENDING WITH PROJECT 10 ===\n";
$w = \App\Models\Widget::where('project_id', $projectId)->where('type', 'vtm_top_trending')->first();
$settings = $w ? $w->settings : [];
$settings['project_id'] = $projectId;
$inst = new \App\Widgets\Viettinmart\ViettinmartTopTrendingWidget($settings);
$html = $inst->render();
preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $html, $m1);
echo "Images in Top Trending:\n";
foreach ($m1[1] as $src) {
    echo "  - $src\n";
}

echo "\n=== 3. LATEST POSTS WITH PROJECT 10 ===\n";
$w = \App\Models\Widget::where('project_id', $projectId)->where('type', 'vtm_posts_latest')->first();
$settings = $w ? $w->settings : [];
$settings['project_id'] = $projectId;
$inst = new \App\Widgets\Viettinmart\ViettinmartPostsLatestWidget($settings);
$html = $inst->render();
preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $html, $m1);
echo "Images in Latest Posts:\n";
foreach ($m1[1] as $src) {
    echo "  - $src\n";
}
