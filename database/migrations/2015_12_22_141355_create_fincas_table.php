<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFincasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//crear tabla fincas
		Schema::create('fincas', function (Blueprint $table) {

			$table->increments('id');
			$table->integer('productor_id')->unsigned();
			$table->integer('departamento_id')->unsigned();
			$table->integer('municipio_id')->unsigned();
			$table->string('corregimiento');
			$table->string('vereda');
			$table->string('finca');
			$table->string('latitud');
			$table->string('longitud');
			$table->string('altitud');
			$table->date('cosecha_comienza');
			$table->date('cosecha_termina');
			$table->date('mitaca_comienza');
			$table->date('mitaca_termina');
			$table->timestamps();

			//$table->foreign('productor_id')->references('id')->on('productores');
			//$table->foreign('departamento_id')->references('id')->on('departamentos');
			//$table->foreign('municipio_id')->references('id')->on('municipios');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//eliminar tabla fincas
		Schema::drop('fincas');
	}
}
