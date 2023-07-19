<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CartItemApiController extends Controller
{
    use ResponseFormat, AuthenticatesUsers;
    public function index(Request $request)
    {
        $cartitems=$this->getAllCartItems();
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
        $cartitems=$this->getAllCartItems();
        return  $this->apiSuccessResponse($cartitems,'Successfully add to cart',200);

    }
    public function removeFromCart(Request $request)
    {
        $cartitem = CartItem::where('uuid', $request->id)->delete();
        $cartitems=$this->getAllCartItems();
        return  $this->apiSuccessResponse($cartitems,'Successfully remove item',200);
    }
    public function clearCart()
    {
        $customer_id = Auth::guard('customer_api')->id();
        $cartitem = CartItem::where('customer_id', $customer_id)->delete();
        $cartitems=$this->getAllCartItems();
        return  $this->apiSuccessResponse($cartitems,'Successfully remove all items',200);
    }
    public function updateCartList(Request $request)
    {
        // return  $this->apiSuccessResponse($request->quantity,'Successfully updated',200);
        foreach ($request->quantity as  $data) {
            $cartitem = CartItem::where('uuid', $data['id'])->first();
            $cartitem->quantity = $data['quantity'];
            $cartitem->update();
        }
        $cartitems=$this->getAllCartItems();
        return  $this->apiSuccessResponse($cartitems,'Successfully updated',200);
    }
    public function getAllCartItems()
    {
        $customer_id = auth()->guard('customer_api')->id();
        $cartitems=CartItem::with(['product','product.category','product.metal','product.gemstone'])
            ->where('customer_id',$customer_id)->get();
        return $cartitems;
    }
}
