<?php

declare(strict_types=1);

$config = [
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'core',
    'username' => 'root',
    'password' => 'root'
];

try {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8mb4";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
    echo "DB_CONNECTED: Found " . count($tables) . " tables in database `core`.\n\n";

    $tableDetails = [];
    foreach ($tables as $table) {
        $cols = $pdo->query("SHOW COLUMNS FROM `{$table}`")->fetchAll();
        $colNames = array_column($cols, 'Field');
        $hasProjectId = in_array('project_id', $colNames);
        $hasTenantId = in_array('tenant_id', $colNames);

        $tableDetails[$table] = [
            'columns_count' => count($cols),
            'has_project_id' => $hasProjectId,
            'has_tenant_id' => $hasTenantId,
            'primary_key' => array_values(array_filter($cols, fn($c) => $c['Key'] === 'PRI'))[0]['Field'] ?? 'unknown',
            'sample_columns' => array_slice($colNames, 0, 10)
        ];
    }

    $outPath = __DIR__ . '/../data/live-database-inspection.json';
    file_put_contents($outPath, json_encode($tableDetails, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    echo "Wrote live database inspection to data/live-database-inspection.json\n";

} catch (PDOException $e) {
    echo "DB_CONNECTION_FAILED: " . $e->getMessage() . "\n";
}
