<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productName' => $this->faker->words(3, true),
            'productCode' => $this->faker->unique()->numerify('ABC###'),
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
