<?php
$f = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/yduoc_doctors.blade.php';
$content = file_get_contents($f);
$content = str_replace('BA?C S", D_C S"', 'BÁC SĨ, DƯỢC SĨ', $content);
$content = str_replace('L_NG Y', 'LƯƠNG Y', $content);
file_put_contents($f, $content);

$f2 = 'c:/MAMP/htdocs/yduoc-1/resources/views/widgets/types/yduoc_expert.blade.php';
$content2 = file_get_contents($f2);
$content2 = str_replace('BA?C S", D_C S"', 'BÁC SĨ, DƯỢC SĨ', $content2);
$content2 = str_replace('L_NG Y', 'LƯƠNG Y', $content2);
file_put_contents($f2, $content2);

echo "Fixed encoding\n";
