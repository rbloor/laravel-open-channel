<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
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
            'is_external' => $this->faker->boolean(),
            'is_published' => $this->faker->boolean(),
            'filename' => md5('resource_image_' . microtime()) . '.png',
            'download' => md5('resource_' . microtime()) . '.pdf',
            'url' => $this->faker->url(),
        ];
    }
}
