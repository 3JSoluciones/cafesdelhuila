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
			$table->string('coordenadas');
			$table->string('altitud');
			$table->dateTime('cosecha_comienza');
			$table->dateTime('cosecha_termina');
			$table->dateTime('mitaca_comienza');
			$table->dateTime('mitaca_termina');
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
