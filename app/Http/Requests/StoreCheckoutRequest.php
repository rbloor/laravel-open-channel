<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
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
            'requires_shipping' => ['required', 'boolean'],
            'address_one' => ['required_if:requires_shipping,1', 'string', 'max:255'],
            'address_two' => ['nullable', 'string', 'max:255'],
            'city' => ['required_if:requires_shipping,1', 'string', 'max:255'],
            'county' => ['required_if:requires_shipping,1', 'string', 'max:255'],
            'postcode' => ['required_if:requires_shipping,1', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'address_one.required_if' => 'Please enter address line 1',
            'city.required_if' => 'Please enter city',
            'county.required_if' => 'Please enter county',
            'postcode.required_if' => 'Please enter postcode',
        ];
    }
}
