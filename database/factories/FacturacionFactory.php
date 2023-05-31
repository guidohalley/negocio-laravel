<?php

namespace Database\Factories;

use App\Models\Facturacion;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class FacturacionFactory extends Factory
{
    protected $model = Facturacion::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->randomLetter(),
			'producto' => $this->faker->name,
			'unidad' => $this->faker->randomNumber(5, true),
			'precio' => $this->faker->randomFloat(2),
			'subtotal' => $this->faker->randomFloat(2),
			'total' => $this->faker->randomFloat(2),
			'conidicion frente al iva' => $this->faker->sentences(),
			'cuit' => $this->faker->numberBetween(10, 100),
			'cuil' => $this->faker->numberBetween(10, 100),
        ];
    }
}
