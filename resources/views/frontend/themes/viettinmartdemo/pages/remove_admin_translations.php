<?php

/**
 * Script để bỏ hết translation functions trong admin views
 * Thay thế {{ __('common.xxx') }} bằng text tiếng Việt tương ứng
 */

// Mapping từ translation keys sang text tiếng Việt
$translations = [
    "__('common.categories')" => 'Danh mục',
    "__('common.products')" => 'Sản phẩm',
    "__('common.showing')" => 'Hiển thị',
    "__('common.edit')" => 'Sửa',
    "__('common.delete')" => 'Xóa',
    "__('common.save')" => 'Lưu',
    "__('common.view')" => 'Xem',
    "__('common.of')" => 'của',
    "__('common.basic')" => 'Cơ bản',
    "__('common.content')" => 'Nội dung',
    "__('common.seo')" => 'SEO',
    "__('common.add_to_cart')" => 'Thêm vào giỏ',
    "__('common.contact')" => 'Liên hệ',
    "__('common.home')" => 'Trang chủ',
    "__('common.shop')" => 'Cửa hàng',
    "__('common.blog')" => 'Blog',
    "__('common.news')" => 'Tin tức',
    "__('common.back')" => 'Quay lại',
    "__('common.loading')" => 'Đang tải...',
    "__('common.error')" => 'Lỗi',
    "__('common.success')" => 'Thành công',
    "__('common.in_stock')" => 'Còn hàng',
    "__('common.out_of_stock')" => 'Hết hàng',
    "__('common.sort_default')" => 'Mặc định',
    "__('common.register')" => 'Đăng ký',
    "__('common.info')" => 'Thông tin',
    "__('common.results')" => 'kết quả',
];

function scanAdminDirectory($dir)
{
    $files = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->getExtension() === 'php' && strpos($file->getPathname(), '.blade.php') !== false) {
            $files[] = $file->getPathname();
        }
    }

    return $files;
}

function removeTranslationsFromFile($filePath, $translations)
{
    $content = file_get_contents($filePath);
    $originalContent = $content;
    $fixes = 0;

    foreach ($translations as $translationKey => $vietnameseText) {
        // Pattern 1: {{ __('common.xxx') }}
        $pattern1 = '/\{\{\s*'.preg_quote($translationKey, '/').'\s*\}\}/';
        if (preg_match($pattern1, $content)) {
            $content = preg_replace($pattern1, $vietnameseText, $content);
            $fixes++;
        }

        // Pattern 2: @json(__('common.xxx'))
        $pattern2 = '/@json\(\s*'.preg_quote($translationKey, '/').'\s*\)/';
        if (preg_match($pattern2, $content)) {
            $content = preg_replace($pattern2, "'".addslashes($vietnameseText)."'", $content);
            $fixes++;
        }

        // Pattern 3: ' . __('common.xxx') . '
        $pattern3 = "/'\s*\.\s*".preg_quote($translationKey, '/')."\s*\.\s*'/";
        if (preg_match($pattern3, $content)) {
            $content = preg_replace($pattern3, $vietnameseText, $content);
            $fixes++;
        }

        // Pattern 4: " . __('common.xxx') . "
        $pattern4 = '/"\s*\.\s*'.preg_quote($translationKey, '/').'\s*\.\s*"/';
        if (preg_match($pattern4, $content)) {
            $content = preg_replace($pattern4, $vietnameseText, $content);
            $fixes++;
        }
    }

    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "Removed $fixes translations from: $filePath\n";

        return $fixes;
    }

    return 0;
}

// Main execution
$adminDir = 'resources/views/admin';
if (! is_dir($adminDir)) {
    echo "Admin views directory not found: $adminDir\n";
    exit(1);
}

$files = scanAdminDirectory($adminDir);
$totalFixes = 0;

echo 'Scanning '.count($files)." admin Blade files...\n\n";

foreach ($files as $file) {
    $fixes = removeTranslationsFromFile($file, $translations);
    $totalFixes += $fixes;
}

echo "\nCompleted! Total translations removed: $totalFixes\n";

if ($totalFixes > 0) {
    echo "\nAll translation functions in admin have been replaced with Vietnamese text.\n";
}
