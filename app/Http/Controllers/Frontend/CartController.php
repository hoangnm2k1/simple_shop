<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_detail;
use App\Services\ICartDetailService;
use App\Services\ICartService;
use App\Services\IProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cartService;
    private $cartDetailService;
    private $productService;

    public function __construct(ICartService $cartService, IProductService $productService, ICartDetailService $cartDetailService)
    {
        $this->cartService = $cartService;
        $this->cartDetailService = $cartDetailService;
        $this->productService = $productService;
    }

    public function addToCart($id) {
        $token = Session::get('_token');
        $cart = Cart::where('token', $token)->first();
        $this->cartService->addToCart($id, $token);
        $cart->total = $cart->cartDetails->sum(('price * quantity'));
        $cart->save();
        return redirect()->back()->with('success', 'Add successfully');
    }

    public function showCart() {
        $token = Session::get('_token');
        $cart = $this->cartService->getCartByToken($token);
        return view('frontend.cart', compact('cart'));
    }

    public function updateCartDetail(Request $request)
    {
        $cart = $this->cartService->updateCart($request);
        // return view('frontend.cart', compact('cart'));
    }

    public function deleteCart($id) {
        $cartDetail = Cart_detail::find($id);
        $cartDetail->delete();
        return redirect('/cart');
    }

    public function showCheckout() {
        return view('frontend.checkout');
    }

    public function pay() {
        $cart = $this->cartService->getCartByToken(Session::get('_token'));
        $cart->status = 'paid';
        $cart->save();
        return redirect('/cart/checkout');
    }
}
