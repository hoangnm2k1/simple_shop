<?php

namespace App\Services\Impl;

use App\Models\Cart;
use App\Models\Cart_detail;
use App\Models\Product;
use App\Services\ICartDetailService;
use App\Services\ICartService;
use App\Services\IProductService;

class CartServiceImpl implements ICartService {

    private $cartDetailService;
    private $productService;

    public function __construct(ICartDetailService $cartDetailService, IProductService $productService)
    {
        $this->cartDetailService = $cartDetailService;
        $this->productService = $productService;
    }


    public function findCartByToken($token) {
        return Cart::where('token', $token)->first();
    }

    public function addToCart($id, $token) {
        $cartDetail = null;
        $cart = $this->findCartByToken($token);

        if (!isset($cart)) {
            $cart = new Cart();
            $cart->save();
        }

        $cartDetail = $this->cartDetailService->findCartDetailBy($id, $cart->id);
        if(isset($cartDetail)) {
            $cartDetail->quantity = $cartDetail->quantity + 1;
        }else{
            $cartDetail = new Cart_detail();
            $cartDetail->product_id = $id;
            $cartDetail->cart_id = $cart->id;
            $cartDetail->quantity = 1;

            $product = Product::find($id);
            $cartDetail->price = $product->price;
        }
        $cartDetail->save();



    }

    public function getCartByToken($token)
    {
        return Cart::where('token', $token)->first();
    }

    public function updateCart($request)
    {

        $cart = $this->getCartByToken($request->token);
        $cartDetail = Cart_detail::find($request->id);
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        $cart->total = $cart->cartDetails->sum(('price * quantity'));
        $cart->save();
        return $cart;
    }

}

?>

<!--     public function addToCart($id);
    public function showCart();
 -->
