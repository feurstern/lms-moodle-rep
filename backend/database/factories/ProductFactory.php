<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->sentence(4),
            "desc" => fake()->sentence(30),
            "category" => "1",
            "qty" =>  random_int(1, 255),
            "price" => random_int(100, 10000)
        ];
    }
}
