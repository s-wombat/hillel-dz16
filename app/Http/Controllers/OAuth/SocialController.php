<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SocialController extends Controller
{
    public function facebook(Request $request)
    {
        $clientId = env('FACEBOOK_CLIENT_ID');
        $redirectUri = env('FACEBOOK_REDIRECT_URI');
        $clientSecret = env('FACEBOOK_CLIENT_SECRET');
        $code = $request->get('code');

        $response = Http::get("https://graph.facebook.com/v18.0/oauth/access_token?client_id=".$clientId."&&redirect_uri=".$redirectUri."&&client_secret=".$clientSecret."&&code=".$code);

        $inputToken = $response->json('access_token');
        if (null === $inputToken) {
            return redirect()->route('login')->withErrors('common_error', 'Something goes wrong');
        }
        $accessToken = env('FACEBOOK_CLIENT_ID') . "|" . env('FACEBOOK_CLIENT_SECRET');
        $checkAccessToken = Http::get("graph.facebook.com/debug_token?input_token=".$inputToken."&&access_token=".$accessToken);

        $dataUser = $checkAccessToken->json("data");
        $userEmail = $dataUser["user_id"] . "@facebook.com";

        $user = User::query()->updateOrCreate([
            "email" => $userEmail,
            ], [
            "name" => $dataUser["user_id"],
            "password" => Hash::make($dataUser["user_id"]),
            "role" => 0
        ]);

        if ($user === null) {
            return redirect()->route("login");
        }

        Auth::guard('web')->login($user);

        return redirect()->route('welcome');
    }
}
