<?php

namespace App\Http\Requests\Auth;

class RegistrationRequest extends LoginRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'     => 'required',
            'email'    => 'required|email|max:255',
            'password' => [ 'required', 'confirmed' ],
        ];
    }
}
