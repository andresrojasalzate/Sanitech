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
        return [
            'title' => $this->faker->sentence,
            'affair' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'tipo' => $this->faker->randomElement(['Recordatorio', 'Confirmacion']),
        ];
    }
}
