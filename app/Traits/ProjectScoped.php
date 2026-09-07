<?php

namespace App\Traits;

use App\Models\Project;
use Illuminate\Support\Facades\Schema;

trait ProjectScoped
{
    /**
     * Cache table column existence to avoid repeated information_schema queries.
     *
     * @var array<string, bool>
     */
    protected static array $projectColumnCache = [];

    /**
     * Check if a table has a specific column with caching.
     */
    protected static function projectTableHasColumn(string $table, string $column): bool
    {
        $key = $table.'.'.$column;
        if (! isset(static::$projectColumnCache[$key])) {
            static::$projectColumnCache[$key] = Schema::hasColumn($table, $column);
        }

        return static::$projectColumnCache[$key];
    }

    /**
     * Boot the trait
     */
    protected static function bootProjectScoped(): void
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
            $hasTenantTrait = in_array(BelongsToTenant::class, $traits);

            if ($hasTenantTrait && $tenantId) {
                // 100% TENANT_ID: BelongsToTenant global scope handles filtering by tenant_id!
                return;
            }

            $hasTenantColumn = static::projectTableHasColumn($table, 'tenant_id');
            $hasProjectColumn = static::projectTableHasColumn($table, 'project_id');

            if ($tenantId && $hasTenantColumn) {
                $builder->where(function ($q) use ($table, $tenantId, $projectId, $hasProjectColumn) {
                    $q->where($table.'.tenant_id', $tenantId);
                    if ($hasProjectColumn) {
                        if ($tenantId == 3) {
                            $q->orWhere($table.'.project_id', 10);
                        }
                        if ($projectId) {
                            $q->orWhere($table.'.project_id', $projectId);
                        }
                    }
                });

                return;
            }

            if ($projectId && $hasProjectColumn) {
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
            if ($tenantId && empty($model->tenant_id) && Schema::hasColumn($model->getTable(), 'tenant_id')) {
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
