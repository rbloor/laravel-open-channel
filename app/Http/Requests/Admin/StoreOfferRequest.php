<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'name' => ['required'],
            'url' => ['required', 'string'],
            'filename' => ['nullable', 'max:2048', 'exclude'],
            'is_public' => ['required', 'boolean'],
            'is_published' => ['required', 'boolean'],
        ];
    }
}
