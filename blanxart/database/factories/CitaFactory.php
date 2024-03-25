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
        return [
            'fecha' => fake()->date(),
            'nivel_emergencia' => fake()->numberBetween(1, 5),
            'aceptada' => fake()->boolean(),
            'realizada' => fake()->boolean(),
            'prueba_id' => Prueba::factory(),
            'user_id' => User::factory(),
        ];
    }
}
