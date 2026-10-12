<?php

$zip = new ZipArchive();
if ($zip->open('storage/app/deployments/project_7/source.zip')) {
    $bigFiles = [];
    $folders = [];
    for ($i = 0; $i < $zip->numFiles; $i++) {
        $stat = $zip->statIndex($i);
        $parts = explode('/', $stat['name']);
        $top = $parts[0];
        $folders[$top] = ($folders[$top] ?? 0) + $stat['size'];
        if ($stat['size'] > 5000000) {
            $bigFiles[] = $stat['name'] . ' (' . round($stat['size']/1024/1024, 2) . ' MB)';
        }
    }
    echo "Total files: " . $zip->numFiles . PHP_EOL;
    echo "Folder sizes:\n";
    foreach ($folders as $f => $s) {
        echo " - $f: " . round($s/1024/1024, 2) . " MB\n";
    }
    echo "Big files (>5MB):\n" . implode("\n", array_slice($bigFiles, 0, 20)) . PHP_EOL;
}
