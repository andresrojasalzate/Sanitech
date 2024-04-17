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
        User::factory()->has(Paciente::factory())->create([
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
