<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedemptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'order_number' => $this->faker->uuid(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'address_one' => $this->faker->streetAddress(),
            'address_two' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'county' => $this->faker->state(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
            'requires_shipping' => $this->faker->boolean(),
            'gross' => $this->faker->randomFloat(2, 0, 99999999.99),
            'vat' => $this->faker->randomFloat(2, 0, 99999999.99),
            'tax' => $this->faker->randomFloat(2, 0, 99999999.99),
            'ni' => $this->faker->randomFloat(2, 0, 99999999.99),
            'net' => $this->faker->randomFloat(2, 0, 99999999.99),
            'transaction_id' => Transaction::all()->random()->id,
        ];
    }
}
