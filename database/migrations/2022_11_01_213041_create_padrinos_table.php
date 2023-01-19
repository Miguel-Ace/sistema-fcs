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
        Schema::create('padrinos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('correo');
            $table->string('tipo');
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->string('fecha_nacimiento');
            $table->bigInteger('id_metodo_pago')->unsigned();
            $table->bigInteger('id_banco')->unsigned();
            $table->timestamps();

            $table->foreign('id_metodo_pago')->references('id')->on('metodos_pagos');
            $table->foreign('id_banco')->references('id')->on('bancos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padrinos');
    }
};
