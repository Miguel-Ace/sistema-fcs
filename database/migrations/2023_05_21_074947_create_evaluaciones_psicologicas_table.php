<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_psicologicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_clinica')->unsigned();
            $table->bigInteger('id_expediente')->unsigned();
            $table->string('id_comunidad');
            $table->string('categoria_psicologica');
            $table->string('nota')->nullable();
            $table->string('semaforo');
            $table->timestamps();

            $table->foreign('id_clinica')->references('id')->on('clinicas');
            $table->foreign('id_expediente')->references('id')->on('expedientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_psicologicas');
    }
};
