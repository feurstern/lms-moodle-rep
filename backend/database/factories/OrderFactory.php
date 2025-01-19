<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user_id =  random_int(1, 10);
        $product_id = random_int(1, 20);
        $qty = random_int(1, 5);
        $price = Product::find($product_id)->price;

        return [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "qty" =>   $qty,
            "price" => $price,
            "total_price" => $qty * $price
        ];
    }
}
