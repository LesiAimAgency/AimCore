<?php

use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

// Update page 57 title
$p57 = Post::find(57);
if ($p57 && $p57->project_id == $project->id) {
    $p57->update([
        'title' => 'Giới thiệu về VietTinMart',
    ]);
    echo "Updated page 57 title to 'Giới thiệu về VietTinMart'\n";
}

// Update page 61 slug to match footer-links url /chinh-sach-giao-hang
$p61 = Post::find(61);
if ($p61 && $p61->project_id == $project->id) {
    // Check if chinh-sach-giao-hang is used
    $existing = Post::where('slug', 'chinh-sach-giao-hang')->first();
    if (! $existing) {
        $p61->update(['slug' => 'chinh-sach-giao-hang']);
        echo "Updated page 61 slug to 'chinh-sach-giao-hang'\n";
    }
}
