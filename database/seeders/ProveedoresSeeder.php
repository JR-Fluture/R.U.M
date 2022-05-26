<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use App\Models\Proveedores;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedores::create([
            'name' => 'Telefonica',
            'comercial' => '',
            'telefono_comercial' => '900103907',
            'telefono_gestion' => '1004',
            'telefono_incidencia' => '',
            'claves' => '',
            'comentarios' => 'Sin contacto de comercial'
        ]);
        Proveedores::create([
            'name' => 'Vodafone',
            'comercial' => 'Ana Belén Mateo',
            'telefono_comercial' => '610517005',
            'telefono_gestion' => '1442',
            'telefono_incidencia' => '900877007',
            'claves' => '1234',
            'comentarios' => 'Gestor: Javier Sánchez; Técnico implantación David Bagán: 155.654.123, Oficina Vodafone: 607.100.900'
        ]);
    }
}
