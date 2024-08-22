<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\frontend\ProductFrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [ProductFrontendController::class, "indexProducts"])->name("indexProducts");
Route::get("/cart", [CartController::class, "showCart"])->name("cart.showCart");
Route::get("/cart/add-to-cart/{id}", [CartController::class, "addToCart"])->name("cart.addToCart");
Route::get('/cart/update-cart', [CartController::class, 'updateCartDetail'])->name("cart.updateCart");
Route::get('/cart/delete-cart/{id}', [CartController::class, 'deleteCart'])->name("cart.deleteCart");
Route::get('/cart/checkout', [CartController::class, 'showCheckout'])->name("cart.showCheckout");
Route::post('/cart/checkout/pay', [CartController::class, 'pay'])->name("cart.showCheckout.pay");

Route::prefix('admin')->group(function () {
    Route::get("/product/create", [ProductController::class, "showCreateProduct"])->name("product.showCreateProduct");
    Route::post("/product/create", [ProductController::class, "saveProduct"])->name("product.saveProduct");
    Route::get("/product/list", [ProductController::class, "listProducts"])->name("product.listProducts");
    Route::get("/product/edit/{id}", [ProductController::class, "showEditProduct"])->name("product.showEditProduct");
    Route::post("/product/edit/{id}", [ProductController::class, "updateProduct"])->name("product.updateProduct");
    Route::get("/product/delete/{id}", [ProductController::class, "deleteProduct"])->name("product.deleteProduct");
});

Route::prefix('dashboard')->group(function () {
    Route::get("/product/list", [ProductController::class, "listProducts"])->name("product.listProducts");
});

Route::get("/api", function () {
    return view('frontend.api.index');
});
