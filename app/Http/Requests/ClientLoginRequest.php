<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientLoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                "name" => ['required', 'min:8', 'string', 'max:255'],
                "email" => ['required','email', 'max:255', 'unique:users,email'],
                "password" => ['required', 'string', 'min:8', 'max:30', 'confirmed'],
                "avatar"=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
