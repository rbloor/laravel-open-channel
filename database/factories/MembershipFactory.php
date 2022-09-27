<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_title' => $this->faker->jobTitle(),
            'telephone' => $this->faker->phoneNumber(),
            'tax_region' => 'uk',
            'tax_bracket' => '20',
            'company_id' => Company::all()->random()->id,
            'address_one' => $this->faker->streetAddress(),
            'address_two' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'county' => $this->faker->state(),
            'postcode' => $this->faker->postcode(),
        ];
    }
}
