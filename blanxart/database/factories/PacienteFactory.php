<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genre = $this->faker->randomElement(['hombre', 'mujer']);
        $birth_date = $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d');

        return [
            'genre' => $genre,
            'birth_date' => $birth_date,
            'CIP' => 'A123456789123',
            'address' => fake()->address(),
            'city' => fake()->city(),
            'post_code' => fake()->postcode(),
            'familiar_contact' => fake()->tollFreeNumber(),
            'user_id' => User::factory()->create()->id
        ];
    }
}
