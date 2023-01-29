<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'string|min:1|max:255|unique:categories',
            'slug' => 'alpha_dash|min:3|max:255|unique:categories',
        ];
    }
}
