<?php

declare(strict_types=1);

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=core;charset=utf8mb4", 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    echo "--- PROJECTS COLUMNS ---\n";
    $cols = $pdo->query("SHOW COLUMNS FROM projects")->fetchAll();
    foreach ($cols as $c) {
        echo "- {$c['Field']} ({$c['Type']})\n";
    }

    echo "\n--- EXISTING PROJECTS ---\n";
    $projects = $pdo->query("SELECT * FROM projects LIMIT 10")->fetchAll();
    print_r($projects);

    echo "\n--- EXISTING TENANTS ---\n";
    $tenants = $pdo->query("SELECT * FROM tenants LIMIT 10")->fetchAll();
    print_r($tenants);

    echo "\n--- PROJECT DOMAINS / SETTINGS (sample) ---\n";
    $tables = $pdo->query("SHOW TABLES LIKE '%project%'")->fetchAll(PDO::FETCH_COLUMN);
    print_r($tables);

} catch (Exception $e) {
    echo "ERR: " . $e->getMessage() . "\n";
}
