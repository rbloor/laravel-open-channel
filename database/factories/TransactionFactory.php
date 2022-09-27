<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'debit' => $this->faker->randomFloat(2, 0, 999999.99),
            'credit' => $this->faker->randomFloat(2, 0, 999999.99),
            'balance' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
