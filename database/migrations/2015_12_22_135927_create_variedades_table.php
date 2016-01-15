<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVariedadesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//crear tabla variedades
		Schema::create('variedades', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('acidez_id')->unsigned();
			$table->integer('aroma_id')->unsigned();
			$table->integer('sabor_id')->unsigned();
			$table->string('nombre');
			$table->timestamps();
			$table->dateTime('variedadescol');

			// $table->foreign('acidez_id')->references('id')->on('acidez');
			// $table->foreign('aroma_id')->references('id')->on('aromas');
			// $table->foreign('sabor_id')->references('id')->on('sabores');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//eliminar tabla variedades
		Schema::drop('variedades');
	}
}
