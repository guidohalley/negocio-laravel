<?php

namespace Database\Factories;

use App\Models\Gasto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GastoFactory extends Factory
{
    protected $model = Gasto::class;

    public function definition()
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
