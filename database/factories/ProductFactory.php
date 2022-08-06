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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price'=>$this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
            'avatar' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
            'description' => $this->faker->text(100),
            'promotion' => $this->faker->randomNumber(),
            'status'=>rand(0, 1),
            'category_id' => rand(1, 2),
            'size_id' => rand(1, 3),
        
        ];
    }
}
