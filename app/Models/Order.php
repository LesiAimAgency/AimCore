<?php

// MODIFIED: 2025-01-21

namespace App\Models;

use App\Traits\BelongsToTenant;
use App\Traits\ProjectScoped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use BelongsToTenant, HasFactory, ProjectScoped;

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

    public static array $statuses = [
        'pending' => ['label' => 'Chờ xử lý', 'color' => 'warning'],
        'processing' => ['label' => 'Đang xử lý', 'color' => 'info'],
        'shipping' => ['label' => 'Đang giao hàng', 'color' => 'primary'],
        'completed' => ['label' => 'Hoàn thành', 'color' => 'success'],
        'delivered' => ['label' => 'Đã giao hàng', 'color' => 'success'],
        'cancelled' => ['label' => 'Đã hủy', 'color' => 'danger'],
        'refunded' => ['label' => 'Đã hoàn tiền', 'color' => 'secondary'],
    ];

    public static array $paymentStatuses = [
        'pending' => ['label' => 'Chờ thanh toán', 'color' => 'warning'],
        'unpaid' => ['label' => 'Chưa thanh toán', 'color' => 'warning'],
        'paid' => ['label' => 'Đã thanh toán', 'color' => 'success'],
        'failed' => ['label' => 'Thanh toán thất bại', 'color' => 'danger'],
        'refunded' => ['label' => 'Đã hoàn tiền', 'color' => 'secondary'],
    ];

    protected $fillable = [
        'order_number', 'status', 'subtotal', 'tax_amount', 'shipping_amount',
        'discount_amount', 'total_amount', 'currency', 'customer_name',
        'customer_email', 'customer_phone', 'billing_address', 'shipping_address',
        'payment_method', 'payment_status', 'paid_at', 'customer_notes', 'internal_notes',
        'tenant_id', 'project_id', 'user_id',
        // Virtual alias fillables
        'total', 'shipping_fee', 'discount', 'customer_note', 'coupon_code',
        'shipping_province', 'shipping_district', 'shipping_ward',
    ];

    protected $casts = [
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    /**
     * Generate unique order number.
     */
    public static function generateOrderNumber(): string
    {
        $prefix = 'ORD-'.date('Ymd').'-';
        do {
            $number = $prefix.strtoupper(\Illuminate\Support\Str::random(5));
        } while (static::withoutGlobalScopes()->where('order_number', $number)->exists());

        return $number;
    }

    // Relationships
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class)->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_email', 'email');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    // Scopes
    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('order_number', 'like', "%{$search}%")
            ->orWhere('customer_name', 'like', "%{$search}%")
            ->orWhere('customer_email', 'like', "%{$search}%");
    }

    public function scopeFilter(Builder $query, $filters)
    {
        return $query->when($filters['status'] ?? null, function ($query, $status) {
            return $query->where('status', $status);
        })
            ->when($filters['payment_status'] ?? null, function ($query, $status) {
                return $query->where('payment_status', $status);
            })
            ->when($filters['date_from'] ?? null, function ($query, $date) {
                return $query->whereDate('created_at', '>=', $date);
            })
            ->when($filters['date_to'] ?? null, function ($query, $date) {
                return $query->whereDate('created_at', '<=', $date);
            });
    }

    // Methods
    public function updateStatus($newStatus, $notes = null, $userId = null)
    {
        $oldStatus = $this->status;
        $this->update(['status' => $newStatus]);

        $this->statusHistories()->create([
            'from_status' => $oldStatus,
            'to_status' => $newStatus,
            'notes' => $notes,
            'user_id' => $userId,
        ]);
    }

    public function sendOrderPlacedNotifications(): void
    {
        try {
            \Illuminate\Support\Facades\Log::info("Order placed notification triggered for #{$this->order_number} to {$this->customer_email}");
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning("Order placed notification warning: ".$e->getMessage());
        }
    }

    // Accessors & Mutators
    public function setTotalAttribute($value): void
    {
        $this->attributes['total_amount'] = $value;
    }

    public function getTotalAttribute()
    {
        return $this->attributes['total_amount'] ?? 0;
    }

    public function setShippingFeeAttribute($value): void
    {
        $this->attributes['shipping_amount'] = $value;
    }

    public function getShippingFeeAttribute()
    {
        return $this->attributes['shipping_amount'] ?? 0;
    }

    public function setDiscountAttribute($value): void
    {
        $this->attributes['discount_amount'] = $value;
    }

    public function getDiscountAttribute()
    {
        return $this->attributes['discount_amount'] ?? 0;
    }

    public function setPaymentStatusAttribute($value): void
    {
        // Map 'unpaid' to 'pending' to conform with database enum ('pending', 'paid', 'failed', 'refunded')
        if ($value === 'unpaid') {
            $value = 'pending';
        }
        $this->attributes['payment_status'] = $value;
    }

    public function setCustomerNoteAttribute($value): void
    {
        $this->attributes['customer_notes'] = $value;
    }

    public function getCustomerNoteAttribute()
    {
        return $this->attributes['customer_notes'] ?? '';
    }

    public function setCouponCodeAttribute($value): void
    {
        if (! empty($value)) {
            $notes = $this->attributes['internal_notes'] ?? '';
            $this->attributes['internal_notes'] = trim($notes."\nCoupon: ".$value);
        }
    }

    public function getCouponCodeAttribute(): ?string
    {
        if (isset($this->attributes['internal_notes']) && preg_match('/Coupon:\s*([^\n]+)/i', $this->attributes['internal_notes'], $m)) {
            return trim($m[1]);
        }

        return null;
    }

    public function getShippingAddressAttribute($value)
    {
        if (is_array($value)) {
            return $value['full_address'] ?? implode(', ', array_filter($value));
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                return $decoded['full_address'] ?? implode(', ', array_filter($decoded));
            }

            return $value;
        }

        return $value;
    }

    public function setShippingProvinceAttribute($value): void
    {
        // virtual alias stored in shipping_address
    }

    public function setShippingDistrictAttribute($value): void
    {
        // virtual alias stored in shipping_address
    }

    public function setShippingWardAttribute($value): void
    {
        // virtual alias stored in shipping_address
    }

    public function getStatusLabelAttribute(): string
    {
        return static::$statuses[$this->status]['label'] ?? $this->status;
    }

    public function getStatusColorAttribute(): string
    {
        return static::$statuses[$this->status]['color'] ?? 'secondary';
    }

    public function getPaymentStatusLabelAttribute(): string
    {
        return static::$paymentStatuses[$this->payment_status]['label'] ?? $this->payment_status;
    }

    public function getPaymentStatusColorAttribute(): string
    {
        return static::$paymentStatuses[$this->payment_status]['color'] ?? 'secondary';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'shipping' => 'bg-indigo-100 text-indigo-800',
            'completed' => 'bg-green-100 text-green-800',
            'delivered' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            'refunded' => 'bg-gray-100 text-gray-800',
        ];

        return $badges[$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}
