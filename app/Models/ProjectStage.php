<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    protected $fillable = [
        'project_id',
        'service_stage_id',
        'name',
        'code',
        'order',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function serviceStage()
    {
        return $this->belongsTo(ServiceStage::class, 'service_stage_id');
    }
}
