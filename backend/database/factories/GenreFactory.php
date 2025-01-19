<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $genres = ["Gore", "Science fiction", "Horror", "War", "Cartoon", "Adult", "Romance"];
        return [
            // "genre_name" => $genres[random_int(0, count())]
        ];
    }
}
