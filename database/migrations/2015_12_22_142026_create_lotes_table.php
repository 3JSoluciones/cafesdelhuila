<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLotesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//crear tabla lotes
		Schema::create('lotes', function (Blueprint $table) {

			$table->increments('id');
			$table->integer('finca_id')->unsigned();
			$table->integer('variedad1_id')->unsigned();
			$table->integer('variedad2_id')->unsigned();
			$table->integer('variedad3_id')->unsigned();
			$table->integer('acidez_id')->unsigned();
			$table->integer('aroma_id')->unsigned();
			$table->integer('sabor_id')->unsigned();
			$table->integer('tipo_beneficio_id')->unsigned();
			$table->integer('tipo_secado_id')->unsigned();
			$table->string('cantidad_arboles_variedad1');
			$table->string('cantidad_arboles_variedad2');
			$table->string('cantidad_arboles_variedad3');
			$table->string('nombre');
			$table->string('area');
			$table->string('perfil');
			$table->string('notas_variedad1');
			$table->string('notas_variedad2');
			$table->string('notas_variedad3');
			$table->timestamps();

			// $table->foreign('finca_id')->references('id')->on('fincas');
			// $table->foreign('variedad1_id')->references('id')->on('variedades');
			// $table->foreign('variedad2_id')->references('id')->on('variedades');
			// $table->foreign('variedad3_id')->references('id')->on('variedades');
			// $table->foreign('acidez_id')->references('id')->on('acidez');
			// $table->foreign('aroma_id')->references('id')->on('aromas');
			// $table->foreign('sabor_id')->references('id')->on('sabores');
			// $table->foreign('tipo_beneficio_id')->references('id')->on('tipos_beneficios');
			// $table->foreign('tipo_secado_id')->references('id')->on('tipos_secados');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//eliminar tabla lotes
		Schema::drop('lotes');
	}
}
