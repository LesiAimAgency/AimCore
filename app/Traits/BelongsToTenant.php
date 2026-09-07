<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Schema;

trait BelongsToTenant
{
    /**
     * Cache table column existence to avoid repeated information_schema queries.
     *
     * @var array<string, bool>
     */
    protected static array $tenantColumnCache = [];

    /**
     * Check if a table has a specific column with caching.
     */
    protected static function tenantTableHasColumn(string $table, string $column): bool
    {
        $key = $table.'.'.$column;
        if (! isset(static::$tenantColumnCache[$key])) {
            static::$tenantColumnCache[$key] = Schema::hasColumn($table, $column);
        }

        return static::$tenantColumnCache[$key];
    }

    protected static function bootBelongsToTenant(): void
    {
        // Tự động thêm tenant_id khi tạo mới
        static::creating(function ($model) {
            if (empty($model->tenant_id)) {
                $model->tenant_id = session('current_tenant_id') ?? config('app.default_tenant_id') ?? (app()->bound('current_tenant_id') ? app('current_tenant_id') : null);
            }
        });

        // Tự động filter theo tenant_id (100% tenant-based với fallback project_id)
        static::addGlobalScope('tenant', function (Builder $builder) {
            $tenantId = session('current_tenant_id') ?? config('app.default_tenant_id') ?? (app()->bound('current_tenant_id') ? app('current_tenant_id') : null);
            if (! $tenantId) {
                return;
            }

            $table = $builder->getModel()->getTable();
            $projectId = session('current_project_id') ?? (app()->bound('current_project_id') ? app('current_project_id') : null);

            // Special handling for users table:
            // Users table has tenant_id and project_ids (JSON), but NO project_id column.
            if ($table === 'users') {
                $builder->where(function ($query) use ($table, $tenantId, $projectId) {
                    $query->where($table.'.tenant_id', $tenantId);
                    if ($tenantId == 3) {
                        $query->orWhereJsonContains($table.'.project_ids', 10);
                    }
                    if ($projectId) {
                        $query->orWhereJsonContains($table.'.project_ids', (int) $projectId)
                            ->orWhereJsonContains($table.'.project_ids', (string) $projectId);
                    }
                });

                return;
            }

            if (! static::tenantTableHasColumn($table, 'tenant_id')) {
                return;
            }

            $hasProjectId = static::tenantTableHasColumn($table, 'project_id');

            $builder->where(function ($query) use ($table, $tenantId, $projectId, $hasProjectId) {
                $query->where($table.'.tenant_id', $tenantId);
                if ($hasProjectId) {
                    if ($tenantId == 3) {
                        // Viettinmart legacy data project_id was 10
                        $query->orWhere($table.'.project_id', 10);
                    }
                    if ($projectId) {
                        $query->orWhere($table.'.project_id', $projectId);
                    }
                }
            });
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function scopeForTenant(Builder $query, $tenantId): Builder
    {
        return $query->where('tenant_id', $tenantId);
    }

    public function scopeWithoutTenantScope(Builder $query): Builder
    {
        return $query->withoutGlobalScope('tenant');
    }
}
