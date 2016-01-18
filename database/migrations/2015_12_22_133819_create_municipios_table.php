<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //crear tabla Municipios
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('departamento_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //eliminar tabla Municipios
        Schema::drop('municipios');
    }
}
