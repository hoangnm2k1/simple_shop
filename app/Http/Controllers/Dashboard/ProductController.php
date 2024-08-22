<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ICategoryService;
use App\Services\Impl\ProductServiceImpl;
use App\Services\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private IProductService $productService;
    private ICategoryService $categoryService;

    public function __construct(IProductService $productService, ICategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function listProducts() {
        // $products = $this->productService->getAllProducts();
        // return view('dashboard.product.list', compact('products'));
        return view('dashboard.product.api.list_api');
    }

     public function saveProduct(ProductRequest $request)
    {
        // $products = $this->productService->addProduct($request);
        // return view('dashboard.product.list', compact('products'));
        return view('dashboard.product.api.list_api');
    }
    public function showCreateProduct()
    {
        // $categories = Category::all();
        $categories = $this->categoryService->getCategories();
        return view('dashboard.product.create', compact('categories'));
    }

    public function showEditProduct($id) {
        // $product = Product::where('id', $id)->first();
        // $categories = Category::all();
        $product = $this->productService->getProductById($id);
        $categories = $this->categoryService->getCategories();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

        public function updateProduct(ProductRequest $request ,$id) {

        //   $productUpdate = Product::find($id);

        //    $productUpdate->name = $request->name;
        //    $productUpdate->price = $request->price;
        //    $productUpdate->category_id = $request->category_id;
        //    $productUpdate->img_url = $request->image;

        //    $file = $request->image;
        //    $file_extension = $file->getClientOriginalExtension();
        //    $file_name = 'image_' . uniqid() . '.' . $file_extension;
        //    $file->move(public_path('uploads'), $file_name);
        //    $request->merge(['image' => $file_name]);

        //    $productUpdate->img_url = $file_name;

        //    $productUpdate->save();

            $this->productService->editProduct($request, $id);
           return redirect('/admin/product/list');
        }

        public function deleteProduct($id) {
            // $productDelete = Product::find($id);
            // $productDelete->delete();
            $this->productService->delProduct($id);
            return redirect('admin/product/list');
            // return view('dashboard.product.api.list_api');
        }
}
