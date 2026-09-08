<?php
$html = file_get_contents('http://127.0.0.1:8000/wkcomputer/dat-hang');
if (preg_match_all('/<script\b[^>]*>(.*?)<\/script>/is', $html, $matches)) {
    foreach ($matches[1] as $idx => $script) {
        if (str_contains($script, 'selectPayment')) {
            echo "--- FOUND SCRIPT --- \n";
            echo $script . "\n";
        }
    }
} else {
    echo "No scripts found\n";
}
