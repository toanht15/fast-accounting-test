<?php

namespace App\Classes;

use GuzzleHttp\Client;

class ApiClient {
    private $apiDomain = 'https://api-sandbox.fastaccounting.jp/v1.5/';

    public function request($endpoint = 'receipt', $fileUrl)
    {
        $client = new Client();
        $response = $client->request('POST', $this->apiDomain . $endpoint, [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($fileUrl, 'r')
                ]
            ]
        ]);

        $response = $response->getBody()->getContents();

        $response = json_decode($response);

        return $response;
    }
}