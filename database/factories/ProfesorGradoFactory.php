<?php

namespace Database\Factories;

use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorGradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesores = Profesor::pluck('id')->toArray();
        $grados = Grado::pluck('id')->toArray();
        
        return [
            'id_profesor' => $this->faker->randomElement($profesores),
            'id_grado' => $this->faker->randomElement($grados)
        ];
    }
}
