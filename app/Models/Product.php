<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable;

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
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
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
