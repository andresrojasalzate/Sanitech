<?php

namespace Database\Seeders;

use App\Models\Prueba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadPruebas = (int)$this->command->ask('¿Cuántas pruebas deseas crear?', 10);

        Prueba::factory()->count($cantidadPruebas)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadPruebas . ' pruebas!');
    }
}
