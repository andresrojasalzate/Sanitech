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

        Prueba::factory()->create([
            'name' => 'Espirometria',
            'video' => 'Preparacion_espirometria.mp4',
            'document' => 'Espirometria.pdf',
        ]);
        Prueba::factory()->create([
            'name' => 'Rectoscopia',
            'video' => 'Preparacion_rectoscopia.mp4',
            'document' => 'Rectoscopia.pdf',
        ]);
        Prueba::factory()->create([
            'name' => 'Tac abdominal',
            'video' => 'Preparacion_tac_abdominal.mp4',
            'document' => 'Tac_abdominal.pdf',
        ]);
        
        $this->command->info('¡Se han creado ' . 3 . ' pruebas!');
    }
}
