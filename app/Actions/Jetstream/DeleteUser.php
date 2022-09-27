<?php

namespace App\Actions\Jetstream;

use App\Models\Setting;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Support\Facades\DB;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        DB::transaction(function () use ($user) {

            // increment optout counter
            Setting::where('setting_key', 'optout_count')->increment('setting_value');

            /*
            // delete sales
            $user->sales()->each(function ($sale) {
                $sale->transaction()->delete();
            });

            // delete membership
            $user->membership()->delete();
            */

            // delete profile photo
            $user->deleteProfilePhoto();

            // delete api tokens
            $user->tokens->each->delete();

            // delete user
            $user->delete();
        });
    }
}
