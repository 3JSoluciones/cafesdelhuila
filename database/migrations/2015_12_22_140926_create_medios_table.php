<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//crear tabla medios
		Schema::create('medios', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('productor_id')->unsigned();
			$table->string('nombre');
			$table->string('nombre_original');
			$table->string('tipo');
			$table->timestamps();

			// $table->foreign('productor_id')->references('id')->on('productores');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//eliminar tabla medios
		Schema::drop('medios');
	}
}
