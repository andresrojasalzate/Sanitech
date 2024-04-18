<?php

namespace Database\Seeders;

use App\Models\Cita;
use App\Models\Notificacion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Cita::factory()->has(Notificacion::factory([
                'title' => 'Dierna',
                'affair' => 'El usuario tiene dierna',
                'descripcion' => 'El usuario tiene mucha dierna necesita ayuda',
            ]))->count(30)->create([
                'paciente_id' => $i,
            ]);
        }
        $this->command->info('¡Se han creado ' . 30 . ' citas por paciente!');
    }
}
