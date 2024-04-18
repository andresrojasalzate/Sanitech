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

        User::factory()->has(Medico::factory([
            'collegiate_number' => '15662',
            'speciality' => 'Medicina de família',
            'consultation' => '201',

        ]))->create([
            'dni' => '48523671K',
            'name' => 'Xavier',
            'lastName' => 'Pelayo López',
            'email' => 'xavier.pelayo@sanitech.cat',
            'rol' => 'medico',
        ]);

        User::factory()->has(Medico::factory([
            'collegiate_number' => '31761',
            'speciality' => 'Pediatria',
            'consultation' => '202',
        ]))->create([
            'dni' => '71895342P',
            'name' => 'Encarnación',
            'lastName' => 'Pinto Alarcón',
            'email' => 'encarnacion.pinto@sanitech.cat',
            'rol' => 'medico',
        ]);

        User::factory()->count(8)->has(Medico::factory())->create([
            'rol' => 'medico',
        ]);

        $this->command->info('¡Se han creado ' . 10 . ' médicos!');
    }
}
