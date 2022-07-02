<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    use WithFaker;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => lcfirst($this->faker->words(3, true)),
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
