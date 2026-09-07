<?php

$dir = realpath(__DIR__.'/..');
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

$patterns = [
    '/Project::find\(\s*10\s*\)/i',
    '/project_id\s*(=|==|=>)\s*10\b/i',
    '/tenant_id\s*(=|==|=>)\s*3\b/i',
    '/Tenant::find\(\s*3\s*\)/i',
    '/\b10\b.*viettinmart/i',
    '/viettinmart.*10/i',
];

$results = [];

foreach ($iterator as $file) {
    if (! $file->isFile()) {
        continue;
    }
    $path = $file->getPathname();
    if (str_contains($path, 'vendor') || str_contains($path, '.git') || str_contains($path, 'storage')) {
        continue;
    }
    if (! str_ends_with($path, '.php') && ! str_ends_with($path, '.json')) {
        continue;
    }

    $content = file_get_contents($path);
    foreach ($patterns as $pattern) {
        if (preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
            foreach ($matches[0] as $match) {
                // Get line number
                $lineNum = substr_count(substr($content, 0, $match[1]), "\n") + 1;
                $line = explode("\n", $content)[$lineNum - 1] ?? '';
                $results[] = [
                    'file' => str_replace($dir.DIRECTORY_SEPARATOR, '', $path),
                    'line' => $lineNum,
                    'snippet' => trim($line),
                    'match' => $match[0],
                ];
            }
        }
    }
}

echo 'Found '.count($results)." occurrences:\n";
foreach ($results as $r) {
    echo "{$r['file']}:{$r['line']} => {$r['snippet']}\n";
}
