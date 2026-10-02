<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends EhenhoBaseModel
{
    protected $table = 'provinces';

    protected $fillable = [
        'code',
        'name',
        'type',
    ];

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class, 'province_id');
    }
}
