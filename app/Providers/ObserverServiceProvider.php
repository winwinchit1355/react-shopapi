<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\WishlistItem;
use App\Observers\CartItemObserver;
use App\Observers\WishlistItemObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        CartItem::observe(CartItemObserver::class);
        WishlistItem::observe(WishlistItemObserver::class);
    }
}
