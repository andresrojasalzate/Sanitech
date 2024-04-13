<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadPacientes = (int)$this->command->ask('¿Cuántos pacientes deseas crear?', 10);

        Paciente::factory()->count($cantidadPacientes)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadPacientes . ' pacientes!');
    }
}
