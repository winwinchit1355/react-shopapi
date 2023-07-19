<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'customer_id',
        'product_id',
        'quantity',
    ];
    public static function getIdbyUuid($uuid)
    {
        $cartItem=CartItem::where('uuid',$uuid)->select('id')->first();
        return $cartItem?$cartItem->id:'';
    }
    public static function getIdbyColName($col,$value)
    {
        $cartItem=CartItem::where("$col",$value)->select('id')->first();
        return $cartItem?$cartItem->id:'';
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
