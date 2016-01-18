<?php

use Illuminate\Database\Seeder;
use App\Certificacion;

class CertificacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

            Certificacion::create(array('nombre' => 'C.A.F.E. Practices'));
            Certificacion::create(array('nombre' => 'Rainforest Alliance'));
            Certificacion::create(array('nombre' => 'Global GAP'));
            Certificacion::create(array('nombre' => 'UTZ Certified'));
            Certificacion::create(array('nombre' => 'IFOAM Organic International'));
            Certificacion::create(array('nombre' => 'Bird Friendly'));
            Certificacion::create(array('nombre' => 'Fairtrade International'));
            Certificacion::create(array('nombre' => 'FLOCERT'));
            Certificacion::create(array('nombre' => 'Nespresso AAA'));
            Certificacion::create(array('nombre' => '4C'));
            Certificacion::create(array('nombre' => 'Bio Suisse'));
            Certificacion::create(array('nombre' => 'Demeter'));
            Certificacion::create(array('nombre' => 'Conservation International'));
            Certificacion::create(array('nombre' => 'JAS'));
            Certificacion::create(array('nombre' => 'USDA Organic'));
            Certificacion::create(array('nombre' => 'The weather safe label'));
            Certificacion::create(array('nombre' => 'Naturaland'));
            Certificacion::create(array('nombre' => 'SPP'));
            Certificacion::create(array('nombre' => 'European Organic'));
            Certificacion::create(array('nombre' => 'The Global Compact'));
            Certificacion::create(array('nombre' => 'ICA Buenas Prácticas Agrícolas'));
            Certificacion::create(array('nombre' => 'Kosher'));

    }
}
