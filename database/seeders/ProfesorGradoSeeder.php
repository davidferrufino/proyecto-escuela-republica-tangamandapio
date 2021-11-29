<?php

namespace Database\Seeders;

use App\Models\ProfesorGrado;
use Illuminate\Database\Seeder;

class ProfesorGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfesorGrado::factory(500)->create();
    }
}
