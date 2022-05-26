<?php

namespace Database\Seeders;

use App\Models\TiposTerminales;
use App\Models\TipoTerminal;
use Illuminate\Database\Seeder;

class TipoTerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposTerminales::create([
            'name' => 'Centralita'
        ]);
        TiposTerminales::create([
            'name' => 'Sobremesa'
        ]);
        TiposTerminales::create([
            'name' => 'Movil'
        ]);
        TiposTerminales::create([
            'name' => 'USB Modem'
        ]);
        TiposTerminales::create([
            'name' => 'Punto de acceso'
        ]);
        TiposTerminales::create([
            'name' => 'Repetidor WiFi'
        ]);
    }
}
