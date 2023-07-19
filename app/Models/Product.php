<?php

namespace App\Models;

use App\Models\User;
use App\Models\Metal;
use App\Models\Category;
use App\Models\Gemstone;
use App\Models\OrderItem;
use App\Models\ProductImage;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable;
    const FEATURE_PATH = 'backend/product/feature-images/';
    const ATTACHED_PATH = 'backend/product/attach-images/';
    protected $fillable = [
        'uuid',
        'category_id',
        'metal_id',
        'gemstone_id',
        'name',
        'desc',
        'long_desc',
        'feature_image',
        'quantity',
        'price',
        'discount_price',
        'sku',
        'slug',
        'status',
        'is_feature',
        'meta_keyword',
        'meta_description',
    ];
    public function CreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function UpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function wishlist()
    {
        if(!Auth::guard('customer')->check())
        {
            return $this->hasOne(WishlistItem::class)->where('customer_id', null);
        }
        return $this->hasOne(WishlistItem::class)->where('customer_id',Auth::guard('customer')->user()->id);
    }

    public static function getIdbyUuid($uuid)
    {
        $product=Product::where('uuid',$uuid)->select('id')->first();
        return $product?$product->id:'';
    }
    public static function getIdbyColName($col,$value)
    {
        $product=Product::where("$col",$value)->select('id')->first();
        return $product?$product->id:'';
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function metal()
    {
        return $this->belongsTo(Metal::class);
    }
    public function gemstone()
    {
        return $this->belongsTo(Gemstone::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name' // Replace 'title' with the attribute you want to use for generating the slug
            ]
        ];
    }
}
