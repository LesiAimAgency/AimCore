<?php

namespace App\Models\Wkcomputer;

use App\Models\ProductReview;
use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class WkProduct extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped, SoftDeletes;

    protected $table = 'products_enhanced';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'name',
        'slug',
        'short_description',
        'description',
        'sku',
        'price',
        'sale_price',
        'has_price',
        'stock_quantity',
        'manage_stock',
        'stock_status',
        'featured_image',
        'gallery',
        'product_category_id',
        'status',
        'is_featured',
        'meta_title',
        'meta_description',
        'settings',
        'product_type',
        'views',
        'rating_average',
        'rating_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'has_price' => 'boolean',
        'manage_stock' => 'boolean',
        'is_featured' => 'boolean',
        'gallery' => 'array',
        'settings' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(WkCategory::class, 'product_category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            WkCategory::class,
            'product_category_product',
            'product_id',
            'product_category_id'
        )->withTimestamps();
    }

    public function combos()
    {
        return $this->hasMany(WkProductCombo::class, 'product_id')->where('is_active', true)->orderBy('sort_order');
    }

    public function activeCombos()
    {
        return $this->combos();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where(function ($q) {
            $q->where('status', 'published')
                ->orWhere('status', 'active');
        });
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getEffectivePriceAttribute(): float
    {
        if ($this->sale_price !== null && $this->sale_price > 0 && $this->sale_price < $this->attributes['price']) {
            return (float) $this->sale_price;
        }

        return (float) ($this->attributes['price'] ?? 0);
    }

    public function getComparePriceAttribute(): ?float
    {
        if ($this->sale_price !== null && $this->sale_price > 0 && $this->sale_price < $this->attributes['price']) {
            return (float) $this->attributes['price'];
        }

        return null;
    }

    public function getImageAttribute(): ?string
    {
        if ($this->featured_image) {
            return $this->featured_image;
        }
        if (! empty($this->gallery) && is_array($this->gallery) && count($this->gallery) > 0) {
            return $this->gallery[0];
        }

        return null;
    }

    public function getStockAttribute(): int
    {
        return (int) ($this->stock_quantity ?? 99);
    }

    public function getAdditionalInfoAttribute()
    {
        return $this->settings['additional_info'] ?? [];
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->effective_price, 0, ',', '.').'₫';
    }

    public function getFormattedOriginalPriceAttribute(): string
    {
        return number_format($this->attributes['price'] ?? 0, 0, ',', '.').'₫';
    }

    public function getDiscountPercentAttribute(): int
    {
        $orig = (float) ($this->attributes['price'] ?? 0);
        $sale = (float) ($this->sale_price ?? 0);
        if ($orig > 0 && $sale > 0 && $sale < $orig) {
            return (int) round((($orig - $sale) / $orig) * 100);
        }

        return 0;
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function approvedReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id')->where('status', 'approved');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->approvedReviews()->avg('rating'), 1) ?: 0;
    }

    public function getOldPriceAttribute(): ?float
    {
        $orig = (float) ($this->attributes['price'] ?? 0);
        $sale = (float) ($this->sale_price ?? 0);
        if ($sale > 0 && $orig > $sale) {
            return $orig;
        }

        return null;
    }

    public function getFlashPriceAttribute(): ?float
    {
        return null;
    }

    public function getIsOnFlashSaleAttribute(): bool
    {
        return false;
    }

    public function getImagesUrlsAttribute(): array
    {
        $images = $this->gallery ?? [];
        if ($this->featured_image && ! in_array($this->featured_image, $images)) {
            array_unshift($images, $this->featured_image);
        }

        $urls = array_map(function ($img) {
            if (! $img) {
                return null;
            }
            if (str_starts_with($img, 'http')) {
                return $img;
            }
            $path = ltrim($img, '/');
            if (str_starts_with($path, 'media/')) {
                return Storage::disk('public')->url($path);
            }

            return asset($path);
        }, $images);

        return array_values(array_filter($urls));
    }
}
