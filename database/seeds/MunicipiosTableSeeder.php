<?php

use Illuminate\Database\Seeder;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder municipios
        DB::table('municipios')->insert([
            \App\Municipio::create(array('nombre' => 'Neiva')),
            \App\Municipio::create(array('nombre' => 'Acevedo')),
            \App\Municipio::create(array('nombre' => 'Agrado')),
            \App\Municipio::create(array('nombre' => 'Aipe')),
            \App\Municipio::create(array('nombre' => 'Algeciras')),
            \App\Municipio::create(array('nombre' => 'Altamira')),
            \App\Municipio::create(array('nombre' => 'Baraya')),
            \App\Municipio::create(array('nombre' => 'Campoalegre')),
            \App\Municipio::create(array('nombre' => 'Colombia')),
            \App\Municipio::create(array('nombre' => 'Elías')),
            \App\Municipio::create(array('nombre' => 'Garzón')),
            \App\Municipio::create(array('nombre' => 'Gigante')),
            \App\Municipio::create(array('nombre' => 'Guadalupe')),
            \App\Municipio::create(array('nombre' => 'Hobo')),
            \App\Municipio::create(array('nombre' => 'Iquira')),
            \App\Municipio::create(array('nombre' => 'Isnos')),
            \App\Municipio::create(array('nombre' => 'La Argentina')),
            \App\Municipio::create(array('nombre' => 'La Plata')),
            \App\Municipio::create(array('nombre' => 'Nátaga')),
            \App\Municipio::create(array('nombre' => 'Oporapa')),
            \App\Municipio::create(array('nombre' => 'Paicol')),
            \App\Municipio::create(array('nombre' => 'Palermo')),
            \App\Municipio::create(array('nombre' => 'Palestina')),
            \App\Municipio::create(array('nombre' => 'Pital')),
            \App\Municipio::create(array('nombre' => 'Pitalito')),
            \App\Municipio::create(array('nombre' => 'Rivera')),
            \App\Municipio::create(array('nombre' => 'Saladoblanco')),
            \App\Municipio::create(array('nombre' => 'San Agustín')),
            \App\Municipio::create(array('nombre' => 'Santa María')),
            \App\Municipio::create(array('nombre' => 'Suaza')),
            \App\Municipio::create(array('nombre' => 'Tarqui')),
            \App\Municipio::create(array('nombre' => 'Tesalia')),
            \App\Municipio::create(array('nombre' => 'Tello')),
            \App\Municipio::create(array('nombre' => 'Teruel')),
            \App\Municipio::create(array('nombre' => 'Timaná')),
            \App\Municipio::create(array('nombre' => 'Villavieja')),
            \App\Municipio::create(array('nombre' => 'Yaguará')),
        ]);
    }
}
