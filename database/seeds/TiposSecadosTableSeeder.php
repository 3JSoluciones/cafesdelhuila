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
		Tipo_Secado::create(array('nombre' => 'Secador tipo parabólico'));
		Tipo_Secado::create(array('nombre' => 'Secador tipo capilla'));
		Tipo_Secado::create(array('nombre' => 'Paceras'));
		Tipo_Secado::create(array('nombre' => 'Mecanico'));
		
	}

}
