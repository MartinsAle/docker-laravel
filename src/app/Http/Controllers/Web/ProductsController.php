<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function show()
    {
        $products = $this->productsService->getProducts();
        // $request = Request::create('/api/products', 'GET');
        // $response = Route::dispatch($request);

        // $responseBody = json_decode($response->getContent(), true);        
        
        // $products = $responseBody["data"][0];
        // dd($products);

        return view('products')->with([
            'products' => $products,
        ]);
    }
}
