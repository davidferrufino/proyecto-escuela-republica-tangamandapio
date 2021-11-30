<?php

namespace Database\Factories;

use App\Models\Grado;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $grados = Grado::pluck('id')->toArray();

        return [
            'id_grado' => $this->faker->randomElement($grados),
            'nombre' => $this->faker->name,
            'numero_identidad' => '0704'.$this->faker->numberBetween(2000,2019).$this->faker->unique($reset = true)->numerify("#####"),
            'numero_cuenta' => $this->faker->numberBetween(2000,2019).'250'.$this->faker->unique($reset = true)->numerify('####'),
            'telefono' => $this->faker->numerify("#####").$this->faker->unique($reset = true)->numerify('###'),
            'estado' => $this->faker->randomElement([0, 1])
        ];
    }
}
