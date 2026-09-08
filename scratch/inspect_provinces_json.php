<?php
$data = json_decode(file_get_contents('public/data/provinces.json'), true);
echo "Count: " . count($data) . "\n";
echo "First item keys: " . implode(', ', array_keys($data[0])) . "\n";
echo "First item sample: " . json_encode(array_diff_key($data[0], ['districts' => []]), JSON_UNESCAPED_UNICODE) . "\n";
if (isset($data[0]['districts'])) {
    echo "Districts count: " . count($data[0]['districts']) . "\n";
    echo "First district keys: " . implode(', ', array_keys($data[0]['districts'][0])) . "\n";
}
// Find Tuyen Quang
foreach ($data as $p) {
    if (str_contains($p['name'], 'Tuyên Quang')) {
        echo "Found Tuyen Quang: " . json_encode([
            'name' => $p['name'],
            'code' => $p['code'],
            'districts_count' => count($p['districts'] ?? [])
        ], JSON_UNESCAPED_UNICODE) . "\n";
        break;
    }
}
