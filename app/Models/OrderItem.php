<?php

// MODIFIED: 2025-01-21

namespace App\Models;

use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory, ProjectScoped;

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

    protected $fillable = [
        'order_id', 'product_id', 'product_variation_id', 'product_name',
        'product_sku', 'product_attributes', 'unit_price', 'quantity', 'total_price',
        'tenant_id', 'project_id',
        // Virtual alias fillables
        'price', 'total', 'sku', 'variant_id', 'variant_label', 'image',
    ];

    protected $casts = [
        'product_attributes' => 'array',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function setPriceAttribute($value): void
    {
        $this->attributes['unit_price'] = $value;
    }

    public function getPriceAttribute()
    {
        return $this->attributes['unit_price'] ?? 0;
    }

    public function setTotalAttribute($value): void
    {
        $this->attributes['total_price'] = $value;
    }

    public function getTotalAttribute()
    {
        return $this->attributes['total_price'] ?? 0;
    }

    public function setSkuAttribute($value): void
    {
        $this->attributes['product_sku'] = $value;
    }

    public function getSkuAttribute()
    {
        return $this->attributes['product_sku'] ?? '';
    }

    public function setVariantIdAttribute($value): void
    {
        $this->attributes['product_variation_id'] = $value;
    }

    public function getVariantIdAttribute()
    {
        return $this->attributes['product_variation_id'] ?? null;
    }

    public function setVariantLabelAttribute($value): void
    {
        if (! empty($value)) {
            $attrs = json_decode($this->attributes['product_attributes'] ?? '[]', true) ?: [];
            $attrs['variant'] = $value;
            $this->attributes['product_attributes'] = json_encode($attrs);
        }
    }

    public function getVariantLabelAttribute(): ?string
    {
        $attrs = json_decode($this->attributes['product_attributes'] ?? '[]', true) ?: [];

        return $attrs['variant'] ?? null;
    }

    public function setImageAttribute($value): void
    {
        // virtual alias
    }

    public function getImageAttribute(): ?string
    {
        return $this->product?->thumbnail_url;
    }

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
