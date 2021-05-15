<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class AdminController extends Controller
{
    public function dashboard(){
        $accessToken = session()->get('accessToken');

        $baseUrl = "https://api.notion.com/v1/";
        $path = "search";
        $client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json',
                'Notion-Version' => '2021-05-13'
            ]
        ]);

        $response = $client->post($path, [
            RequestOptions::JSON => [
                'query' => 'Calendar x',
            ],
        ]);

        $body = (string)$response->getBody();
        $bodyAsArray = json_decode($body, true);

        dd($bodyAsArray);
    }
}
