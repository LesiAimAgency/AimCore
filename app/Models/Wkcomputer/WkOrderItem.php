<?php

namespace App\Models\Wkcomputer;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WkOrderItem extends OrderItem
{
    protected $table = 'order_items';

    public function order(): BelongsTo
    {
        return $this->belongsTo(WkOrder::class, 'order_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(WkProduct::class, 'product_id');
    }
}
