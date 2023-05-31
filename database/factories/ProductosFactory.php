<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->sentences(),
			'precio' => $this->faker->randomFloat(2),
			'neto' => $this->faker->randomFloat(2),
			'bruto' => $this->faker->randomFloat(2),
			'iva' => $this->faker->randomFloat(3),
			'mayorista' => $this->faker->randomFloat(2),
			'online' => $this->faker->randomFloat(2),
			'stock' => $this->faker->numberBetween(100, 900),
        ];
    }
}
