<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\WishlistItem;
use App\Observers\OrderObserver;
use App\Observers\CartItemObserver;
use App\Observers\OrderItemObserver;
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
        Order::observe(OrderObserver::class);
        OrderItem::observe(OrderItemObserver::class);
    }
}
