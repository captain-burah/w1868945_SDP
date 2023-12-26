<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitPaymentplanFile>
 */
class UnitPaymentplanFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'date' => $this->faker->date(),
            'percentage' => $this->faker->randomNumber(2),
            'percentage' => $this->faker->randomNumber(2),
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
