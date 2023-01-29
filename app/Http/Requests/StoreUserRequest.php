<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return my('id') === 1; // TODO : create Roles, update this
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'     => 'alpha|max:255',
            'email'    => 'email|max:255|unique:users',
            'password' => [ 'required', 'confirmed', Password::defaults() ],
        ];
    }
}
