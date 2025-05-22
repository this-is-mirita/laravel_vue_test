<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'обязательно для заполнения ',
            'name.string' => 'емаил должен быть строкой ',
            'email.required' => 'обязательно для заполнения ',
            'email.string' => 'емаил должен быть строкой ',
            'email.email' => 'почта должна быть в формате xxxx@xxxx.xx ',
            'email.unique' => 'пользователь с таким емаил уже существует',
        ];
    }
}
