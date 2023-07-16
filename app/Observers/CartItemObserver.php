<?php

namespace App\Observers;

use App\Models\CartItem;
use Illuminate\Support\Str;

class CartItemObserver
{
    public function creating(CartItem $cartitem)
    {
        // $cartitem->created_by=Auth::id();
        $cartitem->uuid=Str::uuid();
    }
}
