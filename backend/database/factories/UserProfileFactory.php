<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => random_int(1, 10),
            "country" => $this->faker->country(),
            "province" => $this->faker->state(),
            "city" => $this->faker->city(),
            "address" => $this->faker->address(),
            "postal_code" => $this->faker->postcode()
        ];
    }
}
