<?php

namespace Database\Factories;

use App\Models\UsosPc;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciasPcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $n_dni=$this->faker->numerify('##########');
        $resto = $n_dni%23;  
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        $s_dni=$palabro{$resto};
        $dni="$n_dni-$s_dni";
        return [
                'asunto' => $this->faker->text(),
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'conclusion' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'uso_pc_id' => UsosPc::all()->random()->id,
        ];
    }
}
