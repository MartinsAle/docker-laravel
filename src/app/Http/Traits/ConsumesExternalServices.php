<?php

namespace App\Http\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices
{
	public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $hasFile = false)
	{
		$client = new Client([
			'base_uri' => $this->baseUri
		]);

		$bodyType = 'form_params';

		if($hasFile){
			$bodyType = 'multipart';

			$multipart = [];

			foreach($formParams as $name => $contents)
			{
				$multipart[] = ['name' => $name, 'contents' => $contents];
			}
		}

		$response = $client->request($method, $requestUrl, [
			'query' => $queryParams,
			$bodyType => $hasFile ? $multipart : $formParams,
			'headers' => $headers
		]);

		$response = $response->getBody()->getContents();

		if(method_exists($this, 'decodeResponse')){
			$response = $this->decodeResponse($response);
		}

		return $response;
	}
    
}
