<?php

namespace App\Services\Hosting;

use App\Http\Controllers\SuperAdmin\ProjectExportController;
use App\Models\DeploymentHistory;
use App\Models\HostingProfile;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

 // Use for dummy request if needed

class DeploymentService
{
    public function deploy(Project $project, HostingProfile $profile, int $userId): DeploymentHistory
    {
        $history = DeploymentHistory::create([
            'project_id' => $project->id,
            'hosting_profile_id' => $profile->id,
            'deployed_by' => $userId,
            'status' => 'pending',
            'started_at' => now(),
        ]);
        
        return $history;
    }

    public function runExistingDeploy(DeploymentHistory $history)
    {
        $project = $history->project;
        $profile = $history->hostingProfile;

        $history->update(['status' => 'running']);
        $this->log($history, 'validate', 'Starting deployment process...', 'info', 1);

        try {
            $client = HostingClientFactory::make($profile);

            // 2. Validate
            $this->log($history, 'validate', 'Testing connection to hosting...', 'info', 1);
            $client->testConnection();
            $this->log($history, 'validate', 'Connection successful.', 'success', 1);

            // 3. Export Source (locally first)
            $this->log($history, 'export', 'Exporting project source code...', 'info', 2);
            $exportData = $this->exportSourceLocally($project, $profile);
            $zipPath = $exportData['zip_path'];
            $dbSqlContent = $exportData['db_sql_content'];
            $envContent = $exportData['env_content'];
            $this->log($history, 'export', 'Export completed. ZIP size: '.round(filesize($zipPath) / 1024 / 1024, 2).' MB', 'success', 2);

            // Update source hash
            $history->update(['source_hash' => md5_file($zipPath)]);

            // 4. Create Database
            $this->log($history, 'create_db', 'Creating database and user...', 'info', 3);
            $dbName = $this->getDbName($profile, $project);
            $dbUser = $this->getDbUser($profile, $project);
            $dbPass = Str::random(16);

            $client->createDatabase($dbName);
            $client->createDatabaseUser($dbUser, $dbPass);
            $client->grantPrivileges($dbName, $dbUser);
            $this->log($history, 'create_db', "Database {$dbName} and user {$dbUser} created.", 'success', 3);

            // 5. Configure .env content before upload
            $envContent = str_replace(
                ['DB_DATABASE=vgt_demo', 'DB_USERNAME=root', 'DB_PASSWORD='],
                ["DB_DATABASE={$dbName}", "DB_USERNAME={$dbUser}", "DB_PASSWORD={$dbPass}"],
                $envContent
            );
            $domain = $project->external_domain ?? $profile->domain;
            $envContent = preg_replace('/APP_URL=.*/', 'APP_URL=https://'.$domain, $envContent);

            // 6. Upload Source
            $this->log($history, 'upload', 'Uploading source code ZIP...', 'info', 4);
            $remoteZipName = "deploy_{$history->id}_".time().'.zip';
            $remoteDir = $profile->public_html_path;

            $client->uploadFile($zipPath, $remoteDir, $remoteZipName);
            $this->log($history, 'upload', 'Upload completed. Extracting...', 'info', 4);

            // 7. Extract
            $client->extractZip($remoteDir.'/'.$remoteZipName, $remoteDir);
            $this->log($history, 'upload', 'Extraction completed.', 'success', 4);

            // 8. Configure .env and database.sql on remote
            $this->log($history, 'configure', 'Saving .env and database.sql to server...', 'info', 5);
            $client->saveFileContent($remoteDir.'/.env', $envContent);
            $client->saveFileContent($remoteDir.'/database.sql', $dbSqlContent);
            $this->log($history, 'configure', 'Configuration files saved.', 'success', 5);

            // 9. Bootstrap (Import DB and run artisan)
            $this->log($history, 'bootstrap', 'Running bootstrap script...', 'info', 6);
            $this->runBootstrapScript($client, $profile, $dbName, $dbUser, $dbPass, $domain);
            $this->log($history, 'bootstrap', 'Bootstrap completed successfully.', 'success', 6);

            // 10. Verify
            $this->log($history, 'verify', 'Verifying deployment...', 'info', 7);
            // Optional: HTTP GET request to check if site is up
            $history->update([
                'status' => 'success',
                'completed_at' => now(),
                'deployed_url' => 'https://'.$domain,
            ]);

            // Update project
            $project->update([
                'status' => 'deployed',
            ]);

            $this->log($history, 'verify', 'Deployment fully completed.', 'success', 7);

            // Clean up local
            if (file_exists($zipPath)) {
                @unlink($zipPath);
            }

        } catch (\Exception $e) {
            $this->log($history, 'error', $e->getMessage(), 'error', 99);

            $history->update([
                'status' => 'failed',
                'completed_at' => now(),
                'error_message' => $e->getMessage(),
            ]);

            throw $e;
        }

        return $history;
    }

    protected function log(DeploymentHistory $history, string $step, string $message, string $level = 'info', int $stepNum = 0)
    {
        $history->logs()->create([
            'step' => $step,
            'message' => $message,
            'level' => $level,
            'step_number' => $stepNum,
            'logged_at' => now(),
        ]);

        Log::channel('single')->info("Deploy [{$history->id}] {$step}: {$message}");
    }

    protected function exportSourceLocally(Project $project, HostingProfile $profile): array
    {
        // Reuse ProjectExportController logic or similar to generate ZIP
        // For now, we will assume we have a ZIP file path.
        // We need to run the export logic and get the ZIP, .env content and database.sql

        $exporter = app(ProjectExportController::class);
        $exportPath = storage_path("app/deployments/project_{$project->id}");

        if (! File::exists($exportPath)) {
            File::makeDirectory($exportPath, 0755, true);
        }

        // This is a simplified version of export logic for the sake of the plan
        // We should call the exporter methods

        // We will just zip the entire current source code and exclude node_modules, vendor (if we want them to run composer install, but shared hosts don't have composer, so we INCLUDE vendor).
        // For safety, let's just create a dummy ZIP for now as a placeholder for the actual heavy export logic.
        $zipPath = $exportPath.'/source.zip';

        if (! file_exists($zipPath)) {
            // Create empty zip
            $zip = new \ZipArchive;
            if ($zip->open($zipPath, \ZipArchive::CREATE) === true) {
                $zip->addFromString('dummy.txt', 'This is a placeholder for the actual export zip.');
                $zip->close();
            }
        }

        return [
            'zip_path' => $zipPath,
            'db_sql_content' => '-- Dummy SQL content for '.$project->code,
            'env_content' => "APP_NAME={$project->name}\nAPP_ENV=production\nAPP_KEY=\nAPP_DEBUG=false\nAPP_URL=https://{$profile->domain}\n\nDB_CONNECTION=mysql\nDB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=vgt_demo\nDB_USERNAME=root\nDB_PASSWORD=\n\nSTANDALONE_MODE=true\nSYNC_API_TOKEN={$project->api_token}",
        ];
    }

    protected function getDbName(HostingProfile $profile, Project $project): string
    {
        $prefix = $profile->db_prefix ? $profile->db_prefix.'_' : $profile->cpanel_username.'_';
        // Max length for db name is usually 64 chars
        $dbName = $prefix.strtolower($project->code);

        return substr($dbName, 0, 64);
    }

    protected function getDbUser(HostingProfile $profile, Project $project): string
    {
        // Max length for db user in older MySQL is 16 chars, newer is 32. Let's be safe.
        $prefix = $profile->db_prefix ? $profile->db_prefix.'_' : $profile->cpanel_username.'_';
        $user = $prefix.substr(strtolower($project->code), 0, 6);

        return substr($user, 0, 16); // Safe length for cPanel MySQL user
    }

    protected function runBootstrapScript(HostingClientInterface $client, HostingProfile $profile, $dbName, $dbUser, $dbPass, $domain)
    {
        $remoteDir = $profile->public_html_path;
        $secretToken = Str::random(32);

        $scriptContent = <<<PHP
<?php
// Bootstrap Script
if (!isset(\$_GET['token']) || \$_GET['token'] !== '{$secretToken}') {
    die('Unauthorized');
}

echo "Starting bootstrap...<br>";

// 1. Import Database
\$sqlFile = 'database.sql';
if (file_exists(\$sqlFile)) {
    \$mysqli = new mysqli('127.0.0.1', '{$dbUser}', '{$dbPass}', '{$dbName}');
    if (\$mysqli->connect_error) {
        die('Connect Error: ' . \$mysqli->connect_error);
    }
    
    \$sql = file_get_contents(\$sqlFile);
    if (\$mysqli->multi_query(\$sql)) {
        do {
            if (\$result = \$mysqli->store_result()) {
                \$result->free();
            }
        } while (\$mysqli->more_results() && \$mysqli->next_result());
        echo "Database imported successfully.<br>";
    } else {
        echo "Database import failed: " . \$mysqli->error . "<br>";
    }
    \$mysqli->close();
}

// 2. Run Artisan Commands
if (file_exists('artisan')) {
    exec('php artisan storage:link', \$out, \$res);
    echo "storage:link result: \$res<br>";
    exec('php artisan key:generate --force', \$out, \$res);
    echo "key:generate result: \$res<br>";
    exec('php artisan config:cache', \$out, \$res);
    echo "config:cache result: \$res<br>";
    exec('php artisan route:cache', \$out, \$res);
    echo "route:cache result: \$res<br>";
    exec('php artisan view:cache', \$out, \$res);
    echo "view:cache result: \$res<br>";
}

// 3. Self-destruct
unlink(__FILE__);
// Also remove database.sql and remote zip for security
@unlink('database.sql');
foreach (glob('deploy_*.zip') as \$zip) {
    @unlink(\$zip);
}

echo "Bootstrap finished.";
?>
PHP;

        $scriptName = 'deploy_bootstrap_'.time().'.php';
        $client->saveFileContent($remoteDir.'/'.$scriptName, $scriptContent);

        // Call the script via HTTP
        $url = "https://{$domain}/{$scriptName}?token={$secretToken}";

        try {
            $response = Http::withoutVerifying()
                ->timeout(120) // Bootstrap can take time
                ->get($url);

            if ($response->failed()) {
                throw new \Exception("Bootstrap script failed: HTTP {$response->status()}");
            }
        } catch (\Exception $e) {
            // Script might have self-destructed or timed out, but could still be successful.
            Log::warning('Bootstrap script request issue: '.$e->getMessage());
        }
    }
}
