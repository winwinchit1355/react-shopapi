<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    const PENDING = 'pending'; //initial state (invoice date)
    const CONFIRM = 'confirm'; //admin confirm
    const SHIPPED = 'shipped'; //hand over to the shipped carrier
    const DELIVERED = 'delivered'; //customer has received the order
    const CANCELLED = 'cancelled';
    const ONHOLD = 'onhold'; //due to some condition, the order is delay
    const ALL = 'all'; //all list

    const PAID = 'paid';
    const UNPAID = 'unpaid';
    const REFUNDED = 'refunded';
    protected $fillable = [
        'uuid',
        'customer_id',
        'invoice_date',
        'estimated_delivery_time',
        'confirm_date',
        'shipping_date',
        'delivered_date',
        'cancelled_date',
        'refunded_date',
        'onhold_date',
        'payment_method',
        'invoice_no',
        'shipping_method',
        'total_products',
        'total_gifts',
        'amount',
        'delivery_fee',
        'paid_amount',
        'tax_amount',
        'discount_amount',
        'order_status',
        'payment_status',
        'customer_note',
        'remark',
        'reason',
    ];
    public static function getIdbyUuid($uuid)
    {
        $township = Order::where('uuid', $uuid)->select('id')->first();
        return $township ? $township->id : '';
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
