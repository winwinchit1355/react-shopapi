<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'order_id',
        'product_id',
        'ordered_qty',
        'received_qty',
        'cancel_qty',
        'gift_qty',
        'sale_price',
        'promotion_price',
        'order_status',
    ];

    public static function getIdbyUuid($uuid)
    {
        $orderItem = OrderItem::where('uuid', $uuid)->select('id')->first();
        return $orderItem ? $orderItem->id : '';
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
