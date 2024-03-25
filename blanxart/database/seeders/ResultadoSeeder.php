<?php

namespace Database\Seeders;

use App\Models\Resultado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadresultados = (int)$this->command->ask('¿Cuántas resultados deseas crear?', 10);

        Resultado::factory()->count($cantidadresultados)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadresultados . ' resultados!');
    }
}
