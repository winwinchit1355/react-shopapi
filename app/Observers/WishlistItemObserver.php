<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;

class WishlistItemObserver
{
    public function creating(WishlistItem $wishlist)
    {
        // $wishlist->created_by=Auth::id();
        $wishlist->uuid=Str::uuid();
    }
}
