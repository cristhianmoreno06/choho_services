<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class SucursalFactory extends Factory
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
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'id_ciudad' => Ciudad::all()->random()->id,
        ];
    }
}
