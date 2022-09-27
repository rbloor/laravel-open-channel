<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'code' => $this->faker->randomNumber(8),
            'uuid' => $this->faker->uuid(),
            'points' => $this->faker->numberBetween(1, 200),
            'filename' => md5('product_image_' . microtime()) . '.png',
            'is_published' => $this->faker->boolean(),
            'product_category_id' => ProductCategory::all()->random()->id,
        ];
    }
}
