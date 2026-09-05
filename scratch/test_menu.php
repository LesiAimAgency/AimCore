<?php

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$project = Project::where('code', 'viettinmart-eco')->first();

function testGetMenu($area, $projectCode, $projectId)
{
    $currentLocale = 'vi';
    $query = Widget::where('area', $area)->where('is_active', true);
    if ($projectId) {
        $query->where('project_id', $projectId);
    }

    $widget = (clone $query)->where('settings->locale', $currentLocale)->first() ?? $query->first();

    if (! $widget) {
        return [];
    }

    $items = $widget->settings['items'] ?? [];
    foreach ($items as &$item) {
        if (isset($item['url']) && is_string($item['url'])) {
            $url = $item['url'];
            if (! str_starts_with($url, 'http://') &&
                ! str_starts_with($url, 'https://') &&
                ! str_starts_with($url, '//') &&
                ! str_starts_with($url, '#') &&
                ! str_starts_with($url, 'tel:') &&
                ! str_starts_with($url, 'mailto:') &&
                ! str_starts_with($url, 'javascript:')
            ) {
                $trimmed = ltrim($url, '/');
                if (! str_starts_with($trimmed, $projectCode)) {
                    $item['url'] = '/'.$projectCode.($trimmed !== '' ? '/'.$trimmed : '');
                }
            }
        }
    }

    return $items;
}

foreach (['footer-info', 'footer-categories', 'footer-customer-service'] as $slug) {
    echo "=== Menu: $slug ===\n";
    $items = testGetMenu($slug, $project->code, $project->id);
    foreach ($items as $it) {
        echo '  - '.($it['label'] ?? '').' => '.($it['url'] ?? '')."\n";
    }
}
