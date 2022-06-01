<?php

namespace Database\Factories;

use App\Models\UsosPc;
use App\Models\UsosTerminales;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciasTerminalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'asunto' => $this->faker->text(),
                'comentarios' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'conclusion' => (bool) mt_rand(0, 1)==1?$this->faker->text():'',
                'uso_terminal_id' => UsosTerminales::all()->random()->id,
        ];
    }
}
