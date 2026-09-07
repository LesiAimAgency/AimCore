<?php

use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();
$tenantId = 3;
$projectId = $project ? $project->id : 11;

session([
    'current_tenant_id' => $tenantId,
    'current_project_id' => $projectId,
]);
app()->instance('current_tenant_id', $tenantId);
app()->instance('current_project_id', $projectId);

try {
    $post = Post::posts()
        ->where('slug', '5-cong-thuc-che-bien-ca-hoi-phi-le-don-gian')
        ->with(['author', 'taxonomies', 'translations'])
        ->first();

    echo 'Post found: '.($post ? $post->title : 'null')."\n";
    if ($post) {
        echo 'Author: '.($post->author ? $post->author->name : 'null')."\n";
    }
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
}
