<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        if(!$users->all()) {
            $this->createDefault();
        }
        return view('users.index', [
            'users' => $users
        ]);
    }

    private function createDefault()
    {
        $user = User::create([
            'name' => 'Default Name',
            'email' => 'default@mail.com',
            'password' => '123',
            'role' => '0'
        ]);
        $user->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role']
        ]);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name' => ['sometimes', 'max:255'],
            'email' => ['sometimes', 'email'],
            'password' => ['sometimes',  Password::min(3)->sometimes()],
            'role' => ['required', 'boolean'],
        ]);

        $user = User::find($id);
        $user->name = $validator['name'];
        $user->email = $validator['email'];

        if(isset($validator['password'])) {
            $user->password = Hash::make($validator['password']);
        }
        $user->role = $validator['role'];
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
