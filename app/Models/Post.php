<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped, SoftDeletes, Translatable;

    // Các field có thể dịch
    protected $translatable = [
        'title',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
    ];

    protected $fillable = [
        'project_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'post_type',
        'template',
        'status',
        'meta_title',
        'meta_description',
        'seo_data',
        'views',
        'published_at',
        'author_id',
        'tenant_id',
        'language',
        'meta_data',
    ];

    protected $casts = [
        'seo_data' => 'array',
        'meta_data' => 'array',
        'published_at' => 'datetime',
    ];

    // Scopes cho post type
    public function scopePosts($query)
    {
        return $query->where('post_type', 'post');
    }

    public function scopePages($query)
    {
        return $query->where('post_type', 'page');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeWithStandardRelations($query)
    {
        return $query->with(['translations', 'taxonomies.translations']);
    }

    public function category()
    {
        return $this->belongsToMany(Taxonomy::class, 'term_relationships', 'object_id', 'term_taxonomy_id')
            ->where('taxonomy', 'category');
    }

    // Relationships
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class, 'post_tag');
    // }

    public function taxonomies(): BelongsToMany
    {
        return $this->belongsToMany(Taxonomy::class, 'term_relationships', 'object_id', 'term_taxonomy_id')
            ->withPivot('order');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class, 'page_id')->orderBy('order');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Taxonomy::class, 'term_relationships', 'object_id', 'term_taxonomy_id')
            ->whereIn('taxonomy', ['post_tag', 'tag']);
    }

    // Helper methods
    public function isPost(): bool
    {
        return $this->post_type === 'post';
    }

    public function isPage(): bool
    {
        return $this->post_type === 'page';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    private function getMetaArray(): array
    {
        $meta = $this->meta_data;
        if (is_string($meta)) {
            $decoded = json_decode($meta, true);
            if (is_array($decoded)) {
                return $decoded;
            }
        }

        return is_array($meta) ? $meta : [];
    }

    public function getNameAttribute(): string
    {
        return $this->title ?? '';
    }

    public function getSkuAttribute(): ?string
    {
        return $this->getMetaArray()['sku'] ?? null;
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->excerpt;
    }

    public function getPriceAttribute()
    {
        return $this->getMetaArray()['price'] ?? 0;
    }

    public function getSalePriceAttribute()
    {
        return $this->getMetaArray()['sale_price'] ?? null;
    }

    public function getDisplayPriceAttribute(): string
    {
        $meta = $this->getMetaArray();
        $price = $meta['sale_price'] ?? $meta['price'] ?? 0;
        if (! $price) {
            return 'Liên hệ';
        }

        return number_format((float) $price, 0, ',', '.').' đ';
    }

    public function getStockQuantityAttribute(): int
    {
        return (int) ($this->getMetaArray()['stock_quantity'] ?? 0);
    }

    public function getStockStatusAttribute(): string
    {
        $meta = $this->getMetaArray();
        if (isset($meta['stock_status'])) {
            return $meta['stock_status'];
        }

        return $this->stock_quantity > 0 ? 'in_stock' : 'out_of_stock';
    }

    public function getCategoryAttribute()
    {
        return $this->taxonomies->whereIn('taxonomy', ['category', 'product_cat'])->first();
    }

    public function getRenderedContent(): string
    {
        $content = $this->content ?? '';
        foreach ($this->sections as $section) {
            $content .= $section->getRenderedContent();
        }

        return $content;
    }

    public function getFeaturedImageAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://') || str_starts_with($value, '/storage/') || str_starts_with($value, '/media-files/')) {
            return $value;
        }

        if (str_starts_with($value, 'storage/') || str_starts_with($value, 'media-files/')) {
            return '/'.$value;
        }

        return '/storage/'.ltrim($value, '/');
    }

    public function getThumbnailAttribute(): ?string
    {
        return $this->featured_image ?? null;
    }
}
