<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notificacion>
 */
class NotificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $date = fake()->dateTimeBetween('now', '+30 days')->format('d/m');;

        $hourEntry = fake()->dateTimeBetween('08:00:00', '15:30:00')->format('H:i');
        $notificaciones = [
            1 => ['title'=>'Recordatorio cita Espirometria',
            'descripcion' => 'Recuerda que tiene una cita programada para el dia '.$date.' a las '.$hourEntry
            ],
            ['title'=>'Recordatorio cita Rectoscopia',
            'descripcion' => 'Recuerda que tiene una cita programada para el dia '.$date.' a las '.$hourEntry
            ],
            ['title'=>'Recordatorio cita Tac abdominal',
            'descripcion' => 'Recuerda que tiene una cita programada para el dia '.$date.' a las '.$hourEntry
            ],

        ];

        $num = fake()->numberBetween(1, 3);

        return [
            'title' => $notificaciones[$num]['title'],
            'descripcion' => $notificaciones[$num]['descripcion'],
            'tipo' => $this->faker->randomElement(['Recordatorio', 'Confirmacion']),
        ];
    }
}
