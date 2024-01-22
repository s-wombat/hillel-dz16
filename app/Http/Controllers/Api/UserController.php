<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        if(!$users->all()) {
            $this->createDefault();
        }
        return response()->json($users);
    }

    private function createDefault()
    {
        $user = User::create([
            "name" => "Default Name",
            "email" => "default@mail.com",
            "password" => "123",
            "role" => "0"
        ]);
        $user->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['sometimes', 'max:255'],
            'email' => ['sometimes', 'email'],
            'password' => ['sometimes',  Password::min(3)->sometimes()],
            'role' => ['required', 'boolean'],
        ]);

        $user = User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'password' => Hash::make($validator['password']),
            'role' => $validator['role']
        ]);
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        return response()->json($user);
    }

    public function showEvents(Request $request)
    {
        $events = User::where("email", $request->email)->first()->events;

        return response()->json($events);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => ['sometimes', 'max:255'],
            'email' => ['sometimes', 'email'],
            'emailNew' => ['sometimes', 'email'],
            'password' => ['sometimes',  Password::min(3)->sometimes()],
            'role' => ['required', 'boolean'],
        ]);

        $user = User::where('email', $validator['email'])->first();

        if (!$user) {
            return 'wrong email';
        }

        $user->name = $validator['name'];
        $user->email = $validator['emailNew'];

        if(isset($validator['password'])) {
            $user->password = Hash::make($validator['password']);
        }
        $user->role = $validator['role'];
        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return 'wrong email';
        }
        $user->delete();
        return 'deleted success!';
    }
}
