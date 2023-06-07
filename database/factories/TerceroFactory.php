<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TerceroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nit' => $this->faker->unique()->randomNumber(9),
            'razon_social' => $this->faker->company,
            'tipo' => $this->faker->randomElement(['Cliente', 'Proveedor']), // Genera un elemento aleatorio de la lista
            'activo' => $this->faker->randomElement(['s', 'n']), // Genera un valor booleano (true/false) de forma aleatoria
        ];
    }
}
