<?php

use App\Models\Project;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

echo "=== DIAGNOSE /viettinmart-eco/sitemap.xml ===\n";
try {
    $req = Request::create('/viettinmart-eco/sitemap.xml', 'GET');
    $res = $app->handle($req);
    echo 'Status: '.$res->getStatusCode()."\n";
    if ($res->getStatusCode() >= 400 && $res->exception) {
        throw $res->exception;
    }
} catch (Throwable $e) {
    echo 'ERROR in /sitemap.xml: '.$e->getMessage()."\n";
    echo '  File: '.$e->getFile().':'.$e->getLine()."\n";
}

echo "\n=== DIAGNOSE PRODUCT DETAIL: /viettinmart-eco/san-pham/tom-the-hl-cap-dong ===\n";
try {
    $req = Request::create('/viettinmart-eco/san-pham/tom-the-hl-cap-dong', 'GET');
    $res = $app->handle($req);
    echo 'Status: '.$res->getStatusCode()."\n";
    if ($res->getStatusCode() >= 400 && $res->exception) {
        throw $res->exception;
    }
} catch (Throwable $e) {
    echo 'ERROR in product detail: '.$e->getMessage()."\n";
    echo '  File: '.$e->getFile().':'.$e->getLine()."\n";
}
