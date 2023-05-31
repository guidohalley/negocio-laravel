<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
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
