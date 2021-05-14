<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class AdminController extends Controller
{
    public function dashboard(){
        $accessToken = session()->get('accessToken');
        $baseUrl = "https://api.notion.com/v1/";
        $accessTokenPath = "search";
        $client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json',
            ]
        ]);

        $response = $client->post($accessTokenPath, [
            'form_params' => [
                'direction' => 'ascending',
                'timestamp' => 'last_edited_time',
                'property' => 'page'
            ],
        ]);

        $body = (string)$response->getBody();
        $bodyAsArray = json_decode($body, true);

        dd($bodyAsArray);
    }
}
