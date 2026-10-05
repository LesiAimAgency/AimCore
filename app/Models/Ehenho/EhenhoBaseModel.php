<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class EhenhoBaseModel extends Model
{
    /**
     * The connection name for the model.
     * In SQLite testing, uses active default connection.
     * In Production/Staging MySQL, uses 'project' connection resolved dynamically by DatabaseResolver.
     */
    public function getConnectionName()
    {
        $defaultConn = config('database.default');
        if ($defaultConn === 'sqlite' && config("database.connections.{$defaultConn}.database") === ':memory:') {
            return $defaultConn;
        }

        return config('database.connections.project') ? 'project' : $defaultConn;
    }

    /**
     * Global scoping: if project_id is available in context and exists on table, auto scope
     */
    protected static function booted(): void
    {
        static::addGlobalScope('project_scope', function (Builder $builder) {
            $model = $builder->getModel();
            if ($model->usesProjectScope()) {
                $projectId = app()->bound('current_project_id') ? app('current_project_id') : session('current_project_id');
                if ($projectId) {
                    $table = $model->getTable();
                    $builder->where(function ($q) use ($table, $projectId) {
                        $q->whereNull("{$table}.project_id")
                            ->orWhere("{$table}.project_id", $projectId);
                    });
                }
            }
        });

        static::creating(function ($model) {
            if ($model->usesProjectScope() && empty($model->project_id)) {
                $projectId = app()->bound('current_project_id') ? app('current_project_id') : session('current_project_id');
                if ($projectId) {
                    $model->project_id = $projectId;
                }
            }
        });
    }

    public function usesProjectScope(): bool
    {
        return in_array('project_id', $this->getFillable())
            && ! in_array($this->getTable(), ['provinces', 'ehenho_provinces']);
    }
}
