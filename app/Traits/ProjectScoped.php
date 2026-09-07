<?php

namespace App\Traits;

use App\Models\Project;

trait ProjectScoped
{
    /**
     * Boot the trait
     */
    protected static function bootProjectScoped()
    {
        static::addGlobalScope('project', function ($builder) {
            if (config('app.bypass_project_scope', false)) {
                return;
            }

            // Always apply project scope when a project is in the request context.
            // NOTE: We intentionally removed the bypass for 'project' DB connection because
            // this system uses shared DB mode where 'project' connection = same DB as 'mysql'.
            // Scoping must always apply to prevent cross-site data leaks.
            $project = request()->attributes->get('project');
            $projectId = $project?->id ?? session('current_project_id') ?? (app()->bound('current_project_id') ? app('current_project_id') : null);
            $tenantId = $project?->tenant_id ?? session('current_tenant_id') ?? (app()->bound('current_tenant_id') ? app('current_tenant_id') : null);
            $table = $builder->getModel()->getTable();

            if ($table === 'users') {
                return;
            }

            // Check if model uses BelongsToTenant trait
            $traits = class_uses_recursive($builder->getModel());
            $hasTenantTrait = in_array(\App\Traits\BelongsToTenant::class, $traits);

            if ($hasTenantTrait && $tenantId) {
                // 100% TENANT_ID: BelongsToTenant global scope handles filtering by tenant_id!
                return;
            }

            if ($tenantId && \Illuminate\Support\Facades\Schema::hasColumn($table, 'tenant_id')) {
                $builder->where(function ($q) use ($table, $tenantId, $projectId) {
                    $q->where($table.'.tenant_id', $tenantId);
                    if ($tenantId == 3) {
                        $q->orWhere($table.'.project_id', 10);
                    }
                    if ($projectId) {
                        $q->orWhere($table.'.project_id', $projectId);
                    }
                });
                return;
            }

            if ($projectId) {
                if ($tenantId == 3) {
                    $builder->where(function ($q) use ($table, $projectId) {
                        $q->where($table.'.project_id', $projectId)
                            ->orWhere($table.'.project_id', 10);
                    });
                } else {
                    $builder->where($table.'.project_id', $projectId);
                }
            }
        });

        // Automatically set project_id and tenant_id when creating
        static::creating(function ($model) {
            $project = request()->attributes->get('project');
            $projectId = $project?->id ?? session('current_project_id') ?? (app()->bound('current_project_id') ? app('current_project_id') : null);
            $tenantId = $project?->tenant_id ?? session('current_tenant_id') ?? (app()->bound('current_tenant_id') ? app('current_tenant_id') : null);

            if ($projectId && ! $model->project_id) {
                $model->project_id = $projectId;
            }
            if ($tenantId && empty($model->tenant_id) && \Illuminate\Support\Facades\Schema::hasColumn($model->getTable(), 'tenant_id')) {
                $model->tenant_id = $tenantId;
            }
        });
    }

    /**
     * Get the project relationship
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
