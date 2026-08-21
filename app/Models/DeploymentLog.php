<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeploymentLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'context' => 'json',
        'logged_at' => 'datetime',
    ];

    public $timestamps = false;

    public function deploymentHistory(): BelongsTo
    {
        return $this->belongsTo(DeploymentHistory::class);
    }
}
