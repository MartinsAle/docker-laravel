<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function index()
    {
        $products = $this->productsService->getProducts();

        return view('products')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function publishProduct(Request $request){
        $rules = [
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'slug' => 'required|image',
        ];

        $productData = $this->validate($request, $rules);

        if($request->file('slug')){
            $file = $request->file('slug');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $productData['slug'] = $filename;
        }

        $productData = $this->productsService->postProducts($productData);

        return redirect()->route('index');
    }

    public function showProduct($slug, $id)
    {
        $product = $this->productsService->getProduct($id);

        return view('product', compact('product'));
    }
}
