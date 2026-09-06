<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MenuItem extends Model
{
    use BelongsToTenant, ProjectScoped;

    protected $fillable = [
        'menu_id',
        'parent_id',
        'title',
        'url',
        'target',
        'icon',
        'image',
        'badge',
        'badge_color',
        'linkable_type',
        'linkable_id',
        'order',
        'tenant_id',
        'project_id',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function getUrlAttribute($value): ?string
    {
        if ($value) {
            if (str_contains($value, '/san-pham/')) {
                $value = str_replace('/san-pham/', '/', $value);
            }

            return $value;
        }

        if ($this->linkable) {
            $project = function_exists('current_project') ? current_project() : null;
            $code = $project?->code;
            $prefix = $code ? '/'.$code : '';

            $slug = $this->linkable->slug ?? $this->linkable->id;

            return match ($this->linkable_type) {
                'App\\Models\\Post' => ($this->linkable->post_type === 'page') ? "{$prefix}/{$slug}" : "{$prefix}/blog/{$slug}",
                'App\\Models\\ProductCategory' => "{$prefix}/{$slug}",
                'App\\Models\\Product' => "{$prefix}/{$slug}",
                'App\\Models\\Taxonomy' => "{$prefix}/blog?category={$slug}",
                'App\\Models\\Brand' => "{$prefix}/cua-hang?brand={$slug}",
                default => '#',
            };
        }

        return '#';
    }
}
