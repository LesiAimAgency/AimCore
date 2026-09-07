<?php

namespace App\Models\Wkcomputer;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WkOrder extends Order
{
    public function items(): HasMany
    {
        return $this->hasMany(WkOrderItem::class, 'order_id');
    }

    public static function generateOrderNumber(): string
    {
        return 'WKC-'.strtoupper(uniqid());
    }
}
