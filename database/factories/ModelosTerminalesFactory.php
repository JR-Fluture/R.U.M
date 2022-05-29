<?php

namespace Database\Factories;

use App\Models\Departamento;
use App\Models\MarcasTerminales;
use App\Models\TiposCargadores;
use App\Models\TiposTerminales;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelosTerminalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        
        $n_modelo=$this->faker->numerify('#####');
        $resto = $n_modelo%23;  
        $s_modelo=$palabro{$resto}.$palabro{rand(0,22)};
        $modelo="$s_modelo-$n_modelo";

        $sistema_operativo = ['Android','IOS','Windows Phone'];
        
        return [
                'modelo' => $modelo,
                'sistema_operativo' =>  $sistema_operativo[rand(0, count($sistema_operativo) - 1)],
                'version_sistema_operativo' => $this->faker->numerify('##.#'),
                'es_doble_sim' => (bool) mt_rand(0, 1),
                'ram' => rand(0, 8),
                'almacenamiento_interno' => 16,
                'tiene_almacenamiento_externo' => 0,
                'almacenamiento_externo' => null,
                'px_camara_trasera' => rand(12, 35),
                'px_camara_frontal' => rand(5, 13),
                'num_puertos_rj_45' => (bool) mt_rand(0, 1),
                'tiene_wifi' => (bool) mt_rand(0, 1),
                'es_punto_acceso' => (bool) mt_rand(0, 1),
                'comentario' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'tipo_terminal_id' => TiposTerminales::all()->random()->id,
                'marca_terminal_id' => MarcasTerminales::all()->random()->id,
                'tipo_cargador_id' => TiposCargadores::all()->random()->id,
        ];
    }
}
