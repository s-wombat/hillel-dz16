<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    private function checkPassword($request)
    {
        if ($request['password'] === $request['password_confirmation']) {
            return true;
        }
            return false;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(3)],
            'password_confirmation' => ['required', Password::min(3)],
            'role' => ['required', 'boolean'],
        ]);

        $validator->after(function ($validator) {
            if (!$this->checkPassword($validator->validated())) {
                $validator->errors()->add(
                    'password', 'Password not confirmated!'
                );
            }
        });

        if ($validator->fails()) {
            return redirect('users/create')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
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
            'email' => ['sometimes',  'email'],
            'password' => ['sometimes',  Password::min(3)->sometimes()],
            'role' => ['required', 'boolean'],
        ]);

        $user = User::find($id);
        $user->name = $validator['name'];
        $user->email = $validator['email'];

        if(isset($validator['password'])) {
            $user->password = $validator['password'];
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
