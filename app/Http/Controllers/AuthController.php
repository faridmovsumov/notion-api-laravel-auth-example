<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getToken(Request $request)
    {
        if (empty($code = $request->input('code'))) {
            abort(400, 'code is required parameter');
        }

        $baseUrl = "https://api.notion.com/v1/oauth/";
        $accessTokenPath = "token";;
        $client = new Client([
            'base_uri' => $baseUrl,

        ]);

        $response = $client->post($accessTokenPath, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => route('getToken')
            ],
            'auth' => [
                config('notion.client_id'),
                config('notion.client_secret')
            ]
        ]);

        $body = (string)$response->getBody();
        $bodyAsArray = json_decode($body, true);

        $accessToken = $bodyAsArray['access_token'];
        session()->put('accessToken', $accessToken);

        return redirect()->route('dashboard');
    }
}
