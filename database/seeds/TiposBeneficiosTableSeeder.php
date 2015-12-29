<?php

use Illuminate\Database\Seeder;

class TiposBeneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder tiposBeneficios
        DB::table('tipos_beneficios')->insert([
            \App\Tipo_Beneficio::create(array('nombre' => 'Humedo tradicional')),
            \App\Tipo_Beneficio::create(array('nombre' => 'Fermentación controlada')),
            \App\Tipo_Beneficio::create(array('nombre' => 'Natural')),
            \App\Tipo_Beneficio::create(array('nombre' => 'Honey'))
        ]);
    }
}
