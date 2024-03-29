<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(10);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        return response()->json($product);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        
        $product = $this->product->create($data);
        
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $product = $this->product->find($id);
        $product->update($data);

        return response()->json($product);
        
    }

    public function delete($id)
    {
        
        $product = $this->product->find($id);
        $image = public_path('images/' . $product->getOriginal('slug'));
        if(file_exists($image)) {
         unlink($image);
        }
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto foi removido com sucesso']]);
        
    }
}
