<?php

use App\Tipo_Secado;
use Illuminate\Database\Seeder;

class TiposSecadosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		Tipo_Secado::create(array('nombre' => 'Patio de cemento'));
		Tipo_Secado::create(array('nombre' => 'Carros'));

		/*
			//seeder tiposSecados
			DB::table('tipos_secados')->insert(['nombre' => 'Patio de cemento')),
				\App\Tipo_Secado::create(array('nombre' => 'Carros')),
				\App\Tipo_Secado::create(array('nombre' => 'Carros')),
				\App\Tipo_Secado::create(array('nombre' => 'Secador tipo parabólico')),
				\App\Tipo_Secado::create(array('nombre' => 'Secador tipo capilla')),
				\App\Tipo_Secado::create(array('nombre' => 'Paceras')),
				\App\Tipo_Secado::create(array('nombre' => 'Mecanico')),
			]);
		*/
	}
}
