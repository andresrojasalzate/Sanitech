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
        $cantidadAdministradores = (int)$this->command->ask('¿Cuántos administradores deseas crear?', 5);

        User::factory()->count($cantidadAdministradores)->has(Administrador::factory())->create(['rol'=>'admin']);
        
        $this->command->info('¡Se han creado ' . $cantidadAdministradores . ' administradores!');
    
    }
}
