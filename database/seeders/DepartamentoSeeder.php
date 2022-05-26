<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'cod' => 'ADL',
            'name' => 'ADL, comercio y turismo'
        ]);
        Departamento::create([
            'cod' => 'ALC',
            'name' => 'Alcaldia'
        ]);
        Departamento::create([
            'cod' => 'CMF',
            'name' => 'Comunicación, medioambiente y fiestas'
        ]);
        Departamento::create([
            'cod' => 'CON',
            'name' => 'Concejales y asesores'
        ]);
        Departamento::create([
            'cod' => 'CUL',
            'name' => 'Cultura y educación'
        ]);
        Departamento::create([
            'cod' => 'DEP',
            'name' => 'Deportes (polideportivo)'
        ]);
        Departamento::create([
            'cod' => 'INF',
            'name' => 'Informática'
        ]);
        Departamento::create([
            'cod' => 'INT',
            'name' => 'Intervención'
        ]);
        Departamento::create([
            'cod' => 'JUV',
            'name' => 'Juventud'
        ]);
        Departamento::create([
            'cod' => 'OBR',
            'name' => 'Obras y servicios'
        ]);
        Departamento::create([
            'cod' => 'PER',
            'name' => 'Personal'
        ]);
        Departamento::create([
            'cod' => 'PLO',
            'name' => 'Policía local'
        ]);
        Departamento::create([
            'cod' => 'REG',
            'name' => 'Registro'
        ]);
        Departamento::create([
            'cod' => 'SEC',
            'name' => 'Secretaria'
        ]);
        Departamento::create([
            'cod' => 'SSO',
            'name' => 'Servicios sociales'
        ]);
        Departamento::create([
            'cod' => 'TES',
            'name' => 'Tesorería'
        ]);
        Departamento::create([
            'cod' => 'URB',
            'name' => 'Urbanismo'
        ]);
    }
}
