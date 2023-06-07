<?php

namespace Database\Seeders;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Tercero;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Tercero::factory()->create();
        Sucursal::factory()->create();
        Producto::factory()->create();
        Pedido::factory()->create();
        DetallePedido::factory()->create();
    }
}
