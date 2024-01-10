<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:users', 'email', 'string'],
            'password' => ['required', Password::min(3)],
            'password_confirmation' => ['required', Password::min(3)],
            'role' => ['required', 'boolean'],
        ];
    }

    /**
     * Надстройка экземпляра валидатора.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
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
    }

    private function checkPassword($request)
    {
        if ($request['password'] === $request['password_confirmation']) {
            return true;
        }
        return false;
    }
}
