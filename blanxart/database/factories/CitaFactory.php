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

        // Genera una hora de entrada aleatoria entre las 8:00 y las 15:30
        $hourEntry = fake()->dateTimeBetween('08:00:00', '15:30:00')->format('H:i:s');

        // Calcula una hora de salida aleatoria asegurando al menos 30 minutos de diferencia
        $minHourDeparture = date('H:i:s', strtotime($hourEntry) + 1800); // Añade 30 minutos
        $maxHourDeparture = '16:00:00'; // Hora máxima de salida
        $hourDeparture = fake()->dateTimeBetween($minHourDeparture, $maxHourDeparture)->format('H:i:s');
        return [
            'date' => fake()->date(),
            'hour_entry' => $hourEntry,
            'hour_departure' => $hourDeparture,
            'emergency_level' => fake()->numberBetween(1, 5),
            'accepted' => fake()->boolean(),
            'done' => fake()->boolean(),
            'prueba_id' => Prueba::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
