<?php

namespace App\Http\Controllers\dashboard\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\ProductCate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductApiController extends Controller {
    public function listProducts() {
        $products = Product::all();
        $productCates = [];
        foreach ($products as $product) {
            $temp = new ProductCate($product->id, $product->name,$product->price, $product->category->id, $product->category->name, $product->create_at, $product->update_at, $product->img_url);
            $productCates[] = $temp;
        }

        return response()->json($productCates);
    }
    public function store(Request $request)
    {
        // $product = Product::create($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $imageName = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('dashboard/uploads'), $imageName);
            $product->img_url = $imageName;
            } else {
                $product->img_url = 'image_default.jpg';
            }
        $product->save();

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        if($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $imageName = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('dashboard/uploads'), $imageName);
            $product->img_url = $imageName;
        }

        // $product->update($product->toArray());
        $product->save();
        return response()->json($product);
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->img_url != 'image_default.jpg') {
            $path = public_path('dashboard/uploads/'.$product->img_url);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $product->delete();
        return response()->json(null, 204);
    }
}
