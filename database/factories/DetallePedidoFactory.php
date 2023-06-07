<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetallePedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prefijo' => $this->faker->randomLetter.'-'.$this->faker->unique()->randomNumber(3),
            'num_pedido' => $this->faker->unique()->randomNumber,
            'perfil' => $this->faker->unique()->randomNumber,
            'familia' => $this->faker->unique()->randomNumber,
            'grupo' => $this->faker->word,
            'subgrupo' => $this->faker->word,
            'id_producto' => Producto::all()->random()->id,
            'subtotal' => $this->faker->randomFloat(2, 0, 1000),
            'iva' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
