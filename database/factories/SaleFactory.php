<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::whereHas('membership')->get()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 3),
            'price' => $this->faker->randomFloat(2, 0, 99999999.99),
            'points' => $this->faker->numberBetween(1, 200),
            'bonus_points' => $this->faker->numberBetween(1, 50),
            'sold_at' => $this->faker->date(),
            'invoiced_at' => $this->faker->date(),
        ];
    }
}
