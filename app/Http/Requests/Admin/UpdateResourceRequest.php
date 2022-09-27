<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
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
            'is_external' => ['required', 'boolean'],
            'is_published' => ['required', 'boolean'],
            'filename' => ['nullable', 'max:2048', 'exclude'],
            'download' => ['nullable', 'max:2048', 'exclude'],
            'url' => ['nullable', 'string'],
        ];
    }
}
