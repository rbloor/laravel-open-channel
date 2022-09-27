<?php

namespace Database\Factories;

use App\Models\CompanyCategory;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'company_category_id' => CompanyCategory::all()->random()->id,
            'is_published' => $this->faker->boolean(),
        ];
    }
}
