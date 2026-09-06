<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$p = \App\Models\Post::where('title', 'like', '%Bí quyết chọn tôm thẻ%')->first();
if ($p) {
    echo "ID: {$p->id}\n";
    echo "project_id: {$p->project_id}\n";
    echo "Raw featured_image: " . var_export($p->getRawOriginal('featured_image'), true) . "\n";
    echo "featured_image attribute: " . var_export($p->featured_image, true) . "\n";
    echo "thumbnail attribute: " . var_export($p->thumbnail ?? null, true) . "\n";
    echo "media_url result: " . var_export(media_url($p->featured_image, 'theme/images/blog/01.jpg'), true) . "\n";
} else {
    echo "Post not found!\n";
}
