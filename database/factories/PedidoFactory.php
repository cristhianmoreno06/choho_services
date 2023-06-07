<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_pedido' => $this->faker->date(),
            'prefijo' => $this->faker->word,
            'num_pedido' => $this->faker->randomNumber(),
            'nit' => $this->faker->unique()->randomNumber(9),
            'razon_social' => $this->faker->company,
            'vendedor' => $this->faker->name,
            'id_ciudad' => Ciudad::all()->random()->id,
        ];
    }
}
