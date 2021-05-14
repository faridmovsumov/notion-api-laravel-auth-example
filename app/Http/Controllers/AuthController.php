<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getToken(Request $request){
        dump($request->all());exit;
    }
}
