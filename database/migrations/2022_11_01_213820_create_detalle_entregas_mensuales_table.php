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
        Schema::create('detalle_entregas_mensuales', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_expediente')->unsigned();
            // $table->bigInteger('id_entregaMensual')->unsigned();
            $table->bigInteger('id_tipoEntrega')->unsigned();
            $table->timestamps();

            $table->foreign('id_expediente')->references('id')->on('expedientes');
            // $table->foreign('id_entregaMensual')->references('id')->on('entregas_mensuales');
            $table->foreign('id_tipoEntrega')->references('id')->on('tipo_entregas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_entregas_mensuales');
    }
};
