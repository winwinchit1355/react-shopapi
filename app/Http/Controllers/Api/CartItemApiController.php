<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CartItemApiController extends Controller
{
    use ResponseFormat, AuthenticatesUsers;
    public function index(Request $request)
    {
        $customer_id = auth()->guard('customer_api')->id();
        $cartitems=CartItem::where('customer_id',$customer_id)->get();
        return  $this->apiSuccessResponse($cartitems,'Successfully',200);
    }
    public function getCartItemCount(Request $request)
    {
        $customer_id = auth()->guard('customer_api')->id();
        $count=CartItem::where('customer_id',$customer_id)->count();
        return  $this->apiSuccessResponse($count,'Successfully',200);
    }
    public function addToCart(Request $request)
    {

        //need to check validation here
        $customer_id = auth()->guard('customer_api')->user()->id;

        $product = Product::where('uuid', $request->id)->select('id', 'quantity')->first();

        $exists = CartItem::where([['customer_id', $customer_id], ['product_id', $product->id]])->first();
        if ($exists) {
            $total = $exists->quantity + $request->quantity;
            //check available product quantity
            if ($total > $product->quantity) {
                return  $this->apiSuccessResponse($request->all(),'Not enough items.',200);
            }
            $exists->update([
                'quantity' => $total
            ]);

        } else {

            $cart = new CartItem();
            $cart->product_id = $product->id;
            $cart->customer_id = $customer_id;
            $cart->quantity = $request->quantity;
            $cart->save();

        }
        $cartitems=CartItem::where('customer_id',$customer_id)->get();
        return  $this->apiSuccessResponse($cartitems,'Successfully add to cart',200);

    }
}
