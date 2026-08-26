<?php

$files = [
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php',
    'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php',
];

foreach ($files as $f) {
    if (file_exists($f)) {
        $content = file_get_contents($f);
        $content = preg_replace('/<\/div>\s*<\/div>\s*@endforeach/s', "</div>\n            @endforeach", $content);
        file_put_contents($f, $content);
        echo "Fixed \$f\n";
    }
}
