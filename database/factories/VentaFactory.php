<?php

namespace Database\Factories;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VentaFactory extends Factory
{
    protected $model = Venta::class;

    public function definition()
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
