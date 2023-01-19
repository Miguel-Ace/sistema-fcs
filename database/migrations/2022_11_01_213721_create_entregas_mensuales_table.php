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
        Schema::create('entregas_mensuales', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_expediente')->unsigned();
            $table->bigInteger('id_padrino')->unsigned();
            $table->string('fecha');
            $table->string('edad');
            $table->string('talla_pantalon');
            $table->string('talla_camisa');
            $table->string('talla_zapato');
            $table->string('grado_escolar');
            $table->string('observaciones');
            $table->timestamps();

            $table->foreign('id_expediente')->references('id')->on('expedientes');
            $table->foreign('id_padrino')->references('id')->on('padrinos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas_mensuales');
    }
};
