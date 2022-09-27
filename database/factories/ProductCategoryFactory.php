<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
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
            'is_published' => $this->faker->boolean(),
            'filename' => md5('product_category_' . microtime()) . '.png',
        ];
    }
}
