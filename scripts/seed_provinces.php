<?php

declare(strict_types=1);

$jsonPath = __DIR__.'/../public/e-henho/js/vietnam_provinces.json';
if (! file_exists($jsonPath)) {
    echo "JSON not found\n";
    exit(1);
}

$data = json_decode(file_get_contents($jsonPath), true);
if (! is_array($data)) {
    echo "Invalid JSON\n";
    exit(1);
}

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=core;charset=utf8mb4', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    $stmt = $pdo->prepare('INSERT INTO ehenho_provinces (code, name, type, created_at, updated_at) VALUES (:code, :name, :type, NOW(), NOW()) ON DUPLICATE KEY UPDATE name = :name2');

    $count = 0;
    foreach ($data as $code => $item) {
        $name = $item['name'] ?? null;
        if ($name) {
            $stmt->execute([
                ':code' => (string) $code,
                ':name' => $name,
                ':type' => $item['type'] ?? 'tinh',
                ':name2' => $name,
            ]);
            $count++;
        }
    }

    echo "Successfully seeded {$count} administrative provinces into `ehenho_provinces`.\n";

} catch (Exception $e) {
    echo 'ERR: '.$e->getMessage()."\n";
}
