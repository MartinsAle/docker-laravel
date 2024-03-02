<?php

namespace App\Http\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices
{
	public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [])
	{
		$client = new Client([
			'base_uri' => $this->baseUri
		]);

		$response = $client->request($method, $requestUrl, [
			'query' => $queryParams,
			'form_params' => $formParams,
			'headers' => $headers
		]);

		$response = $response->getBody()->getContents();

		if(method_exists($this, 'decodeResponse')){
			$response = $this->decodeResponse($response);
		}

		return $response;
	}
    
}