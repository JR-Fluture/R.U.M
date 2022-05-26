<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImpresoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        $n_tinta_origin=$this->faker->numerify('###');
        $resto = $n_tinta_origin%23;  
        $s_tinta_origin=$palabro{$resto};
        $tinta_origin="$n_tinta_origin-$s_tinta_origin";

        $n_tinta_alter=$this->faker->numerify('###');
        $resto_t = $n_tinta_alter%23;  
        $s_tinta_alter=$palabro{$resto_t};
        $tinta_alter="$n_tinta_alter-$s_tinta_alter";

        $n_modelo=$this->faker->numerify('#####');
        $resto = $n_modelo%23;  
        $s_modelo=$palabro{$resto}.$palabro{$resto_t};
        $modelo="$s_modelo-$n_modelo";


        $n_numero_serie=$this->faker->numerify('##########');
        $resto = $n_numero_serie%23;  
        $s_numero_serie=$palabro{$resto}.$palabro{($resto+$resto_t)%23};
        $numero_serie=$n_numero_serie.$s_numero_serie;
        $marcas=['Canon','HP','Epson','Brother','Dell','Lexmark','Samsung','Toshiba','Panasonic'];
        return [
                'marca' => $marcas[rand(0,count($marcas)-1)],
                'modelo' => $modelo,
                'tinta_original' => $tinta_origin,
                'tinta_alternativo' => $tinta_alter,
                'es_wifi' => (bool) mt_rand(0, 1),
                'color' => (bool) mt_rand(0, 1),
                'red' => (bool) mt_rand(0, 1),
                'es_multifuncion' => (bool) mt_rand(0, 1),
                'numero_serie' => $numero_serie,
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():''
        ];
    }
}
