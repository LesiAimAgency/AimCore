<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends EhenhoBaseModel
{
    protected $table = 'ehenho_profiles';

    protected $fillable = [
        'project_id',
        'user_id',
        'display_name',
        'slug',
        'gender',
        'birthday',
        'age',
        'province_id',
        'province_name',
        'marital_status',
        'occupation',
        'height',
        'education',
        'about_me',
        'looking_for',
        'interests',
        'avatar_url',
        'photos',
        'is_featured',
        'is_online',
        'last_active_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'photos' => 'array',
            'is_featured' => 'boolean',
            'is_online' => 'boolean',
            'birthday' => 'date',
            'last_active_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function socialConnections(): HasMany
    {
        return $this->hasMany(SocialConnection::class, 'target_profile_id');
    }
}
