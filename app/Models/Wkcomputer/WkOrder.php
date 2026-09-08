<?php

namespace App\Models\Wkcomputer;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WkOrder extends Order
{
    protected $table = 'orders';

    public function items(): HasMany
    {
        return $this->hasMany(WkOrderItem::class, 'order_id');
    }

    public static function generateOrderNumber(): string
    {
        return 'WKC-'.strtoupper(uniqid());
    }

    public function getFormattedShippingAddressAttribute(): string
    {
        $addr = $this->shipping_address;
        if (is_array($addr)) {
            return $addr['full_address'] ?? implode(', ', array_filter([
                $addr['street'] ?? null,
                $addr['ward'] ?? null,
                $addr['district'] ?? null,
                $addr['province'] ?? null,
            ]));
        }

        return (string) ($addr ?? '');
    }
}
