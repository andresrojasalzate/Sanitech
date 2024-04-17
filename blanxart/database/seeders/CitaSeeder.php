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
        


        for ($i = 1; $i <= 10; $i++) {
            Cita::factory()->count(5)->create([
                'paciente_id' => $i,
            ]);
        }


        $this->command->info('¡Se han creado ' . 5 . ' citas por paciente!');
    }
}
