<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoresTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//crear tabla productores
		Schema::create('productores', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('organizacion_id')->unsigned();
			$table->string('nombre');
			$table->string('telefono');
			$table->string('email');
			$table->string('foto');
			$table->timestamps();

			// $table->foreign('organizacion_id')->references('id')->on('organizaciones');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//eliminar tabla productores
		Schema::drop('productores');
	}
}
