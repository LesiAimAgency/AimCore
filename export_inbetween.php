<?php

declare(strict_types=1);

/**
 * Script Xuất Dự Án INBETWEEN V2 (DA005) Độc Lập
 *
 * Cách chạy trên Host / VPS / Terminal cPanel / Local:
 *   php export_inbetween.php
 *
 * Hoặc sử dụng lệnh Artisan chuẩn:
 *   php artisan project:export DA005
 */

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

use App\Core\Theme\ThemeManager;
use App\Models\Project;
use App\Services\ProjectExportService;
use Illuminate\Contracts\Console\Kernel;

echo "\n=======================================================\n";
echo "   TIẾN TRÌNH XUẤT DỰ ÁN INBETWEEN V2 (DA005) ĐỘC LẬP\n";
echo "=======================================================\n\n";

$project = Project::where('code', 'DA005')
    ->orWhere('code', 'inbetween_v2')
    ->first();

if (! $project) {
    echo "❌ Lỗi: Không tìm thấy dự án DA005 trong hệ thống!\n";
    exit(1);
}

echo '✓ Đã tìm thấy dự án: '.$project->name." (ID: {$project->id}, Code: {$project->code})\n";
echo "✓ Bắt đầu tiến trình trích xuất database & source code...\n";

$startTime = microtime(true);
$exportService = app(ProjectExportService::class);
$themeManager = app(ThemeManager::class);
$themeManager->setActiveTheme('inbetween_v2');

$features = is_array($project->features) ? $project->features : [];
$features['theme'] = 'inbetween_v2';
$project->features = $features;

try {
    // Xuất gói ZIP chuẩn standalone với theme bắt buộc inbetween_v2
    $result = $exportService->buildExportPackage($project, null, false, 'inbetween_v2');
    $duration = round(microtime(true) - $startTime, 2);
    $zipPath = $result['zip_path'];
    $zipSize = round(filesize($zipPath) / 1024 / 1024, 2);

    echo "\n🎉 XUẤT DỰ ÁN THÀNH CÔNG! (Thời gian: {$duration}s)\n";
    echo "-------------------------------------------------------\n";
    echo "📦 Đường dẫn file ZIP: {$zipPath}\n";
    echo "📊 Dung lượng file:    {$zipSize} MB\n";
    echo "🗄️ Database đính kèm:  database/database.sql (trong file zip)\n";
    echo "⚙️ Cấu hình .env:      .env (đã tạo sẵn trong file zip)\n";
    echo "-------------------------------------------------------\n";
    echo "💡 Bạn có thể tải file ZIP này về và giải nén vào thư mục web\n";
    echo "   (ví dụ: c:\\MAMP\\htdocs\\inbetween_v2) để chạy độc lập!\n\n";

} catch (Throwable $e) {
    echo "\n❌ Lỗi trong quá trình xuất: ".$e->getMessage()."\n";
    echo $e->getTraceAsString()."\n";
    exit(1);
}
