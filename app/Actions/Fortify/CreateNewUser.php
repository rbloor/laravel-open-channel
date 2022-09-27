<?php

namespace App\Actions\Fortify;

use App\Mail\SignupAdminNotify;
use App\Mail\SignupConfirmation;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'tax_region' => ['required', 'string', 'max:255'],
            'tax_bracket' => ['required_unless:tax_region,roi'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) use ($input) {
                $user->assignRole('user');
                $membership = Membership::create([
                    'job_title' => $input['job_title'],
                    'telephone' => $input['telephone'],
                    'tax_region' => $input['tax_region'],
                    'tax_bracket' => $input['tax_bracket'] ?? NULL,
                    'company_id' => $input['company_id'],
                ]);
                $user->membership()->associate($membership->id)->save();
                Mail::to($user->email)->send(new SignupConfirmation($user));
                Mail::to(config('mail.to.admin'))->send(new SignupAdminNotify($user));
            });
        });
    }
}
