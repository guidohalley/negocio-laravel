<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ventas>
 */
class VentasFactory extends Factory
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
			'ticket_ventas' => $this->faker->numberBetween(5454545, 545450),
			'factura_ventas' => $this->faker->numberBetween(5454545, 545450),
			'cuit' => $this->faker->numberBetween(5454545, 545450),
			'cuil' => $this->faker->numberBetween(5454545, 545450),
        ];
    }
}
