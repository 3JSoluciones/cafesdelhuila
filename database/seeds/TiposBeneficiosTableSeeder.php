<?php

use Illuminate\Database\Seeder;
use App\Tipo_Beneficio;

class TiposBeneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Tipo_Beneficio::create(array('nombre' => 'Humedo tradicional'));
        Tipo_Beneficio::create(array('nombre' => 'Fermentación controlada'));
        Tipo_Beneficio::create(array('nombre' => 'Natural'));
        Tipo_Beneficio::create(array('nombre' => 'Honey'));
        
    }
}
