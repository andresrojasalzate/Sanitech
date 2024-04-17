<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resultado>
 */
class ResultadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prueba' => fake()->word(),
            'resultado' => fake()->sentence(),
            'servicio' => fake()->word(),
            'centro' => fake()->word(),
            'paciente_id' => Paciente::factory()->create()->id,
        ];
    }
}
