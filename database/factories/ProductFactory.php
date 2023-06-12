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
            'name' => $this->faker->name,
            'description' => $this->faker->text(500),
            'color' => $this->faker->colorName,
            'price' => $this->faker->numberBetween(100000, 99999999),
            'type' => $this->faker->name,
            'company' => $this->faker->name,
            'image' => 'products/k2OCpzoyFGSvi5Bm1OPkQ4o2h735aS-metaaW1nLmpwZWc=-.jpg',
            'memory' => (string)$this->faker->numberBetween(32, 1000),
            'ram' => (string)$this->faker->numberBetween(32, 1000)
        ];
    }
}
