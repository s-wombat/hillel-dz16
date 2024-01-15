<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:50', 'email'],
            'password' => ['required', 'string', 'max:50'],
        ]);

        if(Auth::guard('web')->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('users.index');
        }

        return back()->withErrors(['email' => 'Wrong Login']);

    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'max:50', 'confirmed'],
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if($user) {
            Auth::guard('web')->login($user);
        }
        return redirect()->route('users.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
