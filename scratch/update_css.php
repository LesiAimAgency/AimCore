<?php
$files = [
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php',
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php'
];

foreach ($files as $f) {
    if (file_exists($f)) {
        $content = file_get_contents($f);
        $content = str_replace('object-fit: cover;', 'object-fit: contain; padding: 20px; box-sizing: border-box;', $content);
        $content = str_replace('align-items: stretch;', 'align-items: center;', $content);
        file_put_contents($f, $content);
        echo "Fixed CSS in \$f\n";
    }
}
