<?php

namespace Database\Seeders;

use App\Models\FormatosSims;
use Illuminate\Database\Seeder;

class FormatoSimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormatosSims::create([
            'name' => 'SIM completa'
        ]);
        FormatosSims::create([
            'name' => 'Mini SIM'
        ]);
        FormatosSims::create([
            'name' => 'Micro SIM'
        ]);
        FormatosSims::create([
            'name' => 'Nano SIM'
        ]);
        FormatosSims::create([
            'name' => 'SIM interna'
        ]);
    }
}
