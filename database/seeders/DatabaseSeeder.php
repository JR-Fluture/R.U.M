<?php

namespace Database\Seeders;

use App\Models\Impresora;
use App\Models\IncidenciasPc;
use App\Models\IncidenciasTerminales;
use App\Models\Linea;
use App\Models\ModelosTerminales;
use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\Sim;
use App\Models\Terminales;
use App\Models\UsosPc;
use App\Models\UsosTerminales;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        

        $this->call(ProveedoresSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        Persona::factory(50)->create();
        Impresora::factory(50)->create();
        for ($i=0; $i < 10; $i++) {
            $persona=Persona::all()->random();
            $persona->impresora()->attach([
                Impresora::all()->random()->id
            ]);
        }
        Monitores::factory(50)->create();
        Pc::factory(50)->create();
        UsosPc::factory(40)->create();
        IncidenciasPc::factory(10)->create();
        

        $this->call(FormatoSimSeeder::class);
        $this->call(MarcaTerminalSeeder::class);
        $this->call(TipoCargadorSeeder::class);
        $this->call(TipoLineaSeeder::class);
        $this->call(TipoTerminalSeeder::class);

        Linea::factory(50)->create();
        Sim::factory(50)->create();
        ModelosTerminales::factory(50)->create();
        Terminales::factory(50)->create();
        UsosTerminales::factory(50)->create();
        IncidenciasTerminales::factory(30)->create();
    }
}
