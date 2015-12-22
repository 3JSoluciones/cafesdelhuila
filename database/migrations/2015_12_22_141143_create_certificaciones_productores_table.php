<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificacionesProductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //crear tabla certificaciones_productores
        Schema::create('certificaciones_productores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productor_id')->unsigned();
            $table->integer('certificacion_id')->unsigned();
            $table->timestamps();

            $table->foreign('productor_id')->references('id')->on('productores');
            $table->foreign('certificacion_id')->references('id')->on('certificaciones');

        });
    }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            //eliminar tabla certificaciones_productores
            Schema::drop('certificaciones_productores');
        }
    }
