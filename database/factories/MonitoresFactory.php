<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MonitoresFactory extends Factory
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


        $n_numero_serie=$this->faker->numerify('##########');
        $resto = $n_numero_serie%23;  
        $s_numero_serie=$palabro{$resto}.$palabro{($resto+rand(0,22))%23};
        $numero_serie=$n_numero_serie.$s_numero_serie;
        $marcas=['LG','Acer','Samsung','MSI','AOC','Benq','Dell','HP','Gigabyte','Philips','Corsair','Huawei','Xiaomi','Lenovo'];
        $conectores=['HDMI','DisplayPort','VGA','DVI','Jack','USB','Micro USB','Mini DisplayPort','Mini HDMI'];
        $list='';
        for ($i=0; $i < rand(1,3); $i++) {
            $list=$list.$conectores[rand(0,count($conectores)-1)].', ';
        }
        $list=substr($list,0,strlen($list)-2);
        return [
                'marca' => $marcas[rand(0,count($marcas)-1)],
                'modelo' => $modelo,
                'pulgadas' => $this->faker->numerify('##'),
                'conectores' => $list,
                'tiene_altavoces' => (bool) mt_rand(0, 1),
                'numero_serie' => $numero_serie,
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():''
        ];
    }
}
