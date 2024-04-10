<?php

namespace App\Console;

use App\Models\Notificacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            
            $correos = DB::select("SELECT * FROM citas WHERE date = CURRENT_DATE + INTERVAL '10 days'");

            foreach ($correos as $result) {
                $notificacion = new Notificacion();
            $notificacion->title = 'Cita programada';
            $notificacion->affair = 'Recordatorio de cita';
            $notificacion->descripcion = 'Recuerda tu cita programada para el día ' . $result->date; //. ' a las ' . $result->hora
            $notificacion->tipo = 'Recordatorio';
            $notificacion->cita_id = $result->id; // Asignar el ID de la cita obtenido de la consulta
            $notificacion->save();
            }
        })->everyMinute();
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
