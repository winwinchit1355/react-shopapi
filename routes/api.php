<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MetalApiController;
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

    Route::get('get-cartitems', [CartItemApiController::class, 'getCartitems'])->name('get-cartitems');
    Route::get('add-to-cart', [CartItemApiController::class, 'addToCart'])->name('add-to-cart');

    Route::get('get-wishlistitems', [WishListItemApiController::class, 'getWishlistitems'])->name('get-wishlistitems');
    Route::get('add-to-wishlist', [WishListItemApiController::class, 'addToWishlist'])->name('add-to-wishlist');

    Route::get('getuser', [AuthApiController::class, 'getUser']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});
