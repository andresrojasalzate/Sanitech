<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadCitas = (int)$this->command->ask('¿Cuántos citas deseas crear?', 10);

        Cita::factory()->count($cantidadCitas)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadCitas . ' citas!');
    
    }
}
