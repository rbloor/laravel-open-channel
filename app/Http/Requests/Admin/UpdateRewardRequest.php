<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRewardRequest extends FormRequest
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
            'filename' => ['nullable', 'max:2048', 'exclude'],
            'points' => ['required', 'integer'],
            'is_published' => ['required', 'boolean'],
            'is_physical' => ['required', 'boolean'],
            'reward_category_id' => ['required', 'numeric', 'exists:reward_categories,id'],
        ];
    }
}
