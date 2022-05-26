<?php

namespace Database\Seeders;

use App\Models\TipoLinea;
use App\Models\TiposLineas;
use Illuminate\Database\Seeder;

class TipoLineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposLineas::create([
            'tipo_linea' => 'Cabecera',
            'descripcion' => 'La general del ayuntamiento y dependientes'
        ]);
        TiposLineas::create([
            'tipo_linea' => 'Sobremesa',
            'descripcion' => 'Dependiente de la de cabecera'
        ]);
        TiposLineas::create([
            'tipo_linea' => 'Movil',
            'descripcion' => 'Con linea externa propia'
        ]);
        TiposLineas::create([
            'tipo_linea' => 'Modem',
            'descripcion' => 'Solo datos'
        ]);
        TiposLineas::create([
            'tipo_linea' => 'ADSL',
            'descripcion' => 'Linea de datos a traves de ADSL sin WiFi del proveedor'
        ]);
        TiposLineas::create([
            'tipo_linea' => 'ADSL+WiFi',
            'descripcion' => 'Linea de datos a traves de ADSL con WiFi del proveedor'
        ]);
    }
}
