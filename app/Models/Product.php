<?php

// MODIFIED: 2025-01-25 - Added Multi-Tenant Support

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use BelongsToTenant, HasFactory, InteractsWithMedia, ProjectScoped, SoftDeletes, Translatable;

    protected $table = 'products_enhanced';

    /**
     * Get the database connection for the model.
     */
    public function getConnectionName()
    {
        // If we're in a project context (project database is set), use project connection
        if (config('database.default') === 'project') {
            return 'project';
        }

        return parent::getConnectionName();
    }

    // Các field có thể dịch
    protected $translatable = [
        'name',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
    ];

    protected $fillable = [
        'project_id', 'tenant_id', 'name', 'slug', 'short_description', 'description', 'sku', 'price', 'sale_price',
        'has_price', 'stock_quantity', 'manage_stock', 'stock_status', 'featured_image',
        'gallery', 'weight', 'dimensions', 'product_category_id', 'brand_id', 'status',
        'is_featured', 'badges', 'meta_title', 'meta_description',
        'schema_type', 'canonical_url', 'noindex', 'settings', 'views',
        'rating_average', 'rating_count', 'product_type', 'language',
    ];

    protected $casts = [
        'has_price' => 'boolean',
        'manage_stock' => 'boolean',
        'is_featured' => 'boolean',
        'noindex' => 'boolean',
        'gallery' => 'array',
        'badges' => 'array',
        'settings' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'rating_average' => 'decimal:2',
        'tenant_id' => 'integer',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Many-to-many relationship for multiple categories
     */
    public function categories()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'product_category_product',
            'product_id',
            'product_category_id'
        );
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Many-to-many relationship for multiple brands
     */
    public function brands()
    {
        return $this->belongsToMany(
            Brand::class,
            'brand_product',
            'product_id',
            'brand_id'
        );
    }

    /**
     * Danh sách attribute-value mappings của sản phẩm
     *
     * Ví dụ:
     * - Color: Red, Blue
     * - Size: M, L
     */
    public function attributeMappings()
    {
        return $this->hasMany(ProductAttributeValueMapping::class);
    }

    /**
     * Danh sách các thuộc tính (loại)
     * Ví dụ: Color, Size, Material
     */
    public function attributes()
    {
        return $this->belongsToMany(
            ProductAttribute::class,
            'product_attribute_value_mappings',
            'product_id',
            'product_attribute_id'
        )->distinct();
    }

    /**
     * Danh sách các giá trị thuộc tính
     * Ví dụ: Red (value của Color), M (value của Size)
     */
    public function attributeValues()
    {
        return $this->belongsToMany(
            ProductAttributeValue::class,
            'product_attribute_value_mappings',
            'product_id',
            'product_attribute_value_id'
        )->with('attribute');
    }

    /**
     * Lấy các giá trị của 1 thuộc tính cụ thể
     * Ví dụ: $product->getAttributeValues('Color') → ['Red', 'Blue']
     */
    public function getAttributeValues(string $attributeSlug)
    {
        return $this->attributeMappings()
            ->with('attribute', 'attributeValue')
            ->whereHas('attribute', fn ($q) => $q->where('slug', $attributeSlug))
            ->get()
            ->pluck('attributeValue.display_name')
            ->toArray();
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function approvedReviews()
    {
        return $this->reviews()->where('status', 'approved');
    }

    public function getAverageRatingAttribute(): float
    {
        return (float) (round($this->approvedReviews()->avg('rating'), 1) ?: 5.0);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    // Scopes
    public function scopeActive(Builder $query)
    {
        return $query->whereIn('status', ['active', 'published']);
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('status', 'published');
    }

    public function scopeWithStandardRelations(Builder $query)
    {
        return $query->with([
            'translations',
            'categories' => function ($q) {
                $q->with('translations');
            },
        ]);
    }

    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('sku', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    }

    public function scopeFilter(Builder $query, $filters)
    {
        return $query->when($filters['category'] ?? null, function ($query, $category) {
            return $query->where('product_category_id', $category);
        })
            ->when($filters['brand'] ?? null, function ($query, $brand) {
                return $query->where('brand_id', $brand);
            })
            ->when($filters['status'] ?? null, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($filters['price_min'] ?? null, function ($query, $price) {
                return $query->where('price', '>=', $price);
            })
            ->when($filters['price_max'] ?? null, function ($query, $price) {
                return $query->where('price', '<=', $price);
            });
    }

    public function scopeForTenant(Builder $query, $tenantId = null)
    {
        return $query->where('tenant_id', $tenantId ?? auth()->user()->tenant_id);
    }

    // Accessors
    public function getStockAttribute(): int
    {
        return (int) ($this->stock_quantity ?? 0);
    }

    public function getImageAttribute(): ?string
    {
        return $this->featured_image;
    }

    public function getFeaturedImageAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        // Clean up malformed prefixes or hardcoded domains
        if (str_contains($value, '127.0.0.1:8000') || str_contains($value, 'viettinmart.vnglobaltech.com')) {
            $value = preg_replace('#^/storage/https?://[^/]+#', '', $value);
            $value = preg_replace('#^https?://[^/]+#', '', $value);
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        if (str_starts_with($value, '/storage/') || str_starts_with($value, '/media-files/')) {
            return $value;
        }

        if (str_starts_with($value, 'storage/') || str_starts_with($value, 'media-files/')) {
            return '/'.$value;
        }

        return '/storage/'.ltrim($value, '/');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if (! empty($this->featured_image)) {
            return media_url($this->featured_image, 'theme/images/grocery/01.jpg');
        }

        return asset('theme/images/grocery/01.jpg');
    }

    public function getEffectivePriceAttribute(): float
    {
        $price = (float) ($this->price ?? 0);
        $salePrice = (float) ($this->sale_price ?? 0);
        if ($salePrice > 0 && $salePrice < $price) {
            return $salePrice;
        }

        return $price;
    }

    public function getOldPriceAttribute(): ?float
    {
        $price = (float) ($this->price ?? 0);
        $salePrice = (float) ($this->sale_price ?? 0);
        if ($salePrice > 0 && $salePrice < $price) {
            return $price;
        }

        return null;
    }

    public function getFormattedPriceAttribute(): string
    {
        $price = $this->effective_price;
        if ($price <= 0) {
            return __('common.contact_price') ?: 'Liên hệ';
        }

        return number_format($price, 0, ',', '.').' ₫';
    }

    public function getFormattedOldPriceAttribute(): ?string
    {
        $oldPrice = $this->old_price;

        return $oldPrice ? number_format($oldPrice, 0, ',', '.').' ₫' : null;
    }

    public function getDiscountPercentAttribute(): ?int
    {
        $effective = $this->effective_price;
        $old = $this->old_price;
        if ($effective <= 0 || ! $old || $old <= $effective) {
            return null;
        }

        return (int) round((1 - ($effective / $old)) * 100);
    }

    public function getUnitAttribute(): ?string
    {
        return $this->settings['unit'] ?? 'Hộp / Kg';
    }

    public function getDisplayPriceAttribute()
    {
        if (! $this->has_price) {
            return config('app.price_placeholder', 'Liên hệ');
        }

        return $this->sale_price ?: $this->price;
    }

    /**
     * Register media collections used by Product.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')->singleFile();
        $this->addMediaCollection('images');
    }

    /**
     * Register conversions used for thumbnails and previews.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->keepOriginalImageFormat()
            ->nonQueued();

        $this->addMediaConversion('preview')
            ->width(1200)
            ->height(900)
            ->keepOriginalImageFormat()
            ->nonQueued();
    }

    /**
     * Return the featured image url or null.
     */
    public function getFeaturedImageUrl(): ?string
    {
        if ($media = $this->getFirstMedia('featured_image')) {
            return $media->getUrl('preview') ?: $media->getUrl();
        }

        return null;
    }

    /**
     * Helpful accessor for gallery media collection
     *
     * @return Collection|Media[]
     */
    public function gallery()
    {
        return $this->getMedia('images');
    }

    /**
     * Clean 1-level SEO URL for product (e.g. /{projectCode}/{product-slug})
     */
    public function getUrlAttribute(): string
    {
        return locale_route('shop.show', $this->slug);
    }
}
