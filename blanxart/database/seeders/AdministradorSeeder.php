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
        

        User::factory()->count(7)->has(Administrador::factory())->create(['rol'=>'admin']);
        
        $this->command->info('¡Se han creado ' . 7 . ' administradores!');
    
    }
}
