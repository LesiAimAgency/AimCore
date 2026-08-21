<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HostingProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'api_token' => 'encrypted',
        'ftp_password' => 'encrypted',
        'ftp_passive' => 'boolean',
        'is_active' => 'boolean',
        'port' => 'integer',
        'ftp_port' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function deployments(): HasMany
    {
        return $this->hasMany(DeploymentHistory::class);
    }
}
