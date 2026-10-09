<?php
$dir = __DIR__ . '/resources/views/widgets/inbetween_v2';
foreach (scandir($dir) as $file) {
    if (str_ends_with($file, '.blade.php')) {
        $c = file_get_contents($dir . '/' . $file);
        preg_match_all('#["\'][^"\']*\.(?:png|jpg|jpeg|svg|webp)["\']#i', $c, $m);
        if (!empty($m[0])) {
            echo "$file:\n";
            foreach (array_unique($m[0]) as $img) {
                echo "  $img\n";
            }
        }
    }
}
