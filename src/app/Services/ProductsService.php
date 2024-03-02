<?php

namespace App\Services;

use App\Http\Traits\ConsumesExternalServices;

class ProductsService
{
    use ConsumesExternalServices;
	
    protected $baseUri;

    public function __construct()
	{
        $this->baseUri = config('services.product.base_uri');
	}

    public function decodeResponse($response)
    {
        $decodedResponse = json_decode($response);

        return $decodedResponse->data ?? $decodedResponse;
    }

    public function getProducts()
    {
        return $this->makeRequest('GET', 'products');
    }
}