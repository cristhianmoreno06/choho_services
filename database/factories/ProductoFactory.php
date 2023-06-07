<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name, // Genera un nombre aleatorio para el campo 'nombre'
            'descripcion' => $this->faker->sentence, // Genera una descripción aleatoria para el campo 'descripción'
        ];
    }
}
