<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MetalApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CartItemApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\GemstoneApiController;
use App\Http\Controllers\Api\WishListItemApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::resource('/categories', CategoryApiController::class);
Route::resource('/metals', MetalApiController::class);
Route::resource('/gemstones', GemstoneApiController::class);
Route::resource('/products', ProductApiController::class);
Route::get('/shop', [ProductApiController::class, "shop"]);
Route::get('/product-detail/{slug}', [ProductApiController::class, "productDetail"]);
Route::middleware('auth:customer_api')->group(function () {
    Route::resource('/cartitems', CartItemApiController::class);
    Route::get('/get-cartitem-count', [CartItemApiController::class, 'getCartItemCount']);
    Route::post('/add-to-cart', [CartItemApiController::class, 'addToCart']);
    Route::post('/remove-cart', [CartItemApiController::class, 'removeFromCart']);
    Route::post('/clear-cart', [CartItemApiController::class, 'clearCart']);
    Route::post('/update-cart', [CartItemApiController::class, 'updateCartList']);

    Route::post('/complete-order', [OrderApiController::class, 'completeOrder']);
    Route::get('/orderlist', [OrderApiController::class, 'index']);

    Route::resource('/wishlists', WishListItemApiController::class);
    // Route::get('/get-wishlistitems', [WishListItemApiController::class, 'getWishlistitems'])->name('get-wishlistitems');
    Route::get('/add-to-wishlist', [WishListItemApiController::class, 'addToWishlist'])->name('/add-to-wishlist');

    Route::get('/getuser', [AuthApiController::class, 'getUser']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});
