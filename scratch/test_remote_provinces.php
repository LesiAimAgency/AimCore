<?php
require __DIR__ . '/../vendor/autoload.php';

$ch = curl_init('http://103.200.23.236/data/provinces.json');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Host: wkcomputer.aimagency.vn']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err = curl_error($ch);
echo "HTTP CODE: " . $code . " ERR: " . $err . " LEN: " . strlen($res) . "\n";
