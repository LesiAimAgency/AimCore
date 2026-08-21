<?php
$f = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php';
$c = file_get_contents($f);
$c = str_replace(
    '{{ asset($post->thumbnail) }}',
    '{{ $post->thumbnail ? asset($post->thumbnail) : asset(\'assets/original/uploads/source/images-(2).jpg\') }}',
    $c
);
file_put_contents($f, $c);
echo "Patched yduoc_doctors.blade.php\n";
