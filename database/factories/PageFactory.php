<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
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
            'filename' => md5('page_banner_' . microtime()) . '.jpg',
            'banner_title' => $this->faker->text(20),
            'banner_subtitle' => $this->faker->text(20),
            'banner_paragraph' => $this->faker->text(20),
        ];
    }
}
