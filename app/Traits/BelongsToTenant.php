<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
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
            if ($tenantId) {
                $table = $builder->getModel()->getTable();
                $projectId = session('current_project_id') ?? (app()->bound('current_project_id') ? app('current_project_id') : null);

                $builder->where(function ($query) use ($table, $tenantId, $projectId) {
                    $query->where($table.'.tenant_id', $tenantId);
                    if ($tenantId == 3) {
                        // Viettinmart legacy data project_id was 10
                        $query->orWhere($table.'.project_id', 10);
                    }
                    if ($projectId) {
                        $query->orWhere($table.'.project_id', $projectId);
                    }
                });
            }
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
