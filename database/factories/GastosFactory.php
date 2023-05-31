<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gastos>
 */
class GastosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'operacion' => $this->faker->sentences(),
			'detalle' => $this->faker->paragraphs(),
			'monto' => $this->faker->randomFloat(2),
			'ticket_gastos' => $this->faker->numberBetween(5454545, 545450),
			'factura_gastos' => $this->faker->numberBetween(5454545, 545450),
			'cuit' => $this->faker->numberBetween(100000000, 200000000),
			'cuil' => $this->faker->numberBetween(100000000, 200000000),
        ];
    }
}
