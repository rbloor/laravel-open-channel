<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'code' => ['required', 'string'],
            'uuid' => ['required', 'string', Rule::unique('products', 'uuid')],
            'points' => ['required', 'integer'],
            'filename' => ['nullable', 'max:2048', 'exclude'],
            'is_published' => ['required', 'boolean'],
            'product_category_id' => ['required', 'numeric', 'exists:product_categories,id'],
        ];
    }
}
