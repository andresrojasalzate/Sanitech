<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadMedicos = (int)$this->command->ask('¿Cuántos médicos deseas crear?', 10);

        Medico::factory()->count($cantidadMedicos)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadMedicos . ' médicos!');
    }
}
