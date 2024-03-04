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
        Schema::create('detalle_evaluacion_medicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_evaluacion_medica')->unsigned();
            $table->bigInteger('id_especialidad')->unsigned();
            $table->string('medico');
            $table->string('diagnostico');
            $table->string('obsevacion');
            $table->string('semaforo');
            $table->string('nombre_diente')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('id_evaluacion_medica')->references('id')->on('evaluaciones_medicas');
            $table->foreign('id_especialidad')->references('id')->on('especialidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_evaluacion_medicas');
    }
};
