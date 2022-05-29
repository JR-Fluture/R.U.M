<?php

namespace Database\Factories;

use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\FormatosSims;
use App\Models\Linea;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'numero_sim' => $this->faker->numerify('#########'),
                'pin' => $this->faker->numerify('####'),
                'puk' => $this->faker->numerify('####'),
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'formato_sim_id' => FormatosSims::all()->random()->id,
                'linea_id' => Linea::all()->random()->id,

        ];
    }
}
