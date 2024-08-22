<?php

namespace App\Http\Controllers\Frontend\API;

use App\Http\Controllers\Controller;
use App\Http\dto\Cart;
use App\Models\Cart as ModelsCart;
use Illuminate\Http\Request;

class ListCartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.api.list-cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id, $quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id, $quantity);
        $req->session()->put('Cart', $newCart);

    //  return view('frontend.api.list-cart');

    return response()->json(['success' => true]);
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

    //  return view('frontend.api.list-cart');
    return response()->json(['success' => true]);

    }

    public function updateAll(Request $request) {
        $data = $request->data;
        foreach ($data as $item) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->updateItemCart($item['key'], $item['value']);
            $request->session()->put('Cart', $newCart);
        }

    }

    public function deleteAll(Request $request) {
        $data = $request->data;
        foreach ($data as $item) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->deleteItemCart($item['key']);
            $request->session()->put('Cart', $newCart);
        }
    }
}
