<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesiones = [
            'Lic. Matematicas',
            'Lic. Literatura',
            'Lic. Biologia',
            'Lic. Quimica',
            'Lic. Ingles',
        ];

        return [
            'nombre' => $this->faker->firstName,
            'numero_identidad' => '0704'.$this->faker->numberBetween(2000,2019)."00".$this->faker->numerify("###"),
            'numero_empleado' => $this->faker->numberBetween(2000,2019).'150'.$this->faker->numerify('###'),
            'profesion' => $this->faker->randomElement($profesiones),
            'telefono' => $this->faker->unique()->numerify("########"),
            'estado' => $this->faker->randomElement([0, 1])
        ];
    }
}
