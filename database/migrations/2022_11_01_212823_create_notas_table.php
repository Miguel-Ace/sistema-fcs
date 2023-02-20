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
        Schema::create('notas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_expediente')->unsigned();
            $table->string('promedio');
            $table->string('fecha');
            $table->bigInteger('id_grado_escolar')->unsigned();
            $table->bigInteger('id_clasificacion_nota')->unsigned();
            $table->string('tipo_promedio');
            $table->string('semaforo');
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('id_expediente')->references('id')->on('expedientes');
            $table->foreign('id_grado_escolar')->references('id')->on('grados_escolares');
            $table->foreign('id_clasificacion_nota')->references('id')->on('clasificacion_notas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
