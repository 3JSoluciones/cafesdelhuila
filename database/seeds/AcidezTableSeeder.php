<?php

use Illuminate\Database\Seeder;

class AcidezTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder acidez
        DB::table('acidez')->insert([
            \App\Acidez::create(array('nombre' => 'Alta')),
            \App\Acidez::create(array('nombre' => 'Media alta')),
            \App\Acidez::create(array('nombre' => 'Media')),
            \App\Acidez::create(array('nombre' => 'Media Baja')),
            \App\Acidez::create(array('nombre' => 'Baja'))
        ]);
    }
}
