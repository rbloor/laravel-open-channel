<?php

namespace Database\Factories;

use App\Models\RewardCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class RewardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'description' => $this->faker->paragraph(3),
            'filename' => md5('reward_image_' . microtime()) . '.png',
            'points' => $this->faker->numberBetween(1, 200),
            'is_published' => $this->faker->boolean(),
            'is_physical' => $this->faker->boolean(),
            'reward_category_id' => RewardCategory::all()->random()->id,
        ];
    }
}
