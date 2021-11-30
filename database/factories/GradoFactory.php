<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'Grado '.$this->faker->numberBetween(1,12),
            'codigo' => $this->faker->unique()->numerify('#####')
        ];
    }
}
