<?php

namespace Database\Factories;

use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\TiposLineas;
use Illuminate\Database\Eloquent\Factories\Factory;

class LineaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'numero_movil' => $this->faker->numerify('#########'),
                'numero_interno' => $this->faker->numerify('#########'),
                'numero_fijo' => $this->faker->numerify('#########'),
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'contrato_id' => Contrato::all()->random()->id,
                'tipo_linea_id' => TiposLineas::all()->random()->id,

        ];
    }
}
