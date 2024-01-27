<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => '1',
            'slug_link' => $this->faker->url(),
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'building_name' => $this->faker->company(),
            'land_reg_fee' => $this->faker->randomNumber(2),
            'oqood_amount' => $this->faker->randomNumber(2),
            'dld_fees' => $this->faker->randomNumber(2),
            'bedroom' => $this->faker->randomNumber(2),
            'bathroom' => $this->faker->randomNumber(2),
            'floor' => $this->faker->randomNumber(2),
            'unit_price' => $this->faker->randomNumber(2),
            'unit_size_range' => $this->faker->randomNumber(2),
            'outdoor_area' => $this->faker->randomNumber(2),
            'terrace_area' => $this->faker->randomNumber(2),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'meta_keywords' => $this->faker->sentence(),
        ];
    }
}
