<?php

namespace App\Console\Commands;

use App\Models\Role;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Command;

class MassDataImport extends Command
{
    protected $signature = 'data:import {amount=5}'; // Cambia el valor predeterminado de 100 si deseas una cantidad diferente

    protected $description = 'Importar datos masivamente en la base de datos';

    public function handle()
    {
        $this->info('Inicio de importación de datos!');

        $amount = (int) $this->argument('amount');

        $bar = $this->output->createProgressBar($amount);

        for ($i = 0; $i < $amount; $i++) {

            if ($i < 2) {
                Role::factory()->create();
            }

            $this->call(DatabaseSeeder::class);

            $bar->advance();
        }

        $bar->finish();
        $this->line('');

        $this->info('¡Datos importados exitosamente!');
    }
}
