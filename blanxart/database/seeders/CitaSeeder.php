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

        Cita::factory()->has(Notificacion::factory([
            'title' => 'Recordatorio cita Medica',
            'descripcion' => 'Recorda que tens una cita programada per el dia 16/5 a les 10:00',
            'tipo' => 'Recordatorio',
        ]))->create([
            'date' => date('2024-05-16'),
            'time' => '12:00',
            'emergency_level' => 1,
            'accepted' => true,
            'reason' => 'Varios dias enfermo en casa',
            'done' => false,
            'prueba_id' => null,
            'paciente_id' => 1,
            'medico_id' => 1
        ]);
        Cita::factory()->has(Notificacion::factory([
            'title' => 'Cita Espirometria',
            'descripcion' => 'Té un cita programada per el dia 30/5 a les 12:00, podrà asistir?',
            'tipo' => 'Confirmacion',
        ]))->create([
            'date' => date('2024-05-30'),
            'time' => '10:00',
            'emergency_level' => 2,
            'accepted' => null,
            'reason' => 'Necesita realizar prueba espirometria',
            'done' => false,
            'prueba_id' => 1,
            'paciente_id' => 1,
            'medico_id' => 2
        ]);

        Cita::factory()->create([
            'date' => null,
            'time' => null,
            'emergency_level' => 2,
            'accepted' => null,
            'reason' => 'Necesita realizar prueba espirometria',
            'done' => false,
            'prueba_id' => 1,
            'paciente_id' => 1,
            'medico_id' => null
        ]);


        Cita::factory()->has(Notificacion::factory([
            'title' => 'Recordatorio cita Medica',
            'descripcion' => 'Recorda que tens una cita programada per el dia 15/5 a les 14:00',
            'tipo' => 'Recordatorio',
        ]))->create([
            'date' => date('2024-05-15'),
            'time' => '14:00',
            'emergency_level' => 2,
            'accepted' => true,
            'reason' => 'Diversos dies malalt a casa',
            'done' => false,
            'prueba_id' => null,
            'paciente_id' => 2,
            'medico_id' => 1
        ]);
        Cita::factory()->has(Notificacion::factory([
            'title' => 'Cita tac abdominal',
            'descripcion' => 'Té un cita programada per el dia 25/5 a les 12:00, podrà asistir?',
            'tipo' => 'Confirmacion',
        ]))->create([
            'date' => date('2024-05-25'),
            'time' => '12:00',
            'emergency_level' => 1,
            'accepted' => null,
            'reason' => 'Necessita fer un tac abdominal',
            'done' => false,
            'prueba_id' => 3,
            'paciente_id' => 2,
            'medico_id' => 2
        ]);

        Cita::factory()->create([
            'date' => null,
            'time' => null,
            'emergency_level' => 2,
            'accepted' => null,
            'reason' => 'Necessita fer un tac abdominal',
            'done' => false,
            'prueba_id' => 3,
            'paciente_id' => 2,
            'medico_id' => null
        ]);
        for ($i = 3; $i <= 10; $i++) {
            Cita::factory()->has(Notificacion::factory([]))->count(30)->create([
                'paciente_id' => $i,
            ]);
        }
        $this->command->info('¡Se han creado ' . 30 . ' citas por paciente!');
    }
}
