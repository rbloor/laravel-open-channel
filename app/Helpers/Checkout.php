<?php

namespace App\Helpers;

use App\Models\Redemption;
use Illuminate\Support\Facades\DB;

class Checkout
{
    public function save($basket, $input, $user)
    {
        return DB::transaction(function () use ($basket, $input, $user) {
            return tap(Redemption::create([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'telephone' => $user->membership->telephone ?? null,
                'address_one' => $input->address_one ?? null,
                'address_two' => $input->address_two ?? null,
                'city' => $input->city ?? null,
                'county' => $input->county ?? null,
                'country' => $user->membership->tax_region,
                'postcode' => $input->postcode ?? null,
                'requires_shipping' => $input->requires_shipping
            ]), function (Redemption $redemption) use ($basket, $input, $user) {
                foreach ($basket as $item) {
                    $redemption->rewards()->attach($item['id'], [
                        'quantity' => $item['quantity'],
                        'points' => $item['points']
                    ]);
                }
                if ($input->requires_shipping) {
                    $user->membership()->update([
                        'address_one' => $input->address_one,
                        'address_two' => $input->address_two ?? null,
                        'city' => $input->city,
                        'county' => $input->county,
                        'postcode' => $input->postcode,
                    ]);
                }
            });
        });
    }
}
