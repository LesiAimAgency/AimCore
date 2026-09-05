<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$dirs = [
    __DIR__.'/../resources/views/frontend/themes/viettinmartdemo',
    __DIR__.'/../resources/views/widgets/inbetween',
    __DIR__.'/../resources/views/components',
];

$allKeys = [];

$regexPatterns = [
    "/__\(\s*['\"]([^'\"]+)['\"]\s*[\),]/",
    "/__f\(\s*['\"]([^'\"]+)['\"]\s*[\),]/",
    "/Lang\(\s*['\"]([^'\"]+)['\"]\s*[\),]/",
    "/trans\(\s*['\"]([^'\"]+)['\"]\s*[\),]/",
    "/@lang\(\s*['\"]([^'\"]+)['\"]\s*\)/",
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        continue;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            foreach ($regexPatterns as $pattern) {
                if (preg_match_all($pattern, $content, $matches)) {
                    foreach ($matches[1] as $key) {
                        // Exclude dynamic or invalid strings like variables or empty
                        $key = trim($key);
                        if (! empty($key) && ! str_starts_with($key, '$') && ! str_contains($key, '{')) {
                            $allKeys[$key][] = str_replace(realpath(__DIR__.'/..').DIRECTORY_SEPARATOR, '', $file->getPathname());
                        }
                    }
                }
            }
        }
    }
}

echo 'Total distinct translation keys found in views: '.count($allKeys)."\n\n";

app()->setLocale('vi');

$missingInVi = [];
$translatedInVi = [];

foreach ($allKeys as $key => $occurrences) {
    // Check if translatable
    // If it contains dot, e.g. frontend.foo, test directly
    $translation = __($key);
    $isTranslated = ($translation !== $key);

    // Also check __f
    if (! $isTranslated && function_exists('__f')) {
        $fTrans = __f($key);
        if ($fTrans !== $key) {
            $isTranslated = true;
            $translation = $fTrans;
        }
    }

    // Check if key is actual Vietnamese or text with spaces
    if (str_contains($key, ' ') || preg_match('/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/iu', $key)) {
        // It's already human-readable text
        continue;
    }

    if (! $isTranslated) {
        $missingInVi[$key] = array_unique($occurrences);
    } else {
        $translatedInVi[$key] = $translation;
    }
}

echo 'Missing / untranslated keys in VI ('.count($missingInVi)."):\n";
foreach ($missingInVi as $k => $files) {
    echo "  - {$k} (in: ".implode(', ', array_slice($files, 0, 2)).")\n";
}
