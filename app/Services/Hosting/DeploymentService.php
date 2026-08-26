<?php

namespace App\Services\Hosting;

use App\Models\DeploymentHistory;
use App\Models\HostingProfile;
use App\Models\Project;
use App\Services\Hosting\Contracts\HostingClientInterface;
use App\Services\ProjectExportService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DeploymentService
{
    public function deploy(Project $project, HostingProfile $profile, int $userId): DeploymentHistory
    {
        return DeploymentHistory::create([
            'project_id' => $project->id,
            'hosting_profile_id' => $profile->id,
            'deployed_by' => $userId,
            'status' => 'pending',
            'started_at' => now(),
        ]);
    }

    public function runExistingDeploy(DeploymentHistory $history)
    {
        $project = $history->project;
        $profile = $history->hostingProfile;

        $history->update(['status' => 'running']);
        $this->log($history, 'validate', 'Starting deployment process...', 'info', 1);

        try {
            $client = HostingClientFactory::make($profile);

            // Step 1: Test connection
            $this->log($history, 'validate', 'Testing connection to hosting...', 'info', 1);
            $client->testConnection();
            $this->log($history, 'validate', 'Connection successful.', 'success', 1);

            // Step 2: Export project source code (real ZIP, not dummy)
            $this->log($history, 'export', 'Exporting project source code...', 'info', 2);
            /** @var ProjectExportService $exportService */
            $exportService = app(ProjectExportService::class);
            $exportData = $exportService->buildExportPackage($project, $profile);

            $zipPath = $exportData['zip_path'];
            $dbSqlContent = $exportData['db_sql_content'];
            $envContent = $exportData['env_content'];

            $this->log($history, 'export', 'Export completed. ZIP size: '.round(filesize($zipPath) / 1024 / 1024, 2).' MB', 'success', 2);
            $history->update(['source_hash' => md5_file($zipPath)]);

            // Step 3: Create database + user on cPanel
            $this->log($history, 'create_db', 'Creating database and user...', 'info', 3);
            $dbName = $this->getDbName($profile, $project);
            $dbUser = $this->getDbUser($profile, $project);
            $dbPass = Str::random(16);

            $client->createDatabase($dbName);
            $client->createDatabaseUser($dbUser, $dbPass);
            $client->grantPrivileges($dbName, $dbUser);
            $this->log($history, 'create_db', "Database {$dbName} and user {$dbUser} created.", 'success', 3);

            // Step 4: Substitute real DB credentials + domain into .env
            $domain = $project->external_domain ?? ($profile->domain ?? 'unknown');
            $envContent = str_replace('__DB_DATABASE__', $dbName, $envContent);
            $envContent = str_replace('__DB_USERNAME__', $dbUser, $envContent);
            $envContent = str_replace('__DB_PASSWORD__', $dbPass, $envContent);
            $envContent = preg_replace('/APP_URL=.*/', 'APP_URL=https://'.$domain, $envContent);

            // Step 5: Upload ZIP to cPanel
            $this->log($history, 'upload', 'Uploading source code ZIP...', 'info', 4);
            $remoteZipName = "deploy_{$history->id}_".time().'.zip';
            $remoteDir = $profile->public_html_path;

            $client->uploadFile($zipPath, $remoteDir, $remoteZipName);
            $this->log($history, 'upload', 'Upload completed. Extracting...', 'info', 4);

            // Step 6: Extract ZIP on server
            $client->extractZip($remoteDir.'/'.$remoteZipName, $remoteDir);
            $this->log($history, 'upload', 'Extraction completed.', 'success', 4);

            // Step 7: Save configured .env and database SQL to remote
            $this->log($history, 'configure', 'Saving .env and database.sql to server...', 'info', 5);
            $client->saveFileContent($remoteDir.'/.env', $envContent);
            $client->saveFileContent($remoteDir.'/database/database.sql', $dbSqlContent);
            $this->log($history, 'configure', 'Configuration files saved.', 'success', 5);

            // Step 8: Upload and run bootstrap installer script
            $this->log($history, 'bootstrap', 'Running bootstrap installer script...', 'info', 6);
            $this->runBootstrapScript($client, $profile, $domain, $exportService);
            $this->log($history, 'bootstrap', 'Bootstrap completed.', 'success', 6);

            // Step 9: Mark success
            $this->log($history, 'verify', 'Deployment fully completed.', 'success', 7);
            $history->update([
                'status' => 'success',
                'completed_at' => now(),
                'deployed_url' => 'https://'.$domain,
            ]);
            $project->update(['status' => 'deployed']);

            // Cleanup local ZIP
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

    // =========================================================================
    // HELPERS
    // =========================================================================

    protected function log(DeploymentHistory $history, string $step, string $message, string $level = 'info', int $stepNum = 0): void
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

    protected function getDbName(HostingProfile $profile, Project $project): string
    {
        $prefix = $profile->db_prefix ? $profile->db_prefix.'_' : $profile->cpanel_username.'_';

        return substr($prefix.strtolower($project->code), 0, 64);
    }

    protected function getDbUser(HostingProfile $profile, Project $project): string
    {
        // cPanel MySQL username max length is 16 characters
        $prefix = $profile->db_prefix ? $profile->db_prefix.'_' : $profile->cpanel_username.'_';

        return substr($prefix.substr(strtolower($project->code), 0, 6), 0, 16);
    }

    /**
     * Upload the bootstrap installer PHP script (from ProjectExportService) and
     * invoke it once via HTTP so it can import the database and run artisan commands.
     *
     * The script self-destructs after execution (see ProjectExportService::generateBootstrapInstaller).
     * A one-time secret token prevents unauthorised access.
     *
     * Phase 4 improvement: The installer handles exec()-disabled shared hosting gracefully —
     * it imports the DB and prints manual artisan instructions if exec() is not available.
     */
    protected function runBootstrapScript(
        HostingClientInterface $client,
        HostingProfile $profile,
        string $domain,
        ?ProjectExportService $exportService = null
    ): void {
        $exportService = $exportService ?? app(ProjectExportService::class);
        $remoteDir = $profile->public_html_path;
        $secretToken = Str::random(32);

        // Inject one-time token into the installer script
        $scriptContent = str_replace(
            '__BOOTSTRAP_TOKEN__',
            $secretToken,
            $exportService->generateBootstrapInstaller()
        );

        $scriptName = 'deploy_bootstrap_'.time().'.php';
        $client->saveFileContent($remoteDir.'/'.$scriptName, $scriptContent);

        // Invoke the script via HTTP
        $url = "https://{$domain}/{$scriptName}?token={$secretToken}";

        try {
            $response = Http::withoutVerifying()
                ->timeout(180)
                ->get($url);

            if ($response->successful()) {
                Log::info('Bootstrap output: '.substr($response->body(), 0, 1000));
            } else {
                // The script may have self-destructed before the response was sent;
                // this is expected on some hosts. Log as warning rather than error.
                Log::warning("Bootstrap HTTP {$response->status()} — script may have self-destructed before response completed.");
            }
        } catch (\Exception $e) {
            // Connection reset / timeout is expected if the script self-destructed.
            Log::warning('Bootstrap script HTTP call issue (may be normal): '.$e->getMessage());
        }
    }
}
