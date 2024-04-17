<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Medico;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadMedicos = (int)$this->command->ask('¿Cuántos médicos deseas crear?', 10);

        User::factory()->count($cantidadMedicos)->has(Medico::factory(
            
        ))->create(['rol'=>'medico']);
        
        $this->command->info('¡Se han creado ' . $cantidadMedicos . ' médicos!');
    }
}
