<?php

declare(strict_types=1);

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=core;charset=utf8mb4', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // 1. Check or create Tenant for ehenho
    $tenant = $pdo->query("SELECT id FROM tenants WHERE code = 'ehenho'")->fetch();
    $tenantId = null;
    if ($tenant) {
        $tenantId = (int) $tenant['id'];
        echo "Found existing tenant id={$tenantId}\n";
    } else {
        $stmt = $pdo->prepare('INSERT INTO tenants (name, code, domain, database_name, settings, status, created_at, updated_at) VALUES (:name, :code, :domain, :database_name, :settings, :status, NOW(), NOW())');
        $stmt->execute([
            ':name' => 'eHenho Dating & Social Network',
            ':code' => 'ehenho',
            ':domain' => 'ehenho.local',
            ':database_name' => 'core', // Can point to core (shared) or core_ehenho (isolated)
            ':settings' => json_encode(['theme' => 'ehenho', 'language' => 'vi']),
            ':status' => 'active',
        ]);
        $tenantId = (int) $pdo->lastInsertId();
        echo "Created new tenant id={$tenantId}\n";
    }

    // 2. Check or create Project for ehenho
    $project = $pdo->query("SELECT id FROM projects WHERE code = 'ehenho'")->fetch();
    if ($project) {
        echo "Found existing project id={$project['id']}\n";
    } else {
        $stmt = $pdo->prepare('INSERT INTO projects (tenant_id, name, project_type, is_multi_tenancy, code, subdomain, external_domain, status, deployment_status, created_at, updated_at) VALUES (:tenant_id, :name, :project_type, :is_multi_tenancy, :code, :subdomain, :external_domain, :status, :deployment_status, NOW(), NOW())');
        $stmt->execute([
            ':tenant_id' => $tenantId,
            ':name' => 'eHenho Dating & Social Network',
            ':project_type' => 'website',
            ':is_multi_tenancy' => 1,
            ':code' => 'ehenho',
            ':subdomain' => 'http://127.0.0.1:8000/ehenho',
            ':external_domain' => 'ehenho.local',
            ':status' => 'active',
            ':deployment_status' => 'CONFIGURED',
        ]);
        $projectId = (int) $pdo->lastInsertId();
        echo "Created new project id={$projectId}\n";
    }

} catch (Exception $e) {
    echo 'ERR: '.$e->getMessage()."\n";
}
