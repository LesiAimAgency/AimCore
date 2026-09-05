<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'phone', 'email', 'address',
        'contact_person', 'region', 'type',
        'commission_rate', 'is_active', 'notes', 'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'commission_rate' => 'decimal:2',
    ];

    public static array $types = [
        'distributor' => 'Nhà phân phối',
        'retailer' => 'Đại lý bán lẻ',
        'franchise' => 'Nhượng quyền',
        'other' => 'Khác',
    ];

    // ── Relationships ──────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'agent_product')
            ->withPivot('agent_price')
            ->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // ── Scopes ─────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ── Accessors ──────────────────────────────────────────────

    public function getTypeNameAttribute(): string
    {
        return self::$types[$this->type] ?? 'Khác';
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->code ? "[{$this->code}] {$this->name}" : $this->name;
    }
}
