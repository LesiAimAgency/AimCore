<?php

namespace App\Services\Hosting;

use App\Models\HostingProfile;
use App\Services\Hosting\Contracts\HostingClientInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DirectAdminHostingClient implements HostingClientInterface
{
    protected $profile;

    protected $baseUrl;

    protected $username;

    protected $apiToken;

    public function __construct(HostingProfile $profile)
    {
        $this->profile = $profile;
        // DirectAdmin typically uses port 2222
        $port = $profile->port ?: 2222;
        $host = preg_replace('/^https?:\/\//', '', $profile->hostname);
        $host = rtrim($host, '/');
        $this->baseUrl = "https://{$host}:{$port}";
        $this->username = $profile->cpanel_username; // We reuse this field for DA username
        $this->apiToken = $profile->api_token;
    }

    protected function client()
    {
        return Http::withBasicAuth($this->username, $this->apiToken)
            ->withoutVerifying()
            ->timeout(60);
    }

    public function createDatabase(string $dbName, string $dbUser, string $dbPass): array
    {
        // DirectAdmin API to create database
        // CMD_API_DATABASES

        $response = $this->client()->post("{$this->baseUrl}/CMD_API_DATABASES", [
            'action' => 'create',
            'name' => $dbName,
            'user' => $dbUser,
            'passwd' => $dbPass,
            'passwd2' => $dbPass,
        ]);

        if (! $response->successful() || strpos($response->body(), 'error=1') !== false) {
            Log::error('DirectAdmin Create Database Failed', [
                'response' => $response->body(),
            ]);
            throw new \Exception('Failed to create database on DirectAdmin: '.$response->body());
        }

        // DirectAdmin prepends username to db name and user
        $fullDbName = $this->username.'_'.$dbName;
        $fullDbUser = $this->username.'_'.$dbUser;

        return [
            'db_name' => $fullDbName,
            'db_user' => $fullDbUser,
            'db_pass' => $dbPass,
            'db_host' => 'localhost',
        ];
    }

    public function uploadFile(string $localPath, string $remotePath): bool
    {
        // DirectAdmin doesn't have a great API for file uploads like UAPI.
        // It's usually better to use FTP/SFTP for DirectAdmin deployments.
        // Or using CMD_API_FILE_MANAGER (which is complex for binary uploads).

        throw new \Exception('DirectAdmin File Upload via API is not fully supported yet. Please use FTP/SFTP.');
    }

    public function extractZip(string $remoteZipPath, string $extractToPath): bool
    {
        // CMD_API_FILE_MANAGER
        // action=extract&file=/path/to/file.zip&path=/path/to/extract
        throw new \Exception('DirectAdmin Zip Extraction via API is not fully supported yet.');
    }

    public function deleteFile(string $remotePath): bool
    {
        // CMD_API_FILE_MANAGER
        // action=remove&file1=/path/to/file
        throw new \Exception('DirectAdmin File Deletion via API is not fully supported yet.');
    }
}
