<?php

namespace Database\Factories;

use App\Enums\Order\Status;
use App\Models\Client;
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
        return [
            'client_id' => Client::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->text(),
            'status' => $this->faker->randomElement(Status::cases()),
        ];
    }
}
