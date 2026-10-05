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

    private static ?array $districtMap = null;

    public static function resolveDistrictCode(int|string|null $code): ?string
    {
        if (empty($code) || ! is_numeric($code)) {
            return is_string($code) ? $code : null;
        }

        $numericCode = (int) $code;

        if (self::$districtMap === null) {
            self::$districtMap = [];
            $jsonPath = public_path('themes/ehenho/js/vietnam_provinces.json');
            if (file_exists($jsonPath)) {
                $content = @file_get_contents($jsonPath);
                $data = json_decode($content, true);
                if (is_array($data)) {
                    foreach ($data as $prov) {
                        foreach ($prov['districts'] ?? [] as $dist) {
                            if (isset($dist['code'], $dist['name'])) {
                                self::$districtMap[(int) $dist['code']] = $dist['name'];
                            }
                        }
                    }
                }
            }
        }

        return self::$districtMap[$numericCode] ?? (string) $code;
    }

    public function getDistrictNameAttribute(?string $value): ?string
    {
        if ($value && is_numeric($value)) {
            return self::resolveDistrictCode($value) ?: $value;
        }

        return $value;
    }

    public function setDistrictNameAttribute(?string $value): void
    {
        if ($value && is_numeric($value)) {
            $this->attributes['district_name'] = self::resolveDistrictCode($value) ?: $value;
        } else {
            $this->attributes['district_name'] = $value;
        }
    }

    public function getAvatarAttribute(): ?string
    {
        if (! $this->avatar_url) {
            return null;
        }

        if (str_starts_with($this->avatar_url, 'http://') || str_starts_with($this->avatar_url, 'https://')) {
            return $this->avatar_url;
        }

        return asset($this->avatar_url);
    }

    public function getLocationTextAttribute(): string
    {
        $province = $this->province_name ?: ($this->province?->name ?: '');
        if ($this->district_name && $province) {
            return "{$this->district_name}, {$province}";
        }

        return $province ?: ($this->district_name ?: 'Toàn quốc');
    }
}
