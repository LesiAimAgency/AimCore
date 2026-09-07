<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCombo extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped;

    protected $table = 'product_combos';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'product_id',
        'combo_product_id',
        'variant_id',
        'combo_price',
        'discount_amount',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'combo_price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function comboProduct()
    {
        return $this->belongsTo(Product::class, 'combo_product_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariation::class, 'variant_id');
    }
}
