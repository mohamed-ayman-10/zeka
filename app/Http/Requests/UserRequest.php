<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:users,email,' . $this->id,
            'phone' => 'required|string|unique:users,phone,' . $this->id,
            'address' => 'nullable|string',
            'image' => 'nullable|image',
            'password' => 'nullable|string|confirmed|min:6',
        ];
    }
}
