<?php

namespace Database\Seeders;

use App\Models\Notificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cantidadNotificaciones = (int)$this->command->ask('¿Cuántas notificaciones quieres crear?', 10);

        Notificacion::factory()->count($cantidadNotificaciones)->create();
        
        $this->command->info('¡Se han creado ' . $cantidadNotificaciones . ' notificaciones!');
    }
}
