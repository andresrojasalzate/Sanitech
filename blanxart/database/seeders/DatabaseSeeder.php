<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AdministradorSeeder::class);
        $this->call(MedicoSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(PruebaSeeder::class);
        $this->call(CitaSeeder::class);
        $this->call(ResultadoSeeder::class);
        $this->call(NotificacionSeeder::class);

        $token = \App\Models\User::factory()->create()->createToken('api-token')->plainTextToken;
        $this->command->info('Token: '.  $token);
    }
}
