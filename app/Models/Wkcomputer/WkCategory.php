<?php

namespace App\Models\Wkcomputer;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WkCategory extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped, SoftDeletes;

    protected $table = 'product_categories';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'level',
        'sort_order',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(WkCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(WkCategory::class, 'parent_id')->orderBy('sort_order');
    }

    public function products()
    {
        return $this->hasMany(WkProduct::class, 'product_category_id');
    }

    public function allProducts()
    {
        return $this->belongsToMany(
            WkProduct::class,
            'product_category_product',
            'product_category_id',
            'product_id'
        )->withTimestamps();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeRoots(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }
}
