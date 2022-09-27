<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateMembershipInformation
{
    /**
     * Validate and update the given user's membership information.
     *
     * @param  mixed  $membership
     * @param  array  $input
     * @return void
     */
    public function update($membership, array $input)
    {
        Validator::make($input, [
            'telephone' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'tax_region' => ['required', 'string', 'max:255'],
            'tax_bracket' => ['required_unless:tax_region,roi'],
        ])->validateWithBag('updateMembershipInformation');

        $membership->forceFill([
            'job_title' => $input['job_title'],
            'telephone' => $input['telephone'],
            'tax_region' => $input['tax_region'],
            'tax_bracket' => $input['tax_region'] == 'roi' ? NULL : $input['tax_bracket'],
        ])->save();
    }
}
