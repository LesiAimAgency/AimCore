<?php

namespace App\Services;

use App\Models\ProjectSettingModel;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingsService
{
    private static $instance = null;

    private $settings = [];

    private $loadedForProject = null;

    private function __construct()
    {
        // Don't load in constructor - load on demand
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Check if currently in project context
     */
    private function isProjectContext(): bool
    {
        // Check if project is set in request attributes (frontend routes)
        $project = request()->attributes->get('project');
        if ($project) {
            return true;
        }

        return config('database.default') === 'project';
    }

    /**
     * Get current project identifier for cache key
     */
    private function getCurrentProjectKey(): string
    {
        if ($this->isProjectContext()) {
            $project = request()->attributes->get('project');
            if ($project) {
                return 'project_'.($project->id ?? $project->code ?? 'unknown');
            }

            $projId = session('current_project_id');
            if ($projId) {
                return 'project_'.$projId;
            }

            $sess = session('current_project');
            if (is_string($sess)) {
                return 'project_'.$sess;
            }

            return config('database.connections.project.database') ?? 'project';
        }

        return 'main';
    }

    private function parseSettingsRows($rows): array
    {
        $result = [];
        foreach ($rows as $row) {
            $val = null;
            if (! empty($row->payload)) {
                if (is_array($row->payload)) {
                    $val = $row->payload;
                } elseif (is_string($row->payload)) {
                    $decoded = json_decode($row->payload, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $val = $decoded;
                    } else {
                        $val = $row->payload;
                    }
                }
            }
            if ($val === null && isset($row->value) && $row->value !== null) {
                if (is_array($row->value)) {
                    $val = $row->value;
                } elseif (is_string($row->value)) {
                    $decoded = json_decode($row->value, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $val = $decoded;
                    } else {
                        $val = $row->value;
                    }
                } else {
                    $val = $row->value;
                }
            }
            $result[$row->key] = $val;
        }

        return $result;
    }

    private function loadSettings()
    {
        $currentProject = $this->getCurrentProjectKey();

        // Skip if already loaded for this project
        if ($this->loadedForProject === $currentProject && ! empty($this->settings)) {
            return;
        }

        $this->settings = [];
        $this->loadedForProject = $currentProject;

        if ($this->isProjectContext()) {
            try {
                // DEMO MODE: Đọc từ main database với project scoping
                $project = request()->attributes->get('project');
                if ($project) {
                    $mainConn = config('database.default');
                    // Load global settings (project_id IS NULL) làm fallback
                    $globalRows = DB::connection($mainConn)
                        ->table('settings')
                        ->whereNull('project_id')
                        ->select(['key', 'payload', 'value'])
                        ->get();
                    $globalSettings = $this->parseSettingsRows($globalRows);

                    // Load project-specific settings (override global)
                    $projectRows = DB::connection($mainConn)
                        ->table('settings')
                        ->where('project_id', $project->id)
                        ->select(['key', 'payload', 'value'])
                        ->get();
                    $projectSettings = $this->parseSettingsRows($projectRows);

                    // Merge: project settings override global
                    $this->settings = array_merge($globalSettings, $projectSettings);
                } else {
                    // Fallback: thử đọc từ project database
                    $projectRows = DB::connection('project')
                        ->table('settings')
                        ->select(['key', 'payload', 'value'])
                        ->get();
                    $this->settings = $this->parseSettingsRows($projectRows);
                }
            } catch (\Exception $e) {
                \Log::warning("Failed to load project settings for {$currentProject}: ".$e->getMessage());
                $this->settings = [];
            }
        } else {
            $cacheKey = 'all_settings_main';
            $this->settings = Cache::rememberForever($cacheKey, function () {
                $rows = Setting::select(['key', 'payload', 'value'])->get();

                return $this->parseSettingsRows($rows);
            });
        }
    }

    public function get($key, $default = null)
    {
        $this->loadSettings();

        if (! array_key_exists($key, $this->settings)) {
            return $default;
        }

        $value = $this->settings[$key];

        // Nếu là array và có key 'value', trả về giá trị đó
        if (\is_array($value)) {
            if (array_key_exists('value', $value)) {
                $val = $value['value'];

                return $val !== null ? $val : $default;
            }

            return $value;
        }

        return $value !== null ? $value : $default;
    }

    public function set($key, $value, $group = null, $locked = false)
    {
        $payloadVal = is_array($value) ? $value : ['value' => $value];
        $scalarVal = is_scalar($value) ? (string) $value : (is_null($value) ? null : json_encode($value));

        if ($this->isProjectContext()) {
            $project = request()->attributes->get('project');
            if ($project) {
                $mainConn = config('database.default');
                DB::connection($mainConn)->table('settings')->updateOrInsert(
                    ['key' => $key, 'project_id' => $project->id],
                    [
                        'payload' => json_encode($payloadVal),
                        'value' => $scalarVal,
                        'tenant_id' => $project->tenant_id ?? $project->id,
                        'group' => $group ?? 'general',
                        'updated_at' => now(),
                    ]
                );
            } else {
                ProjectSettingModel::set($key, $value, $group);
            }
        } else {
            Setting::updateOrCreate(
                ['key' => $key, 'project_id' => null],
                [
                    'payload' => $payloadVal,
                    'value' => $scalarVal,
                    'group' => $group ?? 'general',
                    'locked' => $locked,
                ]
            );
        }

        $this->clearCache();
    }

    public function clearCache()
    {
        Cache::forget('all_settings_main');
        $this->settings = [];
        $this->loadedForProject = null;
    }

    public function forceReload()
    {
        $this->settings = [];
        $this->loadedForProject = null;
        $this->loadSettings();
    }
}
