<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'setting_key' => $this->faker->text(10),
            'setting_value' => $this->faker->text(10),
            'is_editable' => $this->faker->boolean(),
            'is_deletable' => $this->faker->boolean(),
        ];
    }
}
