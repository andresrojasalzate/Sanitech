<?php

namespace Database\Seeders;

use App\Models\Administrador;
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

        Administrador::factory()->count($cantidadAdministradores)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadAdministradores . ' administradores!');
    
    }
}
