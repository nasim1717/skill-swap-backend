<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    // public function authorize(): bool
    // {
    //     return true;
    // }

    public function rules(): array
    {
        return [
            "full_name" => "required|string|max:200",
            "email"     => "required|email|unique:users,email",
            "password"  => "required|string|min:4|confirmed",
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Name is required',
            'email.required'     => 'Email is required',
            'email.email'        => 'Invalid email address',
            'email.unique'       => 'Email already exists',
            'password.required'  => 'Password is required',
            'password.min'       => 'Password must be at least 4 characters',
            'password.confirmed' => 'Password confirmation does not match',
        ];
    }
}
