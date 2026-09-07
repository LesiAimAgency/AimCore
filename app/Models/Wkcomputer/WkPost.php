<?php

namespace App\Models\Wkcomputer;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WkPost extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'type',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
}
