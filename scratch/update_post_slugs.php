<?php

use App\Models\Post;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

DB::table('posts')->where('id', 21)->update(['slug' => 'inbetween-gioi-thieu']);
DB::table('posts')->where('id', 57)->update(['slug' => 'gioi-thieu']);

$p57 = Post::withoutGlobalScopes()->find(57);
DB::table('posts')->whereIn('id', [50, 51, 52, 53, 54])->delete();
echo "Deleted duplicate posts 50-54\n";
