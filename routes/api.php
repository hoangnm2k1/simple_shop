<?php

use App\Http\Controllers\Dashboard\Api\CategoryApiController;
use App\Http\Controllers\dashboard\Api\ProductApiController;
use App\Http\Controllers\Frontend\API\CartApiController;
use App\Http\Controllers\Frontend\API\ListCartApiController;
use App\Http\Controllers\Frontend\API\ProductApiController as APIProductApiController;
// use App\Http\Controllers\Frontend\API\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//làm cái ảnh default không chọn ảnh


Route::get("/admin", function () {
    return view('dashboard.product.api.list_api');
});

Route::get("/api", function () {
    return view('frontend.api.index');
});

Route::get('/product', [ProductApiController::class, "listProducts"]);
Route::post('/product', [ProductApiController::class, 'store']);
Route::get('/product/{id}', [ProductApiController::class, 'show']);
Route::post('/product/{id}', [ProductApiController::class, 'update']);
Route::delete('/product/{id}', [ProductApiController::class, 'destroy']);

Route::get('/new-products', [App\Http\Controllers\Frontend\API\ProductApiController::class, 'getNewProducts']);
Route::get('/featured-products', [App\Http\Controllers\Frontend\API\ProductApiController::class, 'getFeaturedProducts']);
Route::get('/detail-product/{id}', [App\Http\Controllers\Frontend\API\ProductApiController::class, 'getDetailProduct']);

Route::get('/category', [CategoryApiController::class, 'index']);
Route::get('/cart', [CartApiController::class, 'getCart']);
Route::get('/cart/{id}/{quantity}', [CartApiController::class, 'addCart']);
Route::get('/cart-delete-item/{id}', [CartApiController::class, 'destroy']);

Route::get('/list-cart', [ListCartApiController::class, 'index'])->name('listCart.index');
Route::get('/list-cart-delete-item/{id}', [ListCartApiController::class, 'destroy']);
Route::get('/list-cart-update-item/{id}/{quantity}', [ListCartApiController::class, 'update']);
Route::post('/list-cart-update-all', [ListCartApiController::class, 'updateAll']);
Route::get('/list-cart-delete-all', [ListCartApiController::class, 'deleteAll']);




