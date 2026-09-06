<?php

namespace App\Models;

use App\Services\SettingsService;
use Illuminate\Database\Eloquent\Model;

/**
 * Model để lưu settings trong project database
 * Sử dụng connection 'project' cố định
 */
class ProjectSettingModel extends Model
{
    public function getConnectionName()
    {
        return (app()->environment('testing') || ! config('database.connections.project'))
            ? config('database.default')
            : 'project';
    }

    protected $table = 'settings';

    protected $fillable = ['tenant_id', 'key', 'payload', 'value', 'group', 'locked', 'project_id', 'type', 'description'];

    protected $casts = [
        'payload' => 'array',
        'locked' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($setting) {
            if (! $setting->tenant_id && session('current_tenant_id')) {
                $setting->tenant_id = session('current_tenant_id');
            }

            if (! $setting->project_id) {
                $project = request()->attributes->get('project');
                if ($project) {
                    $setting->project_id = $project->id;
                }
            }
        });
    }

    public static function set($key, $value, $group = 'general')
    {
        $project = request()->attributes->get('project');
        if (! $project && session('current_project_id')) {
            $project = Project::find(session('current_project_id'));
        }
        if (! $project && request()->route('projectCode')) {
            $project = Project::where('code', request()->route('projectCode'))->first();
        }

        $projectId = $project ? $project->id : null;
        $tenantId = $project?->tenant_id ?? session('current_tenant_id') ?? $projectId;

        // Chuẩn hóa giá trị
        $normalizedValue = \is_array($value) ? $value : ['value' => $value];
        $scalarValue = is_scalar($value) ? (string) $value : (is_null($value) ? null : json_encode($value));

        $matchConditions = ['key' => $key];
        if ($projectId !== null) {
            $matchConditions['project_id'] = $projectId;
        } else {
            $matchConditions['project_id'] = null;
        }

        \DB::table('settings')->updateOrInsert(
            $matchConditions,
            [
                'payload' => json_encode($normalizedValue),
                'value' => $scalarValue,
                'tenant_id' => $tenantId,
                'group' => $group,
                'updated_at' => now(),
            ]
        );

        if (class_exists('\App\Services\SettingsService')) {
            SettingsService::getInstance()->clearCache();
        }

        $query = static::where('key', $key);
        if ($projectId !== null) {
            $query->where('project_id', $projectId);
        } else {
            $query->whereNull('project_id');
        }

        return $query->first();
    }

    public static function getValue($key, $default = null)
    {
        if (class_exists('\App\Services\SettingsService')) {
            return SettingsService::getInstance()->get($key, $default);
        }

        $setting = static::where('key', $key)->first();

        if (! $setting) {
            return $default;
        }

        $value = $setting->payload ?? $setting->value;

        if (\is_array($value) && isset($value['value'])) {
            return $value['value'];
        }

        return $value ?? $default;
    }

    /**
     * Xóa tất cả duplicate keys và tạo lại clean
     */
    public static function cleanDuplicateKeys()
    {
        return \DB::connection('project')->transaction(function () {
            // Tìm tất cả keys bị duplicate
            $duplicateKeys = \DB::connection('project')
                ->table('settings')
                ->select('key')
                ->groupBy('key')
                ->havingRaw('COUNT(*) > 1')
                ->pluck('key');

            $cleaned = 0;
            foreach ($duplicateKeys as $key) {
                // Lấy record đầu tiên để giữ lại data
                $firstRecord = static::where('key', $key)->first();
                if ($firstRecord) {
                    $data = [
                        'key' => $key,
                        'payload' => $firstRecord->payload,
                        'group' => $firstRecord->group,
                        'tenant_id' => $firstRecord->tenant_id,
                        'project_id' => $firstRecord->project_id,
                    ];

                    // Xóa tất cả records với key này
                    static::where('key', $key)->delete();

                    // Tạo lại record mới
                    static::create($data);
                    $cleaned++;
                }
            }

            \Log::info("Cleaned {$cleaned} duplicate keys");

            return $cleaned;
        });
    }
}
