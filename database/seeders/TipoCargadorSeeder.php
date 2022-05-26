<?php

namespace Database\Seeders;

use App\Models\TiposCargador;
use App\Models\TiposCargadores;
use Illuminate\Database\Seeder;

class TipoCargadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposCargadores::create([
            'name' => 'Mini USB'
        ]);
        TiposCargadores::create([
            'name' => 'Micro USB'
        ]);
        TiposCargadores::create([
            'name' => 'USB-C'
        ]);
        TiposCargadores::create([
            'name' => 'Lightning'
        ]);
        TiposCargadores::create([
            'name' => 'Inalambrico'
        ]);
        TiposCargadores::create([
            'name' => 'Propietario'
        ]);
    }
}
