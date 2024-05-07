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

        User::factory()->has(Paciente::factory([
            'genre' => 'Dona',
            'birth_date' => '15/03/1994',
            'address' => 'Carrer de Sant Jaume,25',
            'city' => 'Sabadell',
            'post_code' => '08192',
            'familiar_contact' => '644 567 890',
            'CIP' => 'LOGA  1  940315  00 3',
            'medico_id' => 1
        ]))->create([
            'dni' => '50321478X',
            'name' => 'Maria',
            'lastName' => 'López Garcia',
            'email' => 'maria.lopez@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '611 22 33 44',
            'password' => bcrypt('sanitech'),
            'rol' => 'paciente',
            
        ]);
        User::factory()->has(Paciente::factory([
            'genre' => 'Home',
            'birth_date' => '22/08/1979',
            'address' => 'Avinguda de la generalitat,10',
            'city' => 'Terrassa',
            'post_code' => '08221',
            'familiar_contact' => '633 210 987',
            'CIP' => 'MAPE  0  790822  01 6',
            'medico_id' => 1
        ]))->create([
            'dni' => '71985632T',
            'name' => 'Juan',
            'lastName' => 'Martínez Pérez',
            'email' => 'juanmartinez198@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '622 33 44 55',
            'password' => bcrypt('sanitech'),
            'rol' => 'paciente',
            
        ]);

        User::factory()->count(8)->has(Paciente::factory())->create([
            'rol' => 'paciente',
            
        ]);
        
        $this->command->info('¡Se han creado ' . 10 . ' pacientes!');
    }
}
