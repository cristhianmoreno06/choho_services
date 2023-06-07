<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Administrador', 'Usuario']),
            'abreviatura' => $this->faker->randomElement(['admin', 'user']),

        ];
    }
}
