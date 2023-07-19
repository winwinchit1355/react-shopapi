<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OrderApiController extends Controller
{
    use ResponseFormat, AuthenticatesUsers;

    protected $customer_id;
    public function __construct()
    {
        $this->customer_id=auth()->guard('customer_api')->id();
    }
    public function index(Request $request)
    {
        $orders=Order::with(['orderItems','orderItems.product'])->select([
            '*',
            DB::raw("DATE_FORMAT(invoice_date, '%M %d, %Y') AS invoiceDate"),
        ])->where('customer_id',$this->customer_id)->get();
        return  $this->apiSuccessResponse($orders,'Successfully',200);
    }

    public function getAllCartItems()
    {
        $cartitems=CartItem::with(['product','product.category','product.metal','product.gemstone'])
            ->where('customer_id',$this->customer_id)->get();
        return $cartitems;
    }
    public function completeOrder()
    {
        $cartitems=$this->getAllCartItems();
        try{
            DB::beginTransaction();
            $order=new Order;
            $order->customer_id=$this->customer_id;
            $order->invoice_no='INV'.date('YmdHis');
            $order->invoice_date=date('Y-m-d H:i:s');
            $order->total_products=1;
            $order->delivery_fee=0;
            $order->amount=0;
            $order->save();

            $totalOrderProduct=0;
            $totalAmount=0;
            foreach($cartitems as $cartItem)
            {
                if($cartItem->product->quantity < $cartItem->quantity)
                {
                    return  $this->apiErrorResponse($cartitems,'Not Enough Item','Not Enough Item');
                }

                $totalOrderProduct+=$cartItem->quantity;
                $totalAmount+=$cartItem->quantity*$cartItem->product->price;
                $orderItem=new OrderItem;
                $orderItem->order_id=$order->id;
                $orderItem->product_id=$cartItem->product_id;
                $orderItem->ordered_qty=$cartItem->quantity;
                $orderItem->sale_price=$cartItem->product->price;
                $orderItem->save();

                $originalQty=$cartItem->product->quantity;
                $orderQty=$cartItem->quantity;
                $subQuantity=(int)$originalQty-(int)$orderQty;
                $cartItem->product()->update([
                    'quantity'=>$subQuantity
                ]);

                $cartItem->delete();
            }
            $order->total_products=$totalOrderProduct;
            $order->amount=$totalAmount;
            $order->save();
            DB::commit();
            return  $this->apiSuccessResponse([],'Successfully order',200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->apiValidationErrorResponse($cartitems,'Data storage fail!',$e->getMessage(),500);
        }

    }
}
