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
        $resultados = [
            1 => ['prueba'=>'Espirometria',
            'resultado' => 'Els resultats mostren una disminució en el flux de l’aire durant l’expiració, el que suggereix una obstrucció en les vies respiratòries. Això pot indicar condicions com asma, bronquitis crònica o la malaltia pulmonar obstructiva crònica (EPOC).',
            'servicio' => 'Pneumologia',
            'centro' => 'CAP Oest Terrassa'],
            2 => ['prueba' => 'Rectoscopia',
            'resultado' => ' Els resultats mostren úlceres en el revestiment del recte que poden ser causades per afeccions com la colitis ulcerosa, la malaltia de Crohn, la proctitis o infeccions.',
            'servicio' => 'Digestiu',
            'centro' => 'CAP Serraparera, Cerdanyola del Vallès',],
            3 => ['prueba' => 'Tac abdominal',
            'resultado' => 'En els resultats del TAC revela signes d’inflamació en els teixits abdominals, la qual cosa pot ser indicatiu de malalties com a apendicitis, diverticulitis o altres condicions inflamatòries.',
            'servicio' => 'Radiologia',
            'centro' => 'CAP Mútua Rubí',]
        ];

        $num = fake()->numberBetween(1, 3);
        return [
            'prueba' => $resultados[$num]['prueba'],
            'resultado' => $resultados[$num]['resultado'],
            'servicio' =>  $resultados[$num]['servicio'],
            'centro' => $resultados[$num]['centro'],
            'paciente_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
