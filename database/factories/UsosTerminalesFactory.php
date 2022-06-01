<?php

namespace Database\Factories;

use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\Sim;
use App\Models\Terminales;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsosTerminalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $en_uso=(bool) mt_rand(0, 1);
        $fin_uso=null;
        if ($en_uso==1) {

            $end_date = '2015-01-01 00:00:00';

            $min = strtotime(now());
            $max = strtotime($end_date);

            $fin_uso = new DateTime(date('Y-m-d H:i:s', rand($min, $max)));
        }
        return [
            'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
            'en_uso' => $en_uso,
            'fin_uso' => $fin_uso,
            'persona_id' => Persona::all()->random()->id,
            'terminal_id' => Terminales::all()->random()->id,
            'sim_id' => Sim::all()->random()->id,
        ];
    }
}
