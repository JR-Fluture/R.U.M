<?php

namespace Database\Factories;

use App\Models\ModelosTerminales;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        $serie='';
        for ($i=0; $i < 12; $i++) { 
            $r=rand(0,1);
            if ($r==1) {
                $serie=$serie.rand(0,9);
            }else{
                $serie=$serie.$palabro{rand(0,22)};
            }
        }

        $sistema_operativo = ['Android','IOS','Windows Phone'];
        
        return [
                'imei_1' => $this->faker->numerify('###############'),
                'imei_2' =>  $this->faker->numerify('###############'),
                'numero_serie' => $serie,
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'modelo_terminal_id' => ModelosTerminales::all()->random()->id,
        ];
    }
}
