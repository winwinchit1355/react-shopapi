<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;

class WishListItemApiController extends Controller
{
    use ResponseFormat;
    public function index(Request $request)
    {
        $customer_id = auth()->guard('customer')->id();
        $wishlists=WishlistItem::where('customer_id',$customer_id)->get();
        return  $this->apiSuccessResponse($wishlists,'Successfully',200);
    }
    public function addToWishlist(Request $request)
    {
        //need to check validation here
        $customer_id = auth()->guard('customer_api')->user()->id;
        $product_id=Product::getIdbyUuid($request->id);
        $exists = WishlistItem::where([['product_id',$product_id],['customer_id',$customer_id]])->exists();
        if (!$exists) {

            $wishlist=new WishlistItem();
            $wishlist->product_id=$product_id;
            $wishlist->customer_id=$customer_id;
            $wishlist->save();
        }
        $wishlists=WishlistItem::where('customer_id',$customer_id)->get();
        return  $this->apiSuccessResponse($wishlists,'Successfully add to wishlist',200);
    }
}
