<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadPacientes = (int)$this->command->ask('¿Cuántos pacientes deseas crear?', 10);

        User::factory()->count($cantidadPacientes)->has(Paciente::factory())->create(['rol'=>'paciente']);
        
        $this->command->info('¡Se han creado ' . $cantidadPacientes . ' pacientes!');
    }
}
