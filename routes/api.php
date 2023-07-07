<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MetalApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\GemstoneApiController;

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
Route::resource('/categories', CategoryApiController::class);
Route::resource('/metals', MetalApiController::class);
Route::resource('/gemstones', GemstoneApiController::class);
Route::resource('/products', ProductApiController::class);
Route::get('/shop', [ProductApiController::class, "shop"]);
Route::get('/product-detail/{slug}', [ProductApiController::class, "productDetail"]);
