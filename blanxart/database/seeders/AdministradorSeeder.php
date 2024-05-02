<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->has(Administrador::factory())->create([
            'dni' => '12345678D',
            'name' => 'Alejandro',
            'lastName' => 'Soto Quintero',
            'email' => 'admin.alejandro.soto@sanitech.cat',
            'rol'=>'admin'
        ]);
        User::factory()->count(6)->has(Administrador::factory())->create(['rol'=>'admin']);
        $this->command->info('¡Se han creado ' . 7 . ' administradores!');
    
    }
}
