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
        Schema::create('cumpleanios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('id_padrino')->unsigned();
            $table->string('fecha');
            $table->string('fecha_entrega_carta');
            $table->string('entrega_carta_presentacion');
            $table->string('entrega_video');
            $table->string('observaciones')->nullable();
            $table->string('regalo');
            $table->timestamps();

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
        Schema::dropIfExists('cumpleanios');
    }
};
