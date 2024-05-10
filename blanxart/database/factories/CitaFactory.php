<?php

namespace Database\Factories;

use App\Models\Prueba;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $date = fake()->dateTimeBetween('now', '+30 days');

        $horasDisponibles = [
            '08:00', '09:00', '10:00', '11:00',
            '12:00', '13:00', '14:00', '15:00', '16:00'
        ];

        $horaAleatoria = fake()->randomElement($horasDisponibles);

        $key = array_search($horaAleatoria, $horasDisponibles);
        if ($key !== false) {
            unset($horasDisponibles[$key]);
        }

        $accepted = fake()->boolean();
        $done = $accepted ? fake()->boolean() : false;

        return [
            'date' => $date,
            'time' => $horaAleatoria,
            'emergency_level' => fake()->numberBetween(1, 5),
            'accepted' => $accepted,
            'reason' => fake()->text(),
            'done' => $done,
            'prueba_id' => $this->faker->numberBetween(1, 4),
            'paciente_id' => $this->faker->numberBetween(1, 10),
            'medico_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
