<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $marcasProcesador = ['Intel I3','Intel I5','Intel I7','Intel Celeron','Intel Code 2 Duo','Intel Pentium', 'Amd Ryzer 3', 'Amd Ryzer 5', 'Amd Ryzer 7', 'Amd Ryzer 9', 'Amd Atlon'];
        $marcas = ['LG', 'Acer', 'Samsung', 'MSI', 'Dell', 'HP', 'Gigabyte', 'Philips'];
        $conectores = ['HDMI', 'DisplayPort', 'VGA', 'DVI', 'Jack', 'Micro USB', 'Mini DisplayPort', 'Mini HDMI', 'RJ-45', 'WiFi', 'PS/2', 'USB 2.0', 'USB 3.0', 'USB'];
        $tipo_ram = ['ddr', 'ddr2', 'ddr3', 'ddr4'];
        $tipo_almacenamiento = ['HDD', 'SSD', 'm.2 nvme'];
        $sistema_operativo = ['Windows XP', 'Windows 7', 'Windows Vista', 'Windows 8', 'Windows 10', 'Windows 11', 'Windows Server 2012', 'Windows Server 2019'];

        $n_modelo = $this->faker->numerify('#####');
        $resto = $n_modelo % 23;
        $s_modelo = $palabro{$resto} . $palabro{rand(0, 22)};
        $modelo = "$s_modelo-$n_modelo";

        $n_procesador = $this->faker->numerify('#####');
        $resto = $n_procesador % 23;
        $s_procesador = $palabro{$resto} . $palabro{rand(0, 22)};
        $procesador = "$s_procesador-$n_procesador";

        $n_numero_serie = $this->faker->numerify('##########');
        $resto = $n_numero_serie % 23;
        $s_numero_serie = $palabro{$resto} . $palabro{($resto + rand(0, 22)) % 23};
        $numero_serie = $n_numero_serie . $s_numero_serie;

        

        $list = '';
        for ($i = 0; $i < rand(2, 9); $i++) {
            $list = $list . $conectores[rand(0, count($conectores) - 1)] . ', ';
        }
        $list = substr($list, 0, strlen($list) - 2);
        return [
            'microprocesador' => $marcasProcesador[rand(0, count($marcasProcesador) - 1)].' '.$procesador.' '.$this->faker->numerify('#,##').'GHz',
            'placa_base' => $marcas[rand(0, count($marcas) - 1)].'-'.$modelo,
            'tipo_ram' => $tipo_ram[rand(0, count($tipo_ram) - 1)],
            'ram' => rand(0, 8),
            'tipo_almacenamiento' => $tipo_almacenamiento[rand(0, count($tipo_almacenamiento) - 1)],
            'capacidad_almacenamiento' => 512,
            'sistema_operativo' => $sistema_operativo[rand(0, count($sistema_operativo) - 1)],
            'tipos_conector' => $list,
            'activacion' => (bool) mt_rand(0, 1),
            'numero_inventario' => $this->faker->numerify('###'),
            'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():''
        ];
    }
}
