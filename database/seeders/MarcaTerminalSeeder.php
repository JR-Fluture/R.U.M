<?php

namespace Database\Seeders;

use App\Models\MarcasTerminales;
use App\Models\MarcaTerminal;
use Illuminate\Database\Seeder;

class MarcaTerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarcasTerminales::create([
            'name' => 'iPhone'
        ]);
        MarcasTerminales::create([
            'name' => 'Nokia'
        ]);
        MarcasTerminales::create([
            'name' => 'Samsung'
        ]);
        MarcasTerminales::create([
            'name' => 'Huawei'
        ]);
        MarcasTerminales::create([
            'name' => 'Alcatel'
        ]);
    }
}
