<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		//$this->call(UserTableSeeder::class);
		$this->call(TiposSecadosTableSeeder::class);
		$this->call(AcidezTableSeeder::class);
		$this->call(AromasTableSeeder::class);
		$this->call(TiposBeneficiosTableSeeder::class);
		$this->call(MunicipiosTableSeeder::class);
		$this->call(DepartamentosTableSeeder::class);
		$this->call(CertificacionesTableSeeder::class);

	}
}
