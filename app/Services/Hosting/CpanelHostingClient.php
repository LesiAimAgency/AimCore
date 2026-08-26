<?php

namespace App\Services\Hosting;

use App\Models\HostingProfile;
use App\Services\Hosting\Contracts\HostingClientInterface;
use Illuminate\Support\Facades\Http;

class CpanelHostingClient implements HostingClientInterface
{
    protected HostingProfile $profile;

    public function setProfile(HostingProfile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Call cPanel UAPI
     */
    protected function callUapi(string $module, string $function, array $params = [], string $method = 'GET')
    {
        $host = preg_replace('/^https?:\/\//', '', $this->profile->hostname);
        $host = rtrim($host, '/');
        $port = $this->profile->port ?: 2083;

        $url = "https://{$host}:{$port}/execute/{$module}/{$function}";

        $request = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'cpanel '.trim($this->profile->cpanel_username).':'.trim($this->profile->api_token),
            ])
            ->timeout(60);

        $response = strtoupper($method) === 'POST'
            ? $request->asForm()->post($url, $params)
            : $request->get($url, $params);

        if ($response->failed()) {
            throw new \Exception("cPanel UAPI Error ({$module}::{$function}): HTTP {$response->status()} - {$response->body()}");
        }

        $rawBody = $response->body();
        // Remove UTF-8 BOM if present
        $rawBody = preg_replace('/^'.pack('H*', 'EFBBBF').'/', '', $rawBody);

        $responseData = json_decode($rawBody, true);

        if (! is_array($responseData)) {
            $rawSample = substr($rawBody, 0, 500);
            throw new \Exception('cPanel UAPI Error: Invalid JSON response format from server. JSON Error: '.json_last_error_msg().'. Raw response: '.$rawSample);
        }

        // Some versions/endpoints of UAPI wrap the response in 'result', others return it directly at the root.
        $result = $responseData['result'] ?? $responseData;

        // Check for API-level errors
        if (isset($result['status']) && $result['status'] === 0) {
            $errors = $result['errors'] ?? ['Unknown API error'];
            $errorMsg = is_array($errors) ? implode(', ', $errors) : $errors;
            throw new \Exception("cPanel UAPI Error ({$module}::{$function}): ".$errorMsg);
        }

        return $result['data'] ?? true;
    }

    public function testConnection(): array
    {
        try {
            // Retrieve domain information to verify connection and provide meaningful data
            $data = $this->callUapi('DomainInfo', 'list_domains');

            $domains = [];
            if (isset($data['main_domain'])) {
                $domains[] = $data['main_domain'];
            }
            if (isset($data['addon_domains'])) {
                $domains = array_merge($domains, $data['addon_domains']);
            }

            return [
                'status' => 'success',
                'domains' => $domains,
                'message' => 'Connected successfully to cPanel.',
            ];
        } catch (\Exception $e) {
            throw new \Exception('Connection test failed: '.$e->getMessage());
        }
    }

    public function createDatabase(string $dbName): bool
    {
        $this->callUapi('Mysql', 'create_database', [
            'name' => $dbName,
        ]);

        return true;
    }

    public function createDatabaseUser(string $dbUser, string $password): bool
    {
        $this->callUapi('Mysql', 'create_user', [
            'name' => $dbUser,
            'password' => $password,
        ]);

        return true;
    }

    public function grantPrivileges(string $dbName, string $dbUser): bool
    {
        $this->callUapi('Mysql', 'set_privileges_on_database', [
            'database' => $dbName,
            'user' => $dbUser,
            'privileges' => 'ALL PRIVILEGES',
        ]);

        return true;
    }

    public function uploadFile(string $localPath, string $remoteDir, string $remoteFileName): bool
    {
        $host = preg_replace('/^https?:\/\//', '', $this->profile->hostname);
        $host = rtrim($host, '/');
        $port = $this->profile->port ?: 2083;
        $url = "https://{$host}:{$port}/execute/Fileman/upload_files";

        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'cpanel '.trim($this->profile->cpanel_username).':'.trim($this->profile->api_token),
            ])
            ->timeout(300) // Upload can take time
            ->attach(
                'file-1', file_get_contents($localPath), $remoteFileName
            )
            ->post($url, [
                'dir' => $remoteDir,
            ]);

        if ($response->failed()) {
            throw new \Exception("cPanel File Upload Error: HTTP {$response->status()} - {$response->body()}");
        }

        $responseData = $response->json();

        if (! is_array($responseData)) {
            $rawBody = substr($response->body(), 0, 500);
            throw new \Exception('cPanel File Upload Error: Invalid response format from server. Raw response: '.$rawBody);
        }

        $result = $responseData['result'] ?? $responseData;

        if (isset($result['status']) && $result['status'] === 0) {
            $errors = $result['errors'] ?? ['Unknown upload error'];
            $errorMsg = is_array($errors) ? implode(', ', $errors) : $errors;
            throw new \Exception('cPanel File Upload Error: '.$errorMsg);
        }

        return true;
    }

    public function extractZip(string $remoteFilePath, string $remoteExtractDir): bool
    {
        $host = preg_replace('/^https?:\/\//', '', $this->profile->hostname);
        $host = rtrim($host, '/');
        $port = $this->profile->port ?: 2083;
        $url = "https://{$host}:{$port}/json-api/cpanel";

        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'cpanel '.trim($this->profile->cpanel_username).':'.trim($this->profile->api_token),
            ])
            ->timeout(300)
            ->get($url, [
                'cpanel_jsonapi_apiversion' => '2',
                'cpanel_jsonapi_module' => 'Fileman',
                'cpanel_jsonapi_func' => 'fileop',
                'op' => 'extract',
                'sourcefiles' => $remoteFilePath,
                'destdir' => $remoteExtractDir,
            ]);

        if ($response->failed()) {
            throw new \Exception("cPanel API2 Extract Error: HTTP {$response->status()} - {$response->body()}");
        }

        $data = $response->json();

        if (isset($data['cpanelresult']['error']) && $data['cpanelresult']['error'] !== '') {
            throw new \Exception('cPanel API2 Extract Error: '.$data['cpanelresult']['error']);
        }

        // Also check if there's an error message inside the data array
        if (isset($data['cpanelresult']['data'][0]['status']) && $data['cpanelresult']['data'][0]['status'] === 0) {
            $errorMsg = $data['cpanelresult']['data'][0]['statusmsg'] ?? 'Unknown extract error';
            throw new \Exception('cPanel API2 Extract Error: '.$errorMsg);
        }

        return true;
    }

    public function createDirectory(string $remoteDir): bool
    {
        $this->callUapi('Fileman', 'mkdir', [
            'dir' => $remoteDir,
        ], 'POST');

        return true;
    }

    public function saveFileContent(string $remoteFilePath, string $content): bool
    {
        $dir = dirname($remoteFilePath);
        $file = basename($remoteFilePath);

        $this->callUapi('Fileman', 'save_file_content', [
            'dir' => $dir,
            'file' => $file,
            'content' => $content,
        ], 'POST');

        return true;
    }
}
