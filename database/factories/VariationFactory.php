<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $statuses = ['color', 'size'];

        return [
            'product_id' => Product::class,
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(0, 20000),
            'type' => $statuses[rand(0, 1)],
            'sku' => null,
            'parent_id' => null
        ];
    }
}
