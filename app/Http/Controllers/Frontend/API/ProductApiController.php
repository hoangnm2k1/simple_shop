<?php

namespace App\Http\Controllers\Frontend\API;

use App\Http\Controllers\Controller;
use App\Http\dto\ProductCate;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getNewProducts()
    {
        $newProducts = Product::latest('updated_at')->take(5)->get();
        return response()->json($newProducts);
    }

    public function getFeaturedProducts()
    {
        $featuredProducts = Product::take(5)->get();
        return response()->json($featuredProducts);
    }

    public function getDetailProduct($id)
    {
        $detailProduct = Product::with('Category')->find($id);
        return response()->json($detailProduct);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
