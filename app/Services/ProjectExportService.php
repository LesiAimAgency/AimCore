<?php

namespace App\Services;

use App\Models\HostingProfile;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use ZipArchive;

/**
 * ProjectExportService
 *
 * Central service responsible for building a deployable ZIP package from a Project.
 * Used by both:
 *  - ProjectExportController (manual "Download ZIP" flow)
 *  - DeploymentService (automated "Deploy to Hosting" flow)
 *
 * The package produced is a self-contained Laravel application with:
 *  - All source files (excluding SuperAdmin controllers/routes)
 *  - A CMS-only database snapshot (only whitelist tables, scoped to project)
 *  - A pre-configured .env file
 *  - A bootstrap installer PHP script
 */
class ProjectExportService
{
    /**
     * Build a full export package for a project.
     *
     * Returns an array with:
     *   'zip_path'        => Absolute path to the generated ZIP file
     *   'db_sql_content'  => The SQL content string (for injection into .env step)
     *   'env_content'     => The .env content string (template, DB credentials added by caller)
     *
     * @throws \Exception on any failure
     */
    public function buildExportPackage(Project $project, ?HostingProfile $profile = null): array
    {
        set_time_limit(300);
        ini_set('memory_limit', '1G');

        $exportBaseDir = storage_path("app/deployments/project_{$project->id}");
        $exportSourceDir = $exportBaseDir.'/source';
        $zipPath = $exportBaseDir.'/source.zip';

        // Clean up any previous attempt
        if (File::exists($exportBaseDir)) {
            File::deleteDirectory($exportBaseDir);
        }
        File::makeDirectory($exportSourceDir, 0755, true);

        Log::info("[Export] Starting export for project {$project->code}");

        // 1. Copy source files (minus SuperAdmin)
        $this->exportEssentialFiles($project, $exportSourceDir);
        Log::info('[Export] Source files copied.');

        // 2. Generate CMS-only database SQL
        $dbSqlContent = $this->generateDatabaseSQL($project);
        File::put($exportSourceDir.'/database/database.sql', $dbSqlContent);
        Log::info('[Export] Database SQL generated ('.strlen($dbSqlContent).' bytes).');

        // 3. Generate .env template
        $envContent = $this->generateEnvTemplate($project, $profile);
        File::put($exportSourceDir.'/.env', $envContent);

        // 4. Generate bootstrap installer script
        $bootstrapContent = $this->generateBootstrapInstaller();
        File::put($exportSourceDir.'/deploy_setup.php', $bootstrapContent);

        // 5. ZIP everything
        $this->createZipFromDirectory($exportSourceDir, $zipPath, $project);
        Log::info("[Export] ZIP created at {$zipPath} (".round(filesize($zipPath) / 1024 / 1024, 2).' MB).');

        // Clean up source dir, keep ZIP
        File::deleteDirectory($exportSourceDir);

        return [
            'zip_path' => $zipPath,
            'db_sql_content' => $dbSqlContent,
            'env_content' => $envContent,
        ];
    }

    // =========================================================================
    // SOURCE CODE EXPORT
    // =========================================================================

    private function exportEssentialFiles(Project $project, string $exportPath): void
    {
        $basePath = base_path();

        // Directories to copy verbatim
        $directories = [
            'bootstrap' => 'bootstrap',
            'config' => 'config',
            'database' => 'database',
            'public' => 'public',
            'resources' => 'resources',
            'vendor' => 'vendor',
            'storage/app/public' => 'storage/app/public',
            'storage/framework/cache' => 'storage/framework/cache',
            'storage/framework/sessions' => 'storage/framework/sessions',
            'storage/framework/views' => 'storage/framework/views',
            'storage/logs' => 'storage/logs',
        ];

        foreach ($directories as $source => $dest) {
            $sourcePath = $basePath.'/'.$source;
            if (File::exists($sourcePath)) {
                File::makeDirectory($exportPath.'/'.dirname($dest), 0755, true, true);
                File::copyDirectory($sourcePath, $exportPath.'/'.$dest);
            }
        }

        // Copy /app but strip SuperAdmin
        $this->copyAppWithoutSuperAdmin($basePath, $exportPath);

        // Copy /routes but strip superadmin.php and patch project.php
        $this->copyRoutesWithoutSuperAdmin($basePath, $exportPath);

        // Ensure storage dirs exist
        $storageDirs = [
            'storage/framework/cache/data',
            'storage/framework/testing',
            'storage/app/public',
        ];
        foreach ($storageDirs as $dir) {
            File::makeDirectory($exportPath.'/'.$dir, 0755, true, true);
            File::put($exportPath.'/'.$dir.'/.gitkeep', '');
        }

        // Copy root-level files
        $rootFiles = ['artisan', 'composer.json', 'composer.lock', 'package.json', '.env.example', '.gitignore'];
        foreach ($rootFiles as $file) {
            if (File::exists($basePath.'/'.$file)) {
                File::copy($basePath.'/'.$file, $exportPath.'/'.$file);
            }
        }
    }

    private function copyAppWithoutSuperAdmin(string $basePath, string $exportPath): void
    {
        $appSource = $basePath.'/app';
        $appDest = $exportPath.'/app';

        if (! File::exists($appSource)) {
            return;
        }

        File::copyDirectory($appSource, $appDest);

        // Remove SuperAdmin controllers and middleware
        $superAdminPaths = [
            $appDest.'/Http/Controllers/SuperAdmin',
            $appDest.'/Http/Middleware/SuperAdminMiddleware.php',
        ];

        foreach ($superAdminPaths as $path) {
            if (File::exists($path)) {
                File::isDirectory($path) ? File::deleteDirectory($path) : File::delete($path);
            }
        }
    }

    private function copyRoutesWithoutSuperAdmin(string $basePath, string $exportPath): void
    {
        $routesSource = $basePath.'/routes';
        $routesDest = $exportPath.'/routes';

        if (! File::exists($routesSource)) {
            return;
        }

        File::copyDirectory($routesSource, $routesDest);

        // Remove superadmin.php route file
        $superAdminRoute = $routesDest.'/superadmin.php';
        if (File::exists($superAdminRoute)) {
            File::delete($superAdminRoute);
        }

        // Patch web.php: remove superadmin require
        $webRoute = $routesDest.'/web.php';
        if (File::exists($webRoute)) {
            $content = File::get($webRoute);
            $content = str_replace(
                "require __DIR__.'/superadmin.php';",
                '// SuperAdmin routes removed for standalone deployment',
                $content
            );
            File::put($webRoute, $content);
        }

        // Patch project.php: strip {projectCode} prefix so routes work on standalone domain
        $projectRoute = $routesDest.'/project.php';
        if (File::exists($projectRoute)) {
            $content = File::get($projectRoute);
            $content = str_replace("Route::prefix('{projectCode}')", "Route::prefix('')", $content);
            $content = str_replace("Route::prefix('{projectCode}/admin')", "Route::prefix('admin')", $content);
            $content = str_replace("Route::prefix('{projectCode}/api')", "Route::prefix('api')", $content);
            $content = str_replace("Route::get('/{projectCode}/{slug}'", "Route::get('/{slug}'", $content);
            $content = preg_replace("/->where\s*\(\s*['\"]projectCode['\"]\s*,[^)]+\)/", '', $content);
            File::put($projectRoute, $content);
        }
    }

    // =========================================================================
    // DATABASE SQL EXPORT (CMS WHITELIST ONLY)
    // =========================================================================

    /**
     * CMS-only table whitelist.
     * Only these tables have their schema + project-scoped data exported.
     * Central system tables (projects, tasks, contracts, users, etc.) are NEVER included.
     */
    public function getCmsTableWhitelist(): array
    {
        return [
            // Content
            'posts', 'page_sections', 'taxonomies', 'translations',
            'archive_templates', 'form_submissions',
            // Widgets & Navigation
            'widgets', 'widget_templates', 'menus', 'menu_items',
            // Media / Fonts / Settings
            'fonts', 'settings', 'languages',
            // Users & Roles (project-level)
            'users', 'roles', 'permissions',
            'user_roles', 'user_permissions', 'role_permissions',
            // E-commerce
            'products_enhanced', 'product_categories',
            'product_attribute_values', 'product_attribute_value_mappings',
            'product_variations', 'brands',
            'brand_product', 'product_attribute_product', 'product_category_product',
            'reviews',
            // Orders
            'orders', 'order_items', 'order_status_history',
            // Shipping
            'shipping_carriers', 'shipping_zones', 'shipping_zone_locations',
            'shipping_rules', 'shipping_rule_conditions', 'shipping_rate_versions',
        ];
    }

    public function generateDatabaseSQL(Project $project): string
    {
        $sql = "-- CMS Database snapshot for {$project->name} (Project: {$project->code})\n";
        $sql .= '-- Generated on: '.now()->format('Y-m-d H:i:s')."\n";
        $sql .= "-- NOTE: Only CMS tables are included. Central system tables are excluded.\n\n";
        $sql .= "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40101 SET NAMES utf8mb4 */;\n";
        $sql .= "/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;\n";
        $sql .= "/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;\n";
        $sql .= "/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;\n";
        $sql .= "/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;\n\n";

        $existingTables = array_map(
            fn ($t) => array_values((array) $t)[0],
            DB::select('SHOW TABLES')
        );

        $tablesToExport = array_intersect($this->getCmsTableWhitelist(), $existingTables);

        foreach ($tablesToExport as $table) {
            $sql .= $this->exportTableSQL($table, $project);
        }

        $sql .= "/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;\n";
        $sql .= "/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;\n";
        $sql .= "/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;\n";
        $sql .= "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;\n";

        return $sql;
    }

    private function exportTableSQL(string $table, Project $project): string
    {
        $sql = "-- Table: {$table}\n";

        try {
            $createTable = DB::select("SHOW CREATE TABLE `{$table}`");
            $sql .= "DROP TABLE IF EXISTS `{$table}`;\n";
            $sql .= $createTable[0]->{'Create Table'}.";\n\n";
            $sql .= $this->getTableData($table, $project);
        } catch (\Exception $e) {
            $sql .= "-- Error exporting table {$table}: ".$e->getMessage()."\n\n";
        }

        return $sql."\n";
    }

    private function getTableData(string $table, Project $project): string
    {
        $sql = "-- Data for {$table}\n";
        $columns = Schema::getColumnListing($table);
        $query = DB::table($table);

        // Scope to project
        if (in_array('project_id', $columns)) {
            $query->where('project_id', $project->id);
        } elseif (in_array('tenant_id', $columns)) {
            $query->where('tenant_id', $project->id);
        }
        // Pivot table overrides
        if ($table === 'brand_product' || $table === 'product_attribute_product' || $table === 'product_category_product') {
            $productIds = DB::table('products_enhanced')->where('project_id', $project->id)->pluck('id');
            $query = DB::table($table)->whereIn('product_id', $productIds);
        } elseif ($table === 'user_roles' || $table === 'user_permissions') {
            $userIds = DB::table('users')->where('project_id', $project->id)->pluck('id');
            if ($userIds->isEmpty()) {
                $userIds = DB::table('users')->where('tenant_id', $project->id)->pluck('id');
            }
            $query = DB::table($table)->whereIn('user_id', $userIds);
        } elseif ($table === 'role_permissions') {
            $roleIds = DB::table('roles')->where('project_id', $project->id)->pluck('id');
            if ($roleIds->isEmpty()) {
                $roleIds = DB::table('roles')->where('tenant_id', $project->id)->pluck('id');
            }
            $query = DB::table($table)->whereIn('role_id', $roleIds);
        }

        try {
            $data = $query->get();
            if ($data->isEmpty()) {
                return $sql;
            }

            $sql .= "INSERT INTO `{$table}` VALUES\n";
            $values = [];

            foreach ($data as $row) {
                $rowData = array_map(function ($value) {
                    if (is_null($value)) {
                        return 'NULL';
                    }
                    if (is_numeric($value) && ! is_string($value)) {
                        return $value;
                    }

                    return DB::getPdo()->quote($value);
                }, (array) $row);
                $values[] = '('.implode(', ', $rowData).')';
            }

            $sql .= implode(",\n", $values).";\n";
        } catch (\Exception $e) {
            $sql .= '-- Error exporting data: '.$e->getMessage()."\n";
        }

        return $sql;
    }

    // =========================================================================
    // CONFIG / ENV GENERATION
    // =========================================================================

    /**
     * Generate a .env template with placeholder DB values.
     * The actual DB credentials are substituted by DeploymentService after DB creation.
     */
    public function generateEnvTemplate(Project $project, ?HostingProfile $profile = null): string
    {
        if (empty($project->api_token)) {
            $project->update(['api_token' => bin2hex(random_bytes(32))]);
            $project->refresh();
        }

        $domain = $project->external_domain ?? ($profile?->domain ?? 'your-domain.com');

        return 'APP_NAME="'.$project->name.'"
APP_ENV=production
APP_KEY=base64:'.base64_encode(random_bytes(32)).'
APP_DEBUG=false
APP_URL=https://'.$domain.'

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=__DB_DATABASE__
DB_USERNAME=__DB_USERNAME__
DB_PASSWORD=__DB_PASSWORD__

BROADCAST_CONNECTION=log
CACHE_STORE=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.your-host.com
MAIL_PORT=465
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="hello@'.$domain.'"
MAIL_FROM_NAME="'.$project->name.'"

# Project-specific settings
PROJECT_CODE='.$project->code.'
PROJECT_NAME="'.$project->name.'"

# Remote Sync API – token provided by SuperAdmin
SYNC_API_TOKEN="'.$project->api_token.'"
SUPERADMIN_URL="'.config('app.url').'"

# Standalone mode – website runs independently on its own domain
STANDALONE_MODE=true
';
    }

    // =========================================================================
    // BOOTSTRAP INSTALLER SCRIPT
    // =========================================================================

    /**
     * Generate a PHP installer script that is uploaded alongside the ZIP.
     * It is invoked once via HTTP to import the database and run artisan commands,
     * then self-destructs for security.
     *
     * The token placeholder __BOOTSTRAP_TOKEN__ must be replaced by the caller
     * before uploading the script.
     */
    public function generateBootstrapInstaller(): string
    {
        return <<<'PHP'
<?php
/**
 * Deploy Bootstrap Installer
 * This file self-destructs after successful execution.
 * DO NOT LEAVE THIS FILE ON THE SERVER.
 */

// Token protection – replaced by DeploymentService before upload
$token = '__BOOTSTRAP_TOKEN__';
if (! isset($_GET['token']) || $_GET['token'] !== $token) {
    http_response_code(403);
    die('Forbidden');
}

set_time_limit(300);
echo '<pre>';

// 1. Load .env to get DB credentials
$envPath = __DIR__ . '/.env';
if (! file_exists($envPath)) {
    die('ERROR: .env file not found.');
}

$env = [];
foreach (file($envPath) as $line) {
    $line = trim($line);
    if (str_starts_with($line, '#') || ! str_contains($line, '=')) {
        continue;
    }
    [$key, $value] = explode('=', $line, 2);
    $env[trim($key)] = trim($value, " \t\n\r\0\x0B\"'");
}

$dbHost = $env['DB_HOST'] ?? '127.0.0.1';
$dbName = $env['DB_DATABASE'] ?? '';
$dbUser = $env['DB_USERNAME'] ?? '';
$dbPass = $env['DB_PASSWORD'] ?? '';

echo "Connecting to database {$dbName}...\n";

// 2. Import database SQL
$sqlFile = __DIR__ . '/database/database.sql';
if (file_exists($sqlFile)) {
    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($mysqli->connect_error) {
        die('ERROR: DB connect failed: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');

    // Chunked import – safer than multi_query on large files
    $sql       = file_get_contents($sqlFile);
    $delimiter = ';';
    $statements = explode($delimiter, $sql);

    $imported = 0;
    $errors   = 0;
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (empty($statement) || str_starts_with($statement, '--') || str_starts_with($statement, '/*')) {
            continue;
        }
        if (! $mysqli->query($statement)) {
            echo "  WARN: " . $mysqli->error . "\n";
            $errors++;
        } else {
            $imported++;
        }
    }
    $mysqli->close();
    echo "Database imported: {$imported} statements, {$errors} warnings.\n";
} else {
    echo "WARN: database/database.sql not found, skipping DB import.\n";
}

// 3. Run Artisan commands if exec() is available
if (function_exists('exec')) {
    $php = PHP_BINARY ?: 'php';
    $artisan = __DIR__ . '/artisan';
    if (file_exists($artisan)) {
        $commands = [
            'key:generate --force',
            'storage:link',
            'config:cache',
            'route:cache',
            'view:cache',
        ];
        foreach ($commands as $cmd) {
            exec("{$php} {$artisan} {$cmd} 2>&1", $out, $code);
            echo "artisan {$cmd}: " . ($code === 0 ? 'OK' : 'FAILED') . "\n";
            if (! empty($out)) {
                echo implode("\n", $out) . "\n";
            }
            $out = [];
        }
    }
} else {
    echo "NOTICE: exec() is disabled. Run these commands manually:\n";
    echo "  php artisan key:generate --force\n";
    echo "  php artisan storage:link\n";
    echo "  php artisan config:cache\n";
    echo "  php artisan route:cache\n";
    echo "  php artisan view:cache\n";
}

// 4. Self-destruct for security
echo "\nCleaning up...\n";
@unlink(__FILE__);
foreach (glob(__DIR__ . '/deploy_*.zip') as $zip) {
    @unlink($zip);
}
// Keep database.sql until manually confirmed, then user can delete
// @unlink(__DIR__ . '/database/database.sql');

echo "\n✅ Bootstrap completed. This script has been deleted.\n";
echo '</pre>';
PHP;
    }

    // =========================================================================
    // ZIP
    // =========================================================================

    private function createZipFromDirectory(string $sourceDir, string $zipPath, Project $project): void
    {
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \Exception("Cannot create ZIP at {$zipPath}");
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($sourceDir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            if (! $file->isFile()) {
                continue;
            }
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($sourceDir) + 1);

            // Normalise on Windows
            $relativePath = str_replace('\\', '/', $relativePath);

            $zip->addFile($filePath, $relativePath);
        }

        $zip->close();
    }
}
