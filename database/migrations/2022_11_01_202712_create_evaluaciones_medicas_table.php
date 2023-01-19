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
        Schema::create('evaluaciones_medicas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_expediente')->unsigned();
            $table->bigInteger('id_medico')->unsigned();
            $table->string('fecha');
            $table->string('cancer');
            $table->string('asma');
            $table->string('diabetes');
            $table->string('epilepcia');
            $table->string('enfermedad_corazon');
            $table->string('ostogenesis');
            $table->string('sindrome_piernas_inquietas');
            $table->string('otras_enfermedades');
            $table->string('notas')->nullable();
            $table->string('frenillos');
            $table->string('anteojos');
            $table->string('semaforo');
            $table->timestamps();

            $table->foreign('id_expediente')->references('id')->on('expedientes');
            $table->foreign('id_medico')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_medicas');
    }
};
