<?php

namespace App\Http\Controllers\Frontend\API;

use App\Http\Controllers\Controller;
use App\Http\dto\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() {
    }

    public function addCart(Request $req, $id, $quantity) {
        $product = Product::find($id);
        if ($product) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id, $quantity);
            $req->session()->put('Cart', $newCart);
            // dd($newCart);
            $cartData = [
                'products' => $newCart->products,
                'totalPrice' => $newCart->totalPrice,
                'totalQuantity' => $newCart->totalQuantity,
            ];
            return response()->json($cartData);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function getCart(Request $req) {
        $cart = $req->session()->get('Cart');
        if ($cart) {
            // $products = [];
            // foreach ($cart->products as $details) {
            //     $products[] = $details;
            // }
            $cartData = [
                // 'products' => $products,
                'products' => array_values($cart->products),
                'totalPrice' => $cart->totalPrice,
                'totalQuantity' => $cart->totalQuantity,
            ];
            return response()->json($cartData);
        }
        return response()->json(['error' => 'Cart is empty'], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if (count($newCart->products)) {
            $req->session()->put('Cart', $newCart);
        }
        else {
            $req->session()->forget('Cart');
        }
        // $cartHTML = view('frontend.api.cart', ['cart' => $newCart])->render();
        // return response()->json(['cartHTML' => $cartHTML]);
        return response()->json(['success' => 'delete successfully'], 200);
    }

}
