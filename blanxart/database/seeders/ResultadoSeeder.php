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
    

        Resultado::factory()->count(30)->create();
        
        $this->command->info('¡Se han creado ' . 30 . ' resultados!');
    }
}
