<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SocialController extends Controller
{
    public function facebook(Request $request)
    {
        $client_id = env('FACEBOOK_CLIENT_ID');
        $redirect_uri = env('FACEBOOK_REDIRECT_URI');
        $client_secret = env('FACEBOOK_CLIENT_SECRET');
        $code = $request->get('code');

        $response = Http::get("https://graph.facebook.com/v18.0/oauth/access_token?client_id=".$client_id."&&redirect_uri=".$redirect_uri."&&client_secret=".$client_secret."&&code=".$code);

        // dd($response->json());
        $input_token = $response->json('access_token');
        $access_token = env('FACEBOOK_CLIENT_ID') . "|" . env('FACEBOOK_CLIENT_SECRET');
        $checkAccessToken = Http::get("graph.facebook.com/debug_token?input_token=".$input_token."&&access_token=".$access_token);

        dd($checkAccessToken->body());
    }
}
