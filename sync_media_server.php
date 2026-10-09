<?php

use App\Models\Widget;
use Illuminate\Contracts\Console\Kernel;

/**
 * Standalone Media Synchronization Script for Inbetween V2 (Project DA005)
 *
 * Usage:
 * - Browser: https://your-domain.com/sync_media_server.php or /public/sync_media_server.php
 * - Terminal: php public/sync_media_server.php or php sync_media_server.php
 */
$isCli = (php_sapi_name() === 'cli');

// Determine root directory
$possibleRoots = [
    __DIR__,
    dirname(__DIR__),
    dirname(__DIR__, 2),
];

$rootDir = null;
foreach ($possibleRoots as $dir) {
    if (file_exists($dir.'/artisan') && file_exists($dir.'/bootstrap/app.php')) {
        $rootDir = $dir;
        break;
    }
}

if (! $rootDir) {
    $msg = 'Error: Could not locate Laravel root directory containing artisan.';
    if ($isCli) {
        fwrite(STDERR, $msg.PHP_EOL);
    } else {
        echo "<h2 style='color:red;'>$msg</h2>";
    }
    exit(1);
}

// Locate theme images directory
$sourceDir = $rootDir.'/public/themes/inbetween_v2/images';
if (! is_dir($sourceDir)) {
    $sourceDir = $rootDir.'/themes/inbetween_v2/images';
}

$report = [
    'root' => $rootDir,
    'source' => $sourceDir,
    'source_exists' => is_dir($sourceDir),
    'copied_files' => 0,
    'destinations' => [],
    'db_updated' => 0,
    'errors' => [],
];

if (! $report['source_exists']) {
    $msg = "Error: Source images directory not found at: {$sourceDir}";
    if ($isCli) {
        fwrite(STDERR, $msg.PHP_EOL);
    } else {
        echo "<h2 style='color:red;'>$msg</h2>";
    }
    exit(1);
}

// Define target destinations
$targets = [
    $rootDir.'/storage/app/public/media/project-DA005',
    $rootDir.'/storage/app/public/themes/inbetween_v2/images',
    $rootDir.'/public/storage/media/project-DA005',
    $rootDir.'/public/storage/themes/inbetween_v2/images',
];

// Helper to copy directory recursively
function copyDirRecursive($src, $dst, &$fileCount)
{
    if (! is_dir($dst)) {
        @mkdir($dst, 0777, true);
    }
    $dir = opendir($src);
    if (! $dir) {
        return;
    }

    while (false !== ($file = readdir($dir))) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $srcPath = $src.'/'.$file;
        $dstPath = $dst.'/'.$file;
        if (is_dir($srcPath)) {
            copyDirRecursive($srcPath, $dstPath, $fileCount);
        } else {
            if (@copy($srcPath, $dstPath)) {
                $fileCount++;
            }
        }
    }
    closedir($dir);
}

// Copy to all targets
foreach ($targets as $target) {
    $count = 0;
    copyDirRecursive($sourceDir, $target, $count);
    $report['destinations'][] = [
        'path' => $target,
        'count' => $count,
    ];
    $report['copied_files'] += $count;
}

// Try to bootstrap Laravel to update database
try {
    require_once $rootDir.'/vendor/autoload.php';
    $app = require_once $rootDir.'/bootstrap/app.php';
    if (method_exists($app, 'make')) {
        $kernel = $app->make(Kernel::class);
        $kernel->bootstrap();

        // Recursively replace URLs in widget settings
        $replaceUrls = function (&$data) use (&$replaceUrls) {
            if (is_array($data)) {
                foreach ($data as &$val) {
                    $replaceUrls($val);
                }
            } elseif (is_string($data)) {
                if (str_contains($data, 'themes/inbetween_v2/images/')) {
                    $data = str_replace('themes/inbetween_v2/images/', '/storage/themes/inbetween_v2/images/', $data);
                    if (! str_starts_with($data, 'http') && ! str_starts_with($data, '/')) {
                        $data = '/'.ltrim($data, '/');
                    }
                } elseif (str_contains($data, 'storage/media/project-DA005/')) {
                    $data = str_replace('storage/media/project-DA005/', 'storage/themes/inbetween_v2/images/', $data);
                    if (! str_starts_with($data, 'http') && ! str_starts_with($data, '/')) {
                        $data = '/'.ltrim($data, '/');
                    }
                }
            }
        };

        // Find inbetween widgets
        if (class_exists(Widget::class)) {
            $widgets = Widget::withoutGlobalScopes()
                ->where(function ($q) {
                    $q->where('type', 'like', 'inbetween%')
                        ->orWhere('area', 'like', '%inbetween%')
                        ->orWhere('area', 'homepage-main');
                })
                ->get();

            foreach ($widgets as $w) {
                if (is_array($w->settings)) {
                    $before = json_encode($w->settings);
                    $settings = $w->settings;
                    $replaceUrls($settings);
                    $after = json_encode($settings);
                    if ($before !== $after) {
                        $w->settings = $settings;
                        $w->save();
                        $report['db_updated']++;
                    }
                }
            }
        }
    }
} catch (Throwable $e) {
    $report['errors'][] = 'Laravel DB update note: '.$e->getMessage();
}

// Output Results
if ($isCli) {
    echo "========================================\n";
    echo "INBETWEEN V2 MEDIA SYNC COMPLETED\n";
    echo "========================================\n";
    echo "Source Directory: {$report['source']}\n";
    echo "Total files copied across targets: {$report['copied_files']}\n";
    foreach ($report['destinations'] as $dest) {
        echo " -> {$dest['path']} ({$dest['count']} files)\n";
    }
    echo "Widgets updated in DB: {$report['db_updated']}\n";
    if (! empty($report['errors'])) {
        echo "Notes:\n";
        foreach ($report['errors'] as $err) {
            echo " ! {$err}\n";
        }
    }
    echo "Done!\n";
} else {
    header('Content-Type: text/html; charset=utf-8');
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sync Media Inbetween V2 (DA005)</title>
        <style>
            body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0f172a; color: #f8fafc; padding: 32px 16px; margin: 0; }
            .card { max-width: 760px; margin: 0 auto; background: #1e293b; border-radius: 12px; padding: 28px; border: 1px solid #334155; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.5); }
            h1 { margin-top: 0; color: #38bdf8; font-size: 22px; display: flex; align-items: center; gap: 8px; }
            .badge { display: inline-block; padding: 4px 10px; border-radius: 9999px; font-size: 12px; font-weight: 600; background: #059669; color: #ecfdf5; }
            .section { margin-top: 20px; }
            .dest-list { list-style: none; padding: 0; margin: 10px 0; }
            .dest-item { background: #0f172a; padding: 10px 14px; border-radius: 6px; margin-bottom: 8px; font-family: monospace; font-size: 13px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #334155; }
            .btn { display: inline-block; background: #2563eb; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; margin-top: 16px; transition: 0.2s; }
            .btn:hover { background: #1d4ed8; }
            .stats { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 16px; }
            .stat-box { background: #0f172a; padding: 14px; border-radius: 8px; border: 1px solid #334155; }
            .stat-value { font-size: 28px; font-weight: bold; color: #38bdf8; }
            .stat-label { font-size: 12px; color: #94a3b8; text-transform: uppercase; margin-top: 4px; }
        </style>
    </head>
    <body>
        <div class="card">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h1><span>⚡</span> Đồng bộ Media Inbetween V2</h1>
                <span class="badge">THÀNH CÔNG</span>
            </div>
            <p style="color:#94a3b8; font-size:14px; margin-bottom: 20px;">
                Đã sao chép toàn bộ hình ảnh từ thư mục Theme sang Storage và cập nhật đường dẫn trong Database cho dự án <strong>DA005</strong>.
            </p>

            <div class="stats">
                <div class="stat-box">
                    <div class="stat-value"><?= $report['copied_files'] ?></div>
                    <div class="stat-label">Tệp đã đồng bộ sang Storage</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value"><?= $report['db_updated'] ?></div>
                    <div class="stat-label">Widget đã cập nhật trong DB</div>
                </div>
            </div>

            <div class="section">
                <h3 style="font-size:15px; color:#cbd5e1; margin-bottom:8px;">Các thư mục đích đã sao chép:</h3>
                <ul class="dest-list">
                    <?php foreach ($report['destinations'] as $dest) { ?>
                        <li class="dest-item">
                            <span>📁 <?= htmlspecialchars($dest['path']) ?></span>
                            <strong style="color:#38bdf8;"><?= $dest['count'] ?> tệp</strong>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <?php if (! empty($report['errors'])) { ?>
                <div class="section" style="background:#7f1d1d; padding:12px; border-radius:6px;">
                    <strong style="color:#fecaca;">Ghi chú:</strong>
                    <ul style="margin:4px 0 0 16px; color:#fee2e2; font-size:13px;">
                        <?php foreach ($report['errors'] as $err) { ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <div style="margin-top: 24px; display:flex; gap: 12px;">
                <a class="btn" href="/DA005/admin/media/list">Mở Quản lý Media (DA005) &rarr;</a>
                <a class="btn" style="background:#475569;" href="/DA005">Xem trang chủ DA005</a>
            </div>
        </div>
    </body>
    </html>
    <?php
}
