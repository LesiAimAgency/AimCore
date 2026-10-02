<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends EhenhoBaseModel
{
    protected $table = 'profiles';

    protected $fillable = [
        'project_id',
        'user_id',
        'display_name',
        'slug',
        'headline',
        'target_type',
        'gender',
        'birthday',
        'age',
        'province_id',
        'province_name',
        'district_name',
        'marital_status',
        'occupation',
        'height',
        'weight',
        'education',
        'body_type',
        'about_me',
        'looking_for',
        'interests',
        'personality',
        'lifestyle',
        'precious',
        'religion',
        'smoking',
        'drinking',
        'children',
        'avatar_url',
        'photos',
        'is_featured',
        'is_online',
        'last_active_at',
        'status',
        'privacy_option',
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
