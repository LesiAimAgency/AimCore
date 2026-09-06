<?php

header('Content-Type: text/plain; charset=utf-8');

$root = dirname(__DIR__); // /home/fukkatsu/aimagency.vn
$publicStorage = $root . '/public/storage';
$appPublic = $root . '/storage/app/public';

echo "Root: {$root}\n";
echo "Public Storage: {$publicStorage}\n";
echo "App Public: {$appPublic}\n\n";

if (!file_exists($appPublic)) {
    mkdir($appPublic, 0755, true);
    echo "Created {$appPublic}\n";
}

// 1. Recursive copy from public/storage to storage/app/public if public/storage is a real dir (not symlink)
if (file_exists($publicStorage) && !is_link($publicStorage)) {
    echo "public/storage is a REAL DIRECTORY. Syncing files into storage/app/public...\n";
    
    function copy_recursive($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst, 0755, true);
        while (false !== ($file = readdir($dir))) {
            if ($file != '.' && $file != '..') {
                if (is_dir($src . '/' . $file)) {
                    copy_recursive($src . '/' . $file, $dst . '/' . $file);
                } else {
                    if (!file_exists($dst . '/' . $file)) {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
        }
        closedir($dir);
    }
    
    copy_recursive($publicStorage, $appPublic);
    echo "Sync completed.\n";
    
    // Backup and rename old directory
    $backupDir = $root . '/public/storage_backup_' . time();
    if (rename($publicStorage, $backupDir)) {
        echo "Renamed old directory to: {$backupDir}\n";
    } else {
        echo "ERROR: Could not rename {$publicStorage}\n";
        exit;
    }
} elseif (is_link($publicStorage)) {
    echo "public/storage is already a symlink pointing to: " . readlink($publicStorage) . "\n";
} else {
    echo "public/storage does not exist.\n";
}

// 2. Create symlink
if (!file_exists($publicStorage)) {
    if (function_exists('symlink')) {
        $relTarget = '../storage/app/public';
        $success = @symlink($appPublic, $publicStorage);
        if ($success) {
            echo "SUCCESS: Created symlink {$publicStorage} -> {$appPublic}\n";
        } else {
            echo "WARNING: Absolute symlink failed, trying relative symlink...\n";
            $success = @symlink($relTarget, $publicStorage);
            if ($success) {
                echo "SUCCESS: Created relative symlink {$publicStorage} -> {$relTarget}\n";
            } else {
                echo "ERROR: symlink() failed.\n";
            }
        }
    } else {
        echo "ERROR: symlink() function is disabled in PHP.\n";
    }
}

// 3. Verify user's file
$testFile = $appPublic . '/media/project-viettinmart-eco/1788653317_viettinmart-logo-viettinmart-1-36x36-1778748353.webp';
echo "\nTarget file in storage/app/public exists: " . (file_exists($testFile) ? 'YES' : 'NO') . "\n";

$publicTestFile = $publicStorage . '/media/project-viettinmart-eco/1788653317_viettinmart-logo-viettinmart-1-36x36-1778748353.webp';
echo "Target file through public/storage symlink exists: " . (file_exists($publicTestFile) ? 'YES' : 'NO') . "\n";

