<?php
$ch = curl_init('http://103.200.23.236/');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "Remote Homepage HTTP: $code (Length: " . strlen($html) . ")\n";
if (str_contains($html, 'wk-service-bar')) {
    echo "PASS: Remote wk-service-bar is live!\n";
} else {
    echo "FAIL: Remote wk-service-bar missing!\n";
}

if (str_contains($html, 'Giao hàng siêu tốc 2h')) {
    echo "PASS: Service items present on remote!\n";
} else {
    echo "FAIL: Service items missing on remote!\n";
}

// Check district API on remote
$chDist = curl_init('http://103.200.23.236/wkcomputer/api/locations/districts/8');
curl_setopt($chDist, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn']);
curl_setopt($chDist, CURLOPT_RETURNTRANSFER, true);
$resDist = curl_exec($chDist);
$codeDist = curl_getinfo($chDist, CURLINFO_HTTP_CODE);
echo "Remote District API HTTP: $codeDist (Response: " . substr($resDist, 0, 80) . "...)\n";

$distJson = json_decode($resDist, true);
if (is_array($distJson) && count($distJson) > 0 && ($distJson[0]['name'] ?? '') === 'Thành phố Tuyên Quang') {
    echo "PASS: Remote District API returns Tuyên Quang districts!\n";
} else {
    echo "FAIL: Remote District API failed!\n";
}
