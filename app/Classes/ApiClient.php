<?php

namespace App\Classes;

use GuzzleHttp\Client;

class ApiClient {
    private $apiDomain = 'https://api-sandbox.fastaccounting.jp/v1.3/convert_to_jpg';

    public function convertPdf($fileUrl)
    {
        $client = new Client();
        $response = $client->request('POST', $this->apiDomain, [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($fileUrl, 'r')
                ]
            ]
        ]);

        return $response;
    }
}