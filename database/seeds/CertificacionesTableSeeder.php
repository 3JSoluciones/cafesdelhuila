<?php

use Illuminate\Database\Seeder;

class CertificacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder certificaciones
        DB::table('certificaciones')->insert([
            \App\Certificacion::create(array('nombre' => 'C.A.F.E. Practices')),
            \App\Certificacion::create(array('nombre' => 'Rainforest Alliance')),
            \App\Certificacion::create(array('nombre' => 'Global GAP')),
            \App\Certificacion::create(array('nombre' => 'UTZ Certified')),
            \App\Certificacion::create(array('nombre' => 'IFOAM Organic International')),
            \App\Certificacion::create(array('nombre' => 'Bird Friendly')),
            \App\Certificacion::create(array('nombre' => 'Fairtrade International')),
            \App\Certificacion::create(array('nombre' => 'FLOCERT')),
            \App\Certificacion::create(array('nombre' => 'Nespresso AAA')),
            \App\Certificacion::create(array('nombre' => '4C')),
            \App\Certificacion::create(array('nombre' => 'Bio Suisse')),
            \App\Certificacion::create(array('nombre' => 'Demeter')),
            \App\Certificacion::create(array('nombre' => 'Conservation International')),
            \App\Certificacion::create(array('nombre' => 'JAS')),
            \App\Certificacion::create(array('nombre' => 'USDA Organic')),
            \App\Certificacion::create(array('nombre' => 'The weather safe label')),
            \App\Certificacion::create(array('nombre' => 'Naturaland')),
            \App\Certificacion::create(array('nombre' => 'SPP')),
            \App\Certificacion::create(array('nombre' => 'European Organic')),
            \App\Certificacion::create(array('nombre' => 'The Global Compact')),
            \App\Certificacion::create(array('nombre' => 'ICA Buenas Prácticas Agrícolas')),
            \App\Certificacion::create(array('nombre' => 'Kosher')),
        ]);
    }
}
