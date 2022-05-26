<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Usuario Prueba',
            'email'=>'usuario.1@prueba.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('Usuario');

        User::create([
            'name'=>'Administrador Prueba',
            'email'=>'administrador.1@prueba.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');
        User::factory(99)->create();
    }
}
