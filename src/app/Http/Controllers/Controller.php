<?php

namespace App\Http\Controllers;

use App\Services\ProductsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
	
    protected $productsService;
    
    public function __construct(ProductsService $productsService)
	{
        $this->productsService = $productsService;
	}

    
}
