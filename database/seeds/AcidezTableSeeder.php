<?php

use Illuminate\Database\Seeder;
use App\Acidez;

class AcidezTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

            Acidez::create(array('nombre' => 'Alta'));
            Acidez::create(array('nombre' => 'Media alta'));
            Acidez::create(array('nombre' => 'Media'));
            Acidez::create(array('nombre' => 'Media Baja'));
            Acidez::create(array('nombre' => 'Baja'));

    }
}
