<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialConnection extends EhenhoBaseModel
{
    protected $table = 'ehenho_social_connections';

    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'user_id',
        'target_profile_id',
        'relation_type',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function targetProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'target_profile_id');
    }
}
