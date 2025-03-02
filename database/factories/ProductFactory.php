<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->randomNumber(2),
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id,
        ];
    }
}
