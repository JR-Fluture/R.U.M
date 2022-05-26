<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\Proveedores;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'IDCONTACTO' => '001',
            'proveedor_id' => 2,
            'descripcion' => 'Facturas mensuales siempre a coste cero',
            'comentarios' => ''
        ]);
        Contrato::create([
            'IDCONTACTO' => '002',
            'proveedor_id' => 2,
            'descripcion' => 'Facturas mensuales variables de gran importe (Lineas móviles e internet)',
            'comentarios' => ''
        ]);
        Contrato::create([
            'IDCONTACTO' => '003',
            'proveedor_id' => 1,
            'descripcion' => 'Pendirentes de ver qué contrato se tiene con Telefónica',
            'comentarios' => ''
        ]);
        Contrato::create([
            'IDCONTACTO' => '004',
            'proveedor_id' => 2,
            'descripcion' => 'Solo dos facturas mensuales a cero en marzo/abril 2018',
            'comentarios' => ''
        ]);
        Contrato::create([
            'IDCONTACTO' => '005',
            'proveedor_id' => 2,
            'descripcion' => 'Facturas mensuales constantes ADSL Garcia Lorca 50M/10M',
            'comentarios' => ''
        ]);
    }
}
