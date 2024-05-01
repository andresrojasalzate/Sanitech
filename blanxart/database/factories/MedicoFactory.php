<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collegiate_number' => fake()->numerify('####'),
            'speciality' => $this->faker->randomElement([
                'Medicina de família',
                'Medicina comunitària',
                'Pediatria',
                'Ginecologia',
                'Obstetrícia',
                'Medicina Interna',
                "Medicina d'urgències",
            ]),
            'consultation' => fake()->numberBetween(100, 999),         
        ];
    }
}
