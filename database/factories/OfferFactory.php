<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
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
            'url' => $this->faker->url(),
            'filename' => md5('offer_' . microtime()) . '.jpg',
            'is_public' => $this->faker->boolean(),
            'is_published' => $this->faker->boolean(),
        ];
    }
}
