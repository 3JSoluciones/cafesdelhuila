<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //crear tabla aromas
         Schema::create('contactos', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('productor_id');
             $table->string('nombre');
             $table->string('correo');
             $table->string('telefono');
             $table->string('pais');
             $table->string('mensaje');
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
         //eliminar tabla aromas
         Schema::drop('contactos');
     }
}
