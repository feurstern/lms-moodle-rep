<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "creator_id" => random_int(1, 10),
            "title" => fake()->sentence(8),
            "category" => "General",
            "content" => fake()->sentence(30),
        ];
    }
}
