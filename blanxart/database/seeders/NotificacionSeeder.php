<?php

namespace Database\Seeders;

use App\Models\Notificacion;
use App\Models\NotificacionPaciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 10; $i++) {
            NotificacionPaciente::create([
                'title' => 'Cambio medico',
                'descripcion' => 'medico cambiado correctamente',
                'tipo' => 'Cambio',
                'vista' => false, // Valor por defecto para "vista"
                'paciente_id' => $i,
            ]);
        }
    }
}
