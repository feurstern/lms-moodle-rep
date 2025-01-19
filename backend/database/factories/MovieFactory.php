<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "director_id" => random_int(1, 30),
            "genre_id" => random_int(1, 7),
            "title" => fake()->sentence(10),
            "movie_length" => random_int(60, 200),
            "ratings" => random_int(1, 5),
            "release_year" => random_int(1990, 2025),
            "description" => fake()->sentence(25),
        ];
    }
}
