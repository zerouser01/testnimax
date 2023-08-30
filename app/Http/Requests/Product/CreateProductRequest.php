<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|unique:App\Models\Product,name|max:50',
            'description' => 'string|max:100',
            'price' => 'numeric',
            'categories' => 'string|min:3',
            'is_published' => 'boolean',
            'is_deleted' => 'boolean',
        ];
    }
}
