<?php

namespace App\Observers;

use App\Models\OrderItem;
use Illuminate\Support\Str;

class OrderItemObserver
{
    public function creating(OrderItem $orderItem)
    {
        // $orderItem->created_by=Auth::id();
        $orderItem->uuid=Str::uuid();
    }
}
