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
            1 => ['title'=>'Recordatori cita Espirometria',
            'descripcion' => 'Recorda que té una cita programada pel dia '.$date.' a les '.$hourEntry
            ],
            ['title'=>'Recordatori cita Rectoscòpia',
            'descripcion' => 'Recorda que té una cita programada pel dia '.$date.' a les '.$hourEntry
            ],
            ['title'=>'Recordatori cita Tac abdominal',
            'descripcion' => 'Recorda que té una cita programada pel dia '.$date.' a les '.$hourEntry
            ],
            ['title'=>'Recordatori cita broncoscòpia',
            'descripcion' => 'Recorda que té una cita programada pel dia '.$date.' a les '.$hourEntry
            ]

        ];

        $num = fake()->numberBetween(1, 3);

        return [
            'title' => $notificaciones[$num]['title'],
            'descripcion' => $notificaciones[$num]['descripcion'],
            'tipo' => $this->faker->randomElement(['Recordatorio', 'Confirmacion']),
            'vista' => false,
        ];
    }
}
