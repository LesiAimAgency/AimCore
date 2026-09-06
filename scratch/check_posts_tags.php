<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$w = \App\Models\Widget::where('project_id', 10)->where('type', 'vtm_posts_latest')->first();
$settings = $w->settings;
$settings['project_id'] = 10;
$inst = new \App\Widgets\Viettinmart\ViettinmartPostsLatestWidget($settings);
$html = $inst->render();
preg_match_all('/<img[^>]+>/i', $html, $matches);
foreach (array_slice($matches[0], 0, 5) as $tag) {
    echo $tag . "\n";
}

$posts = \App\Models\Post::where('project_id', 10)->take(5)->get();
echo "\nPosts in DB for project 10:\n";
foreach ($posts as $p) {
    echo "  - ID: {$p->id}, title: {$p->title}, featured_image: {$p->featured_image}, thumbnail: " . ($p->thumbnail ?? 'N/A') . "\n";
}
