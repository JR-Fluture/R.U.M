<?php

namespace Database\Factories;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $n_dni=$this->faker->numerify('##########');
        $resto = $n_dni%23;  
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        $s_dni=$palabro{$resto};
        $dni="$n_dni-$s_dni";
        return [
                'name' => $this->faker->name(),
                'dni' => $dni,
                'email' => $this->faker->unique()->safeEmail(),
                'telefono_1' => $this->faker->numerify('#########'),
                'telefono_2' => $this->faker->numerify('#########'),
                'departamento_id' => Departamento::all()->random()->id,
        ];
    }
}
