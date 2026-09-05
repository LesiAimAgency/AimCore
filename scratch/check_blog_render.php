<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$req = Request::create('/viettinmart-eco/blog', 'GET');
$resp = $app->handle($req);

echo 'Blog Index Status: '.$resp->getStatusCode()."\n";
$html = $resp->getContent();

// Check if "Giới thiệu về VietTinMart" or "Chính Sách Bảo Mật" is still in the blog list
echo "Contains 'Giới thiệu về VietTinMart': ".(str_contains($html, 'Giới thiệu về VietTinMart') ? 'YES (BUG)' : 'NO (GOOD)')."\n";
echo "Contains 'Chính Sách Bảo Mật': ".(str_contains($html, 'Chính Sách Bảo Mật') ? 'YES (BUG)' : 'NO (GOOD)')."\n";

// Check breadcrumb
preg_match('/<div class="navigator-breadcrumb-wrapper">([\s\S]+?)<\/div>/', $html, $bcMatch);
if ($bcMatch) {
    echo "\nBreadcrumb HTML:\n".trim($bcMatch[1])."\n";
}

// Check first 3 post links in blog list
preg_match_all('/<h3 class="title">\s*([^\n<]+)\s*<\/h3>/', $html, $titles);
preg_match_all('/<a href="([^"]+)" class="thumbnail">/', $html, $links);

echo "\nRendered Posts:\n";
for ($i = 0; $i < count($titles[1]); $i++) {
    echo '  - '.trim($titles[1][$i]).' => Link: '.($links[1][$i] ?? 'N/A')."\n";
}
