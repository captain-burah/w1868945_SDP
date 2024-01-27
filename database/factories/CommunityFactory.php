<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
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
            'title' => $this->faker->name(),
            'title_ar' => $this->faker->name(),
            'address' => $this->faker->name(),
            'address_ar' => $this->faker->name(),
            'heading' => $this->faker->name(),
            'heading_ar' => $this->faker->name(),
            'description' => $this->faker->name(),
            'description_ar' => $this->faker->name(),
            'video_link' => $this->faker->name(),
            'meta_title' => $this->faker->name(),
            'meta_title_ar' => $this->faker->name(),
            'meta_description' => $this->faker->name(),
            'meta_description_ar' => $this->faker->name(),
            'meta_keywords' => $this->faker->name(),
            'meta_keywords_ar' => $this->faker->name(),
            'longitude' => $this->faker->randomNumber(3),
            'latitude' => $this->faker->randomNumber(3),
            'header_image' => $this->faker->name(),
            'map_image' => $this->faker->name(),
            'thumbnail' => $this->faker->name(),
        ];
    }
}
